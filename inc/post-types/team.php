<?php
/**
 * Team post type.
 *
 * @package chances-basetheme
 */

add_action( 'init', 'chances_basetheme_post_type_team' );

/**
 * Register Team post type.
 */
function chances_basetheme_post_type_team() {
	$labels = [
		'name'               => _x( 'Team Members', 'post type general name', 'chances-basetheme' ),
		'singular_name'      => _x( 'Team Member', 'post type singular name', 'chances-basetheme' ),
		'menu_name'          => _x( 'Team', 'admin menu', 'chances-basetheme' ),
		'name_admin_bar'     => _x( 'Team Member', 'add new on admin bar', 'chances-basetheme' ),
		'add_new'            => _x( 'Add New', 'location', 'chances-basetheme' ),
		'add_new_item'       => __( 'Add New Team Member', 'chances-basetheme' ),
		'new_item'           => __( 'New Team Member', 'chances-basetheme' ),
		'edit_item'          => __( 'Edit Team Member', 'chances-basetheme' ),
		'view_item'          => __( 'View Team Member', 'chances-basetheme' ),
		'all_items'          => __( 'All Team Members', 'chances-basetheme' ),
		'search_items'       => __( 'Search Team Members', 'chances-basetheme' ),
		'parent_item_colon'  => __( 'Parent Team Members:', 'chances-basetheme' ),
		'not_found'          => __( 'No Team Members found.', 'chances-basetheme' ),
		'not_found_in_trash' => __( 'No Team Members found in Trash.', 'chances-basetheme' ),
	];

	$args = [
		'labels'             => $labels,
		'description'        => __( 'Description.', 'chances-basetheme' ),
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
