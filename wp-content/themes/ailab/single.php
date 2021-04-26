<?php
get_header();
jws_title_bar();
global $jws_option;
$layout = get_post_meta( get_the_ID(), 'layout', true );

if (is_singular( 'post' )) {
    if((isset($jws_option['show_sidebar_single_blog']) && $jws_option['show_sidebar_single_blog']) || (is_active_sidebar('sidebar-single-blog') && !isset($jws_option['show_sidebar_single_blog']))) {
        $column_sb = "col-lg-4 col-md-12 col-sm-12 col-xs-12 ";
        $column_ct = "col-lg-8 col-md-12 col-sm-12 col-xs-12 "; 
        $has_sidebar = ' has_sidebar';
    }
    else {
       $column_sb = "col-lg-12 col-md-12 col-sm-12 col-xs-12 ";
       $column_ct = "col-lg-12 col-md-12 col-sm-12 col-xs-12 "; 
       $has_sidebar = ''; 
    }
}else {
    $column_sb = "";
    $column_ct = ""; 
}

$blog_related = (!empty($jws_option['show_related_single_blog'])) ? $jws_option['show_related_single_blog'] : '0';
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
    
     
        <div class="container blog-page<?php echo esc_attr($has_sidebar); ?>">
            <div class="row row-same-height">
                <!-- Start Content -->
				<div class="<?php echo esc_attr($column_ct) ?>  blog-content">
                    <div class="single-blog  ">
                     <?php
                        /* Start the Loop */
                        while ( have_posts() ) :?>
                        <div class="blog-details-img"><?php echo get_the_post_thumbnail();?></div>
                        <?php if(is_single() && 'post' == get_post_type()) {?>
                     <ul class="single-post-info">
                    <li class="date-public">
                        <span class="icon">
                            <i aria-hidden="true" class="icon-calendar2"></i>
                        </span>
                        <span class="info"><?php echo get_the_date(); ?></span>
                    </li>
                    <?php
                        global $post;
                    	$author_id = $post->post_author;
                    	$author = get_the_author_meta('display_name', $author_id); 
                     ?>
                    <li class="author">
                        <span class="icon">
                            <i aria-hidden="true" class="icon-user2"></i>
                        </span>
                        <span class="info"><?php echo esc_html($author); ?></span>
                    </li>
                    <li class="category">
                        <span class="icon">
                            <i aria-hidden="true" class="icon-layers"></i>
                        </span>
                        <span class="info"><?php echo get_the_term_list(get_the_ID(), 'category', '', ', ');  ?></span>
                    </li>


                    </ul>

                    <?php } ?>
                        <?php   
                            the_post();
                            the_content();
                           
                			wp_link_pages(
                    			array(
                    				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ailab' ),
                    				'after'  => '</div>',
                    			)
                    		); 
                        endwhile; // End of the loop.
                      
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-12">
                            <?php                        
                            if(isset($jws_option['show_tag_single_blog']) && $jws_option['show_tag_single_blog']==1) {
                                echo jws_get_tags();
                            }
                            ?>
                        </div>
                        
                        <div class="col-xl-4 col-lg-4 col-12">
                            <?php                        
                               if(isset($jws_option['show_share_single_blog']) && $jws_option['show_share_single_blog']==1) {
                                echo jws_share_post();
                            }
                            ?>
                        </div>
                    </div>
                    
                         
                        <?php if(isset($jws_option['show_author_single_blog']) && $jws_option['show_author_single_blog']==1) {
                            echo jws_author();
                        }
                        
                     // If comments are open or we have at least one comment, load up the comment template.
                        if((isset($jws_option['show_comment_single_blog']) && $jws_option['show_comment_single_blog']==1) || !isset($jws_option['show_comment_single_blog'])) {
                            if ( comments_open() || get_comments_number()  ) {
                        
                                comments_template();
                            }
                        }
						
                     ?>
				</div>
				<!-- End Content -->
  
                <?php  if((is_singular( 'post' ) && (isset($jws_option['show_sidebar_single_blog']) && $jws_option['show_sidebar_single_blog'])) || !isset($jws_option['show_sidebar_single_blog'])):?>
                <div class="sidebar-blog nxl_sidebar <?php echo esc_attr($column_sb , 'ailab') ?>">
                <div class=" sticky-move">
					  <?php if ( is_active_sidebar( $sidebar ) ) {
                            		dynamic_sidebar( $sidebar );
      	                 } elseif ( is_active_sidebar( 'sidebar-single-blog' ) ) {
                      		dynamic_sidebar( 'sidebar-single-blog' );
      	               } ?> 
                  </div>          
                </div>
                <?php endif; ?>
            </div>
            <?php if($blog_related == 1) echo jws_related_post(); ?> 
        </div>
	</main><!-- #main -->
</section><!-- #primary -->
<?php
get_footer();