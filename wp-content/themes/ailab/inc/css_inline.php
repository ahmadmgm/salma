<?php
/**
 * Render custom styles.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'jws_custom_css' ) ) {
	function jws_custom_css( $css = array() ) {
    
    global $jws_option;
        $custom_meta_color= (is_page()) ? get_post_meta(get_the_ID(), 'custom_main_color', true) : '';
        $price_color = isset($jws_option['price_color']) ?$jws_option['price_color'] :'';
        $text_hover_color = isset($jws_option['text_hover_color']) ?$jws_option['text_hover_color'] :'';
        $page_button1= (is_page()) ? get_post_meta(get_the_ID(), 'button_background_gradient_color_start', true) : '';
        if(!empty($page_button1)) {
          $button_start = $page_button1;
        }else {
          $button_start = (isset($jws_option['button-start']) && $jws_option['button-start']) ? $jws_option['button-start'] : '';
        }
         $page_button2= (is_page()) ? get_post_meta(get_the_ID(), 'button_background_gradient_color_end', true) : '';
        if(!empty($page_button2)) {
          $button_end = $page_button2;
        }else {
          $button_end = (isset($jws_option['button-end']) && $jws_option['button-end']) ? $jws_option['button-end'] : '';
        }
        $page_text_color_start= (is_page()) ? get_post_meta(get_the_ID(), 'button_text_gradient_color_start', true) : '';
        if(!empty($page_text_color_start)) {
          $text_color_start = $page_text_color_start;
        }else {
          $text_color_start = (isset($jws_option['text-color-start']) && $jws_option['text-color-start']) ? $jws_option['text-color-start'] : '';
        }
        
        $page_text_color_end= (is_page()) ? get_post_meta(get_the_ID(), 'button_text_gradient_color_end', true) : '';
        if(!empty($page_text_color_end)) {
          $text_color_end = $page_text_color_end;
        }else {
          $text_color_end = (isset($jws_option['text-color-end']) && $jws_option['text-color-end']) ? $jws_option['text-color-end'] : '';
        }
        
        $page_main_color= (is_page()) ? get_post_meta(get_the_ID(), 'main_color', true) : '';
        if(!empty($page_main_color)) {
          $main_color = $page_main_color;
        }else {
          $main_color = (isset($jws_option['main_color']) && $jws_option['main_color']) ? $jws_option['main_color'] : '';
        }
        
        $page_body= (is_page()) ? get_post_meta(get_the_ID(), 'paragraphs_color', true) : '';
        if(!empty($page_body)) {
          $body_color = $page_body;
        }else {
          $body_color = (isset($jws_option['body_color']) && $jws_option['body_color']) ? $jws_option['body_color'] : '';
        }
        
		$font_h1 = (isset($jws_option['font_h1']) && $jws_option['font_h1']) ? $jws_option['font_h1'] : ''; 
		$font_h2 = (isset($jws_option['font_h2']) && $jws_option['font_h2']) ? $jws_option['font_h2'] : ''; 
		$font_h3 = (isset($jws_option['font_h3']) && $jws_option['font_h3']) ? $jws_option['font_h3'] : '';
		$font_h4 = (isset($jws_option['font_h4']) && $jws_option['font_h4']) ? $jws_option['font_h4'] : '';
        $font_h5 = (isset($jws_option['font_h5']) && $jws_option['font_h5']) ? $jws_option['font_h5'] : '';
        $font_h6 = (isset($jws_option['font_h6']) && $jws_option['font_h6']) ? $jws_option['font_h6'] : '';
		$font_paragraph = (isset($jws_option['font_paragraph']) && $jws_option['font_paragraph']) ? $jws_option['font_paragraph'] : '';
		$font_body = (isset($jws_option['font_body']) && $jws_option['font_body']) ? $jws_option['font_body'] : ''; 
        $font_button = (isset($jws_option['font-button']) && $jws_option['font-button']) ? $jws_option['font-button'] : '';   
          

        $css[] = 'body h3, body h4, body h5, body h6
             	{color: ' . esc_attr( $main_color ) . '}';
        $css[] = '.woocommerce-Price-amount,
                  .woocommerce-Price-currencySymbol
                  {color: ' . esc_attr( $price_color ) . ';
                  font-family: ' . esc_attr( $font_button['font-family'] ) . ';
                  font-size: ' . esc_attr( $font_button['font-size'] ) . '}';
        $css[] = '
            .jws-quantity input
            {color: ' . esc_attr( $main_color ) . ';
            font-family: ' . esc_attr( $font_paragraph['font-family'] ) . ';
            font-size: ' . esc_attr( $font_paragraph['font-size'] ) . '}';
        $css[] = 'body p,
              .post-tags a,
              input::placeholder,
              textarea::placeholder,              
              .comments-area .comment-form-comment2 textarea::placeholder,
              .comments-area .comment-form .item-comment textarea::placeholder,
              .woocommerce-cart .coupon .input-text::placeholder,
              input[type="checkbox"]:checked:after, input[type="checkbox"]:after,
              .comments-area .comment-form .item-comment input::placeholder,
              .elementor-widget-wp-widget-woocommerce_product_search .search-field::placeholder,
              .elementor-widget-wp-widget-categories li,.elementor-widget-wp-widget-categories li a,
              .widget_search .search-form .search-field::placeholder,
              .widget_search .search-form .search-submit span::before,
              .price del span,
              .woocommerce-grouped-product-list-item__price del span
              {color: ' . esc_attr( $body_color ) . '}';
              $css[] = 'jws-button,
              body h2,
              body h1,
             .elementor-element .elementor-widget-heading.elementor-widget-heading h2,
             .elementor-element .elementor-widget-heading.elementor-widget-heading h1,
             .elementor-element .elementor-widget-heading.elementor-widget-heading h3,
             .elementor-element .elementor-widget-heading.elementor-widget-heading h4,
             .elementor-element .elementor-widget-heading.elementor-widget-heading h6,
             .elementor-element.elementor-widget-icon-list .elementor-icon-list-icon i,
             .option-color-main.elementor-widget-heading.elementor-widget-heading h3,
             .option-color-main i,
             .jws-product-shop select,
             .elementor-post .post-title,
             .testimonial-listing .slick-arrow::after,
             .elementor-widget-text-editor,.elementor-widget-text-editor a,
             .testimonial-listing .elementor-slide-your_name,
             .nxl-pagination .next, 
             .nxl-pagination .prev,
             .jws-slide-services.slide-review .elementor-slide-your_name,
             .elementor-image-carousel-caption,
             .widget_recent_entries li a,
             .nxl-pagination .nxl_pagi_inner .item,
              
              .jws-team .team-item .team-name,
              .elementor-widget-countdown .elementor-countdown-label,
              .elementor-widget-countdown .elementor-countdown-digits,
              .tag-post .elementor-post-info__item-prefix,
              .elementor-widget-post-comments h3,
              .jws-product-shop .woocommerce-result-count,
              .jws_main_menu .jws_nav li .sub-menu li a,
              .jws-product-shop .product-archive .text-center .cart-hover .yith-wcwl-add-to-wishlist a:before,
              .jws-product-shop .product-archive .text-center .cart-hover .product_type_grouped span::before,
              .jws-product-shop .product-archive .text-center .cart-hover .product-eyes i,
              .jws-product-shop .product-archive .text-center .cart-hover .product_type_simple::before,
              .jws-product-shop .product-archive .text-center .cart-hover .product_type_grouped::before,
              .elementor-widget-post-comments .elementor-widget-container .logged-in-as a,
              .jws-testimonial.layout-testimonial3 .slide-content-review .display-flex .elementor-slide-your_name,
              .bg-white--text-blue.elementor-element.elementor-widget-button a.elementor-button, .bg-white--text-blue.elementor-widget-button .elementor-button,
              .woocommerce div.product .woocommerce-tabs ul.tabs li a,.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
              .custom-pricing-tab-home3 .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title,
              .jws-testimonial.layout-testimonial1 .testimonial-listing .elementor-slide-description,
              .jws-testimonial.layout-testimonial1 .testimonial-listing .slick-list .slick-track .slick-slide .slide-icon,
              .elementor-element.elementor-widget-progress .elementor-title,
              .jws_main_menu .jws_nav_menu > ul > li > a,
              .elementor-widget-wp-widget-woocommerce_price_filter .price_slider_amount .price_label,
              .elementor-widget-wp-widget-woocommerce_price_filter .price_slider_amount .button,
              .jet-sticky-section-sticky--stuck .option-color-white .jws_main_menu .jws_nav_menu > ul > li > a,
              .jet-sticky-section-sticky--stuck.custom-header .custom-cart-color-white.custom-cart i,
              .single-wishlist .yith-wcwl-add-to-wishlist a,
              .product-share .click-to-share,
              .custom-cart .elementor-button-icon,
              .elementor-widget-woocommerce-product-meta .product_meta .detail-content a,
              .elementor-widget-woocommerce-product-meta .sku,
              .share-single-product .elementor-share-btn__icon i,
              .share-single-product  .elementor-share-btn__text,
              .elementor-widget-accordion .elementor-accordion-item .elementor-accordion-icon, .elementor-widget-accordion .elementor-accordion-item .elementor-accordion-title,
              .product-share .click-to-share,
              .home4-text-hover.elementor-widget-heading.elementor-widget-heading h3,
              .elementor-element.elementor-widget-icon-box .elementor-icon-box-content .elementor-icon-box-title,
              .woocommerce-breadcrumb,
              .elementor-widget-woocommerce-product-data-tabs .comment-reply-title,
              .woocommerce #reviews #comments ol.commentlist li .meta,
              .elementor-element.elementor-widget-progress .elementor-progress-bar,
              .elementor-element.elementor-widget-icon-list .elementor-icon-list-item span,
              .jws_main_menu .jws_nav_menu .jws_nav li .sub-menu-dropdown .megasub li,
              .custom-border-button.elementor-element.elementor-widget-button a.elementor-button,
              .elementor-rating,
              .jws_account .no_user .jws_text,
              .jws_account.layout_2 .no_user .jws_text,
              .jws-price-table.jws-price-table-layout2 .jws-price-table__heading,
              .jws-team i:hover,
              #jws-popup-login .jws-login-container .jws-animation .link-bottom,
              .jws_account a span,
              .header-position.jet-sticky-section-sticky--stuck .jws_main_menu .jws_nav_menu > ul > li > a,
              .header-position.jet-sticky-section-sticky--stuck .custom-cart .elementor-button-icon,
              .header-position.jet-sticky-section-sticky--stuck .jws-offcanvas-action-wrap .elementor-button-icon,
              .header-position.jet-sticky-section-sticky--stuck .jws-search-form .searchsubmit,
              .header-position.jet-sticky-section-sticky--stuck .jws-search-form .toggle-search,
              .header-position.jet-sticky-section-sticky--stuck .jws_account a span,
              .jws-offcanvas-action-wrap .elementor-button-icon,
              .elementor-service .post-title a,
              .jws-search-form .searchsubmit,
              .jws-search-form .toggle-search,
              .jws-breadcrumbs .jws-breadcrumbs__item,
              .single-wishlist .yith-wcwl-add-to-wishlist a, 
              .single-wishlist .yith-wcwl-add-to-wishlist a span,
              .elementor-share-btn__title,
              .widget-title,
              .jws-title-bar-wrap .jws-title-bar .jws-text-ellipsis,
              .in-stock strong,
              .jws-title-bar .jws-path .current,
              .woocommerce #respond input#submit:hover, .woocommerce .button:hover, .woocommerce input.button:hover, .woocommerce .cart-action-form .button.update-cart,
              .shop-cart .jws-quantity .jws-font,
              .custom-widget-tabs.custom-widget-tabs1.elementor-widget-tabs .elementor-tab-title a,
              .custom-widget-tabs.custom-widget-tabs2.elementor-widget-tabs .elementor-tab-title a,
              .slide-studies .slick-slide .elementor-slide-your_name,
              body .mfp-wrap .mfp-inline-holder .mfp-content .jws-product-image .slick-arrow,
              .cart-hover .product_type_external::before,
              .woocommerce form .form-row label,
              .woocommerce-checkout .woocommerce .woocommerce-form__label-for-checkbox span,
              .woocommerce-cart table.cart th,
              .layout_layout3.jws_tab_wrap .tab_nav li a,
              .elementor-widget-animated-headline .elementor-headline-dynamic-text span,
              .footer-4 span.elementor-icon-list-text:hover,
              .woocommerce-shipping-destination strong,
              input[type="radio"],
              .wc_payment_methods li>:checked+label,
              .jws-price-table.jws-price-table-layout2 .jws-price-table__footer .jws-price-table__button,
              .order-total td span,
              .elementor-widget-wp-widget-woocommerce_product_categories li,.elementor-widget-wp-widget-woocommerce_product_categories li a,
              .wishlist_table .wishlist-items-wrapper .product-name a,
              .woocommerce .woocommerce-error a, .woocommerce .woocommerce-info a, .woocommerce .woocommerce-message a,
              .woocommerce-cart .continue-shopping i,
              .woocommerce .woocommerce-MyAccount-navigation ul li,
              #shipping_method li input:checked + label,
              .contact-us .wpcf7-form label input::placeholder, .contact-us .wpcf7-form label textarea::placeholder,
              .contact-us .wpcf7-form label input, .contact-us .wpcf7-form label textarea,
              .mfp-content #jws-product-summary .yith-wcwl-add-to-wishlist a,
              .woocommerce-checkout .nxl_woo_your_order .cart-item th,
              .woocommerce ul#shipping_method li input,
              .elementor-widget-woocommerce-product-meta .elementor-widget-container .product_meta,
              .woocommerce div.product p.stock strong,
              .woocommerce-message::before,
              .widget_tag_cloud .tagcloud a,
              .widget_categories ul li a,
              .footer-5 .elementor-icon-list-items .elementor-icon-list-item .elementor-icon-list-text,
              #jws-popup-login label,
              .jws-product-shop .product-archive .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse::before,
              .woocommerce div.product form.cart .group_table td.woocommerce-grouped-product-list-item__label a,
              .widget_recent-posts-widget-with-thumbnails .tb-recent-detail .post-title-and-date,
              .single-social-bar ul li a,
              .blog-about-author .blog-author-info .icon-author a i,

              .color-main i , .blog-about-author .blog-author-info .position-author
               { color: ' . esc_attr( $main_color ) . '}';
              
		$css[] = '.footer-4 .elementor-icon-list-text::after,
				.woocommerce .woocommerce-MyAccount-navigation ul li:hover,
				.woocommerce .woocommerce-MyAccount-navigation ul li.is-active,
				.elementor-widget-Offcanvas .jws-offcanvas
				{ background: ' . esc_attr( $main_color ) . '}';
        $css[] = '.comment-info .comment-header-info .reply a,
                  .elementor-widget-woocommerce-product-related h5,
                  .woocommerce div.product.elementor ul.tabs li a,
                  .cart-collaterals h2,
                  .woocommerce-cart .cart-collaterals .cart_totals tr th,
                  .woocommerce .cart-collaterals .order-total td, .woocommerce-page .cart-collaterals .order-total td,
                  .woocommerce .cart-collaterals .order-total td span, .woocommerce-page .cart-collaterals .order-total td span,
                  .continue-shopping,
                  .woocommerce .cart-collaterals .cart-subtotal h6, .woocommerce-page .cart-collaterals .cart-subtotal h6,
                  .shipping-calculator-button,
                  .woocommerce-checkout h3,
                  .woocommerce-checkout .nxl_woo_your_order .cart_item span.product-quantity,
                  .woocommerce table.shop_table tbody th, .woocommerce table.shop_table tfoot td, .woocommerce table.shop_table tfoot th,
                  .woocommerce-checkout .nxl_woo_your_order .order_item a,
                  .woocommerce table.shop_table_responsive tr td::before, .woocommerce-page table.shop_table_responsive tr td::before,
                  .woocommerce .woocommerce-Button.button,       
                  .woocommerce .woocommerce-Button.button:hover,  
                  .woocommerce ul.order_details li,
                  .woocommerce-column__title,
                  .woocommerce-checkout .woocommerce-order-details .nxl_woo_your_order tfoot th:first-child,
                  .woocommerce-checkout .woocommerce-order-details .nxl_woo_your_order thead th,
                  .woocommerce table.wishlist_table thead th,
                  .woocommerce-cart table.cart th
                  {  color: ' . esc_attr( $main_color) . ';
                    font-family: ' . esc_attr( $font_button['font-family'] ) . ';}';
        $css[] = '
                  .elementor-widget-jws-services .elementor-service .services-title-excerpt .readmore a,
                  #jws-popup-login .submit .button,
                  .wpcf7-submit,
                  .comments-area .form-submit .submit
                  { font-family: ' . esc_attr( $font_button['font-family'] ) . ';
                    font-size: ' . esc_attr( $font_button['font-size'] ) . ';
                    font-weight: ' . esc_attr( $font_button['font-weight'] ) . '}';
		    $css[] = '.input, input, optgroup, select, textarea
        		 {  font-family: ' . esc_attr( $font_body['font-family'] ) . ';
        			  font-size: ' . esc_attr( $font_body['font-size'] ) . ';
        			  color: ' . esc_attr( $body_color) . ';
        		  	font-weight: ' . esc_attr( $font_body['font-weight'] ) . '}';
        $css[] = '.wpcf7-form label input::placeholder,
                  .shop-cart .woocommerce-Price-amount, .shop-cart .woocommerce-Price-currencySymbol,
                  .wishlist_table .woocommerce-Price-amount, .wishlist_table .woocommerce-Price-currencySymbol,
                  .woocommerce ul#shipping_method li,
                  .woocommerce-shipping-destination,
                  .jws-search-form .searchform .input-group input::placeholder
            		 {  font-family: ' . esc_attr( $font_button['font-family'] ) . ';
                    font-size: ' . esc_attr( $font_button['font-size'] ) . ';
                    color: ' . esc_attr( $body_color) . ';
            		  	font-weight: ' . esc_attr( $font_body['font-weight'] ) . '}';
        $css[] = '.elementor-widget-jws-case_study .post-category a,
                  .woocommerce .woocommerce-error, .woocommerce .woocommerce-info, .woocommerce .woocommerce-message
            		 {  font-family: ' . esc_attr( $font_button['font-family'] ) . ';
            			  font-size: ' . esc_attr( $font_button['font-size'] ) . ';
            			  color: ' . esc_attr( $body_color) . ';
            		  	}';
        $css[] = '.jws_footer h3.elementor-heading-title,
                    .woocommerce-checkout .nxl_woo_your_order .cart-item th,
                    .jws_timeline .jws_timeline_main .jws_days .jws_timeline_field .jws_timeline_date_inner .jws_timeline_month
            		 {  font-family: ' . esc_attr( $font_button['font-family'] ) . '}';
        $css[] = '.elementor-widget-jws-services .elementor-service .services-title-excerpt .post-title a,
                	.jws-testimonial.layout-testimonial3 .testimonial-listing .slide-content-testimonial .elementor-slide-your_name,
                  	.jws_tab_wrap.layout_layout1 .tab_nav li a,
                  	.jws-title-bar .jws-path,
                  	.jws-breadcrumbs .jws-breadcrumbs__item,
                  	.jws-product-shop .woocommerce-loop-product__title a,
                 	h4
                      {color: ' . esc_attr( $main_color    ) . ';  
                      font-family: ' . esc_attr( $font_button['font-family'] ) . ';
                      font-weight: ' . esc_attr( $font_h4['font-weight'] ) . '}';  
        $css[] = '.elementor-widget-jws-services .elementor-service .services-title-excerpt .post-title a,
                  .elementor-post .post-title,
                  h3
                      {color: ' . esc_attr( $main_color    ) . ';  
                      font-family: ' . esc_attr( $font_h3['font-family'] ) . ';
                      font-weight: ' . esc_attr( $font_h3['font-weight'] ) . '}';  
        $css[] = '.elementor-widget-jws-services .elementor-service .services-title-excerpt .post-decription,
                  .jws_timeline .jws_timeline_main .jws_days .jws_timeline_field .jws_timeline_content .jws_timeline_desc p,
                  .comments-area .comment-form-comment2 textarea::placeholder,
                  .comments-area .comment-form .item-comment textarea::placeholder,
                  .comments-area .comment-form .item-comment input::placeholder
                  { font-family: ' . esc_attr( $font_body['font-family'] ) . ';
                    font-size: ' . esc_attr( $font_body['font-size'] ) . ';
                    color: ' . esc_attr( $body_color) . ';
                    line-height: ' . esc_attr( $font_body['line-height']) . ';
                    font-weight: ' . esc_attr( $font_body['font-weight'] ) . '}';  

       $css[] = '.elementor-widget-heading.elementor-widget-heading h2,
					.elementor-widget-heading.elementor-widget-heading h2,
					.elementor-element.elementor-widget-counter .elementor-counter-title,
					.jws_main_menu .jws_nav_menu > ul > li > a,
					.elementor-image-carousel-caption,
					.elementor-widget-post-comments h3,
					.jws_main_menu .jws_nav li .sub-menu li a,
					.woocommerce #slide-content-testimonials #comments ol.commentlist li .meta,
					.elementor-widget-wp-widget-categories h5,.elementor-widget-wp-widget-recent-posts h5,.elementor-widget-wp-widget-tag_cloud h5,.elementor-widget-wp-widget-woocommerce_product_categories h5,.elementor-widget-wp-widget-woocommerce_price_filter h5,.elementor-widget-Jws-product-featured h5,.elementor-widget-woocommerce-product-related h5,
					.elementor-widget-wp-widget-woocommerce_price_filter .price_slider_amount .price_label,
					.elementor-widget-wp-widget-woocommerce_price_filter .price_slider_amount .button,
					.custom-pricing-tab-home3 .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title,
					.icon-box-color-white.elementor-element.elementor-widget-icon-box .elementor-icon-box-content .elementor-icon-box-title,
					.elementor-widget-woocommerce-product-data-tabs .comment-reply-title,
					.nxl-pagination .next,
					.nxl-pagination .prev,      
					.nxl-pagination .nxl_pagi_inner .item,
					.nxl-pagination .nxl_pagi_inner .item,
					.elementor-widget-countdown .elementor-countdown-digits,
					.elementor-element.elementor-widget-progress .elementor-title,
					.custom-widget-tabs.custom-widget-tabs1.elementor-widget-tabs .elementor-tab-title,
					.jws-testimonial.layout-testimonial1 .testimonial-listing .elementor-slide-description,
					.elementor-element.elementor-widget-progress .elementor-progress-bar,
					.elementor-widget-accordion .elementor-accordion .elementor-tab-title .elementor-accordion-title
				{   font-family: "' . esc_attr( $font_h2['font-family'] ) . '";
					color: ' . esc_attr( $main_color ) . ';
					font-size: ' . esc_attr( $font_h2['font-size'] ) . ';
					line-height: ' . esc_attr( $font_h2['line-height'] ) . ';
					font-weight: ' . esc_attr( $font_h2['font-weight'] ) . '}';
            $css[] = '.font-main,
                      .elementor-widget-heading.elementor-widget-heading p,
                      .elementor-slide-description,
                      .elementor-slide-tag,
                      .jws-product-shop select,
                      .post-footer .post-time span,
                      .elementor-post .post-category a,
                      .elementor-post .post-decription,
                      .elementor-widget-text-editor,
                      .jws-product-shop .woocommerce-result-count,
                      .elementor-widget-post-comments .logged-in-as,
                      .elementor-widget-woocommerce-product-short-description .woocommerce-product-details__short-description,
                      .elementor-widget-woocommerce-product-rating .woocommerce-testimonial-listing -link,
                      .elementor-widget-post-comments .comment-form-comment2 textarea,
                      .elementor-widget-post-comments .comment-form-author input, .elementor-widget-post-comments .comment-form-email input, .elementor-widget-post-comments .comment-form-website input,
                      .elementor-widget-post-comments .comment-form-alert, .elementor-widget-post-comments .comment-form-cookies-consent,
                      .elementor-widget-woocommerce-product-data-tabs .comment-form-comment textarea,
                      .elementor-widget-post-info .elementor-icon-list-item,
                      .elementor-widget-wp-widget-tag_cloud a,
                      .widget_tag_cloud a,
                      .woocommerce table th,
                      .wishlist-items-wrapper .product-name a,
                      .elementor-widget-woocommerce-product-stock .stock,
                      .elementor-widget-woocommerce-product-data-tabs .comment-form-rating label,
                      .elementor-widget-woocommerce-product-data-tabs .comment_container .description,
                      .jws-product-shop .product-archive .cart-hover .product_type_simple span,
                      .elementor-search-form__input,.elementor-search-form__input[placeholder="Search"],
                      .elementor-widget-countdown .elementor-countdown-label,
                      .jws-price-table .jws-price-table__feature-inner span,
                      .contact-us .wpcf7-form input,.contact-us .wpcf7-form textarea,
                      .custom-list-pricing.elementor-element.elementor-widget-icon-list .elementor-icon-list-item, 
                      .custom-color-count .elementor-counter-title,
                      .elementor-element.elementor-widget-accordion .elementor-accordion .elementor-tab-content,
                      .jws-price-table .jws-price-table__price .jws-price-table__period,
                      .jws-price-table.jws-price-table-layout2 .jws-price-table__subheading,                     
                      .elementor-element.elementor-widget-icon-box .elementor-icon-box-content .elementor-icon-box-description
                  {   font-family: "' . esc_attr( $font_paragraph['font-family'] ) . '";
                      color: ' . esc_attr( $body_color ) . ';
                      font-size: ' . esc_attr( $font_paragraph['font-size'] ) . ';
                      line-height: ' . esc_attr( $font_paragraph['line-height'] ) . ';
                      font-weight: ' . esc_attr( $font_paragraph['font-weight'] ) . '}';
                
         
                    
            $css[] = '	.elementor-element.elementor-widget-button a.elementor-button, .elementor-widget-button .elementor-button,
                      	.elementor-widget-counter .elementor-counter-number-wrapper,
                    	.jws-testimonial.layout-testimonial1 .testimonial-listing .slide-content-testimonial .display-flex .elementor-slide-your_name,
                      	.elementor-widget-post-comments .form-submit .submit,
                      	.jws-slide-services.slide-slide-content-testimonial .elementor-slide-your_name,
                     	.jws-button-custom .elementor-button,
						.wpcf7-form button,
						.jws-button,
						.jws_account .no_user .jws_text{   
						  	font-family: "' . esc_attr( $font_button['font-family'] ) . '";
                            color: ' . esc_attr( $font_button['color'] ) . ';
                            font-size: ' . esc_attr( $font_button['font-size'] ) . ';
                            line-height: ' . esc_attr( $font_button['line-height'] ) . ';
                            font-weight: ' . esc_attr( $font_button['font-weight'] ) . '}';
            $css[] = '
					.woocommerce .cart-collaterals, .woocommerce-page .cart-collaterals,
					input[type="radio"]:hover,
					.woocommerce .woocommerce-MyAccount-navigation ul li:hover,
					.woocommerce .woocommerce-MyAccount-navigation ul li.is-active,
					.shop-cart .jws-quantity .jws-font:hover
					{ border-color: ' . esc_attr( $main_color ) . '}';
            $css[] = '.jws-product-shop .product-archive .text-center .cart-hover .product_type_simple.loading::after,
                    .jws-product-shop .product-archive .text-center .cart-hover .product-eyes .loading::before
					{ border-left-color: ' . esc_attr( $main_color ) . '}';
            $css[] = 'p.forgetmenot.login-remember input[type="checkbox"]:checked:after, p.forgetmenot.login-remember input[type="checkbox"]:after
                      { border-color: ' . esc_attr( $body_color ) . '}';

          
            $css[] = '.slick-slider .slick-dots li button::before,
                      .hover-footer3 .elementor-icon-list-item::after,
                      .jws-search-form.expand .searchform .input-group .close-search,
                      .swiper-pagination .swiper-pagination-bullet::before
                       { background: ' . esc_attr( $main_color ) . '}';
                       
            $css[] = '.jws-price-table .jws-price-table__footer .jws-price-table__button

                       { background-image: linear-gradient(to right,#ffff 0%,#ffffff 51%,' . esc_attr( $button_start ) . ' 100%), linear-gradient(to right,' . esc_attr( $button_start ) . ' 0%,' . esc_attr( $button_end ) . ' 51%,' . esc_attr( $button_start ) . ' 100%) }';
            $css[] = '.jws-price-table.active .jws-price-table__footer .jws-price-table__button
            			{ background-image: linear-gradient(to right,' . esc_attr( $button_start ) . ' 0%,' . esc_attr( $button_end ) . ' 51%,' . esc_attr( $button_start ) . ' 100%), linear-gradient(to right,' . esc_attr( $button_start ) . ' 0%,' . esc_attr( $button_end ) . ' 51%,' . esc_attr( $button_start ) . ' 100%)}';         
           $css[] = '.jws-price-table.jws-price-table-layout1 .jws-price-table__footer .jws-price-table__button,
           			.jws-price-table .jws-price-table__feature-inner i
           				{ color: ' . esc_attr( $text_color_start ) . '}';
           $css[] = '.jws-price-table.jws-price-table-layout2 .jws-price-table__price .jws-price-table__integer-part

           { color: ' . esc_attr( $button_end ) . '}';
            $css[] = '.jws-price-table .jws-price-table__price
                      {   font-family: "' . esc_attr( $font_button['font-family'] ) . '";
                        color: ' . esc_attr( $main_color ) . ';
                        font-size: ' . esc_attr( $font_h2['font-size'] ) . ';
                        line-height: ' . esc_attr( $font_h2['line-height'] ) . ';
                        font-weight: ' . esc_attr( $font_h2['font-weight'] ) . '}';
                       
           $css[] = '.slick-dots li.slick-active button,
                      .swiper-pagination .swiper-pagination-bullet-active,
                      .elementor-widget-woocommerce-product-data-tabs .woocommerce-tabs .wc-tabs li.active a,
                      .custom-border-button.elementor-element.elementor-widget-button a.elementor-button
                       { border-color: ' . esc_attr( $main_color ) . '}';
            $css[] = '.elementor-widget-jws-services .elementor-service .services-title-excerpt .post-title a,
						.woocommerce-checkout #payment.woocommerce-checkout-payment .wc_payment_methods label,
						label.out-stock-label,
						.section-blog .elementor-post .post-category a,
						.woocommerce .woocommerce-MyAccount-navigation ul .woocommerce-MyAccount-navigation-link a,
						.jws-product-shop .product-archive span.onsale,
						.woocommerce .checkout_coupon button,
						.mfp-content #jws-product-summary .yith-wcwl-add-to-wishlist a,
						.woocommerce .woocommerce-form-login .woocommerce-form-login__submit,
						.woocommerce .checkout_coupon button:hover,
						.woocommerce .woocommerce-form-login .woocommerce-form-login__submit:hover,
						.woocommerce-checkout #payment.woocommerce-checkout-payment .wc_payment_methods .payment_box p
                     	{ font-family: ' . esc_attr( $font_button['font-family'] ) . '}';
            $css[] = '
                    .single-wishlist .yith-wcwl-add-to-wishlist a, 
                    .single-wishlist .yith-wcwl-add-to-wishlist a span,
                    .product-share .click-to-share,
                    .woocommerce a.button.alt,
                    .woocommerce .cart .button,
                    .mfp-content #jws-product-summary .yith-wcwl-add-to-wishlist a,
                    .share-single-product .elementor-widget-container .elementor-grid .elementor-grid-item .elementor-share-btn .elementor-share-btn__text

                    { font-size: ' . esc_attr( $font_button['font-size'] ) . ';
                      line-height: ' . esc_attr( $font_button['line-height'] ) . ';
                      font-weight: ' . esc_attr( $font_button['font-weight'] ) . ';
                      font-family: ' . esc_attr( $font_button['font-family'] ) . '}';
           
            $css[] = '.elementor-widget-heading.elementor-widget-heading p,
                      .testimonial-listing .elementor-slide-description,
                      .comment-info .comment-header-info .comment-date,
                      .elementor-post .post-decription,
                      .woocommerce-breadcrumb a, 
                      .elementor-widget-post-comments .logged-in-as,
                      .elementor-widget-post-comments .comment-form-comment2 textarea,
                      .elementor-widget-post-comments .comment-form-author input, .elementor-widget-post-comments .comment-form-email input, .elementor-widget-post-comments .comment-form-website input,
                      .elementor-widget-post-comments .comment-form-alert, .elementor-widget-post-comments .comment-form-cookies-consent,
                      .elementor-widget-wp-widget-tag_cloud a,
                      .jws-product-shop .product-archive .flex-space-between del,
                      .jws-product-shop .product-featured-sider .jws-product-featured-sider .price del,
                      .custom-price-single del,
                      .woocommerce div.product .stock,
                      .jws-title-bar .jws-path .delimiter,
                      .jws-title-bar .jws-path a,                                            
                      .elementor-icon-list-items .elementor-icon-list-item .elementor-icon-list-text,
                      .elementor-widget-woocommerce-product-data-tabs .comment_container .description,
                      .elementor-widget-woocommerce-product-data-tabs .comment-form-rating label,
                      .elementor-widget-woocommerce-product-data-tabs .comment-form-comment textarea,
                      .elementor-widget-woocommerce-product-short-description .woocommerce-product-details__short-description,
                      .elementor-widget-woocommerce-product-rating .woocommerce-review-link,
                      .custom-list-single-product.elementor-element.elementor-widget-icon-list .elementor-icon-list-item,
                      .option-color-main1.elementor-widget-heading.elementor-widget-heading h3,
                      .elementor-widget-post-info .elementor-icon-list-item,
                      .elementor-widget-wp-widget-woocommerce_price_filter .price_slider_amount .price_label span,
                      .custom-color-description.elementor-element.elementor-widget-icon-list .elementor-icon-list-item,
                      .product-remove i,
                      .woocommerce .woocommerce-info::before,
                      .woocommerce .cart .button i,
                      .elementor-post .post-info .post-wish-list .jws-love-count,
                      .woocommerce .woocommerce-shipping-totals .woocommerce-shipping-methods#shipping_method li span,
                      .custom-list-pricing.elementor-element.elementor-widget-icon-list .elementor-icon-list-item .elementor-icon-list-item, 
                      .elementor-post .post-info .post-comment i,.elementor-post .post-info .post-wish-list i
                       { color: ' . esc_attr( $body_color ) . '}';


            $css[] = '.footer-1 .elementor-widget-heading.elementor-widget-heading h2,
                      .footer-1 .elementor-widget-heading.elementor-widget-heading h1,
                      .footer-1 .elementor-widget-heading.elementor-widget-heading h3,
                      .footer-1 .elementor-widget-heading.elementor-widget-heading h4,
                      .footer-2 .elementor-widget-heading.elementor-widget-heading h2,
                      .footer-2 .elementor-widget-heading.elementor-widget-heading h1,
                      .footer-2 .elementor-widget-heading.elementor-widget-heading h3,
                      .footer-2 .elementor-widget-heading.elementor-widget-heading h4,
                      .custom-pricing-tab .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.elementor-active,
                      .custom-pricing-tab .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title:hover,
                      .layout-case_study2 .case_study-item .elementor-case_study .post-title a,
                      .layout-case_study2 .case_study-item .elementor-case_study .post-category a,
                      .jws_account.layout_1 .jws_ac_noajax.no_user .jws_text,
                      .layout-case_study2 .case_study-item .elementor-case_study .btn-block,
                      .comments-area .form-submit .submit,
                      .elementor-widget-Offcanvas .jws-offcanvas .jws-offcanvas-menu .megasub .elementor-heading-title,
                      .jws_header .jws-offcanvas .jws-offcanvas-menu .menu-item a
                      .elementor-widget-Offcanvas .jws-offcanvas .jws-offcanvas-menu ul span,
                      .jws-testimonial.layout-testimonial3 .testimonial-listing .slide-content-testimonial .slide-content-testimonial__box-shadow:hover::before,
                      .jws-testimonial.layout-testimonial0  .elementor-slide-your_name,
                      .jws-testimonial.layout-testimonial0 .slider-for .elementor-slide-description,
                      .jws-testimonial.layout-testimonial0 .slider-nav .elementor-slide-tag,
                      .slick-arrow:hover,
                      .color-main.slide-icon-hover:hover i,
                      .jws-product-shop .product-archive .cart-hover .product_type_simple span,
                      .hover-icon .elementor-icon:hover i,
                      .elementor-widget-post-comments .form-submit .submit,
                      .nxl-pagination .nxl_pagi_inner ul li .item.current,
                      .nxl-pagination .nxl_pagi_inner .item:hover,
                      .custom-icon-footer3.elementor-widget .elementor-icon-list-icon i:hover,
                      .jws-testimonial.layout-testimonial3 .testimonial-listing .slide-content-testimonial.slick-current .slide-content-testimonial__box-shadow .elementor-slide-your_name,
                      .jws-testimonial.layout-testimonial3 .testimonial-listing .slide-content-testimonial.slick-current .slide-content-testimonial__box-shadow .elementor-slide-description, 
                      .jws-testimonial.layout-testimonial3 .testimonial-listing .slide-content-testimonial.slick-current .slide-content-testimonial__box-shadow .elementor-slide-tag,
                      .jws-product-shop .product-archive .text-center .cart-hover .yith-wcwl-add-to-wishlist a:hover:before, 
                      .jws-product-shop .product-archive .text-center .cart-hover .product-eyes a:hover i, 
                      .jws-product-shop .product-archive .text-center .cart-hover .product_type_simple:hover::before,
                      .jws-product-shop .product-archive .text-center .cart-hover .product_type_external:hover::before,
                       .jws-product-shop .product-archive .text-center .cart-hover .product_type_grouped:hover::before,
                      .icon-box-color-white.elementor-element.elementor-widget-icon-box .elementor-icon-box-content .elementor-icon-box-description,
                      .option-color-white-list.elementor-element.elementor-widget-icon-list .elementor-icon-list-item,
                      .option-color-white-list.elementor-element.elementor-widget-icon-list .elementor-icon-list-icon i,
                      .elementor-element.option-color-white.elementor-widget-heading.elementor-widget-heading .elementor-heading-title,
                      .custom-header .custom-cart-color-white.custom-cart i,
                      .option-color-white .jws_main_menu .jws_nav_menu > ul > li > a,
                      .custom-border-button.elementor-element.elementor-widget-button a.elementor-button:hover,
                      .custom-pricing-tab .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.elementor-active,
                      .layout_layout3.jws_tab_wrap .tab_nav_wrap .tab_nav li.current a,
                      .layout_layout3.jws_tab_wrap .tab_nav li:hover a,
                      .option-color-white.elementor-widget-icon-list .elementor-icon-list-item,
                      .jws-offcanvas-close .jws-offcanvas-close-icon i,
                      .elementor_jws_menu_layout_menu_vertical .jws_nav_menu ul li .bt-sub-menu,
                      .jws_header .jws-offcanvas .jws-offcanvas-menu .menu-item a, 
                      #jws-popup-login .submit .button,
                      .woocommerce .wc-backward:hover::after,
                      .woocommerce a.button,
                      .woocommerce table.my_account_orders .button:hover,
                      .jws_header .jws-offcanvas .jws-offcanvas-menu .menu-item .sub-menu a,
                      .woocommerce .woocommerce-MyAccount-content .woocommerce-Button.button,       
                      .woocommerce .woocommerce-Button.button:hover,  
                      .woocommerce a.button:hover,
                      .woocommerce .checkout_coupon button,
                      .woocommerce .woocommerce-form-login .woocommerce-form-login__submit,
                      .woocommerce .checkout_coupon button.button:hover,
                      .woocommerce .woocommerce-form-login .woocommerce-form-login__submit.button:hover,
                      .jws-testimonial.layout-testimonial2 .testimonial-listing .slide-content-testimonial .slide-icon,
                      .woocommerce .cart .button, .woocommerce .cart input.button
                       { color: ' . esc_attr( $text_hover_color ) . '}';
                      
            $css[] = '.jws-testimonial.layout-testimonial0  .slick-arrow
                        { border-color: ' . esc_attr( $body_color ) . '}';

            $css[] = '.option-color-eee.elementor-widget-heading .elementor-heading-title,
                      .custom-widget-tabs.option-color-white.elementor-widget-tabs .elementor-tab-title,
                      .jws-testimonial.layout-testimonial0  .elementor-slide-description,
                      .newsletter-home2 .wpcf7-form label input,
                      .jws-testimonial.layout-testimonial0  .elementor-slide-tag,
                      .jws-testimonial.layout-testimonial1  .elementor-slide-tag,
                      .jws-testimonial.layout-testimonial1 .slide-content-testimonial .elementor-slide-tag,
                      .jws-breadcrumbs .jws-breadcrumbs__item a,
                      body,
                      .custom-color-count .elementor-counter-title

                       { color: ' . esc_attr( $body_color ) . '}';
                      
            $css[] = '.elementor-widget-accordion .elementor-accordion .elementor-tab-title.elementor-active a,
                      .elementor-widget-accordion .elementor-accordion .elementor-tab-title.elementor-active i,
                      .elementor-widget-accordion .elementor-accordion .elementor-tab-title:hover a,
                      #jws-popup-login .jws-login-container .jws-animation .forgot-info .lost-pass-link,
                      .single-product .elementor-shortcode .woocommerce-message .wc-forward,
                      .dialog-close-button i,
                      .elementor-widget-accordion .elementor-accordion .elementor-tab-title:hover i
                       { color: ' . esc_attr( $text_color_start ) . '}';
            $css[] = '.elementor-post .post-category a,
                        .elementor-element .elementor-widget-post-info .elementor-icon-list-icon i,
                        .single-post-info li span.icon,
                       .jws-price-table.jws-price-table-layout1 .jws-price-table__heading,
                       .jws-testimonial.layout-testimonial1 .testimonial-listing .slick-arrow:hover::after,
                      .home4-text-hover.elementor-widget-heading.elementor-widget-heading h3.elementor-heading-title:hover,
                      .color-iconlist-pricing.elementor-element.elementor-widget-icon-list .elementor-icon-list-icon i,
                      .single-post-info li span.info a:hover,
                      .product_meta .detail-content a:hover,
                      .single-post-info li span.info:hover,
                      .jws-title-bar .jws-path-inner a:hover,
                      .jws-breadcrumbs .jws-breadcrumbs__item a:hover,
                      .elementor-widget-wp-widget-woocommerce_product_categories .elementor-widget-container ul li a:hover,
                      .widget_categories ul li a:hover,                      
                      .option-color-green.elementor-widget-heading h2.elementor-heading-title
                       { color: ' . esc_attr( $text_color_start ) . '}';

            $css[] = '.jws-button-custom .elementor-button.gradient,
                      .wpcf7 .wpcf7-form button,
                      .icon-gradient-main i,
                      .elementor-widget-video .elementor-custom-embed-play:after,
                      
                      .bg-text-popular1 .elementor-widget-container,
                      .hover-bg-contact .elementor-column-wrap::before,
                      .slide-icon-hover::before,
                      .slick-arrow:hover,
                      .elementor-widget-post-comments .form-submit .submit,
                      .hover-icon .elementor-icon::before,
                      .jws_nav_menu span#magic_line,
                      .jws_main_menu .jws_nav_menu .jws_nav li .sub-menu li a:hover,
                      .jws_main_menu .jws_nav_menu .jws_nav li .sub-menu li a::before,
                      .jws_main_menu .jws_nav_menu .jws_nav li .sub-menu li.current-menu-item > a,
                      .jws_main_menu .jws_nav_menu .jws_nav li .sub-menu li.current-menu-ancestor > a,
                      .jws_main_menu .jws_nav_menu .jws_nav li .sub-menu-dropdown .megasub li.current-menu-item a,
                      .jws_main_menu .jws_nav_menu .jws_nav li .sub-menu-dropdown .megasub li a:hover,
                      .jws_main_menu .jws_nav_menu .jws_nav li .sub-menu-dropdown .megasub li a::before,
                      .jws_main_menu .jws_nav_menu .jws_nav li a::before,
                      .elementor_jws_menu_layout_menu_horizontal .custom-mega-menu-list li a:hover,
                      .elementor_jws_menu_layout_menu_horizontal .custom-mega-menu-list li a:hover::before,
                      .custom-divider .elementor-widget-container,
                      .custom-bg-bt-revolution,
                      .custom-bg-bt-revolution:hover::after,
                      .icon-gradient-bacground-hover .elementor-social-icon:hover,
                      .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce button.button.alt:hover::after, .woocommerce input.button.alt,
                      .elementor-widget-wp-widget-woocommerce_price_filter .price_slider_wrapper .price_slider .ui-slider-range,
                      .elementor-widget-wp-widget-woocommerce_price_filter .price_slider_wrapper .price_slider .ui-slider-handle,
                      .jws-product-shop .product-archive .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover::after, .jws-product-shop .product-archive .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse:hover::after, .jws-product-shop .product-archive .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse:hover::after, .jws-product-shop .product-archive .product_type_simple:hover, .jws-product-shop .product-archive .product-eyes a:hover::after,
                      .nxl-pagination .nxl_pagi_inner ul li .item.current,
                      .nxl-pagination .nxl_pagi_inner .item:hover,    
                      .bg-text-popular .elementor-widget-container,
                      .jws-testimonial.layout-testimonial2 .testimonial-listing .slide-content-testimonial .slide-icon,
                      .custom-border-button.elementor-element.elementor-widget-button a.elementor-button:hover, 
                      .custom-border-button .elementor-widget-button .elementor-button:hover
                      .custom-pricing-tab .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.elementor-active,      
                      .jws-team .bg-team::before,
                      .jws_tab_wrap.layout_layout1 .tab_nav li.current a,
                      .comments-area .form-submit .submit,
                      .comments-area .form-submit .submit:hover::after,
                      .jws-price-table .jws-price-table__footer .jws-price-table__button:before,
                      .jws-price-table .jws-price-table__footer .jws-price-table__button::after,
                      .comments-area ol li .comment-body .comment-info .comment-header-info .reply:hover,
                      .custom-pricing-tab-home3.custom-pricing-tab .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.elementor-active,
                      .custom-pricing-tab-home3.custom-pricing-tab .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title:hover,
                      .custom-border-button1.custom-border-button.elementor-element.elementor-widget-button a.elementor-button:hover,
                       .custom-border-button1.custom-border-button .elementor-widget-button .elementor-button:hover,
                      .elementor-element.elementor-widget-progress .elementor-progress-wrapper .elementor-progress-bar,
                       .jws_account.layout_1 .no_user .jws_text, 
                       .jws_account.layout_1 .no_user .jws_text:hover::after, 
                       .jws-product-shop .product-archive .text-center .cart-hover .product_type_grouped:hover,
                       .jws-product-shop .product-archive .text-center .cart-hover .product_type_external:hover,
                       .jws-price-table .jws-price-table__ribbon .jws-price-table__ribbon-inner,
                      .widget_search .search-form button, .widget_seach_by .search-form button, .widget_product_search button,
                       .woocommerce .cart input.button,
                      .jws-testimonial.layout-testimonial3 .testimonial-listing .slide-content-testimonial .slide-content-testimonial__box-shadow::before,
                      .jws_tab_wrap.layout_layout4 .tab_nav_wrap .tab_nav li.current::before,
                      .woocommerce #review_form #respond .form-submit #submit,
                      #jws-popup-login .submit .button,
                      .elementor-menu-cart__footer-buttons .elementor-button--view-cart,
                       .woocommerce .cart input.button:hover,
                       .jws_account .account-menu-dropdown a:hover,
                       .woocommerce .woocommerce-MyAccount-content .woocommerce-Button.button,
                       .jws_account .account-menu-dropdown a::before,
                       .woocommerce a.button:hover:after,
                       .section-blog .elementor-post .post-category a,
                       .woocommerce a.button,
                       .woocommerce a.button:hover,
                       .jws-icon-box .elementor-icon-box-icon.background-gradient .elementor-icon,
                       .wpcf7-form button:hover::after,
                       .amination-button-home3 .text-color-gradient:hover .elementor-button-icon i,
                       .hover-active .amination-button-home3 .text-color-gradient .elementor-button-icon i,
                       .page-mail .page-mail-content a,                       
                       .woocommerce .woocommerce-form-login .woocommerce-form-login__submit,
                       .woocommerce .checkout_coupon button,
                        .woocommerce .checkout_coupon button.button:hover,
             			.woocommerce .woocommerce-form-login .woocommerce-form-login__submit.button:hover,
                      .jws_video_popup .jws_video_popup_inner a .gradient_background_color
                       {background-size: 200%; 
                        background-image: linear-gradient(to right,' . esc_attr( $button_start ) . ' 0%,' . esc_attr( $button_end ) . ' 51%,' . esc_attr( $button_start ) . ' 100%) }';

            $css[] = '
                      .color-iconlist-home3 i,
                      .hover-slide-bt2:hover,
                      .icon-footer-home2.elementor-widget .elementor-icon-list-item a:hover i,
                      .custom-bt-home2.elementor-element.elementor-widget-button a.elementor-button:hover, .custom-bt-home2 .elementor-widget-button .elementor-button:hover,
                
                      .custom-bt-home2 .elementor-widget-container,
                      .custom-bt-home2 .elementor-widget-container .elementor-button-text,
                      .readmore a,
                      .readmore a i,
                               
                      .text-color-gradient .elementor-button-icon i,
                      .jws_video_popup .jws_video_popup_inner a .gradient_color i
                        {    background-size: 200%;
                          
                          background-image: linear-gradient(to right,' . esc_attr( $text_color_start ) . ' 0%,' . esc_attr( $text_color_end ) . ' 51%,' . esc_attr( $text_color_start ) . ' 100%) }';
                              
               $css[] = '.button-style
					{   color: #ffffff;
						background-size: 200%;
						padding: 3px 20px !IMPORTANT;
						margin-right: 15px !important;
						border-radius: 100px !important;
						background-image: linear-gradient(to right,' . esc_attr( $text_color_start ) . ' 0%,' . esc_attr( $text_color_end ) . ' 51%,' . esc_attr( $text_color_start ) . ' 100%) }';  
            $css[] = '   .layout-service2 .elementor-service .services-title-excerpt .btn-service .more_link_text,
                        .layout-service1 .active .services-title-excerpt .readmore a,
                        .custom-icon-play.text-color-gradient,
                        .custom-icon-play.text-color-gradient i,
                        .text-color-gradient .elementor-button-icon i,
                        .text-color-gradient .elementor-button-text
                        { background-image: linear-gradient(to right,' . esc_attr( $text_color_start ) . ' 0%,' . esc_attr( $text_color_end ) . ' 51%,' . esc_attr( $text_color_start ) . ' 100%);  
                             }';
            $css[] = '.layout-case_study2 .case_study-item .elementor-case_study:before
                        {    background-size: 200%;
                            background-image: linear-gradient(to bottom,' . esc_attr( $button_end ) . ' 10%,' . esc_attr( $button_start ) . ' 60%) }';
                            
             $css[] = '.jws-icon-box .elementor-icon-box-icon .elementor-icon
                        {   fill: '.esc_attr( $button_start ).';
                            color: '.esc_attr( $button_start ).';
                            background-image: linear-gradient(to bottom,#ffffff 0%,#ffffff 100%,' . esc_attr( $button_end ) . ' 100%), linear-gradient(to bottom,' . esc_attr( $button_end ) . ' 0%,' . esc_attr( $button_start ) . ' 100%) }';
              
            $css[] = '.jws-price-table:hover.jws-price-table-layout2 .jws-price-table__footer .jws-price-table__button
                      { 
                        border-image: linear-gradient(to right,' . esc_attr( $button_start ) . ' 0%,' . esc_attr( $button_end ) . ' 51%,' . esc_attr( $button_start ) . ' 100%) }';
            $css[] = '.jws_timeline .jws_timeline_main .jws_days .jws_timeline_field .jws_timeline_content .jws_timeline_content_inner::before,
                      .single-social-bar ul li a:hover
                        {
                          background-image: linear-gradient(to bottom,' . esc_attr( $button_end ) . ' 0%,' . esc_attr( $button_start ) . ' 100%) }';
            $css[] = '.layout_layout2 .tab_nav_wrap .tab_nav li.current::before
                      {background-image: linear-gradient(to right,' . esc_attr( $button_end ) . ' 0%,' . esc_attr( $button_start ) . ' 100%) }';                                
            $css[] = '.elementor-widget-jws-services .layout-service4 .elementor-service:after
                    { 
                        background-image: linear-gradient(31deg,' . esc_attr( $button_start ) . ' 29%,' . esc_attr( $button_end ) . ' 100%) }';
            $css[] = '.elementor-widget-wp-widget-woocommerce_price_filter .price_slider_wrapper .price_slider .ui-slider-handle,
						.simple-hover-button.elementor-element.elementor-widget-button a.elementor-button, .simple-hover-button.elementor-widget-button .elementor-button
						{   
							background: ' . esc_attr( $button_start ) . '}';
                
            $css[] = '.elementor-widget-wp-widget-woocommerce_price_filter .price_slider_wrapper .price_slider .ui-slider-handle:last-child
                	{   background: ' . esc_attr( $button_end ) . '}';
            $css[] = '.jws_main_menu .jws_nav_menu .jws_nav li .sub-menu .menu-item-has-children:hover:before
                	{   color: ' . esc_attr( $button_end ) . '}';
            $css[] = '.jws-team.layout2 .jws-team-inner-item .bg-team .team-icon-list i:hover,
                        .layout_layout3.jws_tab_wrap .tab_nav_wrap .tab_nav li.current a,
                      .jws_tab_wrap.layout_layout3 .tab_nav_wrap .tab_nav li:hover a,
                      .elementor-menu-cart__footer-buttons .elementor-button--checkout,
                      .elementor-menu-cart__footer-buttons .elementor-button--checkout:hover::after,
                      .jws-button-custom .elementor-button.classic,                      
                      .simple-hover-button-revo:hover::after
                    {   
                        background: ' . esc_attr( $main_color ) . '}';
            $css[] = '.jws-team.layout2 .jws-team-inner-item .bg-team .team-icon-list i:hover:before,
					.jws-breadcrumbs .jws-breadcrumbs__separator i,
                    .gradient-icon.elementor-widget .elementor-icon-list-icon i:hover,
					.blog-about-author .blog-author-info .icon-author a:hover i:before,
					.jws-title-bar .jws-path i
					{   
					   
						background-image: linear-gradient(to right,' . esc_attr( $button_start ) . ' 0%,' . esc_attr( $button_end ) . ' 51%,' . esc_attr( $button_start ) . ' 100%);
						-webkit-background-clip: text;
							background-size: 200%;
						-webkit-text-fill-color: transparent;'. '}';
                                            
		return preg_replace( '/\n|\t/i', '', implode( '', $css ) );
	}
}