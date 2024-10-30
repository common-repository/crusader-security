<?php

if (!defined('ABSPATH')) die('Access Denied.');

if ( ! class_exists( 'MWPC_Firewall_Monitor' ) ) {
	class MWPC_Firewall_monitor extends MWPC_Model {

		protected static $TABLE_NAME;
		public function __construct(){
			static::$TABLE_NAME = self::TABLE_NAME;
		}

		public static function initialize() {
			static::$TABLE_NAME = self::TABLE_NAME;

			$wpc = get_option('wpc');
			$firewall_monitor   = isset($wpc['firewall_monitor']) ? $wpc['firewall_monitor'] : 0;
			$firewall_admin     = isset($wpc['firewall_monitor_admin']) ? $wpc['firewall_monitor_admin'] : 0;
			$firewall_disable   = isset($wpc['firewall']) ? $wpc['firewall'] : 0;

			$firewall_sync = isset($wpc['firewall_sync']) ? $wpc['firewall_sync'] : 0;

			// Fire up the cron if its enabled SYNC
			if ($firewall_sync) {
				if ( ! wp_next_scheduled( 'wpc_FirewallSync' ) ) {
					wp_schedule_event( time(), 'daily', 'wpc_FirewallSync' );
				}
			} else {
				if ( wp_next_scheduled( 'wpc_FirewallSync' ) ) {
					wp_clear_scheduled_hook('wpc_FirewallSync');
				}
			}

			if ($firewall_monitor != 0) {
				add_action( 'template_redirect', array('MWPC_Firewall_monitor', 'insert_monitor_Data') );
			}
			if ($firewall_admin != 0) {
				add_action( 'admin_init', array('MWPC_Firewall_monitor', 'insert_monitor_Data') );
			}
			if ($firewall_disable == false) {
				self::firewall();
			}

			// Ajax hooks
			add_action('admin_post_wpc_firewall_monitor_load_history', array(__CLASS__, 'load_MonitorHistory'));
			add_action('admin_post_wpc_firewall_load_data', array(__CLASS__, 'load_FirewallData'));
			add_action('admin_post_wpc_firewall_block_by', array(__CLASS__, 'firewall_block_by'));
			add_action('admin_post_wpc_firewall_unblock_by', array(__CLASS__, 'firewall_unblock_by'));
			add_action('admin_post_wpc_firewall_sync', array(__CLASS__, 'synchronizeFirewall'));
			add_action('wpc_FirewallSync', array(__CLASS__, 'synchronizeFirewall'));
			add_action('admin_post_wpc_firewall_block_unblock_crawler', array(__CLASS__, 'firewall_block_unblock_crawler'));
		}

		public static function synchronizeFirewall() {
			$wpc = get_option('wpc');
			$firewall = get_option('wpc_firewall');

			if (!is_array($firewall)) { $firewall = array(); }
			if (!isset($firewall['ip'])) { $firewall['ip'] = array(); }
			if (!isset($firewall['location'])) { $firewall['location'] = array(); }
			if (!isset($firewall['crawler'])) { $firewall['crawler'] = array(); }

			$license_email = isset($wpc['license_email']) ? $wpc['license_email'] : '';
			$license_key   = isset($wpc['license_key']) ? $wpc['license_key'] : '';

			if (empty($license_email) || empty($license_key)) return;

			$response = wp_remote_post( "http://members.n-finity.org/wp-admin/admin-ajax.php?action=firewall_sync", array(
					'method'      => 'POST',
					'timeout'     => 45,
					'redirection' => 5,
					'httpversion' => '1.0',
					'blocking'    => true,
					'headers'     => array(),
					'body'        => array(
						'email'   => $license_email,
						'key'     => $license_key,
						'ip'      => $firewall['ip'],
						'location'=> $firewall['location'],
						'crawler' => $firewall['crawler']
					),
					'cookies'     => array()
				)
			);

			// Verify the response
			if ( is_wp_error( $response ) ) {
				return;
			} else {
				if ( !isset( $response['body'] ) ) {
					return;
				} else {
					$json = json_decode($response['body'], true);

					$firewall['ip'] = $json['ip'];
					$firewall['location'] = $json['location'];
					$firewall['crawler'] = $json['crawler'];

					update_option('wpc_firewall', $firewall);
				}
			}
		}

		public static function get_the_user_ip() {
			if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
				//check ip from share internet
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
				//to check ip is pass from proxy
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip = $_SERVER['REMOTE_ADDR'];
			}
			return apply_filters( 'wpb_get_ip', $ip );
		}

		// MySQL
		const TABLE_NAME = 'wpc_firewall_monitor';
		public static function createTable() {
			global $wpdb;
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

			$charset_collate = $wpdb->get_charset_collate();
			$creation_query =
				'CREATE TABLE ' . self::TABLE_NAME . ' (
			        `id` int(11) NOT NULL AUTO_INCREMENT,
			        `ip` varchar(255),
			        `location` varchar(255),
			        `referrer` varchar(255),
			        `location_code` varchar(255),
			        `path` varchar(255),
			        `hostname` varchar(255),
			        `browser_name` varchar(255),
			        `browser_ver` varchar(255),
			        `browser_agent` varchar(255),
			        `platform` varchar(255),
			        `not_found` int(1),
			        `date_visited` datetime,
			        PRIMARY KEY (`id`)
			    ) ' .$charset_collate. ';';
			dbDelta( $creation_query );
		}

		public static function removeTable() {
			global $wpdb;
			$query = 'DROP TABLE IF EXISTS ' . self::TABLE_NAME . ';';
			$wpdb->query( $query );
		}

		// Live Traffic
		public static function insert_monitor_Data() {
			$wpc = get_option('wpc');
			$firewall_skip      = isset($wpc['firewall_skip_common']) ? $wpc['firewall_skip_common'] : 0;

			if ($firewall_skip == 1) {
				if (strpos($_SERVER['REQUEST_URI'], 'admin-ajax.php') !== false) {
					return;
				}
				if (strpos($_SERVER['REQUEST_URI'], 'admin-post.php') !== false) {
					return;
				}
			}

			$gi = geoip_open(WPC_PATH . '/ext/geoip/GeoIP.dat', GEOIP_STANDARD);
			$browser = new Browser();
			$browser_data = $browser->__toArray();

			$data = array(
				'ip' => self::get_the_user_ip(),
				'location' => geoip_country_name_by_addr($gi, self::get_the_user_ip()),
				'referrer' => (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'Direct',
				'location_code' => strtolower(geoip_country_code_by_addr($gi, self::get_the_user_ip())),
				'path' => $_SERVER['REQUEST_URI'],
				'hostname' =>gethostbyaddr($_SERVER['REMOTE_ADDR']),
				'browser_name' => $browser_data['Browser_Name'],
				'browser_ver' => $browser_data['Browser_Version'],
				'browser_agent' => $browser_data['Browser_User_Agent'],
				'platform' => $browser_data['Platform'],
				'not_found' => is_404(),
				'date_visited' => date('Y-m-d H:i:s')
			);
			geoip_close($gi);

			self::insertData($data);
		}

		public static function load_MonitorHistory () {
			global $wpdb;

			$offset = $_POST;

			if(isset($offset['offset'])) {
				$offset = intval($offset['offset']);
				$query  = "SELECT * FROM wpc_firewall_monitor ORDER BY id DESC LIMIT 50 OFFSET $offset";
			}elseif(isset($offset['id'])) {
				$id = intval($offset['id']);
				$query  = "SELECT * FROM wpc_firewall_monitor WHERE id > $id ORDER BY id DESC LIMIT 50";
			}else{
				$query = "SELECT * FROM wpc_firewall_monitor ORDER BY id DESC LIMIT 50";
			}
			$results = $wpdb->get_results($query);

			wp_send_json(array('status'=>'SUCCESS', 'message'=>'Monitor history loaded!', 'data'=>$results));
		}

		// Firewall
		public static function load_FirewallData () {
			$firewall = get_option('wpc_firewall');

			wp_send_json(array('status'=>'success', 'data'=>$firewall));
		}

		public static function firewall_block_by () {

			//TODO add Crawler block

			$postData = $_POST;

			if(!isset($postData['name'])) {
				$postData['name'] = 'default';
			}

			if(!isset($postData['type']) || !isset($postData['id'])){
				wp_send_json(array('status'=>'error', 'message'=>'Insufficient data sent!'));
			}

			$firewall = get_option('wpc_firewall');
			if (!is_array($firewall)) { $firewall = array(); }
			if (!isset($firewall['ip'])) { $firewall['ip'] = array(); }
			if (!isset($firewall['location'])) { $firewall['location'] = array(); }
			if (!isset($firewall['crawler'])) { $firewall['crawler'] = array(); }

			// add new one
			$firewall[$postData['type']][sanitize_text_field($postData['id'])] = array(
				'date'=>date('Y-m-d H:i:s'),
				'name'=>sanitize_text_field($postData['name'])
			);

			update_option('wpc_firewall', $firewall);

			wp_send_json(array('status'=>'success', 'message'=>'Successfully banned!'));

		}

		public static function firewall () {

			$firewall = get_option('wpc_firewall');
			$User_IP = self::get_the_user_ip();

			$gi = geoip_open(WPC_PATH . '/ext/geoip/GeoIP.dat', GEOIP_STANDARD);
			$User_Country = geoip_country_name_by_addr($gi, self::get_the_user_ip());
			geoip_close($gi);

			$browser = new Browser();
			$browser_data = $browser->__toArray();
			$browser_agent = $browser_data['Browser_User_Agent'];


			// Check IPs
			foreach($firewall['ip'] as $ip=>$array) {
				// If range
				if (strpos($ip, '-')!==false) { // A-B format
					list($lower, $upper) = explode(' - ', $ip, 2);
					$lower_dec = (float)sprintf("%u",ip2long($lower));
					$upper_dec = (float)sprintf("%u",ip2long($upper));
					$ip_dec = (float)sprintf("%u",ip2long($User_IP));
					if ( ($ip_dec>=$lower_dec) && ($ip_dec<=$upper_dec) ) {
						header("Location: http://localhost");
						exit();
					}
				} else {
					if ($ip == $User_IP) {
						header("Location: http://localhost");
						exit();
					}
				}
			}

			// Check Country
			if (isset($firewall['location'][$User_Country])) {
				header("Location: http://localhost");
				exit();
			}

			// Block by crawler
			if (isset($firewall['crawler'])) {
				foreach ($firewall['crawler'] as $key=>$val) {
					if (strpos(strtolower($browser_agent), strtolower($key)) !== false) {
						header("Location: http://localhost");
						exit();
					}
				}
			}

		}

		// Unblock IP or Location
		public static function firewall_unblock_by ()
		{
			$firewall = get_option('wpc_firewall');

			$postData = $_POST;

			if(!isset($postData['id']) || !isset($postData['type']))
			{
				wp_send_json(array('status'=>'error', 'message'=>'Insufficient data sent!'));
			}

			unset( $firewall[sanitize_text_field($postData['type'])][sanitize_text_field($postData['id'])] );

			update_option('wpc_firewall', $firewall);

			wp_send_json(array('status'=>'success', 'message'=>'Successfully unblocked!'));
		}

		public static function firewall_block_unblock_crawler ()
		{
			$firewall = get_option('wpc_firewall');

			$postData = $_POST;

			if(!isset($postData['option']) || !isset($postData['type']))
			{
				wp_send_json(array('status'=>'error', 'message'=>'Insufficient data sent!'));
			}

			if (!isset($firewall['crawler'])) { $firewall['crawler'] = array(); }

			if (sanitize_text_field($postData['option']) == "block")
			{
				$crawlers = explode("|", sanitize_text_field($postData['ids']));

				foreach ($crawlers as $crawler)
				{
					// add new one
					$firewall[$postData['type']][$crawler] = array(
						'date'=>date('Y-m-d H:i:s'),
						'name'=>$crawler
					);
				}
			}
			else
			{
				unset( $firewall[$postData['type']] );
			}

			update_option('wpc_firewall', $firewall);

			wp_send_json(array('status'=>'success', 'message'=>'Successfully banned!'));
		}
	}
}