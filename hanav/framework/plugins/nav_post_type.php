<?php
add_action('init', 'nav_post_types');
add_action('init', 'nav_post_types_taxonomy');

function nav_post_types() {
  # code...
  register_post_type('daohang', array(
    'labels' => array(
      'name' => _x('导航', 'posttypename', 'hanav'),
      'add_new' => __('添加新导航', 'hanav'),
      'add_new_item' => __('添加新导航', 'hanav'),

    ),
    'public' => true,
    'has_archive' => true,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-admin-links',
    'supports' => array('title')
  ));
}

function nav_post_types_taxonomy() {
  # code...

  register_taxonomy('fenlei', 'daohang', array(
    'labels' => array(
      'name' => _x('分类', 'customtaxonmyname', 'habav'),
      'add_new_item' => __('添加新分类', 'hanav'),
      
    ),
    'public' => true,
    'hierarchical' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,

  ));
}
