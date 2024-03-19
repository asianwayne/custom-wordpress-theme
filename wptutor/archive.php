<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wptutor
 */

get_header();
?>
<div class="section-heading" style="background-image: url('assets/img/other/bg-cat-1.jpg')">
        <div class="container-fluid">
            <div class="section-heading-5">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="section-heading-5-title">
                            <h1><?php the_archive_title(); ?></h1>
                            <p class="links">
                            <?php tie_breadcrumbs(); ?>
                            </p>
                            <p class="mt-3"><?php the_archive_description(); ?></p>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>


   <section class="blog-layout-5" style="transform: none;">
        <div class="container-fluid" style="transform: none;">
            <div class="row" style="transform: none;">
                <!--conetnt-->
                <div class="col-lg-8 oredoo-content" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                    <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 396.5px;">
                    <?php 
                    while(have_posts()) : the_post();
                    
                    ?>
                         <!--post 1-->
                        <div class="post-list post-list-style5">
                            <div class="post-list-content">
                                <h4 class="entry-title">
                                    <a href="<?php the_permalink() ?>"><?php the_title() ?> </a>
                                </h4>  
                                <ul class="entry-meta">
                                    <li class="post-author-img">
                                        <?php echo get_avatar(get_the_author_meta('ID')) ?></li>
                                    <li class="post-author"> 
                                        <?php the_author_posts_link() ?></li>
                                    <li class="entry-cat"><span class="line"></span> <?php entry_cat(1); ?></li>
                                    <li class="post-date"> <span class="line"></span> <?php the_time(get_option('date_format')) ?></li>
                                </ul>
                                <div class="post-exerpt">
                                    <p><?php echo mb_strimwidth(strip_tags(get_the_content()),0,200) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                      

                        <!--pagination-->
                        <div class="pagination">
                            <div class="pagination-area">
                                <div class="row"> 
                                    <div class="col-lg-12 text-center">
                                        <?php tie_get_pagenavi() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/-->
                    </div>
                </div>

                <!--sidebar-->
                <?php get_sidebar() ?>
                <!--/-->
            </div>
        </div>
    </section>



<?php

get_footer();
