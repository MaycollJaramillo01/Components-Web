<?php
// ---------- Opciones del popup ----------
$PopupImage = 'assets/img/project/8.jpg';  // Fondo del lado izquierdo
$PopupQR    = 'assets/img/qr_code.png';     // Imagen QR
$PopupLogo  = 'assets/img/logo/logo.png'; // Logo de la empresa
$PopupDelay = 3000;                              // ms para mostrar el popup
$PopupTTL   = 7;                                 // días para no volver a mostrar
$PopupLink  = 'https://' . $Domain;              // URL del QR (puedes poner $google)
?>
<style>
  :root {
    --oz-blue: #e4121f;
    --oz-dark: #222;
    --oz-light: #f7f7f7;
    --oz-accent: #1f9bd1;
  }

  .oz-popup__overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, .55);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 99999;
  }

  .oz-popup__dialog {
    width: min(960px, 92vw);
    background: #fff;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 18px 60px rgba(0, 0, 0, .35);
    display: grid;
    grid-template-columns: 1.1fr 1fr;
    gap: 0;
    animation: oz-pop .25s ease-out both;
  }

  @keyframes oz-pop {
    from {
      transform: translateY(16px);
      opacity: .6
    }

    to {
      transform: none;
      opacity: 1
    }
  }

  .oz-popup__media {
    position: relative;
    min-height: 420px;
    background: #333;
    background-image: url('<?= htmlspecialchars($PopupImage, ENT_QUOTES) ?>');
    background-size: cover;
    background-position: center;
  }

  .oz-popup__ring {
    position: absolute;
    inset: 20px;
    border-radius: 50%;
    box-shadow: 0 0 0 6px #0c70a82b, 0 0 0 14px #00000014;
    pointer-events: none;
  }

  /* === Logo flotante responsive === */
  .oz-logo-overlay {
    position: absolute;
    top: 15px;
    left: 15px;
    z-index: 2;
    padding: 6px;
    border-radius: 999px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, .15);
    background-color: #fff;
  }

  .oz-logo-overlay .logo-img {
    width: clamp(64px, 12vw, 150px);
    aspect-ratio: 1/1;
    object-fit: cover;
    border-radius: 50%;
    display: block;
  }

  @media (max-width:575.98px) {
    .oz-logo-overlay {
      top: 10px;
      left: 10px;
      padding: 5px
    }

    .oz-logo-overlay .logo-img {
      width: clamp(56px, 18vw, 96px)
    }
  }

  /* QR */
  .oz-qr {
    position: absolute;
    left: 18px;
    bottom: 18px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, .25);
    padding: 10px;
    width: 142px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    text-decoration: none;
  }

  .oz-qr img {
    width: 122px;
    height: 122px;
    display: block;
    border-radius: 8px
  }

  .oz-qr span {
    font-size: 12px;
    font-weight: 700;
    color: #0d6ea8;
    text-align: center;
    line-height: 1.2
  }

  .oz-popup__body {
    padding: 26px 26px 22px 26px;
    background: #fff;
    position: relative
  }

  .oz-popup__logo {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
  }

  .oz-popup__brand {
    font-weight: 800;
    font-size: 20px;
    color: var(--oz-dark);
    line-height: 1.1
  }

  /* Badge adaptable (19 Years of Experience) */
  .oz-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 8px 12px;
    border-radius: 999px;
    background: #ecf6ff;
    color: #0d6ea8;
    font-weight: 700;
    font-size: 13px;
    line-height: 1;
    box-shadow: inset 0 0 0 1px #d7eaff;
  }

  @media (max-width:575.98px) {
    .oz-badge {
      font-size: 12px;
      padding: 7px 10px
    }
  }

  .oz-popup__title {
    font-size: 26px;
    font-weight: 900;
    color: var(--oz-dark);
    margin: 6px 0 10px
  }

  .oz-popup__lead {
    color: #444;
    font-size: 14px;
    margin: 0 0 12px
  }

  .oz-list {
    margin: 10px 0 12px;
    padding: 0;
    list-style: none
  }

  .oz-list li {
    display: grid;
    grid-template-columns: 20px 1fr;
    gap: 10px;
    align-items: start;
    margin: 9px 0;
    font-size: 14px;
    color: #222
  }

  .oz-bullet {
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background: var(--oz-blue);
    display: inline-grid;
    place-items: center;
    margin-top: 2px
  }

  .oz-bullet svg {
    width: 12px;
    height: 12px;
    fill: #fff
  }

  .oz-cta {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-top: 12px
  }

  .oz-btn {
    appearance: none;
    border: 0;
    cursor: pointer;
    text-decoration: none;
    user-select: none;
    padding: 10px 14px;
    font-weight: 700;
    border-radius: 10px;
    transition: .18s;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 14px
  }

  .oz-btn--call {
    background: var(--oz-blue);
    color: #fff
  }

  .oz-btn--mail {
    background: #0ca678;
    color: #fff
  }

  .oz-btn--site {
    background: #111;
    color: #fff
  }

  .oz-btn:hover {
    transform: translateY(-1px);
    filter: brightness(1.02)
  }

  .oz-meta {
    margin-top: 12px;
    font-size: 13px;
    color: #333
  }

  .oz-meta b {
    color: #000
  }

  .oz-social {
    margin-top: 10px
  }

  .oz-social h6 {
    font-size: 14px;
    font-weight: 800;
    margin: 12px 0 6px;
    color: #111
  }

  .oz-social-list {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    align-items: center
  }

  .oz-social-list a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: #e4121f;
    box-shadow: inset 0 0 0 1px #e6eef6;
    transition: .15s
  }

  .oz-social-list a:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, .12)
  }

  .oz-social-list svg {
    width: 18px;
    height: 18px;
    fill: #fff
  }

  .oz-close {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background: #ffffffd9;
    border: 1px solid #e5e5e5;
    display: grid;
    place-items: center;
    cursor: pointer;
    transition: .15s
  }

  .oz-close:hover {
    background: #fff;
    transform: rotate(90deg)
  }

  .oz-dontshow {
    margin-top: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    color: #333
  }

  @media (max-width:767.98px) {

    /* Móvil: 1 columna, scroll interno y se oculta .oz-services */
    .oz-popup__dialog {
      display: flex;
      flex-direction: column;
      width: 95vw;
      max-height: 90vh;
      overflow-y: auto;
    }

    .oz-popup__media {
      min-height: 200px
    }

    .oz-qr {
      position: static;
      margin: 10px auto 0 auto;
      width: 128px
    }

    .oz-qr img {
      width: 112px;
      height: 112px
    }

    .oz-services {
      display: none;
    }

    /* <-- oculta la sección larga en móvil */
  }
