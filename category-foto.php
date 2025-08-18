<?php get_header(); ?>
	<aside>
		<?php get_sidebar(); ?>
	</aside>
	<article>
		<div class="container">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

			<h1><?php printf( __( '%s', 'twentyten' ), '' . single_cat_title( '', false ) . '' ); ?></h1>


			<?php
				if ($_SERVER['REQUEST_URI']=="/foto") {
			?>
			<div class="all_photoalbums">
			<?php
				$args = array(
					'type'                     => 'post',
					'child_of'                 => 0,
					'parent'                   => 7,
					'orderby'                  => 'name',
					'order'                    => 'DESC',
					'hide_empty'               => 0,
					'hierarchical'             => 1,
					'exclude'                  => '',
					'include'                  => '',
					'number'                   => '',
					'taxonomy'                 => 'category',
					'pad_counts'               => false 

				);
				$categories = get_categories( $args );
				// echo "<pre>";
				// print_r($categories);
				// echo "</pre>";
				// echo "<hr>";


				foreach ($categories as $cat_key => $cat_value) {
			?>
				<div class="photoalbums photoalbum<?php echo $cat_value->term_id; ?>">
			<?php
					$minyatury_dlya_rubrik = get_field( 'minyatury_dlya_rubrik', 'category_'. $cat_value->term_id );
					// echo "<pre>";
					// print_r($minyatury_dlya_rubrik);
					// echo "</pre>";
					// echo "<hr>";
			?>
					<div class="img">
						<a href="/foto/<?php echo $cat_value->slug; ?>"><img src="<?php echo ($minyatury_dlya_rubrik['sizes']['medium'] ? $minyatury_dlya_rubrik['sizes']['medium'] : "/wp-content/uploads/no-photo.jpg"); ?>" alt="<?php echo $minyatury_dlya_rubrik['alt']; ?>"></a>
					</div>
					<div class="name">
						<a href="/foto/<?php echo $cat_value->slug; ?>"><span><?php echo $cat_value->name; ?></span></a>
					</div>
				</div>
			<?php
				} // foreach categories
			?>
			</div>

			<?php
				} else {
			?>

			<?php if ( have_posts() ) : ?>
			<div class="all_photoalbums">
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="photoalbums photoalbum<?php the_ID(); ?>">
					<div class="img">
						<a href="<?php the_permalink(); ?>"><?php echo (has_post_thumbnail() ? the_post_thumbnail('medium') : "<img src='/wp-content/uploads/no-photo.jpg' alt='Фото нет'>"); ?></a>
					</div>
					<div class="name">
						<a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
			<?php endif; ?>

			<?php
				} // categories 
			?>

			<?php
				$polnaya_opisaniye_rubrik = get_field( 'polnaya_opisaniye_rubrik', 'category_'. get_query_var('cat') );
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