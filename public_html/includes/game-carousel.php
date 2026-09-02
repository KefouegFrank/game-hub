<?php
// Reusable "try more games" carousel — included on each game page.
// Cards link straight out to the affiliate platform (target=_blank), not to our own pages.
$carouselGames = [
    ['name' => '', 'img' => '/assets/img/crash.jpg'],
    ['name' => '', 'img' => '/assets/img/apple-of-fortune.jpeg'],
];
$carouselHref = ONEXBET_WEBSITE_URL;
?>
<div class="carousel-box">
  <h2 class="carousel-heading"><?= htmlspecialchars(t('try_more_games')) ?></h2>
  <div class="carousel-viewport">
    <div class="carousel-track">
      <?php for ($rep = 0; $rep < 2; $rep++): ?>
        <?php foreach ($carouselGames as $game): ?>
          <a class="game-card carousel-card" href="<?= htmlspecialchars($carouselHref) ?>"<?= $carouselHref === '#' ? '' : ' target="_blank" rel="noopener"' ?>>
            <div class="game-card-thumb"><img src="<?= htmlspecialchars($game['img']) ?>" alt="<?= htmlspecialchars($game['name']) ?>" loading="lazy"></div>
            <div class="game-card-body">
              <h3 class="game-card-title"><?= htmlspecialchars($game['name']) ?></h3>
              <span class="btn btn-gradient btn-block"><?= htmlspecialchars(t('play_label')) ?></span>
            </div>
          </a>
        <?php endforeach; ?>
      <?php endfor; ?>
    </div>
  </div>
</div>
