<?php
/** Define THEME */ 
if (!defined('JWS_ABS_PATH')) define('JWS_ABS_PATH', get_template_directory());
if (!defined('JWS_URI_PATH')) define('JWS_URI_PATH', get_template_directory_uri());
if ( ! function_exists( 'jws_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
function jws_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Bouwer, use a find and replace
		 * to change 'ailab' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ailab', get_template_directory() . '/languages' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				)
			);
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );
		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
         // This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'main_navigation'   => esc_html__( 'Main Menu','ailab' ),
		) );
      
	}
	endif;
	add_action( 'after_setup_theme', 'jws_setup' );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jws_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'ailab' ),
			'id'            => 'sidebar-single-blog',
			'description'   => esc_html__( 'Add widgets here to appear in your blog single.', 'ailab' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			)
		);
}
add_action( 'widgets_init', 'jws_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function jws_scripts() {
    global $jws_option;
	$font_main = (!empty($jws_option['font_body']['font-family'])) ? $jws_option['font_body']['font-family'] : 'Nunito';
    $font1 = (!empty($jws_option['font_h2']['font-family'])) ? $jws_option['font_h2']['font-family'] : 'Nunito' ;
    $font_button = (!empty($jws_option['font-button']['font-family'])) ? $jws_option['font-button']['font-family'] : 'Nunito';
    $font1_check = '';
    $font2_check = '';
    if(!empty($font1)&&($font1 != $font_main)) {
    	$font1_check='|'.$font1.':100,300,400,500,600,700,800'; 	
    }
    if(!empty($font_button)&&($font_button != $font_main)) {
    	$font2_check='|'.$font_button.':100,300,400,500,600,700,800'; 	
    }
	if(!empty($font_main)) {
    
        wp_enqueue_style( 'jws-frontend-google-fonts-font-main', '//fonts.googleapis.com/css?family='.$font_main.':100,300,400,500,600,700,800'.$font1_check.$font2_check, false );  	
    }
        
	/** Add Css **/
	wp_enqueue_style( 'bootstrap-min', JWS_URI_PATH.'/assets/css/bootstrap.min.css', array(), '4.4.1');
	wp_enqueue_style( 'slick', JWS_URI_PATH.'/assets/css/slick.css', array(), '1.1.0');
	wp_enqueue_style( 'magnificPopup', JWS_URI_PATH.'/assets/css/magnificPopup.css', array(), '1.1.0');
    // Load our main stylesheet. It is generated with less in upload folder
    $upload_dir = wp_upload_dir();
    $style_dir = $upload_dir['baseurl'];
    if (file_exists($upload_dir['basedir'] . '/jws-style.css')) {
        wp_enqueue_style(
            'jws-style',
            $style_dir . '/jws-style.css',
			['elementor-frontend','elementor-animations'],
            filemtime($upload_dir['basedir'] . '/jws-style.css')
        );
    } else {
        wp_enqueue_style( 'jws-style', JWS_URI_PATH.'/assets/css/css_rended/style.css', array(), '1.0' , false );
    }
    if(!empty($jws_option)) {
       wp_enqueue_style( 'jws-il-style', get_stylesheet_uri() );
	   wp_add_inline_style( 'jws-il-style', jws_custom_css() ); 
    }

    /**
     * Add Font Icon
    */ 
    wp_enqueue_style( 'awesome', JWS_URI_PATH.'/assets/fonts/awesome/awesome.css');  
    wp_enqueue_style('icomoon', JWS_URI_PATH.'/assets/fonts/icomoon/css/icomoon.css');
    wp_enqueue_style('linearicons-free', JWS_URI_PATH.'/assets/fonts/linearicons-free/css/linearicons-free.css');
    wp_enqueue_style('jws-custom-icon', JWS_URI_PATH.'/assets/fonts/custom-icon/css/custom-icon.css');
	/** Add JS **/
    wp_enqueue_script( 'jquery-slick', JWS_URI_PATH. '/assets/js/jquery-slick.js', array(), '1.1.0', true );
    wp_enqueue_script( 'appear', JWS_URI_PATH. '/assets/js/appear.js', array(), '1.1.0', true );
    wp_enqueue_script( 'jws-main', JWS_URI_PATH. '/assets/js/main.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'jws-off-canvas', JWS_URI_PATH. '/assets/js/jws_off_canvas.js', array(), '1.0', true );
    wp_enqueue_script( 'isotope', JWS_URI_PATH. '/assets/js/isotope.js', array(), '3.3.7', true );
    wp_enqueue_script('masonry');
    wp_enqueue_script( 'magnificPopup', JWS_URI_PATH. '/assets/js/magnificPopup.js', array(), '1.1.0', true );
    wp_enqueue_script( 'SmoothScroll', JWS_URI_PATH. '/assets/js/SmoothScroll.js', array(), null , true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    	wp_enqueue_script( 'comment-reply' );
    }
    /**
     * Enqueue scripts and styles for the front end.
     */
    wp_localize_script('jquery', 'MS_Ajax', array(
    	'ajaxurl' => admin_url('admin-ajax.php'),
    	'nextNonce' => wp_create_nonce('myajax-next-nonce')
        )
    );
}
add_action( 'wp_enqueue_scripts', 'jws_scripts' );
/**
 * equeue scripts and styles.
 */
 add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );
 add_action( 'elementor/frontend/after_register_styles',function() {
	foreach( [ 'solid', 'regular', 'brands' ] as $style ) {
		wp_deregister_style( 'elementor-icons-fa-' . $style );
	}
}, 20 );
	
