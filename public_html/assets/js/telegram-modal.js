// Interstitial promoting the Telegram channel: shown once, 15s after any page
// loads, as long as the visitor hasn't already dismissed it on that page.
(() => {
  const dialog = document.getElementById('telegram-modal');
  if (!dialog) return;

  setTimeout(() => {
    if (!dialog.open) dialog.showModal();
  }, 15000);

  initDialogDismiss(dialog);
  document.getElementById('modal-join-btn').addEventListener('click', () => dialog.close());
})();
