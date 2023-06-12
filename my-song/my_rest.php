<?php

/**
 * REST API
 * 
 * @link https://developer.wordpress.org/rest-api/
 * 
 * @package MY SONG
 * @since 0.17
 */

// Avoids code execution if WordPress is not loaded (Security Measure)
if (!defined('ABSPATH'))
{
	exit;
}


class RESTful_my_song_For_Your_Song {

	// The one instance of RESTful My Song Routes.
	private static $instance;
	
	// Instantiate or return the one RESTful My Song Routes instance.
	public static function instance() {
	
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
	
		return self::$instance;
	}
	
	// Construct the object.
	public function __construct() {
			add_action( 'rest_api_init', array( $this, 'register_routes' ) );
	}
	
	// Register the API routes
	public function register_routes() {
	
		// Return a random MY SONG line
		register_rest_route( 'restful-my-song', '/text', array(
			'methods' => WP_REST_Server::READABLE,
			'callback' => array( $this, 'rest_get_my_song_for_your_song' ),
		) );
	}
	
	// Use the search endpoint to get a list of recent articles that were published
	public function rest_get_my_song_for_your_song( $request ) {
		$my_rest_output=my_get_anything();
		return $my_rest_output;
	}
	
} // class RESTful_my_song_For_Your_Song


function RESTful_my_song_For_Your_Song() {
	return RESTful_my_song_For_Your_Song::instance();
}
	
// Kick off the class.
add_action( 'init', 'RESTful_my_song_For_Your_Song' );

?>