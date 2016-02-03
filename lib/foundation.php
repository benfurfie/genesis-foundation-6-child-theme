<?php
// Remove standard Genesis header and replace it with Foundation's top bar

// Replace the internal content of the top-bar
remove_action( 'genesis_header', 'genesis_do_header' );
add_action( 'genesis_header', 'foundation_do_header' );

// Replace the standard site-header class with foundation's top-bar
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
add_action( 'genesis_header', 'foundation_header_markup_open', 5 );

function foundation_header_markup_open() {

	genesis_markup( array(
		'html5'   => '<header %s>',
		'xhtml'   => '<div id="header">',
		'context' => 'top-bar',
	) );

	genesis_structural_wrap( 'header' );

}

function foundation_do_header() {

	global $wp_registered_sidebars;

	genesis_markup( array(
		'html5' => '<div %s>',
		'xhtml'   => '<div class="top-bar-left">',
		'context' => 'top-bar-left',
	) );
		do_action( 'genesis_site_title' );
		do_action( 'genesis_site_description' );
	echo '</div>';

	if ( ( isset( $wp_registered_sidebars['header-right'] ) && is_active_sidebar( 'header-right' ) ) || has_action( 'genesis_header_right' ) ) {

		genesis_markup( array(
			'html5'   => '<div %s>' . genesis_sidebar_title( 'header-right' ),
			'context' => 'top-bar-right',
		) );

			do_action( 'genesis_header_right' );
			add_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
			add_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );
			dynamic_sidebar( 'header-right' );
			remove_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
			remove_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );

		echo '</div>';

	}

}

remove_action( 'genesis_after_header', 'genesis_do_nav' );
function foundation_do_nav() {

	//* Do nothing if menu not supported
	if ( ! genesis_nav_menu_supported( 'primary' ) || ! has_nav_menu( 'primary' ) )
		return;

	$class = 'menu';
	if ( genesis_superfish_enabled() ) {
		$class .= ' js-superfish';
	}

	if ( genesis_a11y( 'headings' ) ) {
		printf( '<h2 class="screen-reader-text">%s</h2>', __( 'Main navigation', 'genesis' ) );
	}

	genesis_nav_menu( array(
		'theme_location' => 'primary',
		'menu_class'     => $class,
	) );

}
add_action( 'genesis_header', 'foundation_do_nav', 12 );

remove_filter( 'genesis_attr_nav-primary', 'genesis_skiplinks_attr_nav_primary' );
add_filter( 'genesis_attr_nav-primary', 'foundation_skiplinks_attr_nav_primary' );
function foundation_skiplinks_attr_nav_primary( $attributes ) {
	$attributes['id'] = 'foundation-menu';
	$attributes['class'] = 'top-bar-right';
	$attributes['aria-label'] = __( 'Main navigation', 'genesis' );
	return $attributes;
}
