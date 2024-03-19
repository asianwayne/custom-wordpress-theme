<?php 
// Register Popular posts widget
add_action( 'widgets_init', 'register_recentapp_widget' );
function register_recentapp_widget() {
  register_widget( 'Recentapp_Widget' );
}

/**
 * Adds Recent Posts widget.
 */
class Recentapp_Widget extends WP_Widget {
  /**
   * Register widget with WordPress.
   */
  public function __construct() {
    parent::__construct(
      'recentapp_widget', // Base ID
      'Haapp recentapp widget', // Name
      array( 'description' => __( 'Recent app Widget', 'haapp' ) ) // Args
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

    if ( ! empty( $title ) ) {
      echo $before_title . $title . $after_title;
    }
     ?>

     <ul>
          <?php 
          $h_w_query = new WP_Query(array(
            'post_type'  => 'app', 
            'posts_per_page'  => 6,
            

          ));

          while ($h_w_query->have_posts()) {
            $h_w_query->the_post();  ?>
            <li>
            <figure class="icon"><a href="<?php the_permalink() ?>" title="<?php the_title() ?>" target="_blank"><img src="<?php the_post_thumbnail_url(  ); ?>" alt="<?php the_title() ?>"></a></figure>
            <div class="info">
              <h4><a href="<?php the_permalink() ?>" title="<?php the_title() ?>" target="_blank"><?php the_title() ?></a></h4>
              <p><?php echo mb_strimwidth(strip_tags(get_post_meta( get_the_ID(), 'itemintro', true )),0,150); ?></p>
            </div>
          </li>


            <?php 
              
          }

           ?>
          
        </ul>

    
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
      $title = __( '最新APP', 'hastart' );
    }
    ?>
    <p>
      <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
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
    return $instance;
  }
} // class Foo_Widget

