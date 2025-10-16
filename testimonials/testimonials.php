<?php include('header2.php'); ?>

<!--==============================
    Breadcumb
============================== -->
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" style="color:#fff">Testimonials</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.php" style="color:#fff">Home</a></li>
                <li style="color:#fff">Testimonials</li>
            </ul>
        </div>
    </div>
</div>

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
            "name"   => "Carlos Martinez",
            "meta"   => "3 reviews",
            "when"   => "2 months ago",
            "rating" => 5,
            "text"   => "DA Concrete & Landscape LLC did an excellent job building our new concrete patio. They were on time, professional, and the finish looks flawless. Highly recommended.",
            "owner"  => "Thank you Carlos, it was a pleasure working on your patio project."
        ],
        [
            "name"   => "Emily Johnson",
            "meta"   => "Local Guide · 12 reviews · 4 photos",
            "when"   => "5 months ago",
            "rating" => 5,
            "text"   => "The team installed a retaining wall in my backyard and it truly transformed the space. High-quality work, clear communication, and fair pricing. I’m very happy with the result.",
            "owner"  => "Thank you Emily for trusting us, we’re glad you’re enjoying your new outdoor space."
        ],
        [
            "name"   => "Jose Ramirez",
            "meta"   => "1 review",
            "when"   => "3 weeks ago",
            "rating" => 5,
            "text"   => "They resurfaced my driveway and added decorative stamped concrete details. The result looks amazing and has really improved the curb appeal of my home.",
            "owner"  => "We appreciate your feedback Jose, and we’re happy your new driveway exceeded expectations."
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

<!--==============================
    Testimonials Redesign
==============================-->
<?php if (!empty($_SESSION['flash_success'])): ?>
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
                <p class="lead">Serving San Jose with reliable tire service and 24/7 mobile support.</p>
            </div>
            <div class="t-cta">
                <?php if (!empty($google)): ?>
                    <a class="btn-primary" href="<?= $google ?>" target="_blank" rel="noopener">
                        Leave a Google Review <i class="far fa-external-link ms-2"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Stats -->
        <div class="t-stats">
            <div class="t-score">
                <div class="t-score__avg"><?= $avg ?></div>
                <div class="t-score__stars"><?= stars(round($avg)) ?></div>
                <div class="t-score__meta"><?= $count ?> review<?= $count === 1 ? '' : 's' ?></div>
            </div>
            <div class="t-bars">
                <?php for ($s = 5; $s >= 1; $s--):
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
            <!-- Columna: reseñas -->
            <div class="t-col">
                <div class="t-cards">
                    <?php foreach ($reviews as $r):
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
            </div>

            <!-- Columna: formulario -->
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
                                <?php for ($i = 5; $i >= 1; $i--): ?>
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

                                <img id="captchaImg" src="captcha.php?ts=<?=time()?>" alt="CAPTCHA">


                                <button class="btn-ghost" type="button" id="reloadCaptcha"><i class="far fa-rotate"></i></button>
                                <script>
                                    document.getElementById('reloadCaptcha')?.addEventListener('click', function() {
                                        const img = document.getElementById('captchaImg');
                                        const base = '/ivanscommercialtireservices.com/captcha.php';
                                        img.src = base + '?ts=' + Date.now();
                                    });
                                </script>

                            </div>


                            <input class="input mt-1" name="captcha" type="text" placeholder="Enter the code">
                            <small class="error" id="captchaError"><?= $errors['captcha'] ?? '' ?></small>
                        </div>

                        <div class="actions">
                            <button type="submit" class="btn-primary">Send Review</button>
                            <?php if (!empty($google)): ?>
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
            if (el) {
                el.textContent = msg || '';
            }
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
  /* PALETA PRINCIPAL (Negro, Rojo, Blanco) */
  --theme-color: #D93030;
  /* Rojo acento */
  --gr-color2: #D93030;
  --yellow-color: #D93030;
  /* alias consistente */

  --black-color: #000000;
  /* Negro puro */
  --white-color: #FFFFFF;
  /* Blanco puro */

  /* TEXTO */
  --title-color: #000000;
  /* Negro fuerte para títulos */
  --body-color: #333333;
  /* Gris oscuro legible */

  /* FONDOS */
  --bg: #FFFFFF;
  /* fondo base blanco */
  --body-bg: #FFFFFF;
  --smoke-color: #F8F9FA;
  /* gris muy claro para secciones */
  --smoke-color2: #F1F1F1;
  /* variante sutil */

  /* GRAYS (apoyo, no predominantes) */
  --black-color2: #111111;
  --gray-color: #9CA3AF;

  /* ESTADOS */
  --success-color: #22C55E;
  /* verde éxito */
  --error-color: #D93030;
  /* rojo consistente */

  /* BORDES / LÍNEAS */
  --th-border-color: #E5E7EB;
  --line: #E5E7EB;

  /* TIPOGRAFÍA / LAYOUT */
  --title-font: "Exo", sans-serif;
  --body-font: "Inter", sans-serif;
  --icon-font: "Font Awesome 6 Pro";
  --main-container: 1320px;
  --container-gutters: 24px;
  --section-space: 120px;
  --section-space-mobile: 80px;
  --section-title-space: 60px;
  --ripple-ani-duration: 5s;

  /* MARCA (minimal) */
  --brand-1: #D93030;
  /* Rojo */
  --brand-2: #000000;
  /* Negro */
  --brand-3: #FFFFFF;
  /* Blanco */

  /* Texto utilitario */
  --txt-1: #000000;
  --txt-2: #333333;

  /* Header */
  --h-top: 44px;
  --h-main: 86px;
}
/* ===== Testimonials (nova) ===== */
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

