<?php
namespace ElementorHelloWorld\Widgets\JwsCustom;

use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Repeater;
use Elementor\Group_Control_Border;

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class JWS_Progress extends Widget_Base {

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
		return 'jws_progress';
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
		return __( 'JWS Progress', 'ailab' );
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
		return [ 'autocomplete' ];
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
			'content_section',
			[
				'label' => __( 'Content', 'ailab' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'progress_title', [
				'label' => __( 'Title', 'ailab' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'ailab' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'progress_content', [
				'label' => __( 'Content', 'ailab' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'List Content' , 'ailab' ),
				'show_label' => false,
			]
		);
        $repeater->add_control(
			'progress_percent',
			[
				'label' => __( 'Width', 'ailab' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .box' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$repeater->add_control(
			'progress_color',
			[
				'label' => __( 'Color', 'ailab' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'list_progress',
			[
				'label' => __( 'Repeater List', 'ailab' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'progress_title' => __( 'Achieved', 'ailab' ),
                        'progress_percent' => __( '78', 'ailab' ),
						'progress_content' => __( 'Item content. Click the edit button to change this text.', 'ailab' ),
					],
					[
						'progress_title' => __( 'Happy Clients', 'ailab' ),
                         'progress_percent' => __( '78', 'ailab' ),
						'progress_content' => __( 'Item content. Click the edit button to change this text.', 'ailab' ),
					],
                    [
						'progress_title' => __( 'Done', 'ailab' ),
                         'progress_percent' => __( '95', 'ailab' ),
						'progress_content' => __( 'Item content. Click the edit button to change this text.', 'ailab' ),
					],
				],
				'title_field' => '{{{ progress_title }}}',
			]
		);
         $this->add_responsive_control(
			'circle_radius',
			[
				'label' => __( 'Circle Radius', 'ailab' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 20,
				'max' => 500,
				'step' => 1,
				'default' => 142,
			]
		);
        $this->add_responsive_control(
			'self_align',
			[
				'label' => __( 'Alignment', 'ailab' ),
				'type' => Controls_Manager::CHOOSE,
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
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .jws-progress' => 'text-align: {{VALUE}};',
				],
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
				'name' => 'typography_title',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .jws-progress #procent',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow-title',
				'selector' => '{{WRAPPER}} .jws-progress #procent',
			]
		);

		$this->add_control(
			'text_color_title',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .jws-progress #procent' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .jws-progress #procent' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .jws-progress #procent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();
        
        // Percent

		$this->start_controls_section(
			'section_percent_style',
			[
				'label' => __( 'Percent', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography_percent',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .jws-progress #procent p',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow_percent',
				'selector' => '{{WRAPPER}} .jws-progress #procent p',
			]
		);

		$this->add_control(
			'text_color_percent',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .jws-progress #procent p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_margin_percent',
			[
				'label' => __( 'Text Margin', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .jws-progress #procent p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_percent',
			[
				'label' => __( 'Text Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .jws-progress #procent p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();
        
        // circle

		$this->start_controls_section(
			'section_circle_style',
			[
				'label' => __( 'Circle', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color_circle_first',
			[
				'label' => __( 'First Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#36d1dc',
			]
		);
        $this->add_control(
			'color_circle_second',
			[
				'label' => __( 'Second Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#5b86e5',
			]
		);
        $this->add_control(
        			'color_circle_third',
        			[
        				'label' => __( 'Third Color', 'ailab' ),
        				'type' => Controls_Manager::COLOR,
        				'default' => '#f1f4fa',
        			]
        		);
       
		$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( $settings['list_progress'] ) {
			echo '<div class="jws-progress">';
			foreach (  $settings['list_progress'] as $item ) {

                ?>
               <div class="progress-item">
            
                  <canvas id="canvas" width="<?php echo esc_attr($settings['circle_radius']) ?>" width-mobile="<?php echo esc_attr($settings['circle_radius_mobile']) ?>" width-tablet="<?php echo esc_attr($settings['circle_radius_tablet']) ?>" height="<?php echo esc_attr($settings['circle_radius']) ?>" data-color1="<?php echo esc_attr($settings['color_circle_first']) ?>" data-color2="<?php echo esc_attr($settings['color_circle_second']) ?>" data-color3="<?php echo esc_attr($settings['color_circle_third']) ?>" data-percent=<?php echo esc_attr($item['progress_percent']['size']) ?> data-title=<?php echo esc_attr($item['progress_title']) ?>></canvas>
                    
                  <span id="procent">
                    
                  </span>
                </div>
                <?php
			}
			echo '</div>';
		}
	}

	protected function _content_template() {
	}
}