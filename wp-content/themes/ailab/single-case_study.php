<?php
get_header();
global $jws_option;
$layout = get_post_meta( get_the_ID(), 'layout', true );

$blog_related = $jws_option['show_related_single_blog'];
$sidebar = 0;
if((isset($layout) && !empty($layout)) && $layout != 'global') {
	$sllayout = $layout;
}else {
    if((isset($jws_option['blogs_layout']) && !empty($jws_option['blogs_layout'])) || $layout == 'global' ) {
      $sllayout = $jws_option['blogs_layout']; 
    }else {
        $sllayout = 'layout1'; 
    }	
}

?>

<section id="primary" class="content-area">
	<main id="main" class="site-main">
    
        <?php jws_title_bar();?>
        <div class="container blog-page">
            <div class="row row-same-height">
                <!-- Start Content -->
		
                    <div class="single-blog single-case-study">
                     <?php
                        /* Start the Loop */
                        while ( have_posts() ) :
                        $files = get_post_meta( get_the_ID(), 'case_study_gallery', 1 ) ;
                        ?>
                        
                       <div class="case-study-gallery"> 
                                        <?php 
                                            foreach ( (array) $files as $attachment_id => $attachment_url ) {?>
                                            <div class="main-image">
                                                <img src="<?php echo wp_get_attachment_url( $attachment_id, 'thumbnail' ) ?>" alt="<?php esc_attr('image');?>" class="gallery-img">
                                            </div>
                                         <?php	}?>
                       </div> 
                               
                             <?php   
                            the_post();
                            the_content();
                        endwhile; // End of the loop.
                    
                        ?>
                       </div>
                       
                    </div>
				</div>
				<!-- End Content -->
        </div>
	</main><!-- #main -->
</section><!-- #primary -->
<?php
get_footer();