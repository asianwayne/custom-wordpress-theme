<?php 
function wptutor_scripts() {
  
  wp_enqueue_style( 'bootstrap-min', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
  wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css' );
  wp_enqueue_style( 'line-awesome-min', get_template_directory_uri() . '/assets/css/line-awesome.min.css' );
  wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.css' );
  wp_enqueue_style('prismcss', get_template_directory_uri() . '/framework/vendor/prism.css');
  wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/style.css' );
  wp_enqueue_style( 'wpt-custom-css', get_template_directory_uri() . '/assets/css/custom.css' );


  wp_enqueue_script('popper-min', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '1.0.0.1', true);
  wp_enqueue_script('bootstrap-min-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.3.1', true);
  wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array('jquery'), '1.0.1', true);
  wp_enqueue_script('ajax-contact', get_template_directory_uri() . '/assets/js/ajax-contact.js', array('jquery'), '1.0.1', true);
  wp_enqueue_script('owl-carousel-min', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '2.3.4', true);
  wp_enqueue_script('switch-js', get_template_directory_uri() . '/assets/js/switch.js', array('jquery'), '1.0.0.1', true);
  wp_enqueue_script('jquery-marquee', get_template_directory_uri() . '/assets/js/jquery.marquee.js', array('jquery'), '1.0.0.1', true);
  wp_enqueue_script('prismjs', get_template_directory_uri() . '/framework/vendor/prism.js', array('jquery'), '1.29.0', true);
  wp_enqueue_script('wpt-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0.1', true);
}
add_action( 'wp_enqueue_scripts', 'wptutor_scripts' );


