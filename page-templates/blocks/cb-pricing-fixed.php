<?php
/**
 * Block template for CB Pricing.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

$call360_essential    = get_field( 'call360_essential' );
$call360_professional = get_field( 'call360_professional' );
$call360_enterprise   = get_field( 'call360_enterprise' );

$talenttrack_essential    = get_field( 'talenttrack_essential' );
$talenttrack_professional = get_field( 'talenttrack_professional' );
$talenttrack_enterprise   = get_field( 'talenttrack_enterprise' );

?>
<section class="hero">
	<div class="call360_tab pricing-tab" data-tab="call360">
		<?= wp_get_attachment_image( get_field( 'call360_background' ), 'full', false, array( 'class' => 'hero__background hero__background--' . $bgalign ) ); ?>
		<div class="container">
			<h1 class="text-center"><?= esc_html( get_field( 'call360_title' ) ); ?></h1>
			<div class="text-center mb-5"><?= esc_html( get_field( 'call360_subtitle' ) ); ?></div>

			<div class="switcher mb-5">
				<div class="pricing-toggle">
					<button class="pricing-toggle__btn pricing-toggle__btn--active" data-tab="call360">Call360</button>
					<button class="pricing-toggle__btn" data-tab="talenttrack">TalentTrack</button>
				</div>
			</div>

			<div class="pricing_cards">
				<div class="row g-4">
					<div class="col-md-4">
						<div class="pricing_card">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( $call360_essential['package_name'] ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( $call360_essential['package_desc'] ); ?></div>
								<div class="pricing_card__price"><?= esc_html( $call360_essential['price'] ); ?></div>
							</div>
							<div class="pricing_card__features">
								<ul class="fa-ul">
									<?php
									if ( ! empty( $call360_essential['features'] ) ) {
										$features = explode( "\n", $call360_essential['features'] );
										foreach ( $features as $feature ) {
											$feature = trim( $feature );
											if ( ! empty( $feature ) ) {
												echo '<li><span class="fa-li"><i class="fa-solid fa-check"></i></span> ' . esc_html( $feature ) . '</li>';
											}
										}
									}
									?>
								</ul>
							</div>
							<div class="pricing_card__actions d-flex flex-column align-items-center">
								<button class="btn btn-call360--outline"><?= esc_html( $call360_essential['cta']['title'] ); ?></button>
								<a href="#<?= esc_attr( $call360_essential['plans_link'] ); ?>">Compare plans below</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="pricing_card pricing_card--glow">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( $call360_professional['package_name'] ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( $call360_professional['package_desc'] ); ?></div>
								<div class="pricing_card__price"><?= esc_html( $call360_professional['price'] ); ?></div>
							</div>
							<div class="pricing_card__features">
								<?php
								if ( ! empty( $call360_professional['features'] ) ) {
									$features      = explode( "\n", $call360_professional['features'] );
									$features      = array_filter( array_map( 'trim', $features ) );
									$first_feature = array_shift( $features );
									echo '<strong>' . esc_html( $first_feature ) . '</strong>';
									echo '<ul class="fa-ul">';
									foreach ( $features as $feature ) {
										$feature = trim( $feature );
										if ( ! empty( $feature ) ) {
											echo '<li><span class="fa-li"><i class="fa-solid fa-check"></i></span> ' . esc_html( $feature ) . '</li>';
										}
									}
									echo '</ul>';
								}
								?>
							</div>
							<div class="pricing_card__actions d-flex flex-column align-items-center">
								<button class="btn btn-call360"><?= esc_html( $call360_professional['cta']['title'] ); ?></button>
								<a href="#<?= esc_attr( $call360_professional['plans_link'] ); ?>">Compare plans below</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="pricing_card">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( $call360_enterprise['package_name'] ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( $call360_enterprise['package_desc'] ); ?></div>
								<div class="pricing_card__price"><?= esc_html( $call360_enterprise['price'] ); ?></div>
							</div>
							<div class="pricing_card__features">
								<?php
								if ( ! empty( $call360_enterprise['features'] ) ) {
									$features      = explode( "\n", $call360_enterprise['features'] );
									$features      = array_filter( array_map( 'trim', $features ) );
									$first_feature = array_shift( $features );
									echo '<strong>' . esc_html( $first_feature ) . '</strong>';
									echo '<ul class="fa-ul">';
									foreach ( $features as $feature ) {
										$feature = trim( $feature );
										if ( ! empty( $feature ) ) {
											echo '<li><span class="fa-li"><i class="fa-solid fa-check"></i></span> ' . esc_html( $feature ) . '</li>';
										}
									}
									echo '</ul>';
								}
								?>
							</div>
							<div class="pricing_card__actions d-flex flex-column align-items-center">
								<button class="btn btn-call360--outline"><?= esc_html( $call360_enterprise['cta']['title'] ); ?></button>
								<a href="#<?= esc_attr( $call360_enterprise['plans_link'] ); ?>">Compare plans below</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="talenttrack_tab pricing-tab d-none" data-tab="talenttrack">
		<?= wp_get_attachment_image( get_field( 'talenttrack_background' ), 'full', false, array( 'class' => 'hero__background hero__background--' . $bgalign ) ); ?>
		<div class="container">
			<h1 class="text-center"><?= esc_html( get_field( 'talenttrack_title' ) ); ?></h1>
			<div class="text-center mb-5"><?= esc_html( get_field( 'talenttrack_subtitle' ) ); ?></div>

			<div class="switcher mb-5">
				<div class="pricing-toggle">
					<button class="pricing-toggle__btn" data-tab="call360">Call360</button>
					<button class="pricing-toggle__btn pricing-toggle__btn--active" data-tab="talenttrack">TalentTrack</button>
				</div>
			</div>

			<div class="pricing_cards">
				<div class="row g-4">
					<div class="col-md-4">
						<div class="pricing_card">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( $talenttrack_essential['package_name'] ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( $talenttrack_essential['package_desc'] ); ?></div>
								<div class="pricing_card__price"><?= esc_html( $talenttrack_essential['price'] ); ?></div>
							</div>
							<div class="pricing_card__features">
								<ul class="fa-ul">
									<?php
									if ( ! empty( $talenttrack_essential['features'] ) ) {
										$features = explode( "\n", $talenttrack_essential['features'] );
										foreach ( $features as $feature ) {
											$feature = trim( $feature );
											if ( ! empty( $feature ) ) {
												echo '<li><span class="fa-li"><i class="fa-solid fa-check"></i></span> ' . esc_html( $feature ) . '</li>';
											}
										}
									}
									?>
								</ul>
							</div>
							<div class="pricing_card__actions d-flex flex-column align-items-center">
								<button class="btn btn-call360--outline"><?= esc_html( $talenttrack_essential['cta']['title'] ); ?></button>
								<a href="#<?= esc_attr( $talenttrack_essential['plans_link'] ); ?>">Compare plans below</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="pricing_card pricing_card--glow">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( $talenttrack_professional['package_name'] ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( $talenttrack_professional['package_desc'] ); ?></div>
								<div class="pricing_card__price"><?= esc_html( $talenttrack_professional['price'] ); ?></div>
							</div>
							<div class="pricing_card__features">
								<?php
								if ( ! empty( $talenttrack_professional['features'] ) ) {
									$features      = explode( "\n", $talenttrack_professional['features'] );
									$features      = array_filter( array_map( 'trim', $features ) );
									$first_feature = array_shift( $features );
									echo '<strong>' . esc_html( $first_feature ) . '</strong>';
									echo '<ul class="fa-ul">';
									foreach ( $features as $feature ) {
										$feature = trim( $feature );
										if ( ! empty( $feature ) ) {
											echo '<li><span class="fa-li"><i class="fa-solid fa-check"></i></span> ' . esc_html( $feature ) . '</li>';
										}
									}
									echo '</ul>';
								}
								?>
							</div>
							<div class="pricing_card__actions d-flex flex-column align-items-center">
								<button class="btn btn-call360"><?= esc_html( $talenttrack_professional['cta']['title'] ); ?></button>
								<a href="#<?= esc_attr( $talenttrack_professional['plans_link'] ); ?>">Compare plans below</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="pricing_card">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( $talenttrack_enterprise['package_name'] ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( $talenttrack_enterprise['package_desc'] ); ?></div>
								<div class="pricing_card__price"><?= esc_html( $talenttrack_enterprise['price'] ); ?></div>
							</div>
							<div class="pricing_card__features">
								<?php
								if ( ! empty( $talenttrack_enterprise['features'] ) ) {
									$features      = explode( "\n", $talenttrack_enterprise['features'] );
									$features      = array_filter( array_map( 'trim', $features ) );
									$first_feature = array_shift( $features );
									echo '<strong>' . esc_html( $first_feature ) . '</strong>';
									echo '<ul class="fa-ul">';
									foreach ( $features as $feature ) {
										$feature = trim( $feature );
										if ( ! empty( $feature ) ) {
											echo '<li><span class="fa-li"><i class="fa-solid fa-check"></i></span> ' . esc_html( $feature ) . '</li>';
										}
									}
									echo '</ul>';
								}
								?>
							</div>
							<div class="pricing_card__actions d-flex flex-column align-items-center">
								<button class="btn btn-talenttrack--outline"><?= esc_html( $talenttrack_enterprise['cta']['title'] ); ?></button>
								<a href="#<?= esc_attr( $talenttrack_enterprise['plans_link'] ); ?>">Compare plans below</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<style>
.pricing-toggle {
	display: flex;
	justify-content: center;
	background: #f5f5f5;
	border-radius: 50px;
	padding: 4px;
	max-width: 300px;
	margin: 0 auto;
}

.pricing-toggle__btn {
	flex: 1;
	padding: 12px 24px;
	border: none;
	background: transparent;
	border-radius: 46px;
	cursor: pointer;
	font-weight: 600;
	transition: all 0.3s ease;
	color: #666;
}

.pricing-toggle__btn--active {
	background: #fff;
	color: #333;
	box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
	const toggleBtns = document.querySelectorAll('.pricing-toggle__btn');
	const tabs = document.querySelectorAll('.pricing-tab');

	toggleBtns.forEach(btn => {
		btn.addEventListener('click', function() {
			const targetTab = this.getAttribute('data-tab');

			// Remove active class from all buttons
			toggleBtns.forEach(b => b.classList.remove('pricing-toggle__btn--active'));

			// Hide all tabs by adding d-none class
			tabs.forEach(t => {
				t.classList.add('d-none');
			});

			// Add active class to clicked button
			this.classList.add('pricing-toggle__btn--active');

			// Show target tab by removing d-none class
			const targetTabElement = document.querySelector(`.pricing-tab[data-tab="${targetTab}"]`);
			if (targetTabElement) {
				targetTabElement.classList.remove('d-none');
			}
		});
	});
});
</script>
