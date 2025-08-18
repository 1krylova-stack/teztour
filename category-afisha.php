<?php get_header(); ?>
	<article class="full-width">
		<div class="container">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

			<h1><?php printf( __( '%s', 'twentyten' ), '' . single_cat_title( '', false ) . '' ); ?></h1>
			<?php if ( have_posts() ) : ?>
				<div class="home_allnews">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="home_news home_new<?php the_ID(); ?>">
						<div class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
						<div class="entry-content">
							<?php if ( has_post_thumbnail() ) { ?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a><?php } ?>
							<?php the_excerpt(); ?>
							<div class="clear"></div>
						</div>
					</div>
				<?php endwhile; ?>
					<div class="clear"></div>
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
	</article>
<?php get_footer(); ?>