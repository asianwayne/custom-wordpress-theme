<?php 
tie_setPostViews();
get_header(); 
tie_breadcrumbs();
while(have_posts()) : the_post();
?>
<div class="container">
  <div class="part current">
    <div class="bar clearfix">
      <h1 class="tt"> <?php the_title()?> </h1>
      <div class="r-intro fr"> <span class="data fr"> <small class="info"><i class="fa fa-clock-o"></i><?php the_time(get_option('date_format'))?></small> <small class="info"><i class="fa fa-eye"></i><?php echo get_post_meta(get_the_ID(), 'tie_views', true)?></small> </span> </div>
    </div>
    <div class="items">
      <div class="row post-single">
        <div class="col-xs-12 col-sm-12 col-md-8">
          <div class="pic fl">
            <!-- background -->
            <div class="blur blur-layer" style="background: transparent url(<?php echo (has_post_thumbnail()) ? the_post_thumbnail_url() : '' ?>) no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;animation: rotate 20s linear infinite;"> </div>
            <!-- actual -->
            <img class="img-cover" src="<?php echo (has_post_thumbnail()) ? the_post_thumbnail_url() : ha_get_option('default_thumb') ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>"> 
          </div>
          <div class="list">
            <p>站点名称：<?php the_title() ?></p> <?php var_dump(empty(get_post_meta(get_the_ID(),'navlogo',true)['url']));?>
            <p class="cate">所属分类：<?php echo get_the_term_list(get_the_ID(),'fenlei'); ?></p>
            <p class="tag">相关标签：<span class="padding"> NULL </span></p>
            <p class="site">官方网址：<?php echo preg_replace("#^[^:/.]*[:/]+#i", "",get_post_meta(get_the_ID(),'navlink',true)) ?></p>
            
            <p class="seo">SEO查询： <a rel="nofollow" class="" href="https://www.aizhan.com/cha/<?=get_post_meta(get_the_ID(),'navlink',true)?>" target="_blank"><i class="fa fa-bar-chart"></i>爱站网</a> 
              <a rel="nofollow" class="pczz" href="http://seo.chinaz.com/js.adminbuy.cn" target="_blank"><i class="fa fa-bar-chart"></i>站长工具</a> <a rel="nofollow" class="mzz" href="http://mseo.chinaz.com/?host=js.adminbuy.cn" target="_blank"><i class="fa fa-bar-chart"></i>站长工具</a> </p>
            <a class="btn transition" target="_blank" href="<?php echo get_post_meta(get_the_ID(),'navlink',true) ?>" rel="nofollow">进入网站 <i class="fa fa-chevron-circle-right"></i></a> </div>
        </div>
      </div>
    </div>
  </div>
  <div class="part">
    <p class="tt"><span>站点介绍</span></p>
    <div class="items">
      <div class="art-main">
       <?php echo get_post_meta($post->ID, 'navdesc', true)?>
      </div>
    </div>
  </div>

  <!-- 广告位AD3  -->
  <div class="part related">
    <p class="tt"><span>同分类站点</span></p>
    <div class="items">
      <div class="row">
        <?php 
        $related_q = new WP_Query(array(
          'post_type' => 'post',
          'posts_per_page' => 8,
          'ignore_sticky_posts' => 1

        ));
        while ($related_q->have_posts()) {
          # code...
          $related_q->the_post(); ?>
          <div class="col-xs-6 col-sm-4 col-md-3">
          <div class="item"> 
            <a class="link" target="_blank" href="http://js.adminbuy.cn" rel="nofollow"><i class="autoleft fa fa-angle-right" title="直达网站"></i></a> 
            <a class="a" href="index-25.htm?changyong/30.html" title="js特效网" target="_blank"> 
              <?php if(has_post_thumbnail()) : ?>
              <img class="img-cover br" src="<?php the_post_thumbnail_url() ?>" alt="js特效网" title="js特效网">
              <?php endif;?>
            <h3><?php the_title()?></h3>
            <p> <?php echo mb_strimwidth(strip_tags(get_the_content()),'0','150')?></p>
            </a> </div>
        </div>

          <?php 
        }
        
        
        ?>
        
        
        
        
        
      </div>
    </div>
  </div>
  
</div>
<?php endwhile;?>

<?php get_footer()?>