<?php
/**
 * jws Off - Canvas.
 *
 * @package JWS
 */

namespace ElementorHelloWorld\Widgets\JwsCustom;

// Elementor Classes.
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;
use Elementor\Repeater;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Offcanvas.
 */
class Offcanvas extends Widget_Base {

	/**
	 * Retrieve Off - Canvas Widget name.
	 *
	 * @since 1.11.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Offcanvas';
	}

	/**
	 * Retrieve Offcanvas Widget title.
	 *
	 * @since 1.11.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return 'Jws Offcanvas';
	}

	/**
	 * Retrieve OffCanvas Widget icon.
	 *
	 * @since 1.11.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-site-search';
	}

	/**
	 * Retrieve Widget Keywords.
	 *
	 * @since 1.11.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_keywords() {
		return 'Offcanvas';
	}

	/**
	 * Retrieve the list of scripts the image carousel widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.11.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'jws-canvas' ];
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
	 * Register canvas controls.
	 *
	 * @since 1.11.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->register_general_content_controls();
		$this->register_display_offcanvas_controls();
		$this->register_display_content_controls();
		$this->register_close_controls();

		$this->register_offcanvas_style_controls();
		$this->register_menu_style_controls();
		$this->register_content_style_controls();
		$this->register_button_style_controls();
		$this->register_icon_style_controls();
		$this->register_close_icon_style_controls();
	}

	/**
	 * Register Off - Canvas Content Controls.
	 *
	 * @since 1.11.0
	 * @access protected
	 */
	protected function register_general_content_controls() {
		$this->start_controls_section(
			'content',
			[
				'label' => __( 'Content', 'ailab' ),
			]
		);

		$this->add_control(
			'preview_offcanvas',
			[
				'label'        => __( 'Preview', 'ailab' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'no',
				'return_value' => 'yes',
				'label_off'    => __( 'No', 'ailab' ),
				'label_on'     => __( 'Yes', 'ailab' ),
			]
		);
        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'content_type',
			[
				'label'   => __( 'Content Type', 'ailab' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'content',
				'options' => $this->get_content_type(),
			]
		);

		$menus = $this->get_menus_list();

		if ( ! empty( $menus ) ) {
			$repeater->add_control(
				'menu',
				[
					'label'        => __( 'Menu', 'ailab' ),
					'type'         => Controls_Manager::SELECT,
					'options'      => $menus,
					'default'      => array_keys( $menus )[0],
					'save_default' => true,
					/* translators: %s admin link */
					'description'  => sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'ailab' ), admin_url( 'nav-menus.php' ) ),
					'condition'    => [
						'content_type' => 'menu',
					],
				]
			);
		} else {
			$repeater->add_control(
				'menu',
				[
					'type'            => Controls_Manager::RAW_HTML,
					/* translators: %s admin link */
					'raw'             => sprintf( __( '<strong>There are no menus in your site.</strong><br>Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'ailab' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
					'condition'       => [
						'content_type' => 'menu',
					],
				]
			);
		}

		$repeater->add_control(
			'ct_content',
			[
				'label'      => __( 'Description', 'ailab' ),
				'type'       => Controls_Manager::WYSIWYG,
				'default'    => __( 'Enter content here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.​ Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'ailab' ),
				'rows'       => 10,
				'show_label' => false,
				'dynamic'    => [
					'active' => true,
				],
				'condition'  => [
					'content_type' => 'content',
				],
			]
		);

		$repeater->add_control(
			'ct_saved_rows',
			[
				'label'     => __( 'Select Section', 'ailab' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => $this->get_saved_data( 'section' ),
				'default'   => '-1',
				'condition' => [
					'content_type' => 'saved_rows',
				],
			]
		);

		$repeater->add_control(
			'ct_page_templates',
			[
				'label'     => __( 'Select Page', 'ailab' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => $this->get_saved_data( 'page' ),
				'default'   => '-1',
				'condition' => [
					'content_type' => 'saved_page_templates',
				],
			]
		);

		$repeater->add_control(
			'ct_saved_modules',
			[
				'label'     => __( 'Select Widget', 'ailab' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => $this->get_saved_data( 'widget' ),
				'default'   => '-1',
				'condition' => [
					'content_type' => 'saved_modules',
				],
			]
		);
        $this->add_control(
			'content_listing',
			[
				'label' => __( 'Content List', 'ailab' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ content_type }}}',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Register Off - Canvas Title Style Controls.
	 *
	 * @since 1.11.0
	 * @access protected
	 */
	protected function register_display_content_controls() {
		$this->start_controls_section(
			'offcanvas',
			[
				'label' => __( 'Display Settings', 'ailab' ),
			]
		);
        $this->add_control(
			'use_login',
			[
				'label'        => __( 'Use For Login', 'ailab' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'no',
				'return_value' => 'yes',
				'label_off'    => __( 'No', 'ailab' ),
				'label_on'     => __( 'Yes', 'ailab' ),
			]
		);
		$this->add_control(
			'offcanvas_on',
			[
				'label'   => __( 'Display On', 'ailab' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'button',
				'options' => [
					'button'    => __( 'Button', 'ailab' ),
					'icon'      => __( 'Icon', 'ailab' ),
					'custom'    => __( 'Custom Class', 'ailab' ),
					'custom_id' => __( 'Custom ID', 'ailab' ),
				],
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label'       => __( 'Button Text', 'ailab' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Click Me', 'ailab' ),
				'placeholder' => __( 'Click Me', 'ailab' ),
				'dynamic'     => [
					'active' => true,
				],
                'condition'   => [
					'offcanvas_on' => 'button',
				],
			]
		);
        
        $this->add_control(
			'btn_text_after_login',
			[
				'label'       => __( 'Button Text After Login', 'ailab' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Click Me', 'ailab' ),
				'placeholder' => __( 'Click Me', 'ailab' ),
				'dynamic'     => [
					'active' => true,
				],
				'condition'   => [
					'offcanvas_on' => 'button',
                    'use_login' => 'yes',
				],
			]
		);

        $this->add_control(
			'btn_url_after_login',
			[
				'label' => __( 'Button Url After Login', 'ailab' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'Loged Url', 'ailab' ),
                'dynamic'		=> [ 'active' => true ],
                'condition'   => [
					'offcanvas_on' => 'button',
                    'use_login' => 'yes',
				],
		
			]
		);
			$this->add_control(
				'new_icon',
				[
					'label'            => __( 'Icon', 'ailab' ),
					'type'             => Controls_Manager::ICONS,
					'fa4compatibility' => 'icon',
					'default'          => [
						'value'   => 'fa fa-home',
						'library' => 'fa-solid',
					],
					'condition'        => [
						'offcanvas_on' => 'icon',
					],
				]
			);

		$this->add_control(
			'icon_size',
			[
				'label'     => __( 'Size (px)', 'ailab' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 60,
				],
				'range'     => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .jws-offcanvas-action .jws-offcanvas-icon-bg i,
					{{WRAPPER}} .jws-offcanvas-action .jws-offcanvas-icon-bg svg' => 'font-size: {{SIZE}}px; width: {{SIZE}}px; height: {{SIZE}}px; line-height: {{SIZE}}px;',
				],
				'condition' => [
					'offcanvas_on' => 'icon',
				],
			]
		);

		$this->add_control(
			'jws_display_position',
			[
				'label'        => __( 'Position', 'ailab' ),
				'type'         => Controls_Manager::SELECT,
				'default'      => 'inline',
				'options'      => [
					'inline'   => __( 'Inline', 'ailab' ),
					'floating' => __( 'Floating', 'ailab' ),
				],
				'condition'    => [
					'offcanvas_on' => array( 'button', 'icon' ),
				],
				'prefix_class' => 'jws-offcanvas-trigger-align-',
				'render_type'  => 'template',
			]
		);

		// If jws_display_position is Inline.
		$this->add_responsive_control(
			'jws_display_inline_button_align',
			[
				'label'     => __( 'Alignment', 'ailab' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'    => [
						'title' => __( 'Left', 'ailab' ),
						'icon'  => 'fa fa-align-left',
					],
					'center'  => [
						'title' => __( 'Center', 'ailab' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'   => [
						'title' => __( 'Right', 'ailab' ),
						'icon'  => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'ailab' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'default'   => 'left',
				'condition' => [
					'jws_display_position' => 'inline',
					'offcanvas_on'          => 'button',
				],
				'toggle'    => false,
			]
		);

		// If jws_display_position is Floating.
		$this->add_control(
			'jws_display_floating_align',
			[
				'label'       => __( 'Alignment', 'ailab' ),
				'type'        => Controls_Manager::CHOOSE,
				'default'     => 'left',
				'options'     => [
					'left'  => [
						'title' => __( 'Left', 'ailab' ),
						'icon'  => 'fa fa-align-left',
					],
					'right' => [
						'title' => __( 'Right', 'ailab' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'toggle'      => false,
				'label_block' => false,
				'condition'   => [
					'offcanvas_on'          => array( 'button', 'icon' ),
					'jws_display_position' => 'floating',
				],
			]
		);

		$this->add_responsive_control(
			'jws_display_floating_on_window_position',
			[
				'label'          => __( 'Floating Position', 'ailab' ),
				'type'           => Controls_Manager::SLIDER,
				'size_units'     => '%',
				'default'        => [
					'size' => '50',
					'unit' => '%',
				],
				'tablet_default' => [
					'size' => '50',
					'unit' => '%',
				],
				'mobile_default' => [
					'size' => '50',
					'unit' => '%',
				],
				'range'          => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors'      => [
					'{{WRAPPER}} .jws-offcanvas-action-wrap .jws-button-wrapper .jws-offcanvas-action-alignment-left,
					{{WRAPPER}} .jws-offcanvas-action-wrap .jws-offcanvas-icon-wrap .jws-offcanvas-action-alignment-left,
                    {{WRAPPER}} .jws-offcanvas-action-wrap .jws-button-wrapper .jws-offcanvas-action-alignment-right,
                    {{WRAPPER}} .jws-offcanvas-action-wrap .jws-offcanvas-icon-wrap .jws-offcanvas-action-alignment-right' => 'top: {{SIZE}}{{UNIT}}; transform: translateY( -{{SIZE}}{{UNIT}} );',
				],
				'condition'      => [
					'jws_display_position' => 'floating',
					'offcanvas_on'          => array( 'button', 'icon' ),
				],
			]
		);

		$this->add_control(
				'new_offcanvas_button_icon',
				[
					'label'            => __( 'Select Icon', 'ailab' ),
					'type'             => Controls_Manager::ICONS,
					'fa4compatibility' => 'offcanvas_button_icon',
					'condition'        => [
						'offcanvas_on' => 'button',
					],
					'render_type'      => 'template',
				]
		);


		$this->add_control(
			'offcanvas_button_icon_position',
			[
				'label'       => __( 'Icon Position', 'ailab' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'right',
				'label_block' => false,
				'options'     => [
					'right' => __( 'After Text', 'ailab' ),
					'left'  => __( 'Before Text', 'ailab' ),
				],
				'conditions'  => [
					'relation' => 'and',
					'terms'    => [
						[
							'name'     => 'new_offcanvas_button_icon',
							'operator' => '!=',
							'value'    => '',
						],
						[
							'name'     => 'offcanvas_on',
							'operator' => '==',
							'value'    => 'button',
						],
					],
				],
			]
		);

		$this->add_control(
			'offcanvas_icon_spacing',
			[
				'label'      => __( 'Icon Spacing', 'ailab' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'default'    => [
					'size' => '0',
					'unit' => 'px',
				],
				'conditions' => [
					'relation' => 'and',
					'terms'    => [
						[
							'name'     => 'new_offcanvas_button_icon',
							'operator' => '!=',
							'value'    => '',
						],
						[
							'name'     => 'offcanvas_on',
							'operator' => '==',
							'value'    => 'button',
						],
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .jws-elementor-button .elementor-align-icon-right, {{WRAPPER}} .jws-infobox-link-icon-after' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .jws-elementor-button .elementor-align-icon-left, {{WRAPPER}} .jws-infobox-link-icon-before' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'offcanvas_custom',
			[
				'label'       => __( 'Class', 'ailab' ),
				'type'        => Controls_Manager::TEXT,
				'description' => __( 'Add your custom class without the dot. e.g: my-class', 'ailab' ),
				'condition'   => [
					'offcanvas_on' => 'custom',
				],
			]
		);

		$this->add_control(
			'offcanvas_custom_id',
			[
				'label'       => __( 'Custom ID', 'ailab' ),
				'type'        => Controls_Manager::TEXT,
				'description' => __( 'Add your custom id without the # key. e.g: my-id', 'ailab' ),
				'condition'   => [
					'offcanvas_on' => 'custom_id',
				],
			]
		);

		$this->add_control(
			'offcanvas_trigger_zindex',
			[
				'label'       => __( 'Z-Index', 'ailab' ),
				'description' => __( 'Adjust the z-index of the floating trigger if it is not visibile on the page. Defaults is set to 999', 'ailab' ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => '999',
				'min'         => 0,
				'step'        => 1,
				'condition'   => [
					'offcanvas_on'          => array( 'button', 'icon' ),
					'jws_display_position' => 'floating',
				],
				'selectors'   => [
					'{{WRAPPER}} .jws-offcanvas-trigger' => 'z-index: {{SIZE}};',
				],
			]
		);

		$this->add_responsive_control(
			'all_align',
			[
				'label'     => __( 'Alignment', 'ailab' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => __( 'Left', 'ailab' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ailab' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'ailab' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'default'   => 'left',
				'condition' => [
					'offcanvas_on'          => 'icon',
					'jws_display_position' => 'inline',
				],
				'selectors' => [
					'{{WRAPPER}} .jws-offcanvas-action-wrap' => 'text-align: {{VALUE}};',
				],
				'toggle'    => false,
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Register Off - Canvas Close button.
	 *
	 * @since 1.11.0
	 * @access protected
	 */
	protected function register_close_controls() {
		$this->start_controls_section(
			'section_close',
			[
				'label' => __( 'Close Button', 'ailab' ),
			]
		);



		$this->add_control(
				'new_close_icon',
				[
					'label'            => __( 'Select Close Icon', 'ailab' ),
					'type'             => Controls_Manager::ICONS,
					'default'          => [
						'value' => 'fab fa-wordpress',
                		'library' => 'fa-brands',
					],
				]
		);

		$this->add_control(
			'close_inside_icon_position',
			[
				'label'      => __( 'Icon Alignment', 'ailab' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'right-top',
				'options'    => [
					'left-top'  => __( 'Left Top', 'ailab' ),
					'right-top' => __( 'Right Top', 'ailab' ),
				],
				'conditions' => [
					'relation' => 'or',
					'terms'    => [
						[
							'name'     => 'new_close_icon',
							'operator' => '!=',
							'value'    => '',
						],
					],
				],
			]
		);

		$this->add_responsive_control(
			'close_icon_size',
			[
				'label'      => __( 'Size', 'ailab' ),
				'type'       => Controls_Manager::SLIDER,
				'default'    => [
					'size' => 14,
				],
				'range'      => [
					'px' => [
						'max' => 60,
					],
				],
				'selectors'  => [
					'.uaoffcanvas-{{ID}} .jws-offcanvas-close .jws-offcanvas-close-icon' => 'height: calc( {{SIZE}}px + 5px ); width: calc( {{SIZE}}px + 5px ); font-size: calc( {{SIZE}}px + 5px ); line-height: calc( {{SIZE}}px + 5px );',
				],
				'conditions' => [
					'relation' => 'or',
					'terms'    => [
						[
							'name'     => 'new_close_icon',
							'operator' => '!=',
							'value'    => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'esc_keypress',
			[
				'label'        => __( 'Close on ESC Keypress', 'ailab' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'no',
				'return_value' => 'yes',
				'label_off'    => __( 'No', 'ailab' ),
				'label_on'     => __( 'Yes', 'ailab' ),
			]
		);

		$this->add_control(
			'overlay_click',
			[
				'label'        => __( 'Close on Overlay Click', 'ailab' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'no',
				'return_value' => 'yes',
				'label_off'    => __( 'No', 'ailab' ),
				'label_on'     => __( 'Yes', 'ailab' ),
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Register off-canvas button Style Controls.
	 *
	 * @since 1.11.0
	 * @access protected
	 */
	protected function register_button_style_controls() {
		$this->start_controls_section(
			'section_button_style',
			[
				'label'     => __( 'Button', 'ailab' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'offcanvas_on' => 'button',
				],
			]
		);

		$this->add_control(
			'btn_html_message',
			[
				'type'      => Controls_Manager::RAW_HTML,
				'raw'       => sprintf( '<p style="font-size: 11px;font-style: italic;line-height: 1.4;color: #a4afb7;">%s</p>', __( 'To see these changes please turn off the preview setting from Content Tab.', 'ailab' ) ),
				'condition' => [
					'preview_offcanvas' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'btn_typography',
				'label'     => __( 'Typography', 'ailab' ),
				'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
				'selector'  => '{{WRAPPER}} .jws-offcanvas-action-wrap a.jws-elementor-button, {{WRAPPER}} .jws-offcanvas-action-wrap .jws-elementor-button',
				'condition' => [
					'offcanvas_on' => 'button',
				],
			]
		);

		$this->add_responsive_control(
			'btn_padding',
			[
				'label'      => __( 'Padding', 'ailab' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .jws-offcanvas-action-wrap a.jws-elementor-button, {{WRAPPER}} .jws-offcanvas-action-wrap .jws-elementor-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'  => [
					'offcanvas_on' => 'button',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label'     => __( 'Normal', 'ailab' ),
				'condition' => [
					'offcanvas_on' => 'button',
				],
			]
		);

			$this->add_control(
				'button_color',
				[
					'label'     => __( 'Text Color', 'ailab' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '',
					'selectors' => [
						'{{WRAPPER}} .jws-offcanvas-action-wrap a.jws-elementor-button, {{WRAPPER}} .jws-offcanvas-action-wrap .jws-elementor-button .elementor-button-icon' => 'color: {{VALUE}};',
					],
					'condition' => [
						'offcanvas_on' => 'button',
					],
				]
			);

			$this->add_control(
				'btn_background_color',
				[
					'label'     => __( 'Background Color', 'ailab' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '',
					'selectors' => [
						'{{WRAPPER}} .jws-offcanvas-action-wrap .jws-elementor-button' => 'background-color: {{VALUE}};',
					],
					'condition' => [
						'offcanvas_on' => 'button',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name'        => 'btn_border',
					'label'       => __( 'Border', 'ailab' ),
					'placeholder' => '1px',
					'default'     => '1px',
					'selector'    => '{{WRAPPER}} .jws-offcanvas-action-wrap .jws-elementor-button',
					'condition'   => [
						'offcanvas_on' => 'button',
					],
				]
			);

			$this->add_control(
				'btn_border_radius',
				[
					'label'      => __( 'Border Radius', 'ailab' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .jws-offcanvas-action-wrap a.jws-elementor-button, {{WRAPPER}} .jws-offcanvas-action-wrap .jws-elementor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition'  => [
						'offcanvas_on' => 'button',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name'      => 'button_box_shadow',
					'selector'  => '{{WRAPPER}} .jws-offcanvas-action-wrap .jws-elementor-button',
					'condition' => [
						'offcanvas_on' => 'button',
					],
				]
			);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label'     => __( 'Hover', 'ailab' ),
				'condition' => [
					'offcanvas_on' => 'button',
				],
			]
		);

			$this->add_control(
				'btn_hover_color',
				[
					'label'     => __( 'Text Color', 'ailab' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .jws-offcanvas-action-wrap a.jws-elementor-button:hover, {{WRAPPER}} .jws-offcanvas-action-wrap .jws-elementor-button:hover' => 'color: {{VALUE}};',
					],
					'condition' => [
						'offcanvas_on' => 'button',
					],
				]
			);

			$this->add_control(
				'btn_hover_bg_color',
				[
					'label'     => __( 'Background Color', 'ailab' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '',
					'selectors' => [
						'{{WRAPPER}} .jws-offcanvas-action-wrap a.jws-elementor-button:hover, {{WRAPPER}} .jws-offcanvas-action-wrap .jws-elementor-button:hover' => 'background-color: {{VALUE}};',
					],
					'condition' => [
						'offcanvas_on' => 'button',
					],
				]
			);

			$this->add_control(
				'button_hover_border_color',
				[
					'label'     => __( 'Border Color', 'ailab' ),
					'type'      => Controls_Manager::COLOR,
					'condition' => [
						'border_border!' => '',
					],
					'selectors' => [
						'{{WRAPPER}} .jws-offcanvas-action-wrap a.jws-elementor-button:hover, {{WRAPPER}} .jws-offcanvas-action-wrap .jws-elementor-button:hover' => 'border-color: {{VALUE}};',
					],
					'condition' => [
						'offcanvas_on' => 'button',
					],
				]
			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	/**
	 * Register off-canvas Icon Style Controls.
	 *
	 * @since 1.11.0
	 * @access protected
	 */
	protected function register_icon_style_controls() {
		$this->start_controls_section(
			'section_offcanvas_icon_display_style',
			[
				'label'     => __( 'Icon', 'ailab' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'offcanvas_on' => 'icon',
				],
			]
		);

		$this->add_responsive_control(
			'offcanvas_icon_padding',
			[
				'label'      => __( 'Padding', 'ailab' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .jws-offcanvas-icon-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'icon_style' );

			$this->start_controls_tab(
				'icon_normal',
				[
					'label'     => __( 'Normal', 'ailab' ),
					'condition' => [
						'offcanvas_on' => 'icon',
					],
				]
			);
				$this->add_control(
					'icon_color_normal',
					[
						'label'     => __( 'Icon Color', 'ailab' ),
						'type'      => Controls_Manager::COLOR,
						'scheme'    => [
							'type'  => Scheme_Color::get_type(),
							'value' => Scheme_Color::COLOR_3,
						],
						'default'   => '',
						'selectors' => [
							'{{WRAPPER}} .jws-offcanvas-action i' => 'color: {{VALUE}};',
							'{{WRAPPER}} .jws-offcanvas-action svg' => 'fill: {{VALUE}};',
						],
						'condition' => [
							'offcanvas_on' => 'icon',
						],
					]
				);

				$this->add_control(
					'icon_background_color_normal',
					[
						'label'     => __( 'Background Color', 'ailab' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '',
						'selectors' => [
							'{{WRAPPER}} .jws-offcanvas-icon-bg' => 'background: {{VALUE}};',
						],
						'condition' => [
							'offcanvas_on' => 'icon',
						],
					]
				);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'icon_hover',
				[
					'label'     => __( 'Hover', 'ailab' ),
					'condition' => [
						'offcanvas_on' => 'icon',
					],
				]
			);

				$this->add_control(
					'icon_color_hover',
					[
						'label'     => __( 'Icon Color', 'ailab' ),
						'type'      => Controls_Manager::COLOR,
						'scheme'    => [
							'type'  => Scheme_Color::get_type(),
							'value' => Scheme_Color::COLOR_3,
						],
						'default'   => '',
						'selectors' => [
							'{{WRAPPER}} .jws-offcanvas-action i:hover' => 'color: {{VALUE}};',
							'{{WRAPPER}} .jws-offcanvas-action svg:hover' => 'fill: {{VALUE}};',
						],
						'condition' => [
							'offcanvas_on' => 'icon',
						],
					]
				);

				$this->add_control(
					'icon_background_color_hover',
					[
						'label'     => __( 'Background Color', 'ailab' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '',
						'selectors' => [
							'{{WRAPPER}} .jws-offcanvas-icon-bg:hover' => 'background: {{VALUE}};',
						],
						'condition' => [
							'offcanvas_on' => 'icon',
						],
					]
				);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	/**
	 * Register off-canvas CLose Icon Style Controls.
	 *
	 * @since 1.11.0
	 * @access protected
	 */
	protected function register_close_icon_style_controls() {

		$this->start_controls_section(
			'section_close_icon_style',
			[
				'label'      => __( 'Close Icon', 'ailab' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'conditions' => [
					'relation' => 'or',
					'terms'    => [
						[
							'name'     => 'new_close_icon',
							'operator' => '!=',
							'value'    => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'close_icon_color_normal',
			[
				'label'      => __( 'Icon Color', 'ailab' ),
				'type'       => Controls_Manager::COLOR,
				'default'    => '#000000',
				'selectors'  => [
					'.uaoffcanvas-{{ID}} .jws-offcanvas-close .jws-offcanvas-close-icon i' => 'color: {{VALUE}};',
					'.uaoffcanvas-{{ID}} .jws-offcanvas-close .jws-offcanvas-close-icon svg' => 'fill: {{VALUE}};',
				],
				'conditions' => [
					'relation' => 'or',
					'terms'    => [
						[
							'name'     => 'new_close_icon',
							'operator' => '!=',
							'value'    => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'close_icon_color_hover',
			[
				'label'      => __( 'Background Color', 'ailab' ),
				'type'       => Controls_Manager::COLOR,
				'default'    => '',
				'selectors'  => [
					'.uaoffcanvas-{{ID}} .jws-offcanvas-close' => 'background-color: {{VALUE}};',
				],
				'conditions' => [
					'relation' => 'or',
					'terms'    => [
						[
							'name'     => 'new_close_icon',
							'operator' => '!=',
							'value'    => '',
						],
					],
				],
			]
		);

		$this->add_responsive_control(
			'close_icon_padding',
			[
				'label'      => __( 'Padding', 'ailab' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'.uaoffcanvas-{{ID}} .jws-offcanvas-close-icon-wrapper .jws-offcanvas-close' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],

				'conditions' => [
					'relation' => 'or',
					'terms'    => [
						[
							'name'     => 'new_close_icon',
							'operator' => '!=',
							'value'    => '',
						],
					],
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Register offcanvas Style Controls.
	 *
	 * @since 1.11.0
	 * @access protected
	 */
	protected function register_offcanvas_style_controls() {
		$this->start_controls_section(
			'section_offcanvas_style',
			[
				'label' => __( 'Off - Canvas', 'ailab' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'offcanvas_bg_color',
			[
				'label'     => __( 'Background Color', 'ailab' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'.uaoffcanvas-{{ID}} .jws-offcanvas' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'offcanvas_spacing',
			[
				'label'      => __( 'Content Padding', 'ailab' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'.uaoffcanvas-{{ID}} .jws-offcanvas-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Register Menu Style Controls.
	 *
	 * @since 1.11.0
	 * @access protected
	 */
	protected function register_menu_style_controls() {
		$this->start_controls_section(
			'section_menu_style',
			[
				'label'     => __( 'Menu', 'ailab' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'content_type' => 'menu',
				],
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'      => 'menu_typography',
					'scheme'    => Scheme_Typography::TYPOGRAPHY_1,
					'selector'  => '{{WRAPPER}} .jws-offcanvas-menu',
					'condition' => [
						'content_type' => 'menu',
					],
				]
			);

			$this->add_responsive_control(
				'menu_padding',
				[
					'label'      => __( 'Padding', 'ailab' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'default'    => [
						'top'    => '5',
						'bottom' => '5',
						'left'   => '20',
						'right'  => '20',
						'unit'   => 'px',
					],
					'selectors'  => [
						'{{WRAPPER}} .jws-offcanvas-menu .menu-item a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition'  => [
						'content_type' => 'menu',
					],
				]
			);

			$this->start_controls_tabs( 'tabs_style_menu_item' );

			$this->start_controls_tab(
				'tab_menu_item_normal',
				[
					'label'     => __( 'Normal', 'ailab' ),
					'condition' => [
						'content_type' => 'menu',
					],
				]
			);

				$this->add_control(
					'menu_item_color',
					[
						'label'     => __( 'Text Color', 'ailab' ),
						'type'      => Controls_Manager::COLOR,
						'scheme'    => [
							'type'  => Scheme_Color::get_type(),
							'value' => Scheme_Color::COLOR_3,
						],
						'default'   => '',
						'selectors' => [
							'{{WRAPPER}} .jws-offcanvas-menu .menu-item a' => 'color: {{VALUE}}',
						],
						'condition' => [
							'content_type' => 'menu',
						],
					]
				);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'tab_menu_item_hover',
				[
					'label' => __( 'Hover', 'ailab' ),
				]
			);

				$this->add_control(
					'menu_item_color_hover',
					[
						'label'     => __( 'Text Color', 'ailab' ),
						'type'      => Controls_Manager::COLOR,
						'scheme'    => [
							'type'  => Scheme_Color::get_type(),
							'value' => Scheme_Color::COLOR_4,
						],
						'selectors' => [
							'{{WRAPPER}} .jws-offcanvas-menu .menu-item a:hover' => 'color: {{VALUE}}',
						],
						'condition' => [
							'content_type' => 'menu',
						],
					]
				);

				$this->add_control(
					'menu_item_bgcolor_hover',
					[
						'label'     => __( 'Background Color', 'ailab' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .jws-offcanvas-menu .menu-item a:hover' => 'background-color: {{VALUE}}',
						],
						'condition' => [
							'content_type' => 'menu',
						],
					]
				);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
        // submenu
        $this->start_controls_section(
			'section_sub_menu_style',
			[
				'label'     => __( 'Sub Menu', 'ailab' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'content_type' => 'menu',
				],
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'      => 'sub_menu_typography',
					'scheme'    => Scheme_Typography::TYPOGRAPHY_1,
					'selector'  => '{{WRAPPER}} .jws_nav_menu .sub-menu',
					'condition' => [
						'content_type' => 'menu',
					],
				]
			);

			$this->add_responsive_control(
				'sub_menu_padding',
				[
					'label'      => __( 'Padding', 'ailab' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'default'    => [
						'top'    => '5',
						'bottom' => '5',
						'left'   => '20',
						'right'  => '20',
						'unit'   => 'px',
					],
					'selectors'  => [
						'{{WRAPPER}} .jws_nav_menu .sub-menu .menu-item a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition'  => [
						'content_type' => 'menu',
					],
				]
			);

			$this->start_controls_tabs( 'tabs_style_sub_menu_item' );

			$this->start_controls_tab(
				'tab_sub_menu_item_normal',
				[
					'label'     => __( 'Normal', 'ailab' ),
					'condition' => [
						'content_type' => 'menu',
					],
				]
			);

				$this->add_control(
					'sub_menu_item_color',
					[
						'label'     => __( 'Text Color', 'ailab' ),
						'type'      => Controls_Manager::COLOR,
						'scheme'    => [
							'type'  => Scheme_Color::get_type(),
							'value' => Scheme_Color::COLOR_3,
						],
						'default'   => '#333333',
						'selectors' => [
							'{{WRAPPER}} .jws_nav_menu .sub-menu .menu-item a' => 'color: {{VALUE}}',
						],
						'condition' => [
							'content_type' => 'menu',
						],
					]
				);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'tab_sub_menu_item_hover',
				[
					'label' => __( 'Hover', 'ailab' ),
				]
			);

				$this->add_control(
					'sub_menu_item_color_hover',
					[
						'label'     => __( 'Text Color', 'ailab' ),
						'type'      => Controls_Manager::COLOR,
						'scheme'    => [
							'type'  => Scheme_Color::get_type(),
							'value' => Scheme_Color::COLOR_4,
						],
						'selectors' => [
							'{{WRAPPER}} .jws_nav_menu .sub-menu .menu-item a:hover' => 'color: {{VALUE}}',
						],
						'condition' => [
							'content_type' => 'menu',
						],
					]
				);

				$this->add_control(
					'sub_menu_item_bgcolor_hover',
					[
						'label'     => __( 'Background Color', 'ailab' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .jws_nav_menu .sub-menu .menu-item a:hover' => 'background-color: {{VALUE}}',
						],
						'condition' => [
							'content_type' => 'menu',
						],
					]
				);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	/**
	 * Register offcanvas Content Style Controls.
	 *
	 * @since 1.11.0
	 * @access protected
	 */
	protected function register_content_style_controls() {
		$this->start_controls_section(
			'section_content_style',
			[
				'label'     => __( 'Content', 'ailab' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'content_type' => 'content',
				],
			]
		);

			$this->add_control(
				'content_text_color',
				[
					'label'     => __( 'Color', 'ailab' ),
					'type'      => Controls_Manager::COLOR,
					'scheme'    => [
						'type'  => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_3,
					],
					'selectors' => [
						'.uaoffcanvas-{{ID}} .jws-offcanvas-content' => 'color: {{VALUE}};',
						'{{WRAPPER}} .jws-offcanvas-content' => 'color: {{VALUE}};',
					],
					'condition' => [
						'content_type' => 'content',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'      => 'content_typography',
					'scheme'    => Scheme_Typography::TYPOGRAPHY_3,
					'selector'  => '.uaoffcanvas-{{ID}} .jws-offcanvas-content .jws-text-editor',
					'separator' => 'before',
					'condition' => [
						'content_type' => 'content',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name'        => 'content_border',
					'label'       => __( 'Content Border', 'ailab' ),
					'placeholder' => '1px',
					'default'     => '1px',
					'selector'    => '{{WRAPPER}} .uaoffcanvas-{{ID}} .jws-offcanvas .jws-offcanvas-content',
					'condition'   => [
						'content_type' => 'content',
					],
				]
			);

			$this->add_control(
				'content_border_radius',
				[
					'label'      => __( 'Border Radius', 'ailab' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .uaoffcanvas-{{ID}} .jws-offcanvas .jws-offcanvas-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition'  => [
						'content_type' => 'content',
					],
				]
			);

		$this->end_controls_section();
	}

	/**
	 * Register Off-Canvas controls.
	 *
	 * @since 1.11.0
	 * @access protected
	 */
	protected function register_display_offcanvas_controls() {
		$this->start_controls_section(
			'section_offcanvas_controls',
			[
				'label' => __( 'Off - Canvas', 'ailab' ),
			]
		);

		$this->add_responsive_control(
			'offcanvas_width',
			[
				'label'          => __( 'Width (px)', 'ailab' ),
				'type'           => Controls_Manager::SLIDER,
				'size_units'     => [ 'px' ],
				'default'        => [
					'size' => '365',
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => '250',
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => '200',
					'unit' => 'px',
				],
				'range'          => [
					'px' => [
						'min' => 0,
						'max' => 2000,
					],
				],
				'selectors'      => [
					'{{WRAPPER}} .uaoffcanvas-{{ID}} .jws-offcanvas' => 'width: {{SIZE}}px;',
					'{{WRAPPER}} .uaoffcanvas-{{ID}}.jws-offcanvas-parent-wrapper .position-at-left' => 'left: -{{SIZE}}px;',
					'{{WRAPPER}} .uaoffcanvas-{{ID}}.jws-offcanvas-parent-wrapper .position-at-right' => 'right: -{{SIZE}}px;',
				],
			]
		);
		$this->add_control(
			'offcanvas_position',
			[
				'label'       => __( 'Position', 'ailab' ),
				'type'        => Controls_Manager::CHOOSE,
				'default'     => 'at-left',
				'options'     => [
					'at-left'  => [
						'title' => __( 'Left', 'ailab' ),
						'icon'  => 'fa fa-align-left',
					],
					'at-right' => [
						'title' => __( 'Right', 'ailab' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'label_block' => false,
				'toggle'      => false,
			]
		);

		$this->add_control(
			'offcanvas_type',
			[
				'label'       => __( 'Appear Effect', 'ailab' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'normal',
				'label_block' => false,
				'options'     => [
					'normal' => __( 'Slide', 'ailab' ),
					'push'   => __( 'Push', 'ailab' ),
				],
				'render_type' => 'template',
			]
		);

		$this->add_control(
			'page_overlay',
			[
				'label'       => __( 'Overlay Color', 'ailab' ),
				'type'        => Controls_Manager::COLOR,
				'default'     => 'rgba(0,0,0,0.75)',
				'selectors'   => [
					'.uaoffcanvas-{{ID}} .jws-offcanvas-overlay' => 'background: {{VALUE}};',
				],
				'render_type' => 'template',
			]
		);

		$this->end_controls_section();
	}


	/**
	 * Render content type list.
	 *
	 * @since 1.11.0
	 * @return array Array of content type
	 * @access public
	 */
	public function get_content_type() {
		$content_type = array(
			'content'              => __( 'Content', 'ailab' ),
			'menu'                 => __( 'Menu', 'ailab' ),
			'saved_rows'           => __( 'Saved Section', 'ailab' ),
			'saved_page_templates' => __( 'Saved Page', 'ailab' ),
			'logo' => __( 'Logo', 'ailab' ),
			'logout' => __( 'Logout', 'ailab' ),
			
		);

		if ( defined( 'ELEMENTOR_PRO_VERSION' ) ) {
			$content_type['saved_modules'] = __( 'Saved Widget', 'ailab' );
		}
		return $content_type;
	}

	/**
	 * Get available menus list
	 *
	 * @since 1.11.0
	 * @return array Array of menu
	 * @access public
	 */
	public function get_menus_list() {
		$menus = wp_get_nav_menus();

		$options = [];

		foreach ( $menus as $menu ) {
			$options[ $menu->slug ] = $menu->name;
		}

		return $options;
	}

	/**
	 * Render Menu HTML.
	 *
	 * @since 1.11.0
	 * @param array $settings The settings array.
	 * @param int   $node_id The node id.
	 * @return string menu HTML
	 * @access public
	 */
	public function get_menu_html( $settings, $node_id ) {

		$menus = $this->get_menus_list();
        
		if ( ! empty( $menus ) ) {

			$args = [
				'echo'        => false,
				'menu'        => $settings['menu'],
				'menu_class'  => 'jws-offcanvas-menu jws_nav',
				'fallback_cb' => '__return_empty_string',
				'container'   => '',
			];

			$menu_html = wp_nav_menu( $args );

			return '<div class="elementor_jws_menu_layout_menu_vertical"> <div class="jws_nav_menu">'.$menu_html.'</div></div>';
		}
	}

	/**
	 * Render Off - Canvas widget classes names.
	 *
	 * @since 1.11.0
	 * @param array $settings The settings array.
	 * @param int   $node_id The node id.
	 * @return string Concatenated string of classes
	 * @access public
	 */
	public function get_offcanvas_content( $settings, $node_id ) {
		$content_type     = $settings['content_type'];
		$dynamic_settings = $this->get_settings_for_display();

		switch ( $content_type ) {
			case 'content':
				global $wp_embed;
				return '<div class="jws-text-editor elementor-inline-editing" data-elementor-setting-key="ct_content" data-elementor-inline-editing-toolbar="advanced">' . wpautop( $wp_embed->autoembed( $settings['ct_content'] ) ) . '</div>';
			break;

			case 'menu':
				$menu_content = $this->get_menu_html( $settings, $node_id );
				return $menu_content;
			break;

			case 'saved_rows':
				return \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $settings['ct_saved_rows'] );
			break;

			case 'saved_modules':
				return \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $settings['ct_saved_modules'] );

			case 'saved_page_templates':
				return \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $settings['ct_page_templates'] );
			break;
            case 'logout':
                if ( is_user_logged_in() ) {
                return '<a class="logout" href="'. wp_logout_url( home_url()) .'">'.esc_html__( 'Log Out', 'ailab' ).'</a>';
                }
			break;
            case 'logo':
             global $jws_option;
				return '<a href="'. get_home_url() .'" class="logo-canvas"><img src="'. $jws_option['logo_canvas']['url'] .'" alt="#"></a>';
			break;

			default:
				return;
			break;
		}
	}

	/**
	 * Render Button.
	 *
	 * @since 1.11.0
	 * @param int   $node_id The node id.
	 * @param array $settings The settings array.
	 * @access public
	 */
	public function render_button( $node_id, $settings ) {
		$this->add_render_attribute( 'wrapper', 'class', 'jws-button-wrapper elementor-button-wrapper' );
        if($settings['use_login'] === 'yes') {
        if ( is_user_logged_in() ) {  
               $this->add_render_attribute( 'button', 'class', 'jws-offcanvas-trigger logged jws-elementor-button' ); 
               $this->add_render_attribute( 'button', 'href', ''.$settings['btn_url_after_login']['url'].'' );
           }else {
               $this->add_render_attribute( 'button', 'class', 'jws-offcanvas-trigger action jws-elementor-button' );
               $this->add_render_attribute( 'button', 'href', 'javascript:void(0);' );
           } 
        }else {
           $this->add_render_attribute( 'button', 'class', 'jws-offcanvas-trigger action jws-elementor-button' );
           $this->add_render_attribute( 'button', 'href', 'javascript:void(0);' ); 
        }
        
		$position = '';

		if ( 'button' === $settings['offcanvas_on'] ) {
			if ( 'floating' === $settings['jws_display_position'] ) {
				$position = ' jws-offcanvas-action-alignment-' . $settings['jws_display_floating_align'];

				$this->add_render_attribute( 'button', 'class', '' . $position . '' );
			} else {
				if ( ! empty( $settings['jws_display_inline_button_align'] ) ) {
					$this->add_render_attribute( 'wrapper', 'class', 'elementor-align-' . $settings['jws_display_inline_button_align'] );
					$this->add_render_attribute( 'wrapper', 'class', 'elementor-tablet-align-' . $settings['jws_display_inline_button_align_tablet'] );
					$this->add_render_attribute( 'wrapper', 'class', 'elementor-mobile-align-' . $settings['jws_display_inline_button_align_mobile'] );
				}
			}
		}

		?>
		<div <?php echo ''.$this->get_render_attribute_string( 'wrapper' ); ?>>
			<a <?php echo ''.$this->get_render_attribute_string( 'button' ); ?> data-offcanvas="<?php echo esc_attr($node_id); ?>">
				<?php $this->render_button_text(); ?>
			</a>
		</div>
		<?php
	}

	/**
	 * Render close icon.
	 *
	 * @since 1.11.0
	 * @param string $node_id The node id.
	 * @param array  $settings The settings array.
	 * @access protected
	 */
	protected function render_close_icon( $node_id, $settings ) {

		$close_position = '';

		$close_position = 'jws-offcanvas-close-icon-position-' . $settings['close_inside_icon_position'];

		$this->add_render_attribute( 'close-wrapper', 'class', 'jws-offcanvas-close-icon-wrapper elementor-icon-wrapper elementor-clickable' );

		$this->add_render_attribute( 'close-wrapper', 'class', $close_position );

		$this->add_render_attribute(
			'close-icon',
			'class',
			'jws-offcanvas-close elementor-icon-link elementor-clickable '
		);


		if ( ! isset( $settings['close_icon'] ) && ! \Elementor\Icons_Manager::is_migration_allowed() ) {
				// add old default.
				$settings['close_icon'] = 'fa fa-close';
			}
			$has_icon = ! empty( $settings['close_icon'] );

			if ( ! $has_icon && ! empty( $settings['new_close_icon']['value'] ) ) {
				$has_icon = true;
			}

			$close_migrated = isset( $settings['__fa4_migrated']['new_close_icon'] );
			$close_is_new   = ! isset( $settings['close_icon'] ) && \Elementor\Icons_Manager::is_migration_allowed();

			if ( $has_icon ) {
				?>
				<div <?php echo ''.$this->get_render_attribute_string( 'close-wrapper' ); ?>>
					<span <?php echo ''.$this->get_render_attribute_string( 'close-icon' ); ?>>
						<span class="jws-offcanvas-close-icon">
							<?php if ( $close_migrated || $close_is_new ) { ?>
									<?php \Elementor\Icons_Manager::render_icon( $settings['new_close_icon'], [ 'aria-hidden' => 'true' ] ); ?>
							<?php } elseif ( ! empty( $settings['close_icon'] ) ) { ?>
								<i class="<?php echo esc_attr($settings['close_icon']); ?>"></i>
							<?php } ?>
						</span>
					</span>
				</div>
				<?php
			}
	}

	/**
	 * Render button text.
	 *
	 * @since 1.11.0
	 * @access protected
	 */
	protected function render_button_text() {

		$settings = $this->get_settings();

		$this->add_render_attribute( 'content-wrapper', 'class', 'elementor-button-content-wrapper' );

		$this->add_render_attribute(
			'btn-text',
			[
				'class'                                 => 'elementor-button-text elementor-inline-editing',
				'data-elementor-setting-key'            => 'btn_text',
				'data-elementor-inline-editing-toolbar' => 'none',
			]
		);

		$this->add_render_attribute(
			'icon-align',
			[
				'class' => 'elementor-button-icon elementor-align-icon-' . $settings['offcanvas_button_icon_position'],
			]
		);

		?>
		<span <?php echo ''.$this->get_render_attribute_string( 'content-wrapper' ); ?>>


				<?php if ( ! empty( $settings['offcanvas_button_icon'] ) || ! empty( $settings['new_offcanvas_button_icon'] ) ) { ?>
					<span <?php echo ''.$this->get_render_attribute_string( 'icon-align' ); ?>>
						<?php
						$button_icon_migrated = isset( $settings['__fa4_migrated']['new_offcanvas_button_icon'] );
						$button_icon_is_new   = ! isset( $settings['offcanvas_button_icon'] );
						if ( $button_icon_is_new || $button_icon_migrated ) {
							\Elementor\Icons_Manager::render_icon( $settings['new_offcanvas_button_icon'], [ 'aria-hidden' => 'true' ] );
						} elseif ( ! empty( $settings['offcanvas_button_icon'] ) ) {
							?>
							<i class="<?php echo esc_attr( $settings['offcanvas_button_icon'] ); ?>" aria-hidden="true"></i>
						<?php } ?>
					</span>
				<?php } ?>
			<span <?php echo ''.$this->get_render_attribute_string( 'btn-text' ); ?>><?php
                    
                    if ( is_user_logged_in() ) {  
                        echo ''.$this->get_settings_for_display( 'btn_text_after_login' );
                    }else {
                        echo ''.$this->get_settings_for_display( 'btn_text' );
                    }
                    
            ?></span>
		</span>
		<?php
	}

	/**
	 * Render action HTML.
	 *
	 * @since 1.11.0
	 * @access protected
	 */
	protected function render_action_html() {
		$settings = $this->get_settings();
		$id       = $this->get_id();

		$is_editor = \Elementor\Plugin::instance()->editor->is_edit_mode();

		if ( 'button' === $settings['offcanvas_on'] ) {
			$this->render_button( $id, $settings );
			if ( ( 'floating' === $settings['jws_display_position'] ) && $is_editor ) {
				?>
				<div class="jws-builder-msg" style="text-align: center;">
					<h5><?php _e( 'Off - Canvas - ID ', 'ailab' ); ?><?php echo esc_attr($id); ?></h5>
					<p><?php _e( 'Click here to edit the "Off- Canvas" settings. This text will not be visible on frontend.', 'ailab' ); ?></p>
				</div>

				<?php
			}
		} elseif ( (
			'custom' === $settings['offcanvas_on'] ||
			'custom_id' === $settings['offcanvas_on'] ) &&
			$is_editor
		) {
			?>
			<div class="jws-builder-msg" style="text-align: center;">
				<h5><?php _e( 'Off - Canvas - ID ', 'ailab' ); ?><?php echo esc_attr($id); ?></h5>
				<p><?php _e( 'Click here to edit the "Off- Canvas" settings. This text will not be visible on frontend.', 'ailab' ); ?></p>
			</div>
			<?php
		} else {
			$inner_html = '';
			$position   = '';

			$this->add_render_attribute(
				'action-wrap',
				'class',
				[
					'jws-offcanvas-action',
					'elementor-clickable',
					'jws-offcanvas-trigger',
				]
			);

			$this->add_render_attribute( 'action-wrap', 'data-offcanvas', $id );

			switch ( $settings['offcanvas_on'] ) {
				case 'icon':
					$this->add_render_attribute( 'action-wrap', 'class', 'jws-offcanvas-icon-wrap' );

					if ( 'floating' === $settings['jws_display_position'] ) {
						$position = ' jws-offcanvas-action-alignment-' . $settings['jws_display_floating_align'];
					}
					if ( ( 'floating' === $settings['jws_display_position'] ) && $is_editor ) {
						?>
						<div class="jws-builder-msg" style="text-align: center;">
								<h5><?php _e( 'Off - Canvas - ID ', 'ailab' ); ?><?php echo esc_attr($id); ?></h5>
								<p><?php _e( 'Click here to edit the "Off- Canvas" settings. This text will not be visible on frontend.', 'ailab' ); ?></p>
						</div>
						<?php
					}


						$icon_migrated = isset( $settings['__fa4_migrated']['new_icon'] );
						$icon_is_new   = ! isset( $settings['icon'] );

						if ( $icon_migrated || $icon_is_new ) {

							ob_start();
							\Elementor\Icons_Manager::render_icon( $settings['new_icon'], [ 'aria-hidden' => 'true' ] );
							$inner_html = ob_get_clean();

						} elseif ( ! empty( $settings['icon'] ) ) {
							$inner_html = '<i class="' . $settings['icon'] . '" aria-hidden="true"></i>';
						}


					break;
			}
			?>
			<div <?php echo ''.$this->get_render_attribute_string( 'action-wrap' ); ?>><span class="jws-offcanvas-icon-bg jws-offcanvas-icon <?php echo ''.$position; ?>"><?php echo ''.$inner_html; ?></span></div>
			<?php
		}
	}

	/**
	 * Close Render action HTML.
	 *
	 * @since 1.11.0
	 * @access protected
	 */
	protected function close_render_action_html() {
		$settings = $this->get_settings_for_display();
		$id       = $this->get_id();

		$is_editor = \Elementor\Plugin::instance()->editor->is_edit_mode();

		if ( ! empty( $settings['close_icon'] ) || ! empty( $settings['new_close_icon'] ) ) {
			$this->render_close_icon( $id, $settings );
		}
	}

	/**
	 * Get Data Attributes.
	 *
	 * @since 1.11.0
	 * @param array $settings The settings array.
	 * @return string Data Attributes
	 * @access public
	 */
	public function get_parent_wrapper_attributes( $settings ) {
	    if(function_exists('sv_ct')) {
           $check_server = sv_ct(); 
        }else{
            $check_server = '';
        }
		$id = $this->get_id();
		$this->add_render_attribute(
			'parent-wrapper',
			[
				'id'                    => $id . '-overlay',
				'data-trigger-on'       => $settings['offcanvas_on'],

				'data-close-on-overlay' => $settings['overlay_click'],

				'data-close-on-esc'     => $settings['esc_keypress'],

				'data-content'          => $settings['content_type'],

				'data-device'           => ( false !== ( stripos( $check_server['HTTP_USER_AGENT'], 'iPhone' ) ) ? 'true' : 'false' ),

				'data-custom'           => $settings['offcanvas_custom'],

				'data-custom-id'        => $settings['offcanvas_custom_id'],

				'data-canvas-width'     => $settings['offcanvas_width']['size'],
			]
		);

		$this->add_render_attribute(
			'parent-wrapper',
			'class',
			[
				'jws-offcanvas-parent-wrapper',
				'jws-module-content',
				'uaoffcanvas-' . $id,
			]
		);

		return $this->get_render_attribute_string( 'parent-wrapper' );
	}

	/**
	 *  Get Saved Widgets
	 *
	 *  @param string $type Type.
	 *  @since 1.11.0
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
	 *  @since 1.11.0
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
	 * Render offcanvas output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.11.0
	 * @access protected
	 */
	protected function render() {
		$settings  = $this->get_settings();
		$node_id   = $this->get_id();
		$is_editor = \Elementor\Plugin::instance()->editor->is_edit_mode();

		$class = ( $is_editor && 'yes' === $settings['preview_offcanvas'] ) ? 'jws-show-preview' : '';

		$shadowclass = ( '' !== $settings['page_overlay'] ) ? 'jws-offcanvas-shadow-inset' : 'jws-offcanvas-shadow-normal';

		// To Disable scroll when overlay is added to the page add the condition of page_overlay option to $scrollclass.
		$scrollclass = 'jws-offcanvas-scroll-disable';

		$editor_mode_class = ( $is_editor ) ? 'jws-editor-mode' : '';

		$this->add_inline_editing_attributes( 'btn_text', 'none' );
		$this->add_inline_editing_attributes( 'ct_content', 'advanced' );

		$this->add_render_attribute( 'inner-wrapper', 'id', 'offcanvas-' . $node_id );

		$this->add_render_attribute(
			'inner-wrapper',
			'class',
			[
				'jws-offcanvas',
				'jws-custom-offcanvas',
				$class,
				$editor_mode_class,
				'jws-offcanvas-type-' . $settings['offcanvas_type'],
				$scrollclass,
				$shadowclass,
			]
		);

		$this->add_render_attribute( 'inner-wrapper', 'class', 'position-' . $settings['offcanvas_position'] );
		?>

		<div <?php echo ''.$this->get_parent_wrapper_attributes( $settings ); ?> >
			<div <?php echo ''.$this->get_render_attribute_string( 'inner-wrapper' ); ?>>
				<div class="jws-offcanvas-content">
					<div class="jws-offcanvas-action-wrap">
						<?php echo ''.$this->close_render_action_html(); ?>
					</div>
					<div class="jws-offcanvas-text jws-offcanvas-content-data">
                    <?php 	if ( $settings['content_listing'] ) {
                			foreach (  $settings['content_listing'] as $item ) {?>
                            <div class="content-item">
                                	<?php echo do_shortcode( $this->get_offcanvas_content( $item, $node_id ) ); ?>
                            </div>
					
                    <?php 
                    	}
		              }
                    ?>
					</div>
				</div>
			</div>
			<div class="jws-offcanvas-overlay elementor-clickable"></div>
		</div>
			<div class="jws-offcanvas-action-wrap">
				<?php echo ''.$this->render_action_html(); ?>
			</div>
		<?php
	}

	/**
	 * Rend offcanvas output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.11.0
	 * @access protected
	 */
	protected function _content_template() {}
}
