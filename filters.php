<section class="house_filters_chose">
	<div>
		<a href="">Аренда</a>
	</div>

	<div>
		<a href="">Продажа</a>
	</div>
</section>
	


<section class="house_filters">

<form method="post">
		

	



<?php 

	/**
	 * 	районы
	 */
	$house_location = get_terms( 'house_location' );
	if ( ! empty( $house_location ) && ! is_wp_error( $house_location ) ){
		echo '<label for="house_location">';
		echo 'Район<br>';
		
		echo '<select class="house_location"  >';
		foreach ( $house_location as $term ) {
			echo '<option value="' . '" >' . $term->name . '</option>';
		}
		echo '</select>';
		echo '</label>';
	}

	/**
	 *		типы постройки
	 */
	$house_categories = get_terms( 'house_categories' );
	if ( ! empty( $house_categories ) && ! is_wp_error( $house_categories ) ){
		echo '<label for="house_categories">';
		echo 'Тип постройки<br>';
		
		echo '<select class="house_categories">';
		foreach ( $house_categories as $term ) {
			echo '<option>' . $term->name . '</option>';
		}
		echo '</select>';
		echo '</label>';
	}

	/**
	 * 	комнаты
	 */
	
	?>

	<label class="large_label">Цена<br>
		От: <input type="text"> До: <input type="text">
	</label>
		



		<label class="large_label">Количество комнат<br>
			От: <input type="text"> До: <input type="text">
		</label>

		<label class="large_label">Площадь<br>
			От: <input type="text"> До: <input type="text">
		</label>


	

	

</form>

</section>