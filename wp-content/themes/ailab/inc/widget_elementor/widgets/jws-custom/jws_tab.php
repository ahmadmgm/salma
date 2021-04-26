<?php
namespace ElementorHelloWorld\Widgets\JwsCustom;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Box_Shadow;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Jws_tab extends Widget_Base {

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
		return 'jws_tab';
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
		return __( 'Jws Tab', 'ailab' );
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
			'setting_section',
			[
				'label' => __( 'Setting', 'ailab' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);   
        
        
	    $this->add_control(
			'nav_tab_layout',
			[
				'label' => __( 'Layout', 'ailab' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'layout1',
				'options' => [
					'layout1'  => __( 'Layout 1', 'ailab' ),
                    'layout2'  => __( 'Layout 2', 'ailab' ),
                    'layout3'  => __( 'Layout 3', 'ailab' ),
                    'layout4'  => __( 'Layout 4', 'ailab' ),
				],
			]
		);
        
        $this->end_controls_section();
        $this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Menu List', 'ailab' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'content_layout',
			[
				'label' => __( 'Content', 'ailab' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'template',
				'options' => [
					'template'  => __( 'Template', 'ailab' ),
                    'text'  => __( 'Text', 'ailab' ),
				],
			]
		);
         $repeater->add_control(
			'content_text',
			[
				'label' => __( 'Content', 'ailab' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Default description', 'ailab' ),
				'placeholder' => __( 'Type your description here', 'ailab' ),
                'condition' => ['content_layout' => 'text']
			]
		);
		$repeater->add_control(
				'select_template',
				[
					'label'     => __( 'Select Template', 'ailab' ),
					'type'      => Controls_Manager::SELECT,
					'multiple'  => true,
					'default'   => '',
					'options'   => $this->get_saved_data( 'section' ),
                    'condition' => ['content_layout' => 'template']
				]
		);
       
		$repeater->add_control(
			'list_title', [
				'label' => __( 'Name', 'ailab' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Name' , 'ailab' ),
				'label_block' => true,
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
						'list_title' => __( 'Nav #1', 'ailab' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();
        $this->start_controls_section(
			'nav_style',
			[
				'label' => __( 'Nav', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_responsive_control(
			'absolute',
			[
				'label' => __( 'Tab Position Absolute', 'ailab' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'ailab' ),
				'label_off' => __( 'Off', 'ailab' ),
				'return_value' => 'yes',
			]
		);
        $this->add_responsive_control(
				'vertical',
				[
					'label' 		=> __( 'Vertical Orientation', 'ailab' ),
					'type' 			=> Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
					'range' => [
        					'px' => [
        						'min' => 0,
        						'max' => 1000,
        						'step' => 1,
        					],
        					'%' => [
        						'min' => 0,
        						'max' => 100,
        					],
        				],
					'selectors' 	=> [
						'{{WRAPPER}}  .jws_tab_wrap .tab_nav_container.tab_absolute' => 'top: {{SIZE}}{{UNIT}};',
					],
                    'condition'	=> [
						'absolute' => 'yes',
				    ],
				]
		);
        $this->add_responsive_control(
				'horizontal',
				[
					'label' 		=> __( 'Horizontal Orientation', 'ailab' ),
					'type' 			=> Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
					'range' => [
        					'px' => [
        						'min' => -1000,
        						'max' => 1000,
        						'step' => 1,
        					],
        					'%' => [
        						'min' => -100,
        						'max' => 100,
        					],
        				],
					'selectors' 	=> [
						'{{WRAPPER}}  .jws_tab_wrap .tab_nav_container.tab_absolute' => 'left: {{SIZE}}{{UNIT}};',
					],
                    'condition'	=> [
						'absolute' => 'yes',
				    ],
				]
		);
        $this->add_control(
			'nav__position',
			[
				'label' => __( 'Position', 'ailab' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'flex-start' => [
						'title' => __( 'Left', 'ailab' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ailab' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => __( 'Right', 'ailab' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .jws_tab_wrap .tab_nav_container' => 'justify-content: {{VALUE}};',
				],
			]
		);
         $this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' 		=> 'nav_border',
					'label' 	=> __( 'Border', 'ailab' ),
					'selector' 	=> '{{WRAPPER}} .jws_tab_wrap .tab_nav_container .tab_nav_wrap',
				]
		);
        $this->add_responsive_control(
					'nav_padding',
					[
						'type' 			=> Controls_Manager::DIMENSIONS,
						'label' 		=> __( 'Padding', 'ailab' ),
						'size_units' 	=> [ 'px', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .jws_tab_wrap .tab_nav_wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
		);
        $this->add_responsive_control(
					'nav_margin',
					[
						'type' 			=> Controls_Manager::DIMENSIONS,
						'label' 		=> __( 'Margin', 'ailab' ),
						'size_units' 	=> [ 'px', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .tab_nav_container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
		);
        $this->add_responsive_control(
					'nav_radius',
					[
						'type' 			=> Controls_Manager::DIMENSIONS,
						'label' 		=> __( 'Border Radius', 'ailab' ),
						'size_units' 	=> [ 'px', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .jws_tab_wrap .tab_nav_wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
		);
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Box Shadow', 'ailab' ),
				'selector' => '{{WRAPPER}} .jws_tab_wrap .tab_nav_wrap',
			]
		);
        $this->add_control(
			'nav_bg',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws_tab_wrap .tab_nav_wrap' => 'background-color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'nav_item_style',
			[
				'label' => __( 'Item', 'ailab' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_responsive_control(
					'nav_item_margin',
					[
						'type' 			=> Controls_Manager::DIMENSIONS,
						'label' 		=> __( 'Margin', 'ailab' ),
						'size_units' 	=> [ 'px', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .jws_tab_wrap .tab_nav li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
		);
        $this->add_responsive_control(
					'nav_item_padding',
					[
						'type' 			=> Controls_Manager::DIMENSIONS,
						'label' 		=> __( 'Padding', 'ailab' ),
						'size_units' 	=> [ 'px', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .jws_tab_wrap .tab_nav li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
		);
        $this->add_control(
			'nav_item_color',
			[
				'label' => __( 'Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws_tab_wrap .tab_nav li a' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'nav_item_color_active',
			[
				'label' => __( 'Color Active', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws_tab_wrap .tab_nav li.current a' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'nav_item_bgcolor_active',
			[
				'label' => __( 'Background Magic Animation', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws_tab_wrap .tab_nav #magic_line' => 'background: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tab_typography',
				'label' => __( 'Typography', 'ailab'),
				'selector' => '{{WRAPPER}} .jws_tab_wrap .tab_nav li a',
			]
		);
        $this->add_control(
			'nav_line_style',
			[
				'label' => __( 'Line', 'ailab' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
                'condition' => ['nav_tab_layout' => 'layout2']
			]
		);
        $this->add_control(
			'nav_line_color',
			[
				'label' => __( 'Line Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws_tab_wrap .tab_nav #magic_line' => 'background: {{VALUE}}',
				],
                'condition' => ['nav_tab_layout' => 'layout2']
			]
		);
        $this->add_control(
			'line_height',
			[
				'label' => __( 'Height', 'ailab' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .jws_tab_wrap .layout_layout2 .tab_nav_wrap .tab_nav #magic_line' => 'height: {{SIZE}}px !important;',
				],
                'condition' => ['nav_tab_layout' => 'layout2']
			]
		);
		$this->end_controls_section();
	}
	/**
	 *  Get Saved Widgets
	 *
	 *  @param string $type Type.
	 *  @since 0.0.1
	 *  @return string
	 */
	public function get_saved_data( $type = 'page' ) {

		$saved_widgets = $this->get_post_template( $type );
		$options[-1]   = __( 'Select', 'ailab' );
		if ( count( $saved_widgets ) ) {
			foreach ( $saved_widgets as $saved_row ) {
				$options[ $saved_row['id'] ] = $saved_row['name'];
			}
		} else {
			$options['no_template'] = __( 'It seems that, you have not saved any template yet.', 'ailab' );
		}
		return $options;
	}

	/**
	 *  Get Templates based on category
	 *
	 *  @param string $type Type.
	 *  @since 0.0.1
	 *  @return string
	 */
	public function get_post_template( $type = 'page' ) {
		$posts = get_posts(
			array(
				'post_type'      => 'elementor_library',
				'orderby'        => 'title',
				'order'          => 'ASC',
				'posts_per_page' => '-1',
				'tax_query'      => array(
					array(
						'taxonomy' => 'elementor_library_type',
						'field'    => 'slug',
						'terms'    => $type,
					),
				),
			)
		);

		$templates = array();

		foreach ( $posts as $post ) {

			$templates[] = array(
				'id'   => $post->ID,
				'name' => $post->post_title,
			);
		}

		return $templates;
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

		if ( $settings['list'] ) {
		     ?>
		      	<div class="jws_tab_wrap <?php echo 'layout_'.esc_attr($settings['nav_tab_layout']); ?>">
                  <div class="tab_nav_container<?php if($settings['absolute'] == 'yes') echo esc_attr(' tab_absolute'); ?> "> 
                      <div class="tab_nav_wrap">  
                          <ul class="tab_nav">
                                <?php $nav = 1; foreach (  $settings['list'] as $item ) {  ?>
                    				<li class="jws_nav_item<?php if($nav == 1) echo " current"; ?>">
                                        <a href="#" data-tab="<?php echo esc_attr($item['_id']); ?>">
                                            <?php echo esc_html($item['list_title']); ?>
                                        </a>  
                                    </li>
                    		  <?php $nav++; } ?>
                          </ul>  
                      </div>
                  </div> 
                  <div class="tab_content">  
            		  <?php $content = 1; foreach (  $settings['list'] as $item ) { ?>
            				<div id="<?php echo esc_attr($item['_id']); ?>" class="jws_tab_item<?php if($content == 1) echo " current"; ?>">
                                    <?php 
                                    if($item['content_layout'] == 'template') {
                                      echo do_shortcode('[elementor-template id="'.$item['select_template'].'"]');  
                                    }else {
                                      echo '<div class="content_text">' . $item['content_text'] . '</div>';  
                                    }
                                    ?>   
                            </div>
            		  <?php $content++; } ?>
                  </div>
                </div>
		    <?php }  
		
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