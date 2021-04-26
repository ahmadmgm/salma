<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WordPress
 * @subpackage Bouwer
 * @since 1.0.0
 */

add_image_size( 'jws-img-blog-medium',370,250, true );

/**
 * Render header layout.
 *
 * @return string
 */
if (!function_exists('jws_header')) {
    function jws_header()
    {
        global $jws_option;
        
        
        ob_start();
        if(isset($jws_option['select-header']) && !empty($jws_option['select-header'])) {
          get_template_part('template-parts/header/header');  
        }else {
          get_template_part('template-parts/header/header_none');  
        }
        
        $output = ob_get_clean();
        echo apply_filters('jws_header', $output);
    }
}
/**
 * Render footer layout.
 *
 * @return string
 */
if (!function_exists('jws_footer')) {
    function jws_footer()
    {
        global $jws_option;
        
        
        ob_start();
        if(isset($jws_option['select-footer']) && !empty($jws_option['select-footer'])) {
          get_template_part('template-parts/footer/footer');  
        }else {
          get_template_part('template-parts/footer/footer_none');  
        }
        
        $output = ob_get_clean();
        echo apply_filters('footer', $output);
    }
}
/**
 * Render header layout.
 *
 * @return string
 */

function jws_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'jws_mime_types');

function jws_get_excerpt($limit, $source = null)
{

    $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
    $excerpt = preg_replace(" (\[.*?\])", '', $excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
    $excerpt = $excerpt . '...';
    return $excerpt;
}

if (!function_exists('jws_query_pagination')) {
    function jws_query_pagination($pages = '', $range = 2)
    {
        $showitems = ($range * 2);

        global $paged;

        if (empty($paged)) $paged = 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if (!$pages) {
                $pages = 1;
            }
        }

        if (1 != $pages) {
            echo "<div class='nxl-pagination'><div class='nxl_pagi_inner'>";
            if ($paged > 1) echo "<a class='prev' href='" . get_pagenum_link($paged - 1) . "'>Prev</a>";
            echo "<ul>";
            for ($i = 1; $i <= $pages; $i++) {
                if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                    echo ''.($paged == $i) ? "<li><span class='item current'>" . $i . "</span></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive item' >" . $i . "</a></li>";
                }
            }
            echo "</ul>";

            if ($paged < $pages) echo "<a class='next' href='" . get_pagenum_link($paged + 1) . "'>Next</a>";
            echo "</div></div>\n";
        }
    }
}

// Share blog
if (!function_exists('jws_share_post')) :
    function jws_share_post()
    {ob_start();
        ?>
        <div class="clearfix vg-share-link single-social-bar">
            <ul>
                <li> <a class="link-item fb" href="https://www.facebook.com/sharer.php?u=<?php echo urlencode( get_permalink() );?>" title="<?php echo esc_attr__( 'Facebook', 'ailab' )?>" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a></li>
                <li> <a class="link-item tw" href="https://twitter.com/share?url=<?php echo urlencode( get_permalink() )?>&amp;text=<?php echo rawurlencode( esc_attr( get_the_title() ) )?>" title="<?php echo esc_attr__( 'Twitter', 'ailab' ) ?> "target="_blank">
                    <i class="fab fa-twitter"></i>
                </a></li>
                <li> <a class="link-item fb" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode( get_permalink() );?>&description=<?php echo rawurlencode( esc_attr( get_the_title() ) )?>" title="<?php echo esc_attr__( 'Pinterest', 'ailab' )?>" target="_blank">
                    <i class="fab fa-pinterest"></i>
                </a></li>
                <li> <a class="link-item fb" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode( get_permalink() );?>&description=<?php echo rawurlencode( esc_attr( get_the_title() ) )?>" title="<?php echo esc_attr__( 'Pinterest', 'ailab' )?>" target="_blank">
                    <i class="far fa-envelope"></i>
                </a></li>
            </ul>

    </div>
    <?php return  ob_get_clean(); }
endif;


/**
 * Render post tags.
 *
 * @since 1.0.0
 */
if (!function_exists('jws_get_tags')) :
    function jws_get_tags()
    {
        $posttags = get_the_tags();
        if ($posttags) {
            ?>
            <div class="post-tags">
                <div class="tag-title"><?php echo esc_html__('Tags:', 'ailab');?></div>

            <?php
            foreach($posttags as $tag) {
                echo '<a href="' . get_tag_link($tag->term_id) . '">#' . $tag->name . '</a> '; 
            }?>
            </div>
            <?php
        }
        return  ob_get_clean();
    }
