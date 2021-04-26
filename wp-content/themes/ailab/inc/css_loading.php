<?php
/**
 * Elementor class
 *
 * @package OceanWP WordPress theme
 */

if ( ! class_exists( 'Jws_Elementor' ) ) :

	class Jws_Elementor {

		/**
		 * Setup class.
		 *
		 * @since 1.4.0
		 */
		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		}


		/**
		 * Get the header ID.
		 *
		 * @since 1.4.0
		 */
		public static function get_header_id() {

			// Template
		    global $jws_option; 
            if(class_exists('Woocommerce')) {
                $is_shop = (is_shop() || is_product() || is_product_category() || is_product_tag());
            }
            $id = '';
            $page_header = (is_page()) ? get_post_meta(get_the_ID(), 'page_select_header', true) : '';
        

                    if((is_single() && 'post' == get_post_type()) && (isset($jws_option['select-header-blog']) && !empty($jws_option['select-header-blog']))) {
                                    
                    $id =  $jws_option['select-header-blog'];
                                    
                    }elseif((is_single() && 'projects' == get_post_type()) && (isset($jws_option['select-header-projects']) && !empty($jws_option['select-header-projects']))){
            
                                   $id = $jws_option['select-header-projects'];
                                  
                    }elseif(('sfwd-courses' == get_post_type()) && (isset($jws_option['select-header-course']) && !empty($jws_option['select-header-course']))){
            
                                   $id = $jws_option['select-header-course'];  
                                  
                    }elseif((isset($is_shop) && !empty($is_shop)) && (isset($jws_option['select-header-shop']) && !empty($jws_option['select-header-shop']))){
                                       $id = $jws_option['select-header-shop'];  
                    }elseif(isset($page_header) && !empty($page_header)){
                                $id = $page_header; 
                    } 
                    else {
                                    
                          $id = (isset($jws_option['select-header']) && !empty($jws_option['select-header'])) ? $jws_option['select-header'] : false;
                               
                     } 

			// If template is selected
			if ( ! empty( $id ) ) {
		
				return $id;
			}

			// Return
			return false;
			
		}

        
        
		/**
		 * Enqueue styles
		 *
		 * @since 1.4.0
		 */
		public static function enqueue_styles() {

			if ( class_exists( '\Elementor\Core\Files\CSS\Post' ) ) {

				$header_id 					= self::get_header_id();

				// Enqueue header css file
				if ( false != $header_id ) {
					$error_css = new \Elementor\Core\Files\CSS\Post( $header_id );
					$error_css->enqueue();
				}

			}

		}

		/**
		 * Prints header content.
		 *
		 * @since 1.4.0
		 */
		public static function display_header() {
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( self::get_header_id() );
		}

	}

endif;

return new Jws_Elementor();

 ?>