<?php

/**
 * Gutenberg Block
 * 
 * @link https://developer.wordpress.org/block-editor/developers/
 * 
 * @package MY SONG
 * @since 0.17
 */

// Avoids code execution if WordPress is not loaded (Security Measure)
if ( !defined('ABSPATH') ) {
	exit;
}

// Get WordPress Version
global $wp_version;

// Run only if WordPress 5 or above
if ( version_compare( $wp_version, '5', '>=' ) ) {

/**
 * Prepare Block Content.
 *
 * @since 0.13
 *
 * @return string Random Line with HTML markup
 */

function my_gutenberg_block() {

	// Get Random
	$gutenberg_line = my_get_anything();

	// Add HTML Markup
	$gutenberg_output = '<p class="my gutenberg-block">'. $gutenberg_line .'</p>';

	// Process Filter
	$gutenberg_output=apply_filters( 'my_output_filter', $gutenberg_output );

	// Return Random Line with Markup
	return $gutenberg_output;
}

/**
 * Gutenberg Block Assets.
 *
 * Following code is based on the Gutenberg Boilerplates from Ahmad Awais.
 * 
 * @link https://ahmadawais.com/gutenberg-boilerplate/
 * 
 * @since 0.13
 */

function my_block_editor_assets() {

	// Get MY SONG
	$my_params = array(
		'my_random' => get_my_song_for_your_song()
	);

	// Block Java Script
	wp_enqueue_script(
		'gb-block-my',
		plugins_url( 'block.js', __FILE__ ), 
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'block.js' )
	);

	// Bring the Random Line from here into the Block Java Script
	wp_localize_script( 'gb-block-my', 'myParams', $my_params );

} 
add_action( 'enqueue_block_editor_assets', 'my_block_editor_assets' );

// Fallback Rendering @ FrontEnd
register_block_type( 'my/my', array(
	'render_callback' => 'my_gutenberg_block'
) );

} // End WordPress 5 Check

?>