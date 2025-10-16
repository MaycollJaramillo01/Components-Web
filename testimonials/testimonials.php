<?php
// ==== Carga JSON de reseñas ====
$jsonPath = __DIR__ . '/data/testimonials.json';
$reviews = [];
if (is_file($jsonPath)) {
  $raw = file_get_contents($jsonPath);
  $reviews = json_decode($raw, true);
  if (!is_array($reviews)) $reviews = [];
}
// Estructura esperada: [{"name":"Alex","rating":5,"text":"...","date":"2024-10-02"}]

// Fallback de ejemplo si no hay data
if (empty($reviews)) {
  $reviews = [
    [
      "name"   => "Yesie Melton",
      "meta"   => "4 reviews · 4 photos",
      "when"   => "1 year ago",
      "rating" => 5,
      "text"   => "The work (two trees removed) was done promptly and professionally. I highly recommend Vasquez for their communication, attention to detail, and safety. We will definitely have them do additional work in our yard.",
      "owner"  => ""
    ],
    [
      "name"   => "Becky G.",
      "meta"   => "7 reviews",
      "when"   => "6 months ago",
      "rating" => 5,
      "text"   => "Vasquez Tree Service provided excellent service. They cleaned up and edged my landscape beds and put down mulch. My yard looks amazing! Highly recommend.",
      "owner"  => "Ms. Becky we really appreciate your business. Thank you for your wonderful review. God bless."
    ],
    [
      "name"   => "Tony Nalley",
      "meta"   => "Local Guide · 34 reviews · 3 photos",
      "when"   => "1 year ago",
      "rating" => 5,
      "text"   => "I recently hired Vasquez Tree Service for tree removal and tree trimming at my property, and I am pleased with the results. Their team was professional, knowledgeable, and efficient throughout the entire process. They carefully removed the tree and cleaned up the area thoroughly.",
      "owner"  => ""
    ],
    [
      "name"   => "Jalen Rose",
      "meta"   => "8 reviews",
      "when"   => "2 years ago",
      "rating" => 5,
      "text"   => "Vasquez Tree Service and Landscaping is the best in the business! It was the best experience that I’ve ever had with any contractor and I will definitely hire them again.",
      "owner"  => "Thank you Jalen, always a pleasure to work for you & everyone else."
    ],
    [
      "name"   => "Lisa McMican Ryle",
      "meta"   => "1 review · 1 photo",
      "when"   => "2 years ago",
      "rating" => 5,
      "text"   => "Absolutely love the company! Great work and fair pricing. Reliable! Forever customer.",
      "owner"  => ""
    ],
    [
      "name"   => "Carrie White",
      "meta"   => "11 reviews",
      "when"   => "1 year ago",
      "rating" => 5,
      "text"   => "Have had this team out for the past couple of years. Highly recommend. Very professional, excellent work, friendly crew and reasonable prices.",
      "owner"  => ""
    ],
    [
      "name"   => "RICHAP RICHAP",
      "meta"   => "Local Guide · 119 reviews · 4 photos",
      "when"   => "2 years ago",
      "rating" => 5,
      "text"   => "Vasquez gave a very reasonable estimate to clear out some invasive honeysuckle, and responded timely. They were professional and arrived precisely at the time they were scheduled to begin. I would use them again.",
      "owner"  => "Thanks for your review RICHAP."
    ],
    [
      "name"   => "ramzi78",
      "meta"   => "1 review",
      "when"   => "1 year ago",
      "rating" => 5,
      "text"   => "Jose is reasonably priced and does a thorough job. He is also knowledgeable and respectful. Would hire again.",
      "owner"  => ""
    ],
    [
      "name"   => "Papi Perez",
      "meta"   => "Local Guide · 19 reviews · 1 photo",
      "when"   => "5 months ago (edited)",
      "rating" => 5,
      "text"   => "Great business, gave me a great quote. Showed up as agreed and took care of business. Will recommend to anyone.",
      "owner"  => ""
    ],
    [
      "name"   => "David Deckard",
      "meta"   => "2 reviews",
      "when"   => "2 years ago",
      "rating" => 5,
      "text"   => "Wonderful job! On time, reasonable rates, and great attention to detail. Would recommend and hire again.",
      "owner"  => ""
    ],
    [
      "name"   => "ProgramCoder",
      "meta"   => "4 reviews",
      "when"   => "2 years ago",
      "rating" => 5,
      "text"   => "Good job. Professional service.",
      "owner"  => ""
    ],
    [
      "name"   => "Mark Harriman",
      "meta"   => "",
      "when"   => "2 years ago",
      "rating" => 5,
      "text"   => "Reviews from the web.",
      "owner"  => ""
    ]
  ];
}

