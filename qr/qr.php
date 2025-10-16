<?php
// contact-qr.php — Página completa con validación de payload para QR a partir de text.php

// 1) Carga de variables base (NO modificar text.php)
include __DIR__ . '/text.php';

// 2) Helpers seguros (no toques text.php)
if (!function_exists('h')) {
  function h($s)
  {
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
  }
}
function is_valid_url($url)
{
  if (!is_string($url) || $url === '') return false;
  if (!filter_var($url, FILTER_VALIDATE_URL)) return false;
  $sch = parse_url($url, PHP_URL_SCHEME);
  return in_array(strtolower($sch), ['http', 'https'], true);
}
function is_valid_domain($domain)
{
  if (!is_string($domain) || $domain === '') return false;
  $domain = preg_replace('#^https?://#i', '', $domain);
  if (!preg_match('/^[a-z0-9.-]+\.[a-z]{2,}$/i', $domain)) return false;
  if (preg_match('/(^[.-])|([.-]$)/', $domain)) return false;
  return true;
}
function normalize_phone_to_e164($raw)
{
  $tmp = preg_replace('/[^0-9+]/', '', (string)$raw);
  if ($tmp === '') return null;
  if ($tmp[0] !== '+') $tmp = '+1' . $tmp; // Ajusta prefijo si tu base no es US
  return preg_match('/^\+[1-9]\d{7,14}$/', $tmp) ? $tmp : null;
}
function is_valid_email($mail)
{
  return is_string($mail) && $mail !== '' && filter_var($mail, FILTER_VALIDATE_EMAIL);
}

// 3) Derivados seguros desde text.php (sin reescribirlo)
$Company    = $Company    ?? 'Company';
$Domain     = $Domain     ?? '';
$Phone      = $Phone      ?? '';
$PhoneRef   = $PhoneRef   ?? '';
$Mail       = $Mail       ?? '';
$MailRef    = $MailRef    ?? '';
$google     = $google     ?? '';
$facebook   = $facebook   ?? '';
$instagram  = $instagram  ?? '';
$nextdoor   = $nextdoor   ?? '';
$thumbtack  = $thumbtack  ?? '';
$Address    = $Address    ?? '';
$GoogleMap  = $GoogleMap  ?? '';
$Services   = $Services   ?? '';
$SN         = isset($SN) && is_array($SN) ? $SN : [];
$logo       = $logo       ?? ''; // si lo defines en text.php

// 4) Construye lista de servicios (prioriza $SN[1..n], si no, usa $Services)
$service_titles = [];
if ($SN) {
  $keys = array_keys($SN);
  $allNum = true;
  foreach ($keys as $k) {
    if (!is_numeric($k)) {
      $allNum = false;
      break;
    }
  }
  $allNum ? sort($keys, SORT_NUMERIC) : sort($keys);
  foreach ($keys as $k) {
    $t = trim((string)($SN[$k] ?? ''));
    if ($t !== '') $service_titles[] = $t;
  }
} elseif ($Services !== '') {
  $parts = array_filter(array_map('trim', explode(',', $Services)));
  $service_titles = $parts ?: [$Services];
}

// 5) URL del sitio a partir de Domain
$site_url = null;
if ($Domain && is_valid_domain($Domain)) {
  $domain_clean = preg_replace('#^https?://#i', '', $Domain);
  $site_url = 'https://' . $domain_clean;
}

// 6) Social grid (solo las que existan)
$grid_socials = [];
if ($facebook)  $grid_socials[] = ['label' => 'Facebook', 'url' => $facebook, 'fa' => 'fab fa-facebook-f', 'color' => '#1877F2'];
if ($instagram) $grid_socials[] = ['label' => 'Instagram', 'url' => $instagram, 'fa' => 'fab fa-instagram', 'color' => '#E1306C'];
if ($thumbtack) $grid_socials[] = ['label' => 'Thumbtack', 'url' => $thumbtack, 'fa' => 'fas fa-thumbtack', 'color' => '#222'];
if ($nextdoor)  $grid_socials[] = ['label' => 'Nextdoor', 'url' => $nextdoor, 'fa' => 'fas fa-house', 'color' => '#2E8B57'];
if ($google)    $grid_socials[] = ['label' => 'Google Maps', 'url' => $google, 'fa' => 'fas fa-map-marker-alt', 'color' => '#34A853'];
if ($site_url)  $grid_socials[] = ['label' => 'Website', 'url' => $site_url, 'fa' => 'fas fa-globe', 'color' => '#0f172a'];
if ($MailRef)   $grid_socials[] = ['label' => 'Email', 'url' => $MailRef, 'fa' => 'fas fa-envelope', 'color' => '#D44638'];

