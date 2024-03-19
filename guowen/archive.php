<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package guowen
 */

get_header();
?>

	<div class="article">
    <?php tie_breadcrumbs() ?>
  <div id="jzblog">
    <div class="r_box">
      <div class="main">
        
        <div class="hezi-box">
          <!-- Main list -->
          <ul id="p_list_box">
            <?php while (have_posts()) { 
              the_post(); get_template_part('/template-parts/content');
            } ?>
          </ul>
        </div>
        <div class="pages"><?php echo paginate_links(  ); ?></div>

        
    </div>
    
  </div>
  <?php get_sidebar() ?>
  </div>
</div>

<?php
get_footer();
