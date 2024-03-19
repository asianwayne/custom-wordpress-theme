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
 * @package honghua
 */

get_header();
?>

<div class="main sign-up">
  <!-- 首页产品推荐 -->
  <?php do_action('before_product_show');?>
  <div id="fh5co-content_show" class="proshow">
    <div class="container">
      <div class="line">
        <div class="x12 text-center">
          <h2 class="full-screen-en-title" style="color:#952122;">香薰产品</h2>
        </div>
      </div>
      <div style="width:100%;">
        <ul class="navv text-center margin-big-middle-top margin-big-middle-bottom">
          <!-- 产品分类循环获取 --> 
          <?php $cp_cats = get_terms(array(
            'taxonomy' => 'sort',
            'hide_empty' => false,
            'parent' => 0
          )); 

          foreach ($cp_cats as $cat) { ?>
          <li><a href='<?php echo get_term_link($cat->term_id) ?>'><span><?php echo $cat->name; ?></span></a></li>
          <?php 
           
          }

          ?>
        </ul>
      </div>
      <div>
        <!-- 首页产品推荐开始 -->
        <ul class="prolist"> 

          <?php

          $cp_query = new WP_Query(array(
            'post_type' => 'chanpin',
            'posts_per_page' => 6 )
          ); 

          while($cp_query->have_posts()) {
            $cp_query->the_post(); get_template_part('template-parts/content', 'chanpin');

          } wp_reset_postdata();
          
          ?>
          
        </ul>
      </div>
    </div>
  </div>
  <!-- end of 首页产品推荐 -->
  
  <!-- 首页分类一 -->
  <?php 
  $h_cat_one_id = ha_get_option('h_cat_one');

  if (get_category($h_cat_one_id)) {

   ?>
    <div class="main-tit clearfix b-t1">
    <?php 
    
    $h_cat_one = get_category($h_cat_one_id);
    ?>
    <h2> <i></i><?= $h_cat_one->name ?><span>&nbsp;&nbsp;/ <?= $h_cat_one->slug; ?></span></h2>
  </div>
  <div class="main_cnt clearfix">
    <div class="main_cnt_l zhaosheng">
      <div class="news-calls">
        <h3> <i></i>热门资讯</h3>
        <ul>
          <?php 
          // orderby tie_views number 
          $popular_posts = new WP_Query(array(
            'cat' => $h_cat_one_id,
            'posts_per_page' => 8,
            'meta_key' => 'tie_views',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'ignore_sticky_posts' => 1,
          ));
          while($popular_posts->have_posts()) : $popular_posts->the_post(); 
          ?>
          <li><a href="<?php the_permalink() ?>" title="陈皮黑茶的功效与作用，黑茶的喝法"><?php the_title() ?></a></li>
          <?php endwhile;wp_reset_postdata(); ?>
        </ul>
      </div>
    </div>
    <div class="main_cnt_r">
      <div class="exam_cnt box_hover">
        <div class="news-calls clearfix">
          
        <!-- 第一行三列新闻 后期后台设置分类筛选  先框架做出来
         还是直接设置一个大分类 然后循环出下面小分类 然后循环文章 ？ 
      -->

      <?php  
      // 分类从后台获取
      $news_cat = get_categories(array(
        'child_of' => $h_cat_one_id
      ));

      foreach($news_cat as $news) { ?>

      <div class="news zhengce">
          <div class="news_tit clearfix"> <span><i></i><?php echo $news->name ?></span> <a href="index-31.htm?heichaxinwen/" title="黑茶新闻">more+</a> </div>
          <ul>
            <?php 
            $news_cat_posts = new WP_Query(array(
              'cat' => $news->term_id,
              'posts_per_page' => 8
            ));

            while($news_cat_posts->have_posts()) {
              $news_cat_posts->the_post(); ?>
              <li><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a><span><?php the_time('m-d') ?></span></li>
              <?php 
            } wp_reset_postdata();
            ?>
            
          </ul>
        </div>

      <?php 
      }
      ?> 
        </div>
      </div>
    </div>
  </div>

    <?php 
    
  } else { ?>

    <h2><?php _e('没有找到分类，去后台设置添加分类一','honghua') ?></h2>

    <?php 

  }

   ?>
