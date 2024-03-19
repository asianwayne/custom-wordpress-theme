<!DOCTYPE html>
<html <?php language_attributes(  ); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php wp_head(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body class="home blog">

  
<header class="header">
  <div class="inner">
    <h1 class="logo"> 
      <a title="<?php bloginfo('name') ?>" href="<?php echo home_url('/'); ?>" 
      >
      <img src="<?php echo ha_get_option('theme_logo')['url'] ?>" alt="">
      
      </a> </h1>

    <div class="wapbtn">
      <div class="searchbtn"></div>
      <div class="navbtn"></div>

    </div>
    <?php get_search_form(  ); ?>

  </div>
</header>

<div class="bar">
  <div class="inner">
    <?php wp_nav_menu( array(
      'theme_location'  => 'primary',
      'container'  => 'nav',
      'menu_class'  => 'menus',
      'container_class' => 'nav',


    ) ); ?>
    
    <!-- extend-social -->
    <div class="social">
    <ul>
        <li>
            <?php if (is_user_logged_in()) { ?>
                <div class="dropdown">
    <a class="logout-btn" href="#">你好，
        <?php echo wp_get_current_user()->user_login ?> <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <?php $current_user = wp_get_current_user();
$author_page_url = get_author_posts_url($current_user->ID); ?>
        <li><a href="<?php echo esc_url($author_page_url); ?>">下载记录</a></li>
        <li><a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a></li>
    </ul>
</div>

            <?php } else { ?>
                <a class="btn login-btn"><i><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M16 1c-4.418 0-8 3.582-8 8 0 .585.063 1.155.182 1.704l-8.182 7.296v5h6v-2h2v-2h2l3.066-2.556c.909.359 1.898.556 2.934.556 4.418 0 8-3.582 8-8s-3.582-8-8-8zm-6.362 17l3.244-2.703c.417.164 1.513.703 3.118.703 3.859 0 7-3.14 7-7s-3.141-7-7-7c-3.86 0-7 3.14-7 7 0 .853.139 1.398.283 2.062l-8.283 7.386v3.552h4v-2h2v-2h2.638zm.168-4l-.667-.745-7.139 6.402v1.343l7.806-7zm10.194-7c0-1.104-.896-2-2-2s-2 .896-2 2 .896 2 2 2 2-.896 2-2zm-1 0c0-.552-.448-1-1-1s-1 .448-1 1 .448 1 1 1 1-.448 1-1z"/></svg></i>登录</a>
            <?php } ?>
        </li>
    </ul>
</div>

<div id="login-popup" class="login-popup">
    <div class="login-popup-content">
        <span class="close-popup">&times;</span>
        <?php wp_login_form(); ?>
    </div>
</div>

    
    <div class="clear"></div>
  </div>
</div>

