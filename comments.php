<?php

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area reviews">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				/*printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'twentyfifteen' ),
					number_format_i18n( get_comments_number() ), get_the_title() );*/
			?>
		</h2>


		<ul class="comment-list">
			<?php
				wp_list_comments('type=comment&callback=mytheme_comment');
			/*
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'format'      => 'html5',
					'avatar_size'       => 0,
				) );

			*/
			?>
		</ul><!-- .comment-list -->



	<?php endif; // have_comments() ?>

	<?php

	$commenter = wp_get_current_commenter();

	
	$args = array(
		'fields' => array(
				'author' => '<p class="comment-form-author">' . '<label for="author">' . 'Представьтесь' . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
							'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>',
				'email'  => '<p class="comment-form-email"><label for="email">' . 'Ваш email' . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
							'<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',
				'url'    => '',
								),
		'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . 'Отзыв:' . '</label> <textarea id="comment" name="comment" cols="45" rows="8"  aria-required="true" required="required"></textarea></p>',
		'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( '<a href="%1$s" aria-label="Logged in as %2$s. Edit your profile.">Logged in as %2$s</a>. <a href="%3$s">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'class_form'           => 'comment-form',
		'class_submit'         => 'submit',
		'name_submit'          => 'submit',
		'title_reply'          => 'Оставьте отзыв',
		'title_reply_to'       => 'Оставьте отзыв',
		'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
		'title_reply_after'    => '</h3>',
		'cancel_reply_before'  => ' <small>',
		'cancel_reply_after'   => '</small>',
		'cancel_reply_link'    => __( 'Cancel reply' ),
		'label_submit'         => 'Отправить отзыв',
		'submit_button'        => '<input name="%1$s" type="submit" class="reviews_submit" value="%4$s" />',
		'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
		'format'               => 'xhtml',
	);

	comment_form( $args ); 

	?>

</div><!-- .comments-area -->

<?php 
function mytheme_comment($comment, $args, $depth){
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>">

	

	<?php if ($comment->comment_approved == '0') : ?>
		<em>Спасибо за отзыв. В скором времени он появится на сайте.</em>
		<br />
	<?php endif; ?>


	<p class="comment_content">
		<?php comment_text() ?>
	</p>
	

	<div class="comment-author vcard">
		<h4 class="reviews_author"><?php echo get_comment_author_link() ?></h4> 
	</div>


	</div>
<?php
}
?>
