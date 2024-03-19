<?php
function ha_get_option($option) {
  global $theme_options;

  if (!empty($theme_options[$option])) {
    return $theme_options[$option];
  }

  return false;
}

//add snow effect 

function ha_snow_effect() {
  if (!is_admin()) {?>

<style>
canvas#canvas{
  position: absolute;
  left: 0;
  top: 0;
  z-index: 99;
  pointer-events: none;
  width: 100%;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function(){
setTimeout(function() {
var canv = `<canvas id="canvas"></canvas>`;
document.body.insertAdjacentHTML("beforeend", canv);    
var body = document.body,
htmlElement = document.documentElement;
var height = body.offsetHeight ;
document.querySelector("#canvas").style.height = height + "px"
function startAnimation() {
  const CANVAS_WIDTH = window.innerWidth;
  const CANVAS_HEIGHT = height;
  const MIN = 0;
  const MAX = CANVAS_WIDTH;
  const canvas = document.querySelector("#canvas");
  const ctx = canvas.getContext("2d");
  canvas.width = CANVAS_WIDTH;
  canvas.height = CANVAS_HEIGHT;
  function clamp(number, min = MIN, max = MAX) {
    return Math.max(min, Math.min(number, max));
  }
  function random(factor = 1) {
    return Math.random() * factor;
  }
  function degreeToRadian(deg) {
    return deg * (Math.PI / 180);
  }
  class Circle {
    radius = 0;
    x = 0;
    y = 0;
    vx = 0;
    vy = 0;
    constructor(ctx) {
      this.ctx = ctx;
      this.reset();
    }
    draw() {
      this.ctx.beginPath();
      this.ctx.fillStyle = "rgba(255,255,255,0.8)";
      this.ctx.arc(this.x, this.y, this.radius, 0, 2 * Math.PI);
      this.ctx.fill();
      this.ctx.closePath();
    }
    reset() {
      this.radius = random(2.5);
      this.x = random(CANVAS_WIDTH);
      this.y = this.y ? 0 : random(CANVAS_HEIGHT);
      this.vx = clamp((Math.random() - 0.5) * 0.4, -0.4, 0.4);
      this.vy = clamp(random(1.5), 0.1, 0.8) * this.radius * 0.5;
    }
  }
  let circles = [];
  for (let i = 0; i < 300; i++) {
    circles.push(new Circle(ctx));
  }
  function clearCanvas() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
  }
  let canvasOffset = {
    x0: ctx.canvas.offsetLeft,
    y0: ctx.canvas.offsetTop,
    x1: ctx.canvas.offsetLeft + ctx.canvas.width,
    y1: ctx.canvas.offsetTop + ctx.canvas.height
  };
  
  function animate() {
    clearCanvas();
    circles.forEach((e) => {
      if (
        e.x <= canvasOffset.x0 ||
        e.x >= canvasOffset.x1 ||
        e.y <= canvasOffset.y0 ||
        e.y >= canvasOffset.y1
      ) {
        e.reset();
      }
      e.x = e.x + e.vx;
      e.y = e.y + e.vy;
      e.draw();
    });
    requestAnimationFrame(animate);
  }
  animate();
}
startAnimation();
window.addEventListener("resize", startAnimation);
}, 500);	
});
</script>

<?php 
  }
}

//add_action( 'wp_footer', 'ha_snow_effect');

//adds the keywords on single and page 

add_action('wp_head', function (){
if( is_single() || is_page() ) {
$meta_keywords_raw = (get_post_meta(get_the_ID(), 'keywords', true));
if ($meta_keywords_raw)	 {
$meta_keywords = preg_replace('/\s*,\s*/', ',', $meta_keywords_raw);
 }} else {

  $meta_keywords = ha_get_option('site_keywords');

} ?>
<meta name="keywords" content="<?= $meta_keywords; ?>">

<?php 


} );

function ha_excerpt() {

  if(has_excerpt()) {
    the_excerpt(); 

  } else {
    echo mb_strimwidth(strip_tags(get_the_content()), 0, 200); 
    
  }
}

function no_search_on_body($classes) {
  // Remove the "search" class from the array
  if(is_search()) {
    $classes = array_diff($classes, array('search'));
  }
  
  return $classes;
}
add_filter('body_class', 'no_search_on_body');

//ajax 

add_action('wp_ajax_nopriv_ha_load_more','ha_load_more');
add_action('wp_ajax_ha_load_more','ha_load_more');