endif;
/*Author*/
if ( ! function_exists( 'jws_author' ) ) {
	function jws_author() {
		ob_start();
		?>
		
		<div class="blog-about-author clearfix">
        
			<div class="blog-author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 170 ); ?></div>
			<div class="blog-author-info">
                <h3 class="title-author"><?php the_author(); ?></h3>
                <span class="position-author"><?php echo get_the_author_meta('postiton') ?></span>
				<p class="description"><?php the_author_meta('description'); ?></p>
                <div class="icon-author">
                    <a href="<?php echo get_the_author_meta('facebook'); ?>"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?php echo get_the_author_meta('twitter'); ?>"><i class="fab fa-twitter"></i></a>
                    <a href="<?php echo get_the_author_meta('instagram'); ?>"><i class="fab fa-instagram"></i></i></a>
                </div>
			</div>
            
		</div>
		<?php
		return  ob_get_clean();
	} 
}
/**
 * Render related post based on post tags.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'jws_related_post' ) ) {
	function jws_related_post() {
		global $post;
        // Get page options
        $options = get_post_meta( get_the_ID(), '_custom_post_options', true );
        
        // Get product single style
     //   $style = ( is_array( $options ) && $options['post-single-style'] ) ? $options['post-single-style'] : ( cs_get_option( 'post-single-style' ) ? cs_get_option( 'post-single-style' ) : '1' );
		// Get post's tags
		$tags = wp_get_post_tags( $post->ID );

		if ( $tags ) {
			// Get id for all tags
			$tag_ids = array();

			foreach ( $tags as $tag ) {
				$tag_ids[] = $tag->term_id;
			}

			// Build arguments to query for related posts
			$args = array(
				'tag__in'             => $tag_ids,
				'post__not_in'        => array( $post->ID ),
				'posts_per_page'      => -1,
				'ignore_sticky_posts' => 1,
				'orderby'             => 'rand',
			);

			// Get related post
			$related = new wp_query( $args );

			?>
        <div class="section-blog post-related">
            <div class="title-related">
                <h3><?php esc_html_e( 'You might also like', 'ailab' )  ?></h3>
            </div>
           
            <div class="jws-post-related-slider nxl_blog_grid layout1" data-slidesToShow="3" data-slick='{"slidesToShow": 3 ,"slidesToScroll": 3,  "responsive":[{"breakpoint": 960,"settings":{"slidesToShow": 2,"slidesToScroll": 2}},{"breakpoint": 767,"settings":{"slidesToShow": 1,"slidesToScroll": 1}}]}'>
                <?php
                    while ( $related->have_posts() ):
                        $related->the_post();
                        $num_comments = get_comments_number();
                        ?>
                        <div class="elementor-post post-item layout-2">
                            <a class="post-thumbnail-link" href="<?php the_permalink(); ?>" tabindex="0">
                                <img src="<?php echo get_the_post_thumbnail_url('' , 'jws-img-blog-medium'); ?>" alt="<?php echo esc_attr('image-blog'); ?>" />

                            </a>
                            <div class="content-blog">
                                <div class="content-inner">
                                    <div class="post-category">
                                        <?php  echo get_the_term_list(get_the_ID(), 'category','', '&nbsp &nbsp'); ?>
                                    </div>
                                    <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <div class="post-info d-flex justify-content-between">
                                        <span class="post-author">
                                            
                                        <?php echo get_avatar(get_the_author_meta('ID'))?> <span
                                                class="color-layout-hover"><?php the_author(); ?></span>
                                        </span>
                                        <div class="meta-info">
                                            <span class="post-wish-list">
                                                <?php echo esc_attr(post_favorite()); ?>
                                            </span>
                                            <span class="post-comment">
                                                <i class="far fa-comment" aria-hidden="true"></i>
                                                <?php echo '<span>'. get_comments_number() .'</span>'; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php   
                    endwhile;
                    ?>
            </div>
        </div>
<?php
			// Reset global query object
			wp_reset_postdata();
		}
	}
}

/*Custom comment list*/
function jws_custom_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ('div' == $args['style']) {
        $tag = 'div ';
        $add_below = 'comment';
    } else {
        $tag = 'li ';
        $add_below = 'div-comment';
    }
    ?>
