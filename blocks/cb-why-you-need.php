<?php
/**
 * Block template for CB Why You Need.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

// Support Gutenberg color picker.
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';

$classes = $block['attrs']['className'] ?? 'py-5';
?>

<section class="cb-why-you-need py-5 <?php echo esc_attr( $bg . ' ' . $fg . ' ' . $classes ); ?>">
	<div class="container">

		<?php if ( get_field( 'content' ) ) : ?>
			<div class="row">
				<div class="col-lg-10">
					<div class="cb-why-you-need__content">
						<?= wp_kses_post( get_field( 'content' ) ); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="row align-items-start cb-why-you-need__comparison">
			<div class="col-md-6">
				<?php if ( get_field( 'before_title' ) ) : ?>
					<h3 class="cb-why-you-need__label">
						<?= esc_html( get_field( 'before_title' ) ); ?>
					</h3>
				<?php endif; ?>

				<?= wp_get_attachment_image( get_field( 'before_image' ), 'large', false, array( 'class' => 'cb-why-you-need__image img-fluid' ) ); ?>
			</div>

			<div class="col-md-5 cb-why-you-need__after">
				<?php if ( get_field( 'after_title' ) ) : ?>
					<h3 class="cb-why-you-need__label">
						<?= esc_html( get_field( 'after_title' ) ); ?>
					</h3>
				<?php endif; ?>

				<?= wp_get_attachment_image( get_field( 'after_image' ), 'large', false, array( 'class' => 'cb-why-you-need__image img-fluid' ) ); ?>
			</div>
		</div>

	</div>
</section>