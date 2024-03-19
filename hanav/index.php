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
 * @package hanav
 */

get_header();
?>

<div id="mask"></div>
<p class="index-breadcrumb"></p>
<div id="banner-bear" class="preserve3d csstransforms3d">
  <p class="typing web-font transition">免费收录站长们的网站</p>
  <div class="primary-menus">
    <ul class="selects">
      <li>常用</li>
      <li class="current" data-target="search_1"><span>百度</span></li>
      <li data-target="search_2"><span>Bing</span></li>
      <li data-target="search_3"><span>360</span></li>
      <li data-target="search_4"><span>搜狗</span></li>
      <li data-target="search_5"><span>天猫</span></li>
      <li data-target="search_6"><span>淘宝</span></li>
      <li data-target="search_7"><span>知乎</span></li>
      <li data-target="search_8"><span>站内</span></li>
    </ul>
    <div class="cont">
      <div class="left-cont">
        <form class="search" id="search_1" action="https://www.baidu.com/s?wd=" method="get" target="_blank">
          <input type="text" name="wd" class="s" placeholder="请输入关键词">
          <button type="submit" name="" class="btn">百度搜索</button>
        </form>
        <form class="search hidden" id="search_2" action="https://cn.bing.com/search?q=" method="get" target="_blank">
          <input type="text" name="q" class="s" placeholder="请输入关键词">
          <button type="submit" name="" class="btn">Bing搜索</button>
        </form>
        <form class="search hidden" id="search_3" action="https://www.so.com/s?q=" method="get" target="_blank">
          <input type="text" name="q" class="s" placeholder="请输入关键词">
          <button type="submit" name="" class="btn">360搜索</button>
        </form>
        <form class="search hidden" id="search_4" action="https://www.sogou.com/web?query=" method="get" target="_blank">
          <input type="text" name="query" class="s" placeholder="请输入关键词">
          <button type="submit" name="" class="btn">搜狗搜索</button>
        </form>
        <form class="search hidden" id="search_5" action="https://list.tmall.com/search_product.htm?q=" method="get" target="_blank">
          <input type="text" name="q" class="s" placeholder="请输入关键词">
          <button type="submit" name="" class="btn">天猫搜索</button>
        </form>
        <form class="search hidden" id="search_6" action="https://s.taobao.com/search?q=" method="get" target="_blank">
          <input type="text" name="q" class="s" placeholder="请输入关键词">
          <button type="submit" name="" class="btn">淘宝搜索</button>
        </form>
        <form class="search hidden" id="search_7" action="https://www.zhihu.com/search?q=" method="get" target="_blank">
          <input type="text" name="q" class="s" placeholder="请输入关键词">
          <button type="submit" name="" class="btn">知乎搜索</button>
        </form>
		<form class="search hidden" id="search_8" name="formsearch" action="<?php echo home_url('/') ?>" method="post">
          <input type="text" name="s" class="s" placeholder="请输入关键词">
          <button type="submit" class="btn">站内搜索</button>
        </form>
      </div>
    </div>
  </div>
  <div class="submit fr"> <a href="<?php echo home_url('/shoulu') ?>" target="_blank" class="a transition"><i class="fa fa-heart"></i>投稿</a> </div>
  <!-- banner background 横幅背景 -->
  <div class="banner-wrap scenes-ready">
    <div id="stage">
      <div class="space"></div>
      <div class="mountains">
        <div class="mountain mountain-1"></div>
        <div class="mountain mountain-2"></div>
        <div class="mountain mountain-3"></div>
      </div>
      <div class="bear"></div>
    </div>
  </div>
</div>

<div class="container"> 
  <!-- 广告位AD1  --> 
  <div class="row justify-content-center">
    <div class="col-md-12 text-center">
      <img class="img-responsive shadow-lg mx-auto" src="<?php echo ha_get_option('home_above')['url'] ?>" alt="米拉德米店">
    </div>
  </div> 

  <div></div>
  
  <!-- 收录统计  -->
  <div class="row row-position">
    <div class="col-md-12">
      
      <div class="part" id="cate19" data-title="新闻资讯">
        <!-- 标题 -->
        <p class="tt sticky"> <strong>新闻资讯</strong> <a title="更多新闻资讯" href="<?php  ?>">更多+</a> </p>
        <!-- end of 标题 -->
        <div class="items">
          <div class="row">
            <?php 
            
            $news_query = new WP_Query(array(
              'posts_per_page' => 4,
              'ignore_sticky_posts' => 1,
              'orderby'  => 'rand'
            ));
            
            while($news_query->have_posts()) : $news_query->the_post(); ?>
            
            <div class="col-xs-6 col-sm-4 col-md-3">
              <div class="item art-item transition" style="padding-top:10px"> 
                <!-- 可加可不加  文章缩略图 -->
                <!--<a class="art-a" href="index-21.htm?news/22.html" title="做好前端网页优化，让你的网站浏览量爆满" target="_blank"> <img class="img-cover" src="<?php //the_post_thumbnail_url(); ?>" alt="做好前端网页优化，让你的网站浏览量爆满" title="做好前端网页优化，让你的网站浏览量爆满"> </a> -->
                <h3 class="art-title"><a href="<?php the_permalink() ?>" target="_blank"><?php the_title() ?></a></h3>
                <p><?php echo mb_strimwidth(strip_tags(get_the_content()),'0','150','...') ?></p>
              </div>
            </div>
            <?php endwhile;wp_reset_postdata(); ?>
            
          </div>
        </div>
      </div>
      
      <!-- 导航循环开始 -->
      <?php 
      $fenlei = get_terms(array(
        'taxonomy' => 'fenlei',
        'hide_empty' => false

      ));

      foreach($fenlei as $tax) : 
      ?>
      <div class="part" id="cate2" data-title="<?php echo $tax->name; ?>">
        <p class="tt sticky"> <strong><?php echo $tax->name;?></strong> <a title="<?php echo $tax->name; ?>" href="<?php echo get_term_link($tax->term_id) ?>">更多+</a> </p>
        <div class="items">
          <div class="row">
            <?php 
            $fenlei_q = new WP_Query(array(
              'post_type' => 'daohang',
              'tax_query' => array(
                array(
                'taxonomy' => 'fenlei',
                'field' => 'id',
                'terms' => array($tax->term_id),
                'operator' => 'IN'
              ),)
              
            ));

            while($fenlei_q->have_posts()) : $fenlei_q->the_post();
            
            ?>
            <div class="col-xs-6 col-sm-4 col-md-3">
              <div class="item"> 
                <a class="link" target="_blank" href="<?php the_permalink() ?>" rel="nofollow">
                  <i class="autoleft fa fa-angle-right" title="直达网站"></i>
                </a> 
                <a class="a" href="<?php the_permalink() ?>" title="js特效网" target="_blank"> 
                <?php if (has_post_thumbnail()) { ?>
                  <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>">

                  <?php 
                  # code...
                }?>
                

                <h3><?php the_title()?></h3>
                <p><?php echo get_post_meta(get_the_ID(),'navdesc',true)?></p>
                </a> </div>
            </div>
            <?php endwhile;?>
            
          </div>
        </div>
      </div>
      <?php endforeach;?>
            
      
    </div>
  </div>
  <div class="f-link part">
    <p class="tt"><strong>友情链接</strong></p>
    <?php 
    wp_nav_menu(array(
      'menu' => '友情链接',
      'container' => false,
      'menu_id' => 'flink',
      'menu_class' => 'container',


    ));
    ?>
    
  </div>
</div>

<?php
get_footer();