</div>

<!-- 首页第二个分类开始 -->
<?php $h_s_cat_id = ha_get_option('h_cat_two');
if (get_category($h_s_cat_id)) { ?>
  <div class="main zhaosheng">  
  <!-- 分类从后台分类字段获取 
    第二个主要分类，藏红花的产地介绍 ？   -->
  <!--  主要分类为产地 功效  和价格  还有市场新闻  -->
  <?php 
  
  $h_s_cat = get_category($h_s_cat_id);  
  ?>
  <div class="main-tit clearfix  b-t2">
    <h2> <i></i><?= $h_s_cat->name ?><span>&nbsp;&nbsp;/ <?= $h_s_cat->slug ?></span></h2>
    <ul class="clearfix">
      <?php 
      $i = 1;
      $h_s_sub_cat = get_categories(array(
        'hide_empty' => false,
        'child_of' => $h_s_cat_id,
        'order' => 'DESC'
      )); 
      $number = count($h_s_sub_cat); 
      foreach ($h_s_sub_cat as $sub_cat) {  ?>

      <li id="cc<?=$i?>" class="<?php echo ($i == 1) ? 'hover' : '' ?>" onmouseover="setTab('cc',<?=$i?>,<?=$number?>)"><?=$sub_cat->name;?></li>

      <?php 
      $i++;
      }
      
      ?>

    </ul>
  </div>

  <div class="main_cnt clearfix">
    <!-- start of 热门推荐 -->
    <div class="main_cnt_l">
      <div class="news-calls">
        <h3> <i></i>热门推荐</h3>
        <ul>

          <?php 
          //大分类设置为藏红花产地
          //循环当前大分类下按tie_views排序的文章   ?> 

          <?php 
            $h_s_cat_p = new WP_Query(
            array(
              'cat' => $h_s_cat_id,
              'posts_per_page' => 12,
              'meta_key' => 'tie_views',
              'orderby' => 'meta_value_num',
              'order' => 'DESC'
            )
            ); 
          while($h_s_cat_p->have_posts()) : $h_s_cat_p->the_post();
            
            ?>
            <li><a href="<?php the_permalink() ?>" title="吃药可以喝茯茶吗？不可以"><?php the_title() ?></a></li>
          <?php endwhile; wp_reset_postdata(); ?>
          
        </ul>
      </div>
  </div>
  <!-- end of 热门推荐 -->


    <div class="main_cnt_r">

    <!-- foreach 大循环开始  -->

    <?php 
    $n = 1;
    foreach($h_s_sub_cat as $sub_cat) { ?>
      <div class="school_list <?php echo ($n == 1) ? 'box_hover' : '' ?> clearfix" id="con_cc_<?=$n?>"> 
      <?php 
      $sub_cat_query = new WP_Query(array(
        'cat' => $sub_cat->term_id,
        'posts_per_page' => 6,

      ));
      while($sub_cat_query->have_posts()) : $sub_cat_query->the_post();
      ?>
        <!-- 循环一 -->
        <dl class="clearfix">
          <dt><a href="index-68.htm?guangxiliubaocha/140.html"> <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title() ?>" width="62" height="62"></a></dt>
          <dd> <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
            <p><?php echo mb_strimwidth(strip_tags(get_the_content()),0,120,'...'); ?></p>
            <p class="see"><span class="fbtime"><?php the_time(get_option('date_format')) ?></span><span class="click">浏览：<?php echo get_post_meta(get_the_ID(),'tie_views',true); ?></span></p>
          </dd>
        </dl>
        <?php endwhile; wp_reset_postdata(); ?>
        <!-- end of 循环一 -->
      </div>
      <?php 
      $n++;

    } ?>

    </div>
  </div>
</div>
<!-- 第二个分类结束 -->


  <?php 
} else { ?>
  <div class="main"><div class="main-tit clearfix  b-t2"><h2><?php echo __( '没有找到分类二，去后台设置分类二', 'honghua' );  ?></h2></div></div>

  <?php 

}

 ?>


