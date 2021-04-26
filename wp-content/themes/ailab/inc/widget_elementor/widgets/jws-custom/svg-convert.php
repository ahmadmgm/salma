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
class JwsSVG_Convert extends Widget_Base
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
        return 'jws-svg-convert';
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
        return esc_html__('Jws SVG Convert Image', 'ailab');
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
            'image_convert',
            [
                'label' => esc_html__('Choose Image', 'ailab'),
                'type' => Controls_Manager::MEDIA,
                
            ]
        );
        $this->add_responsive_control(
				'svg_width',
				[
					'label' 		=> esc_html__( 'SVG Width', 'ailab' ),
					'type' 			=> Controls_Manager::SLIDER,
					'range' 		=> [
						'px' 		=> [
							'min' => 1,
							'max' => 300,
							'step' => 1,
						],
					],
					'selectors' 	=> [
						'{{WRAPPER}} .jws-svg svg' => 'max-width: {{SIZE}}px;height:auto;',
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
				'label' =>esc_html__( 'Link', 'ailab' ),
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
        ?>
        <div class="jws-svg">
             <svg xmlns="http://www.w3.org/2000/svg" width="712" height="542" viewBox="0 0 712 542">

            <defs>
                <style>
                  .cls-1 {
                    fill-rule: evenodd;
                  }
                </style>
              </defs>
              <clipPath id="clipShape2">
            													<path class="item__clippath" d="" />
                            <path fill="" d="">
                <animate repeatCount="indefinite" attributeName="d" dur="3s" values="M405,0C562.4,0,854.441,272.758,630,365,456.674,436.234,481.068,563.915,325,539-158.454,461.819,7,5.4,129,57,273.968,118.313,247.6,0,405,0Z;M405,0C570.256,4.24,832.675,201.341,647.272,374.324,540.822,473.644,481.068,563.915,325,539-158.454,461.819,7,105.4,129,57,275.308-1.045,247.651-4.039,405,0Z;M405,0C562.4,0,854.441,272.758,630,365,456.674,436.234,481.068,563.915,325,539-158.454,461.819,7,5.4,129,57,273.968,118.313,247.6,0,405,0Z"/>
            
                </path>
            				
              </clipPath>
				<g class="item__deco">
					<use xlink:href="#deco2" />
				</g>
				<g clip-path="url(#clipShape2)">
					<image class="item__img" xlink:href="<?php echo esc_url($settings['image_convert']['url']) ?>" x="0" y="-99" height="800px" width="800px" />
				</g>
            </svg>
        </div>
       
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
