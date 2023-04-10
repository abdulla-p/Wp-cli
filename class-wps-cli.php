<?php
/**
 * File for CLI command.
 * 
 * @package cli.
 */

/**
 * WP-CLI Command.
 */
class WPS_CLI {

	/**
	 * WP-CLI function.
	 *
	 * @return void
	 */
	public function hello_world() {

		$csv_file_path = MY_PLUGIN_PATHH . 'sample-data.csv';
		if ( ! empty( $csv_file_path ) ) {
			$file = fopen( $csv_file_path, 'r' );
		}
		$result = fgetcsv( $file );
		while ( false !== $result ) {
			$url      = $result[0];
			$tags     = $result[1];
			$id       = url_to_postid( $url );
			$taxonomy = 'post_tag';

			$tag = explode( ',', $tags );

			$insert = wp_set_object_terms( $id, $tag, $taxonomy, true );

			if ( $insert ) {
				$output = $id . ' is updated';
				WP_CLI::line( $output );
			}
			if ( ! $insert ) {
				$output_error = 'Could not update tags of post with id ' . $id;
				WP_CLI::error( $output_error );
			}
		}
		fclose( $file );
	}
}
