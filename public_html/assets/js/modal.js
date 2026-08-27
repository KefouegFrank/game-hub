// Shared <dialog> plumbing: declarative open/close triggers, backdrop dismissal,
// and a storage-backed frequency cap for dialogs that open on their own.
// Loaded before every script that uses it — see includes/footer.php.
(() => {
  const STORE_PREFIX = 'modal-seen:';

  function suppressedUntil(key) {
    try {
      return Number(localStorage.getItem(STORE_PREFIX + key)) > Date.now();
    } catch {
      return false; // private mode / storage disabled — treat as never shown
    }
  }

  function suppress(key, days) {
    try {
      localStorage.setItem(STORE_PREFIX + key, String(Date.now() + days * 86400000));
    } catch {
      /* nothing we can do, the visitor just sees it again next visit */
    }
  }

  // Refuses to stack: a second modal over a first buries whatever the visitor
  // was answering. Returns false so timed callers can retry later.
  function open(target) {
    const dialog = typeof target === 'string' ? document.querySelector(target) : target;
    if (!dialog || dialog.open || document.querySelector('dialog[open]')) return false;
    dialog.showModal();
    return true;
  }

  // Opens after `delay` ms of *visible* time, then stays away for `days`.
  function autoShow(dialog, { delay, key, days }) {
    if (!dialog || suppressedUntil(key)) return;
    let timer = null;

    function stop() {
      clearTimeout(timer);
      timer = null;
    }

    function start() {
      if (timer || document.visibilityState !== 'visible') return;
      timer = setTimeout(() => {
        timer = null;
        if (open(dialog)) suppress(key, days);
        else start(); // another dialog had the screen; come back around
      }, delay);
    }

    document.addEventListener('visibilitychange', () => {
      if (document.visibilityState === 'visible') start();
      else stop();
    });
    start();
  }

  document.addEventListener('click', (e) => {
    const opener = e.target.closest('[data-modal-open]');
    if (opener) {
      open(opener.dataset.modalOpen);
      return;
    }
    const closer = e.target.closest('[data-modal-close]');
    if (closer) closer.closest('dialog')?.close(closer.dataset.modalClose || '');
  });

  // Only a backdrop click has the dialog itself as its target. Pairing it with
  // pointerdown keeps a selection drag that ends outside the box from closing it,
  // and keeps keyboard-fired clicks (which report x/y 0,0) out of it entirely.
  let pressedBackdrop = false;

  document.addEventListener('pointerdown', (e) => {
    pressedBackdrop = e.target instanceof HTMLDialogElement;
  });

  document.addEventListener('click', (e) => {
    const onBackdrop = pressedBackdrop && e.target instanceof HTMLDialogElement;
    pressedBackdrop = false;
    // Browsers with closedby support already did this; close() twice is a no-op.
    if (onBackdrop && e.target.getAttribute('closedby') !== 'closerequest') e.target.close();
  });

  window.Modal = { open, autoShow, suppress };
})();
