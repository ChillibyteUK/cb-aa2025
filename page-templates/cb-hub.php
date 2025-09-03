<?php
/**
 * Template Name: Hub
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="hub pt-5 has-background-blue-background-color" style="isolation:isolate;">
	<img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/bg-aurora.jpg' ); ?>" class="hero__background" alt="">
	<div class="container py-5">
		<div class="row mb-5">
			<div class="col-md-6 text-white">
				<h1>Educate &amp; Learn</h1>
				<div class="fs-500 mb-3">Discover a wealth of insightful materials meticulously crafted to provide you with a comprehensive understanding of the latest trends.</div>
				<div class="fs-400">Lorem ipsum dolor sit amet, consetetur sadipscin eirmod tempor invidunt ut labore et dolore magna aliquyam erat voluptua. Lorem ipsum dolor sit amet.</div>
			</div>
		</div>
		<div class="row g-3">
			<div class="col-md-8">
				<div class="has-white-background-color h-100 p-3">
					<div class="row">
						<div class="col-md-7 d-flex flex-column">
							<h3 class="mb-4">Podcasts</h3>
							<div class="fs-500 mb-3">Welcome to “Automated Analytics Podcast,” the podcast where data meets automation to transform the way businesses make decisions. </div>
							<div class="fs-400 mb-4">Join us on a journey through the fascinating world of Automated Analytics, as we explore cutting-edge technologies, industry trends, and real-world applications that are reshaping the landscape of data-driven decision-making.</div>
							<a href="/podcasts/" class="blue-arrow mt-auto">Learn more</a>
						</div>
						<div class="col-md-5">
							<img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/podcasts.jpg' ); ?>" class="hub__cover" alt="">
						</div>
					</div>

				</div>
			</div>
			<div class="col-md-4">
				<div class="has-light-blue-background-color h-100 p-3">
					<h3 class="mb-4">Latest news</h3>
					<?php
					$latest_posts = get_posts(
						array(
							'numberposts' => 3,
							'post_type'   => 'post',
							'orderby'     => 'date',
							'order'       => 'DESC',
						)
					);
					foreach ( $latest_posts as $post ) {
						setup_postdata( $post );
						// Use template tags like the_title(), the_permalink(), etc.
						?>
						<a class="hub__post" href="<?= get_permalink( $post->ID ); ?>">
							<?= get_the_post_thumbnail( $post->ID ); ?>
							<?= esc_html( get_the_title() ); ?>
						</a>
						<?php
					}
					wp_reset_postdata();
					?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="has-main-blue-background-color text-white h-100 p-3 d-flex flex-column">
					<div class="d-flex column-gap-5 justify-content-start mb-4" style="column-gap: 2rem;">
						<img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/white-paper.jpg' ); ?>" alt="" width=224 height=290>
						<img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/cop-cover.jpg' ); ?>" alt="" width=224 height=290>
					</div>
					<h3 class="mb-3">E-books</h3>
					<div class="fs-300 mb-4">Lorem ipsum dolor sit amet, consetetur sadipscin eirmod et teute labore et dolore magna aliquyam erat voluptua sum dolor sit.</div>
					<a href="/e-books/" class="green-arrow mt-auto">Learn more</a>
				</div>
			</div>
			<div class="col-md-3">
				<div class="has-light-green-background-color h-100 p-3 d-flex flex-column">
					<img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/customer-guides.jpg' ); ?>" class="hub__cover126 mb-4" alt="">
					<h3 class="mb-3">Customer guides</h3>
					<div class="fs-300 mb-4">Lorem ipsum dolor sit amet, consetetur sadipsc eirmod tempor invidunt ut labore.</div>
					<a href="/customer-guides/" class="blue-arrow mt-auto">Learn more</a>
				</div>
			</div>
			<div class="col-md-3">
				<div class="has-sky-blue-background-color h-100 p-3 d-flex flex-column">
					<img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/developer-guides.jpg' ); ?>" class="hub__cover126 mb-4" alt="">
					<h3 class="mb-3">Developer guides</h3>
					<div class="fs-300 mb-4">Lorem ipsum dolor sit amet, consetetur sadipsc eirmod tempor invidunt ut labore.</div>
					<a href="/developer-guides/" class="blue-arrow mt-auto">Learn more</a>
				</div>
			</div>
			<div class="col-md-3">
				<div class="has-dark-grey-background-color text-white h-100 p-3 d-flex flex-column">
					<h3 class="mb-4 pt-5">Case Studies</h3>
					<div class="mb-5">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat voluptua.</div>
					<a href="/case-studies/" class="green-arrow mt-auto">Learn more</a>
				</div>
			</div>
			<?php
			$latest_posts = get_posts(
				array(
					'numberposts' => 3,
					'post_type'   => 'case_study',
					'orderby'     => 'date',
					'order'       => 'DESC',
				)
			);
			foreach ( $latest_posts as $post ) {
				setup_postdata( $post );
				?>

			<div class="col-md-3">
				<a class="has-white-background-color h-100 p-3 d-flex flex-column" href="<?= get_permalink( $post->ID ); ?>">
					<?= get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'hub__cs-image mb-2' ) ); ?>
					<div class="fs-200 has-dark-grey-color"><?= esc_html( get_the_date( 'j F, Y', $post->ID ) ); ?></div>
					<div class="mb-2 fs-300 fw-700"><?= esc_html( get_the_title() ); ?></div>
					<div class="mb-4 fs-300 has-dark-grey-color"><?= esc_html( wp_trim_words( get_the_content(), 10 ) ); ?></div>
					<div class="blue-arrow mt-auto">Learn more</div>
				</a>
			</div>
				<?php
			}
			wp_reset_postdata();
			?>
		</div>
	</div>
</main>
<?php
get_footer();