// Stats
$count = count($reviews);
$sum = array_sum(array_map(fn($r) => (int)($r['rating'] ?? 0), $reviews));
$avg = $count ? round($sum / $count, 1) : 5.0;

// Distribución por estrellas
$dist = [5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0];
foreach ($reviews as $r) {
  $rt = max(1, min(5, (int)$r['rating']));
  $dist[$rt]++;
}

// Ordenar más recientes
usort($reviews, function ($a, $b) {
  return strtotime($b['date'] ?? 'now') <=> strtotime($a['date'] ?? 'now');
});

// ===============================================
// ===== INICIO: LÓGICA DE PAGINACIÓN =====
// ===============================================
$reviewsPerPage = 6; // Define cuántas reseñas quieres mostrar por página.
$totalReviews = count($reviews);
$totalPages = ceil($totalReviews / $reviewsPerPage);

// Obtiene la página actual de la URL. Si no existe, es la página 1.
$currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// Asegura que el número de página sea válido (no menor que 1 ni mayor que el total).
$currentPage = max(1, min($totalPages, $currentPage));

// Calcula el "offset" para saber desde qué elemento del array empezar.
$offset = ($currentPage - 1) * $reviewsPerPage;

// Corta el array de reseñas para obtener solo las de la página actual.
$paginatedReviews = array_slice($reviews, $offset, $reviewsPerPage);
// ===============================================
// ===== FIN: LÓGICA DE PAGINACIÓN =====
// ===============================================


// Helper estrellas HTML
function stars($n)
{
  $n = max(1, min(5, (int)$n));
  $out = '';
  for ($i = 1; $i <= 5; $i++) {
    $out .= '<i class="fas fa-star' . ($i <= $n ? ' filled' : '') . '"></i>';
  }
  return $out;
}
?>

<?php if (!empty($_SESSION['flash_success'])) : ?>
  <div class="alert-success" style="margin:16px auto;max-width:960px;padding:12px 16px;border-radius:10px;background:#ecfdf5;border:1px solid #a7f3d0;color:#065f46;font-weight:700;">
    <?= htmlspecialchars($_SESSION['flash_success'], ENT_QUOTES) ?>
  </div>
  <?php unset($_SESSION['flash_success']); ?>
<?php endif; ?>

