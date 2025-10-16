<?php
// popup.php — requiere include('text.php') antes

// ---------- Opciones visuales (rutas locales opcionales) ----------
$PopupImage = $PopupImage ?? 'images/logo/dark.png';   // Imagen lateral (si existe)
$PopupQR    = $PopupQR    ?? '';                                // QR opcional
$PopupLogo  = $PopupLogo  ?? '';                                // Logo opcional (PNG/SVG)
$PopupDelay = isset($PopupDelay) ? (int)$PopupDelay : 2500;     // ms para mostrar
$PopupTTL   = isset($PopupTTL)   ? (int)$PopupTTL   : 7;        // días para no volver a mostrar

// ---------- Helpers seguros ----------
if (!function_exists('h')) {
  function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
}
function url_ok($u){
  return (is_string($u) && filter_var($u, FILTER_VALIDATE_URL)) ? $u : '';
}
function tel_ok($t){
  $t = preg_replace('/[^\d\+]/','',$t ?? '');
  return $t ? "tel:$t" : '';
}

// ---------- Variables desde text.php con fallback ----------
$company   = $Company  ?? 'Our Company';
$desc      = $ExDescription ?? ($Description ?? '');
$schedule  = $Schedule ?? '';
$xp        = $Experience ?? '';
$domain    = trim($Domain ?? '');
$phoneRef  = $PhoneRef ?? tel_ok($Phone ?? '');
$mailRef   = $MailRef  ?? '';
$googleL   = url_ok($google ?? '');
$fbL       = url_ok($face ?? '');
$tiktokL   = url_ok($tiktok ?? '');
$angiL     = url_ok($angi ?? '');
$thumbL    = url_ok($THUMBTACK ?? '');

// link principal (prefiere Google; luego dominio si existe)
$mainLink  = $googleL ?: ($domain ? ('https://' . $domain) : '');

// clave de storage (única por sitio)
$keyBase   = $domain ?: md5($company);
$storeKey  = 'oz_popup_seen_' . substr($keyBase,0,24);

