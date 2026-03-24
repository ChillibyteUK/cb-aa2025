<?php
/**
 * Block template for CB Pricing 2.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

$call_starter    = get_field( 'call_starter' );
$call_growth     = get_field( 'call_growth' );
$call_pro        = get_field( 'call_pro' );
$call_enterprise = get_field( 'call_enterprise' );

$recruitment_starter    = get_field( 'recruitment_starter' );
$recruitment_growth     = get_field( 'recruitment_growth' );
$recruitment_pro        = get_field( 'recruitment_pro' );
$recruitment_enterprise = get_field( 'recruitment_enterprise' );

$bgalign = strtolower( get_field( 'background_alignment' ) );
$bgalign = $bgalign ? $bgalign : 'bottom';

?>
<section class="hero pb-0">
	<div class="call_tab pricing-tab" data-tab="call">
		<?= wp_get_attachment_image( get_field( 'call_background' ), 'full', false, array( 'class' => 'hero__background hero__background--' . $bgalign ) ); ?>
		<div class="container pb-5">
			<h1 class="text-center w-constrained--sm"><?= esc_html( get_field( 'call_title' ) ); ?></h1>
			<div class="text-center mb-5"><?= esc_html( get_field( 'call_subtitle' ) ); ?></div>

			<div class="switcher mb-5">
				<div class="pricing-toggle">
					<button class="pricing-toggle__btn pricing-toggle__btn--active" data-tab="call">Call</button>
					<button class="pricing-toggle__btn" data-tab="recruitment">Recruitment</button>
				</div>
			</div>

			<div class="price-switcher d-flex justify-content-between align-items-center mb-4">
				<div>
					<?= esc_html( get_field( 'call_pricing_intro' ) ); ?>
				</div>
				<div class="price-toggle">
					<button class="pricing-toggle__btn pricing-toggle__btn--active" data-price="monthly">Monthly</button>
					<button class="pricing-toggle__btn" data-price="annual">Annual</button>
				</div>
			</div>

			<div class="pricing_cards">
				<div class="row g-4">
					<div class="col-md-6 col-lg-3">
						<div class="pricing_card">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( is_array( $call_starter ) && isset( $call_starter['package_name'] ) ? $call_starter['package_name'] : 'Starter' ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( is_array( $call_starter ) && isset( $call_starter['package_desc'] ) ? $call_starter['package_desc'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--monthly"><?= esc_html( is_array( $call_starter ) && isset( $call_starter['price'] ) ? $call_starter['price'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--annual d-none"><?= esc_html( is_array( $call_starter ) && isset( $call_starter['price_annual'] ) ? $call_starter['price_annual'] : '' ); ?></div>
							</div>
							<div class="pricing_card__features">
								<ul class="fa-ul">
									<?php
									if ( is_array( $call_starter ) && ! empty( $call_starter['features'] ) ) {
										$features = explode( "\n", $call_starter['features'] );
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
								<button class="btn btn-call--outline mb-3"><?= esc_html( is_array( $call_starter ) && isset( $call_starter['cta']['title'] ) ? $call_starter['cta']['title'] : 'Get Started' ); ?></button>
								<a href="#call-comparison">Compare plans below</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="pricing_card">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( is_array( $call_growth ) && isset( $call_growth['package_name'] ) ? $call_growth['package_name'] : 'Growth' ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( is_array( $call_growth ) && isset( $call_growth['package_desc'] ) ? $call_growth['package_desc'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--monthly"><?= esc_html( is_array( $call_growth ) && isset( $call_growth['price'] ) ? $call_growth['price'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--annual d-none"><?= esc_html( is_array( $call_growth ) && isset( $call_growth['price_annual'] ) ? $call_growth['price_annual'] : '' ); ?></div>
							</div>
							<div class="pricing_card__features">
								<?php
								if ( is_array( $call_growth ) && ! empty( $call_growth['features'] ) ) {
									$features      = explode( "\n", $call_growth['features'] );
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
								<button class="btn btn-call--outline mb-3"><?= esc_html( is_array( $call_growth ) && isset( $call_growth['cta']['title'] ) ? $call_growth['cta']['title'] : 'Get Started' ); ?></button>
								<a href="#call-comparison">Compare plans below</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="pricing_card pricing_card--glow">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( is_array( $call_pro ) && isset( $call_pro['package_name'] ) ? $call_pro['package_name'] : 'Pro' ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( is_array( $call_pro ) && isset( $call_pro['package_desc'] ) ? $call_pro['package_desc'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--monthly"><?= esc_html( is_array( $call_pro ) && isset( $call_pro['price'] ) ? $call_pro['price'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--annual d-none"><?= esc_html( is_array( $call_pro ) && isset( $call_pro['price_annual'] ) ? $call_pro['price_annual'] : '' ); ?></div>
							</div>
							<div class="pricing_card__features">
								<?php
								if ( is_array( $call_pro ) && ! empty( $call_pro['features'] ) ) {
									$features      = explode( "\n", $call_pro['features'] );
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
								<button class="btn btn-call mb-3"><?= esc_html( is_array( $call_pro ) && isset( $call_pro['cta']['title'] ) ? $call_pro['cta']['title'] : 'Get Started' ); ?></button>
								<a href="#call-comparison">Compare plans below</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="pricing_card">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( is_array( $call_enterprise ) && isset( $call_enterprise['package_name'] ) ? $call_enterprise['package_name'] : 'Enterprise' ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( is_array( $call_enterprise ) && isset( $call_enterprise['package_desc'] ) ? $call_enterprise['package_desc'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--monthly"><?= esc_html( is_array( $call_enterprise ) && isset( $call_enterprise['price'] ) ? $call_enterprise['price'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--annual d-none"><?= esc_html( is_array( $call_enterprise ) && isset( $call_enterprise['price_annual'] ) ? $call_enterprise['price_annual'] : '' ); ?></div>
							</div>
							<div class="pricing_card__features">
								<?php
								if ( is_array( $call_enterprise ) && ! empty( $call_enterprise['features'] ) ) {
									$features      = explode( "\n", $call_enterprise['features'] );
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
								<button class="btn btn-call--outline mb-3"><?= esc_html( is_array( $call_enterprise ) && isset( $call_enterprise['cta']['title'] ) ? $call_enterprise['cta']['title'] : 'Get Started' ); ?></button>
								<a href="#call-comparison">Compare plans below</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container py-5" id="call-comparison">
			<h2 class="text-center mb-5">Compare our plans</h2>
			<?php
			if ( have_rows( 'call_comparison' ) ) {
				?>
			<table class="table comparison-table">
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>Starter</th>
						<th>Growth</th>
						<th>Pro</th>
						<th>Enterprise</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$current_group = '';
				while ( have_rows( 'call_comparison' ) ) {
					the_row();
					$group = get_sub_field( 'group' );
					
					// Output group header if group has changed and is not empty
					if ( ! empty( $group ) && $group !== $current_group ) {
						$current_group = $group;
						?>
						<tr class="comparison-table__group-header">
							<td colspan="5"><strong><?= esc_html( $group ); ?></strong></td>
						</tr>
						<?php
					}
					?>
					<tr>
						<td><?= esc_html( get_sub_field( 'item' ) ); ?></td>
						<td><?= wp_kses_post( get_yn_icon( get_sub_field( 'starter' ) ) ); ?></td>
						<td><?= wp_kses_post( get_yn_icon( get_sub_field( 'growth' ) ) ); ?></td>
						<td><?= wp_kses_post( get_yn_icon( get_sub_field( 'pro' ) ) ); ?></td>
						<td><?= wp_kses_post( get_yn_icon( get_sub_field( 'enterprise' ) ) ); ?></td>
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
		<section class="has-off-white-background-color has-main-blue-color" id="call_faq">
			<div class="container py-5">
				<h2 class="text-center mb-5">Frequently asked questions</h2>
				<?php
				if ( have_rows( 'call_faqs' ) ) {
					// Get all FAQ items first.
					$faqs = array();
					while ( have_rows( 'call_faqs' ) ) {
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
								$collapse_id = 'call-faq-' . $faq_count;
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
								$collapse_id = 'call-faq-' . $faq_count;
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
	<div class="recruitment_tab pricing-tab d-none" data-tab="recruitment">
		<?= wp_get_attachment_image( get_field( 'recruitment_background' ), 'full', false, array( 'class' => 'hero__background hero__background--' . $bgalign ) ); ?>
		<div class="container pb-5">
			<div class="h1 text-center w-constrained--sm"><?= esc_html( get_field( 'recruitment_title' ) ); ?></div>
			<div class="text-center mb-5"><?= esc_html( get_field( 'recruitment_subtitle' ) ); ?></div>

			<div class="switcher mb-5">
				<div class="pricing-toggle">
					<button class="pricing-toggle__btn" data-tab="call">Call</button>
					<button class="pricing-toggle__btn pricing-toggle__btn--active" data-tab="recruitment">Recruitment</button>
				</div>
			</div>

		
			<div class="price-switcher d-flex justify-content-between align-items-center mb-4">
				<div>
					<?= esc_html( get_field( 'recruitment_pricing_intro' ) ); ?>
				</div>
				<div class="price-toggle">
					<button class="pricing-toggle__btn pricing-toggle__btn--active" data-price="monthly">Monthly</button>
					<button class="pricing-toggle__btn" data-price="annual">Annual</button>
				</div>
			</div>

			<div class="pricing_cards">
				<div class="row g-4">
					<div class="col-md-6 col-lg-3">
						<div class="pricing_card">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( is_array( $recruitment_starter ) && isset( $recruitment_starter['package_name'] ) ? $recruitment_starter['package_name'] : 'Starter' ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( is_array( $recruitment_starter ) && isset( $recruitment_starter['package_desc'] ) ? $recruitment_starter['package_desc'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--monthly"><?= esc_html( is_array( $recruitment_starter ) && isset( $recruitment_starter['price'] ) ? $recruitment_starter['price'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--annual d-none"><?= esc_html( is_array( $recruitment_starter ) && isset( $recruitment_starter['price_annual'] ) ? $recruitment_starter['price_annual'] : '' ); ?></div>
							</div>
							<div class="pricing_card__features">
								<ul class="fa-ul">
									<?php
									if ( is_array( $recruitment_starter ) && ! empty( $recruitment_starter['features'] ) ) {
										$features = explode( "\n", $recruitment_starter['features'] );
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
								<button class="btn btn-talent--outline mb-3"><?= esc_html( is_array( $recruitment_starter ) && isset( $recruitment_starter['cta']['title'] ) ? $recruitment_starter['cta']['title'] : 'Get Started' ); ?></button>
								<a href="#recruitment-comparison">Compare plans below</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="pricing_card">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( is_array( $recruitment_growth ) && isset( $recruitment_growth['package_name'] ) ? $recruitment_growth['package_name'] : 'Growth' ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( is_array( $recruitment_growth ) && isset( $recruitment_growth['package_desc'] ) ? $recruitment_growth['package_desc'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--monthly"><?= esc_html( is_array( $recruitment_growth ) && isset( $recruitment_growth['price'] ) ? $recruitment_growth['price'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--annual d-none"><?= esc_html( is_array( $recruitment_growth ) && isset( $recruitment_growth['price_annual'] ) ? $recruitment_growth['price_annual'] : '' ); ?></div>
							</div>
							<div class="pricing_card__features">
								<?php
								if ( is_array( $recruitment_growth ) && ! empty( $recruitment_growth['features'] ) ) {
									$features      = explode( "\n", $recruitment_growth['features'] );
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
								<button class="btn btn-talent--outline mb-3"><?= esc_html( is_array( $recruitment_growth ) && isset( $recruitment_growth['cta']['title'] ) ? $recruitment_growth['cta']['title'] : 'Get Started' ); ?></button>
								<a href="#recruitment-comparison">Compare plans below</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="pricing_card pricing_card--glow">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( is_array( $recruitment_pro ) && isset( $recruitment_pro['package_name'] ) ? $recruitment_pro['package_name'] : 'Pro' ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( is_array( $recruitment_pro ) && isset( $recruitment_pro['package_desc'] ) ? $recruitment_pro['package_desc'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--monthly"><?= esc_html( is_array( $recruitment_pro ) && isset( $recruitment_pro['price'] ) ? $recruitment_pro['price'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--annual d-none"><?= esc_html( is_array( $recruitment_pro ) && isset( $recruitment_pro['price_annual'] ) ? $recruitment_pro['price_annual'] : '' ); ?></div>
							</div>
							<div class="pricing_card__features">
								<?php
								if ( is_array( $recruitment_pro ) && ! empty( $recruitment_pro['features'] ) ) {
									$features      = explode( "\n", $recruitment_pro['features'] );
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
								<button class="btn btn-talent mb-3"><?= esc_html( is_array( $recruitment_pro ) && isset( $recruitment_pro['cta']['title'] ) ? $recruitment_pro['cta']['title'] : 'Get Started' ); ?></button>
								<a href="#recruitment-comparison">Compare plans below</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="pricing_card">
							<div class="pricing_card__header">
								<h2 class="pricing_card__package"><?= esc_html( is_array( $recruitment_enterprise ) && isset( $recruitment_enterprise['package_name'] ) ? $recruitment_enterprise['package_name'] : 'Enterprise' ); ?></h2>
								<div class="pricing_card__description"><?= esc_html( is_array( $recruitment_enterprise ) && isset( $recruitment_enterprise['package_desc'] ) ? $recruitment_enterprise['package_desc'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--monthly"><?= esc_html( is_array( $recruitment_enterprise ) && isset( $recruitment_enterprise['price'] ) ? $recruitment_enterprise['price'] : '' ); ?></div>
								<div class="pricing_card__price pricing_card__price--annual d-none"><?= esc_html( is_array( $recruitment_enterprise ) && isset( $recruitment_enterprise['price_annual'] ) ? $recruitment_enterprise['price_annual'] : '' ); ?></div>
							</div>
							<div class="pricing_card__features">
								<?php
								if ( is_array( $recruitment_enterprise ) && ! empty( $recruitment_enterprise['features'] ) ) {
									$features      = explode( "\n", $recruitment_enterprise['features'] );
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
								<button class="btn btn-talent--outline mb-3"><?= esc_html( is_array( $recruitment_enterprise ) && isset( $recruitment_enterprise['cta']['title'] ) ? $recruitment_enterprise['cta']['title'] : 'Get Started' ); ?></button>
								<a href="#recruitment-comparison">Compare plans below</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container py-5" id="recruitment-comparison">
			<h2 class="text-center mb-5">Compare our plans</h2>
			<?php
			if ( have_rows( 'recruitment_comparison' ) ) {
				?>
			<table class="table comparison-table">
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>Starter</th>
						<th>Growth</th>
						<th>Pro</th>
						<th>Enterprise</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$current_group = '';
				while ( have_rows( 'recruitment_comparison' ) ) {
					the_row();
					$group = get_sub_field( 'group' );
					
					// Output group header if group has changed and is not empty
					if ( ! empty( $group ) && $group !== $current_group ) {
						$current_group = $group;
						?>
						<tr class="comparison-table__group-header">
							<td colspan="5"><strong><?= esc_html( $group ); ?></strong></td>
						</tr>
						<?php
					}
					?>
					<tr>
						<td><?= esc_html( get_sub_field( 'item' ) ); ?></td>
						<td><?= wp_kses_post( get_yn_icon( get_sub_field( 'starter' ) ) ); ?></td>
						<td><?= wp_kses_post( get_yn_icon( get_sub_field( 'growth' ) ) ); ?></td>
						<td><?= wp_kses_post( get_yn_icon( get_sub_field( 'pro' ) ) ); ?></td>
						<td><?= wp_kses_post( get_yn_icon( get_sub_field( 'enterprise' ) ) ); ?></td>
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
		<section class="has-off-white-background-color has-main-blue-color" id="recruitment_faq">
			<div class="container py-5">
				<h2 class="text-center mb-5">Frequently asked questions</h2>
				<?php
				if ( have_rows( 'recruitment_faqs' ) ) {
					// Get all FAQ items first.
					$faqs = array();
					while ( have_rows( 'recruitment_faqs' ) ) {
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
								$collapse_id = 'recruitment-faq-' . $faq_count;
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
								$collapse_id = 'recruitment-faq-' . $faq_count;
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
// Generate FAQ Schema markup combining both Call and Recruitment FAQs.
$faq_items = array();

// Add Call FAQs.
if ( have_rows( 'call_faqs' ) ) {
	while ( have_rows( 'call_faqs' ) ) {
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

// Add Recruitment FAQs.
if ( have_rows( 'recruitment_faqs' ) ) {
	while ( have_rows( 'recruitment_faqs' ) ) {
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

// Output FAQ Schema if we have FAQ items.
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
<script>
document.addEventListener('DOMContentLoaded', function() {
	const toggleBtns = document.querySelectorAll('.pricing-toggle__btn[data-tab]');
	const tabs = document.querySelectorAll('.pricing-tab');
	const priceBtns = document.querySelectorAll('.pricing-toggle__btn[data-price]');

	// Check URL parameter on page load
	function checkUrlParameter() {
		const urlParams = new URLSearchParams(window.location.search);
		const productParam = urlParams.get('p');
		
		if (productParam === 'call' || productParam === 'recruitment') {
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

	// Handle tab switching (Call / Recruitment)
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
