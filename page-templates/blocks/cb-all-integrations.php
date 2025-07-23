<?php
/**
 * Block template for CB All Integrations.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

// Get all integration posts for initial load.
$integrations_query = new WP_Query(
	array(
		'post_type'      => 'integration',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'        => 'title',
		'order'          => 'ASC',
	)
);

// Get taxonomy terms.
$product_terms = get_terms(
	array(
		'taxonomy'   => 'product',
		'hide_empty' => true,
	)
);

$integration_type_terms = get_terms(
	array(
		'taxonomy'   => 'integration_types',
		'hide_empty' => true,
	)
);
?>

<div class="cb-all-integrations">
	<!-- Search Bar -->
	<div class="integrations-search-bar">
		<div class="container">
			<div class="search-wrapper">
				<input type="text" id="integration-search" placeholder="Search integrations" class="form-control">
				<i class="fas fa-search search-icon"></i>
			</div>
		</div>
	</div>

	<div class="container py-5">
		<div class="row">
			<!-- Left Sidebar -->
			<div class="col-lg-3">
				<div class="integrations-sidebar">
					<!-- Product Filter -->
					<div class="filter-section">
						<div class="product-filters">
							<button class="btn btn-product active" data-product="all">All</button>
							<?php if ( ! empty( $product_terms ) && ! is_wp_error( $product_terms ) ) : ?>
								<?php foreach ( $product_terms as $product_term ) : ?>
									<button class="btn btn-<?= esc_attr( $product_term->slug ); ?>" data-product="<?= esc_attr( $product_term->slug ); ?>"><?= esc_html( $product_term->name ); ?></button>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>

					<!-- Categories Filter -->
					<?php if ( ! empty( $integration_type_terms ) && ! is_wp_error( $integration_type_terms ) ) : ?>
					<div class="filter-section">
						<h3>Categories</h2>
						<ul class="category-filters">
							<li><button class="category-filter active" data-category="">All Categories</button></li>
							<?php foreach ( $integration_type_terms as $integration_term ) : ?>
								<li><button class="category-filter" data-category="<?= esc_attr( $integration_term->slug ); ?>"><?= esc_html( $integration_term->name ); ?></button></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>
				</div>
			</div>

			<!-- Main Content -->
			<div class="col-lg-9">
				<div class="integrations-grid" id="integrations-container">
					<?php
					if ( $integrations_query->have_posts() ) :
						while ( $integrations_query->have_posts() ) :
							$integrations_query->the_post();

							// Get taxonomy terms for filtering.
							$product_terms_list          = wp_get_post_terms( get_the_ID(), 'product', array( 'fields' => 'slugs' ) );
							$integration_type_terms_list = wp_get_post_terms( get_the_ID(), 'integration_types', array( 'fields' => 'slugs' ) );
							?>
							<div class="integration-item" 
								data-title="<?= esc_attr( strtolower( get_the_title() ) ); ?>"
								data-product="<?= esc_attr( implode( ',', $product_terms_list ) ); ?>"
								data-category="<?= esc_attr( implode( ',', $integration_type_terms_list ) ); ?>">
								<?php
								if ( has_post_thumbnail() ) {
									?>
									<div class="integration-logo">
										<?php the_post_thumbnail( 'medium', array( 'alt' => get_the_title() . ' integration' ) ); ?>
									</div>
									<?php
								} else {
									?>
									<div class="integration-logo placeholder">
										<span><?= esc_html( substr( get_the_title(), 0, 2 ) ); ?></span>
									</div>
									<?php
								}
								?>
							</div>
							<?php
						endwhile;
					else :
						echo '<p class="no-integrations">No integrations found.</p>';
					endif;

					wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
	const searchInput = document.getElementById('integration-search');
	const productFilters = document.querySelectorAll('[data-product]');
	const categoryFilters = document.querySelectorAll('[data-category]');
	const integrationItems = document.querySelectorAll('.integration-item');
	
	let currentProduct = 'all';
	let currentCategory = '';
	let currentSearch = '';

	// Search functionality
	searchInput.addEventListener('input', function() {
		currentSearch = this.value.toLowerCase();
		filterIntegrations();
	});

	// Product filter functionality
	productFilters.forEach(filter => {
		filter.addEventListener('click', function() {
			// Update active state
			productFilters.forEach(f => f.classList.remove('active'));
			this.classList.add('active');
			
			currentProduct = this.getAttribute('data-product');
			filterIntegrations();
		});
	});

	// Category filter functionality  
	categoryFilters.forEach(filter => {
		filter.addEventListener('click', function() {
			// Update active state
			categoryFilters.forEach(f => f.classList.remove('active'));
			this.classList.add('active');
			
			currentCategory = this.getAttribute('data-category');
			filterIntegrations();
		});
	});

	function filterIntegrations() {
		integrationItems.forEach(item => {
			const title = item.getAttribute('data-title');
			const products = item.getAttribute('data-product').split(',');
			const categories = item.getAttribute('data-category').split(',');
			
			let showItem = true;
			
			// Search filter
			if (currentSearch && !title.includes(currentSearch)) {
				showItem = false;
			}
			
			// Product filter
			if (currentProduct !== 'all' && !products.includes(currentProduct)) {
				showItem = false;
			}
			
			// Category filter
			if (currentCategory && !categories.includes(currentCategory)) {
				showItem = false;
			}
			
			if (showItem) {
				item.classList.remove('hidden');
			} else {
				item.classList.add('hidden');
			}
		});
	}
});
</script>