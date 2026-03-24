<?php
/**
 * Block template for CB Three Icon Cards.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="three-icon-cards">
	<div class="container py-5">
		<div class="row text-center">
			<div class="col-md-4 d-flex flex-column">
				<?= cb_sanitise_svg( get_field( 'icon_1' ), 'mx-auto mb-3', 90, 90 ); ?>
				<h3><?= esc_html( get_field( 'title_1' ) ); ?></h3>
				<p><?= esc_html( get_field( 'content_1' ) ); ?></p>
			</div>
			<div class="col-md-4 d-flex flex-column">
				<?= cb_sanitise_svg( get_field( 'icon_2' ), 'mx-auto mb-3', 90, 90 ); ?>
				<h3><?= esc_html( get_field( 'title_2' ) ); ?></h3>
				<p><?= esc_html( get_field( 'content_2' ) ); ?></p>
			</div>
			<div class="col-md-4 d-flex flex-column">
				<?= cb_sanitise_svg( get_field( 'icon_3' ), 'mx-auto mb-3', 90, 90 ); ?>
				<h3><?= esc_html( get_field( 'title_3' ) ); ?></h3>
				<p><?= esc_html( get_field( 'content_3' ) ); ?></p>
			</div>
		</div>
	</div>
</section>