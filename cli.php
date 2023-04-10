<?php
/**
 * Plugin Name: Hello World
 * Description: WP-CLI
 * Author: Abdulla
 * Version: 1.0.0
 * 
 * @package cli
 */ 

define( 'MY_PLUGIN_PATHH', plugin_dir_path( __FILE__ ) );

/**
 * Including file containing class
 */
require MY_PLUGIN_PATHH . 'class-wps-cli.php';

/**
 * Function to register command 'world'
 *
 * @return void
 */
function wp_cli_register_commands() {
	WP_CLI::add_command( 'world', 'WPS_CLI' );
}
add_action( 'cli_init', 'wp_cli_register_commands' );
