<?php
/**
 * Displays the post footer
 *
 * @package WordPress
 * @subpackage AI Lab
 * @since 1.0.0
 */
global $jws_option;
if (isset($jws_option['select-footer']) && !empty($jws_option['select-footer'])) { ?>
        <?php
        $page_footer= (is_page()) ? get_post_meta(get_the_ID(), 'page_select_footer', true) : '';
        if(isset($page_footer) && !empty($page_footer)) {
        ?>
            <div class="jws_footer <?php echo get_post($id)->post_name ?>">
                <?php echo do_shortcode('[hf_template id="' . $page_footer . '"]'); ?>
            </div>
        <?php
        } else {?>
            <div class="jws_footer <?php echo get_post($jws_option['select-footer'])->post_name ?>">
                <?php echo do_shortcode('[hf_template id="' . $jws_option['select-footer'] . '"]'); ?>
            </div>
        <?php } ?>
<?php }




