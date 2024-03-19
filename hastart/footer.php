<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hastart
 */

?>
	<footer class="p-footer">
  <div class="contant_box">
    <div class="discover_tmt">
      <div class="text_box">
				<?php $footer_menu = wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container' => false,
						'items_wrap' => '%3$s',
						'echo' => false,
						'after' => '|&nbsp;',
					)
				);
				$footer_menu = strip_tags($footer_menu, '<a>');
				echo $footer_menu;
				?>
	  </div>
    </div>
    <div class="collaboration_box"> </div>
  </div>

	<!-- 版权 -->
  <p class="info">&copy; Copyright <?php echo date('Y') ?> 
	<?php echo ha_get_option('ha_copyright') ?>
	<!-- 备案, 备案链接是固定的所有不写字段了 -->
	<a href="http://beian.miit.gov.cn/" target="_blank" rel="nofollow"><?php echo ha_get_option('ha_beian') ?></a>  
	</p>
  <div class="friendlink">

	<!-- 友情链接 -->
	<span>友情链接：</span>
	<?php
	$flinks = wp_nav_menu(
		array(
			'theme_location' => 'friend-links',
			'container'  => false,
			'items_wrap'  => '%3$s',
			'echo'  => false,

		)
	);

	echo strip_tags($flinks, '<a>');
	
	?>
  </div>

</footer>
<div id="backtop" class="backtop">
  <div class="bt-box top"> <i class="fa fa-angle-up fa-2x"></i> </div>
</div>

</body>
<?php wp_footer(); ?>
</html>
