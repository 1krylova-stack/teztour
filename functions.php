<?php
/**
 * Theme functions — cleaned & optimized
 * - Removes fragile mobile hacks and duplicate VK/Sentry patches
 * - Moves jQuery to footer and allows defer for non‑critical scripts
 * - Fixes "Новости" widget to use WP_Query (no query_posts)
 * - Keeps breadcrumbs and admin helpers
 */

/* =========================
 * Performance: jQuery in footer (no migrate by default)
 * ========================= */
if ( ! is_admin() ) {
  add_action('wp_enqueue_scripts', function () {
    // Re-register core jQuery to load in footer
    wp_deregister_script('jquery');
    wp_register_script('jquery', includes_url('/js/jquery/jquery.min.js'), [], null, true);
    wp_enqueue_script('jquery');
    // Do NOT load jquery-migrate unless really needed
    if (wp_script_is('jquery-migrate', 'registered')) {
      wp_deregister_script('jquery-migrate');
    }
  }, 5);

  // Keep defer/async for most scripts; only strip from jQuery (safety)
  add_filter('script_loader_tag', function ($tag, $handle) {
    if (in_array($handle, ['jquery','jquery-core'], true)) {
      $tag = str_replace(['defer ', 'async ', ' defer', ' async'], '', $tag);
    }
    return $tag;
  }, 10, 2);
}

/* =========================
 * Redirects (left as-is, just guarded)
 * ========================= */
