<?php 

//main include function 
require_once get_template_directory() . '/framework/functions/scripts.php';
require_once get_template_directory() . '/framework/functions/setups.php';

//theme main functions 
require_once get_template_directory() . '/framework/functions/theme_functions.php';

//require fields 

require_once get_template_directory() . '/framework/plugins/redux-core/framework.php';

require_once get_template_directory() . '/framework/plugins/require_fields.php';

//custom post types 
require_once get_template_directory() . '/framework/functions/haapp_cpt.php';

//breadcrumbs 
require_once get_template_directory() . '/framework/functions/breadcrumbs.php';

//post views 
require_once get_template_directory() . '/framework/functions/post_views.php';

//tuijian function 
require_once get_template_directory() . '/framework/functions/tuijian.php';

//pagination function 
require_once get_template_directory() . '/framework/functions/pagination.php';

//widgets 
require_once get_template_directory() . '/framework/widgets.php';

//require demos 
require_once get_template_directory() . '/framework/plugins/require_demos.php';

// Allow upload of ZIP files
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
    // add the file extension to the array
    $existing_mimes['zip'] = 'application/zip';
  $existing_mimes['xml'] = 'application/xml';
    return $existing_mimes;
}


// Function to track and store download information
function track_download() {
  if (isset($_POST['file_url'])) {
    $file_url = $_POST['file_url'];
    $user_id = get_current_user_id(); // Get the ID of the current logged-in user
    $download_date = date('Y-m-d H:i:s'); // Get the current date and time
    
    // Get the existing download history or initialize it as an empty array
    $download_history = get_user_meta($user_id, 'download_history', true);
    if (empty($download_history)) {
      $download_history = array();
    }
    
    // Check if the file URL already exists in the history
    $existing_entry = array_filter($download_history, function($entry) use ($file_url) {
      return $entry['file_url'] === $file_url;
    });
    
    // Add the new download information to the history if it doesn't exist already
    if (empty($existing_entry)) {
      $download_history[] = array(
        'file_url' => $file_url,
        'download_date' => $download_date
      );
      
      // Update the user meta with the updated download history
      update_user_meta($user_id, 'download_history', $download_history);
    }
  }

  wp_send_json_success(); // Send a success response to the AJAX request
}
add_action('wp_ajax_track_download', 'track_download');
add_action('wp_ajax_nopriv_track_download', 'track_download');


function hide_admin_bar_based_on_role() {
    // Check if the user is logged in
    if (is_user_logged_in()) {
        // Get the current user's role
        $user = wp_get_current_user();
        $role = $user->roles[0];
        
        // Hide admin bar for subscribers
        if ($role === 'subscriber') {
            show_admin_bar(false);
        }
    } else {
        // Hide admin bar when not logged in
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'hide_admin_bar_based_on_role');



function redirect_subscribers_to_front_page( $redirect_to, $request, $user ) {
    if (isset($user->roles) && is_array($user->roles) && in_array('subscriber', $user->roles)) {
        return home_url();
    }
    return $redirect_to;
}
add_filter( 'login_redirect', 'redirect_subscribers_to_front_page', 10, 3 );