<?php
/*
 * The main functions and definitions file of the theme.
 *
 * We can create hook, actions and bind to other plugins and child theme. 
 *
 * @theme Name: Event Listing
 * @theme URI: http://www.wp-eventmanager.com/theme/
 * @author: The GAM Team
 * @author URI: http://www.wp-eventmanager.com/
 * @copyright Copyright (C) 2017 WP Event Manager 
 * @license URI: http://www.gnu.org/licenses/gpl-2.0.html
 * @license: GNU General Public License v2 or later
 * @version: 1.5
 */


/**
 * Customizer additions.
 *
 */
require get_template_directory() . '/core/menu.php';

/**
 * Set up the content width value based on the theme's design.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 474;
}

if ( ! function_exists( 'event_listing_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails. *

 */
function event_listing_setup() {
    
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );
    
    add_theme_support( 'custom-logo' );
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on startup jobs, use a find and replace
	 * to change 'startup jobs' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'event-listing', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
		
	$background_args = array(
		'default-color' => '000000',
		'default-image' => '',
	);
	add_theme_support( 'custom-background', $background_args );
	
	$header_args = array(
			'flex-width'    => true,
			'width'         => 980,
			'flex-height'    => true,
			'height'        => 200,
			'default-image' =>  '',
	);
	add_theme_support( 'custom-header', $header_args );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	 register_nav_menus( array(
		'header-menu-primary' => __( 'Header Primary Menu','event-listing' ),
		'header-menu-user' => __( 'Header User Menu','event-listing' ),
	) ); 

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );


		
}
endif; // event_listing_setup
add_action( 'after_setup_theme', 'event_listing_setup' );

/*
 * Proper way to add/enqueue style to theme.
 */
function event_listing_add_theme_styles() 
{
  // Register the owl-carousel slider script for event listing theme:
  // The stylesheet file name is 'style.css' which is located at wp-content/themes/event-listing/style.css
  // it is appended to get_stylesheet_directory_uri() path - absolute server path (eg: /home/user/public_html/wp-content/themes/my_theme), not a URI.
  // Also we can use bloginfo (bloginfo( 'stylesheet_url' )) wordpress function that actually loads the stylesheet file of the theme root. startup-jobs/style.css. 
  // This is optional because we have put all styles in event-listing/css/style.css and we loaded with wp_enqueue_scripts at functions.php
  wp_enqueue_style( 'event-listing-style', get_stylesheet_uri());// enqueque the google fonts for event listing theme: 
  
  wp_enqueue_style( 'event-listing-google-fonts', 'http://fonts.googleapis.com/css?family=Roboto:400italic,700italic,500,300,700,400', false );
  
  wp_enqueue_script( "comment-reply" );
   
}
add_action( 'wp_enqueue_scripts', 'event_listing_add_theme_styles');

/**
 * Registers an editor stylesheet for the theme.
 */
function event_listing_theme_add_editor_styles() {
	if(is_admin()){
	 add_editor_style( 'event-listing-editor-style.css' );	
	}
}
add_action( 'after_setup_theme', 'event_listing_theme_add_editor_styles' );


/*
 * Proper way to load java script files based on custom page template. 
 * We can use is_page_template to check if you template is being used and load scripts based on that.
 *
 * For direct testing at page you can use this line: is_page() AND print get_page_template_slug( get_queried_object_id() );
 */
function event_listing_load_page_template_scripts() 
{	
	
	if(is_page( 'building-a-eventlisting-community'))
 	{
 	     wp_register_script( 'responsive-tabs-js', get_template_directory_uri() . '/js/responsive-tabs.js', array('jquery'));       
         wp_enqueue_script( 'responsive-tabs-js');    		    
    }
}
add_action('wp_enqueue_scripts', 'event_listing_load_page_template_scripts');

/**
 * Register widget area.
 *
 * @since Event Listing 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function event_listing_widgets_init() 
{
    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'event-listing' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s col-md-3">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    
	//register footer 1
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'event-listing' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your home area.', 'event-listing' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="footer-content" >',
		'after_widget'  => '</div></aside>',
		'before_title'  => '<h2 class="footer-title">',
		'after_title'   => '</h2>',
		) );
	
	//register footer 2
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'event-listing' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer area.', 'event-listing' ),
		'before_widget' => '<div class="footer-content">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="footer-title">',
		'after_title'   => '</div>',
		) );
		
	//register footer 3
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'event-listing' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer area.', 'event-listing' ),
		'before_widget' => '<div class="footer-content">',
		'after_widget'  => '</div>',
     	'before_title'  => '<div class="footer-title">',
		'after_title'   => '</div>',
		) );
		
	//register footer 4
	register_sidebar( array(
		'name'          => __( 'Footer 4', 'event-listing' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer area.', 'event-listing' ),
		'before_widget' => '<div class="footer-content">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="footer-title">',
		'after_title'   => '</div>',
		) );
		
	
}
add_action( 'widgets_init', 'event_listing_widgets_init' );

//Run shortcodes in widgets
add_filter('widget_text', 'do_shortcode');


 /* ******************************************************* Templates  related methods****************************************************************** */ 

