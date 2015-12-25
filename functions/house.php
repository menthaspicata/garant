<?php


add_action( 'init', 'create_house' );
add_action( 'init', 'init_house_taxonomies' );
add_action( 'add_meta_boxes', 'add_house_meta' );
add_action( 'save_post', 'save_house_meta_main' );
add_action( 'save_post', 'save_house_meta_galery' );


function create_house() { 
    register_post_type( 'house',
        array(
            'labels' => array(
                'name'                  => 'Недвижимость',
                'singular_name'         => 'Недвижимость',
                'add_new'               => 'Добавить',
                'add_new_item'          => 'Добавить Недвижимость',
                'edit'                  => 'Редактировать',
                'edit_item'             => 'Редактировать Недвижимость',
                'new_item'              => 'Новая Недвижимость',
                'view'                  => 'Просмотр',
                'view_item'             => 'Посмотреть Недвижимость',
                'search_items'          => 'Искать Недвижимость',
                'not_found'             => 'Недвижимость не найдена',
                'not_found_in_trash'    => 'Нет Недвижимости!',
                'parent'                => 'parent'
            ),
            'public' => true,
            'menu_position' => 1,
            'supports' => array( 'title', 'thumbnail'),
            'taxonomies' => array('house_deal_type', 'house_categories', 'house_location', 'house_status', 'property_type', 'house_heating', 'house_direction', 'house_build_type'),
            //'menu_icon' => plugins_url( 'tat.png', __FILE__ ),
            'has_archive' => true
        )
    );
}

function add_house_meta() {
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
        'house_status',
        'house',
        array(
            'labels' => array(              
                'name'              => 'Статус',
                'singular_name'     => 'Статус',
                'search_items'      => 'Искать Статус',
                'all_items'         => 'Все Статусы',
                'edit_item'         => 'Редактировать Статус',
                'update_item'       => 'Обновить Статус',
                'add_new_item'      => 'Добавить новый Статус',
                'new_item_name'     => 'Новый Статус',
                'menu_name'         => 'Статус',
                'search_items' => 'Искать Статус',
                'not_found' => 'Статус не найден'
            ),
            'rewrite' => array( 'slug' => 'house_status' ),
            //'capabilities' => array(),
            'hierarchical' => true
        )
    );

    register_taxonomy(
        'house_direction',
        'house',
        array(
            'labels' => array(              
                'name'              => 'Направление',
                'singular_name'     => 'Направление',
                'search_items'      => 'Искать Направление',
                'all_items'         => 'Все Местоположения',
                'edit_item'         => 'Редактировать Направление',
                'update_item'       => 'Обновить Направление',
                'add_new_item'      => 'Добавить новое Направление',
                'new_item_name'     => 'Новое Направление',
                'menu_name'         => 'Направление',
                'search_items' => 'Искать Направление',
                'not_found' => 'Направление не найдено'
            ),
            'rewrite' => array( 'slug' => 'house_direction' ),
            //'capabilities' => array(),
            'hierarchical' => true
        )
    );

    register_taxonomy(
        'house_heating',
        'house',
        array(
            'labels' => array(              
                'name'              => 'Тип Отопления',
                'singular_name'     => 'Тип Отопления',
                'search_items'      => 'Искать Тип Отопления',
                'all_items'         => 'Все Типы Отопления',
                'edit_item'         => 'Редактировать Тип Отопления',
                'update_item'       => 'Обновить Тип Отопления',
                'add_new_item'      => 'Добавить новый Тип Отопления',
                'new_item_name'     => 'Новый Тип Отопления',
                'menu_name'         => 'Тип Отопления',
                'search_items' => 'Искать Тип Отопления',
                'not_found' => 'Тип Отопления не найден'
            ),
            'rewrite' => array( 'slug' => 'house_heating' ),
            //'capabilities' => array(),
            'hierarchical' => true
        )
    );

    register_taxonomy(
        'property_type',
        'house',
        array(
            'labels' => array(              
                'name'              => 'Категория объекта',
                'singular_name'     => 'Категория объекта',
                'search_items'      => 'Искать Категорию объекта',
                'all_items'         => 'Все Категории объекта',
                'edit_item'         => 'Редактировать Категорию объекта',
                'update_item'       => 'Обновить Категорию объекта',
                'add_new_item'      => 'Добавить новую Категорию объекта',
                'new_item_name'     => 'Новая Категория объекта',
                'menu_name'         => 'Категория объекта',
                'search_items' => 'Искать Категорию объекта',
                'not_found' => 'Категория объекта не найдена'
            ),
            'rewrite' => array( 'slug' => 'property_type' ),
            //'capabilities' => array(),
            'hierarchical' => true
        )
    );

    register_taxonomy(
        'house_build_type',
        'house',
        array(
            'labels' => array(              
                'name'              => 'Вид постройки',
                'singular_name'     => 'Вид постройки',
                'search_items'      => 'Искать Вид постройки',
                'all_items'         => 'Все Виды постройки',
                'edit_item'         => 'Редактировать Вид постройки',
                'update_item'       => 'Обновить Вид постройки',
                'add_new_item'      => 'Добавить новый Вид постройки',
                'new_item_name'     => 'Новый Вид постройки',
                'menu_name'         => 'Вид постройки',
                'search_items' => 'Искать Вид постройки',
                'not_found' => 'Вид постройки не найден'
            ),
            'rewrite' => array( 'slug' => 'house_build_type' ),
            //'capabilities' => array(),
            'hierarchical' => true
        )
    );

    register_taxonomy(
        'house_deal_type',
        'house',
        array(
            'labels' => array(              
                'name'              => 'Тип сделки',
                'singular_name'     => 'Тип сделки',
                'search_items'      => 'Искать Тип Сделки',
                'all_items'         => 'Все Типы Сделки',
                'edit_item'         => 'Редактировать Тип Сделки',
                'update_item'       => 'Обновить Тип Сделки',
                'add_new_item'      => 'Добавить новый Тип Сделки',
                'new_item_name'     => 'Новый Тип Сделки',
                'menu_name'         => 'Тип сделки',
                'search_items' => 'Искать Тип Сделки',
                'not_found' => 'Тип Сделки не найден'
            ),
            'rewrite' => array( 'slug' => 'house_deal_type' ),
            //'capabilities' => array(),
            'hierarchical' => true
        )
    );

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
                'name'              => 'Тип',
                'singular_name'     => 'Тип',
                'search_items'      => 'Искать Тип',
                'all_items'         => 'Все Типы',
                'edit_item'         => 'Редактировать Типы',
                'update_item'       => 'Обновить Типы',
                'add_new_item'      => 'Добавить новый Тип',
                'new_item_name'     => 'Новый Тип',
                'menu_name'         => 'Типы',
                'search_items' => 'Искать Типы',
                'not_found' => 'Типы не найдены'
            ),
            'rewrite' => array( 'slug' => 'house_categories' ),
            //'capabilities' => array(),
            'hierarchical' => true
        )
    );

    

    
}