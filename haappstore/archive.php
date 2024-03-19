<?php get_header() ?>

<div class="wrapper">
  <div class="inner">
    <?php get_sidebar() ?>
    <main class="main appbox">
      <div class="boxtop">
        <h2><?php echo get_queried_object()->name; ?></h2>
        <?php tie_breadcrumbs(); ?>
      </div>
      <div class="applist appcate">
        <ul>
          <?php while (have_posts()) { the_post(); get_template_part( 'template-parts/content', 'app-grid' );
              
          } ?>
         
        </ul>
        
        <?php tie_get_pagenavi() ?>
        
      </div>
    </main>
  </div>
</div>


<?php get_footer() ?>