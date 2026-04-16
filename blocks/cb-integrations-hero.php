<?php
/**
 * Block template for CB Integrations Hero.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

?>

<section class="integrations-hero">
	<canvas id="nokey" width="1200" height="420">
        Your browser doesn't support the canvas element
    </canvas>
	<div class="container">
		<div class="integrations-hero__content">
			<?php
			if ( get_field( 'title' ) ) {
				?>
				<h1 class="integrations-hero__title"><?= esc_html( get_field( 'title' ) ); ?></h1>
				<?php
			}
			?>
		</div>
	</div>
</section>
<?php
add_action(
	'wp_footer',
	function() {
		?>
<script src="<?= esc_url( get_stylesheet_directory_uri() . '/js/particles.js' ); ?>"></script>
		<?php
	},
	100
);