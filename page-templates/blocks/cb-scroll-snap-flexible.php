<?php
/**
 * Block template for CB Scroll Snap Flexible.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

$colour = get_field( 'colour' ) ? strtolower( get_field( 'colour' ) ) : 'white';
$width  = get_field( 'width' ) ? strtolower( get_field( 'width' ) ) : 'constrained';

if ( 'white' === $colour ) {
	$colour = 'has-white-color';
} elseif ( 'blue' === $colour ) {
	$colour = 'has-call360-blue-color';
} elseif ( 'pink' === $colour ) {
	$colour = 'has-talent-pink-color';
}

if ( 'constrained' === $width ) {
	$width = 'cb_scroll_snap--constrained';
} elseif ( 'full' === $width ) {
	$width = 'cb_scroll_snap--full';
}

?>
<section class="cb_scroll_snap">
	<div class="container">
	<h2 class="<?= esc_attr( $colour . ' ' . $width ); ?>"><?= esc_html( get_field( 'title' ) ); ?></h2>
	</div>
	<div class="container cb_scroll_snap__content">
		<?php
		$i                    = 1;
		$img_one              = '';
		$scroll_snap_sections = array();
		$has_scroll_sections  = false;

		// First pass: check if we have scroll snap sections and group them.
		while ( have_rows( 'sections' ) ) {
			the_row();
			$layout = get_row_layout();
			if ( 'default_section' === $layout || 'alternate_section' === $layout ) {
				$has_scroll_sections = true;
				break;
			}
		}

		// Reset the loop.
		reset_rows();

		if ( $has_scroll_sections ) {
			?>
		<div class="row g-5">
			<div class="col-md-6 left-column">
				<?php
		}

		while ( have_rows( 'sections' ) ) {
			the_row();
			$layout = get_row_layout();
			$theme  = get_sub_field( 'theme' );

			if ( 'full_width' === $layout ) {
				// Close scroll snap structure if it's open.
				if ( $has_scroll_sections ) {
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
							'data-aos' => 'fade-left',
						)
					);
					?>
				</div>
			</div>
		</div>
					<?php
					$has_scroll_sections = false;
				}
				?>
		<div class="full-width-section">
			<!-- Full width content goes here -->
			<h3 class="<?= esc_attr( $colour ); ?>"><?= esc_html( get_sub_field( 'title' ) ); ?></h3>
			<p>
				<?php
				// parse content and add $colour to the h2 and h3 class lists.
				$content = wp_kses_post( get_sub_field( 'content' ) );
				$content = str_replace( '<h2', '<h2 class="' . esc_attr( $colour ) . '"', $content );
				$content = str_replace( '<h3', '<h3 class="' . esc_attr( $colour ) . '"', $content );
				echo wp_kses_post( $content );
				?>
			</p>
		</div>
				<?php
				// Check if next section needs scroll snap structure.
				$next_sections = get_field( 'sections' );
				$current_index = get_row_index() - 1;

				$needs_scroll_structure = false;

				for ( $j = $current_index + 1; $j < count( $next_sections ); $j++ ) {
					if ( isset( $next_sections[ $j ]['acf_fc_layout'] ) ) {
						$next_layout = $next_sections[ $j ]['acf_fc_layout'];
						if ( 'default_section' === $next_layout || 'alternate_section' === $next_layout ) {
							$needs_scroll_structure = true;
							break;
						} elseif ( 'full_width' === $next_layout ) {
							break;
						}
					}
				}

				if ( $needs_scroll_structure ) {
					?>
		<div class="row g-5">
			<div class="col-md-6 left-column">
					<?php
					$has_scroll_sections = true;
				}
			} elseif ( 'default_section' === $layout ) {
				?>
				<section class="cb_scroll_snap--<?= esc_attr( $theme ); ?>" id="section<?= esc_attr( $i ); ?>">
						<?php
						if ( get_sub_field( 'icon' ) ) {
							?>
					<img src="<?= esc_url( get_sub_field( 'icon' ) ); ?>" alt="<?= esc_attr( get_sub_field( 'title' ) ); ?>" class="cb_scroll_snap__icon" />
							<?php
						}
						?>
					<h3 class="<?= esc_attr( $colour ); ?>"><?= esc_html( get_sub_field( 'title' ) ); ?></h3>
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
						<a href="<?= esc_url( $more_link['url'] ); ?>" class="green-arrow" target="<?= esc_attr( $more_link['target'] ); ?>">
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
			} elseif ( 'alternate_section' === $layout ) {
				?>
				<section class="cb_scroll_snap--<?= esc_attr( $theme ); ?>" id="section<?= esc_attr( $i ); ?>">
					ALT SECTION
				</section>
				<?php
				++$i;
			}
		}

		// Close scroll snap structure if still open.
		if ( $has_scroll_sections ) {
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
							'data-aos' => 'fade-left',
						)
					);
					?>
				</div>
			</div>
		</div>
			<?php
		}
		?>
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
    $layout = get_row_layout();
    if ( 'default_section' === $layout || 'alternate_section' === $layout ) {
        $img                          = get_sub_field( 'image' );
        $content_map[ "section{$i}" ] = wp_get_attachment_image(
            $img,
            'full',
            false,
            array(
                'data-aos'          => 'fade-left',
                'data-aos-duration' => '300',
            )
        );
        ++$i;
    }
    // Skip full_width sections in the content map as they don't participate in scroll snap.
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