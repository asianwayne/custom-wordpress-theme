<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package guowen
 */

get_header();
?>

	<div class="article">
		<div class="r_box">
			<div>
			<div class="hezi-box">
				<ul id="p_list_box">
			
					<?php while (have_posts()) {
					the_post(); get_template_part('/template-parts/content');
					}?>

					</ul>
			</div>
			<div class="pages"><?php echo paginate_links(  ); ?></div>
			</div>
		</div>
	</div>	
	

<?php
get_footer();
