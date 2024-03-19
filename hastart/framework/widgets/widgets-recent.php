<?php 
// Register Popular posts widget
add_action( 'widgets_init', 'ha_recent_posts_widget' );
function ha_recent_posts_widget() {
	register_widget( 'Ha_Recent_Posts_Widget' );
}

/**
 * Adds Recent Posts widget.
 */
class Ha_Recent_Posts_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'ha_recent_posts_widget', // Base ID
			'Hastart Recent Posts Widget', // Name
			array( 'description' => __( 'Recent Posts Widget', 'hastart' ) ) // Args
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

    <div id="hot_posts" class="part clear hot_posts">
          <div class="top">
            <h3 class="title"><?php echo $title;?></h3>
          </div>
          <ul class="hot_posts">
			
          <?php
          $query = new WP_Query(
            array(
              
              'ignore_sticky_posts'  => true,
              'posts_per_page'  => 5,
            )
          );
          while ($query->have_posts()):
            $query->the_post();
          
          ?>
          <li><span class="point border-box"></span>
              <div class="cont"><a class="text" href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a>
                <p><time><?php the_time(get_option('date_format')) ?></time><span style="margin-left:16px">浏览次数:<?php echo get_post_meta(get_the_ID(),'tie_views',true) ?></span></p>
              </div>
              <div class="br"></div>
          </li>
          <?php endwhile;
          wp_reset_postdata(); ?>
			
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
			$title = __( '最新文章', 'hastart' );
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