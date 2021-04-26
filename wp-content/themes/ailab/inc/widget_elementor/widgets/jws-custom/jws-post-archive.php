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
class JwsPostArchive extends Widget_Base {

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
		return 'jws-post-archive';
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
		return __( 'JWS-Post-Archive', 'ailab' );
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
		
       
        $this->add_responsive_control(
			'layout',
			[
				'label' => __( 'Layout', 'ailab' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'layout-post-archive1',
				'options' => [
					'layout-post-archive1' => 'layout 1',
					'layout-post-archive2' => 'layout 2',
					'layout-post-archive3' => 'layout 3',
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
			'show_thumbnail',
			[
				'label' => __( 'Show Thumbnail', 'ailab' ),
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
        //         'default' => '',
        //         'condition' 	=> [
		// 			'show_time!'	=> '',
		// 		],
                
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
        //         'default' => '',
        //         'condition' 	=> [
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
        $this->add_control(
			'show_categories',
			[
				'label' => __( 'Show Categories', 'ailab' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'ailab' ),
				'label_on' => __( 'On', 'ailab' ),
			]
		);
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
                'default' => '100',
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
                'default' => '100',
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

		// pagination
		
		$this->start_controls_section(
			'section_pagination',
			[
				'label' => __( 'Pagination', 'ailab' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'show_navigation',
			[
				'label' => __( 'Show Navigation', 'ailab' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'ailab' ),
				'label_on' => __( 'On', 'ailab' ),
			]
		);
		$this->add_control(
			'posts_per_page',
			[
				'label' => __( 'Page Limit', 'ailab' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 3,
			]
		);
		

		$this->add_responsive_control(
			'align-pagination',
			[
				'label' => __( 'Alignment', 'ailab' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => __( 'Left', 'ailab' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ailab' ),
						'icon' => 'fa fa-align-center',
					],
					'flex-end' => [
						'title' => __( 'Right', 'ailab' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .nxl_pagi_inner' => 'justify-content: {{VALUE}};',
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
			'text_margin_post',
			[
				'label' => __( 'Text Margin', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .post-time' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .post-time' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        
        // category

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
				'selector' => '{{WRAPPER}} .post-category',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow_category',
				'selector' => '{{WRAPPER}} .post-category',
			]
		);


		$this->add_control(
			'text_color-category',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-category' => 'color: {{VALUE}};',
				],
			]
		);

		
		$this->add_control(
			'background_color-category',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-category' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .post-category' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .post-category' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'name' => 'typography-button',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
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
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$tag = (get_query_var('tag')) ? get_query_var('tag') : '';
		$category = (get_query_var('category_name')) ? get_query_var('category_name') : '';

		$args = array (
			'post_type'              => array( 'post' ),
			'posts_per_page'		 => $settings['posts_per_page'],
			'order'                  => $settings['order'],
			'orderby'                => $settings['orderby'],
			'tag' => $tag,
			'category_name' => $category,
			'paged' => $paged
	
		);

		// The Query
		$services = new \WP_Query( $args );

		// The Loop
		?>
		<div class="row jws-post-archive">
		<?php
		if ( $services->have_posts() ) {
			while ( $services->have_posts() ) {
				$services->the_post();
				// include('html/content.php');
				echo '<div class="col-'. $settings['columns_mobile'] .' col-md-'. $settings['columns_tablet'] .' col-lg-'. $settings['columns'] .' '. $settings['layout'] .' section-blog post-archive">
						<div class="elementor-post ">';
							$this->render_post();
				echo   '</div>
					</div>';
		
			}
		} else {
			// no posts found
		}
		?>	
		</div>
		<?php
		if ($this->get_settings('show_navigation')) {?>
            <div class="navigation"><?php jws_query_pagination($services->max_num_pages); ?></div>
			<?php
        }
		// Restore original Post Data
		wp_reset_postdata();
	}
	
	protected function render_thumbnail() {
        $settings = $this->get_settings();
        if (! $this->get_settings('show_thumbnail')) {
            return;
        }
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
				<span class="color-layout-hover">
					<?php 
						the_time('M d, Y');
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
		$settings = $this->get_settings();?>
		<div class="blog-img-info">
			<a class="post-thumbnail-link" href="<?php echo get_the_permalink()?>">
					
				<?php $this->render_thumbnail();?>
			</a>
			<?php if($settings['layout']=="layout-post-archive2"){ ?>
				<div class="post-info d-flex justify-content-between">
				<?php $this->render_author();?>
				
				<div>
					<?php
					$this->render_time();
					$this->render_wish_list();
					$this->render_comment();
					?>
				</div>
                </div>
			<?php } ?>
			
		</div>
        <div class="m-15">
			<?php
            $this->render_categories();
            $this->render_title();
			$this->render_excerpt();
			if($settings['layout']!="layout-post-archive2"){?>
				<div class="post-info d-flex justify-content-between">
				<?php $this->render_author();?>
				
				<div>
					<?php
					$this->render_time();
					$this->render_wish_list();
					$this->render_comment();
					?>
				</div>
            </div>
			<?php }
            
            $this->render_button(); ?>
		</div>
		<?php
    }

	protected function _content_template() {
		
	}
}
