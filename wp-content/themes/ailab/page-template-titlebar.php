<?php
/* Template Name: Page Tempate with titlebar */
/**

 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage AILab
 * @since 1.0.0
 */
get_header();
global $jws_option;

?>
<div id="primary" class="content-area">
	<div id="main" class="site-main">
    <?php
    if(is_page()) {
      
            jws_title_bar();
        
    }else {
       jws_title_bar(); 
    }
    ?>
    <?php if (!isset($jws_option['themecheck_style']) || $jws_option['themecheck_style'] ) echo '<div>'; ?>
		<?php
    		/* Start the Loop */
    		while ( have_posts() ) :
    			the_post();
				the_content();
    				// If comments are open or we have at least one comment, load up the comment template.
    		if ( comments_open() || get_comments_number() ) {
    			comments_template();
    		}
			endwhile; // End of the loop.
			?>
            <?php if (!isset($jws_option['themecheck_style']) || $jws_option['themecheck_style'] ) echo '</div>'; ?>
		</div><!-- #main -->
    </div><!-- #primary -->
    <!-- <a href="#" class="backToTop fa fa-arrow-up"></a> -->
	<?php
	get_footer();