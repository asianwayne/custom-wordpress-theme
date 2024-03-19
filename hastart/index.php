<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hastart
 */

get_header();
?>

<div class="top_intro">
  <!-- 焦点图信息 -->
  <div class="intro_detail container">
    <div class="intro_border">
      <div class="intro_content">
        <h3>//  <?php bloginfo('name') ?>  //</h3>
        <p><?php echo ha_get_option('site_intro'); ?></p>
	  </div>
    </div>
  </div>
  <!-- top closed banner -->
  
    <img src="<?php echo ha_get_option('default_banner')['url'] ?>" alt="<?php bloginfo('name') ?>" title="<?php bloginfo( 'name' ); ?>"> </div>
  

<div class="container">

  <section class="index_cont">
    
    <h2 class="section-title"><span>置顶文章</span></h2>
    <div class="column clear">

      <!-- 置顶文章 -->
	   
      <?php
      $f_sticky = new WP_Query(
        array(
          'post__in'  => get_option('sticky_posts'),
          'posts_per_page' => 4,
          'ignore_sticky_posts'  => true
        )
      );
      
      while($f_sticky->have_posts()) : $f_sticky->the_post(); 
      
      ?>
      <div class="part fl"> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php the_post_thumbnail_url() ?>" onerror="this.src='<?php echo ha_get_option('on_error')['url'] ?>'" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"></a>
          <div class="shadow"></div>
          <?php
          //get the assianated categories from backends 
          
          $s_cats = get_the_category(); 
          foreach($s_cats as $cat) { ?>

          <a href="<?php echo get_category_link($cat->term_id) ?>" class="post_tag"><?php echo $cat->name; ?></a>

          <?php 
          }
          ?>
          <div class="bottom_banner border-box">
            <h2 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title(); ?></a></h2>
            <div class="post_data"> <span class="like_num "><i class="fa fa-eye"></i><i class="icon-Shape9"></i><span class="num"><?php echo get_post_meta(get_the_ID(),'tie_views',true) ?></span></span><i class="fa fa-clock-o"></i><span class="num"><?php the_time(get_option('date_format')) ?></span></div>
          </div>
      </div>
      <?php endwhile;
      wp_reset_postdata(); ?>
      <!-- end of 置顶 -->
      
    </div>

    <div class="main_cont" id="main_part">
      <!-- 下个版本更新判断是否存在广告不然不显示任何或者显示替代 ， pcd_ad 在css 设置了手机端无法显示，手机显示的是mbd_ad-->
      <div class="pcd_ad" style="margin-bottom:40px">
        <!-- img url media image alt text img link url  -->
        <a href="<?php echo ha_get_option('banner_before_sticky_link') ?>" title="<?php echo ha_get_option('banner_before_sticky_alt') ?>">
          <img src="<?php echo ha_get_option('banner_before_sticky')['url'] ?>" alt="<?php echo ha_get_option('banner_before_sticky_alt') ?>"></a>
         
      </div>

      <div class="list-cont">
        <h2 class="section-title"><span>最新文章</span></h2>

        <div class="recommend_list mod_list" id="main_list">
          <ul class="article-list clear">
            
            <?php 
            // 这是置顶的剩下的帖子,  暂时无法实现上面循环置顶帖子前4这里循环置顶帖子的后面6
            //这里就循环最新帖子，因为这里是blog page， 所以循环的是默认的posts 
            $r_posts = new WP_Query(
              array(
                'posts_per_page'  => 6,
                'ignore_sticky_posts' => 1
              )
            );
            while($r_posts->have_posts()) : $r_posts->the_post(); 
            
            ?>
        <li class="post_part clear"> <a href="<?php the_permalink() ?>" class="pic"> <img class="lazy" src="<?php the_post_thumbnail_url() ?>" onerror="this.src='<?php echo ha_get_option('on_error')['url'] ?>'" alt="" title="<?php the_title() ?>" width="200" height="150"> </a>
          <div class="cont">
            <h3 style="white-space:nowrap"><a href="<?php the_permalink() ?>" class="title" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>

            <div class="info"> <span class="author"> 
              <?php $r_posts_cats = get_the_category();
              foreach($r_posts_cats as $cat) { ?>
              <a href="<?php echo get_category_link($cat->term_id) ?>" class="name"><?php echo $cat->name; ?></a>
              <?php 

              }
              ?>
               
              <span class="gap_point">•</span><span><?php the_time(get_option('date_format')) ?></span> </span> </div>

            <p class="summary"><?php echo mb_strimwidth(strip_tags(get_the_content()),0,150) ?> </p>
          </div>
        </li>
        <?php endwhile;
            wp_reset_postdata(); ?>
            
          </ul>
        </div>
      </div>
      <!-- end of 最新文章 -->
    </div>
   <div class="pcd_ad">
    <!-- home middle banner for pc -->
    <a href="https://www.xmdn.net/category/网站开发教程/" title="网站开发教程，电脑装机教程"><img src="<?php echo ha_get_option('home_middle')['url'] ?>" alt="<?php bloginfo('name') ?>"></a>
    
  </div>
   <div class="mbd_ad">
    <!-- home middle ads for phone  -->
    <table width="100%" height="90" bgcolor="#1663FF"><br>		<tr align="center"><br>      <td style="text-align: center;color: #fff;line-height: 90px;">西门电脑教程网</td><br>    </tr><br>  </table>
  </div>
  <!-- end of banner -->
    
    <div class="slider_wraper clear">
      
    <!-- all categories with posts  -->
    <?php 
    
   
    $all_cats = ha_get_option('home_cats');
    
    foreach ($all_cats as $single_cat) {
       ?>
      <div class="slider_side fl" style="min-height:545px">
        <div class="side_title"><span><?php echo get_cat_name($single_cat) ?></span><a href="<?php echo get_category_link($single_cat) ?>" class="fr">更多</a></div>
        <ul>
        
        <?php
        $single_cat_posts = new WP_Query(
          array(
            'cat'  => $single_cat,
            'posts_per_page'  => 8,
            'ignore_sticky_posts'  => true,
          )
        );

        while($single_cat_posts->have_posts()) : $single_cat_posts->the_post();
        
        ?>
        <li class="clear"> <i></i><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a><span class="fr"><?php the_time(get_option('date_format')) ?></span> </li>
        <?php endwhile;
        wp_reset_postdata(); ?>
          
        </ul>

      </div>

      <?php 
    }        
    
    ?>
      
    </div>
  </section>
</div>

<?php
get_footer();
