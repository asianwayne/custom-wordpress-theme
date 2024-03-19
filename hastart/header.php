<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hastart
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset') ?>">

<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="bytedance-verification-code" content="d+uskIts6iMQf1Km0aSW" />
<?php wp_head(); ?>
</head>

<?php if (ha_get_option('top_banner_switch')) { ?>
  <div id="top-banner" style="display:none ;">
  <a href="#">
    <img src="<?=ha_get_option('top_banner')['url']?>" alt="" style="width:100%;">
  </a>
  
  <button id="close-button"></button>
</div>

  <?php 
  
} ?>

<body <?php body_class('light-mode') ?>>

<header class="header">
  <div class="container">
		<!-- logo -->
    <div class="logo">
      <h1> <a href="<?php echo home_url('/') ?>" title="<?php bloginfo('name') ?>">
			<img src="<?php echo ha_get_option('theme_logo')['url']  ?>" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo('name') ?>"></a> </h1>
    </div>

    <div id="m-btn" class="m-btn"><i class="fa fa-bars"></i></div>
		<!-- search form -->
    <?php get_search_form(); ?>
		<!-- navigation -->
    <nav class="nav-bar" id="nav-box" data-type="index" data-infoid="index">
      
				<?php wp_nav_menu(array(
					'theme_location'  => 'menu-1',
					'menu_class'  => 'nav',
          'container'  => false
				)) ?>
    </nav>
    
  </div>
</header>
<!-- The Modal -->
<div id="loginModal" class="modal">


  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    
    <h2 style="text-align: center;">登陆</h2>
    
    <?php  wp_login_form( array(
        'remember' => true,
        'redirect' => home_url(),
    ) ); ?>
  </div>

</div>


<?php if (ha_get_option('bottom_banner_switch')) { ?> 
  <div id="popup-form" style="display: none; position: fixed; bottom: 0; left: 0; width: 100%; background-color: white; padding: 20px; box-sizing: border-box;">
    <button id="close-icon" style="position: absolute; top: 5px; right: 5px;">X</button>
    <p>这是底部的订阅</p>
    <form>
        <input type="email" placeholder="Enter your email" required>
        <button>Subscribe</button>
    </form>
</div>

  <?php 
  
} ?>

<div id="mask"></div>

