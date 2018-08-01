<?php
/**
 * Custom template tags for this theme.
 *
 * @package chances-basetheme
 */

if ( ! function_exists( 'chances_basetheme_body_classes' ) ) :
	/**
	 * Filter body classes for pages.
	 *
	 * @param  array $classes  Class list.
	 * @return array           Modified class list.
	 */
	function chances_basetheme_body_classes( array $classes ) {

		// Add page slug if it doesn't exist.
		if ( is_single() || is_page() && ! is_front_page() ) {
			$page_slug = basename( get_permalink() );
			if ( ! in_array( $page_slug, $classes, true ) ) {
				$classes[] = $page_slug;
			}
		}

		// Clean up class names for custom templates.
		$classes = array_map( function ( $class ) {
			return preg_replace( [ '/(-php)?$/', '/^templates/', '/^page-templates/' ], '', $class );
		}, $classes);
		return array_filter( $classes );
	}
	add_filter( 'body_class', 'chances_basetheme_body_classes' );
endif;
