<?php 
add_action( 'wp_enqueue_scripts', 'as_scripts_enqueue' );

function as_scripts_enqueue() {
  wp_enqueue_style( 'maincss', get_template_directory_uri() . '/assets/css/style.css' );
  wp_enqueue_style( 'thememincss', get_template_directory_uri() . '/assets/css/style.min.css' );
  wp_enqueue_style( 'plugincss', get_template_directory_uri() . '/css/plugin.css' );

  wp_enqueue_script('slickminjs', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.0.0.1', true);
  wp_enqueue_script('globaljs', get_template_directory_uri() . '/assets/js/global.js', array('jquery'), '1.0.0.1', true);
  wp_enqueue_script('pluginjs', get_template_directory_uri() . '/js/plugin.js', array('jquery'), '1.0.0.1', true);
   // Pass the AJAX endpoint URL to the JavaScript file
  wp_localize_script('pluginjs', 'downloadTrackingAjax', array(
    'ajaxUrl' => admin_url('admin-ajax.php')
  ));
}