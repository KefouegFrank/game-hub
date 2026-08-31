// Round forecast, laid out like the reference predictor: the next round's clock
// time, one big figure, three upcoming slots counting down, and a refresh.
//
// Rounds are pinned to a fixed 2-minute grid so the times line up with a real
// schedule, and each slot's figure is a draw from the true crash distribution
// (crash-math.js), keyed on the slot time so it stays put between ticks instead
// of flickering every second. Refresh re-rolls the seed, not the schedule.
//
// These are draws, not foreknowledge: a live round is only knowable once its
// server seed is revealed, which is what the verifier below the panel is for.
(() => {
  const M = window.CrashMath;
  const rowsEl = document.getElementById('forecast-rows');
  if (!M || !rowsEl) return;

  const cardEl = document.getElementById('forecast');
  const figureEl = document.getElementById('forecast-figure');
  const clockEl = document.getElementById('forecast-clock');
  const countdownEl = document.getElementById('forecast-countdown');
  const refreshBtn = document.getElementById('forecast-refresh');
  const refreshLabel = document.getElementById('forecast-refresh-label');

  const idleLabel = refreshLabel.textContent;
  const loadingLabel = refreshBtn.dataset.loadingLabel || idleLabel;
  const REDRAW_MS = 1100; // long enough for the spinner to register as work

  const startsInLabel = rowsEl.dataset.startsIn || 'Starts in';
  const runningLabel = rowsEl.dataset.running || 'Running now';

  const SLOT_MS = 120000; // rounds land on even minutes, as in the reference
  const LIVE_MS = 30000; // how long a slot counts as the round in progress
  const SLOT_COUNT = 3;

  const nf = new Intl.NumberFormat(document.documentElement.lang || 'en', {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2,
  });
  const fmt = (n) => nf.format(n) + '×';
  const pad = (n) => String(n).padStart(2, '0');
  const clock = (ms) => {
    const d = new Date(ms);
    return pad(d.getHours()) + ':' + pad(d.getMinutes());
  };

  // FNV-1a plus a final avalanche — enough spread for a display draw, and it
  // gives the same uniform for the same (seed, slot) on every tick.
  function uniform(key) {
    let h = 2166136261;
    for (let i = 0; i < key.length; i++) {
      h = Math.imul(h ^ key.charCodeAt(i), 16777619);
    }
    h = Math.imul(h ^ (h >>> 15), 2246822507);
    h = Math.imul(h ^ (h >>> 13), 3266489909);
    return ((h ^ (h >>> 16)) >>> 0) / 4294967296;
  }

  let seed = Math.random().toString(36).slice(2);
  let redrawing = false;
  let firstSlot = null;
  let rows = [];

  const draw = (slot) => M.crashFromUniform(uniform(seed + ':' + slot));

  // The round in play while it is still running, otherwise the one after it.
  function nextSlot(now) {
    const current = Math.floor(now / SLOT_MS) * SLOT_MS;
    return now < current + LIVE_MS ? current : current + SLOT_MS;
  }

  // Rows carry the bare countdown; only the headline restates what it counts to.
  function status(slot, now) {
    if (now >= slot) return runningLabel;
    const left = Math.round((slot - now) / 1000);
    return pad(Math.floor(left / 60)) + ':' + pad(left % 60);
  }

  function build(now) {
    rowsEl.innerHTML = '';
    rows = [];
    for (let i = 0; i < SLOT_COUNT; i++) {
      const slot = firstSlot + i * SLOT_MS;
      const row = document.createElement('div');
      row.className = 'forecast-row';
      row.innerHTML =
        `<span class="forecast-row-time">${clock(slot)}</span>` +
        '<span class="forecast-row-status"></span>' +
        `<span class="forecast-row-value">${fmt(draw(slot))}</span>`;
      rowsEl.appendChild(row);
      rows.push({ slot, statusEl: row.querySelector('.forecast-row-status') });
    }
    clockEl.textContent = clock(firstSlot);
    // The tail of the curve reaches four figures, which will not fit at full size.
    const headline = fmt(draw(firstSlot));
    figureEl.textContent = headline;
    figureEl.classList.toggle('forecast-figure-long', headline.length > 6);
    paint(now);
  }

  function paint(now) {
    rows.forEach((row) => {
      row.statusEl.textContent = status(row.slot, now);
    });
    countdownEl.textContent =
      now >= firstSlot ? runningLabel : startsInLabel + ' ' + status(firstSlot, now);
  }

  function tick() {
    if (redrawing) return;
    const now = Date.now();
    const slot = nextSlot(now);
    if (slot !== firstSlot) {
      firstSlot = slot;
      build(now);
    } else {
      paint(now);
    }
  }

  tick();
  setInterval(tick, 1000);

  // The draw itself is instant; the pause is what makes the spinner mean
  // anything, so the panel stays put and dimmed until the new numbers land.
  refreshBtn.addEventListener('click', () => {
    if (redrawing) return;
    redrawing = true;

    cardEl.classList.add('is-loading');
    refreshBtn.classList.add('is-loading');
    refreshBtn.disabled = true;
    refreshLabel.textContent = loadingLabel;

    setTimeout(() => {
      seed = Math.random().toString(36).slice(2);
      build(Date.now());

      cardEl.classList.remove('is-loading');
      refreshBtn.classList.remove('is-loading');
      refreshBtn.disabled = false;
      refreshLabel.textContent = idleLabel;
      redrawing = false;
    }, REDRAW_MS);
  });
})();
