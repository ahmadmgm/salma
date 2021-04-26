

<?php
/*
Template Name: confirm your email
*/

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body class="cleanpage">

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div class="page-mail container">
            <div class="page-mail-content">
    			<?php
                global $jws_option;  
                $account_url = (isset($jws_option['login_form_redirect']) && !empty($jws_option['login_form_redirect'])) ? $jws_option['login_form_redirect'] : '';
                
                if(isset($_GET['p'])){                                                  // If accessed via an authentification link
                       $loc = function_exists('ct_65') ? ct_65($_GET['p']) : '';
                         $data = unserialize($loc);

                        
                        $code = get_user_meta($data['id'], 'activationcode', true);
                        $isActivated = get_user_meta($data['id'], 'is_activated', true);    // checks if the account has already been activated. We're doing this to prevent someone from logging in with an outdated confirmation link
                        if( $isActivated ) {                                                // generates an error message if the account was already active
                            echo '<div>'.__( 'Your account has been activated! You have been logged in and can now use the site to its full extent.' , 'ailab' ).'</div>';
                            echo '<a href="'.get_home_url().'">'.esc_html__('Go To Home','ailab').'</a>';
                            echo '<a href="'.$account_url.'">'.esc_html__('Go To My Account','ailab').'</a>';
                        }
                    
                        else {
                            if($code == $data['code']){                                     // checks whether the decoded code given is the same as the one in the data base
                                update_user_meta($data['id'], 'is_activated', 1);           // updates the database upon successful activation
                                $user_id = $data['id'];                                     // logs the user in
                                $user = get_user_by( 'id', $user_id ); 
                                if( $user ) {
                                    wp_set_current_user( $user_id, $user->user_login );
                                    wp_set_auth_cookie( $user_id );
                                    do_action( 'wp_login', $user->user_login, $user );
                                }
                                echo '<div>'.__( 'Your account has been activated! You have been logged in and can now use the site to its full extent.' , 'ailab' ).'</div>';
                                echo '<a href="'.get_home_url().'">'.esc_html__('Go To Home','ailab').'</a>';
                                echo '<a href="'.$account_url.'">'.esc_html__('Go To My Account','ailab').'</a>';
                            } else {
                                echo '<strong>Error:</strong> Account activation failed. Please try again in a few minutes or <a href="http://ailab.jwsuperthemes.com/verify-mail?u='.$data['id'].'">resend the activation email</a>.<br />Please note that any activation links previously sent lose their validity as soon as a new activation email gets sent.<br />If the verification fails repeatedly, please contact our administrator.';
                            }
                        }
                    }
                    if(isset($_GET['u'])){                                          // If resending confirmation mail
                        my_user_register($_GET['u']);
                         echo __( 'Your activation email has been resent. Please check your email and your spam folder.','ailab');
                    }
                    if(isset($_GET['n'])){                                          // If account has been freshly created
                         echo __( 'Thank you for creating your account. You will need to confirm your email address in order to activate your account. An email containing the activation link has been sent to your email address. If the email does not arrive within a few minutes, check your spam folder.','ailab' );
                    }
    			?>
            </div>
        </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php wp_footer(); ?>
</body>
</html>

  