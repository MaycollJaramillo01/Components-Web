<?php
require_once('parts/header/header-5.php');

/* ========= i18n (usa LANG de text.php) ========= */
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
$lang = defined('LANG') ? LANG : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en');

$T = ($lang==='es') ? [
  // Page
  'page_title' => 'Involúcrate / Voluntariado y Donaciones',

  // Tabs
  'tab_donate' => 'Donar',
  'tab_vol'    => 'Voluntariado',

  // Donate intro
  'don_h1'     => 'Tu donación convierte la esperanza en acción',
  'don_p1'     => 'Cada donación nos permite llevar <strong>medicinas, útiles escolares, mejoras de vivienda y apoyo</strong> a niños y familias en Honduras. Puedes apoyar con un aporte único o mensual. Si deseas servir con tu tiempo, cambia a la pestaña <strong>Voluntariado</strong>.',
  'don_li1'    => 'Transparencia y propósito claro en cada proyecto',
  'don_li2'    => 'Impacto directo en comunidades rurales',
  'don_li3'    => 'Recibo por correo y seguimiento de proyectos',
  'don_box_h3' => 'Donar con PayPal',
  'don_custom' => 'Personalizado',
  'don_type_one' => 'Única',
  'don_type_mon' => 'Mensual',
  'don_currency' => 'Moneda',
  'don_btn'    => 'Donar con PayPal',
  'don_help'   => 'Tu donación se procesa de forma segura en PayPal. Si tienes problemas, escríbenos a',
  'don_choose' => 'Elige un monto, por favor.',

  // Volunteer intro
  'vol_h2'     => 'Involúcrate',
  'vol_p1'     => 'Haz posible la esperanza siendo voluntario con <strong>%s</strong>. Tu tiempo y habilidades apoyan directamente a niños y familias en Honduras.',
  'vol_li1'    => 'Empaca y entrega insumos médicos y escolares',
  'vol_li2'    => 'Apoya clínicas comunitarias y viajes misioneros',
  'vol_li3'    => 'Ayuda en logística, eventos, recaudación y medios',
  'vol_li4'    => 'Horarios flexibles — participa una vez o de forma recurrente',

  // Volunteer form
  'vol_form_h3'   => 'Formulario de Voluntariado',
  'vol_form_p'    => 'Completa este formulario general y nuestro equipo te contactará con los siguientes pasos.',
  'first_name'    => 'Nombre *',
  'last_name'     => 'Apellido *',
  'email'         => 'Correo',
  'email_ph'      => 'nombre@ejemplo.com',
  'phone'         => 'Teléfono',
  'phone_ph'      => '(555) 555-5555',
  'city'          => 'Ciudad',
  'state'         => 'Estado',
  'pref_contact'  => 'Medio de contacto preferido *',
  'opt_call'      => 'Llamada',
  'opt_text'      => 'Texto',
  'opt_email'     => 'Correo',
  'why'           => '¿Por qué te interesa ser voluntario? *',
  'avail'         => '¿Cuál es tu disponibilidad?',
  'avail_ph'      => 'p. ej., Entre semana después de 5pm, sábados, una vez al mes…',
  'which_prog'    => '¿Qué programas te interesan?',
  'commit'        => 'Nivel de compromiso *',
  'opt_one'       => 'Una vez',
  'opt_1_3'       => '1–3 meses',
  'opt_3_6'       => '3–6 meses',
  'opt_6p'        => '6+ meses',
  'newsletter'    => 'Boletín',
  'newsletter_lbl'=> 'Suscribirme al boletín',
  'submit_vol'    => 'Enviar solicitud',

  // Alerts (server)
  'ok_thanks'     => '¡Gracias! Recibimos tu solicitud de voluntariado. Te contactaremos pronto.',
  'ok_honey'      => '¡Gracias! Nos pondremos en contacto.',
  'err_csrf'      => 'Sesión del formulario inválida. Recarga la página.',
  'err_rate'      => 'Espera un momento antes de enviar otra solicitud.',
  'err_first'     => 'Ingresa tu nombre.',
  'err_last'      => 'Ingresa tu apellido.',
  'err_contact'   => 'Proporciona al menos un medio de contacto (correo o teléfono).',
  'err_email'     => 'Correo inválido.',
  'err_phone'     => 'El número telefónico parece demasiado corto.',
  'err_pref'      => 'Selecciona al menos un medio de contacto preferido.',
  'err_why'       => 'Cuéntanos por qué deseas ser voluntario (al menos 10 caracteres).',
  'err_commit'    => 'Elige al menos un nivel de compromiso.',

  // Quick cards
  'card_email'    => 'Correo',
  'card_location' => 'Ubicación',
] : [
  'page_title' => 'Get Involved / Volunteer & Donate',
  'tab_donate' => 'Donate',
  'tab_vol'    => 'Volunteer',
  'don_h1'     => 'Your gift turns hope into action',
  'don_p1'     => 'Every gift brings <strong>medicine, school supplies, housing repairs and infrastructure support </strong> to children and families in Honduras. You can give a one-time or monthly donation. If you want to serve with your time, switch to the <strong>Volunteer</strong> tab.',
  'don_li1'    => 'Transparency and clear purpose for every project',
  'don_li2'    => 'Direct impact in rural communities',
  'don_li3'    => 'Email receipt and project follow-up',
  'don_box_h3' => 'Donate with PayPal',
  'don_custom' => 'Custom',
  'don_type_one' => 'One-time',
  'don_type_mon' => 'Monthly',
  'don_currency' => 'Currency',
  'don_btn'    => 'Donate with PayPal',
  'don_help'   => 'Your donation is processed securely on PayPal. If you have issues, write to',
  'don_choose' => 'Please choose an amount.',

  'vol_h2'     => 'Get Involved',
  'vol_p1'     => 'Bring hope to life by volunteering with <strong>%s</strong>. Your time and skills directly support children and families in Honduras.',
  'vol_li1'    => 'Pack and deliver medical & school supplies',
  'vol_li2'    => 'Support community clinics and mission trips',
  'vol_li3'    => 'Help with logistics, events, fundraising, and media',
  'vol_li4'    => 'Flexible schedules — serve once or on a recurring basis',

  'vol_form_h3'   => 'Volunteer Inquiry Form',
  'vol_form_p'    => 'Fill out this general form and our team will follow up with next steps.',
  'first_name'    => 'First Name *',
  'last_name'     => 'Last Name *',
  'email'         => 'Email',
  'email_ph'      => 'name@example.com',
  'phone'         => 'Phone',
  'phone_ph'      => '(555) 555-5555',
  'city'          => 'City',
  'state'         => 'State',
  'pref_contact'  => 'Preferred Contact Method *',
  'opt_call'      => 'Phone Call',
  'opt_text'      => 'Text',
  'opt_email'     => 'Email',
  'why'           => 'Why are you interested in volunteering? *',
  'avail'         => 'What is your availability?',
  'avail_ph'      => 'e.g., Weekdays after 5pm, Saturdays, once per month…',
  'which_prog'    => 'Which specific volunteer programs interest you?',
  'commit'        => 'What is your commitment level? *',
  'opt_one'       => 'One-time',
  'opt_1_3'       => '1–3 months',
  'opt_3_6'       => '3–6 months',
  'opt_6p'        => '6+ months',
  'newsletter'    => 'Newsletter',
  'newsletter_lbl'=> 'Subscribe to our newsletter',
  'submit_vol'    => 'Submit Inquiry',

  'ok_thanks'     => 'Thanks! Your volunteer inquiry has been received. We’ll contact you soon.',
  'ok_honey'      => 'Thanks! We’ll be in touch soon.',
  'err_csrf'      => 'Invalid form session. Please reload the page.',
  'err_rate'      => 'Please wait a moment before sending another inquiry.',
  'err_first'     => 'Please enter your first name.',
  'err_last'      => 'Please enter your last name.',
  'err_contact'   => 'Provide at least one contact method (email or phone).',
  'err_email'     => 'Invalid email address.',
  'err_phone'     => 'Phone number seems too short.',
  'err_pref'      => 'Select at least one preferred contact method.',
  'err_why'       => 'Tell us why you want to volunteer (at least 10 characters).',
  'err_commit'    => 'Choose at least one commitment level.',

  'card_email'    => 'Email',
  'card_location' => 'Location',
];

