<?php


add_action( 'init', 'create_house' );
add_action( 'init', 'init_house_taxonomies' );
add_action( 'add_meta_boxes', 'add_house_meta_main' );
add_action( 'save_post', 'save_house_meta_main' );
add_action('save_post', 'save_product_metaboxes');


function create_house() { 
    register_post_type( 'house',
        array(
            'labels' => array(
                'name' => 'Жилье',
                'singular_name' => 'Жилье',
                'add_new' => 'Добавить',
                'add_new_item' => 'Добавить жилье',
                'edit' => 'Редактировать',
                'edit_item' => 'Редактировать жилье',
                'new_item' => 'Новое жилье',
                'view' => 'Просмотр',
                'view_item' => 'Посмотреть жилье',
                'search_items' => 'Искать жилье',
                'not_found' => 'Жилье не найдено',
                'not_found_in_trash' => 'Нет жилья!',
                'parent' => 'parent'
            ),
            'public' => true,
            'menu_position' => 1,
            'supports' => array( 'title', 'thumbnail'),
            'taxonomies' => array('house_deal_type', 'house_categories', 'house_location'),
            //'menu_icon' => plugins_url( 'tat.png', __FILE__ ),
            'has_archive' => true
        )
    );
}




function add_house_meta_main() {
    /**
     *  Основная информация
     */
    add_meta_box(
        'house_meta_main',
        __( 'Основная информация' ),
        'add_view_house_meta_main',
        'house',
        'normal',
        'high'
    );

    /**
     *  галерея
     */
    add_meta_box(
        'house_meta_galery',          // Name of the box
        __('Gallery'),              // Title of the box
        'add_view_house_meta_galery',  // The metabox html function 
        'house',                  // SET TO THE POST TYPE WHERE THE METABOX IS SHOWN
        'normal',                   // Specifies where the box is shown
        'high'                      // Specifies where the box is shown
    );
}




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

