// Telegram interstitial: opens after 15s of visible time, then stays away for a
// week. Joining suppresses it for a year — they're already in the channel.
(() => {
  const dialog = document.getElementById('telegram-modal');
  if (!dialog) return;

  Modal.autoShow(dialog, { delay: 15000, key: 'telegram', days: 7 });

  const joinBtn = document.getElementById('modal-join-btn');
  if (joinBtn) {
    joinBtn.addEventListener('click', () => {
      Modal.suppress('telegram', 365);
      dialog.close();
    });
  }
})();
