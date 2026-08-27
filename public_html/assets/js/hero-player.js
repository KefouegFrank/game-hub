// Hero clip sits behind a poster overlay until someone asks for it — autoplaying
// a video under the headline is the thing visitors complain about.
(() => {
  const player = document.getElementById('hero-player');
  const video = document.getElementById('hero-video');
  if (!player || !video) return;

  const overlay = player.querySelector('.hero-player-overlay');

  overlay.addEventListener('click', () => {
    player.classList.add('is-playing');
    video.controls = true;
    video.play();
  });

  video.addEventListener('ended', () => {
    player.classList.remove('is-playing');
    video.controls = false;
  });
})();
