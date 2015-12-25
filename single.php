<?php get_header(); ?>


<?php 

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
	$house_description = esc_attr(get_post_meta( $post->ID, '_house_description', true ));
	$house_agent_id = esc_attr(get_post_meta( $post->ID, '_house_agent', true ));
	$house_agent = get_user_by( 'id', $house_agent_id );
	$house_phone_front = esc_attr(get_post_meta( $post->ID, '_house_phone', true ));
	$house_who_answer_front = esc_attr(get_post_meta( $post->ID, '_house_who_answer', true ));
	$house_property_type = wp_get_post_terms( $post->ID, 'property_type' );
	$house_direction_front = wp_get_post_terms( $post->ID, 'house_direction' );
	$house_categories_front = wp_get_post_terms( $post->ID, 'house_categories' );
	$house_build_type_front = wp_get_post_terms( $post->ID, 'house_build_type' );
	$house_heating_front = wp_get_post_terms( $post->ID, 'house_heating' );
	$house_street = esc_attr(get_post_meta( $post->ID, '_house_adress', true ));
	$house_street_number = esc_attr(get_post_meta( $post->ID, '_house_adress_number', true ));
	$house_apartment_number = esc_attr(get_post_meta( $post->ID, '_house_adress_apartment', true ));
	$house_description = esc_attr(get_post_meta( $post->ID, '_house_description', true ));




	?>
		<section class="house-content" >

				<h1><?= the_title(); ?></h1>
				
			
				<div class="thumb">
					<?php the_post_thumbnail( 'full' ); ?> 
				</div>

				<div class="house-agent">
					<?php 
						echo get_user_avatar( $house_agent_id, 120 );
					?>

					<h4><?=  $house_agent->first_name . ' ' . $house_agent->last_name;;  ?> </h4>

					<h6><?= esc_attr( get_the_author_meta( 'phone', $house_agent_id ) );?></h6> 
					<h6><?= esc_attr( get_the_author_meta( 'second_phone', $house_agent_id ) );?></h6>
					<h6><?= esc_attr( get_the_author_meta( 'third_phone', $house_agent_id ) );?></h6> 
				</div>			

				

				<div class="house-meta">
					<h4 class="house_landlord">
						<?php
							if ( is_user_logged_in() ) {
								echo 'Хозяин: <span>' . $house_who_answer_front . ', ' .$house_phone_front . '</span>';
							} 
						?>
					</h4>

					<h4>Цена в долларах: <span><?= $house_price_front; ?> $</span></h4>
					<h4>Цена в гривнах: <span><?= $house_price_UAH_front; ?> грн</span></h4>					

					<h4>
						Адрес:  <span><?= $house_street; ?>
						<?php 
						if ( is_user_logged_in() ) {
							echo  $house_street_number . ', кв. ' . $house_apartment_number;
						} 
						?>
						</span>
					</h4>

					<?php 
						if ( is_user_logged_in() ) {
							echo '<h4>';
							echo 'Категория объекта: <span>';
							echo $house_property_type[0]->name;
							echo '</span></h4>';

							echo '<h4>';
							echo 'Направление: <span>';
							echo $house_direction_front[0]->name;
							echo '</span></h4>';

							echo '<h4>';
							echo 'Тип: <span>';
							echo $house_categories_front[0]->name;
							echo '</span></h4>';
						} 
					?>

					<h4>Район: <span><?= $house_location_front[0]->name; ?></span></h4>
					<h4>Комнат: <span><?= $house_rooms_front; ?></span></h4>
					<h4>Этаж: <span><?= $house_floor_front; ?> / <?= $house_all_floor_front; ?></span></h4>
					<h4>Вид постройки: <span><?= $house_build_type_front[0]->name; ?></span></h4>
					<h4>Отопление: <span><?= $house_heating_front[0]->name; ?></span></h4>

					<h4>Площадь: <span><?= $house_area_total_front; ?></span></h4>
					<h4>Площадь кухни: <span><?= $house_area_kitchen_front; ?></span></h4>
					<h4>Жилая площадь: <span><?= $house_area_live_front; ?></span></h4>	

					<h4>ID: <span><?= $post->ID; ?></span></h4>			

				</div>

				<div class="house-description">
					<?= $house_description; ?>
				</div>

				<?php  do_shortcode( $house_gallery_front ); ?>
		</section>		

		

<?php get_footer(); ?>