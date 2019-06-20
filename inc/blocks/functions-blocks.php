<?php
/**
 * Gutenberg Blocks setup
 *
 * Inspired by https://github.com/10up/theme-scaffold/blob/master/includes/blocks.php
 *
 * @package cerium
 */

namespace Chance_Digital\Cerium\Blocks;

/**
 * Set up blocks.
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};
	add_action( 'enqueue_block_assets', $n( 'blocks_scripts' ) );
	add_action( 'enqueue_block_editor_assets', $n( 'blocks_editor_scripts' ) );
	add_filter( 'block_categories', $n( 'blocks_categories' ), 10, 2 );
}

/**
 * Enqueue shared frontend and editor JavaScript for blocks.
 *
 * @return void
 */
function blocks_scripts() {
	wp_enqueue_script(
		'blocks',
		CERIUM_TEMPLATE_URL . '/dist/js/blocks.min.js',
		[],
		CERIUM_VERSION,
		true
	);

	wp_enqueue_style(
		'blocks',
		CERIUM_TEMPLATE_URL . '/dist/css/blocks.min.css',
		[],
		CERIUM_VERSION
	);
}

/**
 * Enqueue editor-only JavaScript/CSS for blocks.
 *
 * @return void
 */
function blocks_editor_scripts() {
	wp_enqueue_script(
		'blocks-editor',
		CERIUM_TEMPLATE_URL . '/dist/js/blocks-editor.min.js',
		[ 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components' ],
		CERIUM_VERSION,
		false
	);
	wp_enqueue_style(
		'editor-style',
		CERIUM_TEMPLATE_URL . '/dist/css/blocks-editor.min.css',
		[],
		CERIUM_VERSION
	);
}

/**
 * Filters the registered block categories.
 *
 * @param array  $categories Registered categories.
 * @param object $post       The post object.
 *
 * @return array Filtered categories.
 */
function blocks_categories( $categories, $post ) {
	if ( ! in_array( $post->post_type, [ 'post', 'page' ], true ) ) {
		return $categories;
	}
	return array_merge(
		$categories,
		[
			[
				'slug'  => 'cerium-blocks',
				'title' => __( 'Custom Blocks', 'cerium' ),
			],
		]
	);
}
