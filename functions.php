<?php
/**
 * WP Theme constants and setup functions
 *
 * @package cs-base
 */

// Useful global constants.
define( 'CS_BASE_VERSION', '0.1.0' );
define( 'CS_BASE_URL', get_stylesheet_directory_uri() );
define( 'CS_BASE_TEMPLATE_URL', get_template_directory_uri() );
define( 'CS_BASE_PATH', get_template_directory() . '/' );
define( 'CS_BASE_INC', CS_BASE_PATH . 'inc/' );
define( 'CS_BASE_NAMESPACE', 'CS_BASE' );

// Require function files.
$cs_inc = [
	'autoload',
	'core',
	'template-tags',
	'foundation',
	'images',
	'icons',
];

foreach ( $cs_inc as $inc ) {
	if ( file_exists( CS_BASE_INC . $inc ) ) {
		require_once CS_BASE_INC . $inc;
	}
}

// Run the setup functions.
CS_Base\Core\setup();

// Require Composer autoloader if it exists.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once 'vendor/autoload.php';
}

foreach ( [ 'post-types', 'taxonomies' ] as $dir ) {
	foreach ( glob( CS_BASE_PATH . "/inc/$dir/*.php" ) as $inc ) {
		require_once $inc;
	}
}
