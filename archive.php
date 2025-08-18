<?php get_header(); ?>
	<aside>
		<?php get_sidebar(); ?>
	</aside>
	<article>
		<div class="container">
			<h1>
				<?php if ( is_day() ) : ?>
								<?php printf( __( 'Daily Archives: <span>%s</span>', 'twentyten' ), get_the_date() ); ?>
				<?php elseif ( is_month() ) : ?>
								<?php printf( __( 'Monthly Archives: <span>%s</span>', 'twentyten' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyten' ) ) ); ?>
				<?php elseif ( is_year() ) : ?>
								<?php printf( __( 'Yearly Archives: <span>%s</span>', 'twentyten' ), get_the_date( _x( 'Y', 'yearly archives date format', 'twentyten' ) ) ); ?>
				<?php else : ?>
								<?php
									//if ($_SERVER['REQUEST_URI'] == "/newscat/news/") {
										echo "Все новости";
									//} else {
									//	_e( 'Blog Archives', 'twentyten' );
									//}
								?>
				<?php endif; ?>
			</h1>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" class="category">
						<div class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
						<div class="entry-content">
							<a class="thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
							<?php //the_excerpt(); ?>
						</div>
					</div>
				<?php endwhile; ?>
			<?php else : ?>
				<div class="entry-content">
					<!--<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>-->
				</div>
			<?php endif; ?>
		</div>
	</article>
<?php get_footer(); ?>