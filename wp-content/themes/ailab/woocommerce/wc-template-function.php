<?php
add_theme_support('wc-product-gallery-zoom');
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10 );
remove_action( 'wp_head', 'wc_gallery_noscript'); 

add_theme_support('woocommerce');
if (!function_exists('jws_cat_list')) {
    function jws_cat_list()
    { echo '<div class="jws_cat_list">';  
        echo wc_get_product_category_list( get_the_id(),' <span></span> ' );
      echo '</div>';  
    }
}
//add_filter('woocommerce_enqueue_styles', '__return_empty_array');
if (!function_exists('woocommerce_template_loop_product_title')) {

    /**
     * Show the product title in the product loop. By default this is an H2.
     */
    function woocommerce_template_loop_product_title()
    {
        echo '<h4 class="woocommerce-loop-product__title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
    }
}
if (!function_exists('woocommerce_get_product_thumbnail_gallery')) {

    /**
     * Get the product thumbnail gallery , or the placeholder if not set.
     *
     * @param string $size (default: 'woocommerce_thumbnail').
     * @param int $deprecated1 Deprecated since WooCommerce 2.0 (default: 0).
     * @param int $deprecated2 Deprecated since WooCommerce 2.0 (default: 0).
     * @return string
     */

    function woocommerce_get_product_thumbnail_gallery()
    {
        global $product;
        $attachment_ids = $product->get_gallery_image_ids();
        if (isset($attachment_ids[0])) {
            $attachment_id = $attachment_ids[0];
            echo '<div class="nxl_product_image_gallery">' . wp_get_attachment_image($attachment_id, 'woocommerce_thumbnail') . '</div>';
        }
    }

    add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_get_product_thumbnail_gallery', 20);
}


/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter('loop_shop_per_page', 'jws_new_loop_shop_per_page', 20);

function jws_new_loop_shop_per_page($cols)
{
    global $jws_option;
    // $cols contains the current number of products per page based on the value stored on Options -> Reading
    // Return the number of products you wanna show per page.
    if(isset($jws_option['shop_post_number']) && !empty($jws_option['shop_post_number'])) {
      $cols = $jws_option['shop_post_number'];  
    }
    
    return $cols;
}


if (!function_exists('woocommerce_review_display_gravatar')) {
    /**
     * Display the review authors gravatar
     *
     * @param array $comment WP_Comment.
     * @return void
     */
    function woocommerce_review_display_gravatar($comment)
    {
        echo get_avatar($comment, apply_filters('woocommerce_review_gravatar_size', '110'), '');
    }
}
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);;
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15);

