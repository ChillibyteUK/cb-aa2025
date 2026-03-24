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
		<div class="row">
			<div class="col-md-4 text-center">
				<?= wp_get_attachment_image( get_field( 'icon_1' ), 'full', false, array( 'class' => 'img-fluid' ) ); ?>
				<h3><?= esc_html( get_field( 'title_1' ) ); ?></h3>
				<p><?= esc_html( get_field( 'content_1' ) ); ?></p>
			</div>
			<div class="col-md-4 text-center">
				<?= wp_get_attachment_image( get_field( 'icon_2' ), 'full', false, array( 'class' => 'img-fluid' ) ); ?>
				<h3><?= esc_html( get_field( 'title_2' ) ); ?></h3>
				<p><?= esc_html( get_field( 'content_2' ) ); ?></p>
			</div>
			<div class="col-md-4 text-center">
				<?= wp_get_attachment_image( get_field( 'icon_3' ), 'full', false, array( 'class' => 'img-fluid' ) ); ?>
				<h3><?= esc_html( get_field( 'title_3' ) ); ?></h3>
				<p><?= esc_html( get_field( 'content_3' ) ); ?></p>
			</div>
		</div>
	</div>
</section>