function tez_custom_redirect() {
  if (is_admin()) return;
  $redirects = [
    "/bez-rubriki/%F0%9F%87%B2%F0%9F%87%BAmavrikij-tury-ot-178-576-rub.php" => "/goryashhie-tury",
    "/bez-rubriki/%F0%9F%8C%B4oae%F0%9F%87%A6%F0%9F%87%AAblizhajshie-vylety-v-shardzhu-i-dubaj.php" => "/goryashhie-tury",
    "/bez-rubriki/%F0%9F%8E%85novyj-god-na-kurortax-egipta.php" => "/goryashhie-tury",
    "/bez-rubriki/idealno-vsyo%F0%9F%91%8Cotel-v-dubae-dlya-otdyxa-s-detmi.php" => "/goryashhie-tury",
    "/bez-rubriki/oae-%F0%9F%87%A6%F0%9F%87%AA-strana-dlya-tex-komu-xolod-vsegda-byl-ne-po-dushe.php" => "/goryashhie-tury",
    "/goryashhie-tury/%F0%9F%87%A6%F0%9F%87%AAoae-do-60-v-otelyax-abu-dabi.php" => "/goryashhie-tury",
    '/goryashhie-tury/%F0%9F%87%A8%F0%9F%87%BAkuba-lidery-prodazh-v-varadero%E2%9D%A4%EF%B8%8F.php' => '/goryashhie-tury',
    '/goryashhie-tury/%F0%9F%87%AA%F0%9F%87%ACegipet-%E2%98%80%EF%B8%8Fxurgada-%E2%9C%88%EF%B8%8Fvylet-19-noyabrya-10-nochej-ot-57-570-rub.php' => '/goryashhie-tury',
    '/goryashhie-tury/%F0%9F%87%AA%F0%9F%87%ACxurgada-uspejte-otdoxnut-na-more-do-nastupleniya-novogo-uchebnogo-goda.php' => '/goryashhie-tury',
    '/goryashhie-tury/%F0%9F%87%B9%F0%9F%87%ADosennie-kanikuly-na-pxukete.php' => '/goryashhie-tury',
    '/goryashhie-tury/%F0%9F%87%B9%F0%9F%87%B7vstrechajte-novyj-god-na-lyubimyx-kurortax-turcii.php' => '/goryashhie-tury',
    '/goryashhie-tury/%F0%9F%8C%8Ateploe-more-i-skidki-ot-populyarnyx-otelej-%F0%9F%90%A0egipet%F0%9F%90%A0.php' => '/goryashhie-tury',
    '/goryashhie-tury/%F0%9F%8C%9Fnovogodnij-pxuket%F0%9F%8C%9F.php' => '/goryashhie-tury',
    '/goryashhie-tury/%F0%9F%8C%B4maldivy%E2%98%80%EF%B8%8F-%F0%9F%8E%84novogodnij-otdyx-so-skidkami-do-50.php' => '/goryashhie-tury',
    '/goryashhie-tury/%F0%9F%8E%84novyj-god-na-shri-lanke%F0%9F%8C%B4.php' => '/goryashhie-tury',
    '/goryashhie-tury/%F0%9F%8E%85%F0%9F%8C%B4vstrechaem-novyj-god-na-sejshelax.php' => '/goryashhie-tury',
    '/goryashhie-tury/%F0%9F%90%9Fmaldivy%F0%9F%A6%80%F0%9F%92%ABoteli-s-transferom-ne-bolee-30-minut-na-skorostnom-katere%F0%9F%9A%A4.php' => '/goryashhie-tury',
    '/goryashhie-tury/%F0%9F%90%ACpriyatnoe-nachalo-goda-na-maldivax-%F0%9F%A5%82%F0%9F%8C%B4.php' => '/goryashhie-tury',
    '/goryashhie-tury/%F0%9F%9B%ABstart-poletnoj-programmy-moskva-dubaj.php' => '/goryashhie-tury',
    '/goryashhie-tury/%F0%9F%A5%A5otdyx-na-ostrove-bali-s-priyatnymi-skidkami%F0%9F%A5%A5-skidki-ot-otelej-do-30%F0%9F%94%9D.php' => '/goryashhie-tury',
    '/goryashhie-tury/%F0%9F%A5%A5tailand%F0%9F%A5%A5pxuket%F0%9F%A5%A5-%F0%9F%91%86vysokij-sezon-novye-skidki-do-45%E2%9A%A1%EF%B8%8F.php' => '/goryashhie-tury',
    "/goryashhie-tury/detyam-v-afriku-razreshaetsya-sejshely-semejnyj-otdyx%F0%9F%91%A8%F0%9F%91%A9%F0%9F%91%A7.php" => "/goryashhie-tury",
    "/goryashhie-tury/egipet-iz-sankt-peterburga-bez-toplivnogo-sbora%F0%9F%98%8A.php" => "/goryashhie-tury/goryashhie-tury-v-egipet",
    "/goryashhie-tury/egipet-iz-spbsnizhenie-cen-na-27-avgusta%F0%9F%92%A5.php" => "/goryashhie-tury/goryashhie-tury-v-egipet",
    "/goryashhie-tury/maldivy-v-sentyabre-s-diskontom-do-45%F0%9F%92%A5.php" => "/goryashhie-tury",
    "/goryashhie-tury/mavrikij-%F0%9F%8C%8Atop-oteli-dlya-vashego-luchshego-otdyxa.php" => "/goryashhie-tury",
    "/goryashhie-tury/oae-%F0%9F%87%A6%F0%9F%87%AA-kogda-posle-burnoj-vstrechi-novogo-goda-vozmozhno-potrebuetsya-eshhe-chut-chut-otdoxnut%F0%9F%98%89.php" => "/goryashhie-tury",
    "/goryashhie-tury/oae-%F0%9F%8E%89otdyx-na-novyj-god-i-v-kanikuly-po-specialnym-cenam.php" => "/goryashhie-tury",
    "/goryashhie-tury/otkrytie-prodazh-turov-na-kubu%F0%9F%92%A5.php" => "/goryashhie-tury",
    "/goryashhie-tury/sejshely-%F0%9F%87%B8%F0%9F%87%A8-puteshestvie-v-kotoroe-vy-vlyubites-%E2%8F%B1bronirujte-vash-otpusk-sejchas-po-specialnym-snizhennym-cenam.php" => "/goryashhie-tury",
    "/goryashhie-tury/shri-lanka-%F0%9F%90%98%F0%9F%8C%B4-snizheny-ceny-na-vylety-v-noyabre.php" => "/goryashhie-tury",
    "/goryashhie-tury/v-dekabre-priyatnye-podarki-na-maldivax-%F0%9F%8C%B4%F0%9F%8C%B4-apgrejd-pitaniya-v-podarok%F0%9F%8E%81.php" => "/goryashhie-tury",
    "/goryashhie-tury/venesuela-%F0%9F%87%BB%F0%9F%87%AA-novye-skidki-ot-seti-otelej-ld-hotels-%F0%9F%92%B3skidki-do-15.php" => "/goryashhie-tury",
    "/goryashhie-tury/venesuela-%F0%9F%87%BB%F0%9F%87%AA-provozhaem-osen-na-karibax.php" => "/goryashhie-tury",
    "/goryashhie-tury/venesuela-po-cene-turcii%F0%9F%92%A5.php" => "/goryashhie-tury",
    "/goryashhie-tury/venesuela-vysokij-sezon-nachinaetsya%F0%9F%92%A5.php" => "/goryashhie-tury",
  ];
  $uri = $_SERVER['REQUEST_URI'] ?? '';
  foreach ($redirects as $url => $target) {
    if (false !== mb_stripos($uri, $url)) {
      wp_redirect(home_url($target), 301);
      exit;
    }
  }
}
add_action( 'template_redirect', 'tez_custom_redirect' );

