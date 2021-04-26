<?php // Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
class jws_Admin {
    
	/**
	 * Current theme template
	 *
	 * @var String
	 */
	public $template;

	/**
	 * Instance of Elemenntor Frontend class.
	 *
	 * @var \Elementor\Frontend()
	 */
	private static $elementor_instance;
	/**
	 * Constructor
	 */
	function __construct() {

		$this->template = get_template();

		if ( defined( 'ELEMENTOR_VERSION' ) && is_callable( 'Elementor\Plugin::instance' ) ) {

	        self::$elementor_instance = Elementor\Plugin::instance();   
            add_action('init', array( $this, 'jws_register__header_blocks'));  
            // Add shortcode column to block list
            add_filter('manage_edit-hf_template_columns', array( $this, 'jws_edit_heading_header_columns'));
            add_action('manage_hf_template_posts_custom_column', array( $this,'jws_create_shortcode_header_vc'), 10, 2);
            add_action( 'template_redirect',array( $this, 'block_template_frontend' ));
            if(function_exists('insert_shortcode')) {
                insert_shortcode('hf_template', array( $this, 'jws_get_content_header_block' ));
            }
            add_filter( 'single_template', array( $this, 'load_edit_template'  ));

		} 

	} 
    
    /**
	 * Single template function which will choose our template
	 *
	 * @since  1.0.1
	 *
	 * @param  String $single_template Single template.
	 */
	function load_edit_template( $single_template ) {

		global $post;

		if ( 'hf_template' == $post->post_type ) {

			$elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

			if ( file_exists( $elementor_2_0_canvas ) ) {
				return $elementor_2_0_canvas;
			} else {
				return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
			}
		}

		return $single_template;
	}
    
    
    function jws_register__header_blocks()
    {
        $labels = array(
            'name' => _x('Header Footers Template', 'Post Type General Name', 'ailab'),
            'singular_name' => _x('Header Footers Template', 'Post Type Singular Name', 'ailab'),
            'menu_name' => esc_html__('Header Footers Template', 'ailab'),
            'parent_item_colon' => esc_html__('Parent Item:', 'ailab'),
            'all_items' => esc_html__('All Item', 'ailab'),
            'view_item' => esc_html__('View Item', 'ailab'),
            'add_new_item' => esc_html__('Add New Item', 'ailab'),
            'add_new' => esc_html__('Add New', 'ailab'),
            'edit_item' => esc_html__('Edit Item', 'ailab'),
            'update_item' => esc_html__('Update Item', 'ailab'),
            'search_items' => esc_html__('Search Item', 'ailab'),
            'not_found' => esc_html__('Not found', 'ailab'),
            'not_found_in_trash' => esc_html__('Not found in Trash', 'ailab'),
        );
    
        $args = array(
            'label' => esc_html__('Header Footers Template', 'ailab'),
            'description' => esc_html__('Elemetor content for custom HTML to place in your pages', 'ailab'),
            'labels' => $labels,
            'menu_position' => 29,
            'menu_icon' => 'dashicons-tagcloud',
            'publicly_queryable' => true,
            	'public'              => true,
    			'show_ui'             => true,
    			'show_in_menu'        => true,
    			'show_in_nav_menus'   => true,
    			'exclude_from_search' => true,
    			'capability_type'     => 'page',
    			'hierarchical'        => false,
    			'supports'            => array( 'title', 'thumbnail', 'ailab' ),
            
        );
        if(function_exists('custom_reg_post_type')) {
            custom_reg_post_type('hf_template', $args);
        }
    
    }
    function jws_edit_heading_header_columns($columns)
    {
        
            $columns = array(
                'cb' => '<input type="checkbox" />',
                'title' => esc_html__('Title', 'ailab'),
                'shortcode' => esc_html__('Shortcode', 'ailab'),
                'date' => esc_html__('Date', 'ailab'),
            );
        
            return $columns;
    }
        
    function jws_create_shortcode_header_vc($column, $post_id)
        {
            switch ($column) {
                case 'shortcode' :
                    echo '<strong>[hf_template id="' . $post_id . '"]</strong>';
                    break;
            }
    }
    
    function block_template_frontend() {
    		if ( is_singular( 'hf_template' ) && ! current_user_can( 'edit_posts' ) ) {
    			wp_redirect( site_url(), 301 );
    			die;
    		}
    }
    function jws_get_content_header_block($atts) {
       	$atts = shortcode_atts(
			array(
				'id' => '',
			),
			$atts,
			'hf_template'
		);

		$id = ! empty( $atts['id'] ) ? apply_filters( 'hfe_render_template_id', intval( $atts['id'] ) ) : '';

		if ( empty( $id ) ) {
			return '';
		}

		if ( class_exists( '\Elementor\Core\Files\CSS\Post' ) ) {
			$css_file = new \Elementor\Core\Files\CSS\Post( $id );
		} elseif ( class_exists( '\Elementor\Post_CSS_File' ) ) {
			$css_file = new \Elementor\Post_CSS_File( $id );
		}
		$css_file->enqueue();

		return self::$elementor_instance->frontend->get_builder_content_for_display( $id );
    }

}  
new jws_Admin();