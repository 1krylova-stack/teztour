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
      <div class="slide-image" data-bg="/wp-content/uploads/banner-3.jpg" data-flex-start="center center ">
        <div class="box_sh">
          <div class="w_app">
  <a class="tt-btn-outline" href="https://t.me/+79817010302" target="_blank" rel="noopener">
    <svg viewBox="0 0 24 24" aria-hidden="true">
      <path d="M9.04 15.47l-.38 5.3c.55 0 .79-.24 1.08-.52l2.6-2.5 5.39 3.94c.99.55 1.7.26 1.96-.91l3.55-16.65c.32-1.51-.55-2.1-1.52-1.74L1.5 9.13c-1.46.57-1.44 1.38-.25 1.75l5.55 1.73L19.67 5.4c.64-.4 1.22-.18.74.22"/>
    </svg>
    Написать в Telegram
  </a>
</div>
          <div class="t_app">
  <a class="tt-btn-primary" href="#" id="open-quiz">
    Подобрать тур
  </a>
</div>
        </div>
      </div>
    </li>
  </ul>
</div>
					
<!-- БЛОК ПРЕИМУЩЕСТВ "TEZ" -->
<section class="tez-advantages" aria-label="Наши преимущества">
  <div class="tez-adv-grid">
    <!-- Левая колонка: заголовок + иконка Земли + текст -->
    <div class="tez-adv-text">
		<p class="tez-adv-title">Путешествия <br>— это просто и удобно с TEZ TOUR</p>
      <div class="tez-adv-body">
        <div class="tez-adv-earth">
          <img
            src="https://tez-tourspb.ru/wp-content/uploads/iconear.jpg"
            alt=""
            loading="lazy"
            decoding="async"
          >
        </div>
        <p>
          Путешествия – отличный способ провести время с пользой для себя, путь к саморазвитию и продуктивному отдыху.
          Даже сейчас с непростыми ограничениями на въезд во многие страны, можно найти множество вариантов – турагентство
          TEZ Тур предлагает туры прямиком из Санкт-Петербурга и Москвы.
        </p>
      </div>
    </div>

    <!-- Правая колонка: две серые карточки -->
    <div class="tez-adv-right">
      <article class="tez-adv-card">
        <span class="tez-adv-check" aria-hidden="true">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="20 6 9 17 4 12"></polyline>
          </svg>
        </span>
        <div class="tez-adv-icon">
          <img
            src="https://tez-tourspb.ru/wp-content/uploads/icontolk.jpg"
            alt="Расскажем о всех нюансах"
            loading="lazy"
            decoding="async"
          >
        </div>
        <div class="tez-adv-copy">
          <div class="tez-adv-title-sm">Расскажем о всех нюансах</div>
          <p class="tez-adv-desc">Подробно покажем особенности каждого отеля</p>
        </div>
      </article>

      <article class="tez-adv-card">
        <span class="tez-adv-check" aria-hidden="true">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="20 6 9 17 4 12"></polyline>
          </svg>
        </span>
        <div class="tez-adv-icon">
          <img
            src="https://tez-tourspb.ru/wp-content/uploads/iconworld.jpg"
            alt="Проверенные отели"
            loading="lazy"
            decoding="async"
          >
        </div>
        <div class="tez-adv-copy">
          <div class="tez-adv-title-sm">Проверенные отели</div>
          <p class="tez-adv-desc">Подбираем тур, где были сами или отдыхали клиенты</p>
        </div>
      </article>
    </div>
  </div>
</section>


<style>
:root{
  --tez-blue:#2864c7;
  --tez-text:#111111;
  --tez-card-gray:#f5f5f5;

  --tez-icon-size-desktop:60px;
  --tez-icon-size-mobile:48px;
}

/* Секция – фон прозрачный */
.tez-advantages{
  padding:24px 0;
  clear:both;
  width:100%;
  display:block;
  background:transparent;
}

