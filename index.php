Se usó un 98% del almacenamiento … Si te quedas sin espacio, no podrás guardar contenido en Drive ni crear copias de seguridad en Google Fotos. Obtén 30 GB de almacenamiento por USD 0.89 USD 0.29 al mes durante 3 meses.
<?php include('header.php') ?>

<div class="stricky-header stricky-header--three stricked-menu main-menu">
  <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->
<?php include('slider.php') ?>



<!--Start About Three-->
<section class="about-three">
  <div class="big-title">
    <h2>About Us</h2>
  </div>
  <div class="shape1 wow slideInRight" data-wow-delay="500ms" data-wow-duration="2500ms"><img class="float-bob-y"
      src="assets/images/shapes/about-v3-shape1.png" alt="#"></div>
  <div class="container">
    <div class="row">
      <!--Start About Three Img-->
      <div class="col-xl-6">
        <div class="about-three__img">
          <div class="inner">
            <img src="assets/images/about/about-v3-img1.jpg" alt="#">
          </div>
        </div>
      </div>
      <!--End About Three Img-->

      <!--Start About Three Content-->
      <div class="col-xl-6">
        <div class="about-three__content">
          <div class="sec-title-three">
            <div class="sec-title-three__tagline">
              <img src="assets/images/resources/icon-paint.png" alt="" width="40">
              <p>welcome to <?php echo $Company; ?></p>
            </div>
            <h2>About Us</h2>
          </div>

          <div class="text-box ">
            <p><?php echo $Home[0]; ?></p>
            <p><?php echo $Home[1]; ?></p>
          </div>
          <div class="client-info">
            <div class="btn-box">
              <a class="thm-btn" href="about.php">
                <span class="txt">Discover More</span>
                <i class="icon-double-chevron"></i>
              </a>
            </div>
          </div>


          <div class="about-three__content-bottom">
            <ul>
              <li>
                <div class="number-box">
                  <h2>01</h2>
                </div>
                <div class="text-box text-center">
                  <h2><span class="odometer" data-count="568">00</span></h2>
                  <p>Happy Clients</p>
                </div>
              </li>

              <li>
                <div class="number-box">
                  <h2>02</h2>
                </div>
                <div class="text-box text-center">
                  <h2><span class="odometer" data-count="568">00</span></h2>
                  <p>Projects Completed</p>
                </div>
              </li>

              <li>
                <div class="number-box">
                  <h2>03</h2>
                </div>
                <div class="text-box text-center">
                  <h2><span class="odometer" data-count="5">00</span></h2>
                  <p>Services we Offer</p>
                </div>
              </li>

              <li>
                <div class="number-box">
                  <h2>04</h2>
                </div>
                <div class="text-box text-center">
                  <h2><span class="odometer" data-count="8">00</span></h2>
                  <p>Years of Experience</p>
                </div>
              </li>
            </ul>
          </div>

        </div>
      </div>
      <!--End About Three Content-->
    </div>
  </div>
</section>
<section class="cta-warranty" style="background: var(--thm-black); padding:36px 0;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10">
        <div class="cta-card" style="
          background:#fff;
          border:1px solid var(--thm-gray);
          border-radius:14px;
          padding:22px;
          box-shadow:0 4px 10px rgba(0,0,0,.04);">

          <!-- Headline -->
          <div class="text-center" style="margin-bottom:8px;">
            <h2 style="margin:0; font-weight:800; line-height:1.2; color:var(--thm-base); font-size:clamp(18px,2.4vw,28px);">
              🎨 Professional painting services with a 2-year warranty — quality you can trust.
            </h2>
            <small style="color:var(--thm-gray); display:block; margin-top:4px; font-size:12px;">
              *Restrictions apply.
            </small>
          </div>

          <!-- Chips compactos -->
          <div class="row justify-content-center" style="margin-top:10px;">
            <div class="col-lg-10">
              <ul style="
                  list-style:none; padding:0; margin:0;
                  display:grid; gap:8px;
                  grid-template-columns:repeat(3, minmax(0,1fr));
                ">
                <li style="display:flex; align-items:center; gap:8px; padding:8px 10px; border:1px solid var(--thm-gray); border-radius:10px;">
                  <i class="fas fa-shield-alt" style="color:var(--thm-base); font-size:14px;" aria-hidden="true"></i>
                  <span style="color:var(--thm-gray); font-weight:600; font-size:13px;">Fully Insured & Licensed · #2705195608</span>
                </li>
                <li style="display:flex; align-items:center; gap:8px; padding:8px 10px; border:1px solid var(--thm-gray); border-radius:10px;">
                  <i class="fas fa-map-marker-alt" style="color:var(--thm-base); font-size:14px;" aria-hidden="true"></i>
                  <span style="color:var(--thm-gray); font-weight:600; font-size:13px;">30 miles around Richmond, VA</span>
                </li>
                <li style="display:flex; align-items:center; gap:8px; padding:8px 10px; border:1px solid var(--thm-gray); border-radius:10px;">
                  <i class="fas fa-comments" style="color:var(--thm-base); font-size:14px;" aria-hidden="true"></i>
                  <span style="color:var(--thm-gray); font-weight:600; font-size:13px;">Bilingual Attention (EN/ES)</span>
                </li>
              </ul>
            </div>
          </div>

          <!-- Descripción súper corta -->
          <p class="text-center" style="color:var(--thm-gray); margin:12px auto 0; max-width:820px; font-size:14px; line-height:1.55;">
            Interior/Exterior • Drywall • Deck & Fence Staining • Cabinet Painting • Texture & Wallpaper Removal.
          </p>

          <!-- Botones más pequeños -->
          <div class="text-center" style="margin-top:14px; display:flex; gap:10px; justify-content:center; flex-wrap:wrap;">
            <a href="contact.php" class="thm-btn"
              style="background:var(--thm-base); color:#fff; padding:10px 20px; border-radius:10px; font-weight:700; text-decoration:none; display:inline-flex; align-items:center; gap:8px; font-size:14px;">
              Get Your Free Estimate <i class="fas fa-arrow-right" aria-hidden="true"></i>
            </a>
            <a href="<?php echo $PhoneRef ?? '#'; ?>"
              style="border:1px solid var(--thm-base); color:var(--thm-base); padding:9px 18px; border-radius:10px; font-weight:700; text-decoration:none; display:inline-flex; align-items:center; gap:8px; font-size:14px;">
              Call Now <?php if (!empty($Phone)) echo htmlspecialchars($Phone); ?>
              <i class="fas fa-phone" aria-hidden="true"></i>
            </a>
          </div>




          <!-- Redes: botones chip compactos -->
          <div class="text-center" style="margin-top:12px;">
            <div style="display:flex; gap:8px; justify-content:center; flex-wrap:wrap;">
              <a href="<?php echo $google; ?>" target="_blank" aria-label="Google Profile"
                style="display:inline-flex; align-items:center; gap:6px; color:var(--thm-gray); text-decoration:none; padding:6px 10px; border:1px solid var(--thm-gray); border-radius:10px; font-size:13px;">
                <i class="fab fa-google" aria-hidden="true"></i> Google
              </a>
              <a href="<?php echo $thumbtack; ?>" target="_blank" aria-label="Thumbtack Profile"
                style="display:inline-flex; align-items:center; gap:6px; color:var(--thm-gray); text-decoration:none; padding:6px 10px; border:1px solid var(--thm-gray); border-radius:10px; font-size:13px;">
                <i class="fas fa-thumbtack" aria-hidden="true"></i> Thumbtack
              </a>
              <a href="<?php echo $facebook; ?>" target="_blank" aria-label="Facebook Page"
                style="display:inline-flex; align-items:center; gap:6px; color:var(--thm-gray); text-decoration:none; padding:6px 10px; border:1px solid var(--thm-gray); border-radius:10px; font-size:13px;">
                <i class="fab fa-facebook" aria-hidden="true"></i> Facebook
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== REVIEWS SECTION (2 columnas, autoplay infinito) ===================== -->

