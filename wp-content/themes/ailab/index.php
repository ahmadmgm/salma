<?php
get_header();
jws_title_bar();
?>
<section id="primary" class="content-area">
	<main id="main" class="site-main">
       
		<?php
        $content = (is_active_sidebar('sidebar-single-blog')) ? 'col-lg-8 col-md-8 col-sm-12 col-xs-12 nxl_content' : 'col-lg-12 col-md-12 col-sm-12 col-xs-12 nxl_content';
		if ( have_posts() ) {?>
			// Load posts loop.
		    <div class="default-blog-listing layout1 row">
			     <div class="nxl_blog_grid_content <?php echo esc_attr($content); ?>">
                      <div class="row jws-post-archive">
                            <?php 
                				while ( have_posts() ) {
                                   the_post();?>
                                   <div class="layout-post-archive2 section-blog post-archive<?php if(!has_post_thumbnail()) echo ' not-thumbnail'; if(is_sticky()) echo ' sticky'; ?>">
                                     <div class="elementor-post ">		
                                         <div class="blog-img-info">
                                			<a class="post-thumbnail-link" href="<?php echo get_the_permalink()?>">
                                				<?php 
                                                if(has_post_thumbnail()) {
                                                    if (function_exists('jws_getImageBySize')) {
                                                        $attach_id = get_post_thumbnail_id();
                                                        $img = jws_getImageBySize(array('attach_id' => $attach_id, 'thumb_size' =>'full', 'class' => 'image-blog'));
                                                        echo ''.$img['thumbnail'];
                                                        }else {
                                                        echo ''.$img = get_the_post_thumbnail(get_the_ID(), 'full');
                                                       }
                                                       
                                                }
                                                ?>
                                			</a>
                                            <div class="post-info d-flex justify-content-between">
                                				<span class="post-author">
                                                    <?php echo get_avatar(get_the_author_meta('ID'))?>	<span class="color-layout-hover"><?php the_author(); ?></span>
                                    			</span>
                                				
                                				<div>
        
                                                <span class="post-comment">
                                        			<i class="far fa-comment" aria-hidden="true"></i>
                                        			<?php echo '<span>'. get_comments_number() .'</span>'; ?>
                                        		</span>
                                				
                                				</div>
                                            </div>              						
                                		</div>
                                        <div class="m-15">
                                            <div class="post-category">
                                				<?php  echo get_the_term_list(get_the_ID(), 'category', '', '&nbsp &nbsp'); ?>
                                            </div>
                                            <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <div class="post-decription"><?php echo get_the_excerpt(); ?></div>
                                		</div>
                            		</div>
                                </div>
                				<?php }
                				?>
                        <div class="navigation"><p> <?php jws_query_pagination(); ?></p></div> 
                      </div>
                </div>
                <?php if (is_active_sidebar('sidebar-single-blog')) :
                     ?>
        		      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 nxl_sidebar">
                        <div class="nxl_sticky_move">
                             <?php
                             
                                 dynamic_sidebar('sidebar-single-blog');
                            
                             ?>
                         </div>    
                      </div>
                </div>  
                <?php  endif; ?>
                <?php
        
            	} else {
            			// If no content, include the "No posts found" template.
            		get_template_part( 'template-parts/content/content', 'none' );
            	}
	       ?>
    </main><!-- .site-main -->
</section><!-- .content-area -->
<?php
get_footer();