function ha_load_more() {
  $next_page = $_REQUEST['paged'];
  if (isset($_REQUEST['home'])) {
    # code...
    
    $query = new WP_Query(
      array(
        
        'post_type'  => 'post',
        'paged'  => $next_page,
        'offset'  => ($next_page * 8) + 1,
        'posts_per_page' => 8,
        
        'ignore_sticky_posts'  => true,

      )
    );

    if ($query->have_posts()) {
      ob_start();
      while($query->have_posts()) {
        $query->the_post();

        get_template_part('template-parts/content');

      }

      wp_send_json_success(ob_get_clean());
     
    } else {
      wp_send_json_error('No posts'); 
    }

  }

  //now the js side recive the response 

}

// 跳转字段来自于后台


function ha_custom_redirects() {

  //old url 是路径的path 
  $old_urls = ha_get_option('old_url_render');
  $new_urls = ha_get_option('new_url_render');

  $counts = count($old_urls);

  //获取current url 

  $current_url = parse_url( home_url( add_query_arg( array() ) ) );

  //如果当前的
  
  foreach ($old_urls as $key=>$path) { 
    
    //$current_url['path'] == '/'.$path . '/' 相当于 is_page()
    if ($current_url['path'] == '/'.$path . '/' || $current_url['path'] == '/'.$path || $current_url['path'] == $path) {
      //如果当前url的路径是old_url里的path或者如果当前路径等于/ 也就是首页地址
       //可以用if is page 来检测是否是内部页面
        wp_redirect( $new_urls[$key], 301 );
        exit;
    }
  }

}

add_action( 'template_redirect', 'ha_custom_redirects' );

//添加离开前的跳出popup, beforeunload 重新 加载前的动作
function add_script_on_footer() { ?>

<script>
  jQuery(document).ready(($) => {

    $(window).on('beforeunload', function(){
    $('body').append('<div id="popup-form"><p>Are you sure you want to leave? Your data will not be saved.</p><button id="stay-button">Stay</button><button id="leave-button">Leave</button></div>');
    $('#popup-form').css({
        'position': 'fixed',
        'top': '50%',
        'left': '50%',
        'transform': 'translate(-50%, -50%)',
        'background-color': 'white',
        'padding': '20px',
        'border': '1px solid black'
    });
    $('#stay-button').click(function() {
        $('#popup-form').remove();
    });
    $('#leave-button').click(function() {
        window.location.href = "https://www.google.com/";
    });
    return false;
});

  });

</script>

<?php 

}

//add_action('wp_footer', 'add_script_on_footer',20);

//鼠标离开后的动作  跳出 popup 

function add_mouse_leave_action()
{
  if (is_home()) { ?>

<script>
  jQuery(document).ready(($) => {
    $(document).mouseleave(function(){
    $('body').append('<div id="popup-form"><div id="close-icon"></div><h2>Important message</h2><p>Please provide your email address to receive our newsletter</p><form><input type="email" placeholder="Enter your email" required/><button>Submit</button></form></div>');
    $('#popup-form').css({
        'position': 'fixed',
        'top': '50%',
        'left': '50%',
        'transform': 'translate(-50%, -50%)',
        'background-color': 'white',
        'padding': '20px',
        'border': '1px solid black'
    });
    $('#close-icon').css({
        'position': 'absolute',
        'top': '5px',
        'right': '5px',
        'width': '20px',
        'height': '20px',
        'background-color': 'red',
        'cursor': 'pointer'
    });
    $('#close-icon').click(function() {
        $('#popup-form').remove();
    });
});
  })

</script>
<?php
  }

}

// add_action('wp_footer', 'add_mouse_leave_action',30);


function add_bottom_banner_when_scroll() { 
  if (ha_get_option('bottom_banner_switch')) {

  ?>

<style>
#popup-form {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: white;
    padding: 20px;
    border: 1px solid black;
    display: none;
}
#close-icon {
    position: absolute;
    top: 5px;
    right: 5px;
    width: 20px;
    height: 20px;
    background-color: red;
    cursor: pointer;
}
</style>

<script>
  jQuery(document).ready(($) => {

    $(window).on("scroll", function() {
        var scrollPercent = 100 * $(window).scrollTop() / ($(document).height() - $(window).height());
        if (scrollPercent > 66) {
            $("#popup-form").css("display", "block");
        }
    });
    $("#close-icon").click(function() {
        $("#popup-form").remove();
    });

  });
    
</script>

