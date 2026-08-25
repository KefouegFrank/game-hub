<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = SITE_NAME . ' — ' . SITE_TAGLINE;
require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="hero-visual">
    <?= icon_logo_mark('hero-visual-mark', 'logoGradHero', '1.5') ?>
  </div>
  <p class="hero-lede"><img src="/assets/img/emoji-money-mouth.svg" alt="" class="emoji-icon"> <?= htmlspecialchars(t('hero_title')) ?></p>
  <p><?= htmlspecialchars(SITE_TAGLINE) ?></p>
</section>

<div class="section-heading-wrap">
  <h2 class="section-heading"><?= htmlspecialchars(t('games_heading')) ?></h2>
</div>

<section class="games-grid">
  <a class="game-card" href="/games/crash.php">
    <div class="game-card-thumb"><img src="/assets/img/crash.jpg" alt="Crash"></div>
    <div class="game-card-body">
      <h3 class="game-card-title"><?= htmlspecialchars(t('free_label')) ?> | <?= htmlspecialchars(t('nav_crash')) ?></h3>
      <span class="btn btn-gradient btn-block"><?= htmlspecialchars(t('learn_more')) ?></span>
    </div>
  </a>
  <a class="game-card" href="/games/apple-of-fortune.php">
    <div class="game-card-thumb"><img src="/assets/img/apple-of-fortune.jpeg" alt="Apple of Fortune"></div>
    <div class="game-card-body">
      <h3 class="game-card-title"><?= htmlspecialchars(t('free_label')) ?> | <?= htmlspecialchars(t('nav_apple')) ?></h3>
      <span class="btn btn-gradient btn-block"><?= htmlspecialchars(t('learn_more')) ?></span>
    </div>
  </a>
  <a class="game-card" href="/games/thimbles.php">
    <div class="game-card-thumb"><img src="/assets/img/thimbles.jpeg" alt="Thimbles"></div>
    <div class="game-card-body">
      <h3 class="game-card-title"><?= htmlspecialchars(t('free_label')) ?> | <?= htmlspecialchars(t('nav_thimbles')) ?></h3>
      <span class="btn btn-gradient btn-block"><?= htmlspecialchars(t('learn_more')) ?></span>
    </div>
  </a>
</section>

<div class="cta-stack">
  <a class="btn btn-cta btn-telegram btn-block<?= TELEGRAM_URL === '#' ? ' btn-placeholder' : '' ?>" href="<?= htmlspecialchars(TELEGRAM_URL) ?>"<?= TELEGRAM_URL === '#' ? '' : ' target="_blank" rel="noopener"' ?>>
    <?= icon_telegram() ?>
    <span><?= htmlspecialchars(t('telegram_cta')) ?></span>
    <?php if (TELEGRAM_URL === '#'): ?><span class="badge"><?= htmlspecialchars(t('coming_soon')) ?></span><?php endif; ?>
  </a>
  <a class="btn btn-cta btn-apk btn-block<?= APK_DOWNLOAD_URL === '#' ? ' btn-placeholder' : '' ?>" href="<?= htmlspecialchars(APK_DOWNLOAD_URL) ?>"<?= APK_DOWNLOAD_URL === '#' ? '' : ' target="_blank" rel="noopener"' ?>>
    <?= icon_android() ?>
    <span><?= htmlspecialchars(t('apk_download_cta')) ?></span>
    <?php if (APK_DOWNLOAD_URL === '#'): ?><span class="badge"><?= htmlspecialchars(t('coming_soon')) ?></span><?php endif; ?>
  </a>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
