<?php
/**
 * Template for displaying single blog posts.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<main id="main" class="single_integration">
    <?php
    $content = get_the_content();
    $blocks  = parse_blocks( $content );
    $sidebar = array();
    $after;
    ?>
    <section class="breadcrumbs container-xl">
    <?php
    if ( function_exists( 'yoast_breadcrumb' ) ) {
        yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
    }
    ?>
    </section>
    <div class="container-xl">
		<h1 class="single_blog__title"><?= esc_html( get_the_title() ); ?></h1>
    </div>
</main>
<?php
get_footer();