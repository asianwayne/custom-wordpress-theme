<?php get_header(  ); ?>

<div id="breadcrumb">
  <div class="inner"> <?php echo tie_breadcrumbs() ?> </div>
</div>

<main id="wrapper">
  <div class="inner public">
    <article id="servicepage">
      <div class="intro">
        <h1 id="pageTitle"><?php the_title(); ?></h1>
        <div class="entry" id="maximg">
          <?php the_content(); ?>
<p style="text-align: center;">
    <img src="<?php the_post_thumbnail_url(); ?>">
</p>
        </div>
      </div>
      <div class="side">
      	<?php $fuwu_cat = get_the_category(  )[0]; ?>
        <section id="sidelist">
          <h3><i class="ri-bring-forward"></i> <?php echo $fuwu_cat->name; ?> </h3>
          <div class="more"> <a href="<?php echo get_category_link( $fuwu_cat ); ?>" title="查看更多"><i class="ri-more-fill"></i></a> </div>
          <ul>
            <?php 

            $cat_li = new WP_Query(array(
            	'cat'  => $fuwu_cat->term_id


            ));
            $i = 1;

            while ($cat_li->have_posts()) { $cat_li->the_post(); ?>
            	<li> <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><i><?php echo $i; ?>.</i> <?php the_title(); ?></a> </li>

            	<?php $i++;
                
            } 
             ?>
          </ul>
          <div class="info">
            <h4>微信扫描下面二维码</h4>
            <p>联系我们了解更多</p>
            <p class="qr"> <img src="<?php echo ha_get_option('wechat_qr')['url'] ?>" alt="微信"> </p>
          </div>
        </section>
      </div>
    </article>
  </div>
</main>

<?php get_footer(  ); ?>