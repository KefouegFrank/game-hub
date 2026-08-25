<?php
// Simplified platform picker: brand only, no website/app split (unlike
// platform-buttons.php). Same active/data-* contract, so platform-select.js
// works unchanged with fewer buttons.
?>
<div class="platform-select">
  <div class="platform-buttons">
    <button type="button" class="platform-btn active" data-href="<?= htmlspecialchars(ONEXBET_WEBSITE_URL) ?>" data-platform="onexbet">
      <?= icon_globe() ?>
      1xBet
    </button>
    <button type="button" class="platform-btn" data-href="<?= htmlspecialchars(MELBET_WEBSITE_URL) ?>" data-platform="melbet">
      <?= icon_globe() ?>
      Melbet
    </button>
  </div>
</div>
