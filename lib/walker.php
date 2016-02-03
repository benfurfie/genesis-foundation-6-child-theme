<?php
/**
 * Top Bar Walker
 *
 * @since 1.0.0
 */
class Top_Bar_Walker extends Walker_Nav_Menu {
  /**
    * @see Walker_Nav_Menu::start_lvl()
   * @since 1.0.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param int $depth Depth of page. Used for padding.
  */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "\n<ul class=\"sub-menu dropdown\">\n";
    }

    /**
     * @see Walker_Nav_Menu::start_el()
     * @since 1.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param object $args
     */

    function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
        $item_html = '';
        parent::start_el( $item_html, $object, $depth, $args );

        $output .= ( $depth == 0 ) ? '<li class="divider"></li>' : '';

        $classes = empty( $object->classes ) ? array() : ( array ) $object->classes;

        if ( in_array('label', $classes) ) {
            $item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '<label>$1</label>', $item_html );
        }

    if ( in_array('divider', $classes) ) {
      $item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '', $item_html );
    }

        $output .= $item_html;
    }

  /**
     * @see Walker::display_element()
     * @since 1.0.0
   *
   * @param object $element Data object
   * @param array $children_elements List of elements to continue traversing.
   * @param int $max_depth Max depth to traverse.
   * @param int $depth Depth of current element.
   * @param array $args
   * @param string $output Passed by reference. Used to append additional content.
   * @return null Null on failure with no changes to parameters.
   */
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $element->has_children = !empty( $children_elements[$element->ID] );
        $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
        $element->classes[] = ( $element->has_children ) ? 'has-dropdown' : '';

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}

function foundation_nav() {
	wp_nav_menu( array(
		'walker' => new Top_Bar_Walker()
	));
}
