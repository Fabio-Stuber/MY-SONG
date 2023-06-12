<?php

/**
 * User Interface
 * 
 * @package MY SONG
 * @since 0.17
 */


// Avoids code execution if WordPress is not loaded (Security Measure)
if ( !defined('ABSPATH') ) {
	exit;
}

/**
 * Prints the random line to the admin head in WordPress.
 *
 * @since 0.3
 * @since 0.9 Hidden Setting
 */

function my() {

	// Read setting
	$my_admin_show = get_option('my_admin_lyric');

	// Should I print or not?
	if ( $my_admin_show==1 AND ( my_where_am_i() ) ) {

		// Get text
		$line=my_get_anything();

		// Output
		echo "<p class='admin-my'>".$line."</p>";
	}
}
add_action( 'admin_notices', 'my' );

/**
 * Checks the page and decides to print the line or not.
 *
 * @since 0.14
 * 
 * @return boolean true=yes false=no
 */

function my_where_am_i() {

	// Get current page
	global $pagenow;

	// Run on specific pages only
    if ( $pagenow == 'index.php' OR $pagenow == 'edit.php' OR $pagenow == 'edit-comments.php' OR $pagenow == 'post.php') {
		
		// Get Post Type
		if (isset($_GET['post_type'])) {
			$postscope=$_GET["post_type"];
		}
		else {
			$postscope='';
		}
		
		// Sorry, I do not remember, what is the idea here
		if ( $pagenow == 'edit.php' AND (!($postscope == '' OR $postscope == 'page')) ) {
			return false;
		} else {
			return true;
		}

	} else {
		return false;
	}

}

/**
 * Adds the required CSS styling in the WordPress Backend.
 *
 * @since 0.1
 */

function my_css() {
	echo "
	<style type='text/css'>
	.admin-my {
		float: right;
		padding-right: 30px;
		padding-left: 30px;
		padding-top: 10px;
		padding-bottom: 10px;
		margin: 0;
		font-size: 20px;
		font-family: Arial, Helvetica, sans-serif;
		font-weight: bold;
		color: #fff;
		background: linear-gradient(to right, #ff0000, #dddd00, #00ff00, #00dddd, #0000ff, #dd00dd);
		animation: BG 0.3s infinite;

	}
	body, .wp-menu-name::after{
		padding-left: 5px;
		background: linear-gradient(to right, #ff0000, #dddd00, #00ff00, #00dddd, #0000ff, #dd00dd);


	}
	 // * {
        animation: BG 0.1s infinite;
	}
    
@keyframes BG {
    0% {
		background: linear-gradient(to right, #ff0000, #dddd00, #00ff00, #00dddd, #0000ff, #dd00dd);
    }
    16% {
		background: linear-gradient(to right, #dddd00, #00ff00, #00dddd, #0000ff, #dd00dd, #ff0000);
    }
    32% {
		background: linear-gradient(to right, #00ff00, #00dddd, #0000ff, #dd00dd, #ff0000, #dddd00);
    }
    48% {
		background: linear-gradient(to right, #00dddd, #0000ff, #dd00dd, #ff0000, #dddd00, #00ff00);
    }
    64% {
		background: linear-gradient(to right, #0000ff, #dd00dd, #ff0000, #dddd00, #00ff00, #00dddd);
    }
    80% {
		background: linear-gradient(to right, #dd00dd, #ff0000, #dddd00, #00ff00, #00dddd, #0000ff);
    }
  }
	#footer-thankyou::after{
		content: ' DANKE! FÜR NIX.';

	}
	</style>
	";
}
add_action( 'admin_head', 'my_css' );

?>