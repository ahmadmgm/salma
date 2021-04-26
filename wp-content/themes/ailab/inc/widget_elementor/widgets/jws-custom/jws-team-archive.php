<?php

namespace ElementorHelloWorld\Widgets\JwsCustom;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class JwsTeamsArchive extends Widget_Base {
	public function get_name() {
		return 'Jws-team-archive';
	}

	public function get_title() {
		return __( 'Jws-team-archive', 'ailab' );
	}

	public function get_icon() {
		return 'eicon-slideshow';
	}

	public function get_categories() {
		return [ 'pro-elements' ];
	}

	public function get_script_depends() {
		return [ 'imagesloaded', 'jquery-slick' ];
	}

	public static function get_button_sizes() {
		return [
			'xs' => __( 'Extra Small', 'ailab' ),
			'sm' => __( 'Small', 'ailab' ),
			'md' => __( 'Medium', 'ailab' ),
			'md' => __( 'Large', 'ailab' ),
			'xl' => __( 'Extra Large', 'ailab' ),
		];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_slides',
			[
				'label' => __( 'Slides', 'ailab' ),
			]
		);

		$repeater = new Repeater();

		$this->add_control(
			'layout',
			[
				'label' => __( 'Layout', 'ailab' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'layout-review-1',
				'options' => [
					'layout-review-1' => __( 'Layout 1', 'ailab' ),

					'layout-review-2' => __( 'Layout 2', 'ailab' ),
				],
			]

		);

		$this->add_responsive_control(
			'columns',
			[
				'label' => __( 'Columns', 'ailab' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '4',
				'tablet_default' => '6',
				'mobile_default' => '12',
				'options' => [
					'1' => '12',
					'2' => '6',
					'3' => '4',
					'4' => '3',
					'6' => '2',
					'12' => '1',
				],
			]
		);

		$repeater->start_controls_tabs( 'slides_repeater' );

		$repeater->start_controls_tab( 'background', [ 'label' => __( 'Image', 'ailab' ) ] );

		

		$repeater->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'ailab' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'image', // Actually its `image_size`.
				'label' => __( 'Image Size', 'ailab' ),
				'default' => 'large',
			]
		);

		$repeater->end_controls_tab();

		$repeater->start_controls_tab( 'content', [ 'label' => __( 'Content', 'ailab' ) ] );
        
        $repeater->add_control(
			'your_name',
			[
				'label' => __( 'Name', 'ailab' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '', 'ailab' ),
				'label_block' => true,
			]
        );

