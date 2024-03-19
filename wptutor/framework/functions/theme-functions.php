<?php 

function ha_get_option($opt) {

  global $theme_options; 

  if (!empty($theme_options[$opt])) {
    return $theme_options[$opt];
    
  }

  return false;

}

// add classes on li
function codedocs_add_classes_on_li($classes) { 
  $classes[] = 'nav-item'; 
  return $classes;
}

add_filter( 'nav_menu_css_class', 'codedocs_add_classes_on_li' );

//add classes on anchor of wp nav menu
function codedocs_add_classes_on_anchor($atts) { 
  $class = 'nav-link'; 
  $atts['class'] = $class; 
  return $atts;
}

add_filter('nav_menu_link_attributes','codedocs_add_classes_on_anchor');

//add active to current item
function codedocs_add_active_to_nav_class($classes) {
 if (in_array('current-menu-item', $classes)) {  $classes[] = 'active'; }
 return $classes;}

 add_filter( 'nav_menu_css_class', 'codedocs_add_active_to_nav_class' );


 ### 使用tax_meta_class 时候将分类图片显示到管理栏 
add_filter( 'manage_edit-category_columns', 'add_cat_cover_column' );

function add_cat_cover_column($columns)
{
  $columns['cover'] = esc_html__('COVER','hablog');
  return $columns;
}

add_action( 'manage_category_custom_column', 'cat_cover_custom_column_content',10,3 );
//add_filter('manage_category_custom_column','cat_cover_custom_column_content',1,2);
function cat_cover_custom_column_content($string,$columns,$term_id) {

  if (!empty(get_term_meta( $term_id, 'ha_image_field_id', true ))) {
    $cat_cover = get_term_meta( $term_id, 'ha_image_field_id', true );
  } else {
    $cat_cover = '';
  }
  switch ($columns) {

    case 'cover':
      // code...
      if (!empty($cat_cover)) {
        echo '<img width=50 height=50 src='.$cat_cover['url'].'>';
      } else {
        echo 'No cover found!';
      }

      break;
  }
}

function entry_cat($seq = null) { 
  global $post;
        $post_cat = get_the_category( $post->ID );
        foreach ($post_cat as $cat) {  ?>
          <a href="<?php echo get_category_link( $cat->term_id ); ?>" class="category-style-<?=$seq?>"><?php echo $cat->name ?></a>

          <?php 
          
        }
       

}

function author_box() { global $post; ?>

  
      <div class="authors-info">
          <div class="image">
              <a href="author.html" class="image">
                  <?php echo get_avatar( get_the_author_meta('ID')); ?>
              </a>
          </div>
          <div class="content">
              <h4><?php echo get_the_author_meta( 'display_name' ); ?></h4>
              <p> <?php echo get_the_author_meta( 'description' ); ?>
              </p>
              <div class="social-media">
                  <ul class="list-inline">
                    <?php 
                    $user_id = get_the_author_meta('ID'); 
                    $social_media_fields = get_user_meta( $user_id, 'social_media_fields', true );

                    

                    if (is_array($social_media_fields)) {

                      foreach ($social_media_fields as $platform => $url) {

                        $url = esc_url($url);

                        if (!empty($url)) {
                          $platform_icon_class = 'fab fa-'.$platform;  ?>

                          <li>
                          <a href="<?php echo $url; ?>">
                              <i class="<?php echo $platform_icon_class; ?>"></i>
                          </a>
                          </li>

                          <?php 
                          
                        }
                        
                      }
                      
                    }

                    ?>
                      
                      
                  </ul>
              </div>
          </div>
      </div>


  <?php 


}

function share_box() { ?>
  <div class="social-media">
      <p>Share on :</p>
      <ul class="list-inline">
          <li>
              <a href="#">
                  <i class="fab fa-facebook"></i>
              </a>
          </li>
          <li>
              <a href="#">
                  <i class="fab fa-instagram"></i>
              </a>
          </li>
          <li>
              <a href="#">
                  <i class="fab fa-twitter"></i>
              </a>
          </li>
          <li>
              <a href="#" >
                  <i class="fab fa-youtube"></i>
              </a>
          </li>
          <li>
              <a href="#" >
                  <i class="fab fa-pinterest"></i>
              </a>
          </li>
      </ul>
  </div>            


  <?php 



}

function page_heading($args = null) { 
  if (!isset($args['heading'])) {

    $args['heading'] = get_the_title(  );
    
  }

  ?>

  <div class="section-heading ">
        <div class="container-fluid">
             <div class="section-heading-2">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="section-heading-2-title">
                             <h1><?php echo $args['heading']; ?></h1>
                             <p class="links"><?php echo tie_breadcrumbs(); ?></p>
                         </div>
                     </div>  
                 </div>
             </div>
         </div>
    </div>

  <?php 

}