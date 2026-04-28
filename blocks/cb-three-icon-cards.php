<?php
/**
 * Block template for CB Three Icon Cards.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

// Overlap toggle
$overlap = get_field( 'overlap_previous_section' ) ? ' three-icon-cards--overlap' : '';

// Support Gutenberg color picker.
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';

$classes = $block['attrs']['className'] ?? '';
?>

<section class="three-icon-cards <?php echo esc_attr( $bg . ' ' . $fg . ' ' . $classes . $overlap ); ?>">
	<div class="container">

		<?php if ( get_field( 'title' ) ) : ?>
			<h2 class="three-icon-cards__title <?php echo esc_attr( $fg ); ?> text-center">
				<?= esc_html( get_field( 'title' ) ); ?>
			</h2>
		<?php endif; ?>

		<div class="row text-center three-icon-cards__row">

			<div class="col-md-4 three-icon-cards__col">
				<div class="three-icon-cards__card d-flex flex-column">
					<?= cb_sanitise_svg( get_field( 'icon_1' ), 'mb-3', 90, 90 ); ?>
					<h3><?= esc_html( get_field( 'title_1' ) ); ?></h3>
					<p><?= esc_html( get_field( 'content_1' ) ); ?></p>
				</div>
			</div>

			<div class="col-md-4 three-icon-cards__col">
				<div class="three-icon-cards__card d-flex flex-column">
					<?= cb_sanitise_svg( get_field( 'icon_2' ), 'mb-3', 90, 90 ); ?>
					<h3><?= esc_html( get_field( 'title_2' ) ); ?></h3>
					<p><?= esc_html( get_field( 'content_2' ) ); ?></p>
				</div>
			</div>

			<div class="col-md-4 three-icon-cards__col">
				<div class="three-icon-cards__card d-flex flex-column">
					<?= cb_sanitise_svg( get_field( 'icon_3' ), 'mb-3', 90, 90 ); ?>
					<h3><?= esc_html( get_field( 'title_3' ) ); ?></h3>
					<p><?= esc_html( get_field( 'content_3' ) ); ?></p>
				</div>
			</div>

		</div>

	</div>
</section>