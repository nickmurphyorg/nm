<?php
/**
 * nm functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nm
 */

if ( ! function_exists( 'nm_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nm_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on nm, use a find and replace
	 * to change 'nm' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'nm', get_template_directory() . '/languages' );

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
	//add_image_size( 'hero-medium', 750, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'nm' ),
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
	 * Enable SVG Upload.
	 */
	add_filter('upload_mimes', 'custom_upload_mimes');

	function custom_upload_mimes ( $existing_mimes=array() ) {
	
		// add the file extension to the array
		$existing_mimes['svg'] = 'mime/type';
	
	    // call the modified list of extensions
		return $existing_mimes;
	}

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
	add_theme_support( 'custom-background', apply_filters( 'nm_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // nm_setup
add_action( 'after_setup_theme', 'nm_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nm_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nm_content_width', 640 );
}
add_action( 'after_setup_theme', 'nm_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nm_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'nm' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'First', 'nm' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'nm' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Blog Posts', 'nm' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'nm' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Projects', 'nm' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Four', 'nm' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Contact', 'nm' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Projects', 'nm' ),
		'id'            => 'projects',
		'description'   => esc_html__( 'Projects', 'nm' )
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sitemap', 'nm' ),
		'id'            => 'site-map',
		'description'   => esc_html__( 'HTML Sitemap', 'nm' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Resume', 'nm' ),
		'id'            => 'resume',
		'description'   => esc_html__( 'Resume module for navigation bar.', 'nm' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<span style="display:none;">',
		'after_title'   => '</span>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Connect Slide', 'nm' ),
		'id'            => 'connect-slide',
		'description'   => esc_html__( 'Body copy for connect slide.', 'nm' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Connect Links', 'nm' ),
		'id'            => 'connect-links',
		'description'   => esc_html__( 'Links for connecting with me.', 'nm' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'nm_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nm_scripts() {
	wp_enqueue_style( 'nm-style', get_stylesheet_uri() );

	wp_enqueue_script( 'nm-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_script( 'nm-animation', get_template_directory_uri() . '/js/gsap.min.js', array(), '3.6.1', true);

	wp_enqueue_script( 'nm-scroll-trigger', get_template_directory_uri() . '/js/ScrollTrigger.min.js', array(), '3.6.1', true);
	
	wp_enqueue_script( 'nm-what-input', get_template_directory_uri() . '/js/what-input.min.js', array(), '2.0.1', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nm_scripts' );

/**
 * Add Scripts to Footer.
 */
function nm_footer_scripts() {
	wp_enqueue_script( 'nm-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.1', false);
}
add_action('wp_footer', 'nm_footer_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Link hero to post.
 */
add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );

function my_post_image_html( $html, $post_id, $post_image_id ) {
	$html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">' . $html . '</a>';
	return $html;
}

/**
 * Modify Protected Page Title Prefix
 */
function change_protected_title_prefix() {
	return '%s';
}
add_filter('protected_title_format', 'change_protected_title_prefix');

/**
 * Login Screen Mods.
 */
function custom_login() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/style.css', '1.0', true);
    wp_enqueue_script( 'nm-animation', get_template_directory_uri() . '/js/gsap.min.js', array(), '3.6.1', true);
    wp_enqueue_script( 'custom-login', get_template_directory_uri() . '/js/login.js', array('jquery'), '1.0', true);
}
add_action( 'login_enqueue_scripts', 'custom_login' );

add_action('admin_head', 'gateKeeper');

function gateKeeper() {
  echo '<style>
    #wp-auth-check-wrap #wp-auth-check {
    	background-color:#000000;
    	box-shadow:none;
    } 
    #wp-auth-check-wrap #wp-auth-check-bg{
	    opacity:1;
	    background:rgba(0, 0, 0, 0.7) !important;
	    -webkit-backdrop-filter: blur(6px) !important;
	}
  </style>';
}
?>
