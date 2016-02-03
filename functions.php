<?php
// Start the engine
include_once( get_template_directory() . '/lib/init.php' );

// Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Foundation Starter' );
define( 'CHILD_THEME_URL', 'http://www.benfurfie.co.uk/' );
define( 'CHILD_THEME_VERSION', '2.2.2' );

get_template_part( 'lib/walker' );

// Enqueue Google Fonts

function genesis_sample_google_fonts() {

	wp_enqueue_style( 'foundation', get_stylesheet_directory_uri() . '/css/app.css', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );

}
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );

function load_foundation_javascript() {
	wp_enqueue_script( 'foundation-script', get_bloginfo( 'stylesheet_directory' ) . '/js/app.js', array( 'jquery' ), '1.0.0', TRUE );
}
add_action( 'wp_enqueue_scripts', 'load_foundation_javascript' );

// Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

// Add Accessibility support
add_theme_support( 'genesis-accessibility', array( 'headings', 'drop-down-menu',  'search-form', 'skip-links', 'rems' ) );

// Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

// Add support for custom background
add_theme_support( 'custom-background' );

// Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

// Remove .wrap from menu-primary or other element by omitting them from the array below
 add_theme_support( 'genesis-structural-wraps', array( 'menu-secondary', 'footer-widgets', 'footer' ) );

// Call Foundation relevant code
get_template_part( '/lib/foundation' );

// Call sidebars
get_template_part( '/lib/sidebars' );






add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

function foundation_sidebar_checks() {
  // Hero Section
  if( is_active_sidebar( 'hero') ) {
    add_action( 'genesis_after_header', 'foundation_do_hero' );
  }
  // Content
  if( is_active_sidebar ( 'content' ) && is_front_page() ) {
		remove_action( 'genesis_loop', 'genesis_do_loop' );
    add_action( 'genesis_loop', 'foundation_do_content' );
  }
  // Above Footer
  if( is_active_sidebar( 'above_footer') ) {
    add_action( 'genesis_before_footer', 'foundation_do_above_footer' );
  }
}
add_action( 'genesis_meta', 'foundation_sidebar_checks' );

function foundation_do_hero() {
  genesis_widget_area( 'hero', array(
    'before' => '<div id="hero" class="row hero" style="background-image:url(' . get_stylesheet_directory_uri() . '/images/bg.jpg);"><div class="hero--inner"><div class="small-12 columns">',
    'after'  => '</div></div></div>',
  ) );
}

function foundation_do_content() {
  genesis_widget_area( 'content', array(
    'before' => '<div id="content" class="row content"><div class="small-12 columns">',
    'after'  => '</div></div>',
  ) );
}

function foundation_do_above_footer() {
  genesis_widget_area( 'above_footer', array(
    'before' => '<div id="above-footer" class="row above-footer"><div class="above-footer--inner"><div class="small-12 columns">',
    'after'  => '</div></div></div>',
  ) );
}

//* Reposition the primary navigation menu
// remove_action( 'genesis_after_header', 'genesis_do_nav' );
// add_action( 'genesis_header', 'genesis_do_nav', 12 );
