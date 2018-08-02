<?php
/**
 * Various utility functions.
 *
 * @package chances-basetheme
 */

/**
 * Checks if an array is multidimensional.
 *
 * @param  array $a Array to check.
 * @return boolean  Whether or not the array is multidimensional.
 */
function chances_basetheme_is_multi_array( array $a = [] ) {
	foreach ( $a as $v ) {
		if ( is_array( $v ) ) {
			return true;
		}
	}
	return false;
}