<!-- 第三个分类开始分类从后台字段获取 -->
<?php 
$h_t_cat_id = ha_get_option('h_cat_three'); 
if (get_category($h_t_cat_id)) { ?>
  <div class="main exam">
  <?php 
  
  $h_t_cat = get_category($h_t_cat_id);  ?>
  <div class="main-tit clearfix b-t3">
    <h2> <i></i><?php echo $h_t_cat->name; ?><span>&nbsp;&nbsp;/ <?php echo $h_t_cat->slug; ?></span></h2>
    <ul class="clearfix">
      <?php 
      $t = 1;
      $h_t_sub_cat = get_categories(array(
        'child_of' => $h_t_cat_id,
        'hide_empty' => false,
      ));
      $h_t_sub_count = count($h_t_sub_cat);
      foreach($h_t_sub_cat as $sub_cat) { ?>
      <li id="dd<?=$t?>" class="<?php echo ($t == 1) ? 'hover' : '' ?>" onmouseover="setTab('dd',<?=$t?>,<?=$h_t_sub_count?>)"><?=$sub_cat->name?></li>
      <?php 

        $t++;
      }
      ?>
      
    </ul>
  </div>

  <!-- 热门 首页是h 第一是f 第二是s 第三是t  分类是cat 热门是p -->
  <div class="main_cnt clearfix">
    <div class="main_cnt_l  zhaosheng">
      <div class="news-calls">
        <h3> <i></i>推荐阅读</h3>
        <ul>
          <?php 
          $h_t_cat_p = new WP_Query(
            array(
              'cat' => $h_t_cat_id,
              'posts_per_page' => 12,
              'meta_key' => 'tie_views',
              'orderby' => 'meta_value_num',
              'order' => 'DESC'
            )
            );
            while($h_t_cat_p->have_posts()) : $h_t_cat_p->the_post();
          ?>
          <li><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title(); ?></a></li>
          <?php endwhile; wp_reset_postdata(); ?>
          
        </ul>
      </div>
    </div>
    <!-- 右侧部分 -->
    <div class="main_cnt_r">
      <?php 
      $d = 1;
      foreach($h_t_sub_cat as $sub_cat) :  ?>
      <div class="exam_cnt <?php echo ($d == 1) ? 'box_hover' : '' ?>" id="con_dd_<?=$d;?>">
        <div class="course-tuijian">

        <!-- 标题 -->
          <div class="course-tuijian-tit clearfix"> <span><i></i><?=$sub_cat->name;?></span> <a href="index-94.htm?heichadegongxiao/nanxinggongxiao/" class="more" title="男性功效">more+</a> </div>

          
          <div class="course-tuijian-cnt clearfix">  
            <!-- 每个分类下带图帖子 四篇  可以是置顶文章  可以是随机文章   -->
            <?php 
            $h_t_cat_q_r = new WP_Query(array(
              'cat' => $sub_cat->term_id,
              'posts_per_page' => 4,
              'orderby' => 'rand',
            ));
            while($h_t_cat_q_r->have_posts()) : $h_t_cat_q_r->the_post();
            ?>
            <a class="a1" href="<?php the_permalink() ?>" title="<?php the_title() ?>"> 
              <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>" width="196" height="90"><span><?php the_title() ?></span></a>
              <?php endwhile;wp_reset_postdata();?>
          </div>
        </div>

        <div id="wrapper" class="news-calls-box">
          <div class="scroll03 news-calls clearfix">
            <div class="news">
              <ul>
                <!-- 全部文章  每五添加div news 和 ul -->
                <?php 
                $breaker = 1; 
                $h_t_cat_q_a = new WP_Query(array(
                  'cat' => $sub_cat->term_id,
                  'posts_per_page' => 15,
                ));
                while($h_t_cat_q_a->have_posts()) : $h_t_cat_q_a->the_post(); if($breaker % 5 == 0) {
                  $after_html = '</ul></div><div class="news">
              <ul>';
                } else {
                  $after_html = '';
                } ?>
                <li><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></li>
              <?php echo $after_html; $breaker++;endwhile; ?>
              </ul>
            </div>
            <!-- 每五添加news 和 ul的html  -->
          </div>
        </div>
      </div>
      <!-- end of foreach -->
      <?php $d++;endforeach; ?>
      
    </div>
  </div>
</div>

  <?php 
  
} else { ?>
  <div class="main"><div class="main-tit clearfix  b-t2"><h2><?php echo __( '没有找到分类三，去后台设置分类三', 'honghua' );  ?></h2></div></div>

  <?php 

}

 ?>

