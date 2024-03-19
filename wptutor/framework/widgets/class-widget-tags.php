<?php 
// Register Popular posts widget
add_action( 'widgets_init', 'wpt_tags_widget' );
function wpt_tags_widget() {
  register_widget( 'Wpt_Tags_Widget' );
}

/**
 * Adds Recent Posts widget.
 */
class Wpt_Tags_Widget extends WP_Widget {
  /**
   * Register widget with WordPress.
   */
  public function __construct() {
    parent::__construct(
      'wpt_tags_widget', // id
      'WPT tags widget', //name
      array( 'description' => __( 'Wordpress tutor tags Widget', 'wptutor' ) ) // Args
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
                                    <h5>Tags</h5>
                                </div>
                                <div class="widget-tags">
                                    <ul class="list-inline">
                                        <?php 

                                        $allTags = get_tags( array('hide_empty' => $instance['hide_empty']) );
                                        foreach ($allTags as $tag) { ?>
                                            <li>
                                            <a href="<?php echo get_tag_link( $tag ); ?>"><?php echo $tag->name; ?></a>
                                            </li>

                                            <?php 
                                            
                                        }

                                         ?>
                                    </ul>
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
      $title = __( 'Tags', 'wptutor' );
    }
    ?>
    <p>
      <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
     </p>

     <p>
      <label for="<?php echo $this->get_field_name( 'hide_empty' ); ?>"><?php _e( 'Hide Empty:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'hide_empty' ); ?>" name="<?php echo $this->get_field_name( 'hide_empty' ); ?>" type="checkbox" <?php checked( $instance['hide_empty'], 'on'); ?> />
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
    $instance['hide_empty'] = $new_instance['hide_empty'];
    return $instance;
  }
} // class Foo_Widget