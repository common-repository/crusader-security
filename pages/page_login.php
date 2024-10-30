<?php if (!defined('ABSPATH')) die('Access Denied.'); ?>

<!-- HTML STARTS HERE -->
<div class="wrap wpc">

    <h2 class="logo-title">
        <img class="logo-image" src="<?php echo WPC_URL; ?>/assets/img/logo.png"/>
        Crusader Security - Login Guard
        -
        <small class="hand">Silence is golden...</small>
    </h2>

    <form class="wpc-settings-form">

        <input type="hidden" name="action" value="wpc_save_options"/>

        <?php

        $wpc = get_option('wpc');

        $site_key = isset($wpc['site_key']) ? $wpc['site_key'] : '';
        $secret_key = isset($wpc['secret_key']) ? $wpc['secret_key'] : '';

        $captcha_login = isset($wpc['captcha_login']) ? $wpc['captcha_login'] : '';
        $captcha_registration = isset($wpc['captcha_registration']) ? $wpc['captcha_registration'] : '';
        $captcha_comment = isset($wpc['captcha_comment']) ? $wpc['captcha_comment'] : '';

        $theme = isset($wpc['theme']) ? $wpc['theme'] : '';
        $error_message = isset($wpc['error_message']) ? $wpc['error_message'] : '';

        $lockdown_attempts = isset($wpc['lockdown_attempts']) ? $wpc['lockdown_attempts'] : '';
        $lockdown_ban_duration = isset($wpc['lockdown_ban_duration']) ? $wpc['lockdown_ban_duration'] : '';
        $lockdown_total_ban = isset($wpc['lockdown_total_ban']) ? $wpc['lockdown_total_ban'] : '';
        $lockdown_tracer = isset($wpc['lockdown_tracer']) ? $wpc['lockdown_tracer'] : '';
        $lockdown_captcha = isset($wpc['lockdown_captcha']) ? $wpc['lockdown_captcha'] : '';
        $lockdown_message = isset($wpc['lockdown_message']) ? $wpc['lockdown_message'] : '';

        $auth_enabled = isset($wpc['auth_enabled']) ? $wpc['auth_enabled'] : '';
		$auth_relaxed_mode = isset($wpc['auth_relaxed_mode']) ? $wpc['auth_relaxed_mode'] : '';
		$auth_secret_key = isset($wpc['auth_secret_key']) ? $wpc['auth_secret_key'] : '';
		$auth_description = isset($wpc['auth_description']) ? $wpc['auth_description'] : '';

        if (empty($auth_description)) {
	        $wpc['auth_description'] = 'WordPressWebsite';
	        update_option('wpc', $wpc);
	        $auth_description = $wpc['auth_description'];
        }

        if (empty($auth_secret_key)) {
	        $wpc['auth_secret_key'] = MWPC_Twofactor::createSecret();
	        update_option('wpc', $wpc);
	        $auth_secret_key = $wpc['auth_secret_key'];
        }

        ?>

        <div class="uk-grid">
            <div class="uk-width-1-1">
                <!-- reCaptcha -->
	            <div class="uk-panel uk-panel-box uk-panel-header">
                    <h4 class="uk-panel-title"><img
                            src="<?php echo WPC_URL; ?>assets/img/recaptcha.png"> reCaptcha Protection
                        <small>- powerful protection from brute force attacks and spam</small>
                    </h4>
                    <div class="uk-alert"><b><i class="fa fa-question-circle"></i> What is reCaptcha?</b> reCAPTCHA is a free service that protects your site from spam and abuse. It uses advanced risk analysis techniques to tell humans and bots apart. With the new API, a significant number of your valid human users will pass the reCAPTCHA challenge without having to solve a CAPTCHA.</div>

                    <div class="uk-form uk-form-stacked">

                        <div class="uk-grid">
                            <div class="uk-width-1-2">
                                <div class="uk-form-row">
                                    <label class="uk-form-label" for="site_key"><i class="fa fa-key"></i> Site
                                        Key</label>
                                    <div class="uk-form-controls">
                                        <input name="wpc[site_key]" type="text" class="uk-width-1-1" id="site_key"
                                               value="<?php echo $site_key; ?>" placeholder="eg. 6Lfe0B0TAAAAAB-HV-Vwni7xVP0LDZLsiRYb0y0c">
                                    </div>
                                </div>

                                <div class="uk-form-row">
                                    <label class="uk-form-label" for="secret_key"><i class="fa fa-key"></i> Secret
                                        key</label>
                                    <div class="uk-form-controls">
                                        <input name="wpc[secret_key]" type="text" class="uk-width-1-1" id="secret_key"
                                               value="<?php echo $secret_key; ?>" placeholder="eg. 6Lfe0B0TAAAAALuUJYvgkCSCwGIVQJtXoIIhKIHX">
                                        <p class="uk-form-help-block"><span class="uk-badge">NOTE</span> To obtain the
                                            Site and Secret keys, you must go to <a
                                                href="https://www.google.com/recaptcha/admin#list" target="_blank">reCaptcha
                                                website</a>, sign in with your Google account, register your website and
                                            you will be presented with these two keys. If you can't get it to work, see
                                            the Tutorial at our <a
                                                href="http://members.n-finity.org/members-area/instructions/"
                                                target="_blank">Instructions page</a>.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-1-2">
                                <div class="uk-form-row">
                                    <label class="uk-form-label" for="captcha_preview"><i class="fa fa-eye"></i> Preview
                                        Captcha</label>
                                    <div class="uk-block uk-block-primary uk-contrast m-b-10">

                                        <div class="uk-container uk-captcha-container">

                                            <h5>reCaptcha will be displayed here</h5>

                                            <div class="uk-grid uk-grid-match" data-uk-grid-margin="">
                                                <div class="uk-width-medium-1-1 uk-row-first">
                                                    <div class="uk-panel">
                                                        <p>Once you have filled in Site and Secret keys, click the
                                                            button below to preview reCaptcha.</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <button type="button" id="button-preview-recaptcha"
                                            class="uk-button uk-button-primary uk-button-mini"><i class="fa fa-eye"></i>
                                        Preview reCaptcha
                                    </button>

                                </div>
                            </div>
                        </div>


                        <div class="uk-grid">
	                        <div class="uk-width-large-1-2">
		                        <div class="uk-form-row">
			                        <label class="uk-form-label" for="secret_key"><i class="fa fa-desktop"></i> Use reCaptcha on</label>

			                        <div class="uk-form-controls">

				                        <input type="hidden" name="wpc[captcha_login]" class="form-control" value="0"/>
				                        <input id="login" type="checkbox" name="wpc[captcha_login]"
				                               value="1" <?php checked($captcha_login, 1) ?>>
				                        <label for="login">Login Form</label>

				                        <br>

				                        <input type="hidden" name="wpc[captcha_registration]" class="form-control" value="0">
				                        <input id="registration" type="checkbox" name="wpc[captcha_registration]"
				                               value="1" <?php checked($captcha_registration, 1) ?>>
				                        <label for="registration">Registration Form</label>

				                        <br>

				                        <input type="hidden" name="wpc[captcha_comment]" class="form-control" value="0">
				                        <input id="comment" type="checkbox" name="wpc[captcha_comment]"
				                               value="1" <?php checked($captcha_comment, 1) ?>>
				                        <label for="comment">Comment Form</label>

				                        <p class="uk-form-help-block"><span class="uk-badge">NOTE</span> While using reCaptcha
					                        on Login and Registration Form will prevent intrusions, using it on Comment Form
					                        helps you fight automated spamming software.</p>
			                        </div>

		                        </div>
	                        </div>
	                        <div class="uk-width-large-1-2">
		                        <div class="uk-form-row">
			                        <label class="uk-form-label" for="theme"><i class="fa fa-pencil"></i> reCaptcha
				                        Theme</label>
			                        <div class="uk-form-controls">
				                        <select class="uk-form-width-small" id="theme" name="wpc[theme]">
					                        <option
						                        value="light" <?php selected('light', $theme); ?>><?php _e('Light', 'wpc-captcha'); ?></option>
					                        <option
						                        value="dark" <?php selected('dark', $theme); ?>><?php _e('Dark', 'wpc-captcha'); ?></option>
				                        </select>
			                        </div>
			                        <p class="uk-form-help-block"><span class="uk-badge">NOTE</span> You can change the
				                        reCaptcha Theme accordingly to your WordPress theme.</p>
		                        </div>

		                        <div class="uk-form-row">
			                        <label class="uk-form-label" for="message"><i class="fa fa-warning"></i> Error
				                        Message</label>
			                        <div class="uk-form-controls">
                                <textarea id="message" name="wpc[error_message]"
                                          class="uk-form-width-large" placeholder="eg. You didn't solve the reCaptcha correctly!"><?php echo $error_message; ?></textarea>
			                        </div>
			                        <p class="uk-form-help-block"><span class="uk-badge">NOTE</span> This is the message that
				                        will be displayed to the user if he fails to submit a valid reCaptcha challenge.</p>
		                        </div>
	                        </div>
                        </div>

                    </div>

                </div>

	            <!-- Two Factor Authentication -->
	            <div class="uk-panel uk-panel-box uk-panel-header">
		            <h4 class="uk-panel-title"><img
				            src="<?php echo WPC_URL; ?>assets/img/phone.png"> Two Factor Authentication
			            <small>- connect authentication application with your WordPress</small>
		            </h4>
		            <div class="uk-alert"><b><i class="fa fa-question-circle"></i> What is Two Factor Authentication?</b> By enabling Two Factor Authentication, you are adding more security to your website. You will be required to use either <code>Authy</code> or <code>Google Authentication App</code> on your mobile device to generate a code that will let you log in successfully.</div>

		            <div class="uk-form uk-form-stacked">

			            <div class="uk-grid">
				            <div class="uk-width-1-2">
					            <!-- Enable Two Factor Authentication -->
					            <div class="uk-form-row">
						            <label class="uk-form-label" for="auth_enabled">
							            <input type="hidden" name="wpc[auth_enabled]" class="form-control" value="0">
							            <input id="auth_enabled" type="checkbox" name="wpc[auth_enabled]" value="1" <?php checked($auth_enabled); ?>>
							            Enable Two Factor Authentication
						            </label>

						            <div class="uk-form-controls">
							            <p class="uk-form-help-block">
								            <span class="uk-badge">NOTE</span>
								            Before you enable this feature, be sure that you have had the QR code on the right scanned with your
								            authentication application first (<code>Authy</code> or <code>Google Authentication App</code> preferred)
								            so you will be able to log in next time.
							            </p>
						            </div>
					            </div>

					            <!-- Relaxed Mode -->
					            <div class="uk-form-row">
						            <label class="uk-form-label" for="auth_relaxed_mode">
							            <input type="hidden" name="wpc[auth_relaxed_mode]" class="form-control" value="0">
							            <input id="auth_relaxed_mode" type="checkbox" name="wpc[auth_relaxed_mode]" value="1" <?php checked($auth_relaxed_mode); ?>>
							            Take it Easy
						            </label>

						            <div class="uk-form-controls">
							            <p class="uk-form-help-block">
								            <span class="uk-badge">NOTE</span>
								            This will give you a few extra minutes to insert the code generated by your authentication application, instead of having it
								            expire on 30 seconds.
							            </p>
						            </div>
					            </div>

					            <!-- Secret Key -->
					            <div class="uk-form-row">
						            <label class="uk-form-label" for="auth_secret_key"><i class="fa fa-key"></i> Secret Key</label>
						            <div class="uk-form-controls">
							            <input name="wpc[auth_secret_key]" type="text" class="uk-width-1-1" id="auth_secret_key" value="<?php echo $auth_secret_key; ?>" placeholder="eg. ABCDEFG12345" readonly>
							            <p class="uk-form-help-block"><span class="uk-badge">NOTE</span>
								            Secret Key is being used between your website and your authentication application to establish a secure connection.
							            </p>
						            </div>
					            </div>

					            <!-- Description -->
					            <div class="uk-form-row">
						            <label class="uk-form-label" for="auth_description"><i class="fa fa-user"></i> Description</label>
						            <div class="uk-form-controls">
							            <textarea name="wpc[auth_description]" rows="4" class="uk-width-1-1" id="auth_description" placeholder="eg. MyWordPressWebsite"><?php echo $auth_description; ?></textarea>
							            <p class="uk-form-help-block"><span class="uk-badge">NOTE</span>
								            Type in the name for your website which will appear on your authentication application when you're done with scanning the QR code.
							            </p>
						            </div>
					            </div>
				            </div>
				            <div class="uk-width-1-2">
					            <div class="uk-form-row">
						            <label class="uk-form-label"><i class="fa fa-qrcode"></i> Authentication QR Code</label>
						            <div class="uk-block uk-block-primary uk-contrast m-b-10">

							            <div class="uk-container uk-captcha-container">

								            <h5><i class="fa fa-eye"></i> Scan the code below with your authenticator application</h5>

											<div id="qrcode"></div>

								            <p class="uk-form-help-block"><span class="uk-badge">NOTE</span>
									            Don't forget to save your settings before scanning the code above. First save the settings, then scan the code above to make sure everything is working as expected.
								            </p>

							            </div>

						            </div>



					            </div>
				            </div>
				        </div>

			        </div>
		        </div>


	            <!-- Lockdown -->
	            <div class="uk-panel uk-panel-box uk-panel-header">
		            <h4 class="uk-panel-title"><img
				            src="<?php echo WPC_URL; ?>assets/img/lock.png"> Lockdown
			            <small>- limit maximum number of failed login attempts</small>
		            </h4>
		            <div class="uk-alert"><b><i class="fa fa-question-circle"></i> What is Lockdown?</b> Lockdown is used to protect your website from bruteforce - dictionary attacks. Simply by monitoring number of failed attempts to login, Crusader can ban an IP for a time period that you have previously set.</div>

		            <div class="uk-form uk-form-stacked">

			            <div class="uk-grid">
				            <div class="uk-width-large-1-5">
					            <div class="uk-form-row">
						            <label class="uk-form-label" for="lockdown_attempts"><i class="fa fa-lock"></i> Maximum Login Attempts</label>
						            <div class="uk-form-controls">
							            <input name="wpc[lockdown_attempts]" type="number" class="uk-width-1-1" id="lockdown_attempts"
							                   value="<?php echo $lockdown_attempts; ?>" placeholder="eg. 5 (Default: Unlimited)">
							            <p class="uk-form-help-block"><span class="uk-badge">NOTE</span> This represents the maximum number of failed logins user can perform. After user has
							            tried to login unsuccessfully more than <code>X</code> attempts, Crusader will automatically ban his IP address for a specific time period. Leave blank
							            to have unlimited tries - have Lockdown turned off.</p>
						            </div>
					            </div>
				            </div>
				            <div class="uk-width-large-1-5">

					            <div class="uk-form-row">
						            <label class="uk-form-label" for="lockdown_ban_duration"><i class="fa fa-clock-o"></i> Duration of Ban</label>
						            <div class="uk-form-controls">
							            <input name="wpc[lockdown_ban_duration]" type="number" class="uk-width-1-1" id="lockdown_ban_duration"
							                   value="<?php echo $lockdown_ban_duration; ?>" placeholder="eg. 60 (Default: 60 minutes)">
							            <p class="uk-form-help-block"><span class="uk-badge">NOTE</span> Value in <code>minutes</code> that will determine how long will the ban last, once the user
								            has failed to login more than <code>X</code> times.
						            </div>
					            </div>

				            </div>
				            <div class="uk-width-large-3-5">

					            <div class="uk-form-row">
						            <label class="uk-form-label" for="secret_key"><i class="fa fa-gears"></i> Advanced Settings</label>

						            <div class="uk-form-controls">

							            <input type="hidden" name="wpc[lockdown_total_ban]" class="form-control" value="0"/>
							            <input id="lockdown_total_ban" type="checkbox" name="wpc[lockdown_total_ban]"
							                   value="1" <?php checked($lockdown_total_ban, 1) ?>>
							            <label for="lockdown_total_ban">Ban Access to Website <small>- (this will also ban the user from accessing your website, instead only your login form)</small></label>

							            <br>

							            <input type="hidden" name="wpc[lockdown_tracer]" class="form-control" value="0">
							            <input id="lockdown_tracer" type="checkbox" name="wpc[lockdown_tracer]"
							                   value="1" <?php checked($lockdown_tracer, 1) ?>>
							            <label for="lockdown_tracer">Use Tracer Cookie <small>- (injects a tracing cookie into banned user's browser to track the user who changes his IP address)</small></label>

							            <br>

							            <input type="hidden" name="wpc[lockdown_captcha]" class="form-control" value="0">
							            <input id="lockdown_captcha" type="checkbox" name="wpc[lockdown_captcha]"
							                   value="1" <?php checked($lockdown_captcha, 1) ?>>
							            <label for="lockdown_captcha">Consider failed Captcha as an attempt <small>- (this will make the Crusader count wrong captcha solutions as failed login attempts)</small></label>

							            <label class="uk-form-label m-t-5" for="lockdown_message"><i class="fa fa-warning"></i> Banned Message</label>
							            <div class="uk-form-controls">
								            <textarea style="width: 100%" rows="3" id="lockdown_message" name="wpc[lockdown_message]" class="uk-form-width-large" placeholder="eg. Ooops! You have been banned!"><?php echo $lockdown_message; ?></textarea>
							            </div>
							            <p class="uk-form-help-block"><span class="uk-badge">NOTE</span> This is the message that
								            will be displayed to the user after he's been banned by Crusader.</p>

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