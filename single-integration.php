<?php
/**
 * Template for displaying single blog posts.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;
get_header();

$acf_logo = get_field( 'integration_logo' );
?>

<main id="main" class="single_integration">

	

	<section class="single_integration__hero has-off-white-background-color">
		<div class="container-xl">
			<div class="single_integration__hero-inner">

				<div class="single_integration__logo">

                    <?php if ( $acf_logo ) : ?>

                        <?= wp_get_attachment_image(
                            $acf_logo,
                            'large',
                            false,
                            array(
                                'class' => 'single_integration__logo-image',
                                'alt'   => esc_attr( get_the_title() ),
                            )
                        ); ?>

                    <?php elseif ( has_post_thumbnail() ) : ?>

                        <?= get_the_post_thumbnail(
                            get_the_ID(),
                            'large',
                            array(
                                'class' => 'single_integration__logo-image',
                                'alt'   => esc_attr( get_the_title() ),
                            )
                        ); ?>

                    <?php endif; ?>

                </div>

			</div>
		</div>
	</section>

	<div class="container-xl py-5">
            <div class="col-12 col-md-9 mx-auto">
                <?php
                $integration_title = get_field( 'integration_title' );
                ?>

                <h1 class="single_integration__title">
                    <?= esc_html( $integration_title ?: get_the_title() ); ?>
                </h1>
                <?= apply_filters( 'the_content', get_the_content() ); ?>
            </div>
    </div>

</main>

<?php
get_footer();