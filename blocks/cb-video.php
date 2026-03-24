<?php
/**
 * Video Block Template
 *
 * Displays a wide video container.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

$video_id = get_field( 'video_id' );
if ( ! $video_id ) {
	return;
}

$thumbnail = get_vimeo_data_from_id( $video_id, 'thumbnail_url' );
?>
<section class="cb_video">
	<div class="container">
		<div class="ratio ratio-2x1">
			<iframe src="<?= esc_url( 'https://player.vimeo.com/video/' . $video_id . '?title=0&byline=0&portrait=0' ); ?>"
				title="<?= esc_attr( get_the_title() ); ?>"
                allowfullscreen
                allow="autoplay; fullscreen; picture-in-picture"></iframe>
		</div>
	</div>
</section>