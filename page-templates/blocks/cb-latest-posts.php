<?php
/**
 * Block template for CB Latest Posts.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

$theme = strtolower( get_field( 'theme' ) );
if ( ! $theme ) {
	$theme = '';
}
else {
	$theme = 'cb_latest_posts--' . sanitize_html_class( $theme );
}

?>
<section class="cb_latest_posts <?= esc_attr( $theme ); ?>">
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-4">
			<h2 class="cb_latest_posts__title"><?= esc_html( get_field( 'title' ) ); ?></h2>
		</div>
		<div class="row">
			<?php
			$q = new WP_Query(
				array(
					'post_type'      => 'post',
					'posts_per_page' => 3,
					'orderby'        => 'date',
					'order'          => 'DESC',
				)
			);

			if ( $q->have_posts() ) {
				while ( $q->have_posts() ) {
					$q->the_post();
					?>
					<div class="col-md-4 mb-4">
						<a class="cb_latest_posts__post" href="<?= esc_url( get_permalink() ); ?>">
							<?= get_the_post_thumbnail( get_the_ID(), 'medium', array( 'class' => 'cb_latest_posts__post-image' ) ); ?>
							<div>
								<div class="cb_latest_posts__post-meta"><?= get_the_date( 'F j, Y' ); ?></div>
								<h3 class="cb_latest_posts__post-title"><?= esc_html( get_the_title() ); ?></h3>
								<p class="cb_latest_posts__post-excerpt"><?= esc_html( wp_trim_words( get_the_excerpt(), 20, '...' ) ); ?></p>
							</div>
							<p class="cb_latest_posts__post-link">Learn more</p>
						</a>
					</div>
					<?php
				}
			} else {
				echo '<p>' . esc_html__( 'No posts found.', 'cb-aa2025' ) . '</p>';
			}
			wp_reset_postdata();
			?>
		</div>
	</div>