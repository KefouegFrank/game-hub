// Apple of Fortune prediction card, read the way the game board reads: level 1 at
// the bottom, level 10 at the top, cells covered until they are opened.
//
// The card lays out a route — the cell to pick on each level up to the suggested
// stop. Those levels open bottom-up on a stagger, the way a round reveals itself;
// the stop level is the one to play next, and everything above it stays covered.
// Schedule, seeded draw and the refresh loading state come from forecast-slots.js.
(() => {
  const A = window.AppleMath;
  const S = window.ForecastSlots;
  const rowsEl = document.getElementById('apple-rows');
  if (!A || !S || !rowsEl) return;

  const cardEl = document.getElementById('apple-card');
  const clockEl = document.getElementById('apple-clock');
  const countdownEl = document.getElementById('apple-countdown');
  const refreshBtn = document.getElementById('apple-refresh');

  const startsInLabel = rowsEl.dataset.startsIn || 'Starts in';
  const runningLabel = rowsEl.dataset.running || 'Running now';
  const levelLabel = rowsEl.dataset.level || 'Level';
  const cellLabel = rowsEl.dataset.cell || 'Cell';

  // Levels 8-10 are a coin-toss dressed up as a jackpot, so the suggested stop
  // stays in the range a player can actually reach: 3 through 7.
  const STOP_MIN = 3;
  const STOP_MAX = 7;
  const REVEAL_STEP_MS = 110; // gap between one level opening and the next

  const APPLE =
    '<svg viewBox="0 0 24 24" aria-hidden="true">' +
    '<path d="M12 7.4C10.3 5.7 7.9 5.4 6.3 6.7 4 8.4 3.6 11.9 5.1 15.3c1 2.3 2.5 4 3.9 4 .8 0 1.4-.4 3-.4s2.2.4 3 .4c1.4 0 2.9-1.7 3.9-4 1.5-3.4 1.1-6.9-1.2-8.6-1.6-1.3-4-1-5.7.7Z" fill="#d92d3a"/>' +
    '<path d="M12.6 7.2c-.2-2 1-3.8 3-4.4.3 2.2-.9 4-3 4.4Z" fill="#43c463"/>' +
    '<path d="M12 7.4V4.9" stroke="#7c4a2d" stroke-width="1.3" stroke-linecap="round"/>' +
    '</svg>';

  const fmt = (n) => 'x' + n.toFixed(2);

  let seed = S.newSeed();
  let firstSlot = null;

  const pickFor = (slot, level) =>
    Math.floor(S.uniform(`${seed}:${slot}:${level}`) * A.CELLS);

  const stopFor = (slot) =>
    STOP_MIN + Math.floor(S.uniform(seed + ':' + slot + ':stop') * (STOP_MAX - STOP_MIN + 1));

  function build(now) {
    const stop = stopFor(firstSlot);
    rowsEl.innerHTML = '';

    // Top of the card is level 10; the route below it opens from level 1 up.
    A.table
      .slice()
      .reverse()
      .forEach((row) => {
        const onRoute = row.level <= stop;
        const pick = pickFor(firstSlot, row.level);

        let cells = '';
        for (let i = 0; i < A.CELLS; i++) {
          const open = onRoute && i === pick;
          const cls =
            'pick-cell' + (open ? ' is-open' : '') + (onRoute && !open ? ' is-spent' : '');
          cells += `<span class="${cls}">${open ? APPLE : ''}</span>`;
        }

        const el = document.createElement('div');
        el.className =
          'apple-row' + (row.level === stop ? ' is-target' : onRoute ? ' is-cleared' : '');
        el.innerHTML =
          `<span class="apple-coef">${fmt(row.coefficient)}</span>` +
          `<span class="pick-cells" aria-label="${levelLabel} ${row.level}${onRoute ? ` — ${cellLabel} ${pick + 1}` : ''}">${cells}</span>`;

        // Bottom row first, so the route unrolls upwards like a played round.
        const opened = el.querySelector('.is-open');
        if (opened) opened.style.animationDelay = (row.level - 1) * REVEAL_STEP_MS + 'ms';
        rowsEl.appendChild(el);
      });

    clockEl.textContent = S.clock(firstSlot);
    cardEl.dataset.stop = String(stop);
    paint(now);
  }

  function paint(now) {
    const when =
      now >= firstSlot ? runningLabel : startsInLabel + ' ' + S.countdown(firstSlot, now);
    countdownEl.textContent = `${levelLabel} ${cardEl.dataset.stop} · ${when}`;
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
