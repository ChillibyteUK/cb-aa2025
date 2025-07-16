<?php
/**
 * Integrations mega menu layout.
 *
 * @param array $args['menu'] The menu data from ACF.
 */

$menu = $args['menu'];

$call360_integrations = get_posts(array(
	'post_type' => 'integration',
	'tax_query' => array(
		array(
			'taxonomy' => 'integration_type',
			'field'    => 'slug',
			'terms'    => $menu['call360_term_slug'],
		),
	),
));

$talenttrack_integrations = get_posts(array(
	'post_type' => 'integration',
	'tax_query' => array(
		array(
			'taxonomy' => 'integration_type',
			'field'    => 'slug',
			'terms'    => $menu['talenttrack_term_slug'],
		),
	),
));
?>

<div class="mega-menu mega-menu--integrations">
	<div class="mega-menu__col">
		<h3><?php echo esc_html( $menu['column_1_title'] ); ?></h3>
		<p><?php echo esc_html( $menu['column_1_description'] ); ?></p>
	</div>

	<div class="mega-menu__col">
		<?php foreach ( $call360_integrations as $post ) : setup_postdata( $post ); ?>
			<h4><?php the_title(); ?></h4>
		<?php endforeach; wp_reset_postdata(); ?>
	</div>

	<div class="mega-menu__col">
		<?php foreach ( $talenttrack_integrations as $post ) : setup_postdata( $post ); ?>
			<h4><?php the_title(); ?></h4>
		<?php endforeach; wp_reset_postdata(); ?>
	</div>
</div>
