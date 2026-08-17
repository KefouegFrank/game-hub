<?php
/**
 * Site-wide configuration.
 * Copy this file to config.local.php on your live server and adjust values there
 * (config.local.php should be gitignored so real credentials never get committed).
 */

// --- Basic site info ---
define('SITE_NAME', 'GamesHub');
define('SITE_URL', 'http://localhost:8000'); // change to your real domain in production
define('SITE_TAGLINE', '');

// --- Affiliate disclosure ---
define('SHOW_AFFILIATE_DISCLOSURE', false);

// --- External links (placeholders until real accounts/builds exist) ---
define('TELEGRAM_URL', 'https://t.me/gamehubtest');
define('APK_DOWNLOAD_URL', '#');

// --- Affiliate platform links (placeholders until real affiliate links exist) ---
define('ONEXBET_WEBSITE_URL', '#');
define('ONEXBET_APP_URL', '#');
define('MAILBET_WEBSITE_URL', '#');
define('MAILBET_APP_URL', '#');
define('TUTORIAL_VIDEO_URL', '#');

// --- Database (optional — only needed if you want to track referral clicks) ---
define('DB_HOST', 'localhost');
define('DB_NAME', 'gameshub');
define('DB_USER', 'root');
define('DB_PASS', '');

function get_db(): ?PDO {
    static $pdo = null;
    if ($pdo === null) {
        try {
            $pdo = new PDO(
                'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
                DB_USER,
                DB_PASS,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            // In local dev without a DB set up yet, fail soft instead of crashing every page.
            error_log('DB connection failed: ' . $e->getMessage());
            return null;
        }
    }
    return $pdo;
}

// --- Supported languages ---
$SUPPORTED_LANGS = [
    'en' => 'English',
    'fr' => 'Français',
    'es' => 'Español',
];

// --- Current language (from ?lang= query param, default en) ---
$lang = $_GET['lang'] ?? 'en';
if (!array_key_exists($lang, $SUPPORTED_LANGS)) {
    $lang = 'en';
}
$GLOBALS['CURRENT_LANG'] = $lang;

function t(string $key): string {
    static $strings = null;
    if ($strings === null) {
        $file = __DIR__ . '/../lang/' . $GLOBALS['CURRENT_LANG'] . '.json';
        if (!file_exists($file)) {
            $file = __DIR__ . '/../lang/en.json';
        }
        $strings = json_decode(file_get_contents($file), true) ?? [];
    }
    return $strings[$key] ?? $key;
}
