<?php get_header(); ?>
	<aside>
		<?php get_sidebar(); ?>
	</aside>
	<article>
		<div class="container">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" class="single">
					<h1>
					<?php if (get_secondary_title() == "") {
					the_title();
				}else{
					echo get_secondary_title();
				} ?>
				</h1>
					<div class="entry-content">

						<?php if(has_post_thumbnail()) { ?>
							<?php $full_img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
							<a rel="lightbox[single]" href="<?php echo $full_img_url;?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium'); ?></a>
						<?php } ?>

						<?php the_content(); ?>
													<form name="catalog_form<?php echo $post->ID; ?>" id="catalog_form<?php echo $post->ID; ?>" action="" method="POST" class="catalog_form">
								<input type="hidden" name="catalog_name<?php echo $post->ID; ?>" id="catalog_name<?php echo $post->ID; ?>" value="<?php echo $post->post_title; ?>">
								<input type="submit" name="catalog_button<?php echo $post->ID; ?>" id="catalog_button<?php echo $post->ID; ?>" value="Заказать" class="button ordertour_button">
							</form>
							<div class="clear"></div>
						</div>
<div id="modal_form_zakaz">
							<span id="modal_close">X</span>
							<h3 style="text-align: center; color:#fff"><?php the_title(); ?></h3>
							<p style="text-align: center; color:#fff">Заполните несложные поля, наши менеджеры свяжутся с Вами в ближайшее время!</p>
							<?php echo do_shortcode('[contact-form-7 id="682" title="Заказать тур"]'); ?>

							</div>
					</div>
					<?php
						$category = get_the_category();
						$category_ID = $category[0] ->cat_ID;
						if ($category_ID==5) {
							comments_template( '', true );
						}
						?>
				</div>

		
			<?php endwhile; ?>
		</div>
	</article>
<?php get_footer(); ?>
