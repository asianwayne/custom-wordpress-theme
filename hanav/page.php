<?php
/**
 * The template for displaying page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hanav
 */

get_header();
tie_breadcrumbs();
?>
<div class="container">
  <div class="part current">
    <div class="bar clearfix">
      <h1 class="tt"><?php the_title()?></h1>
      
    </div>
    <div class="items">
      <div class="art-main"> 
				<?php the_content()?>

       
        
      </div>
    </div>
  </div>
  <!-- 广告位AD3  -->
	<div class="part">
		<img src="https://www.xmdn.net/wp-content/uploads/2022/11/1180-310.jpg" alt="ads after post">
	</div>
  
</div>
	

<?php
get_footer();
