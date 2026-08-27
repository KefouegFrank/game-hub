<?php
/**
 * Site-wide configuration.
 * Copy this file to config.local.php on your live server and adjust values there
 * (config.local.php should be gitignored so real credentials never get committed).
 */

// --- Basic site info ---
define('SITE_NAME', 'GamesHub');
define('SITE_URL', 'http://localhost:8000'); // change to your real domain in production
define('SITE_TAGLINE', 'Best online games and betting platforms online');

// --- Affiliate disclosure ---
define('SHOW_AFFILIATE_DISCLOSURE', false);

// --- External links ---
define('WHATSAPP_URL', 'https://whatsapp.com/channel/0029Vb605FpFcowFwiiIbG3H');
define('APK_DOWNLOAD_URL', 'https://rboss1.megapari-983300.com/');

// --- Affiliate platform links (placeholders until real affiliate links exist) ---
define('ONEXBET_WEBSITE_URL', '#');
define('ONEXBET_APP_URL', '#');
define('MEGAPARI_WEBSITE_URL', '#');
define('MEGAPARI_APP_URL', '#');
define('TUTORIAL_VIDEO_URL', '#');

// --- Registration walkthrough videos shown by the platform picker ---
// MegaPari has no website capture yet, so both its buttons play the app one.
define('ONEXBET_WEBSITE_VIDEO', '/assets/video/1xbet-registration-website.mp4');
define('ONEXBET_APP_VIDEO', '/assets/video/1xbet-registration-app.mp4');
define('MEGAPARI_WEBSITE_VIDEO', '/assets/video/megaPari-registration-app.mp4');
define('MEGAPARI_APP_VIDEO', '/assets/video/megaPari-registration-app.mp4');
define('HERO_VIDEO', '/assets/video/1xbet-registration-website.mp4'); // swap once a real intro exists
define('HERO_POSTER', ''); // optional still shown before play; blank uses the clip's first frame

// --- Deposit required to unlock the script (shown in the crash flow) ---
define('DEPOSIT_AMOUNT', '12367 XAF');

// --- Promo codes (blank until real codes exist — the pill only renders when set) ---
define('ONEXBET_PROMO_CODE', 'RBOSS1');
define('MEGAPARI_PROMO_CODE', 'RBOSS1');

// --- Telegram bot (forwards deposit-proof screenshot uploads, see upload-proof.php) ---
define('TELEGRAM_BOT_TOKEN', ''); // set in config.local.php on the live server
define('TELEGRAM_UPLOAD_CHAT_ID', ''); // chat/channel ID the bot sends uploads to

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

// --- Current language (?lang= wins, then the remembered choice, else en) ---
$lang = $_GET['lang'] ?? $_COOKIE['lang'] ?? 'en';
if (!array_key_exists($lang, $SUPPORTED_LANGS)) {
    $lang = 'en';
}

// Remember an explicit pick: internal links don't carry ?lang=, so without this
// every navigation drops back to English.
if (isset($_GET['lang']) && $lang === $_GET['lang'] && ($_COOKIE['lang'] ?? '') !== $lang && !headers_sent()) {
    setcookie('lang', $lang, [
        'expires' => time() + 31536000,
        'path' => '/',
        'secure' => !empty($_SERVER['HTTPS']),
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
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
