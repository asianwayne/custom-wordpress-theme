<?php
/**
 * Template for the ajax page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hastart
 * 
 * Test the load more button 
 */

get_header();
global $wp_query;
?>

<div class="container">
  <section class="index_cont list_content">
    <div class="main_cont clear">
      
      <div class="list-cont fl">
        <nav class="breadcrumb"> 
          <?php echo tie_breadcrumbs(); ?> 
        </nav>
        <div class="recommend_list mod_list">
          <?php  $query = new WP_Query(
              array(
                'post_type' => 'post',
                'posts_per_page'  => 8,
                'ignore_sticky_posts'  => true,
              )
            ); 
            //设置一页是10
            
            
            ?> 
          
          <ul class="article-list posts-list" data-home=true id="post-list" data-paged="<?=get_query_var('paged') ? get_query_var('paged') : '1'?>" data-total="<?=$query->max_num_pages?>">
            <li class="clear">
              <div class="cat_head">
                <h1 class="page-title">Load more button test</h1>
              </div>
            </li>
            <?php
            while ($query->have_posts()) {
            $query->the_post(); get_template_part('template-parts/content'); ?>

            <?php 

            } ?>
          </ul>
          <button class="button load-more primary large" style="padding:10px 20px;display:block;margin:0 auto;margin-bottom:20px;border-radius:5px;" data-home="true" data-paged="<?=get_query_var('paged') ? get_query_var('paged') : '1'?>" data-action="ha_load_more" data-total="<?=$query->max_num_pages?>">Load more</button>
          
            <?php //tie_get_pagenavi( $query) 
              
            
            ?>
          
        </div>
      </div>
      <?php get_sidebar();
      
      
      ?>
    </div>
  </section>
</div>

<?php

get_footer();
