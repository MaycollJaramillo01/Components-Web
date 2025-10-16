<?php
// =======================================
// partials/hero-video.php — Fullscreen HERO con video de fondo
// Requiere: text.php cargado antes (Company, Phrase, PhoneRef, MailRef, etc.)
// =======================================

@session_start();

// Ruta directa del video (ajusta según tu estructura)
$VIDEO_SRC = $VIDEO_SRC ?? 'assets/img/videos/flyer.mp4';

// Variables de text.php (fallbacks seguros)
$Company      = $Company      ?? 'Your Company';
$Estimates    = $Estimates    ?? 'Free Consultation';
$Experience   = $Experience   ?? '+10 Years';
$CoverageText = $CoverageText ?? 'We Cover: 300 Miles';
$LicenseText  = $LicenseText  ?? 'Licensed & Insured';
$Phrase       = (isset($Phrase) && is_array($Phrase) && count($Phrase)) ? $Phrase : ['Quality you can trust.'];
$PhoneRef     = $PhoneRef     ?? 'tel:0000000000';
$MailRef      = $MailRef      ?? 'mailto:info@example.com';

// Timings (ms)
$PHRASE_INTERVAL = 3200;
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
/* FUENTES: Usaremos Google Fonts para un look moderno */
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&family=Open+Sans:wght@400;600&display=swap');

body {
    font-family: 'Open Sans', sans-serif;
    margin: 0;
    line-height: 1.6;
    color: #333;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* Base para el sr-only text para accesibilidad */
.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
}

/* ======= HERO VIDEO - MEJORADO AL MÁXIMO ======= */
.hero-nova {
  position: relative;
  min-height: 70vh;
  width: 100%;
  overflow: hidden;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #1a1a1a; /* Fallback si no hay video */
}

/* Capa de video al fondo */
.hero-nova__videoWrap {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  pointer-events: none; /* Permite interaccionar con el contenido debajo */
}

.hero-nova__video {
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: brightness(0.8) contrast(1.1); /* Ajustes para mejorar la visibilidad del texto */
  transition: opacity 0.8s ease-in-out; /* Transición suave al cargar */
}

/* Superposición oscura para mayor contraste */
.hero-nova__veil {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 2;
  background: linear-gradient(180deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.4) 50%, rgba(0,0,0,0.7) 100%);
}

/* Contenido superpuesto */
.hero-nova__inner {
  position: relative;
  z-index: 3;
  width: min(1300px, 90vw); /* Ancho máximo para el contenido */
  text-align: center;
  color: #fff;
  padding: clamp(20px, 5vw, 60px) 20px; /* Padding responsivo */
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px; /* Espaciado entre elementos */
}

.hero-nova__badge {
  display: inline-flex;
  gap: 15px;
  align-items: center;
  background-color: rgba(255,255,255,0.15); /* Fondo más sutil */
  border: 1px solid rgba(255,255,255,0.3);
  backdrop-filter: blur(10px); /* Desenfoque más pronunciado */
  border-radius: 50px;
  padding: 12px 25px; /* Más padding */
  font-family: 'Montserrat', sans-serif;
  font-weight: 600;
  font-size: clamp(0.85rem, 1.5vw, 1rem); /* Tamaño de fuente responsivo */
  text-transform: uppercase;
  letter-spacing: 0.05em;
  color: #f0f0f0;
  animation: fadeIn 1s ease-out forwards;
  opacity: 0;
  animation-delay: 0.2s;
}

/* Separador elegante en el badge */
.hero-nova__badge span:first-child::after {
  content: '';
  display: inline-block;
  width: 1px;
  height: 16px;
  background-color: rgba(255,255,255,0.4);
  margin-left: 15px;
  vertical-align: middle;
}

.hero-nova__title {
  font-family: 'Montserrat', sans-serif;
  font-size: clamp(3.5rem, 9vw, 6.5rem); /* Título impactante y responsivo */
  font-weight: 800;
  line-height: 1.05;
  letter-spacing: -0.04em;
  text-transform: uppercase;
  text-shadow: 0 4px 15px rgba(0,0,0,0.6); /* Sombra más pronunciada */
  margin: 15px 0 20px;
  animation: slideInUp 1.2s ease-out forwards;
  opacity: 0;
  animation-delay: 0.4s;
  color: #f0f0f0;
}

.hero-nova__lead {
  font-family: 'Open Sans', sans-serif;
  font-size: clamp(1.1rem, 2.2vw, 1.6rem);
  font-weight: 400;
  margin: 0 0 30px;
  line-height: 1.5;
  text-shadow: 0 2px 8px rgba(0,0,0,0.5);
  max-width: 800px;
  transition: opacity 0.5s ease-in-out;
  animation: fadeIn 1.2s ease-out forwards;
  opacity: 0;
  animation-delay: 0.6s;
  color: #f0f0f0;
}

.hero-nova__cta {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px; /* Más espacio entre botones */
  margin-top: 20px;
  animation: fadeIn 1.2s ease-out forwards;
  opacity: 0;
  animation-delay: 0.8s;
}

