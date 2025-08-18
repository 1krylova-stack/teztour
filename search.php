<?php get_header(); ?>
	<aside>
		<?php get_sidebar(); ?>
	</aside>
	<article>
		<div class="container">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
		
			<?php if ( have_posts() ) : ?>
				<h1><?php printf( __( 'Search Results for: %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" class="category">
						<div class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
						<div class="entry-content">
							<a class="thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
							<?php the_excerpt(); ?>
						</div>
					</div>
				<?php endwhile; ?>
			<?php else : ?>
				<h1><?php _e( 'Nothing Found', 'twentyten' ); ?></h1>
				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>
				</div>
			<?php endif; ?>
		</div>
	</article>
<?php get_footer(); ?>