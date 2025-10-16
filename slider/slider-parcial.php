<!-- ================= HERO NOVA (PC + MOBILE) ================= -->
<section id="hero" class="hero-nova">
  <div class="hero-nova__bg"></div>

  <div class="container">
    <div class="hero-nova__grid">
      <!-- ======== IZQUIERDA: CONTENIDO (solo visible en PC) ======== -->
      <div class="hero-nova__content d-none d-lg-block">
        <span class="hero-nova__badge">
          <i class="fas fa-hard-hat me-2"></i>
          <?= ($Services ?? 'Residential & Commercial Services') ?> · <?= ($Estimates ?? 'Free Estimates') ?>
        </span>

        <h1 class="hero-nova__title"><?= htmlspecialchars($Company ?? '', ENT_QUOTES) ?></h1>

        <p class="hero-nova__lead" id="heroLead">
          <?= isset($Phrase[0]) ? $Phrase[0] : 'Built on Trust, Finished with Quality.' ?>
        </p>

        <ul class="hero-nova__features">
          <li><i class="fas fa-check"></i> Roofing (Repairs & Installations)</li>
          <li><i class="fas fa-check"></i> Siding (Vinyl, Fiber Cement, etc.)</li>
          <li><i class="fas fa-check"></i> Decks (Custom Outdoor Spaces)</li>
          <li><i class="fas fa-check"></i> Bathroom Remodeling</li>
          <li><i class="fas fa-check"></i> Kitchen Remodeling</li>
        </ul>

        <div class="hero-nova__cta">
          <a href="contact.php" class="btn-quote-nova">
            Get A Quote <i class="fas fa-arrow-right ms-2"></i>
          </a>
          <?php if (!empty($PhoneRef) && !empty($Phone)) : ?>
          <a href="<?= $PhoneRef ?>" class="call-pill-nova">
            <i class="fas fa-phone-volume me-2"></i><?= htmlspecialchars($Phone) ?>
          </a>
          <?php endif; ?>
        </div>

        <div class="hero-nova__meta">
          <?php if (!empty($Experience)) : ?><span><i class="fas fa-award me-1"></i><?= $Experience ?></span><?php endif; ?>
          <?php if (!empty($Coverage))   : ?><span><i class="fas fa-route me-1"></i><?= $Coverage ?></span><?php endif; ?>
          <?php if (!empty($LicenseNote)): ?><span><i class="fas fa-shield-alt me-1"></i><?= $LicenseNote ?></span><?php endif; ?>
          <?php if (!empty($Address))    : ?><span><i class="fas fa-location-dot me-1"></i><?= htmlspecialchars($Address) ?></span><?php endif; ?>
        </div>
      </div>

      <!-- ======== DERECHA/ FULL MOBILE: SLIDER ======== -->
      <div class="hero-nova__slider">
        <div class="swiper heroSwiper">
          <div class="swiper-wrapper">
            <!-- Slide 1: Roofing -->
            <div class="swiper-slide"
                 data-lead="<?= htmlspecialchars($Phrase[0] ?? 'Built on Trust, Finished with Quality.', ENT_QUOTES) ?>">
              <figure class="hero-nova__figure">
                <img src="assets/img/hero/roofing.jpg" alt="Roofing service in Lynn, MA">
                <figcaption class="hero-nova__caption">Roofing · Lynn, MA</figcaption>
              </figure>
            </div>

            <!-- Slide 2: Siding -->
            <div class="swiper-slide"
                 data-lead="<?= htmlspecialchars($Phrase[1] ?? 'Strong Roofs, Strong Homes, Stronger Communities.', ENT_QUOTES) ?>">
              <figure class="hero-nova__figure">
                <img src="assets/img/hero/siding.jpg" alt="Siding installation and repair">
                <figcaption class="hero-nova__caption">Siding · Residential &amp; Commercial</figcaption>
              </figure>
            </div>

            <!-- Slide 3: Remodeling -->
            <div class="swiper-slide"
                 data-lead="<?= htmlspecialchars($Phrase[2] ?? 'Your Vision, Our Craft.', ENT_QUOTES) ?>">
              <figure class="hero-nova__figure">
                <img src="assets/img/hero/remodel.jpg" alt="Kitchen and bathroom remodeling">
                <figcaption class="hero-nova__caption">Kitchen &amp; Bath Remodeling</figcaption>
              </figure>
            </div>

            <!-- Slide 4: Decks -->
            <div class="swiper-slide"
                 data-lead="<?= htmlspecialchars($Phrase[3] ?? 'Smart Solutions for Lasting Results.', ENT_QUOTES) ?>">
              <figure class="hero-nova__figure">
                <img src="assets/img/hero/decks.jpg" alt="Custom decks and outdoor living">
                <figcaption class="hero-nova__caption">Decks &amp; Outdoor Living</figcaption>
              </figure>
            </div>
          </div>

          <!-- Controles -->
          <div class="hero-nova__pagination"></div>
          <div class="hero-nova__arrows d-none d-lg-flex">
            <button class="hero-nova__nav prev"><i class="far fa-chevron-left"></i></button>
            <button class="hero-nova__nav next"><i class="far fa-chevron-right"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
(function(){
  const leadEl = document.getElementById('heroLead');
  const swiper = new Swiper('.heroSwiper', {
    speed: 700,
    loop: true,
    effect: window.innerWidth > 991 ? 'fade' : 'slide', // PC = fade, mobile = slide
    fadeEffect: { crossFade: true },
    autoplay: { delay: 5000, disableOnInteraction: false },
    grabCursor: true,
    pagination: { el: '.hero-nova__pagination', clickable: true },
    navigation: { 
      nextEl: '.hero-nova__arrows .next', 
      prevEl: '.hero-nova__arrows .prev' 
    },
    on: {
      slideChangeTransitionStart(sw){
        const s = sw.slides[sw.activeIndex];
        const dataLead = s?.getAttribute('data-lead');
        if (leadEl && dataLead && window.innerWidth > 991) {
          leadEl.textContent = dataLead; // Solo actualiza el slogan en PC
        }
      }
    }
  });
})();
</script>
