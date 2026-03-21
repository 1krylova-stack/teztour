<?php get_header(); ?>
<aside>
    <?php get_sidebar(); ?>
</aside>
<article>
    <div class="container">
        <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

		 <?php
        $term = get_queried_object();
        $term_id = !empty($term->term_id) ? (int) $term->term_id : 0;

        $rubric_banner_image = $term_id ? get_field('rubric_banner_image', 'category_' . $term_id) : '';
        $rubric_banner_url = '';

        if (is_array($rubric_banner_image) && !empty($rubric_banner_image['url'])) {
            $rubric_banner_url = $rubric_banner_image['url'];
        } elseif (is_numeric($rubric_banner_image)) {
            $rubric_banner_url = wp_get_attachment_image_url((int) $rubric_banner_image, 'full');
        } elseif (is_string($rubric_banner_image)) {
            $rubric_banner_url = $rubric_banner_image;
        }

        if (empty($rubric_banner_url) && $term_id) {
            $rubric_banner_url = get_term_meta($term_id, 'rubric_banner_image_url', true);
        }
        ?>
		
        <h1><?php printf(__('%s','twentyten'), single_cat_title('', false)); ?></h1>

		 <?php if (!empty($rubric_banner_url)) { ?>
            <div class="rubric-hero-banner" aria-label="Баннер рубрики">
                <div class="rubric-hero-banner__image" style="background-image: url('<?php echo esc_url($rubric_banner_url); ?>');"></div>
                <div class="box_sh">
                    <div class="w_app">
                        <a class="tt-btn-outline" href="https://t.me/+79817010302" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M9.04 15.47l-.38 5.3c.55 0 .79-.24 1.08-.52l2.6-2.5 5.39 3.94c.99.55 1.7.26 1.96-.91l3.55-16.65c.32-1.51-.55-2.1-1.52-1.74L1.5 9.13c-1.46.57-1.44 1.38-.25 1.75l5.55 1.73L19.67 5.4c.64-.4 1.22-.18.74.22"/>
                            </svg>
                            Написать в Telegram
                        </a>
                    </div>
                    <div class="t_app">
                        <a class="tt-btn-primary" href="#" id="open-quiz">
                            Подобрать тур
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>

        <h2 class="rubric-hotels-title">Популярные отели</h2>

        <div class="rubric-hotels-widget">
            <?php include get_template_directory() . '/components/sletat-widget.php'; ?>
        </div>
		
		<?php
        // === Блок "Что входит в тур" ===
        if ( shortcode_exists('tour_included') ) {
            echo do_shortcode('[tour_included]');
        } else {
            get_template_part('template-parts/tour-included');
        }
        ?>
		
        <div class="clear"></div>

        <?php
        // ====== ОПИСАНИЕ РУБРИКИ (Единственный вывод) ======
        $term = get_queried_object();
        $acf_full = get_field('polnaya_opisaniye_rubrik', 'category_' . get_query_var('cat'));
        $term_desc = ($term && !empty($term->term_id)) ? term_description($term->term_id, $term->taxonomy) : '';
        $desc_to_show = '';
        if (!empty($acf_full)) {
            $desc_to_show = $acf_full;
        } elseif (!empty($term_desc)) {
            $desc_to_show = $term_desc;
        }
        if (!empty($desc_to_show)) : ?>
            <div class="category_description">
                <?php echo apply_filters('the_content', do_shortcode($desc_to_show)); ?>
            </div>
        <?php endif; ?>
        <!-- /ОПИСАНИЕ РУБРИКИ -->

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" class="category">
                <div class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                <div class="entry-content">
                    <?php if (has_post_thumbnail()) { ?><a class="thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a><?php } ?>
                    <?php the_excerpt(); ?>
                    <div class="clear"></div>
                </div>
            </div>
        <?php endwhile; endif; ?>

    </div>

    <!-- Популярные направления -->
    <?php include get_template_directory() . '/popular-directions.php'; ?>
</article>
<?php get_footer(); ?>
