<?php
namespace ElementorHelloWorld\Widgets\JwsCustom;

use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class JWS_Search extends Widget_Base {

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
		return 'jws_search';
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
		return __( 'JWS Search', 'ailab' );
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
			'section_search_ajax_setting',
			[
				'label' => __( 'Search Form', 'ailab' ),
			]
		);
        $this->add_control(
			'skins',
			[
				'label' => __( 'skin', 'ailab' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'classic' => __( 'Classic', 'ailab' ),
                    'expand' => __( 'Expand', 'ailab' ),
				],
				'default' => 'expand',
			]
		);
		$this->add_control(
			'search_by',
			[
				'label' => __( 'Search By', 'ailab' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
                    'product' => __( 'Products', 'ailab' ),
					'blog' => __( 'Blogs', 'ailab' ),
					'all' => __( 'Alls', 'ailab' ),
				],
				'default' => 'recipe',
			]
		);
        $this->add_control(
			'text_before_toggle',
			[
				'label' => __( 'Text Toggle', 'ailab' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( "Search", 'ailab' ),
                'condition' => [
						  'skins' => 'expand',
				],
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
            'icon_toggle',
            [
                'label' => __( 'Icon Toggle', 'ailab' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-wordpress',
                    'library' => 'fa-brands',
                ],
                'condition' => [
                   'skins' => 'expand',
                ],
            ]
         );
         $this->add_control(
            'icon_close',
            [
                'label' => __( 'Icon Close', 'ailab' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'eci  linearicons-free-cross',
                    'library' => 'eci',
                ],
                'condition' => [
                   'skins' => 'expand',
                ],
            ]
         );
        $this->add_control(
            'show_cat',
            [
                'label'         => esc_html__( 'Show Category', 'ailab' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Yes', 'ailab' ),
                'label_off'     => esc_html__( 'No', 'ailab' ),
                'default'   => 'yes',
            ]
        );
        $this->add_control(
			'text_cat_all',
			[
				'label' => __( 'Text Category All', 'ailab' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( "ALL", 'ailab' ),
			]
		);
        $this->add_control(
			'text_placeholder',
			[
				'label' => __( 'Text Default Input', 'ailab' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( "I'm shopping for....", 'ailab' ),
			]
		);
		$this->end_controls_section();
        $this->start_controls_section(
			'section_content_search',
			[
				'label' => __( 'Content Search', 'ailab' ),
			]
		);
        $this->add_responsive_control(
			'columns',
			[
				'label' => __( 'Columns', 'ailab' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => __( '1 Columns', 'ailab' ),
					'2'  => __( '2 Columns', 'ailab' ),
					'3'  => __( '3 Columns', 'ailab' ),
					'4'  => __( '4 Columns', 'ailab' ),
				],
			]
		);
        $this->add_control(
            'show_image',
            [
                'label'         => esc_html__( 'Show Image', 'ailab' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Yes', 'ailab' ),
                'label_off'     => esc_html__( 'No', 'ailab' ),
                'default'   => 'yes',
            ]
        );
        $this->add_control(
            'show_price',
            [
                'label'         => esc_html__( 'Show Price', 'ailab' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Yes', 'ailab' ),
                'label_off'     => esc_html__( 'No', 'ailab' ),
				'default'   => 'yes',
				'condition' => [
					'search by' => 'product',
		  ],
            ]
        );
        $this->add_control(
			'position',
			[
				'label' => __( 'Position', 'ailab' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'absolute' => __( 'Absolute', 'ailab' ),
                    'relative' => __( 'Relative', 'ailab' ),
				],
				'default' => 'absolute',
                'prefix_class' => 'elementor_jws_result_position_',
			]
		);
        $this->end_controls_section();
        $this->start_controls_section(
			'section_style_toggle',
			[
				'label' => __( 'Toggle', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
						  'skins' => 'expand',
				],
			]
		);
        $this->add_control(
					'toggle_icon_color',
					[
						'label' 	=> __( 'Icon Color', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
							'{{WRAPPER}} .toggle-search i' => 'color: {{VALUE}};',
						],
                        'condition' => [
						  'skins' => 'expand',
				       ],
					]
		);
       $this->add_control(
				'icon_toggle_size',
				[
					'label' 		=> __( 'Icon Size', 'ailab' ),
					'type' 			=> Controls_Manager::SLIDER,
					'range' 		=> [
						'px' 		=> [
							'min' => 10,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' 	=> [
						'{{WRAPPER}} .toggle-search i' => 'font-size: {{SIZE}}px;',
					],
                    'condition' => [
						  'skins' => 'expand',
				    ],
                         
				]
		);
        $this->end_controls_section();
        $this->start_controls_section(
			'section_style_search_button',
			[
				'label' => __( 'Search Button', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
						  'skins' => 'expand',
				],
			]
		);
        $this->add_control(
					'search_button_color',
					[
						'label' 	=> __( 'Color', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
							'{{WRAPPER}} .searchsubmit i' => 'color: {{VALUE}};',
						],
                        'condition' => [
						  'skins' => 'expand',
				        ],
                        	
					]
		);
        
        $this->add_control(
					'search_button_background',
					[
						'label' 	=> __( 'Icon Color', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
							'{{WRAPPER}} .searchsubmit i' => 'color: {{VALUE}};',
						],
                        'condition' => [
						  'skins' => 'expand',
				       ],
					]
		);
       $this->add_control(
				'search_button_input_size',
				[
					'label' 		=> __( 'Icon Size', 'ailab' ),
					'type' 			=> Controls_Manager::SLIDER,
					'range' 		=> [
						'px' 		=> [
							'min' => 10,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' 	=> [
						'{{WRAPPER}} .searchsubmit i' => 'font-size: {{SIZE}}px;',
					],
                    'condition' => [
						  'skins' => 'expand',
				    ],
                         
				]
		);
        $this->end_controls_section();
        $this->start_controls_section(
			'section_form',
			[
				'label' => __( 'Form', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
         $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Box Shadow', 'ailab' ),
				'selector' => '{{WRAPPER}} .jws-search-form form',
			]
		);
        $this->end_controls_section();
		$this->start_controls_section(
			'section_style_input',
			[
				'label' => __( 'Input Search', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_responsive_control(
					'input_padding',
					[
						'label' 		=> __( 'Padding', 'ailab' ),
						'type' 			=> Controls_Manager::DIMENSIONS,
						'size_units' 	=> [ 'px', 'em', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .jws-search-form input[type="text"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],

						'separator' => 'before',
					]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'input_typography',
				'label' => __( 'Typography', 'ailab'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .jws-search-form input[type="text"]',
			]
		);
        $this->add_control(
					'input_color',
					[
						'label' 	=> __( 'Color', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
							'{{WRAPPER}} .jws-search-form input[type="text"]' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .jws-search-form input[type="text"]::-webkit-input-placeholder' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .jws-search-form input[type="text"]::-moz-placeholder' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .jws-search-form input[type="text"]:-ms-input-placeholder' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .jws-search-form input[type="text"]:-moz-placeholder' => 'color: {{VALUE}};',
						],
					]
		);
        $this->add_control(
					'input_bgcolor',
					[
						'label' 	=> __( 'Background Color', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
							'{{WRAPPER}} .jws-search-form input[type="text"]' => 'background-color: {{VALUE}};',
						],
					]
		);
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'form_input_border',
				'selector' => '{{WRAPPER}} .jws-search-form input[type="text"]',
			]
		);
         $this->add_control(
					'input_radius',
					[
						'label' 		=> __( 'Border Radius', 'ailab' ),
						'type' 			=> Controls_Manager::DIMENSIONS,
						'size_units' 	=> [ 'px', 'em', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .jws-search-form input[type="text"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],

						'separator' => 'before',
					]
		);
        $this->end_controls_section();
        
        $this->start_controls_section( 'search_categoris', [ 'label' => __( 'Category', 'ailab' ) , 'tab' => Controls_Manager::TAB_STYLE ] );
        
        $this->add_control(
					'cat_padding',
					[
						'label' 		=> __( 'Padding', 'ailab' ),
						'type' 			=> Controls_Manager::DIMENSIONS,
						'size_units' 	=> [ 'px', 'em', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .jws-search-form form .search-by-category .input-dropdown-inner > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],

						'separator' => 'before',
					]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
				'label' => __( 'Typography', 'ailab'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .jws-search-form form .search-by-category .input-dropdown-inner > a',
			]
		);
        $this->add_control(
					'cat_color',
					[
						'label' 	=> __( 'Text Color', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
							'{{WRAPPER}} .jws-search-form form .search-by-category .input-dropdown-inner > a' => 'color: {{VALUE}};',
						],
					]
		);
        $this->add_control(
					'cat_bg_color',
					[
						'label' 	=> __( 'Background Color', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
							'{{WRAPPER}} .jws-search-form form .search-by-category .input-dropdown-inner > a' => 'background-color: {{VALUE}};',
						],
					]
		);
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'form_cat_border',
				'selector' => '{{WRAPPER}} .jws-search-form form .search-by-category .input-dropdown-inner > a',
			]
		);
        $this->add_control(
					'cat_radius',
					[
						'label' 		=> __( 'Border Radius', 'ailab' ),
						'type' 			=> Controls_Manager::DIMENSIONS,
						'size_units' 	=> [ 'px', 'em', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .jws-search-form form .search-by-category .input-dropdown-inner > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],

						'separator' => 'before',
					]
		);
		$this->end_controls_section();
        $this->start_controls_section( 'search_button', [ 'label' => __( 'Button', 'ailab' ) , 'tab' => Controls_Manager::TAB_STYLE ] );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => __( 'Typography', 'ailab'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .jws-search-form .searchsubmit i',
                'condition' => [
						  'skins' => 'expand',
				],
			]
		);
        $this->add_control(
					'button_color',
					[
						'label' 	=> __( 'Text Color', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
							'{{WRAPPER}} .jws-search-form .searchsubmit' => 'color: {{VALUE}};',
						],
					]
		);
        $this->add_control(
					'button_bg_color',
					[
						'label' 	=> __( 'Background Color', 'ailab' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
							'{{WRAPPER}} .jws-search-form .searchsubmit' => 'background-color: {{VALUE}};',
						],
                       
					]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'searchsumit_border',
				'selector' => '{{WRAPPER}} .jws-search-form .searchsubmit',
			]
		);
		$this->add_responsive_control(
			'searchform_padding',
			[
				'label' 		=> __( 'Padding', 'ailab' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .jws-search-form .searchsubmit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],

				'separator' => 'before',
			]
);
		$this->end_controls_section();
        $this->start_controls_section( 'search_result', [ 'label' => __( 'Content Result', 'ailab' ) , 'tab' => Controls_Manager::TAB_STYLE ] );
            $this->add_control(
    					'result_bgcolor',
    					[
    						'label' 	=> __( 'Background Color', 'ailab' ),
    						'type' 		=> Controls_Manager::COLOR,
    						'default' 	=> '',
    						'selectors' => [
    							'{{WRAPPER}} .jws-search-form .search-results-wrapper .jws-search-results' => 'background: {{VALUE}};',
    						],
    					]
    		);
            $this->add_group_control(
    			Group_Control_Box_Shadow::get_type(),
    			[
    				'name' => 'result_box_shadow',
    				'label' => __( 'Box Shadow', 'ailab' ),
    				'selector' => '{{WRAPPER}} .jws-search-form .search-results-wrapper .jws-search-results',
    			]
    		);
            $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'result_border',
				'selector' => '{{WRAPPER}} .jws-search-form .search-results-wrapper .autocomplete-suggestions .autocomplete-suggestion',
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
		$skins = $settings['skins'];
		$search_by = $settings['search_by'];
        $icon = $settings['icon'];
        $show_image = $settings['show_image'];
        $show_price = $settings['show_price'];
   
        ?>
            

   
    <div class="jws_search_fixed jws_scrollbar"> 
        <div class="jws-search-form <?php  echo esc_attr($skins); ?>">
            <span class="flaticon-cancel"></span>
            <span class="toggle-search">
                <?php \Elementor\Icons_Manager::render_icon( $settings['icon_toggle'], [ 'aria-hidden' => 'true' ] );  ?>  
            </span>
            <?php if($settings['skins']=="expand"):?>
                <form role="search" method="get" class="searchform jws-ajax-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" data-count="20" data-post_type="product" data-thumbnail="<?php echo ''.($show_image) ?  '1' : '0'; ?>" data-price="<?php echo ''.($show_price) ?  '1' : '0'; ?>">
    			<?php 
                    if($settings['show_cat']) {
                         $args = array( 
                    			'hide_empty' => 1,
                    			'parent' => 0
                    		);
                    		$terms = get_terms('product_cat', $args);
                    		if( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                    			?>
                    			<div class="search-by-category input-dropdown">
                    				<div class="input-dropdown-inner">
                    					<input type="hidden" name="product_cat" value="0">
                    					<div class="list-wrapper">
                    						<ul>
                    							<li><a href="#" data-val="0"><?php echo esc_attr($settings['text_cat_all']); ?></a></li>
                    							<?php
                    							
                    								foreach ( $terms as $term ) {
                    								    	?>
                    											<li><a href="#" data-val="<?php echo esc_attr( $term->slug ); ?>"><?php echo esc_attr( $term->name ); ?></a></li>
                    								    	<?php
                    								}
                    								
                    							?>
                    						</ul>
                    					</div>
                    				</div>
                    			</div>
                    			<?php
                    		}
                    }   
                ?>
                <div class="input-group">
                    <button type="submit" class="searchsubmit">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );  ?>
                    </button>
                    <input type="text" class="s search-input" placeholder="<?php echo esc_attr($settings['text_placeholder']); ?>" value="<?php echo get_search_query(); ?>" name="s" required/>
                    <?php if($search_by == "product"):?>
                    <input type="hidden" name="post_type" value="product">
                    <?php elseif($search_by == "blog"):?>
                    <input type="hidden" name="post_type" value="post">
                    <?php else:?>
                        <input type="hidden" name="post_type" value="">
                    <?php endif;?>
                    <span class="close-search">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon_close'], [ 'aria-hidden' => 'true' ] );  ?>
                    </span>
                </div>
                
        		</form>
            <?php endif;?>
        	
                <div class="search-results-wrapper results_columns_<?php echo esc_attr($settings['columns']); ?> results_columnst_<?php echo esc_attr($settings['columns_tablet']); ?> results_columnsm_<?php echo esc_attr($settings['columns_mobile']); ?>"><div class="jws-scroll"><div class="jws-search-results jws_scrollbar"></div></div><div class="jws-search-loader"></div></div>
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