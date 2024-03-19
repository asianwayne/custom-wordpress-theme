<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package guowen
 */

get_header();
?>

<div class="article">
  <div id="jzblog">
    <div class="r_box">
      <div class="main">
        <div class="hezi-sige">
          <ul class="sige" id="topnews">
            <?php $query_args = array(
              'post__in' => get_option('sticky_post'),
              'posts_per_page' => 3
            );
            $query = new WP_Query( $query_args );
            while ($query->have_posts()) {
              $query->the_post(); ?>
              <li class="cur"> <i><a href="index-18.htm?chu1/43.html" title="整理的好处作文350字"><img src="<?php the_post_thumbnail_url(  ); ?>" alt="整理的好处作文350字"></a></i>
              <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
              <p><?php echo mb_strimwidth(strip_tags(get_the_content()),0,150); ?></p>
              <div class="pfoot">
                <div class="f_l"><a href="index-9.htm?chu1/">初一作文</a></div>
                <div class="f_r"><a href="<?php the_permalink() ?>" target="_blank"><em class="xbiaoq">阅读</em></a></div>
              </div>
            </li>

              <?php 
                
            } wp_reset_postdata();

             ?>
          </ul>
        </div>
        <div class="hezi-box">
          <!-- Main list -->
          <ul id="p_list_box">
            <?php 
            $s_free = new WP_Query(array(
              'ignore_sticky_posts' => 1
            ));
            while ($s_free->have_posts()) { 
              $s_free->the_post(); 
              get_template_part('/template-parts/content');
            } ?>
          </ul>
        </div>
      </div>
    </div>
    <?php get_sidebar() ?>
  </div>
</div>

<?php get_footer() ?>