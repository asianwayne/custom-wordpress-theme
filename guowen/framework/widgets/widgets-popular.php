<?php
/**
 * Register widget 
 */

add_action('widgets_init','guowen_popular_widget');

function guowen_popular_widget() {
  register_widget( 'guowen_popular_widget' );
}

/**
 * Adds Foo_Widget widget.
 */
class Guowen_Popular_Widget extends WP_Widget {
  /**
   * Register widget with WordPress.
   */
  public function __construct() {
    $widget_ops = array(
      'classname' => 'side_bar',
      'description' => __( 'Guwen Popular Widget' ),
    );
    parent::__construct(
      'side-hot-view-item', // Base ID
      'Guowen Popular Widget', // Name
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

    $args['before_widget'] = '<div id="side-hot-view-item" class="side_bar">';
    extract( $args );
    
    $title = apply_filters( 'widget_title', $instance['title'] );
    echo $before_widget;
    if ( ! empty( $title ) ) {
      echo $before_title . $title . $after_title;
    }
     ?>

    <ul>
          <?php 
          $w_p_query = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 6

          ));

          while ($w_p_query->have_posts()) {
            $w_p_query->the_post(); ?>

            <li class="widlist"> <a href="<?php the_permalink() ?>" target="_blank" title="自己在家300字作文"> <i class="gx"> <img src="<?php the_post_thumbnail_url(  ); ?>" alt="自己在家300字作文"> </i> </a>
            <h3> <a href="<?php the_permalink() ?>" target="_blank" title="自己在家300字作文"><?php the_title() ?></a> </h3>
            <div class="sidefoot"> <span><?php the_time( get_option('date_format') ); ?></span> </div>
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