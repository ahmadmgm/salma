<?php 

require_once (JWS_ABS_PATH.'/inc/custom_menu.php');

require_once (JWS_ABS_PATH.'/inc/jws_walker_page.php');

require_once (JWS_ABS_PATH.'/inc/css_loading.php');

require_once (JWS_ABS_PATH.'/inc/css_inline.php'); 

require_once (JWS_ABS_PATH.'/inc/TGM-Plugin-Activation/plugin-option.php');

require_once (JWS_ABS_PATH.'/inc/widgets/widgets.php'); 

function jwstheme_init() {
	global $jws_option;
    
	if(isset($jws_option['enable_less']) && $jws_option['enable_less']){
	   
		require_once (JWS_ABS_PATH.'/inc/presets.php');
        
	}
}

add_action( 'init', 'jwstheme_init' );

if ( did_action( 'elementor/loaded' ) ) {
    
    require_once( JWS_ABS_PATH.'/inc/widget_elementor/plugin.php' );
    require_once (JWS_ABS_PATH.'/inc/widget_elementor/header_footer.php');
}

if ( did_action( 'elementor/loaded' ) ) {
    
    require_once( JWS_ABS_PATH.'/inc/widget_elementor/custom_library/custom-elementor-source.php' );
    
}