<?php

add_action( 'show_user_profile', 'yoursite_extra_user_profile_fields' );
add_action( 'edit_user_profile', 'yoursite_extra_user_profile_fields' );
function yoursite_extra_user_profile_fields( $user ) {
?>
  <h3><?php _e("Контактные данные", "blank"); ?></h3>
  <table class="form-table">
  <th><label for="phone"><?php _e("Телефоны"); ?></label></th>
    <tr>      
      <td>
        <input type="text" name="phone" id="phone" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'phone', $user->ID ) ); ?>" /><br />
        <span class="description"><?php _e("Основной телефон."); ?></span>
      </td>
    </tr>
    <tr>
      <td>
        <input type="text" name="second_phone" id="second_phone" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'second_phone', $user->ID ) ); ?>" /><br />
        <span class="description"><?php _e("Дополнительный телефон."); ?></span>
      </td>
    </tr>
    <tr>
      <td>
        <input type="text" name="third_phone" id="third_phone" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'third_phone', $user->ID ) ); ?>" /><br />
        <span class="description"><?php _e("Дополнительный телефон."); ?></span>
      </td>
    </tr>
  </table>


  <table class="form-table">
  <th><label for="profession"><?php _e("Профессия"); ?></label></th>
    <tr>      
      <td>
        <input type="text" name="profession" id="profession" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'profession', $user->ID ) ); ?>" /><br />
        <span class="description"><?php _e("Пожалуйста, укажите профессию"); ?></span>
      </td>
    </tr>
  </table>
<?php
}

add_action( 'personal_options_update', 'yoursite_save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'yoursite_save_extra_user_profile_fields' );
function yoursite_save_extra_user_profile_fields( $user_id ) {
  $saved = false;
  if ( current_user_can( 'edit_user', $user_id ) ) {
    update_user_meta( $user_id, 'phone', $_POST['phone'] );
    update_user_meta( $user_id, 'second_phone', $_POST['second_phone'] );
    update_user_meta( $user_id, 'third_phone', $_POST['third_phone'] );

    update_user_meta( $user_id, 'profession', $_POST['profession'] );

    $saved = true;
  }

  return true;
}