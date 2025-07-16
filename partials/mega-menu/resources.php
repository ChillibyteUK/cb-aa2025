<?php
/**
 * Resources mega menu layout.
 *
 * @param array $args['menu'] The menu data from ACF.
 */

$menu = $args['menu'];
?>

<div class="mega-menu mega-menu--resources">
	<div class="mega-menu__col">
		<?php echo wp_get_attachment_image( $menu['image'], 'medium' ); ?>
		<h3><?php echo esc_html( $menu['column_1_title'] ); ?></h3>
		<p><?php echo esc_html( $menu['column_1_intro'] ); ?></p>
	</div>

	<div class="mega-menu__col">
		<?php foreach ( $menu['column_2_items'] as $item ) : ?>
			<h4><?php echo esc_html( $item['title'] ); ?></h4>
			<p><?php echo esc_html( $item['description'] ); ?></p>
		<?php endforeach; ?>
	</div>

	<div class="mega-menu__col">
		<?php foreach ( $menu['column_3_items'] as $item ) : ?>
			<h4><?php echo esc_html( $item['title'] ); ?></h4>
			<p><?php echo esc_html( $item['description'] ); ?></p>
		<?php endforeach; ?>
	</div>
</div>