<?php 

} }

  add_action('wp_footer', 'add_bottom_banner_when_scroll',40);


function author_request() { if (is_author()) { ?>
  <script>
    jQuery(document).ready(function($) {
    // 选好好文件之后直接上传到服务器 
     
    //check if loggedin
    
    //检测input file 的状态，选择文件后直接上传到服务器
    const username = 'wayne';
          const password = "GRZL lCPZ IAOT zxES K9DS w39z";
          const credentials = `${username}:${password}`;
          const encodedCredentials = btoa(credentials);
      var inputFile = $('input[type="file"]');

      //当上传按钮里面选择图片时候直接上传文件到服务器同时通过返回的函数实现user meta的profile image字段更新
      inputFile.change(function() { 

        var formData = new FormData();
        formData.append('file', inputFile[0].files[0]);
        $("#upload-alert").html("<p>上传中...</p>");
        //任何内置的默认的 接口post 方式都是内置的验证的方式，都必须登陆
        //processData和contentType设置的意思就是不要让ajax处理任何我们提交的文件
        $.ajax({
            url:'https://xmdn.net/wp-json/wp/v2/media',
            method:'post',
            beforeSend:xhr => {
              xhr.setRequestHeader('X-WP-Nonce',hastart.nonce_1);
            },
            data:formData,
            processData:false, 
            contentType:false,

        success: res => {
          console.log(res);
          //成功上传之后发送请求到custom rest route ， 自定义头像的断点
          const uploadedAvatar = res.media_details.sizes; 

          const avartarImg = $('#user-avartar')[0].files[0];
         
          //已经上传图片到media了，发送请求到custom profile endpoint  
          $.ajax({
            url:'https://www.xmdn.net/wp-json/harest/v1/profile',
            method:'POST',
            beforeSend: xhr => {
              xhr.setRequestHeader('Authorization',`Basic ${encodedCredentials}`);
            },
            data:{
              image_src:uploadedAvatar.full.source_url,
              user_id:hastart.user_id
            },
            
            success:res => {
            console.log(res);
           
            $("#upload-alert").html("<p>成功上传到服务器<span><i style='color:green' class='fa fa-check' aria-hidden='true'></i></span></p>");
            console.log('success change the avatar of current user'); }} ); },
          error: err => {
            $("#upload-alert").html("<p style='color:red'>上传失败，没有权限</p>");
          }
        }); 
      });
      //结束头像上传

    
    //先上传到media library 
    $("#user-profile").on('submit',function(e) { 
      e.preventDefault();

      //首先验证用户是否登陆，用/users/me ， 如果不登陆一票否决
      
          const username = 'wayne';
          const password = "GRZL lCPZ IAOT zxES K9DS w39z";
          const credentials = `${username}:${password}`;
          const encodedCredentials = btoa(credentials);
          const form = $("#user-profile")[0];
          const formData = new FormData(form);

      
        $.ajax({
          url:'https://xmdn.net/wp-json/wp/v2/users/me',
          method:'GET',
          beforeSend:xhr => {
            xhr.setRequestHeader('X-WP-Nonce',hastart.nonce_1);
          },
          success: res => {
            //if user logged in
            console.log('you are loggedin');

            //send to the users/me post endpoint 
            $.ajax({
              url:'https://xmdn.net/wp-json/wp/v2/users/me',
              method:'post',
              beforeSend:xhr => {
                xhr.setRequestHeader('X-WP-Nonce',hastart.nonce_1);
              },
              data:{
                name:formData.get("user-name"),
                email:formData.get("user-email"),
                description:formData.get("user-description"),

              },
              success:res => {
                swal(
                {
                  title:"成功更新用户信息",
                  icon:"success"
                }).then( name => {
                  if (name) {
                    location.reload();
                  }
                });
                

              },
              error:err => {

                swal({
                  title:'权限检查失败',
                  icon:"error"
                });
                form.reset();
              }
            });
            
          },
          error:err => {
            //if user not logged in
            swal("检查权限失败，您还没有登陆或者验证方式错误");
            console.log('you are not logged in ');
            form.reset();
          }


        });

    });

      });


    
    // $("#user-profile").on('submit',function(e) {

    //   e.preventDefault();
      
    //   const formData = new FormData();
    //   const fileInput = document.getElementById('user-avartar');
    //   const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
      
    //   console.log($("#user-avartar").val());
    //   // Check if the selected file is an image file
    //   if (allowedTypes.includes(fileInput.files[0].type)) {
    //     formData.append('user-avartar', fileInput.files[0]);
      
    //     // Use the WordPress Media Library API to upload the image
    //     wp.media.upload({
    //       files: formData,
    //       beforeSend: function() {
    //         // Do something before the upload starts
    //       },
    //       success: function(response) {
    //         // Handle the server response here
    //       },
    //       error: function(error) {
    //         // Handle any errors here
    //       }
    //     });
    //   } else {
    //     alert('Please select an image file');
    //   }



    //   $.ajax({
    //     url:"https://xmdn.net/wp-json/wp/v2/users/me",
    //     method:'GET',
    //     beforeSend: function(xhr) {
    //           xhr.setRequestHeader('X-WP-Nonce', hastart.nonce_1);
    //         },

    //         success:res => {
    //           //user logged in
    //           $.ajax({
    //     url:'https://xmdn.net/wp-json/wp/v2/users/me',
    //     data:{
    //       name:$("#user-name").val(),
    //       description:$("#user-description").val(),
    //       email:$("#user-email").val()
    //     },
    //     beforeSend:function(xhr) {
    //       xhr.setRequestHeader('X-WP-Nonce',hastart.nonce_1);

    //     },
    //     method:'post',
    //     success:function(res) {
    //      //res returns the user info
    //       swal({
    //         title:'成功更新用户信息',
    //         icon:'success'
    //       });
           
    //     }


    //   });
              
    //         },
    //         error: err => {
    //          console.log(err.responseText);
    //          const data = JSON.parse(err.responseText);
    //          console.log(data);
    //           swal({
    //             title:data.message,
    //             icon:'error'
    //           });
    //         }
    //   })

    //   console.log('You are good');



    // }); 

  </script>
  <?php }
}

