<?php
// Brand video picker for the crash flow. Disabled in favour of a single "how
// to register" button below that plays the video above instead of picking a
// variant — kept here in case the picker comes back. See
// includes/platform-buttons.php for the same swap on Apple of Fortune.
?>
<div class="platform-select brand-video-select">
  <?php if (false): ?>
  <div class="brand-video-buttons">
    <button type="button" class="platform-btn brand-video-btn brand-onexbet" data-href="<?= htmlspecialchars(ONEXBET_WEBSITE_URL) ?>" data-media="<?= htmlspecialchars(ONEXBET_APP_VIDEO) ?>" data-platform="onexbet">
      <span class="brand-video-chip"><img src="/assets/img/Logo_1xBet.png" alt=""></span>
      1xBet <?= htmlspecialchars(t('brand_video_label')) ?>
    </button>
    <button type="button" class="platform-btn brand-video-btn brand-megapari active" data-href="<?= htmlspecialchars(MEGAPARI_WEBSITE_URL) ?>" data-media="<?= htmlspecialchars(MEGAPARI_APP_VIDEO) ?>" data-platform="megapari">
      <span class="brand-video-chip"><img src="/assets/img/megapari-logo.png" alt=""></span>
      MegaPari <?= htmlspecialchars(t('brand_video_label')) ?>
    </button>
  </div>
  <?php endif; ?>
  <button type="button" class="platform-btn platform-btn-wide" data-play-video>
    <?= icon_clipboard() ?>
    <?= htmlspecialchars(t('how_to_register_cta')) ?>
  </button>
</div>
