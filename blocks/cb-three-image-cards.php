<?php
/**
 * Block template for CB Three Image Cards.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

$classes = $block['attrs']['className'] ?? 'py-5';
?>

<section class="three-image-cards <?php echo esc_attr( $classes ); ?>">
	<div class="container py-5">

		<div class="row align-items-center mb-5">
			<div class="col-lg-6">
				<?php if ( get_field( 'title' ) ) : ?>
					<h2 class="three-image-cards__title mb-0">
						<?= esc_html( get_field( 'title' ) ); ?>
					</h2>
				<?php endif; ?>
			</div>

			<div class="col-lg-6 mt-4 mt-lg-0">
				<div class="d-flex justify-content-lg-end align-items-center gap-4">
					<?php if ( get_field( 'trial_link' ) ) :
						$trial_link = get_field( 'trial_link' ); ?>
						<a href="<?= esc_url( $trial_link['url'] ); ?>" class="button-green button-green--arrow" target="<?= esc_attr( $trial_link['target'] ); ?>">
							<?= esc_html( $trial_link['title'] ); ?>
						</a>
					<?php endif; ?>

					<?php if ( get_field( 'more_link' ) ) :
						$more_link = get_field( 'more_link' ); ?>
						<a href="<?= esc_url( $more_link['url'] ); ?>" class="green-arrow" target="<?= esc_attr( $more_link['target'] ); ?>">
							<?= esc_html( $more_link['title'] ); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<div class="row three-image-cards__row">
			<div class="col-md-4 mb-4 mb-md-0">
				<?= wp_get_attachment_image( get_field( 'img_1' ), 'large', false, array( 'class' => 'three-image-cards__image w-100' ) ); ?>
				<h3 class="mt-4 mb-3"><?= esc_html( get_field( 'title_1' ) ); ?></h3>
				<p class="mb-0"><?= esc_html( get_field( 'content_1' ) ); ?></p>
			</div>

			<div class="col-md-4 mb-4 mb-md-0">
				<?= wp_get_attachment_image( get_field( 'img_2' ), 'large', false, array( 'class' => 'three-image-cards__image w-100' ) ); ?>
				<h3 class="mt-4 mb-3"><?= esc_html( get_field( 'title_2' ) ); ?></h3>
				<p class="mb-0"><?= esc_html( get_field( 'content_2' ) ); ?></p>
			</div>

			<div class="col-md-4">
				<?= wp_get_attachment_image( get_field( 'img_3' ), 'large', false, array( 'class' => 'three-image-cards__image w-100' ) ); ?>
				<h3 class="mt-4 mb-3"><?= esc_html( get_field( 'title_3' ) ); ?></h3>
				<p class="mb-0"><?= esc_html( get_field( 'content_3' ) ); ?></p>
			</div>
		</div>

	</div>
</section>