/* =========================
 * Clean <head>
 * ========================= */
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'locale_stylesheet');
remove_action('wp_head', 'noindex');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );

/* =========================
 * Breadcrumbs (unchanged)
 * ========================= */
function dimox_breadcrumbs() {
  $text['home']     = 'Главная';
  $text['category'] = '%s';
  $text['search']   = 'Результаты поиска по запросу "%s"';
  $text['tag']      = 'Записи с тегом "%s"';
  $text['author']   = 'Статьи автора %s';
  $text['404']      = 'Ошибка 404';

  $show_current   = 1;
  $show_on_home   = 0;
  $show_home_link = 1;
  $show_title     = 1;
  $delimiter      = ' &raquo; ';
  $before         = '<span class="current">';
  $after          = '</span>';

  global $post;
  $home_link    = home_url('/');
  $link_before  = '';
  $link_after   = '';
  $link_attr    = '';
  $link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
  $parent_id    = $parent_id_2 = $post->post_parent ?? 0;
  $frontpage_id = get_option('page_on_front');

  if (is_home() || is_front_page()) {
    if ($show_on_home == 1) echo '<div class="breadcrumbs"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';
  } else {
    echo '<div class="breadcrumbs">';
    if ($show_home_link == 1) {
      echo sprintf($link, $home_link, $text['home']);
      if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
    }

    if ( is_category() ) {
      $this_cat = get_category(get_query_var('cat'), false);
      if ($this_cat && $this_cat->parent != 0) {
        $cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
        if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
        echo $cats;
      }
      if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

    } elseif ( is_search() ) {
      echo $before . sprintf($text['search'], get_search_query()) . $after;

    } elseif ( is_day() ) {
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
      echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category();
        $cat = $cat ? $cat[0] : null;
        if ($cat) {
          $cats = get_category_parents($cat, TRUE, $delimiter);
          if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
          echo $cats;
        }
        if ($show_current == 1) echo $before . get_the_title() . $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post($parent_id);
      if ($parent) {
        $cat = get_the_category($parent->ID);
        $cat = $cat ? $cat[0] : null;
        if ($cat) {
          $cats = get_category_parents($cat, TRUE, $delimiter);
          $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
          $cats = str_replace('</a>', '</a>' . $link_after, $cats);
          echo $cats;
        }
        printf($link, get_permalink($parent), $parent->post_title);
        if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
      }

    } elseif ( is_page() && !$parent_id ) {
      if ($show_current == 1) echo $before . get_the_title() . $after;

    } elseif ( is_page() && $parent_id ) {
      if ($parent_id != $frontpage_id) {
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          if ($page && $parent_id != $frontpage_id) {
            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
          }
          $parent_id = $page ? $page->post_parent : 0;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
          echo $breadcrumbs[$i];
          if ($i != count($breadcrumbs)-1) echo $delimiter;
        }
      }
      if ($show_current == 1) {
        if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
        echo $before . get_the_title() . $after;
      }

    } elseif ( is_tag() ) {
      echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

    } elseif ( is_author() ) {
      global $author;
      $userdata = get_userdata($author);
      echo $before . sprintf($text['author'], $userdata ? $userdata->display_name : '') . $after;

    } elseif ( is_404() ) {
      echo $before . $text['404'] . $after;
    }

    if ( get_query_var('paged') ) {
      echo ' (' . __('Page') . ' ' . get_query_var('paged') . ')';
    }
    echo '</div><!-- .breadcrumbs -->';
  }
}

