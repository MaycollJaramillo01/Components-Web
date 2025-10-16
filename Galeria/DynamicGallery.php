<?php include('php/sections/header.php'); ?>

<section class="banner_area">
  <h2>Gallery</h2>
  <ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li>Gallery</li>
  </ol>
</section>

<section class="gallery-section">
  <div class="container">

    <?php
    // La configuración dinámica de galerías se mantiene igual
    $galleries = [
      "Pavers Patios"      => ["folder" => "pavers_patios",      "count" => 17],
      "Porcelain Deck"     => ["folder" => "porcelain_deck",     "count" => 31],
      "Turf Installation"  => ["folder" => "turf_instalation",   "count" => 7],
      "Travertine Patios"  => ["folder" => "travertine_patios",  "count" => 37],
      "Stepping Stone"     => ["folder" => "stepping_stone",     "count" => 1],
      "Recent Projects"    => ["folder" => "recent_project",     "count" => 21],
      "Cool Deck"          => ["folder" => "cool_deck",          "count" => 36],
      "Retaining Walls"    => ["folder" => "retaining_walls",    "count" => 5],
      "More Photos"        => ["folder" => "more_photos",        "count" => 52],
    ];
    ?>

    <nav class="gallery-nav">
      <?php
      $first = true;
      foreach ($galleries as $title => $info) :
        $id = strtolower(str_replace(' ', '_', $title));
      ?>
        <button class="gallery-nav-button <?php echo $first ? 'active' : ''; ?>" data-target="#<?= $id ?>">
          <?= htmlspecialchars($title) ?>
        </button>
      <?php
        $first = false;
      endforeach;
      ?>
    </nav>

    <div class="gallery-content">
      <?php
      $first = true;
      foreach ($galleries as $title => $info) :
        $id = strtolower(str_replace(' ', '_', $title));
        $folder = "images/gallery/{$info['folder']}";
        $count = $info['count'];
      ?>
        <div class="gallery-pane <?php echo $first ? 'active' : ''; ?>" id="<?= $id ?>">
          <div class="gallery-grid">
          <?php for ($i = $count; $i >= 1; $i--) : ?>
              <?php $path = "{$folder}/{$i}.jpg"; if (!file_exists($path)) continue; ?>
              <figure class="gallery-item">
                <img src="<?= $path ?>" alt="<?= htmlspecialchars($title) ?> Image <?= $i ?>" loading="lazy">
                <a href="<?= $path ?>" class="gallery-popup-link" title="<?= htmlspecialchars($title) ?> - Image <?= $i ?>"></a>
              </figure>
            <?php endfor; ?>
          </div>
        </div>
      <?php
        $first = false;
      endforeach;
      ?>
    </div>

  </div>
</section>

<div id="lightbox" class="lightbox">
  <button class="lightbox-close">&times;</button>
  <button class="lightbox-prev">&#10094;</button>
  <button class="lightbox-next">&#10095;</button>
  <div class="lightbox-content">
    <img src="" class="lightbox-image" alt="Lightbox Image">
    <div class="lightbox-caption"></div>
  </div>
</div>


