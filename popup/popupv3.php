<?php
// Carga text.php si aún no está cargado
if (!isset($Company)) {
  $textPath = __DIR__ . '/php/text.php'; // text.php está en /php
  if (is_file($textPath)) { require_once $textPath; }
}

/* ===================== Opciones (Variables de Configuración) ===================== */
$PopupImage = $PopupImage ?? 'assets/images/popup/popup.jpg';
$PopupQR    = $PopupQR    ?? 'assets/images/popup/qr.png';
$PopupLogo  = $PopupLogo  ?? 'assets/images/popup/logo-pop.png';
$PopupDelay = isset($PopupDelay) ? (int)$PopupDelay : 500;
$PopupTTL   = isset($PopupTTL)   ? (int)$PopupTTL   : 7;

/* Enlace principal (QR): usa $google si existe; si no, dominio */
$PopupLink  = (!empty($google) ? $google : ('https://' . ($Domain ?? 'example.com')));

/* ===================== Derivados de text.php y Sanitización ===================== */
$__company  = htmlspecialchars($Company ?? 'Our Company', ENT_QUOTES);
$__domain   = htmlspecialchars($Domain  ?? 'example.com', ENT_QUOTES);
$__phone    = htmlspecialchars($Phone   ?? '', ENT_QUOTES);
$__phoneRef = htmlspecialchars($PhoneRef?? 'tel:'.$__phone, ENT_QUOTES);
$__mailRef  = htmlspecialchars($MailRef ?? '#', ENT_QUOTES);
$__addr     = htmlspecialchars($Address ?? '', ENT_QUOTES);
$__sched    = htmlspecialchars($Schedule?? '', ENT_QUOTES);
$__exp      = htmlspecialchars($Experience ?? '', ENT_QUOTES);
$__servicesLead = htmlspecialchars($Services ?? '', ENT_QUOTES);

/* ===================== Servicios ===================== */
$__items = [];
for ($i = 1; $i <= 8; $i++) {
  if (isset($SN) && is_array($SN) && !empty($SN[$i])) { $__items[] = $SN[$i]; }
}

/* ===================== Redes (solo válidas) ===================== */
$raw_links = [
  'facebook'    => $facebook    ?? '',
  'yelp'        => $yelp        ?? '',
  'manta'       => $manta       ?? '',
  'bizstanding' => $bizstanding ?? '',
  'google'      => $google      ?? '',
];

$__links = [];
foreach ($raw_links as $k => $u) {
  if (is_string($u) && $u !== '' && preg_match('~^https?://~i', $u)) {
    $__links[$k] = $u;
  }
}

/* ===================== Iconos SVG ===================== */
if (!function_exists('oz_social_svg')) {
  function oz_social_svg($name){
    switch ($name) {
      case 'facebook':
        return '<svg viewBox="0 0 24 24"><path d="M13 22v-8h3l.5-4H13V7.5c0-1.1.36-1.8 2-1.8h1.7V2.2C15.9 2 14.7 2 13.4 2 10.6 2 9 3.6 9 6.3V10H6v4h3v8h4Z"/></svg>';
      case 'yelp':
        return '<svg viewBox="0 0 24 24"><path d="M10.8 2.2c-.7.1-1.2.7-1.2 1.5v6.1c0 .7.5 1.3 1.1 1.5l.7.2 3.2-6.9c.4-.9-.3-1.9-1.3-1.8l-2.5.4Zm7.1 5.5-3.8 2.2.3.7c.2.6.7 1 1.3 1.1l4.6.6c1 .1 1.7-1 1.1-1.8l-3.5-2.8Zm-1.1 7.7-3.4-2.8-.6.5c-.5.4-.7 1.1-.5 1.7l1.3 4.4c.3 1 .1 1.8-.8 2.1-.8.3-1.6-.2-1.9-1l-1.3-4.4c-.2-.6-.7-1-1.3-1.1l-4.6-.6c-1-.1-1.6-1.2-1-2l2.9-3.6c.4-.5 1.1-.7 1.7-.5l4.4 1.3c.6.2 1.3 0 1.7-.5l2.9-3.6c.6-.8 1.9-.5 2.1.5l1.2 4.5c.2.6 0 1.3-.5 1.7l-3.6 2.9c-.5.4-.7 1.1-.5 1.7l1.2 4.5c.3 1-.6 1.8-1.5 1.5Z"/></svg>';
      case 'manta':
        return '<svg viewBox="0 0 24 24"><path d="M3 4h18v16H3z" fill="none" stroke="currentColor"/><path d="M6 15V9h2l2 2 2-2h2v6h-2v-3l-2 2-2-2v3H6z"/></svg>';
      case 'bizstanding':
        return '<svg viewBox="0 0 24 24"><circle cx="12" cy="7" r="3"/><path d="M4 20a8 8 0 0 1 16 0H4z"/></svg>';
      case 'google':
        return '<svg viewBox="0 0 24 24"><path d="M21.35 11.1H12v2.9h5.35c-.23 1.46-1.62 4.28-5.35 4.28A6.64 6.64 0 0 1 5.36 12 6.64 6.64 0 0 1 12 5.72c1.89 0 3.16.8 3.88 1.49l1.98-1.9C16.55 3.98 14.52 3 12 3 6.98 3 2.95 7.03 2.95 12S6.98 21 12 21c6.13 0 8.17-4.29 8.17-7.09 0-.48-.05-.79-.12-1.41Z"/></svg>';
      default:
        return '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/></svg>';
    }
  }
}
?>

