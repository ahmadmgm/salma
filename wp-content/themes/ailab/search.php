<?php
get_header();
global $jws_option;
?>
<section id="primary" class="content-area">
	<main id="main" class="site-main">
    <?php jws_title_bar();?>
        <div class="container">
       
		<?php
        $content = (is_active_sidebar('sidebar-single-blog')) ? 'col-lg-8 col-md-8 col-sm-12 col-xs-12 nxl_content' : 'col-lg-12 col-md-12 col-sm-12 col-xs-12 nxl_content';
		if ( have_posts() ) {
			// Load posts loop.
            ?> 
           
            <div class="default-blog-listing layout1 row">
			<div class="nxl_blog_grid_content <?php echo esc_attr($content); ?>">
                      <div class="row jws-post-archive">
                            <?php 
                				while ( have_posts() ) {
                                    the_post();?>
                                    <div class="col-12 col-md-12 col-lg-12 layout-post-archive2 section-blog post-archive">
                                        <div class="elementor-post">
                                            <div class="blog-img-info">
                                            <a class="post-thumbnail-link" href="<?php the_permalink(); ?>" tabindex="0">
                                                    <?php 
                                                    
                                                    if(!empty(get_the_post_thumbnail(get_the_ID()))) {
                                                        $image_size = (isset($jws_option['blog_image_size']) & !empty($jws_option['blog_image_size'])) ? $jws_option['blog_image_size'] : 'full';
                                                        if (function_exists('jws_getImageBySize')) {
                                                            $attach_id = get_post_thumbnail_id();
                                                            $img = jws_getImageBySize(array('attach_id' => $attach_id, 'thumb_size' => $image_size, 'class' => 'image-blog'));
                                                            echo wp_kses_post($img['thumbnail']);
                                                            }else {
                                                            echo wp_kses_post($img = get_the_post_thumbnail(get_the_ID(), $image_size));
                                                           }
                                                           
                                                    }else {
                                                        
                                                        
                                                        $attach_id = $jws_option['empty_image']['id'];
                                                        $img = jws_getImageBySize(array('attach_id' => $attach_id, 'thumb_size' => $jws_option['blog_image_size'], 'class' => 'image-blog'));
                                                        echo wp_kses_post($img['thumbnail']);
                                                    }
                                                    ?>
                                                    
                                                </a>
                                                <div class="post-info d-flex justify-content-between">
                                                    <span class="post-author">
                                                        
                                                    <?php echo get_avatar(get_the_author_meta('ID'))?> <span
                                                            class="color-layout-hover"><?php the_author(); ?></span>
                                                    </span>

                                                </div>
                                            </div>
                                            <div class="content-blog">
                                                <div class="content-inner">
                                                    <div class="post-category">
                                                        <?php  echo get_the_term_list(get_the_ID(), 'category', '', ', '); ?>
                                                    </div>
                                                    <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                    <div class="post-decription"><?php echo wp_trim_words( get_the_excerpt() ) ?></div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                					
                				<?php }
                				?>
                		<div class="navigation"><p> <?php jws_query_pagination(); ?></p></div>
                                
                      </div>
               
         </div>
        <?php if (is_active_sidebar('sidebar-single-blog')) :
                  wp_enqueue_script( 'stick-content', JWS_URI_PATH. '/js/sticky_content.js', array(), '1.1.0', true );
                   ?>
        		      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 nxl_sidebar">
                        <div class="nxl_sticky_move">
                             <?php
                             
                                 dynamic_sidebar('sidebar-single-blog');
                            
                             ?>
                         </div>    
                      </div>
                  <?php  endif; ?>
        <?php
        
	} else {?>
        <section class="no-results not-found default-blog-listing">
            <header class="page-header">
                <h2 class="page-title"><?php echo esc_html__( 'Nothing Found', 'ailab' )?></h2>
            </header><!-- .page-header -->

            <div class="page-content">
                
                    <p> <?php echo esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ailab' )?></p>
                    
            </div><!-- .page-content -->
        </section>

                				
		
	<?php }
    ?>
    </div>
</main><!-- .site-main -->
</section><!-- .content-area -->
<?php
get_footer();