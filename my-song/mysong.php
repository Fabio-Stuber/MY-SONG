<?php

/*
Plugin Name:  MY SONG
Plugin URI:   https://www.fabio-stuber.com/
Description:  This simple plugin shows a random line of any text in your blog.
Version:	  0.01
Author:       Fabio Stuber
Author URI:   https://www.fabio-stuber.com/
Text Domain:  my-song
*/

// Avoids code execution if WordPress is not loaded (Security Measure)
if (!defined('ABSPATH'))
{
	exit;
}

/**
 * Include the code files of the plugin (basic setup).
 */

require_once('my_installation.php');
require_once('my_random.php');
require_once('my_display.php');
require_once('my_settings.php');
require_once('my_widget.php');
require_once('my_shortcode.php');
require_once('my_templatetag.php');
require_once('my_rest.php');
require_once('my_gutenberg.php');
require_once('my_sitehealth.php');
require_once('my_api.php');

/**
 * Installation & Deactivation
 */

register_activation_hook( __FILE__ , 'my_activate' );
register_deactivation_hook( __FILE__ , 'my_deactivate' );

/**
 * Add the settings link on the plugin page.
 * 
 * @package MY SONG
 * @since 0.10
 */

function my_add_plugin_page_links ( $links ) {
	$my_links = array('<a href="' . admin_url( 'options-general.php?page=my_settings.php' ) . '">'. __('Options','my-song').'</a>',);
	return array_merge( $links, $my_links );
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'my_add_plugin_page_links' );

?>