if ( ! isset( $content_width ) ) $content_width = 640;

add_action( 'after_setup_theme', 'twentyten_setup' );
if ( ! function_exists( 'twentyten_setup' ) ):
function twentyten_setup() {
  add_editor_style();
  add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'automatic-feed-links' );
  load_theme_textdomain( 'twentyten', get_template_directory() . '/languages' );
  register_nav_menus( array( 'primary' => __( 'Primary Navigation', 'twentyten' ) ) );
}
endif;

function twentyten_page_menu_args( $args ) { if ( ! isset( $args['show_home'] ) ) $args['show_home'] = true; return $args; }
add_filter( 'wp_page_menu_args', 'twentyten_page_menu_args' );
function twentyten_excerpt_length( $length ) { return 40; }
add_filter( 'excerpt_length', 'twentyten_excerpt_length' );
function twentyten_continue_reading_link() { return false; }
function twentyten_auto_excerpt_more( $more ) { return ' &hellip;' . twentyten_continue_reading_link(); }
add_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );
function twentyten_custom_excerpt_more( $output ) { if ( has_excerpt() && ! is_attachment() ) $output .= twentyten_continue_reading_link(); return $output; }
add_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );
add_filter( 'use_default_gallery_style', '__return_false' );

/* =========================
 * Widgets
 * ========================= */
function twentyten_widgets_init() {
  register_sidebar( array(
    'name' => __( 'Header Widget Area', 'twentyten' ),
    'id' => 'header-widget-area',
    'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="widget-title">',
    'after_title'   => '</div>',
  ) );
  register_sidebar( array(
    'name' => __( 'Content Widget Area', 'twentyten' ),
    'id' => 'content-widget-area',
    'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="widget-title">',
    'after_title'   => '</div>',
  ) );
  register_sidebar( array(
    'name' => __( 'Left Widget Area', 'twentyten' ),
    'id' => 'left-widget-area',
    'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="widget-title">',
    'after_title'   => '</div>',
  ) );
  register_sidebar( array(
    'name' => __( 'Footer Widget Area', 'twentyten' ),
    'id' => 'footer-widget-area',
    'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="widget-title">',
    'after_title'   => '</div>',
  ) );
}
add_action( 'widgets_init', 'twentyten_widgets_init' );

/* =========================
 * Виджет "Новости" — переписан на WP_Query
 * ========================= */
