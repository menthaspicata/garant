<?php /* Template Name: reviews */ ?>

<?php get_header(); ?>


<?php $current_page = get_post(); ?>


<section class="house-content">

	<h1 class="exclusive_header"><?= $current_page->post_title; ?></h1>

	<?php 
		$fields =  array(
		  'author' =>
		    '<p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
		    ( $req ? '<span class="required">*</span>' : '' ) .
		    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		    '" size="30"' . $aria_req . ' /></p>',

		  'email' =>
		    '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
		    ( $req ? '<span class="required">*</span>' : '' ) .
		    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		    '" size="30"' . $aria_req . ' /></p>',

		  'url' =>
		    '<p class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
		    '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		    '" size="30" /></p>',
		);
	?>

	<?php comments_template(); ?>
	<?php comment_form($fields); ?>

	<?php 
  if (comments_open()) {
    if (get_comments_number() == 0) { ?>
      <h3>Комментариев пока нет, но вы можете стать первым</h3>
    <?php } else { ?>
      <div class="wrap-comments">
        <h3>Комментарии читателей к статье "<?php the_title(); ?>"</h3>
        <!-- далее кодим здесь -->
     </div>
    <?php } 
  } else { ?>
    <h3>Обсуждения закрыты для данной страницы</h3>
  <?php } 
?>


</section>


<?php get_footer(); ?>