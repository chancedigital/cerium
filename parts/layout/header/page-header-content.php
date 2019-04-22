<?php
$heading_tags = [
	'title'    => [
		'open'  => '<h1 class="page-header__title">',
		'close' => '</h1>',
	],
	'subtitle' => [
		'open'  => '<h2 class="page-header__subtitle">',
		'close' => '</h2>',
	],
];
if ( is_404() ) {
	$page_title = __( 'Page not found', 'cerium' );
} elseif ( is_archive() ) {
	$page_title = get_the_archive_title();
} elseif ( function_exists( 'get_field' ) && is_page() && get_field( 'alternate_page_title' ) ) {
	$page_title = get_field( 'alternate_page_title' );
} else {
	$page_title = get_the_title();
}

if ( function_exists( 'get_field' ) && is_page() && get_field( 'page_subtitle' ) ) {
	$subtitle = get_field( 'page_subtitle' );
}

// phpcs:disable
// Print the title and subtitle to screen.
echo $heading_tags['title']['open'] .
	esc_html( $page_title ) .
	$heading_tags['title']['close'];
if ( isset( $subtitle ) && ! empty( $subtitle ) ) {
	echo $heading_tags['subtitle']['open'] .
		esc_html( $subtitle ) .
		$heading_tags['subtitle']['close'];
}
// phpcs:enable
