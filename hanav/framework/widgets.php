<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hanav_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'hanav' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'hanav' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'hanav_widgets_init' );





//locate templates from theme filr folder  
## ----- custom widgets 

locate_template( 'framework/widgets/widgets-recently.php', true,true );