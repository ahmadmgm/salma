<?php
namespace ElementorHelloWorld\Widgets\JwsCustom;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

/**
 * Elementor image widget.
 *
 * Elementor widget that displays an image into the page.
 *
 * @since 1.0.0
 */
class JwsLogo extends Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve image widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'jws-logo';
    }

    /**
     * Get widget title.
     *
     * Retrieve image widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Jws-logo', 'ailab');
    }

    /**
     * Get widget icon.
     *
     * Retrieve image widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-image';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the image widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * @since 2.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return [ 'basic' ];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the widget belongs to.
     *
     * @since 2.1.0
     * @access public
     *
     * @return array Widget keywords.
     */


    /**
     * Register image widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_image',
            [
                'label' => esc_html__('Image', 'ailab'),
            ]
        );

        $this->add_control(
            'image_logo',
            [
                'label' => esc_html__('Choose Image', 'ailab'),
                'type' => Controls_Manager::MEDIA,
                
            ]
        );
        $this->add_responsive_control(
				'logo_width',
				[
					'label' 		=> esc_html__( 'Logo Width', 'ailab' ),
					'type' 			=> Controls_Manager::SLIDER,
					'range' 		=> [
						'px' 		=> [
							'min' => 1,
							'max' => 300,
							'step' => 1,
						],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 147,
                    ],
					'selectors' 	=> [
						'{{WRAPPER}} img' => 'max-width: {{SIZE}}px;height:auto;',
					],
				]
		);
        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Alignment', 'ailab'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'ailab'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'ailab'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'ailab'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'ailab' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'ailab' ),
			]
		);
    }

    /**
     * Render image widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        global $jws_option;
        if (isset($settings['image_logo']['url']) && $settings['image_logo']['url'] != "") {
            echo  '<a href="'. $settings['link']['url'] .'"><img src="'. $settings['image_logo']['url'] .'" alt="#"></a>';
        }else if (isset($jws_option['logo']['url']) && !empty($jws_option['logo']['url'])) {
            echo  '<a href="'. $settings['link']['url'] .'"><img src="'. $jws_option['logo']['url'] .'" alt="#"></a>';
        }else{
            echo  '<a href="'. $settings['link']['url'] .'" class="logo-text">'. $jws_option['logo_text'] .'</a>';
        }
        ?>
        <?php
    }

    /**
     * Render image widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _content_template()
    {
    }
}
