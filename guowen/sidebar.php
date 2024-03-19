<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package guowen
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

?>

<!-- SIDEBAR -->

    <div class="aside l_box" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
      <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">

      <?php 
        if (is_active_sidebar( 'sidebar-1' )) {
          dynamic_sidebar( 'sidebar-1' );
          
        }

       ?>
      </div>
    </div>
