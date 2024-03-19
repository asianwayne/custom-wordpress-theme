<?php 

function create_custom_post_type() {
    $labels = array(
        'name'               => __( 'Apps', 'text-domain' ),
        'singular_name'      => __( 'App', 'text-domain' ),
        'menu_name'          => __( 'Apps', 'text-domain' ),
        'add_new'            => __( 'Add New', 'text-domain' ),
        'add_new_item'       => __( 'Add New App', 'text-domain' ),
        'edit'               => __( 'Edit', 'text-domain' ),
        'edit_item'          => __( 'Edit App', 'text-domain' ),
        'new_item'           => __( 'New App', 'text-domain' ),
        'view'               => __( 'View', 'text-domain' ),
        'view_item'          => __( 'View App', 'text-domain' ),
        'search_items'       => __( 'Search Apps', 'text-domain' ),
        'not_found'          => __( 'No Apps found', 'text-domain' ),
        'not_found_in_trash' => __( 'No Apps found in trash', 'text-domain' ),
        'parent'             => __( 'Parent App', 'text-domain' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'publicly_queryable' => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-book',
        'supports'           => array( 'title', 'thumbnail' ),
        'show_in_rest'  => true,
    );

    register_post_type( 'app', $args );
}

add_action( 'init', 'create_custom_post_type' );


function create_custom_taxonomy() {
    $labels = array(
        'name' => 'Custom Taxonomy',
        'singular_name' => 'Custom Taxonomy',
        'search_items' => 'Search Custom Taxonomy',
        'all_items' => 'All Custom Taxonomy',
        'parent_item' => 'Parent Custom Taxonomy',
        'parent_item_colon' => 'Parent Custom Taxonomy:',
        'edit_item' => 'Edit Custom Taxonomy',
        'update_item' => 'Update Custom Taxonomy',
        'add_new_item' => 'Add New Custom Taxonomy',
        'new_item_name' => 'New Custom Taxonomy Name',
        'menu_name' => 'Custom Taxonomy',
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest'  => true
    );

    register_taxonomy( 'custom_taxonomy', array( 'app' ), $args );
}

add_action( 'init', 'create_custom_taxonomy' );