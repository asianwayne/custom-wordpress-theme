<?php
/**
 * Theme main functions 
 */

 
add_image_size('slider',1920, 500, true);
add_image_size('cp_thumb',372, 279, true);
add_image_size('cp_single_thumb',564,463, true);

/**
 *  Load different template for sub category
 */
function hh_sub_category_template() { 
    
    // Get the category id from global query variables
    $cat = get_query_var('cat');

    if(!empty($cat)) {    
        
        // Get the detailed category object
        $category = get_category($cat);

        // Check if it is sub-category and having a parent, also check if the template file exists
        if( ($category->parent != '0') && (file_exists(TEMPLATEPATH . '/sub-category.php')) ) { 
            
            // Include the template for sub-catgeory
            include(TEMPLATEPATH . '/sub-category.php');
            exit;
        }
        return;
    }
    return;

}
//这个函数已经不需要 因为category模板里已经写好了验证和加载了template_parts 
//add_action('template_redirect', 'hh_sub_category_template');

if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}