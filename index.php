<?php get_header(); ?>
<!-- DISPLAY STICKY POSTS ABOVE ALL OTHER POSTS -->
<section id="entries">
	<?php if ( is_home() && !is_paged() ) {
		$sticky = get_option('sticky_posts');
		rsort( $sticky );
		$sticky = array_slice( $sticky, 0, 5);
		query_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1 ) );

		if (have_posts()) :
			while (have_posts()) : the_post(); ?>
				<?php get_template_part( 'loop', 'index' ); ?>
			<?php endwhile; ?>
		<hr>
		<?php endif; } ?>

	<?php wp_reset_query(); ?>

<!-- DISPLAY MAIN LOOP -->

	<?php query_posts(array("post__not_in"=>get_option("sticky_posts"), 'paged'=>get_query_var('paged'))); ?>
	<?php if (have_posts()) :
		while (have_posts()) : the_post();
			if( $post->ID == $do_not_duplicate ) continue;
				get_template_part( 'loop', 'index' ); ?>
			<hr>
		<?php endwhile; else: ?>
			<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>

	<div class="navigation">
		<?php previous_posts_link('&laquo; Newer Posts') ?>
		<?php next_posts_link('Older Posts &raquo;','') ?>
	</div><!-- .navigation -->
</section><!-- #entries -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>