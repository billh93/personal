<?php
/**
 * Returns theme options
 *
 * Uses sane defaults in case the user has not configured any theme options yet.
 *
 * @package Maxwell
 */


/**
 * Get saved user settings from database or theme defaults
 *
 * @return array
 */
function maxwell_theme_options() {
    
	// Merge Theme Options Array from Database with Default Options Array
	$theme_options = wp_parse_args( 
		
		// Get saved theme options from WP database
		get_option( 'maxwell_theme_options', array() ), 
		
		// Merge with Default Options if setting was not saved yet
		maxwell_default_options() 
		
	);

	// Return theme options
	return $theme_options;
	
}


/**
 * Returns the default settings of the theme
 *
 * @return array
 */
function maxwell_default_options() {

	$default_options = array(
		'site_title'						=> true,
		'custom_header_link'				=> '',
		'custom_header_hide'				=> false,
		'layout' 							=> 'right-sidebar',
		'blog_title'						=> '',
		'blog_description'					=> '',
		'post_layout'						=> 'one-column',
		'excerpt_length' 					=> 20,
		'meta_date'							=> true,
		'meta_author'						=> true,
		'meta_category'						=> true,
		'meta_tags'							=> true,
		'post_image_single'					=> true,
		'post_navigation'					=> true,
		'slider_magazine' 					=> false,
		'slider_blog' 						=> false,
		'slider_category' 					=> 0,
		'slider_limit' 						=> 8,
		'slider_animation' 					=> 'slide',
		'slider_speed' 						=> 7000,
	);
	
	return $default_options;
}