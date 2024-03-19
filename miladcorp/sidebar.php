<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package miladcorp
 */


?>

<div id="sidebar">
      <section class="widget theme divContact">
        <h3 class="sidetitle">联系我们</h3>
        <div class="textwidget">
          <div class="clear tel">
            <div class="box">
              <h4><i class="ri-customer-service-line"></i> 咨询电话：</h4>
              <span><?php echo ha_get_option('ns-contact')['phone'] ?></span> </div>
          </div>
          <div class="info">
            <p class="qr"> <img src="<?php echo ha_get_option('wechat_qr')['url'] ?>" alt="微信"> </p>
            <h4>微信扫描二维码</h4>
            <p>联系我们了解更多</p>
          </div>
          <div class="info">
            <p class="qr"> <img src="<?php echo ha_get_option('tiktok_qr')['url'] ?>" alt="抖音"> </p>
            <h4>抖音扫描二维码</h4>
            <p>关注我们了解更多</p>
          </div>
         <div class="clear"></div>
        </div>
      </section>
      <section class="widget system divTags">
        <h3 class="sidetitle">标签列表</h3>
        <?php wp_tag_cloud( array('format'  => 'list') ); ?>
      </section>
      <section class="widget system divPrevious">
        <h3 class="sidetitle">最近发表</h3>
        <ul>
          <?php 
          $r_query = new WP_Query(array(
            'post_type'  => 'post',
            'posts_per_page'  => 5


          ));

          while ($r_query->have_posts()) {
            $r_query->the_post(); ?>
            <li><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>

            <?php 
              
          }
           ?>
          
          
         
          
        </ul>
      </section>
     
    </div>