// 7) Logo (candidatos locales)
$logo_candidates = [];
if ($logo) $logo_candidates[] = $logo;
$logo_candidates[] = 'assets/images/logo-2.png';
$logo_candidates[] = 'assets/images/logo-2.png';
$logo_path = null;
foreach ($logo_candidates as $c) {
  $full = __DIR__ . '/' . $c;
  if (is_file($full)) {
    $logo_path = $c;
    break;
  }
}

// 8) --- VALIDACIÓN Y SELECCIÓN DEL CONTENIDO PARA EL QR ---
$qr_candidates = [];

// (1) google
if ($google && is_valid_url($google)) {
  $qr_candidates[] = ['label' => 'Google', 'payload' => $google];
}
// (2) domain => https
if ($site_url) {
  $qr_candidates[] = ['label' => 'Website', 'payload' => $site_url];
}
// (3) phone -> tel:+E164
$e164 = null;
if ($Phone) {
  $e164 = normalize_phone_to_e164($Phone);
} elseif ($PhoneRef && stripos($PhoneRef, 'tel:') === 0) {
  $e164 = normalize_phone_to_e164(substr($PhoneRef, 4));
}
if ($e164) {
  $qr_candidates[] = ['label' => 'Phone', 'payload' => 'tel:' . $e164];
}
// (4) email -> mailto:
if ($Mail && is_valid_email($Mail)) {
  $qr_candidates[] = ['label' => 'Email', 'payload' => 'mailto:' . $Mail];
} elseif ($MailRef && stripos($MailRef, 'mailto:') === 0 && is_valid_email(substr($MailRef, 7))) {
  $qr_candidates[] = ['label' => 'Email', 'payload' => $MailRef];
}

// Selección final
$QR_CONTENT = null;
$QR_LABEL = null;
$QR_ERROR = null;
foreach ($qr_candidates as $c) {
  $p = $c['payload'];
  if (stripos($p, 'http://') === 0 || stripos($p, 'https://') === 0) {
    if (is_valid_url($p)) {
      $QR_CONTENT = $p;
      $QR_LABEL = $c['label'];
      break;
    }
  } elseif (stripos($p, 'tel:') === 0) {
    $num = substr($p, 4);
    if ($num && preg_match('/^\+[1-9]\d{7,14}$/', $num)) {
      $QR_CONTENT = $p;
      $QR_LABEL = $c['label'];
      break;
    }
  } elseif (stripos($p, 'mailto:') === 0) {
    $em = substr($p, 7);
    if (is_valid_email($em)) {
      $QR_CONTENT = $p;
      $QR_LABEL = $c['label'];
      break;
    }
  }
}
if (!$QR_CONTENT) {
  $QR_ERROR = 'No hay datos válidos para QR en text.php (google/domain/phone/email).';
}

