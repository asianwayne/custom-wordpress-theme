<?php 
/**
 * Template Name:experimental page
 */
get_header();


function parse_args_example($args = array()) {
  $defaults = array(
    'before' => 'I am the before',
    'after' => 'I am the after',

  );
  $combined_args = wp_parse_args($args, $defaults);

  var_dump($combined_args); 

}

parse_args_example('before=56789999&after=6352633');

echo '<br>';

$item = [];

foreach($posts as $post) {
  $item[] = [
    //array 里面push array 
    'post' => $post->post_title,
    'content' => $post->post_content,
    'fields'  => 'true'
  ];
}
echo '<pre>';

var_dump($item);

echo '</pre>';

$post_content = wp_list_pluck($posts,'post_content');
var_dump($post_content);

//但是wp_list_pluck无法做判断的事情  如果要获取作者是Nash的文章的话， 可以用array_map 
//比方说下面获取作者为nash的帖子 

$map_array = array_map(function ($data) { 
  //$data从posts传递过来
  if('Nash' == $data->author) {
    return $data->title; 
  }
}, $posts); 

//用arrary filter 过滤掉 null的数据 

var_dump(array_filter($map_array));