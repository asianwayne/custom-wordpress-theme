<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hastart
 */
tie_setPostViews();
get_header();

?>
<div class="container">
  <section class="index_cont list_content">
    <div class="main_cont clear">
      <div class="list-cont fl">
        <nav class="breadcrumb"> 
					<?php echo tie_breadcrumbs(); ?> </nav>
          <?php do_action( 'ads_befores_title' ); ?>
         
        <div class="recommend_list mod_list">
          <div class="detail_main">
            <h1 style="font-weight: bold"><?php the_title(); ?></h1>
            <p class="meta"> <span><i class="fa fa-user-circle"></i><?php the_author() ?></span> <span><i class="fa fa-eye"></i><?php echo get_post_meta($post->ID,'tie_views',true) ?></span> <span><i class="fa fa-clock-o"></i><?php the_time(get_option('date_format')) ?></span> </p>

            <?php if (ha_get_option('banner_before_post_switch')) { ?>
              <!-- 电脑banner -->
              <div class="pcd_ad">

              <!-- above single banner -->
              <table width="860" height="90" bgcolor="#1663FF">    <tbody><tr align="center">      <td style="text-align: center;color: #fff;line-height: 90px;">后台-全局-定制标签-内容页头部广告位（PC）</td>    </tr>  </tbody></table>
              
            </div>

            <!-- 手机banner -->
            <div class="mbd_ad"><br><br><br><br>
          <table width="100%" height="90" bgcolor="#1663FF">    <tbody><tr align="center">      <td style="text-align: center;color: #fff;line-height: 90px;">后台-全局-定制标签-内容页头部广告位（手机）</td>    </tr>  </tbody></table>
          </div>

              <?php 
              
            } ?>
            

			
		<!-- end of above single banner -->
            <div class="detail_article">
							<?php the_content()?>

			      </div>

            <!-- like box -->
            <div class="like-box">
              <div class="like-btn" style="display: inline-block;" data-post-id="<?php the_ID() ?>">
                <i class="fa-2x fa fa-heart-o"></i>
              </div>
              
              <span class='like-count' style="font-size: 2.5rem;margin-left: 1.5rem;"><?php echo get_post_meta( get_the_ID(), 'likeCount', true ); ?></span>
            </div>


      <?php if (ha_get_option('under_post_banner_switch')) { ?>

        <!-- bottom single banner -->
      <div class="pcd_ad">
        <table width="860" height="90" bgcolor="#1663FF">    <tbody><tr align="center">      <td style="text-align: center;color: #fff;line-height: 90px;">后台-全局-定制标签-内容页底部广告位（PC）</td>    </tr>  </tbody></table>
      </div>
      <div class="mbd_ad"><br><br><br><br><table width="100%" height="90" bgcolor="#1663FF">    <tbody><tr align="center">      <td style="text-align: center;color: #fff;line-height: 90px;">后台-全局-定制标签-内容页底部广告位（手机）</td>    </tr>  </tbody></table></div>
      <!-- end of bottom single banner -->

        <?php 
        
      } ?>

            <div class="article_footer clear">
              <div class="fr tag"><?php the_tags() ?></div>
              <div class="bdsharebuttonbox fl share"> 
								<!-- 这里放分享小工具 -->
                <!-- <a>分享：</a> <a href="#" class="bds_weixin fa fa-weixin" data-cmd="weixin" title="分享到微信"></a> <a href="#" class="bds_sqq fa fa-qq" data-cmd="sqq" title="分享到QQ好友"></a> <a href="#" class="bds_tsina fa fa-weibo" data-cmd="tsina" title="分享到新浪微博"></a>  -->
							</div>
              
            </div>
            <!-- 广告位ad4  -->

            <div class="post-navigation clear">
              <div class="post-previous fl"><?php echo get_previous_post_link() ?></div>
              <div class="post-next fr"><?php echo get_next_post_link() ?></div>
            </div>
          </div>
          <div class="related_article">
            <div class="box_title clear"> <span>相关文章</span> </div>
						<!-- relate posts -->
						<div class="related_list clear">

						<?php

						$r_cats = wp_get_object_terms($post->ID, 'category', array('fields' => 'ids'));

						$r_posts = new WP_Query(
							array(

								'posts_per_page' => 3,
								'orderby' => 'rand',
								'tax_query' => array( //也可以直接用 'cat' => 参数 
									array(
										'taxonomy'  => 'category',
										'fields'  => 'id',
										'terms'  => $r_cats
									)
									),
									'post__not_in'  => array($post->ID)
							)
						);
						while($r_posts->have_posts()) : $r_posts->the_post();
						?>
              <article class="fl">
                      <div class="related_img"><a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url() ?>" onerror="this.src='<?php echo ha_get_option('on_error')['url'] ?>'"></a></div>
                      <div class="related_detail">
                        <h3><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title()?></a></h3>
                        <div class="meta"> <span><i class="fa fa-eye"></i><?php echo get_post_meta(get_the_ID(),'tie_views',true) ?></span> <span><i class="fa fa-clock-o"></i><?php the_time(get_option('date_format')) ?></span> </div>
                      </div>
                    </article>
              <?php endwhile;
                  wp_reset_postdata(); ?>
            </div>
          </div>
        </div>
      </div>

      <?php get_sidebar()?>
    </div>
  </section>
</div>
	

<?php
//get_sidebar();
get_footer();
