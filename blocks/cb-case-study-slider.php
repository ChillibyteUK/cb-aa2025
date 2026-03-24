<?php
/**
 * Case Study Slider Block Template
 *
 * Displays a slider of case studies.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

$q = new WP_Query(
	array(
		'post_type'      => 'case_study',
		'posts_per_page' => 6,
		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);

if ( $q->have_posts() ) {
	?>
	<section class="cb_case_study_slider pb-5">
		<div class="container">
			<div class="d-flex justify-content-between align-items-center mb-4">
				<h2 class="cb_case_study_slider__title"><?= esc_html( get_field( 'title' ) ); ?></h2>
				<a href="/case-studies/" class="btn btn-green-no--arrow">
					View more
				</a>
			</div>
			<div class="slider-bleed-right">
				<div id="case-study-slider" class="splide cb_case_study_slider__slider">
					<div class="splide__track">
						<ul class="splide__list">
							<?php
							$c = 1;
							while ( $q->have_posts() ) {
								$q->the_post();
								?>
								<li class="splide__slide">
									<a href="<?= esc_url( get_permalink() ); ?>" class="cb_case_study_slider__slide">
										<div class="cb_case_study_slider__number"><?= esc_html( sprintf( '%02d', $c ) ); ?></div>
										<div class="cb_case_study_slider__image">
											<?= get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'img-fluid' ) ); ?>
										</div>
										<div class="cb_case_study_slider__content">
											<h3 class="cb_case_study_slider__title"><?= esc_html( get_field( 'card_title', get_the_ID() ) ); ?></h3>
										</div>
									</a>
								</li>
								<?php
								++$c;
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
}
wp_reset_postdata();
?>
<script>
document.addEventListener('DOMContentLoaded', function () {
	new Splide('#case-study-slider', {
		type      : 'loop',
		perPage   : 5,
		gap       : '1rem',
		pagination: false,
		arrows    : false,
		breakpoints: {
			1024: { perPage: 3 },
			600 : { perPage: 2 },
		},
	}).mount();
});
</script>
