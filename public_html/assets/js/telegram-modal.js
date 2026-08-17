// Interstitial promoting the Telegram channel: shown once, 15s after any page
// loads, as long as the visitor hasn't already dismissed it on that page.
(() => {
  const dialog = document.getElementById('telegram-modal');
  if (!dialog) return;

  setTimeout(() => {
    if (!dialog.open) dialog.showModal();
  }, 15000);

  dialog.querySelectorAll('[data-modal-dismiss]').forEach((el) => {
    el.addEventListener('click', () => dialog.close());
  });

  document.getElementById('modal-join-btn').addEventListener('click', () => dialog.close());

  dialog.addEventListener('click', (e) => {
    const rect = dialog.getBoundingClientRect();
    const inside = e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom;
    if (!inside) dialog.close();
  });
})();
