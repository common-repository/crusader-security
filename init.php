<?php

/** Check if the request came from actual WordPress */
if (!defined('ABSPATH')) die('Access Denied.');
/** Check if the request came from actual WordPress */

/** Global Variables */
define( 'WPC_CURRENT_VERSION',      '1.0.0');
define( 'WPC_REQUIRED_PHP_VERSION', '5.3' );
define( 'WPC_REQUIRED_WP_VERSION',  '4.0' );
define( 'WPC_REQUIRED_WP_NETWORK',  false );
define( 'WPC_PATH'               ,  dirname(__FILE__));
define( 'WPC_FILE'               ,  WPC_PATH . DIRECTORY_SEPARATOR . 'crusader-security.php');
define( 'WPC_URL'                ,  plugin_dir_url( __FILE__ ));
/** Global Variables */

/** Define Global JS/CSS */
$global_js = array(
	'wpc_uikit',
	'wpc_uikit_notify',
	'wpc_uikit_accordion',
	'wpc_main',
	'wpc_ajaxq'
);
$global_css = array(
	'wpc_main',
	'wpc_uikit',
	'wpc_uikit_notify',
	'wpc_font-awesome'
);

/** Define Pages */
$wpc_pages = array(
	// Main Page
	array(
		"Type" => "MENU",
		"Page_Title" => "Crusader Security",
		"Menu_Title" => "Crusader Security",
		"Capability" => "manage_options",
		"Slug" => "wpcrusader-login",
		"Icon" => "/assets/img/logo_menu.png",
		"JavaScript" => array(
			'wpc_qrcode',
			'wpc_page_login'
		),
		"Css" => array()
	),
	// Login Guard
	array(
		"Type" => "SUBMENU",
		"Page_Title" => "Login Guard",
		"Menu_Title" => "Login Guard",
		"Capability" => "manage_options",
		"Slug" => "wpcrusader-login",
		"Parent_Slug" => "wpcrusader-login",
		"Icon" => "/assets/img/logo_menu.png",
		"JavaScript" => array(
			'wpc_qrcode',
			'wpc_page_login'
		),
		"Css" => array()
	),
	// Security Settings
	array(
		"Type" => "SUBMENU",
		"Page_Title" => "Tweak Settings",
		"Menu_Title" => "Tweak Settings",
		"Capability" => "manage_options",
		"Slug" => "wpcrusader-settings",
		"Parent_Slug" => "wpcrusader-login",
		"Icon" => "/assets/img/logo_menu.png",
		"JavaScript" => array(),
		"Css" => array()
	),

	// Anti-Exploit
	array(
		"Type" => "SUBMENU",
		"Page_Title" => "Anti-Exploit",
		"Menu_Title" => "Anti-Exploit",
		"Capability" => "manage_options",
		"Slug" => "wpcrusader-exploit",
		"Parent_Slug" => "wpcrusader-login",
		"Icon" => "/assets/img/logo_menu.png",
		"JavaScript" => array(
			'wpc_page_exploit'
		),
		"Css" => array()
	),
	// Firewall
	array(
		"Type" => "SUBMENU",
		"Page_Title" => "Firewall",
		"Menu_Title" => "Firewall",
		"Capability" => "manage_options",
		"Slug" => "wpcrusader-firewall",
		"Parent_Slug" => "wpcrusader-login",
		"Icon" => "/assets/img/logo_menu.png",
		"JavaScript" => array(
            'wpc_firewall_monitor',
            'wpc_jquery_mask',
			'wpc_google_maps'
        ),
		"Css" => array(
			'wpc_animate'
		)
	)
);
/** Define Pages */

/** Set the Version in Options */
if (!get_option('WPC_CURRENT_VERSION')) {
	update_option('WPC_CURRENT_VERSION', WPC_CURRENT_VERSION);
}
/** Set the Version in Options */

/** Include all dependencies */
$files = glob(WPC_PATH.'/inc/wp_*');
foreach($files as $f) { require_once ( $f ); }
/** Include all dependencies */

/** Register Init Hooks */
register_activation_hook(WPC_FILE, array('WPC_Init', 'activate'));
register_deactivation_hook(WPC_FILE, array('WPC_Init', 'deactivate'));
register_uninstall_hook(WPC_FILE, array('WPC_Init', 'uninstall'));
/** Register Init Hooks */

/** Start the plugin */
if ( WPC_Init::verify_requirements() ) {
	add_action('init', array( 'WPC_Init', 'init' ));
} else {
	add_action( 'admin_notices', function(){
		global $wp_version;
		require_once(WPC_PATH . '/pages/notices/requirements-error.php');
	} );
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	deactivate_plugins( WPC_FILE );
}