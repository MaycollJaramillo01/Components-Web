<section id="reviews-sec" class="reviews-min section" aria-labelledby="reviewsTitle">
  <style>
    .reviews-min{background:var(--bg,#fff);padding-block:clamp(48px,7vw,96px)}
    .reviews-min__head{display:flex;flex-wrap:wrap;align-items:flex-end;justify-content:space-between;gap:16px;margin-bottom:20px}
    .reviews-min .eyebrow{display:inline-flex;align-items:center;gap:8px;padding:6px 12px;border-radius:999px;background:var(--smoke-color2,#F1F5F9);color:var(--txt-1,#0D0D0D);font:700 .9rem/1 var(--body-font,Inter)}
    .reviews-min .title{margin:.5rem 0 0;font:900 clamp(22px,3vw,30px)/1.15 var(--title-font,Exo);color:var(--title-color,#000)}
    .reviews-min .lead{margin:.25rem 0 0;color:var(--body-color,#333)}

    /* Cards */
    .rvw{background:#fff;border:1px solid var(--th-border-color,#E5E7EB);border-radius:14px;
         box-shadow:0 6px 16px rgba(0,0,0,.06);padding:14px;display:flex;
         flex-direction:column;gap:8px;min-height:180px;margin:10px}
    .rvw__head{display:grid;grid-template-columns:auto 1fr auto;gap:6px;align-items:center}
    .rvw__avatar{width:32px;height:32px;border-radius:50%;display:grid;place-items:center;
                 background:var(--brand-3,#FFFFFF);border:1px solid var(--th-border-color,#E5E7EB);
                 font:800 .85rem/1 var(--body-font,Inter);color:var(--brand-2,#000)}
    .rvw__name{font:700 .95rem/1.1 var(--body-font,Inter);color:var(--title-color,#000)}
    .rvw__meta{grid-column:2/span 1;color:var(--gray-color,#9CA3AF);font-size:.78rem}
    .rvw__stars{display:inline-flex;gap:2px}
    .rvw__stars svg{width:14px;height:14px;fill:var(--brand-1,#D93030)}
    .rvw__text{margin:2px 0 0;color:var(--body-color,#333);font-size:.9rem;
               -webkit-line-clamp:3;line-clamp:3;-webkit-box-orient:vertical;
               display:-webkit-box;overflow:hidden}
    .rvw__owner{margin-top:6px;padding:8px;border-radius:10px;background:var(--smoke-color,#F6F6F6);
                color:var(--txt-2,#4B5563);font-size:.85rem;border:1px dashed var(--th-border-color,#E5E7EB)}

    /* Swiper ajustes */
    .reviews-swiper{padding-bottom:40px}
    .swiper-pagination-bullet{background:#000;opacity:.3}
    .swiper-pagination-bullet-active{background:var(--brand-1,#D93030);opacity:1}
    .btn-secondary {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  padding: 12px 22px;
  border-radius: 999px;
  border: 2px solid var(--brand-2, #0F172A); /* color oscuro por defecto */
  text-decoration: none;
  font: 700 0.95rem/1 var(--body-font, Inter, sans-serif);
  color: var(--brand-2, #0F172A);
  background: #fff;
  box-shadow: 0 4px 10px rgba(0,0,0,0.06);
  transition: all 0.3s ease;
}

.btn-secondary:hover {
  background: var(--brand-2, #0F172A);
  color: #fff;
  box-shadow: 0 6px 14px rgba(0,0,0,0.1);
  transform: translateY(-2px);
}

.btn-secondary:active {
  transform: translateY(0);
  box-shadow: 0 3px 6px rgba(0,0,0,0.15);
}

.btn-secondary i {
  font-size: 1rem;
  line-height: 1;
}

  </style>

  <?php
    // Fuente del enlace a Google
    $google_reviews_url = $google ?? ($links['google_share'] ?? '#');

    // Reviews (ejemplo, puedes mover a text.php si prefieres)
    $reviews = [
      ["name"=>"Trevor Hill","meta"=>"11 reviews · 6 photos","when"=>"a year ago","rating"=>5,
        "text"=>"Henry and his team did a terrific job. They sanded, stained and replaced rotting boards on our back deck. They also repainted our front steps and railings. Both jobs look great and we’re very happy with the outcome. Henry was responsive and … More",
        "owner"=>""],
      ["name"=>"Michael Hughes","meta"=>"Local Guide · 26 reviews · 1 photo","when"=>"7 months ago","rating"=>5,
        "text"=>"After reading Google reviews, we reached out to Henry. True to all the reviews, Henry successfully made repairs to my home. He stuck to his fair, upfront quote, even though he did more than originally accounted for … More",
        "owner"=>"Thank you…."],
      ["name"=>"Chad Harris","meta"=>"1 review","when"=>"6 months ago","rating"=>5,
        "text"=>"Henry and his team were professional with the renovation of my bathroom shower, and overall painting etc. Their schedule was very flexible to incorporate when we were out of town or busy.",
        "owner"=>"Thank you…."],
      ["name"=>"David Swanson","meta"=>"6 reviews","when"=>"a year ago","rating"=>5,
        "text"=>"2 bathroom remodels in my 1962 home. Curbless shower, underfloor heat, floor to ceiling tile, drywall, painting and plenty of old home challenges. Excellent attention to detail; tiling was superb.",
        "owner"=>"Thank you…."],
      ["name"=>"nick cor","meta"=>"1 review","when"=>"2 years ago","rating"=>5,
        "text"=>"Henry and his team did a fantastic job remodeling our main bathroom. Hard working and quality work. Highly recommend.",
        "owner"=>"Thank you…"],
      ["name"=>"Neha Patel","meta"=>"8 reviews · 3 photos","when"=>"2 years ago","rating"=>5,
        "text"=>"Henry and his team have been integral in helping us finish our home. Honest, hard working, professional, and clean with his work. I won’t use anyone else!",
        "owner"=>"Thank you…"],
      ["name"=>"A J","meta"=>"3 reviews · 1 photo","when"=>"a month ago","rating"=>5,
        "text"=>"High quality work, I highly recommend Henri.",
        "owner"=>""],
      ["name"=>"Cynthia S","meta"=>"2 reviews","when"=>"a year ago","rating"=>5,
        "text"=>"Henry and his team did a great job replacing our railings. Work was done professionally and in a timely manner.",
        "owner"=>"Thank you…."],
      ["name"=>"Lisa Mien Family","meta"=>"3 reviews","when"=>"3 years ago","rating"=>5,
        "text"=>"Very pleased with their work. Three days and my parents’ deck was completed. Decent price and beautiful outcome. Highly recommend.",
        "owner"=>""],
      ["name"=>"Joseph Sacco","meta"=>"1 review","when"=>"3 years ago","rating"=>5,
        "text"=>"Quality work at a fair rate! They replaced a broken window very quickly. Friendly and great to work with.",
        "owner"=>"Thank you…"],
      ["name"=>"Edward","meta"=>"2 reviews","when"=>"2 years ago","rating"=>5,
        "text"=>"More than happy with the crew at 5 Stars Home Improvement. Everything was done professionally, on time and reasonable. Highly recommend Henry and his crew.",
        "owner"=>""],
    ];

    $reviewCount = count($reviews);
    $avg = 5.0; // todas son 5★
    function initials($n){ $p = preg_split('/\s+/', trim($n)); return strtoupper(mb_substr($p[0],0,1).(isset($p[1])?mb_substr($p[1],0,1):'')); }
    function stars($n=5){
      $s=''; for($i=1;$i<=5;$i++){
        $s.='<svg viewBox="0 0 20 20" aria-hidden="true"><path d="M10 1.5l2.6 5.3 5.9.9-4.2 4.2 1 5.8L10 15.8 4.7 17.7l1-5.8L1.5 7.7l5.9-.9L10 1.5z"/></svg>';
      } return $s;
    }
  ?>

  <div class="container">
    <!-- Encabezado -->
    <div class="reviews-min__head">
      <div>
        <span class="eyebrow"><i class="far fa-sparkles"></i> What people say</span>
        <h2 id="reviewsTitle" class="title">5-Star Reviews for <?= htmlspecialchars($Company ?? '',ENT_QUOTES) ?></h2>
        <p class="lead">Real experiences from customers who trusted us.</p>
      </div>
      <a class="rating-pill" href="<?= htmlspecialchars($google_reviews_url,ENT_QUOTES) ?>" target="_blank" rel="noopener">
        ★ <?= number_format($avg,1) ?> · <?= $reviewCount ?> Google reviews
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
                <span class="rvw__meta"><?= htmlspecialchars($r['meta'].' · '.$r['when']) ?></span>
              </header>
              <p class="rvw__text"><?= htmlspecialchars($r['text']) ?></p>
              <?php if (!empty($r['owner'])): ?>
                <div class="rvw__owner">Response: <?= htmlspecialchars($r['owner']) ?></div>
              <?php endif; ?>
            </article>
          </div>
        <?php endforeach; ?>
      </div>
      <!-- PaginaciOn -->
      <div class="swiper-pagination"></div>
    </div>

    <!-- CTA -->
    <div class="reviews-min__foot">
      <a class="btn-secondary" href="<?= htmlspecialchars($google_reviews_url,ENT_QUOTES) ?>" target="_blank" rel="noopener">
        See all reviews on Google
      </a>
    </div>
  </div>
</section>

<!-- Init Swiper -->
<script>
  document.addEventListener("DOMContentLoaded",function(){
    new Swiper(".reviews-swiper",{
      slidesPerView:2,
      spaceBetween:20,
      loop:true,
      autoplay:{
        delay:2500,
        disableOnInteraction:false
      },
      pagination:{el:".swiper-pagination",clickable:true},
      breakpoints:{
        0:{slidesPerView:1}, /* en móvil: 1 columna */
        768:{slidesPerView:2} /* en tablet y desktop: 2 columnas */
      }
    });
  });
</script>