<?php get_header() ?>

<main class="wrapper">
  <div class="inner appbox">
    <div class="boxtop">
      <h2>教程中心</h2>
      
    </div>
    <div class="newslist">
      
      <?php 
      while (have_posts()) { the_post(); ?>

        <article class="newsitem">
        <div class="pic"> <a href="<?php the_permalink() ?>" target="_blank" title="<?php the_title() ?>" style="background-image: url(<?php the_post_thumbnail_url(); ?>);"></a> </div>
        <div class="info">
          <h2><a href="<?php the_permalink(  ); ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h2>
          <div class="excerpt"> <?php echo mb_strimwidth(strip_tags(get_the_content()),0,200) ?> </div>
          <div class="more"> <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">了解更多&gt;&gt;</a> </div>
          <div class="date">
            <time datetime="<?php the_time(get_option('date_format')) ?>"> <?php the_time(get_option('date_format')) ?> </time>
          </div>
        </div>
      </article>

        <?php 
          
      }
      tie_get_pagenavi();

       ?>
      
        
        
    </div>
  </div>
</main>

<?php get_footer() ?>