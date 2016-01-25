<?php		

	if ( $house->have_posts() ) : while ( $house->have_posts() ) : $house->the_post(); 

		$current_post_id = $post->ID;

		$house_price_front = esc_attr(get_post_meta( $current_post_id, '_house_price', true ));
		$house_price_UAH_front = number_format($house_price_front * $USD_p24, 0, ',', ' ');
		$house_price_front = number_format($house_price_front, 0, ',', ' ');
		$house_floor_front = esc_attr(get_post_meta( $current_post_id, '_house_floor', true ));
		$house_all_floor_front = esc_attr(get_post_meta( $current_post_id, '_house_all_floor', true ));
		$house_rooms_front = esc_attr(get_post_meta( $current_post_id, '_house_rooms', true ));
		$house_area_total_front = esc_attr(get_post_meta( $current_post_id, '_house_area_total', true ));
		$house_area_live_front = esc_attr(get_post_meta( $current_post_id, '_house_area_live', true ));
		$house_area_kitchen_front = esc_attr(get_post_meta( $current_post_id, '_house_area_kitchen', true ));
		$house_gallery_front = get_post_meta( $current_post_id, 'housegallery', false );
		$house_location_front = wp_get_post_terms( $current_post_id, 'house_location' );

		$house_agent_id = esc_attr(get_post_meta( $current_post_id, '_house_agent', true ));
		$house_agent = get_user_by( 'id', $house_agent_id );

		$cur_house_title = the_title('','',false);


		
	?>
	
		<li class="house-thumb" >	

			<h1><?= $cur_house_title; ?></h1>		
		
			<div class="thumb">
				<?php 

					if ( has_post_thumbnail($current_post_id) ) {
						the_post_thumbnail( array(230, 230) );
					} else {
						echo '<img 
						class="thumb_logo" 
						src="' . get_template_directory_uri() . '/img/logo.jpg" 
						title="' . $cur_house_title . '" 
						alt="' . $cur_house_title . '">';
					}

					 

				?> 
			</div>

			

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
	
<?php endwhile; ?> 



<?php else : ?>
	<h2>Ничего не найдено</h2>

<?php	endif; ?>