// 9) Validación segura del Google Map embebido
$MAP_OK = true;
if ($GoogleMap) {
  $MAP_OK = (bool)preg_match('#<iframe[^>]+src="https://www\.google\.com/maps/embed\?[^"]+"#i', $GoogleMap);
}
?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title><?= h($Company) ?> — Contact</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    :root {
      --bg: linear-gradient(180deg, #eefaf4, #f7fbfb);
      --card-bg: rgba(255, 255, 255, 0.96);
      --muted: #556b66;
      --accent: #1f5b2f;
      --shadow-soft: 0 12px 30px rgba(6, 18, 12, 0.06);
      --shadow-strong: 0 18px 48px rgba(6, 18, 12, 0.08);
      --radius: 16px;
      --maxw: 1360px;
      --panel-base: 320px;
    }

    * {
      box-sizing: border-box
    }

    html,
    body {
      height: 100%;
      margin: 0;
      font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, Arial;
      background: var(--bg);
      color: #073a30
    }

    a {
      color: inherit;
      text-decoration: none
    }

    .container {
      max-width: var(--maxw);
      margin: 28px auto;
      padding: 20px;
      display: flex;
      gap: 32px;
      align-items: flex-start
    }

    .panel {
      width: calc(var(--panel-base) + 1.4vw);
      min-width: 260px;
      max-width: 420px;
      background: var(--card-bg);
      border-radius: calc(var(--radius) + 8px);
      padding: 22px;
      box-shadow: var(--shadow-strong);
      border: 1px solid rgba(0, 0, 0, 0.04);
      display: flex;
      flex-direction: column;
      align-items: stretch;
      gap: 14px;
      flex-shrink: 0;
    }

    .company-name {
      font-weight: 900;
      color: var(--accent);
      font-size: 20px;
      margin: 0;
      padding: 2px 4px;
      text-align: left;
      letter-spacing: 0.2px
    }

    .logo {
      width: 260px;
      max-width: 100%;
      height: auto;
      object-fit: contain;
      background: #fff;
      padding: 10px;
      border-radius: 10px;
      box-shadow: 0 10px 22px rgba(0, 0, 0, 0.05);
      margin: 8px 0 6px 0;
      align-self: flex-start;
    }

    .services-list {
      background: rgba(255, 255, 255, 0.95);
      border-radius: 12px;
      padding: 12px 14px;
      border: 1px solid rgba(0, 0, 0, 0.04);
      box-shadow: 0 10px 22px rgba(0, 0, 0, 0.03);
    }

    .services-list ul {
      margin: 0;
      padding-left: 20px;
      color: #0b3a30;
      font-size: 15px;
      line-height: 1.5;
    }

    .services-list li {
      margin: 8px 0
    }

    .icon-row {
      display: flex;
      flex-wrap: nowrap;
      gap: 12px;
      align-items: center;
      justify-content: flex-start;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      padding: 8px 0 4px 0;
      margin-top: 4px;
    }

    .icon-row::-webkit-scrollbar {
      height: 8px;
    }

    .icon-row::-webkit-scrollbar-thumb {
      background: rgba(0, 0, 0, 0.06);
      border-radius: 8px;
    }

    .icon-btn {
      flex: 0 0 auto;
      width: 46px;
      height: 46px;
      border-radius: 10px;
      background: #fff;
      border: 1px solid rgba(0, 0, 0, 0.04);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 8px 18px rgba(6, 18, 12, 0.04);
      text-decoration: none;
      color: inherit;
      font-size: 18px;
    }

    .cta {
      display: block;
      margin-top: 10px;
      padding: 14px 16px;
      border-radius: 14px;
      background: linear-gradient(90deg, var(--accent), #63b86a);
      color: #fff;
      font-weight: 900;
      text-align: center;
      text-decoration: none;
      box-shadow: 0 18px 40px rgba(31, 91, 47, 0.16);
      font-size: 16px;
    }

    .main {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 20px
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 18px
    }

    .card {
      background: var(--card-bg);
      border-radius: 14px;
      padding: 16px;
      min-height: 100px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 10px;
      text-decoration: none;
      color: #073a30;
      border: 1px solid rgba(0, 0, 0, 0.03);
      box-shadow: 0 10px 30px rgba(6, 18, 12, 0.04);
      transition: transform .12s ease
    }

    .card:hover,
    .card:focus {
      transform: translateY(-6px);
      box-shadow: 0 24px 48px rgba(6, 18, 12, 0.08);
      outline: none
    }

    .icon {
      width: 62px;
      height: 62px;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 28px;
      background: #fff;
      box-shadow: 0 8px 18px rgba(0, 0, 0, 0.04)
    }

    .label {
      font-size: 14px;
      color: #0b3a30
    }

    .map-wrap {
      margin-top: 10px;
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 12px 36px rgba(6, 18, 12, 0.04);
      height: 550px;
      /* antes era “auto” con height en iframe */
      width: 100%;
    }

    .map-wrap iframe {
      width: 100%;
      height: 100%;
      border: 0;
    }

    .qr {
      display: flex;
      align-items: center;
      gap: 14px;
      background: #fff;
      border: 1px solid rgba(0, 0, 0, 0.05);
      border-radius: 12px;
      padding: 12px;
      box-shadow: 0 10px 24px rgba(0, 0, 0, 0.04);
    }

    .qr img {
      width: 164px;
      height: 164px;
      object-fit: contain;
      border-radius: 8px;
      display: block
    }

    .qr .meta {
      display: flex;
      flex-direction: column;
      gap: 6px;
      font-size: 14px;
      color: #0b3a30
    }

    .alert {
      padding: 10px 12px;
      border-radius: 10px;
      background: #fff3cd;
      border: 1px solid #ffe69c;
      color: #664d03
    }

    @media (max-width:1200px) {
      :root {
        --panel-base: 300px;
      }

      .grid {
        grid-template-columns: repeat(3, 1fr)
      }
    }

    @media (max-width:900px) {
      :root {
        --panel-base: 260px;
      }

      .container {
        padding: 16px;
        gap: 18px
      }

      .panel {
        padding: 16px
      }

      .logo {
        width: 200px
      }

      .services-list ul {
        font-size: 14px
      }

      .grid {
        grid-template-columns: repeat(2, 1fr)
      }
    }

    @media (max-width:720px) {
      .container {
        flex-direction: column;
        padding: 12px;
        margin: 12px
      }

      .panel {
        width: 100%;
        max-width: none;
        min-width: 0;
        padding: 14px;
        order: 0
      }

      .main {
        order: 1
      }

      .logo {
        width: 160px;
        margin: 8px auto
      }

      .grid {
        grid-template-columns: repeat(2, 1fr)
      }

      .qr {
        flex-direction: column;
        align-items: flex-start
      }
    }
  </style>
</head>

<body>
  <div class="container" role="main" aria-label="Contacto <?= h($Company) ?>">
    <!-- LEFT: Perfil y acciones -->
    <aside class="panel" aria-labelledby="companyTitle">
      <div id="companyTitle" class="company-name"><?= h($Company) ?></div>

      <?php if ($logo_path): ?>
        <img src="<?= h($logo_path) ?>" alt="<?= h($Company) ?> logo" class="logo" />
      <?php else: ?>
        <div class="logo" aria-hidden="true" style="display:flex;align-items:center;justify-content:center;color:var(--muted);font-weight:800">LOGO</div>
      <?php endif; ?>

      <div class="services-list" aria-label="Servicios">
        <ul>
          <?php if ($service_titles): foreach ($service_titles as $t): ?>
              <li><strong><?= h($t) ?></strong></li>
            <?php endforeach;
          else: ?>
            <li><strong><?= h($Services ?: 'Services') ?></strong></li>
          <?php endif; ?>
        </ul>
      </div>

      <nav class="icon-row" aria-label="Contactos rápidos">
        <?php if ($PhoneRef): ?>
          <a class="icon-btn" href="<?= h($PhoneRef) ?>" title="Llamar" aria-label="Llamar"><i class="fas fa-phone" aria-hidden="true"></i></a>
        <?php endif; ?>
        <?php if ($MailRef): ?>
          <a class="icon-btn" href="<?= h($MailRef) ?>" title="Email" aria-label="Email"><i class="fas fa-envelope" aria-hidden="true"></i></a>
        <?php endif; ?>
        <?php if ($facebook): ?>
          <a class="icon-btn" href="<?= h($facebook) ?>" target="_blank" rel="noopener" title="Facebook" aria-label="Facebook" style="color:#1877F2"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
        <?php endif; ?>
        <?php if ($instagram): ?>
          <a class="icon-btn" href="<?= h($instagram) ?>" target="_blank" rel="noopener" title="Instagram" aria-label="Instagram" style="color:#E1306C"><i class="fab fa-instagram" aria-hidden="true"></i></a>
        <?php endif; ?>
      </nav>

      <?php if ($site_url): ?>
        <a class="cta" href="<?= h($site_url) ?>" target="_blank" rel="noopener">Contact</a>
      <?php endif; ?>

      <!-- Bloque QR (validado) -->

    </aside>

    <!-- RIGHT: Redes y mapa -->
    <main class="main" role="region" aria-label="Enlaces y mapa">
      <div class="grid" role="navigation" aria-label="Redes y enlaces">
        <?php foreach ($grid_socials as $s): ?>
          <a class="card" href="<?= h($s['url']) ?>" target="_blank" rel="noopener" aria-label="<?= h($s['label']) ?>">
            <div class="icon" style="color:<?= h($s['color'] ?? '#000') ?>"><i class="<?= h($s['fa']) ?>" aria-hidden="true"></i></div>
            <div class="label"><?= h($s['label']) ?></div>
          </a>
        <?php endforeach; ?>
      </div>

      <div class="map-wrap" aria-label="Mapa">
        <?php if ($GoogleMap && $MAP_OK): ?>
          <?= $GoogleMap ?>
        <?php else: ?>
          <iframe
            src="https://www.google.com/maps?q=<?= urlencode($Address) ?>&output=embed"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        <?php endif; ?>
      </div>

    </main>
  </div>
</body>

</html>