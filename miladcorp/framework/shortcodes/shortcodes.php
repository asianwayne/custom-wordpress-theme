<?php 



require_once get_template_directory() . '/framework/shortcodes/includes/mc-handle-form.php';
add_action( 'wp_enqueue_scripts', 'mc_enqueue_shortcode_scripts' );

function mc_enqueue_shortcode_scripts()
{
	wp_enqueue_script('mc-shortcode-js', get_template_directory_uri() . '/framework/shortcodes/js/handle-form.js');
	wp_localize_script( 'mc-shortcode-js', 'short_script', array(
		'ajax_url'  => admin_url('admin-ajax.php'),
		'nonce'  => wp_create_nonce( 'mc-form-handle' )


	) );
}


// shortcodes starts 

add_shortcode( 'contact_form', 'mc_shortcodes_cf' );

function mc_shortcodes_cf($atts,$content = null)
{

	ob_start();

	require_once 'templates/contact-form-template.php';

	return ob_get_clean(); 
	
}


