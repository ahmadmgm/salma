<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage ailab
 * @since 1.0.0
 */
global $jws_option;
if (isset($jws_option['select-header']) && !empty($jws_option['select-header'])) { 
   
    $page_header = (is_page()) ? get_post_meta(get_the_ID(), 'page_select_header', true) : '';
        if(isset($page_header) && !empty($page_header)) {
           
        ?>
       
            <div class="jws_header <?php echo get_post($page_header)->post_name ?>">
                <?php echo do_shortcode('[hf_template id="' . $page_header . '"]'); ?>
            </div>
        <?php
        } else {?>
            <div class="jws_header <?php echo get_post($jws_option['select-header'])->post_name ?>">
                <?php echo do_shortcode('[hf_template id="' . $jws_option['select-header'] . '"]'); ?>
            </div>
        <?php } ?>

<?php }


if (isset($jws_option['select-header-mb1']) && !empty($jws_option['select-header-mb1'])) { ?>
<div class="jws_mobile_header">
    <?php echo do_shortcode('[hf_template id="' . $jws_option['select-header-mb1'] . '"]'); ?>
</div>
<?php }