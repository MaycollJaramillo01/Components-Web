<?php
// popup.php (PARCIAL) — NO DOCTYPE/HEAD/BODY/JS GLOBALES AQUI

if (!function_exists('h')) {
  function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
}

// Resolver variables: prioriza *_popup si existen; luego globales; luego fallback
$pop_company   = $company_popup   ?? $company   ?? 'Your Company';
$pop_services  = $services_popup  ?? $services  ?? 'Services';
$pop_phone     = $phone_popup     ?? $phone     ?? '(000) 000-0000';
$pop_phone_ref = $phone_ref_popup ?? $phone_ref ?? 'tel:0000000000';
$pop_mail      = $mail_popup      ?? $mail      ?? 'info@example.com';
$pop_mail_ref  = $mail_ref_popup  ?? $mail_ref  ?? 'mailto:info@example.com';
$pop_address   = $address_popup   ?? $address   ?? 'City, ST';
$pop_exp       = $experience_popup ?? $experience ?? '10 Years';
$pop_licen     = $licen_popup     ?? $licen     ?? 'Licensed & Insured';
$pop_lang      = $bilingual_popup ?? $bilingual ?? 'English & Spanish';
$pop_pay       = $payment_popup   ?? $payment   ?? 'Cash';
$pop_sched     = $schedule_popup  ?? $schedule  ?? 'Mon–Fri 9–5';
$pop_est       = $estimates_popup ?? $estimates ?? 'Free Estimates';
$pop_houzz     = $houzz_popup     ?? $houzz     ?? '#';
$pop_youtube   = $youtube_popup   ?? $youtube   ?? '#';
$pop_logo      = $logo            ?? 'img/logo.png';
$pop_map       = $GoogleMap       ?? ''; // puede venir de fuera

$delay = isset($popupDelayMs) ? (int)$popupDelayMs : (isset($popupDelayMs_popup)?(int)$popupDelayMs_popup:2500);
$ttl   = isset($popupTTLDays) ? (int)$popupTTLDays : (isset($popupTTLDays_popup)?(int)$popupTTLDays_popup:7);

// $is_home debe venir del archivo que incluye este parcial
$home_flag = isset($is_home) ? (bool)$is_home : false;
?>

