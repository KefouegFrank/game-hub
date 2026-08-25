<?php
// Platform picker: 1xBet/Melbet x website/app, plus the tutorial video button.
// Selecting a button updates #game-media-img/#game-media-link, #continue-btn,
// and (when present) #code-reveal-btn — see assets/js/platform-select.js.
// Include after setting $gameMediaWebsite, $gameMediaApp, $gameMediaAlt.
?>
<div class="platform-select">
  <div class="platform-buttons">
    <button type="button" class="platform-btn active" data-href="<?= htmlspecialchars(ONEXBET_WEBSITE_URL) ?>" data-media="<?= htmlspecialchars($gameMediaWebsite) ?>" data-platform="onexbet" data-code="<?= htmlspecialchars(ONEXBET_PROMO_CODE) ?>">
      <?= icon_globe() ?>
      1xBet <?= htmlspecialchars(t('website_label')) ?>
    </button>
    <button type="button" class="platform-btn" data-href="<?= htmlspecialchars(ONEXBET_APP_URL) ?>" data-media="<?= htmlspecialchars($gameMediaApp) ?>" data-platform="onexbet" data-code="<?= htmlspecialchars(ONEXBET_PROMO_CODE) ?>">
      <?= icon_android('#3ddc84', 'var(--bg)') ?>
      1xBet <?= htmlspecialchars(t('app_label')) ?>
    </button>
    <button type="button" class="platform-btn" data-href="<?= htmlspecialchars(MELBET_WEBSITE_URL) ?>" data-media="<?= htmlspecialchars($gameMediaWebsite) ?>" data-platform="melbet" data-code="<?= htmlspecialchars(MELBET_PROMO_CODE) ?>">
      <?= icon_globe() ?>
      Melbet <?= htmlspecialchars(t('website_label')) ?>
    </button>
    <button type="button" class="platform-btn" data-href="<?= htmlspecialchars(MELBET_APP_URL) ?>" data-media="<?= htmlspecialchars($gameMediaApp) ?>" data-platform="melbet" data-code="<?= htmlspecialchars(MELBET_PROMO_CODE) ?>">
      <?= icon_android('#3ddc84', 'var(--bg)') ?>
      Melbet <?= htmlspecialchars(t('app_label')) ?>
    </button>
  </div>
  <button type="button" class="platform-btn platform-btn-wide" data-href="<?= htmlspecialchars(TUTORIAL_VIDEO_URL) ?>" data-media="<?= htmlspecialchars($gameMediaWebsite) ?>" data-platform="onexbet" data-code="<?= htmlspecialchars(ONEXBET_PROMO_CODE) ?>">
    <svg viewBox="0 0 24 24" fill="none" stroke="#22d3ee" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2" /><path d="m3 9 4-2.5M21 9l-4-2.5" /><circle cx="12" cy="13" r="2.3" /></svg>
    <?= htmlspecialchars(t('register_cta')) ?>
  </button>
  <p class="fine-print"><?= htmlspecialchars(t('affiliate_note')) ?></p>
</div>
