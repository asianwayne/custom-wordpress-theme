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
 * @package honghua
 */

get_header();
while (have_posts()) { the_post(); ?> 

<?php tie_breadcrumbs()?>


<div class="main clearfix main-box-shadow">
  <?php the_content()?>
	<?php wp_link_pages()?>
  
</div>
 <?php 
	# code...
}
?>

<?php
get_footer();
