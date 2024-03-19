<?php 
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function honghua_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'honghua' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'honghua' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s coach">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title clearfix">',
			'after_title'   => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'honghua_widgets_init' );


add_action('admin_enqueue_scripts', 'enqueue_widgets_script');
	# code...

function enqueue_widgets_script() {
	# code...
	wp_enqueue_media();
	wp_enqueue_script('widgetsjs', get_template_directory_uri() . '/js/widgets.js',false,'1.0.0.1',true);
}

//locate templates from theme filr folder  
## ----- custom widgets 

locate_template( 'framework/widgets/widgets-recently.php', true,true );
locate_template( 'framework/widgets/widgets-popular.php', true,true );
locate_template( 'framework/widgets/widgets-follow-us.php', true,true );