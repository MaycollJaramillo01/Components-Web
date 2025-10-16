<?php
// === Company Info ===
$Company       = "Azteca Insulation LLC";
$Domain        = "https://aztecainsulationllc.net";
$Address       = "Lothian, MD 20711";
$Mail          = "aztecainsulationllc@yahoo.com";
$TypeOfService = "Residential and Commercial Services";
$Estimates     = "Free Estimates Are Available";
$Experience    = "15 Years of Experience";
$Schedule      = "Mon–Fri: 8:00AM–4:00PM / Sat: 8:00AM–12:00PM";
$Bilingual     = "English & Spanish";
$License       = "Fully Licensed & Insured";

// Phones
$PhoneName     = "Main Phone:";
$Phone         = "(240) 419-1470";
$Phone2Name    = "Secondary Number:";
$Phone2        = "(301) 885-8945";
$Phone3        = "";

// Socials
$facebook      = "https://www.facebook.com/p/Azteca-insulation-LLC-100066834284828";
$instagram     = "https://www.instagram.com/aztecainsulationllc/";
$google        = "https://g.co/kgs/2q1BtfV";

// Helpers
function h($s) { return htmlspecialchars((string)$s, ENT_QUOTES, "UTF-8"); }
function only_digits($s) { return preg_replace("/\D+/", "", (string)$s); }
function tel_href($raw) { $d = only_digits($raw); return $d ? "tel:+1{$d}" : "#"; }
function wa_href($raw, $msg = "") { 
    $d = only_digits($raw); 
    if (!$d) return "#"; 
    $m = $msg ? "&text=" . rawurlencode($msg) : ""; 
    return "https://wa.me/1{$d}{$m}"; 
}
function mailto_href($mail) { return filter_var($mail, FILTER_VALIDATE_EMAIL) ? "mailto:" . $mail : "#"; }

// Arrays
$all_phones = [];
if (!empty($Phone))  $all_phones[] = [$PhoneName, $Phone];
if (!empty($Phone2)) $all_phones[] = [$Phone2Name, $Phone2];
if (!empty($Phone3)) $all_phones[] = ["Phone", $Phone3];

$socials = [];
if (!empty($facebook)) $socials[] = ["Facebook", "fab fa-facebook-f", $facebook];
if (!empty($instagram)) $socials[] = ["Instagram", "fab fa-instagram", $instagram];
if (!empty($google))   $socials[] = ["Google", "fab fa-google", $google];

// Primary phone for buttons
$primary_phone = $Phone ?? $Phone2 ?? "";
$callURL = tel_href($primary_phone);
$waMsg   = "Hi! I'm interested in insulation services from {$Company}.";
$waURL   = wa_href($primary_phone, $waMsg);

// Map
$map = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d399436.319632431!2d-76.8826505298829!3d38.82455112185202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7e71c695a7329%3A0x13823ad63503383!2sLothian%2C%20MD%2C%20USA!5e0!3m2!1sen!2sni!4v1728801931326!5m2!1sen!2sni" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';

// QR
$vcard = "BEGIN:VCARD\nVERSION:3.0\nFN:{$Company}\nORG:{$Company}\n".
         "TEL;TYPE=CELL:+1".only_digits($primary_phone)."\n".
         "EMAIL;TYPE=INTERNET:{$Mail}\n".
         "ADR;TYPE=WORK:;;{$Address};;;;\n".
         "URL:{$Domain}\nEND:VCARD";
$qrURL = "https://api.qrserver.com/v1/create-qr-code/?size=320x320&data=" . rawurlencode($vcard);

// Aliases
$company = $Company;
$type    = $TypeOfService;
$exp     = $Experience;
$est     = $Estimates;
$lic     = $License;
$bil     = $Bilingual;
$addr    = $Address;
$mail    = $Mail;
$site    = $Domain;
$phone_main = $primary_phone;
$logo    = "assets/img/logo-white.png";
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?= h($company) ?> — Business Card</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
/* === Google Font: Poppins === */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

