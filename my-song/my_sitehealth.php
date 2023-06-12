<?php

/**
 * Site Health
 * 
 * @link https://make.wordpress.org/core/2019/04/25/site-health-check-in-5-2/
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
 * Add MY SONG test to Site Health.
 *
 * @since 0.16
 *
 * @return array Site Health Test
 */

function my_add_my_song_test( $tests ) {
    $tests['direct']['my_plugin'] = array(
        'label' => __( 'MY SONG', 'my-song' ),
        'test'  => 'my_my_song_test',
    );
    return $tests;
}
add_filter( 'site_status_tests', 'my_add_my_song_test' );

/**
 * Create the Site Health Test Output.
 *
 * @since 0.16
 *
 * @return array Test Results
 */

function my_my_song_test() {

	// Positive Check
    $result = array(
        'label'       => __( 'Plugin My Song is not active.', 'my-song' ),
        'status'      => 'good',
        'badge'       => array(
            'label' => __( 'Performance', 'my-song' ),
            'color' => 'green',
        ),
        'description' => sprintf(
            '<p>%s</p>',
            __( 'It makes no sense to run the plugins My Song and MY SONG simultaneously.', 'my-song' )
        ),
        'actions'     => '',
        'test'        => 'my_plugin',
    );
 
	// Overwrite: Negative Check
    if ( my_check_my_song() ) {
        $result['status'] = 'recommended';
        $result['label'] = __( 'Plugin My Song is active.', 'my-song' );
        $result['description'] = sprintf(
            '<p>%s</p>',
            __( 'My Song and MY SONG should not run at the same time. One of them should be deactivated.', 'my-song' )
        );
        $result['actions'] .= sprintf(
            '<p><a href="%s">%s</a></p>',
            esc_url( admin_url( 'plugins.php' ) ),
            __( 'Plugin Administration', 'my-song' )
        );
    }
 
    return $result;
}

/**
 * Execute the site health test.
 * 
 * Checks if the plugin My Song is active
 *
 * @since 0.16
 *
 * @return boolean Result of the test
 */

function my_check_my_song() {
	if ( is_plugin_active('fabio-stuber/hello.php') ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Add My Song to WordPress debug info.
 * 
 * Functions adds the maintained text to debug info.
 *
 * @since 0.16
 *
 * @return array debug information
 */

function my_add_debug_info( $debug_info ) {
    $debug_info['my'] = array(
        'label'    => __( 'MY SONG', 'my-song' ),
        'fields'   => array(
            'license' => array(
                'label'    => __( 'Custom Text', 'my-song' ),
                'value'   => get_option( 'my_song' ),
                'private' => true,
            ),
        ),
    );
 
    return $debug_info;
}
add_filter( 'debug_information', 'my_add_debug_info' );

?>