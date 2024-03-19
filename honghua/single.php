<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package honghua
 */

get_header();
while (have_posts()) {
	# code...
	the_post(); tie_setPostViews(); ?>

	<div class="breadcrumbs clearfix">当前位置：<a href="index.htm">首页</a> &gt;&gt; <a href="index-5.htm?product/">黑茶产品</a> &gt;&gt; <a href="index-14.htm?product/p4/">百两茶</a></div>

	<div class="main clearfix">
		<div class="left main_l">
    <div class=" main_box_shadow  general-rules ">
      <div class="general-rules-cnt">
        <div class="general-rules-tit">
          <h1><?php the_title()?></h1>
          <div class="qt clearfix"> <span class="teaching"><?php the_time(get_option('date_format'))?></span><span class="system">分类：<?php the_category(' ') ?></span><span class="tuition"> 阅读：<?php echo get_post_meta(get_the_ID(), 'tie_views',true) ?></span> </div>
        </div>
        <div id="maximg"><table width="100%">
				<tbody>
							<tr>
								<td>
									<div>
										<?php the_content();?>

									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
        <div class="post-copyright"> 郑重声明：黑茶属于保健食品，不能直接替代药品使用，如果患有疾病者请遵医嘱谨慎食用，部分文章来源于网络，仅作为参考。</div>
        <div class="xline"> </div>
        <div class="xline"> </div>
        <?php if (get_previous_post()) { ?>
          <p>上一篇：<?php echo get_previous_post_link() ?></p>

          <?php 
          # code...
        } else { ?>
        <p>上一篇：没有了！</p>
        <?php 

        } ?>
        
        <?php if (get_next_post()) { ?>
          <p>下一篇:<?php echo '&nbsp;' . get_next_post_link() ?></p>
          <?php 
          # code...
        } else { ?>
        <p>下一篇：没有了！</p>

        <?php 

        } ?>
        
      </div>
      <div class="xline"> </div>
      
      <div class="callback_tit clearfix"> <span>相关推荐</span></div>
      <div class="guslike">
        <div class="guslike-body">
          <ul class="guslike-main clr guslike-main-cur">
            <?php 
            $th_q = new WP_Query(array(
              'ignore_sticky_posts' => 1,
              'meta_query' => array(array(
                'key' => '_thumbnail_id',
                'compare' => 'EXISTS'
              )),
              'posts_per_page' => 8

            ));
            while ($th_q->have_posts()) {
              $th_q->the_post(); ?>
              <li class="guslike-list fl"> 
                <a href="<?php the_permalink() ?>" class="guslike-list-imglink"><img class="all-img-block" src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>"></a> 
                <a href="<?php the_permalink() ?>" class="guslike-list-title"><?php the_title()?></a> </li>

              <?php 
              # code...
            } wp_reset_postdata();
            
            ?>
            
            
          </ul>
        </div>
      </div>
    </div>
    <div id="bm_form" class="callback main_box_shadow">  <a name="postform"></a>
<div class="mt1">
  <dl class="tbox">
    <div class="detail-head clearfix">
      <h3 class="detail-head-title fl"> 我要评论</h3>
    </div>
    <dd>
      <div class="dede_comment_post">
        <form onsubmit="return submitcomment(this);" data-action="/k310/?comment/add/&amp;contentid=64">
          <div class="clr"></div>
          <div class="related-read-main" id="_ajax_feedback">
            <div class="em-floor">
              <div class="biaodan">
                <textarea name="comment" required="" id="comment" cols="60" rows="5" placeholder="请输入内容"></textarea>
                
                <input type="text" name="checkcode" required="" id="checkcode" class="form-control" placeholder="请输入验证码">
                <img title="点击刷新" class="codeimg" style="height:40px;float: left;" src="core/code.php" onclick="this.src='/k310/core/code.php?'+Math.round(Math.random()*10);"> 
                <div class="dcmp-submit">
                  <button id="btn" type="submit" onclick="PostComment()">发表评论</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </dd>
  </dl>
</div>
<a name="commettop"></a>
<div class="related-read mb-10">
  <div class="detail-head clearfix">
    <h3 class="detail-head-title fl"> 网友评论</h3>
    <span>（只显示最近10条评论）</span> </div>
  <div class="related-read-main">
    <div class="em-floor">
      <div class="wpl">
        <ul>
          <dd id="commetcontent">  </dd>
        </ul>
      </div>
    </div>
  </div>
</div>
 
 </div>
  </div>
  
  <?php get_sidebar();?>
	</div>
	<?php 
}

?>

<?php
get_footer();
