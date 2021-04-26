<?php
global $jws_option;
/** START --- Initialize the CMB2 Metabox & Related Classes */
require_once('cmb2_custom/conditionals/cmb2-conditionals.php'); //CMB2 Buttonset Field
require_once('cmb2_custom/image_select/image_select_metafield.php'); //CMB2 Buttonset Field

/**
 * Define the metabox and field configurations.
 */

function cmb2_sample_metaboxes4() {
	$cmb = new_cmb2_box( array(
		'id'            => 'teams_metabox',
		'title' => esc_html__( 'Teams Setting', 'ailab' ),
			'object_types' => array('teams'), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			) );
   $cmb->add_field( array(
	'name'    => 'Position',
	'desc'    => 'Position',
	'default' => 'SEO',
	'id'      => 'postion',
	'type'    => 'text',
    ) );
   $cmb->add_field( array(
	'name'    => 'Email Address',
	'desc'    => 'Email',
	'default' => 'abc@gmail.com',
	'id'      => 'email_address',
	'type'    => 'text',
    ) );
        
    $cmb->add_field( array(
	'name'    => 'Number Phone',
	'desc'    => 'Number Phone',
	'default' => '123 2323 3232',
	'id'      => 'number_phone',
	'type'    => 'text',
    ) );
    $group_field_id = $cmb->add_field( array(
        'id'          => 'social_media',
        'type'        => 'group',
        'description' => esc_html__( 'Social Media', 'ailab' ),
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => esc_html__( 'Info {#}', 'ailab' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => esc_html__( 'Add More Social Media', 'ailab' ),
            'remove_button'     => esc_html__( 'Remove Social Media', 'ailab' ),
            'sortable'          => true,
            // 'closed'         => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'ailab' ), // Performs confirmation before removing group.
            ),
        ) );
    $cmb->add_group_field( $group_field_id, array(
	'name'    => 'Icon',
	'desc'    => 'Input social media icon',
    'default' =>
            'fab fa-facebook-f',

	'id'      => 'social_media_icon_name',
	'type'    => 'text',
) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Link',
        'id'   => 'social_media_link',
        'default' =>
            'https://facebook.com',
           
        'type' => 'text',
        ) );
        
    // For Page
    $cmb = new_cmb2_box( array(
		'id'            => 'page_metabox',
		'title'         => esc_html__( '
		', 'ailab' ),
		'object_types'  => array('page'), // Post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
	) );
     $cmb->add_field( array(
    	'name' => 'Enable Chatbot',
    	'id'   => 'chatbot',
    	'type' => 'checkbox',
	) ); 
    $cmb->add_field( array(
    	'name' => 'Add script Chatbot',
    	'id'   => 'add_script_chatbot',
    	'type' => 'text',
        'attributes' => array(
			'chatbot'            => 1, // Will be required only if visible.

		),
	) ); 
    
    $cmb->add_field( array(
    	'name' => 'Enable Title Bar',
    	'id'   => 'title_bar_checkbox',
    	'type' => 'checkbox',
	) );    
	$cmb->add_field( array(
		'name'    => 'Custom Main Color',
		'id'      => 'custom_main_color',
		'type'    => 'colorpicker',
		'default' => '',
		'options' => array(
			'color' => false,
			),
		) );
	$args = array('post_type' => 'hf_template', 'posts_per_page' => -1);
	$loop = new WP_Query($args);
	if($loop->have_posts()) {  
		while($loop->have_posts()) : $loop->the_post();
			//
			$varID = get_the_id();
			$varName = get_the_title();
			$pageArray[$varID]=$varName;
		endwhile;
		wp_reset_postdata();   
	}else {
		$pageArray['null']=''; 
	}
	$cmb->add_field( array(
		'name'             => 'Select Header For Page',
		'id'               => 'page_select_header',
		'type'             => 'select',
		'show_option_none' => true,
		'options' => $pageArray
	) );
	$cmb->add_field( array(
		'name'             => 'Select Footer For Page',
		'id'               => 'page_select_footer',
		'type'             => 'select',
		'show_option_none' => true,
		'options' => $pageArray
	) );
/// Page color
    $cmb->add_field( array(
	'name'    => 'Button background gradient color start',
	'id'      => 'button_background_gradient_color_start',
    'desc' => 'Button background gradient color start.',
	'type'    => 'colorpicker',
	'default' => '',
    ) );
    $cmb->add_field( array(
	'name'    => 'Button background gradient color end',
	'id'      => 'button_background_gradient_color_end',
    'desc' => 'Button background gradient color end.',
	'type'    => 'colorpicker',
	'default' => '',
    ) );
    $cmb->add_field( array(
	'name'    => 'Button text gradient color start',
	'id'      => 'button_text_gradient_color_start',
    'desc' => 'Button text gradient color start.',
	'type'    => 'colorpicker',
	'default' => '',
    ) );
    $cmb->add_field( array(
	'name'    => 'Button text gradient color end',
	'id'      => 'button_text_gradient_color__end',
    'desc' => 'Button text gradient color end.',
	'type'    => 'colorpicker',
	'default' => '',
    ) );
    $cmb->add_field( array(
	'name'    => 'Main color',
	'id'      => 'main_color',
    'desc' => 'Main color apply for title, heading',
	'type'    => 'colorpicker',
	'default' => '',
    ) );
    $cmb->add_field( array(
	'name'    => 'Color apply for paragraphs',
	'id'      => 'paragraphs_color',
    'desc' => 'Color apply for paragraphs',
	'type'    => 'colorpicker',
	'default' => '',
    ) );
}
add_action( 'cmb2_init', 'cmb2_sample_metaboxes4' );
function cmb2_sample_metaboxes() {
	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box(array(
		'id'            => 'product_metabox',
		'title'         => esc_html__( 'Product Setting', 'ailab' ),
		'object_types'  => array('product'), // Post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		) );
	$cmb->add_field( array(
    	'name' => 'Product New',
    	'desc' => 'show new label in product grid',
    	'id'   => 'jws_new_label',
    	'type' => 'checkbox',
    ) );
}
add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );

//Service Icon
function cmb2_service_metaboxes() {
	/**
	 * Initiate the metabox
	 */
	// Classic CMB2 declaration
    $cmb = new_cmb2_box( array(
    	'id'           => 'prefix-metabox-id',
    	'title'        => __( 'Service Info','ailab' ),
    	'object_types' => array( 'services', ),
    ) );
    
    // Add new field
     $cmb->add_field( array(
      'name'    => 'Service Icon',
      'desc'    => 'Upload icon by svg, png/jpg file)',
      'id'      => 'service_icon',
      'type'    => 'file',
      // Optional:
      'options' => array(
        'url' => false, // Hide the text input for the url
      ),
      'text'    => array(
        'add_upload_file_text' => 'Add Icon' // Change upload button text. Default: "Add or Upload File"
      ),
      // query_args are passed to wp.media's library query.
      'query_args'   => array(
        'type' => array(
            'image/svg',
        ),
    ),
      'preview_size' => 'large', // Image size to use when previewing in the admin.
    ) );
}
add_action( 'cmb2_admin_init', 'cmb2_service_metaboxes' );
//Service Icon
function cmb2_case_study_metaboxes() {
	/**
	 * Initiate the metabox
	 */
	// Classic CMB2 declaration
    $cmb = new_cmb2_box( array(
    	'id'           => 'case_study_metabox',
    	'title'        => __( 'Case Study Info','ailab' ),
    	'object_types' => array( 'case_study', ),
    ) );
    
    // Add new field
     $cmb->add_field( array(
	'name' => 'Gallery',
	'desc' => '',
	'id'   => 'case_study_gallery',
	'type' => 'file_list',
	// 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	// 'query_args' => array( 'type' => 'image' ), // Only images attachment
	// Optional, override default text strings
	'text' => array(
		'add_upload_files_text' => 'Replacement', // default: "Add or Upload Files"
		'remove_image_text' => 'Replacement', // default: "Remove Image"
		'file_text' => 'Replacement', // default: "File:"
		'file_download_text' => 'Replacement', // default: "Download"
		'remove_text' => 'Replacement', // default: "Remove"
	),
) );
}
add_action( 'cmb2_admin_init', 'cmb2_case_study_metaboxes' );



function cmb2_sample_metaboxes5() {
	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box(array(
		'id'            => 'page_metabox',
		'title'         => esc_html__( 'Page Option', 'ailab' ),
		'object_types'  => array('page'), // Post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		) );
}
add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes5' );