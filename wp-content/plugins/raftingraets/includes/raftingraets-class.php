<?php
if ( ! class_exists( 'Rafting_Raets_Cpt' ) ) :

class Rafting_Raets_Cpt {

    function __construct() {

        add_action( 'init', array( $this, 'raftingraets_cpt') );
        add_action( 'init', array( $this, 'raftingraets_activities_category_taxonomy' ), 0 );
    }

    /**
	 * Register our RaftingRaets Custom Post Type
	 *
	 * @return void
	 */
	public function raftingraets_cpt() {
		$labels = array(
			'name'                  => _x( 'Rafting Offers', 'Post type general name', 'raets' ),
			'singular_name'         => _x( 'Offer', 'Post type singular name', 'raets' ),
			'menu_name'             => _x( 'Rafting Offers', 'Admin Menu text', 'raets' ),
			'name_admin_bar'        => _x( 'Rafting Offer', 'Add New on Toolbar', 'raets' ),
			'add_new'               => __( 'Add New', 'raets' ),
			'add_new_item'          => __( 'Add New Offer', 'raets' ),
			'new_item'              => __( 'New Offer', 'raets' ),
			'edit_item'             => __( 'Edit Offer', 'raets' ),
			'view_item'             => __( 'View Offer', 'raets' ),
			'all_items'             => __( 'All Offers', 'raets' ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'revisions',
			),
			'show_in_rest'       => true
		);

		register_post_type( 'offers', $args );
	}

  /**
	 * Register our Activities taxonomy for our RaftingRaets CPT
	 *
	 * @return void
	 */
	public function raftingraets_activities_category_taxonomy () {
		$labels = array(
			'name'                       => _x( 'Activities', 'Activities General Name', 'raets' ),
			'singular_name'              => _x( 'Activities', 'Taxonomy Singular Name', 'raets' ),
			'menu_name'                  => __( 'Activity', 'raets' ),
			'all_items'                  => __( 'All Items', 'raets' ),
			'parent_item'                => __( 'Parent Item', 'raets' ),
			'parent_item_colon'          => __( 'Parent Item:', 'raets' ),
			'new_item_name'              => __( 'New Item Name', 'raets' ),
			'add_new_item'               => __( 'Add New Item', 'raets' ),
			'edit_item'                  => __( 'Edit Item', 'raets' ),
			'update_item'                => __( 'Update Item', 'raets' ),
			'view_item'                  => __( 'View Item', 'raets' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'raets' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'raets' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'raets' ),
			'popular_items'              => __( 'Popular Items', 'raets' ),
			'search_items'               => __( 'Search Items', 'raets' ),
			'not_found'                  => __( 'Not Found', 'raets' ),
			'no_terms'                   => __( 'No items', 'raets' ),
			'items_list'                 => __( 'Items list', 'raets' ),
			'items_list_navigation'      => __( 'Items list navigation', 'raets' ),
	  );

		$args = array(
			'labels'       => $labels,
			'show_in_rest' => true,
			'hierarchical' => true,
		);

		register_taxonomy( 'activities', 'offers', $args );
	}

}

$raftingraets_cpt = new Rafting_Raets_Cpt;
flush_rewrite_rules();

endif;