<?php
/**
 * New Home Hero Block Template
 *
 * Displays the hero section with background, title, intro, and buttons.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="cb_home_hero">
	<?= wp_get_attachment_image( get_field( 'background' ), 'full', false, array( 'class' => 'cb_home_hero__background' ) ); ?>
	<div class="cb_home_hero__overlay"></div>

	<div class="cb_home_hero__content container">
		<div class="cb_home_hero__inner mt-5 mb-3 col-12 col-md-6 mx-auto text-center gap-4">

			<h1 class="cb_home_hero__title">
				<?= esc_html( get_field( 'title' ) ); ?>
			</h1>

			<div class="cb_home_hero__intro">
				<?= esc_html( get_field( 'intro' ) ); ?>
			</div>

			<div class="cb_home_hero__buttons mt-5 d-flex justify-content-center align-items-center gap-4">
				<?php if ( get_field( 'trial_link' ) ) :
					$trial_link = get_field( 'trial_link' ); ?>
					<a href="<?= esc_url( $trial_link['url'] ); ?>" class="button-green button-green--arrow" target="<?= esc_attr( $trial_link['target'] ); ?>">
						<?= esc_html( $trial_link['title'] ); ?>
					</a>
				<?php endif; ?>

				<?php if ( get_field( 'more_link' ) ) :
					$more_link = get_field( 'more_link' ); ?>
					<a href="<?= esc_url( $more_link['url'] ); ?>" class="green-arrow" target="<?= esc_attr( $more_link['target'] ); ?>">
						<?= esc_html( $more_link['title'] ); ?>
					</a>
				<?php endif; ?>
			</div>

		</div>
	</div>
</section>