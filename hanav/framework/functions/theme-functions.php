<?php
function ha_get_option( $name ) {
  global $theme_options;
  
  if( !empty( $theme_options[$name] ))
     return $theme_options[$name];
  return false ;

}

//hooks 
function codedocs_add_active_to_nav_class($classes) {
 if (in_array('current-menu-item', $classes)) {  $classes[] = 'active'; }
 return $classes;}add_filter( 'nav_menu_css_class', 'codedocs_add_active_to_nav_class' );