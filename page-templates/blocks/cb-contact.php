<?php
/**
 * Block template for CB Contact.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="cb_contact">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?= wp_get_attachment_image( get_field( 'flag' ), 'full', false, array( 'class' => 'cb_contact__flag' ) ); ?>
				<h3 class="cb_contact__title"><?= esc_html( get_field( 'location' ) ); ?></h3>
				<div class="cb_contact__description mb-4"><?= esc_html( get_field( 'description' ) ); ?></div>
				<ul class="custom-list">
					<li class="icon-marker"> <?= esc_html( get_field( 'address' ) ); ?></li>
					<li class="icon-phone"> <?= esc_html( get_field( 'phone' ) ); ?></li>
					<li class="icon-media"> <?= esc_html( get_field( 'email' ) ); ?></li>
				</ul>
			</div>
			<div class="col-md-6">
				<?= wp_get_attachment_image( get_field( 'map' ), 'full', false, array( 'class' => 'cb_contact__map' ) ); ?>
			</div>
		</div>
	</div>
</section>