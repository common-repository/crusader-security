<?php

if (!defined('ABSPATH')) die('Access Denied.');

if ( ! class_exists( 'MWPC_Captcha_login' ) ) {

	class MWPC_Captcha_login extends MWPC_Captcha {

		public static function initialize() {

			// initialize if login is activated
			if ( isset( self::$plugin_options['captcha_login'] ) && self::$plugin_options['captcha_login'] == 1 ) {
				// adds the captcha to the login form

				add_action( 'login_form', array( __CLASS__, 'display_captcha' ) );

				// authenticate the captcha answer
				add_action( 'wp_authenticate_user', array( __CLASS__, 'validate_captcha' ), 10, 2 );
			}
		}

		/**
		 * Verify the captcha answer
		 *
		 * @param $user string login username
		 * @param $password string login password
		 *
		 * @return WP_Error|WP_user
		 */
		public static function validate_captcha( $user, $password ) {

			if ( ! isset( $_POST['g-recaptcha-response'] ) || ! self::captcha_verification() ) {
				/** Check whether failed captchas count as failed login attempts */
				$wpc = get_option('wpc');
				if ($wpc['lockdown_captcha'] == 1) {
					$wpc_lockdown = get_option('wpc_lockdown');
					if (!is_array($wpc_lockdown)) $wpc_lockdown = array();
					if (isset($wpc_lockdown[$_SERVER['REMOTE_ADDR']])) {
						$wpc_lockdown[$_SERVER['REMOTE_ADDR']]['tries'] = $wpc_lockdown[$_SERVER['REMOTE_ADDR']]['tries'] + 1;
						$wpc_lockdown[$_SERVER['REMOTE_ADDR']]['date'] = date('Y-m-d H:i:s');
					} else {
						$wpc_lockdown[$_SERVER['REMOTE_ADDR']]['tries'] = 1;
						$wpc_lockdown[$_SERVER['REMOTE_ADDR']]['date'] = date('Y-m-d H:i:s');
					}
					update_option('wpc_lockdown', $wpc_lockdown);
				}

				return new WP_Error( 'empty_captcha', self::$error_message );
			}

			return $user;
		}
	}

}