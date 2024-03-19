<?php get_header(  ); ?>

<div id="breadcrumb">
  <div class="inner"> <?php tie_breadcrumbs() ?> </div>
</div>

<main id="worklist">
  <div class="list">
    <?php while (have_posts()) {
      the_post(); ?>
       <article class="item wow animate__fadeInUp" style="visibility: visible; animation-name: fadeInUp;"> <a class="figure" href="<?php the_permalink(  ); ?>">
      <figure class="img"> <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>"> </figure>
      <h2 class="wot title"><?php the_title(); ?></h2>
      </a> </article>

      <?php 
        
    } ?>
    
  </div>

  <div class="pagebar">
<div class="pagination">
<?php tie_get_pagenavi(); ?>
</div>
</div>
  


</main>


<?php get_footer() ?>