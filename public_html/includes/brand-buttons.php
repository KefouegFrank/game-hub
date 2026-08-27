<?php
// Brand video picker for the crash flow: one button per brand, each carrying its
// walkthrough clip. Same active/data-* contract as platform-buttons.php, so
// assets/js/platform-select.js drives the player above unchanged.
// MegaPari starts active because its portrait clip is what the pinned frame is
// shaped for — crash.php loads that same clip as the initial source.
?>
<div class="platform-select brand-video-select">
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
</div>
