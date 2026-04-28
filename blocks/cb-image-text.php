<?php
/**
 * Block template for CB Image Text.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

// Support Gutenberg color picker.
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';

$classes = $block['attrs']['className'] ?? '';

$image   = get_field( 'image' );
$mobile_image = get_field( 'mob_image' );
$title   = get_field( 'title' );
$content = get_field( 'content' );
$reverse = get_field( 'reverse' );

$image_col   = 'col-lg-6';
$content_col = 'col-lg-5 offset-lg-1 cb-image-text__content-col';

if ( $reverse ) {
	$image_col   .= ' order-lg-2';
	$content_col = 'col-lg-5 offset-lg-0 me-lg-auto cb-image-text__content-col order-lg-1';
}
?>

<section class="cb-image-text <?php echo esc_attr( $bg . ' ' . $fg . ' ' . $classes ); ?>">
	<div class="container">
		<div class="row align-items-start">

			<?php if ( $image ) : ?>
				<div class="<?php echo esc_attr( $image_col ); ?>">

					<?php if ( $mobile_image ) : ?>
						<?= wp_get_attachment_image(
							$image,
							'large',
							false,
							array(
								'class' => 'cb-image-text__image cb-image-text__image--desktop img-fluid',
							)
						); ?>

						<?= wp_get_attachment_image(
							$mobile_image,
							'large',
							false,
							array(
								'class' => 'cb-image-text__image cb-image-text__image--mobile img-fluid',
							)
						); ?>
					<?php else : ?>
						<?= wp_get_attachment_image(
							$image,
							'large',
							false,
							array(
								'class' => 'cb-image-text__image img-fluid',
							)
						); ?>
					<?php endif; ?>

				</div>
			<?php endif; ?>

			<div class="<?php echo esc_attr( $content_col ); ?>">

				<?php if ( $title ) : ?>
					<h2 class="cb-image-text__title <?php echo esc_attr( $fg ); ?>">
						<?= esc_html( $title ); ?>
					</h2>
				<?php endif; ?>

				<?php if ( $content ) : ?>
					<div class="cb-image-text__content">
						<?= wp_kses_post( $content ); ?>
					</div>
				<?php endif; ?>

			</div>

		</div>
	</div>
</section>