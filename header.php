<?php
/**
 * The template for displaying the header.
 *
 * @package cerium
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="theme-color" content="#66c62e" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="js-site-wrapper" class="site-wrapper">
	<?php get_template_part( 'parts/layout/header/masthead' ); ?>
	<?php get_template_part( 'parts/layout/header/page-header' ); ?>
	<div id="primary-content-area" class="content-area">
