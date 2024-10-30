<?php if (!defined('ABSPATH')) die('Access Denied.'); ?>

<!-- HTML STARTS HERE -->
<div class="wrap wpc">

    <h2 class="logo-title">
        <img class="logo-image" src="<?php echo WPC_URL; ?>/assets/img/logo.png"/>
        Crusader Security - Tweak Settings
        -
        <small class="hand">Tweak your in-depth WordPress settings to obtain more security...</small>
    </h2>

    <form class="wpc-settings-form">

        <input type="hidden" name="action" value="wpc_save_options"/>

        <?php

        $wpc = get_option('wpc');

        $auto_update_core = isset($wpc['auto_update_core']) ? $wpc['auto_update_core'] : 0;

        $auto_update_plugins = isset($wpc['auto_update_plugins']) ? $wpc['auto_update_plugins'] : 0;

        $auto_update_themes = isset($wpc['auto_update_themes']) ? $wpc['auto_update_themes'] : 0;

        $disable_editor = isset($wpc['disable_editor']) ? $wpc['disable_editor'] : 0;

        $disable_errors = isset($wpc['disable_errors']) ? $wpc['disable_errors'] : 0;

        $hide_author_names = isset($wpc['hide_author_names']) ? $wpc['hide_author_names'] : 0;

        $disable_login_hints = isset($wpc['disable_login_hints']) ? $wpc['disable_login_hints'] : 0;

        $remove_unnecessary_header_info = isset($wpc['remove_unnecessary_header_info']) ? $wpc['remove_unnecessary_header_info'] : 0;

        $force_cdn_jquery = isset($wpc['force_cdn_jquery']) ? $wpc['force_cdn_jquery'] : 0;

        $remove_wp_version_from_scripts = isset($wpc['remove_wp_version_from_scripts']) ? $wpc['remove_wp_version_from_scripts'] : 0;

        $disable_xmlrpc = isset($wpc['disable_xmlrpc']) ? $wpc['disable_xmlrpc'] : 0;

        $disable_feeds = isset($wpc['disable_feeds']) ? $wpc['disable_feeds'] : 0;

        $disable_xpingback = isset($wpc['disable_xpingback']) ? $wpc['disable_xpingback'] : 0;

        $remove_wp_version = isset($wpc['remove_wp_version']) ? $wpc['remove_wp_version'] : 0;

        $disable_dashboard_for_non_admin_users = isset($wpc['disable_dashboard_for_non_admin_users']) ? $wpc['disable_dashboard_for_non_admin_users'] : 0;

        $disable_auto_url_in_comments = isset($wpc['disable_auto_url_in_comments']) ? $wpc['disable_auto_url_in_comments'] : 0;

        $disable_login_redirect = isset($wpc['disable_login_redirect']) ? $wpc['disable_login_redirect'] : 0;

        /* Rewrite URLs */
        $rewrite_search = isset($wpc['rewrite_search']) ? $wpc['rewrite_search'] : 0;

        ?>

        <div class="uk-grid">
            <div class="uk-width-1-1">
                <div class="uk-panel uk-panel-box uk-panel-header">
                    <div class="uk-alert"><b><i class="fa fa-question-circle"></i> What is the use of these settings?</b>
                        By tweaking these settings, not only that you will improve your WordPress security, but you will also optimize its performance and stability.
                        Many of these settings already exist in WordPress by default, but are considered advanced and are not shown to normal WordPress users without this plugin.
                    </div>

	                <div class="uk-grid">
		                <div class="uk-width-large-1-3">
			                <div class="uk-form uk-form-stacked">
				                <!-- Auto Update - Core -->
				                <div class="uk-form-row">
					                <label class="uk-form-label" for="auto_update_core">
						                <input type="hidden" name="wpc[auto_update_core]" class="form-control" value="0"/>
						                <input id="auto_update_core" type="checkbox" name="wpc[auto_update_core]" value="1" <?php checked($auto_update_core, 1) ?>>
						                Auto Update - WordPress
					                </label>

					                <div class="uk-form-controls">
						                <p class="uk-form-help-block">
							                <span class="uk-badge">NOTE</span>
							                One of the most probable security optimizations would be to always have the latest version of WordPress installed.
							                This setting will always install the latest version of WordPress on your website, without asking you. However, be warned,
							                since if you're using out-dated plugins or themes, this may break your WordPress is left checked.
						                </p>
					                </div>
				                </div>

				                <!-- Auto Update - Plugins -->
				                <div class="uk-form-row">
					                <label class="uk-form-label" for="auto_update_plugins">
						                <input type="hidden" name="wpc[auto_update_plugins]" class="form-control" value="0"/>
						                <input id="auto_update_plugins" type="checkbox" name="wpc[auto_update_plugins]" value="1" <?php checked($auto_update_plugins, 1) ?>>
						                Auto Update - Plugins
					                </label>

					                <div class="uk-form-controls">
						                <p class="uk-form-help-block">
							                <span class="uk-badge">NOTE</span>
							                Second best security tip is to always have your plugins updated. Many plugins are vulnerable and keeping them updated
							                to their latest versions always - keeps you safe from the danger of you forgetting to update manually a possibly vulnerable plugin.
						                </p>
					                </div>
				                </div>

				                <!-- Auto Update - Themes -->
				                <div class="uk-form-row">
					                <label class="uk-form-label" for="auto_update_themes">
						                <input type="hidden" name="wpc[auto_update_themes]" class="form-control" value="0"/>
						                <input id="auto_update_themes" type="checkbox" name="wpc[auto_update_themes]" value="1" <?php checked($auto_update_themes, 1) ?>>
						                Auto Update - Themes
					                </label>

					                <div class="uk-form-controls">
						                <p class="uk-form-help-block">
							                <span class="uk-badge">NOTE</span>
							                If you read the text about the vulnerable plugins, well, the same goes for themes. Usually, WordPress administrators tend to forget to update their
							                themes regularly, therefore increasing the risks of keeping a vulnerable theme active on their website. Keeping it automatically updated always, saves that problem.
						                </p>
					                </div>
				                </div>

				                <!-- Disable Editor -->
				                <div class="uk-form-row">
					                <label class="uk-form-label" for="disable_editor">
						                <input type="hidden" name="wpc[disable_editor]" class="form-control" value="0"/>
						                <input id="disable_editor" type="checkbox" name="wpc[disable_editor]" value="1" <?php checked($disable_editor, 1) ?>>
						                Disable Plugin and Theme Editor
					                </label>

					                <div class="uk-form-controls">
						                <p class="uk-form-help-block">
							                <span class="uk-badge">NOTE</span>
							                While the Plugin and Theme Editor is enabled by default in WordPress, disabling it can harden your overall security and stability, especially if you're
							                not the only one with the access to it. This will prevent someone from making changes in your plugins or themes.
						                </p>
					                </div>
				                </div>

				                <!-- Disable Errors -->
				                <div class="uk-form-row">
					                <label class="uk-form-label" for="disable_errors">
						                <input type="hidden" name="wpc[disable_errors]" class="form-control" value="0"/>
						                <input id="disable_errors" type="checkbox" name="wpc[disable_errors]" value="1" <?php checked($disable_errors, 1) ?>>
						                Disable PHP Errors
					                </label>

					                <div class="uk-form-controls">
						                <p class="uk-form-help-block">
							                <span class="uk-badge">NOTE</span>
							                By disabling PHP errors in your WordPress, you are basically making your attackers blind, as their primary source of information whether their
							                exploit works or not is exactly coming from those errors. Be warned, you will not be able to see PHP errors, so if you're debugging a plugin or theme, make sure this is checked off.
						                </p>
					                </div>
				                </div>

				                <!-- Hide Author Names -->
				                <div class="uk-form-row">
					                <label class="uk-form-label" for="hide_author_names">
						                <input type="hidden" name="wpc[hide_author_names]" class="form-control" value="0"/>
						                <input id="hide_author_names" type="checkbox" name="wpc[hide_author_names]" value="1" <?php checked($hide_author_names, 1) ?>>
						                Disable Author Redirects
					                </label>

					                <div class="uk-form-controls">
						                <p class="uk-form-help-block">
							                <span class="uk-badge">NOTE</span>
							                With this setting, you're disabling access to Author's profile page on WordPress. While this may not be that useful, it's always handy to
							                hide everything possible from public access that isn't really important to them.
						                </p>
					                </div>
				                </div>

			                </div>
		                </div>
		                <div class="uk-width-large-1-3">
			                <div class="uk-form uk-form-stacked">

				                <!-- Disable X-Pingback -->
				                <div class="uk-form-row">
					                <label class="uk-form-label" for="disable_xpingback">
						                <input type="hidden" name="wpc[disable_xpingback]" class="form-control" value="0"/>
						                <input id="disable_xpingback" type="checkbox" name="wpc[disable_xpingback]" value="1" <?php checked($disable_xpingback, 1) ?>>
						                Disable X-Pingback Header
					                </label>

					                <div class="uk-form-controls">
						                <p class="uk-form-help-block">
							                <span class="uk-badge">NOTE</span>
							                Prevents WordPress from sending a response <code>X-Pingback</code> header that is related to XMLRPC and could be involved in exposing
							                the fact that you're using WordPress.
						                </p>
					                </div>
				                </div>

				                <!-- Remove WP Version -->
				                <div class="uk-form-row">
					                <label class="uk-form-label" for="remove_wp_version">
						                <input type="hidden" name="wpc[remove_wp_version]" class="form-control" value="0"/>
						                <input id="remove_wp_version" type="checkbox" name="wpc[remove_wp_version]" value="1" <?php checked($remove_wp_version, 1) ?>>
						                Remove WP Version
					                </label>

					                <div class="uk-form-controls">
						                <p class="uk-form-help-block">
							                <span class="uk-badge">NOTE</span>
							                This will remove the meta tag responsible for exposing your WordPress version. It's useful to have this setting on as it can make the attackers not know
							                which version your WordPress is.
						                </p>
					                </div>
				                </div>

				                <!-- Disable Dashboard for non-admin Users -->
				                <div class="uk-form-row">
					                <label class="uk-form-label" for="disable_dashboard_for_non_admin_users">
						                <input type="hidden" name="wpc[disable_dashboard_for_non_admin_users]" class="form-control" value="0"/>
						                <input id="disable_dashboard_for_non_admin_users" type="checkbox" name="wpc[disable_dashboard_for_non_admin_users]" value="1" <?php checked($disable_dashboard_for_non_admin_users, 1) ?>>
						                Disable Dashboard for non-admin Users
					                </label>

					                <div class="uk-form-controls">
						                <p class="uk-form-help-block">
							                <span class="uk-badge">NOTE</span>
							                If you would like to prevent the access to the Dashboard to the users that aren't Administrators, check this setting.
						                </p>
					                </div>
				                </div>

				                <!-- Disable Auto-URLs in Comments -->
				                <div class="uk-form-row">
					                <label class="uk-form-label" for="disable_auto_url_in_comments">
						                <input type="hidden" name="wpc[disable_auto_url_in_comments]" class="form-control" value="0"/>
						                <input id="disable_auto_url_in_comments" type="checkbox" name="wpc[disable_auto_url_in_comments]" value="1" <?php checked($disable_auto_url_in_comments, 1) ?>>
						                Disable Auto-URLs in Comments
					                </label>

					                <div class="uk-form-controls">
						                <p class="uk-form-help-block">
							                <span class="uk-badge">NOTE</span>
							                A very helpful setting to fight spam content and spam backlinks. This will prevent WordPress from automatically creating URLs in your comments, making them only plain text.
						                </p>
					                </div>
				                </div>

				                <!-- Disable Login Multi-Site Redirect -->
				                <div class="uk-form-row">
					                <label class="uk-form-label" for="disable_login_redirect">
						                <input type="hidden" name="wpc[disable_login_redirect]" class="form-control" value="0"/>
						                <input id="disable_login_redirect" type="checkbox" name="wpc[disable_login_redirect]" value="1" <?php checked($disable_login_redirect, 1) ?>>
						                Disable Login Multi-Site Redirect
					                </label>

					                <div class="uk-form-controls">
						                <p class="uk-form-help-block">
							                <span class="uk-badge">NOTE</span>
							                If you are using Multi-Site and if one of your websites isn't there, it will redirect to a different WordPress instance of Multi-Site. To prevent that, check this option.
						                </p>
					                </div>
				                </div>

				                <!-- Rewrite Search URL -->
				                <div class="uk-form-row">
					                <label class="uk-form-label" for="rewrite_search">
						                <input type="hidden" name="wpc[rewrite_search]" class="form-control" value="0"/>
						                <input id="rewrite_search" type="checkbox" name="wpc[rewrite_search]" value="1" <?php checked($rewrite_search, 1) ?>>
						                Rewrite Search URL
					                </label>

					                <div class="uk-form-controls">
						                <p class="uk-form-help-block">
							                <span class="uk-badge">NOTE</span>
							                Changes the default search url to look better and make it harder for attackers to know that you're on WordPress. New search url will be rendered as <code>/search/term</code>.
						                </p>
					                </div>
				                </div>

			                </div>
		                </div>
		                <div class="uk-width-large-1-3">
			                <div class="uk-form uk-form-stacked">

				                <!-- Remove Version from Scripts -->
				                <div class="uk-form-row">
					                <label class="uk-form-label" for="remove_wp_version_from_scripts">
						                <input type="hidden" name="wpc[remove_wp_version_from_scripts]" class="form-control" value="0"/>
						                <input id="remove_wp_version_from_scripts" type="checkbox" name="wpc[remove_wp_version_from_scripts]" value="1" <?php checked($remove_wp_version_from_scripts, 1) ?>>
						                Remove Version from Scripts
					                </label>

					                <div class="uk-form-controls">
						                <p class="uk-form-help-block">
							                <span class="uk-badge">NOTE</span>
							                Used to hide your WordPress version from public access. Instead of requesting scripts with the <code>?ver=4.4.2</code> at the end, WordPress
							                will skip that part out and just load the script directly without telling anyone what version of WordPress you have.
						                </p>
					                </div>
				                </div>

				                <!-- Disable XMLRPC -->
				                <div class="uk-form-row">
					                <label class="uk-form-label" for="disable_xmlrpc">
						                <input type="hidden" name="wpc[disable_xmlrpc]" class="form-control" value="0"/>
						                <input id="disable_xmlrpc" type="checkbox" name="wpc[disable_xmlrpc]" value="1" <?php checked($disable_xmlrpc, 1) ?>>
						                Disable XMLRPC
					                </label>

					                <div class="uk-form-controls">
						                <p class="uk-form-help-block">
							                <span class="uk-badge">NOTE</span>
							                XMLRPC has been a well known target in the past for attackers. Many websites were exploited by using the methods that involved XMLRPC. This setting will disable it, rendering those attacks useless.
						                </p>
					                </div>
				                </div>

				                <!-- Disable Feeds -->
				                <div class="uk-form-row">
					                <label class="uk-form-label" for="disable_feeds">
						                <input type="hidden" name="wpc[disable_feeds]" class="form-control" value="0"/>
						                <input id="disable_feeds" type="checkbox" name="wpc[disable_feeds]" value="1" <?php checked($disable_feeds, 1) ?>>
						                Disable Feeds
					                </label>

					                <div class="uk-form-controls">
						                <p class="uk-form-help-block">
							                <span class="uk-badge">NOTE</span>
							                If you are a normal WordPress user and do not use any of its feeds, you can safely check this option. It will basically disable all feeds on WordPress
							                that are usually not necessary for a regular WordPress users and also they can expose that you're running WordPress as well.
						                </p>
					                </div>
				                </div>

				                <!-- Disable Login Hints -->
				                <div class="uk-form-row">
					                <label class="uk-form-label" for="disable_login_hints">
						                <input type="hidden" name="wpc[disable_login_hints]" class="form-control" value="0"/>
						                <input id="disable_login_hints" type="checkbox" name="wpc[disable_login_hints]" value="1" <?php checked($disable_login_hints, 1) ?>>
						                Disable Login Hints
					                </label>

					                <div class="uk-form-controls">
						                <p class="uk-form-help-block">
							                <span class="uk-badge">NOTE</span>
							                Used to keep things complicated with brute force attacks. Use this option to prevent WordPress from notifying users whether their username or password
							                is wrong when they try to login with incorrect credentials together with the Login Guard and nobody will be able to brute force your Administrator account.
						                </p>
					                </div>
				                </div>

				                <!-- Remove Unnecessary Header Information -->
				                <div class="uk-form-row">
					                <label class="uk-form-label" for="remove_unnecessary_header_info">
						                <input type="hidden" name="wpc[remove_unnecessary_header_info]" class="form-control" value="0"/>
						                <input id="remove_unnecessary_header_info" type="checkbox" name="wpc[remove_unnecessary_header_info]" value="1" <?php checked($remove_unnecessary_header_info, 1) ?>>
						                Remove Unnecessary Header Information
					                </label>

					                <div class="uk-form-controls">
						                <p class="uk-form-help-block">
							                <span class="uk-badge">NOTE</span>
							                What this basically do is hide most of the information in your WordPress header that tells somebody that your website is using WordPress.
							                This is useful to hide the fact that you're on WordPress, so the attackers could just give up on you.
						                </p>
					                </div>
				                </div>

				                <!-- Force jQuery CDN -->
				                <div class="uk-form-row">
					                <label class="uk-form-label" for="force_cdn_jquery">
						                <input type="hidden" name="wpc[force_cdn_jquery]" class="form-control" value="0"/>
						                <input id="force_cdn_jquery" type="checkbox" name="wpc[force_cdn_jquery]" value="1" <?php checked($force_cdn_jquery, 1) ?>>
						                Force usage of jQuery CDN Version
					                </label>

					                <div class="uk-form-controls">
						                <p class="uk-form-help-block">
							                <span class="uk-badge">NOTE</span>
							                Not as much as a security optimization as it is more of a performance optimization. When having jQuery loaded over CDN, browsers will skip downloading jQuery
							                from your website over and over again as they already have it downloaded from a previous website that was using jQuery's CDN version.
						                </p>
					                </div>
				                </div>

			                </div>
			            </div>
	                </div>





                </div>
            </div>
        </div>


        <div class="uk-grid">
            <div class="uk-width-1-1">
                <button type="submit" name="submit" id="submit-wpc-changes" class="uk-button uk-button-primary"><i
                        class="fa fa-save"></i> Save All Changes
                </button>
            </div>
        </div>

    </form>

</div> <!-- .wrap -->