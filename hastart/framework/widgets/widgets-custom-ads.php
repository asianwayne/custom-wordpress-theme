<?php 
// Register Popular posts widget
add_action( 'widgets_init', 'hs_custom_ads_widget' );
function hs_custom_ads_widget() {
  register_widget( 'Hs_Custom_Ads_Widget' );
}
/**
 * Adds Foo_Widget widget.
 */
class Hs_Custom_Ads_Widget extends WP_Widget {
  /**
   * Register widget with WordPress.
   */
  public function __construct() {
    parent::__construct(
      'hs_custom_ads_widget', // Base ID
      'Custom Ads Widget', // Name
      array( 'description' => __( 'Custom Ads Widget', 'hastart' ) ) // Args
    );

    add_action( 'admin_enqueue_scripts', array($this,'enqueue_script') );
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
    $img_url = !empty($instance['img_url']) ? $instance['img_url'] : '';
    echo $before_widget;
     ?>
     <h1><?php echo $title; ?></h1>
     <div class="img-container">
        <a href="">
       <img width="295" height="295" src="<?php echo $img_url; ?>" alt="这是图片">
       </a>
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
      $title = __( 'Custom Ads', 'hastart' );
    }
    $img_url = !empty($instance['img_url']) ? $instance['img_url'] : '';
    //从class传递过来
   $widget_id = $this->id_base . '-' . $this->number; 

    ?>
    <p>
      <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
     </p>


     <p>
      <label for="<?php echo $this->get_field_name( 'img_url' ); ?>"><?php _e( 'Image:' ); ?></label>
      <input class="widefat custom-ads-img-url" id="<?php echo $this->get_field_id( 'img_url' ); ?>" name="<?php echo $this->get_field_name( 'img_url' ); ?>" type="text" value="<?php echo $img_url; ?>" />
     </p>
     <button data-widget-id="<?php echo $this->get_field_id( 'img_url' ); ?>" class="btn ads_widget_upload_btn" data-target="<?php echo $this->get_field_name( 'img_url' ); ?>">Upload</button>
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
    $instance['img_url'] = ( ! empty( $new_instance['img_url'] ) ) ? esc_url_raw( $new_instance['img_url'] ) : '';
    return $instance;
  }

  public function enqueue_script() {
    wp_enqueue_media(  );
    wp_enqueue_script('hs-custom-widget-js', get_template_directory_uri() . '/framework/widgets/js/hs-widgets.js',array('jquery'),'1.0.0.1',true);

  }
} // 