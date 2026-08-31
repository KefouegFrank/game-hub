<?php
/**
 * Per-IP rate limiting for public endpoints, backed by files so it works on
 * shared hosting with no extensions or database.
 *
 * Fails open: if the counter store is unwritable, requests are allowed through
 * rather than blocking real uploads. The worst case is losing throttling, not
 * losing the endpoint.
 */

function rate_limit_client_key(): string {
    // Behind Cloudflare, REMOTE_ADDR is Cloudflare's edge, which would put every
    // visitor in one bucket. CF-Connecting-IP is only trusted when the site is
    // actually behind Cloudflare — otherwise a client could forge it and evade
    // the limit. Set TRUST_CLOUDFLARE_IP in config/secrets.php when applicable.
    if (defined('TRUST_CLOUDFLARE_IP') && TRUST_CLOUDFLARE_IP && !empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        return (string) $_SERVER['HTTP_CF_CONNECTING_IP'];
    }
    return (string) ($_SERVER['REMOTE_ADDR'] ?? '0.0.0.0');
}

function rate_limit_dir(): ?string {
    $dir = __DIR__ . '/../../storage/ratelimit';
    if (!is_dir($dir)) {
        @mkdir($dir, 0700, true);
    }
    if (is_dir($dir) && is_writable($dir)) {
        return $dir;
    }
    $fallback = sys_get_temp_dir() . '/gameshub-ratelimit';
    if (!is_dir($fallback)) {
        @mkdir($fallback, 0700, true);
    }
    return (is_dir($fallback) && is_writable($fallback)) ? $fallback : null;
}

/**
 * Sliding window. Returns true when the request is within budget, false when
 * the caller should reject it. Records the attempt either way it is allowed.
 */
function rate_limit_allow(string $bucket, string $key, int $max, int $windowSeconds): bool {
    $dir = rate_limit_dir();
    if ($dir === null) {
        return true; // no store — fail open
    }

    // Hashed so raw IPs aren't sitting on disk.
    $file = $dir . '/' . $bucket . '_' . hash('sha256', $key) . '.txt';
    $fh = @fopen($file, 'c+');
    if ($fh === false) {
        return true;
    }

    $allowed = true;
    if (flock($fh, LOCK_EX)) {
        $now = time();
        $raw = stream_get_contents($fh);
        $stamps = array_filter(array_map('intval', explode(',', (string) $raw)));
        $stamps = array_values(array_filter($stamps, static fn($t) => $t > $now - $windowSeconds));

        $allowed = count($stamps) < $max;
        if ($allowed) {
            $stamps[] = $now;
        }

        ftruncate($fh, 0);
        rewind($fh);
        fwrite($fh, implode(',', $stamps));
        fflush($fh);
        flock($fh, LOCK_UN);
    }
    fclose($fh);

    rate_limit_sweep($dir, $windowSeconds);
    return $allowed;
}

/** Occasional cleanup so the counter directory can't grow without bound. */
function rate_limit_sweep(string $dir, int $windowSeconds): void {
    if (random_int(1, 100) !== 1) {
        return;
    }
    $cutoff = time() - max($windowSeconds * 2, 3600);
    foreach (glob($dir . '/*.txt') ?: [] as $path) {
        if (@filemtime($path) < $cutoff) {
            @unlink($path);
        }
    }
}

/** Rejects browser-driven cross-site posts. Not a substitute for a CSRF token. */
function rate_limit_same_origin(): bool {
    $source = $_SERVER['HTTP_ORIGIN'] ?? '';
    if ($source === '') {
        $source = $_SERVER['HTTP_REFERER'] ?? '';
        if ($source === '') {
            return true; // non-browser client; the rate limit still applies
        }
    }

    $parts = parse_url($source);
    if (empty($parts['host'])) {
        return false;
    }

    // HTTP_HOST carries the port only when it isn't the scheme default, so
    // compare with and without it rather than assuming either shape.
    $self = (string) ($_SERVER['HTTP_HOST'] ?? '');
    $withPort = $parts['host'] . (isset($parts['port']) ? ':' . $parts['port'] : '');

    return strcasecmp($withPort, $self) === 0
        || strcasecmp($parts['host'], (string) strtok($self, ':')) === 0;
}
