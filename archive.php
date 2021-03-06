<?php get_header(); ?>
<?php // any code included here occurs before the wordpress loop and is always displayed, it is processed only once ?>

<!-- DISPLAY STICKY POSTS ABOVE ALL OTHER POSTS -->
<section id="entries">

<!-- DISPLAY MAIN LOOP -->
	<?php if (have_posts()) : ?>
		<!-- Display any code output from this region above the entire set of posts, generated via the h2 element only if there are posts. Any code is processed only once. -->
		<?php while (have_posts()) : the_post(); ?>
		<!-- Loop through posts and process each according to the code specified here  Process any code included in this region before the content of each post. -->
		<?php  if( $post->ID == $do_not_duplicate ) continue;?>
			<article <?php post_class("clear entry entry_excerpt"); ?> id="post-<?php the_ID(); ?>" role="article">
					<?php if ( has_post_thumbnail() ) { ?>
					<section class="post_content">
						<div class="entriescol1">
		        			<aside class="thumbnail">
		        				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
							</aside>
							<h2 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							<footer class="byline meta">
								<p>
									<time pubdate class="published" title="<?php the_time('l, F jS, Y, g:i a'); ?>"><?php the_time('F j, Y'); ?></time>.
									<?php the_category(', ') ?>
									<a href="<?php comments_link(); ?>" class="comments-link">
<?php comments_number( 'No Responses Yet. Leave a response?','1 Response.', '% Responses.', 'comments-link', 'Sorry, Comments are closed.'); ?></a>

									<?php the_tags(); ?>
								</p>
							</footer>
						</div><!-- #entriescol1 -->
						<div class="entriescol2">

								<h2 class="post_title_wide"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

								<p><?php echo the_excerpt(); ?></p>

						</div><!-- entriescol2 -->
						</section><!-- #post_content -->


					<?php } else { ?>
					<section class="post_content">
						<h2 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<h2 class="post_title_wide"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<footer class="byline meta">
						<p>
							<time pubdate class="published" title="<?php the_time('l, F jS, Y, g:i a'); ?>"><?php the_time('F j, Y'); ?></time>.
							<?php the_category(', ') ?>
							<a href="<?php comments_link(); ?>" class="comments-link">
<?php comments_number( 'No Responses Yet. Leave a response?','1 Response.', '% Responses.', 'comments-link', 'Sorry, Comments are closed.'); ?></a>
							<?php the_tags(); ?>
						</p>
					</footer>
				<p><?php echo the_excerpt(); ?></p>
				</section><!-- Post_content -->
					 <?php }?>
			</article>
	<hr>
	<?php endwhile; else: ?>
		  <p>
		    Sorry, no posts matched your criteria.
		  </p>
	<?php endif; ?>
<div class="navigation">
	<div class="alignleft"><?php previous_posts_link('&laquo; Newer Posts') ?></div>
	<div class="alignright"><?php next_posts_link('Older Posts &raquo;','') ?></div>
</div>

</section><!-- #entries -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>