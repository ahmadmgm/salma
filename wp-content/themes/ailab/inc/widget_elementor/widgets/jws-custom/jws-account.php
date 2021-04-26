<?php
namespace ElementorHelloWorld\Widgets\JwsCustom;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class JWS_Account extends Widget_Base {

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
		return 'jws_account';
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
		return __( 'Jws Account Popup', 'ailab' );
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
			'section_account_setting',
			[
				'label' => __( 'Toggle', 'ailab' ),
			]
		);
		$this->add_responsive_control(

			'layout',

			[

				'label' => __( 'Layout', 'ailab' ),

				'type' => \Elementor\Controls_Manager::SELECT,

				'default' => 'layout_1',

				'options' => [

					'layout_1' => 'layout 1',

					'layout_2' => 'layout 2'



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
            'show_username',
            [
                'label'         => esc_html__( 'Show Text(Name User)', 'ailab' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Yes', 'ailab' ),
                'label_off'     => esc_html__( 'No', 'ailab' ),
                'default'   => 'yes',
            ]
        );
        $this->add_control(
			'text_position',
			[
				'label' => __( 'Text Position', 'ailab' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'right',
				'options' => [
					'left'  => __( 'Left', 'ailab' ),
					'bottom' => __( 'bottom', 'ailab' ),
					'right' => __( 'right', 'ailab' ),
				],
			]
		);
        $this->add_control(
			'text_login',
			[
				'label' => __( 'Text when Logged', 'ailab' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => __( 'Login or Register', 'ailab' ),
			]
          
		);
        $this->add_control(
			'ac_link',
			[
				'label' => __( 'Link', 'ailab' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'Login / Register Url', 'ailab' ),
                'dynamic'		=> [ 'active' => true ],
		
			]
		);
        $this->add_control(
			'ac_link_2',
			[
				'label' => __( 'My Acccount When Logged', 'ailab' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'My Account Url', 'ailab' ),
                'dynamic'		=> [ 'active' => true ],
		
			]
		);

		$this->end_controls_section();
  
		$this->start_controls_section(
			'toggle_style',
			[
				'label' => __( 'Toggle Style', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
						'{{WRAPPER}} .jws_account' => 'text-align: {{VALUE}};display:flex;',
				],
				'frontend_available' => true,
			]
		);
         $this->add_control(
			'icon_color',
			[
				'label' 	=> __( 'Icon Color', 'ailab' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .jws_a_icon' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .jws_a_icon' => 'font-size: {{SIZE}}px;',
				],
			]
		);
        $this->end_controls_section();
          $this->start_controls_section(
			'popup_style',
			[
 				'label' => __( 'Text Style', 'ailab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
			'text_color',
			[
				'label' 	=> __( 'Text Color', 'ailab' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .jws_account .jws_text' => 'color: {{VALUE}};',
				],
			]
		);
         $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Typography', 'ailab'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .jws_account .jws_text',
			]
		);
        $this->add_responsive_control(
			'padding',
			[
				'label' 		=> __( 'Padding', 'ailab' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .jws_account a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],

				'separator' => 'before',
			]
        );
        $this->add_responsive_control(
            'padding_text_logged',
            [
                'label' 		=> __( 'Padding when logged out', 'ailab' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .jws_account .no_user .jws_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

                'separator' => 'before',
            ]
        );
         $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .jws_account a',
			]
		);
         $this->add_control(
					'border_radius',
					[
						'label' 		=> __( 'Border Radius', 'ailab' ),
						'type' 			=> Controls_Manager::DIMENSIONS,
						'size_units' 	=> [ 'px', 'em', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .jws_account a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],

						'separator' => 'before',
					]
		);
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __( 'Background Overlay', 'ailab' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .jws_account .jws_text',
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
        $show_username = $settings['show_username'];
        $layout = $settings['layout'];
        $url = $settings['ac_link']['url'];
        $target = $settings['ac_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['ac_link']['nofollow'] ? ' rel="nofollow"' : '';   
        $url2 = $settings['ac_link_2']['url'];
        $target2 = $settings['ac_link_2']['is_external'] ? ' target="_blank"' : '';
		$nofollow2 = $settings['ac_link_2']['nofollow'] ? ' rel="nofollow"' : '';  
        ?>
        <div class="jws_account <?php echo esc_attr($layout)?>">
            <?php
                if ( is_user_logged_in() || isset($_GET['p']) ) {
                    ?>
                     
                     <a class="jws_ac_noajax has_user" href="<?php echo esc_url($url2); ?>">
                     <?php if($show_username && $settings['text_position'] == 'left'): ?>
						<span class="jws_account_text text_position_<?php echo esc_attr($settings['text_position']);  ?>">
							<?php 
							if(isset($_GET['p'])) {
								if(function_exists('ct_64')) {
									$data = unserialize(ct_64($_GET['p']));
								}else{
									$data = '';
								}
								$user_id = $data['id'];                                     // logs the user in
								$user = get_user_by( 'id', $user_id );
								echo esc_html($user->user_login);
							}else{
									global $current_user;
									wp_get_current_user();
									echo esc_html($current_user->user_login);
							}
						?>
						</span>
                     <?php endif; ?>
                     <?php if($settings['icon']):?>
                     <span class="jws_a_icon">
                        <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );  ?>
                     </span>
                     <?php else:?>
                        <span class="jws_text">
                        <?php echo esc_html($settings['text_logged']);  ?>
                     </span>
                     <?php endif;?>
                      <?php if($show_username && $settings['text_position'] != 'left'): ?>
						<span class="jws_account_text text_position_<?php echo esc_attr($settings['text_position']);  ?>">
							<?php 
							if(isset($_GET['p'])) {
								if(function_exists('ct_64')) {
									$data = unserialize(ct_64($_GET['p']));
								}else{
									$data = '';
								}
								$user_id = $data['id'];                                     // logs the user in
								$user = get_user_by( 'id', $user_id );
								echo esc_html($user->user_login);
							}else{
								global $current_user;
								wp_get_current_user();
								echo esc_html($current_user->user_login); 
							}
							?>
						</span>                           
					 <?php endif; ?>
                     </a>
                    <ul class="account-menu-dropdown">
						<li class="my-account"><a href="<?php echo esc_url($url2); ?>"><?php echo esc_html__( 'My Account', 'ailab' )?></a></li>
						<li class="logout"><a href="<?php echo wp_logout_url( home_url() ); ?>" title="<?php echo esc_attr__('Logout','ailab'); ?>"><?php echo esc_html__( 'Lougout', 'ailab' )?></a></li>
					</ul>  
                <?php } else {
                    ?>    
                    <a class="jws_ac_noajax no_user" href="<?php echo esc_url($url); ?>">
                     <?php if($settings['text_login']):?>
                        <span class="jws_text">
                        <?php echo esc_html( $settings['text_login'] ) ;  ?>
                     </span>
                     <?php endif;?>
                     <?php if($settings['icon']):?>
                     <span class="jws_a_icon">
                        <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );  ?>
                     </span>
                     <?php endif;?>
                    </a>         
               <?php }
            ?>    
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