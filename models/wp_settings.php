<?php

if (!defined('ABSPATH')) die('Access Denied.');

if ( ! class_exists( 'MWPC_Settings' ) ) {

	class MWPC_Settings {

		public static function initialize() {
			$wpc = get_option('wpc');

			$auto_update_core = isset($wpc['auto_update_core']) ? $wpc['auto_update_core'] : 0;
			if ($auto_update_core) {
				define( 'WP_AUTO_UPDATE_CORE', true );
			}

			$auto_update_plugins = isset($wpc['auto_update_plugins']) ? $wpc['auto_update_plugins'] : 0;
			if ($auto_update_plugins) {
				add_filter( 'auto_update_plugin', '__return_true' );
			}

			$auto_update_themes = isset($wpc['auto_update_themes']) ? $wpc['auto_update_themes'] : 0;
			if ($auto_update_themes) {
				add_filter( 'auto_update_theme', '__return_true' );
			}

			$disable_editor = isset($wpc['disable_editor']) ? $wpc['disable_editor'] : 0;
			if ($disable_editor) {
				define( 'DISALLOW_FILE_EDIT', true );
			}

			$disable_errors = isset($wpc['disable_errors']) ? $wpc['disable_errors'] : 0;
			if ($disable_errors) {
				error_reporting(0);
				@ini_set('display_errors', 0);
			}

			$hide_author_names = isset($wpc['hide_author_names']) ? $wpc['hide_author_names'] : 0;
			if ($hide_author_names) {
				add_action('template_redirect', function(){
					if (is_author())
					{
						wp_redirect( home_url() );
						exit;
					}
				});
			}

			$disable_login_hints = isset($wpc['disable_login_hints']) ? $wpc['disable_login_hints'] : 0;
			if ($disable_login_hints) {
				add_filter( 'login_errors', function (){
					return 'Protected by Crusader Security!';
				});
			}

			$remove_unnecessary_header_info = isset($wpc['remove_unnecessary_header_info']) ? $wpc['remove_unnecessary_header_info'] : 0;
			if ($remove_unnecessary_header_info) {
				add_action('init', function () {
					remove_action('wp_head', 'feed_links_extra', 3);
					remove_action('wp_head', 'rsd_link');
					remove_action('wp_head', 'wlwmanifest_link');
					remove_action('wp_head', 'wp_generator');
					remove_action('wp_head', 'start_post_rel_link');
					remove_action('wp_head', 'index_rel_link');
					remove_action('wp_head', 'parent_post_rel_link', 10, 0);
					remove_action('wp_head', 'adjacent_posts_rel_link_wp_head',10,0); // for WordPress >= 3.0
				});
			}

			$force_cdn_jquery = isset($wpc['force_cdn_jquery']) ? $wpc['force_cdn_jquery'] : 0;
			if ($force_cdn_jquery) {
				wp_deregister_script('jquery');
				wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false);
				wp_enqueue_script('jquery');
			}

			$remove_wp_version_from_scripts = isset($wpc['remove_wp_version_from_scripts']) ? $wpc['remove_wp_version_from_scripts'] : 0;
			if ($remove_wp_version_from_scripts) {
				add_filter( 'style_loader_src', function ( $src ) {
					if ( strpos( $src, 'ver=' ) )
						$src = remove_query_arg( 'ver', $src );
					return $src;
				}, 9999 );
				add_filter( 'script_loader_src', function ( $src ) {
					if ( strpos( $src, 'ver=' ) )
						$src = remove_query_arg( 'ver', $src );
					return $src;
				}, 9999 );
			}

			$disable_xmlrpc = isset($wpc['disable_xmlrpc']) ? $wpc['disable_xmlrpc'] : 0;
			if ($disable_xmlrpc) {
				add_filter( 'wp_xmlrpc_server_class', '__return_false' );
				add_filter('xmlrpc_enabled', '__return_false');
			}

			$disable_feeds = isset($wpc['disable_feeds']) ? $wpc['disable_feeds'] : 0;
			if ($disable_feeds) {
				add_action('do_feed', function () { wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );}, 1);
				add_action('do_feed_rdf', function () { wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );}, 1);
				add_action('do_feed_rss', function () { wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );}, 1);
				add_action('do_feed_atom', function () { wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );}, 1);
				add_action('do_feed_rss2_comments', function () { wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );}, 1);
				add_action('do_feed_atom_comments', function () { wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );}, 1);
			}

			$disable_xpingback = isset($wpc['disable_xpingback']) ? $wpc['disable_xpingback'] : 0;
			if ($disable_xpingback) {
				add_filter('wp_headers', function ($headers) {
					unset($headers['X-Pingback']);
					return $headers;
				});
			}

			$remove_wp_version = isset($wpc['remove_wp_version']) ? $wpc['remove_wp_version'] : 0;
			if ($remove_wp_version) {
				add_filter('the_generator', function () {
					return '';
				});
			}

			$rewrite_search = isset($wpc['rewrite_search']) ? $wpc['rewrite_search'] : 0;
			if ($rewrite_search) {
				add_action( 'template_redirect', function () {
					if ( is_search() && ! empty( $_GET['s'] ) ) {
						wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
						exit();
					}
				});
			}

			$disable_dashboard_for_non_admin_users = isset($wpc['disable_dashboard_for_non_admin_users']) ? $wpc['disable_dashboard_for_non_admin_users'] : 0;
			if ($disable_dashboard_for_non_admin_users) {
				add_action( 'init', function() {
					if ( is_admin() && ! current_user_can( 'administrator' ) ) {
						wp_redirect( home_url() );
						exit;
					}
				});
			}

			$disable_auto_url_in_comments = isset($wpc['disable_auto_url_in_comments']) ? $wpc['disable_auto_url_in_comments'] : 0;
			if ($disable_auto_url_in_comments) {
				remove_filter('comment_text', 'make_clickable', 9);
			}

			$disable_login_redirect = isset($wpc['disable_login_redirect']) ? $wpc['disable_login_redirect'] : 0;
			if ($disable_login_redirect) {
				add_action( 'signup_header', function ()
				{
					wp_redirect( site_url() );
					die();
				});
			}

		}
	}

}