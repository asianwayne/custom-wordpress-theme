<?php get_header(  ); ?>



<main class="wrapper">
  <div class="inner">
    
    <section class="hmtop">
      <h2>热点资讯</h2>
      <span class="more"><a href="index-32.htm?news/" title="新闻中心">更多</a></span>
      <div class="right">
        <div id="hmtop">
          <?php 
          while (have_posts()) {
            the_post(); ?>
            <div class="item"> <a href="index-36.htm?gonglue/40.html" target="_blank" title="<?php the_title() ?>"><?php the_title(); ?></a> </div>

            <?php 
              
          }

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
        <h2>资讯攻略</h2>
        <span><a href="index-32.htm?news/" title="资讯攻略">更多 &gt;</a></span> </div>
      <div class="box">
        <ul>
          
          <li>
            <figure class="thumbnail"> <a href="index-36.htm?gonglue/40.html" target="_blank" title="永劫无间霜天雁归怎么分享信物 永劫无间霜天雁归分享方法"> <img src="static/upload/other/20221125/1669351028216910.jpeg" alt="永劫无间霜天雁归怎么分享信物 永劫无间霜天雁归分享方法"> </a> </figure>
            <div class="info">
              <h3><a href="index-36.htm?gonglue/40.html" target="_blank" title="永劫无间霜天雁归怎么分享信物 永劫无间霜天雁归分享方法">永劫无间霜天雁归怎么分享信物 永劫无间霜天雁归分享方法</a></h3>
              <p>劫无间最近会有新活动“霜天雁归”，这个活动里玩家将会获得非常多的奖励和信物，那么永劫无间怎么分享信物，想知道永劫无间霜天···</p>
              <time datetime="2022-11-25">2022-11-25</time>
            </div>
          </li>
          
          <li>
            <figure class="thumbnail"> <a href="index-37.htm?gonglue/39.html" target="_blank" title="逆战免费天启套怎么领取"> <img src="static/upload/image/20221125/1669350662124658.jpg" alt="逆战免费天启套怎么领取"> </a> </figure>
            <div class="info">
              <h3><a href="index-37.htm?gonglue/39.html" target="_blank" title="逆战免费天启套怎么领取">逆战免费天启套怎么领取</a></h3>
              <p>逆战全民史诗套免费领取天启套全套的活动已经开始啦，相信很多玩逆战的小伙伴都非常喜欢天启套这个套装，输出高、打击爽是天启套···</p>
              <time datetime="2022-11-25">2022-11-25</time>
            </div>
          </li>
          
          <li>
            <figure class="thumbnail"> <a href="index-38.htm?gonglue/38.html" target="_blank" title="冒险岛2狂战士技能加点推荐 冒险岛2狂战士优点和缺点分析"> <img src="static/upload/image/20221125/1669350609129316.jpg" alt="冒险岛2狂战士技能加点推荐 冒险岛2狂战士优点和缺点分析"> </a> </figure>
            <div class="info">
              <h3><a href="index-38.htm?gonglue/38.html" target="_blank" title="冒险岛2狂战士技能加点推荐 冒险岛2狂战士优点和缺点分析">冒险岛2狂战士技能加点推荐 冒险岛2狂战士优点和缺点分析</a></h3>
              <p>狂战士是冒险岛2中输出极为恐怖的一种职业，而且操作简单，容易上手。那么狂战士该怎么加点？他的有点和缺点又是什么呢？这里为大···</p>
              <time datetime="2022-11-25">2022-11-25</time>
            </div>
          </li>
          
          <li>
            <figure class="thumbnail"> <a href="index-39.htm?zixun/37.html" target="_blank" title="荣耀大天使联动遇见博物"> <img src="static/upload/other/20221125/1669350535182477.jpeg" alt="荣耀大天使联动遇见博物"> </a> </figure>
            <div class="info">
              <h3><a href="index-39.htm?zixun/37.html" target="_blank" title="荣耀大天使联动遇见博物">荣耀大天使联动遇见博物</a></h3>
              <p>荣耀大天使最近开始了与“遇见博物”的联动，在这个游戏里玩家将会领略到中华上千年的不同风光，玩到全新的游戏内容，体验不一样···</p>
              <time datetime="2022-11-25">2022-11-25</time>
            </div>
          </li>
          
          <li>
            <figure class="thumbnail"> <a href="index-40.htm?zixun/20.html" target="_blank" title="和平精英海岛打卡之旅2021 和平精英海岛打卡之旅攻略"> <img src="static/upload/other/20221124/1669271298309384.jpeg" alt="和平精英海岛打卡之旅2021 和平精英海岛打卡之旅攻略"> </a> </figure>
            <div class="info">
              <h3><a href="index-40.htm?zixun/20.html" target="_blank" title="和平精英海岛打卡之旅2021 和平精英海岛打卡之旅攻略">和平精英海岛打卡之旅2021 和平精英海岛打卡之旅攻略</a></h3>
              <p>和平精英海岛打卡之旅这个活动很多玩家都想参与来领取丰厚的奖励，可是具体的位置在哪？可能很多玩家都还不太清楚这个海岛打卡之···</p>
              <time datetime="2022-11-24">2022-11-24</time>
            </div>
          </li>
          
          <li>
            <figure class="thumbnail"> <a href="index-41.htm?zixun/19.html" target="_blank" title="玛娜希斯回响兑换码在哪 玛娜希斯回响兑换码大全"> <img src="static/upload/image/20221124/1669271040787574.png" alt="玛娜希斯回响兑换码在哪 玛娜希斯回响兑换码大全"> </a> </figure>
            <div class="info">
              <h3><a href="index-41.htm?zixun/19.html" target="_blank" title="玛娜希斯回响兑换码在哪 玛娜希斯回响兑换码大全">玛娜希斯回响兑换码在哪 玛娜希斯回响兑换码大全</a></h3>
              <p>最近玛娜希斯回响的热度特别高，许多玩家都想要获得玛娜希斯回响的兑换码，拥有玛娜希斯回响兑换码可以去游戏里面兑换各种奖品福···</p>
              <time datetime="2022-11-24">2022-11-24</time>
            </div>
          </li>
          
        </ul>
      </div>
    </section>
    
    <section class="hmlinks">
      <div class="boxtop">
        <h2>友情链接</h2>
      </div>
      <ul>
        <li><a href="https://www.baidu.com/" target="_blank">百度</a></li>
        <li><a href="https://www.163.com/" target="_blank">网易</a></li>
        <li><a href="https://www.qq.com/" target="_blank">腾讯</a></li>
      </ul>
    </section>
  </div>
</main>

<?php get_footer(  ); ?>