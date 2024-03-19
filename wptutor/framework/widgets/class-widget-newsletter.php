<?php 
// Register Popular posts widget
add_action( 'widgets_init', 'wpt_newsletter_widget' );
function wpt_newsletter_widget() {
  register_widget( 'Wpt_Newsletter_Widget' );
}

/**
 * Adds Recent Posts widget.
 */
class Wpt_Newsletter_Widget extends WP_Widget {
  /**
   * Register widget with WordPress.
   */
  public function __construct() {
    parent::__construct(
      'wpt_newsletter_widget', // Base ID
      'Wpt Newsletter Widget', // Name
      array( 'description' => __( 'Wordpress tutor newsletter Widget', 'wptutor' ) ) // Args
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
    $format = isset($instance['format']) ? $instance['format'] : 'side'; 
    if ($format == 'side') { ?>
    <div class="widget widget-newsletter">
        <h5><?php echo $title; ?>暂不更新</h5>
        <p>No spam, notifications only about new products, updates.</p>
        <form action="#" class="newslettre-form">
            <div class="form-flex">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Your Email Adress" required="required">
                </div>
                <button class="btn-custom" type="submit">Subscribe now</button>
            </div>
        </form>
    </div>

    <?php 
      # code...
    } if ($format == 'footer') {
      # code... ?>
  
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
                        

<?php 
    }
     ?>
    
   
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
      $title = __( 'Newsletter', 'wptutor' );
    }

    $format = isset($instance['format']) ? $instance['format'] : 'side';
    ?>
    <p>
      <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
     </p>
     <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Select Position</label>
      <select name="<?php echo $this->get_field_name( 'format' ); ?>" id="<?php echo $this->get_field_id( 'title' ); ?>">
        <option value="any">Any</option>
        <option value="side" <?php selected($format, 'side') ?>>Side</option>
        <option value="footer" <?php selected($format, 'footer') ?>>Footer</option>
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
    $instance['format'] = ( ! empty( $new_instance['format'] ) ) ? strip_tags( $new_instance['format'] ) : '';
    return $instance;
  }
} // class Foo_Widget