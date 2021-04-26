<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage AI Lab
 * @since 1.0.0
 */
 ?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
        <?php jws_footer(); ?>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php 

    global $jws_option;
   $chatbot = get_post_meta( get_the_ID(), 'chatbot', true );
    $script= get_post_meta( get_the_ID(), 'add_script_chatbot', true );
   
    if((isset($chatbot) && $chatbot) && isset($script) && !empty($script) ) {
            echo ''.$script;
    }elseif((isset($chatbot) && $chatbot) && isset($script) && empty($script) ) {
	   echo ''.$jws_option['add_script_chatbot'];
    }elseif (isset($jws_option['chatbot']) && !empty($jws_option['chatbot']) && !empty($jws_option['add_script_chatbot'])) {
        echo ''.$jws_option['add_script_chatbot'];
    }

?>
<?php wp_footer(); ?>
</body>
</html>
