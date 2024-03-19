<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hastart
 */

?>

<li class="post_part clear" id="<?php the_ID() ?>"> <a href="<?php the_permalink() ?>" class="pic"> <img class="lazy" src="<?php the_post_thumbnail_url() ?>" onerror='this.src="<?php echo ha_get_option('on_error')['url'] ?>"' alt="" title="<?php the_title(); ?>" width="200" height="150"> </a>
	<div class="cont">
		<h3><a href="<?php the_permalink() ?>" class="title"><?php the_title(); ?></a></h3>
		<div class="info"> 
			<!-- Categori list -->
			<span class="author"> <?php echo get_the_category_list(' ,') ?> <span class="gap_point">•</span><span><?php the_time(get_option('date_format')) ?></span> </span> 
		</div>
		<p class="summary"><?php echo ha_excerpt(); ?></p>
	</div>
</li>
