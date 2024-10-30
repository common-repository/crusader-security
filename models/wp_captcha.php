<?php

if (!defined('ABSPATH')) die('Access Denied.');

if ( ! class_exists( 'MWPC_Captcha' ) ) {

	class MWPC_Captcha {

		/** @var string captcha site key */
		static private $site_key;


		/** @var string captcha secrete key */
		static private $secret_key;
		static private $theme;

		static private $language;

		static protected $error_message;

		static protected $plugin_options;

		static protected $script_handle;

		static protected $textdomain;

		public static function initialize() {

			self::$plugin_options = get_option( 'wpc' );

			self::$site_key = isset( self::$plugin_options['site_key'] ) ? self::$plugin_options['site_key'] : '';

			self::$secret_key = isset( self::$plugin_options['secret_key'] ) ? self::$plugin_options['secret_key'] : '';

			self::$theme = isset( self::$plugin_options['theme'] ) ? self::$plugin_options['theme'] : 'light';

			self::$language = isset( self::$plugin_options['language'] ) ? self::$plugin_options['language'] : '';

			self::$error_message = isset( self::$plugin_options['error_message'] ) ? self::$plugin_options['error_message'] : wp_kses( __( '<strong>ERROR</strong>: Please retry CAPTCHA', 'wpc-catpcha' ), array(  'strong' => array() ) );


			self::$script_handle = 'g-recaptcha';

			self::$textdomain = 'wpc-captcha';

			add_action( 'plugins_loaded', array( __CLASS__, 'load_plugin_textdomain' ) );

			// initialize if login is activated
			if ( ( isset( self::$plugin_options['captcha_registration'] ) && self::$plugin_options['captcha_registration'] == 1) || ( isset( self::$plugin_options['captcha_login'] ) && self::$plugin_options['captcha_login'] == 1 ) ) {

				add_action( 'login_enqueue_scripts', array( __CLASS__, 'default_wp_login_reg_css' ) );
			}

			// Add the "async" attribute to our registered script.
			add_filter( 'script_loader_tag',  array( __CLASS__, 'add_async_attribute' ), 10, 2 );

		}

		public static function load_plugin_textdomain() {
			load_plugin_textdomain( 'wpc-captcha', false, basename( dirname( __FILE__ ) ) . '/lang/' );
		}

		/**
		 * Add the "async" attribute to our registered script.
		 *
		 * @since 1.0.3
		 */
		public static function add_async_attribute( $tag, $handle ) {
			if ( $handle == self::$script_handle ) {
				$tag = str_replace( ' src', ' async="async" src', $tag );
			}
			return $tag;
		}

		/** Increase the width of login/registration form */
		public static function default_wp_login_reg_css() {
			echo '<style type="text/css">
					#login {
					width: 350px !important;
					}
				</style>' . "\r\n";
		}


		/** Output the reCAPTCHA form field. */
		public static function display_captcha() {

			$lang_option = self::$language;

			// if language is empty (auto detected chosen) do nothing otherwise add the lang query to the
			// reCAPTCHA script url
			if ( isset( $lang_option ) && ( ! empty( $lang_option ) ) ) {
				$lang = "?hl=$lang_option";
			} else {
				$lang = null;
			}

			if ( isset( $_GET['captcha'] ) && $_GET['captcha'] == 'failed' ) {
				echo self::$error_message;
			}
			?>
			<script src="https://www.google.com/recaptcha/api.js" async defer></script>
			<div style="margin-bottom: 15px; margin-top:5px" id="recaptcha" class="g-recaptcha" data-sitekey="<?php echo self::$site_key ?>" data-theme="<?php echo self::$theme ?>"></div>
		<?php
		}

		/**
		 * Send a GET request to verify captcha challenge
		 *
		 * @return bool
		 */
		public static function captcha_verification() {

			$token = sanitize_text_field($_POST['g-recaptcha-response']);

			$response = wp_remote_post( 'https://www.google.com/recaptcha/api/siteverify', array(
					'method' => 'POST',
					'timeout' => 45,
					'redirection' => 5,
					'httpversion' => '1.0',
					'blocking' => true,
					'headers' => array(),
					'body' => array( 'secret' => self::$secret_key, 'response' => $token, 'remoteip' => $_SERVER['REMOTE_ADDR'] ),
					'cookies' => array()
				)
			);


			if ( is_wp_error( $response ) ) {
				return false;
			} else {
				$body = json_decode($response['body'], TRUE);
				if ($body['success'] == false) {
					return false;
				} else {
					return true;
				}
			}
		}


		public static function on_activation() {
			if ( ! current_user_can( 'activate_plugins' ) ) {
				return;
			}
			$plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
			check_admin_referer( "activate-plugin_{$plugin}" );

			$default_options = array(
				'captcha_registration' => 0,
				'captcha_comment'      => 0,
				'theme'                => 'light',
				'error_message'        => wp_kses( __( '<strong>ERROR</strong>: Please retry CAPTCHA', 'wpc-captcha' ), array(  'strong' => array() ) ),
			);

			add_option( 'wpc', $default_options );
		}

		public static function on_uninstall() {
			if ( ! current_user_can( 'activate_plugins' ) ) {
				return;
			}

			delete_option( 'wpc' );
		}
	}

}