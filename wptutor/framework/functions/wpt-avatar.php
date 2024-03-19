<?php 
//首先在后台user那里新增可以上传的框框 




function custom_user_profile_fields_display($user) {
    ?>
    <h3>头像专区</h3>
    <table class="form-table">
        <tr>
            <th><label for="user_custom_avatar">上传头像</label></th>
            <td>
                <input type="text" name="user_custom_avatar" id="user_custom_avatar" value="<?php echo get_user_meta( $user->ID, 'user_custom_avatar',true ); ?>" class="regular-text" /><br />
                <p><button class="button" id="user_custom_avatar_upload">上传</button></p>
                
            </td>
        </tr>
        <tr>
          <th>
            <label for="">头像预览</label>
          </th>
          <td>
            <img id="user_custom_avatar_img" class="avatar avatar-96 photo" loading="lazy" height="96px" width="96px" src="<?php echo get_user_meta( $user->ID, 'user_custom_avatar',true ); ?>" alt="">
          </td>
        </tr>
    </table>
    <?php
}
add_action('show_user_profile', 'custom_user_profile_fields_display');
add_action('edit_user_profile', 'custom_user_profile_fields_display');

function custom_user_profile_fields_save($user_id) {
    if (current_user_can('edit_user', $user_id)) {
        update_user_meta($user_id, 'user_custom_avatar', esc_url_raw( $_POST['user_custom_avatar']));
    }
}
add_action('personal_options_update', 'custom_user_profile_fields_save');
add_action('edit_user_profile_update', 'custom_user_profile_fields_save');


add_action( 'admin_enqueue_scripts', 'tr_add_user_avatar_js' );

function tr_add_user_avatar_js($hook) {
  if ($hook === 'profile.php') {
    wp_enqueue_media(  );
    wp_enqueue_script('profilejs', get_template_directory_uri() . '/js/profile.js',array('jquery'),'1.0.0.1',true);
    
  }
}


function hide_profile_picture_field() {
    ?>
    <style type="text/css">
        .user-profile-picture { display: none; }
    </style>
    <?php
}
//add_action('admin_head', 'hide_profile_picture_field');



add_filter( 'pre_get_avatar', 'ha_pre_get_avatar',10,2 );

function ha_pre_get_avatar($avatar,$id_or_email) {
  //check email or id 
   $user = false;

    if ( is_numeric( $id_or_email ) ) {
        $user_id   = (int) $id_or_email;
        $user = get_user_by( 'id', $user_id );
    } elseif ( is_object( $id_or_email ) ) {
        if ( ! empty( $id_or_email->user_id ) ) {
            $user_id   = (int) $id_or_email->user_id;
            $user = get_user_by( 'id', $user_id );
        }
    } else {
        $user = get_user_by( 'email', $id_or_email );
        $user_id = $user->ID;
    }

    if (!empty($user_id)) {
       if (!empty(get_user_meta($user_id,'user_custom_avatar',true))) {
    $profile_image = get_user_meta($user_id,'user_custom_avatar',true);
     $avatar = "<img src='$profile_image' class='avatar avatar-96 photo' height='96' width='96' alt='profile image'>";
    
  }
  
    }

  //check the user meta 

  return $avatar;
}


add_action( 'show_user_profile', 'wpt_add_user_social' );
add_action( 'edit_user_profile', 'wpt_add_user_social' );

function wpt_add_user_social($user) { 
    $social_media_fields = get_user_meta( $user->ID,'social_media_fields',true );

  ?>
    <h2>User Soicla Account</h2>
    <table class="form-table">

       <?php 
       $social_platform = array('facebook','instagram','twitter','youtube','pintrest');
       foreach ($social_platform as $platform) { ?>
        <tr>
            <th><label for="<?php echo $platform; ?>"><?php echo ucfirst($platform) ?></label></th>
            <td>
                <?php $field_value = isset($social_media_fields[$platform]) ? esc_attr( $social_media_fields[$platform] ) : ''; ?>
                <input type="text" name="social_media_fields[<?php echo $platform ?>]" id="<?php echo $platform; ?>" value="<?php echo $field_value; ?>" class="regular-text">
            </td>
        </tr>


        <?php 
           
       }



        ?>
    </table>


    <?php 


}

//save social media fields data 
function wpt_save_social_accounts($user_id) {
    if (!current_user_can( 'edit_user',$user_id )) {
        return false;
        
    }

    if (isset($_POST['social_media_fields'])) {

        $input_data = $_POST['social_media_fields']; 

        //$sanitize_data = array_map('esc_url', $input_data);
        $sanitize_data = array_map('esc_attr', $input_data);

        update_user_meta( $user_id, 'social_media_fields', $sanitize_data );
        
    }


}

add_action( 'personal_options_update', 'wpt_save_social_accounts' );
add_action( 'edit_user_profile_update', 'wpt_save_social_accounts' );