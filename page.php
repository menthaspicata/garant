<?php get_header(); ?>

<section class="house-content" >

	<?php $current_page = get_post(); ?>

	<h1><?= $current_page->post_title; ?></h1>

	<p class="page_content"><?= $current_page->post_content; ?></p>
	
</section>

<?php get_footer(); ?>