<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wptutor
 */


?>

<!--Sidebar-->
                <div class="col-lg-4 oredoo-sidebar">
                    <div class="theiaStickySidebar">
                        <div class="sidebar">
                            <?php 
                            if (is_active_sidebar( 'sidebar-1' )) {
                                dynamic_sidebar( 'sidebar-1' );
                                
                            }

                             ?>

                            <!--Ads-->
                            <div class="widget pb-0">
                                <div class="widget-ads">
                                    <img src="assets/img/ads/ads2.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/-->
