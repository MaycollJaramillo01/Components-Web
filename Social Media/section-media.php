<section class="brand-one brand-one--two">
  <div class="brand-one--two__bg"></div>
  <div class="auto-container">
    <div class="sec-title-three">
      <h2 class="sec-title-three__title text-center">We Value Your Opinion</h2>
    </div>

    <div class="row justify-content-center align-items-center g-3">
      <?php if (!empty($facebook)) : ?>
        <div class="col-6 col-md-3 col-lg-2">
          <a href="<?= $facebook ?>" target="_blank" rel="noopener" aria-label="Facebook"
            class="d-flex align-items-center justify-content-center">
            <img src="assets/img/brand/face.png" alt="Facebook" class="img-fluid">
          </a>
        </div>
      <?php endif; ?>

      <?php if (!empty($google)) : ?>
        <div class="col-6 col-md-3 col-lg-2">
          <a href="<?= $google ?>" target="_blank" rel="noopener" aria-label="Google Reviews"
            class="d-flex align-items-center justify-content-center">
            <img src="assets/img/brand/gl.png" alt="Google" class="img-fluid">
          </a>
        </div>
      <?php endif; ?>

      <?php if (!empty($tiktok)) : ?>
        <div class="col-6 col-md-3 col-lg-2">
          <a href="<?= $tiktok ?>" target="_blank" rel="noopener" aria-label="TikTok"
            class="d-flex align-items-center justify-content-center">
            <img src="assets/img/brand/tiktok.png" alt="TikTok" class="img-fluid">
          </a>
        </div>
      <?php endif; ?>

      <?php if (!empty($x_link)) : ?>
        <div class="col-6 col-md-3 col-lg-2">
          <a href="<?= $x_link ?>" target="_blank" rel="noopener" aria-label="X (Twitter)"
            class="d-flex align-items-center justify-content-center">
            <img src="assets/img/brand/twitterX.png" alt="X (Twitter)" class="img-fluid">
          </a>
        </div>
      <?php endif; ?>

      <?php if (!empty($usdir)) : ?>
        <div class="col-6 col-md-3 col-lg-2">
          <a href="<?= $usdir ?>" target="_blank" rel="noopener" aria-label="US Directory"
            class="d-flex align-items-center justify-content-center">
            <img src="assets/img/brand/usdirectory.png" alt="US Directory" class="img-fluid">
          </a>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <style>
    .brand-one--two {
      padding: 60px 0;
      position: relative;
      text-align: center;
    }

    .brand-one--two__bg {
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, #00265A 0%, #001A40 100%);
      opacity: 0.08;
      z-index: 0;
    }

    .brand-one--two .sec-title-three__title {
      color: #00265A;
      font-weight: 700;
      margin-bottom: 40px;
      position: relative;
      z-index: 1;
    }

    .brand-one--two .row > div a {
      border-radius: 12px;
      background: #fff;
      padding: 14px;
      transition: transform .3s ease, box-shadow .3s ease;
      position: relative;
      z-index: 1;
    }

    .brand-one--two .row > div a:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, .15);
    }

    .brand-one--two img {
      max-width: 200px;
      height: auto;
      filter: brightness(0.95);
      transition: filter .3s ease;
    }

    .brand-one--two a:hover img {
      filter: brightness(1.1);
    }
  </style>
</section>
