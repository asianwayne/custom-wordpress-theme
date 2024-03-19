<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wptutor
 */

?>

<!--post1-->
                        <div id="post-<?php the_ID() ?>" class="post-list post-list-style4"> 
                        	<?php 
                            if ( ha_get_option('disable_thumb') && has_post_thumbnail(  )): ?>
                        		<div class="post-list-image">
                                <a href="<?php the_permalink(  ); ?>">
                                    <img src="<?php the_post_thumbnail_url(  ); ?>" alt="<?php the_title(); ?>">
                                </a>
                            </div>
                        		
                        	<?php endif; 
                            ?>
                            

                            <div class="post-list-content">
                                <ul class="entry-meta"> 
                                    <li class="entry-cat">
                                        <?php entry_cat(1); ?>
                                    </li>
                                    <li class="post-date"> <span class="line"></span> <?php the_time( get_option('date_format')); ?></li>
                                </ul>
                                <h5 class="entry-title">
                                    <a href="<?php the_permalink(  ); ?>"><?php the_title(); ?></a>
                                </h5> 
                            
                                <div class="post-btn">
                                    <a href="post-single.html" class="btn-read-more">Continue Reading <i class="las la-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
