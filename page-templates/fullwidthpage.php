<?php
/**
 * Template Name: Full Width Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="site-main" id="main" role="main">
	<div class="container" style="padding-top: 100px;">
		<?php
		while ( have_posts() ) {
			the_post();
			the_content();
		}
		?>
	</div>
</main>
<?php
get_footer();
