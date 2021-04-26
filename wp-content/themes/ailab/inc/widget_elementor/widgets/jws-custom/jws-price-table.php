<?php
namespace ElementorHelloWorld\Widgets\JwsCustom;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Repeater;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use ElementorPro\Base\Base_Widget;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class JWS_Price_Table extends Base_Widget {

	public function get_name() {
		return 'jws-price-table';
	}

	public function get_title() {
		return __( 'JWS Price Table', 'ailab' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_keywords() {
		return [ 'pricing', 'table', 'product', 'image', 'plan', 'button' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_layout',
			[
				'label' => __( 'Layout', 'ailab' ),
			]
		);
		$this->add_control(
			'layout',
			[
				'label' => __( 'Layout', 'ailab' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'layout1' => 'Layout 1',
					'layout2' => 'Layout 2',
				],
				'default' => 'layout1',
			]
		);
    
 	      $this->add_control(
			'active_item',
			[
				'label' => __( 'Active Item', 'ailab' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'separator' => 'before',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_header',
			[
				'label' => __( 'Header', 'ailab' ),
			]
		);
        
		$this->add_control(
			'heading',
			[
				'label' => __( 'Title', 'ailab' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Enter your title', 'ailab' ),
			]
		);

		$this->add_control(
			'sub_heading',
			[
				'label' => __( 'Description', 'ailab' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Enter your description', 'ailab' ),
			]
		);

		$this->add_control(
			'heading_tag',
			[
				'label' => __( 'Heading Tag', 'ailab' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
				],
				'default' => 'h3',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_pricing',
			[
				'label' => __( 'Pricing', 'ailab' ),
			]
		);

		$this->add_control(
			'currency_symbol',
			[
				'label' => __( 'Currency Symbol', 'ailab' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => __( 'None', 'ailab' ),
					'dollar' => '&#36; ' . _x( 'Dollar', 'Currency Symbol', 'ailab' ),
					'euro' => '&#128; ' . _x( 'Euro', 'Currency Symbol', 'ailab' ),
					'baht' => '&#3647; ' . _x( 'Baht', 'Currency Symbol', 'ailab' ),
					'franc' => '&#8355; ' . _x( 'Franc', 'Currency Symbol', 'ailab' ),
					'guilder' => '&fnof; ' . _x( 'Guilder', 'Currency Symbol', 'ailab' ),
					'krona' => 'kr ' . _x( 'Krona', 'Currency Symbol', 'ailab' ),
					'lira' => '&#8356; ' . _x( 'Lira', 'Currency Symbol', 'ailab' ),
					'peseta' => '&#8359 ' . _x( 'Peseta', 'Currency Symbol', 'ailab' ),
					'peso' => '&#8369; ' . _x( 'Peso', 'Currency Symbol', 'ailab' ),
					'pound' => '&#163; ' . _x( 'Pound Sterling', 'Currency Symbol', 'ailab' ),
					'real' => 'R$ ' . _x( 'Real', 'Currency Symbol', 'ailab' ),
					'ruble' => '&#8381; ' . _x( 'Ruble', 'Currency Symbol', 'ailab' ),
					'rupee' => '&#8360; ' . _x( 'Rupee', 'Currency Symbol', 'ailab' ),
					'indian_rupee' => '&#8377; ' . _x( 'Rupee (Indian)', 'Currency Symbol', 'ailab' ),
					'shekel' => '&#8362; ' . _x( 'Shekel', 'Currency Symbol', 'ailab' ),
					'yen' => '&#165; ' . _x( 'Yen/Yuan', 'Currency Symbol', 'ailab' ),
					'won' => '&#8361; ' . _x( 'Won', 'Currency Symbol', 'ailab' ),
					'custom' => __( 'Custom', 'ailab' ),
				],
				'default' => 'dollar',
			]
		);

		$this->add_control(
			'currency_symbol_custom',
			[
				'label' => __( 'Custom Symbol', 'ailab' ),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'currency_symbol' => 'custom',
				],
			]
		);

		$this->add_control(
			'price',
			[
				'label' => __( 'Price', 'ailab' ),
				'type' => Controls_Manager::TEXT,
				'default' => '39.99',
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'currency_format',
			[
				'label' => __( 'Currency Format', 'ailab' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => '1,234.56 (Default)',
					',' => '1.234,56',
				],
			]
		);

		$this->add_control(
			'sale',
			[
				'label' => __( 'Sale', 'ailab' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'ailab' ),
				'label_off' => __( 'Off', 'ailab' ),
				'default' => '',
			]
		);

		$this->add_control(
			'original_price',
			[
				'label' => __( 'Original Price', 'ailab' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '59',
				'condition' => [
					'sale' => 'yes',
				],
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'period',
			[
				'label' => __( 'Period', 'ailab' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Monthly', 'ailab' ),
			]
		);

		$this->end_controls_section();
        //image
        		$this->start_controls_section(
			'section_image',
			[
				'label' => __( 'Image', 'ailab' ),
			]
		);

        $this->add_control(
			'image1',
			[
				'label' => __( 'Choose Image 1', 'ailab' ),
				'type' => Controls_Manager::MEDIA,
			]
		);
        $this->add_control(
			'image2',
			[
				'label' => __( 'Choose Image 2', 'ailab' ),
				'type' => Controls_Manager::MEDIA,
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_features',
			[
				'label' => __( 'Features', 'ailab' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_text',
			[
				'label' => __( 'Text', 'ailab' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'List Item', 'ailab' ),
			]
		);

		$default_icon = [
			'value' => 'far fa-check-circle',
			'library' => 'fa-regular',
		];

		$repeater->add_control(
			'selected_item_icon',
			[
				'label' => __( 'Icon', 'ailab' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'item_icon',
				'default' => $default_icon,
			]
		);

		$repeater->add_control(
			'item_icon_color',
			[
				'label' => __( 'Icon Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} i' => 'color: {{VALUE}}',
					'{{WRAPPER}} {{CURRENT_ITEM}} svg' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'features_list',
			[
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'item_text' => __( 'List Item #1', 'ailab' ),
						'selected_item_icon' => $default_icon,
					],
					[
						'item_text' => __( 'List Item #2', 'ailab' ),
						'selected_item_icon' => $default_icon,
					],
					[
						'item_text' => __( 'List Item #3', 'ailab' ),
						'selected_item_icon' => $default_icon,
					],
				],
				'title_field' => '{{{ item_text }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_footer',
			[
				'label' => __( 'Footer', 'ailab' ),
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'ailab' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Click Here', 'ailab' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'ailab' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'ailab' ),
				'default' => [
					'url' => '#',
				],
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'footer_additional_info',
			[
				'label' => __( 'Additional Info', 'ailab' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'This is text element', 'ailab' ),
				'rows' => 3,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_ribbon',
			[
				'label' => __( 'Ribbon', 'ailab' ),
			]
		);

		$this->add_control(
			'show_ribbon',
			[
				'label' => __( 'Show', 'ailab' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'ribbon_title',
			[
				'label' => __( 'Title', 'ailab' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Popular', 'ailab' ),
				'condition' => [
					'show_ribbon' => 'yes',
				],
			]
		);

		$this->add_control(
			'ribbon_horizontal_position',
			[
				'label' => __( 'Position', 'ailab' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'ailab' ),
						'icon' => 'eicon-h-align-left',
					],
					'right' => [
						'title' => __( 'Right', 'ailab' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'condition' => [
					'show_ribbon' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_header_style',
			[
				'label' => __( 'Header', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'header_bg',
				'label' => __( 'Background', 'ailab' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .jws-price-table__header',
			]
		);
		$this->add_responsive_control(
			'header_padding',
			[
				'label' => __( 'Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_heading_style',
			[
				'label' => __( 'Title', 'ailab' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label' => __( 'Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__heading' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .jws-price-table__heading',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'heading_sub_heading_style',
			[
				'label' => __( 'Sub Title', 'ailab' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'sub_heading_color',
			[
				'label' => __( 'Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__subheading' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sub_heading_typography',
				'selector' => '{{WRAPPER}} .jws-price-table__subheading',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_pricing_element_style',
			[
				'label' => __( 'Pricing', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			]
		);

		$this->add_control(
			'pricing_element_bg_color',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__price' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'pricing_element_padding',
			[
				'label' => __( 'Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'price_color',
			[
				'label' => __( 'Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__currency, {{WRAPPER}} .jws-price-table__integer-part, {{WRAPPER}} .jws-price-table__fractional-part' => 'color: {{VALUE}}',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'selector' => '{{WRAPPER}} .jws-price-table__price',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'heading_currency_style',
			[
				'label' => __( 'Currency Symbol', 'ailab' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'currency_symbol!' => '',
				],
			]
		);

		$this->add_control(
			'currency_size',
			[
				'label' => __( 'Size', 'ailab' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__currency' => 'font-size: calc({{SIZE}}em/100)',
				],
				'condition' => [
					'currency_symbol!' => '',
				],
			]
		);

		$this->add_control(
			'currency_position',
			[
				'label' => __( 'Position', 'ailab' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'default' => 'before',
				'options' => [
					'before' => [
						'title' => __( 'Before', 'ailab' ),
						'icon' => 'eicon-h-align-left',
					],
					'after' => [
						'title' => __( 'After', 'ailab' ),
						'icon' => 'eicon-h-align-right',
					],
				],
			]
		);

		$this->add_control(
			'currency_vertical_position',
			[
				'label' => __( 'Vertical Position', 'ailab' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'top' => [
						'title' => __( 'Top', 'ailab' ),
						'icon' => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => __( 'Middle', 'ailab' ),
						'icon' => 'eicon-v-align-middle',
					],
					'bottom' => [
						'title' => __( 'Bottom', 'ailab' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'top',
				'selectors_dictionary' => [
					'top' => 'flex-start',
					'middle' => 'center',
					'bottom' => 'flex-end',
				],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__currency' => 'align-self: {{VALUE}}',
				],
				'condition' => [
					'currency_symbol!' => '',
				],
			]
		);

		$this->add_control(
			'fractional_part_style',
			[
				'label' => __( 'Fractional Part', 'ailab' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'fractional-part_size',
			[
				'label' => __( 'Size', 'ailab' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__fractional-part' => 'font-size: calc({{SIZE}}em/100)',
				],
			]
		);

		$this->add_control(
			'fractional_part_vertical_position',
			[
				'label' => __( 'Vertical Position', 'ailab' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'top' => [
						'title' => __( 'Top', 'ailab' ),
						'icon' => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => __( 'Middle', 'ailab' ),
						'icon' => 'eicon-v-align-middle',
					],
					'bottom' => [
						'title' => __( 'Bottom', 'ailab' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'top',
				'selectors_dictionary' => [
					'top' => 'flex-start',
					'middle' => 'center',
					'bottom' => 'flex-end',
				],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__after-price' => 'justify-content: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'heading_original_price_style',
			[
				'label' => __( 'Original Price', 'ailab' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'sale' => 'yes',
					'original_price!' => '',
				],
			]
		);

		$this->add_control(
			'original_price_color',
			[
				'label' => __( 'Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__original-price' => 'color: {{VALUE}}',
				],
				'condition' => [
					'sale' => 'yes',
					'original_price!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'original_price_typography',
				'selector' => '{{WRAPPER}} .jws-price-table__original-price',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'condition' => [
					'sale' => 'yes',
					'original_price!' => '',
				],
			]
		);

		$this->add_control(
			'original_price_vertical_position',
			[
				'label' => __( 'Vertical Position', 'ailab' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'top' => [
						'title' => __( 'Top', 'ailab' ),
						'icon' => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => __( 'Middle', 'ailab' ),
						'icon' => 'eicon-v-align-middle',
					],
					'bottom' => [
						'title' => __( 'Bottom', 'ailab' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'selectors_dictionary' => [
					'top' => 'flex-start',
					'middle' => 'center',
					'bottom' => 'flex-end',
				],
				'default' => 'bottom',
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__original-price' => 'align-self: {{VALUE}}',
				],
				'condition' => [
					'sale' => 'yes',
					'original_price!' => '',
				],
			]
		);

		$this->add_control(
			'heading_period_style',
			[
				'label' => __( 'Period', 'ailab' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'period!' => '',
				],
			]
		);

		$this->add_control(
			'period_color',
			[
				'label' => __( 'Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__period' => 'color: {{VALUE}}',
				],
				'condition' => [
					'period!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'period_typography',
				'selector' => '{{WRAPPER}} .jws-price-table__period',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'condition' => [
					'period!' => '',
				],
			]
		);

		$this->add_control(
			'period_position',
			[
				'label' => __( 'Position', 'ailab' ),
				'type' => Controls_Manager::SELECT,
				'label_block' => false,
				'options' => [
					'below' => __( 'Below', 'ailab' ),
					'beside' => __( 'Beside', 'ailab' ),
				],
				'default' => 'below',
				'condition' => [
					'period!' => '',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_features_list_style',
			[
				'label' => __( 'Features', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			]
		);

		$this->add_control(
			'features_list_bg_color',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__features-list' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'features_list_padding',
			[
				'label' => __( 'Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__features-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'features_list_color',
			[
				'label' => __( 'Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__features-list' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'features_list_typography',
				'selector' => '{{WRAPPER}} .jws-price-table__features-list li',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'features_list_alignment',
			[
				'label' => __( 'Alignment', 'ailab' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'ailab' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ailab' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'ailab' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__features-list' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'item_width',
			[
				'label' => __( 'Width', 'ailab' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'%' => [
						'min' => 25,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__feature-inner' => 'margin-left: calc((100% - {{SIZE}}%)/2); margin-right: calc((100% - {{SIZE}}%)/2)',
				],
			]
		);

		$this->add_control(
			'list_divider',
			[
				'label' => __( 'Divider', 'ailab' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'divider_style',
			[
				'label' => __( 'Style', 'ailab' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'solid' => __( 'Solid', 'ailab' ),
					'double' => __( 'Double', 'ailab' ),
					'dotted' => __( 'Dotted', 'ailab' ),
					'dashed' => __( 'Dashed', 'ailab' ),
				],
				'default' => 'solid',
				'condition' => [
					'list_divider' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__features-list li:before' => 'border-top-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'divider_color',
			[
				'label' => __( 'Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ddd',
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'condition' => [
					'list_divider' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__features-list li:before' => 'border-top-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'divider_weight',
			[
				'label' => __( 'Weight', 'ailab' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 2,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 10,
					],
				],
				'condition' => [
					'list_divider' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__features-list li:before' => 'border-top-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'divider_width',
			[
				'label' => __( 'Width', 'ailab' ),
				'type' => Controls_Manager::SLIDER,
				'condition' => [
					'list_divider' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__features-list li:before' => 'margin-left: calc((100% - {{SIZE}}%)/2); margin-right: calc((100% - {{SIZE}}%)/2)',
				],
			]
		);

		$this->add_control(
			'divider_gap',
			[
				'label' => __( 'Gap', 'ailab' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 15,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'condition' => [
					'list_divider' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__features-list li:before' => 'margin-top: {{SIZE}}{{UNIT}}; margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_footer_style',
			[
				'label' => __( 'Footer', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			]
		);

		$this->add_control(
			'footer_bg_color',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__footer' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'footer_padding',
			[
				'label' => __( 'Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__footer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_footer_button',
			[
				'label' => __( 'Button', 'ailab' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_control(
			'button_size',
			[
				'label' => __( 'Size', 'ailab' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'md',
				'options' => [
					'xs' => __( 'Extra Small', 'ailab' ),
					'sm' => __( 'Small', 'ailab' ),
					'md' => __( 'Medium', 'ailab' ),
					'lg' => __( 'Large', 'ailab' ),
					'xl' => __( 'Extra Large', 'ailab' ),
				],
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'ailab' ),
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__button' => 'color: {{VALUE}};',
				],
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .jws-price-table__button',
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__button' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(), [
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .jws-price-table__button',
				'condition' => [
					'button_text!' => '',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_control(
			'button_text_padding',
			[
				'label' => __( 'Text Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'ailab' ),
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__button:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__button:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => __( 'Border Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__button:hover' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->add_control(
			'button_hover_animation',
			[
				'label' => __( 'Animation', 'ailab' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
				'condition' => [
					'button_text!' => '',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'heading_additional_info',
			[
				'label' => __( 'Additional Info', 'ailab' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'footer_additional_info!' => '',
				],
			]
		);

		$this->add_control(
			'additional_info_color',
			[
				'label' => __( 'Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__additional_info' => 'color: {{VALUE}}',
				],
				'condition' => [
					'footer_additional_info!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'additional_info_typography',
				'selector' => '{{WRAPPER}} .jws-price-table__additional_info',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'condition' => [
					'footer_additional_info!' => '',
				],
			]
		);

		$this->add_control(
			'additional_info_margin',
			[
				'label' => __( 'Margin', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'top' => 15,
					'right' => 30,
					'bottom' => 0,
					'left' => 30,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__additional_info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'condition' => [
					'footer_additional_info!' => '',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_ribbon_style',
			[
				'label' => __( 'Ribbon', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'show_label' => false,
				'condition' => [
					'show_ribbon' => 'yes',
				],
			]
		);

		$this->add_control(
			'ribbon_bg_color',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__ribbon-inner' => 'background-color: {{VALUE}}',
				],
			]
		);

		$ribbon_distance_transform = is_rtl() ? 'translateY(-50%) translateX({{SIZE}}{{UNIT}}) rotate(-45deg)' : 'translateY(-50%) translateX(-50%) translateX({{SIZE}}{{UNIT}}) rotate(-45deg)';

		$this->add_responsive_control(
			'ribbon_distance',
			[
				'label' => __( 'Distance', 'ailab' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__ribbon-inner' => 'margin-top: {{SIZE}}{{UNIT}}; transform: ' . $ribbon_distance_transform,
				],
			]
		);

		$this->add_control(
			'ribbon_text_color',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .jws-price-table__ribbon-inner' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'ribbon_typography',
				'selector' => '{{WRAPPER}} .jws-price-table__ribbon-inner',
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .jws-price-table__ribbon-inner',
			]
		);

		$this->end_controls_section();
	}

	private function render_currency_symbol( $symbol, $location ) {
		$currency_position = $this->get_settings( 'currency_position' );
		$location_setting = ! empty( $currency_position ) ? $currency_position : 'before';
		if ( ! empty( $symbol ) && $location === $location_setting ) {
			echo '<span class="jws-price-table__currency jws-currency--' . $location . '">' . $symbol . '</span>';
		}
	}

	private function get_currency_symbol( $symbol_name ) {
		$symbols = [
			'dollar' => '&#36;',
			'euro' => '&#128;',
			'franc' => '&#8355;',
			'pound' => '&#163;',
			'ruble' => '&#8381;',
			'shekel' => '&#8362;',
			'baht' => '&#3647;',
			'yen' => '&#165;',
			'won' => '&#8361;',
			'guilder' => '&fnof;',
			'peso' => '&#8369;',
			'peseta' => '&#8359',
			'lira' => '&#8356;',
			'rupee' => '&#8360;',
			'indian_rupee' => '&#8377;',
			'real' => 'R$',
			'krona' => 'kr',
		];

		return isset( $symbols[ $symbol_name ] ) ? $symbols[ $symbol_name ] : '';
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$symbol = '';

		if ( ! empty( $settings['currency_symbol'] ) ) {
			if ( 'custom' !== $settings['currency_symbol'] ) {
				$symbol = $this->get_currency_symbol( $settings['currency_symbol'] );
			} else {
				$symbol = $settings['currency_symbol_custom'];
			}
		}
		$currency_format = empty( $settings['currency_format'] ) ? '.' : $settings['currency_format'];
		$price = explode( $currency_format, $settings['price'] );
		$intpart = $price[0];
		$fraction = '';
		if ( 2 === count( $price ) ) {
			$fraction = $price[1];
		}

		$this->add_render_attribute( 'button_text', 'class', [
			'jws-price-table__button',
			'jws-button',
			'jws-size-' . $settings['button_size'],
		] );

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'button_text', 'href', $settings['link']['url'] );

			if ( ! empty( $settings['link']['is_external'] ) ) {
				$this->add_render_attribute( 'button_text', 'target', '_blank' );
			}

			if ( $settings['link']['nofollow'] ) {
				$this->add_render_attribute( 'button_text', 'rel', 'nofollow' );
			}
		}

		if ( ! empty( $settings['button_hover_animation'] ) ) {
			$this->add_render_attribute( 'button_text', 'class', 'jws-animation-' . $settings['button_hover_animation'] );
		}
        $this->add_render_attribute( 'ribbon_title', 'class', 'jws-price-table__ribbon-inner' );
		$this->add_render_attribute( 'heading', 'class', 'jws-price-table__heading' );
		$this->add_render_attribute( 'sub_heading', 'class', 'jws-price-table__subheading' );
		$this->add_render_attribute( 'period', 'class', [ 'jws-price-table__period', 'jws-typo-excluded' ] );
		$this->add_render_attribute( 'footer_additional_info', 'class', 'jws-price-table__additional_info' );
		
        $this->add_inline_editing_attributes( 'ribbon_title' );
		$this->add_inline_editing_attributes( 'heading', 'none' );
		$this->add_inline_editing_attributes( 'sub_heading', 'none' );
		$this->add_inline_editing_attributes( 'period', 'none' );
		$this->add_inline_editing_attributes( 'footer_additional_info' );
		$this->add_inline_editing_attributes( 'button_text' );
		

		$period_position = $settings['period_position'];
		$period_element = '<span ' . $this->get_render_attribute_string( 'period' ) . '>/ ' . $settings['period'] . '</span>';
		$heading_tag = $settings['heading_tag'];

		$migration_allowed = Icons_Manager::is_migration_allowed();
		?>

		<div class="jws-price-table jws-price-table-<?php echo esc_attr($settings['layout']) ?> <?php if($settings['active_item']=='yes' ) echo 'active';?>" >
      <div class ="jws-price-table-inner">
            <?php
		if ( 'yes' === $settings['show_ribbon'] && ! empty( $settings['ribbon_title'] ) ) :
			$this->add_render_attribute( 'ribbon-wrapper', 'class', 'jws-price-table__ribbon' );

			if ( ! empty( $settings['ribbon_horizontal_position'] ) ) :
				$this->add_render_attribute( 'ribbon-wrapper', 'class', 'jws-ribbon-' . $settings['ribbon_horizontal_position'] );
			endif;

			?>
			<div <?php echo ''.$this->get_render_attribute_string( 'ribbon-wrapper' ); ?>>
				<div <?php echo ''.$this->get_render_attribute_string( 'ribbon_title' ); ?>><?php echo esc_html($settings['ribbon_title']); ?></div>
			</div>
			<?php
		endif;?>
			<?php if ( $settings['heading'] || $settings['sub_heading'] ) : ?>
				<div class="jws-price-table__header">
                    <?php if ( $settings['layout']=='layout1' ) : ?>
                        <div class="jws-price-spacing"></div>
                     <?php endif;?>
					<?php if ( ! empty( $settings['heading'] ) ) : ?>
						<<?php echo ''.$heading_tag . ' ' . $this->get_render_attribute_string( 'heading' ); ?>><?php echo esc_html($settings['heading']); ?></<?php echo ''.$heading_tag;?> >
					<?php endif; ?>

					<?php if ( ! empty( $settings['sub_heading'] ) ) : ?>
						<span <?php echo ''.$this->get_render_attribute_string( 'sub_heading' ); ?>><?php echo esc_html($settings['sub_heading']); ?></span>
					<?php endif; ?>
				</div>
			<?php endif; ?>
  	         
            <div class="jws-price-table__price_image">
                <div class="jws-price-table__price">
                
				<?php if ( 'yes' === $settings['sale'] && ! empty( $settings['original_price'] ) ) : ?>
					<div class="jws-price-table__original-price jws-typo-excluded"><?php echo esc_html($symbol . $settings['original_price']); ?></div>
				<?php endif; ?>
				<?php $this->render_currency_symbol( $symbol, 'before' ); ?>
				<?php if ( ! empty( $intpart ) || 0 <= $intpart ) : ?>
					<span class="jws-price-table__integer-part"><?php echo ''.$intpart; ?></span>
				<?php endif; ?>

				<?php if ( '' !== $fraction || ( ! empty( $settings['period'] ) && 'beside' === $period_position ) ) : ?>
					<div class="jws-price-table__after-price">
						<span class="jws-price-table__fractional-part">/<?php echo ''.$fraction; ?></span>

						<?php if ( ! empty( $settings['period'] ) && 'beside' === $period_position ) : ?>
							<?php echo ''.$period_element; ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php $this->render_currency_symbol( $symbol, 'after' ); ?>

				<?php if ( ! empty( $settings['period'] ) && 'below' === $period_position ) : ?>
					<?php echo ''.$period_element; ?>
				<?php endif; ?>
			 </div>
                <div class="jws-price-table__image">
                    
                    <?php if($settings['image1']&&!empty($settings['image1']['url'])):?>
                        <span class="jws-price-first-image">
                            <img src="<?php echo esc_url($settings['image1']['url']) ?>" alt="#">
                        </span>
                    <?php endif; ?>
                    <?php if($settings['image2']&&!empty($settings['image2']['url'])):?>
                        <span class="jws-price-second-image">
                            <img src="<?php echo esc_url($settings['image2']['url']) ?>" alt="#">
                        </span>
                    <?php endif; ?>
                    
                </div>
            </div>
			
                    <?php if ( $settings['layout']=='layout1' ) : ?>
                        <div class="jws-price-spacing1"></div>
                     <?php endif;?>
			<?php if ( ! empty( $settings['features_list'] ) ) : ?>
				<ul class="jws-price-table__features-list">
					<?php
					foreach ( $settings['features_list'] as $index => $item ) :
						$repeater_setting_key = $this->get_repeater_setting_key( 'item_text', 'features_list', $index );
						$this->add_inline_editing_attributes( $repeater_setting_key );

						$migrated = isset( $item['__fa4_migrated']['selected_item_icon'] );
						// add old default
						if ( ! isset( $item['item_icon'] ) && ! $migration_allowed ) {
							$item['item_icon'] = 'fa fa-check-circle';
						}
						$is_new = ! isset( $item['item_icon'] ) && $migration_allowed;
						?>
						<li class="elementor-repeater-item-<?php echo esc_attr($item['_id']); ?>">
							<div class="jws-price-table__feature-inner">
								<?php if ( ! empty( $item['item_icon'] ) || ! empty( $item['selected_item_icon'] ) ) :
									if ( $is_new || $migrated ) :
										Icons_Manager::render_icon( $item['selected_item_icon'], [ 'aria-hidden' => 'true' ] );
									else : ?>
										<i class="<?php echo esc_attr( $item['item_icon'] ); ?>" aria-hidden="true"></i>
										<?php
									endif;
								endif; ?>
								<?php if ( ! empty( $item['item_text'] ) ) : ?>
									<span <?php echo ''.$this->get_render_attribute_string( $repeater_setting_key ); ?>>
										<?php echo esc_html($item['item_text']); ?>
									</span>
									<?php
								else :
									echo '&nbsp;';
								endif;
								?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
             <?php if ( $settings['layout']=='layout1' ) : ?>
                        <div class="jws-price-spacing2"></div>
             <?php endif;?>
			<?php if ( ! empty( $settings['button_text'] ) || ! empty( $settings['footer_additional_info'] ) ) : ?>
				<div class="jws-price-table__footer">
					<?php if ( ! empty( $settings['button_text'] ) ) : ?>
						<a <?php echo ''.$this->get_render_attribute_string( 'button_text' ); ?>><?php echo esc_html($settings['button_text']); ?></a>
					<?php endif; ?>

					<?php if ( ! empty( $settings['footer_additional_info'] ) ) : ?>
						<div <?php echo ''.$this->get_render_attribute_string( 'footer_additional_info' ); ?>><?php echo esc_html($settings['footer_additional_info']); ?></div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
            
		</div>
</div>
		<?php

	}

	protected function _content_template() {
		?>
		<#
			var symbols = {
				dollar: '&#36;',
				euro: '&#128;',
				franc: '&#8355;',
				pound: '&#163;',
				ruble: '&#8381;',
				shekel: '&#8362;',
				baht: '&#3647;',
				yen: '&#165;',
				won: '&#8361;',
				guilder: '&fnof;',
				peso: '&#8369;',
				peseta: '&#8359;',
				lira: '&#8356;',
				rupee: '&#8360;',
				indian_rupee: '&#8377;',
				real: 'R$',
				krona: 'kr'
			};

			var symbol = '',
				iconsHTML = {};

			if ( settings.currency_symbol ) {
				if ( 'custom' !== settings.currency_symbol ) {
					symbol = symbols[ settings.currency_symbol ] || '';
				} else {
					symbol = settings.currency_symbol_custom;
				}
			}

			var buttonClasses = 'jws-price-table__button jws-button jws-size-' + settings.button_size;

			if ( settings.button_hover_animation ) {
				buttonClasses += ' jws-animation-' + settings.button_hover_animation;
			}
  	     view.addRenderAttribute( 'ribbon_title', 'class', 'jws-price-table__ribbon-inner'  );
		view.addRenderAttribute( 'heading', 'class', 'jws-price-table__heading' );
		view.addRenderAttribute( 'sub_heading', 'class', 'jws-price-table__subheading' );
		view.addRenderAttribute( 'period', 'class', ['jws-price-table__period', 'jws-typo-excluded'] );
		view.addRenderAttribute( 'footer_additional_info', 'class', 'jws-price-table__additional_info'  );
		view.addRenderAttribute( 'button_text', 'class', buttonClasses  );
	

		view.addInlineEditingAttributes( 'heading', 'none' );
		view.addInlineEditingAttributes( 'sub_heading', 'none' );
		view.addInlineEditingAttributes( 'period', 'none' );
		view.addInlineEditingAttributes( 'footer_additional_info' );
		view.addInlineEditingAttributes( 'button_text' );
		view.addInlineEditingAttributes( 'ribbon_title' );

		var currencyFormat = settings.currency_format || '.',
			price = settings.price.split( currencyFormat ),
			intpart = price[0],
			fraction = price[1],

			periodElement = '<span ' + view.getRenderAttributeString( "period" ) + '>' + settings.period + '</span>';

		#>

		<div class="jws-price-table">
            <# if ( 'yes' === settings.show_ribbon && settings.ribbon_title ) {
			var ribbonClasses = 'jws-price-table__ribbon';
			if ( settings.ribbon_horizontal_position ) {
				ribbonClasses += ' jws-ribbon-' + settings.ribbon_horizontal_position;
			} #>
			<div class="{{ ribbonClasses }}">
				<div {{{ view.getRenderAttributeString( 'ribbon_title' ) }}}>{{{ settings.ribbon_title }}}</div>
			</div>
		      <# } #>
			<# if ( settings.heading || settings.sub_heading ) { #>
				<div class="jws-price-table__header">
					<# if ( settings.heading ) { #>
						<{{ settings.heading_tag }} {{{ view.getRenderAttributeString( 'heading' ) }}}>{{{ settings.heading }}}</{{ settings.heading_tag }}>
					<# } #>
					<# if ( settings.sub_heading ) { #>
						<span {{{ view.getRenderAttributeString( 'sub_heading' ) }}}>{{{ settings.sub_heading }}}</span>
					<# } #>
				</div>
			<# } #>

			<div class="jws-price-table__price">
				<# if ( settings.sale && settings.original_price ) { #>
					<div class="jws-price-table__original-price jws-typo-excluded">{{{ symbol + settings.original_price }}}</div>
				<# } #>

				<# if ( ! _.isEmpty( symbol ) && ( 'before' == settings.currency_position || _.isEmpty( settings.currency_position ) ) ) { #>
					<span class="jws-price-table__currency jws-currency--before">{{{ symbol }}}</span>
				<# } #>
				<# if ( intpart ) { #>
					<span class="jws-price-table__integer-part">{{{ intpart }}}</span>
				<# } #>
				<div class="jws-price-table__after-price">
					<# if ( fraction ) { #>
						<span class="jws-price-table__fractional-part">/{{{ fraction }}}</span>
					<# } #>
					<# if ( settings.period && 'beside' === settings.period_position ) { #>
						{{{ periodElement }}}
					<# } #>
				</div>

				<# if ( ! _.isEmpty( symbol ) && 'after' == settings.currency_position ) { #>
				<span class="jws-price-table__currency jws-currency--after">{{{ symbol }}}</span>
				<# } #>

				<# if ( settings.period && 'below' === settings.period_position ) { #>
					{{{ periodElement }}}
				<# } #>
			</div>

			<# if ( settings.features_list ) { #>
				<ul class="jws-price-table__features-list">
				<# _.each( settings.features_list, function( item, index ) {

					var featureKey = view.getRepeaterSettingKey( 'item_text', 'features_list', index ),
						migrated = elementor.helpers.isIconMigrated( item, 'selected_item_icon' );

					view.addInlineEditingAttributes( featureKey ); #>

						<li class="elementor-repeater-item-{{ item._id }}">
							<div class="jws-price-table__feature-inner">
								<# if ( item.item_icon  || item.selected_item_icon ) {
									iconsHTML[ index ] = elementor.helpers.renderIcon( view, item.selected_item_icon, { 'aria-hidden': 'true' }, 'i', 'object' );
									if ( ( ! item.item_icon || migrated ) && iconsHTML[ index ] && iconsHTML[ index ].rendered ) { #>
										{{{ iconsHTML[ index ].value }}}
									<# } else { #>
										<i class="{{ item.item_icon }}" aria-hidden="true"></i>
									<# }
								} #>
								<# if ( ! _.isEmpty( item.item_text.trim() ) ) { #>
									<span {{{ view.getRenderAttributeString( featureKey ) }}}>{{{ item.item_text }}}</span>
								<# } else { #>
									&nbsp;
								<# } #>
							</div>
						</li>
					<# } ); #>
				</ul>
			<# } #>

			<# if ( settings.button_text || settings.footer_additional_info ) { #>
				<div class="jws-price-table__footer">
					<# if ( settings.button_text ) { #>
						<a href="#" {{{ view.getRenderAttributeString( 'button_text' ) }}}>{{{ settings.button_text }}}</a>
					<# } #>
					<# if ( settings.footer_additional_info ) { #>
						<p {{{ view.getRenderAttributeString( 'footer_additional_info' ) }}}>{{{ settings.footer_additional_info }}}</p>
					<# } #>
				</div>
			<# } #>
		</div>

		
		<?php
	}
}
