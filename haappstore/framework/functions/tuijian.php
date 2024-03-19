<?php 

add_action('wp_ajax_increase_tuijian', 'increase_tuijian_callback');
add_action('wp_ajax_nopriv_increase_tuijian', 'increase_tuijian_callback');
function increase_tuijian_callback() {
  if (isset($_POST['post_id'])) {
    $post_id = intval($_POST['post_id']);
    $cookie_name = 'tuijianClicked_' . $post_id;
    if (!isset($_COOKIE[$cookie_name])) {
      $tuijian = get_post_meta($post_id, 'tuijian', true);
      update_post_meta($post_id, 'tuijian', $tuijian + 1);
      echo 'success';
    } else {
      echo 'already_clicked';
    }
  }
  wp_die();
}
 ?>