<style>
  .popup-open{overflow:hidden}
  .popup-overlay{position:fixed; inset:0; background:rgba(0,0,0,.78); display:none; opacity:0;
    z-index:99999; transition:opacity .25s ease; overflow-y:auto; overflow-x:hidden;
    display:flex; align-items:flex-start; justify-content:center;
    padding:max(12px, env(safe-area-inset-top)) 12px max(12px, env(safe-area-inset-bottom));
  }
  .popup-overlay.show{display:flex; opacity:1}
  .popup-content{background:#fff; box-shadow:0 24px 60px rgba(0,0,0,.35); border-radius:16px; overflow:hidden;
    width:min(840px, 96vw); display:grid; grid-template-columns:1fr 1fr;
  }
  @media (max-width:768px){
    .popup-content{grid-template-columns:1fr; width:min(720px,96vw); margin:10px 0;}
  }
  .popup-left{display:flex; flex-direction:column; position:relative}
  .popup-header{background:linear-gradient(135deg,#1aabe3,#0e7aa7); color:#fff; text-align:center; padding:22px 18px 14px; position:relative;}
  .popup-header img{width:clamp(120px,26vw,170px); height:auto; display:block; margin:0 auto 10px; object-fit:contain;}
  .popup-header h3{margin:0; font-weight:800; font-size:clamp(1.35rem,2.2vw,1.8rem)}
  .popup-header p{margin:6px 0 0; opacity:.9; font-size:.98rem}
  .close-btn{position:absolute; top:10px; right:10px; width:42px; height:42px; border-radius:999px; display:grid; place-items:center; cursor:pointer;
    background:rgba(255,255,255,.22); border:1px solid rgba(255,255,255,.45); color:#fff; backdrop-filter:blur(6px); z-index:5;
    transition:transform .15s ease, background .2s ease;}
  .close-btn:hover{transform:scale(1.06); background:rgba(255,255,255,.3)}
  .popup-body{padding:18px 20px; display:grid; gap:10px; color:#333; font-size:.96rem;}
  .popup-body p{margin:0; display:flex; align-items:center; gap:10px;}
  .popup-body i{color:#1aabe3; width:22px; text-align:center;}
  .popup-body a{color:#1aabe3; text-decoration:none;}
  .popup-body a:hover{text-decoration:underline;}
  .popup-foot{background:#f7f9fb; padding:14px 20px 16px; display:grid; gap:10px; border-top:3px solid rgb(243,146,40);}
  .popup-foot h4{margin:0; font-size:1rem; font-weight:700; color:#1aabe3;}
  .social-links{display:flex; gap:16px;}
  .social-links a{font-size:1.6rem; color:#1aabe3;}
  .social-links a:hover{color:rgb(243,146,40);}
  .popup-right{background:#eef5f9; padding:12px; display:flex; align-items:center; justify-content:center;}
  .popup-right iframe{width:100%; height:100%; min-height:340px; border:0; border-radius:12px;}
  @media (max-width:768px){ .popup-right iframe{min-height:260px; border-radius:0 0 16px 16px;} }
</style>

<div id="infoPopup" class="popup-overlay" aria-hidden="true">
  <div class="popup-content">
    <div class="popup-left">
      <div class="popup-header">
        <button class="close-btn" type="button" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
        <img src="<?=h($pop_logo)?>" alt="Logo <?=h($pop_company)?>">
        <h3><?=h($pop_company)?></h3>
        <p><?=h($pop_services)?></p>
      </div>

      <div class="popup-body">
        <p><i class="fa-solid fa-phone"></i> <a href="<?=h($pop_phone_ref)?>"><?=h($pop_phone)?></a></p>
        <p><i class="fa-solid fa-envelope"></i> <a href="<?=h($pop_mail_ref)?>"><?=h($pop_mail)?></a></p>
        <p><i class="fa-solid fa-location-dot"></i> <?=h($pop_address)?></p>
        <p><i class="fa-solid fa-briefcase"></i> <strong>Experience:</strong> <?=h($pop_exp)?></p>
        <p><i class="fa-solid fa-shield-halved"></i> <strong>License:</strong> <?=h($pop_licen)?></p>
        <p><i class="fa-solid fa-language"></i> <strong>Languages:</strong> <?=h($pop_lang)?></p>
        <p><i class="fa-solid fa-credit-card"></i> <strong>Payments:</strong> <?=h($pop_pay)?></p>
        <p><i class="fa-regular fa-clock"></i> <strong>Schedule:</strong> <?=h($pop_sched)?></p>
        <p><i class="fa-solid fa-check"></i> <em><?=h($pop_est)?></em></p>
      </div>

      <div class="popup-foot">
        <h4>Follow us & get a free estimate</h4>
        <div class="social-links">
          <a href="<?=h($pop_houzz)?>" target="_blank" rel="noopener"><i class="fab fa-houzz"></i></a>
          <a href="<?=h($pop_youtube)?>" target="_blank" rel="noopener"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
    </div>

    <div class="popup-right">
      <?= $pop_map ?>
    </div>
  </div>
</div>

<script>
(function(){
  var popup = document.getElementById('infoPopup');
  if(!popup) return;
  var btn = popup.querySelector('.close-btn');
  var KEY='popupSeenUntil';
  var delay=<?= $delay ?>, ttl=<?= $ttl ?>;
  var home=<?= $home_flag ? 'true' : 'false' ?>;
  var now=function(){return Date.now();};
  var days=function(n){return n*86400000;};
  function open(){ popup.classList.add('show'); document.body.classList.add('popup-open'); }
  function close(){ popup.classList.remove('show'); document.body.classList.remove('popup-open'); }
  if(btn) btn.addEventListener('click', close);
  popup.addEventListener('click', function(e){ if(e.target===popup) close(); });
  if(home){
    var until=+localStorage.getItem(KEY)||0;
    if(location.hash==='#contacto' || until<now()){
      setTimeout(function(){ open(); localStorage.setItem(KEY, now()+days(ttl)); }, delay);
    }
  }
})();
</script>
