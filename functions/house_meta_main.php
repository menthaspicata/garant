<?php

/**
 * 	global array with all main custom meta boxes fields 
 * 	to add or delete meta field just add/del value in this array
 * 	and add html with this variable
 */

$house_fields = array(
	"house_price",				//цена
	"house_adress",			//улица
	"house_adress_number",	//номер дома
	"house_adress_lat",		//широта
	"house_adress_long",		//долгота
	"house_floor",				//этаж
	"house_rooms",				//количество комнат
	"house_description",		//описание
	"house_all_floor",		//этажей в доме
	"house_area_total",		//общая площадь
	"house_area_live",		//жилая площадь
	"house_area_kitchen",	//площадь кухни
	"house_type",				//тип постройки
	"house_base",				//фундамент
	"house_phone",				//телефон владельца
	"house_who_answer"		//имя владельца
);


/**
 * 	main meta box
 */

function add_view_house_meta_main( $post ) {

	global $house_fields;
	global $USD_p24;

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'save_house_meta_main', 'house_meta_main_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */	
	foreach ($house_fields as $house_field) {
		${ $house_field } = get_post_meta( $post->ID, '_' . $house_field, true );
	}


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
		<label for="house_adress">Улица:</label>
		<input type="text" id="house_adress" name="house_adress" value="<?= esc_attr( $house_adress ) ?>" style="width:50%;" />
	</p>

	<p>
		<label for="house_adress_number">Номер дома:</label>
		<input type="text" id="house_adress_number" name="house_adress_number" value="<?= esc_attr( $house_adress_number ) ?>" size="8" />
	</p>

	<p>
		<label for="house_adress_lat">Широта (lat):</label>
		<input type="text" id="house_adress_lat" name="house_adress_lat" value="<?= esc_attr( $house_adress_lat ) ?>" size="8" />
	</p>

	<p>
		<label for="house_adress_long">Долгота (long):</label>
		<input type="text" id="house_adress_long" name="house_adress_long" value="<?= esc_attr( $house_adress_long ) ?>" size="8" />
	</p>
	<hr>
	<p>Широту и долготу нужно брать из google maps, предварительно указав точный адрес. Где их найти написано <a href="https://support.google.com/maps/answer/18539?hl=ru">тут</a></p>
	<hr>
	<p>
		<label for="house_price">Цена:</label>
		<input onchange="" type="text" id="house_price" name="house_price" value="<?= esc_attr( $house_price ) ?>" size="8" /> <span>$</span>
		<br>
		<label for="house_price_grivna">Цена в гривнах:</label>
		<input id="house_price_grivna" type="text" value="<?= $house_price * $USD_p24 ?>" size="8" disabled>&nbsp;<i>по курсу нбу</i>

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

	<hr>
	<h2>Информация о владельце</h2>
	<p>
		<label for="house_phone">Телефон владельца:</label>
		<input type="text" id="house_phone" name="house_phone" value="<?= esc_attr( $house_phone ) ?>" style="width:60%;" />
	</p>

	<p>
		<label for="house_who_answer">Кого спросить:</label>
		<input type="text" id="house_who_answer" name="house_who_answer" value="<?= esc_attr( $house_who_answer ) ?>" style="width:60%;" />
	</p>




	<script type="text/javascript">
		var USD_p24 = <?= $USD_p24 ?> 
		var house_price = document.getElementById('house_price');
		house_price.oninput = function() {
			document.getElementById('house_price_grivna').value = house_price.value * USD_p24;
		};
	</script>


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

	global $house_fields;

	foreach ($house_fields as $house_field) {
		if ( isset( $_POST[ $house_field ] ) ) {
			update_post_meta( $post_id, 
									'_' . $house_field, 
									sanitize_text_field( $_POST[ $house_field ]) 
									);
		}
	}
}
