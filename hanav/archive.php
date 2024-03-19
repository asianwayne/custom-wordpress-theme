<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hanav
 */

get_header();
?>
<div class="container">
<div class="row row-position" style="padding-top: 2rem;">
	<div class="col-md-12">
		<div class="part">
			<p class="tt sticky"> <strong><?php single_cat_title()?></strong>  </p>
			<div class="items">
				<div class="row">
					<div class="col">
						<?php while (have_posts()) {
							the_post(); ?>
							<div class="item art-item transition" style="padding-top: 1rem;"> 
                <!-- 可加可不加  文章缩略图 -->
                <!--<a class="art-a" href="index-21.htm?news/22.html" title="做好前端网页优化，让你的网站浏览量爆满" target="_blank"> <img class="img-cover" src="" alt="做好前端网页优化，让你的网站浏览量爆满" title="做好前端网页优化，让你的网站浏览量爆满"> </a> -->
                <h3 class="art-title"><a class="" href="<?php the_permalink() ?>" title="<?php the_title() ?>" target="_blank"><?php the_title()?></a></h3>
								<p style="">发布时间：<?php the_time(get_option('date_format')) ?> <span style="margin-left:5px">分类：<?php the_category(' ') ?></span><span style="margin-left:5px">浏览次数：</span></p>
                <?php the_excerpt();?>
              </div>

							<?php 
						}
						echo paginate_links();
						?>
            </div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
	

<?php
get_footer();
