<?php
/**
 * Template Name: Free Trial
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="trial-form">
	<section class="trial-form__hero has-background-blue-background-color">
		<?= get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'hero__background' ) ); ?>
		<div class="container py-5">
			<div class="row g-5">
				<div class="col-md-4 text-white my-auto">
					<h1><?= esc_html( get_field( 'title' ) ); ?></h1>
					<div class="mb-4"><?= wp_kses_post( get_field( 'intro' ) ); ?></div>
					<h2><?= esc_html( get_field( 'subtitle' ) ); ?></h2>
					<div class="mb-4"><?= wp_kses_post( get_field( 'sub_intro' ) ); ?></div>
					<ul class="fa-ul">
						<?php
						$field   = strip_tags( get_field( 'checklist' ), '<br />' );
    					$bullets = preg_split( "/\r\n|\n|\r/", $field );
    					foreach ( $bullets as $b ) {
        					if ( '' === $b ) {
            					continue;
        					}
    						?>
        					<li class="mb-2"><span class="fa-li"><i class="fa-solid fa-check fs-500 has-highlight-green-color"></i></span> <?= wp_kses_post( $b ); ?></li>
							<?php
    					}
						?>
					</ul>
				</div>
				<div class="col-md-6 offset-md-1">
					<div class="trial-form__form">
						<div class="has-main-blue-color fs-600">Sign up for a <strong>free trial</strong></div>
						<?= do_shortcode( '[gravityform id="' . get_field( 'form_id' ) . '" title="false"]' ); ?>
					</div>
				</div>
				<div class="col-md-10 offset-md-1 pt-5 my-5">
					<div class="fs-600 text-white lh-snug mb-4">
						<?= wp_kses_post( get_field( 'quote' ) ); ?>
					</div>
					<div class="text-white">
						<?= wp_kses_post( get_field( 'quote_attribution' ) ); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
    <?php
	set_query_var( 'cb_latest_posts_title', 'More stories for you' );
	set_query_var( 'cb_latest_posts_class', 'fs-600' );
	get_template_part( 'page-templates/blocks/cb-latest-posts' );
    ?>
</main>
<?php
get_footer();