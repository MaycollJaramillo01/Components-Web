<?php
// Rutas robustas a /parts
$PARTS_DIR = is_dir(__DIR__ . '/parts') ? (__DIR__ . '/parts') : dirname(__DIR__);
require_once($PARTS_DIR . '/header/header-4.php');

$page_title = "Our Gallery";
include($PARTS_DIR . '/sections/page-title.php');
?>

<style>
/* ===== Tabs minimal, accesibles ===== */
.tabs { display:flex; justify-content:center; gap:10px; margin: 0 0 28px; flex-wrap:wrap; }
.tab-btn{
  appearance:none; border:1px solid rgba(255,255,255,.14); background:rgba(255,255,255,.02);
  padding:10px 16px; border-radius:12px; font-weight:600; cursor:pointer;
  transition:background .2s ease, border-color .2s ease, transform .2s ease;
}
.tab-btn[aria-selected="true"]{ background:rgba(255,255,255,.10); border-color:rgba(255,255,255,.36); }
.tab-btn:hover{ transform:translateY(-1px); }

.tab-panel{ display:none; }
.tab-panel[data-active="true"]{ display:block; }

/* ===== Grid reutilizable ===== */
.gx-24{ --gx:24px;  }
.gx-24>[class*="col-"]{ padding-left: calc(var(--gx)/2); padding-right: calc(var(--gx)/2); }
.row.gx-24{ margin-left: calc(var(--gx)/-2); margin-right: calc(var(--gx)/-2); }

.project-card3.style2 .project-thumb{ border-radius:16px; overflow:hidden; }
.project-card3.style2 .project-thumb img,
.project-card3.style2 .project-thumb video{ width:100%; height:auto; display:block; }
.project-card3 .project-card-details{ position:absolute; top:10px; right:10px; z-index:2; }
.popup-image{ display:inline-flex; border-radius:999px; border:1px solid rgba(255,255,255,.25); background:rgba(0,0,0,.5); }
.popup-image i{ line-height:1; }
.tab-btn[aria-selected="true"] {
    background-color: #0f8df0 !important;
    color: #fff !important;
}
#panel-images .project-card3 .project-thumb {
  width: 100%;
  height: 320px; /* 🔹 ajusta el alto a lo que necesites (ej. 300–400px) */
  overflow: hidden;
  border-radius: 12px; /* opcional, bordes redondeados */
}

#panel-images .project-card3 .project-thumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;   /* recorta manteniendo proporción */
  display: block;
}
</style>

<!--==============================
    Gallery with Tabs
==============================-->
<section class="project-area-3 pt-120 pb-120 overflow-hidden" aria-labelledby="gallery-title">
  <div class="container">
    <header class="section__title text-center mb-30">
      <span class="sub-title text-anim">Our Work</span>
      <h2 id="gallery-title" class="title text-anim2">Gallery</h2>
    </header>

    <!-- Tabs -->
    <div class="tabs" role="tablist" aria-label="Gallery tabs">
      <button id="tab-images" class="tab-btn" role="tab" aria-controls="panel-images" aria-selected="true">Images</button>
      <button id="tab-videos" class="tab-btn" role="tab" aria-controls="panel-videos" aria-selected="false">Videos</button>
    </div>

    <!-- Panel: Images -->
    <div id="panel-images" class="tab-panel" role="tabpanel" aria-labelledby="tab-images" data-active="true">
      <div class="row gy-30 gx-24">
        <?php for ($i = 1; $i <= 3; $i++): ?>
          <div class="col-lg-6">
            <div class="project-card3 style2 position-relative">
              <div class="project-thumb image-anim">
                <img src="assets/img/project/project3-<?php echo $i; ?>.jpg" alt="Project image <?php echo $i; ?>">
              </div>
              <div class="project-card-details">
                <span class="project-card-tag">
                  <a class="popup-image" href="assets/img/project/project3-<?php echo $i; ?>.jpg" aria-label="Open image <?php echo $i; ?>">
                    <i class="fas fa-search fs-2 p-3" aria-hidden="true"></i>
                  </a>
                </span>
              </div>
            </div>
          </div>
        <?php endfor; ?>
      </div>
    </div>

    <!-- Panel: Videos -->
    <div id="panel-videos" class="tab-panel" role="tabpanel" aria-labelledby="tab-videos" data-active="false">
      <div class="row gy-30 gx-24 mt-10">
        <?php for ($i = 1; $i <= 1; $i++): ?>
          <div class="col-lg-4 col-md-6">
            <div class="project-card3 style2">
              <div class="project-thumb video-anim">
                <video width="100%" height="240" controls preload="metadata"
                       >
                  <source src="assets/img/project/video/<?php echo $i; ?>.mp4" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
            </div>
          </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>
</section>

<script>
// Tabs accesibles (teclado y hash)
(function(){
  const tabs = document.querySelectorAll('[role="tab"]');
  const panels = {
    'tab-images': document.getElementById('panel-images'),
    'tab-videos': document.getElementById('panel-videos'),
  };

  function activate(id, pushHash=true){
    tabs.forEach(t => t.setAttribute('aria-selected', String(t.id === id)));
    Object.entries(panels).forEach(([key, el]) => {
      el?.setAttribute('data-active', String(key === id));
    });
    if (pushHash) history.replaceState(null, '', '#' + id.replace('tab-',''));
  }

  tabs.forEach(tab => {
    tab.addEventListener('click', () => activate(tab.id));
    tab.addEventListener('keydown', (e) => {
      const idx = Array.from(tabs).indexOf(tab);
      if (e.key === 'ArrowRight') { tabs[(idx+1)%tabs.length].focus(); }
      if (e.key === 'ArrowLeft')  { tabs[(idx-1+tabs.length)%tabs.length].focus(); }
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); activate(tab.id); }
    });
  });

  // Activaci贸n por hash (#images | #videos)
  const hash = location.hash.replace('#','');
  if (hash === 'videos') activate('tab-videos', false);
  else activate('tab-images', false);
})();
</script>

<?php require_once($PARTS_DIR . '/footer/footer-4.php'); ?>
