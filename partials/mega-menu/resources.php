<?php
/**
 * Resources mega menu layout.
 *
 * @param array $args['menu'] The menu data from ACF.
 * @package cb-aa2025
 */

$menu_data = $args['menu'];
?>

<div class="mega-menu mega-menu--resources">
	<div class="mega-menu__col">
		<?= wp_get_attachment_image( $menu_data['image'], 'medium' ); ?>
		<h3><?= esc_html( $menu_data['column_1_title'] ); ?></h3>
		<p><?= esc_html( $menu_data['column_1_intro'] ); ?></p>
	</div>

	<div class="mega-menu__col">
		<?php
		foreach ( $menu_data['column_2_items'] as $item ) {
			?>
			<h4><?= esc_html( $item['title'] ); ?></h4>
			<p><?= esc_html( $item['description'] ); ?></p>
			<?php
		}
		?>
	</div>

	<div class="mega-menu__col">
		<?php
		foreach ( $menu_data['column_3_items'] as $item ) {
			?>
			<h4><?= esc_html( $item['title'] ); ?></h4>
			<p><?= esc_html( $item['description'] ); ?></p>
			<?php
		}
		?>
	</div>
</div>
