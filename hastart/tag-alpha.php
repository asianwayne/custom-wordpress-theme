<?php
/*
Template Name: Alphabetical Tag List
*/
get_header(); ?>

<div class="container">

<section class='index_cont list_content'>
  <div class='main_cont clear'>


<?php 


// create an array of the alphabet
$alphabet = range('A', 'Z'); 

// loop through the alphabet
foreach($alphabet as $letter) {
    // query for all tags that start with the current letter

//     $all_tags = get_tags();
// $all_tags_start_with_letter = array();

// foreach ($all_tags as $tag) {
//     if (strpos($tag->name, $letter) === 0) {
//         $all_tags_start_with_letter[] = $tag->name;
//     }
// }

// $tags = get_terms( array(
//     'taxonomy' => 'post_tag',
//     'name__in' => $all_tags_start_with_letter,
//     'orderby' => 'name'
// ) );

// $args = array(
//     'taxonomy' => 'post_tag',
//     'name__like' => $letter.'%',
//     'orderby' => 'name'
// );

// $tags = new WP_Query($args);

// $tags = get_terms( array(
//     'taxonomy' => 'post_tag',
//     'hide_empty' => false,
//     'orderby' => 'name'
// ) );

// $filtered_tags = array();

// foreach ( $tags as $tag ) {
//     if ( strpos( $tag->name, $letter ) === 0 ) {
//         $filtered_tags[] = $tag;
//     }
// }

// $tags = get_terms( array(
//     'taxonomy' => 'post_tag',
//     'hide_empty' => false,
//     'orderby' => 'name'
// ) );

// $filtered_tags = wp_list_filter( $tags, array( 'name' => $letter . '*' ) );

// $tags = get_terms( array(
//     'taxonomy' => 'post_tag',
//     'hide_empty' => false,
//     'search' => $letter . '*',
//     'orderby' => 'name'
// ) );

global $wpdb;
$tags = $wpdb->get_results("SELECT t.*, tt.* 
FROM $wpdb->terms t 
INNER JOIN $wpdb->term_taxonomy tt 
ON t.term_id = tt.term_id 
WHERE tt.taxonomy = 'post_tag'
AND t.name LIKE '" . $wpdb->esc_like( $letter ) . "%' 
ORDER BY t.name ASC" );
   
    // check if there are any tags
    if($tags) {
        echo '<h2>'.$letter.'</h2>';
        echo '<div class="recommend_list mod_list" id="main_list"><ul class="article-list clear">';
        
        // loop through the tags and display them
        foreach($tags as $tag) {
            echo '<li class="post_part clear"><a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a></li>';
        }
        
        echo '</ul></div>';
    }



} ?>
</div>
</section>

</div>


<?php 

 get_footer(); ?>
