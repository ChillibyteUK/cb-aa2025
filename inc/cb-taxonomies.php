<?php
/**
 * This file is responsible for registering custom taxonomies for the theme.
 *
 * @package cb-aa2025
 */

/**
 * Registers custom taxonomies for the theme.
 */
function cb_register_taxes() {

	$args = array(
		'label'              => 'Integration Type',
		'labels'             => array(
			'name'          => 'Types',
			'singular_name' => 'Type',
		),
		'publicly_queryable' => false,
		'hierarchical'       => true,
		'rewrite'            => false,
		'show_admin_column'  => true,
		'show_tagcloud'      => false,
		'show_in_rest'       => true,
	);

	if ( post_type_exists( 'integration' ) ) {
		register_taxonomy( 'integration_types', array( 'integration' ), $args );
	}

	$args = array(
		'label'              => 'Product',
		'labels'             => array(
			'name'          => 'Products',
			'singular_name' => 'Product',
		),
		'publicly_queryable' => false,
		'hierarchical'       => true,
		'rewrite'            => false,
		'show_admin_column'  => true,
		'show_tagcloud'      => false,
		'show_in_rest'       => true,
	);

	if ( post_type_exists( 'integration' ) ) {
		register_taxonomy( 'product', array( 'integration' ), $args );
	}

	$args = array(
		'label'              => 'Case Study Category',
		'labels'             => array(
			'name'          => 'Case Study Categories',
			'singular_name' => 'Case Study Category',
		),
		'publicly_queryable' => false,
		'hierarchical'       => true,
		'rewrite'            => false,
		'show_admin_column'  => true,
		'show_tagcloud'      => false,
		'show_in_rest'       => true,
	);

	if ( post_type_exists( 'case_study' ) ) {
		register_taxonomy( 'case_study_category', array( 'case_study' ), $args );
	}
}
add_action( 'init', 'cb_register_taxes' );
