<?php
require_once __DIR__ . '/includes/config.php';

$platforms = [
    'onexbet' => ['name' => '1xBet', 'logo' => '/assets/img/Logo_1xBet.png', 'url' => ONEXBET_WEBSITE_URL],
    'megapari'  => ['name' => 'MegaPari', 'logo' => '/assets/img/megapari-logo.png', 'url' => MEGAPARI_WEBSITE_URL],
];

$platform = $_GET['platform'] ?? 'onexbet';
if (!array_key_exists($platform, $platforms)) {
    $platform = 'onexbet';
}

// Which prediction card this flow ends on; unknown games fall back to crash.
$toolkits = ['crash' => '/script.php', 'apple' => '/apple-script.php'];
$toolkit = $toolkits[$_GET['game'] ?? 'crash'] ?? $toolkits['crash'];

$pageTitle = t('signup_heading') . ' | ' . SITE_NAME;
require __DIR__ . '/includes/header.php';
?>

<div class="signup-page">
  <h1 class="section-heading"><?= htmlspecialchars(t('signup_heading')) ?></h1>

  <div class="signup-platform-list">
    <?php foreach ($platforms as $slug => $data): ?>
      <a class="brand-pill brand-pill-wide<?= $slug === $platform ? ' active' : '' ?>" data-platform="<?= htmlspecialchars($slug) ?>" href="<?= htmlspecialchars($data['url']) ?>"<?= $data['url'] === '#' ? '' : ' target="_blank" rel="noopener"' ?>>
        <span class="lead-chevron">»</span>
        <span class="brand-pill-logo"><img src="<?= htmlspecialchars($data['logo']) ?>" alt="<?= htmlspecialchars($data['name']) ?>"></span>
      </a>
    <?php endforeach; ?>
  </div>

  <form class="signup-form" id="signup-form">
    <label for="account-id" class="visually-hidden"><?= htmlspecialchars(t('signup_id_label')) ?></label>
    <input type="text" id="account-id" class="field-input" placeholder="<?= htmlspecialchars(t('signup_id_label')) ?>" inputmode="numeric" pattern="[0-9]{8,10}" maxlength="10" autocomplete="off" aria-describedby="account-id-error" aria-invalid="false">
    <p id="account-id-error" class="field-error" hidden role="alert"><?= htmlspecialchars(t('id_invalid_error')) ?></p>

    <label for="server-select"><?= htmlspecialchars(t('signup_server_label')) ?></label>
    <select id="server-select" class="field-input">
      <option value="" selected disabled><?= htmlspecialchars(t('signup_server_placeholder')) ?></option>
      <option value="cm">🇨🇲 Cameroon</option>
      <option value="ng">🇳🇬 Nigeria</option>
      <option value="gh">🇬🇭 Ghana</option>
      <option value="ci">🇨🇮 Côte d'Ivoire</option>
      <option value="ke">🇰🇪 Kenya</option>
      <option value="ug">🇺🇬 Uganda</option>
      <option value="za">🇿🇦 South Africa</option>
      <option value="cd">🇨🇩 DR Congo</option>
      <option value="sn">🇸🇳 Senegal</option>
      <option value="zm">🇿🇲 Zambia</option>
      <option value="tz">🇹🇿 Tanzania</option>
      <option value="bj">🇧🇯 Benin</option>
      <option value="tg">🇹🇬 Togo</option>
      <option value="ml">🇲🇱 Mali</option>
      <option value="bf">🇧🇫 Burkina Faso</option>
      <option value="gn">🇬🇳 Guinea</option>
      <option value="ga">🇬🇦 Gabon</option>
      <option value="eg">🇪🇬 Egypt</option>
      <option value="ma">🇲🇦 Morocco</option>
      <option value="dz">🇩🇿 Algeria</option>
      <option value="in">🇮🇳 India</option>
      <option value="bd">🇧🇩 Bangladesh</option>
      <option value="pk">🇵🇰 Pakistan</option>
      <option value="np">🇳🇵 Nepal</option>
      <option value="lk">🇱🇰 Sri Lanka</option>
      <option value="other">🌍 Other</option>
    </select>

    <button type="button" id="signup-start-btn" class="btn btn-gradient btn-block" disabled data-toolkit="<?= htmlspecialchars($toolkit) ?>" data-href="<?= htmlspecialchars($platforms[$platform]['url']) ?>">
      <span class="btn-spinner" aria-hidden="true"></span><?= htmlspecialchars(t('signup_start')) ?>
    </button>

  </form>

</div>

<?php require __DIR__ . '/includes/script-server-modal.php'; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
