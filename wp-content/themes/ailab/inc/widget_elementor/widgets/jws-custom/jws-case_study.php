<?php

namespace ElementorHelloWorld\Widgets\JwsCustom;



use Elementor\Widget_Base;

use Elementor\Controls_Manager;



if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



/**

 * Elementor Hello World

 *

 * Elementor widget for hello world.

 *

 * @since 1.0.0

 */

class Jws_case_study extends Widget_Base {



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

		return 'jws-case_study';

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

		return __( 'JWS Case Study', 'ailab' );

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

		return 'eicon-posts-ticker';

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

		return [ 'general' ];

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

		return [ 'ailab' ];

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

			'section_title',

			[

				'label' => __( 'Post', 'ailab' ),

				'tab' => Controls_Manager::TAB_CONTENT,

			]

		);

		$this->add_responsive_control(
			'columns',
			[
				'label' => __( 'Columns', 'ailab' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '4',
				'tablet_default' => '6',
				'mobile_default' => '12',
				'options' => [
					'1' => '12',
					'2' => '6',
					'3' => '4',
					'4' => '3',
					'6' => '2',
					'12' => '1',
				],
			]
		);


		$this->add_control(

			'posts_per_page',

			[

				'label' => __( 'Posts Per Page', 'ailab' ),

				'type' => Controls_Manager::NUMBER,

				'default' => 3,

			]

		);
 	      $this->add_control(
			'number_words',
			[
				'label' => __( 'Number Words per Post', 'ailab' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '120',
			]
		);


		$this->add_responsive_control(

			'layout',

			[

				'label' => __( 'Layout', 'ailab' ),

				'type' => \Elementor\Controls_Manager::SELECT,

				'default' => 'layout-case_study1',

				'options' => [

					'layout-case_study1' => 'layout 1',

					'layout-case_study2' => 'layout 2'



				],

			]

		);



        $this->add_control(
			'heading_title', [
				'label' => __( 'Heading Title', 'ailab' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Heading Title' , 'ailab' ),
                'condition' 	=> [
					'layout'	=> 'layout-case_study2',
				],  
				'label_block' => true,
			]
		);

		$this->add_control(
			'heading_description', [
				'label' => __( 'Heading Description', 'ailab' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Heading Title' , 'ailab' ),
   	            'condition' 	=> [
					'layout'	=> 'layout-case_study2',
				],
				'show_label' => false,
			]
		);

        $this->add_control(

			'show_category',

			[

				'label' => __( 'Show Category', 'ailab' ),

				'type' => Controls_Manager::SWITCHER,

				'default' => 'yes',

				'label_off' => __( 'Off', 'ailab' ),

				'label_on' => __( 'On', 'ailab' ),

			]

        );

         $this->add_control(

			'show_image',

			[

				'label' => __( 'Show Image', 'ailab' ),

				'type' => Controls_Manager::SWITCHER,

				'default' => 'yes',

				'label_off' => __( 'Off', 'ailab' ),

				'label_on' => __( 'On', 'ailab' ),

			]

		);
           $this->add_responsive_control(
				'image_size',
				[
					'label'     => __( 'Image Size', 'ailab' ),
					'type'      => Controls_Manager::TEXT,
					'default'   => '480x580',
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

			'show_title',

			[

				'label' => __( 'Show Title', 'ailab' ),

				'type' => Controls_Manager::SWITCHER,

				'default' => 'yes',

				'label_off' => __( 'Off', 'ailab' ),

				'label_on' => __( 'On', 'ailab' ),

			]

		);

		$this->add_control(

			'show_excerpt',

			[

				'label' => __( 'Show Excerpt', 'ailab' ),

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

				'default' => '50',
				'condition' 	=> [
					'show_decription!'	=> '',
				],

			]

		);
        
        

		$this->end_controls_section();



		$this->start_controls_section(

			'section_query',

			[

				'label' => __( 'Query', 'ailab' ),

				'tab' => Controls_Manager::TAB_CONTENT,

			]

		);
            $this->add_control(
				'query_type',
				[
					'label'   => __( 'Source', 'ailab' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'all',
					'options' => [
						'all'    => __( 'All posts', 'ailab' ),
						'custom' => __( 'Custom Query', 'ailab' ),
						'manual' => __( 'Manual Selection', 'ailab' ),
					],
				]
			);
        	$this->add_control(
				'query_manual_ids',
				[
					'label'     => __( 'Select posts', 'ailab' ),
					'type'      => 'jws-query-posts',
					'post_type' => 'case_study',
					'multiple'  => true,
					'condition' => [
						'query_type' => 'manual',
					],
				]
			);

			/* Exclude */
			$this->add_control(
				'query_exclude',
				[
					'label'     => __( 'Exclude', 'ailab' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'query_type!' => [ 'manual', 'main' ],
					],
				]
			);
			$this->add_control(
				'query_exclude_ids',
				[
					'label'       => __( 'Select posts', 'ailab' ),
					'type'        => 'jws-query-posts',
					'post_type'   => 'case_study',
					'multiple'    => true,
					'description' => __( 'Select posts to exclude from the query.', 'ailab' ),
					'condition'   => [
						'query_type!' => [ 'manual', 'main' ],
					],
				]
			);
			$this->add_control(
				'query_exclude_current',
				[
					'label'        => __( 'Exclude Current post', 'ailab' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_on'     => __( 'Yes', 'ailab' ),
					'label_off'    => __( 'No', 'ailab' ),
					'return_value' => 'yes',
					'default'      => '',
					'description'  => __( 'Enable this option to remove current post from the query.', 'ailab' ),
					'condition'    => [
						'query_type!' => [ 'manual', 'main' ],
					],
				]
			);

		$this->add_control(

			'orderby',

			[

				'label' => __( 'Orderby', 'ailab' ),

				'type' => \Elementor\Controls_Manager::SELECT,

				'default' => 'menu_order',

				'options' => [

					'post_date' => 'Date',

					'menu_order' => 'Menu Order',

					'post_title' => 'Title',

					'rand' => 'Random',

				],

			]

		);



		$this->add_control(

			'order',

			[

				'label' => __( 'Order', 'ailab' ),

				'type' => \Elementor\Controls_Manager::SELECT,

				'default' => 'ASC',

				'options' => [

					'ASC' => 'ASC',

					'DESC' => 'DESC',

				],

			]

		);

		

		$this->end_controls_section();

		// Post 

		$this->start_controls_section(

			'section_case_study',

			[

				'label' => __( 'case_study', 'ailab' ),

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

					'{{WRAPPER}} .elementor-case_study' => 'text-align: {{VALUE}};',

				],

			]

		);



		$this->add_control(

			'text_transform_post',

			[

				'label' => __( 'Text Transform', 'ailab' ),

				'type' => Controls_Manager::SELECT,

				'default' => '',

				'options' => [

					'' => __( 'None', 'ailab' ),

					'uppercase' => __( 'UPPERCASE', 'ailab' ),

					'lowercase' => __( 'lowercase', 'ailab' ),

					'capitalize' => __( 'Capitalize', 'ailab' ),

				],

				'selectors' => [

					'{{WRAPPER}} .elementor-case_study' => 'text-transform: {{VALUE}};',

				],

			]

		);

		$this->start_controls_tabs( 'tabs_case_study_style' );

		$this->start_controls_tab(

			'tab_case_study_normal',

			[

				'label' => __( 'Normal', 'ailab' ),

			]

		);



		$this->add_control(

			'text_color_case_study',

			[

				'label' => __( 'Text Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .elementor-case_study' => 'color: {{VALUE}};',

				],

			]

		);



		

		$this->add_control(

			'background_color_case_study',

			[

				'label' => __( 'Background Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .elementor-case_study' => 'background-color: {{VALUE}};',

				],

			]

		);



		$this->end_controls_tab();



		$this->start_controls_tab(

			'tab_case_study_hover',

			[

				'label' => __( 'Hover', 'ailab' ),

			]

		);



		$this->add_control(

			'hover_case_study_color',

			[

				'label' => __( 'Text Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'selectors' => [

					'{{WRAPPER}} .elementor-case_study:hover' => 'color: {{VALUE}};',

				],

			]

		);



		$this->add_control(

			'case_study_background_hover_color',

			[

				'label' => __( 'Background Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'selectors' => [

					'{{WRAPPER}} .elementor-case_study:hover' => 'background-color: {{VALUE}};',

				],

			]

		);



		$this->end_controls_tab();

		$this->end_controls_tabs();





		$this->add_control(

			'text_margin_case_study',

			[

				'label' => __( 'Text Margin', 'ailab' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .elementor-case_study' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

		);



		$this->add_control(

			'text_padding_case_study',

			[

				'label' => __( 'Text Padding', 'ailab' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .elementor-case_study' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

		);



		$this->add_group_control(

			\Elementor\Group_Control_Border::get_type(),

			[

				'name' => 'border_post',

				'label' => __( 'Border', 'ailab' ),

				'placeholder' => '1px',

				'default' => '1px',

				'selector' => '{{WRAPPER}} .elementor-post',

				'separator' => 'before',

			]

		);

		$this->add_group_control(

			\Elementor\Group_Control_Box_Shadow::get_type(),

			[

				'name' => 'image_box_shadow',

				'exclude' => [

					'box_shadow_position',

				],

				'selector' => '{{WRAPPER}} .elementor-post',

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

				'name' => 'typography-title',

				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,

				'selector' => '{{WRAPPER}} .post-title',

			]

		);



		$this->add_group_control(

			\Elementor\Group_Control_Text_Shadow::get_type(),

			[

				'name' => 'text_shadow-title',

				'selector' => '{{WRAPPER}} .post-title a',

			]

		);



		$this->add_control(

			'text_color-title',

			[

				'label' => __( 'Text Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .post-title a' => 'color: {{VALUE}};',

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

					'{{WRAPPER}} .post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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

					'{{WRAPPER}} .post-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

		);



        $this->end_controls_section();
        
        // category

        $this->start_controls_section(

			'section_category_style',

			[

				'label' => __( 'Category', 'ailab' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);



		$this->add_group_control(

			\Elementor\Group_Control_Typography::get_type(),

			[

				'name' => 'typography-category',

				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,

				'selector' => '{{WRAPPER}} .case_study-category a',

			]

		);



		$this->add_control(

			'text_color-category',

			[

				'label' => __( 'Text Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .case_study-category a' => 'color: {{VALUE}};',

				],

			]

		);

        $this->end_controls_section();
     

		// decription



		$this->start_controls_section(

			'section_decription_style',

			[

				'label' => __( 'Decription', 'ailab' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);



		$this->add_group_control(

			\Elementor\Group_Control_Typography::get_type(),

			[

				'name' => 'typography-decription',

				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,

				'selector' => '{{WRAPPER}} .post-decription',

			]

		);



		$this->add_group_control(

			\Elementor\Group_Control_Text_Shadow::get_type(),

			[

				'name' => 'text_shadow-decription',

				'selector' => '{{WRAPPER}} .post-decription',

			]

		);



		$this->add_control(

			'text_color-decription',

			[

				'label' => __( 'Text Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .post-decription' => 'color: {{VALUE}};',

				],

			]

		);



		$this->add_control(

			'text_margin_decription',

			[

				'label' => __( 'Text Margin', 'ailab' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .post-decription' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

		);



		$this->add_control(

			'text_padding_decription',

			[

				'label' => __( 'Text Padding', 'ailab' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .post-decription' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

		);

$this->end_controls_section();
      
        $this->start_controls_section(

			'section_icon_style',

			[

				'label' => __( 'Icon', 'ailab' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);

		$this->add_control(

			'icon_color',

			[

				'label' => __( 'Icon Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'default' => '#cc2b5e',

				'selectors' => [

					'{{WRAPPER}} .icon-case_study svg' => 'fill: {{VALUE}};',

				],

			]

		);
        
		$this->add_control(

			'icon_hover_color',

			[

				'label' => __( 'Icon Hover Color', 'ailab' ),

				'type' => Controls_Manager::COLOR,

				'default' => '#',

				'selectors' => [

					'{{WRAPPER}} .elementor-case_study:hover .icon-case_study svg' => 'fill: {{VALUE}};',

				],

			]

		);

         $this->add_responsive_control(
				'image_width',
				[
					'label' 		=> __( 'Logo Width', 'ailab' ),
					'type' 			=> Controls_Manager::SLIDER,
					'range' 		=> [
						'px' 		=> [
							'min' => 1,
							'max' => 300,
							'step' => 1,
						],
					],
					'selectors' 	=> [
						'{{WRAPPER}} .icon-case_study img' => 'height: {{SIZE}}px',
                        '{{WRAPPER}} .icon-case_study svg' => 'width: {{SIZE}}px;height:{{SIZE}}px;',
                        
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

		$settings = $this->get_settings_for_display();

		// WP_Query arguments


        	$query_args = [
					'post_type'              => array( 'case_study' ),

        			'post_status'            => array( 'publish' ),
        
        			'posts_per_page'		 => $settings['posts_per_page'],
        
        			'order'                  => $settings['order'],
        
        			'orderby'                => $settings['orderby'],
			];
        	if ( 'manual' === $settings['query_type'] ) {

				$manual_ids = $settings['query_manual_ids'];

				$query_args['post__in'] = $manual_ids;
			}

		// The Query
            $query_args = apply_filters( 'jws_case_study_query_args', $query_args, $settings );

			$case_study = new \WP_Query( $query_args );




		// The Loop

		?>

		<div class="row <?php echo esc_attr($settings['layout']) ?> ">

        <?php
        if ( $this->get_settings( 'show_number' ) ) {

            $i = 01;

		}
		if ( $case_study->have_posts() ) {

			while ( $case_study->have_posts() ) {

				$case_study->the_post();

				// include('html/content.php');
               

                ?>
               
				<div class="case_study-item  col-<?php echo esc_attr($settings['columns_mobile']) ?> col-md-<?php echo esc_attr($settings['columns_tablet']) ?>  col-lg-<?php echo esc_attr($settings['columns']) ?>" >

                        
                         <div class="elementor-case_study">
                            <?php 
                              
                                    $this->render_post();
                             
                                
                            
                            
                            ?>
                            

		  	           </div>
                </div>
          

		<?php	}

		} else {

			// no posts found

		}

		?>	

		</div>

		<?php

		// Restore original Post Data

		wp_reset_postdata();

	}

		protected function render_post() {
        $this->render_thumbnail();
        $this->gallery_popup();
		echo '<div class="case_study-title-excerpt">';
            $this ->render_category();
			$this->render_title();
			$this->render_excerpt();
            
		echo "</div>";
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

	protected function render_thumbnail() {
		$settings = $this->get_settings();
        if ( ! $this->get_settings( 'show_image' ) ) {
			return;
        }
		?>
            <div class="img-case_study">
                <?php
                    if(has_post_thumbnail()) {
                           if (function_exists('jws_getImageBySize')) {
                         $attach_id = get_post_thumbnail_id();
                         
                         $img = jws_getImageBySize(array('attach_id' => $attach_id, 'thumb_size' => $settings['image_size'], 'class' => 'case-study-image'));
                         echo ''.$img['thumbnail'];
                
                         }else {
                         echo ''.$img = get_the_post_thumbnail(get_the_ID(), $settings['image_size']);
                    }
                    }else {
            
                        global $jws_option;
                        $attach_id = $jws_option['empty_image']['id'];
                        $img = jws_getImageBySize(array('attach_id' => $attach_id, 'thumb_size' => $settings['image_size'], 'class' => 'case-study-image'));
                        echo ''.$img['thumbnail'];
                    }?>
            </div>
        <?php
    }
    
    protected function render_image_bottom() {
        $settings = $this->get_settings();
        if ( ! $this->get_settings( 'show_image_bottom' ) ) {
			return;
        }
        ?>
            <div class="thumbnail-case_study"><img src="<?php echo esc_url($settings['image']['url']) ?>" alt="#"></div>
        <?php
	}
      protected function gallery_popup() {
        
        ?>
         <div class="btn-block" tabindex="0" data-id="<?php echo esc_attr(get_the_ID())?> ">
            <i aria-hidden="true" class="eci  icomoon-search32"></i>
        </div>        
       
        <?php
	}

	protected function render_category() {
		if ( ! $this->get_settings( 'show_category' ) ) {
			return;
		}
		?>
				<span class="post-category">
                    <?php  echo get_the_term_list(get_the_ID(), 'case_study_cat', '', ', '); ?>
                </span>
			
		<?php

	}

	protected function render_title() {
		if ( ! $this->get_settings( 'show_title' ) ) {
			return;
		}
		?>
				
				<h4 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
			
		<?php

	}

	protected function render_excerpt() {
		$settings = $this->get_settings();
		if ( ! $this->get_settings( 'show_excerpt' ) ) {
			return;
		}
		?>
		<p class="post-decription"><?php echo wp_trim_words( get_the_excerpt(), $settings['number_words'] , '...' ) ?></p>
		<?php

	}
    protected function render_readmore() {
		$settings = $this->get_settings();
        if ( ! $this->get_settings( 'show_readmore' )&& $this->get_settings( 'readmore' )   ) {
			return;
        }
		?>
        <div class="readmore">
            <a href="<?php the_permalink() ?>">
                
                <span class="more_link_text"> <?php echo esc_html($this->get_settings('readmore')) ?> </span>
                <i aria-hidden="true" class="fas fa-chevron-circle-right"></i>  
            </a>
        </div>
        <?php
    }



	protected function _content_template() {

	}

}

