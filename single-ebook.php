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

	<div class="container-xl py-5 has-background-blue-background-color">
            <div class="col-12 col-md-6 single_integration__sidebar">
                <h1 class="single_integration__title">
                    <?= esc_html( get_the_title() ); ?>
                </h1>
            </div>
            <div class="col-12 col-md-6 single_integration__sidebar">
                <?php if ( has_post_thumbnail() ) : ?>

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
            <div class="col-12 col-md-9 mx-auto single_integration__content">
                <?php
                $integration_title = get_field( 'integration_title' );
                ?>

                
                <?= apply_filters( 'the_content', get_the_content() ); ?>
            </div>
    </div>

</main>

<?php
get_footer();