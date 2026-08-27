<?php
// Channel handle above the crash flow. Split so the handle itself can be
// highlighted; falls back to nothing when no channel is configured yet.
$tgPath = preg_replace('#^https?://#', '', TELEGRAM_URL);
$tgSlash = strrpos($tgPath, '/');
?>
<?php if (TELEGRAM_URL !== '#' && $tgSlash !== false): ?>
  <a class="telegram-strip" href="<?= htmlspecialchars(TELEGRAM_URL) ?>" target="_blank" rel="noopener">
    <?= htmlspecialchars(substr($tgPath, 0, $tgSlash + 1)) ?><strong><?= htmlspecialchars(substr($tgPath, $tgSlash + 1)) ?></strong>
  </a>
<?php endif; ?>
