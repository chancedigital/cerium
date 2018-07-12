<?php
/**
 * Team post type.
 *
 * @package cs-base
 */

add_action( 'init', 'cs_base_post_type_team' );

/**
 * Register Team post type.
 */
function cs_base_post_type_team() {
	$labels = [
		'name'               => _x( 'Team Members', 'post type general name', 'cs-base' ),
		'singular_name'      => _x( 'Team Member', 'post type singular name', 'cs-base' ),
		'menu_name'          => _x( 'Team', 'admin menu', 'cs-base' ),
		'name_admin_bar'     => _x( 'Team Member', 'add new on admin bar', 'cs-base' ),
		'add_new'            => _x( 'Add New', 'location', 'cs-base' ),
		'add_new_item'       => __( 'Add New Team Member', 'cs-base' ),
		'new_item'           => __( 'New Team Member', 'cs-base' ),
		'edit_item'          => __( 'Edit Team Member', 'cs-base' ),
		'view_item'          => __( 'View Team Member', 'cs-base' ),
		'all_items'          => __( 'All Team Members', 'cs-base' ),
		'search_items'       => __( 'Search Team Members', 'cs-base' ),
		'parent_item_colon'  => __( 'Parent Team Members:', 'cs-base' ),
		'not_found'          => __( 'No Team Members found.', 'cs-base' ),
		'not_found_in_trash' => __( 'No Team Members found in Trash.', 'cs-base' ),
	];

	$args = [
		'labels'             => $labels,
		'description'        => __( 'Description.', 'cs-base' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'rewrite'            => [
			'slug'       => 'team-member',
			'with_front' => false,
		],
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => [ 'title', 'editor', 'thumbnail' ],
		'menu_icon'          => 'dashicons-groups',
	];

	register_post_type( 'team', $args );
}
