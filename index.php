<?php get_header(); ?>
	<article class="full-width">
		<div class="container">
			<div id="post-0" class="home">
				<div class="entry-content">

<!-- Sletat module6 — лениво -->
<div id="sletat-module" data-sletat-module-id="df2e741e-2bcd-4917-a7f0-bc100b584296"></div>
<script>
(function(){
  var inited = false;
  function initModule(){
    if (inited) return;
    inited = true;
    window.__webpack_public_path__="https://front.sletat.ru/modules/module6/latest/";
    var s1=document.createElement('script');
    s1.src="https://ui.sletat.ru/module-4.0/core.js";
    s1.defer=true;
    document.head.appendChild(s1);
    var s2=document.createElement('script');
    s2.src="https://front.sletat.ru/modules/module6/latest/module.js";
    s2.defer=true;
    s2.dataset.container="sletat-module";
    s2.dataset.moduleId="df2e741e-2bcd-4917-a7f0-bc100b584296";
    document.head.appendChild(s2);
  }
  var target = document.getElementById('sletat-module');
  var obs = new IntersectionObserver(function(entries){
    entries.forEach(function(e){
      if (e.isIntersecting) {
        initModule();
        obs.disconnect();
      }
    });
  }, {rootMargin: '200px'});
  obs.observe(target);
})();
</script>


<div class="flex-slider">
  <ul class="slides">
    <li>
      <div class="slide-image" data-bg="/wp-content/uploads/Онлайн.png" data-flex-start="center center ">
        <div class="box_sh">
          <div class="w_app">
            <a href="https://wa.me/79817010302?text=%D0%94%D0%BE%D0%B1%D1%80%D1%8B%D0%B9%20%D0%B4%D0%B5%D0%BD%D1%8C!%20%D0%A5%D0%BE%D1%87%D1%83%20%D0%BF%D0%BE%D0%B4%D0%BE%D0%B1%D1%80%D0%B0%D1%82%D1%8C%20%D1%82%D1%83%D1%80">
              Написать в WhatsApp
            </a>
          </div>
          <div class="t_app">
            <a href="#" id="open-quiz">Подобрать тур</a>
          </div>
        </div>
      </div>
    </li>
  </ul>
</div>
					
<!-- БЛОК ПРЕИМУЩЕСТВ "TEZ" -->
<section class="tez-advantages" aria-label="Наши преимущества">
  <div class="tez-adv-grid">
    <!-- Левая колонка: текст -->
    <div class="tez-adv-text">
      <p>
        Путешествия – отличный способ провести время с пользой для себя, путь к саморазвитию и продуктивному отдыху.
        Даже сейчас с непростыми ограничениями на въезд во многие страны, можно найти множество вариантов – турагентство
        TEZ Тур предлагает разнообразные туры в самые интересные страны мира прямиком из Санкт-Петербурга.
      </p>
    </div>

    <!-- Правая колонка: две карточки (иконка слева, текст справа) -->
    <div class="tez-adv-right">
      <article class="tez-adv-item">
        <img class="tez-icon-img"
             src="https://tez-tourspb.ru/wp-content/uploads/tour_2.png"
             alt="Помогаем с выбором" width="100" height="100" loading="lazy">
        <div class="tez-adv-copy">
          <p class="tez-adv-caption">
            <span class="tez-adv-strong">Расскажем о нюансах</span> и особенностях каждого отеля или экскурсии
          </p>
        </div>
      </article>

      <article class="tez-adv-item">
        <img class="tez-icon-img"
             src="https://tez-tourspb.ru/wp-content/uploads/tour_1.png"
             alt="Безопасные туры" width="100" height="100" loading="lazy">
        <div class="tez-adv-copy">
          <p class="tez-adv-caption">
            Подбираем <span class="tez-adv-strong">проверенные отели</span> где были сами или отдыхали туристы
          </p>
        </div>
      </article>
    </div>
  </div>
</section>

