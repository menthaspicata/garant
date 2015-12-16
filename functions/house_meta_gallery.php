<?php

/**
 *  galery meta box
 */

function add_view_house_meta_galery( $post ) {

	wp_nonce_field( 'save_house_meta_galery', 'house_meta_galery_nonce' );

	$field_value = get_post_meta( $post->ID, 'housegallery', false );

	?>

	<p>Внимание внимание! Не добавляйте в редактор ничего кроме изображений. Сами изображения следует добавлять так:<br>
		<ol>
			<li>Нажмите кнопку добавить медиафайл</li>
			<li>В меню слева выберите создать галерею</li>
			<li>Загрузите и выберите все нужные для данного объекта файлы и нажмите создать галерею</li>
			<li>Нажмите вставить галерею</li>		
		</ol>
	</p>
	<hr>

	<?php

	wp_editor( $field_value[0], 'housegalleryid' );
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
	if (isset($_POST['housegalleryid'])) {


		update_post_meta($post_id, 
								'housegallery', 
								 $_POST[ 'housegalleryid' ]
								);
	}
}