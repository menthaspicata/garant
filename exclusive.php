<?php /* Template Name: exclusive */ ?>

<?php get_header(); ?>


<?php require 'includes/query.php'; ?>
<?php require 'includes/filters.php'; ?>

<?php $current_page = get_post(); ?>


<section class="houses exclusive">

	<h1 class="exclusive_header"><?= $current_page->post_title; ?></h1>

	<ul class="content">

		<?php require 'includes/loop.php'; ?>

	</ul>
</section>


<?php get_footer(); ?>