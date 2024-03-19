<?php get_header(  ); ?>



<main class="wrapper">
  <div class="inner">
    
    <section class="hmtop">
      <h2>热点资讯</h2>
      <span class="more"><a href="index-32.htm?news/" title="新闻中心">更多</a></span>
      <div class="right">
        <div id="hmtop">
          <?php 
          $hot_news = new WP_Query(array(
            'post_type'  => 'post',
            'posts_per_page' => 6,
            'meta_key'  => 'tie_views',
            'orderby' => 'meta_value_num',
            'order'  => 'DESC'

          ));
          while ($hot_news->have_posts()) {
            $hot_news->the_post(); ?>
            <div class="item"> <a href="index-36.htm?gonglue/40.html" target="_blank" title="<?php the_title() ?>"><?php the_title(); ?></a> </div>

            <?php 
              
          } wp_reset_postdata(); 

           ?>
          
        </div>
      </div>
    </section>
    
    <section class="appbox">
      <div id="rankingTop">
        <div class="boxtop cur">
          <!-- 最新按照发布时间排序 -->
          <h2>最新排行</h2>
        </div>
        <div class="boxtop">
          <!-- 按照post views 排序 -->
          <h2>热门排行</h2>
        </div>
        <div class="boxtop">
          <!-- 新增字段，读者推荐排序 -->
          <h2>推荐排行</h2>
        </div>
      </div>


      <div id="rankingBtm">
        <div class="ranking">
          <ul>
            <?php 
            $app_query = new WP_Query(array(
              'post_type'  => 'app',
              'posts_per_page'  => 6,


            ));

            while ($app_query->have_posts()) { $app_query->the_post(); 
            get_template_part( 'template-parts/content', 'app' );

             ?>
              

              <?php 
                
            } wp_reset_postdata();

             ?>
            
          </ul>
        </div>
        <div class="ranking">
          <ul>
            <?php 
            $app_h_query = new WP_Query(array(
              'post_type'  => 'app',
              'posts_per_page'  => 6,
              'meta_key' => 'tie_views',
              'orderby'  => 'meta_value_num',
              'order'  => 'DESC'

            ));

            while ($app_h_query->have_posts()) {
              $app_h_query->the_post(); 
              get_template_part( 'template-parts/content', 'app' );
                
            } wp_reset_postdata();

             ?>
            
          </ul>
        </div>
        <div class="ranking">
          <ul>
            
            <?php 
            $app_t_query = new WP_Query(array(
              'post_type'  => 'app',
              'posts_per_page' => 6,
              'meta_key'  => 'tuijian',
              'orderby' => 'meta_value_num',
              'order'  => 'DESC'

            ));

            while ($app_t_query->have_posts()) {
              $app_t_query->the_post(); 
              get_template_part( 'template-parts/content', 'app' );
                
            } wp_reset_postdata();

             ?>
            
          </ul>
        </div>
      </div>
    </section>


    <?php 
    $app_terms = get_terms(array(
      'taxonomy'  => 'custom_taxonomy',

    ));

    foreach ($app_terms as $term) { ?>
      <section class="appbox">
      <div class="boxtop">
        <h2><?php echo $term->name ?></h2>
      </div>
      <div class="applist">
        <ul>
          <?php 
          $term_app = new WP_Query(array(
            'post_type'  => 'app',
            'posts_per_page'  => -1,
            'tax_query'  => array(
              array(
                'taxonomy'  => 'custom_taxonomy',
                'field'  => 'term_id',
                'terms' => $term->term_id,
                'operator'  => 'IN'


              )


            )


          ));

          while ($term_app->have_posts()) {
            $term_app->the_post(); get_template_part( 'template-parts/content', 'app-grid' );
              
          }


           ?>
          
        </ul>
      </div>
    </section>

      <?php 
      
    }


     ?>
    
    <section class="appbox hmnews">
      <div class="boxtop">
        <h2>使用教程</h2>
        <span><a href="" title="资讯攻略">更多 &gt;</a></span> </div>
      <div class="box">
        <ul>
          
          <?php 
          $blog = new WP_Query(array(
            'post_type'  => 'post',
            'posts_per_page'  => 6,



          )); 


          while ($blog->have_posts()) {
            $blog->the_post(); get_template_part( 'template-parts/content' );
              
          }


           ?>
          
          
          
        </ul>
      </div>
    </section>
    
    <section class="hmlinks">
      <div class="boxtop">
        <h2>友情链接</h2>
      </div>
     <?php wp_nav_menu(array(
      'theme_location' => 'friend-links',
      'container' => false,
      'menu_class' => '',
      'menu_id'  => ''

     )) ?>
    </section>
  </div>
</main>

<?php get_footer(  ); ?>