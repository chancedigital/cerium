<?php
/**
 * Custom template-related functions for this theme.
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

if ( ! function_exists( 'chances_basetheme_custom_logo' ) ) :
	/**
	 * Output HTML output for the custom logo.
	 *
	 * @param  string|array $class   HTML classname(s) for the logo element.
	 * @param  bool         $is_link Whether or not the logo is linked.
	 * @return string                Custom logo markup, if the logo exists.
	 */
	function chances_basetheme_custom_logo( $class = '', $is_link = true ) {
		$default_class = 'site-logo';
		if ( is_string( $class ) ) {
			$classes = ! empty( $class ) ? explode( ' ', $class ) : [ $default_class ];
		} elseif ( ! is_array( $class ) || empty( $class ) ) {
			$classes = [ $default_class ];
		} else {
			$classes = $class;
		}

		// Get the ID of the custom logo.
		$custom_logo_id = get_theme_mod( 'custom_logo' );

		$html    = '';
		$classes = array_map( function( $el ) {
			return sanitize_html_class( $el, $default_class );
		}, $classes );
		$classes = array_unique( $classes );

		// We have a logo. Logo is go.
		if ( $custom_logo_id ) {
			$custom_logo_attr = array(
				'class'    => implode( ' ', $classes ),
				'itemprop' => 'logo',
			);

			/*
			 * If the logo alt attribute is empty, get the site title and explicitly
			 * pass it to the attributes used by wp_get_attachment_image().
			 */
			$image_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
			if ( empty( $image_alt ) ) {
				$custom_logo_attr['alt'] = get_bloginfo( 'name', 'display' );
			}

			$html = wp_get_attachment_image( $custom_logo_id, 'full', false, $custom_logo_attr );

			if ( $is_link ) {

				// Check if the classname is a BEM element for top-level block.
				$link_suffix = strpos( $classes[0], '__' ) !== false ? '-link' : '__link';

				// Check for a BEM modifier.
				$link_base_class = strpos( $classes[0], '--' ) !== false ? explode( '--', $classes[0] )[0] : $classes[0];

				$link_class = $link_base_class . $link_suffix;

				$html = sprintf( '<a href="%1$s" class="' . $link_class . '" rel="home" itemprop="url">%2$s</a>',
					esc_url( home_url( '/' ) ),
					$html
				);
			}
		}
		return $html;
	}
endif;

if ( ! function_exists( 'chances_basetheme_page_header_background' ) ) :
	/**
	 * Print inline CSS to define page header background images.
	 */
	function chances_basetheme_page_header_background() {
		$breakpoints = [
			'small'  => 640,
			'medium' => 1280,
			'large'  => 1440,
			'xlarge' => 1920,
		];

		$page_header_class = 'page-header';
		$post_id           = get_the_ID();

		/*
		 * Set up background images for CPT archive pages in an ACF `Theme Settings` page.
		 * Assumes this will be a group field.
		 * field slug: archive_page_headers
		 */
		$archive_images_set = false;
		if ( function_exists( 'get_field' ) && $archive_images_set ) {
			$page_headers = get_field( 'archive_page_headers', 'option' );
		}

		/*
		 * You can hard-code images for certain views, or pull from the DB.
		 * Upload to the media library and use the attachment ID for hard-coded images.
		 */
		if ( is_search() ) {

			// Search page.
			$img_id = '';

		} elseif ( is_404() ) {

			// 404.
			$img_id = '';

		} elseif ( is_archive() ) {

			// Any archive view.
			$img_id = '';

		} elseif (
			is_page() &&
			function_exists( 'get_field' ) &&
			get_field( 'header_background_image' ) &&
			is_array( get_field( 'header_background_image' ) )
		) {

			// Pages with alternate background image selected.
			$img_id = (int) get_field( 'header_background_image' )['ID'];

		} else {

			// All others.
			$img_id = get_post_thumbnail_id( $post_id );

		}

		if ( ! empty( $img_id ) ) {

			$output = '<style type="text/css" media="screen">';

			// Default full-size image.
			$output .= '.' . $page_header_class . '{ background-image:url(' . esc_url( wp_get_attachment_image_src( $img_id, 'full' )[0] ) . '); }';

			// Counter.
			$i = 0;
			foreach ( $breakpoints as $breakpoint => $px ) {
				$thumbnail_src     = wp_get_attachment_image_src( $img_id, "featured-$breakpoint" );
				$thumbnail_src_url = $thumbnail_src[0];
				$check_thumb       = strpos( $thumbnail_src_url, '-' . $px . 'x' );
				$prev_breakpoint   = array_values( $breakpoints )[ (int) $i - 1 ];
				if ( $check_thumb ) {
					if ( 0 === $i ) {
						$output .= '@media screen and (max-width:' . $px . 'px) {';
						$output .= '.' . $page_header_class . '{ background-image:url(' . esc_url( $thumbnail_src_url ) . '); }';
						$output .= '}';
						$i++;
						continue;
					}
					$output .= '@media screen and (min-width: ' . $prev_breakpoint . 'px) and (max-width:' . $px . 'px) {';
					$output .= '.' . $page_header_class . '{ background-image:url(' . esc_url( $thumbnail_src_url ) . '); }';
					$output .= '}';
				}
				$i++;
			}
			$output .= '</style>';

			echo $output; // WPCS: XSS Ok.
		}
	}
	add_action( 'wp_head', 'chances_basetheme_page_header_background', 99, 0 );
endif;
