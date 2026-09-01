// Crash prediction card, laid out like the reference predictor: the next round's
// clock time, one big figure, three upcoming slots counting down, and a refresh.
//
// The schedule, the seeded draw and the loading state come from forecast-slots.js
// (shared with the apple of fortune card); the figures come from the true crash
// distribution in crash-math.js, keyed on the slot time so they stay put between
// ticks instead of flickering every second. Refresh re-rolls the seed.
(() => {
  const M = window.CrashMath;
  const S = window.ForecastSlots;
  const rowsEl = document.getElementById('forecast-rows');
  if (!M || !S || !rowsEl) return;

  const cardEl = document.getElementById('forecast');
  const figureEl = document.getElementById('forecast-figure');
  const clockEl = document.getElementById('forecast-clock');
  const countdownEl = document.getElementById('forecast-countdown');
  const refreshBtn = document.getElementById('forecast-refresh');
  const refreshLabel = document.getElementById('forecast-refresh-label');

  const startsInLabel = rowsEl.dataset.startsIn || 'Starts in';
  const runningLabel = rowsEl.dataset.running || 'Running now';
  const SLOT_COUNT = 3;

  const fmt = S.formatter();

  let seed = S.newSeed();
  let firstSlot = null;
  let rows = [];

  const draw = (slot) => M.crashFromUniform(S.uniform(seed + ':' + slot));

  // Rows carry the bare countdown; only the headline restates what it counts to.
  const status = (slot, now) => (now >= slot ? runningLabel : S.countdown(slot, now));

  function build(now) {
    rowsEl.innerHTML = '';
    rows = [];
    for (let i = 0; i < SLOT_COUNT; i++) {
      const slot = firstSlot + i * S.SLOT_MS;
      const row = document.createElement('div');
      row.className = 'forecast-row';
      row.innerHTML =
        `<span class="forecast-row-time">${S.clock(slot)}</span>` +
        '<span class="forecast-row-status"></span>' +
        `<span class="forecast-row-value">${fmt(draw(slot))}</span>`;
      rowsEl.appendChild(row);
      rows.push({ slot, statusEl: row.querySelector('.forecast-row-status') });
    }
    clockEl.textContent = S.clock(firstSlot);
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
      now >= firstSlot ? runningLabel : startsInLabel + ' ' + S.countdown(firstSlot, now);
  }

  const isBusy = S.bindRefresh(cardEl, refreshBtn, refreshLabel, () => {
    seed = S.newSeed();
    build(Date.now());
  });

  function tick() {
    if (isBusy()) return;
    const now = Date.now();
    const slot = S.nextSlot(now);
    if (slot !== firstSlot) {
      firstSlot = slot;
      build(now);
    } else {
      paint(now);
    }
  }

  tick();
  setInterval(tick, 1000);
})();
