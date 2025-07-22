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
<section class="hero pb-0">
	<div class="call360_tab pricing-tab" data-tab="call360">
		<?= wp_get_attachment_image( get_field( 'call360_background' ), 'full', false, array( 'class' => 'hero__background hero__background--' . $bgalign ) ); ?>
		<div class="container pb-5">
			<h1 class="text-center w-constrained--sm"><?= esc_html( get_field( 'call360_title' ) ); ?></h1>
			<div class="text-center mb-5"><?= esc_html( get_field( 'call360_subtitle' ) ); ?></div>

			<div class="switcher mb-5">
				<div class="pricing-toggle">
					<button class="pricing-toggle__btn pricing-toggle__btn--active" data-tab="call360">Call360</button>
					<button class="pricing-toggle__btn" data-tab="talenttrack">TalentTrack</button>
				</div>
			</div>

			<div class="price-switcher d-flex justify-content-between align-items-center mb-4">
				<div>
					<?= get_field('call360_pricing_intro'); ?>
				</div>
				<div class="price-toggle">
					<button class="pricing-toggle__btn pricing-toggle__btn--active" data-price="monthly">Monthly</button>
					<button class="pricing-toggle__btn" data-price="annual">Annual</button>
				</div>
			</div>

			<div class="pricing_cards">
				<div class="row g-4">
					<div class="col-md-4">
						<div class="pricing_card">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( is_array( $call360_essential ) && isset( $call360_essential['package_name'] ) ? $call360_essential['package_name'] : 'Essential' ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( is_array( $call360_essential ) && isset( $call360_essential['package_desc'] ) ? $call360_essential['package_desc'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--monthly"><?= esc_html( is_array( $call360_essential ) && isset( $call360_essential['price'] ) ? $call360_essential['price'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--annual d-none"><?= esc_html( is_array( $call360_essential ) && isset( $call360_essential['price_annual'] ) ? $call360_essential['price_annual'] : '' ); ?></div>
							</div>
							<div class="pricing_card__features">
								<ul class="fa-ul">
									<?php
									if ( is_array( $call360_essential ) && ! empty( $call360_essential['features'] ) ) {
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
								<button class="btn btn-call360--outline mb-3"><?= esc_html( is_array( $call360_essential ) && isset( $call360_essential['cta']['title'] ) ? $call360_essential['cta']['title'] : 'Get Started' ); ?></button>
								<a href="#call360-comparison">Compare plans below</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="pricing_card pricing_card--glow">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( is_array( $call360_professional ) && isset( $call360_professional['package_name'] ) ? $call360_professional['package_name'] : 'Professional' ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( is_array( $call360_professional ) && isset( $call360_professional['package_desc'] ) ? $call360_professional['package_desc'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--monthly"><?= esc_html( is_array( $call360_professional ) && isset( $call360_professional['price'] ) ? $call360_professional['price'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--annual d-none"><?= esc_html( is_array( $call360_professional ) && isset( $call360_professional['price_annual'] ) ? $call360_professional['price_annual'] : '' ); ?></div>
							</div>
							<div class="pricing_card__features">
								<?php
								if ( is_array( $call360_professional ) && ! empty( $call360_professional['features'] ) ) {
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
								<button class="btn btn-call360 mb-3"><?= esc_html( is_array( $call360_professional ) && isset( $call360_professional['cta']['title'] ) ? $call360_professional['cta']['title'] : 'Get Started' ); ?></button>
								<a href="#call360-comparison">Compare plans below</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="pricing_card">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( is_array( $call360_enterprise ) && isset( $call360_enterprise['package_name'] ) ? $call360_enterprise['package_name'] : 'Enterprise' ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( is_array( $call360_enterprise ) && isset( $call360_enterprise['package_desc'] ) ? $call360_enterprise['package_desc'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--monthly"><?= esc_html( is_array( $call360_enterprise ) && isset( $call360_enterprise['price'] ) ? $call360_enterprise['price'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--annual d-none"><?= esc_html( is_array( $call360_enterprise ) && isset( $call360_enterprise['price_annual'] ) ? $call360_enterprise['price_annual'] : '' ); ?></div>
							</div>
							<div class="pricing_card__features">
								<?php
								if ( is_array( $call360_enterprise ) && ! empty( $call360_enterprise['features'] ) ) {
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
								<button class="btn btn-call360--outline mb-3"><?= esc_html( is_array( $call360_enterprise ) && isset( $call360_enterprise['cta']['title'] ) ? $call360_enterprise['cta']['title'] : 'Get Started' ); ?></button>
								<a href="#call360-comparison">Compare plans below</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container py-5" id="call360-comparison">
			<h2 class="text-center mb-5">Compare our plans</h2>
			<?php
			if ( have_rows( 'call360_comparison' ) ) {
				?>
			<table class="table comparison-table">
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>Essential</th>
						<th>Professional</th>
						<th>Enterprise</th>
					</tr>
				</thead>
				<tbody>
				<?php
				while ( have_rows( 'call360_comparison' ) ) {
					the_row();
					?>
					<tr>
						<td><?= esc_html( get_sub_field( 'item' ) ); ?></td>
						<td><?= get_yn_icon( get_sub_field( 'essential' ) ); ?></td>
						<td><?= get_yn_icon( get_sub_field( 'professional' ) ); ?></td>
						<td><?= get_yn_icon( get_sub_field( 'enterprise' ) ); ?></td>
					</tr>
					<?php
				}
				?>
				</tbody>
			</table>
				<?php
			}
			?>
		</div>
		<section class="has-off-white-background-color has-main-blue-color" id="call360_faq">
			<div class="container py-5">
				<h2 class="text-center mb-5">Frequently asked questions</h2>
				<?php
				if ( have_rows( 'call360_faqs' ) ) {
					// Get all FAQ items first.
					$faqs = array();
					while ( have_rows( 'call360_faqs' ) ) {
						the_row();
						$faqs[] = array(
							'question' => get_sub_field( 'question' ),
							'answer'   => get_sub_field( 'answer' ),
						);
					}

					// Split into two columns.
					$total        = count( $faqs );
					$half         = ceil( $total / 2 );
					$left_column  = array_slice( $faqs, 0, $half );
					$right_column = array_slice( $faqs, $half );
					?>
					<div class="faq-columns">
						<div class="faq-column">
							<?php
							$faq_count = 0;
							foreach ( $left_column as $faq ) {
								++$faq_count;
								$collapse_id = 'call360-faq-' . $faq_count;
								?>
								<div class="faq-item-wrapper mb-3">
									<div class="card faq-item">
										<div class="card-header">
											<div class="w-100 text-start collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= esc_attr( $collapse_id ); ?>" aria-expanded="false" aria-controls="<?= esc_attr( $collapse_id ); ?>">
												<div class="d-flex justify-content-between align-items-center">
													<span><?= esc_html( $faq['question'] ); ?></span>
													<i class="fas fa-plus"></i>
												</div>
											</div>
										</div>
										<div id="<?= esc_attr( $collapse_id ); ?>" class="collapse">
											<div class="card-body">
												<?= wp_kses_post( $faq['answer'] ); ?>
											</div>
										</div>
									</div>
								</div>
								<?php
							}
							?>
						</div>
						<div class="faq-column">
							<?php
							foreach ( $right_column as $faq ) {
								++$faq_count;
								$collapse_id = 'call360-faq-' . $faq_count;
								?>
								<div class="faq-item-wrapper mb-3">
									<div class="card faq-item">
										<div class="card-header">
											<div class="w-100 text-start collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= esc_attr( $collapse_id ); ?>" aria-expanded="false" aria-controls="<?= esc_attr( $collapse_id ); ?>">
												<div class="d-flex justify-content-between align-items-center">
													<span><?= esc_html( $faq['question'] ); ?></span>
													<i class="fas fa-plus"></i>
												</div>
											</div>
										</div>
										<div id="<?= esc_attr( $collapse_id ); ?>" class="collapse">
											<div class="card-body">
												<?= wp_kses_post( $faq['answer'] ); ?>
											</div>
										</div>
									</div>
								</div>
								<?php
							}
							?>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</section>
	</div>
	<div class="talenttrack_tab pricing-tab d-none" data-tab="talenttrack">
		<?= wp_get_attachment_image( get_field( 'talenttrack_background' ), 'full', false, array( 'class' => 'hero__background hero__background--' . $bgalign ) ); ?>
		<div class="container pb-5">
			<div class="h1 text-center w-constrained--sm"><?= esc_html( get_field( 'talenttrack_title' ) ); ?></div>
			<div class="text-center mb-5"><?= esc_html( get_field( 'talenttrack_subtitle' ) ); ?></div>

			<div class="switcher mb-5">
				<div class="pricing-toggle">
					<button class="pricing-toggle__btn" data-tab="call360">Call360</button>
					<button class="pricing-toggle__btn pricing-toggle__btn--active" data-tab="talenttrack">TalentTrack</button>
				</div>
			</div>

		
			<div class="price-switcher d-flex justify-content-between align-items-center mb-4">
				<div>
					<?= get_field('talenttrack_pricing_intro'); ?>
				</div>
				<div class="price-toggle">
					<button class="pricing-toggle__btn pricing-toggle__btn--active" data-price="monthly">Monthly</button>
					<button class="pricing-toggle__btn" data-price="annual">Annual</button>
				</div>
			</div>

			<div class="pricing_cards">
				<div class="row g-4">
					<div class="col-md-4">
						<div class="pricing_card">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( is_array( $talenttrack_essential ) && isset( $talenttrack_essential['package_name'] ) ? $talenttrack_essential['package_name'] : 'Essential' ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( is_array( $talenttrack_essential ) && isset( $talenttrack_essential['package_desc'] ) ? $talenttrack_essential['package_desc'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--monthly"><?= esc_html( is_array( $talenttrack_essential ) && isset( $talenttrack_essential['price'] ) ? $talenttrack_essential['price'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--annual d-none"><?= esc_html( is_array( $talenttrack_essential ) && isset( $talenttrack_essential['price_annual'] ) ? $talenttrack_essential['price_annual'] : '' ); ?></div>
							</div>
							<div class="pricing_card__features">
								<ul class="fa-ul">
									<?php
									if ( is_array( $talenttrack_essential ) && ! empty( $talenttrack_essential['features'] ) ) {
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
								<button class="btn btn-talent--outline mb-3"><?= esc_html( is_array( $talenttrack_essential ) && isset( $talenttrack_essential['cta']['title'] ) ? $talenttrack_essential['cta']['title'] : 'Get Started' ); ?></button>
								<a href="#talenttrack-comparison">Compare plans below</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="pricing_card pricing_card--glow">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( is_array( $talenttrack_professional ) && isset( $talenttrack_professional['package_name'] ) ? $talenttrack_professional['package_name'] : 'Professional' ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( is_array( $talenttrack_professional ) && isset( $talenttrack_professional['package_desc'] ) ? $talenttrack_professional['package_desc'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--monthly"><?= esc_html( is_array( $talenttrack_professional ) && isset( $talenttrack_professional['price'] ) ? $talenttrack_professional['price'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--annual d-none"><?= esc_html( is_array( $talenttrack_professional ) && isset( $talenttrack_professional['price_annual'] ) ? $talenttrack_professional['price_annual'] : '' ); ?></div>
							</div>
							<div class="pricing_card__features">
								<?php
								if ( is_array( $talenttrack_professional ) && ! empty( $talenttrack_professional['features'] ) ) {
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
								<button class="btn btn-talent mb-3"><?= esc_html( is_array( $talenttrack_professional ) && isset( $talenttrack_professional['cta']['title'] ) ? $talenttrack_professional['cta']['title'] : 'Get Started' ); ?></button>
								<a href="#talenttrack-comparison">Compare plans below</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="pricing_card">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( is_array( $talenttrack_enterprise ) && isset( $talenttrack_enterprise['package_name'] ) ? $talenttrack_enterprise['package_name'] : 'Enterprise' ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( is_array( $talenttrack_enterprise ) && isset( $talenttrack_enterprise['package_desc'] ) ? $talenttrack_enterprise['package_desc'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--monthly"><?= esc_html( is_array( $talenttrack_enterprise ) && isset( $talenttrack_enterprise['price'] ) ? $talenttrack_enterprise['price'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--annual d-none"><?= esc_html( is_array( $talenttrack_enterprise ) && isset( $talenttrack_enterprise['price_annual'] ) ? $talenttrack_enterprise['price_annual'] : '' ); ?></div>
							</div>
							<div class="pricing_card__features">
								<?php
								if ( is_array( $talenttrack_enterprise ) && ! empty( $talenttrack_enterprise['features'] ) ) {
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
								<button class="btn btn-talent--outline mb-3"><?= esc_html( is_array( $talenttrack_enterprise ) && isset( $talenttrack_enterprise['cta']['title'] ) ? $talenttrack_enterprise['cta']['title'] : 'Get Started' ); ?></button>
								<a href="#talenttrack-comparison">Compare plans below</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container py-5" id="talenttrack-comparison">
			<h2 class="text-center mb-5">Compare our plans</h2>
			<?php
			if ( have_rows( 'talenttrack_comparison' ) ) {
				?>
			<table class="table comparison-table">
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>Essential</th>
						<th>Professional</th>
						<th>Enterprise</th>
					</tr>
				</thead>
				<tbody>
				<?php
				while ( have_rows( 'talenttrack_comparison' ) ) {
					the_row();
					?>
					<tr>
						<td><?= esc_html( get_sub_field( 'item' ) ); ?></td>
						<td><?= get_yn_icon( get_sub_field( 'essential' ) ); ?></td>
						<td><?= get_yn_icon( get_sub_field( 'professional' ) ); ?></td>
						<td><?= get_yn_icon( get_sub_field( 'enterprise' ) ); ?></td>
					</tr>
					<?php
				}
				?>
				</tbody>
			</table>
				<?php
			}
			?>
		</div>
		<section class="has-off-white-background-color has-main-blue-color" id="talenttrack_faq">
			<div class="container py-5">
				<h2 class="text-center mb-5">Frequently asked questions</h2>
				<?php
				if ( have_rows( 'talenttrack_faqs' ) ) {
					// Get all FAQ items first
					$faqs = array();
					while ( have_rows( 'talenttrack_faqs' ) ) {
						the_row();
						$faqs[] = array(
							'question' => get_sub_field( 'question' ),
							'answer'   => get_sub_field( 'answer' ),
						);
					}
					
					// Split into two columns
					$total = count( $faqs );
					$half = ceil( $total / 2 );
					$left_column = array_slice( $faqs, 0, $half );
					$right_column = array_slice( $faqs, $half );
					?>
					<div class="faq-columns">
						<div class="faq-column">
							<?php
							$faq_count = 0;
							foreach ( $left_column as $faq ) {
								++$faq_count;
								$collapse_id = 'talenttrack-faq-' . $faq_count;
								?>
								<div class="faq-item-wrapper mb-3">
									<div class="card faq-item">
										<div class="card-header">
											<div class="w-100 text-start collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= esc_attr( $collapse_id ); ?>" aria-expanded="false" aria-controls="<?= esc_attr( $collapse_id ); ?>">
												<div class="d-flex justify-content-between align-items-center">
													<span><?= esc_html( $faq['question'] ); ?></span>
													<i class="fas fa-plus"></i>
												</div>
											</div>
										</div>
										<div id="<?= esc_attr( $collapse_id ); ?>" class="collapse">
											<div class="card-body">
												<?= wp_kses_post( $faq['answer'] ); ?>
											</div>
										</div>
									</div>
								</div>
								<?php
							}
							?>
						</div>
						<div class="faq-column">
							<?php
							foreach ( $right_column as $faq ) {
								++$faq_count;
								$collapse_id = 'talenttrack-faq-' . $faq_count;
								?>
								<div class="faq-item-wrapper mb-3">
									<div class="card faq-item">
										<div class="card-header">
											<div class="w-100 text-start collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= esc_attr( $collapse_id ); ?>" aria-expanded="false" aria-controls="<?= esc_attr( $collapse_id ); ?>">
												<div class="d-flex justify-content-between align-items-center">
													<span><?= esc_html( $faq['question'] ); ?></span>
													<i class="fas fa-plus"></i>
												</div>
											</div>
										</div>
										<div id="<?= esc_attr( $collapse_id ); ?>" class="collapse">
											<div class="card-body">
												<?= wp_kses_post( $faq['answer'] ); ?>
											</div>
										</div>
									</div>
								</div>
								<?php
							}
							?>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</section>
	</div>
</section>

<?php
// Generate FAQ Schema markup combining both Call360 and TalentTrack FAQs
$faq_items = array();

// Add Call360 FAQs
if ( have_rows( 'call360_faqs' ) ) {
	while ( have_rows( 'call360_faqs' ) ) {
		the_row();
		$faq_items[] = array(
			'@type'          => 'Question',
			'name'           => get_sub_field( 'question' ),
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => wp_strip_all_tags( get_sub_field( 'answer' ) ),
			),
		);
	}
}

// Add TalentTrack FAQs
if ( have_rows( 'talenttrack_faqs' ) ) {
	while ( have_rows( 'talenttrack_faqs' ) ) {
		the_row();
		$faq_items[] = array(
			'@type'          => 'Question',
			'name'           => get_sub_field( 'question' ),
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => wp_strip_all_tags( get_sub_field( 'answer' ) ),
			),
		);
	}
}

// Output FAQ Schema if we have FAQ items
if ( ! empty( $faq_items ) ) {
	$faq_schema = array(
		'@context'   => 'https://schema.org',
		'@type'      => 'FAQPage',
		'mainEntity' => $faq_items,
	);
	?>
<script type="application/ld+json">
<?= wp_json_encode( $faq_schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE ); ?>
</script>
	<?php
}
?>

<style>
.faq-columns {
	display: flex;
	gap: 0.75rem;
}

.faq-column {
	flex: 1;
}

@media (max-width: 768px) {
	.faq-columns {
		flex-direction: column;
	}
}

.faq-item-wrapper {
	break-inside: avoid;
	page-break-inside: avoid;
}

.faq-item .card-header div {
	color: inherit !important;
	border: none;
	box-shadow: none;
	cursor: pointer;
	font-weight: 600;
	font-size: var(--fs-menu-intro);
}

.faq-item .card-header div:focus {
	box-shadow: none;
}

.faq-item .card-header div .fas {
	transition: transform 0.3s ease;
}

.faq-item .card-header div .fas {
	color: var(--_glow);
	font-size: 1rem;
}
.faq-item .card-header div[aria-expanded="true"] .fas {
	transform: rotate(45deg);
	color: var(--col-dark-grey);
}

.faq-item .card-body {
	padding-top: 1rem;
	font-size: var(--fs-menu-descr);
}
.faq-item .card-body p {
	margin-bottom: 0;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
	const toggleBtns = document.querySelectorAll('.pricing-toggle__btn[data-tab]');
	const tabs = document.querySelectorAll('.pricing-tab');
	const priceBtns = document.querySelectorAll('.pricing-toggle__btn[data-price]');

	// Check URL parameter on page load
	function checkUrlParameter() {
		const urlParams = new URLSearchParams(window.location.search);
		const productParam = urlParams.get('p');
		
		if (productParam === 'call360' || productParam === 'talenttrack') {
			// Hide all tabs
			tabs.forEach(t => t.classList.add('d-none'));
			
			// Show the target tab
			const targetTab = document.querySelector(`.pricing-tab[data-tab="${productParam}"]`);
			if (targetTab) {
				targetTab.classList.remove('d-none');
			}
			
			// Update button states in all toggles
			toggleBtns.forEach(btn => {
				if (btn.getAttribute('data-tab') === productParam) {
					btn.classList.add('pricing-toggle__btn--active');
				} else {
					btn.classList.remove('pricing-toggle__btn--active');
				}
			});
		}
	}

	// Run on page load
	checkUrlParameter();

	// Handle tab switching (Call360 / TalentTrack)
	toggleBtns.forEach(btn => {
		btn.addEventListener('click', function() {
			const targetTab = this.getAttribute('data-tab');

			// Hide all tabs by adding d-none class
			tabs.forEach(t => {
				t.classList.add('d-none');
			});

			// Show target tab by removing d-none class
			const targetTabElement = document.querySelector(`.pricing-tab[data-tab="${targetTab}"]`);
			if (targetTabElement) {
				targetTabElement.classList.remove('d-none');
			}

			// Update button states in all toggles
			toggleBtns.forEach(b => {
				if (b.getAttribute('data-tab') === targetTab) {
					b.classList.add('pricing-toggle__btn--active');
				} else {
					b.classList.remove('pricing-toggle__btn--active');
				}
			});
		});
	});

	// Handle price switching (Monthly / Annual)
	priceBtns.forEach(btn => {
		btn.addEventListener('click', function() {
			const targetPrice = this.getAttribute('data-price');
			const currentTab = this.closest('.pricing-tab');
			
			// Update button states only within the current tab
			const currentTabPriceBtns = currentTab.querySelectorAll('.pricing-toggle__btn[data-price]');
			currentTabPriceBtns.forEach(b => b.classList.remove('pricing-toggle__btn--active'));
			this.classList.add('pricing-toggle__btn--active');

			// Update prices only within the current tab
			const currentTabMonthlyPrices = currentTab.querySelectorAll('.pricing_card__price--monthly');
			const currentTabAnnualPrices = currentTab.querySelectorAll('.pricing_card__price--annual');

			if (targetPrice === 'monthly') {
				// Show monthly prices, hide annual
				currentTabMonthlyPrices.forEach(price => price.classList.remove('d-none'));
				currentTabAnnualPrices.forEach(price => price.classList.add('d-none'));
			} else if (targetPrice === 'annual') {
				// Show annual prices, hide monthly
				currentTabMonthlyPrices.forEach(price => price.classList.add('d-none'));
				currentTabAnnualPrices.forEach(price => price.classList.remove('d-none'));
			}
		});
	});
});
</script>