/* ========= Page title traducible ========= */
$page_title = $T['page_title'];
include(__DIR__ . '/parts/sections/page-title.php');

/* =========================
   Server-side setup
========================= */
$DATA_DIR  = __DIR__ . '/data';
$DATA_FILE = $DATA_DIR . '/volunteers.txt';   // .txt, JSON por línea
if (!is_dir($DATA_DIR)) { @mkdir($DATA_DIR, 0755, true); @chmod($DATA_DIR, 0755); }
if (!file_exists($DATA_FILE)) { @touch($DATA_FILE); }

if (empty($_SESSION['csrf_vol'])) { $_SESSION['csrf_vol'] = bin2hex(random_bytes(16)); }
$csrf_token = $_SESSION['csrf_vol'] ?? '';

function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
function only_digits($s){ return preg_replace('/\D+/', '', (string)$s); }

/* ====== PayPal Config ====== */
$PAYPAL_BUSINESS = isset($PaypalBusiness) && $PaypalBusiness ? $PaypalBusiness : 'your-paypal@email.com';
$CURRENCY        = 'USD';

/* ====== Donation Links (nuevos) ====== */
$DONATION_LINKS = [
  'paypal_hosted' => 'https://www.paypal.com/donate/?hosted_button_id=TEUF47MCEXKJU&source=qr',
  'cashapp'       => 'https://cash.app/$AngMision',
  'venmo'         => '' // pendiente
];

/* =========================
   Programs (from $SN + extras)
========================= */
$programOptions = [];
if (!empty($SN)) { foreach ($SN as $nm) { $programOptions[] = $nm; } }
$programOptions = array_values(array_unique(array_merge($programOptions, [
  "Event Support", "Fundraising", "Media & Communications", "Logistics / Transport", "Administration"
])));

