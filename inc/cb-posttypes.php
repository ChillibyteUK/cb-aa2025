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
		'label'                 => 'Integrations',
		'labels'                => array(
			'name'          => 'Integrations',
			'singular_name' => 'Integration',
		),
		'public'                => false,
		'publicly_queryable'    => false,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'has_archive'           => false,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => false,
		'menu_icon'             => 'dashicons-media-document',
		'exclude_from_search'   => true,
		'capability_type'       => 'post',
		'map_meta_cap'          => true,
		'hierarchical'          => false,
		'query_var'             => true,
		'supports'              => array( 'title', 'thumbnail' ),
		'show_in_graphql'       => false,
	);

	register_post_type( 'integration', $args );
}
add_action( 'init', 'cb_register_post_types' );

/**
 * ONE-OFF FUNCTION: Create integration posts from PNG files.
 *
 * This function scans the /media/shared/AA/logos/ directory for PNG files
 * in the format integration-{name}.png and creates integration posts.
 *
 * To run this: Add ?create_integrations=1 to any admin page URL.
 *
 * WARNING: Remove this function after running it once!
 */
function cb_create_integration_posts_from_logos() {
	// Only run if specific parameter is set and user is admin.
	if ( ! isset( $_GET['create_integrations'] ) || ! current_user_can( 'manage_options' ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return;
	}

	$logos_dir = get_stylesheet_directory() . '/img/';

	// Check if directory exists.
	if ( ! is_dir( $logos_dir ) ) {
		wp_die( 'Logos directory not found: ' . esc_html( $logos_dir ) );
	}

	$created_count = 0;
	$skipped_count = 0;
	$results       = array();

	// Scan directory for PNG files.
	$files = glob( $logos_dir . 'integration-*.png' );

	if ( empty( $files ) ) {
		wp_die( 'No integration PNG files found in: ' . esc_html( $logos_dir ) );
	}

	foreach ( $files as $file_path ) {
		$filename = basename( $file_path );

		// Extract name from filename (remove "integration-" prefix and ".png" suffix).
		if ( preg_match( '/^integration-(.+)\.png$/', $filename, $matches ) ) {
			$name = $matches[1];

			// Create readable title (replace hyphens/underscores with spaces, capitalize).
			$title = ucwords( str_replace( array( '-', '_' ), ' ', $name ) );
			$slug  = sanitize_title( $name );

			// Check if post already exists.
			$existing_post = get_page_by_path( $slug, OBJECT, 'integration' );

			if ( $existing_post ) {
				++$skipped_count;
				$results[] = "Skipped: {$title} (already exists)";
				continue;
			}

			// Create the integration post.
			$post_data = array(
				'post_title'  => $title,
				'post_name'   => $slug,
				'post_type'   => 'integration',
				'post_status' => 'publish',
				'meta_input'  => array(
					'_logo_filename' => $filename, // Store original filename for reference.
				),
			);

			$post_id = wp_insert_post( $post_data );

			if ( $post_id && ! is_wp_error( $post_id ) ) {
				++$created_count;
				$results[] = "Created: {$title} (ID: {$post_id})";

				// Try to set the PNG as featured image if WordPress can access it.
				$upload_dir = wp_upload_dir();
				$dest_path  = $upload_dir['path'] . '/' . $filename;

				// Copy file to uploads directory.
				if ( copy( $file_path, $dest_path ) ) {
					$file_url = $upload_dir['url'] . '/' . $filename;

					// Create attachment.
					$attachment_data = array(
						'post_mime_type' => 'image/png',
						'post_title'     => $title . ' Logo',
						'post_content'   => '',
						'post_status'    => 'inherit',
					);

					$attachment_id = wp_insert_attachment( $attachment_data, $dest_path, $post_id );

					if ( $attachment_id && ! is_wp_error( $attachment_id ) ) {
						// Generate attachment metadata.
						require_once ABSPATH . 'wp-admin/includes/image.php';
						$attach_data = wp_generate_attachment_metadata( $attachment_id, $dest_path );
						wp_update_attachment_metadata( $attachment_id, $attach_data );

						// Set as featured image.
						set_post_thumbnail( $post_id, $attachment_id );
						$results[] = "  - Added featured image for {$title}";
					}
				}
			} else {
				$results[] = "Failed to create: {$title}";
			}
		}
	}

	// Display results.
	echo '<div style="background: white; padding: 20px; margin: 20px; border: 1px solid #ccc;">';
	echo '<h2>Integration Posts Creation Results</h2>';
	echo '<p><strong>Created:</strong> ' . esc_html( $created_count ) . '</p>';
	echo '<p><strong>Skipped:</strong> ' . esc_html( $skipped_count ) . '</p>';
	echo '<h3>Details:</h3>';
	echo '<ul>';
	foreach ( $results as $result ) {
		echo '<li>' . esc_html( $result ) . '</li>';
	}
	echo '</ul>';
	echo '<p><strong>IMPORTANT:</strong> Remove the cb_create_integration_posts_from_logos() function from cb-posttypes.php after running this!</p>';
	echo '</div>';

	// Prevent further page execution.
	exit;
}
add_action( 'admin_init', 'cb_create_integration_posts_from_logos' );
