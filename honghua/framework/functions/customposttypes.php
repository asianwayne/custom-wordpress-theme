<?php
add_action('init', 'hh_custom_posttypes');
add_action('init', 'hh_custom_tax');

function hh_custom_posttypes() {
  
  register_post_type('chanpin', array(
    'labels' => array(
      'name' => _x('Chanpin', 'posttypename', 'honghua'),
      'singular_name' => _x('Chanpin', 'posttypesingularname', 'honghua'),
      'not_found' => __('No Chanpin Found', 'honghua'),
      'add_new' => __('Add New Chanpin', 'honghua'),
      'menu_name' => __('Chanpins', 'honghua')
    ),
    'public' => true,
    'has_archive' => true,
    'show_in_rest' => true,
    'supports' => ['title','editor','thumbnail','excerpt'],
    'menu_icon' => 'dashicons-products'
  ));

}



function hh_custom_tax() {
  register_taxonomy('sort', 'chanpin', array(
    'labels' => array(
      'name' => __('分类', 'honghua'),
      'singular_name' => __('Sort', 'honghua'),
      'menu_name' => __('分类', 'honghua'),

    ),
    'public' => true,
    'show_admin_column' => true,
    'show_in_rest' => true,
    'hierarchical' => true



  ));

}


