<?php
/**
 * Product mega menu layout.
 *
 * @param array $args['menu'] The menu data from ACF.
 * @package cb-aa2025
 */

$menu_data = $args['menu'];
$menu_id   = esc_attr( $menu_data['anchor_slug'] );
?>
<div class="py-4 px-3">
	<div class="mega-menu mega-menu--<?= esc_attr( $menu_id ); ?>">
		<div class="mega-menu__col">
			<div class="mega-menu__title"><?= esc_html( $menu_data['column_1_title'] ); ?></div>
			<p><?= esc_html( $menu_data['column_1_description'] ); ?></p>
			<div class="button-group">
				<?php
				if ( $menu_data['column_1_button_1'] ) {
					?>
					<a href="<?= esc_url( $menu_data['column_1_button_1']['url'] ); ?>" class="btn btn-outline">
						<?= esc_html( $menu_data['column_1_button_1']['title'] ); ?>
					</a>
					<?php
				}
				if ( $menu_data['column_1_button_2'] ) {
					?>
					<a href="<?= esc_url( $menu_data['column_1_button_2']['url'] ); ?>" class="btn btn-primary">
						<?= esc_html( $menu_data['column_1_button_2']['title'] ); ?>
					</a>
					<?php
				}
				?>
			</div>
		</div>

		<!-- Desktop layout -->
		<div class="mega-menu__col d-none d-md-block">
			<?php
			foreach ( $menu_data['column_2_items'] as $item ) {
				?>
			<a href="<?= esc_url( $item['link']['url'] ); ?>" class="mega-menu__link">
				<div class="h6"><?= esc_html( $item['title'] ); ?></div>
				<p class="small"><?= esc_html( $item['description'] ); ?></p>
			</a>
				<?php
			}
			?>
		</div>
		<div class="mega-menu__col d-none d-md-block">
			<?php
			foreach ( $menu_data['column_3_items'] as $item ) {
				?>
			<a href="<?= esc_url( $item['link']['url'] ); ?>" class="mega-menu__link">
				<div class="h6"><?= esc_html( $item['title'] ); ?></div>
				<p class="small"><?= esc_html( $item['description'] ); ?></p>
			</a>
				<?php
			}
			?>
		</div>

		<!-- Mobile accordion -->
		<div class="accordion d-block d-md-none w-100" id="accordion-<?= esc_attr( $menu_id ); ?>">
			<div class="accordion-item">
				<h2 class="accordion-header" id="heading-<?= esc_attr( $menu_id ); ?>-1">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= esc_attr( $menu_id ); ?>-1" aria-expanded="false" aria-controls="collapse-<?= esc_attr( $menu_id ); ?>-1">
						<?= esc_html( $menu_data['column_2_heading'] ?? 'More Options' ); ?>
					</button>
				</h2>
				<div id="collapse-<?= esc_attr( $menu_id ); ?>-1" class="accordion-collapse collapse" aria-labelledby="heading-<?= esc_attr( $menu_id ); ?>-1" data-bs-parent="#accordion-<?= esc_attr( $menu_id ); ?>">
					<div class="accordion-body">
						<?php
						foreach ( $menu_data['column_2_items'] as $item ) {
							?>
							<h4 class="h6"><?= esc_html( $item['title'] ); ?></h4>
							<p class="small"><?= esc_html( $item['description'] ); ?></p>
							<?php
						}
						?>
						<?php
						foreach ( $menu_data['column_3_items'] as $item ) {
							?>
							<h4 class="h6"><?= esc_html( $item['title'] ); ?></h4>
							<p class="small"><?= esc_html( $item['description'] ); ?></p>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
