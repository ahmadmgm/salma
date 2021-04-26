<?php
namespace ElementorHelloWorld\Widgets\JwsCustom;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Video_popup extends Widget_Base {

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
		return 'jws_video_popup';
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
		return __( 'Jws Video Popup', 'ailab' );
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
			'section_video_popup_setting',
			[
				'label' => __( 'Setting', 'ailab' ),
			]
		);
    
        $this->add_control(
				'icon',
				[
					'label' => __( 'Icon', 'ailab' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fab fa-wordpress',
                		'library' => 'fa-brands',
					],
				]
		);
		
        $this->add_control(
			'url',
			[
				'label' => __( 'URl Video', 'ailab' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => __( 'https://www.youtube.com/watch?v=JtVd7q25FDA', 'ailab' ),
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
							'{{WRAPPER}} .jws_video_popup' => 'text-align: {{VALUE}};',
					],
					'frontend_available' => true,
				]
		);
        $this->add_responsive_control(
			'icon_gradient',
			[
				'label' => __( 'Icon gradient Color', 'ailab' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'ailab' ),
				'label_off' => __( 'Off', 'ailab' ),
				'return_value' => 'yes',
			]
        );
        $this->add_responsive_control(
			'background_gradient',
			[
				'label' => __( 'Background gradient Color', 'ailab' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'ailab' ),
				'label_off' => __( 'Off', 'ailab' ),
				'return_value' => 'no',
			]
		);
		$this->end_controls_section();
        $this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Toggle Style', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
         $this->add_control(
					'icon_color',
					[
						'label' 	=> __( 'Icon Color', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '#ffffff',
						'selectors' => [
							'{{WRAPPER}} .jws_video_popup .jws_video_popup_inner a' => 'color: {{VALUE}};',
						],
					]
		);
        $this->add_control(
					'icon_color_hover',
					[
						'label' 	=> __( 'Icon Color Hover', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '#ed2121',
						'selectors' => [
							'{{WRAPPER}} .jws_video_popup .jws_video_popup_inner a:hover' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} .jws_video_popup .jws_video_popup_inner a span' => 'font-size: {{SIZE}}px;',
					],
				]
		);
        $this->add_control(
				'icon_width_height',
				[
					'label' 		=> __( 'Icon Width Height', 'ailab' ),
					'type' 			=> Controls_Manager::SLIDER,
					'range' 		=> [
						'px' 		=> [
							'min' => 60,
							'max' => 200,
							'step' => 1,
						],
					],
					'selectors' 	=> [
						'{{WRAPPER}} .jws_video_popup .jws_video_popup_inner a span' => 'height: {{SIZE}}px;line-height: {{SIZE}}px;width: {{SIZE}}px;',
                        '{{WRAPPER}} .jws_video_popup .jws_video_popup_inner a:before' => 'height: calc({{SIZE}}px + 15px); width: calc({{SIZE}}px + 15px);',
                        '{{WRAPPER}} .jws_video_popup .jws_video_popup_inner a:after' => 'height: calc({{SIZE}}px + 7.5px); width: calc({{SIZE}}px + 7.5px);',
					],
				]
		);
        $this->add_control(
					'icon_bgcolor',
					[
						'label' 	=> __( 'Icon Background Color', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '#ed2121',
						'selectors' => [
							'{{WRAPPER}} .jws_video_popup .jws_video_popup_inner a span' => 'background: {{VALUE}};',
						],
					]
		);
         $this->add_control(
					'icon_bgcolor_hover',
					[
						'label' 	=> __( 'Icon Background Color Hover', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '#ffffff',
						'selectors' => [
							'{{WRAPPER}} .jws_video_popup .jws_video_popup_inner a:hover span' => 'background: {{VALUE}};',
						],
					]
		);
        $this->add_control(
					'icon_bgcolor2',
					[
						'label' 	=> __( 'Icon Background Overlay Color', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
							'{{WRAPPER}} .jws_video_popup .jws_video_popup_inner a:before , {{WRAPPER}} .jws_video_popup .jws_video_popup_inner a:after' => 'background: {{VALUE}};',
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
		$settings = $this->get_settings();

        $url = $settings['url'];
       echo ''.$settings['background_gradient'];
     
        ?>
         <div class="jws_video_popup">
            <div class="jws_video_popup_inner">
                  <a href="<?php echo esc_url($url); ?>">
                       <span class="video_icon <?php if($settings['icon_gradient']=='yes') echo 'gradient_color' ?> <?php if($settings['background_gradient']=='yes') echo 'gradient_background_color' ?>">
                            <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );  ?>
                       </span>
                  </a>
            </div>            
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
	protected function _content_template() {}
}