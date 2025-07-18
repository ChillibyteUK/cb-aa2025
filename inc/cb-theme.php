<?php
/**
 * CB Theme Functions
 *
 * This file contains the main functions and customizations for the CB Theme.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

require_once CB_THEME_DIR . '/inc/cb-blog.php';
require_once CB_THEME_DIR . '/inc/cb-utility.php';
require_once CB_THEME_DIR . '/inc/cb-posttypes.php';
require_once CB_THEME_DIR . '/inc/cb-taxonomies.php';
require_once CB_THEME_DIR . '/inc/cb-form.php';
require_once CB_THEME_DIR . '/inc/cb-blocks.php';

// Remove unwanted SVG filter injection WP.
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

/**
 * Remove comment-reply.min.js from footer.
 */
function remove_comment_reply_header_hook() {
    wp_deregister_script( 'comment-reply' );
}
add_action( 'init', 'remove_comment_reply_header_hook' );

/**
 * Removes the Comments menu from the WordPress admin dashboard.
 */
function remove_comments_menu() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_comments_menu' );

/**
 * Removes specific page templates from the available templates list.
 *
 * @param array $page_templates The list of page templates.
 * @return array Modified list of page templates.
 */
function child_theme_remove_page_template( $page_templates ) {
    unset(
		$page_templates['page-templates/blank.php'],
		$page_templates['page-templates/empty.php'],
		$page_templates['page-templates/left-sidebarpage.php'],
		$page_templates['page-templates/right-sidebarpage.php'],
		$page_templates['page-templates/both-sidebarspage.php']
	);
    return $page_templates;
}
add_filter( 'theme_page_templates', 'child_theme_remove_page_template' );


/**
 * Removes support for specific post formats in the theme.
 *
 * This function disables support for the 'aside', 'image', 'video', 'quote', and 'link' post formats.
 */
function remove_understrap_post_formats() {
    remove_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
add_action( 'after_setup_theme', 'remove_understrap_post_formats', 11 );

if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page(
        array(
            'page_title' => 'Site-Wide Settings',
            'menu_title' => 'Site-Wide Settings',
            'menu_slug'  => 'theme-general-settings',
            'capability' => 'edit_posts',
        )
    );
}

/**
 * Initializes theme widgets, menus, and disables certain sidebars and menus.
 *
 * This function registers navigation menus, unregisters sidebars, and sets up theme support
 * for custom editor color palettes and other features.
 */
function widgets_init() {

    register_nav_menus(
		array(
			'primary_nav'  => __( 'Primary Nav', 'cb-aa2025' ),
			'footer_menu1' => __( 'Footer Menu 1', 'cb-aa2025' ),
			'footer_menu2' => __( 'Footer Menu 2', 'cb-aa2025' ),
		)
	);

    unregister_sidebar( 'hero' );
    unregister_sidebar( 'herocanvas' );
    unregister_sidebar( 'statichero' );
    unregister_sidebar( 'left-sidebar' );
    unregister_sidebar( 'right-sidebar' );
    unregister_sidebar( 'footerfull' );
    unregister_nav_menu( 'primary' );

    add_theme_support( 'disable-custom-colors' );
    add_theme_support(
        'editor-color-palette',
        array(
            array(
                'name'  => 'Background Blue',
                'slug'  => 'background-blue',
                'color' => '#0B1F3A',
            ),
            array(
                'name'  => 'Main Blue',
                'slug'  => 'main-blue',
                'color' => '#112C4D',
            ),
            array(
                'name'  => 'Highlight Green',
                'slug'  => 'highlight-green',
                'color' => '#47DD85',
            ),
            array(
                'name'  => 'Off White',
                'slug'  => 'off-white',
                'color' => '#F2F4F6',
            ),
            array(
                'name'  => 'Mid Grey',
                'slug'  => 'mid-grey',
                'color' => '#DBDFE4',
            ),
            array(
                'name'  => 'Dark Grey',
                'slug'  => 'dark-grey',
                'color' => '#8795A6',
            ),
            array(
                'name'  => 'White',
                'slug'  => 'white',
                'color' => '#ffffff',
            ),
            array(
                'name'  => 'Talent Pink',
                'slug'  => 'talent-pink',
                'color' => '#E8088E',
            ),
            array(
                'name'  => 'Call360 Blue',
                'slug'  => 'call360-blue',
                'color' => '#4189D0',
            ),
        )
    );
}
add_action( 'widgets_init', 'widgets_init', 11 );


remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

/**
 * Registers a custom dashboard widget for the Chillibyte theme.
 */
function register_cb_dashboard_widget() {
	wp_add_dashboard_widget(
		'cb_dashboard_widget',
        'Chillibyte',
        'cb_dashboard_widget_display'
    );
}
add_action( 'wp_dashboard_setup', 'register_cb_dashboard_widget' );

/**
 * Displays the custom Chillibyte dashboard widget.
 *
 * This function outputs the content for the Chillibyte dashboard widget,
 * including an image and a contact button.
 */
function cb_dashboard_widget_display() {
    ?>
<div style="display: flex; align-items: center; justify-content: space-around;">
    <img style="width: 50%;"
        src="<?= esc_url( get_stylesheet_directory_uri() . '/img/cb-full.jpg' ); ?>">
    <a class="button button-primary" target="_blank" rel="noopener nofollow noreferrer"
        href="mailto:hello@chillibyte.co.uk">Contact</a>
</div>
<div>
    <p><strong>Thanks for choosing Chillibyte!</strong></p>
    <hr>
    <p>Got a problem with your site, or want to make some changes & need us to take a look for you?</p>
    <p>Use the link above to get in touch and we'll get back to you ASAP.</p>
</div>
	<?php
}

