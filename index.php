<?php get_header(); ?>


<?php require 'includes/query.php'; ?>
<?php require 'includes/filters.php'; ?>


<section class="houses">
	<ul class="content">

		<?php require 'includes/loop.php'; ?>

	</ul>
</section>


<?php get_footer(); ?>