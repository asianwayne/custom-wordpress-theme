<?php /**
 * Template for displaying the posts 
 */ ?>
<div class="row">
<div class="item art-item transition" style="padding-top: 1rem;"> 
  <!-- 可加可不加  文章缩略图 -->
  <!--<a class="art-a" href="index-21.htm?news/22.html" title="做好前端网页优化，让你的网站浏览量爆满" target="_blank"> <img class="img-cover" src="" alt="做好前端网页优化，让你的网站浏览量爆满" title="做好前端网页优化，让你的网站浏览量爆满"> </a> -->
  <h3 class="art-title"><a class="" href="<?php the_permalink() ?>"><?php the_title()?></a></h3>
  <p style="">发布时间：<?php the_time(get_option('date_format')) ?> <span style="margin-left:5px">分类：</span><?php the_category(' ');?><span style="margin-left:5px">浏览次数：<?php echo get_post_meta(get_the_ID(), 'tie_views',true) ?></span></p>
</div>
 </div>