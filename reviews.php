<?php /* Template Name: reviews */ ?>

<?php get_header(); ?>


<?php $current_page = get_post(); ?>


<section class="house-content">

	<h1 class="exclusive_header"><?= $current_page->post_title; ?></h1>

	<?php comments_template(); ?>



</section>


<?php get_footer(); ?>