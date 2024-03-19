<?php 
function register_hp_listing_post_type() {
    $args = array(
        'public' => true,
        'label'  => 'HP Listings',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'custom-fields'
        )
    );
    register_post_type( 'hp_listing', $args );
}
add_action( 'init', 'register_hp_listing_post_type' );
