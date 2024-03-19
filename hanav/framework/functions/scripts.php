<?php 
function hanav_scripts() {
	wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
	wp_enqueue_style('main-style-css', get_template_directory_uri() . '/assets/css/style.css');

	wp_enqueue_script('jquery');

	wp_enqueue_script('zblogphp', get_template_directory_uri() . '/assets/js/zblogphp.js',array('jquery'),'1.0.0',true);
	wp_enqueue_script('jquerycookie', get_template_directory_uri() . '/assets/js/jquery.cookie.min.js',array('jquery'),'1.0.0',true);
	wp_enqueue_script('thememain', get_template_directory_uri() . '/assets/js/main.js',array('jquery'),'1.0.0',true);
	wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper.js',array('jquery'),'1.0.0',true);
	wp_enqueue_script('pluginjs', get_template_directory_uri() . '/js/plugin.js',array('jquery'),'1.0.0',true);
}
add_action( 'wp_enqueue_scripts', 'hanav_scripts' );