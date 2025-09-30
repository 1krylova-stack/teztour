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
					<!-- <h1><?php the_title(); ?></h1> -->
					<div class="entry-content">

						<div class="catalog_images">
							<?php if(has_post_thumbnail()) { ?>
							<?php $full_img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
							<a rel="lightbox[single]" href="<?php echo $full_img_url;?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium'); ?></a>
							<?php } else { ?>
							<img src="/wp-content/uploads/no_photo-300x225.png" alt="" class="wp-post-image" />
							<?php } ?>
							<div class="clear"></div>


							<?php
								$price = get_post_meta($post->ID, 'price', true);
								if ($price) {
							?>
							<div class="catalog_price">
								<label>Цена:</label>
								<span><?php echo $price; ?></span>
								<div class="clear"></div>
							</div>
							<?php
								}
							?>
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

						<div class="catalog_params_list">
							<?php
								$mesto = get_post_meta($post->ID, 'mesto', true);
								if ($mesto) {
							?>
							<div class="catalog_params param_mesto">
								<label>Место:</label>
								<span><?php echo $mesto; ?></span>
								<div class="clear"></div>
							</div>
							<?php
								}
								$vilet_iz = get_post_meta($post->ID, 'vilet_iz', true);
								if ($vilet_iz) {
							?>
							<div class="catalog_params param_vilet_iz">
								<label>Вылет из:</label>
								<span><?php echo $vilet_iz; ?></span>
								<div class="clear"></div>
							</div>
							<?php
								}
								$price_vxodit = get_post_meta($post->ID, 'price_vxodit', true);
								if ($price_vxodit) {
							?>
							<div class="catalog_params param_price_vxodit">
								<label>В стоимость входит:</label>
								<span><?php echo $price_vxodit; ?></span>
								<div class="clear"></div>
							</div>
							<?php
								}
								$data_vileta = get_post_meta($post->ID, 'data_vileta', true);
								if ($data_vileta) {
							?>
							<div class="catalog_params param_data_vileta">
								<label>Дата вылета:</label>
								<span><?php echo $data_vileta; ?></span>
								<div class="clear"></div>
							</div>
							<?php } ?>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
						<?php the_content(); ?>

                                                <?php
                                               
                                                        // === Блок "Что входит в тур" ===
                                                        if ( shortcode_exists( 'tour_included' ) ) {
                                                                echo do_shortcode( '[tour_included]' );
                                                        } else {
                                                                get_template_part( 'template-parts/tour-included' );
                                                        }
                                                }
                                                ?>
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
