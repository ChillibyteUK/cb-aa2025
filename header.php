<?php
/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package cb-aa2025
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
session_start();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta
        charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, minimum-scale=1">
    <link rel="preload"
        href="<?= esc_url( get_stylesheet_directory_uri() . '/fonts/inter-v18-latin-regular.woff2' ); ?>"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?= esc_url( get_stylesheet_directory_uri() . '/fonts/inter-v18-latin-600.woff2' ); ?>"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?= esc_url( get_stylesheet_directory_uri() . '/fonts/sora-v16-latin-regular.woff2' ); ?>"
        as="font" type="font/woff2" crossorigin="anonymous">
    <?php
	if ( ! is_user_logged_in() ) {
		if ( get_field( 'ga_property', 'options' ) ) {
    		?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=<?= esc_attr( get_field( 'ga_property', 'options' ) ); ?>">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config',
            '<?= esc_js( get_field( 'ga_property', 'options' ) ); ?>'
        );
    </script>
    		<?php
		}
		if ( get_field( 'gtm_property', 'options' ) ) {
    		?>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer',
            '<?= esc_js( get_field( 'gtm_property', 'options' ) ); ?>'
        );
    </script>
    <!-- End Google Tag Manager -->
    		<?php
		}
	}
	if ( get_field( 'google_site_verification', 'options' ) ) {
		echo '<meta name="google-site-verification" content="' . esc_attr( get_field( 'google_site_verification', 'options' ) ) . '" />';
	}
	if ( get_field( 'bing_site_verification', 'options' ) ) {
		echo '<meta name="msvalidate.01" content="' . esc_attr( get_field( 'bing_site_verification', 'options' ) ) . '" />';
	}

	wp_head();
	if ( is_front_page() ) {
    	?>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "Automated Analytics",
            "url": "https://automatedanalytics.co/",
            "logo": "https://automatedanalytics.co/wp-content/themes/cb-aa2025/img/aa-logo.svg",
            "description": "---",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "---",
                "addressLocality": "---",
                "addressRegion": "---",
                "postalCode": "------",
                "addressCountry": "--"
            },
            "telephone": "+44 (-) -- --- -----",
            "email": "hello@automatedanalytics.co"
        }
    </script>
	    <?php
	}
	?>
</head>

<body <?php body_class(); ?>
    <?php understrap_body_attributes(); ?>>
    <?php
	do_action( 'wp_body_open' );
	?>