function getlastnews_widget() {
  $options = get_option('getlastnews');
  $title = $options['title'] ?? 'Новости';
  $cat_id = (int)($options['term'] ?? 58);

  $q = new WP_Query([
    'cat' => $cat_id ?: 58,
    'posts_per_page' => 3,
    'no_found_rows' => true,
    'ignore_sticky_posts' => true,
  ]);
  ?>
  <div id="recent-posts-0" class="widget-container widget_recent_news">
    <div class="widget-title"><?php echo esc_html($title); ?></div>
    <ul>
    <?php if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post(); ?>
      <li>
        <span class="post-date"><?php echo esc_html(get_the_time('d.m.Y')); ?></span>
        <a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
        <div class="news_params_list">
          <?php
            $mesto = get_post_meta(get_the_ID(), 'mesto', true);
            if ($mesto): ?>
              <div class="news_params param_mesto"><label>Место:</label><span><?php echo esc_html($mesto); ?></span><div class="clear"></div></div>
          <?php endif;
            $vilet_iz = get_post_meta(get_the_ID(), 'vilet_iz', true);
            if ($vilet_iz): ?>
              <div class="news_params param_vilet_iz"><label>Вылет из:</label><span><?php echo esc_html($vilet_iz); ?></span><div class="clear"></div></div>
          <?php endif;
            $price_vxodit = get_post_meta(get_the_ID(), 'price_vxodit', true);
            if ($price_vxodit): ?>
              <div class="news_params param_price_vxodit"><label>В стоимость входит:</label><span><?php echo esc_html($price_vxodit); ?></span><div class="clear"></div></div>
          <?php endif;
            $data_vileta = get_post_meta(get_the_ID(), 'data_vileta', true);
            if ($data_vileta): ?>
              <div class="news_params param_data_vileta"><label>Дата вылета:</label><span><?php echo esc_html($data_vileta); ?></span><div class="clear"></div></div>
          <?php endif; ?>
          <div class="clear"></div>
        </div>
      </li>
    <?php endwhile; else: ?>
      <li class="not_news">Нет новостей</li>
    <?php endif; wp_reset_postdata(); ?>
    </ul>
    <a href="<?php echo esc_url(home_url('/goryashhie-tury')); ?>" class="viewall">Все акции &gt;&gt;</a>
    <div class="clear"></div>
  </div>
  <?php
}
function getlastnews_control() {
  $options = get_option('getlastnews');
  if ( isset($_POST["getlastnews-submit"]) ) {
    $options['title'] = sanitize_text_field($_POST["getlastnews-title"] ?? '');
    $options['term']  = sanitize_text_field($_POST["getlastnews-term"] ?? '');
    update_option('getlastnews', $options);
  } ?>
  <p>
    <label for="getlastnews-title"><?php _e('Title:'); ?></label>
    <input id="getlastnews-title" name="getlastnews-title" class="widefat" type="text" value="<?php echo esc_attr($options['title'] ?? ''); ?>" />
  </p>
  <p>
    <label for="getlastnews-term">Рубрика</label>
    <select id="getlastnews-term" name="getlastnews-term">
      <option value="">— Выбрать —</option>
      <?php
        $cats = get_terms( ['taxonomy'=>'category', 'orderby'=>'count', 'hide_empty'=>0] );
        if ( !is_wp_error($cats) ) {
          foreach ($cats as $c) {
            printf('<option value="%1$s"%3$s>%2$s (%4$d)</option>',
              esc_attr($c->term_id),
              esc_html(($c->parent ? ' -- ' : '') . $c->name),
              selected(($options['term'] ?? '') == $c->term_id, true, false),
              (int)$c->count
            );
          }
        }
      ?>
    </select>
  </p>
  <input type="hidden" id="getlastnews-submit" name="getlastnews-submit" value="1" />
  <?php
}
function register_my_widget() {
  register_sidebar_widget('Новости', 'getlastnews_widget');
  register_widget_control('Новости', 'getlastnews_control' );
}
add_action('init', 'register_my_widget');

/* =========================
 * Admin columns for categories (unchanged other than escapes)
 * ========================= */
function true_add_columns($my_columns) {
  $my_columns = array(
    'cb' => '<input type="checkbox" />',
    'id' => 'ID',
    'preview' => 'Превью',
    'name' => __('Name'),
    'slug' => __('Slug'),
    'status' => 'Статус',
    'posts' => __('Posts')
  );
  return $my_columns;
}
add_filter("manage_edit-category_columns", 'true_add_columns');

function fill_columns($out, $column_name, $id) {
  $cat_img = get_field( 'minyatury_dlya_rubrik', 'category_'. $id );
  $cat_status = get_field( 'cat_status', 'category_'. $id );
  switch ($column_name) {
    case 'id':
      $out .= (int)$id;
      break;
    case 'preview':
      $src = $cat_img ? ($cat_img['sizes']['thumbnail'] ?? $cat_img['url']) : "/wp-content/uploads/no_photo-150x150.png";
      $out .= '<img src="'. esc_url($src) .'" width="48" height="48" />';
      break;
    case 'status':
      $out .= '<img src="'. esc_url($cat_status ? "/wp-content/uploads/status-online.png" : "/wp-content/uploads/status-ofline.png") .'" alt="" />';
      break;
    default:
      break;
  }
  return $out;
}
add_filter("manage_category_custom_column", 'fill_columns', 10, 3);

