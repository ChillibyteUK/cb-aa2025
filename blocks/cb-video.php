<?php
/**
 * Video Block Template
 *
 * Displays a wide video container.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

$video_id    = get_field( 'video_id' );
$cover_image = get_field( 'cover_image' );

if ( ! $video_id ) {
	return;
}
?>

<section class="cb_video">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12">

				<div class="ratio ratio-2x1 cb_video__media">

					<?php if ( $cover_image ) : ?>
						<button class="cb_video__player" type="button" data-video-id="<?= esc_attr( $video_id ); ?>" aria-label="Play video">

							<?= wp_get_attachment_image(
								$cover_image,
								'large',
								false,
								array( 'class' => 'cb_video__cover' )
							); ?>

							<span class="cb_video__play" aria-hidden="true"></span>

						</button>
					<?php else : ?>
						<iframe
							class="cb_video__iframe"
							src="<?= esc_url( 'https://player.vimeo.com/video/' . $video_id . '?title=0&byline=0&portrait=0' ); ?>"
							title="<?= esc_attr( get_the_title() ); ?>"
							allowfullscreen
							allow="autoplay; fullscreen; picture-in-picture">
						</iframe>
					<?php endif; ?>

				</div>

				<?php if ( get_field( 'description' ) ) : ?>
					<div class="cb_video__description">
						<?= wp_kses_post( get_field( 'description' ) ); ?>
					</div>
				<?php endif; ?>

				<?php if ( get_field( 'person_name' ) || get_field( 'person_role' ) ) : ?>
					<p class="cb_video__credit">
						<?php if ( get_field( 'person_name' ) ) : ?>
							<strong><?= esc_html( get_field( 'person_name' ) ); ?></strong>
						<?php endif; ?>

						<?php if ( get_field( 'person_role' ) ) : ?>
							<?= esc_html( get_field( 'person_role' ) ); ?>
						<?php endif; ?>
					</p>
				<?php endif; ?>

			</div>
		</div>
	</div>
</section>