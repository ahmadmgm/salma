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

class JwsServices extends Widget_Base {



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

		return 'jws-services';

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

		return __( 'JWS-Services', 'ailab' );

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
 	      $this->add_control(

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

				'default' => 3,

			]

		);
 	      $this->add_control(
			'number_words',
			[
				'label' => __( 'Number Words per Post', 'ailab' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '120',
			]
		);


		$this->add_responsive_control(

			'layout',

			[

				'label' => __( 'Layout', 'ailab' ),

				'type' => \Elementor\Controls_Manager::SELECT,

				'default' => 'layout-service1',

				'options' => [

					'layout-service1' => 'layout 1',

					'layout-service2' => 'layout 2',

					'layout-service3' => 'layout 3',

					'layout-service4' => 'layout 4',

					'layout-service5' => 'layout 5',

				],

			]

		);



        $this->add_control(

			'show_image_bottom',

			[

				'label' => __( 'Show Image Bottom', 'ailab' ),

				'type' => Controls_Manager::SWITCHER,

				'default' => 'yes',

				'label_off' => __( 'Off', 'ailab' ),

				'label_on' => __( 'On', 'ailab' ),

			]

        );

        $this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'ailab' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' 	=> [
                    'show_image_bottom!'	=> '',
                ],
                'frontend_available' => true
			]
        );
        
        $this->add_control(

			'show_category',

			[

				'label' => __( 'Show Category', 'ailab' ),

				'type' => Controls_Manager::SWITCHER,

				'default' => 'yes',

				'label_off' => __( 'Off', 'ailab' ),

				'label_on' => __( 'On', 'ailab' ),

			]

        );
        
        $this->add_control(

			'show_number',

			[

				'label' => __( 'Show Number', 'ailab' ),

				'type' => Controls_Manager::SWITCHER,

				'default' => 'no',

				'label_off' => __( 'Off', 'ailab' ),

				'label_on' => __( 'On', 'ailab' ),

			]

		);
         $this->add_control(

			'show_image',

			[

				'label' => __( 'Show Image', 'ailab' ),

				'type' => Controls_Manager::SWITCHER,

				'default' => 'yes',

				'label_off' => __( 'Off', 'ailab' ),

				'label_on' => __( 'On', 'ailab' ),

			]

		);
           $this->add_responsive_control(
				'image_size',
				[
					'label'     => __( 'Image Size', 'ailab' ),
					'type'      => Controls_Manager::TEXT,
					'default'   => 'full',
				]
		  );
        $this->add_control(

			'show_icon',

			[

				'label' => __( 'Show Icon', 'ailab' ),

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

			'show_excerpt',

			[

				'label' => __( 'Show Excerpt', 'ailab' ),

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

			'show_readmore',

			[

				'label' => __( 'Show Readmore', 'ailab' ),

				'type' => Controls_Manager::SWITCHER,

				'default' => 'yes',

				'label_off' => __( 'Off', 'ailab' ),

				'label_on' => __( 'On', 'ailab' ),

			]

		);
        	$this->add_control(

			'readmore',

			[

				'label' => __( 'Read More Text', 'ailab' ),

				'type' => Controls_Manager::TEXT,

				'default' => 'Learn More',
				'condition' 	=> [
					'show_readmore'	=> '',
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
					'post_type' => 'services',
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
					'post_type'   => 'services',
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
        // SLIDE
        $this->start_controls_section(
			'section_slider_options',
			[
				'label'     => __( 'Slider Options', 'ailab' ),
				'type'      => Controls_Manager::SECTION,
				'condition' => [
					'type' => ['slider'],
				],
			]
		);

		$this->add_control(
			'navigation',
			[
				'label'     => __( 'Navigation', 'ailab' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'both',
				'options'   => [
                    'both' => __( 'Arrows And Dots', 'ailab' ),
					'arrows' => __( 'Arrows', 'ailab' ),
                    'dots' => __( 'Dots', 'ailab' ),
					'none'   => __( 'None', 'ailab' ),
				],
			]
		);
		$this->add_control(
			'dots_type',
			[
				'label'     => __( 'Dots Types', 'ailab' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'number',
				'options'   => [
                    'number' => __( 'Number', 'ailab' ),
					'character' => __( 'Characters', 'ailab' ),
				],
				'condition' => [
					'navigation' => ['dots'],
					'navigation' => ['both'],
				],
			]
		);

		$this->add_responsive_control(
			'slides_to_show',
			[
				'label'          => __( 'posts to Show', 'ailab' ),
				'type'           => Controls_Manager::NUMBER,
				'default'        => 1,
				'tablet_default' => 1,
				'mobile_default' => 1,
			]
		);

		$this->add_responsive_control(
			'slides_to_scroll',
			[
				'label'          => __( 'posts to Scroll', 'ailab' ),
				'type'           => Controls_Manager::NUMBER,
				'default'        => 1,
				'tablet_default' => 1,
				'mobile_default' => 1,
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'        => __( 'Autoplay', 'ailab' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => '',
			]
		);
		$this->add_control(
			'centermode',
			[
				'label'        => __( 'Center Mode', 'ailab' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => '',
			]
		);
		$this->add_control(
			'autoplay_speed',
			[
				'label'     => __( 'Autoplay Speed', 'ailab' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 5000,
				'selectors' => [
					'{{WRAPPER}} .slick-slide-bg' => 'animation-duration: calc({{VALUE}}ms*1.2); transition-duration: calc({{VALUE}}ms)',
				],
				'condition' => [
					'autoplay'             => 'yes',
				],
			]
		);
		$this->add_control(
			'pause_on_hover',
			[
				'label'        => __( 'Pause on Hover', 'ailab' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => [
					'autoplay'             => 'yes',
				],
			]
		);

		$this->add_control(
			'infinite',
			[
				'label'        => __( 'Infinite Loop', 'ailab' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'transition_speed',
			[
				'label'     => __( 'Transition Speed (ms)', 'ailab' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 500,
			]
		);
		$this->end_controls_section();
		// Post 

		$this->start_controls_section(

			'section_service',

			[

				'label' => __( 'Service', 'ailab' ),

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

					'{{WRAPPER}} .elementor-service' => 'text-align: {{VALUE}};',

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

					'{{WRAPPER}} .elementor-service' => 'text-transform: {{VALUE}};',

				],

			]

		);

		$this->start_controls_tabs( 'tabs_service_style' );

		$this->start_controls_tab(

			'tab_service_normal',

			[

				'label' => __( 'Normal', 'ailab' ),

			]

		);



		$this->add_control(

			'text_color_service',

			[

				'label' => __( 'Text Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .elementor-service' => 'color: {{VALUE}};',

				],

			]

		);



		

		$this->add_control(

			'background_color_service',

			[

				'label' => __( 'Background Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .elementor-service' => 'background-color: {{VALUE}};',

				],

			]

		);



		$this->end_controls_tab();



		$this->start_controls_tab(

			'tab_service_hover',

			[

				'label' => __( 'Hover', 'ailab' ),

			]

		);



		$this->add_control(

			'hover_service_color',

			[

				'label' => __( 'Text Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'selectors' => [

					'{{WRAPPER}} .service-item:hover .elementor-service' => 'color: {{VALUE}};',

				],

			]

		);



		$this->add_control(

			'service_background_hover_color',

			[

				'label' => __( 'Background Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'selectors' => [

					'{{WRAPPER}} .service-item:hover .elementor-service' => 'background-color: {{VALUE}};',

				],

			]

		);



		$this->end_controls_tab();

		$this->end_controls_tabs();





		$this->add_responsive_control(

			'text_margin_service',

			[

				'label' => __( 'Text Margin', 'ailab' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .elementor-service' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

		);



		$this->add_responsive_control(

			'text_padding_service',

			[

				'label' => __( 'Text Padding', 'ailab' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .elementor-service' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

        );
        $this->add_responsive_control(

			'spacing_image_text_service',

			[

				'label' => __( 'Spacing between image/icon and text', 'ailab' ),

                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],



				'selectors' => [

					'{{WRAPPER}} .elementor-service .services-title-excerpt' => 'padding-top: {{SIZE}}{{UNIT}} ;',

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

				'selector' => '{{WRAPPER}} .post-title a',

			]

		);



		$this->add_control(

			'text_color-title',

			[

				'label' => __( 'Text Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .post-title a' => 'color: {{VALUE}};',

				],

			]

		);



		$this->add_responsive_control(

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



		$this->add_responsive_control(

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
        
        // category

        $this->start_controls_section(

			'section_category_style',

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

				'selector' => '{{WRAPPER}} .services-category a',

			]

		);



		$this->add_control(

			'text_color-category',

			[

				'label' => __( 'Text Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .services-category a' => 'color: {{VALUE}};',

				],

			]

		);

        $this->end_controls_section();
        
        //  number

        $this->start_controls_section(

			'section_number_style',

			[

				'label' => __( 'Number', 'ailab' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);



		$this->add_group_control(

			\Elementor\Group_Control_Typography::get_type(),

			[

				'name' => 'typography-number',

				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,

				'selector' => '{{WRAPPER}} .services-number',

			]

		);



		$this->add_control(

			'text_color-number',

			[

				'label' => __( 'Text Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .services-number' => 'color: {{VALUE}};',

				],

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



		$this->add_responsive_control(

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



		$this->add_responsive_control(

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
        // Read more



		$this->start_controls_section(

			'section_readmore_style',

			[

				'label' => __( 'Read more', 'ailab' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);



		$this->add_group_control(

			\Elementor\Group_Control_Typography::get_type(),

			[

				'name' => 'typography-readmore',

				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,

				'selector' => '{{WRAPPER}} .readmore a',

			]

		);



		$this->add_group_control(

			\Elementor\Group_Control_Text_Shadow::get_type(),

			[

				'name' => 'text_shadow_readmore',

				'selector' => '{{WRAPPER}} .readmore a',

			]

		);



		$this->add_control(

			'text_color_readmore',

			[

				'label' => __( 'Text Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .readmore a' => 'color: {{VALUE}};',

				],

			]

		);



		$this->add_responsive_control(

			'text_margin_readmore',

			[

				'label' => __( 'Text Margin', 'ailab' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .readmore' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

		);



		$this->add_responsive_control(

			'text_padding_readmore',

			[

				'label' => __( 'Text Padding', 'ailab' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .readmore' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

		);

		$this->end_controls_section();
        
        $this->start_controls_section(

			'section_icon_style',

			[

				'label' => __( 'Icon', 'ailab' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);

		$this->add_control(

			'icon_color',

			[

				'label' => __( 'Icon Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'default' => '#cc2b5e',

				'selectors' => [

					'{{WRAPPER}} .icon-service svg' => 'fill: {{VALUE}};',

				],

			]

		);
        
		$this->add_control(

			'icon_hover_color',

			[

				'label' => __( 'Icon Hover Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'default' => '#',

				'selectors' => [

					'{{WRAPPER}} .service-item:hover .elementor-service .icon-service svg' => 'fill: {{VALUE}};',

				],

			]

		);

         $this->add_responsive_control(
				'image_width',
				[
					'label' 		=> __( 'Logo Width', 'ailab' ),
					'type' 			=> Controls_Manager::SLIDER,
					'range' 		=> [
						'px' 		=> [
							'min' => 1,
							'max' => 300,
							'step' => 1,
						],
					],
					'selectors' 	=> [
						'{{WRAPPER}} .icon-service img' => 'height: {{SIZE}}px',
                        '{{WRAPPER}} .icon-service svg' => 'width: {{SIZE}}px;height:{{SIZE}}px;',
                        
					],
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
	   echo '<div class = "jws-services">';

		$settings = $this->get_settings_for_display();

		// WP_Query arguments


        	$query_args = [
					'post_type'              => array( 'services' ),

        			'post_status'            => array( 'publish' ),
        
        			'posts_per_page'		 => $settings['posts_per_page'],
        
        			'order'                  => $settings['order'],
        
        			'orderby'                => $settings['orderby'],
			];

        	if ( 'manual' === $settings['query_type'] ) {

				$manual_ids = $settings['query_manual_ids'];

				$query_args['post__in'] = $manual_ids;
			}

		// The Query
            $query_args = apply_filters( 'jws_services_query_args', $query_args, $settings );

			$services = new \WP_Query( $query_args );


        // grid
         
    	  $class_row = 'row'.' ';  
          $class_row .= $settings['type'].' ';
          $class_row .= $settings['layout'].' ';
          $class_column = 'service-item'.' ';
          
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
		// The Loop

		?>

		<div class="<?php echo esc_attr($class_row) ?>" <?php echo ''.$data_slick;?>>

        <?php
    
            $i = 1;

	

		if ( $services->have_posts() ) {

			while ( $services->have_posts() ) {

				$services->the_post();

				// include('html/content.php');
                ?>
				<div class="<?php echo esc_attr($class_column) ?> <?php if(($i == 2 && $settings['layout']=="layout-service1") ||($i == 2 && $settings['layout']=='layout-service3')) echo 'active';?>" >

                        
                        <div class="elementor-service">
                            <?php 
                                if ($settings['layout']=='layout-service2'){
                                    
                                    echo '<div class="services-title-excerpt">';
                                        echo      '<div class="title-and-icon">';
                                            $this->render_title();
                            		  	   $this->render_icon();
                                        echo "</div>";
                            			$this->render_excerpt();
                                        echo '<div class="btn-service">';
                                        $this->render_readmore();

                                        echo "</div>";
                            		echo "</div>";
                                   
                                } else {
                                    $this->render_post();
                                }
                                
                            
                            
                            ?>
                            

		  	           </div>
                    <?php $i++; ?>
                </div>

		<?php	}

		} else {

			// no posts found

		}

		?>	

		</div>
        
		<?php

		// Restore original Post Data

		wp_reset_postdata();
        echo '</div>';
	}

		protected function render_post() {
        $this->render_thumbnail();
        $this->render_icon();
		echo '<div class="services-title-excerpt">';
			$this->render_title();

			$this->render_excerpt();
            $this->render_readmore();
		echo "</div>";
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
		$settings = $this->get_settings();
        if ( ! $this->get_settings( 'show_image' ) ) {
			return;
        }
		?>
            <a href="<?php the_permalink()?>" class="img-services">
                <?php
                    if(has_post_thumbnail()) {
                           if (function_exists('jws_getImageBySize')) {
                         $attach_id = get_post_thumbnail_id();
                         
                         $img = jws_getImageBySize(array('attach_id' => $attach_id, 'thumb_size' => $settings['image_size'], 'class' => 'service-image'));
                         echo ''.$img['thumbnail'];
                
                         }else {
                         echo ''.$img = get_the_post_thumbnail(get_the_ID(), $settings['image_size']);
                    }
                    }else {
            
                        global $jws_option;
                        $attach_id = $jws_option['empty_image']['id'];
                        $img = jws_getImageBySize(array('attach_id' => $attach_id, 'thumb_size' => $settings['image_size'], 'class' => 'service-image'));
                        echo ''.$img['thumbnail'];
                    }?>
            </a>
        <?php
    }
    
    protected function render_image_bottom() {
        $settings = $this->get_settings();
        if ( ! $this->get_settings( 'show_image_bottom' ) ) {
			return;
        }
        ?>
            <div class="thumbnail-service"><img src="<?php echo esc_url($settings['image']['url']) ?>" alt="#"></div>
        <?php
	}
      protected function render_icon() {
        $settings = $this->get_settings();
         $service_icon_mt ='';
        if ( ! $this->get_settings( 'show_icon' ) ) {
			return;
        }
        ?>
         <div class="icon-service">        
            <?php                
            $service_icon_mt = wp_get_attachment_url( get_post_meta( get_the_ID(), 'service_icon_id', 1 ) );
            $url = get_attached_file(  get_post_meta( get_the_ID(), 'service_icon_id', 1 ) );
            $tmp = explode('.', $service_icon_mt);
            $file_ext = end($tmp);
            
            if($file_ext === 'svg'){
                 WP_Filesystem();
                    global $wp_filesystem;
                    echo output_ech($wp_filesystem->get_contents( $url ));
            }else {
                  $service_icon_mt = wp_get_attachment_image( get_post_meta( get_the_ID(), 'service_icon_id', 1 ), 'medium' );
            ?>
            <?php echo ''.$service_icon_mt; ?>
             <?php           
            }        
        ?>
           
    
                        
        </div>
        <?php
	}

	

	protected function render_title() {
		if ( ! $this->get_settings( 'show_title' ) ) {
			return;
		}
		?>
				<h4 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                <span class="border-bottom-servecis"></span>
			
		<?php

	}

	protected function render_excerpt() {
		$settings = $this->get_settings();
		if ( ! $this->get_settings( 'show_excerpt' ) ) {
			return;
		}
		?>
		<p class="post-decription"><?php echo wp_trim_words( get_the_excerpt(), $settings['number_words'] , '...' ) ?></p>
		<?php

	}
    protected function render_readmore() {
		$settings = $this->get_settings();
        if ( ! $this->get_settings( 'show_readmore' )&& $this->get_settings( 'readmore' )   ) {
			return;
        }
		?>
        <div class="readmore">
            <a href="<?php the_permalink() ?>">
                
                <span class="more_link_text"> <?php echo esc_html($this->get_settings('readmore')) ?> </span>
                <i aria-hidden="true" class="fas fa-chevron-circle-right"></i>  
            </a>
        </div>
        <?php
    }



	protected function _content_template() {

	}

}

