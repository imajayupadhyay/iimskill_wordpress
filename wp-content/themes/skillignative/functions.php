<?php
/**
 * Skillignative functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Skillignative
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.2' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function skillignative_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Skillignative, use a find and replace
		* to change 'skillignative' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'skillignative', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'skillignative' ),
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
			'skillignative_custom_background_args',
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
add_action( 'after_setup_theme', 'skillignative_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function skillignative_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'skillignative_content_width', 640 );
}
add_action( 'after_setup_theme', 'skillignative_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function skillignative_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'skillignative' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'skillignative' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'skillignative_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function skillignative_scripts() {
	// Google Fonts - Poppins
	wp_enqueue_style( 'google-fonts-poppins', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap', array(), null );

	// Global CSS (resets, header, footer)
	wp_enqueue_style( 'skillignative-global', get_template_directory_uri() . '/assets/css/global.css', array( 'google-fonts-poppins' ), _S_VERSION );

	// Homepage CSS (only on front page)
	if ( is_front_page() ) {
		wp_enqueue_style( 'skillignative-homepage', get_template_directory_uri() . '/assets/css/homepage.css', array( 'skillignative-global' ), _S_VERSION );
	}

	// Contact CSS (only on contact page)
	if ( is_page_template( 'page-contact.php' ) ) {
		wp_enqueue_style( 'skillignative-contact', get_template_directory_uri() . '/assets/css/contact.css', array( 'skillignative-global' ), _S_VERSION );
	}

	// About CSS (only on about page)
	if ( is_page_template( 'page-about.php' ) ) {
		wp_enqueue_style( 'skillignative-about', get_template_directory_uri() . '/assets/css/about.css', array( 'skillignative-global' ), _S_VERSION );
	}

	// Blog listing CSS (on blog posts index)
	if ( is_home() ) {
		wp_enqueue_style( 'skillignative-blog', get_template_directory_uri() . '/assets/css/blog.css', array( 'skillignative-global' ), _S_VERSION );
	}

	// Blog detail CSS (on single posts)
	if ( is_single() ) {
		wp_enqueue_style( 'skillignative-detail', get_template_directory_uri() . '/assets/css/detail.css', array( 'skillignative-global' ), _S_VERSION );
	}

	// Course detail CSS (on single course CPT)
	if ( is_singular( 'course' ) ) {
		wp_enqueue_style( 'skillignative-course-detail', get_template_directory_uri() . '/assets/css/course-detail.css', array( 'skillignative-global' ), _S_VERSION );
	}

	// Theme default style
	wp_enqueue_style( 'skillignative-style', get_stylesheet_uri(), array( 'skillignative-global' ), _S_VERSION );
	wp_style_add_data( 'skillignative-style', 'rtl', 'replace' );

	// Global JS — header (hamburger + mega menu) runs on every page.
	// Homepage-specific sections (tabs, sliders, videos) have null guards so safe globally.
	wp_enqueue_script( 'skillignative-global-js', get_template_directory_uri() . '/assets/js/script.js', array(), _S_VERSION, true );

	// Contact JS (only on contact page)
	if ( is_page_template( 'page-contact.php' ) ) {
		wp_enqueue_script( 'skillignative-contact-js', get_template_directory_uri() . '/assets/js/contact.js', array(), _S_VERSION, true );
	}

	// About JS (only on about page)
	if ( is_page_template( 'page-about.php' ) ) {
		wp_enqueue_script( 'skillignative-about-js', get_template_directory_uri() . '/assets/js/about.js', array(), _S_VERSION, true );
	}

	// Blog listing JS (on blog posts index)
	if ( is_home() ) {
		wp_enqueue_script( 'skillignative-blog-js', get_template_directory_uri() . '/assets/js/blog.js', array(), _S_VERSION, true );
	}

	// Course detail JS (on single course CPT)
	if ( is_singular( 'course' ) ) {
		wp_enqueue_script( 'skillignative-course-detail-js', get_template_directory_uri() . '/assets/js/course-detail.js', array(), _S_VERSION, true );
	}

	// Blog detail JS (on single posts)
	if ( is_single() ) {
		wp_enqueue_script( 'skillignative-detail-js', get_template_directory_uri() . '/assets/js/detail.js', array(), _S_VERSION, true );

		// CF7 style overrides — fixes phone flex layout + acceptance checkbox design
		$cf7_css = '
			/* ── General form wrapper ─────────────────────── */
			.sidebar-form .wpcf7 { padding: 0; }
			.sidebar-form .wpcf7-form { padding: 0; }
			.sidebar-form .wpcf7-form > p { margin: 0; }

			/* ── All control wraps: block so layout works ─── */
			.sidebar-form .wpcf7-form-control-wrap {
				display: block;
				width: 100%;
			}

			/* ── Inputs general ────────────────────────────── */
			.sidebar-form .form-input {
				box-sizing: border-box;
				width: 100%;
				display: block;
			}

			/* ── Acceptance / checkbox ─────────────────────── */
			.sidebar-form .checkbox-group .wpcf7-form-control-wrap,
			.sidebar-form .checkbox-group .wpcf7-acceptance {
				display: block;
				width: 100%;
			}
			.sidebar-form .wpcf7-acceptance .wpcf7-list-item {
				margin: 0;
				display: block;
			}
			.sidebar-form .wpcf7-acceptance .wpcf7-list-item label {
				display: flex;
				align-items: flex-start;
				gap: 10px;
				cursor: pointer;
				font-size: 13px;
				color: #555;
				line-height: 1.5;
				font-weight: 400;
			}
			.sidebar-form .wpcf7-acceptance .wpcf7-list-item label input[type="checkbox"] {
				margin-top: 3px;
				width: 18px;
				height: 18px;
				min-width: 18px;
				accent-color: #155dfc;
				cursor: pointer;
				flex-shrink: 0;
				border: 2px solid #ddd;
				border-radius: 3px;
			}
			.sidebar-form .wpcf7-acceptance .wpcf7-list-item-label {
				flex: 1;
				color: #555;
				font-size: 13px;
				line-height: 1.6;
			}
			.sidebar-form .wpcf7-acceptance .wpcf7-list-item-label a {
				color: #155dfc;
				text-decoration: none;
				font-weight: 600;
			}
			.sidebar-form .wpcf7-acceptance .wpcf7-list-item-label a:hover {
				text-decoration: underline;
			}

			/* ── Submit button ─────────────────────────────── */
			.sidebar-form .form-submit {
				display: block;
				width: 100%;
				cursor: pointer;
			}
			.sidebar-form .form-submit[disabled] {
				opacity: 0.7;
				cursor: not-allowed;
				transform: none !important;
			}
			.sidebar-form .wpcf7 .ajax-loader { display: none !important; }

			/* ── Validation error tips ─────────────────────── */
			.sidebar-form .wpcf7-not-valid-tip {
				display: block;
				margin-top: 5px;
				font-size: 12px;
				color: #e53935;
				font-weight: 500;
			}
			.sidebar-form .wpcf7-form-control.wpcf7-not-valid {
				border-color: #e53935 !important;
				box-shadow: 0 0 0 3px rgba(229,57,53,0.1) !important;
			}

			/* ── Response output (success / error) ─────────── */
			.sidebar-form .wpcf7-response-output {
				margin: 12px 0 0 !important;
				padding: 12px 16px !important;
				border-radius: 8px !important;
				font-size: 13px !important;
				font-weight: 600 !important;
				border: none !important;
				text-align: center;
			}
			.sidebar-form .wpcf7-mail-sent-ok {
				background: #e8f5e9 !important;
				color: #2e7d32 !important;
			}
			.sidebar-form .wpcf7-mail-sent-ng,
			.sidebar-form .wpcf7-validation-errors,
			.sidebar-form .wpcf7-spam-blocked,
			.sidebar-form .wpcf7-acceptance-missing {
				background: #ffebee !important;
				color: #c62828 !important;
			}

			/* ── CF7 Success Card ──────────────────────── */
			.cf7-success-card {
				display: flex;
				flex-direction: column;
				align-items: center;
				justify-content: center;
				padding: 36px 24px 32px;
				text-align: center;
				animation: cf7SuccessFadeIn 0.5s cubic-bezier(.22,.68,0,1.2) both;
			}
			@keyframes cf7SuccessFadeIn {
				from { opacity: 0; transform: translateY(16px) scale(.96); }
				to   { opacity: 1; transform: translateY(0)   scale(1);    }
			}

			/* Animated checkmark circle */
			.cf7-check-wrap {
				width: 72px; height: 72px;
				margin-bottom: 20px;
				position: relative;
			}
			.cf7-check-circle {
				fill: none;
				stroke: #10b981;
				stroke-width: 3;
				stroke-dasharray: 200;
				stroke-dashoffset: 200;
				animation: cf7CircleDraw .6s ease forwards .1s;
				transform-origin: center;
				transform: rotate(-90deg);
			}
			@keyframes cf7CircleDraw {
				to { stroke-dashoffset: 0; }
			}
			.cf7-check-tick {
				fill: none;
				stroke: #10b981;
				stroke-width: 3;
				stroke-linecap: round;
				stroke-linejoin: round;
				stroke-dasharray: 60;
				stroke-dashoffset: 60;
				animation: cf7TickDraw .4s ease forwards .65s;
			}
			@keyframes cf7TickDraw {
				to { stroke-dashoffset: 0; }
			}

			.cf7-success-title {
				font-size: 20px;
				font-weight: 700;
				color: #111;
				margin: 0 0 8px;
				line-height: 1.3;
			}
			.cf7-success-sub {
				font-size: 13px;
				color: #666;
				line-height: 1.6;
				margin: 0 0 6px;
			}
			.cf7-success-note {
				display: inline-flex;
				align-items: center;
				gap: 5px;
				font-size: 12px;
				font-weight: 600;
				color: #10b981;
				background: #f0fdf4;
				border: 1px solid #bbf7d0;
				border-radius: 20px;
				padding: 4px 12px;
				margin: 10px 0 20px;
			}
			.cf7-success-reset {
				font-size: 12px;
				color: #155dfc;
				text-decoration: underline;
				cursor: pointer;
				background: none;
				border: none;
				padding: 0;
			}
			.cf7-success-reset:hover { color: #0d4ed8; }

			/* Fade out the form before showing success card */
			.sidebar-form.cf7-submitting .wpcf7 {
				opacity: 0;
				transform: scale(.97);
				transition: opacity .3s ease, transform .3s ease;
				pointer-events: none;
			}
		';
		wp_add_inline_style( 'skillignative-detail', $cf7_css );
	}

	wp_enqueue_script( 'skillignative-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skillignative_scripts' );

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

