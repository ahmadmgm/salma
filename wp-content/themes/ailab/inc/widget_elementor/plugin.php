<?php
namespace ElementorHelloWorld;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class Plugin {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		wp_register_script( 'elementor-hello-world', plugins_url( '/assets/js/hello-world.js', __FILE__ ), [ 'jquery' ], false, true );
        wp_register_script('jws-query-control', JWS_URI_PATH . '/inc/widget_elementor/control/js/jquery.js', array(), '', true);
	}
    private function include_control_files() {
        require_once (JWS_ABS_PATH . '/inc/widget_elementor/control/query.php');
    }
    public function register_controls() {
        // Its is now safe to include Control files
        $this->include_control_files();
        $controls_manager = \Elementor\Plugin::$instance->controls_manager;
        $controls_manager->register_control('jws-query-posts', new \JwsElementor\Control\Query());
    }


	
	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/test.php' );
		require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/hello-world.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-post-archive.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-slide-post.php' );
		require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-logo.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-case_study.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-post-related.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-price-table.php' );
		require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/inline-editing.php' );
		require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-product-details.php' );
		require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-product-related.php' );
		require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-product-archive.php' );
		require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-product-featured.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-team.php' );
		require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-single-team.php' );
		require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-team-archive.php' );
		require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-services.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-testimonial/jws-testimonial.php' );
		require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-menu.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-search.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-account.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-progress.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws_off_canvas.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws_tab.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/svg-convert.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-timeline.php' );
		require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-breadcrumbs.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-menu-listing.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-video-popup.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-login-form/jws-login-form.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/Twitter.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-button.php' );
        require_once( JWS_ABS_PATH. '/inc/widget_elementor/widgets/jws-custom/jws-icon-box.php' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Test() );
        
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Hello_World() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JwsPostArchive() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JwsSlidePost() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JwsSVG_Convert() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\Jws_case_study() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JwsLogo() );
    	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JWS_Progress() );
    	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JWS_Account() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JWS_Search() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\PostRelated() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Inline_Editing() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\ProductDetails() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\ProductRelated() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\ProductArchive() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\ProductFeatured() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JwsTeams() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JwsTeamsArchive() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JwsServices() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JWS_Price_Table() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\Jws_Testimonial() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\Nav_Menu() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\Offcanvas() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\Jws_tab() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JWS_Timeline() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\Jws_Breakscrumbs() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JWS_Menu_Liting() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\Video_popup() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\Login_form() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JWS_Twitter() );
         \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JWS_Button() );
          \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JWS_Icon_Box() );
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {
		

		// Register widget scripts

        add_action('elementor/editor/before_enqueue_scripts', [$this, 'widget_scripts']);
       // Register controls
        add_action('elementor/controls/controls_registered', [$this, 'register_controls']);
		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}
}

// Instantiate Plugin Class
Plugin::instance();
