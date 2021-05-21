<?php
/**
 * IT News Grid functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package IT News Grid
 */

if ( ! defined( 'ITNG_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ITNG_VERSION', '1.0.9' );
}

if ( ! function_exists( 'itng_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function itng_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on IT News Grid, use a find and replace
		 * to change 'it-news-grid' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'it-news-grid', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Sliding Menu', 'it-news-grid' ),
				'menu-2' => esc_html__( 'Desktop Menu', 'it-news-grid'),
				'menu-3' => esc_html__( 'Top Menu', 'it-news-grid')
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
				'itng_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		// Custom Image sizes for the theme
		add_image_size('itng_square_thumb', 500, 500, true);
		add_image_size('itng_blog_thumb', 700, 490, true);
		add_image_size('itng_800x500', 800, 500, true);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 60,
				'width'       => 240,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'itng_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function itng_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'itng_content_width', 640 );
}
add_action( 'after_setup_theme', 'itng_content_width', 0 );

/**
 * Register widget area.
 */
require get_template_directory() . '/framework/theme-setup/register_sidebars.php';


/**
 *	Enqueue Front-end Theme Scripts and Styles
 */
require get_template_directory() . '/framework/theme-setup/enqueue_scripts.php';

/**
 *	Enqueue Back-end Theme Scripts and Styles
 */
 require get_template_directory() . '/framework/theme-setup/admin_scripts.php';

/**
 *	Functions for the masthead.
 */
 require get_template_directory() . '/inc/masthead.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 *	Custom CSS 
 */
require get_template_directory() . '/inc/css-mods.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 *	Custom Color
 */
require get_template_directory() . '/inc/colors.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/framework/customizer/customizer.php';

/**
 *	Add Menu Walker
 */
require get_template_directory() . '/inc/walker.php';

/**
 *	The Meta Box for the Page
 */
 
require get_template_directory() . '/framework/metabox/display-options.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 *	Custom Widgets
 */
require get_template_directory() . '/framework/widgets/recent-posts.php';