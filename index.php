<?php get_header(); ?>

<?php require 'filters.php'; ?>

<section class="houses">
<ul class="content">

<?php 

	$house = new WP_Query ('post_type=house');	

	if ( $house->have_posts() ) : while ( $house->have_posts() ) : $house->the_post(); 

		$house_price_front = esc_attr(get_post_meta( $post->ID, '_house_price', true ));
		$house_price_UAH_front = number_format($house_price_front * $USD_p24, 0, ',', ' ');
		$house_price_front = number_format($house_price_front, 0, ',', ' ');
		$house_floor_front = esc_attr(get_post_meta( $post->ID, '_house_floor', true ));
		$house_rooms_front = esc_attr(get_post_meta( $post->ID, '_house_rooms', true ));
		$house_area_total_front = esc_attr(get_post_meta( $post->ID, '_house_area_total', true ));
		$house_area_live_front = esc_attr(get_post_meta( $post->ID, '_house_area_live', true ));
		$house_area_kitchen_front = esc_attr(get_post_meta( $post->ID, '_house_area_kitchen', true ));
	?>
	
		<li class="house-thumb" >

			<h1><?= the_title(); ?></h1>
				
				<div class="thumb">
					<?php the_post_thumbnail( array(150, 150) ); ?> 
				</div>

				<div class="house-meta">
					<h4><?= $house_price_front; ?> $</h4>
					<h4><?= $house_price_UAH_front; ?> грн</h4>

					<h4><?= $house_floor_front ?> й этаж</h4>
					<h4>Кол-во комнат: <?= $house_rooms_front ?></h4>
					<h4>Площадь: <?= $house_area_total_front .' / '. $house_area_live_front .' / '. $house_area_kitchen_front ?></h4>

				</div>			

		</li>		

		
	<?php endwhile; endif;?>

</ul>
</section>


<?php get_footer(); ?>