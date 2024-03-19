<?php
/**
 * miladcorp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package miladcorp
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
function miladcorp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'miladcorp_content_width', 640 );
}
add_action( 'after_setup_theme', 'miladcorp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function miladcorp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'miladcorp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'miladcorp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'miladcorp_widgets_init' );


function ha_get_option($opt) {
	global $theme_fields;

	if (!empty($theme_fields[$opt])) {
		return $theme_fields[$opt]; 
		
	}

	return false;

}


function generate_verification_code($length = 6) {
    $characters = '0123456789';
    $verification_code = '';
    for ($i = 0; $i < $length; $i++) {
        $verification_code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $verification_code;
}



function generate_verification_image($verification_code) {
    $image = imagecreatetruecolor(200, 75);
    $bg_color = imagecolorallocate($image, 255, 255, 255);
    $text_color = imagecolorallocate($image, 0, 0, 0);
    imagefill($image, 0, 0, $bg_color);

    // Use a font that's available on your system
    $font_size = 30;
    
    $font_path = get_template_directory() . '/assets/fonts/Roboto-Regular.ttf';

    imagettftext($image, $font_size, 0, 10, 50, $text_color, $font_path, $verification_code);

    // Get the uploads directory information
    $upload_dir_info = wp_upload_dir();
    $image_path = $upload_dir_info['basedir'] . '/' . uniqid() . '.png'; // Adjust the path

    imagepng($image, $image_path);
    imagedestroy($image);

    $image_url = str_replace($upload_dir_info['basedir'], $upload_dir_info['baseurl'], $image_path);
    return $image_url; // Return the URL of the generated image
}

/**
 * Theme main functions 
 */
require_once get_template_directory() . '/framework/functions/theme-functions.php';
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

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


//load scripts 
require_once get_template_directory() . '/framework/functions/mc-scripts.php';
require_once get_template_directory() . '/framework/functions/mc-setups.php';

//require redux
require_once get_template_directory() . '/framework/plugins/redux-core/framework.php';
require_once get_template_directory() . '/framework/plugins/redux-config.php';

//menu walker 
require_once get_template_directory() . '/framework/functions/mc-menu-walker.php';

require_once get_template_directory() . '/framework/plugins/mc-posttypes.php';

//shortcodes 
require_once get_template_directory() . '/framework/shortcodes/shortcodes.php';

//breaducrumbs 
require_once get_template_directory() . '/framework/functions/breadcrumbs.php';

//pagenavi 
require_once get_template_directory() . '/framework/functions/pagenavi.php';

//post views 
require_once get_template_directory() . '/framework/functions/post-views.php';

//require demos 
require_once get_template_directory() . '/framework/functions/require-demos.php';

add_filter( 'xmlrpc_enabled', '__return_false' );

//TEST
//

// function custom_get_terms_orderby($args, $taxonomies) {
//     // Check if this is the taxonomy you want to modify
//     if (is_admin() && in_array('category', $taxonomies)) {

//     	$args['orderby'] = 'term_order';
//         // Modify the orderby parameter
//         var_dump($args['orderby']);
//     }

//     return $args;
// } 

// add_filter('get_terms_args', 'custom_get_terms_orderby', 10, 2);

function wp_update_term_order($term_id, $taxonomy, $new_order) {
    global $wpdb;

    // Get current term_group (if any)
    $current_group = $wpdb->get_var($wpdb->prepare("SELECT term_group FROM $wpdb->terms WHERE term_id = %d", $term_id));

    // Determine new term_group based on the new order
    $new_group = 0; // Default starting group
    foreach ($new_order as $index => $order) {
        if ($index !== 0 && $order === $term_id) { // Reached the current term
            $new_group++;
        }
    }

    // Update term_group for the target term
    $wpdb->update($wpdb->terms, array('term_group' => $new_group), array('term_id' => $term_id));
}

add_action( 'wp_ajax_learn_sort', 'wpt_learn_sort_cb' );

function wpt_learn_sort_cb() {

	global $wpdb;


    if (check_ajax_referer('learn_nonce', 'nonce')) {
        $new_order = (array) $_POST['new_order']; // Sanitize input

        foreach ($new_order as $term_id => $order) {
            wp_update_term_order($term_id, 'category', $new_order); // Update term_group
        }

        
        // Retrieve and sort categories based on updated term_group
        $categories = $wpdb->get_results($wpdb->prepare("SELECT t.*, tt.name AS taxonomy_name FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id WHERE tt.taxonomy = %s ORDER BY term_group ASC, name ASC", 'category'));

        // Apply reordering logic or display categories in the desired order using $categories

        wp_send_json_success();
    } else {
        
        wp_send_json_error('this is from the error nonce ');
    }
}


