<?php
// Swappable tutorial player shown above the platform buttons. Starts on the
// clip belonging to the first active button; platform-select.js sizes the frame
// from whatever clip is loaded, so portrait and landscape both fit.
// Include after setting $gameMediaAlt.
$gameMediaSrc = $gameMediaSrc ?? ONEXBET_WEBSITE_VIDEO;
$gameMediaFixed = $gameMediaFixed ?? ''; // 'portrait' pins the frame; clips letterbox inside it
?>
<?php $gameMediaPinned = $gameMediaFixed === 'portrait'; ?>
<div class="game-media <?= $gameMediaPinned ? 'game-media-portrait game-media-fixed' : 'game-media-landscape' ?>" id="game-media"<?= $gameMediaPinned ? ' data-fixed-frame' : '' ?>>
  <video id="game-media-video" class="game-media-video" src="<?= htmlspecialchars($gameMediaSrc) ?>" controls playsinline preload="metadata" aria-label="<?= htmlspecialchars($gameMediaAlt) ?>"></video>
</div>
