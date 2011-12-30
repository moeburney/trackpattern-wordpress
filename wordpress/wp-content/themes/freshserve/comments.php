<?php

function fs_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<div class="comment">
			<div class="comment-author vcard">
				<?php echo get_avatar($comment, 80); ?>
			</div>
			<div class="comment-body">
				<h4><?php printf(sprintf( '%s', get_comment_author_link())); ?></h4>
				<?php comment_text(); ?>
				<?php if ($comment->comment_approved == '0') : ?>
					<br />
					<em><?php _e( 'Your comment is awaiting moderation.'); ?></em>
				<?php endif; ?>
				
				<div class="comment-meta">
					<span class="date"><?php echo get_comment_date(); ?> at <?php echo get_comment_time(); ?></span>
					<?php comment_reply_link(array_merge( $args, array('reply_text' => 'Post a reply', 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
<?php
			break;
	endswitch;
}

?>
<?php if (have_comments()) : ?>

	<ol class="commentlist">
		<?php wp_list_comments(array('callback' => 'fs_comment')); ?>
	</ol>

<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
	<div class="navigation">
		<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'freshserve' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'freshserve' ) ); ?></div>
	</div>
<?php 
	endif; // check for comment navigation 
	else : // or, if we don't have comments:
	endif; // end have_comments() 
?>

<div id="add_comment">
	<?php comment_form( array('title_reply' => 'Leave a reply', 'comment_notes_after'  => '')); ?>
</div>