add_action( 'wp_footer', 'author_request',20 );




add_action( 'wp_head', 'ha_add_body_filter' );

function ha_add_body_filter() {
  if (ha_get_option('switch_grey')) { ?>
    <style>
  html {
    -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
    -moz-filter: grayscale(100%); /* Firefox 4.0 - 15.0 */
    -o-filter: grayscale(100%); /* Opera 10.5 - 12.0 */
    -ms-filter: grayscale(100%); /* Internet Explorer 9.0 - 11.0 */
    filter: grayscale(100%); /* Standard syntax */
  }
</style>
    <?php 
    
  } if (ha_get_option('switch_red')) { ?>
    <style>
    html {
      -webkit-filter: hue-rotate(180deg); /* Safari and Chrome */
      -moz-filter: hue-rotate(180deg); /* Firefox */
      -ms-filter: hue-rotate(180deg); /* Internet Explorer */
      -o-filter: hue-rotate(180deg); /* Opera */
      filter: hue-rotate(180deg); /* Standard */
    }
  </style>
    <?php 
  }
  ?>

  <?php 
}


function add_last_nav_item( $items ) {
  //<i class="fa fa-sun-o" aria-hidden="true"></i>
    $items .= '<li><a class="btn" id="toggle-mode"><i class="fa fa-moon-o" aria-hidden="true"></i></a></li>';
    $items .= '<li>
    <div class="dropdown">
  <button onclick="toggleDropdown()" class="dropbtn" id="loginBtn"><i class="fa fa-user" aria-hidden="true"></i></button>
  
</div>
    </li>
    ';

    return $items;
}

add_filter( 'wp_nav_menu_items', 'add_last_nav_item' );

function add_meta_robot_login_page() {
    if ( is_page( 'wp-login.php' ) ) {
        echo '<meta name="robots" content="noindex,nofollow" />';
    }
}
add_action( 'wp_head', 'add_meta_robot_login_page' );


//make categories dragable and dropable 
//require_once get_template_directory() . '/framework/plugins/drag-cats/drag-cats.php';

//remove emoji of wordpress 
function disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disable_emojis');

function disable_embeds_code_init() {
    remove_action('wp_head', 'wp_oembed_add_host_js');
}
add_action('init', 'disable_embeds_code_init', 9999);


