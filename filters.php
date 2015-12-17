<section class="house_filters_chose">

	<div <?php if ( !is_page_template( 'sale.php' ) ) echo 'class="active"'; ?> >
		<a href="/garant/">Аренда</a>
	</div>

	<div <?php if ( is_page_template( 'sale.php' ) ) echo 'class="active"'; ?> >
		<a href="/garant/?page_id=132">Продажа</a>
	</div>
</section>





<section class="house_filters">

	<form method="post" name="house_filters" action="">

		<?php	

		/**
		 * 	цена
		 */

		?>

		<label class="large_label">Цена ($):<br>
			<input name="price_from" type="text" placeholder="<?php if (isset($price_from)) echo $price_from; else echo 'От'; ?>" > 
			<input name="price_too" type="text" placeholder="<?php if (isset($price_too)) echo $price_too; else echo 'До'; ?>">
		</label>


		<?php 

		/**
		 * 	количество комнат
		 */

		?>

		<label class="large_label label_rooms">Комнат:<br>
			<input type="text" placeholder="От" name="rooms_from"> <input name="rooms_too" type="text" placeholder="До">
		</label>


		<?php 

		/**
		 * 	площадь
		 */

		?>

		<label class="large_label">Площадь (m<sup>2</sup>):<br>
			<input type="text" placeholder="От" name="area_from"> <input name="area_too" type="text" placeholder="До">
		</label>

		<?php 

		/**
		 * 	районы
		 */
		$house_location = get_terms( 'house_location' );
		if ( ! empty( $house_location ) && ! is_wp_error( $house_location ) ){
			echo '<label for="house_location">';
			echo 'Район:<br>';
			
			echo '<select class="house_location" name="" >';

				echo '<option value="all" >Все</option>';
				foreach ( $house_location as $term ) {
					echo '<option value="' . $term->slug . '" >' . $term->name . '</option>';
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
			echo 'Тип постройки:<br>';
			
			echo '<select class="house_categories" name="house_type">';

				echo '<option value="all" >Все</option>';
				foreach ( $house_categories as $term ) {
					echo '<option value="' . $term->slug . '"';

					if ( $term->slug == $house_type ) {
						echo ' selected="selected"'; 
					}
					echo '>';
					echo $term->name;
					echo '</option>';
				}

			echo '</select>';
			echo '</label>';
		}

		?>

		<input class="search_house" type="submit" value="Искать" name="house_filters_submit">

	</form>

</section>