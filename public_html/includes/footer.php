</main>

<dialog id="telegram-modal" class="modal-box" aria-labelledby="telegram-modal-title">
  <button type="button" class="modal-close" data-modal-dismiss aria-label="<?= htmlspecialchars(t('close_label')) ?>">&times;</button>
  <h3 id="telegram-modal-title"><?= htmlspecialchars(t('modal_title')) ?></h3>
  <p><?= htmlspecialchars(t('modal_body')) ?></p>
  <a class="btn btn-cta btn-telegram btn-block" id="modal-join-btn" href="<?= htmlspecialchars(TELEGRAM_URL) ?>" target="_blank" rel="noopener">
    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <path d="M4 12.4 19 5.5c.7-.3 1.4.3 1.1 1.1l-2.6 12.7c-.2.9-1.2 1.3-1.9.8l-3.9-2.9-2 1.9c-.3.3-.7.3-.9-.1l-.6-3.4" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
      <path d="m8.2 14.1 9-6.9-10.4 7 1.4 4.6" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
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
<script src="/assets/js/telegram-modal.js?v=<?= filemtime(__DIR__ . '/../assets/js/telegram-modal.js') ?>"></script>
<script src="/assets/js/platform-select.js?v=<?= filemtime(__DIR__ . '/../assets/js/platform-select.js') ?>"></script>
<script src="/assets/js/promo-copy.js?v=<?= filemtime(__DIR__ . '/../assets/js/promo-copy.js') ?>"></script>
<script src="/assets/js/registration-check.js?v=<?= filemtime(__DIR__ . '/../assets/js/registration-check.js') ?>"></script>
<script src="/assets/js/signup-form.js?v=<?= filemtime(__DIR__ . '/../assets/js/signup-form.js') ?>"></script>
<script src="/assets/js/script.js?v=<?= filemtime(__DIR__ . '/../assets/js/script.js') ?>"></script>
</body>
</html>
