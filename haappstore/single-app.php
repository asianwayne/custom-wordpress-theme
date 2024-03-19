<?php 
get_header(  ); tie_setPostViews(); while (have_posts()) { the_post(); ?>
    



<div class="wrapper">
  <div class="inner">
    <?php get_sidebar(  ); ?>

    <?php 
    $app_obj = get_queried_object();
    $media_upload = get_post_meta( $app_obj->ID, 'app_upload', true );
    
    $media_id = $media_upload['id'];

    // Get the attachment metadata
$attachment_metadata = wp_get_attachment_metadata($media_id);

// Check if metadata exists
if ($attachment_metadata) {
  // Get the file size in bytes
  $file_size_bytes = $attachment_metadata['filesize'];

  // Convert bytes to human-readable format
  $file_size_readable = size_format($file_size_bytes);

}

     ?>
    <main class="main appbox">
      <div class="boxtop">
        
        <h2><?php 
        $terms = get_the_terms( get_the_ID(), 'custom_taxonomy' );
        


        // Check if there are terms
if ($terms && !is_wp_error($terms)) {
  // Get the first term
  $term = reset($terms);

  // Output the term name
  echo $term->name;
}
         ?></h2>

         <?php tie_breadcrumbs(); ?>
        
      </div>
      <article class="apppage">
        <div class="appinfo">
          <div class="left">
            <figure class="icon"> 
              <?php the_post_thumbnail();  ?> 
            </figure>
          </div>
          <div class="middle">
            <h1 class="title"><?php the_title() ?></h1> 
            <div class="meta"> <span><i>分类：</i><a href="<?php echo get_term_link($term->term_id); ?>" rel="category tag"><?php echo $term->name; ?></a></span> <span><i>大小：</i><?php echo $file_size_readable; ?></span> <span><i>热度：</i><?php echo get_post_meta( get_the_ID(), 'tie_views', true ); ?></span>  </div>
            <div class="date"> <em>发布：</em>
              <time datetime="<?php echo get_the_time(get_option('date_format')); ?>"><?php echo get_the_time(get_option('date_format')); ?></time>
            </div>
            <div class="meta">  <span><i>语言：</i>简体中文</span></div>
            <div class="apptags"><span>关键词tags：</span>
              <ul>
                
                <li><a href="" rel="tag">版本后面更新</a></li>
                
                <li><a href="" rel="tag">版本后面更新</a></li>
                
              </ul>
            </div>
          </div>
          <div class="right">
            <div class="btn iphone">
              <div class="canvas">
                <div id="ios" class="qr"></canvas>

                  <!-- 二维码扫描下载下个版本更新 -->
                  <img src="" style="display: block;" alt="点击下载项目">

                </div>
              </div>
              <?php if (is_user_logged_in()) { ?>
                <a rel="nofollow" href="<?php echo $media_upload['url'] ?>" title="直接下载" download>直接下载</a>
                <?php 
                
              } else { ?>
                <a href="<?php echo wp_login_url( home_url() ) ?>">请登陆下载</a>

                <?php 

              } ?>
               
              
            </div>
            <div class="btn android">
              <div class="canvas">
                <div id="android" class="qr">
                  <img src="" alt="推荐次数">
                  </div>
              </div>
              <a id="increaseButton">推荐</a> 
               
            </div>
          </div>
          <div class="clear"></div>
        </div>
        <section class="appscreen">
          <h2 class="apptitle">详情图片</h2>
          <div class="screenlist">
            <div id="screen" class="slick-initialized slick-slider" style="display: block;">
             
              <div class="slick-list draggable">
                <div class="slick-track" style="opacity: 1; width: 612px; transform: translate3d(0px, 0px, 0px);">
                   <?php 
               
              $gallry_ids = explode(',', ha_get_option('app_gallery'));

              foreach ($gallry_ids as $key => $gallery_id) {  $image = wp_get_attachment_image_url( $gallery_id,'full' ); ?>
              <div class="item slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 306px;">
                  <figure class="pic"> <a title="<?php the_title() ?>" href="<?php echo $image; ?>" tabindex="0"> <img width="480" height="800" src="<?php echo $image;  ?>" class="attachment-full size-full" alt="" loading="lazy"> </a> </figure>
                </div>

                <?php 
                
              }

              ?>
                    
                
              </div>
            </div>
              
              
              
            </div>
            
          </div>
        </section>
        <section class="content">
          <h2 class="apptitle">应用介绍</h2>
          <div class="entry" id="maximg">
            <?php echo get_post_meta( get_the_ID(), 'itemintro', true ); ?>
          </div>
        </section>



        <section class="relatedapp">
          <h3 class="posttitle">相关应用</h3>
          <ul>
            
            <?php 
            $custom_terms = wp_get_object_terms( get_the_ID(), 'custom_taxonomy', array( 'fields'  => 'ids' ) );
            $related_app = new WP_Query(array(
              'post_type'  => 'app',
              'posts_per_page'  => 6,
              'orderby'  => 'rand', 
              'tax_query'  => array(
                array(
                  'taxonomy'  => 'custom_taxonomy',
                  'field' => 'id',
                  'terms'  => $custom_terms, 

                )

              ),
              'post__not_in'  => array($post->ID)

            ));

            while ($related_app->have_posts()) {
              $related_app->the_post(); ?>
              <li>
              <figure class="icon"> <a href="<?php the_permalink() ?>" target="_blank" title="<?php the_title() ?>"><img src="<?php the_post_thumbnail_url(  ); ?>" alt="<?php the_title() ?>"></a> </figure>
              <p><a href="<?php the_permalink() ?>" target="_blank" title="<?php the_title() ?>"><?php the_title() ?></a></p>
            </li>


              <?php 
                
            }

             ?>
            
            
            
            
          </ul>
        </section>
      </article>
    </main>
  </div>
</div>


<?php get_footer() ?>

<script>
  function setTuijianCookie() {
  var postId = <?php echo get_the_ID(); ?>; // Get the current post ID
  var cookieName = 'tuijianClicked_' + postId;
  var cookieValue = 'true';
  var expires = new Date();
  expires.setDate(expires.getDate() + 1);
  document.cookie = cookieName + '=' + cookieValue + '; expires=' + expires.toUTCString() + '; path=/';
}

jQuery(document).ready(function($) {
  $('#increaseButton').click(function(e) {
    e.preventDefault();
    var postId = <?php echo get_the_ID(); ?>; // Get the current post ID
    var cookieName = 'tuijianClicked_' + postId;
    if (document.cookie.indexOf(cookieName) === -1) {
      $.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'POST',
        data: {
          action: 'increase_tuijian',
          post_id: postId
        },
        success: function(response) {
          // Update the display to reflect the updated value
          alert('推荐成功！');
          setTuijianCookie();
        }
      });
    } else {
      alert('你已经推荐过了！');
    }
  });
});


</script>

<?php }  ?>