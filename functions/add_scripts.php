<?php

add_action( 'wp_enqueue_scripts', 'add_scripts' );

function add_scripts() {
   
   $protocol = isset( $_SERVER["HTTPS"] ) ? 'https://' : 'http://';

   $params = array(
      'ajaxurl' => admin_url('admin-ajax.php', '$protocol'),
      'theme_path' => get_template_directory_uri()
   );

   wp_localize_script( 'cookbook', $params );

	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-1.11.3.min.js', '1.0' );
	wp_register_script( 'wookmark', get_template_directory_uri() . '/js/wookmark.min.js', array( 'jquery' ), '1.0' );
	wp_register_script( 'app', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), '1.0' );

	
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'wookmark' );
	wp_enqueue_script( 'app' );
} 


add_action( 'admin_enqueue_scripts', 'add_media_uploader' );

/**
 * Loads the image management javascript
 */
function add_media_uploader() {
    global $typenow;
    if( $typenow == 'house') {
        wp_enqueue_media();
 
        // Registers and enqueues the required javascript.
        wp_register_script( 'meta-box-image', get_template_directory_uri() . '/js/house_galery.js', array( 'jquery' ), '1.0' );
        wp_enqueue_script( 'meta-box-image' );
    }
}