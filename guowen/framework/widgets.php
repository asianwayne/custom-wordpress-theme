<?php 
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function guowen_widgets_init() {
  
  register_sidebar(
    array(
      'name'          => esc_html__( 'Primary Sidebar', 'guowen' ),
      'id'            => 'sidebar-1',
      'description'   => esc_html__( 'Add widgets here.', 'guowen' ),
      'before_widget' => '<div id="%1$s" class="side_bar">',
      'after_widget'  => '</div>',
      'before_title'  => '<div class="side-tit"><h2 class="function_t">',
      'after_title'   => '</h2></div>',
    )
  );
}

add_action( 'widgets_init', 'guowen_widgets_init' );

//locate templates from theme filr folder  
## ----- custom widgets 
locate_template( 'framework/widgets/widgets-popular.php', true,true );
locate_template( 'framework/widgets/widgets-tag-group.php', true,true );
locate_template( 'framework/widgets/widgets-friendly-links.php', true,true );