<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option('require_name_email');
	$aria_req = ($req ? " aria-required='true'" : '');

	$fields = array(
		'author' => '<div class="comment-form-fields">' .
					'<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) .
					'" size="30"' . $aria_req . ' placeholder="' . esc_attr__('Name', 'theme_translation') . 
					($req ? ' *' : '') . '" />' .
					'<input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) .
					'" size="30"' . $aria_req . ' placeholder="' . esc_attr__('Email', 'theme_translation') . 
					($req ? ' *' : '') . '" />' .
					'</div>',
	);

	$args = array(
		'fields' => $fields,
		'comment_field' => '<div class="comment-form-comment">' .
						  '<textarea id="comment" class="form-textarea" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . 
						  esc_attr__('Write your comment here...', 'theme_translation') . '">' .
						  '</textarea></div>',
		'title_reply' => '',
		'title_reply_to' => '',
		'cancel_reply_link' => __('Cancel Reply', 'theme_translation'),
		'label_submit' => __('Send Comment', 'theme_translation'),
		'class_submit' => 'submit btn btn-primary',
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'class_form' => 'comment-form',
	);

	comment_form($args);

	if ( have_comments() ) :
		?>

		<?php the_comments_navigation(); ?>

		<ul class="comment-list">
			<?php
			wp_list_comments(array(
				'style'      => 'ul',
				'short_ping' => true,
				'avatar_size' => 48,
				'callback'   => 'custom_comment_template'
			));
			?>
		</ul>

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'theme_translation' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
	?>
</div><!-- #comments -->

<?php
function custom_comment_template($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-body">
			<div class="avatar">
				<?php echo get_avatar($comment, $args['avatar_size']); ?>
			</div>
			<div class="comment-text">
				<div class="comment-name">
					<cite class="fn"><?php comment_author_link(); ?></cite>
					<div class="comment-meta">
						<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
							<?php
							printf(
								__('%1$s', 'theme_translation'),
								get_comment_date('M j')
							);
							?>
						</a>
						<?php edit_comment_link(__('(Edit)', 'theme_translation'), '  ', ''); ?>
					</div>
				</div>

				<?php if ($comment->comment_approved == '0') : ?>
					<em class="comment-awaiting-moderation">
						<?php _e('Your comment is awaiting moderation.', 'theme_translation'); ?>
					</em>
				<?php endif; ?>

				<div class="comment-content">
					<?php comment_text(); ?>
				</div>
			</div>
		</div>
	<?php
}
?>