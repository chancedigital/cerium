<?php
$ceriumheading_tags = [
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
	$ceriumtitle = __( 'Page not found', 'cerium' );
} elseif ( is_archive() ) {
	$ceriumtitle = get_the_archive_title();
} elseif ( is_page() && get_field( 'alternate_page_title' ) ) {
	$ceriumtitle = get_field( 'alternate_page_title' );
} else {
	$ceriumtitle = get_the_title();
}

if ( is_page() && get_field( 'page_subtitle' ) ) {
	$ceriumsubtitle = get_field( 'page_subtitle' );
}

// Print the title and subtitle to screen.
echo $ceriumheading_tags['title']['open'] .
	esc_html( $ceriumtitle ) .
	$ceriumheading_tags['title']['close']; // WPCS: XSS Ok.
if ( isset( $ceriumsubtitle ) && ! empty( $ceriumsubtitle ) ) {
	echo $ceriumheading_tags['subtitle']['open'] .
		esc_html( $ceriumsubtitle ) .
		$ceriumheading_tags['subtitle']['close']; // WPCS: XSS Ok.
}