</style>

<div class="oz-popup__overlay" id="ozPopup" role="dialog" aria-modal="true" aria-labelledby="ozPopupTitle" aria-describedby="ozPopupDesc">
  <div class="oz-popup__dialog">
    <div class="oz-popup__media">
      <!-- Logo -->
      <div class="oz-logo-overlay">
        <img src="<?= htmlspecialchars($PopupLogo, ENT_QUOTES) ?>" alt="<?= htmlspecialchars($Company) ?> Logo" class="img-fluid rounded-circle logo-img">
      </div>


      <!-- QR -->
      <a class="oz-qr" href="<?= htmlspecialchars($PopupLink) ?>" target="_blank" rel="noopener" aria-label="Open site">
        <img src="<?= htmlspecialchars($PopupQR, ENT_QUOTES) ?>" alt="QR - <?= htmlspecialchars($Domain) ?>">

      </a>
    </div>

    <div class="oz-popup__body">
      <button class="oz-close" id="ozPopupClose" aria-label="Close">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
          <path d="M18.3 5.7a1 1 0 0 0-1.4-1.4L12 9.17 7.1 4.3A1 1 0 1 0 5.7 5.7L10.6 10.6 5.7 15.5a1 1 0 1 0 1.4 1.4L12 12l4.9 4.9a1 1 0 0 0 1.4-1.4l-4.9-4.9 4.9-4.9Z" fill="#222" />
        </svg>
      </button>

      <div class="oz-popup__logo">
        <div class="oz-popup__brand"><?= htmlspecialchars($Company) ?></div>
        <span class="oz-badge"><?= htmlspecialchars($Experience) ?></span>
      </div>

      <!-- Sección larga: SOLO desktop/tablet -->
      <div class="oz-services">
        <h3 class="oz-popup__title" id="ozPopupTitle">Our Services</h3>
        <p class="oz-popup__lead" id="ozPopupDesc"><?= htmlspecialchars($Services) ?> in Belton &amp; surrounding areas.</p>
        <ul class="oz-list">
          <?php
          $items = [];
          if (!empty($SN[1])) $items[] = $SN[1];
          if (!empty($SN[4])) $items[] = $SN[4];
          if (!empty($SN[2])) $items[] = 'Roofing Services';
          if (!empty($SN[3])) $items[] = 'Siding Installation';
          if (!empty($SN[5])) $items[] = 'Fence Installation';
          foreach ($items as $li): ?>
            <li>
              <span class="oz-bullet" aria-hidden="true">
                <svg viewBox="0 0 24 24">
                  <path d="M20.285 6.708a1 1 0 0 0-1.57-1.242l-8.5 10.74-4.17-4.17a1 1 0 1 0-1.414 1.414l4.96 4.96a1 1 0 0 0 1.51-.09l9.184-11.612z" />
                </svg>
              </span>
              <span><?= htmlspecialchars($li) ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- CTAs (siempre visibles) -->
      <div class="oz-cta">
        <a class="oz-btn oz-btn--call" href="<?= htmlspecialchars($PhoneRef) ?>">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="#fff">
            <path d="M6.6 10.8a15.6 15.6 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25 11 11 0 0 0 3.5.58 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 7a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11 11 0 0 0 .58 3.5 1 1 0 0 1-.25 1l-2.23 2.3Z" />
          </svg>
          Call <?= htmlspecialchars($Phone) ?>
        </a>
        <a class="oz-btn oz-btn--mail" href="<?= htmlspecialchars($MailRef) ?>">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="#fff">
            <path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 4-8 5L4 8V6l8 5 8-5v2Z" />
          </svg>
          Email
        </a>
        <a class="oz-btn oz-btn--site" target="_blank" rel="noopener" href="https://<?= htmlspecialchars($Domain) ?>">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="#fff">
            <path d="M14 3h7v7h-2V6.41l-9.29 9.3-1.42-1.42 9.3-9.29H14V3ZM5 5h6v2H7v10h10v-4h2v6H5V5Z" />
          </svg>
          Visit Site
        </a>
      </div>

      <!-- Datos -->
      <div class="oz-meta">
        <div><b>Address:</b> <?= htmlspecialchars($Address) ?></div>
        <div><b>Schedule:</b> <?= htmlspecialchars($Schedule) ?></div>
      </div>

      <!-- Redes sociales desde text.php (solo las que existan) -->
      <div class="oz-social">
        <h6>Follow us</h6>
        <div class="oz-social-list">
          <?php
          $links = [
            'facebook' => isset($facebook) ? $facebook : '',
            'google'   => isset($google) ? $google : '',
            'thumbtack' => isset($thumbtack) ? $thumbtack : '',
            'porch'    => isset($porch) ? $porch : '',
            'chamber'  => isset($chamber) ? $chamber : '',
            'gb'       => isset($gb) ? $gb : '',
            'brokersnap'   => isset($brokersnap) ? $brokersnap : '', // si usas $gb separado
          ];
          foreach ($links as $name => $url) {
            if (!$url) continue;
            echo '<a href="' . htmlspecialchars($url) . '" target="_blank" rel="noopener" aria-label="' . htmlspecialchars(ucfirst($name)) . '">' . social_icon_svg($name) . '</a>';
          }

          // Helper: iconos SVG
          function social_icon_svg($name)
          {
            switch ($name) {
              case 'facebook':
                return '<svg viewBox="0 0 24 24"><path d="M13 22v-8h3l.5-4H13V7.5c0-1.1.36-1.8 2-1.8h1.7V2.2C15.9 2 14.7 2 13.4 2 10.6 2 9 3.6 9 6.3V10H6v4h3v8h4Z"/></svg>';
              case 'google':
                return '<svg viewBox="0 0 24 24"><path d="M21.6 12.23c0-.74-.07-1.45-.2-2.14H12v4.05h5.4a4.62 4.62 0 0 1-2 3.03v2.51h3.22c1.89-1.74 2.98-4.3 2.98-7.45Z"/><path d="M12 22c2.7 0 4.97-.9 6.63-2.43l-3.22-2.5c-.9.6-2.07.96-3.4.96-2.62 0-4.84-1.77-5.63-4.15H3.02v2.61A9.99 9.99 0 0 0 12 22Z"/><path d="M6.37 13.88A6 6 0 0 1 6 12c0-.65.11-1.28.32-1.88V7.51H3.02A10 10 0 0 0 2 12c0 1.61.39 3.12 1.02 4.49l3.35-2.61Z"/><path d="M12 6.02c1.47 0 2.8.51 3.85 1.5l2.89-2.9A9.97 9.97 0 0 0 12 2 9.99 9.99 0 0 0 3.02 7.51l3.3 2.61C7.1 7.78 9.38 6.02 12 6.02Z"/></svg>';
              case 'thumbtack':
                return '<svg viewBox="0 0 24 24"><path d="M13 2v8.59l3.3 3.3a1 1 0 0 1-.7 1.71H12v6l-2-6H8.4a1 1 0 0 1-.7-1.7L11 10.6V2h2Z"/></svg>';
              case 'porch':
                return '<svg viewBox="0 0 24 24"><path d="M3 11 12 4l9 7v9a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1v-9Z"/></svg>';
              case 'chamber':
                return '<svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 10 10A10.01 10.01 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8 8.01 8.01 0 0 1-8 8Zm0-12a4 4 0 1 0 4 4 4 4 0 0 0-4-4Z"/></svg>';
              case 'gb':
                return '<svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 0 20A10 10 0 0 0 12 2Zm1 14h-2v-2h2v2Zm0-4h-2V6h2v6Z"/></svg>';
              case 'brokersnap':
                return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="50" viewBox="0 0 50 50" fill="none">
            <rect width="50" height="50" fill="url(#pattern0_493_3)"/>
            <defs>
            <pattern id="pattern0_493_3" patternContentUnits="objectBoundingBox" width="1" height="1">
              <use xlink:href="#image0_493_3" transform="scale(0.03125)"/>
            </pattern>
            <image id="image0_493_3" width="32" height="32" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAADMklEQVR4AZSWAZbCIAxEqydbT6aeTG/WnT+SGgLVuo+0kJkkQ2DV8/Lj37qut0/2Y7rlkAAV/JM9ZKsKXD8ZHBncP/G+jo8ClMiFleUhO5RQPAZcRGDM8U1tV4CK3xTxa2GFdIPiiCBXB8RiKkDFKUyrg5ffdy0up/KHTwam1zCuLecADAIaEeWVHEVvqv2sID4Z2EnYRVZHHGfn7wSoOK2qxZ9KzHgKJwn/BZp6sKbFXuhB/CKyY1SpCoVvjjCPTYCCKVzbTiLvRjiB9Wjg57bTalFXuAghtoqAQ61egFYk02sbuXgtHKRIlEWAUYSYXRGQMHdAkkmE4bOpjahfhJGow0x4Px7iesdvl2e0m9gQYWd7gDmnBchZdx/FSWyiOLtDIuE5ppBybMVdMwRkIop9buxMdmRw+4nBsoZLE7flTKBrnoOQAJ8nftlsODDx89SxzcEdQhD3gQ7hzjjHe4sOAIYRxNwtYpIskibXe6pWERtF7lLvOyBG5ALX8j0GAS3Jm5Fmwuo5JvQ1FYfdhoiuW8K+C3ilmT4j6RTMThVCROw6Q8N86MDAeDloPUlfqy9PtR5ut/u9kKMCOE+S7uWp/kO7J2gQIPVVeZxbvs3ETk3xcfEGXFjNPf1FFCSfuc6Tixc7QkTgewVmuHMpYMDOKlBb62LNT+sJwhTvYdyz8lAMd0WvYUSNLlas7XMg2uyU0SoIctSW+nNcnPy1rOXucHGheRNKu7hm3IFo0dL+clETmz9ee19AgcebjliAHDmnlotrWoB2ShEMwCbFDhDGHegwCMJJDMZyZhQ3Lq5zJRKYc1pAA6yozXnRagc2ERWP83QiApLdWwyf9+So7d9ybQIUQKINaMmyCL7x+L2XOYjIawor1Ynu7BYXgVousQlgJYDADcQnQ4S6uHoXcGQx+KFKO2NNPIUdQ6wsD7jmhLMTgFOZOLcqAih+fHL7LQZnmBRSFGyVj7br1Q2Kk7tzDgJAm4jcWtxhtD3EqO5rCKQomKbD4GiG4rCmAgAkglYRNOsGlCNGLMdEril/VwBsiYi2/SokClOcOemm9lFARIQQvU/ycTS7Bke2FRb/4/gHAAD//x8eKEgAAAAGSURBVAMA3lXrOI8W2yYAAAAASUVORK5CYII="/>
            </defs>
            </svg>';
              default:
                return '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/></svg>';
            }
          }
          ?>
        </div>
      </div>

      <label class="oz-dontshow">
        <input type="checkbox" id="ozDontShow"> Don’t show again for <?= (int)$PopupTTL ?> days
      </label>
    </div>
  </div>
