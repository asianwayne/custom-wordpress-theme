<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package guowen
 */

get_header();
tie_setPostViews();
?>

	<div class="marx article" style="transform: none;">
		<!-- breadcrumbs -->
    <?php tie_breadcrumbs() ?>
  <!-- <div class="marx sitemap"><a href="index.htm">首页</a>&gt;&gt;<a href="index-8.htm?chuzhong/">初中生作文</a>&gt;&gt;<a href="index-9.htm?chu1/">初一作文</a></div> -->
  <!-- endof breadcrumbs -->

  <div id="jzblog" style="transform: none;">
    <div class="marx ra_box">
      <div class="marx main">
        <div class="marx infosbox"> 
        	<?php $back_img = (get_post_meta(get_the_ID(),'background_img',true)) ? get_post_meta(get_the_ID(),'background_img',true) : ha_get_option('p_default_bg') ; ?>
        	<img class="imgtop" src="<?php echo $back_img['url'] ?>">
          <div class="marx newsview">
            <h1 class="marx news_title"><?php the_title() ?></h1>
            <!-- post meta -->
            <div class="marx bloginfo">
              <ul>
                <li class="marx lmname"><span class="marx wordicon-archive-drawer"></span> <?php the_category(' ,') ?></li>
                <li class="marx timer"><span class="marx wordicon-time"></span> <?php the_time(get_option('date_format')) ?></li>
                <li class="marx view"><span class="marx wordicon-eye"></span> 点击次数：<?php echo get_post_meta( get_the_ID(), 'tie_views', true ); ?></li>
              </ul>
            </div>

            <div class="marx news_con"> 

            	<?php the_content(); ?> 

            </div>

            <?php if (ha_get_option('post_copyright_auth')) { ?>
            	<div class="marx copytip">
              <?php echo ha_get_option('post_copyright') ?>
            	</div>
            	<?php 
            	
            } ?>
            
            
            <div class="marx tags"> <?php the_tags(null,' ');?>
              
               </div>
          </div>
          <!-- 文章结尾背景图片  勿删 -->
<!--           <img class="imgfooter" src="">
 -->
          <div class="marx nextpage">
            <p class="marx prev"><?php echo get_previous_post_link(); ?></p>

            <p class="marx next"><?php echo get_next_post_link(); ?></p>
          </div>
        </div>
        <div class="marx related-list">
          <h3 class="marx shugang">相关文章</h3>

          <ul>
          	<?php $r_query = new WP_Query(array(
          		'orderby' => 'rand',
          		'posts_per_page' => 8,
              'ignore_sticky_posts' => 1


          	));
          	while($r_query->have_posts()) : $r_query->the_post(); 

          	 ?>
            
            <li><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><i><img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>"></i>
              <p><?php the_title() ?></p>
              </a></li>
            <?php endwhile; ?>
            
           
            
          </ul>
        </div>
      </div>
    </div>
    <?php get_sidebar() ?>
  </div>
</div>

<?php
get_footer();
