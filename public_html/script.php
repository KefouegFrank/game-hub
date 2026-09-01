<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = t('script_page_title') . ' | ' . SITE_NAME;
require __DIR__ . '/includes/header.php';
?>

<!-- Prediction card only: the reference screen carries nothing else. -->
<section class="toolkit">
  <a class="btn back-btn" href="/games/crash.php">
    <?= icon_arrow_left() ?>
    <?= htmlspecialchars(t('back_label')) ?>
  </a>

  <div class="forecast" id="forecast">
    <div class="forecast-body">
      <span class="spinner-ring forecast-spinner" aria-hidden="true"></span>

      <p class="forecast-label"><?= htmlspecialchars(t('forecast_next')) ?> &middot; <span id="forecast-clock">--:--</span></p>

      <p class="forecast-figure" id="forecast-figure">&mdash;</p>
      <p class="forecast-sub" id="forecast-countdown">&nbsp;</p>

      <div class="forecast-rows" id="forecast-rows"
           data-starts-in="<?= htmlspecialchars(t('forecast_starts_in')) ?>"
           data-running="<?= htmlspecialchars(t('forecast_running')) ?>"></div>
    </div>

    <button type="button" id="forecast-refresh" class="btn btn-green btn-block forecast-refresh">
      <?= htmlspecialchars(t('forecast_refresh')) ?>
    </button>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
