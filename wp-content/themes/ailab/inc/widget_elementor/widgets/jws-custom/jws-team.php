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
class JwsTeams extends Widget_Base {

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
		return 'jws-teams';
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
		return __( 'JWS-Teams', 'ailab' );
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
				'label' => __( 'Team', 'ailab' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
         $this->add_responsive_control(

			'type',

			[

				'label' => __( 'Type', 'ailab' ),

				'type' => \Elementor\Controls_Manager::SELECT,

				'default' => 'grid',

				'options' => [

					'slider' => 'slider',

					'grid' => 'Grid',
				],

			]

		);
		$this->add_responsive_control(
			'columns',
			[
				'label' => __( 'Columns', 'ailab' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '4',
				'tablet_default' => '2',
				'mobile_default' => '1',
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
				'label' => __( 'Teams Per Page', 'ailab' ),
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
				'default' => 'layout-team1',
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
					'default'   => 'medium_large',
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
			'teams_per_words',
			[
				'label' => __( 'Teams Per Words', 'ailab' ),
				'type' => Controls_Manager::NUMBER,
                'default' => '50',
                'condition' 	=> [
					'show_decription!'	=> '',
				],
			]
		);
		$this->add_control(
			'icon_list',
			[
				'label' => '',
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'text' => __( 'List Item #1', 'ailab' ),
						'icon' => 'fa fa-check',
					],
					[
						'text' => __( 'List Item #2', 'ailab' ),
						'icon' => 'fa fa-times',
					],
					[
						'text' => __( 'List Item #3', 'ailab' ),
						'icon' => 'fa fa-dot-circle-o',
					],
				],
				'fields' => [
					[
						'name' => 'text',
						'label' => __( 'Text', 'ailab' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'List Item', 'ailab' ),
						'default' => __( 'List Item', 'ailab' ),
					],
					[
						'name' => 'icon',
						'label' => __( 'Icon', 'ailab' ),
						'type' => Controls_Manager::ICON,
						'label_block' => true,
						'default' => 'fa fa-check',
					],
					[
						'name' => 'link',
						'label' => __( 'Link', 'ailab' ),
						'type' => Controls_Manager::URL,
						'label_block' => true,
						'placeholder' => __( 'http://your-link.com', 'ailab' ),
					],
				],
				'title_field' => '<i class="{{ icon }}" aria-hidden="true"></i> {{{ text }}}',
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'ailab' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
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
					'post_type' => 'teams',
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
					'post_type'   => 'teams',
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
		
		// Post 
		$this->start_controls_section(
			'section_post',
			[
				'label' => __( 'Teams', 'ailab' ),
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
					'{{WRAPPER}} .teams' => 'text-transform: {{VALUE}};',
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
					'{{WRAPPER}} .team-info' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .team-info' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .teams:hover team-info' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'post_background_hover_color',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .teams:hover team-info' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .teams' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .teams' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .teams',
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
				'selector' => '{{WRAPPER}} .teams',
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
				'name' => 'typography-author',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .team-category',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow_author',
				'selector' => '{{WRAPPER}} .team-category',
			]
		);


		$this->add_control(
			'text_color-author',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .team-category a' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .team-category' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .team-category' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .team-category' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .team-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow-title',
				'selector' => '{{WRAPPER}} .team-title',
			]
		);

		$this->add_control(
			'text_color-title',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .team-title' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .team-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .team-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// icon

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => __( 'Icon', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-icon',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elementor-icon-list-icon i',
			]
		);

		$this->start_controls_tabs( 'tabs_icon_style' );
		$this->start_controls_tab(
			'tab_icon_normal',
			[
				'label' => __( 'Normal', 'ailab' ),
			]
		);

		$this->add_control(
			'text_color_icon',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-icon i' => 'color: {{VALUE}};',
				],
			]
		);

		
		$this->add_control(
			'background_color_icon',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-icon' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_icon_hover',
			[
				'label' => __( 'Hover', 'ailab' ),
			]
		);

