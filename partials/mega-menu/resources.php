<?php
/**
 * Resources mega menu layout.
 *
 * @param array $args['menu'] The menu data from ACF.
 * @package cb-aa2025
 */

$menu_data = $args['menu'];
?>
<div class="mega-menu mega-menu--resources ">
	<div class="mega-menu__col resources-col1 py-4 px-3">
		<?php
		// get latest case study.
		$latest_case_study = get_posts(
			array(
				'post_type'      => 'case_study',
				'posts_per_page' => 1,
				'orderby'        => 'date',
				'order'          => 'DESC',
			)
		);

		if ( $latest_case_study ) {
			echo wp_get_attachment_image( get_post_thumbnail_id( $latest_case_study[0]->ID ), 'medium' );
			$case_title = get_the_title( $latest_case_study[0]->ID );
			// Replace non-breaking spaces with regular spaces to allow proper text wrapping.
			$case_title = str_replace( "\xC2\xA0", ' ', $case_title ); // Remove UTF-8 non-breaking spaces.
			$case_title = str_replace( '&nbsp;', ' ', $case_title ); // Remove HTML entity non-breaking spaces.
			echo '<div class="h5">' . esc_html( $case_title ) . '</div>';
		}
		?>
	</div>

	<div class="mega-menu__col resources-col2 my-4 px-3">
		<?php
		foreach ( $menu_data['column_2_items'] as $item ) {
			$menu_link = '';
			if ( isset( $item['link'] ) && is_array( $item['link'] ) && ! empty( $item['link']['url'] ) ) {
				$menu_link = $item['link']['url'];
			}
			?>
		<a href="<?= esc_url( $menu_link ); ?>" class="mega-menu__link">
			<div class="h4"><?= esc_html( $item['title'] ); ?></div>
			<p class="small"><?= esc_html( $item['description'] ); ?></p>
		</a>
			<?php
		}
		?>
	</div>

	<div class="mega-menu__col resources-col3 my-4 px-3">
		<?php
		foreach ( $menu_data['column_3_items'] as $item ) {
			$menu_link = '';
			if ( isset( $item['link'] ) && is_array( $item['link'] ) && ! empty( $item['link']['url'] ) ) {
				$menu_link = $item['link']['url'];
			}
			?>
		<a href="<?= esc_url( $menu_link ); ?>" class="mega-menu__link">
			<h4><?= esc_html( $item['title'] ); ?></h4>
			<p><?= esc_html( $item['description'] ); ?></p>
		</a>
			<?php
		}
		?>
	</div>
</div>
