<?php 
/**
 * This is the template for displaying categories 
 * @package hastart
 */
get_header(); ?>

<div class="container">
  <section class="index_cont list_content">
    <div class="main_cont clear">
      
      <div class="list-cont fl">
        <nav class="breadcrumb"> 
          <?php echo tie_breadcrumbs(); ?> 
        </nav>
        <div class="recommend_list mod_list">
          
          <ul class="article-list" id="post-list">
            <li class="clear">
              <div class="cat_head">
                <h2 style="margin-bottom:10px"><?php  echo ucfirst(single_tag_title('', false)); ?></h2>
                <p><?php echo category_description() ?></p>
              </div>
            </li>
            <?php while (have_posts()) {
            the_post(); ?>
            <li class="post_part clear"> <a href="<?php the_permalink() ?>" class="pic"> <img class="lazy" src="<?php the_post_thumbnail_url() ?>" onerror='this.src="<?php echo ha_get_option('on_error')['url'] ?>"' alt="" title="<?php the_title(); ?>" width="200" height="150"> </a>
              <div class="cont">
                <h3><a href="<?php the_permalink() ?>" class="title"><?php the_title(); ?></a></h3>
                <div class="info"> 
                  <!-- Categori list -->
                  <span class="author"> <?php echo get_the_category_list(' ,') ?> <span class="gap_point">•</span><span><?php the_time(get_option('date_format')) ?></span> </span> 
                </div>
                <p class="summary"><?php echo ha_excerpt(); ?></p>
              </div>
            </li>

            <?php 

            } ?>
			
			
          </ul>
          
            <?php tie_get_pagenavi() ?>
          
        </div>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </section>
</div>





<?php
get_footer();