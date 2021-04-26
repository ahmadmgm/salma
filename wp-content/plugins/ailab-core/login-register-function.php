<?php
/**
 * Filter lost password link
 *
 * @param $url
 *
 * @return string
 */
if ( ! function_exists( 'jws_get_lost_password_url' ) ) {
	function jws_get_lost_password_url() {
		$url = add_query_arg( 'action', 'lostpassword', jws_get_login_page_url() );

		return $url;
	}
}
function alnuar_auto_login_new_user_after_registration( $user_id ) {

		if (isset($_POST['password'])) {
			wp_set_password( $_POST['password'], $user_id ); //Password previously checked in add_filter > registration_errors
		}
	

}
add_action( 'user_register', 'alnuar_auto_login_new_user_after_registration' );

/**
 * Get login page url
 *
 * @return false|string
 */
if ( ! function_exists( 'jws_get_login_page_url' ) ) {
	function jws_get_login_page_url() {

		if ( function_exists('jws_plugin_active') && !jws_plugin_active( 'js_composer/js_composer.php' ) ) {
			return wp_login_url();  
		}

	
		global $wpdb;
		$page = $wpdb->get_col(
		$wpdb->prepare(
					"SELECT p.ID FROM $wpdb->posts AS p INNER JOIN $wpdb->postmeta AS pm ON p.ID = pm.post_id
			WHERE 	pm.meta_key = %s
			AND 	pm.meta_value = %s
			AND		p.post_type = %s
			AND		p.post_status = %s",
					'jws_login_page',
					'1',
					'page',
					'publish'
				)
			);
			if ( ! empty( $page[0] ) ) {
				return get_permalink( $page[0] );
			}
	

		return wp_login_url();

	}
}


/**
 * Filter register link
 *
 * @param $register_url
 *
 * @return string|void
 */
