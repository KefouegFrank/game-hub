<?php
require_once __DIR__ . '/../includes/config.php';
$pageTitle = 'Apple of Fortune — how it works | ' . SITE_NAME;
require __DIR__ . '/../includes/header.php';
?>

<a class="game-media" id="game-media-link" href="<?= htmlspecialchars(ONEXBET_WEBSITE_URL) ?>">
  <img id="game-media-img" src="/assets/img/apple-of-fortune.jpeg" alt="Apple of Fortune gameplay screenshot">
</a>

<div class="platform-select">
  <div class="platform-buttons">
    <button type="button" class="platform-btn active" data-href="<?= htmlspecialchars(ONEXBET_WEBSITE_URL) ?>" data-media="/assets/img/apple-of-fortune.jpeg" data-platform="onexbet">
      <svg viewBox="0 0 24 24" fill="none" stroke="#38bdf8" stroke-width="1.6" aria-hidden="true"><circle cx="12" cy="12" r="9" /><path d="M3 12h18M12 3c2.2 2.4 3.5 5.5 3.5 9s-1.3 6.6-3.5 9c-2.2-2.4-3.5-5.5-3.5-9s1.3-6.6 3.5-9Z" /></svg>
      1xBet <?= htmlspecialchars(t('website_label')) ?>
    </button>
    <button type="button" class="platform-btn" data-href="<?= htmlspecialchars(ONEXBET_APP_URL) ?>" data-media="/assets/img/apple-of-fortune2.jpeg" data-platform="onexbet">
      <svg viewBox="0 0 24 24" fill="#3ddc84" aria-hidden="true">
        <path d="M7 10c0-2.8 2.2-5 5-5s5 2.2 5 5v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
        <circle cx="9.7" cy="10" r="0.9" fill="var(--bg)" />
        <circle cx="14.3" cy="10" r="0.9" fill="var(--bg)" />
        <path d="M8.3 6 7.3 4.3M15.7 6l1-1.7" stroke="#3ddc84" stroke-width="1.3" stroke-linecap="round" fill="none" />
        <rect x="5.2" y="10.5" width="1.6" height="4.2" rx="0.8" />
        <rect x="17.2" y="10.5" width="1.6" height="4.2" rx="0.8" />
        <rect x="9.7" y="16.3" width="1.6" height="3" rx="0.8" />
        <rect x="12.7" y="16.3" width="1.6" height="3" rx="0.8" />
      </svg>
      1xBet <?= htmlspecialchars(t('app_label')) ?>
    </button>
    <button type="button" class="platform-btn" data-href="<?= htmlspecialchars(MELBET_WEBSITE_URL) ?>" data-media="/assets/img/apple-of-fortune.jpeg" data-platform="melbet">
      <svg viewBox="0 0 24 24" fill="none" stroke="#38bdf8" stroke-width="1.6" aria-hidden="true"><circle cx="12" cy="12" r="9" /><path d="M3 12h18M12 3c2.2 2.4 3.5 5.5 3.5 9s-1.3 6.6-3.5 9c-2.2-2.4-3.5-5.5-3.5-9s1.3-6.6 3.5-9Z" /></svg>
      Melbet <?= htmlspecialchars(t('website_label')) ?>
    </button>
    <button type="button" class="platform-btn" data-href="<?= htmlspecialchars(MELBET_APP_URL) ?>" data-media="/assets/img/apple-of-fortune2.jpeg" data-platform="melbet">
      <svg viewBox="0 0 24 24" fill="#3ddc84" aria-hidden="true">
        <path d="M7 10c0-2.8 2.2-5 5-5s5 2.2 5 5v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
        <circle cx="9.7" cy="10" r="0.9" fill="var(--bg)" />
        <circle cx="14.3" cy="10" r="0.9" fill="var(--bg)" />
        <path d="M8.3 6 7.3 4.3M15.7 6l1-1.7" stroke="#3ddc84" stroke-width="1.3" stroke-linecap="round" fill="none" />
        <rect x="5.2" y="10.5" width="1.6" height="4.2" rx="0.8" />
        <rect x="17.2" y="10.5" width="1.6" height="4.2" rx="0.8" />
        <rect x="9.7" y="16.3" width="1.6" height="3" rx="0.8" />
        <rect x="12.7" y="16.3" width="1.6" height="3" rx="0.8" />
      </svg>
      Melbet <?= htmlspecialchars(t('app_label')) ?>
    </button>
  </div>
  <button type="button" class="platform-btn platform-btn-wide" data-href="<?= htmlspecialchars(TUTORIAL_VIDEO_URL) ?>" data-media="/assets/img/apple-of-fortune.jpeg" data-platform="onexbet">
    <svg viewBox="0 0 24 24" fill="none" stroke="#22d3ee" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2" /><path d="m3 9 4-2.5M21 9l-4-2.5" /><circle cx="12" cy="13" r="2.3" /></svg>
    <?= htmlspecialchars(t('register_cta')) ?>
  </button>
  <p class="fine-print"><?= htmlspecialchars(t('affiliate_note')) ?></p>
</div>

<div class="callout-box">
  <p><?= htmlspecialchars(t('before_you_play_note')) ?></p>
