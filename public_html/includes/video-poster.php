<?php
// Poster overlay for a video: title left, site mark right, play button centre.
// The container it sits in carries data-video-poster — see assets/js/video-poster.js.
// Set $posterTitle before including.
?>
<div class="video-poster-overlay">
  <!-- <span class="video-poster-title"><?= htmlspecialchars($posterTitle) ?></span> -->
  <span class="video-poster-brand">
    <?= icon_logo_mark('video-poster-mark', 'logoGradPoster', '2.5') ?>
    <?= htmlspecialchars(SITE_NAME) ?>
  </span>
  <button type="button" class="video-poster-play" aria-label="<?= htmlspecialchars(t('hero_play_label')) ?>">
    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 6.5 18 12l-9 5.5Z" fill="currentColor" /></svg>
  </button>
</div>