/**
 * Custom Post Types.
 */
require get_template_directory() . '/inc/cpt-courses.php';

/**
 * Custom navigation walker (mega menu support).
 */
require get_template_directory() . '/inc/nav-walker.php';

/**
 * Homepage meta boxes for dynamic content.
 */
require get_template_directory() . '/inc/homepage-meta.php';

/**
 * Contact page meta boxes for dynamic content.
 */
require get_template_directory() . '/inc/contact-meta.php';

/**
 * About page meta boxes for dynamic content.
 */
require get_template_directory() . '/inc/about-meta.php';

/**
 * Course detail page meta boxes (single-course.php sections).
 */
require get_template_directory() . '/inc/course-detail-meta.php';

/**
 * Blog Settings admin page (submenu under Posts).
 */
require get_template_directory() . '/inc/blog-settings.php';

/**
 * Blog Sidebar Settings admin page (Posts > Contact Details).
 */
require get_template_directory() . '/inc/blog-sidebar-settings.php';

/**
 * Footer Settings admin page (Appearance > Footer Settings).
 */
require get_template_directory() . '/inc/footer-settings.php';

/**
 * Fallback menu if no menu is set.
 */
function skillignative_fallback_menu() {
	echo '<ul class="nav-list">';
	echo '<li class="nav-item active"><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';
	echo '<li class="nav-item"><a href="#">Courses</a></li>';
	echo '<li class="nav-item"><a href="#">Blog</a></li>';
	echo '<li class="nav-item"><a href="#">Awards</a></li>';
	echo '<li class="nav-item"><a href="#">About</a></li>';
	echo '<li class="nav-item"><a href="#">Contact Us</a></li>';
	echo '</ul>';
}

