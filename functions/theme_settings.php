<?php


register_nav_menus( array(
	'header_menu' => 'Основное меню',
	'footer_menu' => 'Меню в футере',
) );

add_theme_support( 'post-thumbnails' ); 
set_post_thumbnail_size( 300, 300, true );

