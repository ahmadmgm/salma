<?php
namespace ElementorHelloWorld\Widgets\JwsCustom;

// You can add to or remove from this list - it's not conclusive! Chop & change to fit your needs.
use Elementor\Controls_Manager;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Repeater;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class JWS_Button extends Widget_Base {

	/* Uncomment the line below if you do not wish to use the function _content_template() - leave that section empty if this is uncommented! */
	//protected $_has_template_content = false; 
	
	public function get_name() {
		return 'bloompixel-gradient-button';
	}

	public function get_title() {
		return __( 'Jws Button', 'ailab' );
	}

	public function get_icon() {
		return 'eicon-button';
	}

	public function get_categories() {
		return [ 'jws-elements' ];
	}
	
	/**
	 * Get button sizes.
	 *
	 * Retrieve an array of button sizes for the button widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @return array An array containing button sizes.
	 */
	public static function get_button_sizes() {
		return [
			'xs' => __( 'Extra Small', 'ailab' ),
			'sm' => __( 'Small', 'ailab' ),
			'md' => __( 'Medium', 'ailab' ),
			'lg' => __( 'Large', 'ailab' ),
			'xl' => __( 'Extra Large', 'ailab' ),
		];
	}

	/**
	 * Register button widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_button',
			[
				'label' => __( 'Button', 'ailab' ),
			]
		);

		$this->add_control(
			'text',
			[
				'label' => __( 'Text', 'ailab' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Click here', 'ailab' ),
				'placeholder' => __( 'Click here', 'ailab' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'ailab' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'ailab' ),
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'ailab' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
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
				'prefix_class' => 'elementor%s-align-',
				'default' => '',
			]
		);

		$this->add_control(
			'size',
			[
				'label' => __( 'Size', 'ailab' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'sm',
				'options' => self::get_button_sizes(),
				'style_transfer' => true,
			]
		);

          $this->add_control(
				'icon',
				[
					'label' => __( 'Icon', 'ailab' ),
					'type' => \Elementor\Controls_Manager::ICONS,
				]
		);
		$this->add_responsive_control(
			'icon_align',
			[
				'label' => __( 'Icon Position', 'ailab' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => __( 'Before', 'ailab' ),
					'right' => __( 'After', 'ailab' ),
				],
				'condition' => [
					'icon!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'icon_indent',
			[
				'label' => __( 'Icon Spacing', 'ailab' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'condition' => [
					'icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button .elementor-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-button .elementor-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Icon Size', 'ailab' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button .elementor-button-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
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

		$this->add_control(
			'button_css_id',
			[
				'label' => __( 'Button ID', 'ailab' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'title' => __( 'Add your custom id WITHOUT the Pound key. e.g: my-id', 'ailab' ),
				'label_block' => false,
				'description' => __( 'Please make sure the ID is unique and not used elsewhere on the page this form is displayed. This field allows <code>A-z 0-9</code> & underscore chars without spaces.', 'ailab' ),
				'separator' => 'before',

			]
		);
        $this->add_control(
			'button_style_gradient',
			[
				'label' => __( 'Css Gradient Default', 'ailab' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'ailab' ),
				'label_off' => __( 'Off', 'ailab' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Button', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
			'button_shadow',
			[
				'label' => __( 'Turn off shadow button when hover', 'ailab' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'ailab' ),
				'label_off' => __( 'Off', 'ailab' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button',
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
			'button_text_type',
			[
				'label' => __( 'Button Text Color Type', 'ailab' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'classic'    => [
						'title' => __( 'Classic', 'ailab' ),
						'icon' => 'eicon-paint-brush',
					],
					'gradient' => [
						'title' => __( 'Gradient', 'ailab' ),
						'icon' => 'eicon-barcode',
					],
				],
				'default' => 'classic',
			]
		);
        $this->add_control(
			'button_text_bg_color',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'color:{{VALUE}};',
				],
				'default' => '',
                'condition' => [
					'button_text_type' => 'classic',
				],
			]
		);
        $this->add_control(
			'button_textgradient_color',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
                'condition' => [
					'button_text_type' => 'gradient',
				],
			]
		);
        $this->add_control(
			'button_textgradient_color2',
			[
				'label' => __( 'Text Second Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} a.elementor-button .elementor-button-text, {{WRAPPER}} .elementor-button .elementor-button-icon i' => 'background-image: linear-gradient(to right, {{button_textgradient_color.VALUE}} 0%, {{VALUE}} 51%, {{button_textgradient_color.VALUE}} 100%);background-size: 200% auto;',
				],
                'condition' => [
					'button_text_type' => 'gradient',
				],
			]
		);
        $this->add_control(
			'button_icon_color',
			[
				'label' => __( 'Icon Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-button .elementor-button-icon' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
			'button_type',
			[
				'label' => __( 'Button Background Type', 'ailab' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'classic'    => [
						'title' => __( 'Classic', 'ailab' ),
						'icon' => 'eicon-paint-brush',
					],
					'gradient' => [
						'title' => __( 'Gradient', 'ailab' ),
						'icon' => 'eicon-barcode',
					],
				],
				'default' => 'gradient',
			]
		);
        $this->add_control(
			'button_bg_color',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'background:{{VALUE}};',
				],
				'default' => '',
                'condition' => [
					'button_type' => 'classic',
				],
			]
		);
        $this->add_control(
			'button_bggradient_color',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
                'condition' => [
					'button_type' => 'gradient',
				],
			]
		);
        $this->add_control(
			'button_bggradient_color2',
			[
				'label' => __( 'Background Second Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'background-image: linear-gradient(to right, {{button_bggradient_color.VALUE}} 0%, {{VALUE}} 51%, {{button_bggradient_color.VALUE}} 100%);background-size: 200% auto;',
                    '{{WRAPPER}} a.elementor-button:hover , {{WRAPPER}} .elementor-button:hover' => 'background-position: right center;',
				],
                'condition' => [
					'button_type' => 'gradient',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .elementor-button',
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
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .elementor-button',
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'                  => 'button_text_shadow',
				'label'                 => __( 'Text Shadow', 'ailab' ),
				'selector'              => '{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button',
			]
		);

		$this->add_responsive_control(
			'text_padding',
			[
				'label' => __( 'Padding', 'ailab' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'button_width',
			[
				'label' => __( 'Width', 'ailab' ),
				'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'width: {{SIZE}}{{UNIT}};',
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
			'button_text_bg_color_hover',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} a.elementor-button:hover, {{WRAPPER}} .elementor-button:hover' => 'color:{{VALUE}};',
				],
				'default' => '',
                'condition' => [
					'button_text_type' => 'classic',
				],
			]
		);
        $this->add_control(
			'button_textgradient_color_hover',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
                'condition' => [
					'button_text_type' => 'gradient',
				],
			]
		);
        $this->add_control(
			'button_textgradient_color2_hover',
			[
				'label' => __( 'Text Second Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} a.elementor-button .elementor-button-text:hover, {{WRAPPER}} .elementor-button:hover .elementor-button-icon i' => 'background-image: linear-gradient(to right, {{button_textgradient_color_hover.VALUE}} 0%, {{VALUE}} 51%, {{button_textgradient_color_hover.VALUE}} 100%);background-size: 200% auto;',
				],
                'condition' => [
					'button_text_type' => 'gradient',
				],
			]
		);
        ///button gradient color hover
         $this->add_control(
			'button_icon_color_hover',
			[
				'label' => __( 'ICon Color Hover', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-button:hover .elementor-button-icon' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
			'button_bg_color_hover',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} a.elementor-button:hover, {{WRAPPER}} .elementor-button:hover' => 'background:{{VALUE}};',
				],
				'default' => '',
                'condition' => [
					'button_type' => 'classic',
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
					'{{WRAPPER}} a.elementor-button:hover, {{WRAPPER}} .elementor-button:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
        
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_hover_box_shadow',
				'selector' => '{{WRAPPER}} a.elementor-button:hover, {{WRAPPER}} .elementor-button:hover',
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'                  => 'button_hover_text_shadow',
				'label'                 => __( 'Text Shadow', 'ailab' ),
				'selector'              => '{{WRAPPER}} a.elementor-button:hover, {{WRAPPER}} .elementor-button:hover',
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Hover Animation', 'ailab' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	/**
	 * Render button widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
        $button_shadow='';
        if($settings['button_shadow']=='yes'){
            $button_shadow='no-button-shadow';
        }
		$this->add_render_attribute( 'wrapper', 'class', 'elementor-button-wrapper jws-button-custom' );

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'button', 'href', $settings['link']['url'] );
			$this->add_render_attribute( 'button', 'class', 'elementor-button-link');

			if ( $settings['link']['is_external'] ) {
				$this->add_render_attribute( 'button', 'target', '_blank' );
			}

			if ( $settings['link']['nofollow'] ) {
				$this->add_render_attribute( 'button', 'rel', 'nofollow' );
			}
		}

		$this->add_render_attribute( 'button', 'class', 'elementor-button' );
		$this->add_render_attribute( 'button', 'role', 'button' );
        
        
        if(!empty($settings['button_text_type'])&&($settings['button_text_type']=='gradient')) {
          $this->add_render_attribute( 'button', 'class', 'text-color-gradient'.' '.$button_shadow );  
        }else {
            if(!empty($settings['button_type'])) {
              $this->add_render_attribute( 'button', 'class', $settings['button_type'].' '.$button_shadow );  
            }
        }
        
        
        
		if ( ! empty( $settings['button_css_id'] ) ) {
			$this->add_render_attribute( 'button', 'id', $settings['button_css_id'] );
		}

		if ( ! empty( $settings['size'] ) ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-size-' . $settings['size'] );
		}

		if ( $settings['hover_animation'] ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-animation-' . $settings['hover_animation'] );
		}
        
        if ( $settings['button_style_gradient'] == 'yes' ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-gradient-default' );
		}
        
		?>
		<div <?php echo ''.$this->get_render_attribute_string( 'wrapper' ); ?>>
			<a <?php echo ''.$this->get_render_attribute_string( 'button' ); ?>>
				<?php ''.$this->render_text(); ?>
			</a>
		</div>
		<?php
	}

	/**
	 * Render button text.
	 *
	 * Render button widget text.
	 *
	 * @since 1.5.0
	 * @access protected
	 */
	protected function render_text() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( [
			'content-wrapper' => [
				'class' => 'elementor-button-content-wrapper',
			],
			'icon-align' => [
				'class' => [
					'elementor-button-icon',
					'elementor-align-icon-' . $settings['icon_align'],
				],
			],
			'text' => [
				'class' => 'elementor-button-text',
			],
		] );

		$this->add_inline_editing_attributes( 'text', 'none' );
		?>
		<span <?php echo ''.$this->get_render_attribute_string( 'content-wrapper' ); ?>>
			<?php if ( ! empty( $settings['icon']['value'] ) ) :?>
            
			<span <?php echo ''.$this->get_render_attribute_string( 'icon-align' ); ?>>
				<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );  ?>  
			</span>
			<?php endif; ?>
			<span <?php echo ''.$this->get_render_attribute_string( 'text' ); ?>><?php echo esc_html($settings['text']); ?></span>
		</span>
		<?php
	}

	/**
	 * Render button widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _content_template() {
		?>
		<#
		view.addRenderAttribute( 'text', 'class', 'elementor-button-text' );
		view.addInlineEditingAttributes( 'text', 'none' );
        var iconHTML = elementor.helpers.renderIcon( view, settings.icon, { 'aria-hidden': true }, 'i' , 'object' ),
		migrated = elementor.helpers.isIconMigrated( settings, 'xicon' );
		#>
		<div class="elementor-button-wrapper jws-button-custom">
            <# if(settings.button_text_type=='gradient') { #>
                	<a id="{{ settings.button_css_id }}" class="elementor-button elementor-size-{{ settings.size }} elementor-animation-{{ settings.hover_animation }} text-color-gradient" href="{{ settings.link.url }}" role="button">
				<span class="elementor-button-content-wrapper">
					<# if ( settings.icon.value ) { #>
					<span class="elementor-button-icon elementor-align-icon-{{ settings.icon_align }}">
				        <# if (iconHTML.rendered) { #>
							{{{ iconHTML.value}}}
						<# } #>
					</span>
					<# } #>
					<span {{{ view.getRenderAttributeString( 'text' ) }}}>{{{ settings.text }}}</span>
				</span>
			</a>
            <# }else{ #>
            	<a id="{{ settings.button_css_id }}" class="elementor-button elementor-size-{{ settings.size }} elementor-animation-{{ settings.hover_animation }} {{settings.button_type}}" href="{{ settings.link.url }}" role="button">
				<span class="elementor-button-content-wrapper">
					<# if ( settings.icon ) { #>
					<span class="elementor-button-icon elementor-align-icon-{{ settings.icon_align }}">
				        <# if (iconHTML.rendered) { #>
							{{{ iconHTML.value}}}
						<# } #>
					</span>
					<# } #>
					<span {{{ view.getRenderAttributeString( 'text' ) }}}>{{{ settings.text }}}</span>
				</span>
			</a>
            <# } #>
		</div>
		<?php
	}
}