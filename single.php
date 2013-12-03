<?php get_header(); ?>
 <?php // any code included here occurs before the wordpress loop and is always displayed, it is processed only once ?>

<section id="entries">
	<?php if (have_posts()) : ?>
	<!-- Display any code output from this region above the entire set of posts, generated via the h2 element only if there are posts. Any code is processed only once. -->

	<?php while (have_posts()) : the_post(); ?>
	<!-- Loop through posts and process each according to the code specified here  Process any code included in this region before the content of each post. -->


		<article <?php post_class("clear entry entry_content"); ?> id="post-<?php the_ID(); ?>" role="article">

		    <section class="post_content">
		        <?php if ( is_home() || is_front_page() ) { ?>
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<?php } elseif ( is_singular() || is_single() || is_404() || is_archive() ) { ?>
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<?php } else { ?>
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<?php } ?>

		<p><?php echo the_content(); ?></p>
		</article>

		<hr>
		<div id="clearfix"></div>
		<div id="related">
			<h1>Related Posts</h1>
			<?php $tags = wp_get_post_tags($post->ID);
			if ($tags) {
				$first_tag = $tags[0]->term_id;
				$args=array(
				'tag__in' => array($first_tag),
				'post__not_in' => array($post->ID),
				'posts_per_page'=>6,
				'caller_get_posts'=>1
			);
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<?php if ( has_post_thumbnail() ) { ?>
						<aside class="related">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</aside>
					<?php } else { ?>
						<aside class="related">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/thumb.jpg" alt="" title=""/></a>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</aside>
					<?php } ?>
				<?php endwhile;
			}
			wp_reset_query();
			} ?>
		</div>

		<hr>
		<?php if( is_single() || is_page() ){ ?>
			<?php comments_template(); ?>
		<?php } ?>
</section>
	<?php endwhile; else: ?>
		  <p>
		    Sorry, no posts matched your criteria.
		  </p>
	<?php endif; ?>

	<?php posts_nav_link(); ?>
</section><!-- #entries -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>