/* 2 колонки: слева текст, справа — две карточки */
.tez-adv-grid{
  display:grid;
  grid-template-columns:minmax(0,1.1fr) minmax(0,1fr);
  gap:24px;
  align-items:flex-start;
  box-sizing:border-box;
}

/* Левая колонка: без рамки и фона */
.tez-adv-text{
  padding:0;
  margin:0;
  color:var(--tez-text);
  box-sizing:border-box;
  background:transparent;
  border:none;
  box-shadow:none;
  border-radius:0;
}

/* Заголовок слева — чёрный и жирный */
.tez-adv-title{
  margin:0 0 14px;
  font:700 28px/1.25 system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,"Helvetica Neue",Arial,sans-serif;
  color:var(--tez-text);
}

/* Тело текста слева */
.tez-adv-body{
  font-size:16px;
  line-height:1.55;
  color:var(--tez-text);
}

/* Иконка Земли: обтекание текстом на всех разрешениях */
.tez-adv-earth{
  float:left;
  width:64px;
  height:64px;
  margin:2px 16px 6px 0;

  display:flex;
  align-items:center;
  justify-content:center;

  background:transparent;
}

/* Сама иконка — больше */
.tez-adv-earth img{
  width:58px;
  height:58px;
  display:block;
  object-fit:contain;
}

.tez-adv-body p{
  margin:0;
}

/* Правая колонка: две карточки в один ряд */
.tez-adv-right{
  display:grid;
  grid-template-columns:repeat(2,minmax(0,1fr));
  gap:16px;
}

/* Серые плашки как в "Что входит в тур" */
.tez-adv-card{
  position:relative;
  background:var(--tez-card-gray);
  border-radius:14px;
  padding:18px 18px 16px;
  display:flex;
  align-items:flex-start;
  gap:14px;
  min-height:80px;
  box-shadow:0 1px 0 rgba(0,0,0,.02);
  box-sizing:border-box;
}

/* Иконки внутри карточек */
.tez-adv-icon{
  flex:0 0 auto;
  width:var(--tez-icon-size-desktop);
  min-width:var(--tez-icon-size-desktop);
  height:var(--tez-icon-size-desktop);
  display:flex;
  align-items:center;
  justify-content:center;
}

.tez-adv-icon img{
  max-width:100%;
  max-height:100%;
  display:block;
}

/* Текст карточек */
.tez-adv-copy{
  flex:1 1 auto;
}

.tez-adv-title-sm{
  font-weight:700;
  font-size:16px;
  line-height:1.3;
  margin:0 0 4px;
  color:var(--tez-text);
}

.tez-adv-desc{
  margin:0;
  font-size:15px;
  line-height:1.4;
  color:var(--tez-text);
}

/* Синяя круглая галочка */
.tez-adv-check{
  position:absolute;
  top:-12px;
  left:-12px;
  width:36px;
  height:36px;
  border-radius:999px;
  background:var(--tez-blue);
  color:#fff;
  display:flex;
  align-items:center;
  justify-content:center;
  box-shadow:0 4px 12px rgba(40,100,199,.35);
}

/* Адаптив */
@media (max-width:1100px){
  .tez-adv-grid{
    grid-template-columns:1fr;
  }
  .tez-adv-right{
    grid-template-columns:repeat(2,minmax(0,1fr));
  }
}

@media (max-width:768px){
  .tez-adv-title{
    font-size:24px;
  }
  .tez-adv-icon{
    width:var(--tez-icon-size-mobile);
    min-width:var(--tez-icon-size-mobile);
    height:var(--tez-icon-size-mobile);
  }
  .tez-adv-earth{
    width:68px;
    height:68px;
    margin:2px 14px 6px 0;
  }
}

@media (max-width:640px){
  .tez-adv-right{
    grid-template-columns:1fr;
  }
  .tez-adv-check{
    width:28px;
    height:28px;
    top:-8px;
    left:-8px;
    box-shadow:0 3px 8px rgba(40,100,199,.30);
  }
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
