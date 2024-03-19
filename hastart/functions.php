<?php
/**
 * hastart functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hastart
 */


//Redirect all HTTP traffic to HTTPS


if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

define('THEME_NAME', 'hastart');

/**
 * Include files
 */

require_once get_template_directory() . '/framework/functions/theme-functions.php';
require_once get_template_directory() . '/framework/functions/setups.php';
require_once get_template_directory() . '/framework/functions/scripts.php';
require_once get_template_directory() . '/framework/functions/breadcrumbs.php';
require_once get_template_directory() . '/framework/functions/nav-walker.php';
require_once get_template_directory() . '/framework/functions/pagenavi.php';
require_once get_template_directory() . '/framework/functions/post-views.php';

//include redux 
require_once get_template_directory() . '/framework/plugins/redux-core/framework.php';
require_once get_template_directory() . '/framework/plugins/require-fields.php';
//include one click demo import
require_once get_template_directory() . '/framework/plugins/require-demos.php';
//include tgmpa
require_once get_template_directory() . '/framework/plugins/require-plugins.php';
//include custom post types 
require_once get_template_directory() . '/framework/plugins/ha-post-types.php';

//include widgets and shortcodes
require_once get_template_directory() . '/framework/widgets.php';
require_once get_template_directory() . '/framework/shortcodes.php';



require_once get_template_directory() . '/framework/functions/visitor-ip.php';
require_once get_template_directory() . '/framework/functions/encrypt_url.php';
require_once get_template_directory() . '/framework/functions/block_ip.php';

function redirect_author_page_to_home() {
  if (is_author()) {
    wp_redirect(home_url());
    exit;
  }
}
add_action('template_redirect', 'redirect_author_page_to_home');




add_action( 'ads_befores_title', 'ads_befores_title_cb' );

function ads_befores_title_cb() { ?>

  <a href="<?php echo ha_get_option('image_link_above_single') ?>" title="<?php echo ha_get_option('image_above_single_alt') ?>">
  <img style="margin-top:1.5rem" class="responsive" src="<?php echo ha_get_option('single_above')['url'] ?>" alt="<?php echo ha_get_option('image_above_single_alt') ?>">
  </a>
  <?php 
  
}






