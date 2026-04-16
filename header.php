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
<header id="wrapperNavbar" class="fixed-top">
	<nav id="navbar" class="navbar navbar-expand-md d-block p-0 pt-2 pt-md-0" aria-labelledby="main-nav-label">
		<div class="container my-2 d-block d-md-flex">
			<div class="d-flex w-md-auto justify-content-between align-items-center px-2">
				<a href="/" class="logo" aria-label="Home"></a>
				<button class="navbar-toggler input-button" id="navToggle" data-bs-toggle="collapse" data-bs-target=".navbars" type="button" aria-label="Navigation"><i class="fa fa-navicon"></i></button>
			</div>
			<div class="d-flex flex-column-reverse flex-md-column w-100">
				<div id="topNav" class="prenav d-none d-md-flex justify-content-end px-2 px-md-0 mb-2 collapse navbar-collapse navbars">
					<a href="#"><i class="fa-solid fa-globe"></i> Select Region</a>
				</div>
				<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'primary_nav',
							'container_class' => 'pt-2 px-0 p-md-0 collapse navbar-collapse navbars',
							'container_id'    => 'primaryNav',
							'menu_class'      => 'navbar-nav justify-content-between align-items-md-end mt-2 mt-md-0 w-100 ms-md-5',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					);
				?>
			</div>
		</div>
	</nav>
</header>