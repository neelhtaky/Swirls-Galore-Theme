<?php
/******************************************************************
ADD THEME SUPPORT
******************************************************************/
if ( ! isset( $content_width ) ) $content_width = 900;

if(function_exists('add_theme_support')) {
    add_theme_support( 'post-thumbnails' );
	add_theme_support('menus');
    add_theme_support('automatic-feed-links');
    add_theme_support( 'custom-header', $header_args );
}
/* Register Sidebars */
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Primary Sidebar',
		'id' => 'primary',
		'before_widget' => '<li id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer Sidebar',
		'id' => 'footer',
		'before_widget' => '<li id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

    register_nav_menus( array(
		'nav_primary' => ( 'Primary Navigation')
	) );
}

//Puts link in excerpts more tag
function new_excerpt_more($more) {
	global $post;
	return '... <div><a href="'. get_permalink($post->ID) . '" class="read_more" rel="bookmark">Read More</a></div>';
}
add_filter('excerpt_more', 'new_excerpt_more');

//Create several different excerpt lengths depending upon need
function wpe_excerptlength_splash($length) {return 30;}
function wpe_excerptlength_index($length) {return 100;}
function wpe_excerptlength_posts($length) {return 120;}
function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}
// Add Del and Spam buttons to comments for easy author editing
function spam_delete_comment_link($id) {
	global $comment, $post;
	if ( $post->post_type == 'page' ) {
		if ( !current_user_can( 'edit_page', $post->ID ) )
			return;
	} else {
		if ( !current_user_can( 'edit_post', $post->ID ) )
			return;
	}
	$id = $comment->comment_ID;
	if ( null === $link )
		$link = __('Edit');
	$link = '<p><a class="comment-edit-link" href="' . get_edit_comment_link( $comment->comment_ID ) . '" title="' . __( 'Edit comment' ) . '">' . $link . '</a>';
	$link = $link . ' | <a href="'.admin_url("comment.php?action=cdc&c=$id").'">Delete</a> ';
	$link = $link . ' | <a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'">Spam</a></p>';
	$link = $before . $link . $after;
	return $link;
}
add_filter('edit_comment_link', 'spam_delete_comment_link');

//Custom Comments Display
function mytheme_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
?>
		<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		<div class="comment-author vcard">
		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<?php printf(__('<cite class="fn">%s</cite> <span class="says">said:</span>'), get_comment_author_link()) ?>
		</div>
		<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __('%1$s'), get_comment_date()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
			?>
		</div>
<?php if ($comment->comment_approved == '0') : ?>
		<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation, please be patient.') ?></em>
<?php endif; ?>
		<div class="comment-content"><?php comment_text(); ?></div>

		<div class="reply">
		<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
<?php
        }
?>