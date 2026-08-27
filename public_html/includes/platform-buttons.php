<?php
// Platform picker: 1xBet/MegaPari x website/app, plus the tutorial video button.
// Website buttons stay in the left column, app buttons in the right. Each one
// carries its walkthrough clip; the frame above resizes to whatever it loads.
// Include after includes/game-media.php.
?>
<div class="platform-select">
  <div class="platform-buttons">
    <button type="button" class="platform-btn active" data-href="<?= htmlspecialchars(ONEXBET_WEBSITE_URL) ?>" data-media="<?= htmlspecialchars(ONEXBET_WEBSITE_VIDEO) ?>" data-platform="onexbet" data-code="<?= htmlspecialchars(ONEXBET_PROMO_CODE) ?>">
      <?= icon_chrome() ?>
      1xBet <?= htmlspecialchars(t('website_label')) ?>
    </button>
    <button type="button" class="platform-btn" data-href="<?= htmlspecialchars(ONEXBET_APP_URL) ?>" data-media="<?= htmlspecialchars(ONEXBET_APP_VIDEO) ?>" data-platform="onexbet" data-code="<?= htmlspecialchars(ONEXBET_PROMO_CODE) ?>">
      <?= icon_android('#3ddc84', 'var(--bg)') ?>
      1xBet <?= htmlspecialchars(t('app_label')) ?>
    </button>
    <button type="button" class="platform-btn" data-href="<?= htmlspecialchars(MEGAPARI_WEBSITE_URL) ?>" data-media="<?= htmlspecialchars(MEGAPARI_WEBSITE_VIDEO) ?>" data-platform="megapari" data-code="<?= htmlspecialchars(MEGAPARI_PROMO_CODE) ?>">
      <?= icon_compass() ?>
      MegaPari <?= htmlspecialchars(t('website_label')) ?>
    </button>
    <button type="button" class="platform-btn" data-href="<?= htmlspecialchars(MEGAPARI_APP_URL) ?>" data-media="<?= htmlspecialchars(MEGAPARI_APP_VIDEO) ?>" data-platform="megapari" data-code="<?= htmlspecialchars(MEGAPARI_PROMO_CODE) ?>">
      <?= icon_android('#cbd5e1', 'var(--bg)') ?>
      MegaPari <?= htmlspecialchars(t('app_label')) ?>
    </button>
  </div>
  <button type="button" class="platform-btn platform-btn-wide" data-href="<?= htmlspecialchars(TUTORIAL_VIDEO_URL) ?>" data-media="<?= htmlspecialchars(ONEXBET_WEBSITE_VIDEO) ?>" data-platform="onexbet" data-code="<?= htmlspecialchars(ONEXBET_PROMO_CODE) ?>">
    <?= icon_clapper() ?>
    <?= htmlspecialchars(t('register_cta')) ?>
  </button>
</div>
