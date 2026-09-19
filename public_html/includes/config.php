<?php

// --- Basic site info ---
define('SITE_NAME', 'BOT WIN');
define('SITE_TAGLINE', 'Prédictions en direct pour Crash et Apple of Fortune');

// --- Affiliate disclosure ---
define('SHOW_AFFILIATE_DISCLOSURE', false);

// --- External links ---
define('WHATSAPP_URL', 'https://whatsapp.com/channel/0029VbBMmo9Fi8xUGXmhl23m');
define('APK_DOWNLOAD_URL', 'https://mlbbonus.fun/cm/?tag=d_4088679m_2170c_promocodeCIPAF&site=4088679&ad=2170&r=registration');

// --- Affiliate platform links ---
define('ONEXBET_WEBSITE_URL', 'https://1xbet.cm/fr/registration');
define('ONEXBET_APP_URL', 'https://1xbet.cm/fr/registration');
define('MEGAPARI_WEBSITE_URL', 'https://rboss1.megapari-983300.com');
define('MEGAPARI_APP_URL', 'https://rboss1.megapari-983300.com');
define('MELBET_WEBSITE_URL', 'https://mlbbonus.fun/cm/?tag=d_4088679m_2170c_promocodeCIPAF&site=4088679&ad=2170&r=registration'); // TODO: real affiliate link, not set yet
define('TUTORIAL_VIDEO_URL', '#'); // unused: nothing reads the pickers' data-href

// --- Walkthrough video ---
define('WALKTHROUGH_VIDEO', '/assets/video/melbet-video.MOV'); // portrait, 576x1024
define('ONEXBET_WEBSITE_VIDEO', WALKTHROUGH_VIDEO);
define('ONEXBET_APP_VIDEO', WALKTHROUGH_VIDEO);
define('MEGAPARI_WEBSITE_VIDEO', WALKTHROUGH_VIDEO);
define('MEGAPARI_APP_VIDEO', WALKTHROUGH_VIDEO);
define('HERO_VIDEO', WALKTHROUGH_VIDEO);
define('HERO_POSTER', '');

// --- Deposit required to unlock the script (shown in the crash flow) ---
define('DEPOSIT_AMOUNT', '$2 (1000 FCFA)');

// --- Promo codes (blank until real codes exist — the pill only renders when set) ---
define('ONEXBET_PROMO_CODE', 'RBOSS1');
define('MEGAPARI_PROMO_CODE', 'RBOSS1');
define('MELBET_PROMO_CODE', 'CIPAF');

// --- Supported languages ---
$SUPPORTED_LANGS = [
    'fr' => 'Français',
    'en' => 'English',
    'es' => 'Español',
    'ar' => 'العربية',
];

// Written right-to-left; drives <html dir> and the RTL rules in style.css.
$RTL_LANGS = ['ar'];

// --- Current language (?lang= wins, then the remembered choice, else French) ---
$lang = $_GET['lang'] ?? $_COOKIE['lang'] ?? 'fr';
if (!array_key_exists($lang, $SUPPORTED_LANGS)) {
    $lang = 'fr';
}

// Remember an explicit pick: internal links don't carry ?lang=, so without this
// every navigation drops back to French.
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
$GLOBALS['CURRENT_DIR'] = in_array($lang, $RTL_LANGS, true) ? 'rtl' : 'ltr';

function t(string $key): string {
    static $strings = null;
    if ($strings === null) {
        $file = __DIR__ . '/../lang/' . $GLOBALS['CURRENT_LANG'] . '.json';
        if (!file_exists($file)) {
            $file = __DIR__ . '/../lang/fr.json';
        }
        $strings = json_decode(file_get_contents($file), true) ?? [];
    }
    return $strings[$key] ?? $key;
}
