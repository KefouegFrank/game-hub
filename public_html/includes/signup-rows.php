<?php
// Direct brand links + promo codes + the "Continue to sign up" CTA.
// No params — reads the platform constants straight from config.php.
?>
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
