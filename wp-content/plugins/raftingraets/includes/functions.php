<?php

/** 
 * Load the plugin assets
 */
function rafting_raets_plugin_enqueue_assets() {
    $args = array();
    wp_enqueue_script(
        'rafting-raets-assets-plugin',
        RAFTING_RAETS_PLUGIN_ASSETS_DIR . '/js/scripts.js',
        array( 'jquery' ), 
        '1.1', 
        $args
    );

    wp_localize_script( 'rafting-raets-assets-plugin', 'my_ajax_object',
		array( 
			'ajax_url' => admin_url( 'admin-ajax.php' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'rafting_raets_plugin_enqueue_assets' );

/** 
 * Custom post type filter
 */
function custom_post_content_filter($content) {
  if (is_singular('offers')) {
      $content .= '<div id="offer-result"><a href="#" id="offer-info-btn" data-post-id="' . get_the_ID() . '" class="btn btn-primary btn-block">Още информация</a></div>';
  }
  return $content;
}
add_filter('the_content', 'custom_post_content_filter');

/** 
 * Custom meta box
 */
function add_custom_meta_box() {
  add_meta_box(
      'offer_meta_box',
      'Offer Settings',
      'render_offer_meta_box',
      'offers',
      'normal',
      'high'
  );
}
add_action( 'add_meta_boxes', 'add_custom_meta_box' );

function render_offer_meta_box( $post ) {
  $is_hot = get_post_meta( $post->ID, 'is_hot', true );
  ?>
  <label for="is_hot">Is Hot?</label>
  <input type="checkbox" name="is_hot" id="is_hot" <?php checked( $is_hot, 'on' ); ?>>
  <?php
}

function save_offer_meta_data( $post_id ) {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return;
  }

  if ( isset( $_POST['is_hot'] ) ) {
      update_post_meta( $post_id, 'is_hot', 'on' );
  } else {
      delete_post_meta( $post_id, 'is_hot' );
  }
}
add_action( 'save_post', 'save_offer_meta_data' );

/**
 * Add Shortcode
 * 
 * example usage: [page id="123"]
 */
function custom_page_shortcode($atts) {
  $atts = shortcode_atts(array(
      'id' => '', // Default page ID
  ), $atts, 'page');

  $page = get_post($atts['id']);

  if ($page && $page->post_type == 'page') {
      $output = '<div class="row">';
      $output .= '<div class="col-lg-4">';
      $output .= '<div class="position-relative h-100">';
      if ( has_post_thumbnail($page->ID) ) {
        $output .= $page->the_post_thumbnail( 'large' );
      } else {
        $output .= '<img src="' . get_template_directory_uri() . '/clipart/logo-square.png" width="400" alt="Custom Image">';
      }
      $output .= '</div>';
      $output .= '</div>';
      
      $output .= '<div class="col-lg-8 pt-5 pb-lg-5">';
      $output .= '<div class="about-text bg-white p-4 p-lg-5 my-lg-5">';
      $output .= '<h1>' . esc_html($page->post_title) . '</h1>';
      $output .= apply_filters('the_content', $page->post_content);
      $output .= '</div>';
      $output .= '</div>';
      $output .= '</div>';
      return $output;
  } else {
      return 'Page not found.';
  }
}
add_shortcode('page', 'custom_page_shortcode');

/**
 * AJAX
 */
add_action('wp_ajax_get_acf_field', 'get_acf_field_callback');
add_action('wp_ajax_nopriv_get_acf_field', 'get_acf_field_callback');

function get_acf_field_callback() {
    $post_id = $_POST['post_id'];

    // Retrieve ACF field value
    $acf_field_value = get_field('offer-info', $post_id);

    // Return the ACF field value as JSON
    wp_send_json($acf_field_value);

    // Don't forget to exit
    wp_die();
}

/**
 * Add the top level menu page.
 */
function rafting_raets_options_page() {
	add_menu_page(
		'Rafting Options',
		'Rafting Options',
		'manage_options',
		'raftingraets-options',
		'raftingraets_options_page_html'
	);
}
/**
 * Register our softuni_options_page to the admin_menu action hook.
 */
add_action( 'admin_menu', 'rafting_raets_options_page' );

function raftingraets_options_page_html() {
    include RAFTING_RAETS_PLUGIN_INCLUDES_DIR . '/options-page.php';
}