<?php /* Template Name: rent */ ?>

<?php get_header(); ?>


<?php require 'query.php'; ?>
<?php require 'filters.php'; ?>



<section class="houses">
	<ul class="content">

		<?php require 'loop.php'; ?>

	</ul>
</section>


<?php get_footer(); ?>