</main>

<dialog id="telegram-modal" class="modal-box" aria-labelledby="telegram-modal-title">
  <button type="button" class="modal-close" data-modal-dismiss aria-label="<?= htmlspecialchars(t('close_label')) ?>">&times;</button>
  <h3 id="telegram-modal-title"><?= htmlspecialchars(t('modal_title')) ?></h3>
  <p><?= htmlspecialchars(t('modal_body')) ?></p>
  <a class="btn btn-cta btn-telegram btn-block" id="modal-join-btn" href="<?= htmlspecialchars(TELEGRAM_URL) ?>" target="_blank" rel="noopener">
    <?= icon_telegram() ?>
    <span><?= htmlspecialchars(t('telegram_cta')) ?></span>
  </a>
  <button type="button" class="btn btn-block modal-dismiss-btn" data-modal-dismiss><?= htmlspecialchars(t('close_label')) ?></button>
</dialog>

<footer class="site-footer">
  <div class="container">
    <p>&copy; <?= date('Y') ?> <?= htmlspecialchars(SITE_NAME) ?>. All rights reserved.</p>
    <!-- <p class="fine-print"><?= htmlspecialchars(t('footer_note')) ?></p> -->
  </div>
</footer>

<script src="/assets/js/particles.js?v=<?= filemtime(__DIR__ . '/../assets/js/particles.js') ?>"></script>
<script src="/assets/js/dialog-utils.js?v=<?= filemtime(__DIR__ . '/../assets/js/dialog-utils.js') ?>"></script>
<script src="/assets/js/telegram-modal.js?v=<?= filemtime(__DIR__ . '/../assets/js/telegram-modal.js') ?>"></script>
<script src="/assets/js/platform-select.js?v=<?= filemtime(__DIR__ . '/../assets/js/platform-select.js') ?>"></script>
<script src="/assets/js/promo-copy.js?v=<?= filemtime(__DIR__ . '/../assets/js/promo-copy.js') ?>"></script>
<script src="/assets/js/registration-check.js?v=<?= filemtime(__DIR__ . '/../assets/js/registration-check.js') ?>"></script>
<script src="/assets/js/reveal-code.js?v=<?= filemtime(__DIR__ . '/../assets/js/reveal-code.js') ?>"></script>
<script src="/assets/js/screenshot-example-modal.js?v=<?= filemtime(__DIR__ . '/../assets/js/screenshot-example-modal.js') ?>"></script>
<script src="/assets/js/proof-upload.js?v=<?= filemtime(__DIR__ . '/../assets/js/proof-upload.js') ?>"></script>
<script src="/assets/js/signup-form.js?v=<?= filemtime(__DIR__ . '/../assets/js/signup-form.js') ?>"></script>
<script src="/assets/js/script.js?v=<?= filemtime(__DIR__ . '/../assets/js/script.js') ?>"></script>
</body>
</html>
