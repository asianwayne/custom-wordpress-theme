<?php
/**
 * Template for displaying the daohang post type
 * @package hanav
 */   ?>
<div class="row">
<div class="col-xs-6 col-sm-4 col-md-3">
  <div class="item"> <a class="link" target="_blank" href="<?php the_permalink() ?>" rel="nofollow"><i class="autoleft fa fa-angle-right"></i></a> <a class="a" href="<?php the_permalink() ?>" target="_blank"> 
  <?php if(has_post_thumbnail()) : ?>
  <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
  <?php endif;?>
    <h3><?php the_title()?></h3>
    <p><?php echo get_post_meta(get_the_ID(), 'navdesc', true) ?></p>
    </a> </div>
</div>
</div>
