<?php
/**
 * panda functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package panda
 */

if ( ! function_exists( 'panda_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function panda_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on panda, use a find and replace
	 * to change 'panda' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'panda', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'panda' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
    
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'panda_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	// Remove "Category:" or "Tag:" or "Author:" from the_archive_title()
	add_filter( 'get_the_archive_title', function ($title) {
		if ( is_category() ) {
				$title = single_cat_title( '', false );
			} elseif ( is_tag() ) {
				$title = single_tag_title( '', false );
			} elseif ( is_author() ) {
				$title = '<span class="vcard">' . get_the_author() . '</span>' ;
			}
		return $title;
	});

	// Add editor style for TinyMCE
	//add_editor_style(panda_fonts_url());
	
}
endif;
add_action( 'after_setup_theme', 'panda_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function panda_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'panda_content_width', 640 );
}
add_action( 'after_setup_theme', 'panda_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function panda_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'panda' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'panda_widgets_init' );

if ( ! function_exists( 'panda_fonts_url' ) ) :
/**
 * Register Google fonts for panda.
 *
 * Create your own panda_fonts_url() function to override in a child theme.
 *
 * @return string Google fonts URL for the theme.
 */
function panda_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open+Sans font: on or off', 'panda' ) ) {
		$fonts[] = 'Open Sans:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'panda' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'panda' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function panda_scripts() {
    // Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'panda-fonts', panda_fonts_url(), array(), null );
    
	wp_enqueue_style( 'panda-style', get_stylesheet_uri() );
	
	//wp_enqueue_style( 'panda-icon-font', get_template_directory_uri() . '/css/libs/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'panda-genericons', get_template_directory_uri() . '/css/libs/genericons/genericons.css' );

	wp_enqueue_script( 'panda-sticky-sidebar', get_template_directory_uri() . '/js/libs/jquery.sticky-kit.min.js', array('jquery'));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'panda_scripts' );

/**
 * Add editor-style support for TinyMCE Editor
 */
function panda_add_editor_styles() {
	add_editor_style(panda_fonts_url());
    add_editor_style('css/editor-style.css');
}
add_action( 'admin_init', 'panda_add_editor_styles' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Widgets
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Load TGM Plugin Activation
 */
require_once get_template_directory() . '/inc/tgm/tgm.php';