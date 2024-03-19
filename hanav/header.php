<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hanav
 */

?>
<!DOCTYPE html>
<html <?php language_attributes()?>>
<head>
<meta charset="<?php bloginfo('charset') ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<?php wp_head();?>
</head>
<body>
<header class="header">
  <div class="h-fix">
    <div class="container">
      <h1 class="logo"> 
        <a href="<?php echo home_url('/') ?>" title=""> 
          <img id="light-logo" src="<?php echo ha_get_option('logo_light')['url'] ?>" alt="<?php bloginfo('description') ?>" title="<?php bloginfo('description') ?>"> 
          <img id="dark-logo" src="<?php echo ha_get_option('logo_dark')['url'] ?>" alt="<?php bloginfo('description') ?>" title="<?php bloginfo('description') ?>"> 
        </a> 
      </h1>
      <div id="m-btn" class="m-btn"><i class="fa fa-bars"></i></div>

      <?php get_search_form();?>

        <!-- dark mode -->
      <div class="darkmode"> <a href="javascript:switchNightMode()" target="_self" class=""><i class="fa fa-moon-o"></i></a> </div>
      <!-- end of dark mode  -->

      <nav class="nav-bar" id="nav-box" data-type="index" data-infoid="">
        <!-- current class active  -->
        
          <?php 
          wp_nav_menu(array(
            'theme_location' => 'menu-1',
            'container' => false,
            'menu_class' => 'nav',
          ));
          ?>
        
      </nav>

      <!-- 申请收录 -->
      <div class="submit fr"> <a href="<?php echo home_url('/shoulu') ?>" target="_blank" class="a transition"><i class="fa fa-heart"></i>申请收录</a> </div>
    </div>
  </div>
</header>

