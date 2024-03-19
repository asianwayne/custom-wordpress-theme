<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package honghua
 */

?>

<!-- right SIDEBAR  --> 
<div class=" main_r clearfix">
   <?php if (is_active_sidebar('sidebar-1')) {
    # code...
    dynamic_sidebar('sidebar-1');
   }?>
</div>
 
  <!-- right over --> 