/**
 * Get and include template files.
 *
 * @param mixed $template_name
 * @param array $args (default: array())
 * @param string $template_path (default: '')
 * @param string $default_path (default: '')
 * @return void
 */
function get_event_listing_template( $template_name, $args = array(), $template_path = 'page-templates', $default_path = '' ) 
{
	if ( $args && is_array( $args ) ) 
	{
		extract( $args );
	}
	
	include( locate_eventlisting_template( $template_name, $template_path, $default_path ) );
}

/**
 * Get template part (for templates in loops).
 *
 * @param string $slug
 * @param string $name (default: '')
 * @param string $template_path (default: 'page-templates')
 * @param string|bool $default_path (default: '') False to not load a default
 */
function get_event_listing_template_part( $slug, $name = '', $template_path = 'page-templates', $default_path = '' ) 
{
	$template = '';

	if ( $name ) {
		$template = locate_eventlisting_template( "{$slug}-{$name}.php", $template_path, $default_path );
	}

	// If template file doesn't exist, look in yourtheme/slug.php and yourtheme/page-templates/slug.php
	if ( ! $template ) {
		$template = locate_eventlisting_template( "{$slug}.php", $template_path, $default_path );
	}

	if ( $template ) 
	{
	        //load_template() is just the WordPress version of require()! It simply includes the PHP file into current file without checking file existence. 
	        //Require once the template file with WordPress environment.
	        //You must pass the full path to included file.
		load_template( $template, false );
	}
}


/**
 * Locate a template and return the path for inclusion.
 *
 * This is the load order:
 *
 *		yourtheme		/	$template_path	/	$template_name
 *		yourtheme		/	$template_name
 *		$default_path	/	$template_name
 *
 * @param string $template_name
 * @param string $template_path (default: 'page-templates')
 * @param string|bool $default_path (default: '') False to not load a default
 * @return string
 */
function locate_eventlisting_template( $template_name, $template_path = 'page-templates', $default_path = '' )
{
	// Look within passed path within the theme - this is priority
	// Retrieve the name of the highest priority template file that exists, optionally loading that file.	
	$template = locate_eventlisting_template(
					array(
						trailingslashit( $template_path ) . $template_name,
						$template_name
					     )
				    );	
	return 	$template;	
}


function default_filters() {
 // Enable shortcodes.
		//Add Filter
		add_filter('widget_text', 'do_shortcode');
}

/**
* CUSTOMIZER 
**/
add_action( 'customize_register', 'event_register_theme_customizer' );
/*
 * Register Our Customizer Stuff Here
 */
function event_listing_register_theme_customizer( $wp_customize ) {

	//Add Filter
	$wp_customize->add_filter('widget_text', 'do_shortcode');

 // Create custom panel.
 $wp_customize->add_panel( 'text_blocks', array(
 'priority' => 500,
 'theme_supports' => '',
 'title' => __( 'Copyright Text', 'event-listing' ),
 'description' => __( 'Set editable text for certain content.', 'event-listing' ),
 ) );
 // Add Footer Text
 // Add section.
 $wp_customize->add_section( 'custom_footer_text' , array(
 'title' => __('Change Footer Text','event-listing'),
 'panel' => 'text_blocks',
 'priority' => 10
 ) );
 
 // Add setting
 $wp_customize->add_setting( 'footer_text_block', array(
 'default' => __( 'default text', 'event-listing' ),
 'sanitize_callback' => 'event_listing_sanitize_text',
 'type'           => 'option',
 ) );
 
 // Add control
 $wp_customize->add_control( new WP_Customize_Control(
 $wp_customize,
 'custom_footer_text',
 array(
 'label' => __( 'Footer Text', 'event-listing' ),
 'section' => 'custom_footer_text',
 'settings' => 'footer_text_block[footer_text]',
 )
 )
 );
 // Sanitize text
 function event_listing_sanitize_text( $text ) {
 return sanitize_text_field( $text );
 }
}
?>