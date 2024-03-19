<?php get_header(  ); ?>


<div id="breadcrumb">
  <div class="inner"> <?php tie_breadcrumbs(); ?> </div>
</div>
<main id="workpost">
  <article class="inner">
    <div class="box">
      <div id="imgbig">
        
        	
        		
        			
        					<div class="item" title="点击看完整图片" style="width: 100%; display: inline-block;"> 
        						<a class="figure" href="<?php the_post_thumbnail_url(  ); ?>" title="" tabindex="-1"> <img src="<?php the_post_thumbnail_url(  ); ?>" alt=""> </a> </div>
        					
        			
        		
        	
      </div>
      
      <div class="text">
        <h1 id="postTitle"><?php the_title(); ?></h1>
        <div class="entry" id="maximg">
          <?php the_content(); ?>
        </div>


        <div id="postTags" class="center">  <?php the_tags( '<span><i class="ri-hashtag"></i> 关键词</span>',' ,' ); ?>
 </div>
 <?php $prev = get_previous_post(); 
            	$next = get_next_post(); ?>
        <div id="imgnavi">

        	<?php if ($prev): ?>
        		<div class="prev"> <a href="<?php echo get_permalink( $prev ); ?>" title="<?php echo $prev->post_title; ?>">
            <div class="figure">
            	
              <figure class="img"> <img src="<?php echo get_the_post_thumbnail_url( $prev,'thumbnail' ); ?>" alt="<?php echo $prev->post_title; ?>"> </figure>
            </div>
            <div class="title"> <span>上一篇</span> <span><?php echo $prev->post_title; ?></span> </div>
            </a> </div>
        		
        	<?php endif ?>
          

           <?php if ($next): ?>
           	 <div class="next"> <a href="<?php echo get_permalink( $next ); ?>" title="<?php echo $next->post_title; ?>">
            <div class="figure">
              <figure class="img"> <img src="<?php echo get_the_post_thumbnail_url( $next,'thumbnail' ); ?>" alt="<?php echo $next->post_title; ?>"> </figure>
            </div>
            <div class="title"> <span>下一篇</span> <span><?php echo $next->post_title; ?></span> </div>
            </a> </div>
           	
           <?php endif ?>
         
        </div>

        <section id="related">
          <h3 class="hTitle">xiangsi anli：</h3>
          <ul class="row">

          	<?php 
          	$anli_related = new WP_Query(array(
          		'post_type' => 'portfolio',
          		'posts_per_page'  => 4,
          		'orderby'  => 'rand'


          	));
          	while ($anli_related->have_posts()) {
          		$anli_related->the_post(); ?>

          		<li> <a class="figure" href="<?php the_permalink(  ); ?>" title="<?php the_title(); ?>">
              <figure class="img"> <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>"> </figure>
              <h4><?php the_title(); ?></h4>
              </a> </li>

          		<?php 
          	    
          	}

          	 ?>
            
          </ul>
        </section>
      </div>
    </div>
  </article>
</main>


<?php get_footer(  ); ?>