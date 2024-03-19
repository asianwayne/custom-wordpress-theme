<?php 
add_action( 'widgets_init', 'hh_register_recent_widgets' );
function hh_register_recent_widgets() {
	register_widget( 'hh_recent_posts' );
}

/**
 * Adds Foo_Widget widget.
 */
class Hh_Recent_Posts extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'hh_recent_posts', // Base ID
			'HH Recent Posts Widgets', // Name
			array( 'description' => __( 'Recent Posts Widget', 'honghua' ) ) // Args
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

    $count = (!empty($instance['count'])) ? $instance['count'] : '8';
    ?>
    <ul class="cnt">
      <?php 

      $w_r_query = new WP_Query(array(
        'posts_per_page' => $count,
        'post_type' => 'post',
        'ignore_sticky_posts' => 1
      ));

      while ($w_r_query->have_posts()) {
        $w_r_query->the_post();  ?>

        <li><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title();?></a></li>

        <?php 
      } wp_reset_postdata();
      
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
		
    $title = (isset( $instance['title'] )) ? $instance['title'] : __( 'Recent Posts', 'honghua' );
    $count = (isset( $instance['count'] )) ? $instance['count'] : '8';
		?>
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

    <p>
			<label for="<?php echo $this->get_field_name( 'count' ); ?>"><?php _e( 'count:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="number" value="<?php echo esc_attr( $count ); ?>" />
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
		$instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';

		return $instance;
	}

} 