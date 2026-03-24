<?php
/**
 * Block template for CB Product Visualisation.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="product-visualisation">
	<div class="container">
		<?php
		$icons       = get_field( 'icons' );
		$total_icons = is_array( $icons ) ? count( $icons ) : 0;

		while ( have_rows( 'icons' ) ) {
			the_row();
			?>
		<div class="product-visualisation__cell">
			<?=  wp_get_attachment_image( get_sub_field( 'icon' ), 'full', false, array( 'class' => 'product-visualisation__icon' ) ); ?>
			<div class="product-visualisation__title">
				<?= get_sub_field( 'title' ); ?>
			</div>
		</div>
			<?php
			if ( get_row_index() !== $total_icons ) {
				?>
		<div class="product-visualisation__arrow-wrapper">
			<img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/icons/icon-arrows-70x18.svg' ); ?>" class="product-visualisation__arrow" alt="">
		</div>
				<?php
			}
		}
		?>
	</div>
</section>