<style>
  /* ===================== CSS ===================== */
  :root{ --oz-blue:#0d6ea8; --oz-dark:#222; --oz-light:#f7f7f7; --oz-accent:#1f9bd1; }

  /* FIX #1: Z-INDEX MÁXIMO Y FORZADO CON !important */
  .oz-popup__overlay{
    position:fixed; 
    inset:0; 
    background:rgba(0,0,0,.55); 
    display:none; 
    align-items:center; 
    justify-content:center; 
    z-index: 2147483647 !important;
  }
  
  .oz-popup__dialog{position:relative; width:min(960px,92vw); background:#fff; border-radius:14px; overflow:hidden; box-shadow:0 18px 60px rgba(0,0,0,.35); display:grid; grid-template-columns:1.1fr 1fr; gap:0; animation:oz-pop .25s ease-out both;}
  @keyframes oz-pop{from{transform:translateY(16px); opacity:.6} to{transform:none; opacity:1}}
  
  .oz-popup__media{position:relative; min-height:420px; background:#333; background-image:url('<?= htmlspecialchars($PopupImage,ENT_QUOTES) ?>'); background-size:cover; background-position:center;}
  .oz-logo-overlay{position:absolute; top:15px; left:15px; z-index:2; padding:6px; border-radius:16px; box-shadow:0 4px 12px rgba(0,0,0,.15); background:#fff;}
  .oz-logo-overlay .logo-img{width:auto; max-width:220px; height:auto; display:block;}

  .oz-qr{position:absolute; left:18px; bottom:18px; background:#fff; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,.25); padding:10px; width:142px; display:flex; flex-direction:column; align-items:center; gap:8px; text-decoration:none;}
  .oz-qr img{width:122px; height:122px; display:block; border-radius:8px}
  .oz-qr span{font-size:12px; font-weight:700; color:#0d6ea8; text-align:center; line-height:1.2}

  .oz-popup__body{padding:26px; background:#fff;}
  .oz-popup__logo{display:flex; align-items:center; gap:10px; margin-bottom:10px;}
  .oz-popup__brand{font-weight:800; font-size:20px; color:var(--oz-dark); line-height:1.1}
  .oz-badge{display:inline-flex; align-items:center; justify-content:center; padding:8px 12px; border-radius:999px; background:#ecf6ff; color:#0d6ea8; font-weight:700; font-size:13px; line-height:1; box-shadow:inset 0 0 0 1px #d7eaff;}
  
  .oz-popup__title{font-size:26px; font-weight:900; color:var(--oz-dark); margin:6px 0 10px}
  .oz-popup__lead{color:#444; font-size:14px; margin:0 0 12px}
  .oz-list{margin:10px 0 12px; padding:0; list-style:none}
  .oz-list li{display:grid; grid-template-columns:20px 1fr; gap:10px; align-items:start; margin:9px 0; font-size:14px; color:#222}
  .oz-bullet{width:18px;height:18px;border-radius:50%;background:var(--oz-blue); display:inline-grid; place-items:center; margin-top:2px}
  .oz-bullet svg{width:12px;height:12px; fill:#fff}
  
  .oz-cta{display:flex; gap:10px; flex-wrap:wrap; margin-top:16px; margin-bottom:12px;}
  .oz-btn{appearance:none; border:0; cursor:pointer; text-decoration:none; user-select:none; padding:10px 14px; font-weight:700; border-radius:10px; transition:.18s; display:inline-flex; align-items:center; gap:8px; font-size:14px}
  .oz-btn--call{background:var(--oz-blue); color:#fff}
  .oz-btn--mail{background:#0ca678; color:#fff}
  .oz-btn--site{background:#111; color:#fff}
  .oz-btn:hover{transform:translateY(-1px); filter:brightness(1.02)}

  .oz-meta{margin-top:10px; font-size:13px; color:#333}
  .oz-meta b{color:#000}
  
  .oz-social{margin-top:10px}
  .oz-social h6{font-size:14px; font-weight:800; margin:12px 0 6px; color:#111}
  .oz-social-list{display:flex; flex-wrap:wrap; gap:10px; align-items:center}
  .oz-social-list a{display:inline-flex; align-items:center; justify-content:center; width:38px; height:38px; border-radius:50%; background:#f2f6fa; box-shadow:inset 0 0 0 1px #e6eef6; transition:.15s}
  .oz-social-list a:hover{transform:translateY(-1px); box-shadow:0 6px 20px rgba(0,0,0,.12)}
  .oz-social-list svg{width:18px; height:18px; fill:#0d6ea8}
  
  .oz-close{position:absolute; top:10px; right:10px; width:36px;height:36px;border-radius:10px; background:rgba(255,255,255,0.85); backdrop-filter: blur(4px); border:1px solid #e5e5e5; display:grid; place-items:center; cursor:pointer; transition:.15s; z-index:10;}
  .oz-close:hover{background:#fff; transform:rotate(90deg)}
  
  .oz-dontshow{margin-top:12px; display:flex; align-items:center; gap:4px; font-size:12px; color:#333;}
  .oz-dontshow input[type="checkbox"]{margin:0; width:14px; height:14px;}

  @media (max-width:767.98px){
    .oz-popup__dialog{
        display:flex; 
        flex-direction:column; 
        width:95vw; 
        max-height:90vh; 
    }
    .oz-popup__media{min-height:200px}
    .oz-popup__body {
        overflow-y: auto;
        flex: 1;
        padding: 20px;
    }
    .oz-qr{position:static; margin:10px auto 0 auto; width:128px}
    .oz-qr img{width:112px; height:112px}
    .oz-logo-overlay{top:10px; left:10px; padding:5px}
    .oz-logo-overlay .logo-img{max-width:160px}
  }
</style>

<div class="oz-popup__overlay" id="ozPopup" role="dialog" aria-modal="true" aria-labelledby="ozPopupTitle" aria-describedby="ozPopupDesc">
  <div class="oz-popup__dialog">
    
    <button class="oz-close" id="ozPopupClose" aria-label="Close">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M18.3 5.7a1 1 0 0 0-1.4-1.4L12 9.17 7.1 4.3A1 1 0 1 0 5.7 5.7L10.6 10.6 5.7 15.5a1 1 0 1 0 1.4 1.4L12 12l4.9 4.9a1 1 0 0 0 1.4-1.4l-4.9-4.9 4.9-4.9Z" fill="#222"/></svg>
    </button>
      
    <div class="oz-popup__media">
      <div class="oz-logo-overlay">
        <img src="<?= htmlspecialchars($PopupLogo,ENT_QUOTES) ?>" alt="<?= $__company ?> Logo" class="img-fluid logo-img">
      </div>

      <a class="oz-qr" href="<?= htmlspecialchars($PopupLink,ENT_QUOTES) ?>" target="_blank" rel="noopener" aria-label="Open site">
        <img src="<?= htmlspecialchars($PopupQR,ENT_QUOTES) ?>" alt="QR - <?= $__domain ?>">
        <span><?= $__domain ?></span>
      </a>
    </div>

    <div class="oz-popup__body">
      
      <div class="oz-popup__logo">
        <div class="oz-popup__brand"><?= $__company ?></div>
        <?php if(!empty($__exp)): ?><span class="oz-badge"><?= $__exp ?></span><?php endif; ?>
      </div>

      <div class="oz-services">
        <h3 class="oz-popup__title" id="ozPopupTitle">Our Services</h3>
        <?php if (!empty($__servicesLead)): ?>
          <p class="oz-popup__lead" id="ozPopupDesc"><?= $__servicesLead ?>.</p> <?php endif; ?>
        <?php if (!empty($__items)): ?>
          <ul class="oz-list">
            <?php foreach($__items as $li): ?>
              <li>
                <span class="oz-bullet" aria-hidden="true">
                  <svg viewBox="0 0 24 24"><path d="M20.285 6.708a1 1 0 0 0-1.57-1.242l-8.5 10.74-4.17-4.17a1 1 0 1 0-1.414 1.414l4.96 4.96a1 1 0 0 0 1.51-.09l9.184-11.612z"/></svg>
                </span>
                <span><?= htmlspecialchars($li, ENT_QUOTES) ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>

      <div class="oz-cta">
        <?php if(!empty($__phone) && $__phoneRef !== '#'): ?>
          <a class="oz-btn oz-btn--call" href="<?= $__phoneRef ?>">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="#fff"><path d="M6.6 10.8a15.6 15.6 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25 11 11 0 0 0 3.5.58 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 7a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11 11 0 0 0 .58 3.5 1 1 0 0 1-.25 1l-2.23 2.3Z"/></svg>
            Call <?= $__phone ?>
          </a>
        <?php endif; ?>
        <?php if(!empty($__mailRef) && $__mailRef !== '#'): ?>
          <a class="oz-btn oz-btn--mail" href="<?= $__mailRef ?>">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="#fff"><path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 4-8 5L4 8V6l8 5 8-5v2Z"/></svg>
            Email
          </a>
        <?php endif; ?>
        <a class="oz-btn oz-btn--site" target="_blank" rel="noopener" href="https://<?= $__domain ?>">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="#fff"><path d="M14 3h7v7h-2V6.41l-9.29 9.3-1.42-1.42 9.3-9.29H14V3ZM5 5h6v2H7v10h10v-4h2v6H5V5Z"/></svg>
          Visit Site
        </a>
      </div>

      <div class="oz-meta">
        <?php if(!empty($__addr)):  ?><div><b>Address:</b> <?= $__addr  ?></div><?php endif; ?>
        <?php if(!empty($__sched)): ?><div><b>Schedule:</b> <?= $__sched ?></div><?php endif; ?>
      </div>

      <?php if (!empty($__links)): ?>
      <div class="oz-social">
        <h6>Follow us</h6>
        <div class="oz-social-list">
          <?php foreach ($__links as $n => $u):
            $label = htmlspecialchars(ucfirst($n), ENT_QUOTES);
            $href  = htmlspecialchars($u, ENT_QUOTES);
            echo '<a href="'.$href.'" target="_blank" rel="noopener" aria-label="'.$label.'">'.oz_social_svg($n).'</a>';
          endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

      <label class="oz-dontshow">
        <input type="checkbox" id="ozDontShow"> Don’t show again for <?= (int)$PopupTTL ?> days
      </label>
    </div>
  </div>
</div>

<script>
(function(){
  const POP_ID = 'oz_popup_seen_v1';
  const TTL_DAYS = <?= (int)$PopupTTL ?>;
  const DELAY = <?= (int)$PopupDelay ?>;
  const $overlay = document.getElementById('ozPopup');
  const $close   = document.getElementById('ozPopupClose');
  const $cb      = document.getElementById('ozDontShow');

  /* FIX #2: MOVER EL POPUP AL FINAL DEL BODY */
  if ($overlay) {
    document.body.appendChild($overlay);
  }

  function now(){ return Math.floor(Date.now()/1000); }
  function setTTL(days){ try{ localStorage.setItem(POP_ID, String(now() + (days*86400))); }catch(e){} }
  function shouldShow(){ try{ const v = parseInt(localStorage.getItem(POP_ID)||'0',10); return !(v && now() < v); }catch(e){ return true; } }
  function open(){ if($overlay) { $overlay.style.display='flex'; document.body.style.overflow='hidden'; } }
  function close(){ if($overlay) { if($cb && $cb.checked){ setTTL(TTL_DAYS); } $overlay.style.display='none'; document.body.style.overflow=''; } }

  if(shouldShow()){ setTimeout(open, DELAY); }
  if($close) { $close.addEventListener('click', close); }
  if($overlay) { $overlay.addEventListener('click', function(e){ if(e.target===this) close(); }); }
  document.addEventListener('keydown', function(e){ if(e.key==='Escape') close(); });
})();
</script>