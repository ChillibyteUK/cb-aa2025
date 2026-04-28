<?php
/**
 * Block template for CB Quote.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

// Gutenberg classes
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';

$classes = $block['attrs']['className'] ?? '';

$quote        = get_field( 'content' );
$person_name  = get_field( 'person_name' );
$person_role  = get_field( 'person_role' );
?>

<section class="cb-quote <?php echo esc_attr( $bg . ' ' . $fg . ' ' . $classes ); ?>">
	<div class="container">

		<?php if ( $quote ) : ?>
			<div class="cb-quote__content">
				<?= wp_kses_post( $quote ); ?>
			</div>
		<?php endif; ?>

		<?php if ( $person_name || $person_role ) : ?>
			<p class="cb-quote__credit">
				<?php if ( $person_name ) : ?>
					<strong><?= esc_html( $person_name ); ?></strong>
				<?php endif; ?>

				<?php if ( $person_role ) : ?>
					<?= esc_html( $person_role ); ?>
				<?php endif; ?>
			</p>
		<?php endif; ?>

	</div>
</section>