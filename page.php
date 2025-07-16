<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

get_header();

?>
<main id="main">
    <?php
    the_post();
	the_content();
	?>
</main>
<?php
get_footer();