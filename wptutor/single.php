<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wptutor
 */

get_header();
while (have_posts()) : the_post();
?>

	
    <!--post-single-->
    <section class="post-single">
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-lg-12">
                    <!--post-single-image-->
                    <?php if (has_post_thumbnail(  )) { ?>
                    	<div class="post-single-image">
                            <img src="<?php the_post_thumbnail_url(  ); ?>" alt="<?php the_title(); ?>">
                        </div>

                    	<?php 
                    	
                    } ?>
                        
                          
                        <div class="post-single-body">
                            <!--post-single-title-->
                            <div class="post-single-title">  
                                <h2> <?php the_title(); ?></h2>        
                                <ul class="entry-meta">
                                    <li class="post-author-img"><?php echo get_avatar(get_the_author_meta('ID')); ?></li>
                                    <li class="post-author"> <?php echo get_the_author_posts_link(  ); ?></li>
                                    <li class="entry-cat"> 
                                        <span class="line"></span><?php entry_cat(1) ?>
                                    </li>
                                    <li class="post-date"> <span class="line"></span> <?php the_time( get_option('date_format') ); ?></li>
                                </ul>
                                
                            </div>

                            <!--post-single-content-->
                            <div class="post-single-content">
                                <?php the_content(); ?>
                            </div>
                            
                            <!--post-single-bottom-->
                            
                                    
                                        <?php 
                                        $tags = get_the_tags(  );
                                        if (!empty($tags)) { ?>
                                            <div class="post-single-bottom"> 
                                                <div class="tags">
                                                <p>Tags:</p>
                                                <ul class="list-inline">

                                            <?php 

                                            foreach ($tags as $tag) { ?>
                                                
                                                <li >
                                                    <a href="<?php echo get_tag_link( $tag ); ?>"><?php echo $tag->name; ?></a>
                                                </li>
                                        

                                            <?php 
                                            
                                        }

                                        echo '</ul></div></div>';

                                            
                                        }
                                        
                                         ?>

                            <!--post-single-author-->
                            <div class="post-single-author ">
                            <?php author_box(); ?>
                            </div>

                             <!--post-single-Related posts-->
                             <div class="post-single-next-previous">
                                <div class="row ">
                                    <?php 
                                    $previous_post = get_previous_post();
                                    $next_post = get_next_post(); 
                                    if ($previous_post) { ?>
                                        <!--prevvious post-->
                                    <div class="col-md-6">

                                        <div class="small-post">
                                            <?php 
                                            $previous_post_thumb = get_the_post_thumbnail($previous_post );
                                            if (!empty($previous_post_thumb)) { ?>
                                                <div class="small-post-image">
                                                <a href="<?php echo get_permalink($previous_post); ?>">
                                                    <img src="<?php echo get_the_post_thumbnail_url( $previous_post ); ?>" alt="<?php echo $previous_post->post_title ?>">
                                                </a>
                                            </div>

                                                <?php 
                                                
                                            }
                                             ?>
                                            
                            
                                            <div class="small-post-content">
                                            <small>  <a href="<?php echo get_permalink($previous_post); ?>"> <i class="las la-arrow-left"></i>Previous post</a></small>
                                            
                                            <p>
                                                <a href="<?php echo get_permalink($previous_post); ?>"><?php echo $previous_post->post_title ?></a>
                                            </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/-->
                                        <?php 
                                        
                                    } 
                                    if ($next_post) { ?>
                                        <!--next post-->
                                    <div class="col-md-6">
                                        <div class="small-post">
                                            <?php 
                                            $next_post_thumb = get_the_post_thumbnail($next_post );
                                            if (!empty($next_post_thumb)) { ?>
                                                <div class="small-post-image">
                                                <a href="<?php echo get_permalink($next_post); ?>">
                                                    <img src="<?php echo get_the_post_thumbnail_url( $next_post ); ?>" alt="<?php echo $next_post->post_title ?>">
                                                </a>
                                            </div>

                                                <?php 
                                                
                                            }
                                             ?>
                                            
                            
                                            <div class="small-post-content">
                                                <small> <a href="<?php echo get_permalink($next_post); ?>">Next post <i class="las la-arrow-right"></i></a> </small>
                                                <p>
                                                    <a href="<?php echo get_permalink($next_post); ?>"><?php echo $next_post->post_title ?></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/-->

                                        <?php 
                                        
                                    }
                                    ?>
                                    

                                    
                                </div>
                            </div>
                            <!--post-single-Ads-->
                            <?php if (!empty(ha_get_option('single_bottom_ads')['url'])) { ?>
                                <div class="post-single-ads ">
                                <div class="ads">
                                    <img src="<?php echo ha_get_option('single_bottom_ads')['url']; ?>" alt="<?php the_title() ?>">
                                </div>
                                </div>
    
                                <?php 
                                
                            } ?>
                            <!--post-single-comments-->
                           
                        </div>
                </div>
            </div>
        </div>
    </section>

    <?php if (ha_get_option('open_ins') == 'on') { ?>

        <!--instagram-->
      <div class="instagram">
        <div class="container-fluid">
            <div class="instagram-area">
                <div class="instagram-list">
                    <div class="instagram-item">
                        <a href="#">
                            <img src="assets/img/instagram/1.jpg" alt="">
                            <div class="icon">
                            <i class="lab la-instagram"></i>
                            </div>
                        </a>
                    </div>

                    <div class="instagram-item">
                        <a href="#">
                            <img src="assets/img/instagram/2.jpg" alt="">
                            <div class="icon">
                             <i class="lab la-instagram"></i>
                            </div>
                        </a>
                    </div>
                    <div class="instagram-item">
                        <a href="#">
                            <img src="assets/img/instagram/3.jpg" alt="">
                            <div class="icon">
                             <i class="lab la-instagram"></i>
                            </div>
                        </a>
                    </div>
                    <div class="instagram-item">
                        <a href="#">
                            <img src="assets/img/instagram/4.jpg" alt="">
                            <div class="icon">
                             <i class="lab la-instagram"></i>
                            </div>
                        </a>
                    </div>
                    <div class="instagram-item">
                        <a href="#">
                            <img src="assets/img/instagram/5.jpg" alt="">
                            <div class="icon">
                             <i class="lab la-instagram"></i>
                            </div>
                        </a>
                    </div>
                    <div class="instagram-item">
                        <a href="#">
                            <img src="assets/img/instagram/6.jpg" alt="">
                            <div class="icon">
                             <i class="lab la-instagram"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <?php 
        
    } ?>
      

<?php
endwhile;
get_footer();
