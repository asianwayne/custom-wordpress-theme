<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?php wp_title() ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content=""/>
    <meta name="description" content="<?php bloginfo('description') ?>"/>
	
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory') ?>/assets/404/style.css">

	<!-- Javascripts -->
	<script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_directory') ?>/assets/404/jquery-1.8.3.js"></script>

	<script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_directory') ?>/assets/404/plax.js"></script>

	<script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_directory') ?>/assets/404/404.js"></script>

	<style type="text/css">
		@media screen and (min-width: 768px) {

#errorpage.error404 .scene.scene_1 {
    height: 336px;
    background: url(<?php echo ha_get_option('404_scene_1')['url'] ?>) no-repeat left top;
    pozition: relative;
    z-index: 3;
}

#errorpage.error404 .scene.scene_2 {
    height: 500px;
    background: url(<?php echo ha_get_option('404_scene_2')['url'] ?>) no-repeat left top;
    pozition: relative;
    z-index: 2;
}

#errorpage.error404 .scene.scene_3 {
    height: 500px;
    background: url(<?php echo ha_get_option('404_scene_3')['url'] ?>) no-repeat left top;
    pozition: relative;
    z-index: 1;
} }
	</style>
</head>
	<body id="errorpage" class="error404 is-404" style="background:url(<?php echo ha_get_option('404_bg')['url'] ?>) no-repeat center center/cover;">
        <div id="pagewrap">
            <!--Header Start-->
            <div id="header" class="header">
                <div class="container">
                    <img class="logo" src="images/logo.png" alt=""/>
						<a href="#" title="logo" class="link">Lost Cloud</a>
                        
                </div>
            </div><!--Header End-->
			<!-- Plane -->
			<div id="main-content">
				<div class="duck-animation" style="background-image:url(<?php echo ha_get_option('404_plane')['url'] ?>);"></div>
			</div>
			<!--page content-->
            <div id="wrapper" class="clearfix">     
                <div id="parallax_wrapper">    
                    <div id="content">
                        <h1><?php echo ha_get_option('404_heading_1') ?><br /><?php echo ha_get_option('404_heading_2') ?></h1>
                        <p><?php echo ha_get_option('404_text_1') ?></p>
                        <a href="<?php echo home_url('/') ?>" title="" class="button"><?php echo ha_get_option('404_btn_text') ?></a>
                    </div>
					<!--parallax-->
                    <span class="scene scene_1"></span>
                    <span class="scene scene_2"></span>
                    <span class="scene scene_3"></span>

                </div>
            </div>

        </div><!-- end pagewrap -->
		
		<!--page footer-->
        <div id="footer">  
            <div class="container">
                <ul class="copyright_info">
                    <li>&copy; 这里可以拓展，懒得弄了</li>
					<li>&middot;</li>
					<li>Made with love in China.</li>
                </ul>
				<!--social links 这里填后台的404菜单 links  after:&middot;-->

                <?php
								wp_nav_menu(
									array(
										'theme_location' => '404-menu',
										'menu_class' => 'links',
										
									)
								);
								?>
            </div>
        </div><!--end page footer-->
		
    </body>
</html>


