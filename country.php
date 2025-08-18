<?php
/*
Template name: Шаблон по странам
*/
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package medic
 */

get_header();
?>
	<article class="full-width">
		<div class="container">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

			
			<h1>
				Отдых в странах мира 2025 от туроператора ТЕЗ Тур
			</h1>
			<div class="bg_block_w">
  <?php if( have_rows('country_r') ): ?>
    <?php while( have_rows('country_r') ): the_row(); 
      // Получаем объект категории и извлекаем ID
      $category = get_sub_field('n_post');
	$name_titlr = get_sub_field('name_titl');
	$flag_h = get_sub_field('img___k');
      if (is_object($category)) {
          $category_id = $category->term_id;
          $slug = $category->slug;
          $name = $category->name;

          // Получаем массив данных изображения
          $image_data = get_field('minyatury_dlya_rubrik', 'category_' . $category_id);
          // Извлекаем URL миниатюры
          $thumbnail_url = $image_data['sizes']['thumbnail'];
      }
    ?>
				<div>
      <a href="<?php echo esc_html($slug); ?>">
      <?php if ($thumbnail_url): ?>
        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($name); ?>">
		  <?php else: ?>
		  <img src="<?php echo $flag_h; ?>" alt="<?php echo $name_titlr; ?>">
      <?php endif; ?>
      <?php echo $name_titlr; ?>
      </a>
				</div>
    <?php endwhile; ?>
  <?php endif; ?>
</div>
	</div>
</article>

<?php get_footer(); ?>