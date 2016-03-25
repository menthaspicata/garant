<?php

/**
 * 	global array with all main custom meta boxes fields 
 * 	to add or delete meta field just add/del value in this array
 * 	and add html with this variable
 */

$house_fields = array(
	"house_price",					//цена
	"house_price_grivna",		//цена в гривне
	"house_adress",				//улица
	"house_adress_number",		//номер дома
	"house_adress_apartment", 	//Номер квартиры
	"house_adress_korpus", 	   //корпус
	//"house_adress_lat",			//широта
	//"house_adress_long",			//долгота
	"house_floor",					//этаж
	"house_rooms",					//количество комнат
	"house_description",			//описание
	"house_all_floor",			//этажей в доме
	"house_area_total",			//общая площадь
	"house_area_live",			//жилая площадь
	"house_area_kitchen",		//площадь кухни
	"house_phone",					//телефон владельца
	"house_who_answer",			//имя владельца
	"house_agent",					//агент
	"house_exclusive",			//эксклюзив
	"house_prozvon"				//прозвон
);

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

		#house_prozvon,
		#house_phone,
		#house_who_answer {
			width:60%;
		}

		#check_phone {

			width: 30%;
			text-align: center;
			margin: 5px auto;
			display: block;
			border: 1px solid #32599A;
			padding: 3px;
			cursor: pointer;
		}
	</style>

	<section id="house_meta_wrapp">

	<p>
		<label for="house_exclusive">Эксклюзив:</label>
		Да &nbsp;<input type="radio" name="house_exclusive" value="house_exclusive_yes"
		<?php if ( $house_exclusive == 'house_exclusive_yes' ) { echo 'checked'; } ?> > 
		&nbsp;&nbsp;&nbsp;
		Нет &nbsp;<input type="radio" name="house_exclusive" value="house_exclusive_no"
		<?php if ( $house_exclusive !== 'house_exclusive_no' ) { echo 'checked'; } ?> >

	</p>

	<p>
		<label for="house_agent">Агент:</label>
		<?php 

			/**
			 * 	агенты
			 */
		
			$arents = get_users();

			if ( ! empty( $arents ) && ! is_wp_error( $arents ) ){
			
				echo '<select class="house_location" name="house_agent" >';

					foreach ( $arents as $arent ) {

						echo '<option value="' . $arent->id  . '"';

						if ( $arent->id  == $house_agent ) {
							echo ' selected="selected"'; 
						}
						echo '>' . $arent->display_name;
						echo '</option>';
					}

				echo '</select>';
				
			}
		?>

	</p>
		
	<p>
		<label for="house_adress">Улица:</label>
		<input type="text" id="house_adress" name="house_adress" value="<?= esc_attr( $house_adress ) ?>" style="width:50%;" />
	</p>

	<p>
		<label for="house_adress_number">Номер дома:</label>
		<input type="text" id="house_adress_number" name="house_adress_number" value="<?= esc_attr( $house_adress_number ) ?>" size="8" />
	</p>

	<p>
		<label for="house_adress_korpus">Корпус:</label>
		<input type="text" id="house_adress_korpus" name="house_adress_korpus" value="<?= esc_attr( $house_adress_korpus ) ?>" size="8" />
	</p>

	<p>
		<label for="house_adress_apartment">Номер квартиры:</label>
		<input type="text" id="house_adress_apartment" name="house_adress_apartment" value="<?= esc_attr( $house_adress_apartment ) ?>" size="8" />
	</p>


	<hr>

	<p>
		<label for="house_price">Цена в долларах:</label>
		<input onchange="" type="text" id="house_price" name="house_price" value="<?= esc_attr( $house_price ) ?>" size="8" />
	</p>
	<p>
		<label for="house_price_grivna">Цена в гривнах:</label>
		<input id="house_price_grivna" type="text" name="house_price_grivna" value="<?= esc_attr( $house_price_grivna ) ?>" size="8">

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

	<hr>
	<h2>Информация о владельце</h2>
	<p>
		<label for="house_phone">Телефон владельца:</label>
		<input type="text" id="house_phone" name="house_phone" value="<?= esc_attr( $house_phone ) ?>"  />

		<span id="check_phone" onclick="check_phone(this)">проверить на совпадения</span>
	</p>

	<p>
		<label for="house_who_answer">ФИО:</label>
		<input type="text" id="house_who_answer" name="house_who_answer" value="<?= esc_attr( $house_who_answer ) ?>"  />
	</p>

	<p>
		<label for="house_prozvon">Прозвон:</label>
		<input type="text" id="house_prozvon" name="house_prozvon" value="<?= esc_attr( $house_prozvon ) ?>" />
	</p>






	<script type="text/javascript">

		


		var USD_p24 = <?= $USD_p24 ?> 
		var house_price = document.getElementById('house_price');
		house_price.oninput = function() {
			document.getElementById('house_price_grivna').value  = (house_price.value * USD_p24).toFixed();
		};

		var house_price_grivna = document.getElementById('house_price_grivna');
		house_price_grivna.oninput = function() {
			document.getElementById('house_price').value  = (house_price_grivna.value / USD_p24).toFixed();
		};

		//var check_phone = document.getElementById('check_phone');

		<?php 

		echo 'var curr_post_id = ' . $post->ID . ';';

		function check_phone() {
			$sukabliad = array();
			global $post;


			$house = new WP_Query ( array('post_type' => 'house',
														'nopaging' => true,
														'tax_query' => array(
																				array(
																				'taxonomy' => 'house_status',
																				'field'    => 'slug',
																				'terms'    => 'active'
																			),
																		),
													) 
			);

			if ( $house->have_posts() ) : while ( $house->have_posts() ) : $house->the_post();  

				$house_phone_to_check = esc_attr(get_post_meta( $post->ID, '_house_phone', true ));

				$sukabliad[] = array('id' => $post->ID,
											'link' => wp_get_shortlink(),
											'phone' => $house_phone_to_check );

			endwhile; endif; 

		wp_reset_postdata();

		$sukabliad = json_encode($sukabliad); 

		echo 'var phones = ' . $sukabliad;
}


check_phone();

?>


	function check_phone(obj) {
			var phone_to_check = document.getElementById('house_phone').value;
			phone_to_check = phone_to_check.replace(/\s+/g, '');

			//phones = JSON.parse(phones);
			//console.log(phones[3].link);

			for (var i = 0; i <= phones.length; i++) {

				var phone = phones[i].phone;
				var phone_id = phones[i].id;

				phone = phone.replace(/\s+/g, '');

				if (phone === phone_to_check) {

					if (!(phone_id === curr_post_id)) {
						obj.innerHTML = 'обнаружены совпадения: ' + ' <a href="'+ phones[i].link +'">id: '+phone_id+'</a>';
					}
				} else {
					obj.innerHTML = 'совпадений нет';
				}
				
			}
	}




	</script>


	</section>






<?php

}