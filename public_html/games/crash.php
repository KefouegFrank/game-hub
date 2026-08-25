<?php
require_once __DIR__ . '/../includes/config.php';
$pageTitle = 'Crash — how it works | ' . SITE_NAME;
require __DIR__ . '/../includes/header.php';
?>

<?php
$gameMediaWebsite = '/assets/img/crash.jpg';
$gameMediaAlt = 'Crash gameplay screenshot';
require __DIR__ . '/../includes/game-media.php';
require __DIR__ . '/../includes/brand-buttons.php';
require __DIR__ . '/../includes/code-reveal-step.php';
require __DIR__ . '/../includes/registration-guide-cta.php';
require __DIR__ . '/../includes/registration-check-modal.php';
?>

<article class="game-page">
  <h1>Crash: how the game actually works</h1>

  <p>Crash is a rising-multiplier game: once a round starts, a multiplier climbs from 1.00x and keeps climbing until it "crashes" at a random point. You can cash out at any moment to lock in whatever multiplier you're at — wait too long and the crash wipes out the round before you do.</p>

  <h2>How a round works</h2>
  <ul>
    <li>You set your stake before the round starts.</li>
    <li>The multiplier climbs from 1.00x for as long as the round runs.</li>
    <li>You choose when to cash out — the longer you wait, the higher the multiplier, but the closer you get to the round crashing.</li>
    <li>If the round crashes before you cash out, the stake for that round is lost.</li>
  </ul>

  <h2>Volatility and risk</h2>
  <p>Each round's crash point is generated independently by the game's RNG, so past rounds have no bearing on the next one. There's no pattern, signal, or software that can predict when a round will crash — any claim otherwise is false. Treat higher multipliers as higher-risk, higher-reward, not as something you can time or game.</p>
</article>

<?php require __DIR__ . '/../includes/game-carousel.php'; ?>

<?php require __DIR__ . '/../includes/footer.php'; ?>
