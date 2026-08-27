<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = SITE_NAME . ' — ' . SITE_TAGLINE;
require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="hero-visual">
    <div class="hero-player" id="hero-player">
      <video id="hero-video" class="hero-video" src="<?= htmlspecialchars(HERO_VIDEO) ?>"<?= HERO_POSTER === '' ? '' : ' poster="' . htmlspecialchars(HERO_POSTER) . '"' ?> playsinline preload="metadata"></video>
      <div class="hero-player-overlay">
        <span class="hero-player-title"><?= htmlspecialchars(t('hero_video_title')) ?></span>
        <span class="hero-player-brand">
          <?= icon_logo_mark('hero-player-mark', 'logoGradHero', '2.5') ?>
          <?= htmlspecialchars(SITE_NAME) ?>
        </span>
        <button type="button" class="hero-play-btn" id="hero-play-btn" aria-label="<?= htmlspecialchars(t('hero_play_label')) ?>">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 6.5 18 12l-9 5.5Z" fill="currentColor" /></svg>
        </button>
      </div>
    </div>
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
