// Thimbles prediction card. Same card, schedule and refresh as the other two
// (forecast-slots.js); the body is the next three rounds, each with the picked
// thimble lit. Fixed to 1-ball mode — the single pick is the whole game, and its
// payout (2.88×, see thimbles-math.js) is the headline.
(() => {
  const T = window.ThimblesMath;
  const S = window.ForecastSlots;
  const rowsEl = document.getElementById('thimbles-rows');
  if (!T || !S || !rowsEl) return;

  const cardEl = document.getElementById('thimbles-card');
  const figureEl = document.getElementById('thimbles-figure');
  const clockEl = document.getElementById('thimbles-clock');
  const countdownEl = document.getElementById('thimbles-countdown');
  const refreshBtn = document.getElementById('thimbles-refresh');

  const startsInLabel = rowsEl.dataset.startsIn || 'Starts in';
  const runningLabel = rowsEl.dataset.running || 'Running now';
  const modeLabel = rowsEl.dataset.mode || '1 ball';
  const pickLabel = rowsEl.dataset.pick || 'Thimble';

  const BALLS = 1;
  const SLOT_COUNT = 3;

  const fmt = S.formatter();

  let seed = S.newSeed();
  let firstSlot = null;
  let rows = [];

  const pickFor = (slot) => Math.floor(S.uniform(seed + ':' + slot) * T.THIMBLES);
  const status = (slot, now) => (now >= slot ? runningLabel : S.countdown(slot, now));

  function build(now) {
    rowsEl.innerHTML = '';
    rows = [];

    for (let i = 0; i < SLOT_COUNT; i++) {
      const slot = firstSlot + i * S.SLOT_MS;
      const pick = pickFor(slot);
      const cells = Array.from(
        { length: T.THIMBLES },
        (_, c) => `<span class="pick-cell${c === pick ? ' is-pick' : ''}"></span>`,
      ).join('');

      const row = document.createElement('div');
      row.className = 'forecast-row thimbles-row';
      row.innerHTML =
        `<span class="forecast-row-time">${S.clock(slot)}</span>` +
        `<span class="pick-cells" aria-label="${pickLabel} ${pick + 1}/${T.THIMBLES}">${cells}</span>` +
        '<span class="forecast-row-status"></span>';
      rowsEl.appendChild(row);
      rows.push({ slot, statusEl: row.querySelector('.forecast-row-status') });
    }

    clockEl.textContent = S.clock(firstSlot);
    figureEl.textContent = fmt(T.coefficient(BALLS));
    paint(now);
  }

  function paint(now) {
    rows.forEach((row) => {
      row.statusEl.textContent = status(row.slot, now);
    });
    const when =
      now >= firstSlot ? runningLabel : startsInLabel + ' ' + S.countdown(firstSlot, now);
    countdownEl.textContent = `${modeLabel} · ${when}`;
  }

  const isBusy = S.bindRefresh(cardEl, refreshBtn, () => {
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
