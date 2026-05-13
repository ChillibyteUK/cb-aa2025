<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;
?>
<div id="footer-top"></div>
<footer class="footer pt-4">
    <div class="container pb-4">
        <div class="row pb-4">
            <div class="col-sm-4 mb-2">
                <a href="<?= esc_url( get_home_url() ); ?>"><img
                        src="<?= esc_url( get_stylesheet_directory_uri() . '/img/aa-logo--wo.svg' ); ?>"
                        alt="Automated Analytics" class="logo img-fluid mb-4"></a>
				<div class="footer__strap">Fuel your business growth and witness immediate results today.</div>
				<script charset="utf-8" type="text/javascript" src="//js-eu1.hsforms.net/forms/embed/v2.js"></script>
                <script>
                hbspt.forms.create({
                    portalId: "145100553",
                    formId: "d4c15350-7de6-438f-85ff-9273bca655b9",
                    region: "eu1"
                });
                </script>
                
            </div>
            <div class="col-sm-6 col-lg-2 offset-lg-2 mb-2 pt-4">

                <div class="footer__title">Solutions</div>
                <?php wp_nav_menu( array( 'theme_location' => 'footer_menu1' ) ); ?>
            </div>
            <div class="col-sm-6 col-lg-2 mb-2 pt-4">
                <div class="footer__title">More</div>
                <?php wp_nav_menu( array( 'theme_location' => 'footer_menu2' ) ); ?>
            </div>
			<div class="col-sm-6 col-lg-2 mb-2 pt-4">
				<div class="footer__title">Get in Touch</div>
                <ul>
					<li><a href="mailto:<?= esc_attr( antispambot( get_field( 'contact_email', 'options' ) ) ); ?>"><?= esc_html( antispambot( get_field( 'contact_email', 'options' ) ) ); ?></a></li>
                    <li><a href="tel:<?= esc_attr( parse_phone( get_field( 'contact_phone', 'options' ) ) ); ?>"><?= esc_html( get_field( 'contact_phone', 'options' ) ); ?></a></li>
                </ul>
            </div>

        </div>
    </div>
    <div class="colophon">
        <div class="container py-4">
            <div>&copy; <?= esc_html( gmdate( 'Y' ) ); ?> Automated Analytics LLC. All Rights Reserved.</div>
            <div class="colophon__links">
                <a href="/terms/">Terms &amp; Conditions</a> |
                <a href="/privacy-policy/">Privacy Policy</a> |
                <a href="/cookies/">Cookie Preferences</a>
            </div>
        </div>
    </div>
</footer>
<?php
wp_footer();
if ( get_field( 'gtm_property', 'options' ) ) {
    ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe
        src="https://www.googletagmanager.com/ns.html?id=<?= esc_attr( get_field( 'gtm_property', 'options' ) ); ?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<?php
} 
?>

<?php if ( $portal_id = get_field( 'hs_property', 'options' ) ) : ?>
	<script
		id="hs-script-loader"
		async
		defer
		src="<?php echo esc_url( "//js-eu1.hs-scripts.com/{$portal_id}.js" ); ?>">
	</script>
<?php endif; ?>

</body>

</html>