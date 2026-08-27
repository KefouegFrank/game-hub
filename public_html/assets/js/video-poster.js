// Videos sit behind a poster overlay until someone asks for them — autoplaying
// under a headline is the thing visitors complain about. Any container marked
// data-video-poster gets this behaviour.
(() => {
  document.querySelectorAll('[data-video-poster]').forEach((player) => {
    const video = player.querySelector('video');
    const overlay = player.querySelector('.video-poster-overlay');
    if (!video || !overlay) return;

    overlay.addEventListener('click', () => {
      player.classList.add('is-playing');
      video.controls = true;
      video.play();
    });

    function reset() {
      player.classList.remove('is-playing');
      video.controls = false;
    }

    video.addEventListener('ended', reset);
    // Switching brand reloads the source, which should hand back the poster.
    video.addEventListener('emptied', reset);
  });
})();
