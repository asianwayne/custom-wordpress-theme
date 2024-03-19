<?php 
// Register Popular posts widget
add_action( 'widgets_init', 'wpt_widgets_ads' );
function wpt_widgets_ads() {
  register_widget( 'Wpt_Widgets_Ads' );
}

/**
 * Adds Recent Posts widget.
 */
class Wpt_Widgets_Ads extends WP_Widget {
  /**
   * Register widget with WordPress.
   */
  public function __construct() {
    parent::__construct(
      'wpt_ads_widget', // id
      'WPT Ads widget', //name
      array( 'description' => __( 'Wordpress tutor Ads Widget', 'wptutor' ) ) // Args
    );
    add_action( 'admin_enqueue_scripts', array($this,'enqueue_scripts') );
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

    $widget_id = $args['widget_id']; 
    $ads_url = !empty($instance['ads_url']) ? $instance['ads_url'] : ''; 
    $img_alt = !empty($instance['img_alt']) ? $instance['img_alt'] : ''; 

     ?>
  
    <div class="widget pb-0">
        <div class="widget-ads">
            <img src="<?php echo $ads_url ?>" alt="<?php echo $img_alt ?>">
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

    $ads_url = !empty($instance['ads_url']) ? $instance['ads_url'] : ''; 
    $img_alt = !empty($instance['img_alt']) ? $instance['img_alt'] : ''; 

    $widget_id = $this->id_base . '-' . $this->number; 

    ?>
    <p>
      <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
     </p>

     <p>
      <label for="<?php echo $this->get_field_name( 'img_alt' ); ?>"><?php _e( 'Image Alt:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'img_alt' ); ?>" name="<?php echo $this->get_field_name( 'img_alt' ); ?>" type="text" value="<?php echo $img_alt; ?>" />
     </p>

     <p>
      <label for="<?php echo $this->get_field_name( 'ads_url' ); ?>"><?php _e( 'Ads Url:' ); ?></label>
      <input class="widefat custom_ads_widget_<?php echo $widget_id; ?>" id="<?php echo $this->get_field_id( 'ads_url' ); ?>" name="<?php echo $this->get_field_name( 'ads_url' ); ?>" type="text" value="<?php echo $ads_url; ?>" />
      <p><button id="ads_upload" class="custom_ads_widget_upload_button" data-target="<?php echo $this->get_field_id( 'ads_url' ); ?>" data-widget-id="<?php echo $widget_id; ?>">Upload</button></p>
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
    $instance['img_alt'] = ( ! empty( $new_instance['img_alt'] ) ) ? sanitize_text_field( $new_instance['img_alt'] ) : '';
    $instance['ads_url'] = ( ! empty( $new_instance['ads_url'] ) ) ? esc_url_raw( $new_instance['ads_url'] ) : '';
    return $instance;
  }

  public function enqueue_scripts($hook)
  {

    $widget_id = $this->id_base . '-' . $this->number;
    wp_enqueue_script( 'ads_widget_js', get_template_directory_uri() . '/framework/widgets/widgets_ads.js', array('jquery'),'1.0.0',true );
    
  }

} // class Foo_Widget