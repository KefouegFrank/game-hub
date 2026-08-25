<?php
require_once __DIR__ . '/../includes/config.php';
$pageTitle = 'Apple of Fortune — how it works | ' . SITE_NAME;
require __DIR__ . '/../includes/header.php';
?>

<?php
$gameMediaWebsite = '/assets/img/apple-of-fortune.jpeg';
$gameMediaApp = '/assets/img/apple-of-fortune2.jpeg';
$gameMediaAlt = 'Apple of Fortune gameplay screenshot';
require __DIR__ . '/../includes/game-media.php';
require __DIR__ . '/../includes/platform-buttons.php';
require __DIR__ . '/../includes/pre-play-callout.php';
?>

<div class="callout-box callout-box-alt">
  <p>⚠️ <?= htmlspecialchars(t('ready_to_play')) ?></p>
</div>

<?php
require __DIR__ . '/../includes/signup-rows.php';
require __DIR__ . '/../includes/registration-check-modal.php';
?>

<article class="game-page">
  <h1>Apple of Fortune: how it works</h1>

  <p>Apple of Fortune is a pick-and-reveal game: each round you choose apples from a tree one at a time. Every safe pick raises your multiplier; picking a bad apple ends the round. You can cash out after any safe pick and lock in whatever multiplier you've reached so far.</p>

  <h2>How a round works</h2>
  <ul>
    <li>You set your stake before the round starts.</li>
    <li>Each apple you reveal is either safe (multiplier goes up) or ends the round.</li>
    <li>You choose when to cash out — the longer you keep going, the higher the multiplier, but the risk of hitting a bad apple grows too.</li>
    <li>If a round ends before you cash out, the stake for that round is lost.</li>
  </ul>

  <h2>Volatility and risk</h2>
  <p>Every pick is generated independently by the game's RNG, so past rounds have no bearing on the next one. There's no pattern, sequence, or software that can predict a safe pick — any claim otherwise is false. Treat the higher multipliers as higher-risk, higher-reward, not as something you can time or game.</p>
</article>


<?php require __DIR__ . '/../includes/game-carousel.php'; ?>

<?php require __DIR__ . '/../includes/footer.php'; ?>
