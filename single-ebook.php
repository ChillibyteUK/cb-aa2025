<?php
/**
 * Template for displaying single ebooks.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" class="single_ebook has-background-blue-background-color">

	<div class="container-xl py-5">

		<div class="row align-items-center g-5 mb-5">

			<!-- TITLE -->
			<div class="col-12 col-md-8">
				<h1 class="single_ebook__title">
					<?php echo esc_html( get_the_title() ); ?>
				</h1>
			</div>

			<!-- FEATURED IMAGE -->
			<div class="col-12 col-md-4 text-md-end text-center">

				<?php if ( has_post_thumbnail() ) : ?>

					<?php
					echo get_the_post_thumbnail(
						get_the_ID(),
						'medium_large',
						array(
							'class'   => 'single_ebook__cover-image img-fluid',
							'alt'     => esc_attr( get_the_title() ),
							'loading' => 'eager',
						)
					);
					?>

				<?php endif; ?>

			</div>

		</div>

		<div class="row">

			<div class="col-12 col-lg-12 mx-auto single_ebook__content">

				<?php the_content(); ?>

			</div>

		</div>

	</div>

</main>

<?php
get_footer();