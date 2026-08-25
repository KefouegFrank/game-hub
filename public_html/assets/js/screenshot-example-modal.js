// "See a screenshot example" modal: pill row crossfades between each
// platform's example image (real image if data-example-img is set, a
// placeholder + caption otherwise).
(() => {
  const openBtn = document.getElementById('example-modal-open-btn');
  const dialog = document.getElementById('screenshot-example-modal');
  if (!openBtn || !dialog) return;

  openBtn.addEventListener('click', () => dialog.showModal());
  initDialogDismiss(dialog);

  const img = document.getElementById('example-modal-img');
  const placeholder = document.getElementById('example-modal-placeholder');
  const caption = document.getElementById('example-modal-caption');
  const pills = dialog.querySelectorAll('.example-pill');

  pills.forEach((pill) => {
    pill.addEventListener('click', () => {
      if (pill.classList.contains('active')) return;
      pills.forEach((p) => p.classList.remove('active'));
      pill.classList.add('active');

      const frame = dialog.querySelector('.example-modal-frame');
      frame.classList.add('is-switching');
      setTimeout(() => {
        const src = pill.dataset.exampleImg;
        if (src) {
          img.src = src;
          img.hidden = false;
          placeholder.hidden = true;
        } else {
          img.hidden = true;
          placeholder.hidden = false;
          caption.textContent = pill.dataset.caption || '';
        }
        frame.classList.remove('is-switching');
      }, 150);
    });
  });
})();
