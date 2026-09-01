<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = t('registration_guide_page_heading') . ' | ' . SITE_NAME;
$bodyClass = 'guide-page';
require __DIR__ . '/includes/header.php';
?>

<a class="btn back-btn" href="/">
  <?= icon_home() ?>
  <?= htmlspecialchars(t('guide_back_home')) ?>
</a>

<div class="guide-intro">
  <?= icon_logo_mark('guide-logo-mark', 'logoGradGuide', '2') ?>
  <h1 class="guide-heading"><?= htmlspecialchars(t('registration_guide_page_heading')) ?></h1>
</div>

<div class="guide-warning">
  <?= icon_warning() ?>
  <span><?= htmlspecialchars(t('guide_warning_text')) ?></span>
</div>

<?php
$guideSteps = [
    t('guide_step_1'),
    t('guide_step_2'),
    t('guide_step_3'),
];
foreach ($guideSteps as $index => $stepInstruction):
    $stepNumber = $index + 1;
    $stepImage = null;
    require __DIR__ . '/includes/guide-step.php';
endforeach;
?>

<?php require __DIR__ . '/includes/footer.php'; ?>