        $repeater->add_control(
			'tag',
			[
				'label' => __( 'Tag', 'ailab' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '', 'ailab' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'your_phone',
			[
				'label' => __( 'Phone', 'ailab' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '', 'ailab' ),
				'label_block' => true,
			]
        );

        $repeater->add_control(
			'your_email',
			[
				'label' => __( 'Email', 'ailab' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '', 'ailab' ),
				'label_block' => true,
			]
        );

		$repeater->end_controls_tab();

		$repeater->start_controls_tab( 'icon-link', [ 'label' => __( 'Icon', 'ailab' ) ] );
		$repeater->add_control(
			'icon1',
			[
				'label' => __( 'Icon1', 'ailab' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
			]
		);
		$repeater->add_control(
			'link1',
			[
				'label' => __( 'Link1', 'ailab' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'icon2',
			[
				'label' => __( 'Icon2', 'ailab' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
			]
		);
		$repeater->add_control(
			'link2',
			[
				'label' => __( 'Link2', 'ailab' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'icon3',
			[
				'label' => __( 'Icon3', 'ailab' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
			]
		);
		$repeater->add_control(
			'link3',
			[
				'label' => __( 'Link3', 'ailab' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'icon4',
			[
				'label' => __( 'Icon4', 'ailab' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
			]
		);
		$repeater->add_control(
			'link4',
			[
				'label' => __( 'Link4', 'ailab' ),
				'type' => Controls_Manager::TEXT,
			]
		);

        $repeater->end_controls_tab();
        
		$repeater->end_controls_tabs();

		$this->add_control(
			'slides',
			[
				'label' => __( 'Slides', 'ailab' ),
				'type' => Controls_Manager::REPEATER,
				'show_label' => true,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'heading' => __( '', 'ailab' ),
						'description' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'ailab' ),
						'button_text' => __( 'Click Here', 'ailab' ),
						'background_color' => '#833ca3',
					],
					[
						'heading' => __( '', 'ailab' ),
						'description' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'ailab' ),
						'button_text' => __( 'Click Here', 'ailab' ),
						'background_color' => '#4054b2',
					],
					[
						'heading' => __( '', 'ailab' ),
						'description' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'ailab' ),
						'button_text' => __( 'Click Here', 'ailab' ),
						'background_color' => '#1abc9c',
					],
				],
				'title_field' => '{{{ heading }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_slider_options',
			[
				'label' => __( 'Slider Options', 'ailab' ),
				'type' => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
			'navigation',
			[
				'label' => __( 'Navigation', 'ailab' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'both',
				'options' => [
					'both' => __( 'Arrows and Dots', 'ailab' ),
					'arrows' => __( 'Arrows', 'ailab' ),
					'dots' => __( 'Dots', 'ailab' ),
					'none' => __( 'None', 'ailab' ),
				],
			]
		);

		$this->add_control(
			'pause_on_hover',
			[
				'label' => __( 'Pause on Hover', 'ailab' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay', 'ailab' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay_speed',
			[
				'label' => __( 'Autoplay Speed', 'ailab' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
				'condition' => [
					'autoplay' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .slick-slide-bg' => 'animation-duration: calc({{VALUE}}ms*1.2); transition-duration: calc({{VALUE}}ms)',
				],
			]
		);

		$this->add_control(
			'infinite',
			[
				'label' => __( 'Infinite Loop', 'ailab' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'transition',
			[
				'label' => __( 'Transition', 'ailab' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'slide',
				'options' => [
					'slide' => __( 'Slide', 'ailab' ),
					'fade' => __( 'Fade', 'ailab' ),
				],
			]
		);

		$this->add_control(
			'transition_speed',
			[
				'label' => __( 'Transition Speed', 'ailab' ) . ' (ms)',
				'type' => Controls_Manager::NUMBER,
				'default' => 500,
			]
		);

		$this->add_control(
			'content_animation',
			[
				'label' => __( 'Content Animation', 'ailab' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'fadeInUp',
				'options' => [
					'' => __( 'None', 'ailab' ),
					'fadeInDown' => __( 'Down', 'ailab' ),
					'fadeInUp' => __( 'Up', 'ailab' ),
					'fadeInRight' => __( 'Right', 'ailab' ),
					'fadeInLeft' => __( 'Left', 'ailab' ),
					'zoomIn' => __( 'Zoom', 'ailab' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_slides',
			[
				'label' => __( 'Slides', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(

			'content_max_width',

			[

				'label' => __( 'Content Width', 'ailab' ),

				'type' => Controls_Manager::SLIDER,

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 1000,

					],

					'%' => [

						'min' => 0,

						'max' => 100,

					],

				],

				'size_units' => [ '%', 'px' ],

				'default' => [

					'size' => '66',

					'unit' => '%',

				],

				'tablet_default' => [

					'unit' => '%',

				],

				'mobile_default' => [

					'unit' => '%',

				],

				'selectors' => [

					'{{WRAPPER}} .elementor-slide-content' => 'max-width: {{SIZE}}{{UNIT}};',

				],

			]

		);



		$this->add_responsive_control(

			'slides_padding',

			[

				'label' => __( 'Padding', 'ailab' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .slick-slide-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

			]

		);



		$this->add_control(

			'slides_horizontal_position',

			[

				'label' => __( 'Horizontal Position', 'ailab' ),

				'type' => Controls_Manager::CHOOSE,

				'label_block' => false,

				'default' => 'center',

				'options' => [

					'left' => [

						'title' => __( 'Left', 'ailab' ),

						'icon' => 'eicon-h-align-left',

					],

					'center' => [

						'title' => __( 'Center', 'ailab' ),

						'icon' => 'eicon-h-align-center',

					],

					'right' => [

						'title' => __( 'Right', 'ailab' ),

						'icon' => 'eicon-h-align-right',

					],

				],

				'prefix_class' => 'elementor--h-position-',

			]

		);



		$this->add_control(

			'slides_vertical_position',

			[

				'label' => __( 'Vertical Position', 'ailab' ),

				'type' => Controls_Manager::CHOOSE,

				'label_block' => false,

				'default' => 'middle',

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

				'prefix_class' => 'elementor--v-position-',

			]

		);



		$this->add_control(

			'slides_text_align',

			[

				'label' => __( 'Text Align', 'ailab' ),

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

				'default' => 'center',

				'selectors' => [

					'{{WRAPPER}} .slick-slide-inner' => 'text-align: {{VALUE}}',

				],

			]

		);



		$this->end_controls_section();



		$this->start_controls_section(

			'section_style_title',

			[

				'label' => __( 'Title', 'ailab' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);



		$this->add_control(

			'heading_spacing',

			[

				'label' => __( 'Spacing', 'ailab' ),

				'type' => Controls_Manager::SLIDER,

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 100,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .slick-slide-inner .elementor-slide-heading:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}}',

				],

			]

		);



		$this->add_control(

			'heading_color',

			[

				'label' => __( 'Text Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'selectors' => [

					'{{WRAPPER}} .elementor-slide-heading' => 'color: {{VALUE}}',



				],

			]

		);



		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'heading_typography',

				'scheme' => Scheme_Typography::TYPOGRAPHY_1,

				'selector' => '{{WRAPPER}} .elementor-slide-heading',

			]

		);



		$this->end_controls_section();



		$this->start_controls_section(

			'section_style_description',

			[

				'label' => __( 'Description', 'ailab' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);



		$this->add_control(

			'description_spacing',

			[

				'label' => __( 'Spacing', 'ailab' ),

				'type' => Controls_Manager::SLIDER,

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 100,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .slick-slide-inner .elementor-slide-description:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}}',

				],

			]

		);



		$this->add_control(

			'description_color',

			[

				'label' => __( 'Text Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'selectors' => [

					'{{WRAPPER}} .elementor-slide-description' => 'color: {{VALUE}}',



				],

			]

		);



		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'description_typography',

				'scheme' => Scheme_Typography::TYPOGRAPHY_2,

				'selector' => '{{WRAPPER}} .elementor-slide-description',

			]

		);



		$this->end_controls_section();



		$this->start_controls_section(

			'section_style_your_name',

			[

				'label' => __( 'Name', 'ailab' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);



		$this->add_control(

			'your_name_color',

			[

				'label' => __( 'Text Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'selectors' => [

					'{{WRAPPER}} .elementor-slide-your_name' => 'color: {{VALUE}}',



				],

			]

		);



		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'your_name_typography',

				'scheme' => Scheme_Typography::TYPOGRAPHY_2,

				'selector' => '{{WRAPPER}} .elementor-slide-your_name',

			]

		);



		$this->end_controls_section();



		$this->start_controls_section(

			'section_style_tag',

			[

				'label' => __( 'Tag', 'ailab' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);



		$this->add_control(

			'tag_color',

			[

				'label' => __( 'Text Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'selectors' => [

					'{{WRAPPER}} .elementor-slide-tag' => 'color: {{VALUE}}',



				],

			]

		);



		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'tag_typography',

				'scheme' => Scheme_Typography::TYPOGRAPHY_2,

				'selector' => '{{WRAPPER}} .elementor-slide-tag',

			]

		);



		$this->end_controls_section();



		$this->start_controls_section(

			'section_style_button',

			[

				'label' => __( 'Button', 'ailab' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);



		$this->add_control(

			'button_size',

			[

				'label' => __( 'Size', 'ailab' ),

				'type' => Controls_Manager::SELECT,

				'default' => 'sm',

				'options' => self::get_button_sizes(),

			]

		);



		$this->add_control( 'button_color',

			[

				'label' => __( 'Text Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'selectors' => [

					'{{WRAPPER}} .elementor-slide-button' => 'color: {{VALUE}}; border-color: {{VALUE}}',



				],

			]

		);



		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'button_typography',

				'selector' => '{{WRAPPER}} .elementor-slide-button',

				'scheme' => Scheme_Typography::TYPOGRAPHY_4,

			]

		);



		$this->add_control(

			'button_border_width',

			[

				'label' => __( 'Border Width', 'ailab' ),

				'type' => Controls_Manager::SLIDER,

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 20,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .elementor-slide-button' => 'border-width: {{SIZE}}{{UNIT}};',

				],

			]

		);



		$this->add_control(

			'button_border_radius',

			[

				'label' => __( 'Border Radius', 'ailab' ),

				'type' => Controls_Manager::SLIDER,

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 100,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .elementor-slide-button' => 'border-radius: {{SIZE}}{{UNIT}};',

				],

				'separator' => 'after',

			]

		);



		$this->start_controls_tabs( 'button_tabs' );



		$this->start_controls_tab( 'normal', [ 'label' => __( 'Normal', 'ailab' ) ] );



		$this->add_control(

			'button_text_color',

			[

				'label' => __( 'Text Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'selectors' => [

					'{{WRAPPER}} .elementor-slide-button' => 'color: {{VALUE}};',

				],

			]

		);



		$this->add_control(

			'button_background_color',

			[

				'label' => __( 'Background Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'selectors' => [

					'{{WRAPPER}} .elementor-slide-button' => 'background-color: {{VALUE}};',

				],

			]

		);



		$this->add_control(

			'button_border_color',

			[

				'label' => __( 'Border Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'selectors' => [

					'{{WRAPPER}} .elementor-slide-button' => 'border-color: {{VALUE}};',

				],

			]

		);



		$this->end_controls_tab();



		$this->start_controls_tab( 'hover', [ 'label' => __( 'Hover', 'ailab' ) ] );



		$this->add_control(

			'button_hover_text_color',

			[

				'label' => __( 'Text Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'selectors' => [

					'{{WRAPPER}} .elementor-slide-button:hover' => 'color: {{VALUE}};',

				],

			]

		);



		$this->add_control(

			'button_hover_background_color',

			[

				'label' => __( 'Background Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'selectors' => [

					'{{WRAPPER}} .elementor-slide-button:hover' => 'background-color: {{VALUE}};',

				],

			]

		);



		$this->add_control(

			'button_hover_border_color',

			[

				'label' => __( 'Border Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'selectors' => [

					'{{WRAPPER}} .elementor-slide-button:hover' => 'border-color: {{VALUE}};',

				],

			]

		);



		$this->end_controls_tab();



		$this->end_controls_tabs();



		$this->end_controls_section();



		$this->start_controls_section(

			'section_style_navigation',

			[

				'label' => __( 'Navigation', 'ailab' ),

				'tab' => Controls_Manager::TAB_STYLE,

				'condition' => [

					'navigation' => [ 'arrows', 'dots', 'both' ],

				],

			]

		);



		$this->add_control(

			'heading_style_arrows',

			[

				'label' => __( 'Arrows', 'ailab' ),

				'type' => Controls_Manager::HEADING,

				'separator' => 'before',

				'condition' => [

					'navigation' => [ 'arrows', 'both' ],

				],

			]

		);


		$this->add_control(
			'arrows_position',
			[
				'label' => __( 'Arrows Position', 'ailab' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'inside',
				'options' => [
					'inside' => __( 'Inside', 'ailab' ),
					'outside' => __( 'Outside', 'ailab' ),
				],
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);

		$this->add_control(
			'arrows_size',
			[
				'label' => __( 'Arrows Size', 'ailab' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 60,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-slides-wrapper .slick-slider .slick-prev:before, {{WRAPPER}} .elementor-slides-wrapper .slick-slider .slick-next:before' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);

		$this->add_control(
			'arrows_color',
			[
				'label' => __( 'Arrows Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-slides-wrapper .slick-slider .slick-prev:before, {{WRAPPER}} .elementor-slides-wrapper .slick-slider .slick-next:before' => 'color: {{VALUE}};',
				],
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);

		$this->add_control(
			'heading_style_dots',
			[
				'label' => __( 'Dots', 'ailab' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);

		$this->add_control(
			'dots_position',
			[
				'label' => __( 'Dots Position', 'ailab' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'inside',
				'options' => [
					'outside' => __( 'Outside', 'ailab' ),
					'inside' => __( 'Inside', 'ailab' ),
				],
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);

		$this->add_control(
			'dots_size',
			[
				'label' => __( 'Dots Size', 'ailab' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 15,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-slides-wrapper .elementor-slides .slick-dots li button:before' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);

		$this->add_control(
			'dots_color',
			[
				'label' => __( 'Dots Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-slides-wrapper .elementor-slides .slick-dots li button:before' => 'color: {{VALUE}};',
				],
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings();
		?>
		<div class="row team-archive"> 
		<?php
        foreach ($settings['slides'] as $slide) {
            echo '<div class="slide-content-review col-'. $settings['columns_mobile'] .' col-md-'. $settings['columns_tablet'] .' col-lg-'. $settings['columns'] .'"> ';
				echo '<div class="slide-content-review__box-shadow"> ';
                    echo '<div class="position-relative">';
						if ( !empty( $slide['image']['id'] ) ) {
							echo  \Elementor\Group_Control_Image_Size::get_attachment_image_html( $slide );
						}
                        echo '<div class="bg-team">';
                            echo '<div class="icon-list">';
                                if ( $slide['icon1'] ) {
                                    echo '<a href="'. $slide['link1'] .'"><i class="'. $slide['icon1'] .' slide-icon"></i></a>';
                                }
                                if ( $slide['icon2'] ) {
                                    echo '<a href="'. $slide['link2'] .'"><i class="'. $slide['icon2'] .' slide-icon"></i></a>';
                                }
                                if ( $slide['icon3'] ) {
                                    echo '<a href="'. $slide['link3'] .'"><i class="'. $slide['icon3'] .' slide-icon"></i></a>';
                                }
                                if ( $slide['icon4'] ) {
                                    echo '<a href="'. $slide['link4'] .'"><i class="'. $slide['icon4'] .' slide-icon"></i></a>';
                                }
                            echo '</div>';
                            if ( $slide['your_phone'] ) {
                                echo '<div class="elementor-slide-your_phone"><i class="fas fa-phone-alt"> </i> ' . $slide['your_phone'] . '</div>';
                            }
                            if ( $slide['your_email'] ) {
                                echo '<div class="elementor-slide-your_email"><i class="far fa-envelope"> </i> ' . $slide['your_email'] . '</div>';
                            }
                        echo '</div>';
                    echo '</div>';
                    if ( $slide['your_name'] ) {
                        echo '<div class="elementor-slide-your_name">' . $slide['your_name'] . '</div>';
                    }
                    if ( $slide['tag'] ) {
                        echo  '<div class="elementor-slide-tag">' . $slide['tag'] . '</div>';
                    }
				echo '</div>';
			echo '</div>';
		}
		?>
		</div>
		<?php
    }
    
	protected function _content_template() {
    }
}


