<?php
/**
 * Autoloader for theme classes.
 *
 * @package pyapc
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists( 'chances_basetheme_autoload' ) ) :
	/**
	 * Class autoloader for WP standard filenames.
	 *
	 * @param  string $class Qualified class name.
	 */
	function chances_basetheme_autoload( string $class ) {

		// If the $class_name does not include our namespace, GTFO.
		if ( false === strpos( $class, CHANCES_BASETHEME_NAMESPACE ) ) {
			return;
		}

		$base_namespace_parts = explode( '\\', CHANCES_BASETHEME_NAMESPACE );
		$base_namespace_count = ( (int) count( $base_namespace_parts ) );
		$namespace_parts      = explode( '\\', $class );

		// Format parts to match filenames.
		$file_parts = array_map( function( $part ) {
			return str_replace( '_', '-', strtolower( $part ) );
		}, $namespace_parts );

		// Set up file path.
		$class_path = CHANCES_BASETHEME_INC . 'classes/';

		// If class uses sub-namespaces, we'll put them in matching sub-directories.
		$parts_to_check = $base_namespace_count + 1;
		if ( count( $namespace_parts ) > $parts_to_check ) {
			// Remove first array item (theme namespace) and last array item (filename).
			// Anything in between will go in the path.
			$class_path .= implode( DIRECTORY_SEPARATOR, array_slice( $file_parts, 1, count( $file_parts ) - $parts_to_check ) ) . '/';
		}

		// Construct file path + name.
		$file = $class_path . 'class-' . end( $file_parts ) . '.php';

		if ( file_exists( $file ) ) {
			require_once $file;
		} else {
			return;
		}
	}
	spl_autoload_register( 'chances_basetheme_autoload' );
endif;
