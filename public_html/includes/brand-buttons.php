<?php
// Simplified platform picker: brand only, no website/app split (unlike
// platform-buttons.php). Same active/data-* contract, so platform-select.js
// and code-reveal-step.php work unchanged with fewer buttons.
?>
<div class="platform-select">
  <div class="platform-buttons">
    <button type="button" class="platform-btn active" data-href="<?= htmlspecialchars(ONEXBET_WEBSITE_URL) ?>" data-platform="onexbet" data-code="<?= htmlspecialchars(ONEXBET_PROMO_CODE) ?>">
      <?= icon_globe() ?>
      1xBet
    </button>
    <button type="button" class="platform-btn" data-href="<?= htmlspecialchars(MELBET_WEBSITE_URL) ?>" data-platform="melbet" data-code="<?= htmlspecialchars(MELBET_PROMO_CODE) ?>">
      <?= icon_globe() ?>
      Melbet
    </button>
  </div>
</div>
