<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage ailab
 * @since 1.0.0
 */
 global $jws_option;
?>
<div class="container">
    <div class='row custom-header'>
        <div class="col-sm-3 col-6">
            <?php
                 if(!empty($jws_option)) {
                           if (isset($jws_option['logo']['url']) && !empty($jws_option['logo']['url'])) {
                                ?>
                                <a class="custom-logo" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($jws_option['logo']['url']) ?>" alt="#"></a>
                                <?php
                            } else {
                                ?>
                                <a class="custom-logo" href="<?php echo esc_url(home_url('/')); ?>" class='logo-text'><?php echo ''.(isset($jws_option['logo_text']) && !empty($jws_option['logo_text'])) ? esc_html($jws_option['logo_text']) : ''; ?></a>
                                <?php
                            }  
                 }else{
                            ?>
                                <a class="custom-logo" href="<?php echo esc_url(home_url('/')); ?>" ><img src="<?php echo JWS_URI_PATH . '/assets/images/logo.svg' ?>" /></a>
                            <?php 
                }
            ?>
        </div>
        <div class="col-sm-9 col-6 elementor_jws_menu_layout_menu_horizontal hidden-mobile">
            <div class="jws_main_menu sub_skin_skin1">
                <div class="jws_nav_menu">
                    <?php
                        $attr = array(
                            'menu_id' => 'nav',
                            'container' => '',
                            'container_class' => 'bt-menu-list hidden-xs hidden-sm ',
                            'menu_class' => 'jws_nav',
                            'echo' => true,
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth' => 0,
            
                        );
                        wp_nav_menu($attr);
                    ?>
                </div>
            </div>
        </div>
        
        
          <div class="col-sm-9 col-6 elemetor-menu-mobile hidden-lap">
                         <span class="jws-tiger-mobile"><i class="lnr lnr-menu" aria-hidden="true"></i></span>
                        <div class="menu-mobile-default">
                            <span class="close-menu"><i class="lnr lnr-cross" aria-hidden="true"></i></span>
                            <div class="elementor_jws_menu_layout_menu_vertical">
                            <div class="jws_main_menu jws_nav_menu">
                                <div class="jws_main_menu_inner">
                                <?php 
                                
                                if ( has_nav_menu( 'main_navigation' ) ) {

                                    $attr = array(
                                        'menu_id' => 'nav',
                                        'container' => '',
                                        'container_class' => 'bt-menu-list hidden-xs hidden-sm ',
                                        'menu_class' => 'jws_nav',
                                        'echo' => true,
                                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                        'depth' => 0,
                        
                                    );
                                    wp_nav_menu($attr);

								} else {

									?>
                                    
                                    <ul id="nav" class="nav">
                                       <?php wp_list_pages(
    										array(
    											'match_menu_classes' => true,
    											'show_sub_menu_icons' => true,
    											'title_li' => false,
    											'walker'   => new Jws_Walker_Page(),
    										)
    									   );
                                       ?>
                                    </ul>
                                    
                                    <?php

								}
                                
                                ?>
                                   
                                </div> 
                            </div>
            
                        </div>
                        </div>
                        <span class="overlay"></span>
                        </div>
        
        
        
        
    </div>
</div>