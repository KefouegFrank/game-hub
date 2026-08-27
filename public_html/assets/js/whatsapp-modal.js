// WhatsApp channel interstitial: opens after 15s of visible time, then stays
// away for a week. Joining suppresses it for a year — they're already in.
(() => {
  const dialog = document.getElementById('whatsapp-modal');
  if (!dialog) return;

  Modal.autoShow(dialog, { delay: 15000, key: 'whatsapp', days: 7 });

  const joinBtn = document.getElementById('modal-join-btn');
  if (joinBtn) {
    joinBtn.addEventListener('click', () => {
      Modal.suppress('whatsapp', 365);
      dialog.close();
    });
  }
})();
