<?php
$chances_basethemeheading_tags = [
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
	$chances_basethemetitle = __( 'Page not found', 'chances-basetheme' );
} elseif ( is_archive() ) {
	$chances_basethemetitle = get_the_archive_title();
} elseif ( is_page() && get_field( 'alternate_page_title' ) ) {
	$chances_basethemetitle = get_field( 'alternate_page_title' );
} else {
	$chances_basethemetitle = get_the_title() . ' ok';
}

if ( is_page() && get_field( 'page_subtitle' ) ) {
	$chances_basethemesubtitle = get_field( 'page_subtitle' );
}

// Print the title and subtitle to screen.
echo $chances_basethemeheading_tags['title']['open'] .
	esc_html( $chances_basethemetitle ) .
	$chances_basethemeheading_tags['title']['close']; // WPCS: XSS Ok.
if ( isset( $chances_basethemesubtitle ) && ! empty( $chances_basethemesubtitle ) ) {
	echo $chances_basethemeheading_tags['subtitle']['open'] .
		esc_html( $chances_basethemesubtitle ) .
		$chances_basethemeheading_tags['subtitle']['close']; // WPCS: XSS Ok.
}
