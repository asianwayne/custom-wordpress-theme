<?php
/**
 * Tempalets for displaying chanpin archive 
 */
get_header();  ?>

<?php tie_breadcrumbs(); ?>

<div class="main clearfix">
        <?php get_template_part('framework/loops/loop','sort');?>
        <div>
		<div id="fh5co-content_show" class="proshow">
		  <div class="container" style="background-color:#fff; margin-bottom:20px;">
			<div>
			<ul class="prolist">
        <!-- list all the chanpin -->
        <?php 
        $cp_q = new WP_Query(array(
          'paged' => (get_query_var('paged', '1')) ? get_query_var('paged', '1') : '1',
          'post_type' => 'chanpin',
          'posts_per_page' => 9
        ));

        while ($cp_q->have_posts()) {
          # code...
          $cp_q->the_post();  get_template_part('template-parts/content', 'chanpin');
        } wp_reset_postdata();
        
        ?>
				
			</ul></div>
		  </div>
		</div>
        
        <?php echo tie_get_pagenavi($cp_q);?>
        
        </div>
    </div>

<?php 
get_footer();