<?php
/**
 * The template for displaying the case study archive page
 *
 * @package cb-aa2025
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="cs-archive pt-5 has-background-blue-background-color" style="isolation:isolate;">
	<img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/bg-aurora.jpg' ); ?>" class="hero__background" alt="">
	<section class="container pt-5 mt-5 pb-5">
		<h1 class="h2 text-white pb-5">Case Studies</h1>
		<?php

		$first_query = new WP_Query(
			array(
				'post_type'      => 'case_study',
				'posts_per_page' => 1,
				'orderby '       => 'date',
				'order'          => 'DESC',
			)
		);

		$featured_post_id = 0;

		if ( $first_query->have_posts() ) {
			while ( $first_query->have_posts() ) {
				$first_query->the_post();
				$featured_post_id    = get_the_ID();
				$featured_terms      = get_the_terms( get_the_ID(), 'case_study_category' );
				$featured_term_names = array();

				if ( ! empty( $featured_terms ) && ! is_wp_error( $featured_terms ) ) {
					$featured_term_names = wp_list_pluck( $featured_terms, 'name' );
				}
				?>
		<div class="row has-white-background-color p-4">
			<div class="col-md-5 d-flex flex-column justify-content-between">
				<div class="pt-5 has-dark-grey-color fs-300"><?= get_the_date( 'j F, Y' ); ?></div>
				<?php if ( ! empty( $featured_term_names ) ) : ?>
					<div class="fs-200 has-dark-grey-color mb-2"><?= esc_html( implode( ', ', $featured_term_names ) ); ?></div>
				<?php endif; ?>
				<h2><?= esc_html( get_the_title() ); ?></h2>
				<?php
				// get first paragraph of the_content.
				$content = wp_strip_all_tags( get_the_content() );
				echo wp_kses_post( wp_trim_words( $content, 30 ) );
				?>
				<div class="d-flex align-items-center">
					<a href="<?php the_permalink(); ?>" class="blue-arrow">Learn more</a>
				</div>
			</div>
			<div class="col-md-7">
					<?= get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'img-fluid' ) ); ?>
			</div>
		</div>
				<?php
			}
		}

		wp_reset_postdata();

		?>
	</section>
	<div class="container">
		<h3 class="text-white">Categories</h3>
		<?php
		$categories = get_terms(
			array(
				'taxonomy'   => 'case_study_category',
				'hide_empty' => true,
			)
		);

		if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
			echo '<ul class="filters list-unstyled d-flex align-items-start gap-5">';
			echo '<li data-filter="all" class="active">All</li>';
			foreach ( $categories as $category ) {
				echo '<li data-filter="' . esc_attr( $category->slug ) . '">' . esc_html( $category->name ) . '</li>';
			}
			echo '</ul>';
		}
		?>
	</div>
	<div class="container pb-5">
		<div class="row g-4">
	<?php

		$exclude_id = $featured_post_id;

		$rest_query = new WP_Query(
			array(
				'post_type'      => 'case_study',
				'posts_per_page' => -1,
				'orderby'        => 'date',
				'order'          => 'DESC',
				'post__not_in'   => array( $exclude_id ),
			)
		);

		if ( $rest_query->have_posts() ) {
			while ( $rest_query->have_posts() ) {
				$rest_query->the_post();
				$post_terms = get_the_terms( get_the_ID(), 'case_study_category' );
				$term_slugs = array();
				$term_names = array();

				if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {
					$term_slugs = wp_list_pluck( $post_terms, 'slug' );
					$term_names = wp_list_pluck( $post_terms, 'name' );
				}
				?>
				<div class="col-md-4 post <?= esc_attr( implode( ' ', $term_slugs ) ); ?>" data-categories="<?= esc_attr( implode( ',', $term_slugs ) ); ?>">
					<a href="<?php the_permalink(); ?>" class="d-flex gap-2 flex-column justify-content-start h-100 has-main-blue-background-color p-4">
						<?= get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'case_study__image' ) ); ?>
						<div class="fs-300 has-mid-grey-color"><?= get_the_date( 'j F, Y' ); ?></div>
						<?php if ( ! empty( $term_names ) ) : ?>
							<div class="fs-200 has-mid-grey-color"><?= esc_html( implode( ', ', $term_names ) ); ?></div>
						<?php endif; ?>
						<h3 class="fs-400 fw-700 text-white mb-2"><?= esc_html( get_the_title() ); ?></h3>
						<div class="fs-300 has-mid-grey-color mb-2">
							<?php
							// get first paragraph of the_content.
							$content = wp_strip_all_tags( get_the_content() );
							echo wp_kses_post( wp_trim_words( $content, 30 ) );
							?>
						</div>
						<div class="green-arrow mt-auto">Learn more</div>
					</a>
				</div>
				<?php
			}
		} else {
			get_template_part( 'loop-templates/content', 'none' );
		}

		wp_reset_postdata();
		?>
		</div>
	</div>
</main>
<script>
document.addEventListener('DOMContentLoaded', function() {
	const filters = document.querySelectorAll('.filters [data-filter]');
	const posts = document.querySelectorAll('.post[data-categories]');

	if (!filters.length || !posts.length) {
		return;
	}

	filters.forEach(function(filter) {
		filter.addEventListener('click', function() {
			const filterValue = this.getAttribute('data-filter');

			filters.forEach(function(item) {
				item.classList.remove('active');
			});

			this.classList.add('active');

			posts.forEach(function(post) {
				const postCategories = (post.dataset.categories || '').split(',').filter(Boolean);
				const isVisible = 'all' === filterValue || postCategories.includes(filterValue);

				post.style.display = isVisible ? '' : 'none';
			});
		});
	});
});
</script>
<?php

get_footer();
