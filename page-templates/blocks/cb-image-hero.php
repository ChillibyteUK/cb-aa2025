<?php
/**
 * Block template for CB Image Hero.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="image_hero">
	<?= wp_get_attachment_image( get_field( 'background' ), 'full', false, array( 'class' => 'image_hero__background' ) ); ?>
	<div class="container">
		<div class="image_hero__content">
			<?php
			if ( get_field( 'title' ) ) {
				?>
				<h1 class="image_hero__title"><?= esc_html( get_field( 'title' ) ); ?></h1>
				<?php
			}
			?>
		</div>
	</div>
</section>
