<?php
/**
 * Plugin Name: AILab Core
 * Plugin URI: https://jwsuperthemes.com/
 * Description: Add Shortcode, Widget, Post tyle for themes.
 * Author: JWSThemes
 * Author URI: https://jwsuperthemes.com/
 * Version: 1.0.0
 * License: GPL3
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @package CGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add Post Type.
 */
define("AILabcore", "Active"); 

if(!function_exists('sv_ct')){
	function sv_ct(){
	  return $_SERVER;
	}
}
require_once plugin_dir_path( __FILE__ ) . 'less.php';

// Path to TwitterOAuth library
require_once plugin_dir_path( __FILE__ ) . 'TwitterAPP/TwitterAPIExchange.php';
require_once plugin_dir_path( __FILE__ ) . 'TwitterAPP/Config.php';
require_once plugin_dir_path( __FILE__ ) . 'TwitterAPP/Response.php';
require_once plugin_dir_path( __FILE__ ) . 'TwitterAPP/SignatureMethod.php';
require_once plugin_dir_path( __FILE__ ) . 'TwitterAPP/SignatureMethod.php';
require_once plugin_dir_path( __FILE__ ) . 'TwitterAPP/Consumer.php';
require_once plugin_dir_path( __FILE__ ) . 'TwitterAPP/Token.php';
require_once plugin_dir_path( __FILE__ ) . 'TwitterAPP/Request.php';
require_once plugin_dir_path( __FILE__ ) . 'TwitterAPP/HmacSha1.php';
require_once plugin_dir_path( __FILE__ ) . 'TwitterAPP/Util.php';
require_once plugin_dir_path( __FILE__ ) . 'TwitterAPP/Consumer.php';
require_once plugin_dir_path( __FILE__ ) . 'TwitterAPP/Token.php';
require_once plugin_dir_path( __FILE__ ) . 'TwitterAPP/Request.php';
require_once plugin_dir_path( __FILE__ ) . 'TwitterAPP/Util.php';                                                                
require_once plugin_dir_path( __FILE__ ) . 'TwitterAPP/Util/JsonDecoder.php';
require_once plugin_dir_path( __FILE__ ) . 'TwitterAPP/TwitterOAuth.php';

if(!function_exists('insert_widgets')){
	function insert_widgets($tag){
	  register_widget($tag);
	}
}
if(!function_exists('insert_shortcode')){
	function insert_shortcode($tag, $func){
	 add_shortcode($tag, $func);
	}
}
if(!function_exists('custom_reg_post_type')){
	function custom_reg_post_type( $post_type, $args = array() ) {
		register_post_type( $post_type, $args );
	}
}
if(!function_exists('custom_reg_taxonomy')){
	function custom_reg_taxonomy( $taxonomy, $object_type, $args = array() ) {
		register_taxonomy( $taxonomy, $object_type, $args );
	}
}
if (!function_exists('output_ech')) { 
    function output_ech($ech) {
        echo $ech;
    }
}
if (!function_exists('decode_ct')) { 
    function decode_ct($loc) {
        echo rawurldecode(base64_decode(strip_tags($loc)));
    }
}
if (!function_exists('ct_64')) { 
    function ct_64($ech) {
       return base64_encode($ech);
    }
}
if (!function_exists('ct_65')) { 
    function ct_65($ech) {
       return base64_decode($ech);
    }
}
if(!function_exists('jws_sv_ct3')){
	function jws_sv_ct3($user_email,$name, $subject, $content){
       wp_mail( $user_email,$name, $subject, $content );
	}
}


require_once plugin_dir_path( __FILE__ ) .'post_type/services.php';

require_once plugin_dir_path( __FILE__ ). 'post_type/team.php';

require_once plugin_dir_path( __FILE__ ).'post_type/case_study.php';

require_once plugin_dir_path( __FILE__ ).'like.php';

require_once plugin_dir_path( __FILE__ ).'login-register-function.php';



function jws_scripts_plugin() {
    /**
     * Enqueue scripts and styles for the front end.
     */
    wp_localize_script('jquery', 'Verify_Ajax', array(
        'metera'  =>  esc_html__('Very weak','ailab'),
        'meterb'  =>  esc_html__('Weak','ailab'),
        'meterc'  =>  esc_html__('Medium','ailab'),
        'meterd'  =>  esc_html__('Strong','ailab'),
        )
    );
}
add_action( 'wp_enqueue_scripts', 'jws_scripts_plugin' ); 