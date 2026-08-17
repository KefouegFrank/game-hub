// Constellation-style background: drifting dots, lines drawn between nearby ones.
// Plain canvas, no library — keeps the "no build step" stack.
(() => {
  const canvas = document.getElementById('particles-bg');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');

  const COLORS = ['#22d3ee', '#d946ef', '#7c6cff', '#34d399'];
  const LINK_DISTANCE = 130;
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  let width, height, particles;

  function particleCount() {
    return Math.min(90, Math.round((width * height) / 16000));
  }

  function makeParticles() {
    const count = particleCount();
    particles = Array.from({ length: count }, () => ({
      x: Math.random() * width,
      y: Math.random() * height,
      vx: (Math.random() - 0.5) * 0.25,
      vy: (Math.random() - 0.5) * 0.25,
      r: Math.random() * 1.6 + 0.6,
      color: COLORS[Math.floor(Math.random() * COLORS.length)],
    }));
  }

  function resize() {
    width = canvas.width = window.innerWidth;
    height = canvas.height = window.innerHeight;
    makeParticles();
  }

  function step() {
    ctx.clearRect(0, 0, width, height);

    for (const p of particles) {
      if (!reduceMotion) {
        p.x += p.vx;
        p.y += p.vy;
        if (p.x < 0) p.x = width;
        if (p.x > width) p.x = 0;
        if (p.y < 0) p.y = height;
        if (p.y > height) p.y = 0;
      }
      ctx.beginPath();
      ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
      ctx.fillStyle = p.color;
      ctx.fill();
    }

    for (let i = 0; i < particles.length; i++) {
      for (let j = i + 1; j < particles.length; j++) {
        const a = particles[i], b = particles[j];
        const dist = Math.hypot(a.x - b.x, a.y - b.y);
        if (dist < LINK_DISTANCE) {
          ctx.strokeStyle = `rgba(124, 108, 255, ${0.15 * (1 - dist / LINK_DISTANCE)})`;
          ctx.lineWidth = 1;
          ctx.beginPath();
          ctx.moveTo(a.x, a.y);
          ctx.lineTo(b.x, b.y);
          ctx.stroke();
        }
      }
    }

    if (!reduceMotion) requestAnimationFrame(step);
  }

  let resizeTimer;
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(resize, 150);
  });

  resize();
  step();
})();
