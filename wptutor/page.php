<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wptutor
 */

get_header();
page_heading();
?>


    <section class="about-us">
        <div class="container-fluid">
            <div class="about-us-area">
                <div class="row ">
                    <div class="col-lg-12 ">
                        <?php if (has_post_thumbnail(  )) { ?>
                            <div class="image">
                            <?php the_post_thumbnail(); ?>
                        </div>

                            <?php 
                            
                        } ?>
                        
                   
                        <div class="description">
                            <?php 

                            the_content();

                             ?>

                            <!-- <a href="contact.html" class="btn-custom">Contact us</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	

<?php

get_footer();
