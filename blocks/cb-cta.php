<?php
/**
 * Block template for CB CTA Banner.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

// Support Gutenberg color picker.
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';

$classes = $block['attrs']['className'] ?? '';

$background_image = get_field( 'bg_image' );
$primary_link     = get_field( 'trial_link' );
$secondary_link   = get_field( 'more_link' );
?>

<section class="cb-cta-banner <?php echo esc_attr( $bg . ' ' . $fg . ' ' . $classes ); ?>">
	<?php if ( $background_image ) : ?>
		<?= wp_get_attachment_image(
			$background_image,
			'full',
			false,
			array(
				'class' => 'cb-cta-banner__background',
				'alt'   => '',
			)
		); ?>
	<?php endif; ?>

	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-lg-8">

				<?php if ( get_field( 'content' ) ) : ?>
					<div class="cb-cta-banner__content">
						<?= wp_kses_post( wpautop( get_field( 'content' ) ) ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $primary_link || $secondary_link ) : ?>
					<div class="cb-cta-banner__buttons d-flex justify-content-center align-items-center gap-4 mt-5">
						<?php if ( $primary_link ) : ?>
							<a href="<?= esc_url( $primary_link['url'] ); ?>" class="button-green button-green--arrow" target="<?= esc_attr( $primary_link['target'] ); ?>">
								<?= esc_html( $primary_link['title'] ); ?>
							</a>
						<?php endif; ?>

						<?php if ( $secondary_link ) : ?>
							<a href="<?= esc_url( $secondary_link['url'] ); ?>" class="green-arrow" target="<?= esc_attr( $secondary_link['target'] ); ?>">
								<?= esc_html( $secondary_link['title'] ); ?>
							</a>
						<?php endif; ?>
					</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
</section>