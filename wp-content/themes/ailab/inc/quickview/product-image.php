<?php
/**
 *    jws: Quickview Product Image
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $post, $product;

$attachment_ids = $product->get_gallery_image_ids();
$attachment_count = count( $attachment_ids );
$slider_disabled_class = (count($attachment_ids) == 0) ? ' jws-carousel-disabled' : ' slick-slider slick-arrows-small';
?>

    <div class="images">
        <div class="woo-variation-gallery-wrapper">
            <div class="woo-variation-gallery-slider-wrapper">
                <?php echo woocommerce_show_product_sale_flash(); ?>
                <div id="jws-quickview-slider"
                     class="woocommerce-product-gallery__wrapper quick-view-gallery product-images <?php echo esc_attr($slider_disabled_class); ?>">
                    <?php
                   	
			$attributes = array(
				'title' => esc_attr( get_the_title( get_post_thumbnail_id() ) )
			);

			if ( has_post_thumbnail() ) {

				echo '<figure class="woocommerce-product-gallery__image quick-view-gallery">';
				if (function_exists('jws_getImageBySize')) {
					$attach_id = get_post_thumbnail_id();
					$img = jws_getImageBySize(array('attach_id' => $attach_id, 'thumb_size' => '400x500', 'class' => 'single_product_large_thumbnail_size'));
					echo ''.$img['thumbnail'];
					}else {
					echo ''.$img = get_the_post_thumbnail(get_the_ID(), '400x500');
				   }
				   echo '</figure>';
				if ( $attachment_count > 0 ) {
					foreach ( $attachment_ids as $attachment_id ) {
						echo '<div class="product-image-wrap"><figure class="woocommerce-product-gallery__image quick-view-gallery">';
						if (function_exists('jws_getImageBySize')) {
							$attach_id = get_post_thumbnail_id();
							$img = jws_getImageBySize(array('attach_id' => $attachment_id, 'thumb_size' => '400x500', 'class' => 'single_product_large_thumbnail_size'));
							echo ''.$img['thumbnail'];
							}else {
							echo ''.$img = get_the_post_thumbnail(get_the_ID(), '400x500');
						   }
						echo '</figure></div>';
					}
				}

			} else {

				echo '<figure class="woocommerce-product-gallery__image--placeholder">' . apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'ailab' ) ), $post->ID ) . '</figure>';

			}

		?>
                   
                </div>
            </div>
        </div>
    </div>