/* =========================
   Handle Volunteer POST
========================= */
$ok_msg = null;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['_kind'] ?? '') === 'volunteer') {
  if (!hash_equals($csrf_token, $_POST['_csrf'] ?? '')) {
    $errors[] = $T['err_csrf'];
  }
  if (isset($_SESSION['last_volunteer']) && (time() - (int)$_SESSION['last_volunteer'] < 60)) {
    $errors[] = $T['err_rate'];
  }

  if (trim($_POST['website'] ?? '') !== '') {
    $ok_msg = $T['ok_honey'];
  } else {
    $first_name = strip_tags(trim($_POST['first_name'] ?? ''));
    $last_name  = strip_tags(trim($_POST['last_name']  ?? ''));
    $email      = strip_tags(trim($_POST['email']      ?? ''));
    $phoneRaw   = trim($_POST['phone'] ?? '');
    $phone      = only_digits($phoneRaw);
    $city       = strip_tags(trim($_POST['city'] ?? ''));
    $state      = strip_tags(trim($_POST['state'] ?? ''));
    $contactMethods = isset($_POST['contact_methods']) && is_array($_POST['contact_methods']) ? array_map('strip_tags', $_POST['contact_methods']) : [];
    $interest   = strip_tags(trim($_POST['interest'] ?? ''));
    $availability = strip_tags(trim($_POST['availability'] ?? ''));
    $commitments  = isset($_POST['commitments']) && is_array($_POST['commitments']) ? array_map('strip_tags', $_POST['commitments']) : [];
    $newsletter   = isset($_POST['newsletter']) && $_POST['newsletter']==='yes' ? 'yes' : 'no';
    $programs     = isset($_POST['programs']) && is_array($_POST['programs']) ? array_map('strip_tags', $_POST['programs']) : [];

    if ($first_name === '' || mb_strlen($first_name) < 2) { $errors[] = $T['err_first']; }
    if ($last_name  === '' || mb_strlen($last_name)  < 2) { $errors[] = $T['err_last']; }

    if ($email === '' && $phone === '') { $errors[] = $T['err_contact']; }
    if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors[] = $T['err_email']; }
    if ($phone !== '' && mb_strlen($phone) < 8) { $errors[] = $T['err_phone']; }

    if (empty($contactMethods)) { $errors[] = $T['err_pref']; }
    if ($interest === '' || mb_strlen($interest) < 10) { $errors[] = $T['err_why']; }
    if (empty($commitments)) { $errors[] = $T['err_commit']; }

    if (!$errors) {
      $record = [
        'ts'           => date('c'),
        'ip'           => $_SERVER['REMOTE_ADDR'] ?? '',
        'first_name'   => $first_name,
        'last_name'    => $last_name,
        'email'        => $email,
        'phone'        => $phone,
        'city'         => $city,
        'state'        => $state,
        'contact'      => array_values($contactMethods),
        'interest'     => $interest,
        'availability' => $availability,
        'commitment'   => array_values($commitments),
        'newsletter'   => $newsletter,
        'programs'     => array_values(array_intersect($programs, $programOptions)),
      ];

      $line = json_encode($record, JSON_UNESCAPED_UNICODE) . PHP_EOL;
      $fp = @fopen($DATA_FILE, 'ab');
      if ($fp) { if (flock($fp, LOCK_EX)) { fwrite($fp, $line); fflush($fp); flock($fp, LOCK_UN); } fclose($fp); }

      if (!empty($Mail)) {
        $to = $Mail;
        $subject = "New Volunteer Inquiry - " . ($Company ?? 'Website');
        $body = "New volunteer inquiry:\n\n"
              . "Name: {$first_name} {$last_name}\n"
              . "Email: {$email}\n"
              . "Phone: {$phoneRaw}\n"
              . "City/State: {$city}, {$state}\n"
              . "Preferred contact: ".implode(', ', $record['contact'])."\n"
              . "Programs: " . implode(', ', $record['programs']) . "\n"
              . "Commitment: ".implode(', ', $record['commitment'])."\n"
              . "Availability: {$availability}\n"
              . "Newsletter: {$newsletter}\n"
              . "Interest:\n{$interest}\n\n"
              . "Submitted: {$record['ts']}\n";
        @mail($to, $subject, $body, "From: {$Mail}\r\nReply-To: {$email}\r\n");
      }

      $_SESSION['last_volunteer'] = time();
      $ok_msg = $T['ok_thanks'];
      $_POST = [];
    }
  }
}

/* =========================
   UI helpers / styling
========================= */
$states = [
  ''=> ($lang==='es'?'Estado':'State'),'WA'=>'Washington','OR'=>'Oregon','CA'=>'California','TX'=>'Texas','NY'=>'New York','FL'=>'Florida',
  'IL'=>'Illinois','AZ'=>'Arizona','CO'=>'Colorado','NV'=>'Nevada','NM'=>'New Mexico','UT'=>'Utah','ID'=>'Idaho',
  'MT'=>'Montana','WY'=>'Wyoming','ND'=>'North Dakota','SD'=>'South Dakota','NE'=>'Nebraska','KS'=>'Kansas',
  'OK'=>'Oklahoma','MO'=>'Missouri','IA'=>'Iowa','MN'=>'Minnesota','WI'=>'Wisconsin','MI'=>'Michigan','OH'=>'Ohio',
  'PA'=>'Pennsylvania','VA'=>'Virginia','NC'=>'North Carolina','SC'=>'South Carolina','GA'=>'Georgia','AL'=>'Alabama',
  'MS'=>'Mississippi','LA'=>'Louisiana','TN'=>'Tennessee','KY'=>'Kentucky','WV'=>'West Virginia','MD'=>'Maryland',
  'DE'=>'Delaware','NJ'=>'New Jersey','CT'=>'Connecticut','RI'=>'Rhode Island','MA'=>'Massachusetts','VT'=>'Vermont',
  'NH'=>'New Hampshire','ME'=>'Maine','AK'=>'Alaska','HI'=>'Hawaii','DC'=>'District of Columbia'
];

$label = "display:block;font-weight:700;margin-bottom:6px;color:#0f172a;";
$input = "width:100%;padding:12px;border:1px solid #cbd5e1;border-radius:10px;outline:none;background:#ffffff;color:#0f172a;box-shadow:none;appearance:none;";
$inputstate = $input;

$chkPill   = "display:inline-flex;gap:8px;align-items:center;border:1px solid #cbd5e1;border-radius:999px;padding:8px 14px;cursor:pointer;background:#fff;color:#0f172a;font-weight:700;line-height:1;";
$chkSquare = "display:inline-flex;gap:8px;align-items:center;border:1px solid #cbd5e1;border-radius:10px;padding:8px 12px;cursor:pointer;background:#fff;color:#0f172a;font-weight:700;line-height:1;";
$chkActive = $chkPill   . "background:#7DE1FF;color:#0f172a;border-color:#7DE1FF;box-shadow:0 0 0 2px rgba(125,225,255,.35) inset;";
$chkSqAct  = $chkSquare . "background:#7DE1FF;color:#0f172a;border-color:#7DE1FF;box-shadow:0 0 0 2px rgba(125,225,255,.35) inset;";
$accent   = "accent-color:#0f4c81;";
$pickSz   = "width:16px;height:16px;margin:0;";
$pillText = "color:#0f172a;font-weight:700;";
?>

