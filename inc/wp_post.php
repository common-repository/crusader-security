<?php
if (!defined('ABSPATH')) die('Access Denied.');

if ( ! class_exists( 'WPC_Post' ) ) {

	class WPC_Post {
        /** GENERAL ---------------------------------------------------------------------------- */
        // Save Options
        public static function saveOptions() {
            $wpc = $_POST['wpc'];
            if (!is_array($wpc)) wp_die('WPC is not an array.');
            if (!is_admin()) wp_die('You are not an admin.');
            $wpc_option = get_option('wpc');
            foreach($wpc as $key=>$value) {
                $wpc_option[sanitize_key($key)] = sanitize_text_field($value);
            }
            update_option('wpc', $wpc_option);
        }
        /** GENERAL ---------------------------------------------------------------------------- */
	}

}