<<?php echo ''.$tag; ?><?php comment_class(empty($args['has_children']) ? '' : 'parent') ?>
    id="comment-<?php comment_ID() ?>">
    <?php if ('div' != $args['style']) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
        <?php endif; ?>

        <div class="comment-avatar">
            <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size']); ?>
        </div>
        <div class="comment-info">
            <div class="comment-header-info">
            <span class="comment-date"><?php printf(esc_html__('%1$s ', 'ailab'), get_comment_date()); ?></span>
                <h6 class="comment-author"><?php printf(esc_html__('%s', 'ailab'), get_comment_author()); ?></h6>
                <?php if($depth < $args['max_depth'] ) : ?>
                <span class="reply">
                    <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                    <i aria-hidden="true" class="fas fa-reply"></i>
                </span>
                <?php endif; ?>
            </div>
            <?php comment_text(); ?>
            <?php if ($comment->comment_approved == '0') : ?>
            <em
                class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'ailab'); ?></em>
            <br />
            <?php endif; ?>
        </div>

        <?php if ('div' != $args['style']) : ?>
    </div>
    <?php endif; ?>
    <?php
}

function jws_move_comment_field_to_bottom($fields)
{
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter('comment_form_fields', 'jws_move_comment_field_to_bottom');


if (!function_exists('jws_ajax_load_form_search')) {


    function jws_ajax_load_form_search()
    {

        ?>
    <span class="nxl_close_search fa fa-times-circle"></span>
    <div class="nxl_search_popup_inner"> <?php

            get_search_form();

         ?> </div> <?php

        die();
    }


    // Note: Keep default AJAX actions in case WooCommerce endpoint URL is unavAILable
    add_action('wp_ajax_jws_ajax_load_form_search', 'jws_ajax_load_form_search');
    add_action('wp_ajax_nopriv_jws_ajax_load_form_search', 'jws_ajax_load_form_search');

}
// **********************************************************************// 
/** Add Function Crop Images   **/
// **********************************************************************// 

function jws_getImageBySize($params = array())
{
    $params = array_merge(array(
        'post_id' => null,
        'attach_id' => null,
        'thumb_size' => 'thumbnail',
        'class' => '',
    ), $params);

    if (!$params['thumb_size']) {
        $params['thumb_size'] = 'thumbnail';
    }

    if (!$params['attach_id'] && !$params['post_id']) {
        $thumbnail=get_template_directory_uri().'/assets/images/no-image.jpg';
       // return false;
    }

    $post_id = $params['post_id'];

    $attach_id = $post_id ? get_post_thumbnail_id($post_id) : $params['attach_id'];
    $attach_id = apply_filters('jws_object_id', $attach_id);
    $thumb_size = $params['thumb_size'];
    $thumb_class = (isset($params['class']) && '' !== $params['class']) ? $params['class'] . ' ' : '';

    global $_wp_additional_image_sizes;
    $thumbnail = '';

    if (is_string($thumb_size) && ((!empty($_wp_additional_image_sizes[$thumb_size]) && is_array($_wp_additional_image_sizes[$thumb_size])) || in_array($thumb_size, array(
                'thumbnail',
                'thumb',
                'medium',
                'large',
                'full',
                'custom-size',
            )))
    ) {
        $attributes = array('class' => $thumb_class . 'attachment-' . $thumb_size);
        $thumbnail = wp_get_attachment_image($attach_id, $thumb_size, false, $attributes);
    } elseif ($attach_id) {
        if (is_string($thumb_size)) {
            preg_match_all('/\d+/', $thumb_size, $thumb_matches);
            if (isset($thumb_matches[0])) {
                $thumb_size = array();
                $count = count($thumb_matches[0]);
                if ($count > 1) {
                    $thumb_size[] = $thumb_matches[0][0]; // width
                    $thumb_size[] = $thumb_matches[0][1]; // height
                } elseif (1 === $count) {
                    $thumb_size[] = $thumb_matches[0][0]; // width
                    $thumb_size[] = $thumb_matches[0][0]; // height
                } else {
                    $thumb_size = false;
                }
            }
        }
        if (is_array($thumb_size)) {
            // Resize image to custom size
            $p_img = jws_wpb_resize2($attach_id, null, $thumb_size[0], $thumb_size[1], true);
            $alt = trim(strip_tags(get_post_meta($attach_id, '_wp_attachment_image_alt', true)));
            $attachment = get_post($attach_id);
            if (!empty($attachment)) {
                $title = trim(strip_tags($attachment->post_title));

                if (empty($alt)) {
                    $alt = trim(strip_tags($attachment->post_excerpt)); // If not, Use the Caption
                }
                if (empty($alt)) {
                    $alt = $title;
                } // Finally, use the title
                if ($p_img) {

                    $attributes = jws_stringify_attributes(array(
                        'class' => $thumb_class,
                        'src' => $p_img['url'],
                        'width' => $p_img['width'],
                        'height' => $p_img['height'],
                        'alt' => $alt,
                        'title' => $title,
                    ));

                    $thumbnail = '<img ' . $attributes . ' />';
                }
            }
        }
    }

    $p_img_large = wp_get_attachment_image_src($attach_id, 'large');

    return apply_filters('jws_wpb_getimagesize', array(
        'thumbnail' => $thumbnail,
        'p_img_large' => $p_img_large,
    ), $attach_id, $params);
}

if (!function_exists('jws_wpb_resize2')) {
    /**
     * @param int $attach_id
     * @param string $img_url
     * @param int $width
     * @param int $height
     * @param bool $crop
     *
     * @since 4.2
     * @return array
     */
    function jws_wpb_resize2($attach_id = null, $img_url = null, $width, $height, $crop = false)
    {
        // this is an attachment, so we have the ID
        $image_src = array();
        if ($attach_id) {
            $image_src = wp_get_attachment_image_src($attach_id, 'full');
            $actual_file_path = get_attached_file($attach_id);
            // this is not an attachment, let's use the image url
        } elseif ($img_url) {
            $file_path = parse_url($img_url);
            $actual_file_path = rtrim(ABSPATH, '/') . $file_path['path'];
            $orig_size = getimagesize($actual_file_path);
            $image_src[0] = $img_url;
            $image_src[1] = $orig_size[0];
            $image_src[2] = $orig_size[1];
        }
        if (!empty($actual_file_path)) {
            $file_info = pathinfo($actual_file_path);
            $extension = '.' . $file_info['extension'];

            // the image path without the extension
            $no_ext_path = $file_info['dirname'] . '/' . $file_info['filename'];

            $cropped_img_path = $no_ext_path . '-' . $width . 'x' . $height . $extension;

            // checking if the file size is larger than the target size
            // if it is smaller or the same size, stop right here and return
            if ($image_src[1] > $width || $image_src[2] > $height) {

                // the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
                if (file_exists($cropped_img_path)) {
                    $cropped_img_url = str_replace(basename($image_src[0]), basename($cropped_img_path), $image_src[0]);
                    $vt_image = array(
                        'url' => $cropped_img_url,
                        'width' => $width,
                        'height' => $height,
                    );

                    return $vt_image;
                }

                if (false == $crop) {
                    // calculate the size proportionaly
                    $proportional_size = wp_constrain_dimensions($image_src[1], $image_src[2], $width, $height);
                    $resized_img_path = $no_ext_path . '-' . $proportional_size[0] . 'x' . $proportional_size[1] . $extension;

                    // checking if the file already exists
                    if (file_exists($resized_img_path)) {
                        $resized_img_url = str_replace(basename($image_src[0]), basename($resized_img_path), $image_src[0]);

                        $vt_image = array(
                            'url' => $resized_img_url,
                            'width' => $proportional_size[0],
                            'height' => $proportional_size[1],
                        );

                        return $vt_image;
                    }
                }

                // no cache files - let's finally resize it
                $img_editor = wp_get_image_editor($actual_file_path);

                if (is_wp_error($img_editor) || is_wp_error($img_editor->resize($width, $height, $crop))) {
                    return array(
                        'url' => '',
                        'width' => '',
                        'height' => '',
                    );
                }

                $new_img_path = $img_editor->generate_filename();

                if (is_wp_error($img_editor->save($new_img_path))) {
                    return array(
                        'url' => '',
                        'width' => '',
                        'height' => '',
                    );
                }
                if (!is_string($new_img_path)) {
                    return array(
                        'url' => '',
                        'width' => '',
                        'height' => '',
                    );
                }

                $new_img_size = getimagesize($new_img_path);
                $new_img = str_replace(basename($image_src[0]), basename($new_img_path), $image_src[0]);

                // resized output
                $vt_image = array(
                    'url' => $new_img,
                    'width' => $new_img_size[0],
                    'height' => $new_img_size[1],
                );

                return $vt_image;
            }

            // default output - without resizing
            $vt_image = array(
                'url' => $image_src[0],
                'width' => $image_src[1],
                'height' => $image_src[2],
            );

            return $vt_image;
        }

        return false;
    }
}
function jws_stringify_attributes($attributes)
{
    $atts = array();
    foreach ($attributes as $name => $value) {
        $atts[] = $name . '="' . esc_attr($value) . '"';
    }
    return implode(' ', $atts);
}
// **********************************************************************// 
// ! Add favicon 
// **********************************************************************// 
if (!function_exists('jws_favicon')) {
    function jws_favicon()
    {

        if (function_exists('has_site_icon') && has_site_icon()) return '';

        // Get the favicon.
        $favicon = get_stylesheet_directory_uri() . '/favicon.ico';


        global $jws_option;
        
        if(isset($jws_option['favicon']) && !empty($jws_option['favicon'])) {
            $favicon = $jws_option['favicon']['url'];
        }

        ?>
    <link rel="shortcut icon" href="<?php echo esc_attr($favicon); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo esc_attr($favicon); ?>">
    <?php
    }

    add_action('wp_head', 'jws_favicon');
}
if (!function_exists('jws_loading')) {
    function jws_loading()
    {

    global $jws_option;
    $loadingimg = (isset($jws_option['logo_loading']) && $jws_option['logo_loading']) ? $jws_option['logo_loading'] : '';
    $loadingtext = (isset($jws_option['logo_text_loading']) && $jws_option['logo_text_loading']) ? $jws_option['logo_text_loading'] : '';
        if((isset($jws_option['loading']) && $jws_option['loading']) && !empty($loadingimg) ) :
        
     ?>
    <div class="jws-loader">
        <div class="loading_logo">
            <img src="<?php echo esc_url( $loadingimg['url'] ); ?>"
                alt="<?php echo esc_attr__('logo_loading','ailab'); ?>" />
            <span class="animation_loading_js"></span>
            <span class="logo-text-loading"><?php echo esc_html($loadingtext); ?></span>
        </div>
    </div>
    <?php endif;
    }
    add_action('wp_footer', 'jws_loading');
}  
if (class_exists('Woocommerce')) {
    if( ! function_exists( 'jws_ajax_load_product' ) ) {
    	function jws_ajax_load_product($id = false) {
    		if( isset($_GET['id']) ) {
    			$id = (int) $_GET['id'];
    		}
    
    
    		global $post, $product;
    
    
    		$args = array( 'post__in' => array($id), 'post_type' => 'product' );
    
    		$quick_posts = get_posts( $args );
    
    	
    
    		foreach( $quick_posts as $post ) :
    			setup_postdata($post);
    			$product = wc_get_product($post);
    			include('quickview/content-quickview.php' );
    		endforeach; 
    
    		wp_reset_postdata(); 
    
    		die();
    	}
    
        
        // Note: Keep default AJAX actions in case WooCommerce endpoint URL is unavAILable
        add_action('wp_ajax_jws_ajax_load_product', 'jws_ajax_load_product');
        add_action('wp_ajax_nopriv_jws_ajax_load_product', 'jws_ajax_load_product');
    
    } 
}

// Remove product in the cart using ajax
function jws_warp_ajax_product_remove()
{
    // Get mini cart
    ob_start();

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item)
    {
        if($cart_item['product_id'] == $_POST['product_id'] && $cart_item_key == $_POST['cart_item_key'] )
        {
            WC()->cart->remove_cart_item($cart_item_key);
        }
    }

    WC()->cart->calculate_totals();
    WC()->cart->maybe_set_cart_cookies();

    woocommerce_mini_cart();

    $mini_cart = ob_get_clean();

    // Fragments and mini cart are returned
    $data = array(
        'fragments' => apply_filters( 'woocommerce_add_to_cart_fragments', array(
                'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>'
            )
        ),
        'cart_hash' => apply_filters( 'woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5( json_encode( WC()->cart->get_cart_for_session() ) ) : '', WC()->cart->get_cart_for_session() )
    );

    wp_send_json( $data );

    die();
}

add_action( 'wp_ajax_product_remove', 'jws_warp_ajax_product_remove' );
add_action( 'wp_ajax_nopriv_product_remove', 'jws_warp_ajax_product_remove' );

// Remove product in the cart using ajax
function backtotop(){ ?>
    <a href="#" class="backToTop fa fa-arrow-up"></a>
    <?php }
add_action( 'wp_footer', 'backtotop' );

function jws_get_posts_title_by_id() {

		$ids = isset( $_POST['id'] ) ? $_POST['id'] : array();

		$results = [];

		$query = new \WP_Query(
			[
				'post_type'      => 'any',
				'post__in'       => $ids,
				'posts_per_page' => -1,
			]
		);

		foreach ( $query->posts as $post ) {
			$results[ $post->ID ] = $post->post_title;
		}

		// return the results in json.
		wp_send_json( $results );
	}  
    
    
    	/**
	 * Get post by search
	 *
	 * @since 1.1.0
	 */
	function jws_get_posts_by_query() {

		$search_string = isset( $_POST['q'] ) ? sanitize_text_field( $_POST['q'] ) : '';
		$req_post_type = isset( $_POST['post_type'] ) ? sanitize_text_field( $_POST['post_type'] ) : 'all';

		$data   = array();
		$result = array();

		$args = array(
			'public'   => true,
			'_builtin' => false,
		);

		$output   = 'names'; // names or objects, note names is the default.
		$operator = 'and'; // also supports 'or'.

		if ( 'all' === $req_post_type ) {
			$post_types = get_post_types( $args, $output, $operator );

			$post_types['Posts'] = 'post';
			$post_types['Pages'] = 'page';
		} else {
			$post_types[ $req_post_type ] = $req_post_type;
		}

		foreach ( $post_types as $key => $post_type ) {

			$data = array();


			$query = new \WP_Query(
				array(
					's'              => $search_string,
					'post_type'      => $post_type,
					'posts_per_page' => - 1,
				)
			);

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					$title  = get_the_title();
					$title .= ( 0 != $query->post->post_parent ) ? ' (' . get_the_title( $query->post->post_parent ) . ')' : '';
					$id     = get_the_id();
					$data[] = array(
						'id'   => $id,
						'text' => $title,
					);
				}
			}

			if ( is_array( $data ) && ! empty( $data ) ) {
				$result[] = array(
					'text'     => $key,
					'children' => $data,
				);
			}
		}

		$data = array();

		wp_reset_postdata();

		// return the result in json.
		wp_send_json( $result );
	}  
    
    	/**
	 * Return search results only by post title.
	 * This is only run from get_posts_by_query()
	 *
	 * @param  (string)   $search   Search SQL for WHERE clause.
	 * @param  (WP_Query) $wp_query The current WP_Query object.
	 *
	 * @return (string) The Modified Search SQL for WHERE clause.
	 */
	function jws_search_only_titles( $search, $wp_query ) {
		if ( ! empty( $search ) && ! empty( $wp_query->query_vars['search_terms'] ) ) {
			global $wpdb;

			$q = $wp_query->query_vars;
			$n = ! empty( $q['exact'] ) ? '' : '%';

			$search = array();

			foreach ( (array) $q['search_terms'] as $term ) {
				$search[] = $wpdb->prepare( "$wpdb->posts.post_title LIKE %s", $n . $wpdb->esc_like( $term ) . $n );
			}

			if ( ! is_user_logged_in() ) {
				$search[] = "$wpdb->posts.post_password = ''";
			}

			$search = ' AND ' . implode( ' AND ', $search );
		}

		return $search;
	}
    
