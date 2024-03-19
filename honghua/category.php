<?php 
/**
 * Templetes for category 
 * if has sub child show the sub category template orelse show the parent templates 
 */

get_header();

$q_obj = get_queried_object(); 
$child_t = get_term_children($q_obj->term_id,'category');

 if (!empty($child_t)) { 
  //有子级的分类模板
  get_template_part('category', 'parent');
} else { get_template_part('category', 'single');
} 

get_footer();




