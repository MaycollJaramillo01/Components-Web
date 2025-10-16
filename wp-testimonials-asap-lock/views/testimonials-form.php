<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

// ==== Carga JSON de reseñas ====
$jsonPath = plugin_dir_path(__DIR__) . 'data/testimonials.json';
$reviews = [];
if (is_file($jsonPath)) {
    $raw = file_get_contents($jsonPath);
    $reviews = json_decode($raw, true);
    if (!is_array($reviews)) $reviews = [];
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

// Helper estrellas
function asap_stars($n)
{
    $n = max(1, min(5, (int)$n));
    $out = '';
    for ($i = 1; $i <= 5; $i++) {
        $out .= '<i class="fas fa-star' . ($i <= $n ? ' filled' : '') . '"></i>';
    }
    return $out;
}
?>

<?php if (!empty($_SESSION['flash_success'])): ?>
    <div class="alert-success">
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
                <p class="lead">Serving Los Angeles since 1970 — Trusted Locksmith 24/7.</p>
            </div>
            <div class="t-cta">
                <?php if (defined('ASAP_FACEBOOK')): ?>
                    <a class="btn-primary" href="<?= ASAP_FACEBOOK ?>" target="_blank" rel="noopener">
                        Leave a Facebook Review <i class="far fa-external-link ms-2"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Stats -->
        <div class="t-stats">
            <div class="t-score">
                <div class="t-score__avg"><?= $avg ?></div>
                <div class="t-score__stars"><?= asap_stars(round($avg)) ?></div>
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
                                <div class="t-card__stars"><?= asap_stars($rating) ?></div>
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
                    <p class="t-form__hint">We value your feedback. Share your experience with <?= ASAP_COMPANY ?>.</p>

                    <?php
                    $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
                    if (isset($_SESSION['errors'])) unset($_SESSION['errors']);
                    ?>

                    <form method="POST" action="<?= esc_url(admin_url('admin-post.php')) ?>" id="reviewForm" novalidate>
                        <input type="hidden" name="action" value="asap_insert_testimonial">
                        <input type="hidden" name="fecha" value="<?= date('Y-m-d') ?>">

                        <div class="field">
                            <label class="label">Your rating</label>
                            <div class="rating">
                                <?php for ($i = 5; $i >= 1; $i--): ?>
                                    <input id="r<?= $i ?>" type="radio" name="estrellas" value="<?= $i ?>">
                                    <label for="r<?= $i ?>" title="<?= $i ?> stars"><i class="fa fa-star"></i></label>
                                <?php endfor; ?>
                            </div>
                            <small class="error"><?= $errors['stars'] ?? '' ?></small>
                        </div>

                        <div class="field">
                            <label class="label" for="user">Name</label>
                            <input class="input" type="text" id="user" name="name" placeholder="Your name">
                            <small class="error"><?= $errors['name'] ?? '' ?></small>
                        </div>

                        <div class="field">
                            <label class="label" for="reviews">Comments</label>
                            <textarea class="textarea" id="reviews" name="reviews" rows="4" placeholder="Tell us about your experience"></textarea>
                            <small class="error"><?= $errors['reviews'] ?? '' ?></small>
                        </div>

                        <div class="field">
                            <label class="label">Write the code</label>
                            <div class="captcha-row">
                                <img id="captchaImg"
                                    src="<?php echo plugins_url('captcha.php', dirname(__FILE__)); ?>?ts=<?php echo time(); ?>"
                                    alt="CAPTCHA">
                                <button class="btn-ghost" type="button" id="reloadCaptcha"><i class="far fa-rotate"></i></button>
                            </div>
                            <input class="input mt-1" name="captcha" type="text" placeholder="Enter the code">
                            <small class="error"><?= $errors['captcha'] ?? '' ?></small>
                        </div>

                        <div class="actions">
                            <button type="submit" class="btn-primary">Send Review</button>
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
document.getElementById('reloadCaptcha')?.addEventListener('click', function() {
    const img = document.getElementById('captchaImg');
    img.src = "<?php echo plugins_url('captcha.php', dirname(__FILE__)); ?>?ts=" + Date.now();
});


</script>

<style>
    /* === Styles idénticos al original que me diste === */
    .alert-success {
        margin: 16px auto;
        max-width: 960px;
        padding: 12px 16px;
        border-radius: 10px;
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        color: #065f46;
        font-weight: 700;
    }

    /* (Pego aquí TODO tu CSS que ya tenías para .t-wrap, .t-card, .t-form, etc.) */
    <?php include plugin_dir_path(__DIR__) . 'assets/testimonials.css'; ?>
</style>