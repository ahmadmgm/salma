<?php if (!defined('ABSPATH')) {
    die('Direct access forbidden.');
}
global $jws_option;
/**
 * Get values from admin styling and overwrite them when processing less files
 */

$ailab_template_directory_uri = get_template_directory_uri();
$ailab_modified_variables = array();
if(isset($jws_option['color3']) && $jws_option['color3']) {
    $ailab_modified_variables['color3'] = $jws_option['color3'];  
}
if(isset($jws_option['color2']) && $jws_option['color2']) {
    $ailab_modified_variables['color2'] = $jws_option['color2'];  
}
if(isset($jws_option['color1']) && $jws_option['color1']) {
    $ailab_modified_variables['color1'] = $jws_option['color1'];  
}
if(isset($jws_option['main-color']) && $jws_option['main-color']) {
    $ailab_modified_variables['main-color'] = $jws_option['main-color'];  
}
if(isset($jws_option['font1']['font-family']) && $jws_option['font1']['font-family']) {
  $ailab_modified_variables['font1'] = $jws_option['font1']['font-family']; 
}
if(isset($jws_option['opt-typography-body']['font-family']) && $jws_option['opt-typography-body']['font-family']) {
  $ailab_modified_variables['font_body'] = $jws_option['opt-typography-body']['font-family']; 
}