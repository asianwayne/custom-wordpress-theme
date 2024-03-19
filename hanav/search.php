<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package hanav
 */

get_header();

?>

<div class="container">
<div class="row row-position" style="padding-top: 2rem;">
	<div class="col-md-12">
		<div class="part current">
			<p class="tt sticky"> <strong>
      <?php
      /* translators: %s: search query. */
      printf( esc_html__( '您正在搜索: %s', 'hanav' ), '<span>' . get_search_query() . '</span>' );
      ?></strong>  
      </p>

			<div class="items">
				<div class="row">
            <?php while (have_posts()) {
              the_post();
              get_template_part('/template-parts/content', get_post_type());
              # code...
            }?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
	

<?php
get_footer();
