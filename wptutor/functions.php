<?php
/**
 * wptutor functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wptutor
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

require_once get_template_directory() . '/framework/functions/setups.php';
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wptutor_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wptutor_content_width', 640 );
}
add_action( 'after_setup_theme', 'wptutor_content_width', 0 );



/**
 * Enqueue scripts and styles.
 */
require_once get_template_directory() . '/framework/functions/scripts.php';;

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


//redux framework 
require_once get_template_directory() . '/framework/plugins/redux-core/framework.php';
require_once get_template_directory() . '/framework/plugins/require_fields.php';

//require theme functions 
require_once get_template_directory() . '/framework/functions/theme-functions.php';

//nav walker 
require_once get_template_directory() . '/framework/functions/bootstrap-nav-walker.php';

//taxonomy 字段

require_once get_template_directory() . '/framework/plugins/tax-meta-class/Tax-meta-class.php';
require_once get_template_directory() . '/framework/plugins/tax-meta-config.php';


//pagenavi 
require_once get_template_directory() . '/framework/functions/pagenavi.php';


//custom avatar 
require_once get_template_directory() . '/framework/functions/wpt-avatar.php';

//include sidebar 
require_once get_template_directory() . '/framework/widgets.php';

//include breadcrumbs 
require_once get_template_directory() . '/framework/functions/breadcrumbs.php';

//include breadcrumbs 
