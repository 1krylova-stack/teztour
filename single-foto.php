<?php get_header(); ?>
	<aside>
		<?php get_sidebar(); ?>
	</aside>
	<article>
		<div class="container">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" class="single">
					<h1><?php the_title(); ?></h1>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>

					<script type="text/javascript">
					  VK.init({apiId: 4533869, onlyWidgets: true});
					</script>

					<!-- Put this div tag to the place, where the Comments block will be -->
					<div id="vk_comments"></div>
					<script async type="text/javascript">
					VK.Widgets.Comments("vk_comments", {limit: 10, width: "710", attach: "*"});
					</script>

				</div>

			<?php endwhile; ?>
		</div>
	</article>
<?php get_footer(); ?>
