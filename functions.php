<?php

/**
 * WRHS functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WRHS
 */

if (!defined('_S_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wrhs_setup()
{
  /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on WRHS, use a find and replace
		* to change 'wrhs' to the name of your theme in all the template files.
		*/
  load_theme_textdomain('wrhs', get_template_directory() . '/languages');

  // Add default posts and comments RSS feed links to head.
  add_theme_support('automatic-feed-links');

  /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
  add_theme_support('title-tag');

  /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
  add_theme_support('post-thumbnails');

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus(
    array(
      'menu-1' => esc_html__('Primary', 'wrhs'),
      'mobile' => esc_html__('Mobile', 'wrhs')
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
      'wrhs_custom_background_args',
      array(
        'default-color' => 'ffffff',
        'default-image' => '',
      )
    )
  );

  // Add theme support for selective refresh for widgets.
  add_theme_support('customize-selective-refresh-widgets');

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
add_action('after_setup_theme', 'wrhs_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wrhs_content_width()
{
  $GLOBALS['content_width'] = apply_filters('wrhs_content_width', 640);
}
add_action('after_setup_theme', 'wrhs_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wrhs_widgets_init()
{
  register_sidebar(
    array(
      'name'          => esc_html__('Sidebar', 'wrhs'),
      'id'            => 'sidebar-1',
      'description'   => esc_html__('Add widgets here.', 'wrhs'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
  register_sidebar(
    array(
      'name'          => 'Product Categories',
      'id'            => 'product_cat',
      'description'   => 'Goes at the top of the products page.',
      'before_widget' => '<section id="%1$s" class="widget %2$s product-categories">',
      'after_widget'  => '</section>',
    )
  );
  register_sidebar(
    array(
      'name'          => 'Footer Open Hours',
      'id'            => 'footer_open_hours',
      'description'   => 'Open hours to display in footer',
      'before_widget' => '<div id="%1$s" class="widget %2$s footer-open-hours">',
      'after_widget'  => '</div>',
    )
  );
}
add_action('widgets_init', 'wrhs_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function wrhs_scripts()
{
  wp_register_style('googleFonts', 'https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Roboto&display=swap');
  wp_enqueue_style('googleFonts');

  wp_enqueue_style('wrhs-style', get_template_directory_uri() . '/dist/css/main.css', array(), _S_VERSION);
  // wp_style_add_data('wrhs-style', 'rtl', 'replace');

  wp_enqueue_script('wrhs-main', get_template_directory_uri() . '/dist/js/main.js', array('jquery'), _S_VERSION);
  wp_enqueue_script('wrhs-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), _S_VERSION, true);
  wp_enqueue_script('fontAwesome', 'https://use.fontawesome.com/9d8ab229f9.js', array(), null, true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'wrhs_scripts');

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
 * Register WHRS Custom Post Type 
 */
require get_template_directory() . '/inc/register-cpt.php';
/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
  require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Custom excerpt length.
 */
function custom_excerpt_length($length)
{
  return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

/**
 * WP Event Manager Plugin
 * 
 * Set banner image to thumbnail image if banner image is not set.
 */
add_filter('event_manager_default_event_banner', 'your_theme_slug_default_event_banner');
function your_theme_slug_default_event_banner($image_path)
{

  $image_path = get_the_post_thumbnail_url();

  return $image_path;
}

/**
 * WP Event Manager Plugin
 * 
 * Remove register button. 
 */
function registration_disable($method, $post)
{
  return false;
}
add_filter('display_event_registration_method', 'registration_disable', 90, 2);
add_filter('get_event_registration_method', 'registration_disable', 90, 2);

/**
 * Rework WP login page
 */
function my_login_logo_url()
{
  return home_url();
}
add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo_url_title()
{
  return 'Your Site Name and Info';
}
add_filter('login_headertext', 'my_login_logo_url_title');

function my_login_logo()
{
  wp_enqueue_style('custom-login', get_stylesheet_directory_uri() . '/style-login.css');
}
add_action('login_enqueue_scripts', 'my_login_logo');

// Function to output SVG into text where file content would throw error
// function url_get_contents($url)
// {
//   if (!function_exists('curl_init')) {
//     die('CURL is not installed!');
//   }
//   $ch = curl_init();
//   curl_setopt($ch, CURLOPT_URL, $url);
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//   $output = curl_exec($ch);
//   curl_close($ch);
//   return $output;
// }
