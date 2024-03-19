<?php
/**
 * Register widget 
 */

add_action('widgets_init','tag_group_widget');

function tag_group_widget() {
  register_widget( 'tag_group_widget' );
}

/**
 * Adds Foo_Widget widget.
 */
class Tag_Group_Widget extends WP_Widget {
  /**
   * Register widget with WordPress.
   */
  
  public function __construct() {
    $widget_ops = array(
      'classname' => 'side_bar',
      'description' => __( 'Guwen Tag Group' ),
    );

    parent::__construct(
      'guowen_tag_group', // Base ID
      'Guowen Tag Group', // Name
      $widget_ops // Args
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

    $args['before_widget'] = '<div id="divTags" class="side_bar">';
    extract( $args );
    
    $title = apply_filters( 'widget_title', $instance['title'] );
    echo $before_widget;
    if ( ! empty( $title ) ) {
      echo $before_title . $title . $after_title;
    }
     ?>

    <ul>
      <?php $tags = get_tags();  ?>
      <?php foreach($tags as $tag) : ?>
        <li><a href="<?php echo get_term_link( $tag->term_id ); ?>" target="_blank"><?php echo $tag->name ?></a></li>

        <?php 
        endforeach;
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
      $title = __( 'Popular', 'text_domain' );
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