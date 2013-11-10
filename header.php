<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<!-- This is the traditional favicon. Size: 16x16 or 32x32. vTransparency is OK. See wikipedia for info on browser support: http://mky.be/favicon/ -->
	<link rel="shortcut icon" type="image/x-ico" href="<?php get_template_directory_uri(); ?>/images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
	<script type="text/javascript" src="/library/js/javascript.js"></script>

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

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

<script type="text/javascript" src="http://978.gs/resources/js/jquery.gs-overlay.min.js"></script>

<script type="text/javascript">
jQuery(function() {
  jQuery('div#gs-overlay').gsoverlay({
    trigger: jQuery('a#gs-overlay-badge'),
    grid: 1378,
    color: '#aa1b4a',
    opacity: 0.24
  });
});
</script>
</head>

<body <?php body_class(''); ?>>

<div id="container" class="layout-300 layout-748 layout-978 layout-1218 layout-1378">
<!-- <div id="gs-overlay">&nbsp;</div> -->
<!--<a href="http://978.gs" id="gs-overlay-badge" style="outline: 0;">
<img src="http://978.gs/resources/img/978-badge.png" alt="This site is built with 978 grid system" width="59" height="25" style="border: 0;"></a> -->

	<header id="header" role="banner">

        <div id="site_title">
			<!-- if front page make title highest SEO, else make post titles more important -->
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

	<?php wp_nav_menu(array('theme_location' => 'nav_primary', 'container_id' => 'nav_primary', 'container_class' => 'menu_header')); ?>

