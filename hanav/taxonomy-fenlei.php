<?php
/**
 * The template for displaying taxonomy fenlei template 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hanav
 */

get_header();
tie_breadcrumbs();
?>
<div class="container"> 
  <!-- 广告位AD4  -->
  <div class="part current">
    <div class="items"> 
      <?php if(have_posts()) : ?>
      <div class="row">
        
      <?php while(have_posts()) : the_post(); ?>
        <div class="col-xs-6 col-sm-4 col-md-3">
          <div class="item"> <a class="link" target="_blank" href="<?php the_permalink() ?>" rel="nofollow"><i class="autoleft fa fa-angle-right"></i></a> <a class="a" href="<?php the_permalink() ?>" target="_blank"> 
          <?php if(has_post_thumbnail()) : ?>
          <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
          <?php endif;?>
            <h3><?php the_title()?></h3>
            <p><?php echo get_post_meta(get_the_ID(), 'navdesc', true) ?></p>
            </a> </div>
        </div>
      <?php endwhile;?>
        
      </div>
      <div class="pagebar">
        <?php echo paginate_links()?>
      </div>	
      <?php else: ?>
        <h2>本分类下无任何数据</h2>
      <?php endif; ?>

    </div>
  </div>
</div>

	

<?php
get_footer();
