<?php
/**
 * Hero Image Module Template
 *
 * @param array $args['module'] The module data from ACF.
 */

defined( 'ABSPATH' ) || exit;

$module = isset( $args['module'] ) ? $args['module'] : array();
$image  = isset( $module['image'] ) ? $module['image'] : array();
?>
<div class="hero__image">
    <?php
    if ( ! empty( $image ) ) {
		echo wp_get_attachment_image( $image, 'full', false, array( 'class' => 'hero__image-img' ) );
    } else {
        echo '<p>' . esc_html__( 'No image provided.', 'cb-aa2025' ) . '</p>';
    }
    ?>
</div>