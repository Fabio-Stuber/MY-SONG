<?php

/**
 * Settings Page
 * 
 * @link https://codex.wordpress.org/Settings_API
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
 * Create the options page.
 *
 * @since 0.7
 */

function my_options() {

	/* Fire Action if custom text was updated */
	$my_text_update=get_option('my_text_updated');
	if($my_text_update==1)
	{	
		do_action('my_new_song');
		update_option('my_text_updated','0');
	}
	
	// Output the headline
	echo '
	<div class="wrap">
	<h1>'. __('Options','my-song').' › MY SONG</h1>

	<form method="post" action="options.php">';

	// Create the option
	do_settings_sections( 'my-options' );
	settings_fields( 'my_settings' );
	submit_button();

	echo '</form></div><div class="clear"></div>';
}

/**
 * Create input field for the custom text.
 *
 * @since 0.7
 */

function my_options_display_songtext() {
	echo '<textarea style="width:1000px;height:400px;" class="regular-text" type="text" name="my_song" id="my_song">'. get_option('my_song') .'</textarea>';
}

/**
 * Create label of the input field for the custom text.
 *
 * @since 0.7
 */

function my_options_content_description() {
	echo '<p>'. __('SONG TEXT PLACE HERE','my-song').'</p>';
}

/**
 * Output the options
 * 
 * The functions uses the settings API of WordPress
 *
 * @since 0.7
 */

function my_options_display() {

	add_settings_section("content_settings_section", '' , "my_options_content_description", "my-options");
	
	add_settings_section("content_settings_section", __('Plugin','my-song') , "my_options_content_description", "my-options");

	add_settings_field("my_song", __('Custom Text','my-song') , "my_options_display_songtext", "my-options", "content_settings_section");

	register_setting("my_settings", "my_song", "my_validate_songtext");
}
add_action("admin_init", "my_options_display");

/**
 * Validate the user input
 *
 * @since 0.7
 */

function my_validate_songtext ( $songtext ) {
	update_option('my_text_updated',"1");
	$songtext = preg_replace("/[\r\n]+[\s\t]*[\r\n]+/","\n", $songtext);
    return $songtext;
}

/**
 * Integrate the options page into the menu
 *
 * @since 0.7
 */

function my_show_options() {
	add_options_page('MY SONG', 'MY SONG', 'manage_options', basename(__FILE__), "my_options");
}
add_action( 'admin_menu', 'my_show_options');

?>