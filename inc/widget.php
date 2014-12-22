<?php
/**
 * JAWS Days 2015 Widgets
 *
 * @package JAWS Days 2015
 */

add_action( 'widgets_init', function(){
	register_widget( 'JAWSDAYS_News_Widget' );
	register_widget( 'JAWSDAYS_Twitter_Widget' );
	register_widget( 'JAWSDAYS_Facebook_Widget' );
});

/**
 * Add News widget.
 */
class JAWSDAYS_News_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'jawsdays-news-widget', // Base ID
			__( 'News Widget', 'jawsdays2015' ), // Name
			array( 'description' => __( '', 'text_domain' ), ) // Args
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
		$count = ! empty( $instance['count'] ) ? $instance['count'] : 5;
		jawsdays2015_new_post(array(
			'posts_per_page' => $instance['count'],
		));
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$count = ! empty( $instance['count'] ) ? $instance['count'] : 5;
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label> 
		<input id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>" size="3">
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
		$instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : 5;

		return $instance;
	}
} // class JAWSDAYS_News_Widget

/**
 * Add Twitter widget.
 */
class JAWSDAYS_Twitter_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'jawsdays-twitter-widget', // Base ID
			__( 'Twitter Widget', 'jawsdays2015' ), // Name
			array( 'description' => __( '', 'text_domain' ), ) // Args
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
		$title     = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Twitter', 'jawsdays2015' );
		$twacount  = ! empty( $instance['twacount'] ) ? $instance['twacount'] : 'jawsdays';
		$twidgetID = ! empty( $instance['twidgetID'] ) ? $instance['twidgetID'] : '545477791668375552';
		echo '<div class="new-post-content" id="twitter-content">' . "\n";
		echo '<h2 class="new-post-title">' . apply_filters( 'jawsdays_twitter_widget_title', $title ). '</h2>' . "\n";
		echo '<a class="twitter-timeline" height="552" href="https://twitter.com/' . $twacount . '" data-widget-id="' . $twidgetID . '">@' . $twacount . 'さんのツイート</a>' . "\n";
echo <<< EOT
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
EOT;
		echo '</div>' . "\n";
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title     = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Twitter', 'jawsdays2015' );
		$twacount  = ! empty( $instance['twacount'] ) ? $instance['twacount'] : 'jawsdays';
		$twidgetID = ! empty( $instance['twidgetID'] ) ? $instance['twidgetID'] : '545477791668375552';
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'twacount' ); ?>"><?php _e( 'Twitter Account:', 'jawsdays2015' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'twacount' ); ?>" name="<?php echo $this->get_field_name( 'twacount' ); ?>" type="text" value="<?php echo esc_attr( $twacount ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'twidgetID' ); ?>"><?php _e( 'Twitter Widget ID:', 'jawsdays2015' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'twidgetID' ); ?>" name="<?php echo $this->get_field_name( 'twidgetID' ); ?>" type="text" value="<?php echo esc_attr( $twidgetID ); ?>">
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
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['twacount'] = ( ! empty( $new_instance['twacount'] ) ) ? strip_tags( $new_instance['twacount'] ) : 'jawsdays';
		$instance['twidgetID'] = ( ! empty( $new_instance['twidgetID'] ) ) ? strip_tags( $new_instance['twidgetID'] ) : '545477791668375552';

		return $instance;
	}
} // class JAWSDAYS_Twitter_Widget

/**
 * Add facebook page widget.
 */
class JAWSDAYS_Facebook_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'jawsdays-facebook-page-widget', // Base ID
			__( 'Facebook Page Widget', 'jawsdays2015' ), // Name
			array( 'description' => __( '', 'text_domain' ), ) // Args
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
		$title        = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Facebook', 'jawsdays2015' );
		$facebookpage = ! empty( $instance['facebookpage'] ) ? $instance['facebookpage'] : 'jawsdays';
		echo '<div class="new-post-content" id="facebook-content">' . "\n";
		echo '<h2 class="new-post-title">' . apply_filters( 'jawsdays_facebook_page_widget_title', $title ). '</h2>' . "\n";
		echo '<div class="fb-like-box" data-href="https://www.facebook.com/' . $facebookpage . '" data-height="552" data-show-faces="true" data-stream="true" data-show-border="true" data-header="false"></div>' . "\n";

		echo '</div>' . "\n";
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title        = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Facebook', 'jawsdays2015' );
		$facebookpage = ! empty( $instance['facebookpage'] ) ? $instance['facebookpage'] : 'jawsdays';
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'facebookpage' ); ?>"><?php _e( 'Facebook Page:', 'jawsdays2015' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'facebookpage' ); ?>" name="<?php echo $this->get_field_name( 'facebookpage' ); ?>" type="text" value="<?php echo esc_attr( $facebookpage ); ?>">
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
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['facebookpage'] = ( ! empty( $new_instance['facebookpage'] ) ) ? strip_tags( $new_instance['facebookpage'] ) : 'jawsdays';

		return $instance;
	}
} // class JAWSDAYS_Facebook_Widget
