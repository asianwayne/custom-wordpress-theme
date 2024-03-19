<?php
/**
 * 产品文章类型单页模板
 * The template for displaying Single chanpin
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package honghua
 */

get_header();
while (have_posts()) {
	# code...
	the_post(); tie_setPostViews();  tie_breadcrumbs();?>

	<div class="main clearfix">
  <div class="left main_l">
    <div class="main_box_shadow  general-rules ">
      <div class="general-rules-cnt">
        <div class="text-center margin-big-middle-bottom"> 
          <!--Thisadd-->
          <div class="imgshow">
						<!-- 左侧图集幻灯片 -->
            <div class="imgshowl">
              <div class="swiper-container swiper-container-horizontal">
                <div class="swiper-wrapper"> 
									
                  <div class="swiper-slide swiper-slide-active" style="width: 564px; margin-right: 30px;"><img src="<?php the_post_thumbnail_url() ?>" alt=""></div>
                  
                  <div class="swiper-slide swiper-slide-next" style="width: 564px; margin-right: 30px;"><img src="uploads/allimg/200223/1-200223125407-50.jpg" alt=""></div>
                  
                  <div class="swiper-slide" style="width: 564px; margin-right: 30px;"><img src="uploads/allimg/200223/1-200223125407-51.jpg" alt=""></div>
                   </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev swiper-button-disabled"></div>
              </div>
              
              <!-- Initialize Swiper --> 
              <script>
							var swiper = new Swiper('.swiper-container', {
									pagination: '.swiper-pagination',
									paginationClickable: '.swiper-pagination',
									nextButton: '.swiper-button-next',
									prevButton: '.swiper-button-prev',
									spaceBetween: 30
							});
							</script> 
            </div>
						<!-- 右侧购买二维码 -->
            <div class="imgshowr">
              <h1 class="tit"><?php the_title();?></h1>
              <div class="price">¥500元/KG</div>
              <div class="xcxm"><img src="<?=ha_get_option('gmewm')['url']?>" alt="黑茶产品展示" width="180" data-bd-imgshare-binded="1"><span>扫码立即购买</span></div>
              <div class="tel"><s class="icon"></s><?=ha_get_option('hh_phone')?></div>
            </div>

            <div class="imgshowm">
              <h1 class="tit"><?php the_title();?></h1>
              <div class="buy-tit">
                <div class="buy-r"><a href="{dede:field.cpurl/}">立即购买</a></div>
                <div class="buy-r buy-r2"><b>产品价格：</b>¥500元/KG</div>
              </div>
            </div>
          </div>
          <!--Thisadd--> 
        </div>
        <div id="maximg">
					<?php the_content(); ?>
					
				</div>
        <div class="xline"> </div>
        
				<!-- 上一篇下一篇要根据文章内容来  下一版本更新 -->
        <p><?php echo get_previous_posts_link(); ?></p>
        <p><?php echo get_next_posts_link(); ?></p>

      </div>
      <div class="xline"></div>
    </div>
		<!-- 评论模板  下一版本更新 -->
		<h3 class="hint">评论模板下版本更新</h3>
    <div id="bm_form" class="callback main_box_shadow">  
			<a name="postform"></a>
				<div class="mt1">
  				<dl class="tbox">
						<div class="detail-head clearfix">
							<h3 class="detail-head-title fl"> 我要评论</h3>
						</div>
						<dd>
							<div class="dede_comment_post">
								<form onsubmit="return submitcomment(this);" data-action="/k310/?comment/add/&amp;contentid=747">
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
