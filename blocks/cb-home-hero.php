<?php
/**
 * Home Hero Block Template
 *
 * Displays the hero section with background, title, intro, and trusted by slider.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="cb_home_hero">
	<?= wp_get_attachment_image( get_field( 'background' ), 'full', false, array( 'class' => 'cb_home_hero__background' ) ); ?>
	<div class="cb_home_hero__overlay"></div>
	<div class="cb_home_hero__content container d-flex align-items-end justify-content-center h-100">
		<div class="row">
			<div class="col-md-6 d-flex align-items-end">
				<h1 class="cb_home_hero__title"><?= esc_html( get_field( 'title' ) ); ?></h1>
			</div>
			<div class="col-md-6 d-flex align-items-end">
				<div class="cb_home_hero__intro">
					<?= esc_html( get_field( 'intro' ) ); ?>
				</div>
			</div>
			<div class="mt-5 col-12 text-center cb_home_hero__slider-title">
				<?= esc_html( get_field( 'slider_title' ) ); ?>
			</div>
			<div class="col-12 my-4">
				<div id="home-slider" class="splide cb_home_hero__slider">
					<div class="splide__track">
						<ul class="splide__list">
							<?php
							$slider = get_field( 'trusted_by' );
							if ( $slider ) {
								foreach ( $slider as $slide ) {
									echo '<li class="splide__slide">';
									echo wp_get_attachment_image( $slide, 'full', false, array( 'class' => 'img-fluid' ) );
									echo '</li>';
								}
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function () {
  	new Splide('#home-slider', {
		type      : 'loop',
		perPage   : 6,
		autoplay  : true,
		interval  : 3000,
		arrows    : false,
		pagination: false,
		breakpoints: {
			1024: { perPage: 4 },
			600 : { perPage: 2 },
		},
	}).mount();
});
</script>