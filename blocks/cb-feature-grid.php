<?php
/**
 * Block template for CB Feature Grid.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

$bg      = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg      = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';
$classes = $block['attrs']['className'] ?? 'pt-5 pb-4';
?>

<section class="cb-feature-grid <?php echo esc_attr( $bg . ' ' . $fg . ' ' . $classes ); ?>">
	<div class="container">

		<?php if ( get_field( 'title' ) ) : ?>
			<div class="row mb-5">
				<div class="col-md-11">
					<h2 class="cb-feature-grid__title <?php echo esc_attr( $fg ); ?>">
						<?= esc_html( get_field( 'title' ) ); ?>
					</h2>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( have_rows( 'features' ) ) : ?>
			<div class="row">
				<?php while ( have_rows( 'features' ) ) : the_row(); ?>
					<div class="col-md-6 mb-5">
						<h3 class="cb-feature-grid__item-title">
							<?= esc_html( get_sub_field( 'feature_title' ) ); ?>
						</h3>

						<div class="cb-feature-grid__item-content">
							<?= wp_kses_post( wpautop( get_sub_field( 'feature_content' ) ) ); ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>

	</div>
</section>