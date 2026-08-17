<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = SITE_NAME . ' — ' . SITE_TAGLINE;
require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="hero-visual">
    <svg class="hero-visual-mark" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <defs>
        <linearGradient id="logoGradHero" x1="0" y1="0" x2="32" y2="32" gradientUnits="userSpaceOnUse">
          <stop offset="0" style="stop-color:var(--accent-a)" />
          <stop offset="1" style="stop-color:var(--accent-b)" />
        </linearGradient>
      </defs>
      <path d="M16 2 L28 16 L16 30 L4 16 Z" stroke="url(#logoGradHero)" stroke-width="1.5" stroke-linejoin="round" />
      <circle cx="16" cy="16" r="4" fill="url(#logoGradHero)" />
    </svg>
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
    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <path d="M4 12.4 19 5.5c.7-.3 1.4.3 1.1 1.1l-2.6 12.7c-.2.9-1.2 1.3-1.9.8l-3.9-2.9-2 1.9c-.3.3-.7.3-.9-.1l-.6-3.4" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
      <path d="m8.2 14.1 9-6.9-10.4 7 1.4 4.6" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
    <span><?= htmlspecialchars(t('telegram_cta')) ?></span>
    <?php if (TELEGRAM_URL === '#'): ?><span class="badge"><?= htmlspecialchars(t('coming_soon')) ?></span><?php endif; ?>
  </a>
  <a class="btn btn-cta btn-apk btn-block<?= APK_DOWNLOAD_URL === '#' ? ' btn-placeholder' : '' ?>" href="<?= htmlspecialchars(APK_DOWNLOAD_URL) ?>"<?= APK_DOWNLOAD_URL === '#' ? '' : ' target="_blank" rel="noopener"' ?>>
    <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <path d="M7 10c0-2.8 2.2-5 5-5s5 2.2 5 5v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
      <circle cx="9.7" cy="10" r="0.9" fill="#fff" />
      <circle cx="14.3" cy="10" r="0.9" fill="#fff" />
      <path d="M8.3 6 7.3 4.3M15.7 6l1-1.7" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" fill="none" />
      <rect x="5.2" y="10.5" width="1.6" height="4.2" rx="0.8" />
      <rect x="17.2" y="10.5" width="1.6" height="4.2" rx="0.8" />
      <rect x="9.7" y="16.3" width="1.6" height="3" rx="0.8" />
      <rect x="12.7" y="16.3" width="1.6" height="3" rx="0.8" />
    </svg>
    <span><?= htmlspecialchars(t('apk_download_cta')) ?></span>
    <?php if (APK_DOWNLOAD_URL === '#'): ?><span class="badge"><?= htmlspecialchars(t('coming_soon')) ?></span><?php endif; ?>
  </a>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
