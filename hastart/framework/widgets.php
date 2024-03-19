<?php 
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hastart_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'hastart' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'hastart' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
}
add_action( 'widgets_init', 'hastart_widgets_init' );

//locate templates 
locate_template('framework/widgets/widgets-ads.php', true, true);
locate_template('framework/widgets/widgets-popular.php', true, true);
locate_template('framework/widgets/widgets-recent.php', true, true);
locate_template('framework/widgets/widgets-tag-group.php', true, true);
locate_template('framework/widgets/widgets-custom-ads.php', true, true);