<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
//include the main class file
if (is_admin()){
  /* 
   * prefix of meta keys, optional
   */
  $prefix = 'ha_';
  /* 
   * configure your meta box
   */
  $config = array(
    'id' => 'term_meta_box',          // meta box id, unique per meta box
    'title' => 'Term Meta Box',          // meta box title
    'pages' => array('category'),        // taxonomy name, accept categories, post_tag and custom taxonomies
    'context' => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'fields' => array(),            // list of meta fields (can be added by field arrays)
    'local_images' => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  
  /*
   * Initiate your meta box
   */
  $my_meta =  new Tax_Meta_Class($config);
  
  /*
   * Add fields to your meta box
   */
  
  
  //Image field 
  $my_meta->addImage($prefix.'image_field_id',array('name'=> __('Cover ','tax-meta')));
  
  
  
  /*
   * Don't Forget to Close up the meta box decleration
   */
  //Finish Meta Box Decleration
  $my_meta->Finish();
}