add_action( 'wp_print_styles', 'jws_dequeue_font_awesome_style' );
function jws_dequeue_font_awesome_style() {
      wp_dequeue_style( 'fontawesome' );
      wp_deregister_style( 'fontawesome' );
      wp_dequeue_style( 'elementor-icons' );
      wp_dequeue_style( 'rs-icon-set-fa-icon' );
      wp_dequeue_style( 'dashicons' );
      wp_dequeue_style( 'woocommerce_prettyPhoto' ); 
      wp_dequeue_style( 'yith-wcwl-font-awesome' );
      wp_dequeue_style( 'jquery-selectBox' );
      wp_deregister_style( 'yith-wcwl-font-awesome' );
      wp_dequeue_style( 'redux-google-fonts-jws_option' );      
      wp_dequeue_style( 'elementor-animations' );      
      wp_dequeue_style( 'elementor-icons-shared-0' );
      wp_dequeue_style( 'elementor-icons-fa-brands' );
      wp_dequeue_style( 'elementor-icons-fa-solid' );
}
if ( ! function_exists( 'jws_admin_css' ) ) :
	function jws_admin_css() {
		wp_enqueue_style( 'jws-admincss', JWS_URI_PATH.'/assets/css/admin.css', array(), '1.0' , false );
		wp_enqueue_script( 'jws-adminjs', JWS_URI_PATH. '/assets/js/admin.js', array(), '1.1.0', true );
	}
	add_action( 'admin_enqueue_scripts', 'jws_admin_css' );
	endif;
/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Add Redux Themeoption.
 */
require_once (JWS_ABS_PATH.'/redux-framework/option.php');

/**
 * Add cmb2 metabox.
 */
require_once (JWS_ABS_PATH.'/cmb2/meta_option.php'); 
/**
 * Include folder inc.
 */
require_once (JWS_ABS_PATH.'/inc/include.php'); 
/* Woo commerce function */
if (class_exists('Woocommerce')) {
	require_once JWS_ABS_PATH . '/woocommerce/wc-template-function.php';
}

add_action('wp_loaded', 'jws_prefix_output_buffer_start');

function jws_prefix_output_buffer_start() { 
    ob_start("jws_prefix_output_callback"); 
}

function jws_prefix_output_callback($buffer) {
    return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer );
};

function jws_filter_fw_ext_backups_demos($demos)
	{
		$demos_array = array(
			'ailab' => array(
				'title' => esc_html__('AI Lab Demo', 'ailab'),
				'screenshot' => 'http://jwsuperthemes.com/import_demo/ailab/screenshot.jpg',
				'preview_link' => 'http://ailab.jwsuperthemes.com/',
			),
		);
        $download_url = 'http://jwsuperthemes.com/import_demo/ailab/download-script/';
		foreach ($demos_array as $id => $data) {
			$demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
				'url' => $download_url,
				'file_id' => $id,
			));
			$demo->set_title($data['title']);
			$demo->set_screenshot($data['screenshot']);
			$demo->set_preview_link($data['preview_link']);
			$demos[$demo->get_id()] = $demo;
			unset($demo);
		}
		return $demos;
	}
add_filter('fw:ext:backups-demo:demos', 'jws_filter_fw_ext_backups_demos');