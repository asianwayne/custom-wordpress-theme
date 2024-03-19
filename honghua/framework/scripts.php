<?php
/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'honghua_scripts' );
function honghua_scripts() {

	wp_enqueue_style('resetcss', get_template_directory_uri() . '/assets/css/reset.css');
	if (is_single() || is_category() || is_page()) {
		# code...
	wp_enqueue_style('stylestyle', get_template_directory_uri() . '/assets/css/style.css');
	}

	wp_enqueue_style('mainstyle', get_template_directory_uri() . '/assets/css/index.css');
	wp_enqueue_style('proshow', get_template_directory_uri() . '/assets/css/proshow.css');
	if (is_post_type_archive('chanpin') || is_category() || is_tax()) {
		# code...
	wp_enqueue_style('list-news', get_template_directory_uri() . '/assets/css/list-news.css');

	}
	wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/swiper.min.css');
	wp_enqueue_style('addoncss', get_template_directory_uri() . '/css/plugin.css');

	wp_enqueue_script('jquery');
	wp_enqueue_script('flex-slider', get_template_directory_uri() . '/assets/js/jquery.flexslider-min.js',array('jquery'),_S_VERSION,true);
	wp_enqueue_script('jquery-m', get_template_directory_uri() . '/assets/js/jquery_m.js',array('jquery'),_S_VERSION,true);
	wp_enqueue_script('super-slider', get_template_directory_uri() . '/assets/js/superslide.2.1.js',array('jquery'),_S_VERSION,true);
	wp_enqueue_script('swiperminjs', get_template_directory_uri() . '/assets/js/swiper.min.js',array('jquery'),_S_VERSION,true);
	wp_enqueue_script('super-slider-2.11', get_template_directory_uri() . '/assets/js/superslide.2.1.1.js',array('jquery'),_S_VERSION,true);
	wp_enqueue_script('tabjs', get_template_directory_uri() . '/assets/js/tab.js',array('jquery'),_S_VERSION,true);
	wp_enqueue_script('iscroll', get_template_directory_uri() . '/assets/js/iscroll.js',array('jquery'),_S_VERSION,true);
	wp_enqueue_script('indexstyle', get_template_directory_uri() . '/assets/js/index-style.js',array('jquery'),_S_VERSION,true);
	wp_enqueue_script('stylestyle', get_template_directory_uri() . '/assets/js/style.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('addonjs', get_template_directory_uri() . '/js/plugin.js',array('jquery'),_S_VERSION,true);

}

