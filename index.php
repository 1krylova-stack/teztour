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

<!-- Попап квиза -->
<div id="quiz-modal" class="tezquiz-modal" aria-hidden="true">
  <div class="tezquiz-backdrop" data-quiz-close></div>
  <section class="quiz">
    <button class="mfp-close" type="button" aria-label="Закрыть" data-quiz-close>×</button>
    <div class="quiz__form" id="quiz-form" role="group" aria-label="Квиз подбора тура">
      <div class="quiz__steps">
        <div class="quiz__step active" data-consultant="Укажите, сколько ночей Вы хотели бы отдохнуть?">
          <div class="quiz__titlecnt"><div class="quiz__title">СКОЛЬКО НОЧЕЙ ПЛАНИРУЕТЕ ОТДЫХАТЬ?</div></div>
          <div class="quiz__content">
            <label class="quiz__radio radio"><input type="radio" name="step1" value="Меньше 5"><span>Меньше 5</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step1" value="5-7 Ночей"><span>5-7 Ночей</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step1" value="7-9 Ночей"><span>7-9 Ночей</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step1" value="10+ Ночей"><span>10+ Ночей</span></label>
          </div>
        </div>
        <div class="quiz__step" data-consultant="Расскажите, сколько будет взрослых участников поездки?">
          <div class="quiz__titlecnt"><div class="quiz__title">СКОЛЬКО ВЗРОСЛЫХ ЕДЕТ?</div></div>
          <div class="quiz__content">
            <label class="quiz__radio radio"><input type="radio" name="step2" value="1 взрослый "><span>1 взрослый </span></label>
            <label class="quiz__radio radio"><input type="radio" name="step2" value="2 взрослых"><span>2 взрослых</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step2" value="3 взрослых"><span>3 взрослых</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step2" value="4 взрослых и более"><span>4 взрослых и более</span></label>
          </div>
        </div>
        <div class="quiz__step" data-consultant="Поедут ли с вами дети и сколько?">
          <div class="quiz__titlecnt"><div class="quiz__title">СКОЛЬКО ЕДЕТ ДЕТЕЙ</div></div>
          <div class="quiz__content">
            <label class="quiz__radio radio"><input type="radio" name="step3" value="Без детей"><span>Без детей</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step3" value="1 ребенок"><span>1 ребенок</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step3" value="2 ребенка"><span>2 ребенка</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step3" value="3 ребенка и более"><span>3 ребенка и более</span></label>
          </div>
        </div>
        <div class="quiz__step" data-consultant="Расскажите, на какие даты планируете поездку?">
          <div class="quiz__titlecnt"><div class="quiz__title">КОГДА ПЛАНИРУЕТЕ ПОЕЗДКУ?</div></div>
          <div class="quiz__content">
            <label class="quiz__radio radio"><input type="radio" name="step4" value="Ближайшие даты"><span>Ближайшие даты</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step4" value="Через 2-5 недель"><span>Через 2-5 недель</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step4" value="Смотрю на перспективу"><span>Смотрю на перспективу</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step4" value="Пока не знаем"><span>Пока не знаем</span></label>
          </div>
        </div>
        <div class="quiz__step" data-consultant="Выберите планируемый бюджет на человека">
          <div class="quiz__titlecnt"><div class="quiz__title">Выберите планируемый бюджет на человека</div></div>
          <div class="quiz__content">
            <label class="quiz__radio radio"><input type="radio" name="step5" value="До 100 000 руб"><span>До 100 000 руб</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step5" value="100 000 - 200 000 руб"><span>100 000 - 200 000 руб</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step5" value="200 000 руб и выше"><span>200 000 руб и выше</span></label>
          </div>
        </div>
        <div class="quiz__step" data-consultant="Есть ли у вас предпочтения по питанию">
          <div class="quiz__titlecnt"><div class="quiz__title">ЕСТЬ ЛИ ПОЖЕЛАНИЯ ПО ПИТАНИЮ?</div></div>
          <div class="quiz__content">
            <label class="quiz__radio radio"><input type="radio" name="step6" value="Все включено!"><span>Все включено!</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step6" value="Только завтраки"><span>Только завтраки</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step6" value="Завтрак и ужин"><span>Завтрак и ужин</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step6" value="Завтра, обед и ужин"><span>Завтра, обед и ужин</span></label>
          </div>
        </div>

        <div class="quiz-final" data-consultant="Оставьте номер WhatsApp, и мы пришлём подборку">
          <span class="quiz-final__title">Спасибо, вся информация принята!</span>
          <p class="quiz-final__text">Оставьте свой номер <span> WhatsApp</span>, и наш менеджер отправит туда варианты туров:</p>
          <div class="quiz-final__form">
            <div class="quiz-final__socials">
              <a href="https://t.me/+79817010302" target="_blank" class="quiz-final__soc" rel="nofollow">
                <img src="https://tours.turotdel.com/wp-content/uploads/2023/05/tel-icon.svg" alt="иконка">
              </a>
              <a href="https://wa.me/79817010302?text=%D0%94%D0%BE%D0%B1%D1%80%D1%8B%D0%B9%20%D0%B4%D0%B5%D0%BD%D1%8C!%20%D0%A5%D0%BE%D1%87%D1%83%20%D0%BF%D0%BE%D0%B4%D0%BE%D0%B1%D1%80%D0%B0%D1%82%D1%8C%20%D1%82%D1%83%D1%80"
                 target="_blank" class="quiz-final__soc" rel="nofollow">
                <img src="https://tours.turotdel.com/wp-content/uploads/2023/05/whatsapp.svg" alt="иконка">
              </a>
            </div>
            <div class="quiz-final__cf7">
              <?php echo do_shortcode('[contact-form-7 title="Получить подборку"]'); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="quiz__controller">
        <div class="quiz__progress">
          <div class="quiz__result">Готово <span id="quiz-result">0%</span></div>
          <div class="quiz__bar"><span id="quiz-bar-progress" style="width:0%;"></span></div>
        </div>
        <div class="quiz__actions">
          <button class="quiz__prev" id="quiz-prev" disabled type="button" aria-label="Назад">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M9.75584 4.41083C10.0813 4.73626 10.0813 5.2639 9.75584 5.58934L6.17843 9.16675H15.8333C16.2935 9.16675 16.6666 9.53984 16.6666 10.0001C16.6666 10.4603 16.2935 10.8334 15.8333 10.8334H6.17843L9.75584 14.4108C10.0813 14.7363 10.0813 15.2639 9.75584 15.5893C9.4304 15.9148 8.90277 15.9148 8.57733 15.5893L3.57733 10.5893C3.42105 10.4331 3.33325 10.2211 3.33325 10.0001C3.33325 9.77907 3.42105 9.56711 3.57733 9.41083L8.57733 4.41083C8.90277 4.08539 9.4304 4.08539 9.75584 4.41083Z" fill="#BDC6D7"/>
            </svg>
          </button>
          <div class="quiz__btn">
            <button class="quiz__next" id="quiz-next" type="button" disabled>Далее</button>
            <span class="quiz__enter">Или нажмите Enter</span>
          </div>
        </div>
      </div>
    </div>

    <aside class="quiz__sidebar">
      <div class="quiz__consultant">
        <figure class="quiz__img">
          <img width="300" height="300" src="https://tours.turotdel.com/wp-content/webp-express/webp-images/uploads/2024/09/hjbqrmhiq1o-2-300x300.jpg.webp"
               class="attachment-medium size-medium" alt="" loading="lazy">
        </figure>
        <div class="quiz__consultantinfo">
          <span class="quiz__name">Юлия Прусевич</span>
          <span class="quiz__sub">Эксперт по подбору туров</span>
        </div>
      </div>
      <div class="quiz__message">Чтобы прикинуть длительность перелёта и бюджет — сколько ночей комфортно для вас?</div>
      <div class="quiz__present">
        <figure class="qiuz__presentimg">
          <img width="57" height="56" src="https://tours.turotdel.com/wp-content/webp-express/webp-images/uploads/2023/05/fire.png.webp" class="attachment-medium size-medium" alt="" loading="lazy">
        </figure>
        <span>Подборка горящих туров</span>
      </div>
    </aside>
  </section>
</div>
<!-- END Попап квиза -->

<?php get_footer(); ?>
