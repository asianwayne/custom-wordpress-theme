<?php 

/**
 * Enqueue scripts and styles.
 */
function guowen_scripts() {

  wp_enqueue_style('thememainstyle',get_template_directory_uri() . '/assets/css/style.css');
  wp_enqueue_style('addonstyle',get_template_directory_uri() . '/css/plugin.css');

  if (is_404()) {
    # code...
    wp_enqueue_style('404-main', get_template_directory_uri() . '/css/404-main.css');
  }

  wp_enqueue_script('addonjs', get_template_directory_uri() . '/js/plugin.js',array('jquery'),_S_VERSION,false);
  wp_enqueue_script('thememainjs', get_template_directory_uri() . '/assets/js/custom.js',array('jquery'),_S_VERSION,true);
  wp_enqueue_script('sidejs', get_template_directory_uri() . '/assets/js/side.js',array('jquery'),_S_VERSION,true);
  wp_enqueue_script('hc-stickys', get_template_directory_uri() . '/assets/js/hc-sticky.js',array('jquery'),_S_VERSION,true);

  
}
add_action( 'wp_enqueue_scripts', 'guowen_scripts' );