<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hastart
 */

get_header();
?>

<div class="container">
  <section class="index_cont list_content">
    <div class="main_cont clear">
      
      <div class="list-cont fl">
        <nav class="breadcrumb"> <?php echo tie_breadcrumbs() ?> </nav>
        <div class="recommend_list mod_list">
          <div class="detail_main">
            <h1 class="page-title"><?php the_title() ?></h1>
						<?php the_content() ?>

          </div>

		  
        </div>
      </div>
			<?php get_sidebar(); ?> 

      
    </div>
  </section>
</div>

	

<?php

get_footer();
