<?php 
/*
Plugin >> Name: WP-PageNavi
Plugin URI: http://lesterchan.net/portfolio/programming/php/
Description: Adds a more advanced paging navigation to your WordPress blog.
Version: 2.50
Author: Lester 'GaMerZ' Chan
Author URI: http://lesterchan.net
*/


/*  
	Copyright 2009  Lester Chan  (email : lesterchan@gmail.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


### Function: Page Navigation: Boxed Style Paging
## 使用的时候如果是自定义的查询就要在函数里添加查询的参数 



function tie_get_pagenavi($query = false, $num = false , $before = '', $after = '') {
	global $wpdb, $wp_query;
	$pagenavi_options = tie_pagenavi_init(); 
	
	if (!is_single()) {
	
		if( !empty($query) ){
			$request = $query->request;
			$numposts = $query->found_posts;
			$max_page = $query->max_num_pages;
			$posts_per_page = intval($num);
		}else{
			$request = $wp_query->request;
			$numposts = $wp_query->found_posts;
			$max_page = $wp_query->max_num_pages;
			$posts_per_page = intval(get_query_var('posts_per_page'));
		}
		
		$paged = intval(get_query_var('paged'));
		$paged_2 = intval(get_query_var('page'));
				
		if( empty( $paged ) && !empty( $paged_2 )  ) {
			$paged = intval(get_query_var('page'));
		}
		
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		
		$pages_to_show = intval($pagenavi_options['num_pages']);
		$larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
		$larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
		$pages_to_show_minus_1 = $pages_to_show - 1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
		$larger_per_page = $larger_page_to_show*$larger_page_multiple;
		$larger_start_page_start = (tie_n_round($start_page, 10) + $larger_page_multiple) - $larger_per_page;
		$larger_start_page_end = tie_n_round($start_page, 10) + $larger_page_multiple;
		$larger_end_page_start = tie_n_round($end_page, 10) + $larger_page_multiple;
		$larger_end_page_end = tie_n_round($end_page, 10) + ($larger_per_page);
		if($larger_start_page_end - $larger_page_multiple == $start_page) {
			$larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
			$larger_start_page_end = $larger_start_page_end - $larger_page_multiple;
		}
		if($larger_start_page_start <= 0) {
			$larger_start_page_start = $larger_page_multiple;
		}
		if($larger_start_page_end > $max_page) {
			$larger_start_page_end = $max_page;
		}
		if($larger_end_page_end > $max_page) {
			$larger_end_page_end = $max_page;
		}
    
		if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {
			$pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
			$pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
			echo $before.'<div class="pagebar">'."\n";
					
					if ($start_page >= 2 && $pages_to_show < $max_page) {
            // 第一页

						$first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
						echo '<span class="first"><a href="'.esc_url(get_pagenum_link()).'" class="first" title="'.$first_page_text.'">'.$first_page_text.'</a></span>';

            // dotleft_text
						if(!empty($pagenavi_options['dotleft_text'])) {
							echo '<span class="extend">'.$pagenavi_options['dotleft_text'].'</span>';
						}

					}

					if($larger_page_to_show > 0 && $larger_start_page_start > 0 && $larger_start_page_end <= $max_page) {

						for($i = $larger_start_page_start; $i < $larger_start_page_end; $i+=$larger_page_multiple) {
              // 
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
							echo '<span class="numbershow"><a href="'.esc_url(get_pagenum_link($i)).'" class="page page-item page-link st" title="'.$page_text.'">'.$page_text.'</a></span>';

						}
					}

      if(!empty(get_previous_posts_link())) :
      echo '<span class="page-pre">';
					previous_posts_link($pagenavi_options['prev_text']);
          
      echo '</span>';

      endif;
      echo '<span class="page-numbar">';
          
					for($i = $start_page; $i  <= $end_page; $i++) {			
            //当前页， 就是当前页数的输出			
						if($i == $paged) {
							$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
							echo '<a class="current page-num page-num-current">'.$current_page_text.'</a>';
						} 
            //非当前页的输出
            else {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
							echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="page-item page-link st page-num" title="'.$page_text.'">'.$page_text.'</a>';
						}
					}

      echo '</span>';

      if (!empty(get_next_posts_link())):
        echo '<span class="page-next">';
          
          next_posts_link($pagenavi_options['next_text'], $max_page);

        echo '</span>';
      endif;
					
          if(!empty($pages_text)) {
						echo '<span class="whereisit"><a class="page-item page-link page-num" href="javascript:;">'.$pages_text.'</a></span>';
					}

          echo '</div>'.$after."\n";
          //yes this is the end
					}

					if($larger_page_to_show > 0 && $larger_end_page_start < $max_page) {
						for($i = $larger_end_page_start; $i <= $larger_end_page_end; $i+=$larger_page_multiple) {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
							echo '<span><a href="'.esc_url(get_pagenum_link($i)).'" class="page" title="'.$page_text.'">'.$page_text.'</a></span>';
						}
					}
					if ($end_page < $max_page) {
						if(!empty($pagenavi_options['dotright_text'])) {
							echo '<span class="extend">'.$pagenavi_options['dotright_text'].'</span>';
						}
						$last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
						echo '<span><a href="'.esc_url(get_pagenum_link($max_page)).'" class="last" title="'.$last_page_text.'">'.$last_page_text.'</a></span>';
					}

			
		}
	}



### Function: Round To The Nearest Value
function tie_n_round($num, $tonearest) {
   return floor($num/$tonearest)*$tonearest;
}


### Function: Page Navigation Options
function tie_pagenavi_init() {
	$pagenavi_options = array();
	$pagenavi_options['pages_text'] = __('Page %CURRENT_PAGE% of %TOTAL_PAGES%' );
	$pagenavi_options['current_text'] = '%PAGE_NUMBER%';
	$pagenavi_options['page_text'] = '%PAGE_NUMBER%';
	$pagenavi_options['first_text'] = __('&laquo; First');
	$pagenavi_options['last_text'] = __('Last &raquo;');
	$pagenavi_options['next_text'] = __('&raquo;','tie');
	$pagenavi_options['prev_text'] = __('&lt;&lt;','tie');
	$pagenavi_options['dotright_text'] = '...';
	$pagenavi_options['dotleft_text'] = '...';
	
	
	$pagenavi_options['num_pages'] = 5;
	
	$pagenavi_options['always_show'] = 0;
	$pagenavi_options['num_larger_page_numbers'] = 3;
	$pagenavi_options['larger_page_numbers_multiple'] = 10;
	
	return $pagenavi_options;
}

add_filter('previous_posts_link_attributes', 'filter_previous_anchor');

function filter_previous_anchor($attr) {
  # code...
  $attr .= 'class="page-item page-link st"';
  return $attr; 
}

//hook to add span to the previuos and next




