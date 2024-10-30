<?php

if (!defined('ABSPATH')) die('Access Denied.');

if ( ! class_exists( 'MWPC_Lockdown' ) ) {

	class MWPC_Lockdown {

		public static function initialize() {
			$wpc = get_option('wpc');

			/** Check if the Login Lockdown is turned on */
			if (isset($wpc['lockdown_attempts'])) {
				if ($wpc['lockdown_attempts'] > 0) {
					// login form display
					add_action( 'authenticate', array( __CLASS__, 'lockdown_login_form' ) );

					// pre-login validation
					add_filter( 'authenticate', array(__CLASS__, 'validate_credentials'), 30, 3 );

					// global ban
					if ($wpc['lockdown_total_ban'] == 1) {
						add_action( 'wp', array( __CLASS__, 'lockdown_website' ) );
					}

					// TODO -- Add tracer cookie support
				}
			}

			add_action('wpc_removeBans', array(__CLASS__, 'removeExpiredBans'));
			if ( ! wp_next_scheduled( 'wpc_removeBans' ) ) {
				wp_schedule_event( time(), 'hourly', 'wpc_removeBans' );
			}
		}

		/** Remove expired bans */
		public static function removeExpiredBans() {
			$wpc_lockdown = get_option('wpc_lockdown');
			$wpc          = get_option('wpc');

			$duration = isset($wpc['lockdown_ban_duration']) ? : 60;

			if (!is_array($wpc_lockdown)) $wpc_lockdown = array();
			$new_wpc_lockdown = array();
			foreach($wpc_lockdown as $ip=>$array) {
				$old_date = $array['date'];
				$new_date = date('Y-m-d H:i:s');

				if(strtotime($old_date . ' + '.$duration.' minutes') < strtotime($new_date)) {
					$new_wpc_lockdown[$ip] = $array;
				}
			}
			update_option('wpc_lockdown', $new_wpc_lockdown);
		}

		/** Validate submitted credentials */
		public static function validate_credentials( $user, $username, $password ) {

			if (empty($username) && empty($password)) return $user;

			/** Check if this user has already been banned */
			$wpc = get_option('wpc');
			$attempts = $wpc['lockdown_attempts'];
			$ban_duration = (!empty($wpc['lockdown_ban_duration'])) ? $wpc['lockdown_ban_duration'] : 60;

			$wpc_lockdown = get_option('wpc_lockdown');
			if (!is_array($wpc_lockdown)) $wpc_lockdown = array();
			if (isset($wpc_lockdown[$_SERVER['REMOTE_ADDR']])) {
				$current_attempts = $wpc_lockdown[$_SERVER['REMOTE_ADDR']]['tries'];
				if ($current_attempts >= $attempts) {
					return new WP_Error( 'already_banned', "You don't have permission to do this yet." );
				}
				if (!is_wp_error($user)) {
					unset($wpc_lockdown[$_SERVER['REMOTE_ADDR']]);
					update_option('wpc_lockdown', $wpc_lockdown);
				}
			}

			if (is_wp_error($user)) {

				if (isset($wpc_lockdown[$_SERVER['REMOTE_ADDR']])) {
					$wpc_lockdown[$_SERVER['REMOTE_ADDR']]['tries'] = $wpc_lockdown[$_SERVER['REMOTE_ADDR']]['tries'] + 1;
					$wpc_lockdown[$_SERVER['REMOTE_ADDR']]['date'] = date('Y-m-d H:i:s');
				} else {
					$wpc_lockdown[$_SERVER['REMOTE_ADDR']]['tries'] = 1;
					$wpc_lockdown[$_SERVER['REMOTE_ADDR']]['date'] = date('Y-m-d H:i:s');
				}
				update_option('wpc_lockdown', $wpc_lockdown);

				$message = "Invalid credentials. You have %s attempts left before you get banned for %s minutes.";
				$message = sprintf($message, abs($attempts - $wpc_lockdown[$_SERVER['REMOTE_ADDR']]['tries']), $ban_duration);
				return new WP_Error( 'failed_login_attempt', $message );
			}

			return $user;
		}

		/** Pre login form */
		public static function lockdown_login_form() {
			/** Check if this user has already been banned */
			$wpc = get_option('wpc');
			$attempts = $wpc['lockdown_attempts'];
			$message = (!empty($wpc['lockdown_message'])) ? $wpc['lockdown_message'] : "You have been banned.";

			$wpc_lockdown = get_option('wpc_lockdown');
			if (!is_array($wpc_lockdown)) $wpc_lockdown = array();
			if (isset($wpc_lockdown[$_SERVER['REMOTE_ADDR']])) {
				$current_attempts = $wpc_lockdown[$_SERVER['REMOTE_ADDR']]['tries'];
				if ($current_attempts >= $attempts) {

					wp_die($message, '403 - Access Forbidden');

				}
			}
		}

		/** Pre website */
		public static function lockdown_website() {
			/** Check if this user has already been banned */
			$wpc = get_option('wpc');
			$attempts = $wpc['lockdown_attempts'];
			$message = (!empty($wpc['lockdown_message'])) ? $wpc['lockdown_message'] : "You have been banned.";

			$wpc_lockdown = get_option('wpc_lockdown');
			if (!is_array($wpc_lockdown)) $wpc_lockdown = array();
			if (isset($wpc_lockdown[$_SERVER['REMOTE_ADDR']])) {
				$current_attempts = $wpc_lockdown[$_SERVER['REMOTE_ADDR']]['tries'];
				if ($current_attempts >= $attempts) {

					wp_die($message, "403 - Access Forbidden");

				}
			}
		}

	}

}