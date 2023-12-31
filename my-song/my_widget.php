<?php

/**
 * Widget
 * 
 * @link https://developer.wordpress.org/themes/functionality/widgets/
 * 
 * @package MY SONG
 * @since 0.17
 */

// Avoids code execution if WordPress is not loaded (Security Measure)
if (!defined('ABSPATH'))
{
	exit;
}

/**
 * Create the unbelievable widget ;-)
 *
 * @since 0.4
 */

class my_widget extends WP_Widget {

	// Widget Definition
	public function __construct() {
		parent::__construct(
		'my_widget',
		'MY SONG',
		array( 'description' => __( 'Displays a random line of your text', 'my-song'  ), )
		);
	}

	// Widget Output
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$widget_line=my_get_anything();
		echo '<aside class="widget my">';
		echo '<h3 class="widget-title my">';
			if ( ! empty( $title ) )
				echo $title;
		echo '</h3>';
		echo '<p class="widget-my">'.$widget_line.'</p>';
		echo '</aside>';
	}

	// Widget Form
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
	}

	// Widget Update
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}

}

/**
 * Activate the widget.
 *
 * @since 0.4
 */

function register_my_widget() {
    register_widget( 'my_widget' );
}
add_action( 'widgets_init', 'register_my_widget' );

?>