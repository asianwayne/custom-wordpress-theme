<footer>
  <div class="footer">
    <div class="inner">
      <div class="sitedata">
        <ul>
          <?php 
          $taxonomy = 'custom_taxonomy';
$term_slug = 'wordpress主题';
$plugin_slug = 'wordpress插件'; 
$post_type = 'app';

$theme_query = new WP_Query(array(
    'post_type' => $post_type,
    'tax_query' => array(
        array(
            'taxonomy' => $taxonomy,
            'field' => 'slug',
            'terms' => $term_slug,
        ),
    ),
    'posts_per_page' => -1, // Retrieve all posts
));

$plugin_query = new WP_Query(array(
    'post_type' => $post_type,
    'tax_query' => array(
        array(
            'taxonomy' => $taxonomy,
            'field' => 'slug',
            'terms' => $plugin_slug,
        ),
    ),
    'posts_per_page' => -1, // Retrieve all posts
));

$total_themes = $theme_query->found_posts;
$total_plugins = $plugin_query->found_posts;
$count_posts = wp_count_posts();
$total_posts = $count_posts->publish;

           ?>
          <li class="total">wordpress主题<span><?php echo $total_themes; ?></span><i>个</i></li>
          <li class="today">wordpress插件<span><?php echo $total_plugins; ?></span><i>个</i></li>
          <li class="views">文章数量<span><?php echo $total_posts; ?></span><i>个</i></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="copyright">
    <div class="inner">
      <p>本网站数据均来自网络，如有涉及侵犯版权，请联系我们提供书面反馈，我们核实后会立即删除。</p>
      <p>Copyright © 2022 测试站点 本站资源来源于互联网 <a href="https://beian.miit.gov.cn/" target="_blank" rel="nofollow">苏ICP12345678</a> <a href="index.php/sitemap.xml" target="_blank">XML地图</a> </p>
    </div>
  </div>
  <div class="bg"></div>
  <div class="backtop"></div>
</footer>
<?php wp_footer(); ?>
</body>
</html>