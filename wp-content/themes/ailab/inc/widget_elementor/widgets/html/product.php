<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="col-<?php echo esc_attr($settings['columns_mobile']) ?> col-md-<?php echo esc_attr($settings['columns_tablet']) ?> col-lg-<?php echo esc_attr($settings['columns']) ?> product-item">
	<div class="product-grid">
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	?>
	<div class="text-center"><a href="<?php the_permalink(); ?>" class="product-image">
		<?php
			do_action( 'woocommerce_before_shop_loop_item_title' ,'woocommerce_thumbnail');
		 ?>
	</a>
		<div class="cart-hover">
		<p class="product-eyes"><a data-product_id="<?php echo esc_attr($product->get_id()); ?>" href="<?php the_permalink(); ?>"><span>Quick View</span><i class="far fa-eye"></i></a></p>
			<?php do_action( 'woocommerce_after_shop_loop_item' );?>
			<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
		</div>
	</div><?php 
	?>
    <div class="product-inner-content">
	<?php 

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	 do_action( 'woocommerce_shop_loop_item_title' );

	 /**
     * @hooked woocommerce_category - 10
     */
	?>
	<div class="flex-space-between">
	<?php
    if ($settings['show_category']) {
        jws_cat_list();
    }
		/**
		 * Hook: woocommerce_after_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' );
	?>
	</div>
	</div>
	</div>
</div>
