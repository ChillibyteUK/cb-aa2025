<?php
/**
 * Block template for CB Hero.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

$bgalign = strtolower( get_field( 'background_alignment' ) );
$bgalign = $bgalign ? $bgalign : 'bottom';

$txtalign = strtolower( get_field( 'align' ) );

?>
<section class="hero">
	<?= wp_get_attachment_image( get_field( 'background' ), 'full', false, array( 'class' => 'hero__background hero__background--' . $bgalign ) ); ?>
	<div class="container">
		<div class="hero__content <?= esc_attr( $txtalign ); ?>">
			<?php
			if ( get_field( 'title' ) ) {
				?>
				<h1 class="hero__title"><?= esc_html( get_field( 'title' ) ); ?></h1>
				<?php
			}
			if ( get_field( 'subtitle' ) ) {
				?>
				<p class="hero__subtitle"><?= esc_html( get_field( 'subtitle' ) ); ?></p>
				<?php
			}
			?>
		</div>
		<?php
		$modules = get_field( 'modules' );
		if ( $modules && is_array( $modules ) && count( $modules ) > 0 ) {
			foreach ( $modules as $module ) {
				$layout = $module['acf_fc_layout'];
				if ( 'icons' === $layout ) {
					get_template_part( 'partials/hero/module-icons', null, array( 'module' => $module ) );
				}
				if ( 'image' === $layout ) {
					get_template_part( 'partials/hero/module-image', null, array( 'module' => $module ) );
				}
			}
		}
		?>
	</div>
</section>