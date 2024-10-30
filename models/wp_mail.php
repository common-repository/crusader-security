<?php

if (!defined('ABSPATH')) die('Access Denied.');

if ( ! class_exists( 'MWPC_Mail' ) ) {

	class MWPC_Mail {

		public static function initialize() {
            add_filter( 'wp_mail_content_type',array(__CLASS__, 'set_mail_content_type') );
		}

		/**
		 * Send Email
		 * @param $emails
		 * @param $subject
		 * @param $content
		 * @param array $attachments
		 */
		public static function send( $emails, $subject, $content, $attachments = array()) {
            $headers = array();

            $headers[] = 'Crusader Security <robot@n-finity.org>';
            if (empty($attachments)) {
                wp_mail( $emails, $subject, $content, $headers );
            } else {
                wp_mail( $emails, $subject, $content, $headers, $attachments );
            }
		}

        public static function set_mail_content_type(){
            return "text/html";
        }
	}

}