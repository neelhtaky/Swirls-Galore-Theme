<article <?php post_class("clear entry entry_excerpt"); ?> id="post-<?php the_ID(); ?>" role="article">
	<?php if ( has_post_thumbnail() ) { ?>
		<section class="post_content">
			<div class="entriescol1">

				<aside class="thumbnail">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
				</aside>

				<h2 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

				<footer class="byline meta">
					<time pubdate class="published" title="<?php the_time('l, F jS, Y, g:i a'); ?>"><?php the_time('F j, Y'); ?></time>.

					<?php the_category(', ') ?>

					<a href="<?php comments_link(); ?>" class="comments-link">
<?php comments_number( 'No Responses Yet. Leave a response?','1 Response.', '% Responses.', 'comments-link', 'Sorry, Comments are closed.'); ?></a>

					<?php if (function_exists('the_tags')) { ?> <?php the_tags( '<p class="tags">', ', ', '.</p>' ); ?> <?php } ?>
				</footer>

			</div><!-- #entriescol1 -->

			<div class="entriescol2">

				<h2 class="post_title_wide"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

				<p><?php echo the_excerpt(); ?></p>

			</div><!-- entriescol2 -->
		</section><!-- #post_content -->

<!-- if post has no thumb -->
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

					<?php if (function_exists('the_tags')) { ?> <?php the_tags( '<p class="tags">', ', ', '.</p>' ); ?> <?php } ?>
</p>
				</footer>

				<p><?php echo the_excerpt(); ?></p>
		</section><!-- Post_content -->
	<?php }?>
</article>