function dequeue_comment_reply() {
    if (!is_singular() && !is_admin() && !is_page_template('page-templates/my-custom-template.php')) {
        wp_dequeue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'dequeue_comment_reply');


// function remember_me_checked( $args ) {
//   $args['remember'] = true;
//   return $args;
// }
// add_filter( 'authenticate', 'remember_me_checked' );

// Allow users with edit_posts capability to create posts via REST API
add_filter( 'rest_post_dispatch', 'allow_edit_posts_create_posts', 10, 3 );

function allow_edit_posts_create_posts( $response, $server, $request ) {
    // Check if user has edit_posts capability
    if ( current_user_can( 'edit_posts' ) ) {
        // Check if request is for creating a new post
        if ( 'POST' === $request->get_method() && ! $request->get_param( 'id' ) ) {
            // Add the edit_posts capability to the post type's required capabilities
            $post_type = $request->get_param( 'type' );
            $post_type_obj = get_post_type_object( $post_type );
            if ( $post_type_obj ) {
                $post_type_caps = $post_type_obj->cap;
                $post_type_caps['create_posts'] = 'edit_posts';
                $server->response( $response );
            }
        }
    }
    return $response;
}


//init profile image api 
add_action( 'rest_api_init', 'ha_api_custom_route' );

function ha_api_custom_route() {
  register_rest_route('harest/v1','/profile',[
    'methods' => 'POST',
    'callback'  => 'upload_image_profile',
    'permission_callback'  => '__return_true',

  ]);
}

function upload_image_profile($request) {

  $image_src = $request->get_param('image_src');
  $user_id = $request->get_param('user_id');

  //check user exist
  $user = get_user_by('id',$user_id);

  if (empty($user)) {
    return new WP_Error('ERROR','user does not exists',array('status' => 400));
    
  }
  if (empty($image_src)) {
    return new WP_Error('ERROR','image src is empty',array('status' => 400));
  }
  $user_id = $user->ID;
  //update user meta 
  update_user_meta( $user_id, 'ha_profile_image', $image_src );

  //return 
  return new WP_REST_Response(array('status' => 'success','user_id' => $user_id,'image_src' => $image_src,'message' => 'Image updated'),200);

}

add_filter( 'pre_get_avatar', 'ha_pre_get_avatar',10,2 );

function ha_pre_get_avatar($avatar,$id_or_email) {
  //check email or id 
   $user = false;

    if ( is_numeric( $id_or_email ) ) {
        $user_id   = (int) $id_or_email;
        $user = get_user_by( 'id', $user_id );
    } elseif ( is_object( $id_or_email ) ) {
        if ( ! empty( $id_or_email->user_id ) ) {
            $user_id   = (int) $id_or_email->user_id;
            $user = get_user_by( 'id', $user_id );
        }
    } else {
        $user = get_user_by( 'email', $id_or_email );
        $user_id = $user->ID;
    }

    if (!empty($user_id)) {
       if (!empty(get_user_meta($user_id,'ha_profile_image',true))) {
    $profile_image = get_user_meta($user_id,'ha_profile_image',true);
     $avatar = "<img src='$profile_image' class='avatar avatar-96 photo' height='96' width='96' alt='profile image'>";
    
  }
    }

  //check the user meta 
  return $avatar;
}

function disable_comments_feed_link() {
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'index_rel_link' );
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
    remove_action( 'wp_head', 'rest_output_link_wp_head' );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
    remove_action( 'wp_head', 'redux_meta_generator_tag' );
}
 
add_action( 'after_setup_theme', 'disable_comments_feed_link' );


// Register custom post meta 为点赞创建字段
function custom_register_post_meta() {
    register_post_meta('post', 'likeCount', array(
        'show_in_rest' => true,  // To make the field available in the block editor
        'single' => true,       // Whether the post meta should have a single value
        'type' => 'string',     // Data type of the post meta
        
    ));
}
add_action('init', 'custom_register_post_meta');


//创建点赞的自定义的路由 
// Add custom REST API endpoint for updating like count
add_action('rest_api_init', 'custom_like_endpoint');

function custom_like_endpoint() {
    register_rest_route('custom/v1', '/like/(?P<id>\d+)', array(
        'methods' => 'POST',
        'callback' => 'update_like_count',
        'permission_callback' => '__return_true', // Allow unauthenticated requests
    ));
}

//回调函数更新点赞字段

function update_like_count($request) {
    $post_id = $request->get_param('id');
    
    // Update like count logic here
    $like_count = get_post_meta($post_id, 'likeCount', true);
    $like_count = empty($like_count) ? 1 : $like_count + 1;
    update_post_meta($post_id, 'likeCount', $like_count);
    
    // Return a response indicating success
    return new WP_REST_Response(array('message' => 'Like count updated.', 'meta' => array('likeCount' => $like_count)));
}


