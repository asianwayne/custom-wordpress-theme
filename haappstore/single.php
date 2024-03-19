<?php get_header();tie_setPostViews(); ?>
<div class="popup-container" id="popupContainer" onclick="closePopup()">
    <span class="popup-close" onclick="event.stopPropagation(); closePopup()">&times;</span>
    <div class="popup-content">
      <img class="popup-image" src="<?php echo ha_get_option('dsqrcode')['url'] ?>" alt="Popup Image">
    </div>
  </div>
<main class="wrapper">
  <div class="inner appbox">
    <div class="boxtop">
      <h2><?php the_category(); ?></h2>
      <?php tie_breadcrumbs() ?>
    </div>
    <article class="post">
      <h2 class="title"><?php the_title() ?></h2>
      <div class="meta"> <span class="cat">栏目：<?php $cats = get_the_category(  ); foreach ($cats as $cat) {

        echo $cat->name;echo '&nbsp;&nbsp;';
        
      } ?></span> <span class="date">日期：
        <time datetime="2022-11-25"><?php the_time(get_option('date_format')) ?></time>
        </span> <span class="author">作者：<?php echo get_the_author_meta('nickname') ?></span> <span class="views">阅读：<?php echo get_post_meta( get_the_ID(), 'tie_views', true ); ?></span> </div>
      <div class="entry" id="maximg">
        
        <?php the_content(); ?>

        <div class="modal-box">
          <button id="dashang" onclick="openPopup()">打赏</button>
        </div>
        
      </div>
      
      
    </article>
  </div>
</main>

<script>
    function openPopup() {
      var popup = document.getElementById("popupContainer");
      popup.style.display = "block";
    }

    function closePopup() {
      var popup = document.getElementById("popupContainer");
      popup.style.display = "none";
    }
  </script>

<?php get_footer() ?>