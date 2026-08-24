<?php
require_once __DIR__ . '/includes/config.php';

$platforms = [
    'onexbet' => ['name' => '1xBet', 'logo' => '/assets/img/Logo_1xBet.png', 'url' => ONEXBET_WEBSITE_URL],
    'melbet'  => ['name' => 'Melbet', 'logo' => '/assets/img/mailbet-logo.png', 'url' => MELBET_WEBSITE_URL],
];

$platform = $_GET['platform'] ?? 'onexbet';
if (!array_key_exists($platform, $platforms)) {
    $platform = 'onexbet';
}

$pageTitle = t('signup_heading') . ' | ' . SITE_NAME;
require __DIR__ . '/includes/header.php';
?>

<div class="signup-page">
  <h1 class="section-heading"><?= htmlspecialchars(t('signup_heading')) ?></h1>

  <div class="signup-platform-list">
    <?php foreach ($platforms as $slug => $data): ?>
      <a class="brand-pill brand-pill-wide<?= $slug === $platform ? ' active' : '' ?>" data-platform="<?= htmlspecialchars($slug) ?>" href="<?= htmlspecialchars($data['url']) ?>"<?= $data['url'] === '#' ? '' : ' target="_blank" rel="noopener"' ?>>
        <img src="<?= htmlspecialchars($data['logo']) ?>" alt="<?= htmlspecialchars($data['name']) ?>">
        <span class="chevron">›</span>
      </a>
    <?php endforeach; ?>
  </div>

  <form class="signup-form" onsubmit="return false;">
    <label for="account-id" class="visually-hidden"><?= htmlspecialchars(t('signup_id_label')) ?></label>
    <input type="text" id="account-id" class="field-input" placeholder="<?= htmlspecialchars(t('signup_id_label')) ?>">

    <label for="server-select"><?= htmlspecialchars(t('signup_server_label')) ?></label>
    <select id="server-select" class="field-input">
      <option value="cm">🇨🇲 Cameroon</option>
      <option value="ng">🇳🇬 Nigeria</option>
      <option value="gh">🇬🇭 Ghana</option>
      <option value="ci">🇨🇮 Côte d'Ivoire</option>
      <option value="other">🌍 Other</option>
    </select>

    <button type="button" id="signup-start-btn" class="btn btn-gradient btn-block" disabled data-href="<?= htmlspecialchars($platforms[$platform]['url']) ?>"><?= htmlspecialchars(t('signup_start')) ?></button>
  </form>

  <p class="fine-print signup-privacy-note"><?= htmlspecialchars(t('signup_privacy_note')) ?></p>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
