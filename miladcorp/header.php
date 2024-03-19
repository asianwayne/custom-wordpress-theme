<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package miladcorp
 */

?>
<!DOCTYPE html>
<html lang="<?php language_attributes(  ); ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1,user-scalable=no">
<meta name="baidu-site-verification" content="codeva-cRTnDmG54K" />
<?php wp_head(); ?>
<!--[if lt IE 9]>
<script type="text/javascript" src="http://demo2.92wailian.com/k460/skin/js/html5shiv.v3.72.min.js"></script>
<![endif]-->
</head>
<body id="<?php if (is_front_page()) { echo 'index';
  
} elseif (is_post_type_archive( 'portfolio' )) { echo 'category';
  
} elseif (is_page(  )) {
  echo 'page';
} elseif(is_single(  )) {
  echo 'article';

} ?>" <?php body_class(  ); ?>>
	<?php wp_body_open(); ?>
<header id="header">
  <div class="inner">
    <h1 id="logo"> 
      <a href="<?php echo home_url('/'); ?>">
        <?php if (!empty(ha_get_option('theme_logo')['url'])) { ?>
          <img src="<?php echo ha_get_option('theme_logo')['url']; ?>" alt="<?php bloginfo( 'description' ); ?>" height="70">

          <?php 
          
        } else { bloginfo( 'name' );

        } ?>
        </a> 
      </h1>
    <div id="topBtn">
      <div id="navBtn"> <i></i> </div>
    </div>
   <?php get_search_form(  ); ?>
    
      <?php wp_nav_menu( array(
        'theme_location'  => 'menu-1',
        'container'  => 'nav',
        'container_id' => 'nav',
        'walker'  => new Mc_Menu_Walker()


      ) ); ?>
   
    <div class="clear"></div>
  </div>
</header>
<div id="blank"></div>

