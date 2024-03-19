<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package miladcorp
 */

?>

	<footer>
  <div id="footer">
    <div class="inner">
      <div id="logoIcon">
        <div class="icon"> <img src="<?php echo ha_get_option('logo_dark')['thumbnail'] ?>"> </div>
      </div>
      <div id="copyright">
        <p>Copyright © <?php the_date('Y'); echo ha_get_option('hh_copyright'); ?></p>
        <p><a href="https://beian.miit.gov.cn/" target="_blank" rel="nofollow"><?php echo ha_get_option('hh_beian'); ?></a> <a target="_blank" href="<?php echo home_url('/sitemap.xml') ?>">XML地图</a>  </p>
      </div>
      <div id="beian">
        <p>  </p>
      </div>
    </div>
  </div>
</footer>
<script>	
	var _url = '/';

	$(function(){
		$('#tj').click(function(){
			//alert(1)
			if($('#name').val()==''){alert('请输入您的姓名！'); $("#name").focus(); return false;}
			if ($("#tel").val() == "") { alert("请输入你的手机！"); $("#tel").focus(); return false; } 
			if (!$("#tel").val().match(/^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(16[0-9]{1})|(17[0-9]{1})|(18[0-9]{1})|(19[0-9]{1}))+\d{8})$/)) { alert("手机号码格式不正确！"); $("#tel").focus(); return false;} 
		})
	})
</script>
</body>
</html>
<?php wp_footer(); ?>