<style>
  :root {
    --brand-color: #044FA1;
    --light-gray: #f1f3f5;
    --dark-text: #333;
    --white-text: #fff;
    --shadow-color: rgba(0, 0, 0, 0.1);
  }

  /* --- Contenedor Principal de la Galería --- */
  .gallery-section {
    padding: 60px 20px;
    background-color: #fafafa;
  }

  .gallery-section .container {
    max-width: 1200px;
    margin: 0 auto;
  }

  /* --- Navegación de Pestañas --- */
  .gallery-nav {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin-bottom: 40px;
  }

  .gallery-nav-button {
    padding: 10px 20px;
    font-size: 16px;
    font-weight: 600;
    color: var(--dark-text);
    background-color: var(--light-gray);
    border: none;
    border-radius: 30px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
  }

  .gallery-nav-button:hover {
    background-color: #d8dde2;
  }

  .gallery-nav-button.active {
    background-color: var(--brand-color);
    color: var(--white-text);
  }

  /* --- Paneles de Contenido de la Galería --- */
  .gallery-pane {
    display: none;
    animation: fadeIn 0.5s ease-in-out;
  }

  .gallery-pane.active {
    display: block;
  }

  .gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
  }

  /* --- Items de la Galería (Imágenes) --- */
  .gallery-item {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 4px 15px var(--shadow-color);
    aspect-ratio: 1 / 1; /* Mantiene las imágenes cuadradas */
    margin: 0;
  }

  .gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }

  .gallery-item:hover img {
    transform: scale(1.05);
  }
  
  /* --- Enlace para abrir el Lightbox --- */
  .gallery-popup-link {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.2);
    opacity: 0;
    transition: opacity 0.4s ease;
  }

  .gallery-item:hover .gallery-popup-link {
    opacity: 1;
  }

  .gallery-popup-link::before {
    content: '+';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.8);
    color: var(--white-text);
    font-size: 50px;
    font-weight: bold;
    opacity: 0;
    transition: transform 0.3s, opacity 0.3s;
  }

  .gallery-item:hover .gallery-popup-link::before {
    transform: translate(-50%, -50%) scale(1);
    opacity: 1;
  }

  /* --- Estilos del Lightbox --- */
  .lightbox {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.85);
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s, visibility 0.3s;
  }

  .lightbox.active {
    opacity: 1;
    visibility: visible;
  }

  .lightbox-content {
    position: relative;
    max-width: 90%;
    max-height: 85%;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .lightbox-image {
    max-width: 100%;
    max-height: 100%;
    border-radius: 5px;
    animation: zoomIn 0.4s;
  }
  
  .lightbox-caption {
      color: #ccc;
      margin-top: 15px;
      font-size: 16px;
      text-align: center;
  }

  .lightbox-close,
  .lightbox-prev,
  .lightbox-next {
    position: absolute;
    background: none;
    border: none;
    color: var(--white-text);
    cursor: pointer;
    font-size: 2.5rem;
    z-index: 1001;
    transition: transform 0.2s, color 0.2s;
  }
  
  .lightbox-close:hover,
  .lightbox-prev:hover,
  .lightbox-next:hover {
      color: #ddd;
  }

  .lightbox-close {
    top: 20px;
    right: 30px;
    font-size: 3rem;
  }

  .lightbox-prev,
  .lightbox-next {
    top: 50%;
    transform: translateY(-50%);
  }

  .lightbox-prev {
    left: 20px;
  }

  .lightbox-next {
    right: 20px;
  }

  /* --- Animaciones --- */
  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }

  @keyframes zoomIn {
    from { transform: scale(0.8); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
  }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {

  // --- LÓGICA DE PESTAÑAS (TABS) ---
  const tabButtons = document.querySelectorAll('.gallery-nav-button');
  const tabPanes = document.querySelectorAll('.gallery-pane');

  tabButtons.forEach(button => {
    button.addEventListener('click', () => {
      // Ocultar todos los paneles y desactivar todos los botones
      tabButtons.forEach(btn => btn.classList.remove('active'));
      tabPanes.forEach(pane => pane.classList.remove('active'));

      // Activar el botón presionado y el panel correspondiente
      button.classList.add('active');
      const targetPane = document.querySelector(button.dataset.target);
      if (targetPane) {
        targetPane.classList.add('active');
      }
    });
  });

  // --- LÓGICA DEL LIGHTBOX ---
  const lightbox = document.getElementById('lightbox');
  const lightboxImage = lightbox.querySelector('.lightbox-image');
  const lightboxCaption = lightbox.querySelector('.lightbox-caption');
  const closeButton = lightbox.querySelector('.lightbox-close');
  const prevButton = lightbox.querySelector('.lightbox-prev');
  const nextButton = lightbox.querySelector('.lightbox-next');

  let currentGallery = [];
  let currentIndex = 0;

  // Función para mostrar una imagen en el lightbox
  function showImage(index) {
    if (index >= 0 && index < currentGallery.length) {
      const imageLink = currentGallery[index];
      lightboxImage.src = imageLink.href;
      lightboxCaption.textContent = imageLink.title || '';
      currentIndex = index;
    }
  }
  
  // Función para abrir el lightbox
  function openLightbox(event) {
    // Solo actuar sobre los enlaces de la galería
    if (event.target.classList.contains('gallery-popup-link')) {
      event.preventDefault();
      
      // Obtener todas las imágenes visibles en el panel activo actual
      const activePane = document.querySelector('.gallery-pane.active');
      currentGallery = Array.from(activePane.querySelectorAll('.gallery-popup-link'));
      
      const clickedLink = event.target;
      const clickedIndex = currentGallery.indexOf(clickedLink);

      lightbox.classList.add('active');
      showImage(clickedIndex);
    }
  }
  
  // Función para cerrar el lightbox
  function closeLightbox() {
    lightbox.classList.remove('active');
    lightboxImage.src = ''; // Limpiar la imagen para evitar que se vea al cerrar
  }
  
  // Función para mostrar la imagen siguiente/anterior
  function navigate(direction) {
    const newIndex = currentIndex + direction;
    if (newIndex >= 0 && newIndex < currentGallery.length) {
      showImage(newIndex);
    } else if (newIndex < 0) { // Navegar al final si se está en la primera
        showImage(currentGallery.length - 1);
    } else { // Navegar al inicio si se está en la última
        showImage(0);
    }
  }

  // Asignar eventos
  document.querySelector('.gallery-content').addEventListener('click', openLightbox);
  closeButton.addEventListener('click', closeLightbox);
  lightbox.addEventListener('click', (e) => { // Cerrar al hacer clic fuera de la imagen
    if (e.target === lightbox) {
      closeLightbox();
    }
  });
  prevButton.addEventListener('click', () => navigate(-1));
  nextButton.addEventListener('click', () => navigate(1));

  // Navegación con teclado
  document.addEventListener('keydown', (e) => {
    if (lightbox.classList.contains('active')) {
      if (e.key === 'ArrowRight') navigate(1);
      if (e.key === 'ArrowLeft') navigate(-1);
      if (e.key === 'Escape') closeLightbox();
    }
  });

});
</script>

<?php include('php/sections/call-action.php'); ?>
<?php include('php/sections/seccion-socialmedia.php'); ?>
<?php include('php/sections/footer.php'); ?>