add_action( 'wp_ajax_jws_get_posts_by_query', 'jws_get_posts_by_query');
add_action( 'wp_ajax_jws_get_posts_title_by_id', 'jws_get_posts_title_by_id' );

/* Title Bar */
if ( ! function_exists( 'jws_title_bar' ) ) {
	function jws_title_bar() {
		global $jws_option;
        global $post;
        $background_image='';
        if(!empty($post)){
            $background_image = get_the_post_thumbnail_url( $post->ID, 'full' );
        }
       
		$delimiter ='<i aria-hidden="true" class="fas fa-circle"></i>';
        if((isset($jws_option['title-bar-switch']) && $jws_option['title-bar-switch']) || empty($jws_option)) :
		
        if(is_page()&&!is_single()) : ?>
             <div class="jws-title-bar-wrap"
                <?php if($background_image) echo 'style="background-image: url('.$background_image.')"' ?>>
                <div class="container">
                    <div class="jws-title-bar">
                        <h1 class="jws-text-ellipsis"><?php echo jws_page_title(); ?></h1>
                        <?php  if(isset($jws_option['breadcrumb_page']) && $jws_option['breadcrumb_page']) :?>
                            <div class="jws-path">
                                <div class="jws-path-inner">
                                    <?php echo jws_page_breadcrumb($delimiter); ?>
                                </div>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="jws-title-bar-wrap"
                    <?php if($background_image && (isset($jws_option['show_image_feature_in_title_bar']) && $jws_option['show_image_feature_in_title_bar']==1)) echo 'style="background-image: url('.$background_image.')"' ?>>
                    <div class="container">
                        <div class="jws-title-bar">
                            <h1 class="jws-text-ellipsis"><?php echo jws_page_title(); ?></h1>
                            <?php  if(isset($jws_option['breadcrumb_page']) && $jws_option['breadcrumb_page']) :?>
                                <div class="jws-path">
                                    <div class="jws-path-inner">
                                        <?php echo jws_page_breadcrumb($delimiter); ?>
                                    </div>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
        <?php endif; ?>
    <?php 
        endif;
	}
}