.btn-hero {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  height: 58px; /* Botones un poco más grandes */
  padding: 0 30px;
  border-radius: 8px; /* Bordes ligeramente más suaves */
  text-decoration: none;
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  font-size: 1.05rem;
  transition: all 0.3s ease-in-out;
  box-shadow: 0 6px 20px rgba(0,0,0,0.3); /* Sombra más definida */
  text-transform: uppercase;
  letter-spacing: 0.03em;
}

.btn-hero.primary {
  background-color: #00265A; /* Un verde más vibrante y fresco */
  color: #fff;
  border: none;
}

.btn-hero.primary:hover {
  background-color: #001d45; /* Un poco más oscuro al pasar el ratón (CORREGIDO) */
  transform: translateY(-3px) scale(1.02);
  box-shadow: 0 8px 25px rgba(0,0,0,0.4);
}

.btn-hero.secondary {
  background-color: rgba(255,255,255,0.1);
  color: #fff;
  border: 2px solid rgba(255,255,255,0.6); /* Borde más visible */
}

.btn-hero.secondary:hover {
  background-color: rgba(255,255,255,0.2);
  transform: translateY(-3px) scale(1.02);
  box-shadow: 0 8px 25px rgba(0,0,0,0.4);
}

/* Botones de control del video */
.hero-nova__a11y {
  position: absolute;
  top: 25px;
  right: 25px;
  z-index: 4;
  display: flex;
  gap: 10px;
}
.hero-a11y-btn {
  background-color: rgba(0,0,0,0.5);
  color: #fff;
  border: 1px solid rgba(255,255,255,0.5);
  backdrop-filter: blur(8px);
  border-radius: 50%;
  width: 45px; /* Más grandes */
  height: 45px;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}

.hero-a11y-btn:hover {
  background-color: rgba(0,0,0,0.7);
  border-color: #fff;
  transform: scale(1.05);
}

/* Íconos de Font Awesome para los botones de control */
.hero-a11y-btn::before {
  font-family: 'Font Awesome 6 Free'; /* Requiere Font Awesome en tu proyecto */
  font-weight: 900;
  font-size: 1.1rem; /* Iconos más grandes */
  color: #fff;
  line-height: 1;
}
#heroPause::before { content: '\f04c'; /* Icono de pausa */ }
#heroPlay::before { content: '\f04b'; /* Icono de play */ }

/* Animaciones */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

