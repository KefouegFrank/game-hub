<?php
require_once __DIR__ . '/includes/config.php';

// Which game this "how to play" guide is for — the screenshots and step 2
// caption differ per game; step 1 (finding "All Games") is the same for both.
$game = $_GET['game'] ?? 'crash';
if (!in_array($game, ['apple', 'crash'], true)) {
    $game = 'crash';
}
$gameName = t($game === 'apple' ? 'nav_apple' : 'nav_crash');
$guideHeading = sprintf(t('registration_guide_page_heading'), $gameName);

$pageTitle = $guideHeading . ' | ' . SITE_NAME;
$bodyClass = 'guide-page';
require __DIR__ . '/includes/header.php';
?>

<a class="btn back-btn" href="/">
  <?= icon_home() ?>
  <?= htmlspecialchars(t('guide_back_home')) ?>
</a>

<div class="guide-intro">
  <?= icon_logo_mark('guide-logo-mark', 'logoGradGuide', '2') ?>
  <h1 class="guide-heading"><?= htmlspecialchars($guideHeading) ?></h1>
</div>

<div class="guide-warning">
  <?= icon_warning() ?>
  <span><?= htmlspecialchars(t('guide_warning_text')) ?></span>
</div>

<?php
$guideSteps = [
    ['instruction' => t('guide_step_1'), 'image' => '/assets/img/how-to-play-1.png'],
    [
        'instruction' => sprintf(t('guide_step_2'), $gameName),
        'image' => '/assets/img/how-to-play-' . ($game === 'apple' ? '2' : '3') . '.png',
    ],
];
foreach ($guideSteps as $index => $step):
    $stepNumber = $index + 1;
    $stepInstruction = $step['instruction'];
    $stepImage = $step['image'];
    require __DIR__ . '/includes/guide-step.php';
endforeach;
?>

<?php require __DIR__ . '/includes/footer.php'; ?>
