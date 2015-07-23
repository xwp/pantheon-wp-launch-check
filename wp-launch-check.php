<?php
/**
 * Plugin Name: WP Launch Check
 * Author: Pantheon Systems
 * Plugin URI: https://github.com/pantheon-systems/wp_launch_check
 */

/*
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	require_once __DIR__ . '/php/commands/launchcheck.php';

	// Register Pantheon class autoloader.
	spl_autoload_register( function ( $class ) {
		$class = strtolower( $class );
		if ( strstr( $class, 'pantheon' ) ) {
			$class = str_replace( '\\', '/', $class );
			$path = __DIR__ . '/php/' . $class . '.php';
			if ( file_exists( $path ) ) {
				require_once( $path );
			}
		}
	} );

	WP_CLI::add_command( 'launchcheck', 'LaunchCheck' );
}
