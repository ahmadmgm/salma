<?php
namespace ElementorHelloWorld\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Test extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Jws-product';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Jws-product', 'ailab' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'ailab' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_product',
			[
				'label' => __( 'Product', 'ailab' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_responsive_control(
			'columns',
			[
				'label' => __( 'Columns', 'ailab' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'tablet_default' => '2',
				'mobile_default' => '1',
				'options' => [
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				],
				'prefix_class' => 'ee-grid-columns%s-',
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label' => __( 'Posts Per Page', 'ailab' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 3,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_query',
			[
				'label' => __( 'Query', 'ailab' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'orderby',
			[
				'label' => __( 'Orderby', 'ailab' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'menu_order',
				'options' => [
					'post_date' => 'Date',
					'menu_order' => 'Menu Order',
					'post_title' => 'Title',
					'rand' => 'Random',
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => __( 'Order', 'ailab' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'ASC' => 'ASC',
					'DESC' => 'DESC',
				],
			]
		);
		
		$this->end_controls_section();

		// Product 
		$this->start_controls_section(
			'section_product-style',
			[
				'label' => __( 'Product', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'ailab' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'ailab' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ailab' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'ailab' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'ailab' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .type-product' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_transform_pproduct',
			[
				'label' => __( 'Text Transform', 'ailab' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'None', 'ailab' ),
					'uppercase' => __( 'UPPERCASE', 'ailab' ),
					'lowercase' => __( 'lowercase', 'ailab' ),
					'capitalize' => __( 'Capitalize', 'ailab' ),
				],
				'selectors' => [
					'{{WRAPPER}} .type-product' => 'text-transform: {{VALUE}};',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_product_style' );
		$this->start_controls_tab(
			'tab_product_normal',
			[
				'label' => __( 'Normal', 'ailab' ),
			]
		);

		$this->add_control(
			'text_color_product',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .type-product' => 'color: {{VALUE}};',
				],
			]
		);

		
		$this->add_control(
			'background_color_product',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bg-fff' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_product_hover',
			[
				'label' => __( 'Hover', 'ailab' ),
			]
		);

		$this->add_control(
			'hover_product_color',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .type-product .bg-fff:hover img' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'product_background_hover_color',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .type-product .bg-fff:hover img' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'opacity-product',
			[
				'label' => __( 'Opacity (%)', 'ailab' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bg-fff:hover img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_control(
			'text_margin_product',
			[
				'label' => __( 'Text Margin', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .type-product' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);


		$this->add_control(
			'text_padding_product',
			[
				'label' => __( 'Text Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-product' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border_product',
				'label' => __( 'Border', 'ailab' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .type-product',
				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();

		// category //

		$this->start_controls_section(
			'section_category',
			[
				'label' => __( 'Category', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-category',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .jws_cat_list',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow_category',
				'selector' => '{{WRAPPER}} .jws_cat_list',
			]
		);


		$this->add_control(
			'text_color-category',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .jws_cat_list a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_margin_category',
			[
				'label' => __( 'Text Margin', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .jws_cat_list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_category',
			[
				'label' => __( 'Text Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .jws_cat_list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// name

		$this->start_controls_section(
			'section_name',
			[
				'label' => __( 'Name', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-name',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .woocommerce-loop-product__title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow_name',
				'selector' => '{{WRAPPER}} .woocommerce-loop-product__title',
			]
		);


		$this->add_control(
			'text_color-name',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .woocommerce-loop-product__title' => 'color: {{VALUE}};',
				],
			]
		);

		
		$this->add_control(
			'background_color-name',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .woocommerce-loop-product__title' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_margin_name',
			[
				'label' => __( 'Text Margin', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-loop-product__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_name',
			[
				'label' => __( 'Text Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-loop-product__title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// title

		$this->start_controls_section(
			'section_price_style',
			[
				'label' => __( 'Price', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-price',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .price',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow-price',
				'selector' => '{{WRAPPER}} .price',
			]
		);

		$this->add_control(
			'text_color-price',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .price' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_margin_price',
			[
				'label' => __( 'Text Margin', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_price',
			[
				'label' => __( 'Text Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// Cart

		$this->start_controls_section(
			'section_cart_style',
			[
				'label' => __( 'Cart', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-cart',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .add_to_cart_button',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow-cart',
				'selector' => '{{WRAPPER}} .add_to_cart_button',
			]
		);

		$this->add_control(
			'text_color-cart',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .add_to_cart_button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color-cart',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .add_to_cart_button' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_margin_cart',
			[
				'label' => __( 'Text Margin', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .add_to_cart_button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_cart',
			[
				'label' => __( 'Text Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .add_to_cart_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();
		
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		// // WP_Query arguments
		// $args = array (
		// 	'post_type'              => array( 'product' ),
		// 	'post_status'            => array( 'publish' ),
		// 	'posts_per_page'		 => $settings['posts_per_page'],
		// 	'order'                  => $settings['order'],
		// 	'orderby'                => $settings['orderby'],
		// );

		// // The Query
		// $services = new \WP_Query( $args );
		// // The Loop
		
		// if ( $services->have_posts() ) {
		// 	while ( $services->have_posts() ) {
		// 		$services->the_post();
		// 		include('html/product.php');
		// 	}
		// } else {
		// 	// no posts found
		// }
		// // Restore original Post Data
		// wp_reset_postdata();
		?>
		<div class="box">
	<ul class="minbox">
		<li><img src="https://scontent.fsgn2-4.fna.fbcdn.net/v/t1.15752-9/81283094_1035411600151716_4368236637751083008_n.jpg?_nc_cat=101&_nc_eui2=AeHt1MZkbmS0fgLuwwYHh5Bwy_bQr46SmalHaqmGRvpemvDBERYzcgjynNFrgTE4R1zmxntg2Q8n7mpJKQNvQjPyP3S_7N5W1fJaO0IhSadJdw&_nc_ohc=pzpOFCaFIFIAQm6e4q3hjHnYHIH9_9w3RuI0z_5AKwkCay-YNNxasWYPw&_nc_ht=scontent.fsgn2-4.fna&oh=a482ec9b8a84436992fae45f330e0db0&oe=5EB470C6"></li>
		<li><img src="https://scontent.fsgn2-3.fna.fbcdn.net/v/t1.15752-9/81016850_2621973734551816_3124304028817686528_n.jpg?_nc_cat=110&_nc_eui2=AeHqimIsnuVpradpi17lG3R6uXpnl_iy4mlpO0iW6Ll9xDyvUSQze5-U8L_WZijZMN-trXwGG_OOZTUG1jDSopZ-LxpQ57XU-eD0E6Ytt3dS2g&_nc_ohc=po4hVEG7Fx0AQkppNtegmrCmZlQWOq6szqqEVM55E7oZyMUcEMf3_Gmew&_nc_ht=scontent.fsgn2-3.fna&oh=2abe07acb65a5ca711f61e0bfa7afa85&oe=5EACA321"></li>
		<li><img src="https://scontent.fsgn2-4.fna.fbcdn.net/v/t1.15752-9/80959607_577150923127426_7339247335244824576_n.jpg?_nc_cat=111&_nc_eui2=AeGhc28iIUoLaX9OQaItfhRSFWI09nBXh_SZN7hNNbEFFQ54IVxmyQp1HNOSD0z4WEw8g6S-7N4pCEARuF0-bTW-Ifvli4yBGVcTpsV8VJnuhA&_nc_ohc=63WFBZaLIFgAQnqINcmHv3onjULc0TUddX_JVfAZYmUs9B3qbuSlQp-tg&_nc_ht=scontent.fsgn2-4.fna&oh=09ce2d656a60a82b3ffd3d1577565f77&oe=5E67BDD2"></li>
		<li><img src="https://scontent.fsgn2-4.fna.fbcdn.net/v/t1.15752-9/81709582_998389867197984_4057368365155483648_n.jpg?_nc_cat=109&_nc_eui2=AeEWEI8KUo9HVYaAMYGG4KLijwTklfogvGmCkALbsfWGuhISCd7CSTjN3OGG9WpLcrWMiMwME5kfgSc_LD6w67uKcN6Io0ZVOmm6A3kBlKBfdA&_nc_ohc=SU6ggO9_gS8AQmqKBgt42uCis73zdmBHSPfNszxx0LPnPMkAeYNnMx0EA&_nc_ht=scontent.fsgn2-4.fna&oh=7470b7ed8877e21043343c17e5060de4&oe=5E966866"></li>
		<li><img src="https://scontent.fsgn2-4.fna.fbcdn.net/v/t1.15752-9/81809557_454330991928731_3713982856507162624_n.jpg?_nc_cat=111&_nc_eui2=AeGANP41IoBnHL1hrdjjoAwrasuNng5N05DI6b-H6Cg7qP4hkq7EshBnfuIGSCXcNfHQLNgFwhKHi3kMC7pi6I6fpnMlgkgebyC7_ao9aJ_NJA&_nc_ohc=pHp96T_vrjAAQm8HIoD3X24v8NlIuPgixI2P47Lj4EQABOCfqj3a9BgOQ&_nc_ht=scontent.fsgn2-4.fna&oh=216ef86841177a0c6923cf7e949bf816&oe=5EB1905B"></li>
		<li><img src="https://scontent.fsgn2-3.fna.fbcdn.net/v/t1.15752-9/81341069_1798113593655688_7511293636244406272_n.jpg?_nc_cat=108&_nc_eui2=AeE7wmeoHVE50G_7QH2-1EEYAQjF1-F3ND3JaJ8Ty0RLwkKtWekISVlvYXH9U7lDERH-cdezW5uh5LzINFCKY_cjXKMcqhfQD5o4Bfb0IbjCXA&_nc_ohc=Vu4790upd5sAQm2rFo-t-xHj-pvOOt_-FLZVcMSwxtL2H-FozkHQ22TAQ&_nc_ht=scontent.fsgn2-3.fna&oh=2e168d9807ace8c56c04ab7c2ab310bc&oe=5EA9DCFE"></li>
	</ul>
	<ol class="maxbox">
		<li><img src="https://scontent.fsgn2-4.fna.fbcdn.net/v/t1.15752-9/81283094_1035411600151716_4368236637751083008_n.jpg?_nc_cat=101&_nc_eui2=AeHt1MZkbmS0fgLuwwYHh5Bwy_bQr46SmalHaqmGRvpemvDBERYzcgjynNFrgTE4R1zmxntg2Q8n7mpJKQNvQjPyP3S_7N5W1fJaO0IhSadJdw&_nc_ohc=pzpOFCaFIFIAQm6e4q3hjHnYHIH9_9w3RuI0z_5AKwkCay-YNNxasWYPw&_nc_ht=scontent.fsgn2-4.fna&oh=a482ec9b8a84436992fae45f330e0db0&oe=5EB470C6"></li>
		<li><img src="https://scontent.fsgn2-3.fna.fbcdn.net/v/t1.15752-9/81016850_2621973734551816_3124304028817686528_n.jpg?_nc_cat=110&_nc_eui2=AeHqimIsnuVpradpi17lG3R6uXpnl_iy4mlpO0iW6Ll9xDyvUSQze5-U8L_WZijZMN-trXwGG_OOZTUG1jDSopZ-LxpQ57XU-eD0E6Ytt3dS2g&_nc_ohc=po4hVEG7Fx0AQkppNtegmrCmZlQWOq6szqqEVM55E7oZyMUcEMf3_Gmew&_nc_ht=scontent.fsgn2-3.fna&oh=2abe07acb65a5ca711f61e0bfa7afa85&oe=5EACA321"></li>
		<li><img src="https://scontent.fsgn2-4.fna.fbcdn.net/v/t1.15752-9/80959607_577150923127426_7339247335244824576_n.jpg?_nc_cat=111&_nc_eui2=AeGhc28iIUoLaX9OQaItfhRSFWI09nBXh_SZN7hNNbEFFQ54IVxmyQp1HNOSD0z4WEw8g6S-7N4pCEARuF0-bTW-Ifvli4yBGVcTpsV8VJnuhA&_nc_ohc=63WFBZaLIFgAQnqINcmHv3onjULc0TUddX_JVfAZYmUs9B3qbuSlQp-tg&_nc_ht=scontent.fsgn2-4.fna&oh=09ce2d656a60a82b3ffd3d1577565f77&oe=5E67BDD2"></li>
		<li><img src="https://scontent.fsgn2-4.fna.fbcdn.net/v/t1.15752-9/81709582_998389867197984_4057368365155483648_n.jpg?_nc_cat=109&_nc_eui2=AeEWEI8KUo9HVYaAMYGG4KLijwTklfogvGmCkALbsfWGuhISCd7CSTjN3OGG9WpLcrWMiMwME5kfgSc_LD6w67uKcN6Io0ZVOmm6A3kBlKBfdA&_nc_ohc=SU6ggO9_gS8AQmqKBgt42uCis73zdmBHSPfNszxx0LPnPMkAeYNnMx0EA&_nc_ht=scontent.fsgn2-4.fna&oh=7470b7ed8877e21043343c17e5060de4&oe=5E966866"></li>
		<li><img src="https://scontent.fsgn2-4.fna.fbcdn.net/v/t1.15752-9/81809557_454330991928731_3713982856507162624_n.jpg?_nc_cat=111&_nc_eui2=AeGANP41IoBnHL1hrdjjoAwrasuNng5N05DI6b-H6Cg7qP4hkq7EshBnfuIGSCXcNfHQLNgFwhKHi3kMC7pi6I6fpnMlgkgebyC7_ao9aJ_NJA&_nc_ohc=pHp96T_vrjAAQm8HIoD3X24v8NlIuPgixI2P47Lj4EQABOCfqj3a9BgOQ&_nc_ht=scontent.fsgn2-4.fna&oh=216ef86841177a0c6923cf7e949bf816&oe=5EB1905B"></li>
		<li><img src="https://scontent.fsgn2-3.fna.fbcdn.net/v/t1.15752-9/81341069_1798113593655688_7511293636244406272_n.jpg?_nc_cat=108&_nc_eui2=AeE7wmeoHVE50G_7QH2-1EEYAQjF1-F3ND3JaJ8Ty0RLwkKtWekISVlvYXH9U7lDERH-cdezW5uh5LzINFCKY_cjXKMcqhfQD5o4Bfb0IbjCXA&_nc_ohc=Vu4790upd5sAQm2rFo-t-xHj-pvOOt_-FLZVcMSwxtL2H-FozkHQ22TAQ&_nc_ht=scontent.fsgn2-3.fna&oh=2e168d9807ace8c56c04ab7c2ab310bc&oe=5EA9DCFE"></li>
	</ol>
</div>
		<?php
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
		
	}
}
