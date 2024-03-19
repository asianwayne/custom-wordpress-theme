<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wptutor
 */

?>

<!--instagram 接口-->
<?php if (ha_get_option('open_ins') == 'on') { ?>
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
    

	<!--footer-->
    <div class="footer">
        <div class="footer-area">
            <div class="footer-area-content">
                <div class="container">
                    
                        <?php if(is_active_sidebar('sidebar-footer')) dynamic_sidebar('sidebar-footer'); ?>
                        <!-- <div class="col-md-3">
                            <div class="menu">
                                <h6>Menu</h6>
                                <ul>
                                    <li><a href="#">Homepage</a></li>
                                    <li><a href="#">about us</a></li>
                                    <li><a href="#">contact us</a></li>
                                    <li><a href="#">privarcy</a></li>
                                </ul>
                            </div>
                        </div> -->
                        <!--newslatter-->
                        <!-- <div class="col-md-6">
                            <div class="newslettre">
                                <div class="newslettre-info">
                                    <h3>Subscribe To OurNewsletter</h3>
                                    <p>Sign up for free and be the first to get notified about new posts.</p>
                                </div>

                                <form action="#" class="newslettre-form">
                                    <div class="form-flex">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email Adress" required="required">
                                        </div>
                                        <button class="submit-btn" type="submit">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div> -->
                        <!--/-->
                        <!-- <div class="col-md-3">
                            <div class="menu">
                                <h6>Follow us</h6>
                                <ul>
                                    <li><a href="#">facebook</a></li>
                                    <li><a href="#">instagram</a></li>
                                    <li><a href="#">youtube</a></li>
                                    <li><a href="#">twitter</a></li>
                                </ul>
                            </div>
                        </div> -->
                    
                 </div>
            </div>
           <!--footer-copyright-->
            <div class="footer-area-copyright">
                <div class="container">
                    <div class="row">
                       <div class="col-lg-12">
                        <!-- 版权和备案 -->
                           <div class="copyright">
                            <p>© <?php echo date('Y') ?>,  <?php echo ha_get_option('wpt_copyright') ?></p>
                            <p><?php echo ha_get_option('wpt_beian') ?></p>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
            <!--/-->
        </div>
    </div>

    <!--Back-to-top-->
    <div class="back">
        <a href="#" class="back-top">
            <i class="las la-long-arrow-alt-up"></i>
        </a>
    </div>
   
    <!--Search-form-->
    <div class="search">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-10 m-auto">
                    <div class="search-width">
                        <button type="button" class="close">
                            <i class="far fa-times"></i>
                        </button>
                        <form class="search-form" action="search.html">
                            <input type="search" value="" placeholder="What are you looking for?">
                            <button type="submit" class="search-btn"> search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    


</body>
<?php wp_footer(); ?>

</html>