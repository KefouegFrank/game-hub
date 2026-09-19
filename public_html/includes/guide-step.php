<?php

?>
<div class="guide-step">
  <span class="guide-step-badge"><?= (int) $stepNumber ?></span>
  <?php if (!empty($stepImage)): ?>
    <img class="guide-step-img" src="<?= htmlspecialchars($stepImage) ?>" alt="">
  <?php else: ?>
    <div class="guide-step-placeholder"><?= icon_image_placeholder() ?></div>
  <?php endif; ?>
  <p class="guide-step-instruction"><?= htmlspecialchars($stepInstruction) ?></p>
</div>
