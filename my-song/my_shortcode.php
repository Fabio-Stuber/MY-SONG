<?php

/**
 * Shortcode
 * 
 * @link https://developer.wordpress.org/plugins/shortcodes/
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
 * Create the unbelievable shortcode ;-)
 *
 * @since 0.5
 *
 * @return string Shortcode HTML markup
 */

function my_shortcode() {
	$shortcode_line=my_get_anything();
	$my_shortcode_output= '<p class="my shortcode">'. $shortcode_line .'</p>';
	$my_shortcode_output=apply_filters( 'my_output_filter', $my_shortcode_output );
	return $my_shortcode_output;
}
add_shortcode('my','my_shortcode');

?>