// armar arreglo de redes disponibles
$social = array_filter([
  ['label'=>'Facebook',  'href'=>$fbL,     'icon'=>'fb'],
  ['label'=>'TikTok',    'href'=>$tiktokL, 'icon'=>'tt'],
  ['label'=>'Angi',      'href'=>$angiL,   'icon'=>'ag'],
  ['label'=>'Thumbtack', 'href'=>$thumbL,  'icon'=>'tb'],
  ['label'=>'Google',    'href'=>$googleL, 'icon'=>'gm'],
], fn($i)=>!empty($i['href']));
?>
<style>
  :root{
    /* usa tu paleta --bs-* tal cual; añadimos utilitarios */
    --oz-radius: 16px;
    --oz-shadow: 0 12px 28px rgba(0,0,0,.18), 0 2px 8px rgba(0,0,0,.12);
  }
  .oz-popup__overlay{position:fixed; inset:0; background:rgba(0,0,0,.55); display:none; align-items:center; justify-content:center; z-index:99999;}
  .oz-popup__overlay.is-open{display:flex;}
  .oz-popup__dialog{
    width:min(920px,92vw); background:var(--bs-white,#fff); border-radius:var(--oz-radius);
    box-shadow:var(--oz-shadow); display:grid; grid-template-columns: 1fr 1.2fr; overflow:hidden;
  }
  @media (max-width: 880px){ .oz-popup__dialog{grid-template-columns: 1fr;} .oz-popup__media{display:none;} }

.oz-popup__media{
 background: #00A2FF;
  display:flex;              /* usamos flexbox */
  align-items:center;        /* centrado vertical */
  justify-content:center;    /* centrado horizontal */
  min-height: 220px;         /* más compacto que 360px */
  padding:20px;
}

.oz-popup__media img{
  max-width: 100%;
  max-height: 180px;         /* control tamaño logo */
  object-fit:contain;
}

  .oz-popup__body{padding:28px 26px 22px 26px;}
  .oz-popup__brand{display:flex; gap:12px; align-items:center; margin-bottom:8px;}
  .oz-popup__logo{height:44px; width:auto; object-fit:contain}
  .oz-popup__title{font-family: var(--bs-font-sans-serif, system-ui); font-size: clamp(20px, 2.2vw, 26px); margin:0 0 6px; color: var(--bs-dark,#212529);}
  .oz-popup__desc{font-size:14.5px; line-height:1.55; color: var(--bs-gray-dark,#343a40); margin:0 0 12px;}
  .oz-badges{display:flex; flex-wrap:wrap; gap:8px; margin-bottom:14px;}
  .oz-badge{
    font-size:12.5px; padding:6px 10px; border-radius:999px; background:rgba(0,0,0,.04);
    color:var(--bs-secondary,#00225a); border:1px solid rgba(0,0,0,.06);
  }
  .oz-actions{display:flex; flex-wrap:wrap; gap:10px; margin:10px 0 16px;}
  .oz-btn{
    appearance:none; border:1px solid transparent; border-radius:10px; padding:10px 14px; font-weight:600; cursor:pointer;
    background: #00A2FF; color:#fff;
  }
  .oz-btn--ghost{background:transparent; color:var(--bs-secondary,#00225a); border-color: rgba(0,0,0,.15);}
  .oz-social{display:flex; gap:10px; flex-wrap:wrap; margin-top:8px;}
  .oz-social a{
    display:inline-flex; align-items:center; gap:8px; padding:8px 12px; border:1px solid rgba(0,0,0,.12);
    border-radius:10px; text-decoration:none; color:var(--bs-dark,#212529); background:#fff;
  }
  .oz-social svg{width:16px; height:16px; display:block;}
  .oz-qr{
    display:flex; align-items:center; gap:12px; margin-top:10px; padding:10px; border:1px dashed rgba(0,0,0,.15);
    border-radius:12px; background: var(--bs-light,#f8f9fa);
  }
  .oz-qr img{width:72px; height:72px; object-fit:contain;}
  .oz-close{
    position:absolute; top:10px; right:10px; width:36px; height:36px; border-radius:999px; border:1px solid rgba(0,0,0,.12);
    background:#fff; display:grid; place-items:center; cursor:pointer;
  }
  .oz-close:focus{outline:2px solid #00A2FF; outline-offset:2px;}
  .oz-tagline{font-size:12.5px; color: var(--bs-gray,#6c757d); margin-top:4px;}
</style>

<div class="oz-popup__overlay" id="ozPopup" role="dialog" aria-modal="true" aria-labelledby="ozPopupTitle" aria-hidden="true">
  <div class="oz-popup__dialog">
   <div class="oz-popup__media" aria-hidden="true">
  <img src="/images/logo/dark.png" alt="MC & BLUE CONCRETE LLC Logo">
</div>

    <div class="oz-popup__body">
      <button class="oz-close" type="button" id="ozPopupClose" aria-label="Close popup">
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
      </button>

      <div class="oz-popup__brand">
        <?php if($PopupLogo): ?>
          <img class="oz-popup__logo" src="<?php echo h($PopupLogo); ?>" alt="<?php echo h($company); ?> logo">
        <?php endif; ?>
        <div>
          <h3 class="oz-popup__title" id="ozPopupTitle"><?php echo h($company); ?></h3>
          <?php if($domain): ?><div class="oz-tagline"><?php echo h($domain); ?></div><?php endif; ?>
        </div>
      </div>

      <?php if(!empty($desc)): ?>
        <p class="oz-popup__desc"><?php echo h($desc); ?></p>
      <?php endif; ?>

      <div class="oz-badges">
        <?php if($xp): ?><span class="oz-badge"><?php echo h($xp); ?></span><?php endif; ?>
        <?php if($schedule): ?><span class="oz-badge"><?php echo h($schedule); ?></span><?php endif; ?>
        <?php if(!empty($Services)): ?><span class="oz-badge"><?php echo h($Services); ?></span><?php endif; ?>
      </div>

      <div class="oz-actions">
        <?php if($phoneRef): ?>
          <a href="<?php echo h($phoneRef); ?>" class="oz-btn">Call Now</a>
        <?php endif; ?>
        <?php if($mailRef): ?>
          <a href="<?php echo h($mailRef); ?>" class="oz-btn oz-btn--ghost">Email Us</a>
        <?php endif; ?>
        <?php if($mainLink): ?>
          <a href="<?php echo h($mainLink); ?>" class="oz-btn oz-btn--ghost" target="_blank" rel="noopener" style="color:#000 !important;">See Reviews / Map</a>
        <?php endif; ?>
      </div>

      <?php if(!empty($social)): ?>
        <div class="oz-social" aria-label="Social links">
          <?php foreach($social as $s): ?>
            <a href="<?php echo h($s['href']); ?>" target="_blank" rel="noopener">
              <?php // iconos livianos en SVG (sin librerías)
                if($s['icon']==='fb'){
                  echo '<svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="16" cy="16" r="14" fill="url(#paint0_linear_87_7208)"></circle> <path d="M21.2137 20.2816L21.8356 16.3301H17.9452V13.767C17.9452 12.6857 18.4877 11.6311 20.2302 11.6311H22V8.26699C22 8.26699 20.3945 8 18.8603 8C15.6548 8 13.5617 9.89294 13.5617 13.3184V16.3301H10V20.2816H13.5617V29.8345C14.2767 29.944 15.0082 30 15.7534 30C16.4986 30 17.2302 29.944 17.9452 29.8345V20.2816H21.2137Z" fill="white"></path> <defs> <linearGradient id="paint0_linear_87_7208" x1="16" y1="2" x2="16" y2="29.917" gradientUnits="userSpaceOnUse"> <stop stop-color="#18ACFE"></stop> <stop offset="1" stop-color="#0163E0"></stop> </linearGradient> </defs> </g></svg>';
                } elseif($s['icon']==='tt'){
                  echo '<svg viewBox="62.370000000000005 70.49 675.3000000000001 675.3000000000001" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g fill="#ee1d52"> <path d="M196 498.32l1.64 4.63c-.21-.53-.81-2.15-1.64-4.63zM260.9 393.39c2.88-24.88 12.66-38.81 31.09-53.09 26.37-19.34 59.31-8.4 59.31-8.4V267a135.84 135.84 0 0 1 23.94 1.48V352s-32.93-10.94-59.3 8.41c-18.42 14.27-28.22 28.21-31.09 53.09-.09 13.51 2.34 31.17 13.53 46.44q-4.15-2.22-8.46-5.06c-24.65-17.27-29.14-43.18-29.02-61.49zM511.25 147c-18.14-20.74-25-41.68-27.48-56.39h22.82s-4.55 38.57 28.61 76.5l.46.51A132.76 132.76 0 0 1 511.25 147zM621.18 205.8v81.84s-29.12-1.19-50.67-6.91c-30.09-8-49.43-20.27-49.43-20.27s-13.36-8.75-14.44-9.36v169c0 9.41-2.47 32.91-10 52.51-9.83 25.64-25 42.47-27.79 45.91 0 0-18.45 22.75-51 38.07-29.34 13.82-55.1 13.47-62.8 13.82 0 0-44.53 1.84-84.6-25.33a169.63 169.63 0 0 1-24.16-20.26l.2.15c40.08 27.17 84.6 25.33 84.6 25.33 7.71-.35 33.47 0 62.8-13.82 32.52-15.32 51-38.07 51-38.07 2.76-3.44 18-20.27 27.79-45.92 7.51-19.59 10-43.1 10-52.51V231c1.08.62 14.43 9.37 14.43 9.37s19.35 12.28 49.44 20.27c21.56 5.72 50.67 6.91 50.67 6.91v-64.13c9.96 2.33 18.45 2.96 23.96 2.38z"></path> </g> <path d="M597.23 203.42v64.11s-29.11-1.19-50.67-6.91c-30.09-8-49.44-20.27-49.44-20.27s-13.35-8.75-14.43-9.37V400c0 9.41-2.47 32.92-10 52.51-9.83 25.65-25 42.48-27.79 45.92 0 0-18.46 22.75-51 38.07-29.33 13.82-55.09 13.47-62.8 13.82 0 0-44.52 1.84-84.6-25.33l-.2-.15a157.5 157.5 0 0 1-11.93-13.52c-12.79-16.27-20.63-35.51-22.6-41a.24.24 0 0 1 0-.07c-3.17-9.54-9.83-32.45-8.92-54.64 1.61-39.15 14.81-63.18 18.3-69.2A162.84 162.84 0 0 1 256.68 303a148.37 148.37 0 0 1 42.22-25 141.61 141.61 0 0 1 52.4-11v64.9s-32.94-10.9-59.3 8.4c-18.43 14.28-28.21 28.21-31.09 53.09-.12 18.31 4.37 44.22 29 61.5q4.31 2.85 8.46 5.06a65.85 65.85 0 0 0 15.5 15.05c24.06 15.89 44.22 17 70 6.68C401.06 474.78 414 459.23 420 442c3.77-10.76 3.72-21.59 3.72-32.79V90.61h60c2.48 14.71 9.34 35.65 27.48 56.39a132.76 132.76 0 0 0 24.41 20.62c2.64 2.85 16.14 16.94 33.47 25.59a130.62 130.62 0 0 0 28.15 10.21z"></path> <path d="M187.89 450.39v.05l1.48 4.21c-.17-.49-.72-1.98-1.48-4.26z" fill="#69c9d0"></path> <path d="M298.9 278a148.37 148.37 0 0 0-42.22 25 162.84 162.84 0 0 0-35.52 43.5c-3.49 6-16.69 30.05-18.3 69.2-.91 22.19 5.75 45.1 8.92 54.64a.24.24 0 0 0 0 .07c2 5.44 9.81 24.68 22.6 41a157.5 157.5 0 0 0 11.93 13.52 166.64 166.64 0 0 1-35.88-33.64c-12.68-16.13-20.5-35.17-22.54-40.79a1 1 0 0 1 0-.12v-.07c-3.18-9.53-9.86-32.45-8.93-54.67 1.61-39.15 14.81-63.18 18.3-69.2a162.68 162.68 0 0 1 35.52-43.5 148.13 148.13 0 0 1 42.22-25 144.63 144.63 0 0 1 29.78-8.75 148 148 0 0 1 46.57-.69V267a141.61 141.61 0 0 0-52.45 11z" fill="#69c9d0"></path> <path d="M483.77 90.61h-60v318.61c0 11.2 0 22-3.72 32.79-6.06 17.22-18.95 32.77-36.13 39.67-25.79 10.36-45.95 9.21-70-6.68a65.85 65.85 0 0 1-15.54-15c20.49 10.93 38.83 10.74 61.55 1.62 17.17-6.9 30.08-22.45 36.12-39.68 3.78-10.76 3.73-21.59 3.73-32.78V70.49h82.85s-.93 7.92 1.14 20.12zM597.23 185.69v17.73a130.62 130.62 0 0 1-28.1-10.21c-17.33-8.65-30.83-22.74-33.47-25.59a93.69 93.69 0 0 0 9.52 5.48c21.07 10.52 41.82 13.66 52.05 12.59z" fill="#69c9d0"></path> <path d="M486.85 701.51a22.75 22.75 0 0 1-1-6.73v-.16a24.53 24.53 0 0 0 1 6.89zM536.44 694.62v.16a23.07 23.07 0 0 1-1 6.73 24.89 24.89 0 0 0 1-6.89z" fill="none"></path> <path d="M485.84 694.78a22.75 22.75 0 0 0 1 6.73 2.59 2.59 0 0 0 .14.45 25.28 25.28 0 0 0 24.16 17.8v25.59c-12.46 0-21.38.44-35-7.59-15.44-9.16-24.14-25.91-24.14-43.3 0-17.94 9.74-35.91 26.25-44.57 12-6.28 21.09-6.32 32.92-6.32v25.58a25.31 25.31 0 0 0-25.31 25.31z" fill="#69c9d0"></path> <path d="M536.64 694.78a23.07 23.07 0 0 1-1 6.73c0 .15-.09.3-.14.45a25.3 25.3 0 0 1-24.16 17.8v25.59c12.45 0 21.38.44 34.95-7.59 15.49-9.16 24.21-25.91 24.21-43.3 0-17.94-9.74-35.91-26.25-44.57-12-6.28-21.09-6.32-32.91-6.32v25.58a25.31 25.31 0 0 1 25.3 25.31z" fill="#ee1d52"></path> <path d="M119.51 620.36h93.71l-8.66 25.78H180v98.67h-30.13v-98.67h-30.36zm248.35 0v25.78h30.36v98.67h30.17v-98.67h24.52l8.66-25.78zm-134.25 29.38A14.6 14.6 0 1 0 219 635.15a14.59 14.59 0 0 0 14.61 14.59zM219 744.81h29.58v-84.75H219zM355 649h-34.6l-29.82 29.82v-58.36h-29.39l-.09 124.35h29.67v-32.4L300 704l28.8 40.77h31.72l-41.72-59.62zm283.77 36.17L674.94 649h-34.59l-29.83 29.82v-58.36h-29.38L581 744.81h29.68v-32.4L620 704l28.8 40.77h31.73zm-76.06 9.27c0 28.1-23.09 50.89-51.57 50.89s-51.57-22.79-51.57-50.89 23.09-50.89 51.57-50.89 51.57 22.8 51.57 50.91zm-26.27 0a25.3 25.3 0 1 0-25.3 25.3 25.3 25.3 0 0 0 25.3-25.28z"></path> </g></svg>';
                } elseif($s['icon']==='ag'){
                  echo '<svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.a{fill:none;stroke:#000000;stroke-linecap:round;stroke-linejoin:round;}</style></defs><path class="a" d="M32.464,39.5673l5.8954.0524L32.6086,4.5H24.0251L21.3615,22.6462c-.214,1.9693-1.7245,15.7847-4.31,15.2377-5.07-3.4538.6258-9.6856,3.0886-9.2806,9.2847-1.2993,11.791,2.0273,12.3237,10.9637Z"></path><path class="a" d="M28.4655,9.9538l-1.94,13.2306a8.1457,8.1457,0,0,1,2.6012.7259,13.8908,13.8908,0,0,1,1.363.76Z"></path><path class="a" d="M14.82,42.6772a10.4792,10.4792,0,0,1-4.6311-12.4363,9.709,9.709,0,0,1,10.9972-6.6962"></path><path class="a" d="M14.6823,42.6065C22.8848,46.71,24.76,35.7492,25.813,28.6043"></path></g></svg>';
                } elseif($s['icon']==='tb'){
                  echo '<svg height="200px" width="200px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g id="pin"> <path style="fill:#030104;" d="M32,8c0-4.416-3.586-8-8-8c-2.984,0-5.562,1.658-6.938,4.086c0-0.002,0.004-0.004,0.004-0.006 c-0.367-0.035-0.723-0.111-1.098-0.111c-6.629,0-12,5.371-12,12c0,2.527,0.789,4.867,2.121,6.797L0,32l9.289-6.062 c1.91,1.281,4.207,2.031,6.68,2.031c6.629,0,12-5.371,12-12c0-0.346-0.07-0.67-0.102-1.008C30.32,13.594,32,11.006,32,8z M15.969,23.969c-4.414,0-8-3.586-8-8c0-4.412,3.586-8,8-8c0.012,0,0.023,0.004,0.031,0.004c0-0.008,0.004-0.014,0.004-0.02 C16.004,7.969,16,7.984,16,8c0,0.695,0.117,1.355,0.281,1.998l-3.172,3.174c-1.562,1.562-1.562,4.094,0,5.656s4.094,1.562,5.656,0 l3.141-3.141c0.66,0.18,1.344,0.305,2.059,0.309C23.949,20.398,20.371,23.969,15.969,23.969z M24,12c-2.203,0-4-1.795-4-4 s1.797-4,4-4s4,1.795,4,4S26.203,12,24,12z"></path> </g> </g> </g></svg>';
                } else {
                  echo '<svg viewBox="-0.5 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Google-color</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Color-" transform="translate(-401.000000, -860.000000)"> <g id="Google" transform="translate(401.000000, 860.000000)"> <path d="M9.82727273,24 C9.82727273,22.4757333 10.0804318,21.0144 10.5322727,19.6437333 L2.62345455,13.6042667 C1.08206818,16.7338667 0.213636364,20.2602667 0.213636364,24 C0.213636364,27.7365333 1.081,31.2608 2.62025,34.3882667 L10.5247955,28.3370667 C10.0772273,26.9728 9.82727273,25.5168 9.82727273,24" id="Fill-1" fill="#FBBC05"> </path> <path d="M23.7136364,10.1333333 C27.025,10.1333333 30.0159091,11.3066667 32.3659091,13.2266667 L39.2022727,6.4 C35.0363636,2.77333333 29.6954545,0.533333333 23.7136364,0.533333333 C14.4268636,0.533333333 6.44540909,5.84426667 2.62345455,13.6042667 L10.5322727,19.6437333 C12.3545909,14.112 17.5491591,10.1333333 23.7136364,10.1333333" id="Fill-2" fill="#EB4335"> </path> <path d="M23.7136364,37.8666667 C17.5491591,37.8666667 12.3545909,33.888 10.5322727,28.3562667 L2.62345455,34.3946667 C6.44540909,42.1557333 14.4268636,47.4666667 23.7136364,47.4666667 C29.4455,47.4666667 34.9177955,45.4314667 39.0249545,41.6181333 L31.5177727,35.8144 C29.3995682,37.1488 26.7323182,37.8666667 23.7136364,37.8666667" id="Fill-3" fill="#34A853"> </path> <path d="M46.1454545,24 C46.1454545,22.6133333 45.9318182,21.12 45.6113636,19.7333333 L23.7136364,19.7333333 L23.7136364,28.8 L36.3181818,28.8 C35.6879545,31.8912 33.9724545,34.2677333 31.5177727,35.8144 L39.0249545,41.6181333 C43.3393409,37.6138667 46.1454545,31.6490667 46.1454545,24" id="Fill-4" fill="#4285F4"> </path> </g> </g> </g> </g></svg>';
                }
              ?>
              <span><?php echo h($s['label']); ?></span>
            </a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <?php if(!empty($PopupQR) && file_exists($PopupQR)): ?>
        <div class="oz-qr">
          <img src="<?php echo h($PopupQR); ?>" alt="QR">
          <div>
            <strong>Scan &amp; Visit</strong>
            <div class="oz-tagline"><?php echo h($mainLink ?: ''); ?></div>
          </div>
        </div>
      <?php endif; ?>

    </div>
  </div>
</div>

<script>
(function(){
  const storeKey   = <?php echo json_encode($storeKey); ?>;
  const ttlDays    = <?php echo (int)$PopupTTL; ?>;
  const delayMs    = <?php echo (int)$PopupDelay; ?>;
  const overlay    = document.getElementById('ozPopup');
  const btnClose   = document.getElementById('ozPopupClose');

  if(!overlay) return;

  function seenSet(){
    const exp = Date.now() + (ttlDays * 86400 * 1000);
    localStorage.setItem(storeKey, String(exp));
  }
  function seenValid(){
    const v = Number(localStorage.getItem(storeKey) || 0);
    return v && Date.now() < v;
  }
  function openPopup(){
    overlay.classList.add('is-open');
    overlay.setAttribute('aria-hidden', 'false');
    // focus
    setTimeout(()=>{ try{ btnClose && btnClose.focus(); }catch(e){} }, 50);
  }
  function closePopup(){
    overlay.classList.remove('is-open');
    overlay.setAttribute('aria-hidden', 'true');
    seenSet();
  }

  // Mostrar con retraso sólo si no está visto
  if(!seenValid()){
    setTimeout(openPopup, Math.max(0, delayMs));
  }

  // Cerrar: botón, Esc, clic fuera
  btnClose && btnClose.addEventListener('click', closePopup);
  document.addEventListener('keydown', (e)=>{ if(e.key==='Escape' && overlay.classList.contains('is-open')) closePopup(); });
  overlay.addEventListener('click', (e)=>{ if(e.target === overlay) closePopup(); });
})();
</script>