<section id="reviews-sec" class="reviews-min section" aria-labelledby="reviewsTitle">
  <style>
    .reviews-min {
      background: var(--bg, #fff);
      padding-block: clamp(48px, 7vw, 96px);
    }

    .reviews-min__head {
      display: flex;
      flex-wrap: wrap;
      align-items: flex-end;
      justify-content: space-between;
      gap: 16px;
      margin-bottom: 20px;
      animation: fadeInUp 0.8s ease both;
    }

    .reviews-min .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 6px 12px;
      border-radius: 999px;
      background: var(--smoke-color2, #F1F5F9);
      color: var(--txt-1, #0D0D0D);
      font: 700 .9rem/1 var(--body-font, Inter);
      animation: fadeIn 1s ease both;
    }

    .reviews-min .title {
      margin: .5rem 0 0;
      font: 900 clamp(22px, 3vw, 30px)/1.15 var(--title-font, Exo);
      color: var(--title-color, #000);
      animation: slideInLeft 1s ease both;
    }

    .reviews-min .lead {
      margin: .25rem 0 0;
      color: var(--body-color, #333);
      animation: fadeIn 1.2s ease both;
    }

    /* Cards */
    .rvw {
      background: #fff;
      border: 1px solid var(--th-border-color, #E5E7EB);
      border-radius: 14px;
      box-shadow: 0 6px 16px rgba(0, 0, 0, .06);
      padding: 14px;
      display: flex;
      flex-direction: column;
      gap: 8px;
      min-height: 180px;
      margin: 10px;
      opacity: 0;
      transform: translateY(30px);
      animation: fadeUpCard 0.8s ease forwards;
    }

    .swiper-slide:nth-child(1) .rvw {
      animation-delay: 0.2s;
    }

    .swiper-slide:nth-child(2) .rvw {
      animation-delay: 0.4s;
    }

    .swiper-slide:nth-child(3) .rvw {
      animation-delay: 0.6s;
    }

    .swiper-slide:nth-child(4) .rvw {
      animation-delay: 0.8s;
    }

    .swiper-slide:nth-child(5) .rvw {
      animation-delay: 1s;
    }

    .rvw__head {
      display: grid;
      grid-template-columns: auto 1fr auto;
      gap: 6px;
      align-items: center
    }

    .rvw__avatar {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      display: grid;
      place-items: center;
      background: var(--brand-3, #FFFFFF);
      border: 1px solid var(--th-border-color, #E5E7EB);
      font: 800 .85rem/1 var(--body-font, Inter);
      color: var(--brand-2, #000)
    }

    .rvw__name {
      font: 700 .95rem/1.1 var(--body-font, Inter);
      color: var(--title-color, #000)
    }

    .rvw__meta {
      grid-column: 2/span 1;
      color: var(--gray-color, #9CA3AF);
      font-size: .78rem
    }

    .rvw__stars {
      display: inline-flex;
      gap: 2px
    }

    .rvw__stars svg {
      width: 14px;
      height: 14px;
      fill: var(--brand-1, #D93030)
    }

    .rvw__text {
      margin: 2px 0 0;
      color: var(--body-color, #333);
      font-size: .9rem;
    }

    /* Swiper ajustes */
    .reviews-swiper {
      padding-bottom: 40px
    }

    .swiper-pagination-bullet {
      background: #000;
      opacity: .3
    }

    .swiper-pagination-bullet-active {
      background: var(--brand-1, #D93030);
      opacity: 1
    }

    /* Botón */
    .btn-secondary {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      padding: 12px 22px;
      border-radius: 999px;
      border: 2px solid var(--brand-2, #0F172A);
      text-decoration: none;
      font: 700 0.95rem/1 var(--body-font, Inter, sans-serif);
      color: var(--brand-2, #0F172A);
      background: #fff;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
      transition: all 0.3s ease;
      animation: fadeInUp 1s ease both;
      animation-delay: 1s;
    }

    .btn-secondary:hover {
      background: var(--brand-2, #0F172A);
      color: #fff;
      box-shadow: 0 6px 14px rgba(0, 0, 0, 0.1);
      transform: translateY(-2px);
    }

    /* Animaciones */
    @keyframes fadeUpCard {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

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

    @keyframes slideInLeft {
      from {
        opacity: 0;
        transform: translateX(-40px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }
  </style>

  <?php
  // Fuente del enlace a Google
  $google_reviews_url = $google ?? ($links['google_share'] ?? '#');

  // Reviews reales que me pasaste
  $reviews = [
    [
      "name" => "Mark M",
      "meta" => "2 reviews",
      "when" => "a year ago",
      "rating" => 5,
      "text" => "Excellent work and attention to detail. Jason comes with ideas to problem solve but also is very aware of customer's cost concerns and long-term quality. Importantly, Jason and his team treat our home like it is his own. The team also provides regular updates on progress with pictures and videos. I would recommend the team to all."
    ],
    [
      "name" => "Rick Greenspan",
      "meta" => "4 reviews",
      "when" => "a year ago",
      "rating" => 5,
      "text" => "Jason did an amazing job with a difficult project! He was creative with his solution and he and his team finished in one day! Great job!"
    ],
    [
      "name" => "Jamie Everton",
      "meta" => "Local Guide · 86 reviews · 214 photos",
      "when" => "a year ago",
      "rating" => 5,
      "text" => "Great company to associate with! Timely! Professional! Knowledgeable and will get the job done right the first time! You will not be disappointed."
    ],
    [
      "name" => "Joan Salvucci",
      "meta" => "2 reviews",
      "when" => "a year ago",
      "rating" => 5,
      "text" => "They did an excellent job! Pays attention to detail and is courteous and professional!"
    ],
    [
      "name" => "Everett Brown",
      "meta" => "6 reviews",
      "when" => "a year ago",
      "rating" => 5,
      "text" => "Fast service quality work on an emergency roof repair. Would highly recommend his service"
    ],
    [
      "name" => "Adam Savage",
      "meta" => "3 reviews",
      "when" => "a year ago",
      "rating" => 5,
      "text" => "Great work! Highly recommended!"
    ],
    [
      "name" => "Cassandra Pierce",
      "meta" => "5 reviews",
      "when" => "a year ago",
      "rating" => 5,
      "text" => "Great company to work with. Professional, reliable, and excellent quality of work."
    ]
  ];

  $reviewCount = count($reviews);
  $avg = 5.0; // todas son 5★

  function initials($n)
  {
    $p = preg_split('/\s+/', trim($n));
    return strtoupper(mb_substr($p[0], 0, 1) . (isset($p[1]) ? mb_substr($p[1], 0, 1) : ''));
  }
  function stars($n = 5)
  {
    $s = '';
    for ($i = 1; $i <= 5; $i++) {
      $s .= '<svg viewBox="0 0 20 20" aria-hidden="true"><path d="M10 1.5l2.6 5.3 5.9.9-4.2 4.2 1 5.8L10 15.8 4.7 17.7l1-5.8L1.5 7.7l5.9-.9L10 1.5z"/></svg>';
    }
    return $s;
  }
  ?>

  <div class="container">
    <!-- Encabezado -->
    <div class="reviews-min__head">
      <div>
        <span class="eyebrow"><i class="fas fa-star"></i> What people say</span>
        <h2 id="reviewsTitle" class="title">5-Star Reviews for <?= htmlspecialchars($Company ?? '', ENT_QUOTES) ?></h2>
        <p class="lead">Real experiences from customers who trusted us.</p>
      </div>
      <a class="rating-pill" href="<?= htmlspecialchars($google_reviews_url, ENT_QUOTES) ?>" target="_blank" rel="noopener">
        ★ <?= number_format($avg, 1) ?> · <?= $reviewCount ?> Google reviews
      </a>
    </div>

    <!-- Swiper -->
    <div class="swiper reviews-swiper">
      <div class="swiper-wrapper">
        <?php foreach ($reviews as $r): ?>
          <div class="swiper-slide">
            <article class="rvw" itemscope itemtype="https://schema.org/Review">
              <header class="rvw__head">
                <span class="rvw__avatar"><?= initials($r['name']) ?></span>
                <strong class="rvw__name"><?= htmlspecialchars($r['name']) ?></strong>
                <span class="rvw__stars"><?= stars($r['rating']) ?></span>
                <span class="rvw__meta"><?= htmlspecialchars($r['meta'] . ' · ' . $r['when']) ?></span>
              </header>
              <p class="rvw__text"><?= htmlspecialchars($r['text']) ?></p>
            </article>
          </div>
        <?php endforeach; ?>
      </div>
      <!-- Paginación -->
      <div class="swiper-pagination"></div>
    </div>

    <!-- CTA -->
    <div class="reviews-min__foot" style="text-align:center;margin-top:20px;">
      <a
        href="<?= htmlspecialchars($google_reviews_url, ENT_QUOTES) ?>"
        target="_blank"
        rel="noopener"
        style="
              display:inline-flex;
              align-items:center;
              justify-content:center;
              gap:10px;
              padding:12px 28px;
              border-radius:999px;
              border:2px solid #00265A;
              text-decoration:none;
              font:700 0.95rem/1 'Inter', sans-serif;
              color:#00265A;
              background:#FABA0D;
              box-shadow:0 4px 10px rgba(0,0,0,0.06);
              transition:all 0.3s ease;
            "
        onmouseover="this.style.background='#00265A';this.style.color='#FFFFFF';"
        onmouseout="this.style.background='#FABA0D';this.style.color='#00265A';">
        See all reviews on Google
      </a>
    </div>

  </div>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <!-- Inicialización -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const reviewsSwiper = new Swiper(".reviews-swiper", {
        slidesPerView: 2,
        spaceBetween: 20,
        loop: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          0: {
            slidesPerView: 1
          },
          768: {
            slidesPerView: 2
          }
        }
      });
    });
  </script>

  <!-- Font Awesome (para el ícono de estrella en el encabezado) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Google Fonts (Inter + Exo para tipografías coherentes con tu estilo) -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&family=Exo:wght@700;900&display=swap" rel="stylesheet">



</section>

<!-- Init Swiper -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    new Swiper(".reviews-swiper", {
      slidesPerView: 2,
      spaceBetween: 20,
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true
      },
      breakpoints: {
        0: {
          slidesPerView: 1
        },
        /* en móvil: 1 columna */
        768: {
          slidesPerView: 2
        } /* en tablet y desktop: 2 columnas */
      }
    });
  });
</script>

<!-- Responsive micro-ajustes -->
<style>
  @media (max-width: 1199.98px) {
    .cta-warranty .cta-card {
      padding: 18px;
    }
  }

  @media (max-width: 991.98px) {
    .cta-warranty ul {
      grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
    }
  }

  @media (max-width: 575.98px) {
    .cta-warranty {
      padding: 24px 0 !important;
    }

    .cta-warranty ul {
      grid-template-columns: 1fr !important;
    }
  }
</style>

<section class="cta-two" style="background-color:#F0F0F0; padding:40px 0;">
  <div class="container">
    <div class="row">
      <div class="cta-two__inner w-100 text-center">
        <div class="cta-two__content">
          <div class="text-box">
            <h2 style="font-weight:800; margin-bottom:24px; color:#1a1a1a; text-align:center;">
              We Value Your Opinion
            </h2>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center g-4">
      <div class="col-md-4 col-sm-6 d-flex justify-content-center">
        <a href="<?php echo $facebook; ?>" target="_blank">
          <img src="assets/images/resources/face.png" alt="Facebook"
            style="max-width:400px; width:100%; height:auto;">
        </a>
      </div>
      <div class="col-md-4 col-sm-6 d-flex justify-content-center">
        <a href="<?php echo $google; ?>" target="_blank">
          <img src="assets/images/resources/gl.png" alt="Google"
            style="max-width:400px; width:100%; height:auto;">
        </a>
      </div>
      <div class="col-md-4 col-sm-6 d-flex justify-content-center">
        <a href="<?php echo $thumbtack; ?>" target="_blank">
          <img src="assets/images/resources/thumbtack.png" alt="Thumbtack"
            style="max-width:400px; width:100%; height:auto;">
        </a>
      </div>
    </div>
  </div>
</section>


<style>
  /* efecto hover sutil */
  .cta-two img:hover {
    transform: scale(1.03);
  }

  @media (max-width: 991.98px) {

    /* tablets: 2 columnas */
    .cta-two .row.g-3>[class*="col-"] {
      margin-bottom: 6px;
    }
  }

  @media (max-width: 575.98px) {

    /* móvil: 1 columna, logos grandes dentro del viewport */
    .cta-two {
      padding: 28px 0 !important;
    }
  }
</style>


<style>
  /* Estilos generales del componente */
  .reviews-carousel {
    background: var(--thm-black);
    padding: 70px 0;
    --carousel-gap: 18px;
    /* Variable para el espaciado */
  }

  .reviews-carousel header {
    text-align: center;
    margin-bottom: 24px;
  }

  .reviews-carousel header h2 {
    color: var(--thm-base);
    font-weight: 800;
    margin: 0;
  }

  .reviews-carousel header p {
    color: var(--thm-gray);
    margin: 6px 0 0;
  }

  /* Controles (flechas y enlace) */
  .rc-controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    margin-bottom: 12px;
  }

  .rc-controls a {
    color: var(--thm-base);
    text-decoration: none;
    font-weight: 700;
    transition: opacity 0.3s;
  }

  .rc-controls a:hover {
    opacity: 0.8;
  }

  .rc-controls .rc-buttons {
    display: flex;
    gap: 8px;
  }

  .rc-btn {
    border: 2px solid var(--thm-base);
    background: #fff;
    color: var(--thm-base);
    border-radius: 10px;
    padding: 8px 12px;
    font-weight: 700;
    cursor: pointer;
    transition: background 0.3s, color 0.3s;
  }

  .rc-btn:hover {
    background: var(--thm-base);
    color: #fff;
  }

  /* Pista del carrusel (el contenedor de las tarjetas) */
  .rc-track {
    display: grid;
    grid-auto-flow: column;
    gap: var(--carousel-gap);
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    scroll-behavior: smooth;
    /* Animación de scroll nativa */
    padding-bottom: 12px;
    /* Espacio para la barra de scroll si es visible */
    -ms-overflow-style: none;
    /* IE and Edge */
    scrollbar-width: none;
    /* Firefox */
  }

  .rc-track::-webkit-scrollbar {
    display: none;
    /* Oculta la barra de scroll en Chrome, Safari, etc. */
  }

  /* ---- La Magia de la Responsividad ---- */
  /* Móvil (1 tarjeta visible, con un vistazo a la siguiente) */
  .rc-track {
    grid-auto-columns: 85%;
  }

  /* Tablet (2 tarjetas visibles) */
  @media (min-width: 768px) {
    .rc-track {
      grid-auto-columns: calc(50% - var(--carousel-gap) / 2);
    }
  }

  /* Escritorio (3 tarjetas visibles) */
  @media (min-width: 1200px) {
    .rc-track {
      grid-auto-columns: calc(33.333% - var(--carousel-gap) * 2 / 3);
    }
  }

  /* Tarjeta de reseña */
  .rc-card {
    scroll-snap-align: start;
    background: #fff;
    border: 2px solid var(--thm-gray);
    border-radius: 16px;
    padding: 18px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, .06);
    display: flex;
    flex-direction: column;
    min-height: 240px;
    /* Altura mínima consistente */
  }

  .rc-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 8px;
  }

  .rc-card-author strong {
    color: var(--thm-base);
    font-size: 16px;
  }

  .rc-card-author div {
    color: var(--thm-gray);
    font-size: 12px;
  }

  .rc-card-rating {
    white-space: nowrap;
  }

  .rc-card-rating .fa-star {
    color: var(--thm-base);
  }

  .rc-card-rating .far.fa-star {
    color: var(--thm-gray);
  }

  .rc-card-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-bottom: 10px;
  }

  .rc-card-tag {
    border: 1px solid var(--thm-gray);
    color: var(--thm-gray);
    border-radius: 999px;
    padding: 4px 8px;
    font-size: 12px;
  }

  .rc-card-tag i {
    color: var(--thm-base);
    margin-right: 6px;
  }

  .rc-card-text {
    color: var(--thm-gray);
    line-height: 1.6;
    margin: 0;
    flex-grow: 1;
    /* Empuja el footer hacia abajo */
  }

  .rc-card-footer {
    margin-top: 16px;
    display: flex;
    justify-content: flex-end;
  }

  .rc-card-footer a {
    color: var(--thm-base);
    text-decoration: none;
    font-weight: 700;
    transition: opacity 0.3s;
  }

  .rc-card-footer a:hover {
    opacity: 0.8;
  }

  /* Puntos de navegación */
  .rc-dots {
    display: flex;
    gap: 8px;
    justify-content: center;
    margin-top: 12px;
  }

  .rc-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    border: 0;
    padding: 0;
    background: var(--thm-gray);
    opacity: 0.4;
    cursor: pointer;
    transition: opacity 0.3s, background 0.3s;
  }

  .rc-dot.active {
    opacity: 1;
    background: var(--thm-base);
  }
</style>

<section class="reviews-carousel">
  <div class="container">
    <header>
      <h2>⭐ Google Reviews</h2>
      <p>What our clients say about <?php echo $Company ?? 'Our Company'; ?></p>
    </header>

    <?php
    $GoogleReviews = $GoogleReviews ?? [
      ['author' => 'Robin Castellano', 'rating' => 5, 'time' => '3 weeks ago', 'tags' => ['Good price'], 'text' => 'Gerson and his team did an incredible job in our living room and laundry. Great care and amazing quality. Looking forward to many more projects!',],
      ['author' => 'Anita Green', 'rating' => 5, 'time' => '2 weeks ago', 'tags' => ['Good price', 'Professional'], 'text' => 'Great people to work with. Professional and reliable. Very considerate of your home and want to make sure you are satisfied. Our go-to painting company.',],
      ['author' => 'Jonathan Delp', 'rating' => 5, 'time' => '1 month ago', 'tags' => ['Reasonable price', 'On time'], 'text' => 'Punctual and reliable for both estimate and completion. Hired to paint eaves. Work looks great. Highly recommended.',],
      ['author' => 'Lauren Stevens', 'rating' => 5, 'time' => '3 months ago', 'tags' => ['Attention to detail'], 'text' => 'Excellent work! They finished the paint job I started, corrected mistakes and patched nail holes. Highly recommend!',],
      ['author' => 'Brian Dodd', 'rating' => 5, 'time' => '2 months ago', 'tags' => ['Drywall repair'], 'text' => 'Fixed water damage in ceiling, drywall + paint. Seamless finish, you can’t tell there was a problem.',],
      ['author' => 'The Levys', 'rating' => 5, 'time' => '3 months ago', 'tags' => ['Clean', 'Efficient'], 'text' => 'Excellent job! Very thorough, efficient, and clean!',],
      ['author' => 'John Nikitakis', 'rating' => 5, 'time' => '7 months ago', 'tags' => ['Great team'], 'text' => 'Gerson and his team did an amazing job. Looking forward to working with them again!',],
      ['author' => 'Jose Castillo', 'rating' => 5, 'time' => '7 months ago', 'tags' => ['Professional', 'Kind'], 'text' => 'Very professional and friendly. I recommend them for your projects.',],
    ];
    ?>

    <div class="rc-controls">
      <a href="<?php echo $google ?? '#'; ?>" target="_blank">
        View all on Google <i class="fab fa-google" aria-hidden="true"></i>
      </a>
      <div class="rc-buttons">
        <button class="rc-btn rc-prev" aria-label="Previous reviews">‹</button>
        <button class="rc-btn rc-next" aria-label="Next reviews">›</button>
      </div>
    </div>

    <div class="rc-track" tabindex="0" aria-label="Google reviews carousel">
      <?php foreach ($GoogleReviews as $rev): ?>
        <article class="rc-card">
          <div class="rc-card-header">
            <div class="rc-card-author">
              <strong><?php echo htmlspecialchars($rev['author']); ?></strong>
              <div><?php echo htmlspecialchars($rev['time']); ?></div>
            </div>
            <div class="rc-card-rating" aria-label="<?php echo (int)$rev['rating']; ?> stars">
              <?php
              $stars = (int)$rev['rating'];
              echo str_repeat('<i class="fas fa-star" aria-hidden="true"></i>', $stars);
              echo str_repeat('<i class="far fa-star" aria-hidden="true"></i>', 5 - $stars);
              ?>
            </div>
          </div>

          <?php if (!empty($rev['tags'])): ?>
            <div class="rc-card-tags">
              <?php foreach ($rev['tags'] as $tag): ?>
                <span class="rc-card-tag">
                  <i class="fas fa-check-circle" aria-hidden="true"></i><?php echo htmlspecialchars($tag); ?>
                </span>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>

          <p class="rc-card-text"><?php echo htmlspecialchars($rev['text']); ?></p>

          <div class="rc-card-footer">
            <a href="<?php echo $google ?? '#'; ?>" target="_blank">
              Read on Google <i class="fab fa-google" aria-hidden="true"></i>
            </a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

    <div class="rc-dots"></div>
  </div>
</section>

<script>
  (function() {
    const carousel = document.querySelector('.reviews-carousel');
    if (!carousel) return;

    const track = carousel.querySelector('.rc-track');
    const prevBtn = carousel.querySelector('.rc-prev');
    const nextBtn = carousel.querySelector('.rc-next');
    const dotsContainer = carousel.querySelector('.rc-dots');

    // --- NUEVO: Configuración del Autoplay ---
    const AUTOPLAY_DELAY = 2000;
    let autoplayInterval = null;
    // -----------------------------------------

    if (!track || !prevBtn || !nextBtn || !dotsContainer) return;

    let currentPage = 0;
    let pagesCount = 0;

    function updateCarouselState() {
      const trackWidth = track.clientWidth;
      const scrollWidth = track.scrollWidth;
      pagesCount = Math.round(scrollWidth / trackWidth);
      currentPage = Math.round(track.scrollLeft / trackWidth);

      buildDots();
      updateDots();
    }

    function goToPage(pageIndex) {
      const trackWidth = track.clientWidth;
      track.scrollTo({
        left: pageIndex * trackWidth,
        behavior: 'smooth'
      });
    }

    function buildDots() {
      dotsContainer.innerHTML = '';
      for (let i = 0; i < pagesCount; i++) {
        const button = document.createElement('button');
        button.className = 'rc-dot';
        button.setAttribute('aria-label', `Go to slide ${i + 1}`);
        button.addEventListener('click', () => goToPage(i));
        dotsContainer.appendChild(button);
      }
    }

    function updateDots() {
      currentPage = Math.round(track.scrollLeft / track.clientWidth);
      [...dotsContainer.children].forEach((dot, idx) => {
        dot.classList.toggle('active', idx === currentPage);
      });
    }

    // --- NUEVO: Funciones para controlar el Autoplay ---
    function startAutoplay() {
      // Evita iniciar múltiples intervalos
      stopAutoplay();
      autoplayInterval = setInterval(() => {
        // Calcula la siguiente página
        let nextPage = currentPage + 1;
        // Si llega al final, vuelve al principio (loop)
        if (nextPage >= pagesCount) {
          nextPage = 0;
        }
        goToPage(nextPage);
      }, AUTOPLAY_DELAY);
    }

    function stopAutoplay() {
      clearInterval(autoplayInterval);
    }
    // ----------------------------------------------------

    // Event Listeners
    prevBtn.addEventListener('click', () => {
      goToPage(currentPage - 1);
    });

    nextBtn.addEventListener('click', () => {
      goToPage(currentPage + 1);
    });

    let scrollTimeout;
    track.addEventListener('scroll', () => {
      clearTimeout(scrollTimeout);
      scrollTimeout = setTimeout(updateDots, 100);
    });

    track.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowRight') {
        e.preventDefault();
        nextBtn.click();
      }
      if (e.key === 'ArrowLeft') {
        e.preventDefault();
        prevBtn.click();
      }
    });

    // --- NUEVO: Pausar autoplay con el ratón ---
    // Detiene el movimiento cuando el ratón está encima
    carousel.addEventListener('mouseenter', stopAutoplay);
    // Reanuda el movimiento cuando el ratón sale
    carousel.addEventListener('mouseleave', startAutoplay);
    // ---------------------------------------------

    // Inicialización
    updateCarouselState();
    window.addEventListener('resize', updateCarouselState);

    // --- NUEVO: Iniciar el autoplay al cargar la página ---
    startAutoplay();
    // ------------------------------------------------------
  })();
</script>



<!-- ===== Why Choose Us (Image + Content, Minimal) ===== -->
<section class="feature-six v2" style="background: var(--thm-black); padding:64px 0;">
  <div class="container">
    <div class="row align-items-center g-4">

      <!-- Imagen (col izquierda) -->
      <div class="col-xl-6">
        <figure style="position:relative; margin:0;">
          <!-- Usa la imagen que prefieras; dejo la tuya como fallback -->
          <img src="assets/images/backgrounds/feature-v6-bg.png"
            alt="Why Choose Us — GD Painting LLC"
            style="width:100%; height:auto; border-radius:16px; border:1px solid rgba(0,0,0,.06); display:block;">
          <!-- Sello pequeño sobre la imagen -->
          <figcaption style="
              position:absolute; left:16px; bottom:16px;
              background:#fff; color:var(--thm-base);
              border:2px solid var(--thm-base);
              border-radius:10px; padding:8px 12px; font-weight:700; font-size:12px;">
            <i class="fas fa-shield-alt" aria-hidden="true"></i>
            Licensed & Insured · #2705195608
          </figcaption>
        </figure>
      </div>

      <!-- Contenido (col derecha) -->
      <div class="col-xl-6">
        <!-- Tagline + Título -->
        <div style="display:flex; align-items:center; gap:10px; margin-bottom:6px;">
          <img src="assets/images/resources/icon-paint.png" alt="" width="32" height="32" loading="lazy">
          <p style="margin:0; color:var(--thm-gray); font-weight:700;"><?php echo $Estimates; ?></p>
        </div>
        <h2 style="margin:0 0 10px; color:var(--thm-base); font-weight:800; line-height:1.15;">
          Why Choose Us
        </h2>

        <!-- Texto breve -->
        <p style="color:var(--thm-gray); margin:0 0 16px; line-height:1.7;">
          <?php echo $Home[1]; ?>
        </p>

        <!-- Bullets (dos columnas en desktop, una en móvil) -->
        <ul style="
            list-style:none; padding:0; margin:0;
            display:grid; gap:10px 18px;
            grid-template-columns:repeat(2, minmax(0,1fr));">
          <li style="display:flex; align-items:flex-start; gap:10px; color:var(--thm-gray);">
            <i class="fas fa-bolt" style="color:var(--thm-base);" aria-hidden="true"></i>
            <span><?php echo $Estimates; ?></span>
          </li>
          <li style="display:flex; align-items:flex-start; gap:10px; color:var(--thm-gray);">
            <i class="fas fa-language" style="color:var(--thm-base);" aria-hidden="true"></i>
            <span><?php echo $Bilingual; ?></span>
          </li>
          <li style="display:flex; align-items:flex-start; gap:10px; color:var(--thm-gray);">
            <i class="fas fa-map-marker-alt" style="color:var(--thm-base);" aria-hidden="true"></i>
            <span><?php echo $Cover; ?></span>
          </li>
          <li style="display:flex; align-items:flex-start; gap:10px; color:var(--thm-gray);">
            <i class="fas fa-briefcase" style="color:var(--thm-base);" aria-hidden="true"></i>
            <span><?php echo $Experience; ?></span>
          </li>
          <li style="display:flex; align-items:flex-start; gap:10px; color:var(--thm-gray);">
            <i class="fas fa-clock" style="color:var(--thm-base);" aria-hidden="true"></i>
            <span><?php echo $Schedule; ?></span>
          </li>
          <li style="display:flex; align-items:flex-start; gap:10px; color:var(--thm-gray);">
            <i class="fas fa-credit-card" style="color:var(--thm-base);" aria-hidden="true"></i>
            <span><?php echo $Payment; ?></span>
          </li>
        </ul>

        <!-- Línea de servicio y botón (opcionales) -->
        <div style="margin-top:14px; display:flex; gap:12px; flex-wrap:wrap; align-items:center;">
          <span style="color:var(--thm-gray); font-weight:700;"><?php echo $Services; ?></span>
          <a href="contact.php" class="thm-btn"
            style="background:var(--thm-base); color:#fff; padding:10px 18px; border-radius:10px; font-weight:700; text-decoration:none; display:inline-flex; align-items:center; gap:8px;">
            Get a Free Estimate <i class="fas fa-arrow-right" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Micro responsive -->
<style>
  @media (max-width: 991.98px) {
    .feature-six.v2 {
      padding: 48px 0 !important;
    }

    .feature-six.v2 ul {
      grid-template-columns: 1fr !important;
    }
  }
</style>
<!-- ===== Our Services — Cards ===== -->
<section class="services-cards" style="background: var(--thm-black); padding:64px 0;">
  <div class="container">
    <!-- Título -->
    <header class="text-center" style="margin-bottom:22px;">
      <div style="display:inline-flex; align-items:center; gap:10px; margin-bottom:6px;">
        <img src="assets/images/resources/icon-paint.png" alt="" width="32" height="32" loading="lazy">
        <p style="margin:0; color:var(--thm-gray); font-weight:700; letter-spacing:.02em;">We Offer</p>
      </div>
      <h2 style="margin:0; color:#1a1a1a; font-weight:800;">Our Services</h2>
    </header>

    <div class="row g-3">
      <?php for ($i = 1; $i <= 5; $i++): ?>
        <div class="col-lg-4 col-md-6">
          <article class="svc-card" style="
            background:#fff;
            border:1px solid var(--thm-gray);
            border-radius:16px;
            overflow:hidden;
            height:100%;
            display:flex; flex-direction:column;
            box-shadow:0 4px 12px rgba(0,0,0,.05);
          ">
            <!-- Media -->
            <div class="svc-media" style="aspect-ratio: 16/10; overflow:hidden;">
              <img
                src="assets/images/team/<?php echo $i; ?>.jpg"
                alt="<?php echo htmlspecialchars($SN[$i]); ?>"
                style="width:100%; height:100%; object-fit:cover; display:block; transition:transform .4s;">
            </div>

            <!-- Body -->
            <div class="svc-body" style="padding:16px 16px 14px;">
              <h3 style="margin:0 0 6px; font-size:18px; color:var(--thm-base); font-weight:800;">
                <?php echo $SN[$i]; ?>
              </h3>
              <?php if (!empty($SD[$i])): ?>
                <p style="margin:0 0 10px; color:var(--thm-gray); font-size:14px; line-height:1.6;">
                  <?php echo $SD[$i]; ?>
                </p>
              <?php endif; ?>

              <!-- Footer -->
              <div style="margin-top:auto; display:flex; gap:10px; align-items:center;">
                <a href="services.php" style="
                   display:inline-flex; align-items:center; gap:8px;
                   background:var(--thm-base); color:#fff; text-decoration:none;
                   padding:8px 12px; border-radius:10px; font-weight:700; font-size:13px;">
                  Learn More <i class="fas fa-arrow-right" aria-hidden="true"></i>
                </a>
                <a href="contact.php" style="
                   display:inline-flex; align-items:center; gap:8px;
                   border:1px solid var(--thm-base); color:var(--thm-base); text-decoration:none;
                   padding:7px 11px; border-radius:10px; font-weight:700; font-size:13px;">
                  Get Estimate <i class="fas fa-calculator" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </article>
        </div>
      <?php endfor; ?>

      <!-- Utility Card: Coverage / License / Estimates -->
      <div class="col-lg-4 col-md-6">
        <article class="svc-card" style="
          background:#fff; border:1px solid var(--thm-gray); border-radius:16px;
          height:100%; display:flex; flex-direction:column; justify-content:center; text-align:center;
          padding:22px; box-shadow:0 4px 12px rgba(0,0,0,.05);">
          <h3 style="margin:0 0 8px; color:var(--thm-base); font-weight:800;">We Cover</h3>
          <div style="font-size:40px; line-height:1; font-weight:800; color:#1a1a1a; margin-bottom:10px;">
            30<span style="font-size:.55em; color:var(--thm-gray); margin-left:4px;">miles</span>
          </div>
          <p style="margin:0 0 12px; color:var(--thm-gray);"><?php echo $Cover; ?></p>

          <ul style="list-style:none; padding:0; margin:0 0 12px; display:grid; gap:8px;">
            <li style="display:flex; justify-content:center; gap:8px; color:var(--thm-gray); font-size:14px;">

              <span><?php echo $Lic; ?></span>
            </li>
            <li style="display:flex; justify-content:center; gap:8px; color:var(--thm-gray); font-size:14px;">

              <span><?php echo $Estimates; ?></span>
            </li>
          </ul>

          <a href="contact.php" style="
             display:inline-flex; align-items:center; gap:8px;
             background:var(--thm-base); color:#fff; text-decoration:none;
             padding:10px 16px; border-radius:10px; font-weight:700;">
            Book a Free Estimate <i class="fas fa-arrow-right" aria-hidden="true"></i>
          </a>
        </article>
      </div>
    </div>
  </div>
</section>

<!-- Hover micro-animación (solo imagen) -->
<style>
  .services-cards .svc-card:hover .svc-media img {
    transform: scale(1.04);
  }

  @media (max-width: 991.98px) {
    .services-cards {
      padding: 48px 0 !important;
    }
  }

  @media (max-width: 575.98px) {
    .services-cards {
      padding: 36px 0 !important;
    }
  }
</style>


<section class="portfolio-three">
  <div class="portfolio-three__bg" style="background-image: url(assets/images/backgrounds/portfolio-v3-bg.png);">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="portfolio-three__top">
          <div class="sec-title-three">
            <div class="sec-title-three__tagline">
              <img src="assets/images/resources/icon-paint.png" alt="" width="40">
              <p>Recent Project</p>
            </div>
            <h2><?php echo $Phrase[1]; ?></h2>
          </div>

        </div>
      </div>
    </div>
  </div>


  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-12">
        <div class="portfolio-three__inner">

          <div class="owl-carousel owl-theme thm-owl__carousel portfolio-two__carousel" data-owl-options='{
                                "loop": true,
                                "autoplay": true,
                                "margin": 0,
                                "nav": false,
                                "dots": false,
                                "smartSpeed": 500,
                                "autoplayTimeout": 10000,
                                "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                                "responsive": {
                                        "0": {
                                            "items": 1
                                        },
                                        "768": {
                                            "items": 2
                                        },
                                        "992": {
                                            "items": 3
                                        },
                                        "1200": {
                                            "items": 4
                                        }
                                    }
                                }'>
            <?php
            for ($i = 5; $i <= 20; $i++) {; ?>
              <!--Start Portfolio Three Single-->
              <div class="portfolio-three__single" style="margin-bottom:24px;">
                <div class="portfolio-three__single-img"
                  style="position:relative; overflow:hidden; border-radius:12px; aspect-ratio:4/3;">

                  <!-- Imagen ajustada -->
                  <img src="assets/images/Gallery/<?php echo $i; ?>.jpg"
                    alt="Gallery <?php echo $i; ?>"
                    style="width:100%; height:100%; object-fit:cover; display:block;">

                  <!-- Caja de texto superpuesta -->
                  <div class="content-box"
                    style="position:absolute; bottom:16px; left:16px; right:16px; 
                    background:rgba(0,0,0,0.55); color:#fff; padding:10px 14px; 
                    border-radius:8px; text-align:left;">
                    <h2 style="margin:0; font-size:18px; font-weight:700;">
                      <a href="gallery.php" style="color:#fff; text-decoration:none;">
                        <?php echo $Company; ?>
                      </a>
                    </h2>
                  </div>

                  <!-- Botón flotante -->
                  <div class="btn-box"
                    style="position:absolute; top:16px; right:16px; 
                    background:var(--thm-base); color:#fff; width:40px; height:40px; 
                    display:flex; align-items:center; justify-content:center; 
                    border-radius:50%; box-shadow:0 3px 6px rgba(0,0,0,0.25);">
                    <a href="gallery.php" style="color:#fff; font-size:16px;">
                      <span class="icon-right-arrow-1"></span>
                    </a>
                  </div>
                </div>
              </div>

              <!--End Portfolio Three Single-->
            <?php }; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== Warranty FAQ (Minimal) ===== -->
<section id="warranty-faq" class="section-pad" style="background: var(--thm-black); padding:70px 0;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">

        <!-- Card wrapper -->
        <div class="faq-card" style="
          background:#fff;
          border:2px solid var(--thm-gray);
          border-radius:16px;
          box-shadow:0 4px 12px rgba(0,0,0,.06);
          overflow:hidden;">

          <!-- Header -->
          <header class="text-center" style="padding:32px 24px 8px;">
            <h2 style="margin:0; color:var(--thm-base); font-weight:700;">
              📋 Painting Warranty — Terms &amp; Conditions (FAQ)
            </h2>
            <p style="margin:10px 0 4px; color:var(--thm-gray);">
              Cobertura, exclusiones y cómo hacer un reclamo
            </p>
          </header>

          <!-- FAQ list -->
          <div class="faq-list" style="padding: 8px 8px 24px;">

            <!-- 1. Coverage -->
            <details>
              <summary>
                <span><i class="fas fa-check-shield" aria-hidden="true"></i> Warranty Coverage</span>
                <i class="fas fa-chevron-down" aria-hidden="true"></i>
              </summary>
              <div class="faq-body">
                <p>The warranty covers a period of <strong>2 years</strong> from the date of completion of the work and applies only to painting services performed by our company on the surfaces specified in the contract.</p>
                <p><strong>Includes:</strong> Peeling, cracking, or blistering of the paint due to poor application or defective materials provided by the company.</p>
              </div>
            </details>

            <!-- 2. Exclusions -->
            <details>
              <summary>
                <span><i class="fas fa-ban" aria-hidden="true"></i> Warranty Exclusions</span>
                <i class="fas fa-chevron-down" aria-hidden="true"></i>
              </summary>
              <div class="faq-body">
                <ul>
                  <li>Normal wear and tear from environmental exposure (sun, rain, humidity, etc.).</li>
                  <li>Misuse, abuse, impacts, scratches, or accidental damage.</li>
                  <li>Excessive moisture, water leaks, mold, mildew, or seepage.</li>
                  <li>Jobs where the client provided the materials.</li>
                  <li>Color changes due to aging, sun exposure, or chemicals.</li>
                  <li>Repairs or modifications by third parties after completion.</li>
                </ul>
              </div>
            </details>

            <!-- 3. Claim Procedure -->
            <details>
              <summary>
                <span><i class="fas fa-clipboard-list" aria-hidden="true"></i> Claim Procedure</span>
                <i class="fas fa-chevron-down" aria-hidden="true"></i>
              </summary>
              <div class="faq-body">
                <ol>
                  <li>Notify the company <strong>in writing within 15 days</strong> of noticing the issue.</li>
                  <li>We will inspect the affected area to determine coverage.</li>
                  <li>If approved, we will repair or repaint the affected areas at <strong>no additional cost</strong>.</li>
                  <li>No refunds are included—only correction of defective work.</li>
                </ol>
              </div>
            </details>

            <!-- 4. Limitation of Liability -->
            <details>
              <summary>
                <span><i class="fas fa-scale-unbalanced" aria-hidden="true"></i> Limitation of Liability</span>
                <i class="fas fa-chevron-down" aria-hidden="true"></i>
              </summary>
              <div class="faq-body">
                <p>Liability under this warranty is limited solely to the <strong>repair or repainting</strong> of the affected area and does not cover indirect, incidental, or consequential damages.</p>
              </div>
            </details>

            <!-- 5. Validity -->
            <details>
              <summary>
                <span><i class="fas fa-id-card-check" aria-hidden="true"></i> Warranty Validity</span>
                <i class="fas fa-chevron-down" aria-hidden="true"></i>
              </summary>
              <div class="faq-body">
                <ul>
                  <li>Valid only if <strong>full payment</strong> for contracted services has been completed.</li>
                  <li><strong>Non-transferable</strong> and applies only to the original client and serviced property.</li>
                </ul>
              </div>
            </details>

            <!-- Note -->
            <div style="padding:18px 20px 6px; border-top:1px dashed var(--thm-gray); margin-top:8px;">
              <small style="color:var(--thm-gray); display:block;">
                <i class="fas fa-info-circle" aria-hidden="true"></i>
                &nbsp;*Restrictions apply. For full details, see your signed contract.
              </small>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<!-- ===== /Warranty FAQ ===== -->

<!-- Minimal styles for the accordion (scoped) -->
<style>
  #warranty-faq details {
    border-top: 1px solid rgba(0, 0, 0, .05);
  }

  #warranty-faq details:first-of-type {
    border-top: none;
  }

  #warranty-faq summary {
    list-style: none;
    cursor: pointer;
    display: grid;
    grid-template-columns: 1fr auto;
    align-items: center;
    gap: 12px;
    padding: 18px 20px;
    font-weight: 600;
    color: var(--thm-base);
  }

  #warranty-faq summary::-webkit-details-marker {
    display: none;
  }

  #warranty-faq summary span i {
    color: var(--thm-base);
    margin-right: 8px;
  }

  #warranty-faq details[open] summary {
    background: rgba(3, 51, 149, .06);
    /* suave, derivado del principal */
  }

  #warranty-faq .faq-body {
    padding: 0 20px 18px 44px;
    color: var(--thm-gray);
    line-height: 1.7;
  }

  #warranty-faq .faq-body ul,
  #warranty-faq .faq-body ol {
    margin: 8px 0 0 18px;
  }
</style>

<!-- FAQPage JSON-LD for SEO -->
<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [{
        "@type": "Question",
        "name": "What does the 2-year painting warranty cover?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Peeling, cracking, or blistering due to poor application or defective materials provided by the company, for 2 years from completion, on contracted surfaces."
        }
      },
      {
        "@type": "Question",
        "name": "What is not covered by the warranty?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Normal wear, misuse, impacts, moisture/leaks/mold, client-supplied materials, color changes by aging/sun/chemicals, and third-party modifications."
        }
      },
      {
        "@type": "Question",
        "name": "How do I file a warranty claim?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Notify in writing within 15 days; we will inspect and, if approved, repair or repaint the affected area at no additional cost. Refunds are not included."
        }
      },
      {
        "@type": "Question",
        "name": "What are the limits of liability?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Our liability is limited to repair or repainting of the affected area; indirect, incidental, or consequential damages are not covered."
        }
      },
      {
        "@type": "Question",
        "name": "When is the warranty valid?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Only when full payment is completed. It is non-transferable and applies to the original client and serviced property."
        }
      }
    ]
  }
</script>



<?php include('footer.php') ?>