<header id="wrapperNavbar">
	<div class="container">
		<div class="prenav d-none d-md-flex align-items-center justify-content-end gap-4 pt-4">
			<a href="#"><i class="fa-solid fa-headphones"></i> Customer Support</a>
			<a href="#"><i class="fa-solid fa-globe"></i> Select Region</a>
			<a href="/about/"><i class="fa-solid fa-circle-info"></i> About us</a>
			<?= do_shortcode( '[social_icons]' ); ?>
		</div>
	</div>
	<nav class="navbar navbar-expand-md">
		<div class="container-xl pt-2 nav-top align-items-start">
			<a href="/" class="logo" aria-label="Home"></a>
			<div class="button-container d-md-none">
				<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false"
					aria-label="Toggle navigation">
					<i class="fa-solid fa-bars"></i>
				</button>
			</div>

			<div class="collapse navbar-collapse" id="navbar">
				<?php
				$menus = get_field( 'mega_menus', 'option' );

				if ( $menus ) {
					?>
					<nav class="main-nav w-100 d-flex justify-content-between">
						<ul class="nav-list nav justify-content-start">
							<?php
							// Get current page URL for active state.
							$current_url = isset( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
							
							// Ensure homepage is always represented as '/'
							if ( empty( $current_url ) || $current_url === '' ) {
								$current_url = '/';
							}

							/**
							 * Check if current page matches any links in a mega menu.
							 *
							 * @param  array  $menu_item   The menu item data.
							 * @param  string $current_url The current page URL.
							 * @return bool
							 */
							function is_menu_active( $menu_item, $current_url ) {
								$layout = $menu_item['acf_fc_layout'];
								
								// For plain menus, check direct slug match.
								if ( 'plain' === $layout ) {
									$menu_url = '/' . $menu_item['anchor_slug'] . '/';
									
									// Handle homepage case specifically.
									if ( '' === $menu_item['anchor_slug'] || 'home' === $menu_item['anchor_slug'] ) {
										$menu_url = '/';
									}
									
									return $current_url === $menu_url;
								}
								
								// For mega menus, check all sub-links.
								if ( 'product' === $layout ) {
									// Check column 2 and 3 items.
									$items_to_check = array();
									
									// Add main buttons (column 1).
									if ( ! empty( $menu_item['column_1_button_1']['url'] ) && '#' !== $menu_item['column_1_button_1']['url'] ) {
										$items_to_check[] = array( 'link' => array( 'url' => $menu_item['column_1_button_1']['url'] ) );
									}
									if ( ! empty( $menu_item['column_1_button_2']['url'] ) && '#' !== $menu_item['column_1_button_2']['url'] ) {
										$items_to_check[] = array( 'link' => array( 'url' => $menu_item['column_1_button_2']['url'] ) );
									}
									
									// Add column 2 items if they exist.
									if ( ! empty( $menu_item['column_2_items'] ) && is_array( $menu_item['column_2_items'] ) ) {
										$items_to_check = array_merge( $items_to_check, $menu_item['column_2_items'] );
									}
									
									// Add column 3 items if they exist.
									if ( ! empty( $menu_item['column_3_items'] ) && is_array( $menu_item['column_3_items'] ) ) {
										$items_to_check = array_merge( $items_to_check, $menu_item['column_3_items'] );
									}
									
									foreach ( $items_to_check as $item ) {
										if ( ! empty( $item['link']['url'] ) && '#' !== $item['link']['url'] ) {
											$item_url = wp_parse_url( $item['link']['url'], PHP_URL_PATH );
											
											// Skip if it's the homepage link in mega menu.
											if ( '/' === $item_url && '/' === $current_url ) {
												continue;
											}
											
											if ( $current_url === $item_url ) {
												return true;
											}
										}
									}
								}
								
								if ( 'resources' === $layout ) {
									// Check column 2 and 3 items.
									$items_to_check = array();
									
									// Add column 2 items if they exist.
									if ( ! empty( $menu_item['column_2_items'] ) && is_array( $menu_item['column_2_items'] ) ) {
										$items_to_check = array_merge( $items_to_check, $menu_item['column_2_items'] );
									}
									
									// Add column 3 items if they exist.
									if ( ! empty( $menu_item['column_3_items'] ) && is_array( $menu_item['column_3_items'] ) ) {
										$items_to_check = array_merge( $items_to_check, $menu_item['column_3_items'] );
									}
									
									foreach ( $items_to_check as $item ) {
										// Resources menu has different structure - link might be string or empty.
										if ( ! empty( $item['link'] ) && is_string( $item['link'] ) && '#' !== $item['link'] ) {
											$item_url = wp_parse_url( $item['link'], PHP_URL_PATH );
											
											// Skip if it's the homepage link in mega menu.
											if ( '/' === $item_url && '/' === $current_url ) {
												continue;
											}
											
											if ( $current_url === $item_url ) {
												return true;
											}
										}
									}
								}
								
								return false;
							}

							foreach ( $menus as $menu_item ) {
								$slug      = esc_attr( $menu_item['anchor_slug'] );
								$label     = esc_attr( $menu_item['menu_item'] );
								$layout    = $menu_item['acf_fc_layout'];
								$is_active = is_menu_active( $menu_item, $current_url ) ? ' active' : '';
								$cc        = 'nav--' . esc_attr( $slug );
								
								if ( 'plain' === $layout ) {
									?>
								<li class="nav-item<?= esc_attr( $is_active . ' ' . $cc ); ?>">
									<a class="nav-link" href="/<?= esc_attr( $slug ); ?>"><?= esc_html( $label ); ?></a>
								</li>
									<?php
								} else {
									?>
								<li class="nav-item<?= esc_attr( $is_active . ' ' . $cc ); ?>">
									<a class="nav-link mega-trigger"
										href="#"
										data-mega-target="mega-<?= esc_attr( $slug ); ?>">
										<?= esc_html( $label ); ?>
									</a>
								</li>
									<?php
								}
							}
							?>
						</ul>
						<div class="d-flex gap-2 justify-content-end align-items-center">
							<a href="#" class="nav-button-outline"><span class="icon-phone"></span> Customer Sales</a>
							<a href="#" class="nav-button-green">Free Trial</a>
						</div>
					</nav>
					<?php
				}
				?>
			</div>
		</div>
	</nav>

	<?php
	if ( $menus ) {
		?>
		<div class="mega-wrapper position-absolute w-100 z-3">
			<?php
			foreach ( $menus as $menu_item ) {
				$slug   = esc_attr( $menu_item['anchor_slug'] );
				$layout = $menu_item['acf_fc_layout'];
				$target = 'mega-' . $slug;
				$theme  = $menu_item['theme'] ?? 'grey';
				?>
				<div id="<?= esc_attr( $target ); ?>" class="container mx-auto collapse mega-panel mega-panel--<?= esc_attr( $theme ); ?>" data-bs-parent=".mega-wrapper">
					<div class="py-4">
						<?php get_template_part( 'partials/mega-menu/' . $layout, null, array( 'menu' => $menu_item ) ); ?>
					</div>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	}
	?>
</header>