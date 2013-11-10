<?php get_header(); ?>
 <?php // any code included here occurs before the wordpress loop and is always displayed, it is processed only once ?>

<section id="entries">
  <?php if (have_posts()) : ?>
	<!-- Display any code output from this region above the entire set of posts, generated via the h2 element only if there are posts. Any code is processed only once. -->

	<?php while (have_posts()) : the_post(); ?>
	<!-- Loop through posts and process each according to the code specified here  Process any code included in this region before the content of each post. -->

		<article <?php post_class("clear entry"); ?> id="post-<?php the_ID(); ?>" role="article">

 <?php if ( has_post_thumbnail() ) { ?>
		        	<aside class="thumbnail">
		        		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
		        	 </aside>
		        <?php } else {}?>

		    <section class="post_content">
		        <?php if ( is_home() || is_front_page() ) { ?>
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<?php } elseif ( is_singular() || is_single() || is_404() || is_archive() ) { ?>
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<?php } else { ?>
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<?php } ?>
				<footer class="byline meta">
			<p>
				<time pubdate class="published" title="<?php the_time('l, F jS, Y, g:i a'); ?>"><?php the_time('F j, Y'); ?></time>.
				<?php if ( comments_open() ) :
					echo '<p>';
					comments_popup_link( 'No Responses Yet. Leave a response?','1 Response.', '% Responses.', 'comments-link', 'Sorry, Comments are closed.');
					echo '</p>';
				endif; ?>
				<?php the_category(', ') ?>
				<?php if (function_exists('the_tags')) { ?> <?php the_tags( '<p class="tags">', ', ', '.</p>' ); ?> <?php } ?>

			<?php if ( is_singular() || is_single() ) {?>
				<?php edit_post_link('Edit Post as Admin', '<span class="edit">', '</span> '); ?>
			<?php }?>
			</p>
		</footer>
		        <p><?php echo the_excerpt(); ?></p>
		    </section>


		<?php if( is_single() || is_page() ){ ?>
				<?php comments_template(); ?>
			<?php } ?>

		<?php wp_link_pages(); ?>

	</article>
	<?php endwhile; else: ?>
		  <p>
		    Sorry, no posts matched your criteria.
		  </p>
	<?php endif; ?>

	<?php posts_nav_link(); ?>
</section><!-- #entries -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>