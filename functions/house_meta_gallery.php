<?php

/**
 *  galery meta box
 */




function add_view_house_meta_galery( $post ) {

    $ids = get_post_meta( $post->ID, '_house_meta_galery', true );

    $ids = json_decode(base64_decode($ids[0]));
/*
    // Here we get the current images ids of the gallery
    $values = get_post_custom($post->ID);
    if(isset($values['_house_meta_galery'])) {
        // The json decode and base64 decode return an array of image ids
        $ids = json_decode(base64_decode($values['_house_meta_galery'][0]));
    }
    else {
        $ids = array();
    }

*/
    print_r($ids);
    wp_nonce_field('save_house_meta_galery', 'house_meta_galery_nonce'); // Security

    // Here we store the image ids which are used when saving the product
    $html = '<input id="house_gallery_ids" type="hidden" name="house_gallery_ids" value="'.$cs_ids. '" />';
    // A button which we will bind to later on in JavaScript
    $html .= '<input class="button button-primary button-large" id="manage_gallery" title="Manage gallery" type="button" value="Редактировать галерею" />';


    // Implode the array to a comma separated list
    $cs_ids = implode(",", $ids);   
    // We display the gallery
    $html  .= do_shortcode('[gallery ids="'.$cs_ids.'"]');
    
    echo $html;
}

/**
 *  save galery meta box
 */
function save_house_meta_galery($post_id) {

    // Check if nonce is valid
    if (!isset($_POST['house_meta_galery_nonce'])) {    return;   }

    if ( !wp_verify_nonce($_POST['house_meta_galery_nonce'], 'save_house_meta_galery') ) {  return; }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {  return; }

    // Check if user has right access level
    if (!current_user_can('edit_post')) {   return; }


    // Check if data is in post
    if (isset($_POST['house_gallery_ids'])) {
        // Encode so it can be stored an retrieved properly
        $encode = base64_encode(json_encode(explode(',',$_POST['house_gallery_ids'])));
        update_post_meta($post_id, '_house_meta_galery', $encode);
    }
}