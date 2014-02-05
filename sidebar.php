<aside id="sidebar" role="complementary">
<ul>
<?php if ( is_active_sidebar( 'primary' ) ) : ?>

<!-- Show Shopping Cart Globally-->
	<?php global $woocommerce; ?>



<?php if (sizeof($woocommerce->cart->cart_contents)>0) { ?>

<div class="widget-title">
	<h3>Shopping Cart</h3>
</div>
	<!-- show cart item count and overall price -->
	<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> -
	<?php echo $woocommerce->cart->get_cart_total(); ?></a>

	<!-- show checkout link if shopping cart has items -->
	<?php if (sizeof($woocommerce->cart->cart_contents)>0) :?>
		<a href="<?php echo $woocommerce->cart->get_checkout_url()?>" title="<?php _e('Checkout','woothemes') ?>"><?php _e('Checkout','woothemes') ?></a>
<?php endif; ?>

<?php } ?>



<?php if(!is_woocommerce()) { ?>

	<?php if (is_single())  { ?>

		<?php if ( has_post_thumbnail() ) { ?>
	        <aside class="thumbnail">
	        	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
	        </aside>
	    <?php } else {}?>

        <aside class="byline meta postmetadata">
			<p class="post_details">
				This post was written by <address class="author vcard"><?php the_author_posts_link(); ?></address>.
				It was published on a <?php the_time('l'); ?>, which is the <?php the_time('jS'); ?> day in <?php the_time('F, Y'); ?>.
				It was posted under the topic <?php the_category(', ') ?>.
				It is tagged with <span class="tags"><?php the_tags('', ', ', '. '); ?></span>
				<?php if ( comments_open() ) :
					echo '<p>';
					comments_popup_link( 'There are no responses yet. Why not leave a response?','There is 1 response.', 'There are % responses.', 'comments-link', 'Sorry, but comments are closed.');
					echo '</p>';
				endif; ?>
			</p>

			<div class="postauthor">
			<p><?php echo get_avatar( get_the_author_id() , 95 ); ?>
				Hi, I am <?php the_author_meta( 'nickname', $author_id ); ?>. I have written <a href="<?php bloginfo('url'); ?>/?author=<?php the_author_ID(); ?>"><?php the_author_posts(); ?> article<?php
				$postcnt =(int)get_the_author_posts();
				if ($postcnt>=2){
				echo "s";
				}
				?>
				</a> for <?php bloginfo('name'); ?>.
				</a>
				<?php the_author_meta( 'description' ); ?>
				</p>
			</div>
		</aside>

		<?php } elseif (is_category()) { ?>
			<p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>
		<?php } elseif (is_tag()) { ?>
			<p>You are currently browsing the archives for the <?php single_tag_title(''); ?> tag.</p>
		<?php } elseif (is_day()) { ?>
		    <p>You are currently browsing the <a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a> blog archives for the day <?php get_option('date_format'); ?>.</p>
	    <?php } elseif (is_month()) { ?>
		    <p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a> blog archives for <?php the_time('F, Y'); ?>.</p>
		<?php } elseif (is_year()) { ?>
	    	<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a> blog archives for the year <?php the_time('Y'); ?>.</p>
		<?php } elseif (is_search()) { ?>
	    	<p>You have searched the <a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a> blog archives for <strong>'<?php the_search_query(); ?>'</strong>.</p>
		 <?php } ?>
<?php } ?>

		 <?php dynamic_sidebar( 'primary' ); ?>
	<?php else : ?>
<?php endif; ?>
</ul>
</aside>