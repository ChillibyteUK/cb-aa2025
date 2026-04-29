<?php
/**
 * Block template for CB Solutions Hero.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

$background_image = get_field( 'background' );
$feature_image    = get_field( 'feature_image' );
?>

<section class="cb-solutions-hero">
	<?php if ( $background_image ) : ?>
		<?= wp_get_attachment_image(
			$background_image,
			'full',
			false,
			array( 'class' => 'cb-solutions-hero__background' )
		); ?>
	<?php endif; ?>

	<div class="cb-solutions-hero__overlay"></div>

	<div class="container position-relative">
		<div class="row justify-content-center text-center">
			<div class="col-lg-8">

				<?php if ( get_field( 'title' ) ) : ?>
					<h1 class="cb-solutions-hero__title">
						<?= esc_html( get_field( 'title' ) ); ?>
					</h1>
				<?php endif; ?>

				<?php if ( get_field( 'intro' ) ) : ?>
					<div class="cb-solutions-hero__intro">
						<?= wp_kses_post( get_field( 'intro' ) ); ?>
					</div>
				<?php endif; ?>

				<div class="cb_home_hero__buttons mb-4 d-flex justify-content-center align-items-center gap-4">
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

		<?php if ( $feature_image ) : ?>
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<?= wp_get_attachment_image(
						$feature_image,
						'large',
						false,
						array( 'class' => 'cb-solutions-hero__image img-fluid w-100' )
					); ?>
				</div>
			</div>
		<?php endif; ?>

	</div>
</section>