/* Page breadcrumb */
if (!function_exists('jws_page_breadcrumb')) {
    function jws_page_breadcrumb($delimiter) {
		ob_start();

		$home = esc_html__('Home', 'ailab');
		global $post;
		$homeLink = home_url();
		if( is_home() ){
			_e('Home', 'ailab');
		}else{
			echo '<a href="' . $homeLink . '">' . $home . '</a> ' . '<span class="delimiter">'. $delimiter . '</span>' . ' ';
		}

		if ( is_category() ) {
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
			echo '<span class="current">' . esc_html__('Archive by category: ', 'ailab') . single_cat_title('', false) . '</span>';

		} elseif ( is_search() ) {
			echo '<span class="current">' . esc_html__('Search results for: ', 'ailab') . get_search_query() . '</span>';

		} elseif ( is_post_type_archive( 'product' ) ) {
			echo '<span class="current">' . esc_html__('Shop', 'ailab') . '</span>';

		} elseif ( is_day() ) {
			echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F').' '. get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<span class="current">' . get_the_time('d') . '</span>';

		} elseif ( is_month() ) {
			echo '<span class="current">' . get_the_time('F'). ' '. get_the_time('Y') . '</span>';

		} 
        elseif ( is_month() ) {
			echo '<span class="current">' . get_the_time('F'). ' '. get_the_time('Y') . '</span>';

		}
        elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				if(get_post_type() == 'portfolio'){
					$terms = get_the_terms(get_the_ID(), 'portfolio_category', '' , '' );
					if($terms) {
						the_terms(get_the_ID(), 'portfolio_category', '' , ', ' );
						echo '' . '<span class="current">' . get_the_title() . '</span>';
					}else{
						echo '<span class="current">' .esc_html('Portfolio Details', 'ailab'). '</span>';
					}
				}elseif(get_post_type() == 'jwsdonations'){
					$terms = get_the_terms(get_the_ID(), 'recipe_category', '' , '' );
					if($terms) {
						the_terms(get_the_ID(), 'recipe_category', '' , ', ' );
						echo ' ' . '<span class="current">' .esc_html('Causes Details', 'ailab'). '</span>';
					}else{
						echo '<span class="current">' . get_the_title() . '</span>';
					}
				}elseif(get_post_type() == 'team'){
					$terms = get_the_terms(get_the_ID(), 'team_category', '' , '' );
					if($terms) {
						//the_terms(get_the_ID(), 'team_category', '' , ', ' );
						echo '' . '<span class="current">'.esc_html('Team Details', 'ailab'). '</span>';
					}else{
						echo '<span class="current">' . get_the_title() . '</span>';
					}
				}elseif(get_post_type() == 'testimonial'){
					$terms = get_the_terms(get_the_ID(), 'testimonial_category', '' , '' );
					if($terms) {
						the_terms(get_the_ID(), 'testimonial_category', '' , ', ' );
						echo '' . '<span class="current">' .esc_html('Testimonial Details', 'ailab').  '</span>';
					}else{
						echo '<span class="current">' . get_the_title() . '</span>';
					}
				}elseif(get_post_type() == 'story'){
						echo '<span class="current">' . get_the_title() . '</span>';
				}elseif(get_post_type() == 'product'){
					$terms = get_the_terms(get_the_ID(), 'product_cat', '' , '' );
					if($terms) {
						the_terms(get_the_ID(), 'product_cat', ' ' , ', ' , '<span class="delimiter">'.' ' . $delimiter . ' ' . '</span>'  );
						echo ''  . '<span class="current">' .the_title(). '</span>';
					}else{
						echo '<span class="current">'.the_title().'</span>';
					}
				}else{
					if(is_singular( 'event' )) {
						echo '<span class="current">'.esc_html('Event Details', 'ailab').'</span>';
						
					} else {
						$post_type = get_post_type_object(get_post_type());
						$slug = $post_type->rewrite;
						echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
						echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
					}
				}

			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo ''.$cats;
                echo '<span class="current">' .get_the_title(). '</span>';

			}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			if($post_type) echo '<span class="current">' . $post_type->labels->singular_name . '</span>';
		} elseif ( is_attachment() ) {
			$parent = get_post($post->post_parent);
			echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
			echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
		} elseif ( is_page() && !$post->post_parent ) {
			echo '<span class="current">' . get_the_title() . '</span>';

		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				echo ''.$breadcrumbs[$i];
				if ($i != count($breadcrumbs) - 1)
					echo ' ' . $delimiter . ' ';
			}
			echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';

		} elseif ( is_tag() ) {
			echo '<span class="current">' . esc_html__('Posts tagged: ', 'ailab') . single_tag_title('', false) . '</span>';
		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo '<span class="current">' . esc_html__('Articles posted by ', 'ailab') . $userdata->display_name . '</span>';
		} elseif ( is_404() ) {
			echo '<span class="current">' . esc_html__('Error 404', 'ailab') . '</span>';
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
				echo ' '.'<span class="delimiter">'.$delimiter.'</span> ' . ' '.'<span class="paged-number">'.esc_html__('Page', 'ailab') . ' ' . get_query_var('paged').'</span>';
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
			
		return ob_get_clean();
    }
}
/* Page title */
if (!function_exists('jws_page_title')) {
    function jws_page_title() { 
            ob_start();
			if( is_home() ){
				_e('Home', 'ailab');
			}elseif(is_search()){
                _e('Search Keyword: ', 'ailab'); echo '<span class="keywork">'. get_search_query(). '</span>';
            }elseif(is_post_type_archive( 'product' )){
                _e('Shop', 'ailab');
            }else {
                if (is_category()){
                    single_cat_title();
                }elseif(get_post_type() == 'event' || get_post_type() == 'jwsdonations'  || get_post_type() == 'testimonial' ){
                    single_term_title();
                }
                elseif (is_tag()){
                    single_tag_title();
                }elseif (is_author()){
                    printf(__('Author: %s', 'ailab'), '<span class="vcard">' . get_the_author() . '</span>');
                }elseif (is_day()){
                    printf(__('Day: %s', 'ailab'), '<span>' . get_the_date() . '</span>');
                }elseif (is_month()){
                    printf(__('Month: %s', 'ailab'), '<span>' . get_the_date() . '</span>');
                }elseif (is_year()){
                    printf(__('Year: %s', 'ailab'), '<span>' . get_the_date() . '</span>');
                }elseif (is_tax('post_format', 'post-format-aside')){
                    _e('Asides', 'ailab');
                }elseif (is_tax('post_format', 'post-format-gallery')){
                    _e('Galleries', 'ailab');
                }elseif (is_tax('post_format', 'post-format-image')){
                    _e('Images', 'ailab');
                }elseif (is_tax('post_format', 'post-format-video')){
                    _e('Videos', 'ailab');
                }elseif (is_tax('post_format', 'post-format-quote')){
                    _e('Quotes', 'ailab');
                }elseif (is_tax('post_format', 'post-format-link')){
                    _e('Links', 'ailab');
                }elseif (is_tax('post_format', 'post-format-status')){
                    _e('Statuses', 'ailab');
                }elseif (is_tax('post_format', 'post-format-audio')){
                    _e('Audios', 'ailab');
                }elseif (is_tax('post_format', 'post-format-chat')){
                    _e('Chats', 'ailab');
                }
                elseif(get_post_type() == 'product' && !is_single()){
                   single_term_title();
                }else{
                    the_title();
                }
            }
                
            return ob_get_clean();
    }
}

// show case study service
function jws_gallery_popup() {
	$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
	$images = get_post_meta( $id, 'case_study_gallery', 1 ) ;
	?>
	<div class="popup-image-gallery" id="popup-image-gallery">
	<div class="gallery-popup">
		<div class="gallery-listing">
			<?php 
				foreach ( (array) $images as $attachment_id => $attachment_url ) {?>
				<div class="main-image">
					<img src="<?php echo wp_get_attachment_url( $attachment_id, 'thumbnail' ) ?>" alt="<?php esc_attr('image');?>" class="gallery-img">
				</div>
				<?php	}?>
		</div>
		</div>
	</div> 

	<?php die();
}
add_action( 'wp_ajax_nopriv_gallery_popup123', 'jws_gallery_popup' );
add_action( 'wp_ajax_gallery_popup123', 'jws_gallery_popup' );

if( current_user_can('editor') || current_user_can('administrator') ) {

 $user_id = wp_get_current_user();   
 update_user_meta($user_id->ID, 'is_activated', 1); 
} 