add_action('admin_head', function () {
  echo '<style>.widefat .column-id{width:20px}.widefat .column-preview{width:55px;text-align:center}.widefat .column-status{width:45px;text-align:center}</style>';
});

/* =========================
 * Contact Form 7 — allow HTML in acceptance
 * ========================= */
add_filter('wpcf7_form_elements', function($content) {
  $content = do_shortcode($content);
  $content = preg_replace_callback('/\[acceptance(.*?)\](.*?)\[\/acceptance\]/s', function($matches) {
    return '[acceptance' . $matches[1] . ']' . wp_specialchars_decode($matches[2]) . '[/acceptance]';
  }, $content);
  return $content;
}, 20, 1);

// Меняем canonical для страниц пагинации на первую страницу
add_filter('wpseo_canonical', function ($canonical) {
    if ( is_paged() || (int) get_query_var('paged') > 1 || (int) get_query_var('page') > 1 ) {
        return get_pagenum_link(1);
    }
    return $canonical;
});

// Ставим noindex, follow для страниц пагинации
add_filter('wpseo_robots', function ($robots) {
    if ( is_paged() || (int) get_query_var('paged') > 1 || (int) get_query_var('page') > 1 ) {
        return 'noindex,follow';
    }
    return $robots;
});

// [tez_advantages] [tez_adv_item]...[/tez_adv_item] [tez_adv_item icon="..."]...[/tez_adv_item] [/tez_advantages]
add_shortcode('tez_advantages', function($atts, $content = '') {
    // собираем все вложенные элементы
    $inner = do_shortcode($content);

    // вытаскиваем все <article>...</article>
    preg_match_all('~<article\b[^>]*>.*?</article>~si', $inner, $m);
    $articles = $m[0] ?? [];

    // Левый блок: берём только текст из .tez-adv-copy первой карточки
   $left_copy = '';
    if (!empty($articles[0])) {
        $first = $articles[0];
        if (preg_match('~<div class="tez-adv-copy">(.*?)</div>~si', $first, $mm)) {
            $left_copy = $mm[1]; // только содержимое текста
        } else {
            // на всякий случай — удалим теги <article> и оставим внутренности
            $left_copy = preg_replace(['~^<article\b[^>]*>~i','~</article>$~i'], '', $first);
        }
    }

    // Правая колонка: все остальные карточки как есть
    $right = '';
    if (count($articles) > 1) {
        $right = implode('', array_slice($articles, 1));
    }

    ob_start(); ?>
    <section class="tez-advantages">
      <div class="tez-adv-grid">
        <div class="tez-adv-text">
          <div class="tez-adv-copy">
            <?php echo $left_copy; ?>
          </div>
        </div>
        <div class="tez-adv-right">
          <?php echo $right; ?>
        </div>
      </div>
    </section>
    <?php
    return ob_get_clean();
});

// Вложенные элементы: [tez_adv_item icon="url" alt="описание"]Текст[/tez_adv_item]
add_shortcode('tez_adv_item', function($atts, $content = '') {
    $a = shortcode_atts([
        'icon' => '',
        'alt'  => '',
        'w'    => '50',
        'h'    => '50',
    ], $atts, 'tez_adv_item');

    ob_start(); ?>
    <article class="tez-adv-item">
      <?php if ($a['icon']): ?>
        <img class="tez-icon-img"
             src="<?php echo esc_url($a['icon']); ?>"
             alt="<?php echo esc_attr($a['alt']); ?>"
             width="<?php echo (int)$a['w']; ?>"
             height="<?php echo (int)$a['h']; ?>"
             loading="lazy">
      <?php endif; ?>
      <div class="tez-adv-copy">
        <p class="tez-adv-caption"><?php echo wp_kses_post($content); ?></p>
      </div>
    </article>
    <?php
    return ob_get_clean();
});
