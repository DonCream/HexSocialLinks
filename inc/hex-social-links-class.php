<?php
 class Hex_Social_Links_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
    function __construct() {
		parent::__construct(
			'hex_social_links_widget', // Base ID
			esc_html__( 'Hex Social Links Widget', 'hsl_domain' ), // Name
			array( 'description' => esc_html__( 'Displays hexagon shaped social icons', 'hsl_domain' ), ) // Args
		);
	}
   /**
   	 * Outputs the content of the widget
   	 *
   	 * @param array $args
   	 * @param array $instance
   	 */
   	public function widget( $args, $instance ) {
   		// outputs the content of the widget
   	}

   	/**
   	 * Outputs the options form on admin
   	 *
   	 * @param array $instance The widget options
   	 */
   	public function form( $instance ) {
   		// outputs the options form on admin
         $this->getForm($instance);
   	}

   	/**
   	 * Processing widget options on save
   	 *
   	 * @param array $new_instance The new options
   	 * @param array $old_instance The previous options
   	 *
   	 * @return array
   	 */
   	public function update( $new_instance, $old_instance ) {
   		// processes widget options to be saved
   	}
   /**
    * Gets and displays form
    *
    * @param array $instance The widget options
    */
    public function getForm( $instance ) {
		//Get Facebook Link
		if (isset($instance['facebook_link'])) {
			$facebook_link = esc_attr($instance['facebook_link']);
		}
		else{
			$facebook_link = 'https://www.facebook.com';
		}

		//Get Twitter Link
		if (isset($instance['twitter_link'])) {
			$twitter_link = esc_attr($instance['twitter_link']);
		}
		else{
			$twitter_link = 'https://www.twitter.com';
		}

		//Get Linkdin Link
		if (isset($instance['linkedin_link'])) {
			$linkedin_link = esc_attr($instance['linkedin_link']);
		}
		else{
			$linkedin_link = 'https://www.linkedin.com';
		}

		//Get Google Link
		if (isset($instance['google_link'])) {
			$google_link = esc_attr($instance['google_link']);
		}
		else{
			$google_link = 'https://plus.google.com';
		}


		// ICONS

		//Get Facebook Icon
		if (isset($instance['facebook_icon'])) {
			$facebook_icon = esc_attr($instance['facebook_icon']);
		}
		else{
			$facebook_icon = plugins_url() . '/hex-social-links/img/facebook.png';
		}

		//Get Twitter Icon
		if (isset($instance['twitter_icon'])) {
			$twitter_icon = esc_attr($instance['twitter_icon']);
		}
		else{
			$twitter_icon = plugins_url() . '/hex-social-links/img/twitter.png';
		}

		//Get Twitter Icon
		if (isset($instance['linkedin_icon'])) {
			$linkedin_icon = esc_attr($instance['linkedin_icon']);
		}
		else{
			$linkedin_icon = plugins_url() . '/hex-social-links/img/linkedin.png';
		}

		//Get Google Link
		if (isset($instance['google_icon'])) {
			$google_icon = esc_attr($instance['google_icon']);
		}
		else{
			$google_icon = plugins_url() . '/hex-social-links/img/google.png';
		}

		//Get Icon Size
		if (isset($instance['icon_width'])) {
			$icon_width = esc_attr($instance['icon_width']);
		}
		else{
			$icon_width = 32;
		}

		?>

		<h4>Facebook</h4>
		<p>
		<label for="<?php echo $this->get_field_id('facebook_link'); ?>"><?php _e('Link:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('facebook_link'); ?>" name="<?php echo $this->get_field_name('facebook_link'); ?>" type="text" value="<?php echo esc_attr( $facebook_link); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('facebook_icon'); ?>"><?php _e('Icon:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('facebook_icon'); ?>" name="<?php echo $this->get_field_name('facebook_icon'); ?>" type="text" value="<?php echo esc_attr( $facebook_icon); ?>">
		</p>

		<h4>Twitter</h4>
		<p>
		<label for="<?php echo $this->get_field_id('twitter_link'); ?>"><?php _e('Link:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('twitter_link'); ?>" name="<?php echo $this->get_field_name('twitter_link'); ?>" type="text" value="<?php echo esc_attr( $twitter_link); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('twitter_icon'); ?>"><?php _e('Icon:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('twitter_icon'); ?>" name="<?php echo $this->get_field_name('twitter_icon'); ?>" type="text" value="<?php echo esc_attr( $twitter_icon); ?>">
		</p>

		<h4>LinkedIn</h4>
		<p>
		<label for="<?php echo $this->get_field_id('linkedin_link'); ?>"><?php _e('Link:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('linkedin_link'); ?>" name="<?php echo $this->get_field_name('linkedin_link'); ?>" type="text" value="<?php echo esc_attr( $linkedin_link); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('linkedin_icon'); ?>"><?php _e('Icon:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('linkedin_icon'); ?>" name="<?php echo $this->get_field_name('linkedin_icon'); ?>" type="text" value="<?php echo esc_attr( $linkedin_icon); ?>">
		</p>

		<h4>Google+</h4>
		<p>
		<label for="<?php echo $this->get_field_id('google_link'); ?>"><?php _e('Link:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('google_link'); ?>" name="<?php echo $this->get_field_name('google_link'); ?>" type="text" value="<?php echo esc_attr( $google_link); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('google_icon'); ?>"><?php _e('Icon:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('google_icon'); ?>" name="<?php echo $this->get_field_name('google_icon'); ?>" type="text" value="<?php echo esc_attr( $google_icon); ?>">
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('icon_width'); ?>"><?php _e('Icon Width:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('icon_width'); ?>" name="<?php echo $this->get_field_name('icon_width'); ?>" type="text" value="<?php echo esc_attr($icon_width); ?>">
		</p>
		<?php
	}
}
