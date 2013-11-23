<?php get_header(); ?>
<?php // any code included here occurs before the wordpress loop and is always displayed, it is processed only once ?>

<section id="entries">
	<h1>404 - Not Found</h1>
	<p>Well this is embarrassing, isn’t it?</p>
	<p>I cannot seem to find what you were looking for. I'm very sorry. That page or file may have been moved or deleted.</p>

	<h2>Maybe I can still help you...</h2>

	<h3>Check The Address Bar</h3>
	<p>I'm not blaming you, but have you checked your address bar? There might be a typo in the URL.</p>

	<h3>Try A Search</h3>
	<p>How about trying a search to find what you were looking for? You can search our site using the form provided below.</p>
	<?php get_search_form(); ?>

	<h3>Popular Posts</h3>
	<p>Here's a list of my most popular posts; these are what people come to my site to read!</p>
	<ol class="popular_posts">
		<?php $pc = new WP_Query('orderby=comment_count&posts_per_page=9');

		while ($pc->have_posts()) : $pc->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
	</ol>

	<h3>Recent Posts</h3>
	<p>Maybe you were looking for one of my recently published posts?</p>
	<ul>
		<?php $recent_posts = wp_get_recent_posts();
			foreach( $recent_posts as $recent ){
				echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
			} ?>
</ul>

</section><!-- #entries -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
<!--

<p>
It looks like nothing was found at this location. Maybe try a search?
"Oops, I screwed up and you discovered my fatal flaw.
Well, we're not all perfect, but we try.  Can you try this
again or maybe visit our <a
title="Our Site" href="http://example.com/index.php">Home
Page</a> to start fresh.  We'll do better next time."
</p>
 <p>Alternatively, you can go to <a href="http://www.website.com">my home page</a> or <a href="http://www.website.com/archives">browse my archives</a></p>
        <p>One last thing, if you're feeling so kind, please <a href="mailto:webmaster@website.com">tell me</a> about this error, so that I can fix it. Thanks!</p>

 -->