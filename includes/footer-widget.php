<?php 
/**
 * Adds footertWidget widget.
 */
class footertWidget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'footer_widget', // Base ID
			__( 'Footer Contact Information', 'acframework' ), // Name
			array( 'description' => __( 'Add fields in the theme options footer section.', 'acframework' ), ) // Args
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
		$footer_options = get_option('ac_footer_settings');
		$general_options = get_option('ac_general_settings');

		$phone_number = $general_options['ac_number'];
		$footer_address = $footer_options['footer_address'];
		$footer_chat_title = $footer_options['footer_chat_title'];

		echo $args['before_widget'];
		if ( ! empty( $instance['contact_title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['contact_title'] ). $args['after_title'];
		}
		if( !empty($footer_address) ){
			echo '<div class="footer-address">'. htmlspecialchars_decode($footer_address) .'</div>';
		}
		echo '<div class="contact-wrap"><i class="fa fa-phone"></i><p>Talk to a caring addiction <br> specialist now.<br><a href="tel:'. preg_replace("/[^0-9,.]/", "", $phone_number) .'">Call Us ' . $phone_number . ' </a></p></div>';
		echo '<div class="chat-wrap"><i class="fa fa-weixin"></i><p>We are online 24 hours,<br> 7 days a week. <br><a href="#" onclick="Comm100API.open_chat_window(event, 1225);">'. $footer_chat_title .'</a></p></div>';
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$contact_title = ! empty( $instance['contact_title'] ) ? $instance['contact_title'] : __( 'Contact Us', 'acframework' );

		?>
		<p>Please enter the option in the Footer Section of the Theme Options.</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'contact_title' ); ?>"><?php _e( 'Contact Us' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'contact_title' ); ?>" name="<?php echo $this->get_field_name( 'contact_title' ); ?>" type="text" value="<?php echo esc_attr( $contact_title ); ?>">
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
		$instance = array();
		$instance['contact_title'] = ( ! empty( $new_instance['contact_title'] ) ) ? strip_tags( $new_instance['contact_title'] ) : '';
		return $instance;
	}

}
// register footerWidget widget
function register_footer_widget() {
    register_widget( 'footertWidget' );
}
add_action( 'widgets_init', 'register_footer_widget' );