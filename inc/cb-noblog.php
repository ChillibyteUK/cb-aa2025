<?php
/**
 * Remove default Posts type since no blog
 *
 * @package cb-aa2025
 */

/**
 * Removes the default Posts type from the side menu.
 */
function remove_default_post_type() {
	remove_menu_page( 'edit.php' );
}
add_action( 'admin_menu', 'remove_default_post_type' );

/**
 * Removes the "+New post" option from the top Admin Menu Bar.
 *
 * @param WP_Admin_Bar $wp_admin_bar The WP_Admin_Bar instance.
 */
function remove_default_post_type_menu_bar( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'new-post' );
}
add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );

/**
 * Remove Quick Draft Dashboard Widget.
 */
function remove_draft_widget() {
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}
add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );

// End remove post type.
