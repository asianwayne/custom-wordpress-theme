<?php
/**
 * The main template file
 * this is the homepage - 4 template 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wptutor
 */

get_header();
?>


     <!-- blog-slider-->
    <section class="blog blog-home4 d-flex align-items-center justify-content-center" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel">

                        <?php 
                        $s_query = new WP_Query(array(
                            'post_type'  => 'post',
                            'posts_per_page' => 3, 
                            'post__in'  => get_option('sticky_posts'),
                            'ignore_sticky_posts'  => 1

                        ));

                        while ($s_query->have_posts()) {
                            $s_query->the_post(); ?>

                            <!--post1-->
                        <div class="blog-item" style="background-image: url('<?php the_post_thumbnail_url(  ); ?>')">
                            <div class="blog-banner">
                                <div class="post-overly">
                                    <div class="post-overly-content">

                                        <div class="entry-cat">
                                            <?php entry_cat(2); ?>
                                        </div>

                                        <h2 class="entry-title">
                                            <a href="<?php the_permalink(  ); ?>"><?php the_title(); ?> </a>
                                        </h2>

                                        <ul class="entry-meta">
                                            <li class="post-author"> 
                                                <?php echo get_the_author_posts_link(); ?>
                                            </li>
                                            <li class="post-date"> <span class="line"></span> <?php the_time( get_option( 'date_format' ) ); ?></li>
                                            <li class="post-timeread"> <span class="line"></span> 15 mins read</li>
                                        </ul>
                                    </div>   
                                </div>
                            </div>
                        </div>

                            <?php 
                            
                        } wp_reset_postdata();

                         ?>
                        

                         
                         <!--/-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- top categories-->
    <div class="categories">
        <div class="container-fluid">
            <div class="categories-area">
                <div class="row">
                    <div class="col-lg-12 ">

                        <div class="categories-items">
                            <?php 
                        $cats = get_categories( array('hide_empty'  => false) ); 
                        foreach ($cats as $cat) { ?>
                            <a class="category-item" href="<?php echo get_category_link( $cat ); ?>">
                                <div class="image">
                                    <?php 
                                    $cat_field = get_term_meta( $cat->term_id, 'ha_image_field_id', true ); 
                                    if ($cat_field) {
                                        $cat_cover = $cat_field['url'];
                                    } else {
                                        echo 'please upload the category cover image on the category admin page'; }
                                     
                                    ?>
                                    <img src="<?php echo $cat_cover; ?>" alt="<?php echo $cat->name; ?>">
                                    
                                </div>
                                <p><?php echo $cat->name; ?>  <span><?php echo $cat->category_count ?></span> </p>
                            </a>

                            <?php 
                             
                         } 

                        ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  

    
    <!--ads-->
    <?php if (!empty(ha_get_option('wpt-banner-one')['url'])) {
        # code... ?>
        <div class="ads ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <div class="image">
                    <img src="<?php echo ha_get_option('wpt-banner-one')['url'] ?>" alt="<?php echo bloginfo( 'description' ); ?>">
                </div>
                </div>
            </div>
        </div>             
    </div>

        <?php 

    } ?>
    

    
    <!-- Recent articles-->
    <section class=" section-feature-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 oredoo-content">
                    <div class="theiaStickySidebar">
                        <div class="section-title">
                            <!-- 后期通过后台组织 -->
                            <h3>最新教程 </h3>
                            <p>最新最全全网唯一教程.</p>
                        </div>
                
                        <?php 
                        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; 
                        $h_posts = new WP_Query(array(
                            'post_type'  => 'post',
                            'posts_per_page'  => 9,
                            'ignore_sticky_posts'  => 1,
                            'paged'  => get_query_var( 'paged', 1 )

                        ));

                        while ($h_posts->have_posts()) {
                            $h_posts->the_post(); 
                            get_template_part( 'template-parts/content' );
                            
                        } 

                        ?>

                        
                              
                        <!--pagination-->
                        <div class="pagination">
                            <div class="pagination-area">
                                
                                    <?php 
                                    // echo paginate_links( array(
                                    //     'total'  => $h_posts->max_num_pages, 
                                    //     'current' => max( 1, get_query_var('paged') ),

                                    // ) );
                                    tie_get_pagenavi($h_posts); 
                                    wp_reset_postdata(); ?>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <?php get_sidebar(); ?>
            </div>
        </div> 
    </section>

    
 
 
 
    
	

<?php

get_footer();
