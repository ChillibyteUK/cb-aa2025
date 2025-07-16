<?php
/**
 * Custom Post Types Registration
 *
 * This file contains the code to register custom post types
 * such as Testimonials, People, and Deals for the cb-aa2025 theme.
 *
 * @package cb-aa2025
 */

/**
 * Registers custom post types for the theme.
 *
 * This function registers the "Testimonials", "People", and "Deals" custom post types
 * with their respective settings and configurations.
 *
 * @return void
 */
function cb_register_post_types() {

	$args = array(
		'label'                 => 'Case Studies',
		'labels'                => array(
			'name'          => 'Case Studies',
			'singular_name' => 'Case Study',
		),
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'has_archive'           => true,
		'rewrite'               => array( 'slug' => 'case-studies' ),
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'menu_icon'             => 'dashicons-media-document',
		'exclude_from_search'   => false,
		'capability_type'       => 'post',
		'map_meta_cap'          => true,
		'hierarchical'          => false,
		'query_var'             => true,
		'supports'              => array( 'title', 'thumbnail', 'editor', 'excerpt' ),
		'show_in_graphql'       => false,
	);

	register_post_type( 'case_study', $args );

}
add_action( 'init', 'cb_register_post_types' );

/**
 * Highlights the Deals archive menu item when viewing a single Deal.
 *
 * This function adds the 'current-menu-parent' class to the Deals archive menu item
 * if the current page is a single Deal post.
 *
 * @param array  $classes An array of the CSS classes that are applied to the menu item's <li> element.
 * @param object $item    The current menu item object.
 * @return array Modified array of CSS classes.
 */
function highlight_deals_archive_in_menu( $classes, $item ) {
    // Get the post type of the current page.
    if ( is_singular( 'deals' ) ) {
        // Get the URL of the archive page for the CPT.
        $deals_archive_link = get_post_type_archive_link( 'deals' );

        // If the menu item's URL matches the archive URL, add 'current-menu-parent' class.
		if ( $item->url === $deals_archive_link ) {
            $classes[] = 'current-menu-parent';
        }
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'highlight_deals_archive_in_menu', 10, 2 );
