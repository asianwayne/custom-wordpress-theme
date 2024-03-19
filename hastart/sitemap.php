<?php /*
Template Name: Sitemap
*/ ?>
<h2>Archives</h2>
<ul>
    <?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 12 ) ); ?>
</ul>
<h2>Pages</h2>
<ul>
    <?php wp_list_pages( array( 'title_li' => '' ) ); ?>
</ul>
<h2>Categories</h2>
<ul>
    <?php wp_list_categories( array( 'title_li' => '' ) ); ?>
</ul>
<h2>Tags</h2>
<ul>
    <?php wp_tag_cloud(); ?>
</ul>
<h2>Custom Post Types</h2>
<ul>
    <?php 
        $args = array(
           'public'   => true,
           '_builtin' => false
        );
        $output = 'names'; // names or objects, note names is the default
        $operator = 'and'; // 'and' or 'or'
        $post_types = get_post_types( $args, $output, $operator ); 
        foreach ( $post_types  as $post_type ) {
            echo '<li><a href="'.get_post_type_archive_link( $post_type ).'">'.$post_type.'</a></li>';
        }
    ?>
</ul>

