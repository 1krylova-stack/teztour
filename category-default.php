<?php get_header(); ?>
<aside>
    <?php get_sidebar(); ?>
</aside>
<article>
    <div class="container">
        <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

        <h1><?php printf(__('%s','twentyten'), single_cat_title('', false)); ?></h1>

        <?php include get_template_directory() . '/components/sletat-widget.php'; ?>
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
