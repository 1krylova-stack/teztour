<?php get_header(); ?>
	<aside>
		<?php get_sidebar(); ?>
	</aside>
	<article>
		<div class="container">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

			<h1><?php printf( __( '%s', 'twentyten' ), '' . single_cat_title( '', false ) . '' ); ?></h1>

            <?php include get_template_directory() . '/components/sletat-widget.php'; ?>
<div class="clear"></div>
				
		
			
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


			
			
			
            <?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" class="category">
						<div class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
						<div class="entry-content">
							<?php if ( has_post_thumbnail() ) { ?><a class="thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a><?php } ?>
							<?php the_excerpt(); ?>
							<div class="clear"></div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php else : ?>
				<div class="entry-content">
					<!--<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>-->
				</div>
			<?php endif; ?>

			<?php
				$polnaya_opisaniye_rubrik = get_field( 'polnaya_opisaniye_rubrik', 'category_'. get_query_var('cat') );
				// echo "<pre>";
				// print_r($polnaya_opisaniye_rubrik);
				// echo "</pre>";
				// echo "<hr>";
				if ($polnaya_opisaniye_rubrik) {
				?>
				<div class="category_description">
					<?php echo $polnaya_opisaniye_rubrik; ?>
				</div>
				<?php
				} else if ( category_description() ) { ?>
				<div class="category_description">
					<?php echo category_description(); ?>
				</div>
				<?php } ?>
		</div>
		
<!-- Популярные направления -->
<?php include get_template_directory() . '/popular-directions.php'; ?>			
		
		
	</article>


<?php get_footer(); ?>

