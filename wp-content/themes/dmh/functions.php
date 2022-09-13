<?php
/**
 * dmh functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dmh
 */

if ( ! function_exists( 'dmh_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dmh_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'dmh' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'dmh', get_template_directory() . '/languages' );

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

	add_image_size( 'dmh-featured-image', 640, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'stacked' => esc_html__( 'Navbar Stacked', 'dmh' ),
	) );

	/**
	 * Add support for core custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 200,
		'width'       => 200,
		'flex-width'  => true,
		'flex-height' => true,
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dmh_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'dmh_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dmh_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dmh_content_width', 640 );
}
add_action( 'after_setup_theme', 'dmh_content_width', 0 );

/**
 * Return early if Custom Logos are not available.
 *
 * @todo Remove after WP 4.7
 */
function dmh_the_custom_logo() {
	if ( ! function_exists( 'the_custom_logo' ) ) {
		return;
	} else {
		the_custom_logo();
	}
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dmh_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dmh' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'dmh_widgets_init' );





/**
 * Enqueue scripts and styles.
 */
function dmh_scripts(){

	wp_enqueue_style( 'dmh-style', get_stylesheet_uri() );

	wp_enqueue_style( 'pace', get_theme_file_uri('/assets/plugins/pace/templates/pace-theme.css'), array('dmh-style'), '20151215' );
	wp_enqueue_style( 'bootstrap', get_theme_file_uri('/assets/plugins/bootstrap/bootstrap.min.css'), array('dmh-style'), '20151215' );
	wp_enqueue_style( 'nitro', get_theme_file_uri('/assets/css/nitro.min.css'), array('dmh-style'), '20151215' );
	wp_enqueue_style( 'aos', get_theme_file_uri('/assets/plugins/aos/aos.css'), array('dmh-style'), '20151215' );
	wp_enqueue_style( 'fontawesome', get_theme_file_uri('assets/icons/fontawesome/css/font-awesome.min.css'), array('dmh-style'), '20151215' );
	wp_enqueue_style( 'owl-carousel', get_theme_file_uri('/assets/plugins/owl/owl.carousel.min.css'), array('dmh-style'), '20151215' );
	wp_enqueue_style( 'animate', get_theme_file_uri('/assets/plugins/animate/animate.min.css'), array('dmh-style'), '20151215' );

	wp_enqueue_style( 'dmh', get_theme_file_uri('/assets/css/dmh.min.css'), array('dmh-style'), '20151215' );


	// Load the html5 shiv.
	wp_enqueue_script( 'smpx-html5', 'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js', array(), '3.7.3' );
	wp_enqueue_script( 'smpx-html5', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', array(), '1.4.2' );
	wp_script_add_data( 'smpx-html5', 'conditional', 'lt IE 9' );



	wp_enqueue_script( 'pace', get_template_directory_uri() .'/assets/plugins/pace/pace.min.js', array(), '20151215', true );

	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', get_template_directory_uri() .'/assets/plugins/jquery/jquery.2.1.4.min.js', array(), '20151215', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() .'/assets/plugins/bootstrap/bootstrap.min.js', array(), '20151215', true );
	wp_enqueue_script( 'nitro', get_template_directory_uri() .'/assets/js/nitro.min.js', array(), '20151215', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() .'/assets/plugins/owl/owl.carousel.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'aos', get_template_directory_uri() .'/assets/plugins/aos/aos.js', array(), '20151215', true );
	wp_enqueue_script( 'project', get_template_directory_uri() .'/assets/js/project.js', array(), '20151215', true );

}

add_action( 'wp_enqueue_scripts', 'dmh_scripts' );




// WALKER
require get_template_directory().'/components/navigation/nav-stacked.php';

// API MENU
require get_template_directory().'/components/navigation/api-menu.php';





/*---------------------------------------------*/
/*	OPTIONS PAGE
/*---------------------------------------------*/
if( function_exists('acf_add_options_page') ){
	acf_add_options_page(array(
		'page_title' 	=> 'DMH Options',
		'menu_title'	=> 'DMH Options',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}







/*---------------------------------------------*/
/*	GET DAY
/*---------------------------------------------*/
function dateES($day){

	if ($day == 'Monday') $day = 'Lunes';
	if ($day == 'Tuesday') $day = 'Martes';
	if ($day == 'Wednesday') $day = 'Miércoles';
	if ($day == 'Thursday') $day = 'Jueves';
	if ($day == 'Friday') $day = 'Viernes';
	if ($day == 'Saturday') $day = 'Sabado';
	if ($day == 'Sunday') $day = 'Domingo';
	
	if ($day == 'January') $day = 'Enero';
	if ($day == 'February') $day = 'Febrero';
	if ($day == 'March') $day = 'Marzo';
	if ($day == 'April') $day = 'Abril';
	if ($day == 'May') $day = 'Mayo';
	if ($day == 'June') $day = 'Junio';
	if ($day == 'July') $day = 'Julio';
	if ($day == 'August') $day = 'Agosto';
	if ($day == 'September') $day = 'Setiembre';
	if ($day == 'October') $day = 'Octubre';
	if ($day == 'November') $day = 'Noviembre';
	if ($day == 'December') $day = 'Diciembre';

	return $day;

}




// DMH SIDEBARS
function dmh_sidebars() {
	register_sidebar( array(
		'name'          => 'Footer 1',
		'id'            => 'footer-1',
		'description'   => 'Primer columna del footer',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );


	register_sidebar( array(
		'name'          => 'Footer 2',
		'id'            => 'footer-2',
		'description'   => 'Segunda columna del footer',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );


	register_sidebar( array(
		'name'          => 'Small navbar (footer)',
		'id'            => 'footer-small-nav',
		'description'   => 'Navegación secundaria en footer',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}

add_action( 'widgets_init', 'dmh_sidebars' );
















