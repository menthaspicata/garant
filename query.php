<?php 

/**
 * 		формируем основной массив параметров для цикла
 * 		с разделением на страницы аренды и продажи
 */

if ( is_page_template( 'sale.php' ) ) {
	$args_deal_type = 'sale';
} elseif ( is_page_template( 'change.php' ) ) {
	$args_deal_type = 'trade';
} elseif ( is_page_template( 'rent.php' ) ) {
	$args_deal_type = 'rent';
}

$house_args = array(
						'post_type' => 'house',
						'tax_query' => array(
							'relation' => 'AND',
							array(
								'taxonomy' => 'house_deal_type',
								'field'    => 'slug',
								'terms'    => $args_deal_type,
							),
							array(
								'taxonomy' => 'house_status',
								'field'    => 'slug',
								'terms'    => 'active'
							),
						),

);


/**
 * 		проверяем что пришло из формы с фильтрами
 * 		и добавляем значения в массив параметров для запроса  
 */

if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['house_filters_submit']) ) {

	/**
	 * 		тип постройки
	 */
		
	if ( isset($_POST['house_type']) ) {
		$house_type = sanitize_text_field($_POST['house_type']);

		if ( !($house_type == 'all') ) {
			$house_args['tax_query'][] = array(
				'taxonomy' => 'house_categories',
				'field'    => 'slug',
				'terms'    => $house_type
			);
		}		
	}

	/**
	 * 		Категория объекта
	 */
		
	if ( isset($_POST['house_property_type']) ) {
		$house_property_type = sanitize_text_field($_POST['house_property_type']);

		if ( !($house_property_type == 'all') ) {
			$house_args['tax_query'][] = array(
				'taxonomy' => 'property_type',
				'field'    => 'slug',
				'terms'    => $house_property_type
			);
		}		
	}

	/**
	 * 		Направление
	 */
		
	if ( isset($_POST['direction']) ) {
		$direction = sanitize_text_field($_POST['direction']);

		if ( !($direction == 'all') ) {
			$house_args['tax_query'][] = array(
				'taxonomy' => 'house_direction',
				'field'    => 'slug',
				'terms'    => $direction
			);
		}		
	}

	/**
	 * 		Вид постройки
	 */
		
	if ( isset($_POST['build_type']) ) {
		$build_type = sanitize_text_field($_POST['build_type']);

		if ( !($build_type == 'all') ) {
			$house_args['tax_query'][] = array(
				'taxonomy' => 'house_build_type',
				'field'    => 'slug',
				'terms'    => $build_type
			);
		}		
	}

	/**
	 * 		Район
	 */
		
	if ( isset($_POST['house_location_filter']) ) {
		$house_location_filter = sanitize_text_field($_POST['house_location_filter']);

		if ( !($house_location_filter == 'all') ) {
			$house_args['tax_query'][] = array(
				'taxonomy' => 'house_location',
				'field'    => 'slug',
				'terms'    => $house_location_filter
			);
		}		
	}

	/**
	 * 		фильтр по цене
	 * 		если указаны 2 значения - берем между ними
	 * 		если указано только ОТ - берем дома с ценой больше или равно
	 * 		если ДО - с ценой меньше или равно
	 */

	if ( !empty($_POST['price_from']) && !empty($_POST['price_too']) ) {

		$price_from = sanitize_text_field($_POST['price_from']);
		$price_too = sanitize_text_field($_POST['price_too']);

		$house_args['meta_query'][] = array(
			'key' 		=> '_house_price',
			'value'    	=> array( $price_from, $price_too ),
			'type'		=> 'numeric',
			'compare'   => 'BETWEEN',
		);
	} 
	elseif ( !empty($_POST['price_from']) ) {
		$price_from = sanitize_text_field($_POST['price_from']);
		$house_args['meta_query'][] = array(
			'key' 		=> '_house_price',
			'value'    	=> $price_from,
			'type'		=> 'numeric',
			'compare'   => '>=',
		);
	} 
	elseif ( !empty($_POST['price_too']) ) {
		$price_too = sanitize_text_field($_POST['price_too']);
		$house_args['meta_query'][] = array(
			'key' 		=> '_house_price',
			'value'    	=> $price_too,
			'type'		=> 'numeric',
			'compare'   => '<=',
		);
	}



	//if ( count($house_args['meta_query']) >= 2 ) {
		//$house_args['meta_query'][] = 'meta_query' 	=> array( 'relation' => 'AND' );
	//}

}

//echo '<pre>';
//print_r($house_args);
//echo '</pre>';




$house = new WP_Query ( $house_args );


?>