<?php 
/**
 * Templates for widgets init and custom widgets import 
 * @package haqiye 
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function haapp_widgets_init() {
  
  register_sidebar(
    array(
      'name'          => esc_html__( 'Sidebar', 'haqiye' ),
      'id'            => 'sidebar-1',
      'description'   => esc_html__( 'Add widgets here.', 'haqiye' ),
      'before_widget' => '<section class="hotapps">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3 class="sidetitle">',
      'after_title'   => '</h3>',
    )
  );
}
add_action( 'widgets_init', 'haapp_widgets_init' );


//import custom widgets 
//locate template 定义的是主题文件夹的地址
locate_template('framework/widgets/widget-hotapp.php', true, true); 
locate_template('framework/widgets/widget-recentapp.php', true, true); 
