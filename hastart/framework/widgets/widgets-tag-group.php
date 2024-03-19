<?php 
// Register Popular posts widget
add_action( 'widgets_init', 'ha_tag_group_widget' );
function ha_tag_group_widget() {
	register_widget( 'Ha_Tag_Group_Widget' );
}

/**
 * Adds Recent Posts widget.
 */
class Ha_Tag_Group_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'ha_tag_group_widget', // Base ID
			'Hastart Tag Group Widget', // Name
			array( 'description' => __( 'Tag Group Widget', 'hastart' ) ) // Args
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

    <div id="hot_tags" class="part clear hot_tags">
          <div class="top">
            <h3 class="title"><?php echo $title; ?></h3>
          </div>
          <ul class="hot_tags">
            <?php $tags = get_tags();
            foreach($tags as $tag) { ?>
             <li><a href="<?php echo get_term_link($tag->term_id) ?>" class="tag"><?php echo $tag->name; ?></a></li>

            <?php 

            }
             ?>
            
         
          
          </ul>
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
			$title = __( '标签云', 'hastart' );
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