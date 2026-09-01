<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = t('apple_page_title') . ' | ' . SITE_NAME;
require __DIR__ . '/includes/header.php';
?>

<!-- Prediction card only, same as script.php -->
<section class="toolkit">
  <a class="btn back-btn" href="/games/apple-of-fortune.php">
    <?= icon_arrow_left() ?>
    <?= htmlspecialchars(t('back_label')) ?>
  </a>

  <div class="forecast forecast-apple" id="apple-card">
    <div class="forecast-body">
      <span class="spinner-ring forecast-spinner" aria-hidden="true"></span>

      <p class="forecast-label"><?= htmlspecialchars(t('forecast_next')) ?> &middot; <span id="apple-clock">--:--</span></p>

      <p class="forecast-figure" id="apple-figure">&mdash;</p>
      <p class="forecast-sub" id="apple-countdown">&nbsp;</p>

      <div class="forecast-rows apple-rows" id="apple-rows"
           data-starts-in="<?= htmlspecialchars(t('forecast_starts_in')) ?>"
           data-running="<?= htmlspecialchars(t('forecast_running')) ?>"
           data-level="<?= htmlspecialchars(t('apple_level')) ?>"
           data-cell="<?= htmlspecialchars(t('apple_cell')) ?>"></div>
    </div>

    <button type="button" id="apple-refresh" class="btn btn-green btn-block forecast-refresh">
      <?= htmlspecialchars(t('forecast_refresh')) ?>
    </button>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
