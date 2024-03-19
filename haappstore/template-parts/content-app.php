<?php $app_terms = get_the_terms( get_the_ID(),'custom_taxonomy' ); ?>
<li>
    <div class="box">

      <figure class="icon"> <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"> <img src="<?php the_post_thumbnail_url(  ); ?>" alt="<?php the_title() ?>"> </a> </figure>
      <div class="info">
        <h3><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h3>
        <div class="meta">类型：<?php  foreach ($app_terms as $term) {
           ?>
          <a href="<?php echo get_term_link( $term->term_id, 'custom_taxonomy' ); ?>" rel="category tag"><?php echo $term->name; ?></a>
          <?php 
          
        } ?></div>
        <div class="intro"><?php echo mb_strimwidth(strip_tags(get_post_meta( get_the_ID(), 'itemintro',true )), 0,300) ?></div>
      </div>
    </div>
  </li>