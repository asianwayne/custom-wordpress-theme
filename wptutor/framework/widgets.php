<?php 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wptutor_widgets_init() {
  register_sidebar(
    array(
      'name'          => esc_html__( 'WPT Sidebar', 'wptutor' ),
      'id'            => 'sidebar-1',
      'description'   => esc_html__( 'Add widgets here.', 'wptutor' ),
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => '',
      'after_title'   => '',
    )
  );

  register_sidebar(
    array(
      'name'          => esc_html__( 'WPT Footer Sidebar', 'wptutor' ),
      'id'            => 'sidebar-footer',
      'description'   => esc_html__( 'Add Footer widgets here.', 'wptutor' ),
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => '',
      'after_title'   => '',
    )
  );
}
add_action( 'widgets_init', 'wptutor_widgets_init' );




locate_template( 'framework/widgets/class-widget-search.php',true,true );
locate_template( 'framework/widgets/class-widget-popular-posts.php',true,true );
locate_template( 'framework/widgets/class-widget-newsletter.php',true,true );
locate_template( 'framework/widgets/class-widget-social-account.php',true,true );
locate_template( 'framework/widgets/class-widget-tags.php',true,true );
locate_template( 'framework/widgets/class-widget-ads.php',true,true );