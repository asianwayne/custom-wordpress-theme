<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package miladcorp
 */

get_header();
?>

	<div id="breadcrumb">
	  <div class="inner"> You are searching for: <?php echo get_search_query(  ); ?> </div>
	</div>

<div id="wrapper">
  <div class="inner">
    <main id="main">
      <div id="blogList">
        <?php 
      
        while (have_posts()) {
        	the_post(); 
        ?>

        <article class="blogItem wow animate__fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
          <?php if (has_post_thumbnail(  )): ?>
            <figure class="thumbnail"> <a href="<?php the_permalink(  ); ?>" title="<?php the_title(); ?>"> <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>"> </a> </figure>
            
          <?php endif ?>
          
          <div class="text">
            <h2 class="title"> <a href="<?php the_permalink(  ); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> </h2>
            <div class="rows excerpt"> 
            	<?php echo mb_strimwidth(strip_tags(get_the_content()), 0, 400); ?>
             </div>
            <div class="meta"> <span> <i class="ri-calendar-check-line"></i>
              <time datetime="<?php the_time( get_option('date_format') ); ?>"><?php the_time( get_option('date_format') ); ?></time>
              </span> <span> <?php echo get_the_category_list(' ,'); ?> </span> <span><i class="ri-eye-line"></i> <?php echo get_post_meta( get_the_ID(), 'tie_views', true ); ?></span></div>
          </div>
        </article>


        <?php 
 			} 
         ?>
        
        
     
        
      </div>
      
    <div class="pagebar">
    <div class="pagination">
    <?php echo tie_get_pagenavi(); ?>
    </div>
    </div>	
    
    </main>
    <?php get_sidebar(  ); ?>
  </div>
</div>

<?php
get_sidebar();
get_footer();
