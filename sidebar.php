<aside id="sidebar" role="complementary">
<ul>
	<?php if ( is_active_sidebar( 'primary' ) ) : ?>
		<?php if (is_single())  { ?>
			<?php if ( has_post_thumbnail() ) { ?>
		        <aside class="thumbnail">
		        	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
		        </aside>
		        <?php } else {}?>
		        <aside class="byline meta">
				<p class="post_details">
					This post was written by <address class="author vcard"><?php the_author_posts_link(); ?></address>
					on	<time pubdate class="published" title="<?php the_time(get_option('date_format')); ?>"><?php the_time(get_option('date_format')); ?></time>.
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
		    <p>You are currently browsing the <a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a> blog archives for <?php echo get_month_link();?>.</p>
	     <?php } elseif (is_year()) { ?>
		    <p>You are currently browsing the <a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a> blog archives for the year <?php get_year_link(); ?>.</p>
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