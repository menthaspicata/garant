<?php get_header(); ?>


<?php require 'query.php'; ?>
<?php require 'filters.php'; ?>


<section class="houses">
<ul class="content">

<?php		

	if ( $house->have_posts() ) : while ( $house->have_posts() ) : $house->the_post(); 

		$house_price_front = esc_attr(get_post_meta( $post->ID, '_house_price', true ));
		$house_price_UAH_front = number_format($house_price_front * $USD_p24, 0, ',', ' ');
		$house_price_front = number_format($house_price_front, 0, ',', ' ');
		$house_floor_front = esc_attr(get_post_meta( $post->ID, '_house_floor', true ));
		$house_rooms_front = esc_attr(get_post_meta( $post->ID, '_house_rooms', true ));
		$house_area_total_front = esc_attr(get_post_meta( $post->ID, '_house_area_total', true ));
		$house_area_live_front = esc_attr(get_post_meta( $post->ID, '_house_area_live', true ));
		$house_area_kitchen_front = esc_attr(get_post_meta( $post->ID, '_house_area_kitchen', true ));
		$house_gallery_front = get_post_meta( $post->ID, 'housegallery', false );
		$house_location_front = wp_get_post_terms( $post->ID, 'house_location' );

		$house_description = esc_attr(get_post_meta( $post->ID, '_house_description', true ));

		$house_agent = esc_attr(get_post_meta( $post->ID, '_house_agent', true ));

		$house_agent = get_user_by( 'id', $house_agent );

		if ( !empty($house_description) ) {
			$house_description = substr($house_description, 0, 80);
			$house_description .= '...';
		}

		
	?>
	
		<li class="house-thumb" >

			<h1><?= the_title(); ?></h1>
		
			<div class="thumb">
				<?php the_post_thumbnail( array(250, 250) ); ?> 
			</div>

			<div class="house-price">
				<?= $house_price_front; ?> $ <br> <?= $house_price_UAH_front; ?> грн
			</div>

			<div class="house-description">
				<?= $house_description; ?>

				<a href="<?= wp_get_shortlink(); ?>">подробнее</a>
			</div>

			

			<div class="house-meta">

				<span><?= $house_floor_front ?> й этаж</span>
				<span>Комнат: <?= $house_rooms_front ?></span>
				<span>Район: <?= $house_location_front[0]->name ?></span>

			</div>
		</li>		

		
	<?php endwhile; endif;?>

</ul>
</section>


<?php get_footer(); ?>