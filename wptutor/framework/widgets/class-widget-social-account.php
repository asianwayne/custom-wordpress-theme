<?php 
// Register Popular posts widget
add_action( 'widgets_init', 'wpt_social_account_widget' );
function wpt_social_account_widget() {
  register_widget( 'Wpt_Social_Account_Widget' );
}

/**
 * Adds Recent Posts widget.
 */
class Wpt_Social_Account_Widget extends WP_Widget {
  /**
   * Register widget with WordPress.
   */
  public function __construct() {
    parent::__construct(
      'wpt_social_account_widget', // Base ID
      'Wpt Social Account Widget', // Name
      array( 'description' => __( 'Wordpress tutor social account Widget', 'wptutor' ) ) // Args
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
    <div class="widget ">
                                <div class="widget-title">
                                    <h5><?php echo $title; ?></h5>
                                </div>
                                
                                <div class="widget-stay-connected">
                                    <div class="list">
                                        <div class="item color-facebook">
                                            <a href="#"><i class="fab fa-facebook"></i></a>
                                            <p>Facebook 12k</p>
                                        </div>

                                        <div class="item color-instagram">
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                            <p>instagram 102k</p>
                                        </div>

                                        <div class="item color-twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            <p>twitter 22k</p>
                                        </div>

                                        <div class="item color-youtube">
                                            <a href="#"><i class="fab fa-youtube"></i></a>
                                            <p>Youtube 120k</p>
                                        </div>

                                        <div class="item color-dribbble">
                                            <a href="#"><i class="fab fa-dribbble"></i></a>
                                            <p>dribbble 17k</p> 
                                        </div>

                                        <div class="item color-pinterest">
                                            <a href="#"><i class="fab fa-pinterest"></i></a>
                                            <p>pinterest 10k</p> 
                                        </div>
                                    </div>
                                </div>
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
      $title = __( 'Social Account', 'wptutor' );
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