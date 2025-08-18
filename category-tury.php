<?php get_header(); ?>
	<aside>
		<?php get_sidebar(); ?>
	</aside>
	<article>
		<div class="container strany">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
<?php
// получаем текущий объект
$queried_object = get_queried_object();
$taxonomy = $queried_object->taxonomy;
// вот здесь как раз получаем id таксономии
$term_id = $queried_object->term_id;
// с использованием плагина advansed custom fields выводим произвольное поле категории в нужном месте.
$categy_header = get_field('categy_header', $taxonomy . '_' . $term_id);
?>
			<h1>
			<?php if ($categy_header == "") {
				printf( __( '%s', 'twentyten' ), '' . single_cat_title( '', false ) . '' );
			}else{
				echo $categy_header;
			} ?>
			</h1>

            <?php include get_template_directory() . '/components/sletat-widget.php'; ?>

			<?php if ($_SERVER['REQUEST_URI']=="/goryashhie-tury") {

				$get_catid = get_query_var('cat');
				$get_categories = get_categories( 'parent='. $get_catid .'&hide_empty=0' );
				if ($get_categories) {
			?>
			<!--<div class="catalog-cats-list">
			<?php
					foreach ($get_categories as $cats_key => $cats_value) {
						$cats_status = get_field( 'cat_status', 'category_'. $cats_value->term_id );
						if ($cats_status) {
						$cats_link = get_category_link( $cats_value->term_id );
						$cats_img = get_field( 'minyatury_dlya_rubrik', 'category_'. $cats_value->term_id );
						// echo "<pre>";
						// print_r($cats_img);
						// echo "<pre>";
						// echo "<hr>";
			?>
				<div class="strany-cats strany-cat<?php echo $cats_value->term_id; ?>">
					<a href="<?php echo $cats_link; ?>" class="cattitle" title="<?php echo $cats_value->name; ?>"><?php echo $cats_value->name; ?></a>
					<a href="<?php echo $cats_link; ?>" class="catimg"><img src="<?php echo ($cats_img ? $cats_img['sizes']['medium'] : "/wp-content/uploads/no_photo-300x225.png"); ?>" alt=""></a>
					<div class="clear"></div>
				</div>
			<?php
						} // cat status
					} // foreach get_categories
			?>
				<div class="clear"></div>
			</div>-->
			
			<div class="bg_block">
<?php 
// Получаем текущую категорию

    // Проверяем наличие повторяющихся полей для данной рубрики
    if (have_rows('country_r', 'category_' . $term_id)): ?>
        <?php while (have_rows('country_r', 'category_' . $term_id)): the_row(); 
            // Получаем данные из подполей
            $category = get_sub_field('n_post');
            $name_titlr = get_sub_field('name_titl');
            $flag_h = get_sub_field('img___k');
            
                $category_id = $category->term_id;
                $slug = $category->slug;
                $name = $category->name;
                $category_link = get_category_link($category_id);
        ?>
            <!-- Выводим данные -->
   
              <a href="<?php echo esc_url($category_link); ?>"><?php echo esc_html($name_titlr); ?>
                    <img src="<?php echo $flag_h; ?>">
            </a>
        <?php endwhile; ?>
    <?php endif;

?>
</div>
			
			
			<?php
				} // get_categories

			} else {

?>
				<?php if ( have_posts() ) : ?>
					<div class="strany_items">
					<?php while ( have_posts() ) : the_post(); ?>

<?php


$data_vileta = get_post_meta($post->ID, 'data_vileta', true);

$date_main_post = strtotime($data_vileta);
$databaseDate = strtotime(date('d.m.Y'));

if( $date_main_post > $databaseDate) { ?>
<div id="post-<?php the_ID(); ?>" class="category cat_tury">
							<div class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
							<div class="entry-content">
								<?php if ( has_post_thumbnail() ) { ?><a class="thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a><?php } ?>

								<div class="item_params_list">
									<?php
										$mesto = get_post_meta($post->ID, 'mesto', true);
										if ($mesto) {
									?>
									<div class="item_params param_mesto">
										<label>Место:</label>
										<span><?php echo $mesto; ?></span>
										<div class="clear"></div>
									</div>
									<?php
										}
										$vilet_iz = get_post_meta($post->ID, 'vilet_iz', true);
										if ($vilet_iz) {
									?>
									<div class="item_params param_vilet_iz">
										<label>Вылет из:</label>
										<span><?php echo $vilet_iz; ?></span>
										<div class="clear"></div>
									</div>
									<?php
										}
										$price_vxodit = get_post_meta($post->ID, 'price_vxodit', true);
										if ($price_vxodit) {
									?>
									<div class="item_params param_price_vxodit">
										<label>В стоимость входит:</label>
										<span><?php echo $price_vxodit; ?></span>
										<div class="clear"></div>
									</div>
									<?php
										}
										if ($data_vileta) {
									?>
									<div class="item_params param_data_vileta">
										<label>Дата вылета:</label>
										<span><?php echo $data_vileta; ?></span>
										<div class="clear"></div>
									</div>
									<?php } ?>
									<div class="clear"></div>
								</div>

								<div class="price_order">
									<?php $reyting = get_post_meta($post->ID, 'reyting', true); ?>
									<div class="reytings reyting<?php echo ($reyting ? $reyting : 0); ?>"><?php echo ($reyting ? $reyting : 0); ?></div>
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
								</div>
								<div class="clear"></div>
							</div>
							<div id="modal_form_zakaz">
							<span id="modal_close">X</span>
							<h3 style="text-align: center; color:#fff"><?php the_title(); ?></h3>
							<p style="text-align: center; color:#fff">Заполните несложные поля, наши менеджеры свяжутся с Вами в ближайшее время!</p>
							<?php echo do_shortcode('[contact-form-7 id="682" title="Заказать тур"]'); ?>

							</div>
						</div>
<?php }else { ?>
<!-- не выводим -->
<?php } ?>


						<?php endwhile; ?>
						<div class="clear"></div>
					</div>
				<?php else : ?>
					<div class="entry-content">
						<!-- <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p> -->
					</div>
				<?php endif; ?>

			<?php } // Yesli REQUEST_URI strany ?>



			<?php if ($polnaya_opisaniye_rubrik) { ?>
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

