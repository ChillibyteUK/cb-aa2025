<?php
/**
 * The template for displaying the e-book archive page.
 *
 * @package cb-aa2025
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" class="ebook-archive pt-5 has-background-blue-background-color" style="isolation:isolate;">
	<img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/bg-aurora.jpg' ); ?>" class="hero__background" alt="">

	<section class="container pt-5 mt-5 pb-5">
		<h1 class="h2 text-white pb-5">E-books</h1>

		<?php
		$first_query = new WP_Query(
			array(
				'post_type'      => 'ebook',
				'posts_per_page' => 1,
				'orderby'        => 'date',
				'order'          => 'DESC',
			)
		);

		$featured_post_id = 0;

		if ( $first_query->have_posts() ) {
			while ( $first_query->have_posts() ) {
				$first_query->the_post();
				$featured_post_id = get_the_ID();
				?>
				<div class="row has-white-background-color p-4">
					<div class="col-md-5 d-flex flex-column justify-content-between">
						<div class="pt-5 has-dark-grey-color fs-300"><?= esc_html( get_the_date( 'j F, Y' ) ); ?></div>

						<h2><?= esc_html( get_the_title() ); ?></h2>

						<?php
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

	<div class="container pb-5">
		<div class="row g-4">
			<?php
			$rest_query = new WP_Query(
				array(
					'post_type'      => 'ebook',
					'posts_per_page' => -1,
					'orderby'        => 'date',
					'order'          => 'DESC',
					'post__not_in'   => array( $featured_post_id ),
				)
			);

			if ( $rest_query->have_posts() ) {
				while ( $rest_query->have_posts() ) {
					$rest_query->the_post();
					?>
					<div class="col-md-4">
						<a href="<?php the_permalink(); ?>" class="d-flex gap-2 flex-column justify-content-start h-100 has-main-blue-background-color p-4">
							<?= get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'case_study__image' ) ); ?>

							<div class="fs-300 has-mid-grey-color"><?= esc_html( get_the_date( 'j F, Y' ) ); ?></div>

							<h3 class="fs-400 fw-700 text-white mb-2"><?= esc_html( get_the_title() ); ?></h3>

							<div class="fs-300 has-mid-grey-color mb-2">
								<?php
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

<?php
get_footer();