<?php


/**
 * 	main meta box
 */

function add_view_house_meta_main( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'save_house_meta_main', 'house_meta_main_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$house_price = get_post_meta( $post->ID, '_house_price', true );
	$house_adress = get_post_meta( $post->ID, '_house_adress', true );
	$house_floor = get_post_meta( $post->ID, '_house_floor', true );
	$house_rooms = get_post_meta( $post->ID, '_house_rooms', true );
	$house_description = get_post_meta( $post->ID, '_house_description', true );
	$house_all_floor = get_post_meta( $post->ID, '_house_all_floor', true );
	$house_area_total = get_post_meta( $post->ID, '_house_area_total', true );
	$house_area_live = get_post_meta( $post->ID, '_house_area_live', true );
	$house_area_kitchen = get_post_meta( $post->ID, '_house_area_kitchen', true );
	$house_type = get_post_meta( $post->ID, '_house_type', true );
	$house_base = get_post_meta( $post->ID, '_house_base', true );

	global $USD_p24;

	?>

	<style type="text/css">
		#house_meta_wrapp label {
			min-width: 150px;
			display: inline-block;
			margin-bottom: 10px;
			vertical-align: top;
		}
	</style>

	<section id="house_meta_wrapp">
		
	<p>
		<label for="house_adress">Адрес:</label>
		<input type="text" id="house_adress" name="house_adress" value="<?= esc_attr( $house_adress ) ?>" style="width:60%;" />
	</p>
	<hr>
	<p>
		<label for="house_price">Цена:</label>
		<input type="text" id="house_price" name="house_price" value="<?= esc_attr( $house_price ) ?>" size="8" /> <span>$</span>
		<br>
		<label>Цена в гривнах:</label>
		<input type="text" value="<?= $house_price * $USD_p24 ?>" size="8" disabled>&nbsp;<i>по курсу нбу</i>

	</p>
	<hr>


	<p>
		<label for="house_rooms">Количество комнат:</label>
		<input type="text" id="house_rooms" name="house_rooms" value="<?= esc_attr( $house_rooms ) ?>" size="8" />
	</p>
	<p>
		<label for="house_floor">Этаж:</label>
		<input type="text" id="house_floor" name="house_floor" value="<?= esc_attr( $house_floor ) ?>" size="8" />
	</p>
	<p>
		<label for="house_all_floor"> Этажей в доме: </label>
		<input type="text" id="house_all_floor" name="house_all_floor" value="<?= esc_attr( $house_all_floor ) ?>" size="8" > 
	</p>
	<hr>


	<p>
		<label for="house_area_total"> Общая площадь: </label>
		<input type="text" id="house_area_total" name="house_area_total" value="<?= esc_attr( $house_area_total ) ?>" size="8" > м<sup>2</sup>
	</p>
	<p>
		<label for="house_area_live"> Жилая площадь: </label>
		<input type="text" id="house_area_live" name="house_area_live" value="<?= esc_attr( $house_area_live ) ?>" size="8" > м<sup>2</sup>
	</p>
	<p>
		<label for="house_area_kitchen"> Площадь кухни: </label>
		<input type="text" id="house_area_kitchen" name="house_area_kitchen" value="<?= esc_attr( $house_area_kitchen ) ?>" size="8" > м<sup>2</sup>
	</p>
	<hr>

	<p>
		<label for="house_description">Описание жилья:</label>
		<textarea type="text" id="house_description" name="house_description" style="width:60%;" rows="7"><?= esc_attr( $house_description ) ?></textarea>		
	</p>
	<p>
		<label for="house_type">Тип постройки:</label>
		<input type="text" id="house_type" name="house_type" value="<?= esc_attr( $house_type ) ?>" style="width:60%;" />		
	</p>
	<p>
		<label for="house_base">Фундамент:</label>
		<input type="text" id="house_base" name="house_base" value="<?= esc_attr( $house_base ) ?>" style="width:60%;" />	
	</p>


	</section>

<?php

}



/**
 * 	save main meta box
 */
function save_house_meta_main( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['house_meta_main_nonce'] ) ) {	return;	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['house_meta_main_nonce'], 'save_house_meta_main' ) ) {	return;	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {	return;	}

	if (!current_user_can('edit_post')) {	return;	}

	

	if ( isset( $_POST['house_price'] ) ) {

		update_post_meta( $post_id, 
								'_house_price', 
								sanitize_text_field( $_POST['house_price']) 
								);
	}


	if ( isset( $_POST['house_adress'] ) ) {

		update_post_meta( $post_id, 
								'_house_adress', 
								sanitize_text_field( $_POST['house_adress'] ) 
								);
	}


	if ( isset( $_POST['house_floor'] ) ) {

		update_post_meta( $post_id, 
								'_house_floor', 
								sanitize_text_field( $_POST['house_floor'] ) 
								);
	}

	if ( isset( $_POST['house_rooms'] ) ) {

		update_post_meta( $post_id, 
								'_house_rooms', 
								sanitize_text_field( $_POST['house_rooms'] ) 
								);
	}

	if ( isset( $_POST['house_description'] ) ) {

		update_post_meta( $post_id, 
								'_house_description', 
								sanitize_text_field( $_POST['house_description'] ) 
								);
	}

	if ( isset( $_POST['house_all_floor'] ) ) {

		update_post_meta( $post_id, 
								'_house_all_floor', 
								sanitize_text_field( $_POST['house_all_floor'] ) 
								);
	}

	if ( isset( $_POST['house_area_total'] ) ) {

		update_post_meta( $post_id, 
								'_house_area_total', 
								sanitize_text_field( $_POST['house_area_total'] ) 
								);
	}

	if ( isset( $_POST['house_area_live'] ) ) {

		update_post_meta( $post_id, 
								'_house_area_live', 
								sanitize_text_field( $_POST['house_area_live'] ) 
								);
	}

	if ( isset( $_POST['house_area_kitchen'] ) ) {

		update_post_meta( $post_id, 
								'_house_area_kitchen', 
								sanitize_text_field( $_POST['house_area_kitchen'] ) 
								);
	}

	if ( isset( $_POST['house_type'] ) ) {

		update_post_meta( $post_id, 
								'_house_type', 
								sanitize_text_field( $_POST['house_type'] ) 
								);
	}

	if ( isset( $_POST['house_base'] ) ) {

		update_post_meta( $post_id, 
								'_house_base', 
								sanitize_text_field( $_POST['house_base'] ) 
								);
	}
}
