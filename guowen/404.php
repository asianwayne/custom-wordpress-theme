<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package guowen
 */

get_header();
?>

<div class="article" style="transform: none;">
	<div id="container">
		<div id="stage" class="stage">
			<div id="clouds" class="stage" style="background-position: 1984.5px 0px;"></div>
		</div>
		
		<div id="ticket" style="background:url(<?php echo ha_get_option('404_ticket_bg')['url'] ?>)">
			<section id="ticket_left">
				<p class="text1_a">找不到你要的目的地了</p>
				<p class="text2_a">Flight not found</p>
				<p class="text3_a">Error 404</p>
				<p class="text4_a">Sorry!</p>
				<p class="text5_a">From</p>
				<p class="text6_a">Somewhere</p>
				<p class="text7_a">To</p>
				<p class="text8_a">Nowhere</p>			
				<p class="text9_a">Seat</p>
				<p class="text10_a">404</p>
				<p class="text11_a">Try another flight</p>
					
			</section>
			
			<section id="ticket_right">
				<p class="text1_b">First class</p>
				<p class="text2_b">Lost in the clouds</p>
				<p class="text3_b">From</p>
				<p class="text4_b">Somewhere</p>
				<p class="text5_b">To</p>
				<p class="text6_b">Nowhere</p>
				<p class="text7_b">Seat</p>
				<p class="text8_b">404</p>
				<p class="text9_b">1</p>
				<p class="text10_b">103076498</p>
			</section>
		</div>
	</div>
</div>
	

