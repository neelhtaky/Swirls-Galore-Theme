<aside id="sidebar">
	<ul>
		<?php if ( is_active_sidebar( 'primary' ) ) : ?>
			<?php if ( is_404() || is_single() || is_category() || is_day() || is_month() || is_year() || is_search() || is_paged() ) { ?>
			<section>
			    <?if (is_404()) { ?>
			    <?php } elseif (is_single()) { ?>

			    	<?php if ( has_post_thumbnail() ) { ?>
		        	<aside class="sidebar_thumbnail">
		        		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
		        	 </aside>
		        <?php } else {}?>

			    	<aside class="byline meta">
						<p>
							This post was written by <address class="author vcard"><?php the_author_posts_link(); ?></address>
							on	<time pubdate class="published" title="<?php the_time('l, F jS, Y, g:i a'); ?>"><?php the_time('F j, Y'); ?></time>.
							</p>
							<p>
							It was posted under <?php the_category(', ') ?>.
							</p>
							<p>
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
			    <?php } elseif (is_day()) { ?>
			    <p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a> blog archives
			    for the day <?php the_time('l, F jS, Y'); ?>.</p>
			    <?php } elseif (is_month()) { ?>
			    <p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a> blog archives
			    for <?php the_time('F, Y'); ?>.</p>
			    <?php } elseif (is_year()) { ?>
			    <p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a> blog archives
			    for the year <?php the_time('Y'); ?>.</p>
			    <?php } elseif (is_search()) { ?>
			    <p>You have searched the <a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a> blog archives
			    for <strong>'<?php the_search_query(); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p>
			    <?php /* If this set is paginated */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			    <p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a> blog archives.</p>
		    <?php } ?>
		</section>
	<?php }?>

		<?php dynamic_sidebar( 'primary' ); ?>
	<?php else : ?>
		<!-- This content shows up if there are no widgets defined in the backend. -->
		<div class="alert alert-help">
			<p>Please activate some Widgets.</p>
		</div>
		<?php endif; ?>
	</ul>
</aside>