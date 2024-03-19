<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wptutor
 */

?>
<!doctype html>
<html <?php language_attributes(  ); ?>>

<head>
    <!-- Meta -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- favicon -->
    

    <!-- Title -->
    <?php wp_head(); ?>
</head>

<body <?php if (!is_search()) {
    body_class(  );
    
}  ?>>
	<?php wp_body_open(); ?>
    <!--loading -->
    <!-- <div class="loader">
        <div class="loader-element"></div>
    </div> -->

     <!-- Header-->
    <header class="header navbar-expand-lg fixed-top ">
        <div class="container-fluid ">
            <div class="header-area ">
                <!--logo-->
                <div class="logo">

                    <a href="<?php echo home_url('/'); ?>">
                        <?php if (!empty(ha_get_option('theme_logo_dark')['url'])): ?>
                            <img src="<?php echo ha_get_option('theme_logo_dark')['url']; ?>" alt="<?php bloginfo( 'name' ); ?>" class="logo-dark">
                        <?php else :  ?>
                            <h1><?php bloginfo( 'name' ); ?></h1>
                        <?php endif ?>

                        <?php if (!empty(ha_get_option('theme_logo_light')['url'])): ?>
                            <img src="<?php echo ha_get_option('theme_logo_light')['url']; ?>" alt="<?php bloginfo( 'name' ); ?>" class="logo-white">
                        
                            
                        <?php endif ?>
                        
                        
                    </a>
                </div>
                <div class="header-navbar">
                    <nav class="navbar">
                        <!--navbar-collapse-->
                        <div class="collapse navbar-collapse" id="main_nav">
                            <?php 
                            if (has_nav_menu( 'menu-1' )) {
                                wp_nav_menu( array(
                                'theme_location'  => 'menu-1',
                                'menu_class'  => 'navbar-nav',
                                'container'  => false,
                                'walker'  => new WP_Bootstrap_Navwalker()
                            ) );
                                
                            } else {
                                echo 'please update the menu on the admin menu page';
                            }
                            


                             ?>
                           
                        </div>
                        <!--/-->
                    </nav>
                </div>

                <!--header-right-->
                <div class="header-right ">
                    <!--theme-switch-->
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox" />
                            <span class="slider round ">
                                <i class="lar la-sun icon-light"></i>
                                <i class="lar la-moon icon-dark"></i>
                            </span>
                        </label>
                    </div> 

                    <!--search-icon-->
                    <div class="search-icon">
                        <i class="las la-search"></i>
                    </div>
                    <!--button-subscribe-->
                    <div class="botton-sub">
                        <a href="signup.html" class="btn-subscribe">订阅我们</a>
                    </div>
                    <!--navbar-toggler-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </div> 
    </header>