if ( ! function_exists( 'jws_get_register_url' ) ) {
	function jws_get_register_url() {
		$url = add_query_arg( 'action', 'register', jws_get_login_page_url() );

		return $url;
	}
}
if ( ! is_multisite() ) {
	add_filter( 'register_url', 'jws_get_register_url' );
}
if ( ! function_exists( 'jws_register_ajax_callback' ) ) {
	function jws_register_ajax_callback() {

		// First check the nonce, if it fails the function will break
		$secure = check_ajax_referer( 'ajax_register_nonce', 'register_security', false );

		if ( ! $secure ) {
			$response_data = array(
				'message' => '<p class="message message-error">' . esc_html__( 'Something wrong. Please try again.', 'ailab' ) . '</p>'
			);

			wp_send_json_error( $response_data );
		}

		parse_str( $_POST['data'], $data );

		foreach ( $data as $k => $v ) {
			$_POST[ $k ] = $v;
		}

		$_POST['is_popup_register'] = 1;

		if ( ! empty( $data['modify_user_notification'] ) ) {
			$_REQUEST['modify_user_notification'] = 1;
		}

		$info = array();

		$info['user_login'] = sanitize_user( $data['user_login'] );
		$info['user_email'] = sanitize_email( $data['user_email'] );
		$info['user_pass']  = sanitize_text_field( $data['password'] );
        $confirm_password = sanitize_text_field( $data['repeat_password'] );

         if(!empty($info['user_login']) && isset( $info['user_login'] )) { 
                if (mb_strlen($info['user_login']) < 3) {
                        $response_data = array(
    					   'message' => '<p class="message message-error">' . esc_html__( 'Your User Name Must Contain At Least 3 Characters!', 'ailab' ) . '</p>'
    				    );
                        wp_send_json_error( $response_data );
                }
             }
             if(!empty($info['user_pass']) && isset( $info['user_pass'] )) {
                $password = $info['user_pass'];
                $cpassword = $data['repeat_password'];
                if (mb_strlen($info['user_pass']) < 8) {
                    $response_data = array(
					   'message' => '<p class="message message-error">' . esc_html__( 'Your Password Must Contain At Least 8 Characters!', 'ailab' ) . '</p>'
				    );
                    wp_send_json_error( $response_data );
                }

                elseif(!preg_match("#[A-Z]+#",$password)) {
                    $response_data = array(
					   'message' => '<p class="message message-error">' . esc_html__( 'Your Password Must Contain At Least 1 Capital Letter!', 'ailab' ) . '</p>'
				    );
                    wp_send_json_error( $response_data );
                }

                elseif (strcmp($password, $cpassword) !== 0) {
                    $response_data = array(
					   'message' => '<p class="message message-error">' . esc_html__( 'Passwords must match!', 'ailab' ) . '</p>'
				    );
                    wp_send_json_error( $response_data );
                }

            } 

		// Register the user
		$user_register = register_new_user( $info['user_login'], $info['user_email']);
        
		if ( is_wp_error( $user_register ) ) {
			$error = $user_register->get_error_codes();
      
			if ( in_array( 'gglcptch_error', $error ) ) {
				$response_data = array(
					'message' => '<p class="message message-error">' . esc_html__( 'You have entered an incorrect reCAPTCHA value.', 'ailab' ) . '</p>'
				);
			} elseif ( in_array( 'empty_username', $error ) ) {
				$response_data = array(
					'message' => '<p class="message message-error">' . esc_html__( 'Please enter a username!', 'ailab' ) . '</p>'
				);
			}elseif ( in_array( 'empty_password', $error ) ) {
				$response_data = array(
					'message' => '<p class="message message-error">' . esc_html__( 'Please enter a password!', 'ailab' ) . '</p>'
				);
			} elseif ( in_array( 'invalid_username', $error ) ) {
				$response_data = array(
					'message' => '<p class="message message-error">' . esc_html__( 'The username is invalid. Please try again!', 'ailab' ) . '</p>'
				);
			} elseif ( in_array( 'username_exists', $error ) ) {
				$response_data = array(
					'message' => '<p class="message message-error">' . esc_html__( 'This username is already registered. Please choose another one!', 'ailab' ) . '</p>'
				);
			} elseif ( in_array( 'empty_email', $error ) ) {
				$response_data = array(
					'message' => '<p class="message message-error">' . esc_html__( 'Please type your e-mail address!', 'ailab' ) . '</p>'
				);
			} elseif ( in_array( 'invalid_email', $error ) ) {
				$response_data = array(
					'message' => '<p class="message message-error">' . esc_html__( 'The email address isn\'t correct. Please try again!', 'ailab' ) . '</p>'
				);
			} elseif ( in_array( 'email_exists', $error ) ) {
				$response_data = array(
					'message' => '<p class="message message-error">' . esc_html__( 'This email is already registered. Please choose another one!', 'ailab' ) . '</p>'
				);
			}

			wp_send_json_error( $response_data );
		} else {
		          global $jws_option;
    $user = get_user_by('login', $info['user_login']);
  
				$response_data = array(
					'message' => '<div class="sent-mail-register"><img src="'.get_template_directory_uri().'/assets/images/sent-mail.jpg" />'.
                                        '<p><strong>' . esc_html__('We have sent you a verification email.','ailab').'</strong></p>'.
                                        '<p><strong>' . esc_html__('Please verify your account via the link in the e-mail and complete registration.','ailab').'</strong></p>'.
                                        '<p class="check-email">' . esc_html__('If you do not receive an email from us, please check your spam folder or','ailab') .'<a href="'.$jws_option['link_verify_email'].'/?u='.$user->ID.'">'. esc_html__(' click here to resend it.','ailab') .'</a></p></div>'
                                      
				);

				wp_send_json_success( $response_data );

		
		}
	}
}

if ( get_option( 'users_can_register' ) ) {
	add_action( 'wp_ajax_nopriv_jws_register_ajax', 'jws_register_ajax_callback' );
}

if ( ! function_exists( 'jws_login_ajax_callback' ) ) {
	function jws_login_ajax_callback() {
		//ob_start();
		if ( empty( $_REQUEST['data'] ) ) {
			$response_data = array(
				'code'    => - 1,
				'message' => '<p class="message message-error">' . esc_html__( 'Something wrong. Please try again.', 'ailab' ) . '</p>'
			);
		} else {

			parse_str( $_REQUEST['data'], $login_data );

			foreach ( $login_data as $k => $v ) {
				$_POST[ $k ] = $v;
			}

			//			$_POST['wp-submit'] = $login_data['wp-submit'];

			$user_verify = wp_signon( array(), is_ssl() );

			$code    = 1;
			$message = '';

				if ( is_wp_error( $user_verify ) ) {
				if ( ! empty( $user_verify->errors ) ) {
					$errors = $user_verify->errors;

					if ( ! empty( $errors['gglcptch_error'] ) ) {
						$message = '<p class="message message-error">' . esc_html__( 'You have entered an incorrect reCAPTCHA value.', 'ailab' ) . '</p>';
					} elseif ( ! empty( $errors['invalid_username'] ) || ! empty( $errors['incorrect_password'] ) ) {
						$message = '<p class="message message-error">' . esc_html__( 'Invalid username or password. Please try again!', 'ailab' ) . '</p>';
					} 
                    elseif(! empty( $errors['my_theme_confirmation_error'] )) {
                        foreach ( $errors['my_theme_confirmation_error'] as $key => $value ) {
							$message = '<p class="message message-error">' . $value . '</p>';
						}
                        
                    }
                    else if ( ! empty( $errors['cptch_error'] ) && is_array( $errors['cptch_error'] ) ) {
						foreach ( $errors['cptch_error'] as $key => $value ) {
							$message .= '<p class="message message-error">' . $value . '</p>';
						}
					} else {
						$message = $user_verify;
					}
				} else {
					$message = '<p class="message message-error">' . esc_html__( 'Something wrong. Please try again.', 'ailab' ) . '</p>';
				}
				$code = - 1;
			} else {
				$message = '<p class="message message-success">' . esc_html__( 'Login successful, redirecting...', 'ailab' ) . '</p>';
			}

			$response_data = array(
				'code'    => $code,
				'message' => $message
			);

			if ( ! empty( $login_data['redirect_to'] ) ) {
				$response_data['redirect'] = $login_data['redirect_to'];
			}
		}
		echo json_encode( $response_data );
		die(); // this is required to return a proper result
	}
}
add_action( 'wp_ajax_nopriv_jws_login_ajax', 'jws_login_ajax_callback' );
add_action( 'wp_ajax_jws_login_ajax', 'jws_login_ajax_callback' );



