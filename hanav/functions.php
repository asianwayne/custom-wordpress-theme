<?php
/**
 * hanav functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hanav
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hanav_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hanav_content_width', 640 );
}
add_action( 'after_setup_theme', 'hanav_content_width', 0 );



/**
 * Main theme functions 
 */
require get_template_directory() . '/framework/functions/theme-functions.php';
require get_template_directory() . '/framework/functions/breadcrumb.php';
require get_template_directory() . '/framework/functions/pagenavi.php';
require get_template_directory() . '/framework/functions/postviews.php';

/**
 * Custom Post Types 
 */
require get_template_directory() . '/framework/plugins/nav_post_type.php';

/**
 * Scripts file
 */
require get_template_directory() . '/framework/functions/scripts.php';
require get_template_directory() . '/framework/functions/supports.php';

/**
 * Redux framework
 */
require get_template_directory() . '/framework/plugins/redux-core/framework.php';
require get_template_directory() . '/framework/plugins/redux-config.php';

//tgmpa
require get_template_directory() . '/framework/plugins/class-tgm-plugin-activation.php';
require get_template_directory() . '/framework/plugins/require-plugins.php';

//ocdi import demo 
require get_template_directory() . '/framework/plugins/require-demo.php';


//widgets 
require get_template_directory() . '/framework/widgets.php';

add_action('wp_enqueue_scripts', function(){
	wp_add_inline_script('jquery', 'var $ = jQuery.noConflict();');
});