/* === CSS Variables === */
:root{
  --primary:#0f4c81;
  --primary-dark:#0c3c68;
  --secondary:#64748b;
  --accent:#f59e0b;
  --success:#10b981;
  --background:#f8fafc;
  --surface:#ffffff;
  --text-primary:#0f172a;
  --text-secondary:#64748b;
  --border:#e2e8f0;
  --radius-xl:1rem;
}

/* === Keyframes para Animaciones === */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes float {
  0% {
    transform: translateY(0px);
  }
  50% {
    transform: translateY(-5px);
  }
  100% {
    transform: translateY(0px);
  }
}

/* === Estilos Base y Layout === */
body{
  font-family: 'Poppins', sans-serif;
  background:linear-gradient(135deg,#0f4c81 0%,#fff 100%);
  margin:0;
  color:var(--text-primary);
}

.wrapper{
  min-height:100vh;
  display:flex;
  align-items:center;
  justify-content:center;
  padding:2rem;
}

.card{
  display:grid;
  grid-template-columns:1fr 400px;
  max-width:1200px;
  width:100%;
  background:var(--surface);
  border-radius:var(--radius-xl);
  overflow:hidden;
  box-shadow:0 20px 40px rgba(0,0,0,0.15);
  animation: fadeInUp 0.8s ease-out;
}

@media(max-width:900px){
  .card{
    grid-template-columns:1fr;
    max-width:600px;
  }
}

.left{
  padding:3rem;
  & > * {
    opacity: 0;
    animation: fadeInUp 0.6s ease-out forwards;
  }
  & > *:nth-child(1) { animation-delay: 0.2s; } /* Logo */
  & > *:nth-child(2) { animation-delay: 0.3s; } /* h1 */
  & > *:nth-child(3) { animation-delay: 0.4s; } /* p */
  & > *:nth-child(4) { animation-delay: 0.5s; } /* badges */
  & > *:nth-child(5) { animation-delay: 0.6s; } /* actions */
  & > *:nth-child(6) { animation-delay: 0.7s; } /* block 1 */
  & > *:nth-child(7) { animation-delay: 0.8s; } /* block 2 */
  & > *:nth-child(8) { animation-delay: 0.9s; } /* block 3 */
}

.right{
  background:linear-gradient(135deg,#0c3c68,#162e4a);
  color:#fff;
  padding:3rem;
  text-align:center;
  display:flex;
  flex-direction:column;
  align-items:center;
  gap:2rem;
}

/* === Estilos de Componentes Mejorados === */
.logo img{
  width:100px;
  height:auto;
}

h1{
  font-size:2.2rem;
  margin:.5rem 0;
  font-weight: 700;
}

.badge{
  display:inline-block;
  background:var(--primary);
  color:#fff;
  padding:.5rem 1rem;
  border-radius:.5rem;
  margin:.25rem;
  font-weight:600;
  transition: all 0.3s ease;
}
.badge:hover {
  transform: scale(1.05);
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.actions{
  margin:1.5rem 0;
  display:flex;
  flex-wrap:wrap;
  gap:1rem;
}

.btn{
  display:inline-flex;
  align-items:center;
  gap:.5rem;
  padding:.75rem 1.25rem;
  border-radius:.5rem;
  text-decoration:none;
  font-weight:600;
  font-size:.95rem;
  border:2px solid transparent;
  transition: all 0.3s ease-in-out;
}

.btn:hover{
  transform: translateY(-4px);
  box-shadow: 0 10px 15px rgba(0,0,0,0.1);
}

.btn-primary{background:var(--primary);color:#fff;}
.btn-primary:hover{background:var(--primary-dark);}

.btn-success{background:#10b981;color:#fff;}
.btn-success:hover{background:#0f9b6c;}

.btn-secondary{background:#fff;color:var(--primary);border:2px solid var(--primary);}
.btn-secondary:hover{background:var(--primary);color:#fff;}

.btn i {
  animation: float 4s ease-in-out infinite;
}

.block{
  background:#f9fafb;
  border-radius:.75rem;
  border:1px solid var(--border);
  margin-top:1.5rem;
}

.block-header{
  padding:1rem 1.25rem;
  border-bottom:1px solid var(--border);
  font-weight:700;
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.block-content{padding:1.25rem;}

.contact-list{list-style:none;margin:0;padding:0;}
.contact-list li{margin-bottom:.75rem;}
.contact-list a{
  text-decoration:none;
  color:var(--text-primary);
  font-weight:500;
  transition: color 0.3s ease;
}
.contact-list a:hover{color:var(--primary);}

.block-content.social-links {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
}
.block-content.social-links a {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 45px;
  height: 45px;
  font-size: 1.5rem;
  color: var(--primary);
  background-color: #eef2f6;
  border-radius: 0.5rem;
  text-decoration: none;
  transition: all 0.3s ease;
}
.block-content.social-links a:hover {
  background-color: var(--primary);
  color: #fff;
  transform: translateY(-5px) scale(1.1);
  box-shadow: 0 8px 12px rgba(0,0,0,0.1);
}

.qr-section img{
  width:200px;
  height:200px;
  background:#fff;
  border-radius:.75rem;
  padding:1rem;
  transition: transform 0.3s ease;
}
.qr-section img:hover {
  transform: scale(1.05);
}

.footer-note{
  color:rgba(255,255,255,.7);
  font-size:.85rem;
  margin-top:auto;
}
</style>
</head>
<body>
<div class="wrapper">
  <div class="card">
    <section class="left">
      <div class="logo"><img src="<?=h($logo)?>" alt="<?=h($company)?> Logo"></div>
      <h1><?=h($company)?></h1>
      <p><?=h($type)?></p>
      <div class="badges">
        <span class="badge"><?=h($exp)?></span>
        <span class="badge"><?=h($est)?></span>
        <span class="badge"><?=h($lic)?></span>
        <span class="badge"><?=h($bil)?></span>
      </div>

      <div class="actions">
        <a href="<?=h($callURL)?>" class="btn btn-primary"><i class="fas fa-phone"></i>Call Now</a>
        <a href="<?=h($waURL)?>" target="_blank" class="btn btn-success"><i class="fab fa-whatsapp"></i>WhatsApp</a>
        <a href="<?=h(mailto_href($mail))?>" class="btn btn-secondary"><i class="fas fa-envelope"></i>Email</a>
        <a href="<?=h($site)?>" target="_blank" class="btn btn-secondary"><i class="fas fa-globe"></i>Website</a>
      </div>

      <div class="block">
        <div class="block-header"><i class="fas fa-address-book"></i> Contact Info</div>
        <div class="block-content">
          <ul class="contact-list">
            <?php foreach($all_phones as list($name,$num)):?>
              <li><strong><?=h($name)?> </strong><a href="<?=h(tel_href($num))?>"><?=h($num)?></a></li>
            <?php endforeach;?>
            <li><strong>Email:</strong> <a href="<?=h(mailto_href($mail))?>"><?=h($mail)?></a></li>
            <li><strong>Hours:</strong> <?=h($Schedule)?></li>
            <li><strong>Address:</strong> <?=h($addr)?></li>
          </ul>
        </div>
      </div>

      <div class="block">
        <div class="block-header"><i class="fas fa-map-marker-alt"></i> Location</div>
        <div class="block-content"><?=$map?></div>
      </div>

      <div class="block">
        <div class="block-header"><i class="fas fa-share-alt"></i> Follow Us</div>
        <div class="block-content social-links">
          <?php foreach($socials as [$lbl,$ico,$url]):?>
            <a href="<?=h($url)?>" target="_blank" title="<?=h($lbl)?>"><i class="<?=h($ico)?>"></i></a>
          <?php endforeach;?>
        </div>
      </div>
    </section>

    <aside class="right">
      <div class="qr-section">
        <img src="<?=h($qrURL)?>" alt="QR Code for <?=h($company)?>">
        <small>Scan to save contact (vCard)</small>
      </div>
      <div class="actions">
        <a href="<?=h($waURL)?>" class="btn btn-primary" target="_blank"><i class="fab fa-whatsapp"></i>Send WhatsApp</a>
        <a href="<?=h($callURL)?>" class="btn btn-secondary"><i class="fas fa-phone"></i>Call <?=h($phone_main)?></a>
      </div>
      <div class="footer-note">© <?=date('Y')?> <?=h($company)?> · All Rights Reserved</div>
    </aside>
  </div>
</div>
</body>
</html>