add_filter('woocommerce_checkout_fields', 'jws_override_billing_checkout_fields', 20, 1);
function jws_override_billing_checkout_fields($fields)
{

    $fields['billing']['billing_first_name']['placeholder'] = 'First Name';
    $fields['billing']['billing_last_name']['placeholder'] = 'Last Name';
    $fields['billing']['billing_company']['placeholder'] = 'Company name (optional)';
    $fields['billing']['billing_address_1']['placeholder'] = 'Street address';
    $fields['billing']['billing_address_2']['placeholder'] = 'Street address';
    $fields['billing']['billing_postcode']['placeholder'] = 'Postcode / ZIP';
    $fields['billing']['billing_phone']['placeholder'] = 'Phone';
    $fields['billing']['billing_city']['placeholder'] = 'Town / City';
    $fields['billing']['billing_email']['placeholder'] = 'Email Address';
    $fields['billing']['billing_state']['placeholder'] = ' State';


    $fields['shipping']['shipping_first_name']['placeholder'] = 'First Name';
    $fields['shipping']['shipping_last_name']['placeholder'] = 'Last Name';
    $fields['shipping']['shipping_company']['placeholder'] = 'Company name (optional)';
    $fields['shipping']['shipping_address_1']['placeholder'] = 'Street address';
    $fields['shipping']['shipping_address_2']['placeholder'] = 'Street address';
    $fields['shipping']['shipping_postcode']['placeholder'] = 'Postcode / ZIP';
    $fields['shipping']['shipping_phone']['placeholder'] = 'Phone';
    $fields['shipping']['shipping_city']['placeholder'] = 'Town / City';
    $fields['shipping']['shipping_email']['placeholder'] = 'Email Address';
    $fields['shipping']['shipping_state']['placeholder'] = ' State';


    return $fields;
}
// Share blog
if (!function_exists('jws_share_product')) :
    function jws_share_product()
    {?>
        <div class="clearfix vg-share-link single-social-bar product-share">
            <ul>
                <li> <a class="link-item fb" href="https://www.facebook.com/sharer.php?u=<?php echo urlencode( get_permalink() );?>" title="<?php echo esc_attr__( 'Facebook', 'ailab' )?>" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a></li>
                <li> <a class="link-item tw" href="https://twitter.com/share?url=<?php echo urlencode( get_permalink() )?>&amp;text=<?php echo rawurlencode( esc_attr( get_the_title() ) )?>" title="<?php echo esc_attr__( 'Twitter', 'ailab' ) ?>" target="_blank">
                    <i class="fab fa-twitter"></i>
                </a></li>
                <li> <a class="link-item fb" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode( get_permalink() );?>&description=<?php echo rawurlencode( esc_attr( get_the_title() ) )?>" title="<?php echo esc_attr__( 'Pinterest', 'ailab' )?>" target="_blank">
                    <i class="fab fa-pinterest"></i>
                </a></li>
                <li> <a class="link-item fb" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode( get_permalink() );?>&description=<?php echo rawurlencode( esc_attr( get_the_title() ) )?>" title="<?php echo esc_attr__( 'Pinterest', 'ailab' )?>" target="_blank">
                    <i class="far fa-envelope"></i>
                </a></li>
            </ul>
            <span class="click-to-share"><i aria-hidden="true" class="fas fa-share-alt"></i><?php echo esc_html__( "Share", 'ailab' )?> </span>
    </div>
    <?php }
endif;
if(function_exists('insert_shortcode')) {
     insert_shortcode('jws_share_product', 'jws_share_product');
}

/**
 * Custom product thumbnail on single
 **/
 	function product_thumbnails() {
		global $post, $product, $woocommerce , $ailab_loop;
        $options = get_post_meta( get_the_ID(), '_custom_wc_options', true );
       
        $thumb_position = 'left';
		$attachment_ids = $product->get_gallery_image_ids();
        $data_slick = '';
     
           $data_slick = 'data-slick=\'{"slidesToShow": 5,"slidesToScroll": 1,"asNavFor": "#product-images","arrows": false, "focusOnSelect": true,  "responsive":[{"breakpoint": 736,"settings":{"slidesToShow": 4, "vertical":false}}]}}\''; 
       

       	if ( $attachment_ids ) {
			$loop    = 1;
			$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
			?>
			<div class="product-thumbnails" id="product-thumbnails">
				<div class="thumbnails <?php echo 'columns-' . $columns; ?>" ><?php

					$image_thumb = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_small_thumbnail_size', 'shop_single' ) );

					if ( $image_thumb ) {

						printf(
							'<div class="gallery-item">%s</div>',
							$image_thumb
						);

					}

					if ( $attachment_ids ) {
						foreach ( $attachment_ids as $attachment_id ) {



							$props = wc_get_product_attachment_props( $attachment_id, $post );

							if ( ! $props['url'] ) {
								continue;
							}

							echo apply_filters(
								'woocommerce_single_product_image_thumbnail_html',
								sprintf(
									'<div class="gallery-item">%s</div>',
									wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_single' ), 0, $props )
								),
								$attachment_id,
								$post->ID
							);

							$loop ++;
						}
					}



					?>
				</div>
			</div>
			<?php
		}
        
	}