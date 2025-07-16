<?php
/**
 * Scroll Snap Block Template
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="cb_scroll_snap">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2><?= esc_html( get_field( 'title' ) ); ?></h2>
			</div>
		</div>
	</div>
	<div class="container cb_scroll_snap__content">
		<div class="row g-5">
			<div class="col-md-6 left-column">
				<?php
				$i       = 1;
				$img_one = '';
				while ( have_rows( 'sections' ) ) {
					the_row();
					$theme = get_sub_field( 'theme' );
					?>
				<section class="cb_scroll_snap--<?= esc_attr( $theme ); ?>" id="section<?= esc_attr( $i ); ?>">
					<h3><?= esc_html( get_sub_field( 'title' ) ); ?></h3>
					<p><?= wp_kses_post( get_sub_field( 'content' ) ); ?></p>
					<div class="cb_scroll_snap__buttons">
						<?php
						if ( get_sub_field( 'trial_link' ) ) {
							$trial_link = get_sub_field( 'trial_link' );
							?>
						<a href="<?= esc_url( $trial_link['url'] ); ?>" class="button-green button-green--arrow" target="<?= esc_attr( $trial_link['target'] ); ?>">
							<?= esc_html( $trial_link['title'] ); ?>
						</a>
							<?php
						}
						if ( get_sub_field( 'more_link' ) ) {
							$more_link = get_sub_field( 'more_link' );
							?>
						<a href="<?= esc_url( $more_link['url'] ); ?>" class="btn btn-green-no--arrow" target="<?= esc_attr( $more_link['target'] ); ?>">
							<?= esc_html( $more_link['title'] ); ?>
						</a>
							<?php
						}
						?>
					</div>
				</section>
					<?php
					if ( 1 === $i ) {
						$img_one = get_sub_field( 'image' );
					}
					++$i;
				}
				?>
			</div>
			<div class="col-md-6 right-column">
				<div id="sticky-content">
					<?=
					wp_get_attachment_image(
						$img_one,
						'full',
						false,
						array(
							'data-aos' => 'fade-up',
						)
					);
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
const sections = document.querySelectorAll('.left-column section');
const stickyContent = document.getElementById('sticky-content');

<?php
$content_map = array();
$i           = 1;
while ( have_rows( 'sections' ) ) {
    the_row();
    $img                          = get_sub_field( 'image' );
    $content_map[ "section{$i}" ] = wp_get_attachment_image(
        $img,
        'full',
        false,
        array(
            'data-aos'          => 'fade-up',
            'data-aos-duration' => '300',
        )
    );
    ++$i;
}
?>
const contentMap = <?= wp_json_encode( $content_map ); ?>;

const observer = new IntersectionObserver((entries) => {
	entries.forEach(entry => {
    	if (entry.isIntersecting) {
      		stickyContent.innerHTML = contentMap[entry.target.id];
    	}
	});
}, { threshold: 0.5 });

sections.forEach(section => observer.observe(section));
</script>