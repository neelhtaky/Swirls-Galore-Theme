<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
	<title>
		<?php if (function_exists('is_tag') && is_tag()) {
				single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
			elseif (is_archive()) {
				wp_title(''); echo ' Archive - '; }
			elseif (is_search()) {
				echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
			elseif (!(is_404()) && (is_single()) || (is_page())) {
	wp_title(''); echo ' - '; }
			elseif (is_404()) {
				echo 'Not Found - '; }
		if (is_home()) {
			bloginfo('name'); echo ' - '; bloginfo('description'); }
		else {
			bloginfo('name'); }
		if ($paged>1) {
			echo ' - page '. $paged; } ?>
	</title>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body <?php body_class(''); ?>>
	<div id="page" class="hfeed site">
		<header id="header" role="banner">
	        <div id="site_title">
				<?php if(is_home()){ ?>
					<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			    <?php } else { ?>
			        <h4><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h4>
			    <?php } ?>
			</div><!-- #site_title END -->
			<div id="description">
				<p><?php bloginfo('description'); ?></p>
			</div><!-- .description END -->
		</header>
		<div id="container" class="layout-300 layout-748 layout-978 layout-1218 layout-1378 layout-1800 layout-2000">
			<?php wp_nav_menu(array('theme_location' => 'nav_primary', 'container_id' => 'nav_primary', 'container_class' => 'menu_header')); ?>
			<div id="main" class="site-main">