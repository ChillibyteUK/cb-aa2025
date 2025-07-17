<?php
/**
 * Integrations mega menu layout.
 *
 * @param array $args['menu'] The menu data from ACF.
 * @package cb-aa2025
 */

$integration_menu = $args['menu'];

$call360_integrations = get_posts(
	array(
		'post_type' => 'integration',
		'tax_query' => array(
			array(
				'taxonomy' => 'integration_type',
				'field'    => 'slug',
				'terms'    => $integration_menu['call360_term_slug'],
			),
		),
	)
);

$talenttrack_integrations = get_posts(
	array(
		'post_type' => 'integration',
		'tax_query' => array(
			array(
				'taxonomy' => 'integration_type',
				'field'    => 'slug',
				'terms'    => $integration_menu['talenttrack_term_slug'],
			),
		),
	)
);
?>
<div class="mega-menu mega-menu--integrations">
	<div class="mega-menu__col">
		<h3><?= esc_html( $integration_menu['column_1_title'] ); ?></h3>
		<p><?= esc_html( $integration_menu['column_1_description'] ); ?></p>
	</div>

	<div class="mega-menu__col">
		<?php
		foreach ( $call360_integrations as $call360_post ) {
			setup_postdata( $call360_post );
			?>
			<h4><?php the_title(); ?></h4>
			<?php
		}
		wp_reset_postdata();
		?>
	</div>

	<div class="mega-menu__col">
		<?php
		foreach ( $talenttrack_integrations as $talenttrack_post ) {
			setup_postdata( $talenttrack_post );
			?>
			<h4><?php the_title(); ?></h4>
			<?php
		}
		wp_reset_postdata();
		?>
	</div>
</div>
