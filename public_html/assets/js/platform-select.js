// Platform buttons act as a selector: clicking one updates which affiliate
// link/media the game-media box above represents. First button is active by default.
(() => {
  const buttons = document.querySelectorAll('.platform-btn');
  const mediaLink = document.getElementById('game-media-link');
  const mediaImg = document.getElementById('game-media-img');
  const continueBtn = document.getElementById('continue-btn');
  if (!buttons.length || !mediaLink) return;

  function activate(btn) {
    buttons.forEach((b) => b.classList.remove('active'));
    btn.classList.add('active');
    mediaLink.href = btn.dataset.href;
    if (mediaImg && btn.dataset.media) {
      mediaImg.src = btn.dataset.media;
    }
    if (continueBtn) {
      continueBtn.href = btn.dataset.href;
      if (btn.dataset.platform) {
        continueBtn.dataset.platform = btn.dataset.platform;
      }
    }
  }

  buttons.forEach((btn) => {
    btn.addEventListener('click', () => activate(btn));
  });
})();
