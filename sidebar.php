<aside id="sidebar" role="complementary">
<ul>
	<?php if ( is_active_sidebar( 'primary' ) ) : ?>

		<?php if (is_single())  { ?>
			<aside class="sidebar_thumbnail">
		        <?php the_post_thumbnail(); ?>
		    </aside>
		    <aside class="byline meta">
				<p class="post_details">
					This post was written by <address class="author vcard"><?php the_author_posts_link(); ?></address>
				on	<time pubdate class="published" title="<?php the_time('l, F jS, Y, g:i a'); ?>"><?php the_time('F j, Y'); ?></time>.
				It was posted under <?php the_category(', ') ?>.
				It is tagged with <?php the_tags( '<p class="tags">', ', ', '.</p>' ); ?>
				<?php if ( comments_open() ) :
					echo '<p>';
					comments_popup_link( 'No Responses Yet. Leave a response?','1 Response.', '% Responses.', 'comments-link', 'Sorry, Comments are closed.');
					echo '</p>';
				endif; ?>
				</p>
			</aside>
		<?php } elseif (is_category()) { ?>
			<p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>
		<?php } elseif (is_tag()) { ?>
			<p>You are currently browsing the archives for the <?php single_tag_title(''); ?> tag.</p>
		<?php } elseif (is_day()) { ?>
		    <p>You are currently browsing the <a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a> blog archives for the day <?php get_option('date_format'); ?>.</p>
	    <?php } elseif (is_month()) { ?>
		    <p>You are currently browsing the <a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a> blog archives for <?php the_time('F, Y'); ?>.</p>
	     <?php } elseif (is_year()) { ?>
		    <p>You are currently browsing the <a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a> blog archives for the year <?php the_time('Y'); ?>.</p>
	     <?php } elseif (is_search()) { ?>
		    <p>You have searched the <a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a> blog archives for <strong>'<?php the_search_query(); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p>
		 <?php } ?>
		 <?php dynamic_sidebar( 'primary' ); ?>
	<?php else : ?>
		<div class="alert alert-help">
			  <p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
		</div>
	<?php endif; ?>
</ul>
</aside>