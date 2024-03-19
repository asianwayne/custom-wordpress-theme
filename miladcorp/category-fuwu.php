<?php 
get_header(  );
 ?>

<div id="breadcrumb">
  <div class="inner"><?php echo tie_breadcrumbs() ?></div>
</div>
<main>
  <div id="wrapper">
    <div class="inner">
      <section id="servicelist">
        
        <hgroup class="columnname left">
          <h2><?php single_cat_title(); ?></h2>
          <h3> / SERVICE</h3>
        </hgroup>
        
        <div class="svlist">
          
          <?php 
          $i = 1;
          while (have_posts()) {
          	the_post(); ?>
          	<article class="item"> <a class="figure wow animate__fadeInUp" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" style="visibility: visible; animation-name: fadeInUp;">
            <figure class="img"> <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>"> </figure>
            <div class="text">
              <div class="tag"> <span><?php echo $i; ?></span> </div>
              <h4 class="wot"><?php the_title(); ?></h4>
              <div class="rows intro"> <?php echo mb_strimwidth(strip_tags(get_the_content()),0,300) ?></div>
            </div>
            <div class="more">
              <p class="rows"><?php the_title(); ?></p>
              <p><span>了解更多</span></p>
            </div>
            </a> </article>

          	<?php 
              
        $i++;  } 

           ?>
        </div>
        
    <div class="pagebar">
    <div class="pagination">
    <?php tie_get_pagenavi(); ?>>
    </div>
    </div>	
    
      </section>
    </div>
  </div>
</main>













 <?php get_footer(  ); ?>