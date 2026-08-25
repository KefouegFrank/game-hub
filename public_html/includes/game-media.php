<?php
// Swappable screenshot preview shown above the platform buttons.
// Include after setting $gameMediaWebsite, $gameMediaApp, $gameMediaAlt.
?>
<a class="game-media" id="game-media-link" href="<?= htmlspecialchars(ONEXBET_WEBSITE_URL) ?>">
  <img id="game-media-img" src="<?= htmlspecialchars($gameMediaWebsite) ?>" alt="<?= htmlspecialchars($gameMediaAlt) ?>">
</a>
