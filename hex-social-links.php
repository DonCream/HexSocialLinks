<?php
/**
*  Plugin Name: Hex Social Links
*  Description: Adds hexagonal social link widget to the selected area
*  Version: 1.0
*  Author: Don Creamy
**/

if(!defined('ABSPATH')) {
   exit;
}

//  Load scripts
require_once(plugin_dir_path(__FILE__)  . '/inc/hex-social-links-scripts.php' );

// Load Class
require_once(plugin_dir_path(__FILE__) . '/inc/hex-social-links-class.php');

// Register Widget
function register_social_links(){
	register_widget('Hex_Social_Links_Widget');
}

add_action('widgets_init', 'register_social_links');











 ?>