/* Stats */
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

/* Layout grid */
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

/* Cards */
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

/* Form */
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

.input, .textarea {
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

.header-social a {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background: var(--theme-color);
  color: #fff;
  transition: all .3s ease;
}

.header-social a:hover {
  background: #fff;
  color: var(--theme-color);
  border: 1px solid var(--theme-color);
}

.label {
  display: block;
  font-weight: 800;
  margin-bottom: 6px;
}

.contact-form .form-group {
  margin-bottom: 12px;
  position: relative;
}

.contact-form .form-group i {
  position: absolute;
  right: 12px;
  bottom: 12px;
  opacity: .4;
  pointer-events: none;
}

.th-btn.rounded-12 {
  border-radius: 12px;
}

/* ===== Contact info items ===== */
.team-contact {
  display: grid;
  gap: 14px;
}

.ci {
  display: grid;
  grid-template-columns: 48px 1fr;
  gap: 12px;
  align-items: flex-start;
  padding: 12px;
  border: 1px solid var(--th-border-color);
  border-radius: 12px;
  background: #fff;
}

.ci__icon {
  width: 48px;
  height: 48px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(217, 48, 48, .08);
  /* tono del brand */
  color: var(--gr-color2);
  /* #D93030 */
  flex: 0 0 48px;
}

.ci__label {
  margin: 0 0 4px 0;
  font-weight: 800;
  color: var(--title-color);
}

.ci__value {
  margin: 0;
  color: var(--body-color);
  line-height: 1.45;
}

.ci__value a {
  color: inherit;
  text-decoration: none;
}

.ci__value a:hover {
  text-decoration: underline;
}

/* MUY IMPORTANTE: permitir salto de línea en emails/largos */
.ci__value--break,
.ci__value--break a {
  overflow-wrap: anywhere;
  word-break: break-word;
  /* fallback */
  white-space: normal;
}

/* ===== Form: alinear iconos dentro del input ===== */
.contact-form .form-group {
  position: relative;
}

.contact-form .form-group i {
  position: absolute;
  right: 12px;
  bottom: 12px;
  opacity: .35;
  pointer-events: none;
  font-size: 16px;
}

/* Inputs/select/textarea consistentes */
.contact-form .form-control,
.contact-form .form-select,
.contact-form textarea {
  padding-right: 36px;
  /* espacio para el icono */
}

/* Mejor separación entre columnas en desktops */
@media (min-width: 992px) {

  .contact-card,
  .contact-form {
    height: 100%;
  }
}
</style>
<?php include('footer.php'); ?>