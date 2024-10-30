<?php

if (!defined('ABSPATH')) die('Access Denied.');

if ( ! class_exists( 'MWPC_Direct' ) ) {

	class MWPC_Direct {

		public static function initialize() {
			// Get the files
			add_action('admin_post_wpc_direct_access_protection_getFiles', array(__CLASS__, 'getFiles'));
			add_action('admin_post_wpc_direct_access_protection_protectFiles', array(__CLASS__, 'protectFiles'));

            add_action('admin_post_wpc_save_direct_options', array(__CLASS__, 'saveOptions'));

            add_action('wpc_exploitScanner', array(__CLASS__, 'cronProtectFiles'));

            add_action('admin_post_wpc_cron_direct_access_protection_protectFiles', array(__CLASS__, 'cronProtectFiles'));
		}

		/**
		 *  Protect Files
		 *
		 * @param null $files ... Array of files to go through and protect (if NULL, $_POST['files'] will be used instead)
		 * @param bool $return ... Return value if TRUE, print json if FALSE
		 *
		 * @return bool ... false if error occurred, true if successful
		 */
		public static function protectFiles($files = NULL, $return = FALSE) {
			if ($files == NULL) {
				$files = sanitize_text_field($_POST['file']);
				$files = array($files);
			}
			if (!is_array($files)) {
				if (!$return) {
					wp_send_json(array('status'=>'error', 'message'=>'No files have been detected. Aborting...'));
					wp_die();
				} else {
					return false;
				}
			}

			// Loop through files and protect them
			foreach($files as $file) {

                $data = file_get_contents($file);

                if(!$data){
                    continue;
                }
                $pattern = '/defined[ ()\'"]+ABSPATH[ \'")]+/';
                preg_match($pattern, $data, $matches);
                if(sizeof($matches) > 0){
                    //This file has ABSPATH defined, skip it
                    continue;
                }

                $protect = "<?php /*Protected By WP Crusader */ if (!defined('ABSPATH')) die('Access Denied.'); ?>" . PHP_EOL;
                $data = $protect . $data;

                file_put_contents($file, $data);
			}

			if (!$return) {
				wp_send_json(array('status'=>'success', 'message'=>'Your files have been protected successfully!', 'index'=>esc_html($_POST['index'])));
			} else {
				return true;
			}
		}

        public static function cronProtectFiles() {
            $files = self::getFiles(true);

            foreach($files as $file) {

                $data = file_get_contents($file);

                if(!$data){
                    continue;
                }
                $pattern = '/defined[ ()\'"]+ABSPATH[ \'")]+/';
                preg_match($pattern, $data, $matches);
                if(sizeof($matches) > 0){
                    //This file has ABSPATH defined, skip it
                    continue;
                }

                $protect = "<?php /*Protected By WP Crusader */ if (!defined('ABSPATH')) die('Access Denied.'); ?>" . PHP_EOL;
                $data = $protect . $data;

                file_put_contents($file, $data);

            }

        }

		/**
		 *  Get Files
		 *
		 * @param bool $return ... Return value if TRUE, print json if FALSE
		 *
		 * @return array ... Array of files
		 */
		public static function getFiles($return = FALSE) {
			$bDir = dirname(__FILE__);
			$xSpl = explode('plugins', $bDir);
			$rDir = $xSpl[0];

			$themesDir  = $rDir . 'themes';
			$pluginsDir = $rDir . 'plugins';

			$themeFiles  = self::getFilesRecursively($themesDir, true, $themesDir);
			$pluginFiles = self::getFilesRecursively($pluginsDir, true, $pluginsDir);

			$allFiles = array_merge($themeFiles, $pluginFiles);

			if (!$return) {
				sleep(2);
				wp_send_json($allFiles);
			} else {
				sleep(2);
				return $allFiles;
			}
		}

		private static function getFilesRecursively($dir, $recursive = true, $basedir = '') {
			if ($dir == '') {return array();} else {$results = array(); $subresults = array();}
			if (!is_dir($dir)) {$dir = dirname($dir);} // so a files path can be sent
			if ($basedir == '') {$basedir = realpath($dir).DIRECTORY_SEPARATOR;}

			$files = scandir($dir);
			foreach ($files as $key => $value){
				if ( ($value != '.') && ($value != '..') ) {
					$path = realpath($dir.DIRECTORY_SEPARATOR.$value);
					if (is_dir($path)) { // do not combine with the next line or..
						if ($recursive) { // ..non-recursive list will include subdirs
							$subdirresults = self::getFilesRecursively($path,$recursive,$basedir);
							$results = array_merge($results,$subdirresults);
						}
					} else { // strip basedir and add to subarray to separate file list
						$extension = substr($path, strrpos($path, '.')+1);
						if ($extension == 'php') {
							$subresults[] = $path;
						}
					}
				}
			}
			// merge the subarray to give the list of files then subdirectory files
			if (count($subresults) > 0) {$results = array_merge($subresults,$results);}
			return $results;
		}

        public static function scheduleCronJobs($wpc_options){
            wp_clear_scheduled_hook('wpc_directAccessProtection');
            if($wpc_options['direct_access_protection'] == 1){
                if ( ! wp_next_scheduled( 'wpc_directAccessProtection' ) ) {
                    wp_schedule_event(time(), 'hourly', 'wpc_directAccessProtection');
                }
            }else{
                wp_clear_scheduled_hook('wpc_directAccessProtection');
            }
        }

        public static function saveOptions() {
            $wpc = $_POST['wpc'];

            if (!is_array($wpc)) wp_die('WPC is not an array.');
            if (!is_admin()) wp_die('You are not an admin.');
            $wpc_option = get_option('wpc');
            foreach($wpc as $key=>$value) {
                $wpc_option[sanitize_key($key)] = sanitize_text_field($value);
            }
            update_option('wpc', $wpc_option);

            //Schedule Cron Jobs
            self::scheduleCronJobs($wpc_option);
            //Schedule Cron Jobs
        }

	}

}