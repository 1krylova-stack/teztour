<?php
/**
 * Template Name: Контакты
 */
get_header();
?>

<article class="full-width">
  <div class="container">
    <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" class="page">
        <?php if ( is_front_page() ) { ?>
          <h2><?php the_title(); ?></h2>
        <?php } else { ?>
          <h1><?php the_title(); ?></h1>
        <?php } ?>
        <div class="entry-content">
          <?php if(has_post_thumbnail()) { ?>
            <?php $full_img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
            <a rel="lightbox[single]" href="<?php echo $full_img_url;?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium'); ?></a>
          <?php } ?>
          <?php the_content(); ?>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</article>

<?php get_footer(); ?>
