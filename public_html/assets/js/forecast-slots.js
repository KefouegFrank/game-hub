// Shared plumbing for the prediction cards (crash, apple of fortune): the round
// schedule, the seeded draw, and the refresh button's loading state. The cards
// differ in what they draw, not in how a round is timed.
(() => {
  const SLOT_MS = 120000; // rounds land on even minutes, as in the reference
  const LIVE_MS = 30000; // how long a slot counts as the round in progress
  const REDRAW_MS = 1100; // long enough for the spinner to register as work

  const pad = (n) => String(n).padStart(2, '0');

  function clock(ms) {
    const d = new Date(ms);
    return pad(d.getHours()) + ':' + pad(d.getMinutes());
  }

  // The round in play while it is still running, otherwise the one after it.
  function nextSlot(now) {
    const current = Math.floor(now / SLOT_MS) * SLOT_MS;
    return now < current + LIVE_MS ? current : current + SLOT_MS;
  }

  function countdown(slot, now) {
    const left = Math.max(0, Math.round((slot - now) / 1000));
    return pad(Math.floor(left / 60)) + ':' + pad(left % 60);
  }

  // FNV-1a plus a final avalanche — enough spread for a display draw, and it
  // gives the same uniform for the same key on every tick.
  function uniform(key) {
    let h = 2166136261;
    for (let i = 0; i < key.length; i++) {
      h = Math.imul(h ^ key.charCodeAt(i), 16777619);
    }
    h = Math.imul(h ^ (h >>> 15), 2246822507);
    h = Math.imul(h ^ (h >>> 13), 3266489909);
    return ((h ^ (h >>> 16)) >>> 0) / 4294967296;
  }

  const newSeed = () => Math.random().toString(36).slice(2);

  function formatter(digits = 2) {
    // -nu-latn keeps Arabic on Latin digits, which is what betting figures use;
    // the locale still decides the decimal mark (1,98 in fr/es, 1.98 in en).
    const nf = new Intl.NumberFormat((document.documentElement.lang || 'en') + '-u-nu-latn', {
      minimumFractionDigits: digits,
      maximumFractionDigits: digits,
    });
    return (n) => nf.format(n) + '×';
  }

  // The draw itself is instant; the pause is what makes the spinner mean
  // anything. Only the card body goes under the spinner — the button keeps its
  // label and stays put, it just ignores clicks until the numbers land.
  function bindRefresh(card, btn, redraw) {
    let busy = false;

    btn.addEventListener('click', () => {
      if (busy) return;
      busy = true;
      card.classList.add('is-loading');

      setTimeout(() => {
        redraw();
        card.classList.remove('is-loading');
        busy = false;
      }, REDRAW_MS);
    });

    return () => busy;
  }

  window.ForecastSlots = {
    SLOT_MS,
    clock,
    nextSlot,
    countdown,
    uniform,
    newSeed,
    formatter,
    bindRefresh,
  };
})();