<section class="section t-wrap">
  <div class="container">
    <div class="t-head">
      <div>
        <span class="eyebrow"><i class="far fa-sparkles me-2"></i> What Clients Say</span>
        <h2 class="title">Real reviews from our customers</h2>
        <p class="lead">Vasquez Tree Service & Landscaping 24/7 mobile support.</p>
      </div>
      <div class="t-cta">
        <?php if (!empty($google)) : ?>
          <a class="btn-primary" href="<?= $google ?>" target="_blank" rel="noopener">
            Leave a Google Review <i class="far fa-external-link ms-2"></i>
          </a>
        <?php endif; ?>
      </div>
    </div>

    <div class="t-stats">
      <div class="t-score">
        <div class="t-score__avg"><?= $avg ?></div>
        <div class="t-score__stars"><?= stars(round($avg)) ?></div>
        <div class="t-score__meta"><?= $count ?> review<?= $count === 1 ? '' : 's' ?></div>
      </div>
      <div class="t-bars">
        <?php for ($s = 5; $s >= 1; $s--) :
          $pct = $count ? round(($dist[$s] / $count) * 100) : 0; ?>
          <div class="t-bar">
            <span class="t-bar__label"><?= $s ?> ★</span>
            <div class="t-bar__track"><span class="t-bar__fill" style="width:<?= $pct ?>%"></span></div>
            <span class="t-bar__count"><?= $dist[$s] ?></span>
          </div>
        <?php endfor; ?>
      </div>
    </div>

    <div class="t-grid">
      <div class="t-col">
        <div class="t-cards">
          <?php
          // ===== MODIFICACIÓN IMPORTANTE =====
          // Ahora usamos el array paginado: $paginatedReviews
          foreach ($paginatedReviews as $r) :
            $name = htmlspecialchars($r['name'] ?? 'Anonymous', ENT_QUOTES);
            $text = htmlspecialchars($r['text'] ?? '', ENT_QUOTES);
            $date = !empty($r['date']) ? date('M j, Y', strtotime($r['date'])) : '';
            $rating = (int)($r['rating'] ?? 5);
          ?>
            <article class="t-card">
              <header class="t-card__head">
                <div class="t-card__avatar" aria-hidden="true"><?= strtoupper(substr($name, 0, 1)) ?></div>
                <div class="t-card__meta">
                  <strong class="t-card__name"><?= $name ?></strong>
                  <span class="t-card__date"><?= $date ?></span>
                </div>
                <div class="t-card__stars"><?= stars($rating) ?></div>
              </header>
              <p class="t-card__text"><?= $text ?></p>
            </article>
          <?php endforeach; ?>
        </div>

        <?php if ($totalPages > 1) : ?>
          <nav class="pagination" aria-label="Page navigation">
            <?php if ($currentPage > 1) : ?>
              <a href="?page=<?= $currentPage - 1 ?>" class="page-link page-arrow">&laquo; Prev</a>
            <?php else : ?>
              <span class="page-link page-arrow disabled">&laquo; Prev</span>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
              <a href="?page=<?= $i ?>" class="page-link <?= ($i == $currentPage) ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>

            <?php if ($currentPage < $totalPages) : ?>
              <a href="?page=<?= $currentPage + 1 ?>" class="page-link page-arrow">Next &raquo;</a>
            <?php else : ?>
              <span class="page-link page-arrow disabled">Next &raquo;</span>
            <?php endif; ?>
          </nav>
        <?php endif; ?>
      </div>

      <div class="float-buttons">
        <a href="https://wa.link/l4f5t4" class="whatsapp" target="_blank" rel="noopener" aria-label="WhatsApp">
          <i class="fab fa-whatsapp"></i>
        </a>
        <a href="https://www.facebook.com/Huipache.live/" class="messenger" target="_blank" rel="noopener" aria-label="Messenger">
          <i class="fab fa-facebook-messenger"></i>
        </a>
      </div>

      <div class="t-col">
        <div class="t-form">
          <h3 class="t-form__title">Leave your review</h3>
          <p class="t-form__hint">We value your feedback. Share your experience with <?= $Company ?>.</p>

          <?php
          // Recupera errores de sesión si los hubiera
          $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
          // no hagas session_unset total; puede borrar otras cosas
          if (isset($_SESSION['errors'])) unset($_SESSION['errors']);
          ?>

          <form method="POST" action="insert.php" id="reviewForm" novalidate>
            <input type="hidden" name="fecha" value="<?= date('Y-m-d') ?>">

            <div class="field">
              <label class="label">Your rating</label>
              <div class="rating">
                <?php for ($i = 5; $i >= 1; $i--) : ?>
                  <input id="r<?= $i ?>" type="radio" name="estrellas" value="<?= $i ?>">
                  <label for="r<?= $i ?>" title="<?= $i ?> stars"><i class="fa fa-star"></i></label>
                <?php endfor; ?>
              </div>
              <small class="error" id="starsError"><?= $errors['stars'] ?? '' ?></small>
            </div>

            <div class="field">
              <label class="label" for="user">Name</label>
              <input class="input" type="text" id="user" name="name" placeholder="Your name">
              <small class="error" id="nameError"><?= $errors['name'] ?? '' ?></small>
            </div>

            <div class="field">
              <label class="label" for="reviews">Comments</label>
              <textarea class="textarea" id="reviews" name="reviews" rows="4" placeholder="Tell us about your experience"></textarea>
              <small class="error" id="reviewsError"><?= $errors['reviews'] ?? '' ?></small>
            </div>

            <div class="field">
              <label class="label">Write the code</label>
              <div class="captcha-row">
                <img id="captchaImg" src="captcha.php?ts=<?= time() ?>" alt="CAPTCHA">
                <button class="btn-ghost" type="button" id="reloadCaptcha"><i class="far fa-rotate"></i></button>
              </div>
              <input class="input mt-1" name="captcha" type="text" placeholder="Enter the code">
              <small class="error" id="captchaError"><?= $errors['captcha'] ?? '' ?></small>
            </div>

            <div class="actions">
              <button type="submit" class="btn-primary">Send Review</button>
              <?php if (!empty($google)) : ?>
                <a class="btn-outline" href="<?= $google ?>" target="_blank" rel="noopener">Review on Google</a>
              <?php endif; ?>
            </div>
          </form>

          <div class="t-note">
            <i class="far fa-shield-check me-2"></i>
            Reviews are moderated to prevent spam. By submitting, you agree to our fair use policy.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
