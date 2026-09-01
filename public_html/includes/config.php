<?php
/**
 * Site-wide configuration.
 * Copy this file to config.local.php on your live server and adjust values there
 * (config.local.php should be gitignored so real credentials never get committed).
 */

// --- Basic site info ---
define('SITE_NAME', 'GamesHub');
define('SITE_TAGLINE', 'Best online games and betting platforms online');

// --- Affiliate disclosure ---
define('SHOW_AFFILIATE_DISCLOSURE', false);

// --- External links ---
define('WHATSAPP_URL', 'https://whatsapp.com/channel/0029Vb605FpFcowFwiiIbG3H');
define('APK_DOWNLOAD_URL', 'https://rboss1.megapari-983300.com/');

// --- Affiliate platform links ---
// No separate app-signup links exist yet, so the app buttons send people to the
// same registration page as the website ones.
define('ONEXBET_WEBSITE_URL', 'https://1xbet.cm/fr/registration');
define('ONEXBET_APP_URL', 'https://1xbet.cm/fr/registration');
define('MEGAPARI_WEBSITE_URL', 'https://rboss1.megapari-983300.com');
define('MEGAPARI_APP_URL', 'https://rboss1.megapari-983300.com');
define('TUTORIAL_VIDEO_URL', '#'); // unused: nothing reads the pickers' data-href

// --- Walkthrough video ---
// One clip covers every brand and both platforms, so every player on the site
// points at it. Per-brand captures live on in git if the split is ever wanted
// back; give each constant its own file and the picker starts switching again.
define('WALKTHROUGH_VIDEO', '/assets/video/Wall-in-one.mp4'); // portrait, 576x1024
define('ONEXBET_WEBSITE_VIDEO', WALKTHROUGH_VIDEO);
define('ONEXBET_APP_VIDEO', WALKTHROUGH_VIDEO);
define('MEGAPARI_WEBSITE_VIDEO', WALKTHROUGH_VIDEO);
define('MEGAPARI_APP_VIDEO', WALKTHROUGH_VIDEO);
define('HERO_VIDEO', WALKTHROUGH_VIDEO);
define('HERO_POSTER', ''); // optional still shown before play; blank uses the clip's first frame

// --- Deposit required to unlock the script (shown in the crash flow) ---
// Rounded up from ~5650 FCFA so $10 stays covered when the rate moves.
define('DEPOSIT_AMOUNT', '$10 (6000 FCFA)');

// --- Promo codes (blank until real codes exist — the pill only renders when set) ---
define('ONEXBET_PROMO_CODE', 'RBOSS1');
define('MEGAPARI_PROMO_CODE', 'RBOSS1');

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
