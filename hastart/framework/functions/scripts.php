<?php 
/**
 * Enqueue scripts and styles.
 */
function hastart_scripts() {
  wp_enqueue_style('fontawesomemin', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
  wp_enqueue_style('stylemain', get_template_directory_uri() . '/assets/css/style.css');
  wp_enqueue_style('plugincss', get_template_directory_uri() . '/css/plugin.css');


  wp_enqueue_media();
  wp_enqueue_script('jquery');
  wp_enqueue_script('jquery-ui-sortable');

  if (is_author()) {
    wp_enqueue_style( 'bootstrap3', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    wp_enqueue_script('bootstrap3js',get_template_directory_uri() . '/assets/js/bootstrap.min.js',array('jquery'),'3.3',true );
    
  }
  

  wp_enqueue_script('sweetalert', get_template_directory_uri() . '/js/sweetalert.min.js', array('jquery'), '1.0.1', true);
  wp_enqueue_script('customjs', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0.1', true);
  wp_localize_script('customjs', 'hastart', array(
    'root_url'  => site_url(  ),
    'ajax_url'  => admin_url('admin-ajax.php'),
    'nonce_1' => wp_create_nonce('wp_rest'),
    'nonce_2'  => wp_create_nonce('user_valid'),
    'user_id'  => get_current_user_id(),
    'loggedIn'  => is_user_logged_in()
  )
  );
  wp_enqueue_script('ajaxjs', get_template_directory_uri() . '/js/ajax.js', array('jquery'), '1.0.1', true);
  wp_enqueue_script('hanavjs', get_template_directory_uri() . '/assets/js/nav.js', array('jquery'), '1.0.1', true);
  wp_enqueue_script('addonjs', get_template_directory_uri() . '/js/plugin.js', false, '1.0.1', true);
 wp_localize_script( 'addonjs', 'wproot', array(
    'root' => esc_url_raw( rest_url() ),
    'nonce' => wp_create_nonce( 'wp_rest' )
) );

}
add_action( 'wp_enqueue_scripts', 'hastart_scripts' );

//add_action('admin_enqueue_scripts','ha_add_addon_admin_js' );

function ha_add_addon_admin_js() {
  if ($hook != 'widgets.php') {
    return;
  }
  wp_enqueue_script('widgetsjs',get_template_directory_uri() . '/framework/widgets/widgets.js',array('jquery'),'1.0.0.1',true);
}