		$this->add_control(
			'hover_icon_color',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-icon:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_background_hover_color',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-icon:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();


		$this->add_control(
			'text_margin_icon',
			[
				'label' => __( 'Text Margin', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_icon',
			[
				'label' => __( 'Text Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .team-decription',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow-decription',
				'selector' => '{{WRAPPER}} .team-decription',
			]
		);

		$this->add_control(
			'text_color-decription',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .team-decription' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .team-decription' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .team-decription' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
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
		$settings = $this->get_settings();
        //WP_Query arguments

		$args = array (

			'post_type'              => array( 'teams' ),

			'post_status'            => array( 'publish' ),
            'posts_per_page'		 => $settings['posts_per_page'],


		);



		// The Query

		// grid
         
    	  $class_row = 'row'.' ';  
          $class_row .= $settings['type'].' ';
          $class_row .= $settings['layout'].' ';
          $class_column = 'team-item'.' ';
          
           $class_column .= ' col-lg-'.$settings['columns'].' ';
          $class_column .= (!empty($settings['columns_tablet'])) ? ' col-md-'.$settings['columns_tablet'].' ' : ' col-md-'.$settings['columns'].' ' ;
          $class_column .= (!empty($settings['columns_mobile'])) ? ' col-'.$settings['columns_mobile'].' ' :  ' col-'.$settings['columns'].' ';
        // The slider
        
         if($settings['type'] == 'slider') {
            
            $class_column .= ' slick-slide'.' ';
            $dots = ($settings['navigation'] == 'dots' || $settings['navigation'] == 'both') ? 'true' : 'false';
            $arrows = ($settings['navigation'] == 'arrows' || $settings['navigation'] == 'both') ? 'true' : 'false';
			$autoplay = ($settings['autoplay'] == 'yes') ? 'true' : 'false';
			$centermode = ($settings['centermode'] == 'yes') ? 'true' : 'false';
            $pause_on_hover = ($settings['pause_on_hover'] == 'yes') ? 'true' : 'false';
            $infinite = ($settings['infinite'] == 'yes') ? 'true' : 'false';
            $autoplay_speed = ($settings['autoplay_speed']) ? $settings['autoplay_speed'] : '0';
            $data_slick = 'data-slick=\'{"slidesToShow":'.$settings['slides_to_show'].' ,"slidesToScroll": '.$settings['slides_to_scroll'].', "autoplay": '.$autoplay.', "centerMode": '.$centermode.',"arrows": '.$arrows.', "dots":'.$dots.', "autoplaySpeed": '.$autoplay_speed.',"pauseOnHover":'.$pause_on_hover.',"nfinite":'.$infinite.',
            "speed": '.$settings['transition_speed'].', "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": '.$settings['slides_to_show_tablet'].',"slidesToScroll": '.$settings['slides_to_scroll_tablet'].'}},
            {"breakpoint": 767,"settings":{"slidesToShow": '.$settings['slides_to_show_mobile'].',"slidesToScroll": '.$settings['slides_to_scroll_mobile'].'}}]}\''; 
       }else {
            $data_slick = '';

       }
       	// The Query
        	$query_args = [
					'post_type'              => array( 'teams' ),

        			'post_status'            => array( 'publish' ),
        
        			'posts_per_page'		 => $settings['posts_per_page'],
        
        			'order'                  => $settings['order'],
        
        			'orderby'                => $settings['orderby'],
			];

        	if ( 'manual' === $settings['query_type'] ) {

				$manual_ids = $settings['query_manual_ids'];

				$query_args['post__in'] = $manual_ids;
			}
            if ( 'manual' !== $settings['query_type'] && 'main' !== $settings['query_type'] ) {

				if ( '' !== $settings['query_exclude_ids'] ) {

					$exclude_ids = $settings['query_exclude_ids'];

					$query_args['post__not_in'] = $exclude_ids;
				}

				if ( 'yes' === $settings['query_exclude_current'] ) {

					$query_args['post__not_in'][] = $post->ID;
				}
			}

		// The Query
            $query_args = apply_filters( 'jws_services_query_args', $query_args, $settings );

			$teams = new \WP_Query( $query_args );

		?>
		<div class="jws-team <?php echo esc_attr($class_row) ?>" <?php echo ''.$data_slick;?>>
		<?php
        while ( $teams->have_posts() ) : $teams->the_post();?>
            <div class="<?php echo esc_attr($class_column) ?>" >
                <div class="jws-team-inner-item">
                    <div class="team-img">
                    
                    <?php
                           if (function_exists('jws_getImageBySize')) {
                         $attach_id = get_post_thumbnail_id();
                         
                         $img = jws_getImageBySize(array('attach_id' => $attach_id, 'thumb_size' => $settings['image_size'], 'class' => 'team-image'));
                         echo ''.$img['thumbnail'];
                
                         }else {
                         echo ''.$img = get_the_post_thumbnail(get_the_ID(), $settings['image_size']);
                  }?>
                </div>
                
               
               
                 <?php   
                    $social_medias = get_post_meta( get_the_ID(), 'social_media', true );
                    $number_phone = get_post_meta( get_the_ID(), 'number_phone', true );
                    $email_address = get_post_meta( get_the_ID(), 'email_address', true );
                    echo '<div class="bg-team">';
                    if($settings['layout']=='layout1') {
                            echo '<span class="open-icon-list"></span>';
                        }
                        echo '<div class="team-icon-list">';
                        
                            foreach ( (array) $social_medias as $key => $item ) {
                                
                                    if ( isset( $item['social_media_icon_name'] ) ) {
                                            echo '<a href="'. $item['social_media_link'] .'" target="_blank"><i class="'. $item['social_media_icon_name'] .' slide-icon"></i></a>';
                                    }
                            }
                        echo '</div>';
                        if($settings['layout']=='layout2'){
                            if ( isset( $number_phone ) && !empty($number_phone)) { echo '<a href="tel:'. $number_phone .' target="_blank"" class="team-number-phone"><i class="fas fa-phone-alt slide-icon"></i> '. $number_phone .'</a>';}
                            if ( isset( $email_address ) && !empty($email_address)) { echo '<a href="mailTo:'. $email_address .' target="_blank"" class="team-email-address"><i class="far fa-envelope slide-icon"></i> '. $email_address .'</a>';}
                        }
                        
                    echo '</div>';
                    ?>
                    
                </div>
                <?php
                    echo '<div class="team-description">' . wp_trim_words( get_the_excerpt(), 50 , '...' ) . '</div>';
                    echo '<h4 class="team-name">' . get_the_title() . '</h4>';
                    if ( get_post_meta( get_the_ID(), 'postion', 1 ) ) {
                        echo  '<span class="team-position">' . get_post_meta( get_the_ID(), 'postion', 1 ) . '</span>'; 
                    }?>
            </div>
        <?php endwhile;?>

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
