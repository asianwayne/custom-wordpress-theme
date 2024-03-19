<?php
/**
 * Template part for displaying posts
 * 默认文章样式    index 里面的 li 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package guowen
 */

?>

<li class="p_list_li"> <i><img src="<?php the_post_thumbnail_url(); ?>" alt="自己在家300字作文"><a href="<?php the_permalink() ?>" title="<?php the_title(  ); ?>"></a></i>
	<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
	<p><?php echo mb_strimwidth(strip_tags(get_the_content()),0,200) ?></p>
	<div class="pfoot">
		<div class="f_l"> <span class="author"><?php the_time( get_option('date_format') ); ?></span> <span class="wordicon-eye"><?php echo get_post_meta(get_the_ID(), 'tie_views',true)?></span> </div>
		<div class="f_r"><span><?php the_category(' ,'); ?></span></div>
	</div>
</li>
