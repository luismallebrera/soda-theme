<?php
/**
 * soda-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package soda-theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.1' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function soda_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on soda-theme, use a find and replace
		* to change 'soda-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'soda-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'soda-theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'soda_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'soda_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function soda_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'soda_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'soda_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function soda_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'soda-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'soda-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'soda_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function soda_theme_scripts() {
	wp_enqueue_style( 'soda-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'soda-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'soda-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	// Enqueue sticky header script
	wp_enqueue_script( 'soda-theme-sticky-header', get_template_directory_uri() . '/js/sticky-header.js', array( 'jquery' ), _S_VERSION, true );

	// Pass scroll threshold to JavaScript
	wp_localize_script( 'soda-theme-sticky-header', 'sodaThemeSettings', array(
		'scrollThreshold' => get_theme_mod( 'scroll_threshold', 100 ),
	) );

	// Smooth scrolling (Lenis)
	$enable_smooth_scrolling = get_theme_mod( 'enable_smooth_scrolling', false );
	$exclude_pages           = get_theme_mod( 'soda_smooth_scrolling_exclude_page', array() );
	$is_excluded             = is_array( $exclude_pages ) && in_array( get_the_ID(), $exclude_pages );
	$is_preview              = class_exists( '\Elementor\Plugin' ) && \Elementor\Plugin::$instance->preview->is_preview_mode();

	if ( $enable_smooth_scrolling && ! $is_excluded && ! $is_preview ) {
		wp_enqueue_script( 'lenis', get_template_directory_uri() . '/js/lenis.min.js', array(), '1.1.13', true );
		wp_enqueue_script( 'soda-theme-smooth-scrolling', get_template_directory_uri() . '/js/smooth-scrolling.js', array( 'lenis' ), _S_VERSION, true );

		// Pass smooth scrolling settings to JavaScript
		$disable_wheel = get_theme_mod( 'soda_smooth_scrolling_disable_wheel', false );
		$smooth_wheel  = $disable_wheel ? 0 : 1;

		wp_localize_script( 'soda-theme-smooth-scrolling', 'sodaSmoothScrollingParams', array(
			'smoothWheel'    => (int) $smooth_wheel,
			'anchorOffset'   => (int) get_theme_mod( 'soda_smooth_scrolling_anchor_offset', 0 ),
			'lerp'           => (float) get_theme_mod( 'soda_smooth_scrolling_lerp', 0.1 ),
			'duration'       => (float) get_theme_mod( 'soda_smooth_scrolling_duration', 1.2 ),
			'anchorLinks'    => (bool) get_theme_mod( 'soda_smooth_scrolling_anchor_links', false ),
			'gsapSync'       => (bool) get_theme_mod( 'soda_smooth_scrolling_gsap', false ),
		) );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'soda_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Redux Framework configuration.
 */
if ( file_exists( get_template_directory() . '/inc/redux-config-full.php' ) ) {
	require get_template_directory() . '/inc/redux-config-full.php';
}

/**
 * Redux compatibility layer - maps get_theme_mod to Redux
 */
if ( file_exists( get_template_directory() . '/inc/redux-compat.php' ) ) {
	require get_template_directory() . '/inc/redux-compat.php';
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

