<?php		

	if ( $house->have_posts() ) : while ( $house->have_posts() ) : $house->the_post(); 

		$house_price_front = esc_attr(get_post_meta( $post->ID, '_house_price', true ));
		$house_price_UAH_front = number_format($house_price_front * $USD_p24, 0, ',', ' ');
		$house_price_front = number_format($house_price_front, 0, ',', ' ');
		$house_floor_front = esc_attr(get_post_meta( $post->ID, '_house_floor', true ));
		$house_all_floor_front = esc_attr(get_post_meta( $post->ID, '_house_all_floor', true ));
		$house_rooms_front = esc_attr(get_post_meta( $post->ID, '_house_rooms', true ));
		$house_area_total_front = esc_attr(get_post_meta( $post->ID, '_house_area_total', true ));
		$house_area_live_front = esc_attr(get_post_meta( $post->ID, '_house_area_live', true ));
		$house_area_kitchen_front = esc_attr(get_post_meta( $post->ID, '_house_area_kitchen', true ));
		$house_gallery_front = get_post_meta( $post->ID, 'housegallery', false );
		$house_location_front = wp_get_post_terms( $post->ID, 'house_location' );

		$house_agent_id = esc_attr(get_post_meta( $post->ID, '_house_agent', true ));
		$house_agent = get_user_by( 'id', $house_agent_id );


		
	?>
	
		<li class="house-thumb" >			
		
			<div class="thumb">
				<?php the_post_thumbnail( array(230, 230) ); ?> 
			</div>

			<h1><?= the_title(); ?></h1>

			<div class="house-meta">

				<h4>Район: <?= $house_location_front[0]->name; ?></h4>
				<h4>Комнат: <?= $house_rooms_front; ?></h4>
				<h4>Этаж: <?= $house_floor_front; ?> / <?= $house_all_floor_front; ?></h4>
				<h4>Площадь: <?= $house_area_total_front . ' / ' . $house_area_live_front . ' / ' . $house_area_kitchen_front; ?></h4>
				<h4>Цена: <?= $house_price_front; ?>$ / <?= $house_price_UAH_front; ?>грн</h4>
				<h4>Телефон: <?= esc_attr( get_the_author_meta( 'phone', $house_agent_id ) );?></h4>		

				<a href="<?= wp_get_shortlink(); ?>">подробнее</a>

			</div>
		</li>		
	
<?php endwhile; endif;?>