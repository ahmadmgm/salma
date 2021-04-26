<?php
if (post_password_required()) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php // You can start editing here -- including this comment! ?>
	<?php if (have_comments()) : ?>
		<div class="comment_top">
			<?php $comments_number = get_comments_number(); ?>
			<h3 class="comments-title">
				<?php
				if ($comments_number) {
					if ('1' === $comments_number) {
						/* translators: %s: post title */
						printf(_x('Comment (1)', 'comments title', 'ailab'));
					} else {
						printf(
							/* translators: 1: number of comments, 2: post title */
							_x(
								'Comments (%s)',
								'comments title',
								'ailab'
								),
							number_format_i18n($comments_number)
							);
					}
				}
				?>
			</h3>
			<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
				<nav id="comment-nav-above" class="comment-navigation col-xs-12 col-sm-12 col-md-12 col-lg-12"
				role="navigation">
				<h1 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'ailab'); ?></h1>
				<div class="nav-previous"><?php previous_comments_link(esc_html__('&larr; Older Comments', 'ailab')); ?></div>
				<div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments &rarr;', 'ailab')); ?></div>
			</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>
		<ol class="comment-list">
			<?php
			wp_list_comments(array(
				'style' => 'ol',
				'short_ping' => true,
				'avatar_size' => 110,
				'callback' => 'jws_custom_comment',
				'reply_text' => 'Reply',
				));
				?>
			</ol><!-- .comment-list -->
			<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
				<nav id="comment-nav-below" class="comment-navigation" role="navigation">
					<h1 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'ailab'); ?></h1>
					<div class="nav-previous"><?php previous_comments_link(esc_html__('&larr; Older Comments', 'ailab')); ?></div>
					<div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments &rarr;', 'ailab')); ?></div>
				</nav><!-- #comment-nav-below -->
			<?php endif; // check for comment navigation ?>
		</div>
	<?php endif; // have_comments() ?>
	<?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
	if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
		?>
	<p class="no-comments"><?php esc_html_e('Comments are closed.', 'ailab'); ?></p>
<?php endif; ?>
<?php
$commenter = wp_get_current_commenter();
$consent   = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
$fields = array(
    'alert' =>
	'<p class="comment-form-alert">'.wp_kses('Your email address will not be published. Required fields are marked *', 'ailab').'</p>',
	'author' =>
	'<p class="comment-form-author item-comment"><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" aria-required="true" placeholder="' . esc_attr_x('Name *', 'placeholder', 'ailab') . '" /></p>',
	'email' =>
    '<p class="comment-form-email item-comment"><input id="email" name="email"  type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-required="true" placeholder="' . esc_attr_x('Email *', 'placeholder', 'ailab') . '" /></p>',
    'website' =>
	'<p class="comment-form-website item-comment"><input id="website" name="website"  type="text"  size="30"  placeholder="' . esc_attr_x('Website', 'placeholder', 'ailab') . '" /></p>',
    );
   
$args = array(
	'id_form' => 'commentform',
	'id_submit' => 'submit',
	'class_submit' => 'submit ',
	'name_submit' => 'submit',
	'title_reply' => esc_html__('Leave A Comment ', 'ailab'),
	'title_reply_to' => esc_html__('Leave A Comment  %s', 'ailab'),
	'cancel_reply_link' => esc_html__('', 'ailab'),
	'label_submit' => esc_html__('Post comment', 'ailab'),
	'format' => 'xhtml',
	
	'must_log_in' => '<p class="must-log-in">' .
	sprintf(
		wp_kses('You must be <a href="%s">logged in</a> to post a comment.', 'ailab'),
		wp_login_url(apply_filters('the_permalink', get_permalink()))
		) . '</p>',
	'logged_in_as' => '<p class="logged-in-as">' .
	sprintf(
		wp_kses('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="' . esc_attr('Log out of this account') . '">Log out?</a>', 'ailab'),
		admin_url('profile.php'),
		$user_identity,
		wp_logout_url(apply_filters('the_permalink', get_permalink()))
		) . '</p>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
    'comment_field' => '
    <div class="item-comment comment-content ds"><textarea id="comment" name="comment" cols="60" rows="6" aria-required="true" placeholder="' . esc_attr_x('Write your comment...', 'placeholder', 'ailab') . '">' . '</textarea></div>
	',
    'fields' => apply_filters('comment_form_default_fields', $fields),
	);
comment_form($args);
?>
</div><!-- #comments -->