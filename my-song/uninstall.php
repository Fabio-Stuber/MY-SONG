<?php

/**
 * Plugin Uninstall Process
 * 
 * The uninstall routine will be triggered by WordPress automaticly.
 * 
 * @package MY SONG
 * @since 0.17
 */

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

/*
 * Deinstall the plugin.
 *
 * @since 0.7
 */

/* Checks, if the plugin have been activated before */
if ( get_option('my_activated') ) {

/* Remove all settings */
delete_option('my_activated');
delete_option('my_song');
delete_option('my_version');
delete_option('widget_my_widget');
delete_option('my_admin_lyric');
delete_option('my_text_updated');

}

?>