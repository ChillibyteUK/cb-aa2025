<?php
/**
 * CB Blocks Registration
 *
 * This file contains the registration of custom ACF blocks and modifications
 * to Gutenberg core blocks for the CB AA 2025 theme.
 *
 * @package cb-aa2025
 */

/**
 * Registers custom ACF blocks for the CB Firma 2025 theme.
 */
function acf_blocks() {
    if ( function_exists( 'acf_register_block_type' ) ) {

		// INSERT NEW BLOCKS HERE.

        acf_register_block_type(
            array(
                'name'            => 'cb_scroll_snap_flexible',
                'title'           => __( 'CB Scroll Snap Flexible' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'page-templates/blocks/cb-scroll-snap-flexible.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'cb_image_hero',
                'title'           => __( 'CB Image Hero' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'page-templates/blocks/cb-image-hero.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'cb_all_integrations',
                'title'           => __( 'CB All Integrations' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'page-templates/blocks/cb-all-integrations.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'cb_pricing',
                'title'           => __( 'CB Pricing' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'page-templates/blocks/cb-pricing.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'cb_contact',
                'title'           => __( 'CB Contact' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'page-templates/blocks/cb-contact.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'cb_hero',
                'title'           => __( 'CB Hero' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'page-templates/blocks/cb-hero.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'cb_latest_posts',
                'title'           => __( 'CB Latest Posts' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'page-templates/blocks/cb-latest-posts.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

		acf_register_block_type(
			array(
				'name'            => 'cb_video',
				'title'           => __( 'CB Video' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb-video.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'cb_case_study_slider',
				'title'           => __( 'CB Case Study Slider' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb-case-study-slider.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'cb_scroll_snap',
				'title'           => __( 'CB Scroll Snap' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb-scroll-snap.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'cb_home_hero',
				'title'           => __( 'CB Home Hero' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb-home-hero.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

    }
}
add_action( 'acf/init', 'acf_blocks' );

/**
 * Modify Gutenberg core block type arguments.
 *
 * @param array  $args The block type arguments.
 * @param string $name The block name.
 * @return array Modified block type arguments.
 */
function core_image_block_type_args( $args, $name ) {
	if ( 'core/quote' === $name ) {
        $args['render_callback'] = 'modify_core_quote';
    }

    return $args;
}
add_filter( 'register_block_type_args', 'core_image_block_type_args', 10, 2 );


/**
 * Adds a container wrapper around the content of certain core blocks.
 *
 * @param array    $attributes The block attributes.
 * @param string   $content    The block content.
 * @param WP_Block $block      The block instance.
 * @return string The modified block content with a container wrapper.
 */
function modify_core_add_container( $attributes, $content, $block ) {
    // Only wrap if not inside a core/quote.
    if ( ! empty( $block->context['parentName'] ) && 'core/quote' === $block->context['parentName'] ) {
        return $content;
    }
    ob_start();
    ?>
<div class="container">
    <?= wp_kses_post( $content ); ?>
</div>
    <?php
    $content = ob_get_clean();
    return $content;
}

/**
 * Modifies the core heading block by adding a container wrapper and an ID.
 *
 * @param array    $attributes The block attributes.
 * @param string   $content    The block content.
 * @param WP_Block $block      The block instance.
 * @return string The modified block content with a container wrapper and ID.
 */
function modify_core_heading( $attributes, $content, $block ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
    ob_start();
    $id = strtolower( wp_strip_all_tags( $content ) );
    $id = cbslugify( $id );
    ?>
<div class="container">
    <?= wp_kses_post( $content ); ?>
</div>
	<?php
    $content = ob_get_clean();
    return $content;
}

/**
 * Modifies the core quote block by wrapping its contents in a container.
 *
 * @param array    $attributes The block attributes.
 * @param string   $content    The block content.
 * @param WP_Block $block      The block instance.
 * @return string The modified block content.
 */
function modify_core_quote( $attributes, $content, $block ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
    // Wrap everything inside <blockquote> with <div class="container">.
    $content = preg_replace(
        '/<blockquote([^>]*)>(.*?)<\/blockquote>/is',
        '<blockquote$1><div class="container">$2</div></blockquote>',
        $content
    );
    return $content;
}
