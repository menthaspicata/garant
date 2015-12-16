<section class="house_filters_chose">
	<div class="active">
		<a href="/garant/">Аренда</a>
	</div>

	<div>
		<a href="/garant/?page_id=132">Продажа</a>
	</div>
</section>
	


<section class="house_filters">

<form method="post" action="/search/">
		

	



<?php 

	

	/**
	 * 	комнаты
	 */
	
	?>

	<label class="large_label">Цена ($):<br>
		<input type="text" placeholder="От"> <input type="text" placeholder="До">
	</label>

	<label class="large_label label_rooms">Комнат:<br>
		<input type="text" placeholder="От" > <input type="text" placeholder="До">
	</label>

	<label class="large_label">Площадь (m<sup>2</sup>):<br>
		<input type="text" placeholder="От"> <input type="text" placeholder="До">
	</label>

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

?>

	<input class="search_house" type="submit" value="Искать">


	

	

</form>

</section>