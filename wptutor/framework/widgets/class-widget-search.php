<?php 
// Register Popular posts widget
add_action( 'widgets_init', 'wpt_search_widget' );
function wpt_search_widget() {
  register_widget( 'Wpt_Search_Widget' );
}

/**
 * Adds Recent Posts widget.
 */
class Wpt_Search_Widget extends WP_Widget {
  /**
   * Register widget with WordPress.
   */
  public function __construct() {
    parent::__construct(
      'wpt_search_widget', // Base ID
      'Wpt Search Widget', // Name
      array( 'description' => __( 'Wordpress tutor search Widget', 'wptutor' ) ) // Args
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
        <div class=" widget-search">
            <form role="search" name="searchform" id="searchform" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                <input type="search" class="search-field" name="s" placeholder="Search ...." value="<?php echo get_search_query(  ); ?>">
                <button class="btn-submit" style="z-index: 1;"><i class="las la-search"></i></button>
            </form>
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
      $title = __( 'Search', 'wptutor' );
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