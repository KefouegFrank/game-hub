// Wires [data-modal-dismiss] elements and an outside-click to close, for any
// <dialog>. Shared by telegram-modal.js, registration-check.js, and
// screenshot-example-modal.js so the close behavior isn't pasted three times.
function initDialogDismiss(dialog) {
  if (!dialog) return;

  dialog.querySelectorAll('[data-modal-dismiss]').forEach((el) => {
    el.addEventListener('click', () => dialog.close());
  });

  dialog.addEventListener('click', (e) => {
    const rect = dialog.getBoundingClientRect();
    const inside = e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom;
    if (!inside) dialog.close();
  });
}
