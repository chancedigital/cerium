<?php
/**
 * Various utility functions.
 *
 * @package cerium
 */

namespace Chance_Digital\Cerium\Util;

/**
 * Checks if an array is multidimensional.
 *
 * @param  array $a Array to check.
 * @return boolean  Whether or not the array is multidimensional.
 */
function is_multi_array( array $a = [] ) {
	foreach ( $a as $v ) {
		if ( is_array( $v ) ) {
			return true;
		}
	}
	return false;
}

/**
 * Extract colors from a CSS or Sass file
 *
 * @param string $path the path to your CSS variables file
 */
function get_colors( $path ) {
	$dir = get_stylesheet_directory();
	if ( file_exists( $dir . $path ) ) {
		$css_vars = file_get_contents( $dir . $path ); // phpcs:ignore WordPress.WP.AlternativeFunctions
		preg_match_all( ' /#([a-f]|[A-F]|[0-9]){3}(([a-f]|[A-F]|[0-9]){3})?\b/', $css_vars, $matches );
		return $matches[0];
	}
}
