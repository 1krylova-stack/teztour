<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" rel="shortcut icon" type="image/x-icon" />

<?php wp_head(); ?>

</head>
<body>


<div class="teztour-form">
	<?php $teztour_booklink = $_GET['booklink']; ?>
	<input type="hidden" name="teztour_booklink" id="teztour_booklink" value="<?php echo $teztour_booklink; ?>" />
	<div class="teztour-form_title"><?php the_title(); ?></div>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; ?>
</div>
<script type="text/javascript">
	<!--
	$(document).ready(function() {
		var booklink = $( '.teztour-form #teztour_booklink' ).val();
		$( '.teztour-form  #yourprod' ).val( booklink );
	});
	//-->
</script>

<?php wp_footer(); ?>
</body>
</html>