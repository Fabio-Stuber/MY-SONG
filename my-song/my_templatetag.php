<?php

/**
 * Template Tag
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
 * Create the unbelievable template tag ;-)
 *
 * @since 0.8
 */

function my_song_for_your_song() {
	$my_template_tag_line = my_get_anything();
	$my_template_tag_output='<div class="my templatetag">'. $my_template_tag_line .'</div>';
	$my_template_tag_output=apply_filters( 'my_output_filter', $my_template_tag_output );
	echo $my_template_tag_output;
}

?>