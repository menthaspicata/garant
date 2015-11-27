<?php

add_action( 'wp_enqueue_scripts', 'add_scripts' );

function add_scripts() {

   wp_enqueue_script('angular', 
					      get_template_directory_uri() . '/bower_components/angular/angular.js', 
					      false,
					      '1.0',
					      false );
   wp_enqueue_script('angular-animate', 
					      get_template_directory_uri() . '/bower_components/angular-animate/angular-animate.js', 
					      array( 'angular' ),
					      '1.0',
					      false );
   wp_enqueue_script('angular-route', 
					      get_template_directory_uri() . '/bower_components/angular-route/angular-route.js', 
					      array( 'angular' ),
					      '1.0',
					      false );
   wp_enqueue_script('angular-resource', 
					      get_template_directory_uri() . '/bower_components/angular-resource/angular-resource.js', 
					      array( 'angular' ),
					      '1.0',
					      false );
   wp_enqueue_script('app', 
					      get_template_directory_uri() . '/js/app.js', 
					      array( 'angular' ),
					      '1.0',
					      false );
   wp_enqueue_script('controller', 
					      get_template_directory_uri() . '/js/controller.js', 
					      array( 'angular' ),
					      '1.0',
					      false );
   wp_enqueue_script('services', 
					      get_template_directory_uri() . '/js/services.js', 
					      array( 'angular' ),
					      '1.0',
					      false );
   wp_enqueue_script('filters', 
					      get_template_directory_uri() . '/js/filters.js', 
					      array( 'angular' ),
					      '1.0',
					      false );
   
   $protocol = isset( $_SERVER["HTTPS"] ) ? 'https://' : 'http://';

   $params = array(
      'ajaxurl' => admin_url('admin-ajax.php', '$protocol'),
      'theme_path' => get_template_directory_uri()
   );

   wp_localize_script( 'angular', 'cookbook', $params );
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