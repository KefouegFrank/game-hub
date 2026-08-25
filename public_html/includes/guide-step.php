<?php
// One numbered guide step: badge + screenshot + instruction line.
// Set $stepNumber, $stepInstruction, and optionally $stepImage before including.
// When $stepImage is empty, renders a placeholder box instead.
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
