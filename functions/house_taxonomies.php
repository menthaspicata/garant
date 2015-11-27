<?php


function init_house_taxonomies() {

	register_taxonomy(
		'house_location',
		'house',
		array(
			'labels' => array(				
				'name'              => 'Район',
				'singular_name'     => 'Район',
				'search_items'      => 'Искать Районы',
				'all_items'         => 'Все Районы',
				'edit_item'         => 'Редактировать Районы',
				'update_item'       => 'Обновить Районы',
				'add_new_item'      => 'Добавить новый Район',
				'new_item_name'     => 'Новый Районы',
				'menu_name'         => 'Районы',
				'search_items' => 'Искать Районы',
				'not_found' => 'Районы не найдены'
			),
			'rewrite' => array( 'slug' => 'homes_region' ),
			//'capabilities' => array(),
			'hierarchical' => true
		)
	);

	register_taxonomy(
		'house_categories',
		'house',
		array(
			'labels' => array(				
				'name'              => 'Категория',
				'singular_name'     => 'Категория',
				'search_items'      => 'Искать Категории',
				'all_items'         => 'Все Категории',
				'edit_item'         => 'Редактировать Категории',
				'update_item'       => 'Обновить Категории',
				'add_new_item'      => 'Добавить новую Категорию',
				'new_item_name'     => 'Новая Категория',
				'menu_name'         => 'Категории',
				'search_items' => 'Искать Категории',
				'not_found' => 'Категории не найдены'
			),
			'rewrite' => array( 'slug' => 'house_categories' ),
			//'capabilities' => array(),
			'hierarchical' => true
		)
	);

	register_taxonomy(
		'house_deal_type',
		'house',
		array(
			'labels' => array(				
				'name'              => 'Тип Сделки',
				'singular_name'     => 'Тип Сделки',
				'search_items'      => 'Искать Тип Сделки',
				'all_items'         => 'Все Типы Сделки',
				'edit_item'         => 'Редактировать Тип Сделки',
				'update_item'       => 'Обновить Тип Сделки',
				'add_new_item'      => 'Добавить новый Тип Сделки',
				'new_item_name'     => 'Новый Тип Сделки',
				'menu_name'         => 'Типы Сделки',
				'search_items' => 'Искать Тип Сделки',
				'not_found' => 'Тип Сделки не найден'
			),
			'rewrite' => array( 'slug' => 'house_deal_type' ),
			//'capabilities' => array(),
			'hierarchical' => true
		)
	);
}

add_action( 'init', 'init_house_taxonomies' );