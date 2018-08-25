<?php

namespace ChanceDigital\Cerium\Taxonomies\Taxes;

use ChanceDigital\Cerium\Taxonomies\Taxonomy;

class Team_Category extends Taxonomy {

	protected function set_labels() {
		$this->labels = [
			'name'              => _x( 'Team Categories', 'taxonomy general name', 'cerium' ),
			'singular_name'     => _x( 'Team Category', 'taxonomy singular name', 'cerium' ),
			'search_items'      => __( 'Search Team Categories', 'cerium' ),
			'all_items'         => __( 'All Team Categories', 'cerium' ),
			'parent_item'       => __( 'Parent Team Category', 'cerium' ),
			'parent_item_colon' => __( 'Parent Team Category:', 'cerium' ),
			'edit_item'         => __( 'Edit Team Category', 'cerium' ),
			'update_item'       => __( 'Update Team Category', 'cerium' ),
			'add_new_item'      => __( 'Add New Team Category', 'cerium' ),
			'new_item_name'     => __( 'New Team Category Name', 'cerium' ),
			'menu_name'         => __( 'Team Categories', 'cerium' ),
		];
	}

	protected function set_args() {
		$this->args = [
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => [
				'slug'         => 'team-category',
				'hierarchical' => true,
			],
		];
	}

	protected function set_post_types() {
		$this->post_types = [ 'team' ];
	}
}
