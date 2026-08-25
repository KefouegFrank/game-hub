<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/icons.php';
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($CURRENT_LANG) ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($pageTitle ?? SITE_NAME) ?></title>
<meta name="description" content="<?= htmlspecialchars(SITE_TAGLINE) ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;700;800&family=Inter:wght@400;500;600&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/style.css?v=<?= filemtime(__DIR__ . '/../assets/css/style.css') ?>">
</head>
<body<?= isset($bodyClass) ? ' class="' . htmlspecialchars($bodyClass) . '"' : '' ?>>

<canvas id="particles-bg" aria-hidden="true"></canvas>

<header class="site-header">
  <div class="container header-row">
    <a class="icon-btn telegram-btn" href="<?= htmlspecialchars(TELEGRAM_URL) ?>" target="_blank" rel="noopener" aria-label="<?= htmlspecialchars(t('telegram_cta')) ?>" title="<?= htmlspecialchars(t('telegram_cta')) ?><?= TELEGRAM_URL === '#' ? ' — ' . htmlspecialchars(t('coming_soon')) : '' ?>">
      <?= icon_telegram() ?>
    </a>

    <a href="/" class="logo">
      <?= icon_logo_mark('logo-mark', 'logoGradNav', '2.5') ?>
      <span class="logo-word"><?= htmlspecialchars(SITE_NAME) ?></span>
    </a>

    <?php
    $langFlags = [
        'en' => '<svg viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg"><rect width="30" height="20" fill="#00247d"/><path d="M0,0 L30,20 M30,0 L0,20" stroke="#fff" stroke-width="4"/><path d="M0,0 L30,20 M30,0 L0,20" stroke="#cf142b" stroke-width="1.3"/><path d="M15,0 V20 M0,10 H30" stroke="#fff" stroke-width="6"/><path d="M15,0 V20 M0,10 H30" stroke="#cf142b" stroke-width="2"/></svg>',
        'fr' => '<svg viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg"><rect width="10" height="20" fill="#0055a4"/><rect x="10" width="10" height="20" fill="#fff"/><rect x="20" width="10" height="20" fill="#ef4135"/></svg>',
        'es' => '<svg viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg"><rect width="30" height="20" fill="#aa151b"/><rect y="5" width="30" height="10" fill="#f1bf00"/></svg>',
    ];
    ?>
    <details class="lang-switch">
      <summary aria-label="Language: <?= htmlspecialchars($SUPPORTED_LANGS[$CURRENT_LANG]) ?>">
        <span class="flag-icon"><?= $langFlags[$CURRENT_LANG] ?? '' ?></span>
        <svg class="chevron" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path d="M1 1.5 6 6.5 11 1.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </summary>
      <ul>
        <?php foreach ($SUPPORTED_LANGS as $code => $label): ?>
          <li>
            <a href="?lang=<?= htmlspecialchars($code) ?>" <?= $code === $CURRENT_LANG ? 'aria-current="true"' : '' ?>>
              <span class="flag-icon"><?= $langFlags[$code] ?? '' ?></span>
              <?= htmlspecialchars($label) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </details>
  </div>
</header>

<?php if (SHOW_AFFILIATE_DISCLOSURE): ?>
<div class="disclosure-banner"><?= htmlspecialchars(t('disclosure_text')) ?></div>
<?php endif; ?>

<main class="container">
