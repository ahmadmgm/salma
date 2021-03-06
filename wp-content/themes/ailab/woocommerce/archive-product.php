<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;
global $jws_option;


get_header();
if(is_page()) {
      
    jws_title_bar();

}else {
jws_title_bar(); 
}
?>
    <div class="container nxl_woo_shop jws-product-shop"> <?php
        if (woocommerce_product_loop()) {

            /**
             * Hook: woocommerce_before_shop_loop.
             *
             * @hooked woocommerce_output_all_notices - 10
             * @hooked woocommerce_result_count - 20
             * @hooked woocommerce_catalog_ordering - 30
             */
            ?>
            <div class="nxl_woo_top"><?php
                do_action('woocommerce_before_shop_loop');
            ?> </div> <?php
            woocommerce_product_loop_start();

            if (wc_get_loop_prop('total')) {
                ?>

                <div class="nxl-products-element row product-archive">
                    <?php
                    while (have_posts()) {
                        the_post();

                        /**
                         * Hook: woocommerce_shop_loop.
                         *
                         * @hooked WC_Structured_Data::generate_product_data() - 10
                         */

                        do_action('woocommerce_shop_loop');
                        ?>
                        <div class="nxl-products-grid col-md-<?php echo (isset($jws_option['shop_columns']) && !empty($jws_option['shop_columns'])) ? esc_attr($jws_option['shop_columns']) : '4'; ?> col-sm-2 col-xs-3">
                            <div class="nxl-products-inner"><?php
                                wc_get_template_part('content', 'product');
                                ?> </div>
                        </div>  <?php
                    }
                    ?>
                </div>
                <?php
            }

            woocommerce_product_loop_end();

            /**
             * Hook: woocommerce_after_shop_loop.
             *
             * @hooked woocommerce_pagination - 10
             */
            do_action('woocommerce_after_shop_loop');
        } else {
            /**
             * Hook: woocommerce_no_products_found.
             *
             * @hooked wc_no_products_found - 10
             */
            do_action('woocommerce_no_products_found');
        }

        ?> </div> <?php

get_footer();
