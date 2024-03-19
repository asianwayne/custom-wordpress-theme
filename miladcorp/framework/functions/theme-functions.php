<?php 

add_action( 'pre_get_posts', 'adjust_portfolio_query');

function adjust_portfolio_query($query)
{

	if ($query->is_main_query() && is_post_type_archive( 'portfolio' )) {
		$query->set('posts_per_page',9);
		
	}

	if ($query->is_main_query() && is_tag()) {
		$query->set('post_type','any');
		
	}
	
}



/**
 * Custom pagination function to match the desired HTML structure
 */




function category_single_template($single) {

    global $post;

    if (has_category('fuwu', $post)) {
        $single = get_template_directory() . '/single-fuwu.php'; 
    }
    return $single;

}
add_filter( 'single_template', 'category_single_template' );

add_filter( 'nav_menu_css_class', 'add_cur_to_current_menu' );

function add_cur_to_current_menu($classes)
{

	if (in_array('current-menu-item', $classes)) {
		$classes[] = 'cur';
		
	}


	return $classes;

	
}

add_action( 'init', 'mc_register_gallery_type' );

function mc_register_gallery_type() {
	register_post_type( 'image',array(


		'labels'  => array(
			'name'  => __('Image'),


		),
		'supports' => array('title','editor','thumbnail','excerpt'),

		'public'  => true,
		'show_in_rest'  => true,
		'has_archive'  => true,

	) );
}

add_action( 'rest_api_init', 'add_custom_field_on_image_rest' );

function add_custom_field_on_image_rest() {
	register_rest_field( 'image', 'thumbnail', array(
		'get_callback'  => function($attr){
			return  wp_get_attachment_image_url( $attr['featured_media'],'full' );

			
		}


	) );
}