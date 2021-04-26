<?php

namespace Elementor;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;
use Elementor\Group_Control_Border;
use Elementor\Controls_Manager;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Timeline extends Widget_Base {

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
		return 'jws_timeline';
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
		return __( 'Jws Timeline', 'ailab' );
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
		return 'eicon-site-search';
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
		return [ 'appear' ];
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
		return [ 'jws-elements' ];
	}
    
	/**
	 * Register Woo post Grid controls.
	 *
	 * @since 0.0.1
	 * @access protected
	 */
	protected function _register_controls() {

        $this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Menu List', 'ailab' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
				'slider_layouts',
				[
					'label'     => __( 'Layout', 'ailab' ),
					'type'      => Controls_Manager::SELECT,
					'default'   => 'layout1',
					'options'   => [
						'layout1'   => __( 'layout 1', 'ailab' ),
						'layout2'   => __( 'layout 2', 'ailab' ),
					],
				]
		);
		$repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'active',
			[
				'label' => __( 'Active', 'ailab' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'ailab' ),
				'label_off' => __( 'Off', 'ailab' ),
				'return_value' => 'yes',
			]
		);
		$repeater->add_control(
			'list_month', [
				'label' => __( 'Month', 'ailab' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'July' , 'ailab' ),
				'label_block' => true,
			]
		);
        $repeater->add_control(
			'list_year', [
				'label' => __( 'Year', 'ailab' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '1994' , 'ailab' ),
				'label_block' => true,
			]
		);
        $repeater->add_control(
			'list_title', [
				'label' => __( 'Title', 'ailab' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Title' , 'ailab' ),
				'label_block' => true,
			]
		);
        $repeater->add_control(
			'list_content', [
				'label' => __( 'Content', 'ailab' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Content', 'ailab' ),
				'placeholder' => __( 'Type your content here', 'ailab' ),
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Menu List', 'ailab' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Title #1', 'ailab' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();
        
        $this->start_controls_section(
			'testimonials_slider_style',
			[
				'label' => __( 'Content', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_responsive_control(
					'testimonials_slider_margin',
					[
						'type' 			=> Controls_Manager::DIMENSIONS,
						'label' 		=> __( 'Margin', 'ailab' ),
						'size_units' 	=> [ 'px', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .testimonials_slider .slider_content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
		);
        $this->add_control(
			'testimonials_slider_des',
			[
				'label' => __( 'Description', 'ailab' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
					'testimonials_slider_description_color',
					[
						'label' 	=> __( 'Description Color', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '#333333',
						'selectors' => [
							'{{WRAPPER}} .jws_testimonials_slider_wrap .testimonials_slider .testimonials_description' => 'color: {{VALUE}};',
						],
					]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'testimonials_slider_description_typography',
				'label' => __( 'Typography', 'ailab'),
				'selector' => '{{WRAPPER}} .jws_testimonials_slider_wrap .testimonials_slider .testimonials_description',
			]
		);
        $this->add_control(
			'testimonials_slider_name',
			[
				'label' => __( 'Name', 'ailab' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
					'testimonials_slider_name_color',
					[
						'label' 	=> __( 'Name Color', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '#333333',
						'selectors' => [
							'{{WRAPPER}} .jws_testimonials_slider_wrap .testimonials_slider .testimonials_title' => 'color: {{VALUE}};',
						],
					]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'testimonials_slider_name_typography',
				'label' => __( 'Typography', 'ailab'),
				'selector' => '{{WRAPPER}} .jws_testimonials_slider_wrap .testimonials_slider .testimonials_title',
			]
		);
        $this->add_control(
			'testimonials_slider_job',
			[
				'label' => __( 'job', 'ailab' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
					'testimonials_slider_job_color',
					[
						'label' 	=> __( 'job Color', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '#333333',
						'selectors' => [
							'{{WRAPPER}} .jws_testimonials_slider_wrap .testimonials_slider .testimonials_job' => 'color: {{VALUE}};',
						],
					]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'testimonials_slider_job_typography',
				'label' => __( 'Typography', 'ailab'),
				'selector' => '{{WRAPPER}} .jws_testimonials_slider_wrap .testimonials_slider .testimonials_job',
			]
		);
         $this->add_control(
			'testimonials_slider_icon',
			[
				'label' => __( 'Icon', 'ailab' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
					'icon_color',
					[
						'label' 	=> __( 'Icon Color', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
							'{{WRAPPER}} .testimonials_slider .testimonials_icon' => 'color: {{VALUE}};',
						],
					]
		);
        $this->add_control(
				'icon_size',
				[
					'label' 		=> __( 'Icon Size', 'ailab' ),
					'type' 			=> Controls_Manager::SLIDER,
					'range' 		=> [
						'px' 		=> [
							'min' => 1,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' 	=> [
						'{{WRAPPER}} .testimonials_slider .testimonials_icon' => 'font-size: {{SIZE}}px;',
					],
				]
		);
        $this->add_control(
			'testimonials_slider_avatar',
			[
				'label' => __( 'Avatar', 'ailab' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_responsive_control(
					'testimonials_slider_avatar_box_radius',
					[
						'label' 		=> __( 'Border Radius', 'ailab' ),
						'type' 			=> Controls_Manager::DIMENSIONS,
						'size_units' 	=> [ 'px', 'em', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .jws_testimonials_slider_wrap .testimonials_slider img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],

						'separator' => 'before',
					]
		);
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'testimonials_slider_avatar_box_shadow',
				'label' => __( 'Box Shadow', 'ailab' ),
				'selector' => '{{WRAPPER}} .jws_testimonials_slider_wrap .testimonials_slider img',
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

		$settings = $this->get_settings();
    ?>
        <div class="jws_timeline">
            <div class="jws_timeline_main">
                <div class="jws_days">
                    <?php $i = 1; foreach (  $settings['list'] as $item ) { $position = ($i%2 != 0) ? ' position_right' : ' position_left';
                        $active = ($item['active']) ? ' active' : '';
                     ?>
            				<div class="jws_timeline_field<?php echo esc_attr($position.$active); ?>">
                                 <div class="jws_timeline_circle"></div> 
                                 <div class="jws_timeline_content">
                                    <div class="jws_timeline_content_inner">
                                        <div class="jws_timeline_date_inner">
                                            <span class="jws_timeline_month">
                                                <?php echo esc_html($item['list_month']); ?>
                                            </span>  
                                            <h3 class="jws_timeline_year">
                                                <?php echo esc_html($item['list_year']); ?>
                                            </h3>
                                        </div>
                                        <h3 class="jws_timeline_title">
                                            <?php echo esc_html($item['list_title']); ?>
                                        </h3>
                                        <div class="jws_timeline_desc">
                                            <?php echo ''.$item['list_content']; ?>
                                        </div>
                                        <span class="jws_content_line"></span>
                                    </div>
                                 </div>
                                 <div class="jws_timeline_date">
                                    <div class="jws_timeline_date_inner">
                                        <span class="jws_timeline_month">
                                            <?php echo esc_html($item['list_month']); ?>
                                        </span>  
                                        <h3 class="jws_timeline_year">
                                            <?php echo esc_html($item['list_year']); ?>
                                        </h3>
                                    </div>   
                                 </div>  
                            </div>
            		 <?php $i++; } ?>
                </div>
                <div class="jws_timeline_line"></div>
            </div>
        </div>    
	<?php }
    
	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {}
}