/**
 * Registers custom Gutenberg block scripts and block types.
 *
 * This function registers a custom script for Gutenberg blocks and associates it with a block type.
 */
function cc_gutenberg_register_files() {
    // script file.
    wp_register_script(
        'cc-block-script',
        get_stylesheet_directory_uri() . '/js/block-script.js',
        array( 'wp-blocks', 'wp-edit-post' ),
        wp_get_theme()->get( 'Version' ),
        true
    );

    // register block editor script.
    register_block_type(
		'cc/ma-block-files',
		array(
        	'editor_script' => 'cc-block-script',
	    )
	);
}
add_action( 'init', 'cc_gutenberg_register_files' );

/**
 * Filters the excerpt content.
 *
 * This function ensures that the excerpt content is returned as is
 * without any additional modifications.
 *
 * @param string $post_excerpt The post excerpt.
 * @return string The filtered post excerpt.
 */
function understrap_all_excerpts_get_more_link( $post_excerpt ) {
    if ( is_admin() || ! get_the_ID() ) {
        return $post_excerpt;
    }
    return $post_excerpt;
}

/**
 * Remove Yoast SEO breadcrumbs from Revelanssi's search results.
 *
 * @param string $content The content to filter.
 * @return string The filtered content.
 */
function wpdocs_remove_shortcode_from_index( $content ) {
    if ( is_search() ) {
        $content = strip_shortcodes( $content );
    }
    return $content;
}
add_filter( 'the_content', 'wpdocs_remove_shortcode_from_index' );


/**
 * Adds the Press archive link to the Yoast SEO breadcrumbs for single press posts.
 *
 * @param array $links The existing breadcrumb links.
 * @return array Modified breadcrumb links with the Press archive link added.
 */
function add_press_archive_link_to_breadcrumbs( $links ) {
    if ( is_singular( 'press' ) ) {

        // Create the /press/ archive link.
        $press_link = array(
            'url'  => site_url( '/press/' ),
            'text' => 'Press',
        );

        // Insert it after the homepage link.
        array_splice( $links, 1, 0, array( $press_link ) );
    }

    return $links;
}
add_filter( 'wpseo_breadcrumb_links', 'add_press_archive_link_to_breadcrumbs' );

// GF really is pants.
/**
 * Change submit from input to button.
 *
 * Do not use example provided by Gravity Forms as it strips out the button attributes including onClick.
 *
 * @param string $button_input The original input HTML for the submit button.
 * @param array  $form         The form object containing form data.
 * @return string The modified button HTML.
 */
function wd_gf_update_submit_button( $button_input, $form ) {
    // save attribute string to $button_match[1].
    preg_match( '/<input([^\/>]*)(\s\/)*>/', $button_input, $button_match );

    // remove value attribute (since we aren't using an input).
    $button_atts = str_replace( "value='" . $form['button']['text'] . "' ", '', $button_match[1] );

    // create the button element with the button text inside the button element instead of set as the value.
    return '<button ' . $button_atts . '><span>' . $form['button']['text'] . '</span></button>';
}
add_filter( 'gform_submit_button', 'wd_gf_update_submit_button', 10, 2 );


/**
 * Enqueues theme styles and scripts.
 *
 * This function registers and enqueues external styles and scripts
 * such as AOS animations and Splide.js for use in the theme.
 */
function cb_theme_enqueue() {
    $the_theme = wp_get_theme();

	// phpcs:disable
    // wp_enqueue_style('lightbox-stylesheet', get_stylesheet_directory_uri() . '/css/lightbox.min.css', array(), $the_theme->get('Version'));
    // wp_enqueue_style('slick-stylesheet', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), $the_theme->get('Version'));
    // wp_enqueue_style('slick-stylesheet', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', array(), $the_theme->get('Version'));
    // wp_enqueue_script('lightbox-scripts', get_stylesheet_directory_uri() . '/js/lightbox-plus-jquery.min.js', array(), $the_theme->get('Version'), true);
    // wp_enqueue_script('lightbox-scripts', get_stylesheet_directory_uri() . '/js/lightbox.min.js', array(), $the_theme->get('Version'), true);
    // wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js', array(), null, true);
    // wp_enqueue_script('slick-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.8.1', true);
    // wp_enqueue_script('gsap-scripts', get_stylesheet_directory_uri() . '/js/gsap/gsap.min.js', array('jquery'), '1.8.1', true);
    // wp_enqueue_script('scrolltrigger-scripts', get_stylesheet_directory_uri() . '/js/gsap/ScrollTrigger.min.js', array('gsap-scripts'), null, true);
    // wp_enqueue_script('splittext-scripts', get_stylesheet_directory_uri() . '/js/gsap/SplitText.min.js', array('gsap-scripts'), null, true);
    // wp_enqueue_script('parallax', get_stylesheet_directory_uri() . '/js/parallax.min.js', array('jquery'), null, true);
	// phpcs:enable

    wp_enqueue_style( 'aos-style', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1' );
    wp_enqueue_script( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true );

    wp_enqueue_style( 'splide-css', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css', array(), '4.1.3' );
    wp_enqueue_script( 'splide-js', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array(), '4.1.3', true );
}
add_action( 'wp_enqueue_scripts', 'cb_theme_enqueue' );
