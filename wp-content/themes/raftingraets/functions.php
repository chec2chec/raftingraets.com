<?php

// Instantiate the custom menu walker
if ( ! class_exists( 'Primary_Nav_Walker' ) ) {
    require_once get_template_directory() . '/includes/class-primary-nav-walker.php';
}

// function remove_ul ( $menu ){
//     return preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
// }
// add_filter( 'wp_nav_menu', 'remove_ul' );

function softuni_assets( $hook ) {
    $version = date('YmdHis');
	// create my own version codes
    wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css' );

    $args = array( 
        'in_footer' => true,
        'strategy'  => 'defer',
    );

	wp_enqueue_script( 'bootstrap-min-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0.0', $args );
    
    wp_enqueue_style( 'style.css', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'owl.carousel.min.css', get_template_directory_uri() . '/lib/owlcarousel/assets/owl.carousel.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'tempusdominus-bootstrap-4.min.css', get_template_directory_uri() . '/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css', array(), '1.0.0', 'all' );

    wp_enqueue_style ('custom.css', get_template_directory_uri().'/custom.css', array(), $version, 'all' );
}
add_action( 'wp_enqueue_scripts', 'softuni_assets' );

/**
 * Register our navigation menus
 *
 * @return void
 */
function softuni_register_nav_menus() {
	register_nav_menus(
		array(
			'primary_menu'      => __( 'Primary Menu', 'softuni' ),
			'secondary_menu'  => __( 'Secondary Menu', 'softuni' ),
			// 'important_links'   => __( 'Important Links', 'softuni' ),
            // 'latest_services'   => __( 'Latest Services', 'softuni' )
		)
	);

    // Use the custom walker for the primary navigation menu
    add_filter( 'wp_nav_menu_args', 'custom_nav_menu_args' );
    function custom_nav_menu_args( $args ) {
        $args['walker'] = new Primary_Nav_Walker();
        return $args;
    }
}
add_action( 'after_setup_theme', 'softuni_register_nav_menus' );

/**
 * Disable Gutenberg on the back end.
 *
 *
 */
add_filter( 'use_block_editor_for_post', '__return_false' );

// Disable Gutenberg for widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );

add_action( 'wp_enqueue_scripts', function() {
    // Remove CSS on the front end.
    wp_dequeue_style( 'wp-block-library' );

    // Remove Gutenberg theme.
    wp_dequeue_style( 'wp-block-library-theme' );

    // Remove inline global CSS on the front end.
    wp_dequeue_style( 'global-styles' );
}, 20 );