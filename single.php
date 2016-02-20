<?php get_header(); ?>


<?php 

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
	$house_description = esc_attr(get_post_meta( $current_post_id, '_house_description', true ));
	$house_agent_id = esc_attr(get_post_meta( $current_post_id, '_house_agent', true ));
	$house_agent = get_user_by( 'id', $house_agent_id );
	$house_phone_front = esc_attr(get_post_meta( $current_post_id, '_house_phone', true ));
	$house_who_answer_front = esc_attr(get_post_meta( $current_post_id, '_house_who_answer', true ));
	$house_property_type = wp_get_post_terms( $current_post_id, 'property_type' );
	$house_direction_front = wp_get_post_terms( $current_post_id, 'house_direction' );
	$house_categories_front = wp_get_post_terms( $current_post_id, 'house_categories' );
	$house_build_type_front = wp_get_post_terms( $current_post_id, 'house_build_type' );
	$house_heating_front = wp_get_post_terms( $current_post_id, 'house_heating' );
	$house_street = esc_attr(get_post_meta( $current_post_id, '_house_adress', true ));
	$house_street_number = esc_attr(get_post_meta( $current_post_id, '_house_adress_number', true ));
	$house_apartment_number = esc_attr(get_post_meta( $current_post_id, '_house_adress_apartment', true ));

	$house_adress_korpus = esc_attr(get_post_meta( $current_post_id, '_house_adress_korpus', true ));

	$house_description = esc_attr(get_post_meta( $current_post_id, '_house_description', true ));
	$house_prozvon = esc_attr(get_post_meta( $current_post_id, '_house_prozvon', true ));




	?>
		<section class="house-content" >

				<h1><?= the_title(); ?></h1>
				
			
				<div class="thumb">
					<?php 

					if ( has_post_thumbnail( $current_post_id ) ) {
						echo '<img class="material_shadow" src="' . wp_get_attachment_url( get_post_thumbnail_id($current_post_id) ) . '">';
					} else {
						echo '<img 
						class="thumb_logo" 
						src="' . get_template_directory_uri() . '/img/logo.jpg" 
						title="' . $cur_house_title . '" 
						alt="' . $cur_house_title . '">';
					}				 

				?>  
				</div>

				<div class="house-agent">
					<?php 
						echo get_user_avatar( $house_agent_id, 120 );
					?>

					<h4><?=  $house_agent->first_name . ' ' . $house_agent->last_name;;  ?> </h4>

					<h6><?= esc_attr( get_the_author_meta( 'profession', $house_agent_id ) ); ?></h6>

					<h6><?= esc_attr( get_the_author_meta( 'phone', $house_agent_id ) );?></h6> 
					<h6><?= esc_attr( get_the_author_meta( 'second_phone', $house_agent_id ) );?></h6>
					<h6><?= esc_attr( get_the_author_meta( 'third_phone', $house_agent_id ) );?></h6> 
				</div>			

				

				<div class="house-meta">
					
					<?php
						if ( is_user_logged_in() ) {
							echo '<h4 class="house_landlord">';
							echo 'Хозяин: <span>' . $house_who_answer_front . ', ' .$house_phone_front . '</span>';
							echo '</h4>';
						} 
					?>
					

					<h4>Цена в долларах: <span><?= $house_price_front; ?> $</span></h4>
					<h4>Цена в гривнах: <span><?= $house_price_UAH_front; ?> грн</span></h4>					

					<h4>
						Адрес:  <span><?= $house_street; ?>
						<?php 
						if ( is_user_logged_in() ) {
							echo  $house_street_number . ', кв. ' . $house_apartment_number .' корпус '. $house_adress_korpus;
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
							echo 'Тип: ';
							echo '<span>';
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


					<?php 
						if ( is_user_logged_in() ) {
							echo '<h4>';
							echo 'Прозвон: <span>';
							echo $house_prozvon;
							echo '</span></h4>';

							echo '<h4>';
							echo 'ID: <span>';
							echo $current_post_id;
							echo '</span></h4>';
						}
					?>	

					<h4 class="house_description"><?= $house_description; ?></h4>	

				</div>

				<?php require 'includes/gallery.php'; ?>

				<?php require 'includes/map.php'; ?>

		</section>		

		

<?php get_footer(); ?>