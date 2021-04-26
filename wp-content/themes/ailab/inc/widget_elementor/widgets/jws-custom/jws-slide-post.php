<?php
namespace ElementorHelloWorld\Widgets\JwsCustom;

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
class JwsSlidePost extends Widget_Base {

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
		return 'jws-slide-post';
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
		return __( 'JWS-Slide-Post', 'ailab' );
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
			'section_title',
			[
				'label' => __( 'Post', 'ailab' ),
				'tab' => Controls_Manager::TAB_CONTENT,
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

		$this->add_control(
			'posts_per_page',
			[
				'label' => __( 'Posts Per Page', 'ailab' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 6,
			]
        );
        
        $this->add_responsive_control(
			'slidesToShow',
			[
				'label' => __( 'Slides to Show', 'ailab' ),
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
					'7' => '7',
					'8' => '8',
					'9' => '9',
					'10' => '10',
				],
			]
		);

		$this->add_responsive_control(
			'slidesToScroll',
			[
				'label' => __( 'Slides to Scroll', 'ailab' ),
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
					'7' => '7',
					'8' => '8',
					'9' => '9',
					'10' => '10',
				],
			]
		);

		$this->add_responsive_control(
			'layout',
			[
				'label' => __( 'Layout', 'ailab' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'layout1',
				'options' => [
					'layout1' => 'layout 1',
					'layout2' => 'layout 2',
				],
			]
		);

		   $this->add_responsive_control(
				'image_size',
				[
					'label'     => __( 'Image Size', 'ailab' ),
					'type'      => Controls_Manager::TEXT,
					'default'   => '370x250',
				]
		  );
        $this->add_control(
			'show_categories',
			[
				'label' => __( 'Show Categorie', 'ailab' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'ailab' ),
				'label_on' => __( 'On', 'ailab' ),
			]
		);
		$this->add_control(
			'show_time',
			[
				'label' => __( 'Show Time', 'ailab' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'ailab' ),
				'label_on' => __( 'On', 'ailab' ),
			]
		);
		// $this->add_control(
		// 	'icon-time',
		// 	[
		// 		'label' => __( 'Icon Time', 'ailab' ),
		// 		'type' => Controls_Manager::ICON,
		// 		'label_block' => true,
		// 		'default' => '',
		// 		'condition' 	=> [
		// 			'show_time!'	=> '',
		// 		],
		// 		'frontend_available' => true,
		// 	]
			
		// );
		$this->add_control(
			'show_comment',
			[
				'label' => __( 'Show Comment', 'ailab' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'ailab' ),
				'label_on' => __( 'On', 'ailab' ),
			]
		);
		// $this->add_control(
		// 	'icon-comment',
		// 	[
		// 		'label' => __( 'Icon Comment', 'ailab' ),
		// 		'type' => Controls_Manager::ICON,
		// 		'label_block' => true,
		// 		'default' => '',
		// 		'condition' 	=> [
		// 			'show_comment!'	=> '',
		// 		],
		// 	]
        // );
        $this->add_control(
			'show_wish_list',
			[
				'label' => __( 'Show Wish List', 'ailab' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'ailab' ),
				'label_on' => __( 'On', 'ailab' ),
			]
		);
		// $this->add_control(
		// 	'icon_wish_list',
		// 	[
		// 		'label' => __( 'Icon Wist List', 'ailab' ),
		// 		'type' => Controls_Manager::ICON,
		// 		'label_block' => true,
		// 		'default' => '',
		// 		'condition' 	=> [
		// 			'show_wish_list!'	=> '',
		// 		],
		// 	]
		// );
		$this->add_control(
			'show_author',
			[
				'label' => __( 'Show Author', 'ailab' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'ailab' ),
				'label_on' => __( 'On', 'ailab' ),
			]
		);
		$this->add_control(
			'show_title',
			[
				'label' => __( 'Show Title', 'ailab' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'ailab' ),
				'label_on' => __( 'On', 'ailab' ),
			]
		);
		$this->add_control(
			'posts_per_words_title',
			[
				'label' => __( 'Posts Per Words', 'ailab' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '20',
				'condition' 	=> [
					'show_title!'	=> '',
				],
				
			]
		);
		$this->add_control(
			'show_decription',
			[
				'label' => __( 'Show Decription', 'ailab' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'ailab' ),
				'label_on' => __( 'On', 'ailab' ),
			]
		);
		$this->add_control(
			'posts_per_words',
			[
				'label' => __( 'Posts Per Words', 'ailab' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '50',
				'condition' 	=> [
					'show_decription!'	=> '',
				],
				
			]
		);
		$this->add_control(
			'show_reading_contlnue',
			[
				'label' => __( 'Show Button', 'ailab' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'ailab' ),
				'label_on' => __( 'On', 'ailab' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label' => __( 'Text', 'ailab' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Click me', 'ailab' ),
				'placeholder' => __( 'Click me', 'ailab' ),
				'condition' 	=> [
					'show_reading_contlnue!'	=> '',
				],
			]
		);
		$this->add_control(
			'icon-button',
			[
				'label' => __( 'Icon Button', 'ailab' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
				'condition' 	=> [
					'show_reading_contlnue!'	=> '',
				],
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
				'query_type',
				[
					'label'   => __( 'Source', 'ailab' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'all',
					'options' => [
						'all'    => __( 'All posts', 'ailab' ),
						'custom' => __( 'Custom Query', 'ailab' ),
						'manual' => __( 'Manual Selection', 'ailab' ),
					],
				]
			);
        	$this->add_control(
				'query_manual_ids',
				[
					'label'     => __( 'Select posts', 'ailab' ),
					'type'      => 'jws-query-posts',
					'post_type' => 'post',
					'multiple'  => true,
					'condition' => [
						'query_type' => 'manual',
					],
				]
			);

			/* Exclude */
			$this->add_control(
				'query_exclude',
				[
					'label'     => __( 'Exclude', 'ailab' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'query_type!' => [ 'manual', 'main' ],
					],
				]
			);
			$this->add_control(
				'query_exclude_ids',
				[
					'label'       => __( 'Select posts', 'ailab' ),
					'type'        => 'jws-query-posts',
					'post_type'   => 'post',
					'multiple'    => true,
					'description' => __( 'Select posts to exclude from the query.', 'ailab' ),
					'condition'   => [
						'query_type!' => [ 'manual', 'main' ],
					],
				]
			);
			$this->add_control(
				'query_exclude_current',
				[
					'label'        => __( 'Exclude Current post', 'ailab' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_on'     => __( 'Yes', 'ailab' ),
					'label_off'    => __( 'No', 'ailab' ),
					'return_value' => 'yes',
					'default'      => '',
					'description'  => __( 'Enable this option to remove current post from the query.', 'ailab' ),
					'condition'    => [
						'query_type!' => [ 'manual', 'main' ],
					],
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
        
        // silde option 

		$this->start_controls_section(
			'section_slider_options',
			[
				'label' => __( 'Slider Options', 'ailab' ),
				'type' => Controls_Manager::SECTION,
			]
		);

		$this->add_responsive_control(
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
        
		// Post 
		$this->start_controls_section(
			'section_post',
			[
				'label' => __( 'Post', 'ailab' ),
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
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_transform_post',
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
					'{{WRAPPER}} .elementor-post' => 'text-transform: {{VALUE}};',
				],
			]
		);
		$this->start_controls_tabs( 'tabs_post_style' );
		$this->start_controls_tab(
			'tab_post_normal',
			[
				'label' => __( 'Normal', 'ailab' ),
			]
		);

		$this->add_control(
			'text_color_post',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-post' => 'color: {{VALUE}};',
				],
			]
		);

		
		$this->add_control(
			'background_color_post',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-post' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_post_hover',
			[
				'label' => __( 'Hover', 'ailab' ),
			]
		);

		$this->add_control(
			'hover_post_color',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-post:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'post_background_hover_color',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-post:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();


		$this->add_control(
			'section_margin_post',
			[
				'label' => __( 'Section  Margin', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
    
		$this->add_control(
			'section_padding_post',
			[
				'label' => __( 'Section Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
        $this->add_control(
			'text_padding_post',
			[
				'label' => __( 'Text Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-post .m-15' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border_post',
				'label' => __( 'Border', 'ailab' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .elementor-post',
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .elementor-post',
			]
		);

		$this->end_controls_section();

		// Time //

		$this->start_controls_section(
			'section_time',
			[
				'label' => __( 'Time', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-time',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .post-time',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow_time',
				'selector' => '{{WRAPPER}} .post-time',
			]
		);


		$this->add_control(
			'text_color-time',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-time' => 'color: {{VALUE}};',
				],
			]
		);

		
		$this->add_control(
			'background_color-time',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-time' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_margin_time',
			[
				'label' => __( 'Text Margin', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_time',
			[
				'label' => __( 'Text Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// comment

		$this->start_controls_section(
			'section_comment',
			[
				'label' => __( 'Comment', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-comment',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .post-comment',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow_comment',
				'selector' => '{{WRAPPER}} .post-comment',
			]
		);


		$this->add_control(
			'text_color-comment',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-comment' => 'color: {{VALUE}};',
				],
			]
		);

		
		$this->add_control(
			'background_color-comment',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-comment' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_margin_comment',
			[
				'label' => __( 'Text Margin', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-comment' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_comment',
			[
				'label' => __( 'Text Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-comment' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// author

		$this->start_controls_section(
			'section_author',
			[
				'label' => __( 'Author', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-author',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .post-author',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow_author',
				'selector' => '{{WRAPPER}} .post-author',
			]
		);


		$this->add_control(
			'text_color-author',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-author' => 'color: {{VALUE}};',
				],
			]
		);

		
		$this->add_control(
			'background_color-author',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-author' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_margin_author',
			[
				'label' => __( 'Text Margin', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-author' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_author',
			[
				'label' => __( 'Text Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-author' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// title

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-title',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .post-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow-title',
				'selector' => '{{WRAPPER}} .post-title',
			]
		);

		$this->add_control(
			'text_color-title',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_margin_title',
			[
				'label' => __( 'Text Margin', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_title',
			[
				'label' => __( 'Text Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// decription

		$this->start_controls_section(
			'section_decription_style',
			[
				'label' => __( 'Decription', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-decription',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .post-decription',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow-decription',
				'selector' => '{{WRAPPER}} .post-decription',
			]
		);

		$this->add_control(
			'text_color-decription',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-decription' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_margin_decription',
			[
				'label' => __( 'Text Margin', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-decription' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_decription',
			[
				'label' => __( 'Text Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-decription' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// button

		$this->start_controls_section(
			'section_botton',
			[
				'label' => __( 'Button', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'label' => __( 'Typography', 'ailab' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .post-link__text',
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'ailab' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-link__text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					' {{WRAPPER}} .post-link__text' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'ailab' ),
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .post-link:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					' {{WRAPPER}} .post-link:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => __( 'Border Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .post-link:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Animation', 'ailab' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'ailab' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .post-link__text',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-link__text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .post-link__text',
			]
		);

		$this->add_control(
			'text_padding',
			[
				'label' => __( 'Text Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					' {{WRAPPER}} .post-link__text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' => __( 'Button Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					' {{WRAPPER}} .post-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();
        // button

		$this->start_controls_section(
			'section_dots_style',
			[
				'label' => __( 'Dots', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'dot_margin',
			[
				'label' => __( 'Dot Margin', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .slick-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		// WP_Query arguments
		$args = array (
			'post_type'              => array( 'post' ),
			'post_status'            => array( 'publish' ),
			'posts_per_page'		 => $settings['posts_per_page'],
			'order'                  => $settings['order'],
			'orderby'                => $settings['orderby'],
		);
        	if ( 'manual' === $settings['query_type'] ) {

				$manual_ids = $settings['query_manual_ids'];

				$args['post__in'] = $manual_ids;
			}
		// The Query
		$services = new \WP_Query( $args );
		// The Loop 
        $arrows='';
                        $dots='';
                if($settings['navigation']=="both") {
                    if(intval($settings['slidesToShow']) < $settings['posts_per_page'] & intval($settings['slidesToShow'])== -1) {
                        $arrows='true';
                        $dots='true';
                    }else {
                        $arrows='false';
                        $dots='false';
                    }
                    
                } elseif ($settings['navigation']=="arrows") {
                   if(intval($settings['slidesToShow']) < $settings['posts_per_page'] & intval($settings['slidesToShow'])== -1) {
                        $arrows='true';
                        $dots='false';
                    }else {
                        $arrows='false';
                        $dots='false';
                    }
                    
                }elseif ($settings['navigation']=="dots") {
                    
                   if(intval($settings['slidesToShow']) < $settings['posts_per_page'] & intval($settings['slidesToShow'])!= -1) {
                        $arrows='false';
                        $dots='true';
                    }else {
                        $arrows='false';
                        $dots="false";
                    } 
                }else {
                     $arrows='false';
                        $dots='false';
                }
                     $dotstablet='';
                if($settings['navigation_tablet']=="both") {
                    if(intval($settings['slidesToShow_mobile']) < $settings['posts_per_page'] & intval($settings['slidesToShow_mobile'])== -1) {
                        $arrowstablet='true';
                        $dotstablet='true';
                    }else {
                        $arrowstablet='false';
                        $dotstablet='false';
                    }
                    
                } elseif ($settings['navigation_tablet']=="arrows") {
                   if(intval($settings['slidesToShow_mobile']) < $settings['posts_per_page'] & intval($settings['slidesToShow_mobile'])== -1) {
                        $arrowstablet='true';
                        $dotstablet='false';
                    }else {
                        $arrowstablet='false';
                        $dotstablet='false';
                    }
                    
                }elseif ($settings['navigation_tablet']=="dots") {
                   if(intval($settings['slidesToShow_mobile']) < $settings['posts_per_page'] & intval($settings['slidesToShow_mobile'])!= -1) {
                        $arrowstablet='false';
                        $dotstablet='true';
                    }else {
                        $arrowstablet='false';
                        $dotstablet="false";
                    } 
                }else {
                     $arrowstablet='false';
                        $dotstablet='false';
                }
                $dotsmobile='';
                if($settings['navigation_mobile']=="both") {
                    if(intval($settings['slidesToShow_mobile']) < $settings['posts_per_page'] & intval($settings['slidesToShow_mobile'])== -1) {
                        $arrowsmobile='true';
                        $dotstmobile='true';
                    }else {
                        $arrowsmobile='false';
                        $dotsmobile='false';
                    }
                    
                } elseif ($settings['navigation_mobile']=="arrows") {
                   if(intval($settings['slidesToShow_mobile']) < $settings['posts_per_page'] & intval($settings['slidesToShow_mobile'])== -1) {
                        $arrowsmobile='true';
                        $dotsmobile='false';
                    }else {
                        $arrowsmobile='false';
                        $dotstmobile='false';
                    }
                    
                }elseif ($settings['navigation_mobile']=="dots") {
                   if(intval($settings['slidesToShow_mobile']) < $settings['posts_per_page'] & intval($settings['slidesToShow_mobile'])!= -1) {
                        $arrowsmobile='false';
                        $dotsmobile='true';
                    }else {
                        $arrowsmobile='false';
                        $dotsmobile="false";
                    } 
                }else {
                     $arrowsmobile='false';
                        $dotsmobile='false';
                }
                $infinite = ($settings['infinite'] == 'yes') ? 'true' : 'false';
		?>
            <div class="<?php echo esc_attr($settings['layout']) ?> section-blog slide-post" data-slidesToShow="<?php echo esc_attr($settings['slidesToShow']) ?> " data-slick='{"slidesToShow": <?php echo esc_attr($settings['slidesToShow']) ?> ,"slidesToScroll": <?php echo esc_attr($settings['slidesToScroll']) ?> ,"dots":<?php echo esc_attr($dots)?>,"arrows":<?php echo esc_attr($arrows)?>,"infinite":<?php echo esc_attr($infinite)?>,  "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": <?php echo esc_attr($settings['slidesToShow_tablet']) ?>,"slidesToScroll": <?php echo esc_attr($settings['slidesToScroll_tablet']) ?>,"dots":<?php echo esc_attr($dotstablet)?>,"arrows":<?php echo esc_attr($arrowstablet)?>}},{"breakpoint": 768,"settings":{"slidesToShow": <?php echo esc_attr($settings['slidesToShow_mobile']) ?>,"slidesToScroll": <?php echo esc_attr($settings['slidesToScroll_mobile']) ?>,"dots":<?php echo esc_attr($dotsmobile)?>,"arrows":<?php echo esc_attr($arrowsmobile)?>}}]}'>
            <?php
            
            if ( $services->have_posts() ) {
                while ( $services->have_posts() ) {
                    $services->the_post();
                    echo '<div class="elementor-post ">';
                        $this->render_post();
                    echo   '</div>';
                }
            } else {
                // no posts found
            }
            ?>	
        </div>

		<?php
		// Restore original Post Data
		wp_reset_postdata();
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
	protected function render_thumbnail() {
        global $jws_option;
		$settings = $this->get_settings();
            if(has_post_thumbnail()) {
                if (function_exists('jws_getImageBySize')) {
                    $attach_id = get_post_thumbnail_id();
                    $img = jws_getImageBySize(array('attach_id' => $attach_id, 'thumb_size' => $settings['image_size'], 'class' => 'image-blog'));
                    echo ''.$img['thumbnail'];
                    }else {
                    echo ''.$img = get_the_post_thumbnail(get_the_ID(), $settings['image_size']);
                   }
                   
            }else {
           
                global $jws_option;
                $attach_id = $jws_option['empty_image']['id'];
                $img = jws_getImageBySize(array('attach_id' => $attach_id, 'thumb_size' => $settings['image_size'], 'class' => 'image-blog'));
                echo ''.$img['thumbnail'];
            }
          
	}
	
	protected function render_time() {
		$settings = $this->get_settings();
        if (! $this->get_settings('show_time')) {
            return;
        }
		?>
			<time class="post-time">
				<?php if ( ! empty( $settings['icon-time'] ) ) : ?>
				<i class="<?php echo esc_attr( $settings['icon-time'] ); ?>" aria-hidden="true"></i>
				<?php else :
					switch ($settings['layout']) {
						case 'layout1':
							echo '<i class="fa fa-clock-o" aria-hidden="true"></i>';
							break;
						case 'layout2':
							echo '<i class="fa fa-calendar" aria-hidden="true"></i>';
							break;
					}
				?>
				<?php endif; ?>
				<span class="color-layout-hover">
					<?php 
						switch ($settings['layout']) {
							case 'layout1':
								the_time('d M Y');
								break;
							case 'layout2':
								the_time('M d, Y');
								break;
						}
					?>
				</span>
			</time>
		<?php
	}

	protected function render_comment() {
		$settings = $this->get_settings();
		if ( ! $this->get_settings( 'show_comment' ) ) {
			return;
        }
		?><span class="post-comment">
			<i class="far fa-comment" aria-hidden="true"></i>
			<?php echo '<span>'. get_comments_number() .'</span>'; ?>
		</span>
		<?php

    }

    protected function render_wish_list() {
		$settings = $this->get_settings();
		if ( ! $this->get_settings( 'show_wish_list' ) ) {
			return;
        }
		?><span class="post-wish-list">
			<?php echo esc_attr(post_favorite()); ?>
		</span>
		<?php

	}

	protected function render_author() {
		$settings = $this->get_settings();
		if ( ! $this->get_settings( 'show_author' ) ) {
			return;
		}
		?>	<span class="post-author">
			    <?php echo get_avatar(get_the_author_meta('ID'))?>	<span class="color-layout-hover"><?php the_author(); ?></span>
			</span>
		<?php

    }
    protected function render_categories() {
		$settings = $this->get_settings();
		if ( ! $this->get_settings( 'show_categories' ) ) {
			return;
		}
		?>	<div class="post-category">
				<?php  echo get_the_term_list(get_the_ID(), 'category', '', '&nbsp &nbsp'); ?>
            </div>
		<?php

    }
	protected function render_title() {
		$settings = $this->get_settings();
		if ( ! $this->get_settings( 'show_title' ) ) {
			return;
		}
		?><h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<?php
	}
	protected function render_excerpt() {
		$settings = $this->get_settings();
		if ( ! $this->get_settings( 'show_decription' ) ) {
			return;
		}
		?>
		<div class="post-decription"><?php echo wp_trim_words( get_the_excerpt(), $settings['posts_per_words'] , '...' ) ?></div>
		<?php
	}

	protected function render_button() {

		if ( ! $this->get_settings( 'show_reading_contlnue' ) ) {
			return;
		}
		$settings = $this->get_settings();

		$this->add_render_attribute( 'text', 'class', 'elementor-button-text' );

		$this->add_inline_editing_attributes( 'text', 'none' );
		?>
		<div class="post-link">
			<a href="<?php the_permalink() ?>">
				<span class="post-link__text" ><?php echo esc_html($settings['text']); ?>
					<?php if ( ! empty( $settings['icon-button'] ) ) : ?>
						<i class="<?php echo esc_attr( $settings['icon-button'] ); ?>" aria-hidden="true"></i>
					<?php endif; ?>
				</span>
			</a>
		</div>
		
		<?php
	}

	protected function render_post() {
		$settings = $this->get_settings();
        echo '<a class="post-thumbnail-link" href="'.get_the_permalink().'">';
            $this->render_thumbnail();
        echo '</a>';
        echo '<div class="m-15">';
            $this->render_categories();
            $this->render_title();
            $this->render_excerpt();
            echo '<div class="post-info d-flex justify-content-between">';
                $this->render_author();
                echo '<div>';
                    $this->render_time();
                    $this->render_wish_list();
                    $this->render_comment();
                echo '</div>';
            echo   '</div>';
            $this->render_button();
		echo '</div>';
	}

	
	protected function _content_template() {
		
	}
}



