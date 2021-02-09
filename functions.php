<?php
/**
 * raly functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package raly
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'raly_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function raly_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on raly, use a find and replace
		 * to change 'raly' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'raly', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'raly' ),
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
				'raly_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'raly_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function raly_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'raly_content_width', 640 );
}
add_action( 'after_setup_theme', 'raly_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function raly_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'raly' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'raly' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'raly_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function raly_scripts() {
	wp_enqueue_style( 'raly-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;0,900;1,300&display=swap', array(), _S_VERSION );
	wp_enqueue_style( 'raly-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'raly-bxslider-style', 'https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'raly-validationEngine-style', 'https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'raly-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'raly-style', 'rtl', 'replace' );
	wp_enqueue_script( 'raly-bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'raly-bxslider',  get_template_directory_uri() . '/js/jquery.bxslider.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'raly-validation-lang',  'https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-en.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'raly-validationEngine',  'https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'raly-custom', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'raly_scripts' );

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_filter('acf/settings/show_admin', '__return_false');


add_filter( 'wpcf7_form_elements', __NAMESPACE__ . '\\wpcf7_form_add_data_elements' );
function wpcf7_form_add_data_elements( $content ) {

	$str_pos = strpos( $content, 'name="FirstName"' );
	if ( $str_pos !== false ) {
		$content = substr_replace( $content, ' data-validation-engine="validate[required,custom[onlyLetterSp]]" ', $str_pos, 0 );
	}
	$str_pos = strpos( $content, 'name="LastName"' );
	if ( $str_pos !== false ) {
		$content = substr_replace( $content, ' data-validation-engine="validate[required,custom[onlyLetterSp]]" ', $str_pos, 0 );
	}
	$str_pos = strpos( $content, 'name="Address"' );
	if ( $str_pos !== false ) {
		$content = substr_replace( $content, ' data-validation-engine="validate[required]" ', $str_pos, 0 );
	}

	$str_pos = strpos( $content, 'name="City"' );
	if ( $str_pos !== false ) {
		$content = substr_replace( $content, ' data-validation-engine="validate[required,custom[onlyLetterSp]]" ', $str_pos, 0 );
	}

	$str_pos = strpos( $content, 'name="zip"' );
	if ( $str_pos !== false ) {
		$content = substr_replace( $content, ' data-validation-engine="validate[required,custom[onlyNumberSp]]" ', $str_pos, 0 );
	}

	$str_pos = strpos( $content, 'name="phone"' );
	if ( $str_pos !== false ) {
		$content = substr_replace( $content, ' data-validation-engine="validate[required,custom[phone]]" ', $str_pos, 0 );
	}

	$str_pos = strpos( $content, 'name="altphone"' );
	if ( $str_pos !== false ) {
		$content = substr_replace( $content, ' data-validation-engine="validate[custom[phone]]" ', $str_pos, 0 );
	}

	$str_pos = strpos( $content, 'name="email"' );
	if ( $str_pos !== false ) {
		$content = substr_replace( $content, ' data-validation-engine="validate[required,custom[email]]" ', $str_pos, 0 );
	}
	return $content;
}