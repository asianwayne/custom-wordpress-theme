<?php 
//register term_order
function register_term_order_field() {
  register_meta( 'term', 'term_order', array(
    'show_in_rest' => true,
    'single'       => true,
    'type'         => 'integer'
  ) );
}
add_action( 'init', 'register_term_order_field' );

add_action( 'wp_terms_checklist_args', 'my_terms_checklist_args' );
function my_terms_checklist_args( $args ) {
  $args['checked_ontop'] = false;
  return $args;
}
add_action( 'admin_head-edit-tags.php', 'my_admin_head' );
function my_admin_head() {
  if ( 'category' !== $GLOBALS['taxnow'] )
    return;
  ?>
  <style>
    #the-list {
      overflow: auto;
    }
    #the-list li {
      width: 100%;
      float: left;
    }
  </style>
  <?php
}
add_action( 'admin_enqueue_scripts', 'my_admin_enqueue_scripts' );
function my_admin_enqueue_scripts( $hook ) {
  if ( 'edit-tags.php' !== $hook )
    return;
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array( 'jquery' ), '1.12.1' );
  wp_enqueue_script( 'admin-categories', get_stylesheet_directory_uri() . '/framework/plugins/drag-cats/admin-categories.js', array( 'jquery', 'wp-util' ), '1.0', true );
}

//add_action( 'wp_ajax_update-category-order', 'update_category_order' );

//adjust the queries on the edit-tags screen 

function custom_category_order( $query ) {
  global $pagenow;
  
    $query->query_vars['orderby'] = 'term_order';
    $query->query_vars['order'] = 'ASC';
  
}
add_filter( 'pre_get_terms', 'custom_category_order', 10, 1 );

add_action( 'wp_ajax_update-term-order', 'my_update_term_order' );
function my_update_term_order() {
  global $wpdb;
            
          $ids = explode(',', $_POST['ids']);
          //0 => tag-100 
  
  foreach ( $ids as $item_key => $term_id ) {
    //$wpdb->update( $wpdb->terms, array('term_order' => ($item_key + 1)), array('term_id' => $term_id) );
    wp_update_term( $term_id, 'category', array(
      'term_order' => ($item_key + 1),
    ) );
   
  }
  //clean_term_cache($ids);
            //do_action('tto/update-order');
  wp_send_json_success();

}



    