<script>
  // UI: recargar captcha (simple querystring cache-bust)
  document.getElementById('reloadCaptcha')?.addEventListener('click', function() {
    const img = document.getElementById('captchaImg');
    const base = img.src.split('?')[0].replace(/(\?|\&).*$/, ''); // limpia query
    img.src = base + '?ts=' + Date.now();
  });

  // Validación del formulario (corrige estrellas y errores)
  document.getElementById('reviewForm')?.addEventListener('submit', function(e) {
    let valid = true;
    const setErr = (id, msg) => {
      const el = document.getElementById(id);
      if (el) el.textContent = msg || '';
    };
    setErr('captchaError', '');
    setErr('nameError', '');
    setErr('reviewsError', '');
    setErr('starsError', '');

    const name = (this.querySelector('input[name="name"]')?.value || '').trim();
    const txt = (this.querySelector('textarea[name="reviews"]')?.value || '').trim();
    const cap = (this.querySelector('input[name="captcha"]')?.value || '').trim();
    const starInput = this.querySelector('input[name="estrellas"]:checked');
    const stars = starInput ? parseInt(starInput.value, 10) : 0;

    if (!stars || stars < 1 || stars > 5) {
      setErr('starsError', 'Please select a rating.');
      valid = false;
    }
    if (!name) {
      setErr('nameError', 'Name is required.');
      valid = false;
    }
    if (!txt) {
      setErr('reviewsError', 'Comments are required.');
      valid = false;
    }
    if (!cap) {
      setErr('captchaError', 'CAPTCHA is required.');
      valid = false;
    }

    if (!valid) e.preventDefault();
  });
