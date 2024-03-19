<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package guowen
 */

get_header();
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
           

            <div class="marx news_con"> 

            	<?php the_content(); ?> 

            </div>

            
            
            <div class="marx tags"> <?php the_tags(null,' ');?>
              
               </div>
          </div>
          <!-- 文章结尾背景图片  勿删 -->
<!--           <img class="imgfooter" src="">
 -->
          
        </div>
        
      </div>
    </div>
    <?php get_sidebar() ?>
  </div>
</div>

<?php
get_footer();
