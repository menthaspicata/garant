<?php


$courses = file_get_contents('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=3');
$courses = json_decode($courses, true);

foreach ($courses as $course) {

	switch ($course['ccy']) {
		case 'EUR':
			$EUR_p24 = $course['buy'];
			continue;
		case 'RUR':
			$RUR_p24 = $course['buy'];
			continue;
		case 'USD':
			$USD_p24 = $course['buy'];
			continue;
	}
}
function updateNumbers() {
    global $wpdb;
    $querystr = "SELECT $wpdb->posts.* FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'post' ";
    $pageposts = $wpdb->get_results($querystr, OBJECT);
    $counts = 0 ;
    if ($pageposts):
    foreach ($pageposts as $post):
    setup_postdata($post);
    $counts++;
    add_post_meta($post->ID, 'incr_number', $counts, true);
    update_post_meta($post->ID, 'incr_number', $counts);
    endforeach;
    endif;
}
 
add_action ( 'publish_post', 'updateNumbers' );
add_action ( 'deleted_post', 'updateNumbers' );
add_action ( 'edit_post', 'updateNumbers' );

require 'functions/theme_settings.php';
require 'functions/add_scripts.php';

require 'functions/user_meta.php';

require 'functions/house.php';
require 'functions/house_meta_main.php';
require 'functions/house_meta_gallery.php';