</script>
<style>
  :root {
    --theme-color: #1A9120;
    --gr-color2: #1A9120;
    --yellow-color: #D93030;
    --black-color: #000000;
    --white-color: #1A570D;
    --title-color: #000000;
    --body-color: #333333;
    --bg: #FFFFFF;
    --body-bg: #FFFFFF;
    --smoke-color: #F8F9FA;
    --smoke-color2: #F1F1F1;
    --black-color2: #111111;
    --gray-color: #9CA3AF;
    --success-color: #22C55E;
    --error-color: #D93030;
    --th-border-color: #E5E7EB;
    --line: #E5E7EB;
    --title-font: "Exo", sans-serif;
    --body-font: "Inter", sans-serif;
    --icon-font: "Font Awesome 5";
    --main-container: 1320px;
    --container-gutters: 24px;
    --section-space: 120px;
    --section-space-mobile: 80px;
    --section-title-space: 60px;
    --ripple-ani-duration: 5s;
    --brand-1: #D93030;
    --brand-2: #000000;
    --brand-3: #FFFFFF;
    --txt-1: #000000;
    --txt-2: #333333;
    --h-top: 44px;
    --h-main: 86px;
  }

  .t-wrap .eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 12px;
    border-radius: 999px;
    background: var(--smoke-color2);
    color: var(--title-color);
    font-weight: 700;
  }

  .t-wrap .title {
    margin: 10px 0 0;
    font: 900 clamp(26px, 4vw, 38px)/1.05 var(--title-font);
    color: var(--title-color);
  }

  .t-wrap .lead {
    margin: 6px 0 0;
    color: var(--body-color);
  }

  .t-head {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 16px;
    margin-bottom: 16px;
  }

  .t-cta .btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--theme-color);
    color: #fff;
    padding: 12px 16px;
    border-radius: 12px;
    font-weight: 900;
    text-decoration: none;
  }

  .t-stats {
    display: grid;
    grid-template-columns: 260px 1fr;
    gap: 16px;
    margin-bottom: 16px;
  }

  .t-score {
    background: #fff;
    border: 1px solid var(--th-border-color);
    border-radius: 16px;
    padding: 14px;
    text-align: center;
    box-shadow: 0 10px 28px rgba(2, 6, 23, .06);
  }

  .t-score__avg {
    font: 900 40px/1 var(--title-font);
    color: var(--title-color);
  }

  .t-score__stars .fa-star {
    color: #cbd5e1;
  }

  .t-score__stars .filled {
    color: #f59e0b;
  }

  .t-score__meta {
    color: var(--body-color);
  }

  .t-bars {
    background: #fff;
    border: 1px solid var(--th-border-color);
    border-radius: 16px;
    padding: 14px;
    box-shadow: 0 10px 28px rgba(2, 6, 23, .06);
  }

  .t-bar {
    display: grid;
    grid-template-columns: 52px 1fr 42px;
    align-items: center;
    gap: 8px;
    margin: 6px 0;
  }

  .t-bar__track {
    background: var(--smoke-color);
    height: 10px;
    border-radius: 999px;
    overflow: hidden;
  }

  .t-bar__fill {
    display: block;
    height: 100%;
    background: var(--theme-color);
  }

  .t-grid {
    display: grid;
    grid-template-columns: 1.2fr .8fr;
    gap: 16px;
  }

  @media (max-width:991.98px) {
    .t-stats {
      grid-template-columns: 1fr;
    }

    .t-grid {
      grid-template-columns: 1fr;
    }
  }

  .t-cards {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    gap: 12px;
  }

  .t-card {
    grid-column: span 6;
    background: #fff;
    border: 1px solid var(--th-border-color);
    border-radius: 16px;
    padding: 14px;
    box-shadow: 0 10px 28px rgba(2, 6, 23, .06);
  }

  @media (max-width:767.98px) {
    .t-card {
      grid-column: span 12;
    }
  }

  .t-card__head {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
  }

  .t-card__avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: var(--smoke-color2);
    color: var(--title-color);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 900;
  }

  .t-card__meta {
    display: flex;
    flex-direction: column;
    line-height: 1.1;
  }

  .t-card__name {
    color: var(--title-color);
  }

  .t-card__date {
    color: var(--gray-color);
    font-size: .85rem;
  }

  .t-card__stars .fa-star {
    color: #cbd5e1;
  }

  .t-card__stars .filled {
    color: #f59e0b;
  }

  .t-card__text {
    margin: 0;
    color: var(--body-color);
  }

  .t-form {
    background: #fff;
    border: 1px solid var(--th-border-color);
    border-radius: 16px;
    padding: 16px;
    box-shadow: 0 10px 28px rgba(2, 6, 23, .06);
  }

  .t-form__title {
    margin: 0 0 4px;
    font: 900 22px/1.1 var(--title-font);
    color: var(--title-color);
  }

  .t-form__hint {
    margin: 0 0 12px;
    color: var(--body-color);
  }

  .field {
    margin-bottom: 12px;
  }

  .label {
    display: block;
    font-weight: 800;
    color: var(--title-color);
    margin-bottom: 6px;
  }

  .input,
  .textarea {
    width: 100%;
    border: 1px solid var(--th-border-color);
    border-radius: 10px;
    padding: 10px;
  }

  .rating {
    display: inline-flex;
    flex-direction: row-reverse;
    gap: 6px;
  }

  .rating input {
    display: none;
  }

  .rating label {
    cursor: pointer;
  }

  .rating label .fa-star {
    font-size: 22px;
    color: #cbd5e1;
  }

  .rating input:checked~label .fa-star,
  .rating label:hover .fa-star,
  .rating label:hover~label .fa-star {
    color: #f59e0b;
  }

  .captcha-row {
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .btn-ghost {
    border: 1px solid var(--th-border-color);
    background: #fff;
    padding: 8px 10px;
    border-radius: 10px;
  }

  .actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
  }

  .btn-outline {
    border: 1px solid var(--th-border-color);
    padding: 10px 14px;
    border-radius: 10px;
    font-weight: 800;
    color: var(--title-color);
    text-decoration: none;
  }

  .btn-primary {
    background: var(--theme-color);
    color: #fff;
    padding: 10px 14px;
    border-radius: 10px;
    font-weight: 900;
    text-decoration: none;
  }

  .t-note {
    margin-top: 10px;
    color: var(--body-color);
    font-size: .9rem;
  }

  .float-buttons {
    position: fixed;
    left: 20px;
    bottom: 80px;
    display: flex;
    flex-direction: column;
    gap: 14px;
    z-index: 1100;
  }

  .float-buttons a {
    width: 54px;
    height: 54px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 26px;
    text-decoration: none;
    box-shadow: 0 4px 10px rgba(0, 0, 0, .25);
    transition: all .3s ease;
  }

  .float-buttons a:hover {
    transform: scale(1.1) translateY(-3px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, .35);
  }

  .float-buttons .whatsapp {
    background: #25D366;
  }

  .float-buttons .messenger {
    background: #0084FF;
  }

  @media(max-width: 768px) {
    .float-buttons {
      left: 12px;
      bottom: 70px;
      gap: 12px;
    }

    .float-buttons a {
      width: 48px;
      height: 48px;
      font-size: 22px;
    }
  }

  /* ===== INICIO: ESTILOS DE PAGINACIÓN ===== */
  .pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
    margin-top: 24px;
    padding-top: 16px;
    border-top: 1px solid var(--th-border-color);
    flex-wrap: wrap;
  }

  .pagination .page-link {
    display: inline-block;
    padding: 8px 14px;
    border: 1px solid var(--th-border-color);
    border-radius: 10px;
    background-color: #fff;
    color: var(--title-color);
    font-weight: 700;
    text-decoration: none;
    transition: background-color 0.2s ease, color 0.2s ease;
  }

  .pagination .page-link:hover {
    background-color: var(--smoke-color2);
  }

  .pagination .page-link.active {
    background-color: var(--theme-color);
    color: #fff;
    border-color: var(--theme-color);
    cursor: default;
  }

  .pagination .page-link.disabled {
    color: var(--gray-color);
    pointer-events: none;
    background-color: var(--smoke-color);
  }

  .pagination .page-arrow {
    font-weight: 800;
  }

  /* ===== FIN: ESTILOS DE PAGINACIÓN ===== */
</style>