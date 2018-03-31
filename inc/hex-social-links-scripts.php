<?php

// Add Scripts
function hsl_add_scripts(){
	wp_enqueue_style('hsl-main-style', plugins_url().'/hex-social-links/css/style.css');
	wp_enqueue_script('hsl-main-script', plugins_url().'/hex-social-links/js/main.js');
}

add_action('wp_enqueue_scripts', 'hsl_add_scripts');
