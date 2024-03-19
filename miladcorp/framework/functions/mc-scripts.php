<?php 
/**
 * Enqueue scripts and styles.
 */
function miladcorp_scripts() {
	wp_enqueue_style( 'mc-remixicon-css',get_template_directory_uri() . '/assets/css/remixicon.css' );
	wp_enqueue_style( 'mc-animate-css',get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'mc-style-css',get_template_directory_uri() . '/assets/css/style.css' );

	wp_enqueue_style( 'mc-addon-css', get_template_directory_uri() . '/css/plugin.css' );
	wp_enqueue_script('jquery');
	wp_enqueue_script('wow-min-js', get_template_directory_uri() . '/assets/js/wow.min.js',array('jquery'),'1.3.0',true);
	wp_enqueue_script('slick-min-js', get_template_directory_uri() . '/assets/js/slick.min.js',array('jquery'),'1.9.0',true);
	wp_enqueue_script('jquery-rebox-js', get_template_directory_uri() . '/assets/js/jquery-rebox.js',array('jquery'),'1.9.0',true);
	wp_enqueue_script('theme-main-js', get_template_directory_uri() . '/assets/js/js.js',array('jquery'),'1.0.0',true);
	
}


add_action( 'wp_enqueue_scripts', 'miladcorp_scripts' );


add_action( 'admin_enqueue_scripts', 'wpt_add_admin_js' );


function wpt_add_admin_js() {
	wp_enqueue_script('admin_js_file', get_template_directory_uri() . '/js/plugin.js',array('jquery','jquery-ui-sortable'),'1.0.0',true);

	wp_localize_script( 'admin_js_file', 'learn_sort', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'learn_nonce' => wp_create_nonce( 'learn_nonce' )


	) );
}