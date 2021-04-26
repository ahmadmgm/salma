<?php
    $registration_enabled = get_option( 'users_can_register' ); ?>
    <?php if(!is_user_logged_in() || \Elementor\Plugin::$instance->editor->is_edit_mode()) : ?>
    <div id="jws-popup-login">
		<div class="jws-login-container">
            <div class="jws-animation">
			<?php
			     $current_page_id = get_queried_object_id();
			?>
            <?php if($show_login) :  ?>
			<div class="jws-login active">
				<?php
		

				// Set link via priority
				if ( ! empty( $_REQUEST['redirect_to'] ) ) {
					$login_redirect = $_REQUEST['redirect_to'];
				}  else {
					$login_redirect = get_permalink( $current_page_id );
				}

				?>

				<h3 class="title"><?php esc_html_e( 'Welcome to login system', 'ailab' ); ?></h3>
				<form name="loginpopopform" id="loginform" action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post">
                    <div class="form-group">
                            <label><?php echo esc_html__('Email','ailab')?></label>
                            <p class="login-username">
        						<input type="text" name="log" placeholder="<?php esc_html_e( 'Enter your email address', 'ailab' ); ?>" class="input required" value="" size="20" />
        					</p>
                        </div>
					
				
                    <div class="form-group">
                            <label><?php echo esc_html__('Password','ailab')?></label>
                            	<p class="login-password">
            						<input type="password" name="pwd" placeholder="<?php esc_html_e( 'Enter your password', 'ailab' ); ?>" class="input required pwd" value="" size="20" />
                                    <span  class="eci  icomoon-eye field-icon toggle-password"></span>
                                </p>
                        </div>                    
				

					<div class="forgot-info">
                        <p class="forgetmenot login-remember">
                            <input name="rememberme" type="checkbox" value="forever" id="popupRememberme" /> 
                            <label for="popupRememberme">
                            <?php esc_html_e( 'Remember Me', 'ailab' ); ?>
                            </label>
                        </p>
                        <?php echo '<a class="lost-pass-link" href="' . jws_get_lost_password_url() . '" title="' . esc_attr__( 'Lost Password', 'ailab' ) . '">' . esc_html__( 'Forget Password?', 'ailab' ) . '</a>'; ?>
                    </div>
                    <p class="submit login-submit">
						<input type="submit" name="wp-submit" class="button" value="<?php esc_attr_e( 'Login', 'ailab' ); ?>" />
						<input type="hidden" name="redirect_to" value="<?php echo esc_url( $login_redirect ); ?>" />
						<input type="hidden" name="testcookie" value="1" />
					</p>


				</form>
				<?php
				if ( $show_login && ($show_register && $registration_enabled) ) {
					echo '<p class="link-bottom">' . esc_html__( "Don't have any account?", 'ailab' ) . '<a class="register" href="' . esc_url( jws_get_register_url() ) . '">' . esc_html__( 'Sign up', 'ailab' ) . '</a>'.esc_html__(' now ', 'ailab').'</p>';
				}
				?>
			</div>
            <?php endif; ?>
			<?php if ( $registration_enabled && $show_register ): ?>
				<div class="jws-register <?php if(!$show_login) echo 'active'; ?>">
					<?php


					// Set link via priority
					if ( ! empty( $_REQUEST['redirect_to'] ) ) {
						$register_redirect = $_REQUEST['redirect_to'];
					} else {
						$register_redirect = get_permalink( $current_page_id );
					}

					if ( is_singular( 'lp_course' ) ) {

							$register_redirect = add_query_arg( array( 'enroll-course' => $current_page_id ), $register_redirect );
					
					}
					?>

					<h4 class="title"><?php echo esc_html_x( 'Register', 'Login popup form', 'ailab' ); ?></h4>

					<form class="auto_login" name="registerformpopup" action="<?php echo esc_url( site_url( 'wp-login.php?action=register', 'login_post' ) ); ?>" method="post" novalidate="novalidate">

						<?php wp_nonce_field( 'ajax_register_nonce', 'register_security' ); ?>
                        <div class="form-group">
                            <label><?php echo esc_html__('Full name','ailab')?></label>
                            <p>
    							<input placeholder="<?php esc_attr_e( 'Your full name', 'ailab' ); ?>" type="text" name="user_login" class="input required" />
    						</p>
                        </div>
						<div class="form-group">
                            <label><?php echo esc_html__('Email','ailab')?></label>
                            <p>
							 <input placeholder="<?php esc_attr_e( 'Enter your email address', 'ailab' ); ?>" type="email" name="user_email" class="input required" />
						      </p>
                        </div>
                        <div class="form-group">
                            <label><?php echo esc_html__('Password','ailab')?></label>
                            	<p class="login-password">
                                <input placeholder="<?php esc_attr_e( 'Enter your password', 'ailab' ); ?>" type="password" name="password" class="input required pwd" />
                                <span  class="eci  icomoon-eye field-icon toggle-password"></span>
							</p>
                        </div>
                        <div class="form-group">
                            <label><?php echo esc_html__('Repeat Password','ailab')?></label>
                            	<p class="login-password-repeater">
                                <input placeholder="<?php esc_attr_e( 'Repeat your password', 'ailab' ); ?>" id="repeat_pwd" type="password" name="repeat_password" class="input required" />
                                <span  class="eci  icomoon-eye field-icon toggle-password"></span>
							</p>
                        </div>
						<p>
							<input type="hidden" name="redirect_to" value="<?php echo esc_url( $register_redirect ); ?>" />
							<input type="hidden" name="modify_user_notification" value="1">
						</p>

						<?php do_action( 'signup_hidden_fields', 'create-another-site' ); ?>

						<p class="submit">
							<input type="submit" name="wp-submit" class="button button-primary button-large" value="<?php echo esc_attr_x( 'Create Account', 'Login popup form', 'ailab' ); ?>" />
						</p>
					</form>
					<?php  if($show_login && ($show_register && $registration_enabled))  echo '<p class="link-bottom">' . esc_html_x( 'Already have any account? ', 'Login popup form', 'ailab' ) . '<a class="login" href="' . esc_url( jws_get_login_page_url() ) . '">' . esc_html_x( 'Sign in', 'Login popup form', 'ailab' ) . '</a>'.esc_html__(' now ', 'ailab').'</p>'; ?>
 <div class="meter">
                        <div class="meter-box">
                            <span class="box1"></span>
                            <span class="box2"></span>
                            <span class="box3"></span>
                            <span class="box4"></span>
                              <span class="text-meter"></span>
                        </div>
                      
                      </div>  
                      <div class="jws-password-hint">
                           <?php echo esc_html__('Hint: The password should be at least eight characters long and uppercase letters. To make it stronger, use lower case letters, numbers, and symbols like ! " ? $ % ^ & ).','ailab'); ?>
                     </div>

					<div class="popup-message"></div>
				</div>
			<?php endif; ?>
            </div>
		</div>
	</div>
    <?php endif; ?>
    <?php 
        if(!is_admin() && is_user_logged_in()) {
            echo do_shortcode('[woocommerce_my_account]'); 
        }
    ?>
