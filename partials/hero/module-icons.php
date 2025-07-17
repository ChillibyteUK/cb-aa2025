<?php
/**
 * Hero Icons Module Template
 *
 * @param array $args['module'] The module data from ACF.
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

$module     = isset( $args['module'] ) ? $args['module'] : array();
$icon_cards = isset( $module['icon_cards'] ) ? $module['icon_cards'] : array();
?>
<div class="hero__icons">
    <?php
    if ( ! empty( $icon_cards ) && is_array( $icon_cards ) ) {
        foreach ( $icon_cards as $icon_card ) {
            ?>
            <div class="hero__icon">
                <?php
                if ( ! empty( $icon_card['icon'] ) ) {
                    echo '<img class="hero__icon-icon" src="' . esc_url( $icon_card['icon'] ) . '" alt="' . esc_attr( $icon_card['title'] ?? '' ) . '" />';
                }
                if ( ! empty( $icon_card['title'] ) ) {
                    echo '<div class="hero__icon-title">' . esc_html( $icon_card['title'] ) . '</div>';
                }
                if ( ! empty( $icon_card['content'] ) ) {
                    echo '<div class="hero__icon-content">' . esc_html( $icon_card['content'] ) . '</div>';
                }
                ?>
            </div>
            <?php
        }
    } else {
        echo '<p>' . esc_html__( 'No icons available.', 'cb-aa2025' ) . '</p>';
    }
    ?>
</div>