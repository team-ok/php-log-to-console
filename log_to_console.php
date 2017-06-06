<?php
/*
 * Plugin Name:       PHP Log To Console
 * Plugin URI:        https://github.com/team-ok/php-log-to-console
 * Description:       Allows logging php code in a WordPress environment to the javascript console with console_log($data).
 * Version:           1.0.0
 * Author:            Timo Klemm
 * Author URI:        https://github.com/team-ok
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! function_exists( 'console_log' ) ):

	function console_log( $data, $delayed = true ) {

		$output = '<script>console.log('.json_encode($data).');</script>';

		if ( $delayed ){

			// delay output to a very late point in the WordPress page lifecycle
			add_action( 'shutdown', function() use ($output) { echo $output; } );

		} else {
			
			// print output immediately
			echo $output;
		}
	}

endif;