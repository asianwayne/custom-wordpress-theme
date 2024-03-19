<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package miladcorp
 */
tie_setPostViews();
get_header();
?>

	<div id="breadcrumb">
  <div class="inner"> <?php echo tie_breadcrumbs() ?> </div>
</div>

<div id="wrapper">
  <div class="inner">
    <main id="main">
      <article id="singlepost">
        <h1 id="postTitle"><?php the_title(); ?></h1>
        <div id="postmeta"> <span><i class="ri-calendar-check-line"></i>
          <time datetime="<?php the_time( get_option('date_format') ); ?>"><?php the_time( get_option('date_format') ); ?></time>
          </span> <span><?php echo get_the_category_list(); ?></span> <span><i class="ri-message-2-line"></i> <?php echo get_post_meta( get_the_ID(), 'tie_views', true ); ?></span></div>
        <div class="entry" id="maximg">
         <?php the_content(); ?>
        </div>
        <div id="postTags" class="center"> 
        	<?php the_tags('<span><i class="ri-hashtag"></i> 关键词</span>'); ?>
 		</div>

 		<?php 
 		$prev_post = get_previous_post();
 		$next_post = get_next_post(); 
 		
 		?>
        <div id="postnavi">
        	<?php if ($prev_post): ?>
        		<div class="prev"> <a href="<?php echo get_permalink($prev_post->ID) ?>">shangyipian:<?php echo $prev_post->post_title; ?></a> </div>
        	<?php endif ?>
          <?php if ($next_post): ?>
          	<div class="next"> <a href="<?php echo get_permalink($next_post->ID) ?>">xiayipian:<?php echo $next_post->post_title; ?></a> </div>
          <?php endif ?>
          
        </div>


        <section id="related">
          <h3 class="hTitle">Related articles：</h3>
          <ul class="news">
            
            <?php 
            $customCat = wp_get_object_terms( get_the_ID(), 'category', array('fields'  => 'ids') );

            $relatedPosts = new WP_Query(array(
            	'post_type'  => 'post',
            	'posts_per_page'  => 3,
            	'cat'  => $customCat,
            	'orderby'  => 'rand',
            	'post__not_in'  => array(get_the_ID())

            ));

            while ($relatedPosts->have_posts()) { $relatedPosts->the_post(); ?>
            	<li>
                <?php if (has_post_thumbnail(  )): ?>
                   <figure class="thumbnail"> <a target="_blank" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"> <img src="<?php the_post_thumbnail_url(  ); ?>" alt="<?php the_title(); ?>"> </a> </figure>
                  
                <?php endif ?>
             

              <div class="text">
                <h4> <a target="_blank" href="<?php the_permalink(  );; ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> </h4>
                <div class="rows"> <?php echo mb_strimwidth(strip_tags(get_the_content(  )),0, 300) ?> </div>
              </div>
            </li>

            	<?php 
                
            }  wp_reset_postdata();
             ?>
            
            
            
            
          </ul>
        </section>
      </article>
    </main>
    <?php get_sidebar(  ); ?>
  </div>
</div>



<?php
get_footer();
