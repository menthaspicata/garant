<?php get_header(); ?>


<?php 



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

		$house_agent_id = esc_attr(get_post_meta( $post->ID, '_house_agent', true ));
		$house_agent = get_user_by( 'id', $house_agent_id );

		$house_phone_front = esc_attr(get_post_meta( $post->ID, '_house_phone', true ));
		$house_who_answer_front = esc_attr(get_post_meta( $post->ID, '_house_who_answer', true ));




	?>
		<section class="house-content" >

				<h1><?= the_title(); ?></h1>
				
			
				<div class="thumb">
					<?php the_post_thumbnail( 'full' ); ?> 
				</div>

				<div class="house-price">

					<?= $house_price_front; ?>$ | <?= $house_price_UAH_front; ?> грн

					<h4><?=  $house_agent->first_name . ' ' . $house_agent->last_name;;  ?>, <?= esc_attr( get_the_author_meta( 'phone', $house_agent_id ) );?></h4>
				</div>			

				<h4 class="house_landlord">
				<?php
					if ( is_user_logged_in() ) {
						echo 'Хозяин: ' . $house_who_answer_front . ', ' .$house_phone_front;
					} 
				?>
				</h4>

				<div class="house-meta">
					
					<h4></h4>

					<h4><?= $house_floor_front ?> й этаж</h4>
					<h4>Кол-во комнат: <?= $house_rooms_front ?></h4>
					<h4>Площадь: <?= $house_area_total_front .' / '. $house_area_live_front .' / '. $house_area_kitchen_front ?></h4>

					<h4>Район: <?= $house_location_front[0]->name ?></h4>

				</div>

				<div class="house-description">
					<?= $house_description; ?>
				</div>

				<?php  do_shortcode( $house_gallery_front ); ?>
		</section>		

		

<?php get_footer(); ?>