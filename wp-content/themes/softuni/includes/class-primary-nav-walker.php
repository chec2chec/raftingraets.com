<?php

class Primary_Nav_Walker extends Walker_Nav_Menu {
    // Add classes to ul sub-menus
    function start_lvl( &$output, $depth = 0, $args = null ) {
        // Depth-dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent

        // Build HTML for output
        $output .= "\n" . $indent . '<div class="dropdown-menu border-0 rounded-0 m-0">' . "\n";
    }

    // Add main/sub classes to li's and links
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        // Depth-dependent classes
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
        $depth_classes = array(
            ( $depth == 0 ? 'nav-item' : 'dropdown-item' ),
            ( $depth > 0 ? 'dropdown-submenu' : '' ),
            ( $item->is_dropdown && $depth == 0 ? 'dropdown' : '' )
        );
        $depth_class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $depth_classes ), $item, $args, $depth ) );

        // Passed classes
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = ' class="' . esc_attr( $depth_class_names . ' ' . $class_names ) . '"';

        // Build HTML for output
        $output .= $indent . '<a href="' . $item->url . '" class="nav-link' . ( $depth == 0 && $item->is_dropdown ? ' dropdown-toggle' : '' ) . '" data-toggle="dropdown">' . $item->title . '</a>' . "\n";
    }
}    