//send mail
function wp_authenticate_user( $userdata ) {            // when the user logs in, checks whether their email is verified
    global $jws_option; 
    $has_activation_status = get_user_meta($userdata->ID, 'is_activated', false);
    if ($has_activation_status) {                           // checks if this is an older account without activation status; skips the rest of the function if it is
        $isActivated = get_user_meta($userdata->ID, 'is_activated', true);
        if ( !$isActivated ) {
            my_user_register( $userdata->ID );              // resends the activation mail if the account is not activated
            $userdata = new WP_Error(
                'my_theme_confirmation_error',
                '<strong>Error:</strong> Your account has to be activated before you can login. Please click the link in the activation email that has been sent to you.<br /> If you do not receive the activation email within a few minutes, check your spam folder or <a href="'.$jws_option['link_verify_email'].'/?u='.$userdata->ID.'">click here to resend it.</a>.'
            );
        }
    }
    return $userdata;
}

function my_user_register($user_id) {               // when a user registers, sends them an email to verify their account
    global $jws_option;
    $user_info = get_userdata($user_id);                                            // gets user data
    $code = md5($user_id);                                                            // creates md5 code to verify later
    $string = array('id'=>$user_id, 'code'=>$code);                                 // makes it into a code to send it to user via email
    update_user_meta($user_id, 'is_activated', 0);                                  // creates activation code and activation status in the database
    update_user_meta($user_id, 'activationcode', $code);
    if(function_exists('ct_64')) {
        $url = $jws_option['link_verify_email'].'/?p=' .ct_64( serialize($string));       // creates the activation url
    }else{
        $url = '#';
    }
    $html = ( '
    
            <h1 style="text-align: center;">Hello '.$user_info->user_login.'</h1>
            <h2 style="text-align: center;">Welcome to '.$jws_option['website_name'].'</h2>
            <p style="text-align: center;">Please verify your email address and complete the registration process.</p>
            <a style="    display: block;
                margin: 0 auto;
                background: #0052cc;
                color: #ffffff;
                border-radius: 3px;
                width: 170px;
                height: 45px;
                text-align: center;
                font-size: 14px;
                line-height: 45px;
                text-decoration: none;
                margin-top: 25px;"
             href="'.$url.'">Verify Your Email</a>
    
    ' ); // This is the html template for your email message body
        // sends the email to the user
    
    
    $to = $user_info->user_email;
    
    $body = $html;
    $headers = ['Content-Type: text/html; charset=UTF-8'];

    if(function_exists('jws_sv_ct3')) {
        jws_sv_ct3($to, get_bloginfo( 'name' ) , $body, $headers );
    }  

    
    
}


add_filter('wp_authenticate_user', 'wp_authenticate_user',10,2);
add_action('user_register', 'my_user_register',10,2);
remove_action( 'register_new_user', 'wp_send_new_user_notifications' );
function new_modify_user_table( $column ) {
    $column['activated'] = 'Activated';
    return $column;
}
add_filter( 'manage_users_columns', 'new_modify_user_table' );

function new_modify_user_table_row( $val, $column_name, $user_id ) {
    switch ($column_name) {
        case 'activated' :
            return get_user_meta($user_id, 'is_activated', true); 
        default:
    }
    return $val;
}
add_filter( 'manage_users_custom_column', 'new_modify_user_table_row', 10, 3 );