<section class="overflow-hidden" style="padding:80px 0;color:#0f172a;">
  <div class="container">

    <!-- Tabs header -->
    <div style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:18px;">
      <button type="button" class="tab-btn is-active" data-tab="#tab-donate"
        style="border:1px solid #cbd5e1;background:#0f4c81;color:#fff;border-radius:999px;padding:10px 16px;font-weight:800;cursor:pointer;">
        <?php echo h($T['tab_donate']); ?>
      </button>
      <button type="button" class="tab-btn" data-tab="#tab-volunteer"
        style="border:1px solid #cbd5e1;background:#fff;color:#0f172a;border-radius:999px;padding:10px 16px;font-weight:800;cursor:pointer;">
        <?php echo h($T['tab_vol']); ?>
      </button>
    </div>

    <!-- Alerts -->
    <?php if ($ok_msg): ?>
      <div style="background:#ecfdf5;border:1px solid #10b98133;color:#065f46;padding:12px 16px;border-radius:12px;margin-bottom:18px;">
        <?php echo h($ok_msg); ?>
      </div>
    <?php endif; ?>
    <?php if ($errors): ?>
      <div style="background:#fef2f2;border:1px solid #ef444433;color:#7f1d1d;padding:12px 16px;border-radius:12px;margin-bottom:18px;">
        <ul style="margin:0;padding-left:18px;"><?php foreach($errors as $e){ echo "<li>".h($e)."</li>"; } ?></ul>
      </div>
    <?php endif; ?>

    <!-- ===================== TAB: DONATE ===================== -->
    <div id="tab-donate" class="tab-panel" style="">
      <div style="display:flex;gap:28px;flex-wrap:wrap;align-items:flex-start;">
        <div style="flex:1 1 420px;min-width:300px;">
          <h2 style="margin:0 0 10px 0;font-size:30px;color:#0f172a;"><?php echo $T['don_h1']; ?></h2>
          <p style="margin:0 0 12px 0;color:#475569;"><?php echo $T['don_p1']; ?></p>
          <ul style="margin:0 0 16px 0;padding-left:18px;color:#0f172a;display:grid;gap:8px;">
            <li><?php echo $T['don_li1']; ?></li>
            <li><?php echo $T['don_li2']; ?></li>
            <li><?php echo $T['don_li3']; ?></li>
          </ul>
        </div>

        <div style="flex:1 1 440px;min-width:320px;">
          <div id="don-card" style="background:#fff;border:1px solid #e5e7eb;border-radius:16px;padding:18px;box-shadow:0 10px 28px rgba(2,6,23,.06);">
            <h3 id="don-box-title" style="margin:0 0 16px 0;color:#0f172a;font-size:22px;"><?php echo $T['don_box_h3']; ?></h3>

            <!-- Selector de método (con iconos) -->
            <div style="display:flex;gap:10px;flex-wrap:wrap;margin:0 0 12px 0;">
              <button type="button" class="pay-method is-active" data-method="paypal"
                style="display:inline-flex;align-items:center;gap:8px;border:1px solid #cbd5e1;background:#0f4c81;color:#fff;border-radius:999px;padding:8px 14px;font-weight:800;cursor:pointer;">
                <!-- icon PayPal -->
                <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M7.6 20.5H5.3c-.5 0-.9-.5-.8-1l1.9-12c.1-.5.5-.9 1-.9h5.9c3.2 0 5.7 1.9 5.1 5.2c-.5 3-2.6 4.5-5.6 4.5H9.1l-.5 3.2c-.1.5-.5 1-1 1z"/><path fill="currentColor" d="M9.4 17.3h3.4c3.2 0 5.7-1.6 6.2-4.8c.6-3.8-1.9-6.5-6.2-6.5H9.7c-.5 0-.9.4-1 .9l-.3 1.9h3.7c1.8 0 3.2.6 4 1.6c.7.9.9 2.1.7 3.4c-.6 3.1-2.9 4.5-6.1 4.5H9.4z" opacity=".2"/></svg>
                PayPal
              </button>
              <button type="button" class="pay-method" data-method="cashapp"
                style="display:inline-flex;align-items:center;gap:8px;border:1px solid #cbd5e1;background:#fff;color:#0f172a;border-radius:999px;padding:8px 14px;font-weight:800;cursor:pointer;">
                <!-- icon Cash App -->
                <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M12 2c5.5 0 10 4.5 10 10s-4.5 10-10 10S2 17.5 2 12S6.5 2 12 2zm-1.4 6.2c-.9.2-1.5.9-1.7 1.8c-.1.5.3 1 .8 1s1-.3 1.1-.8c.1-.3.3-.5.6-.6c.6-.1 1.2.2 1.3.8c.1.4-.1.8-.5 1.1l-2.4 1.6c-1 .7-1.5 1.8-1.2 3c.3 1.4 1.6 2.3 3 2.3c.3 0 .5 0 .8-.1c.9-.2 1.6-.9 1.8-1.8c.1-.5-.3-1-.8-1s-1 .3-1.1.8c-.1.3-.3.5-.6.6c-.6.1-1.2-.2-1.3-.8c-.1-.4.1-.8.5-1.1l2.4-1.6c1-.7 1.5-1.8 1.2-3c-.3-1.5-1.9-2.4-3.4-2.2z"/></svg>
                Cash App
              </button>
              <button type="button" class="pay-method" data-method="venmo" disabled
                title="<?php echo ($lang==='es'?'Pronto disponible':'Coming soon'); ?>"
                style="display:inline-flex;align-items:center;gap:8px;opacity:.6;cursor:not-allowed;border:1px solid #cbd5e1;background:#fff;color:#0f172a;border-radius:999px;padding:8px 14px;font-weight:800;">
                <!-- icon Venmo -->
                <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H9.9l6.1-14h-3.2l-4.5 10.3L8.3 5H5z"/></svg>
                Venmo (<?php echo ($lang==='es'?'pronto':'soon'); ?>)
              </button>
            </div>

            <!-- Amount grid -->
            <div style="display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:10px;margin-bottom:12px;">
              <?php foreach([25,50,100,250,500] as $amt): ?>
                <button type="button" class="amt" data-amt="<?php echo $amt; ?>"
                  style="height:64px;border-radius:14px;border:1px solid #e5e7eb;background:#fff;font-weight:800;font-size:18px;color:#0f172a;box-shadow:0 4px 12px rgba(0,0,0,.05);cursor:pointer;">
                  $<?php echo $amt; ?>
                </button>
              <?php endforeach; ?>

              <!-- Custom tile -->
              <div id="amt-custom-tile"
                style="display:flex;align-items:center;gap:10px;height:64px;border-radius:14px;border:1px solid #e5e7eb;background:#fff;padding:0 12px;box-shadow:0 4px 12px rgba(0,0,0,.05);">
                <span style="font-weight:800;color:#0f172a;"><?php echo $T['don_custom']; ?></span>
                <div style="flex:1;display:flex;align-items:center;gap:6px;border:1px dashed #e5e7eb;border-radius:10px;padding:6px 10px;">
                  <span style="color:#94a3b8;font-weight:700;">$</span>
                  <input id="don-custom2" type="number" min="1" step="1" placeholder="Amount"
                    style="flex:1;border:none;outline:none;font-weight:700;color:#0f172a;background:transparent;">
                </div>
              </div>
            </div>

            <!-- Type segmented control -->
            <div style="display:flex;align-items:center;justify-content:space-between;gap:12px;margin:10px 0 14px 0;flex-wrap:wrap;">
              <div id="type-wrap" style="display:flex;background:#eef2f7;border-radius:999px;padding:6px;gap:6px;width:max-content;">
                <button type="button" class="type-btn is-active" data-type="onetime"
                  style="border:none;border-radius:999px;padding:10px 16px;font-weight:800;color:#fff;background:#0f4c81;cursor:pointer;">
                  <?php echo $T['don_type_one']; ?>
                </button>
                <button type="button" class="type-btn" data-type="monthly"
                  style="border:none;border-radius:999px;padding:10px 16px;font-weight:800;color:#0f172a;background:transparent;cursor:pointer;">
                  <?php echo $T['don_type_mon']; ?>
                </button>
              </div>

              <div style="display:flex;align-items:center;gap:8px;">
                <span style="font-weight:700;color:#0f172a;"><?php echo $T['don_currency']; ?></span>
                <select id="don-currency"
                  style="padding:10px 12px;border:1px solid #cbd5e1;border-radius:10px;outline:none;background:#fff;color:#0f172a;width:130px;">
                  <option value="USD" <?php echo ($CURRENCY==='USD')?'selected':''; ?>>USD</option>
                  <option value="EUR">EUR</option>
                  <option value="HNL">HNL</option>
                </select>
              </div>
            </div>

            <button id="don-submit"
              style="width:100%;display:inline-flex;justify-content:center;align-items:center;gap:8px;background:#0f4c81;color:#fff;border:none;border-radius:12px;padding:14px 16px;font-weight:800;cursor:pointer;">
              <?php echo $T['don_btn']; ?> <i class="fas fa-arrow-right"></i>
            </button>

            <div style="color:#64748b;font-size:12px;margin-top:10px;line-height:1.5;">
              <?php echo $T['don_help']; ?>
              <a href="<?php echo h($MailRef ?? '#'); ?>" style="color:#0f4c81;text-decoration:none;"><?php echo h($Mail ?? ''); ?></a>.
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ===================== TAB: VOLUNTEER ===================== -->
    <div id="tab-volunteer" class="tab-panel" style="display:none;">
      <div style="display:flex;gap:32px;align-items:flex-start;flex-wrap:wrap;margin-bottom:24px;">
        <div style="flex:1 1 420px;min-width:280px;">
          <h2 style="margin:0 0 8px 0;font-size:34px;line-height:1.15;color:#0f172a;"><?php echo $T['vol_h2']; ?></h2>
          <p style="margin:0 0 14px 0;color:#475569;">
            <?php printf($T['vol_p1'], h($Company ?? 'our nonprofit')); ?>
          </p>
          <ul style="margin:0;padding-left:18px;color:#0f172a;display:grid;gap:8px;">
            <li><?php echo $T['vol_li1']; ?></li>
            <li><?php echo $T['vol_li2']; ?></li>
            <li><?php echo $T['vol_li3']; ?></li>
            <li><?php echo $T['vol_li4']; ?></li>
          </ul>
        </div>
        <div style="flex:1 1 360px;min-width:260px;">
          <div style="width:100%;aspect-ratio:4/3;background:#eef2f7;border-radius:16px;overflow:hidden;box-shadow:0 8px 24px rgba(0,0,0,.08);">
            <img src="assets/img/others/about2-1.jpg" alt="Volunteer"
                 style="width:100%;height:100%;object-fit:cover;display:block;">
          </div>
        </div>
      </div>

      <div style="background:linear-gradient(180deg,#f8fbff,#ffffff);border:1px solid #e5e7eb;border-radius:18px;padding:22px;box-shadow:0 10px 28px rgba(2,6,23,.06);">
        <h3 style="margin:0 0 14px 0;color:#0f172a;"><?php echo $T['vol_form_h3']; ?></h3>
        <p style="margin:0 0 18px 0;color:#64748b;"><?php echo $T['vol_form_p']; ?></p>

        <form method="post" action="">
          <input type="hidden" name="_csrf" value="<?php echo h($csrf_token); ?>">
          <input type="hidden" name="_kind" value="volunteer">
          <!-- Honeypot -->
          <input type="text" name="website" tabindex="-1" autocomplete="off" style="position:absolute;left:-5000px;opacity:0;height:0;width:0;">

          <!-- grid -->
          <div style="display:grid;grid-template-columns:repeat(12,1fr);gap:12px;">
            <div style="grid-column:span 6;">
              <label style="<?php echo $label; ?>"><?php echo $T['first_name']; ?></label>
              <input name="first_name" value="<?php echo h($_POST['first_name'] ?? ''); ?>" required style="<?php echo $input; ?>">
            </div>
            <div style="grid-column:span 6;">
              <label style="<?php echo $label; ?>"><?php echo $T['last_name']; ?></label>
              <input name="last_name" value="<?php echo h($_POST['last_name'] ?? ''); ?>" required style="<?php echo $input; ?>">
            </div>

            <div style="grid-column:span 6;">
              <label style="<?php echo $label; ?>"><?php echo $T['email']; ?></label>
              <input name="email" type="email" placeholder="<?php echo h($T['email_ph']); ?>" value="<?php echo h($_POST['email'] ?? ''); ?>" style="<?php echo $input; ?>">
            </div>
            <div style="grid-column:span 6;">
              <label style="<?php echo $label; ?>"><?php echo $T['phone']; ?></label>
              <input name="phone" placeholder="<?php echo h($T['phone_ph']); ?>" value="<?php echo h($_POST['phone'] ?? ''); ?>" style="<?php echo $input; ?>">
            </div>

            <div style="grid-column:span 6;">
              <label style="<?php echo $label; ?>"><?php echo $T['city']; ?></label>
              <input name="city" value="<?php echo h($_POST['city'] ?? ''); ?>" style="<?php echo $input; ?>">
            </div>
            <div style="grid-column:span 6;">
              <label style="<?php echo $label; ?>"><?php echo $T['state']; ?></label>
              <select name="state" style="<?php echo $inputstate; ?>">
                <?php
                $selState = $_POST['state'] ?? '';
                foreach ($states as $k=>$v) {
                  $sel = ($k===$selState)?'selected':''; echo "<option value='".h($k)."' {$sel}>".h($v)."</option>";
                }
                ?>
              </select>
            </div>

            <!-- Preferred contact (checkboxes) -->
            <div style="grid-column:span 12%;">
              <label style="<?php echo $label; ?>"><?php echo $T['pref_contact']; ?></label>
              <?php $cm = isset($_POST['contact_methods']) && is_array($_POST['contact_methods']) ? $_POST['contact_methods'] : []; ?>
              <div style="display:flex;gap:14px;flex-wrap:wrap;">
                <?php foreach ([$T['opt_call'],$T['opt_text'],$T['opt_email']] as $opt):
                  $checked = in_array($opt, $cm);
                  $style   = $checked ? $chkActive : $chkPill;
                ?>
                <label style="<?php echo $style; ?>" data-style="<?php echo $chkPill; ?>" data-style-active="<?php echo $chkActive; ?>">
                  <input type="checkbox" name="contact_methods[]" value="<?php echo h($opt); ?>" <?php echo $checked?'checked':''; ?> style="<?php echo $accent.$pickSz; ?>">
                  <span style="<?php echo $pillText; ?>"><?php echo h($opt); ?></span>
                </label>
                <?php endforeach; ?>
              </div>
            </div>

            <div style="grid-column:span 12;">
              <label style="<?php echo $label; ?>"><?php echo $T['why']; ?></label>
              <textarea name="interest" rows="4" required style="<?php echo $input; ?>resize:vertical;"><?php echo h($_POST['interest'] ?? ''); ?></textarea>
            </div>

            <div style="grid-column:span 12;">
              <label style="<?php echo $label; ?>"><?php echo $T['avail']; ?></label>
              <input name="availability" placeholder="<?php echo h($T['avail_ph']); ?>" value="<?php echo h($_POST['availability'] ?? ''); ?>" style="<?php echo $input; ?>">
            </div>

            <div style="grid-column:span 12;">
              <label style="<?php echo $label; ?>"><?php echo $T['which_prog']; ?></label>
              <div style="display:flex;flex-wrap:wrap;gap:10px;">
                <?php
                $chosen = isset($_POST['programs']) && is_array($_POST['programs']) ? $_POST['programs'] : [];
                foreach ($programOptions as $opt):
                  $ck    = in_array($opt, $chosen);
                  $style = $ck ? $chkSqAct : $chkSquare;
                ?>
                  <label style="<?php echo $style; ?>" data-style="<?php echo $chkSquare; ?>" data-style-active="<?php echo $chkSqAct; ?>">
                    <input type="checkbox" name="programs[]" value="<?php echo h($opt); ?>" <?php echo $ck ? 'checked' : ''; ?> style="<?php echo $accent.$pickSz; ?>">
                    <span style="<?php echo $pillText; ?>"><?php echo h($opt); ?></span>
                  </label>
                <?php endforeach; ?>
              </div>
            </div>

            <div style="grid-column:span 12;">
              <label style="<?php echo $label; ?>"><?php echo $T['commit']; ?></label>
              <?php $com = isset($_POST['commitments']) && is_array($_POST['commitments']) ? $_POST['commitments'] : []; ?>
              <div style="display:flex;gap:14px;flex-wrap:wrap;">
                <?php foreach ([$T['opt_one'],$T['opt_1_3'],$T['opt_3_6'],$T['opt_6p']] as $opt):
                  $checked = in_array($opt, $com);
                  $style   = $checked ? $chkActive : $chkPill;
                ?>
                <label style="<?php echo $style; ?>" data-style="<?php echo $chkPill; ?>" data-style-active="<?php echo $chkActive; ?>">
                  <input type="checkbox" name="commitments[]" value="<?php echo h($opt); ?>" <?php echo $checked?'checked':''; ?> style="<?php echo $accent.$pickSz; ?>">
                  <span style="<?php echo $pillText; ?>"><?php echo h($opt); ?></span>
                </label>
                <?php endforeach; ?>
              </div>
            </div>

            <div style="grid-column:span 12;">
              <label style="<?php echo $label; ?>"><?php echo $T['newsletter']; ?></label>
              <?php $nl = isset($_POST['newsletter']) && $_POST['newsletter']==='yes'; ?>
              <?php $nlStyle = $nl ? $chkActive : $chkPill; ?>
              <label style="<?php echo $nlStyle; ?>" data-style="<?php echo $chkPill; ?>" data-style-active="<?php echo $chkActive; ?>">
                <input type="checkbox" name="newsletter" value="yes" <?php echo $nl?'checked':''; ?> style="<?php echo $accent.$pickSz; ?>">
                <span style="<?php echo $pillText; ?>"><?php echo $T['newsletter_lbl']; ?></span>
              </label>
            </div>
          </div>

          <button type="submit"
            style="margin-top:18px;display:inline-flex;align-items:center;gap:8px;background:#0f4c81;color:#fff;border:none;border-radius:10px;padding:12px 18px;font-weight:700;cursor:pointer;">
            <?php echo $T['submit_vol']; ?> <i class="fas fa-arrow-right"></i>
          </button>
        </form>
      </div>
    </div>

    <!-- Quick info (common) -->
    <div style="
      display:grid;
      grid-template-columns:repeat(auto-fit, minmax(300px, 1fr));
      gap:24px;
      margin-top:32px;
      justify-content:center;
      max-width:900px;
      margin-left:auto;
      margin-right:auto;
    ">
      <!-- Card Email -->
      <div style="background:#fff;border:1px solid #e5e7eb;border-radius:16px;
                  padding:24px;display:flex;gap:16px;align-items:center;
                  box-shadow:0 8px 22px rgba(0,0,0,.06); min-height:120px;">
        <i class="fas fa-envelope-open-text" style="font-size:24px;color:#0f4c81;"></i>
        <div>
          <div style="font-size:14px;color:#64748b;"><?php echo $T['card_email']; ?></div>
          <div style="font-weight:700;color:#0f172a;font-size:18px;">
            <a href="<?php echo h($MailRef ?? '#'); ?>" style="color:#0f172a;text-decoration:none;">
              <?php echo h($Mail ?? ''); ?>
            </a>
          </div>
        </div>
      </div>

      <!-- Card Location -->
      <div style="background:#fff;border:1px solid #e5e7eb;border-radius:16px;
                  padding:24px;display:flex;gap:16px;align-items:center;
                  box-shadow:0 8px 22px rgba(0,0,0,.06); min-height:120px;">
        <i class="fas fa-map-marked-alt" style="font-size:24px;color:#0f4c81;"></i>
        <div>
          <div style="font-size:14px;color:#64748b;"><?php echo $T['card_location']; ?></div>
          <div style="font-weight:700;color:#0f172a;font-size:18px;">
            <?php echo h($Address ?? ''); ?>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<script>
