<?php 
// Register Popular posts widget
add_action( 'widgets_init', 'wpt_popular_posts_widget' );
function wpt_popular_posts_widget() {
  register_widget( 'Wpt_Popular_Posts' );
}

/**
 * Adds Recent Posts widget.
 */
class Wpt_Popular_Posts extends WP_Widget {
  /**
   * Register widget with WordPress.
   */
  public function __construct() {
    parent::__construct(
      'wpt_popular_posts', // Base ID
      'Wpt Popular Posts', // Name
      array( 'description' => __( 'Wordpress tutor popular posts Widget', 'wptutor' ) ) // Args
    );
  }
  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters( 'widget_title', $instance['title'] );
    echo $before_widget;
     ?>
    <div class="widget">
                                <div class="widget-title">
                                    <h5><?php echo $title; ?></h5>
                                </div>
                            
                                <ul class="widget-popular-posts">
                                  <?php 
                                  $post_type = !empty($instance['select_type']) ? $instance['select_type'] : 'post';
                                  $count = !empty($instance['count']) ? $instance['count'] : '8';
                                  $w_p_query = new WP_Query(array(
                                    'post_type'  => $post_type,
                                    'posts_per_page'  => $count,

                                  ));
                                  while ($w_p_query->have_posts()) {
                                    $w_p_query->the_post(); ?>
                                    <!--post1-->
                                    <li class="small-post">
                                      <?php 
                                      if ($instance['enable_thumb']) { if (has_post_thumbnail(  )) { ?>
                                        <div class="small-post-image">
                                            <a href="<?php the_permalink() ?>">
                                                <img src="<?php the_post_thumbnail_url(  ); ?>" alt="<?php the_title() ?>">
                                                <small class="nb">1</small>
                                            </a>
                                        </div>

                                        <?php 
                                        
                                      } 
                                      }

                                       ?>
                                        
                                        <div class="small-post-content">
                                            <p>
                                                <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                            </p>
                                            <small> <span class="slash"></span>3 mounth ago</small>
                                        </div>
                                    </li>

                                    <?php 
                                      
                                  } wp_reset_postdata();
                                   ?>
                                    

                                   
                                </ul>
                            </div>
   
    <?php 
    echo $after_widget;
  }
  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    if ( isset( $instance['title'] ) ) {
      $title = $instance['title'];
    } else {
      $title = __( 'Popular Posts', 'wptutor' );
    }
    ?>
    <p>
      <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
     </p>
     <!-- number of posts  -->
     <p>
      <label for="<?php echo $this->get_field_name( 'count' ); ?>"><?php _e( 'Count:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="number" value="<?php echo !empty($instance['count']) ? $instance['count'] : ''; ?>" />
     </p>

     <!-- show thumbnail -->
     <p>
      <label for="<?php echo $this->get_field_name( 'enable_thumb' ); ?>"><?php _e( 'Enable Thumb:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'enable_thumb' ); ?>" name="<?php echo $this->get_field_name( 'enable_thumb' ); ?>" type="checkbox" <?php checked( $instance['enable_thumb'], 'on' ); ?> />
     </p>

     <!-- post type -->
     <p>
      <label for="<?php echo $this->get_field_name( 'select_type' ); ?>"><?php _e( 'Choose Post Type:' ); ?></label>
      <select class="widefat" name="<?php echo $this->get_field_name( 'select_type' ); ?>" id="<?php echo $this->get_field_id( 'select_type' ); ?>">
        <?php $postTypes = get_post_types(); $select_type = !empty($instance['select_type']) ? $instance['select_type'] : '';

        foreach ($postTypes as $type) { ?>
          <option value="<?php echo $type; ?>" <?php selected( $select_type, $type ); ?>><?php echo $type; ?></option>

          <?php 
          
        }
         ?>
        
      </select>
      
     </p>
     

    <?php
  }
  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {
    $instance          = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';
    $instance['enable_thumb'] = ( ! empty( $new_instance['enable_thumb'] ) ) ?  $new_instance['enable_thumb']  : 'off';
    $instance['select_type'] = ( ! empty( $new_instance['select_type'] ) ) ?  $new_instance['select_type']  : '';
    return $instance;
  }
} // class Foo_Widget