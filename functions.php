<?php
/**
 * WP Theme constants and setup functions
 *
 * @package chances-basetheme
 */

// Useful global constants.
define( 'CHANCES_BASETHEME_VERSION', '0.1.0' );
define( 'CHANCES_BASETHEME_URL', get_stylesheet_directory_uri() );
define( 'CHANCES_BASETHEME_TEMPLATE_URL', get_template_directory_uri() );
define( 'CHANCES_BASETHEME_PATH', get_template_directory() . '/' );
define( 'CHANCES_BASETHEME_INC', CHANCES_BASETHEME_PATH . 'inc/' );
define( 'CHANCES_BASETHEME_NAMESPACE', 'Chances\\WordPressBasetheme' );

// Require function files.
$chances_basetheme_inc = [
	'autoload',
	'core',
	'template-tags',
	'foundation',
	'images',
	'icons',
];

foreach ( $chances_basetheme_inc as $inc ) {
	if ( file_exists( CHANCES_BASETHEME_INC . $inc ) ) {
		require_once CHANCES_BASETHEME_INC . $inc;
	}
}

// Run the setup functions.
Chances\WordPressBasetheme\Core\setup();

// Require Composer autoloader if it exists.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once 'vendor/autoload.php';
}

foreach ( [ 'post-types', 'taxonomies' ] as $dir ) {
	foreach ( glob( CHANCES_BASETHEME_PATH . "/inc/$dir/*.php" ) as $inc ) {
		require_once $inc;
	}
}
