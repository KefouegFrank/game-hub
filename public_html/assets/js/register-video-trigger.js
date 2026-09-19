// The "how to register" button doesn't navigate — it plays the walkthrough
// video sitting above it in the same .platform-select block. Works whether
// that video has a poster overlay (crash.php) or plain native controls
// (Apple of Fortune): with a poster, reuse its own reveal logic so the two
// controls end up in sync; without one, just start playback directly.
(() => {
  document.querySelectorAll('[data-play-video]').forEach((btn) => {
    const media = btn.closest('.platform-select')?.previousElementSibling;
    const video = media?.querySelector('video');
    if (!video) return;

    btn.addEventListener('click', () => {
      const overlay = media.querySelector('.video-poster-overlay');
      if (overlay) {
        overlay.click();
      } else {
        video.controls = true;
        video.play();
      }
      video.scrollIntoView({ behavior: 'smooth', block: 'center' });
    });
  });
})();
