<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package guowen
 */

?>
	<!DOCTYPE html>
<html <?php language_attributes(  ); ?>>
<head>
<meta name="charset" value="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1,initial-scale=1,maximum-scale=1">
<?php wp_head();  ?>
<script>
  
   
</script>

</head>
<body <?php body_class(  ); ?>>
	<?php wp_body_open(); ?>
<header class="header-navigation" id="header">
  <nav>
  	<!-- logo -->
    <div class="logo"> 
    	<a href="<?php echo home_url( '/' ); ?>">

    	<img src="static/upload/image/20220106/1641448368105766.png" alt="">
    </a> </div>

   <!-- navigation -->

   <?php wp_nav_menu(array(
    'theme_location' => 'menu-1',
    'container' => false,
    'menu_id' => 'starlist',
    'walker' => new Gu_Nav_Walker()
   )); ?>

    
    <div class="fademask"></div>
    <div id="mnavh"> <span class="mobile-menu wordicon-menu"></span> </div>
    <div class="jznight ">
      <a href="#" target="_self" class="switch_mode"><span class="wordicon-moon-line">

      </span>
      </a>
    </div>
    <div class="searchbox "> <span class="search-btn wordicon-search"></span> </div>
    <form method="get" action="<?php echo esc_url(home_url('/')) ?>" class="b-nav-search_wrap" target="_blank">
      <input type="search" name="s" class="b-nav-search_input w-input" maxlength="256" name="keyword" placeholder="请输入关键字..." autocomplete="off">
      <button><i class="wordicon-search"></i></button>
    </form>
  </nav>
</header>
