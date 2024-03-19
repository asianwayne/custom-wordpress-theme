<?php 
/**
 * One Click Demo Import custom config file 
 * First you need install one click demo import plugin
 * 
 */



//这里文件夹后面路径不要加斜线/ 

function ocdi_import_files() {
	return array(
		array(
			'import_file_name'             => 'MC Demo',
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/demos/WordPress.xml',
			

			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'framework/demos/redux_options.json',
					'option_name' => 'theme_fields',
				),
			),
			
			'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'your-textdomain' ),
			
		),
	);
}
add_filter( 'ocdi/import_files', 'ocdi_import_files' ); 

//设置首页 博客页 和菜单
// function ocdi_after_import_setup() {
// 	// Assign menus to their locations.
// 	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

// 	set_theme_mod( 'nav_menu_locations', array(
// 			'main-menu' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function
// 		)
// 	);

// 	// Assign front page and posts page (blog page).
// 	$front_page_id = get_page_by_title( 'Home' );
// 	$blog_page_id  = get_page_by_title( 'Blog' );

// 	update_option( 'show_on_front', 'page' );
// 	update_option( 'page_on_front', $front_page_id->ID );
// 	update_option( 'page_for_posts', $blog_page_id->ID );

// }
//add_action( 'ocdi/after_import', 'ocdi_after_import_setup' );

//创建页面 
// function create_demo_pages_after_import() {
//     $page_data = array(
//         'post_title'    => 'Sample Page',
//         'post_content'  => 'This is the content of the page.',
//         'post_status'   => 'publish',
//         'post_author'   => 1,  // Change this to the appropriate user ID
//         'post_type'     => 'page',
//     );

//     wp_insert_post($page_data);
// }

//add_action('after_import_complete', 'create_demo_pages_after_import');

//导入 meta fields 

// function _create_demo_pages_after_import() {
//     $page_data = array(
//         'post_title'    => 'Sample Page',
//         'post_content'  => 'This is the content of the page.',
//         'post_status'   => 'publish',
//         'post_author'   => 1,  // Change this to the appropriate user ID
//         'post_type'     => 'page',
//     );

//     $page_id = wp_insert_post($page_data);

//     // Define and insert custom meta fields
//     if ($page_id) {
//         // Example meta fields - replace with your actual meta fields
//         $meta_fields = array(
//             'custom_field_1' => 'Value 1',
//             'custom_field_2' => 'Value 2',
//         );

//         foreach ($meta_fields as $meta_key => $meta_value) {
//             update_post_meta($page_id, $meta_key, $meta_value);
//         }
//     }
// }

//add_action('after_import_complete', 'create_demo_pages_after_import');

