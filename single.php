<?php
/**
 * Template for displaying single blog posts.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<main id="main" class="single_blog">
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
        <div class="row g-4 pb-4">
            <div class="col-lg-9">
                <div class="single_blog__image">
                    <?= get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
                </div>
                <h1 class="single_blog__title"><?= esc_html( get_the_title() ); ?></h1>
                <?php
                $count = estimate_reading_time_in_minutes( get_the_content(), 200, true, true );
                echo wp_kses_post( $count );

                foreach ( $blocks as $block ) {
                    echo wp_kses_post( render_block( $block ) );
                }
                ?>
                <div class="post-navigation mt-4 d-flex flex-wrap justify-content-between">
                    <?php
					previous_post_link( '<div class="prev">%link</div>', '&larr; Previous' );
					echo '&nbsp;';
					next_post_link( '<div class="next">%link</div>', 'Next &rarr;' );
                    ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sidebar">
                    <div class="h5 underline mb-4">Recent Posts</div>
                    <?php
					$r = new WP_Query(
						array(
							'posts_per_page' => 3,
							'post__not_in'   => array( get_the_ID() ),
						)
					);
            		while ( $r->have_posts() ) {
                		$r->the_post();
						?>
                <a class="single_blog_card" href="<?= esc_url( get_the_permalink() ); ?>">
                    <img src="<?= esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>" alt="" class="single_blog_card__image">
                    <h3 class="single_blog_card__title"><?= esc_html( get_the_title() ); ?></h3>
                    <div class="single_blog_card__date"><?= esc_html( get_the_date( 'jS F, Y', $r->ID ) ); ?></div>
                </a>
                		<?php
            		}
            		?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
	get_template_part( 'page-templates/blocks/cb_bg_cta' );
    ?>
</main>
<?php
get_footer();