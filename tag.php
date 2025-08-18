<?php get_header(); ?>
	<aside>
		<?php get_sidebar(); ?>
	</aside>
	<article>
		<div class="container">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

			<h1><?php printf( __( 'Tag Archives: %s', 'twentyten' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ></h1>

			<?php get_template_part( 'loop', 'tag' ); ?>

		</div>
	</article>
<?php get_footer(); ?>`
