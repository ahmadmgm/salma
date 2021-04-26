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
class JWS_Twitter extends Widget_Base
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
        return 'jws-twitter';
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
        return esc_html__('Jws Twitter', 'ailab');
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
		'account',
		[
			'label' => __( 'Twitter account setting', 'ailab' ),
		]
		);
        $this->add_control(
			'consumer_key',
			[
				'label' => esc_html__( 'Consumer Key', 'ailab' ),
				'type' => Controls_Manager::TEXT,

				'default' => esc_html__( 'DwidbScOnZ9uC4j3vH3r9LfPe', 'ailab' ),
				'description' => '<a href="http://www.jetseotools.com/instagram-access-token/" class="jws-btn" target="_blank">Get Access Token</a>', 'ailab',
			]
		);
        $this->add_control(
			'consumer_secret',
			[
				'label' => esc_html__( 'Consumer Secret', 'ailab' ),
				'type' => Controls_Manager::TEXT,

				'default' => esc_html__( 'mb1OIR1vM7jCUzXOXERV0YgiM2rq0qlPMs3IsaRygH3kq0QM1h', 'ailab' ),
				'description' => '<a href="http://www.jetseotools.com/instagram-access-token/" class="jws-btn" target="_blank">Get Access Token</a>', 'ailab',
			]
		);
        $this->add_control(
			'access_token',
			[
				'label' => esc_html__( 'Access Token', 'ailab' ),
				'type' => Controls_Manager::TEXT,

				'default' => esc_html__( '413952215-ZlCTKBxkkD0SWCN8hDwpPec6OdIZvCH8cLfXwDEA', 'ailab' ),
				'description' => '<a href="http://www.jetseotools.com/instagram-access-token/" class="jws-btn" target="_blank">Get Access Token</a>', 'ailab',
			]
		);
        $this->add_control(
			'access_token_secret',
			[
				'label' => esc_html__( 'Access Token Secret', 'ailab' ),
				'type' => Controls_Manager::TEXT,

				'default' => esc_html__( 'ClmPWNy9nGOQs40j0Bn3lIMyDFfAFWCYwd2BlMRkxjzmv', 'ailab' ),
				'description' => '<a href="http://www.jetseotools.com/instagram-access-token/" class="jws-btn" target="_blank">Get Access Token</a>', 'ailab',
			]
		);
        
        $this->end_controls_section();
        
        	$this->start_controls_section(
    		'content',
    		[
    			'label' => __( 'Twitter show setting', 'ailab' ),
    		]
    		);
            $this->add_control(
			'number_post',
			[
				'label' => __( 'Number Posts to show', 'ailab' ),
				'type' => Controls_Manager::NUMBER,
                'default' => '2',
    			]
    		  );
            $this->add_control(
    			'show_content',
    			[
    				'label' => __( 'Show Content', 'ailab' ),
    				'type' => Controls_Manager::SWITCHER,
    				'default' => 'yes',
    				'label_off' => __( 'Off', 'ailab' ),
    				'label_on' => __( 'On', 'ailab' ),
    			]
    		);
            $this->add_control(
			'posts_per_words',
			[
				'label' => __( 'Posts Per Words', 'ailab' ),
				'type' => Controls_Manager::NUMBER,
                'default' => '100',
			]
		  );
            $this->add_control(
    			'show_author',
    			[
    				'label' => __( 'Show author', 'ailab' ),
    				'type' => Controls_Manager::SWITCHER,
    				'default' => 'yes',
    				'label_off' => __( 'Off', 'ailab' ),
    				'label_on' => __( 'On', 'ailab' ),
    			]
    		);
            $this->add_control(
    			'show_icon',
    			[
    				'label' => __( 'Show Icon', 'ailab' ),
    				'type' => Controls_Manager::SWITCHER,
    				'default' => 'yes',
    				'label_off' => __( 'Off', 'ailab' ),
    				'label_on' => __( 'On', 'ailab' ),
    			]
    		);
            $this->add_control(
    			'show_hashtag',
    			[
    				'label' => __( 'Show Hashtag', 'ailab' ),
    				'type' => Controls_Manager::SWITCHER,
    				'default' => 'yes',
    				'label_off' => __( 'Off', 'ailab' ),
    				'label_on' => __( 'On', 'ailab' ),
    			]
    		);
            $this->add_control(
    			'show_link',
    			[
    				'label' => __( 'Show Link', 'ailab' ),
    				'type' => Controls_Manager::SWITCHER,
    				'default' => 'yes',
    				'label_off' => __( 'Off', 'ailab' ),
    				'label_on' => __( 'On', 'ailab' ),
    			]
    		);
            $this->add_control(
    			'show_meta',
    			[
    				'label' => __( 'Show Meta', 'ailab' ),
    				'type' => Controls_Manager::SWITCHER,
    				'default' => 'no',
    				'label_off' => __( 'Off', 'ailab' ),
    				'label_on' => __( 'On', 'ailab' ),
    			]
    		);
        $this->end_controls_section();

        
		// style 

		$this->start_controls_section(

			'post_section',

			[

				'label' => __( 'Post_style', 'ailab' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);

		

		$this->add_responsive_control(

			'align',

			[

				'label' => __( 'Alignment', 'ailab' ),

				'type' => Controls_Manager::CHOOSE,

				'options' => [

					'left' => [

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

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .jws-theme-tweet' => 'text-align: {{VALUE}};',

				],

			]

		);



		
		$this->add_responsive_control(

			'post_margin',

			[

				'label' => __( 'Post Margin', 'ailab' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .jws-theme-tweet' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

		);



		$this->add_responsive_control(

			'post_padding',

			[

				'label' => __( 'Post Padding', 'ailab' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .jws-theme-tweet' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

        );
         $this->end_controls_section();

		// Text content 

		$this->start_controls_section(

			'content_style',

			[

				'label' => __( 'Content style', 'ailab' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);
     	$this->add_responsive_control(
            'align_content',

			[

				'label' => __( 'Alignment', 'ailab' ),

				'type' => Controls_Manager::CHOOSE,

				'options' => [

					'left' => [

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

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .jws-theme-content .jws-theme-tweet-text' => 'text-align: {{VALUE}};',

				],

			]

		);



		
		$this->add_responsive_control(

			'content_margin',

			[

				'label' => __( 'Post Margin', 'ailab' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .jws-theme-content .jws-theme-tweet-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

		);



		$this->add_responsive_control(

			'content_padding',

			[

				'label' => __( 'Post Padding', 'ailab' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .jws-theme-content .jws-theme-tweet-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

        );
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typographycontent',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .jws-theme-content .jws-theme-tweet-text',
			]
		);
        $this->start_controls_tabs( 'tabs_post_style' );
		$this->start_controls_tab(
			'tab_post_normal',
			[
				'label' => __( 'Normal', 'ailab' ),
			]
		);

		$this->add_control(
			'text_color_post',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .jws-theme-content .jws-theme-tweet-text' => 'color: {{VALUE}};',
				],
			]
		);

		
		$this->add_control(
			'background_color_post',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .jws-theme-content .jws-theme-tweet-text' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_post_hover',
			[
				'label' => __( 'Hover', 'ailab' ),
			]
		);

		$this->add_control(
			'hover_post_color',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws-theme-content .jws-theme-tweet-text:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'post_background_hover_color',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws-theme-content .jws-theme-tweet-text:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
        
		$this->end_controls_tab();
		$this->end_controls_tabs();
        
        $this->end_controls_section();
        //end text content
        
        //icon 
        $this->start_controls_section(

			'icon_style',

			[

				'label' => __( 'Icon style', 'ailab' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);
     	$this->add_responsive_control(
            'align_icon',

			[

				'label' => __( 'Alignment', 'ailab' ),

				'type' => Controls_Manager::CHOOSE,

				'options' => [

					'left' => [

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

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .jws-theme-tweet .jws-theme-icon' => 'text-align: {{VALUE}};',

				],

			]

		);



		
		$this->add_responsive_control(

			'icon_margin',

			[

				'label' => __( 'Icon Margin', 'ailab' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .jws-theme-tweet .jws-theme-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

		);



		$this->add_responsive_control(

			'icon_padding',

			[

				'label' => __( 'Icon Padding', 'ailab' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .jws-theme-tweet .jws-theme-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

        );
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typographyicon',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .jws-theme-icon',
			]
		);
        $this->start_controls_tabs( 'tabs_icon_style' );
		$this->start_controls_tab(
			'tab_icon_normal',
			[
				'label' => __( 'Normal', 'ailab' ),
			]
		);

		$this->add_control(
			'icon_color_post',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .jws-theme-icon' => 'color: {{VALUE}};',
				],
			]
		);

		
		$this->add_control(
			'background_color_icon',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .jws-theme-icon' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_icon_hover',
			[
				'label' => __( 'Hover', 'ailab' ),
			]
		);

		$this->add_control(
			'hover_icon_color',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws-theme-icon:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_background_hover_color',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws-theme-icon:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
        
		$this->end_controls_tab();
		$this->end_controls_tabs();
        
        $this->end_controls_section();
        //end icon
        //link 
        $this->start_controls_section(

			'link_style',

			[

				'label' => __( 'Link style', 'ailab' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);
     	$this->add_responsive_control(
            'align_link',

			[

				'label' => __( 'Alignment', 'ailab' ),

				'type' => Controls_Manager::CHOOSE,

				'options' => [

					'left' => [

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

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .jws-theme-tweet .jws-theme-link' => 'text-align: {{VALUE}};',

				],

			]

		);



		
		$this->add_responsive_control(

			'link_margin',

			[

				'label' => __( 'Icon Margin', 'ailab' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .jws-theme-tweet .jws-theme-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

		);



		$this->add_responsive_control(

			'link_padding',

			[

				'label' => __( 'Link Padding', 'ailab' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .jws-theme-tweet .jws-theme-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

        );
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typographylink',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .jws-theme-content .jws-theme-link',
			]
		);
        $this->start_controls_tabs( 'tabs_link_style' );
		$this->start_controls_tab(
			'tab_link_normal',
			[
				'label' => __( 'Normal', 'ailab' ),
			]
		);

		$this->add_control(
			'link_color',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .jws-theme-content .jws-theme-link' => 'color: {{VALUE}};',
				],
			]
		);

		
		$this->add_control(
			'background_color_link',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .jws-theme-content .jws-theme-link' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_link_hover',
			[
				'label' => __( 'Hover', 'ailab' ),
			]
		);

		$this->add_control(
			'hover_link_color',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws-theme-content .jws-theme-link:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'link_background_hover_color',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws-theme-content .jws-theme-link:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
        
		$this->end_controls_tab();
		$this->end_controls_tabs();
        
        $this->end_controls_section();
        //end link
          //meta 
        $this->start_controls_section(

			'meta_style',

			[

				'label' => __( 'Meta style', 'ailab' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);
     	$this->add_responsive_control(
            'align_meta',

			[

				'label' => __( 'Alignment', 'ailab' ),

				'type' => Controls_Manager::CHOOSE,

				'options' => [

					'left' => [

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

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .jws-theme-tweet .jws-theme-tweet-meta' => 'text-align: {{VALUE}};',

				],

			]

		);



        
		$this->add_responsive_control(

			'meta_margin',

			[

				'label' => __( 'Meta Margin', 'ailab' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .jws-theme-tweet .jws-theme-tweet-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

		);



		$this->add_responsive_control(

			'meta_padding',

			[

				'label' => __( 'Meta Padding', 'ailab' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .jws-theme-tweet .jws-theme-tweet-meta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

        );
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typographymeta',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .jws-theme-tweet .jws-theme-tweet-meta',
			]
		);
        $this->start_controls_tabs( 'tabs_meta_style' );
		$this->start_controls_tab(
			'tab_meta_normal',
			[
				'label' => __( 'Normal', 'ailab' ),
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .jws-theme-content .jws-theme-tweet-meta' => 'color: {{VALUE}};',
				],
			]
		);

		
		$this->add_control(
			'background_color_meta',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .jws-theme-content jws-theme-tweet-meta' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_meta_hover',
			[
				'label' => __( 'Hover', 'ailab' ),
			]
		);

		$this->add_control(
			'hover_meta_color',
			[
				'label' => __( 'Text Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws-theme-content jws-theme-tweet-meta:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'meta_background_hover_color',
			[
				'label' => __( 'Background Color', 'ailab' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws-theme-content .jws-theme-linkjws-theme-tweet-meta:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
        
		$this->end_controls_tab();
		$this->end_controls_tabs();
        
        $this->end_controls_section();
        //end meta
        
        
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

        /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
        $url = 'https://api.twitter.com/1.1/followers/list.json';
        $getfield = '?username=J7mbo&skip_status=1';
        $requestMethod = 'GET';
        $connection = new \TwitterOAuth($settings['consumer_key'], $settings['consumer_secret'],$settings['access_token'], $settings['access_token_secret']);
        $twitter = $connection->get('statuses/user_timeline', array('count' => $settings['number_post']));
            if($twitter && is_array($twitter)) {
                ?>
				<div class="jws-theme-twitter">
					<ul>
						<?php foreach($twitter as $tweet):
							$tweet = (array) $tweet;
							if( ! empty( $tweet ) ):
							$the_tweet = $tweet['text'];
						
							
							// i. User_mentions must link to the mentioned user's profile.
					        $tweet['entities'] = (array)$tweet['entities'];
					        if(is_array($tweet['entities']['user_mentions']) && $settings['show_author']=='yes'){
					            foreach($tweet['entities']['user_mentions'] as $key => $user_mention){
					            	$user_mention = (array) $user_mention;
					                $the_tweet = preg_replace(
					                    '/@'.$user_mention['screen_name'].'/i',
					                    '<a href="http://www.twitter.com/'.$user_mention['screen_name'].'" target="_blank">@'.$user_mention['screen_name'].'</a>',
					                    $the_tweet);
					            }
					        }

					        // ii. Hashtags must link to a twitter.com search with the hashtag as the query.
					        if(is_array($tweet['entities']['hashtags'])&& $settings['show_hashtag']=='yes'){
					            foreach($tweet['entities']['hashtags'] as $key => $hashtag){
					            	$hashtag = (array) $hashtag;
					                $the_tweet = preg_replace(
					                    '/#'.$hashtag['text'].'/i',
					                    '<a href="https://twitter.com/search?q=%23'.$hashtag['text'].'&src=hash" target="_blank" class="jws-theme-hashtags">#'.$hashtag['text'].'</a>',
					                    $the_tweet);
					            }
					        }

					        // iii. Links in Tweet text must be displayed using the display_url
					        //      field in the URL entities API response, and link to the original t.co url field.
					       
							$tweet['user'] = (array) $tweet['user'];
							?>
							<li class="jws-theme-tweet">
								<a href="https://twitter.com/jwsthemes/status/<?php echo esc_attr($tweet['id']) ?>" target="_blank">
								<div class="jws-theme-icon">
									<i class="fab fa-twitter"></i>
								</div>
								<div class="jws-theme-content">
									<div class="jws-theme-tweet-text">
										<?php if($settings['show_author']=='yes') { echo '<span class="jws-theme-name">@'.esc_attr( $tweet['user']['name']).':</span>';};
                                           echo wp_trim_words( $the_tweet, $settings['posts_per_words'] , '...' ) ;
                                            if(is_array($tweet['entities']['urls'])&& $settings['show_link']=='yes'){
                					            foreach($tweet['entities']['urls'] as $key => $link){
                					            	$link = (array) $link;
                					                $link= 
                					                    '<br><a href="'.$link['url'].'" target="_blank" class="jws-theme-link">'.$link['url'].'</a>';
                					            }
                                                echo ''.$link;                                                
                					        }
                                           ?>
									   </div>
                                    <?php if($settings['show_meta']=='yes'):?> 
									<div class="jws-theme-tweet-meta">
										<span class="jws-theme-name"><?php echo human_time_diff( strtotime($tweet['created_at']. '- 8 hours') ) . esc_html__(' ago', 'ailab');?></span>
									</div>
                                    <?php endif ?>
								</div>
                                </a>
							</li>
						<?php endif; endforeach; ?>
					</ul>
				</div>
            <?php }  

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
