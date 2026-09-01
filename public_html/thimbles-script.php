<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = t('thimbles_page_title') . ' | ' . SITE_NAME;
require __DIR__ . '/includes/header.php';
?>

<!-- Prediction card only, same as script.php -->
<section class="toolkit">
  <a class="btn back-btn" href="/games/thimbles.php">
    <?= icon_arrow_left() ?>
    <?= htmlspecialchars(t('back_label')) ?>
  </a>

  <div class="forecast" id="thimbles-card">
    <div class="forecast-body">
      <span class="spinner-ring forecast-spinner" aria-hidden="true"></span>

      <p class="forecast-label"><?= htmlspecialchars(t('forecast_next')) ?> &middot; <span id="thimbles-clock">--:--</span></p>

      <p class="forecast-figure" id="thimbles-figure">&mdash;</p>
      <p class="forecast-sub" id="thimbles-countdown">&nbsp;</p>

      <div class="forecast-rows" id="thimbles-rows"
           data-starts-in="<?= htmlspecialchars(t('forecast_starts_in')) ?>"
           data-running="<?= htmlspecialchars(t('forecast_running')) ?>"
           data-mode="<?= htmlspecialchars(t('thimbles_mode')) ?>"
           data-pick="<?= htmlspecialchars(t('thimbles_pick')) ?>"></div>
    </div>

    <button type="button" id="thimbles-refresh" class="btn btn-green btn-block forecast-refresh">
      <?= htmlspecialchars(t('forecast_refresh')) ?>
    </button>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