<?php $h_fo_cat_id = ha_get_option('h_cat_four'); 
if (get_category($h_fo_cat_id)) { $h_fo_cat = get_category($h_fo_cat_id); ?>
  <!-- 第四个分类 -->
  <div class="main  jiaoliu">
  <div class="main-tit clearfix b-t4">
    <h2> <i></i><?php echo $h_fo_cat->name; ?><span>&nbsp;&nbsp;/ <?php echo $h_fo_cat->slug; ?></span></h2>
  </div>
  <div class="main_cnt clearfix">
    <div class="main_cnt_l zhaosheng">
      <div class="news-calls">
        <h3> <i></i>推荐阅读</h3>
        <ul>
          <?php 
          $h_fo_cat_q_p = new WP_Query(array(
            'cat' => $h_fo_cat_id,
            'posts_per_page' => 8,
            'meta_key' => 'tie_views',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
          ));
          while($h_fo_cat_q_p->have_posts()) : $h_fo_cat_q_p->the_post();
          
          ?>
          <li><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></li>
          <?php endwhile;wp_reset_postdata();?>
          
        </ul>
      </div>
    </div>

    <div class="main_cnt_r">
      <div class="news-calls clearfix">
        
        <?php 
        $h_fo_sub_cat = get_categories(array(
          'child_of' => $h_fo_cat_id,
          'hide_empty' => false,
        ));
        
        foreach ($h_fo_sub_cat as $sub_cat) { ?>
        <div class="news">
          <div class="news_tit clearfix"> <span><?=$sub_cat->name?></span> <a href="" title="<?=$sub_cat->name?>">more+</a></div>
          <ul>
            <?php 
            $h_fo_sub_cat_q = new WP_Query(array(
              'cat' => $sub_cat->term_id,
              'posts_per_page' => 10,
            ));
            while($h_fo_sub_cat_q->have_posts()) : $h_fo_sub_cat_q->the_post();
            ?>
            <li><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title();?></a><span><?php the_time('m-d')?></span></li>
            <?php endwhile;wp_reset_postdata();?>
          </ul>
        </div>

        <?php 
        }
        ?>
      </div>
    </div>
  </div>
</div>


  <?php 
  
} else { ?>

  <div class="main"><div class="main-tit clearfix  b-t2"><h2><?php echo __( '没有找到分类四，去后台设置分类四', 'honghua' );  ?></h2></div></div>

  <?php 

}

 ?>


<!-- 第五个分类和第一个第四个分类都是一样， 有需求都可以扩展，然后通过后台选择分类id  -->

<?php do_action('after_homepage_category'); ?>
<div class="link">
  <!-- 后台菜单设置 -->
  <h2> 友情链接 :</h2>
  <div class="link-cnt clearfix"> 
    <?php 
    $friendlylinks = wp_nav_menu(array(
      'menu' => 'friendlylinks',
      'echo' => false,
      'items_wrap' => '%3$s',
      'container' => false, 
    ));

    echo strip_tags($friendlylinks,'<a>');
    
    ?>
  </div>
</div>

<!-- footer --> 

<?php 
do_action('before_footer');
get_footer();
