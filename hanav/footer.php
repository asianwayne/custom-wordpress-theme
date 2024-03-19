<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hanav
 */
?>
	<footer>
        <div class="footer-copyright ">
            <div class="container">
                <!-- 申明 -->
                <p> <?php echo ha_get_option('footer_text')['shenming']; ?>  <br>
                <?php echo ha_get_option('footer_text')['banquan']; ?>
                <!-- 备案   备案可以写死链接 -->
                <?php echo ha_get_option('footer_text')['beian']; ?>
                <a href="<?php echo home_url('/wp-sitemap.xml') ?>" target="_blank">XML地图</a> 
                </p>
                <img id="light-flogo" class="flogo" src="<?php echo ha_get_option('footer_light_logo')['url'] ?>" alt="<?php bloginfo('description') ?>" title="<?php bloginfo('description') ?>"> 
                <img id="dark-flogo" class="flogo" src="<?php echo ha_get_option('footer_dark_logo') ?>" alt="<?php bloginfo('description') ?>" title="<?php bloginfo('description') ?>"> 
            </div>
        </div>
    </footer>
<!--提交和回顶--> 
    <a id="quick_submit" class="fa fa-pencil" rel="nofollow" href="index-20.htm?shoulu/"></a>
    <div id="backtop" class="fa fa-angle-up"></div>

    <script>
        
    </script> 
    <script>
    
    </script> 
    <script>
    /* jQuery.positionSticky.js初始化 */
    
    </script> 

</body>
<?php wp_footer();?>
</html>
