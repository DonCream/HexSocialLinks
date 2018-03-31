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
         $links = array(
            'facebook' => esc_attr($instance['facebook_link']),
            'twitter' => esc_attr($instance['twitter_link']),
            'linkedin' => esc_attr($instance['linkedin_link']),
            'google' => esc_attr($instance['google_link']),
            'youtube' => esc_attr($instance['youtube_link']),
            'instagram' => esc_attr($instance['instagram_link']),
            'pinetrest' => esc_attr($instance['pinetrest_link']),
            'github' => esc_attr($instance['github_link']),
            'dribbble' => esc_attr($instance['dribbble_link']),
            'codepen' => esc_attr($instance['codepen_link'])
         );

         $icons = array(
            'facebook' => esc_attr($instance['facebook_icon']),
            'twitter' => esc_attr($instance['twitter_icon']),
            'linkedin' => esc_attr($instance['linkedin_icon']),
            'google' => esc_attr($instance['google_icon']),
            'youtube' => esc_attr($instance['youtube_icon']),
            'instagram' => esc_attr($instance['instagram_icon']),
            'pinetrest' => esc_attr($instance['pinetrest_icon']),
            'github' => esc_attr($instance['github_icon']),
            'dribbble' => esc_attr($instance['dribbble_icon']),
            'codepen' => esc_attr($instance['codepen_icon'])
         );
         $icon_width = $instance['icon_width'];

         echo $args['before_widget'];

         // Call frontend function
         $this->getSocialLinks($links, $icons, $icon_width);

         echo $args['after_widget'];
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
         $instance = array(
            'facebook_link' => (!empty($new_instance['facebook_link'])) ? strip_tags($new_instance['facebook_link']) : '',
            'twitter_link' => (!empty($new_instance['twitter_link'])) ? strip_tags($new_instance['twitter_link']) : '',
            'linkedin_link' => (!empty($new_instance['linkedin_link'])) ? strip_tags($new_instance['linkedin_link']) : '',
            'google_link' => (!empty($new_instance['google_link'])) ? strip_tags($new_instance['google_link']) : '',
            'youtube_link' => (!empty($new_instance['youtube_link'])) ? strip_tags($new_instance['youtube_link']) : '',
            'instagram_link' => (!empty($new_instance['instagram_link'])) ? strip_tags($new_instance['instagram_link']) : '',
            'pinetrest_link' => (!empty($new_instance['pinetrest_link'])) ? strip_tags($new_instance['pinetrest_link']) : '',
            'github_link' => (!empty($new_instance['github_link'])) ? strip_tags($new_instance['github_link']) : '',
            'dribbble_link' => (!empty($new_instance['dribbble_link'])) ? strip_tags($new_instance['dribbble_link']) : '',
            'codepen_link' => (!empty($new_instance['codepen_link'])) ? strip_tags($new_instance['codepen_link']) : '',
            'facebook_icon' => (!empty($new_instance['facebook_icon'])) ? strip_tags($new_instance['facebook_icon']) : '',
            'twitter_icon' => (!empty($new_instance['twitter_icon'])) ? strip_tags($new_instance['twitter_icon']) : '',
            'linkedin_icon' => (!empty($new_instance['linkedin_icon'])) ? strip_tags($new_instance['linkedin_icon']) : '',
            'google_icon' => (!empty($new_instance['google_icon'])) ? strip_tags($new_instance['google_icon']) : '',
            'youtube_icon' => (!empty($new_instance['youtube_icon'])) ? strip_tags($new_instance['youtube_icon']) : '',
            'instagram_icon' => (!empty($new_instance['instagram_icon'])) ? strip_tags($new_instance['instagram_icon']) : '',
            'pinetrest_icon' => (!empty($new_instance['pinetrest_icon'])) ? strip_tags($new_instance['pinetrest_icon']) : '',
            'github_icon' => (!empty($new_instance['github_icon'])) ? strip_tags($new_instance['github_icon']) : '',
            'dribbble_icon' => (!empty($new_instance['dribbble_icon'])) ? strip_tags($new_instance['dribbble_icon']) : '',
            'codepen_icon' => (!empty($new_instance['codepen_icon'])) ? strip_tags($new_instance['codepen_icon']) : '',
            'icon_width' => (!empty($new_instance['icon_width'])) ? strip_tags($new_instance['icon_width']) : ''
         );
         return $instance;
   	}
   /**
    * Gets and displays form
    *
    * @param array $instance The widget options
    */
    public function getForm( $instance ) {
		//Get Links
		if (isset($instance['facebook_link'])) {
			$facebook_link = esc_attr($instance['facebook_link']);
		}
		else{
			$facebook_link = 'https://www.facebook.com';
		}

		if (isset($instance['twitter_link'])) {
			$twitter_link = esc_attr($instance['twitter_link']);
		}
		else{
			$twitter_link = 'https://www.twitter.com';
		}

      if (isset($instance['linkedin_link'])) {
			$linkedin_link = esc_attr($instance['linkedin_link']);
		}
		else{
			$linkedin_link = 'https://www.linkedin.com';
		}

      if (isset($instance['google_link'])) {
			$google_link = esc_attr($instance['google_link']);
		}
		else{
			$google_link = 'https://plus.google.com';
		}

      if (isset($instance['youtube_link'])) {
         $youtube_link = esc_attr($instance['youtube_link']);
      }
      else{
         $youtube_link = 'https://www.youtube.com';
      }

		if (isset($instance['instagram_link'])) {
			$instagram_link = esc_attr($instance['instagram_link']);
		}
		else{
			$instagram_link = 'https://www.instagram.com';
		}

		if (isset($instance['pinetrest_link'])) {
			$pinetrest_link = esc_attr($instance['pinetrest_link']);
		}
		else{
			$pinetrest_link = 'https://www.pinetrest.com';
		}

		if (isset($instance['github_link'])) {
			$github_link = esc_attr($instance['github_link']);
		}
		else{
			$github_link = 'https://www.github.com';
		}

		if (isset($instance['dribbble_link'])) {
			$dribble_link = esc_attr($instance['dribbble_link']);
		}
		else{
			$dribbble_link = 'http://www.dribbble.com';
		}

      if (isset($instance['codepen_link'])) {
         $codepen_link = esc_attr($instance['codepen_link']);
      }
      else{
         $codepen_link = 'https://codepen.io';
      }


		// ICONS

		//Get Icons
		if (isset($instance['facebook_icon'])) {
			$facebook_icon = esc_attr($instance['facebook_icon']);
		}
		else{
			$facebook_icon = plugins_url() . '/hex-social-links/img/facebook.svg';
		}

		if (isset($instance['twitter_icon'])) {
			$twitter_icon = esc_attr($instance['twitter_icon']);
		}
		else{
			$twitter_icon = plugins_url() . '/hex-social-links/img/twitter.svg';
		}

		if (isset($instance['linkedin_icon'])) {
			$linkedin_icon = esc_attr($instance['linkedin_icon']);
		}
		else{
			$linkedin_icon = plugins_url() . '/hex-social-links/img/linkedin.svg';
		}

		if (isset($instance['google_icon'])) {
			$google_icon = esc_attr($instance['google_icon']);
		}
		else{
			$google_icon = plugins_url() . '/hex-social-links/img/googleplus.svg';
		}

      if (isset($instance['youtube_icon'])) {
			$youtube_icon = esc_attr($instance['youtube_icon']);
		}
		else{
			$youtube_icon = plugins_url() . '/hex-social-links/img/youtube.svg';
		}

		if (isset($instance['instagram_icon'])) {
			$instagram_icon = esc_attr($instance['instagram_icon']);
		}
		else{
			$instagram_icon = plugins_url() . '/hex-social-links/img/instagram.svg';
		}

		if (isset($instance['pinetrest_icon'])) {
			$pinetrest_icon = esc_attr($instance['pinetrest_icon']);
		}
		else{
			$pinetrest_icon = plugins_url() . '/hex-social-links/img/pinetrest.svg';
		}

		if (isset($instance['github_icon'])) {
			$github_icon = esc_attr($instance['github_icon']);
		}
		else{
			$github_icon = plugins_url() . '/hex-social-links/img/github.svg';
		}

      if (isset($instance['dribbble_icon'])) {
			$dribbble_icon = esc_attr($instance['dribbble_icon']);
		}
		else{
			$dribbble_icon = plugins_url() . '/hex-social-links/img/dribbble.svg';
		}

		if (isset($instance['codepen_icon'])) {
			$codepen_icon = esc_attr($instance['codepen_icon']);
		}
		else{
			$codepen_icon = plugins_url() . '/hex-social-links/img/codepen.svg';
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

		<h4>YouTube</h4>
		<p>
		<label for="<?php echo $this->get_field_id('youtube_link'); ?>"><?php _e('Link:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('youtube_link'); ?>" name="<?php echo $this->get_field_name('youtube_link'); ?>" type="text" value="<?php echo esc_attr( $youtube_link); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('youtube_icon'); ?>"><?php _e('Icon:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('youtube_icon'); ?>" name="<?php echo $this->get_field_name('youtube_icon'); ?>" type="text" value="<?php echo esc_attr( $youtube_icon); ?>">
		</p>

		<h4>Instagram</h4>
		<p>
		<label for="<?php echo $this->get_field_id('instagram_link'); ?>"><?php _e('Link:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('instagram_link'); ?>" name="<?php echo $this->get_field_name('instagram_link'); ?>" type="text" value="<?php echo esc_attr( $instagram_link); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('instagram_icon'); ?>"><?php _e('Icon:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('instagram_icon'); ?>" name="<?php echo $this->get_field_name('instagram_icon'); ?>" type="text" value="<?php echo esc_attr( $instagram_icon); ?>">
		</p>

		<h4>Pinetrest</h4>
		<p>
		<label for="<?php echo $this->get_field_id('pinetrest_link'); ?>"><?php _e('Link:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('pinetrest_link'); ?>" name="<?php echo $this->get_field_name('pinetrest_link'); ?>" type="text" value="<?php echo esc_attr( $pinetrest_link); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('pinetrest_icon'); ?>"><?php _e('Icon:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('pinetrest_icon'); ?>" name="<?php echo $this->get_field_name('pinetrest_icon'); ?>" type="text" value="<?php echo esc_attr( $pinetrest_icon); ?>">
		</p>

		<h4>Github</h4>
		<p>
		<label for="<?php echo $this->get_field_id('github_link'); ?>"><?php _e('Link:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('github_link'); ?>" name="<?php echo $this->get_field_name('github_link'); ?>" type="text" value="<?php echo esc_attr( $github_link); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('github_icon'); ?>"><?php _e('Icon:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('github_icon'); ?>" name="<?php echo $this->get_field_name('github_icon'); ?>" type="text" value="<?php echo esc_attr( $github_icon); ?>">
		</p>

      <h4>Dribbble</h4>
		<p>
		<label for="<?php echo $this->get_field_id('dribbble_link'); ?>"><?php _e('Link:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('dribbble_link'); ?>" name="<?php echo $this->get_field_name('dribbble_link'); ?>" type="text" value="<?php echo esc_attr( $dribbble_link); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('dribbble_icon'); ?>"><?php _e('Icon:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('dribbble_icon'); ?>" name="<?php echo $this->get_field_name('dribbble_icon'); ?>" type="text" value="<?php echo esc_attr( $dribbble_icon); ?>">
		</p>

		<h4>Codepen</h4>
		<p>
		<label for="<?php echo $this->get_field_id('codepen_link'); ?>"><?php _e('Link:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('codepen_link'); ?>" name="<?php echo $this->get_field_name('codepen_link'); ?>" type="text" value="<?php echo esc_attr( $codepen_link); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('codepen_icon'); ?>"><?php _e('Icon:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('codepen_icon'); ?>" name="<?php echo $this->get_field_name('codepen_icon'); ?>" type="text" value="<?php echo esc_attr( $codepen_icon); ?>">
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('icon_width'); ?>"><?php _e('Icon Width:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('icon_width'); ?>" name="<?php echo $this->get_field_name('icon_width'); ?>" type="text" value="<?php echo esc_attr($icon_width); ?>">
		</p>
		<?php
	}
   /**
    * Gets and displays form
    * @param array $links Hex Social Links
    * @param array $icon Hex Social Icons
    * @param array $icon_width Hex Icon Width
    */
    public function getSocialLinks( $links, $icons, $icon_width ) {
      ?>
      <div class="social-links">
         <a target="_blank" href="<?php echo esc_attr($links['facebook']); ?>"><img width="<?php echo esc_attr($icon_width); ?>" src="<?php echo esc_attr($icons['facebook']); ?>"></a>
         <a target="_blank" href="<?php echo esc_attr($links['twitter']); ?>"><img width="<?php echo esc_attr($icon_width); ?>" src="<?php echo esc_attr($icons['twitter']); ?>"></a>
         <a target="_blank" href="<?php echo esc_attr($links['linkedin']); ?>"><img width="<?php echo esc_attr($icon_width); ?>" src="<?php echo esc_attr($icons['linkedin']); ?>"></a>
         <a target="_blank" href="<?php echo esc_attr($links['google']); ?>"><img width="<?php echo esc_attr($icon_width); ?>" src="<?php echo esc_attr($icons['google']); ?>"></a>
         <a target="_blank" href="<?php echo esc_attr($links['youtube']); ?>"><img width="<?php echo esc_attr($icon_width); ?>" src="<?php echo esc_attr($icons['youtube']); ?>"></a>
         <a target="_blank" href="<?php echo esc_attr($links['instagram']); ?>"><img width="<?php echo esc_attr($icon_width); ?>" src="<?php echo esc_attr($icons['instagram']); ?>"></a>
         <a target="_blank" href="<?php echo esc_attr($links['pinetrest']); ?>"><img width="<?php echo esc_attr($icon_width); ?>" src="<?php echo esc_attr($icons['pinetrest']); ?>"></a>
         <a target="_blank" href="<?php echo esc_attr($links['github']); ?>"><img width="<?php echo esc_attr($icon_width); ?>" src="<?php echo esc_attr($icons['github']); ?>"></a>
         <a target="_blank" href="<?php echo esc_attr($links['dribbble']); ?>"><img width="<?php echo esc_attr($icon_width); ?>" src="<?php echo esc_attr($icons['dribbble']); ?>"></a>
         <a target="_blank" href="<?php echo esc_attr($links['codepen']); ?>"><img width="<?php echo esc_attr($icon_width); ?>" src="<?php echo esc_attr($icons['codepen']); ?>"></a>
      </div>
      <?php
   }
}
