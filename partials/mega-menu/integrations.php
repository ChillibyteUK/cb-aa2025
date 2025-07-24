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
	<div class="mega-menu__col integrations-col1 py-4 px-3">
		<h3><?= esc_html( $integration_menu['column_1_title'] ); ?></h3>
		<p><?= esc_html( $integration_menu['column_1_description'] ); ?></p>
	</div>

	<div class="mega-menu__col integrations-col2 my-4 px-3 <?php echo ( $integration_menu['column_2_term'] && 'call360' === $integration_menu['column_2_term']->slug ) ? 'has-call360-blue-color' : ( ( $integration_menu['column_2_term'] && 'talenttrack' === $integration_menu['column_2_term']->slug ) ? 'has-talenttrack-pink-color' : '' ); ?>">
		<?php
		if ( $integration_menu['column_2_term'] && is_object( $integration_menu['column_2_term'] ) ) {
			echo '<div class="h5">' . esc_html( $integration_menu['column_2_term']->name ) . ' integrations</div>';

			// select 10 integration posts having the product term slug and display the featured image and title.
			$column_2_integrations = get_posts(
				array(
					'post_type'   => 'integration',
					'tax_query'   => array(
						array(
							'taxonomy' => 'product',
							'field'    => 'slug',
							'terms'    => $integration_menu['column_2_term']->slug,
						),
					),
					'numberposts' => 10,
				)
			);
			if ( $column_2_integrations ) {
				echo '<div class="integration-list">';
				foreach ( $column_2_integrations as $integration_post ) {
					setup_postdata( $integration_post );
					?>
					<div class="integration-list-item">
						<?php if ( has_post_thumbnail( $integration_post->ID ) ) : ?>
							<div class="integration-image">
								<a href="<?php echo esc_url( get_permalink( $integration_post->ID ) ); ?>">
									<?php echo get_the_post_thumbnail( $integration_post->ID, 'thumbnail' ); ?>
								</a>
							</div>
						<?php endif; ?>
						<div class="integration-title">
							<a href="<?php echo esc_url( get_permalink( $integration_post->ID ) ); ?>">
								<?php echo esc_html( get_the_title( $integration_post->ID ) ); ?>
							</a>
						</div>
					</div>
					<?php
				}
				echo '</div>';
				wp_reset_postdata();

				echo '<a class="has-arrow" href="/integrations/?p=' . esc_attr( $integration_menu['column_2_term']->slug ) . '">See all integrations</a>';
			}
		}
		?>
	</div>

	<div class="mega-menu__col integrations-col3 my-4 px-3 <?php echo ( $integration_menu['column_3_term'] && 'call360' === $integration_menu['column_3_term']->slug ) ? 'has-call360-blue-color' : ( ( $integration_menu['column_3_term'] && 'talenttrack' === $integration_menu['column_3_term']->slug ) ? 'has-talenttrack-pink-color' : '' ); ?>">
		<?php
		if ( $integration_menu['column_3_term'] && is_object( $integration_menu['column_3_term'] ) ) {
			echo '<div class="h5">' . esc_html( $integration_menu['column_3_term']->name ) . ' integrations</div>';

			// select 10 integration posts having the product term slug and display the featured image and title.
			$column_3_integrations = get_posts(
				array(
					'post_type' => 'integration',
					'tax_query' => array(
						array(
							'taxonomy' => 'product',
							'field'    => 'slug',
							'terms'    => $integration_menu['column_3_term']->slug,
						),
					),
					'numberposts' => 10,
				)
			);
			if ( $column_3_integrations ) {
				echo '<div class="integration-list">';
				foreach ( $column_3_integrations as $integration_post ) {
					setup_postdata( $integration_post );
					?>
					<div class="integration-list-item">
						<?php if ( has_post_thumbnail( $integration_post->ID ) ) : ?>
							<div class="integration-image">
								<a href="<?php echo esc_url( get_permalink( $integration_post->ID ) ); ?>">
									<?php echo get_the_post_thumbnail( $integration_post->ID, 'thumbnail' ); ?>
								</a>
							</div>
						<?php endif; ?>
						<div class="integration-title">
							<a href="<?php echo esc_url( get_permalink( $integration_post->ID ) ); ?>">
								<?php echo esc_html( get_the_title( $integration_post->ID ) ); ?>
							</a>
						</div>
					</div>
					<?php
				}
				echo '</div>';
				wp_reset_postdata();

				echo '<a class="has-arrow" href="/integrations/?p=' . esc_attr( $integration_menu['column_3_term']->slug ) . '">See all integrations</a>';
			}
		}
		?>
	</div>
</div>
