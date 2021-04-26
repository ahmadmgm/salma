<?php // Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

    function jws_register_services() {
		$labels = array(
			'name'                => _x( 'services', 'Post Type General Name', 'ailab' ),
			'singular_name'       => _x( 'services', 'Post Type Singular Name', 'ailab' ),
			'menu_name'           => esc_html__( 'Services', 'ailab' ),
			'parent_item_colon'   => esc_html__( 'Parent Item:', 'ailab' ),
			'all_items'           => esc_html__( 'All Items', 'ailab' ),
			'view_item'           => esc_html__( 'View Item', 'ailab' ),
			'add_new_item'        => esc_html__( 'Add New Item', 'ailab' ),
			'add_new'             => esc_html__( 'Add New', 'ailab' ),
			'edit_item'           => esc_html__( 'Edit Item', 'ailab' ),
			'update_item'         => esc_html__( 'Update Item', 'ailab' ),
			'search_items'        => esc_html__( 'Search Item', 'ailab' ),
			'not_found'           => esc_html__( 'Not found', 'ailab' ),
			'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'ailab' ),
		);

		$args = array(
			'label'               => esc_html__( 'services', 'ailab' ),
		    'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail','page-attributes', 'post-formats', ),
            'taxonomies'          => array( 'services_cat' ),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-money',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
		);


        if(function_exists('custom_reg_post_type')){
        	custom_reg_post_type( 'services', $args );
        }

		/**
		 * Create a taxonomy category for services
		 *
		 * @uses  Inserts new taxonomy object into the list
		 * @uses  Adds query vars
		 *
		 * @param string  Name of taxonomy object
		 * @param array|string  Name of the object type for the taxonomy object.
		 * @param array|string  Taxonomy arguments
		 * @return null|WP_Error WP_Error if errors, otherwise null.
		 */
		
		$labels = array(
			'name'					=> _x( 'services Categories', 'Taxonomy plural name', 'ailab' ),
			'singular_name'			=> _x( 'services Category', 'Taxonomy singular name', 'ailab' ),
			'search_items'			=> esc_html__( 'Search Categories', 'ailab' ),
			'popular_items'			=> esc_html__( 'Popular services Categories', 'ailab' ),
			'all_items'				=> esc_html__( 'All services Categories', 'ailab' ),
			'parent_item'			=> esc_html__( 'Parent Category', 'ailab' ),
			'parent_item_colon'		=> esc_html__( 'Parent Category', 'ailab' ),
			'edit_item'				=> esc_html__( 'Edit Category', 'ailab' ),
			'update_item'			=> esc_html__( 'Update Category', 'ailab' ),
			'add_new_item'			=> esc_html__( 'Add New Category', 'ailab' ),
			'new_item_name'			=> esc_html__( 'New Category', 'ailab' ),
			'add_or_remove_items'	=> esc_html__( 'Add or remove Categories', 'ailab' ),
			'choose_from_most_used'	=> esc_html__( 'Choose from most used text-domain', 'ailab' ),
			'menu_name'				=> esc_html__( 'Category', 'ailab' ),
		);
	
		$args = array(
			'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'services_cat' ),
		);
        

        if(function_exists('custom_reg_taxonomy')){
            custom_reg_taxonomy( 'services_cat', array( 'services' ), $args  );
        }
        
        $labels = array(
            'name' => esc_html__( 'Tags', 'ailab' ),
            'singular_name' => esc_html__( 'Tag',  'ailab'  ),
            'search_items' =>  esc_html__( 'Search Tags' , 'ailab' ),
            'popular_items' => esc_html__( 'Popular Tags' , 'ailab' ),
            'all_items' => esc_html__( 'All Tags' , 'ailab' ),
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => esc_html__( 'Edit Tag' , 'ailab' ), 
            'update_item' => esc_html__( 'Update Tag' , 'ailab' ),
            'add_new_item' => esc_html__( 'Add New Tag' , 'ailab' ),
            'new_item_name' => esc_html__( 'New Tag Name' , 'ailab' ),
            'separate_items_with_commas' => esc_html__( 'Separate tags with commas' , 'ailab' ),
            'add_or_remove_items' => esc_html__( 'Add or remove tags' , 'ailab' ),
            'choose_from_most_used' => esc_html__( 'Choose from the most used tags' , 'ailab' ),
            'menu_name' => esc_html__( 'Tags','ailab'),
        ); 
    
        $args = array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'rewrite' => array( 'slug' => 'services_tag' ),
        );
        
        if(function_exists('custom_reg_taxonomy')){
            custom_reg_taxonomy( 'services_tag', array( 'services' ), $args  );
        }

	};
add_action( 'init', 'jws_register_services', 1 );