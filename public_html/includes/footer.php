</main>

<dialog id="whatsapp-modal" class="modal-box" closedby="any" aria-labelledby="whatsapp-modal-title" aria-describedby="whatsapp-modal-body">
  <button type="button" class="modal-close" data-modal-close aria-label="<?= htmlspecialchars(t('close_label')) ?>">&times;</button>
  <h3 id="whatsapp-modal-title"><?= htmlspecialchars(t('modal_title')) ?></h3>
  <p id="whatsapp-modal-body"><?= htmlspecialchars(t('modal_body')) ?></p>
  <a class="btn btn-cta btn-whatsapp btn-block" id="modal-join-btn" autofocus href="<?= htmlspecialchars(WHATSAPP_URL) ?>" target="_blank" rel="noopener">
    <?= icon_whatsapp() ?>
    <span><?= htmlspecialchars(t('whatsapp_cta')) ?></span>
  </a>
  <button type="button" class="btn btn-block modal-dismiss-btn" data-modal-close><?= htmlspecialchars(t('close_label')) ?></button>
</dialog>

<footer class="site-footer">
  <div class="container">
    <p>&copy; <?= date('Y') ?> <?= htmlspecialchars(SITE_NAME) ?>. All rights reserved.</p>
    <!-- <p class="fine-print"><?= htmlspecialchars(t('footer_note')) ?></p> -->
  </div>
</footer>

<script src="/assets/js/particles.js?v=<?= filemtime(__DIR__ . '/../assets/js/particles.js') ?>"></script>
<script src="/assets/js/modal.js?v=<?= filemtime(__DIR__ . '/../assets/js/modal.js') ?>"></script>
<script src="/assets/js/whatsapp-modal.js?v=<?= filemtime(__DIR__ . '/../assets/js/whatsapp-modal.js') ?>"></script>
<script src="/assets/js/video-poster.js?v=<?= filemtime(__DIR__ . '/../assets/js/video-poster.js') ?>"></script>
<script src="/assets/js/platform-select.js?v=<?= filemtime(__DIR__ . '/../assets/js/platform-select.js') ?>"></script>
<script src="/assets/js/promo-copy.js?v=<?= filemtime(__DIR__ . '/../assets/js/promo-copy.js') ?>"></script>
<script src="/assets/js/registration-check.js?v=<?= filemtime(__DIR__ . '/../assets/js/registration-check.js') ?>"></script>
<script src="/assets/js/reveal-code.js?v=<?= filemtime(__DIR__ . '/../assets/js/reveal-code.js') ?>"></script>
<script src="/assets/js/screenshot-example-modal.js?v=<?= filemtime(__DIR__ . '/../assets/js/screenshot-example-modal.js') ?>"></script>
<script src="/assets/js/numeric-input.js?v=<?= filemtime(__DIR__ . '/../assets/js/numeric-input.js') ?>"></script>
<script src="/assets/js/proof-upload.js?v=<?= filemtime(__DIR__ . '/../assets/js/proof-upload.js') ?>"></script>
<script src="/assets/js/signup-form.js?v=<?= filemtime(__DIR__ . '/../assets/js/signup-form.js') ?>"></script>
<script src="/assets/js/forecast-slots.js?v=<?= filemtime(__DIR__ . '/../assets/js/forecast-slots.js') ?>"></script>
<script src="/assets/js/crash-math.js?v=<?= filemtime(__DIR__ . '/../assets/js/crash-math.js') ?>"></script>
<script src="/assets/js/crash-forecast.js?v=<?= filemtime(__DIR__ . '/../assets/js/crash-forecast.js') ?>"></script>
<script src="/assets/js/apple-math.js?v=<?= filemtime(__DIR__ . '/../assets/js/apple-math.js') ?>"></script>
<script src="/assets/js/apple-forecast.js?v=<?= filemtime(__DIR__ . '/../assets/js/apple-forecast.js') ?>"></script>
<script src="/assets/js/script.js?v=<?= filemtime(__DIR__ . '/../assets/js/script.js') ?>"></script>
</body>
</html>
