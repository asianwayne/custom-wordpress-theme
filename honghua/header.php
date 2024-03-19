<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package honghua
 */

?>

<!DOCTYPE html>
<html <?php language_attributes()?>>
<head>
<meta charset="<?php bloginfo('charset')?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head();?>
</head>
<body <?php body_class()?>>
<div class="hy_top clearfix">
  <h1><?php echo bloginfo('name')?></h1>
  <div class="hy_top_con clearfix"><span><?php _e('欢迎访问主题网站', 'honghua')?></span>
    <div class="fenxiang"> 
      <!-- 头部导航1 原来导航虽然有class 但是不影响 -->
      <?php 
      $topbarnav = array(
        'menu' => 'topbarmenu',
        'container' => false, 
        'echo' => false,
        'items_wrap' => '%3$s',
        'depth' => 0
      );

      echo strip_tags(wp_nav_menu($topbarnav),'<a>');
      ?>
      
  </div>
  
</div>
</div>
<!--search star-->
<div class="head">
  <div class="head_cnt clearfix">
    <!-- if has logo show the logo if not show the website title -->
    <div class="logo"> 
      <a href="<?php echo esc_url(home_url('/')) ?>"> 
        <?php if (!empty(ha_get_option('theme_logo')['url'])) { ?>
        <img src="<?php echo ha_get_option('theme_logo')['url']  ?>" width="300" height="62" alt="<?php echo bloginfo('name') ?>" style="height:62px;">
          <?php 
        } else { ?>
        <h2><?php bloginfo('name')?></h2>
        <?php 
        }
        ?>
      </a> 
      <!-- 添加钩子来添加slogo ，如果需要的话 -->
      <?php do_action('after_logo',$post);?>
    </div>
    <div class="search clearfix">
      <form name="formsearch" action="" method="post" id="soform1" class="clearfix">
        <div class="search-input">
          <input id="bdcsMain" name="s" type="text" placeholder="输入你的搜索内容">
        </div>
        <div class="search-button">
          <input class="search-but" id="search_an" type="submit" value="搜索">
        </div>
      </form>
    </div>
    <a class="btn-menu" id="click_mmeun"></a> </div>
</div>
<!--search end--> 
<!--nav-box star-->
<div class="nav-box">
  <div class="nav">
    <div class="container clearfix">
      <div class="clearfix">  
        
      <?php $mainnav = array( 'theme_location' => 'menu-1','container' => false,'echo' => false,'items_wrap' => '%3$s','depth' => 0 ); echo strip_tags(wp_nav_menu($mainnav),'<a>') ?>
      
      </div>
    </div>
  </div>
  <div class="container clearfix">
    <div class="tab">
      <div class="tabList"> <span class="all_course"> <a href="<?php echo esc_url(home_url('/')) ?>">网站首页</a></span> </div>
    </div>
  </div>
  <div class="mobile-nav clearfix" style="display: none">  <a href="index-5.htm?product/"><img src="skin/images/nav_01.png" alt="">黑茶产品</a>  <a href="index-6.htm?heichaziliao/"><img src="skin/images/nav_02.png" alt="">黑茶资料</a>  <a href="index-7.htm?heichafenlei/"><img src="skin/images/nav_03.png" alt="">黑茶分类</a>  <a href="index-8.htm?heichadegongxiao/"><img src="skin/images/nav_04.png" alt="">黑茶的功效</a>  <a href="index-2.htm?heichadejiage/"><img src="skin/images/nav_05.png" alt="">黑茶的价格</a>  <a href="index-3.htm?heichazenmehe/"><img src="skin/images/nav_06.png" alt="">黑茶怎么喝</a>  <a href="index-4.htm?heichazhongzhi/"><img src="skin/images/nav_07.png" alt="">黑茶种植</a>  <a href="index-9.htm?ask/"><img src="skin/images/nav_08.png" alt="">黑茶问答</a>  </div>

        <?php if (is_front_page()) { ?>
          <!-- 轮播图片 begin-->
            <div class="swiper-container">
              <div class="swiper-wrapper"> 
                <?php $slider_query = new WP_Query(array(
                  'post_type' => 'tie_slider'
                ));
                
                while($slider_query->have_posts()) {
                  $slider_query->the_post(); 
                  $custom = get_post_custom($post->ID);
                  $slider = unserialize($custom['custom_slider'][0]);
                  $i = 0;

                  if(!empty($slider)) {
                    foreach ($slider as $slide) {
                      $i++;
                      $image = wp_get_attachment_image_url($slide['id'],'slider'); ?>
                      <div class="swiper-slide"><img src="<?=$image?>" alt="banner1"></div>

                      <?php 
                    }
                  }
                }
                
                ?>
                </div>
              <!-- Add Pagination -->
            </div>

          <?php 
          # code...
        }?>
  <!--Thisadd--> 
</div>


<div class="mobile-nav clearfix" style="display: none">
    
    <a href="index-5.htm?product/"><img src="skin/images/nav_01.png" alt="">黑茶产品</a>
    
    <a href="index-6.htm?heichaziliao/"><img src="skin/images/nav_02.png" alt="">黑茶资料</a>
    
    <a href="index-7.htm?heichafenlei/"><img src="skin/images/nav_03.png" alt="">黑茶分类</a>
    
    <a href="index-8.htm?heichadegongxiao/"><img src="skin/images/nav_04.png" alt="">黑茶的功效</a>
    
    <a href="index-2.htm?heichadejiage/"><img src="skin/images/nav_05.png" alt="">黑茶的价格</a>
    
    <a href="index-3.htm?heichazenmehe/"><img src="skin/images/nav_06.png" alt="">黑茶怎么喝</a>
    
    <a href="index-4.htm?heichazhongzhi/"><img src="skin/images/nav_07.png" alt="">黑茶种植</a>
    
    <a href="index-9.htm?ask/"><img src="skin/images/nav_08.png" alt="">黑茶问答</a>
    
</div>
<!--nav-box end-->
