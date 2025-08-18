<?php get_header(); ?>
	<aside>
		<?php get_sidebar(); ?>
	</aside>
	<article>
		<div class="container">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			
			<h1>Невозможно получить содержание страницы</h1>
			<img class="error404" src="/wp-content/uploads/404.png" alt="">
		</div>
	</article>
<?php get_footer(); ?>`