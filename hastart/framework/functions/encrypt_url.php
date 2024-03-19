<?php 
add_action('init', 'ha_adds_password_on_url',20);

function ha_adds_password_on_url() {
  //插件如果设置的话， 设置如果已经激活REDUX 就提示要新增redux字段如果没有激活redux就导入面板 
  //插件需配合字段使用，在后台新建valide_user和valide_pass字段来输入账户密码，新建allowered_path多选字段来输入路径

  global $user_ID;
  global $wpdb;

  $username = ha_get_option('valide_user');
  $password = ha_get_option('valide_pass');

    //获取所有页面来选择

    $current_url = parse_url( home_url( add_query_arg( array() ) ) );
  
    //specific url 
    $allowed_path = ha_get_option('allowered_path');
    if(!empty($allowed_path)) {
      foreach($allowed_path as $path) {
      //每个路径都执行一遍
      //如果是页面 $path 等于 $current_url['path'] == '/'.$path.'/' 如果不是页面 $path = $current_url['path'] == '/'.$path
      if(($current_url['path'] == '/'.$path.'/' || $current_url['path'] == '/'.$path || $current_url['path'] == $path) && $user_ID != 1) {
    
      //这个username和password要通过wp的用户验证
      //$_SERVER['PHP_AUTH_USER']&&$_SERVER['PHP_AUTH_PW']

      if (
        !isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
        ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)
      ) {
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="My Website"');
        exit('Sorry, you must enter a valid user name and password to access this page.');
      }

    }}}
    
// Page content goes here

}