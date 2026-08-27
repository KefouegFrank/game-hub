// "See a screenshot example" modal: the pill row crossfades between each
// platform's example image (real image if data-example-img is set, a
// placeholder + caption otherwise). The modal itself opens declaratively.
(() => {
  const dialog = document.getElementById('screenshot-example-modal');
  if (!dialog) return;

  const frame = dialog.querySelector('.example-modal-frame');
  const img = document.getElementById('example-modal-img');
  const placeholder = document.getElementById('example-modal-placeholder');
  const caption = document.getElementById('example-modal-caption');
  const pills = dialog.querySelectorAll('.example-pill');
  let pending = null;

  function apply(pill) {
    const src = pill.dataset.exampleImg;
    if (src) {
      img.src = src;
      img.alt = pill.dataset.caption || '';
      img.hidden = false;
      placeholder.hidden = true;
    } else {
      img.hidden = true;
      placeholder.hidden = false;
      caption.textContent = pill.dataset.caption || '';
    }
  }

  // Swaps on the fade-out's own transitionend so the timing lives in the CSS
  // only. A swap already in flight picks up the newest pill instead of stacking.
  function crossfade(pill) {
    pending = pill;
    if (frame.classList.contains('is-switching')) return;
    if (!parseFloat(getComputedStyle(frame).transitionDuration)) {
      apply(pending);
      return;
    }
    frame.addEventListener(
      'transitionend',
      () => {
        apply(pending);
        frame.classList.remove('is-switching');
      },
      { once: true },
    );
    frame.classList.add('is-switching');
  }

  pills.forEach((pill) => {
    pill.addEventListener('click', () => {
      if (pill.classList.contains('active')) return;
      pills.forEach((p) => p.classList.remove('active'));
      pill.classList.add('active');
      crossfade(pill);
    });
  });
})();
