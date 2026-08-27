</main>

<dialog id="telegram-modal" class="modal-box" closedby="any" aria-labelledby="telegram-modal-title" aria-describedby="telegram-modal-body">
  <button type="button" class="modal-close" data-modal-close aria-label="<?= htmlspecialchars(t('close_label')) ?>">&times;</button>
  <h3 id="telegram-modal-title"><?= htmlspecialchars(t('modal_title')) ?></h3>
  <p id="telegram-modal-body"><?= htmlspecialchars(t('modal_body')) ?></p>
  <a class="btn btn-cta btn-telegram btn-block" id="modal-join-btn" autofocus href="<?= htmlspecialchars(TELEGRAM_URL) ?>" target="_blank" rel="noopener">
    <?= icon_telegram() ?>
    <span><?= htmlspecialchars(t('telegram_cta')) ?></span>
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
<script src="/assets/js/telegram-modal.js?v=<?= filemtime(__DIR__ . '/../assets/js/telegram-modal.js') ?>"></script>
<script src="/assets/js/hero-player.js?v=<?= filemtime(__DIR__ . '/../assets/js/hero-player.js') ?>"></script>
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
