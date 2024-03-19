<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package guowen
 */

?>

	<footer>
		<p>Copyright © <?php echo the_time('Y'); echo '&nbsp;&nbsp;' . ha_get_option('post_copyright'); ?> </p>
		<p>
			<a href="https://beian.miit.gov.cn/" target="_blank" rel="nofollow"><?php echo ha_get_option('gw_beian')?></a> <a href="<?php echo home_url('/wp-sitemap.xml')?>" target="_blank">XML</a> 
		</p> </footer> <span id="go-to-top"></span> 
 
<script>
jQuery(document).ready(function($) {
	$(".aside").theiaStickySidebar({
		additionalMarginTop: 0
	})
});
</script>
</body>
<?php wp_footer(); ?>
</html>

