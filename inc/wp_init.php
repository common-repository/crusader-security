<?php

if (!defined('ABSPATH')) die('Access Denied.');

if ( ! class_exists( 'WPC_Init' ) ) {

	class WPC_Init {

		// When plugin is activated
		public static function activate() {

		}

		// When plugin is de-activated
		public static function deactivate() {

		}

		// When plugin is uninstalled
		public static function uninstall() {
			self::removeTables();
		}

		// Create/Modify Tables on new Update
		public static function checkVersion() {
			if (get_option('WPC_CURRENT_VERSION') != WPC_CURRENT_VERSION) {
				self::createTables();
				update_option('WPC_CURRENT_VERSION', WPC_CURRENT_VERSION);
			}
		}


		// Init hooks
		public static function hooks() {
			add_action('admin_menu', array('WPC_Init', 'createPages'));
            add_action('admin_init', array('WPC_Init', 'loadAssets'));

			// WPC_Post
			add_action('admin_post_wpc_save_options', array('WPC_Post', 'saveOptions'));
		}

		// Register all Scripts and Styles that are being used somewhere
		public static function loadAssets() {
			// Scripts
			wp_register_script( 'wpc_uikit', WPC_URL.'assets/js/uikit/uikit.min.js', array('jquery') , true);
			wp_register_script( 'wpc_uikit_notify', WPC_URL.'assets/js/uikit/components/notify.min.js', array('jquery') , true);
			wp_register_script( 'wpc_uikit_accordion', WPC_URL.'assets/js/uikit/components/accordion.min.js', array('jquery') , true);
			wp_register_script( 'wpc_ajaxq', WPC_URL.'assets/js/ajaxq.js', array('jquery') , true);
			wp_register_script( 'wpc_qrcode', WPC_URL.'assets/js/jquery.qrcode.min.js', array('jquery') , true);

            wp_register_script( 'wpc_uikit_tooltip', WPC_URL.'assets/js/uikit/components/tooltip.min.js', array('jquery') , true);
            wp_register_script( 'wpc_tagsinput', WPC_URL.'assets/js/tagsinput/jquery.tagsinput.min.js', array('jquery') , true);
            wp_register_script( 'wpc_jquery_mask', WPC_URL.'assets/js/jquery-mask/jquery.mask.js', array('jquery') , true);
            wp_register_script( 'wpc_google_maps', '//maps.google.com/maps/api/js?key=AIzaSyAYlYhu1UH6NO_68p9Nx8RS_vj0EssVYFY', array('jquery') , true);

            // Page Specific Scripts
            wp_register_script( 'wpc_page_login', WPC_URL.'assets/js/page_login.js', array('jquery'), true);
            wp_register_script( 'wpc_page_monitor', WPC_URL.'assets/js/page_monitor.js', array('jquery'), true);
            wp_register_script( 'wpc_page_overview', WPC_URL.'assets/js/page_overview.js', array('jquery'), true);
            wp_register_script( 'wpc_page_tools', WPC_URL.'assets/js/page_tools.js', array('jquery'), true);
            wp_register_script( 'wpc_firewall_monitor', WPC_URL.'assets/js/page_firewall_monitor.js', array('jquery', 'wpc_google_maps'), true);
            wp_register_script( 'wpc_page_backups', WPC_URL.'assets/js/page_backups.js', array('jquery'), true);
            wp_register_script( 'wpc_page_exploit', WPC_URL.'assets/js/page_exploit.js', array('jquery'), true);
            wp_register_script( 'wpc_page_antivirus', WPC_URL.'assets/js/page_antivirus.js', array('jquery'), true);

            /** Load Global JS **/
			wp_register_script( 'wpc_main', WPC_URL.'assets/js/main.js', array('jquery'), true);

            /**
             *  Add a global JS object to main script
             */
            wp_localize_script( 'wpc_main', 'wpc_data',
                array(
                    'wp_get' => admin_url('admin-ajax.php'),
                    'wp_post' => admin_url('admin-post.php'),
                    'plugins_url' => plugins_url()
                )
            );

			// Styles
			wp_register_style( 'wpc_uikit', WPC_URL.'assets/css/uikit/uikit.min.css' );
			wp_register_style( 'wpc_uikit_notify', WPC_URL.'assets/css/uikit/components/notify.min.css' );
			wp_register_style( 'wpc_font-awesome', WPC_URL.'assets/css/vendor/font-awesome.min.css' );
			wp_register_style( 'wpc_animate', WPC_URL.'assets/css/vendor/animate.css' );
			wp_register_style( 'wpc_tagsinput', WPC_URL.'assets/css/vendor/tagsinput/jquery.tagsinput.min.css' );
			wp_register_style( 'wpc_main', WPC_URL.'assets/css/main.css' );
		}


		// Create Admin Menu Pages
		public static function createPages() {
			global $wpc_pages, $global_js, $global_css;

			foreach($wpc_pages as $p) {

				$page_hook_suffix = null;
                if ($p['Type'] == 'MENU') {
					$page_hook_suffix = add_menu_page( $p['Page_Title'], $p['Menu_Title'], $p['Capability'], $p['Slug'], array('WPC_Init','loadPage'), WPC_URL.$p['Icon'] );
				} else {
					$page_hook_suffix = add_submenu_page( $p['Parent_Slug'], $p['Page_Title'], $p['Menu_Title'], $p['Capability'], $p['Slug'], array('WPC_Init','loadPage') );
				}
                add_action('admin_print_scripts-' . $page_hook_suffix, function() use($p, $global_js) {
	                foreach($global_js as $enqueueName) {
		                wp_enqueue_script( $enqueueName);
	                }
	                foreach($p['JavaScript'] as $enqueueName) {
                        wp_enqueue_script( $enqueueName);
                    }
                });
                add_action('admin_print_styles-' . $page_hook_suffix, function() use($p, $global_css) {
	                foreach($global_css as $enqueueName) {
		                wp_enqueue_style( $enqueueName);
	                }
	                foreach($p['Css'] as $enqueueName) {
                        wp_enqueue_style( $enqueueName);
                    }
                });
			}
		}

		// Load a Page
		public static function loadPage(){
			$page = sanitize_text_field($_GET['page']);
			$page = 'page_' . str_replace('wpcrusader-', '', $page) . '.php';
			$page = WPC_PATH.'/pages/'.$page;

			if (file_exists($page)) {
				require_once ( $page );
			} else {
				echo "<h1>404 - Page not Found!</h1>";
			}
		}

		// Verify if site has what it takes to run a plugin
		public static function verify_requirements() {
			global $wp_version;
			if ( version_compare( PHP_VERSION, WPC_REQUIRED_PHP_VERSION, '<' ) ) {
				return false;
			}
			if ( version_compare( $wp_version, WPC_REQUIRED_WP_VERSION, '<' ) ) {
				return false;
			}
			if ( is_multisite() != WPC_REQUIRED_WP_NETWORK ) {
				return false;
			}

			return true;
		}

		// Load all Models and init them
		public static function loadModels() {
			$models = glob(WPC_PATH.'/models/wp_*');
			foreach($models as $m) {
				require_once ( $m );

				// Init the model
				$x = explode('wp_', $m);
				$class = 'MWPC_' . ucfirst(str_replace('.php', '', $x[1]));
				if (method_exists($class,'initialize')) {
					call_user_func(array($class, 'initialize'));
				}
			}
		}

		// Create/Modify Tables
		public static function createTables() {
			$models = glob(WPC_PATH.'/models/wp_*');
			foreach($models as $m) {

				$x = explode('wp_', $m);
				$class = 'MWPC_' . ucfirst(str_replace('.php', '', $x[1]));

				if (method_exists($class,'createTable')) {
					call_user_func(array($class, 'createTable'));
				}
			}
		}

		// Remove Tables
		public static function removeTables() {
			$models = glob(WPC_PATH.'/models/wp_*');
			foreach($models as $m) {

				require_once ( $m );

				$x = explode('wp_', $m);
				$class = 'MWPC_' . ucfirst(str_replace('.php', '', $x[1]));
				if (method_exists($class,'removeTable')) {
					call_user_func(array($class, 'removeTable'));
				}
			}
		}

		// Send the Json and die
		public static function json($status = 'success', $message = 'There is no spoon.', $info = NULL) {
			wp_send_json( array(
				'status'=>$status,
				'message'=>$message,
				'info'=>$info
			) );
			wp_die();
		}

		// Init the plugin
		public static function init() {
			// Init the models
			self::loadModels();

			// Init the hooks
			self::hooks();

			// Perform a version check
			self::checkVersion();
		}
	}

}