<?php
/**
 * Handle WP images.
 *
 * @package cs-base
 */

/**
 * Remove inline width and height attributes for post thumbnails.
 *
 * @param  string $html           The post thumbnail HTML.
 * @param  int    $post_id        The post ID.
 * @param  string $post_image_id  The post thumbnail ID.
 * @return string                  Modified HTML.
 */
function cs_base_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
	if ( ! strpos( $html, 'attachment-shop_single' ) ) {
		$html = preg_replace( '/^(width|height)=\"\d*\"\s/', '', $html );
	}
	return $html;
}
add_filter( 'post_thumbnail_html', 'cs_base_remove_thumbnail_dimensions', 10, 3 );
