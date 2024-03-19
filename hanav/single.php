<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hanav
 */

get_header();
tie_breadcrumbs();
?>
<div class="container">
  <div class="part current">
    <div class="bar clearfix">
      <h1 class="tt"><?php the_title()?></h1>
      <div class="r-intro fr"> <span class="data fr"> <small class="info"><i class="fa fa-clock-o"></i><?php the_time(get_option('date_format'))?></small> <small class="info"><i class="fa fa-eye"></i><?php echo get_post_meta(get_the_ID(), 'tie_views', true)?></small> </span> </div>
    </div>
    <div class="items">
      <div class="art-main"> 
				<?php the_content()?>

        <div class="art-copyright br mb">
          <div>本文地址：<a href="index-21.htm?news/22.html" title="做好前端网页优化，让你的网站浏览量爆满" target="_blank"><?php echo urldecode(get_the_permalink()); ?></a></div>
          <div><span class="copyright">版权声明：</span>除非特别标注，否则均为本站原创文章，转载时请以链接形式注明文章出处。</div>
        </div>
        <!-- 相关标签 -->
        <p class="art-tag"><span class="padding"> <?php the_tags()?>  </span> </p>
      </div>
    </div>
  </div>
  <!-- 广告位AD3  -->
	<div class="part">
		<img src="https://www.xmdn.net/wp-content/uploads/2022/11/1180-310.jpg" alt="ads after post">
	</div>
  <div class="part related">
    <p class="tt"><span>相关推荐</span></p>
    <div class="items">
      <div class="row">
        
			<?php 
			$q_a_p = new WP_Query(array(
				'orderby' => 'rand',
				'posts_per_page' => 4,
				'ignore_sticky_posts' => true

			));

			while($q_a_p->have_posts()) : $q_a_p->the_post();
			
			?>
        <div class="col-xs-6 col-sm-4 col-md-3">
          <div class="item art-item transition">

						

            <h2><a href="<?php the_permalink() ?>" title="<?php the_title() ?>" target="_blank"><?php the_title()?></a></h2>
            <?php echo mb_strimwidth(strip_tags(get_the_content()),'0','150');?>
          </div>
        </div>
			<?php endwhile;?>
        
        
        
      </div>
    </div>
  </div>
</div>
	

<?php
get_footer();
