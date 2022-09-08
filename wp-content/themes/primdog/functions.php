<?php
/**
 * primdog functions and definitions
 *
 *
 * @package primdog
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}
add_shortcode('name', 'my_shortcode');

function my_shortcode($atts, $content)
{
    return '<span class="caption">' . $content . '</span>';
}

/*
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function primdog_setup()
{

    load_theme_textdomain('primdog', get_template_directory() . '/languages');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'primdog'),
            'menu-2' => esc_html__('Countries', 'primdog'),
            'customer_service' => esc_html__('CUSTOMER SERVICE', 'primdog'),
            'information' => esc_html__('Information', 'primdog'),
            'category' => esc_html__('Category', 'primdog'),
            'payment' => esc_html__('Payment', 'primdog'),
        )
    );

    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    add_theme_support('customize-selective-refresh-widgets');

    /*
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}

add_action('after_setup_theme', 'primdog_setup');

/*
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function primdog_content_width()
{
    $GLOBALS['content_width'] = apply_filters('primdog_content_width', 640);
}

add_action('after_setup_theme', 'primdog_content_width', 0);

/*
 * Register widget area.
 *
 */
function primdog_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'primdog'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'primdog'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'primdog_widgets_init');

/*
 * Enqueue scripts and styles.
 */
function primdog_scripts()
{

    wp_enqueue_style('primdog-style', get_stylesheet_uri(), array('normalize'), _S_VERSION);
    wp_enqueue_style('normalize', get_template_directory_uri() . '/styles/normalize.css', array(), _S_VERSION);
    wp_enqueue_style('primdog-global', get_template_directory_uri() . '/styles/global.css', array('normalize'), _S_VERSION);

    wp_enqueue_script( 'jquery' );
    slick_register();
    wp_enqueue_script('primdog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
    wp_enqueue_script('primdog-slider', get_template_directory_uri() . '/js/slider.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('mini-cart-js', get_template_directory_uri() . '/js/mini-cart.js', array('jquery'));
    wp_enqueue_script('header-menu-js', get_template_directory_uri() . '/js/header-menu.js', array());

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'primdog_scripts');

/*
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/*
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/*
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/*
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

add_action('customize_register', 'customizer_init');
function customizer_init(WP_Customize_Manager $wp_customize)
{

    $transport = 'postMessage';

    // Секция
    $section = '';

    $wp_customize->add_section($section, [
        'title' => __('Информация о компании'),
        'priority' => 200,
    ]);

    // настройка
    $setting = 'primedog-phone';

    $wp_customize->add_setting($setting, [
        'default' => '1-888-270-8651',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => $transport
    ]);
    $wp_customize->add_control($setting, [
        'section' => 'display_options', // id секции
        'label' => __('Телефон компании'),
        'type' => 'text' // текстовое поле
    ]);
    $setting = 'primedog-email';

    $wp_customize->add_setting($setting, [
        'default' => 'info@primdog.com',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => $transport
    ]);
    $wp_customize->add_control($setting, [
        'section' => 'display_options', // id секции
        'label' => __('E-mail'),
        'type' => 'text' // текстовое поле
    ]);

    // настройка
    $setting = 'footer_copyright_text';

    $wp_customize->add_setting($setting, [
        'default' => __('Все права защищены'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => $transport
    ]);

    $wp_customize->add_control($setting, [
        'section' => 'display_options', // id секции
        'label' => __('Копирайт'),
        'type' => 'text' // текстовое поле
    ]);

    // настройка
    $setting = 'store_text';

    $wp_customize->add_setting($setting, [
        'default' => __('Please feel free to contact us anytime with any general questions or concerns you may have. We can be reached by:
        E-mail: info@primdog.com'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => $transport
    ]);

    $wp_customize->add_control($setting, [
        'section' => 'display_options', // id секции
        'label' => __('STORE'),
        'type' => 'text' // текстовое поле
    ]);

    // настройка
    $setting = 'response_covid';

    $wp_customize->add_setting($setting, [
        'default' => __('Response to COVID-19'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => $transport
    ]);

    $wp_customize->add_control($setting, [
        'section' => 'display_options', // id секции
        'label' => __('Response to COVID-19'),
        'type' => 'text' // текстовое поле
    ]);


}


/*
 * Woocommerce
 */
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'woocommerce_support' );

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

add_filter('woocommerce_product_loop_title_classes', 'add_class_title');
function add_class_title($class)
{
    $class = $class . ' ' . 'product__title';
    return $class;
}

/*
 * Carbon_Fields
 */

add_action('carbon_fields_register_fields', 'crb_register_custom_fields'); // Для версии 2.0 и выше
//add_action( 'carbon_register_fields', 'crb_register_custom_fields' ); // Для версии 1.6 и ниже
function crb_register_custom_fields()
{
    require_once __DIR__ . '/inc/carbon-fields.php';
}

/*
 * Register post types
 */
add_action('init', 'register_post_types');
function register_post_types()
{
    register_post_type(
        'district',
        array(
            'label' => __('banner'),
            'labels' => array(
                'name' => __('Banner', 'Post Type General Name'),
                'singular_name' => __('Banner', 'Post Type Singular Name'),
                'menu_name' => __('Banners'),
            ),
            'supports' => array('title'),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => false,
            'exclude_from_search' => false,
            'publicly_queryable' => true,

        )
    );
}

/*
 * Slick slider
 *
 */

function slick_register()
{
    // Slick CSS & JS files
    wp_register_style('slick-css', get_template_directory_uri() . '/libs/slick/slick.css');
    wp_register_style('slick-theme-css', get_template_directory_uri() . '/libs/slick/slick-theme.css');
    wp_register_script('slick-min-js', get_template_directory_uri() . '/libs/slick/slick.min.js', array('jquery'));

    // Our Custom JS (we'll initialize slick here)

    // Enqueue all CSS & JS files
    wp_enqueue_style('slick-css');
    wp_enqueue_style('slick-theme-css');
    wp_enqueue_script('slick-min-js');
}


