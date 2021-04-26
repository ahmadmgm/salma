<?php
namespace ElementorHelloWorld\Widgets\JwsCustom;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Login_form extends Widget_Base {

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
		return 'jws_login_form';
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
		return __( 'Jws Login Form', 'ailab' );
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
			'section_login_form_setting',
			[
				'label' => __( 'Toggle', 'ailab' ),
			]
		);
    
		$this->add_control(
            'show_login',
            [
                'label'         => esc_html__( 'Show Login', 'ailab' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Yes', 'ailab' ),
                'label_off'     => esc_html__( 'No', 'ailab' ),
                'default'   => 'yes',
            ]
        );
        $this->add_control(
            'show_register',
            [
                'label'         => esc_html__( 'Show Register', 'ailab' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Yes', 'ailab' ),
                'label_off'     => esc_html__( 'No', 'ailab' ),
                'default'   => 'yes',
            ]
        );

		$this->end_controls_section();
  
		$this->start_controls_section(
			'style',
			[
				'label' => __( 'Style', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
				'align',
				[
					'label' 		=> __( 'Align', 'ailab' ),
					'type' 			=> Controls_Manager::CHOOSE,
					'default' 		=> 'left',
					'options' 		=> [
						'left'    		=> [
							'title' 	=> __( 'Left', 'ailab' ),
							'icon' 		=> 'eicon-h-align-left',
						],
						'center' 		=> [
							'title' 	=> __( 'Center', 'ailab' ),
							'icon' 		=> 'eicon-h-align-center',
						],
						'right' 		=> [
							'title' 	=> __( 'Right', 'ailab' ),
							'icon' 		=> 'eicon-h-align-right',
						],
					],
                    'selectors' => [
							'{{WRAPPER}} #jws-popup-login' => 'text-align: {{VALUE}};',
					],
					'frontend_available' => true,
				]
		);
         $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __( 'Background', 'ailab' ),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}}  .jws-login-container .jws-animation',
			]
		);
        $this->add_responsive_control(
				'form_width',
				[
					'label' 		=> __( 'Max. Width', 'ailab' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%' ],
					'range' 		=> [
						'%' 		=> [
							'min' => 0,
							'max' => 100,
						],
						'px' 		=> [
							'min' => 100,
							'max' => 1000,
						],
					],
					'selectors' 	=> [
						'
						 {{WRAPPER}} #jws-popup-login' => 'max-width: {{SIZE}}{{UNIT}}',
					],
				]
			);
        $this->add_control(
					'form_padding',
					[
						'type' 			=> Controls_Manager::DIMENSIONS,
						'label' 		=> __( 'Padding', 'ailab' ),
						'size_units' 	=> [ 'px', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .jws-login-container .jws-animation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
		);
         $this->add_control(
					'form_color',
					[
						'label' 	=> __( 'Form Color', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
								'{{WRAPPER}} #jws-popup-login .jws-animation'  => 'color: {{VALUE}};',
						],
					]
		);
        $this->add_control(
					'form_color_link',
					[
						'label' 	=> __( 'Form Color Link', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
								'{{WRAPPER}} #jws-popup-login .jws-animation a'  => 'color: {{VALUE}};',
                                '{{WRAPPER}} #jws-popup-login .jws-animation form input.invalid'  => 'border-color: {{VALUE}} !important;',
                                '{{WRAPPER}} #jws-popup-login .jws-login-container.loading .jws-animation:before'  => 'background-color: {{VALUE}} !important;',
                                
						],
					]
		);
        $this->add_control(
					'form_color_login_error',
					[
						'label' 	=> __( 'Form Color error', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
								'{{WRAPPER}} #jws-popup-login .message.message-error'  => 'color: {{VALUE}};',
                                
						],
					]
		);
        $this->add_control(
					'form_color_login_ok',
					[
						'label' 	=> __( 'Form Color success', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
								'{{WRAPPER}} #jws-popup-login .message.message-success'  => 'color: {{VALUE}};',
                                
						],
					]
		);
        $this->end_controls_section();
        $this->start_controls_section(
			'heading-style',
			[
				'label' => __( 'Heading', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'popup_caption_typography',
					'label' 	=> __( 'Typography', 'ailab' ),
					'selector' 	=> '{{WRAPPER}} #jws-popup-login .jws-animation .title',
				]
		);
        $this->end_controls_section();
        $this->start_controls_section(
			'input-style',
			[
				'label' => __( 'Input', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background_input',
				'label' => __( 'Background', 'ailab' ),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}}  .jws-login-container .jws-animation form input:not(.button)',
			]
		);

        
        $this->add_control(
					'inputpadding',
					[
						'type' 			=> Controls_Manager::DIMENSIONS,
						'label' 		=> __( 'Padding', 'ailab' ),
						'size_units' 	=> [ 'px', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}}  .jws-login-container .jws-animation form input:not(.button)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
		);
         $this->add_control(
					'input_color',
					[
						'label' 	=> __( 'Color', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
								'{{WRAPPER}} #jws-popup-login .jws-animation form input:not(.button)'  => 'color: {{VALUE}};',
                                '{{WRAPPER}} #jws-popup-login .jws-animation form input:not(.button)::-webkit-input-placeholder'  => 'color: {{VALUE}};',
                                '{{WRAPPER}} #jws-popup-login .jws-animation form input:not(.button)::-moz-placeholder'  => 'color: {{VALUE}};',
                                '{{WRAPPER}} #jws-popup-login .jws-animation form input:not(.button):-ms-input-placeholder'  => 'color: {{VALUE}};',
                                '{{WRAPPER}} #jws-popup-login .jws-animation form input:not(.button):-moz-placeholder'  => 'color: {{VALUE}};',
						],
					]
		);
        $this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' 		=> 'input_border',
					'label' 	=> __( 'Input Border', 'ailab' ),
					'selector' 	=> '{{WRAPPER}} #jws-popup-login .jws-animation form input:not(.button)',
				]
		);
        $this->end_controls_section();
        $this->start_controls_section(
			'submit-style',
			[
				'label' => __( 'Submit Input', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background_submit',
				'label' => __( 'Background', 'ailab' ),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}}  .jws-login-container .jws-animation form input.button',
			]
		);

        
        $this->add_control(
					'submitpadding',
					[
						'type' 			=> Controls_Manager::DIMENSIONS,
						'label' 		=> __( 'Padding', 'ailab' ),
						'size_units' 	=> [ 'px', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}}  .jws-login-container .jws-animation form input.button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
		);
         $this->add_control(
					'submit_color',
					[
						'label' 	=> __( 'Color', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
								'{{WRAPPER}} #jws-popup-login .jws-animation form input.button'  => 'color: {{VALUE}};',
                                '{{WRAPPER}} #jws-popup-login .jws-animation form input.button::-webkit-input-placeholder'  => 'color: {{VALUE}};',
                                '{{WRAPPER}} #jws-popup-login .jws-animation form input.button::-moz-placeholder'  => 'color: {{VALUE}};',
                                '{{WRAPPER}} #jws-popup-login .jws-animation form input.button:-ms-input-placeholder'  => 'color: {{VALUE}};',
                                '{{WRAPPER}} #jws-popup-login .jws-animation form input.button:-moz-placeholder'  => 'color: {{VALUE}};',
						],
					]
		);
        $this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' 		=> 'submit_border',
					'label' 	=> __( 'Input Border', 'ailab' ),
					'selector' 	=> '{{WRAPPER}} #jws-popup-login .jws-animation form .button',
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
        $show_register = $settings['show_register'];
        $show_login = $settings['show_login'];    
        include( 'content.php' );

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
	protected function _content_template() {}
}