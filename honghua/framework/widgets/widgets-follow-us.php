<?php 
//register widgets
add_action( 'widgets_init', 'hh_follow_us_widgets' );

function hh_follow_us_widgets() {
	register_widget( 'hh_follow_us' );
}

/**
 * Adds 关注我们小工具
 */
class Hh_Follow_Us extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'hh_follow_us', // Base ID
			'HH Follow Us Widgets', // Name
			array( 'description' => __( 'Follow Us Widget', 'honghua' ) ) // Args
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
    <ul class="cnt">
      <?php var_dump($instance['guanzhu_url']);?>
        <img src="skin/images/guanzhu.jpg" alt="<?php $title; ?>">
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
		
    $title = (isset( $instance['title'] )) ? $instance['title'] : __( 'Popular Posts', 'honghua' );
    $image_uri = (isset( $instance['image_uri'] )) ? $instance['image_uri'] : '';
		?>

		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_name( 'image_uri' ); ?>"><?php _e( 'Image Url:' ); ?></label>
			<input class="widefat image-upload" id="<?php echo $this->get_field_id( 'image_uri' ); ?>" name="<?php echo $this->get_field_name( 'image_uri' ); ?>" type="text" value="<?php echo esc_attr( $image_uri ); ?>" />
			<input type="button" class="button butoon-primary js-image-upload" value="Select Image">
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
		$instance['image_uri'] = ( ! empty( $new_instance['image_uri'] ) ) ? strip_tags( $new_instance['image_uri'] ) : '';
    
		return $instance;
	}

}  // hh popular widgets 