</div>

<script>
  (function() {
    const POP_ID = 'oz_popup_seen_v1';
    const TTL_DAYS = <?= (int)$PopupTTL ?>;
    const DELAY = <?= (int)$PopupDelay ?>;

    const $overlay = document.getElementById('ozPopup');
    const $close = document.getElementById('ozPopupClose');
    const $cb = document.getElementById('ozDontShow');

    function now() {
      return Math.floor(Date.now() / 1000);
    }

    function setTTL(days) {
      try {
        localStorage.setItem(POP_ID, String(now() + (days * 86400)));
      } catch (e) {}
    }

    function shouldShow() {
      try {
        const v = parseInt(localStorage.getItem(POP_ID) || '0', 10);
        return !(v && now() < v);
      } catch (e) {
        return true;
      }
    }

    function open() {
      $overlay.style.display = 'flex';
      document.body.style.overflow = 'hidden';
    }

    function close() {
      if ($cb && $cb.checked) {
        setTTL(TTL_DAYS);
      }
      $overlay.style.display = 'none';
      document.body.style.overflow = '';
    }

    if (shouldShow()) {
      setTimeout(open, DELAY);
    }
    $close.addEventListener('click', close);
    $overlay.addEventListener('click', function(e) {
      if (e.target === this) close();
    });
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') close();
    });
  })();
</script>