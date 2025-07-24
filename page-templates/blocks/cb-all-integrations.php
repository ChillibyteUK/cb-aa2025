<?php
/**
 * Block template for CB All Integrations.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

// Check for product filter parameter.
// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- This is a display filter, not a form submission.
$initial_product_filter = isset( $_GET['p'] ) ? sanitize_text_field( wp_unslash( $_GET['p'] ) ) : 'all';

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
							<button class="btn btn-product <?= 'all' === $initial_product_filter ? 'active' : ''; ?>" data-product="all">All</button>
							<?php if ( ! empty( $product_terms ) && ! is_wp_error( $product_terms ) ) : ?>
								<?php foreach ( $product_terms as $product_term ) : ?>
									<button class="btn btn-<?= esc_attr( $product_term->slug ); ?> <?= $product_term->slug === $initial_product_filter ? 'active' : ''; ?>" data-product="<?= esc_attr( $product_term->slug ); ?>"><?= esc_html( $product_term->name ); ?></button>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>

					<!-- Categories Filter -->
					<?php if ( ! empty( $integration_type_terms ) && ! is_wp_error( $integration_type_terms ) ) : ?>
					<div class="filter-section">
						<h3>Categories</h3>
						<ul class="category-filters">
							<li><button class="category-filter active" data-category="" data-count="<?= count( $integrations_query->posts ); ?>">All Categories <span class="count">(<?= count( $integrations_query->posts ); ?>)</span></button></li>
							<?php foreach ( $integration_type_terms as $integration_term ) : ?>
								<li><button class="category-filter" data-category="<?= esc_attr( $integration_term->slug ); ?>" data-count="<?= esc_attr( $integration_term->count ); ?>"><?= esc_html( $integration_term->name ); ?> <span class="count">(<?= esc_html( $integration_term->count ); ?>)</span></button></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>
				</div>
			</div>

			<!-- Main Content -->
			<div class="col-lg-9">
				<div class="results-info d-flex flex-wrap gap-3 align-items-center mb-3">
					<!-- Results Info -->
					<div class="">
						<span id="results-count">Showing <?= count( $integrations_query->posts ); ?> integrations</span>
						<span id="active-filters" style="display: none;"></span>
					</div>
					<!-- Clear Filters -->
					<div class="pe-auto" role="button" id="clear-filters" style="display: none;">
						<i class="fas fa-times"></i> Clear All Filters
					</div>
				</div>

				<div class="integrations-grid" id="integrations-container">
					<?php
					if ( $integrations_query->have_posts() ) :
						while ( $integrations_query->have_posts() ) :
							$integrations_query->the_post();

							// Get taxonomy terms for filtering.
							$product_terms_list          = wp_get_post_terms( get_the_ID(), 'product', array( 'fields' => 'slugs' ) );
							$integration_type_terms_list = wp_get_post_terms( get_the_ID(), 'integration_types', array( 'fields' => 'slugs' ) );
							?>
							<a class="integration-item"
								href="<?= esc_url( get_permalink() ); ?>" 
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
							</a>
							<?php
						endwhile;
					else :
						echo '<p class="no-integrations">No integrations found.</p>';
					endif;

					wp_reset_postdata();
					?>
				</div>

				<!-- Empty State -->
				<div class="empty-state" id="empty-state" style="display: none;">
					<div class="text-center py-5">
						<i class="fas fa-search fa-3x text-muted mb-3"></i>
						<h4>No integrations found</h4>
						<p class="text-muted mb-3">Try adjusting your search or filters to find what you're looking for.</p>
						<button class="btn btn-primary" id="clear-filters-empty">Clear All Filters</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
	const searchInput = document.getElementById('integration-search');
	const productFilters = document.querySelectorAll('.product-filters [data-product]');
	const categoryFilters = document.querySelectorAll('.category-filters [data-category]');
	const integrationItems = document.querySelectorAll('.integration-item');
	const clearFiltersBtn = document.getElementById('clear-filters');
	const clearFiltersEmptyBtn = document.getElementById('clear-filters-empty');
	const emptyState = document.getElementById('empty-state');
	const integrationGrid = document.querySelector('.integrations-grid');
	const resultsCount = document.getElementById('results-count');
	
	let currentProduct = '<?= esc_js( $initial_product_filter ); ?>';
	let currentCategory = '';
	let currentSearch = '';

	// If we have an initial product filter, mark filters as changed and apply filtering
	let hasFiltersChanged = '<?= esc_js( $initial_product_filter ); ?>' !== 'all';

	// Search functionality
	searchInput.addEventListener('input', function() {
		currentSearch = this.value.toLowerCase();
		hasFiltersChanged = true;
		filterIntegrations();
	});

	// Product filter functionality
	productFilters.forEach(filter => {
		filter.addEventListener('click', function(e) {
			e.preventDefault(); // Prevent any default behavior
			
			// Update active state
			productFilters.forEach(f => f.classList.remove('active'));
			this.classList.add('active');
			
			currentProduct = this.getAttribute('data-product');
			hasFiltersChanged = true;
			filterIntegrations();
		});
	});

	// Category filter functionality  
	categoryFilters.forEach(filter => {
		filter.addEventListener('click', function(e) {
			e.preventDefault(); // Prevent any default behavior
			
			// Update active state
			categoryFilters.forEach(f => f.classList.remove('active'));
			this.classList.add('active');
			
			currentCategory = this.getAttribute('data-category');
			hasFiltersChanged = true;
			filterIntegrations();
		});
	});

	// Clear filters functionality
	function clearAllFilters() {
		currentProduct = 'all';
		currentCategory = '';
		currentSearch = '';
		
		// Reset search input
		searchInput.value = '';
		
		// Reset product filters
		productFilters.forEach(f => f.classList.remove('active'));
		document.querySelector('[data-product="all"]').classList.add('active');
		
		// Reset category filters
		categoryFilters.forEach(f => f.classList.remove('active'));
		document.querySelector('[data-category=""]').classList.add('active');
		
		// Remove URL parameters and reload to restore original state
		const url = new URL(window.location);
		url.searchParams.delete('p');
		window.location.href = url.toString();
	}

	clearFiltersBtn.addEventListener('click', clearAllFilters);
	clearFiltersEmptyBtn.addEventListener('click', clearAllFilters);

	function updateResultCounts() {
		// Only update counts if filters have actually been applied
		if (!hasFiltersChanged) {
			return;
		}
		
		const integration_type_terms = 
		<?php
		if ( ! empty( $integration_type_terms ) && ! is_wp_error( $integration_type_terms ) ) :
			echo wp_json_encode(
				array_map(
					function ( $term ) {
						return array(
							'slug' => $term->slug,
							'name' => $term->name,
						);
					},
					$integration_type_terms
				)
			);
		else :
			echo '[]';
		endif;
		?>
		;
		
		// Count items that would be visible for each category filter
		const categoryCounts = {};
		
		// Initialize counts
		categoryCounts[''] = 0; // All categories
		if (integration_type_terms && Array.isArray(integration_type_terms)) {
			integration_type_terms.forEach(term => {
				categoryCounts[term.slug] = 0;
			});
		}
		
		// For each item, check if it matches current product and search filters (ignoring category filter)
		integrationItems.forEach(item => {
			const title = item.getAttribute('data-title') || '';
			const productAttr = item.getAttribute('data-product') || '';
			const categoryAttr = item.getAttribute('data-category') || '';
			
			// Split and clean the attributes
			const products = productAttr.split(',').map(p => p.trim()).filter(p => p !== '');
			const categories = categoryAttr.split(',').map(c => c.trim()).filter(c => c !== '');
			
			// Check if item matches current product and search filters (but ignore category filter for counting)
			let matchesProductAndSearch = true;
			
			// Search filter
			if (currentSearch && currentSearch.trim() !== '' && !title.includes(currentSearch)) {
				matchesProductAndSearch = false;
			}
			
			// Product filter
			if (currentProduct !== 'all' && !products.includes(currentProduct)) {
				matchesProductAndSearch = false;
			}
			
			// If this item matches current product and search, count it for relevant categories
			if (matchesProductAndSearch) {
				// Count for "All Categories"
				categoryCounts['']++;
				
				// Count for each specific category this item belongs to
				categories.forEach(category => {
					if (category && category in categoryCounts) {
						categoryCounts[category]++;
					}
				});
			}
		});
		
		console.log('Category counts after filtering:', categoryCounts);
		
		// Update category filter counts
		categoryFilters.forEach(filter => {
			const category = filter.getAttribute('data-category') || '';
			const countSpan = filter.querySelector('.count');
			if (countSpan) {
				const count = category in categoryCounts ? categoryCounts[category] : 0;
				countSpan.textContent = `(${count})`;
			}
		});
		
		return categoryCounts;
	}

	function filterIntegrations() {
		let visibleCount = 0;
		
		integrationItems.forEach(item => {
			const title = item.getAttribute('data-title') || '';
			const productAttr = item.getAttribute('data-product') || '';
			const categoryAttr = item.getAttribute('data-category') || '';
			
			// Split and clean the attributes
			const products = productAttr.split(',').map(p => p.trim()).filter(p => p !== '');
			const categories = categoryAttr.split(',').map(c => c.trim()).filter(c => c !== '');
			
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
				visibleCount++;
			} else {
				item.classList.add('hidden');
			}
		});
		
		// Update result counts BEFORE we update visibility, so counts reflect available options
		updateResultCounts();
		
		// Update the main results count based on what's actually visible
		if (resultsCount) {
			resultsCount.textContent = `Showing ${visibleCount} integration${visibleCount !== 1 ? 's' : ''}`;
		}
		
		// Show/hide clear filters button
		const hasActiveFilters = currentProduct !== 'all' || currentCategory !== '' || currentSearch !== '';
		clearFiltersBtn.style.display = hasActiveFilters ? 'block' : 'none';
		
		// Show/hide empty state
		if (visibleCount === 0) {
			integrationGrid.style.display = 'none';
			emptyState.style.display = 'block';
		} else {
			integrationGrid.style.display = 'grid';
			emptyState.style.display = 'none';
		}
	}
	
	// Don't initialize counts on page load - preserve server-rendered counts
	// Only update when filters are actually applied
	
	// If we have an initial product filter from URL parameter, apply filtering
	if (currentProduct !== 'all') {
		filterIntegrations();
	}
});
</script>