<?php /* Template Name: sale */ ?>

<?php get_header(); ?>



<section class="house_filters_chose">
	<div>
		<a href="/garant/">Аренда</a>
	</div>

	<div class="active">
		<a href="/garant/?page_id=132">Продажа</a>
	</div>
</section>
	


<section class="house_filters">

<form method="post" action="/search/">
		

	



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

	<label class="large_label">Цена
		<input type="text" placeholder="От"> <input type="text" placeholder="До">
	</label>
		



		<label class="large_label">Количество комнат
			<input type="text" placeholder="От" > <input type="text" placeholder="До">
		</label>

		<label class="large_label">Площадь
			<input type="text" placeholder="От"> <input type="text" placeholder="До">
		</label>


	

	

</form>

</section>



<section class="houses">
<ul class="content">

<?php 

	$sale_args = array(
						'post_type' => 'house',
						'tax_query' => array(
							'relation' => 'AND',
							array(
								'taxonomy' => 'house_deal_type',
								'field'    => 'slug',
								'terms'    => 'sale',
							),
							array(
								'taxonomy' => 'house_status',
								'field'    => 'slug',
								'terms'    => 'action'
							),
						),
	);

	$house = new WP_Query ( $sale_args );	

	if ( $house->have_posts() ) : while ( $house->have_posts() ) : $house->the_post(); 

		$house_price_front = esc_attr(get_post_meta( $post->ID, '_house_price', true ));
		$house_price_UAH_front = number_format($house_price_front * $USD_p24, 0, ',', ' ');
		$house_price_front = number_format($house_price_front, 0, ',', ' ');
		$house_floor_front = esc_attr(get_post_meta( $post->ID, '_house_floor', true ));
		$house_rooms_front = esc_attr(get_post_meta( $post->ID, '_house_rooms', true ));
		$house_area_total_front = esc_attr(get_post_meta( $post->ID, '_house_area_total', true ));
		$house_area_live_front = esc_attr(get_post_meta( $post->ID, '_house_area_live', true ));
		$house_area_kitchen_front = esc_attr(get_post_meta( $post->ID, '_house_area_kitchen', true ));
		$house_gallery_front = get_post_meta( $post->ID, 'housegallery', false );
		$house_location_front = wp_get_post_terms( $post->ID, 'house_location' );

	?>
	
		<li class="house-thumb" >
			
				<div class="thumb">
					<?php the_post_thumbnail( array(280, 280) ); ?> 
				</div>

				<h1><?= the_title(); ?></h1>

				<div class="house-meta">
					<h4><?= $house_price_front; ?> $ / <?= $house_price_UAH_front; ?> грн</h4>

					<h4><?= $house_floor_front ?> й этаж</h4>
					<h4>Кол-во комнат: <?= $house_rooms_front ?></h4>
					<h4>Площадь: <?= $house_area_total_front .' / '. $house_area_live_front .' / '. $house_area_kitchen_front ?></h4>

					<h4>Район: <?= $house_location_front[0]->name ?></h4>

					<a href="<?= wp_get_shortlink(); ?>">подробнее</a>

				</div>
		</li>		

		
	<?php endwhile; endif;?>

</ul>
</section>


<?php get_footer(); ?>