@keyframes slideInUp {
  from { opacity: 0; transform: translateY(40px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Media Queries para Responsividad */
@media (max-width: 768px) {
  .hero-nova__title {
    font-size: clamp(2.5rem, 10vw, 4.5rem);
  }
  .hero-nova__lead {
    font-size: clamp(1rem, 2.8vw, 1.4rem);
  }
  .btn-hero {
    height: 50px;
    padding: 0 20px;
    font-size: 0.9rem;
  }
  .hero-nova__badge {
    padding: 10px 20px;
    font-size: 0.8rem;
    gap: 10px;
  }
  .hero-nova__badge span:first-child::after {
    height: 14px;
    margin-left: 10px;
  }
  .hero-nova__cta {
    gap: 15px;
  }
}

@media (max-width: 480px) {
  .hero-nova__inner {
    padding-left: 15px;
    padding-right: 15px;
  }
  .hero-nova__badge {
    flex-direction: column; /* Apila los elementos en pantallas muy pequeñas */
    gap: 5px;
    padding: 8px 15px;
  }
  .hero-nova__badge span:first-child::after {
    display: none; /* Oculta el separador */
  }
  .hero-nova__cta {
    flex-direction: column;
    align-items: center;
  }
  .btn-hero {
    width: 90%; /* Ocupa casi todo el ancho */
    max-width: 300px;
  }

  h1.hero-nova__title{
    color: #fff !important;
  }
 
}

</style>

<section class="hero-nova" id="hero" aria-label="Homepage hero video">
  <div class="hero-nova__videoWrap" aria-hidden="true">
    <video
      class="hero-nova__video"
      id="heroVideo"
      autoplay
      muted
      loop
      playsinline
      preload="auto"
    >
      <source src="<?= $VIDEO_SRC ?>" type="video/mp4">
    </video>
  </div>

  <div class="hero-nova__veil" aria-hidden="true"></div>

  <div class="hero-nova__inner">
    <div class="hero-nova__badge">
      <span><?= htmlspecialchars($Estimates) ?></span>
      <span><?= htmlspecialchars($Experience) ?></span>
    </div>

    <h1 class="hero-nova__title"><?= htmlspecialchars($Company) ?></h1>

    <p class="hero-nova__lead" id="heroLead"
        data-phrases='<?php echo htmlspecialchars(json_encode(array_values($Phrase), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)); ?>'>
      <?= htmlspecialchars($Phrase[0]) ?>
    </p>

    <div class="hero-nova__cta">
      <a class="btn-hero primary" href="<?= htmlspecialchars($PhoneRef) ?>" aria-label="Call us for a free estimate">Call Now</a>
      <a class="btn-hero secondary" href="<?= htmlspecialchars($MailRef) ?>" aria-label="Get a free estimate by email">Free Estimate</a>
    </div>
  </div>

  <div class="hero-nova__a11y" aria-label="Video controls">
    <button type="button" class="hero-a11y-btn" id="heroPause" aria-pressed="false">
      <span class="sr-only">Pause video</span>
    </button>
    <button type="button" class="hero-a11y-btn" id="heroPlay" aria-pressed="true" hidden>
      <span class="sr-only">Play video</span>
    </button>
  </div>
</section>

<script>
(function(){
  // Rotación de frases (si hay varias)
  const leadEl = document.getElementById('heroLead');
  const phrases = (()=>{try{return JSON.parse(leadEl.dataset.phrases)||[]}catch(e){return [leadEl.textContent.trim()];}})();
  const PHRASE_INTERVAL = <?php echo (int)$PHRASE_INTERVAL; ?>;
  let p=0, tPhrase=null;

  function nextPhrase(){
    if(!phrases.length) return;
    p=(p+1)%phrases.length;
    leadEl.style.opacity = '0';
    setTimeout(()=>{
      leadEl.textContent = phrases[p];
      leadEl.style.opacity = '1';
    }, 500); // Coincide con la transición de CSS
  }
  function startPhrases(){ stopPhrases(); if(phrases.length > 1) tPhrase = setInterval(nextPhrase, PHRASE_INTERVAL); }
  function stopPhrases(){ if(tPhrase) clearInterval(tPhrase); tPhrase = null; }

  // Manejo de video y controles
  const video = document.getElementById('heroVideo');
  const btnPause = document.getElementById('heroPause');
  const btnPlay = document.getElementById('heroPlay');

  const ensurePlay = () => {
    if (video) {
      const p = video.play();
      if (p && typeof p.then === 'function') {
        p.catch((e)=>{
          // Esto puede ocurrir por políticas de autoplay. El video no reproduce automáticamente.
          // En este caso, mostramos el botón de Play.
          if (e.name === "NotAllowedError") {
            btnPause.hidden = true;
            btnPlay.hidden = false;
            btnPlay.setAttribute('aria-pressed', 'false');
            btnPause.setAttribute('aria-pressed', 'true'); // Correcto si está pausado por defecto
          }
        });
      }
    }
  };

  if (video) {
    video.setAttribute('playsinline', '');
    video.setAttribute('muted', '');
    video.muted = true; // Asegurarse de que esté muteado para autoplay

    ensurePlay(); // Intentar reproducir al cargar

    // Eventos de clic para Play/Pause
    btnPause?.addEventListener('click', () => {
      try { video.pause(); } catch(e){}
      stopPhrases();
      btnPause.hidden = true;
      btnPlay.hidden = false;
      btnPause.setAttribute('aria-pressed', 'true');
      btnPlay.setAttribute('aria-pressed', 'false');
    });

    btnPlay?.addEventListener('click', () => {
      ensurePlay(); // Reintentar reproducir
      startPhrases();
      btnPause.hidden = false;
      btnPlay.hidden = true;
      btnPause.setAttribute('aria-pressed', 'false');
      btnPlay.setAttribute('aria-pressed', 'true');
    });
    
    // Inicia la rotación si hay más de una frase al cargar (y el video reproduce)
    if (phrases.length > 1) {
      startPhrases();
    }

    // Ahorro de batería y gestión de visibilidad
    document.addEventListener('visibilitychange', () => {
      if (document.hidden) {
        try { video.pause(); } catch(e){}
        stopPhrases();
        // Cuando la página no está visible, es mejor mostrar el botón de Play por si acaso.
        btnPause.hidden = true;
        btnPlay.hidden = false;
        btnPause.setAttribute('aria-pressed', 'true');
        btnPlay.setAttribute('aria-pressed', 'false');
      } else {
        ensurePlay();
        // Si el video se estaba reproduciendo antes, se reanuda la rotación
        if (!video.paused) {
          startPhrases();
          btnPause.hidden = false;
          btnPlay.hidden = true;
          btnPause.setAttribute('aria-pressed', 'false');
          btnPlay.setAttribute('aria-pressed', 'true');
        }
      }
    }, {passive:true});

    // Reintento en interacción inicial (autoplay policies)
    const kickstart = () => {
      if (video.paused) { // Solo si no ha podido reproducirse automáticamente
        ensurePlay();
        if (!tPhrase && phrases.length > 1) { // Iniciar frases si no lo están y hay más de una
          startPhrases();
        }
      }
      document.removeEventListener('click', kickstart);
      document.removeEventListener('touchstart', kickstart);
    };
    document.addEventListener('click', kickstart, {once:true, passive:true});
    document.addEventListener('touchstart', kickstart, {once:true, passive:true});

  } else {
    // Si no hay video, asegurar que las frases roten si hay más de una
    if (phrases.length > 1) {
      startPhrases();
    }
    // Asegurarse de que los botones de video estén ocultos si no hay video
    if (btnPause) btnPause.hidden = true;
    if (btnPlay) btnPlay.hidden = true;
  }
})();
</script>