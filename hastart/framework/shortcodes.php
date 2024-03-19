<?php
/**
 * Shortcode modules 
 */

 ## Ads1 -------------------------------------------------- #
function tie_shortcode_ads1( $atts, $content = null ) {
	$out ='<div class="e3lan e3lan-in-sidebar1"><img src="' . ha_get_option('sidebar_1')['url'] . '"></div>';
	 return $out;
}
add_shortcode('ads1', 'tie_shortcode_ads1');
 ## Ads2 -------------------------------------------------- #
function tie_shortcode_ads2( $atts, $content = null ) {
	$out ='<div class="e3lan e3lan-in-sidebar2"><img src="' . ha_get_option('sidebar_2')['url'] . '"></div>';
	 return $out;
}
add_shortcode('ads2', 'tie_shortcode_ads2');

 ## Ads3 -------------------------------------------------- #
function tie_shortcode_ads3( $atts, $content = null ) {
	$out ='<div class="e3lan e3lan-in-sidebar3"><img src="' . ha_get_option('sidebar_3')['url'] . '"></div>';
	 return $out;
}
add_shortcode('ads3', 'tie_shortcode_ads3');


