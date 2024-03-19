<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package honghua
 */

?>

	<!--footer开始-->
<div class="scrotop" id="toTop"><i></i><span>返回顶部</span></div>

<div class="footer" id="footer">
  <table width="960" border="0" align="center" cellpadding="0" cellspacing="0" class="hangjv">
    <tr>
      <td height="35"><div align="center">  
        <?php 
        $footernav = wp_nav_menu(array(
          'menu' => 'footermenu',
          'container' => false,
          'after' => '&nbsp;&nbsp;|',
          'echo' => false,
          'items_wrap' => '%3$s',

        ));
        echo strip_tags($footernav,'<a>');
        ?>
      </div></td>
    </tr>
    <tr>
      <td height="20"><div align="center"> Copyright © <?php echo date('Y') ?> <?php echo ha_get_option('hh_copyright') ?> </div></td>
    </tr>
    <tr>
      <td height="20"><div align="center">站长QQ：<?php echo ha_get_option('hh_qq') ?> 微信号：<?php echo ha_get_option('hh_weixin') ?> <a href="https://beian.miit.gov.cn/" target="_blank"><?php echo ha_get_option('hh_beian') ?></a> <a href="" target="_blank">XML地图</a> </div></td>
    </tr>
  </table>
</div>

<!-- footer over -->
</body>
<?php wp_footer(); ?>


</html>
