<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package miladcorp
 */

get_header();
?>
<main>
  <div id="slides">
    
    <div class="slick-load">
      <?php $sliders = ha_get_option('mc-slides');  

      foreach ($sliders as $slider) { ?>
         <section class="item" style="background-image:url(<?php echo $slider['image'] ?>);">
        <div class="info">
          <div class="inner">
            <h2><?php echo $slider['title'] ?></h2>
            <div class="intro">
              <p><?php echo $slider['description'] ?></p>
            </div>
            <div class="more"> <a href="<?php echo $slider['url'] ?>" title="了解更多" target="_blank">了解更多</a> </div>
          </div>
        </div>
      </section>

        <?php 
        
      }
       ?>
     
      
      
      
    </div>
    <!-- <div class="loading"> <span>加载中...</span> </div> -->
    <div id="mouse" title="滚动鼠标"></div>
  </div>

	 <section class="columnbox" id="about">
    <?php 
    $about_us = get_page_by_path( 'about-us' ); 
    
    $about_us_field = get_post_custom( $about_us->ID );
    

    ?>
    <div class="inner">
      <div class="text wow animate__fadeInLeft">
        <hgroup class="columnname left">
          <h2><?php echo $about_us->post_title ?></h2>
          <h3> / <?php echo $about_us_field['page_eng_subtitle'][0] ?></h3>
        </hgroup>
        
        <div class="rows excerpt"><?php echo $about_us_field['mc-page-description'][0] ?> </div>
        <div class="readmore"> <a href="<?php echo get_permalink( $about_us ); ?>" title="了解更多"><i class="ri-arrow-right-double-line"></i></a> </div>
      </div>
      <div class="pic wow animate__fadeInRight">
        <div class="thumbnail"> <i style="background-image:url(<?php echo get_the_post_thumbnail_url( $about_us ); ?>);"></i> </div>
      </div>
      
    </div>
  </section>
  
  
  <section class="columnbox" id="service">
    <?php $fuwu = get_category_by_slug( 'fuwu' );  ?>
    <div class="inner">
      <hgroup class="columnname wow animate__fadeInUp">
        <h2><?php echo $fuwu->name ?></h2>
        <h3><span><?php echo $fuwu->slug ?></span></h3>
      </hgroup>
      <div class="svlist slick-load wow animate__fadeInUp">
        <?php 

        $i = 1;
        $fuwu_query = new WP_Query(array(
          'post_type' => 'post',
          'posts_per_page'  => -1,
          'category_name'  => 'fuwu'
 

        ));
        while ($fuwu_query->have_posts()) { 
          $fuwu_query->the_post(); ?>
          <article class="item"> <a class="figure" href="<?php the_permalink(  ); ?>" title="<?php the_title(); ?>">
          <figure class="img"> <img src="<?php the_post_thumbnail_url(  ); ?>" alt="<?php the_title(); ?>"> </figure>
          <div class="text">
            <div class="tag"> <span><??></span> </div>
            <h4 class="wot"><?php the_title(); ?></h4>
            <div class="rows intro"> <?php echo mb_strimwidth(strip_tags(get_the_content()), 0, 300) ?></div>
          </div>
          <div class="more">
            <p class="rows"><?php the_title(); ?></p>
            <p><span>了解更多</span></p>
          </div>
          </a> 
        </article>

          <?php 
           $i++; 
        } wp_reset_postdata();

         ?>
        
      </div>
      <!-- <div class="loading"></div> -->
    </div>
  </section>
  
  
  <section class="columnbox" id="product">
    <div class="columnname wow animate__fadeInUp">
      <hgroup class="inner">
        <h2>作品展示</h2>
        <h3><span>WORKS</span></h3>
      </hgroup>
    </div>
    <div class="slick-load">
      <?php 
      $portofolio = new WP_Query(array(
        'post_type'  => 'portfolio',
        'posts_per_page'  => -1, 



      ));

      while ($portofolio->have_posts()) {
        $portofolio->the_post(); ?>

      <article class="item proitem wow animate__zoomIn"> <a class="figure" href="<?php the_permalink(  ); ?>" title="<?php the_title(); ?>">
        <figure class="img"> <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>"> </figure>
        <div class="text">
          <h4 class="wot"><?php the_title(); ?></h4>
          <p class="rows"><?php the_excerpt(); ?></p>
        </div>
        </a> </article>
          
    <?php   } wp_reset_postdata();

       ?>
      
    </div>
    <div class="morebtn"> <a href="<?php echo get_post_type_archive_link( 'portfolio' ); ?>" title="查看更多">更看更多 <i class="ri-arrow-right-s-line"></i></a> </div>
  </section>
  
  <section class="columnbox" id="why">
    <div class="inner">
      <hgroup class="columnname wow animate__fadeInUp">
        <h2>为什么选择我们</h2>
        <h3><span>Why choose us</span></h3>
      </hgroup>
      <ul>
        <?php 
        for ($i = 1; $i <= 6 ; $i++) { ?>
          <li class="wow animate__fadeInUp">
          <div class="info">
            <div class="icon"> <i style="background-image:url(<?php echo ha_get_option('why_us_icon_' . $i)['url']; ?>);"></i> </div>
            <div class="text">
              <h4><?php echo ha_get_option('why_us_title_' . $i); ?></h4>
              <div class="intro"> <?php echo ha_get_option('why_us_desc_' . $i); ?> </div>
            </div>
          </div>
        </li>

          <?php 

          
        }

         ?>
        
        
      </ul>
    </div>
  </section>
  
  <!-- <section class="columnbox" id="case">
    <hgroup class="columnname wow animate__fadeInUp"> -->
      <?php //chenggong is simmliar like the portfolio  ?>
    <!--   <h2>成功案例</h2>
      <h3><span>CASE</span></h3>
    </hgroup>
    <div class="list">
      <div class="slick-load wow animate__fadeInRight">
        
        <article class="item"> <a class="figure" href="index-32.htm?case/44.html" title="案例展示四">
          <figure class="img"> <img src="static/upload/image/20230803/1691047383179798.jpg" alt="案例展示四"> </figure>
          <h4>案例展示四</h4>
          </a> </article>
        
       
        
      </div>
    </div>
  </section> -->
  
  
  <section class="columnbox" id="news">
    <div class="inner">
      <hgroup class="columnname wow animate__fadeInUp">
        <h2>行业资讯</h2>
        <h3><span>NEWS</span></h3>
      </hgroup>
      <div class="list">
        
        <?php 
        $posts = new WP_Query(array(
          'post_type'  => 'post',
          'posts_per_page'  => 8, 
          'category_name'  => 'news'


        ));

        while ($posts->have_posts()) {
          $posts->the_post(); ?>

          <article class="item">
          <div class="date wow animate__fadeInUp">
            <time pubdate="2023-08-04"> <i><?php the_time( 'd' ); ?></i> <?php the_time( 'Y-m' ); ?> </time>
          </div>
          <div class="box">
            <div class="info wow animate__fadeInRight">
              <h4> <a href="<?php the_permalink(  ); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> </h4>
              <div class="rows excerpt"><?php echo mb_strimwidth(strip_tags(get_the_content()), 0, 250,'...'); ?> </div>
              <div class="readmore"> <a href="<?php the_permalink() ?>" title="查看详情"><i class="ri-arrow-right-double-line"></i></a> </div>
            </div>
          </div>
        </article>

          <?php 
            
        } wp_reset_postdata();

         ?>
        
      </div>
      <div class="morebtn"> <a class="color" href="<?php echo home_url('/news'); ?>" title="查看更多">查看更多 <i class="ri-arrow-right-s-line"></i></a> </div>
    </div>
  </section>
  
  <div id="contact">
    <?php $contact = get_page_by_path('contact'); 
    $contact_fields = get_post_custom( $contact->ID );
     ?>
    <div class="bg"></div>
    <div class="inner">
      <section id="contactInfo" class="wow animate__fadeInLeft">
        <hgroup class="columnname left">
          <h2><?php echo $contact_fields['page_subtitle'][0]; ?></h2>
          <h3> / <?php echo $contact_fields['page_eng_subtitle'][0]; ?></h3>
        </hgroup>
        <div class="intro">
          <?php echo mb_strimwidth(strip_tags($contact_fields['mc-page-description'][0]),0,400);?>
        </div>
        <div class="ways">
          <h4> 咨询电话 </h4>
          <!-- options contact  -->
          <p> <span><?php echo ha_get_option('ns-contact')['phone'] ?></span> </p>
        </div>
        <div class="social">
          <!-- options social icons  -->
          <ul>
            <li class="qq"> <a rel="nofollow" href="tencent://Message/?Menu=yes&Uin=<?php echo ha_get_option('ns-contact')['qq'] ?>&Site=<?php echo home_url('/'); ?>" title="QQ"><i class="ri-qq-fill"></i></a> </li>
            <li class="wx"> <a href="javascript:void(0);" title="微信"><i class="ri-wechat-fill"></i></a>
              <div class="qr"> <img src="<?php echo ha_get_option('wechat_qr')['url'] ?>" alt="微信"> </div>
            </li>
             <li class="gh"> <a href="<?php echo ha_get_option('ns-contact')['github'] ?>" title="Github"><i class="ri-xl ri-github-line"></i></a>
               
            </li>
            <li class="dy"> <a href="javascript:void(0);" title="抖音"><i class="ri-tiktok-fill"></i></a>
              <div class="qr"> <img src="<?php echo ha_get_option('tiktok_qr')['url'] ?>" alt="抖音"> </div>
            </li>
          </ul>
        </div>
      </section>

      <!-- this form is using the contact form shortcode  -->
      <section id="contactForm" class="wow animate__fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <h4>联系我们</h4>
        <div class="box">
          <?php echo do_shortcode('[contact_form]'); ?>
        </div>
      </section>
      
      <div class="clear"></div>
    </div>
  </div>
</main>

<?php
get_footer();
