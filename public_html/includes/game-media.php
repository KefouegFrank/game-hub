<?php

$gameMediaSrc = $gameMediaSrc ?? ONEXBET_WEBSITE_VIDEO;
$gameMediaFixed = $gameMediaFixed ?? ''; // 'portrait' pins the frame; clips letterbox inside it
$gameMediaPoster = $gameMediaPoster ?? ''; // non-empty renders a poster overlay with this title
?>
<?php $gameMediaPinned = $gameMediaFixed === 'portrait'; ?>
<div class="game-media <?= $gameMediaPinned ? 'game-media-portrait game-media-fixed' : 'game-media-landscape' ?>" id="game-media"<?= $gameMediaPinned ? ' data-fixed-frame' : '' ?><?= $gameMediaPoster === '' ? '' : ' data-video-poster' ?>>
  <video id="game-media-video" class="game-media-video" src="<?= htmlspecialchars($gameMediaSrc) ?>"<?= $gameMediaPoster === '' ? ' controls' : '' ?> muted playsinline preload="metadata" aria-label="<?= htmlspecialchars($gameMediaAlt) ?>"></video>
  <?php if ($gameMediaPoster !== ''): ?>
    <?php $posterTitle = $gameMediaPoster; ?>
    <?php require __DIR__ . '/video-poster.php'; ?>
  <?php endif; ?>
</div>
