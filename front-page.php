<?php
/**
 * This file adds the Front Page to the theme.
 *
 * @author Ben Furfie
 * @package Genesis Foundation
 * @subpackage Customizations
 */

function foundation_body_class( $classes ) {
  $classes[] = 'front-page';
  return $classes;
}

function foundation_front_page_meta() {
  add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
  remove_action( 'genesis_loop', 'genesis_do_loop' );
  add_action( 'genesis_loop', 'foundation_do_loop' );
}
// add_action( 'genesis_meta', 'foundation_front_page_meta' );

function foundation_do_loop() {
  ?>
    <div class="row">
      <div class="small-12 columns">
        <h1>Hello World!</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <a href="#" class="button">Click here</a>
      </div>
    </div>
    <div class="row">
      <?php genesis_widget_area( 'front-page-1', array(
        'before' => '<div class="small-4 columns">',
        'after' => '</div>'
      ) ); ?>
    </div>
  <?php
}

genesis();
