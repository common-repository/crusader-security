<?php

if (!defined('ABSPATH')) die('Access Denied.');

if ( ! class_exists( 'MWPC_Twofactor' ) ) {

	class MWPC_Twofactor {

		public static function initialize() {
			add_action( 'login_form', array( __CLASS__, 'loginForm' ) );
			add_action( 'wp_authenticate_user', array( __CLASS__, 'authCheck' ), 51, 2 );
		}

		private static function verifyCode( $secretkey, $thistry, $relaxedmode, $lasttimeslot ) {

			// Did the user enter 6 digits ?
			if ( strlen( $thistry ) != 6) {
				return false;
			} else {
				$thistry = intval ( $thistry );
			}

			// If user is running in relaxed mode, we allow more time drifting
			// ±4 min, as opposed to ± 30 seconds in normal mode.
			if ( $relaxedmode ) {
				$firstcount = -8;
				$lastcount  =  8;
			} else {
				$firstcount = -1;
				$lastcount  =  1;
			}

			$tm = floor( time() / 30 );

			// Include the Base32 Class
			$base32Class = WPC_PATH . DIRECTORY_SEPARATOR . 'ext' . DIRECTORY_SEPARATOR . 'base32.php';
			if ( ! class_exists( 'Base32' ) ) {
				require_once( $base32Class );
			}

			$secretkey=Base32::decode($secretkey);
			// Keys from 30 seconds before and after are valid aswell.
			for ($i=$firstcount; $i<=$lastcount; $i++) {
				// Pack time into binary string
				$time=chr(0).chr(0).chr(0).chr(0).pack('N*',$tm+$i);
				// Hash it with users secret key
				$hm = hash_hmac( 'SHA1', $time, $secretkey, true );
				// Use last nipple of result as index/offset
				$offset = ord(substr($hm,-1)) & 0x0F;
				// grab 4 bytes of the result
				$hashpart=substr($hm,$offset,4);
				// Unpak binary value
				$value=unpack("N",$hashpart);
				$value=$value[1];
				// Only 32 bits
				$value = $value & 0x7FFFFFFF;
				$value = $value % 1000000;
				if ( $value === $thistry ) {
					// Check for replay (Man-in-the-middle) attack.
					// Since this is not Star Trek, time can only move forward,
					// meaning current login attempt has to be in the future compared to
					// last successful login.
					if ( $lasttimeslot >= ($tm+$i) ) {
						return false;
					}
					// Return timeslot in which login happened.
					return $tm+$i;
				}
			}
			return false;
		}

		public static function authCheck($user, $password = '') {
			$wpc = get_option('wpc');
			$auth_enabled = isset($wpc['auth_enabled']) ? $wpc['auth_enabled'] : '';
			if ($auth_enabled) {
				$auth_relaxed_mode = isset($wpc['auth_relaxed_mode']) ? $wpc['auth_relaxed_mode'] : '';
				$auth_secret_key   = isset($wpc['auth_secret_key']) ? $wpc['auth_secret_key'] : '';
				$auth_time         = isset($wpc['auth_time']) ? $wpc['auth_time'] : '';

				$auth_code = '';
				if (isset($_POST['auth_code'])) {
					if (!empty($_POST['auth_code'])) {
						$auth_code = sanitize_text_field( $_POST[ 'auth_code' ] );
					} else {
						return new WP_Error( 'invalid_authenticator_request', '<strong>ERROR</strong>: Your authorization code is incorrect.' );
					}
				} else {
					return new WP_Error( 'invalid_authenticator_request', '<strong>ERROR</strong>: Your authorization code is incorrect.' );
				}

				if ( $auth_time_new = self::verifyCode( $auth_secret_key, $auth_code, $auth_relaxed_mode, $auth_time ) ) {
					$wpc['auth_time'] = $auth_time_new;
					update_option('wpc', $wpc);
					return $user;
				} else {
					return new WP_Error( 'invalid_authenticator_request', '<strong>ERROR</strong>: Your authorization code is incorrect.' );
				}
			}
			return $user;
		}

		public static function loginForm() {
			$wpc = get_option('wpc');
			$auth_enabled = isset($wpc['auth_enabled']) ? $wpc['auth_enabled'] : '';
			if ($auth_enabled) {
				?>
				<p>
					<label for="auth_code">Authenticator Code<br>
					<input autocomplete="off" type="text" name="auth_code" id="auth_code" class="input" value="" size="20"></label>
				</p>
				<?php
			}
		}

		public static function createSecret() {
			$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567'; // allowed characters in Base32
			$secret = '';
			for ( $i = 0; $i < 16; $i++ ) {
				$secret .= substr( $chars, wp_rand( 0, strlen( $chars ) - 1 ), 1 );
			}
			return $secret;
		}

	}

}