<style>
  :root{
    --tez-blue:#2e6cff;
    --tez-text:#1f2937;
    --tez-muted:#6b7a90;
    --tez-card:#ffffff;
    --tez-border:#eef2f7;

    /* регулируемые параметры */
    --tez-icon-size:50px;   /* размер иконок */
    --tez-icon-gap:6px;    /* расстояние между иконкой и текстом */
  }

  /* Секция */
  .tez-advantages{
    padding:24px 0;
    clear:both;
    width:100%;
    display:block;
  }

  /* 2 колонки: слева текст, справа — две карточки */
  .tez-adv-grid{
    display:grid;
    grid-template-columns:minmax(0,1fr) minmax(0,1fr);
    gap:16px;
    align-items:stretch;
    box-sizing:border-box;
  }

  /* Левая колонка */
  .tez-adv-text{
    background:var(--tez-card);
    border:1px solid var(--tez-border);
    border-radius:14px;
    padding:22px 20px;
    color:var(--tez-text);
    line-height:1.55;
    font-size:16px;
  }
  .tez-adv-text p{ margin:0; }

  /* Правая колонка: две карточки в ряд */
  .tez-adv-right{
    display:grid;
    grid-template-columns:repeat(2, minmax(0,1fr));
    gap:16px;
  }

  /* Карточка преимущества: ВЕРТИКАЛЬ — иконка сверху слева, текст ниже */
  .tez-adv-item{
    background:var(--tez-card);
    border:1px solid var(--tez-border);
    border-radius:14px;
    padding:14px 16px;
    box-sizing:border-box;

    /* надёжная схема: grid с межстрочным отступом */
    display:grid !important;
    grid-template-columns:1fr;
    grid-template-rows:auto auto;
    align-items:start;
    row-gap:var(--tez-icon-gap);

    float:none !important; /* если тема даёт float для <article> */
  }

  .tez-icon-img{
    width:var(--tez-icon-size);
    height:var(--tez-icon-size);
    object-fit:contain;
    opacity:.6;              /* приглушаем рядом с поиском */
    filter:grayscale(20%);
    display:block;
    justify-self:start;      /* по левому краю */
  }

  .tez-adv-copy{ justify-self:start; }
  .tez-adv-caption{
    font-size:16px;          /* как в левом блоке */
    line-height:1.55;
    color:var(--tez-text);
    margin:0;
  }
  .tez-adv-strong{ font-weight:700; }

  /* Адаптив */
  @media (max-width:1100px){
    .tez-adv-grid{ grid-template-columns:1fr; }
    .tez-adv-right{ grid-template-columns:repeat(2, minmax(0,1fr)); }
  }
  @media (max-width:640px){
    .tez-adv-right{ grid-template-columns:1fr; }
    :root{ --tez-icon-gap:20px; } /* немного компактнее на мобиле */
  }
</style>


<!-- /БЛОК ПРЕИМУЩЕСТВ -->

<!-- Популярные направления -->
<?php include get_template_directory() . '/popular-directions.php'; ?>	

<div class="v_block">
  <h1><?php the_field('text_o', 'option'); ?></h1>
  <div class="bg_block">
    <?php if( have_rows('country_r', 'option') ): ?>
      <?php while( have_rows('country_r', 'option') ): the_row();
        $category = get_sub_field('n_post');
        $name_titlr = get_sub_field('name_titl');
        $flag_h = get_sub_field('img___k');
        if (is_object($category)) {
          $category_id = $category->term_id;
          $slug = $category->slug;
          $name = $category->name;
          $image_data = get_field('minyatury_dlya_rubrik', 'category_' . $category_id);
          $thumbnail_url = $image_data['sizes']['thumbnail'] ?? '';
        }
      ?>
        <a href="<?php echo esc_url( home_url( '/' . $slug ) ); ?>">
          <?php if (!empty($thumbnail_url)): ?>
            <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($name); ?>">
          <?php else: ?>
            <img src="<?php echo esc_url($flag_h); ?>" alt="<?php echo esc_attr($name_titlr); ?>">
          <?php endif; ?>
          <?php echo esc_html($name_titlr); ?>
        </a>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>

<div class="flex_fair">
  <?php if( have_rows('service', 'option') ): ?>
  <div class="servic_d">
    <h2><?php the_field('block_service_left', 'option'); ?></h2>
    <div>
      <?php while( have_rows('service', 'option') ): the_row();
        $title = get_sub_field('name_service');
        $url = get_sub_field('url_service'); ?>
        <div class="slid"><a href="<?php echo esc_url($url); ?>"><?php echo esc_html($title); ?></a></div>
      <?php endwhile; ?>
    </div>
  </div>
  <?php endif; ?>

  


	

</div></div></div>

<div class="block_w">
  <h2><?php the_field('title_block_h', 'option'); ?></h2>
  <div id="tourmometr-root"></div>
  <script src="https://ui.sletat.ru/tourmometr/app.js" defer></script>
  <script>
    window.addEventListener('load', function(){
      try {
        window['sletat']['tourmometr']['create']({ settingsId: 'a3681fb3-66da-4525-b6fa-811bf8088a73' });
      } catch(e){}
    });
  </script>
</div>

<div class="v_block b___t">
  <h2><?php the_field('title_pr', 'option'); ?></h2>
  <div><div class="bn_f"><?php the_field('text_block', 'option'); ?></div></div>
</div>

	</article>



<?php get_footer(); ?>