</div>

<div class="callout-box callout-box-alt">
  <p>⚠️ <?= htmlspecialchars(t('ready_to_play')) ?></p>
</div>

<div class="signup-rows">
  <div class="signup-row">
    <img class="pointer-icon" src="/assets/img/emoji-point-right.svg" alt="">
    <a class="brand-pill" href="<?= htmlspecialchars(ONEXBET_WEBSITE_URL) ?>"<?= ONEXBET_WEBSITE_URL === '#' ? '' : ' target="_blank" rel="noopener"' ?>>
      <img src="/assets/img/Logo_1xBet.png" alt="1xBet">
      <span class="chevron">›</span>
    </a>
    <span class="promo-pill"><?= htmlspecialchars(t('promo_code_label')) ?>:
      <?php if (ONEXBET_PROMO_CODE !== ''): ?>
        <button type="button" class="promo-code" data-code="<?= htmlspecialchars(ONEXBET_PROMO_CODE) ?>" data-copied-text="<?= htmlspecialchars(t('copied_label')) ?>"><?= htmlspecialchars(ONEXBET_PROMO_CODE) ?></button>
      <?php else: ?>
        <strong><?= htmlspecialchars(t('coming_soon')) ?></strong>
      <?php endif; ?>
    </span>
  </div>
  <div class="signup-row">
    <img class="pointer-icon" src="/assets/img/emoji-point-right.svg" alt="">
    <a class="brand-pill" href="<?= htmlspecialchars(MELBET_WEBSITE_URL) ?>"<?= MELBET_WEBSITE_URL === '#' ? '' : ' target="_blank" rel="noopener"' ?>>
      <img src="/assets/img/mailbet-logo.png" alt="Melbet">
      <span class="chevron">›</span>
    </a>
    <span class="promo-pill"><?= htmlspecialchars(t('promo_code_label')) ?>:
      <?php if (MELBET_PROMO_CODE !== ''): ?>
        <button type="button" class="promo-code" data-code="<?= htmlspecialchars(MELBET_PROMO_CODE) ?>" data-copied-text="<?= htmlspecialchars(t('copied_label')) ?>"><?= htmlspecialchars(MELBET_PROMO_CODE) ?></button>
      <?php else: ?>
        <strong><?= htmlspecialchars(t('coming_soon')) ?></strong>
      <?php endif; ?>
    </span>
  </div>
  <a id="continue-btn" class="btn btn-gradient btn-block" href="<?= htmlspecialchars(ONEXBET_WEBSITE_URL) ?>" data-platform="onexbet"><?= htmlspecialchars(t('continue_cta')) ?></a>
</div>

<dialog id="registration-check-modal" class="modal-box" aria-labelledby="registration-check-title">
  <svg class="modal-warning-icon" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <path d="M12 3 2 20h20L12 3Z" />
    <path d="M12 10v4" />
    <circle cx="12" cy="17" r="0.5" fill="#f59e0b" />
  </svg>
  <h3 id="registration-check-title"><?= htmlspecialchars(t('reg_check_title')) ?></h3>
  <p><?= htmlspecialchars(t('reg_check_body')) ?></p>
  <div class="modal-yes-no">
    <button type="button" class="btn modal-yes" data-modal-answer="yes"><?= htmlspecialchars(t('yes_label')) ?></button>
    <button type="button" class="btn modal-no" data-modal-answer="no"><?= htmlspecialchars(t('no_label')) ?></button>
  </div>
</dialog>

<article class="game-page">
  <h1>Apple of Fortune: how it works</h1>

  <p>Apple of Fortune is a pick-and-reveal game: each round you choose apples from a tree one at a time. Every safe pick raises your multiplier; picking a bad apple ends the round. You can cash out after any safe pick and lock in whatever multiplier you've reached so far.</p>

  <h2>How a round works</h2>
  <ul>
    <li>You set your stake before the round starts.</li>
    <li>Each apple you reveal is either safe (multiplier goes up) or ends the round.</li>
    <li>You choose when to cash out — the longer you keep going, the higher the multiplier, but the risk of hitting a bad apple grows too.</li>
    <li>If a round ends before you cash out, the stake for that round is lost.</li>
  </ul>

  <h2>Volatility and risk</h2>
  <p>Every pick is generated independently by the game's RNG, so past rounds have no bearing on the next one. There's no pattern, sequence, or software that can predict a safe pick — any claim otherwise is false. Treat the higher multipliers as higher-risk, higher-reward, not as something you can time or game.</p>
</article>

<div class="section-heading-wrap">
  <h2 class="section-heading"><?= htmlspecialchars(t('more_games')) ?></h2>
</div>

<section class="games-grid more-games">
  <a class="game-card" href="/games/crash.php">
    <div class="game-card-thumb"><img src="/assets/img/crash.jpg" alt="Crash"></div>
    <div class="game-card-body">
      <h3 class="game-card-title"><?= htmlspecialchars(t('free_label')) ?> | <?= htmlspecialchars(t('nav_crash')) ?></h3>
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

<?php require __DIR__ . '/../includes/footer.php'; ?>
