<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!'); ?>
<div id="comments">
<?php if ( post_password_required() ) { ?>
	<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php return; } ?>

<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>
    <div id="comment_count">
        <h3 id="comments"><?php comments_number('There Are No Responses... Yet.', 'There Is One Response So Far', 'There Are % Responses So Far' );?>. Why Not Leave Yours?</h3>
    </div>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<?php $comments_by_type = &separate_comments($comments); ?>
		<?php if (!empty($comments_by_type['comment'])) { ?>
	    	<h3 id="comments">Comments</h3>
			<ol class="commentlist">
	        	<?php wp_list_comments('type=comment&avatar_size=165'); ?>
			</ol>
		<?php } if (!empty($comments_by_type['pingback'])) { ?>
			<h3 id="pingbacks">Pingbacks</h3>
			<ol class="pingbacklist">
				<?php wp_list_comments('type=pingback'); ?>
			</ol>
		<?php } if (!empty($comments_by_type['trackback'])) { ?>
		    <h3 id="trackbacks">Trackbacks</h3>
		    <ol class="trackbacklist">
		        <?php wp_list_comments('type=trackback'); ?>
		    </ol>
	<?php } ?>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
<?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	<?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

<?php comment_form() ?>


<?php endif; // if you delete this the sky will fall on your head ?>
</div><!-- #comments -->