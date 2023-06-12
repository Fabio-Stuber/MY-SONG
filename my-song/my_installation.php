<?php

/**
 * Plugin Installation Process
 * 
 * @package MY SONG
 * @since 0.17
 */

// Avoids code execution if WordPress is not loaded (Security Measure)
if ( !defined('ABSPATH') ) {
	exit;
}

/**
 * Initialize the plugin.
 *
 * @since 0.7
 */

function my_activate () {

	/* Checks, if the plugin was installed newly */
	if (! get_option('my_activated') ) {

	/* Initialize Settings */
	add_option('my_activated',"1");
	add_option('my_song',"");
	add_option('my_version', "18");
	add_option('widget_my_widget');
	add_option('my_admin_lyric',"1");
	add_option('my_text_updated',"0");
	}
}

/**
 * Deactivate the plugin.
 *
 * @since 0.7
 */

function my_deactivate () {
	// nothing to do
}

?>