(function () {
  /* ====== Tabs Donate/Volunteer ====== */
  const tabs   = Array.from(document.querySelectorAll('.tab-btn'));
  const panels = Array.from(document.querySelectorAll('.tab-panel'));

  function paintTab(btn) {
    if (!btn) return;
    tabs.forEach(b => {
      const active = (b === btn);
      b.classList.toggle('is-active', active);
      b.style.background  = active ? '#0f4c81' : '#fff';
      b.style.color       = active ? '#fff' : '#0f172a';
      b.style.borderColor = '#cbd5e1';
    });
    const id = btn.getAttribute('data-tab');
    panels.forEach(p => { p.style.display = (('#' + p.id) === id) ? '' : 'none'; });
  }

  const defaultTab = tabs.find(t => t.classList.contains('is-active')) || tabs[0];

  function selectFromLocation() {
    const hash = (window.location.hash || '').toLowerCase();
    const q    = new URLSearchParams(window.location.search);
    const qTab = (q.get('tab') || '').toLowerCase();
    let target = null;
    if (hash === '#volunteer' || qTab === 'volunteer') {
      target = tabs.find(t => t.getAttribute('data-tab') === '#tab-volunteer');
    } else if (hash === '#donate' || qTab === 'donate') {
      target = tabs.find(t => t.getAttribute('data-tab') === '#tab-donate');
    }
    paintTab(target || defaultTab);
  }

  selectFromLocation();
  window.addEventListener('hashchange', selectFromLocation);
  window.addEventListener('popstate', selectFromLocation);
  tabs.forEach(btn => btn.addEventListener('click', (e) => { e.preventDefault(); paintTab(btn); }));

  /* ====== Helpers pills ====== */
  function setActivePill(label, active) {
    const base = label.getAttribute('data-style') || '';
    const on   = label.getAttribute('data-style-active') || base;
    label.setAttribute('style', active ? on : base);
  }
  document.querySelectorAll('label input[type="checkbox"], label input[type="radio"]').forEach(inp => {
    const lab = inp.closest('label'); if (!lab) return;
    const paint = () => setActivePill(lab, inp.checked);
    paint();
    lab.addEventListener('click',  () => setTimeout(paint, 0));
    inp.addEventListener('change', paint);
  });

  /* ====== Amounts ====== */
  const amtBtns      = Array.from(document.querySelectorAll('.amt'));
  const customInput2 = document.getElementById('don-custom2');
  const customTile   = document.getElementById('amt-custom-tile');

  amtBtns.forEach(b => { if (!b.dataset.style) b.dataset.style = b.getAttribute('style') || ''; });
  if (customTile && !customTile.dataset.style) customTile.dataset.style = customTile.getAttribute('style') || '';

  let selectedAmount = 0;
  function highlightTile(el, highlightColor) {
    const styleActive = ( (el.dataset.style || '') + `background:${highlightColor};border-color:${highlightColor};box-shadow:0 0 0 2px ${highlightColor}55 inset;` );
    el.setAttribute('style', styleActive);
  }
  function activateAmtButton(btn, highlightColor) {
    amtBtns.forEach(b => b.setAttribute('style', b.dataset.style));
    if (customTile) customTile.setAttribute('style', customTile.dataset.style);
    if (btn) highlightTile(btn, highlightColor);
  }
  amtBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      selectedAmount = parseFloat(btn.dataset.amt || '0') || 0;
      if (customInput2) customInput2.value = '';
      activateAmtButton(btn, theme.highlight);
    });
  });
  if (customInput2) {
    customInput2.addEventListener('input', () => {
      const val = parseFloat(customInput2.value || '0');
      selectedAmount = (val > 0) ? val : 0;
      amtBtns.forEach(b => b.setAttribute('style', b.dataset.style));
      if (customTile) {
        if (val > 0) highlightTile(customTile, theme.highlight);
        else customTile.setAttribute('style', customTile.dataset.style);
      }
    });
  }

  /* ====== Type (onetime/monthly) ====== */
  const typeBtns = Array.from(document.querySelectorAll('.type-btn'));
  let donationType = 'onetime';
  typeBtns.forEach(b => { if (!b.dataset.style) b.dataset.style = b.getAttribute('style') || ''; });

  function paintTypeActive(btn) {
    typeBtns.forEach(x => x.setAttribute('style', x.dataset.style));
    btn.setAttribute('style', `border:none;border-radius:999px;padding:10px 16px;font-weight:800;color:#fff;background:${theme.primary};cursor:pointer;`);
    donationType = btn.getAttribute('data-type') || 'onetime';
  }
  const initType = typeBtns.find(b => b.classList.contains('is-active')) || typeBtns[0];
  if (initType) paintTypeActive(initType);
  typeBtns.forEach(btn => btn.addEventListener('click', () => paintTypeActive(btn)));

  /* ====== Método + theming ====== */
  const BRAND = {
    paypal: { name: 'PayPal',  primary: '#0f4c81', highlight: '#7DE1FF' },
    cashapp:{ name: 'Cash App',primary: '#00D632', highlight: '#B7F5C7' },
    venmo:  { name: 'Venmo',   primary: '#3D95CE', highlight: '#BFE3F8' }
  };
  let theme = {...BRAND.paypal};

  const PAYPAL_BUSINESS = <?php echo json_encode($PAYPAL_BUSINESS); ?>;
  const LINKS = <?php echo json_encode($DONATION_LINKS); ?>;
  const btnDonate  = document.getElementById('don-submit');
  const CHOOSE_MSG = <?php echo json_encode($T['don_choose']); ?>;
  const methodBtns = Array.from(document.querySelectorAll('.pay-method'));
  const titleBox   = document.getElementById('don-box-title');

  methodBtns.forEach(b => { if (!b.dataset.style) b.dataset.style = b.getAttribute('style') || ''; });

  function applyTheme() {
    // Botón principal
    btnDonate.style.background = theme.primary;
    // Texto del botón + título
    const btnText = <?php echo json_encode($T['don_btn']); ?>.replace(/PayPal/i, theme.name);
    btnDonate.innerHTML = btnText + ' <i class="fas fa-arrow-right"></i>';
    const baseTitle = <?php echo json_encode($T['don_box_h3']); ?>.replace(/PayPal/i, theme.name);
    titleBox.textContent = baseTitle;

    // Método activo
    methodBtns.forEach(x => x.setAttribute('style', x.dataset.style));
    const active = methodBtns.find(m => m.classList.contains('is-active'));
    if (active) active.setAttribute('style', `display:inline-flex;align-items:center;gap:8px;border:1px solid #cbd5e1;background:${theme.primary};color:#fff;border-radius:999px;padding:8px 14px;font-weight:800;cursor:pointer;`);

    // Re-pintar seleccionado (monto y tipo) con nuevo highlight/primary
    const selectedAmt = document.querySelector('.amt[style*="inset"]');
    if (selectedAmt) highlightTile(selectedAmt, theme.highlight);
    const activeType = document.querySelector('.type-btn[style*="background"]');
    if (activeType) paintTypeActive(activeType);
  }

  function activateMethod(btn) {
    methodBtns.forEach(b => b.classList.remove('is-active'));
    btn.classList.add('is-active');
    const m = btn.getAttribute('data-method') || 'paypal';
    theme = {...BRAND[m]};
    applyTheme();
  }

  // Inicial
  activateMethod(methodBtns.find(b => b.classList.contains('is-active')) || methodBtns[0]);
  methodBtns.forEach(btn => { if (!btn.disabled) btn.addEventListener('click', () => activateMethod(btn)); });

  /* ====== Submit ====== */
  btnDonate && btnDonate.addEventListener('click', () => {
    if (!selectedAmount || selectedAmount <= 0) {
      if (customInput2) {
        const cv = parseFloat(customInput2.value || '0');
        if (cv > 0) selectedAmount = cv;
      }
    }
    if (!selectedAmount || selectedAmount <= 0) {
      alert(CHOOSE_MSG);
      return;
    }

    const currency  = (document.getElementById('don-currency') || {}).value || 'USD';
    const isMonthly = (donationType === 'monthly');
    const methodEl  = methodBtns.find(b => b.classList.contains('is-active'));
    const donationMethod = methodEl ? (methodEl.getAttribute('data-method') || 'paypal') : 'paypal';

    // Mensual solo PayPal
    if (isMonthly && donationMethod !== 'paypal') {
      alert(<?php echo json_encode(($lang==='es')
        ? "Las donaciones mensuales solo están disponibles con PayPal en este momento."
        : "Monthly donations are only available via PayPal at this time."); ?>);
      return;
    }

    // --- PayPal ---
    if (donationMethod === 'paypal') {
      if (!isMonthly) {
        let url = LINKS.paypal_hosted || '';
        if (!url) url = "https://www.paypal.com/donate?business=" + encodeURIComponent(PAYPAL_BUSINESS);
        const hasQuery = url.includes('?');
        const parts = [];
        parts.push("amount=" + encodeURIComponent(selectedAmount.toFixed(2)));
        parts.push("currency_code=" + encodeURIComponent(currency));
        url += (hasQuery ? '&' : '?') + parts.join('&');
        window.open(url, "_blank");
      } else {
        const form = document.createElement('form');
        form.action = "https://www.paypal.com/cgi-bin/webscr";
        form.method = "post";
        form.target = "_blank";
        form.innerHTML = ''
          + '<input type="hidden" name="cmd" value="_xclick-subscriptions">'
          + '<input type="hidden" name="business" value="' + PAYPAL_BUSINESS + '">'
          + '<input type="hidden" name="item_name" value="<?php echo h('Donation to '.($Company ?? 'Misión Angelitos')); ?>">'
          + '<input type="hidden" name="a3" value="' + selectedAmount.toFixed(2) + '">'
          + '<input type="hidden" name="p3" value="1">'
          + '<input type="hidden" name="t3" value="M">'
          + '<input type="hidden" name="src" value="1">'
          + '<input type="hidden" name="currency_code" value="' + currency + '">';
        document.body.appendChild(form);
        form.submit();
        form.remove();
      }
      return;
    }

    // --- Cash App (solo pago único, USD entero) ---
    if (donationMethod === 'cashapp') {
      const base = (LINKS.cashapp || '').replace(/\/+$/, '');
      const amt  = Math.max(1, Math.floor(selectedAmount));
      if (!base) { alert('Cash App link not configured.'); return; }
      const url = base + '/' + encodeURIComponent(String(amt));
      window.open(url, "_blank");
      return;
    }

    // --- Venmo (pendiente) ---
    if (donationMethod === 'venmo') {
      alert(<?php echo json_encode(($lang==='es')
        ? "El enlace de Venmo estará disponible pronto."
        : "Venmo link will be available soon."); ?>);
      return;
    }
  });
})();
</script>

<?php require_once('parts/footer/footer-5.php'); ?>
