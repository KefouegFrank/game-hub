// Platform buttons act as a selector: clicking one updates which affiliate
// link/video the game-media box above represents. First button is active by default.
(() => {
  const buttons = document.querySelectorAll('.platform-btn');
  const media = document.getElementById('game-media');
  const mediaVideo = document.getElementById('game-media-video');
  const continueBtn = document.getElementById('continue-btn');
  if (!buttons.length) return;

  function activate(btn) {
    buttons.forEach((b) => b.classList.remove('active'));
    btn.classList.add('active');
    if (media && mediaVideo && btn.dataset.media && mediaVideo.getAttribute('src') !== btn.dataset.media) {
      mediaVideo.pause();
      media.style.aspectRatio = '';
      mediaVideo.setAttribute('src', btn.dataset.media);
      mediaVideo.load();
    }
    if (continueBtn && btn.dataset.platform) {
      continueBtn.dataset.platform = btn.dataset.platform;
      continueBtn.href = '/signup.php?platform=' + encodeURIComponent(btn.dataset.platform);
    }
  }

  // Orientation comes from the clip itself rather than the button, so a portrait
  // capture behind a website link (or the reverse) still gets a frame that fits.
  if (media && mediaVideo) {
    mediaVideo.addEventListener('loadedmetadata', () => {
      if (media.hasAttribute('data-fixed-frame')) return;
      const width = mediaVideo.videoWidth;
      const height = mediaVideo.videoHeight;
      if (!width || !height) return;
      media.classList.toggle('game-media-portrait', height > width);
      media.classList.toggle('game-media-landscape', height <= width);
      media.style.aspectRatio = `${width} / ${height}`;
    });
  }

  buttons.forEach((btn) => {
    btn.addEventListener('click', () => activate(btn));
  });
})();
