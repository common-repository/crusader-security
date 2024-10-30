<?php if (!defined('ABSPATH')) die('Access Denied.'); ?>

<!-- HTML STARTS HERE -->
<script>
	var Plugin_URL = "<?php echo WPC_URL; ?>";
	var Home_URL = "<?php echo get_home_url(); ?>";
</script>

<div class="wrap wpc">

	<h2 class="logo-title">
		<img class="logo-image" src="<?php echo WPC_URL; ?>/assets/img/logo.png"/>
		Crusader Security - Firewall
		-
		<small class="hand">Track and block any unwanted users on your site by their location or ip...</small>
	</h2>

	<div class="uk-alert"><b><i class="fa fa-question-circle"></i> How can this help me?</b>
		By using Firewall you can block unwanted visitors from your website. You can ban IP addresses, whole countries or even
		specific crawlers from being able to make requests toward your website. Also, you will be able to track visits in real time
		using Live Traffic Monitor.
	</div>

	<div class="uk-grid">
		<div class="uk-width-1-1">
			<div class="uk-panel uk-panel-box uk-panel-header">
				<ul class="uk-tab" data-uk-tab="{connect:'#tab-global'}">
					<li class="uk-active">
						<a href="">
							<img src="<?php echo WPC_URL; ?>assets/img/firewall_monitor.png"> Live
							Traffic Monitor
						</a>
					</li>
					<li>
						<a href="">
							<img src="<?php echo WPC_URL; ?>assets/img/firewall.png"> Firewall
						</a>
					</li>
					<li>
						<a href="">
							<img src="<?php echo WPC_URL; ?>assets/img/gears.png"> Settings
						</a>
					</li>
				</ul>

				<ul id="tab-global" class="uk-switcher">
					<li class="uk-active" aria-hidden="false">
						<div class="uk-grid">
							<div class="uk-width-medium-1-1">
								<div class="uk-overflow-container uk-overflow-css">
									<table class="uk-table uk-table-hover" style="background: white;">
										<div class="uk-grid" id="geo_monitor_table">
											<input type="hidden" id="lastID" value="0"/>
											<div class="uk-text-center more_data"><i class="fa fa-refresh fa-spin"></i>
												Loading Data...
											</div>
										</div>
									</table>
								</div>
							</div>
						</div>
					</li>
					<li aria-hidden="true" class="">

						<ul class="uk-tab m-t-10" data-uk-tab="{connect:'#tab-firewall'}">
							<li class="uk-active">
								<a href=""><i class="fa fa-code"></i> IP Management</a>
							</li>
							<li class="map-container">
								<a href=""><i class="fa fa-globe"></i> Country Management</a>
							</li>
							<li>
								<a href=""><i class="fa fa-bug"></i> Crawler Management</a>
							</li>
						</ul>

						<ul id="tab-firewall" class="uk-switcher">
							<li class="uk-active" aria-hidden="false">
								<div class="uk-grid uk-grid-collapse">
									<div class="uk-width-medium-1-2">
										<div class="uk-overflow-container uk-overflow-css">

											<form class="ban-ip">

												<div class="uk-form uk-form-stacked">

													<div class="uk-form-row uk-form-row-default">
														<label class="uk-form-label" for="ban_ip">
															<i class="fa fa-gavel"></i> Ban a Single IP Address
														</label>

														<div class="uk-form-controls">

															<input type="text"
															       class="uk-width-1-1 uk-ip-address ban-ips"
															       id="ban_ip" name="ban_ip"
															       placeholder="XXX.XXX.XXX.XXX"/>

															<p class="uk-form-help-block">
																<span class="uk-badge">NOTE</span>
																Here you can ban a single IP address by typing it in the text box above and pressing the button below.
														</div>
													</div>

													<div class="uk-form-row uk-form-row-default">
														<label class="uk-form-label" for="ban_ip_range">
															<i class="fa fa-gavel"></i> Ban a IP Address Range
														</label>

														<div class="uk-form-controls">

															<div class="uk-grid uk-grid-small">
																<div class="uk-width-medium-1-2">
																	<input type="text"
																	       class="uk-width-1-1 uk-ip-address ban-ips"
																	       id="ban_ip_range_1" name="ban_ip_range[0]"
																	       placeholder="XXX.XXX.XXX.XXX"/>
																</div>
																<div class="uk-width-medium-1-2">
																	<input type="text"
																	       class="uk-width-1-1 uk-ip-address ban-ips"
																	       id="ban_ip_range_2" name="ban_ip_range[1]"
																	       placeholder="XXX.XXX.XXX.XXX"/>
																</div>
															</div>

															<p class="uk-form-help-block">
																<span class="uk-badge">NOTE</span>
																Here you can ban an entire IP Address range. Be sure that values from first text box are lower than those in the first, otherwise problems may occur. Leave blank if you only wish to ban a single IP address from above.
															</p>
														</div>
													</div>

													<div class="uk-form-row uk-form-row-default uk-text-center">
														<button class="uk-button uk-button-large uk-button-primary"
														        type="submit"><i class="fa fa-ban"></i> Add to Banned IP List
														</button>
													</div>

												</div>

											</form>

										</div>
									</div>
									<div class="uk-width-medium-1-2">
										<div class="uk-overflow-container uk-overflow-css">
											<table class="uk-table uk-table-hover" style="background: white;">
												<thead>
												<tr>
													<th width="33%">IP Address</th>
													<th width="33%">Date Banned</th>
													<th width="33%">Action</th>
												</tr>
												</thead>
												<tbody id="firewall_banned_ip">

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</li>
							<li aria-hidden="true">
								<div class="uk-grid uk-grid-collapse">
									<div class="uk-width-medium-1-2">
										<div class="uk-overflow-container uk-overflow-css">
											<!-- Map -->
											<div class="uk-width-1-1 m-b-10" id="country-map"></div>

											<!-- Current Country -->
											<div class="uk-width-1-1 m-b-10">
												<div class="ban_country_form">
													<b><i class="fa fa-globe"></i> Selected Country</b>: <input placeholder="None" readonly class="selected-country" name="country"/>
													<button type="button" class="uk-button uk-button-danger uk-button-small firewall_ban selected_country_button" data-id="" data-type="location"><i class="fa fa-ban"></i> Ban Country</button>
												</div>
												<p class="uk-form-help-block">
													<span class="uk-badge">NOTE</span>
													Here you can view currently banned countries and ban more by selecting them on map and pressing the button above.
												</p>
											</div>
										</div>
									</div>
									<div class="uk-width-medium-1-2">
										<div class="uk-overflow-container uk-overflow-css">
											<table class="uk-table uk-table-hover" style="background: white;">
												<thead>
												<tr>
													<th width="33%">Country</th>
													<th width="33%">Date Banned</th>
													<th width="33%">Action</th>
												</tr>
												</thead>
												<tbody id="firewall_banned_location">

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</li>
							<li aria-hidden="true" class="">
								<div class="uk-overflow-container uk-overflow-css">

									<div class="uk-grid uk-grid-collapse">
										<div class="uk-width-medium-1-2">
											<form class="uk-search uk-width-1-1" data-uk-search>
												<input class="uk-search-field" id="search-crawlers" style="width: 100%;" type="search" placeholder="search for a crawler...">
											</form>
										</div>
										<div class="uk-width-medium-1-2 uk-text-right">
											<button class="uk-button uk-button-primary unban_all_crw" type="button"><i class="fa fa-check"></i> UnBan All Crawler</button>
											<button class="uk-button uk-button-danger ban_all_crw" type="button"><i class="fa fa-close"></i> Ban All Crawler</button>
										</div>

									</div>



									<p class="uk-form-help-block m-b-10">
										<span class="uk-badge">NOTE</span>
										Simply click the crawlers that you want to ban from your website. By clicking on the crawler you will toggle whether the selected crawler is allowed or banned to visit your website.
									</p>

									<div class="uk-grid uk-grid-small crawler-list">


									</div>
								</div>
							</li>
						</ul>

					</li>
					<li aria-hidden="true" class="">
						<form class="wpc-settings-form">
							<input type="hidden" name="action" value="wpc_save_options"/>

							<?php
							$wpc = get_option( 'wpc' );
							$firewall_monitor = isset( $wpc['firewall_monitor'] ) ? $wpc['firewall_monitor'] : 0;
							$firewall_admin = isset( $wpc['firewall_monitor_admin'] ) ? $wpc['firewall_monitor_admin'] : 0;
							$firewall_skip = isset( $wpc['firewall_skip_common'] ) ? $wpc['firewall_skip_common'] : 0;
							$firewall = isset( $wpc['firewall'] ) ? $wpc['firewall'] : 0;
							$firewall_sync = isset( $wpc['firewall_sync'] ) ? $wpc['firewall_sync'] : 0;
							?>

							<div class="uk-form uk-form-stacked">
								<div class="uk-form-row">
									<label class="uk-form-label" for="firewall_monitor">
										<input type="hidden" name="wpc[firewall_monitor]" class="form-control"
										       value="0"/>
										<input id="firewall_monitor" type="checkbox" name="wpc[firewall_monitor]"
										       value="1" <?php checked( $firewall_monitor, 1 ) ?>>
										Live Traffic Monitor
									</label>

									<div class="uk-form-controls">
										<p class="uk-form-help-block">
											<span class="uk-badge">NOTE</span>
											By activating Live Traffic Monitor, all requests that pass through WordPress
											core will be cached inside of database for your later inspection. This is a
											good way
											of catching some bad guys trying to harm your website.
										</p>
									</div>
								</div>

								<div class="uk-form-row">
									<label class="uk-form-label" for="firewall_monitor_admin">
										<input type="hidden" name="wpc[firewall_monitor_admin]" class="form-control"
										       value="0"/>
										<input id="firewall_monitor_admin" type="checkbox"
										       name="wpc[firewall_monitor_admin]"
										       value="1" <?php checked( $firewall_admin, 1 ) ?>>
										Live Traffic Monitor <i>(Admin Area)</i>
									</label>

									<div class="uk-form-controls">
										<p class="uk-form-help-block">
											<span class="uk-badge">NOTE</span>
											Same as the Live Traffic Monitor, but when this option is turned on, it will
											monitor the traffic coming from the WordPress admin area as well. This is
											good to have
											if you have a website that has registrations turned on and you want to
											monitor what's going on.
										</p>
									</div>
								</div>

								<div class="uk-form-row">
									<label class="uk-form-label" for="firewall_skip_common">
										<input type="hidden" name="wpc[firewall_skip_common]" class="form-control"
										       value="0"/>
										<input id="firewall_skip_common" type="checkbox"
										       name="wpc[firewall_skip_common]"
										       value="1" <?php checked( $firewall_skip, 1 ) ?>>
										Skip common WordPress requests
									</label>

									<div class="uk-form-controls">
										<p class="uk-form-help-block">
											<span class="uk-badge">NOTE</span>
											It is advisable to turn this option on if you have Live Traffic Monitor
											turned on for Admin Area as you will probably see a lot of common admin-ajax
											and admin-post requests. This option whitelists those requests and does not
											cache them.
										</p>
									</div>
								</div>

								<div class="uk-form-row">
									<label class="uk-form-label" for="firewall">
										<input type="hidden" name="wpc[firewall]" class="form-control" value="0"/>
										<input id="firewall" type="checkbox" name="wpc[firewall]"
										       value="1" <?php checked( $firewall, 1 ) ?>>
										Disable Firewall
									</label>

									<div class="uk-form-controls">
										<p class="uk-form-help-block">
											<span class="uk-badge">NOTE</span>
											By enabling this option you will disable the Firewall. This is not recommended, but could be useful in some cases.
										</p>
									</div>
								</div>

								<div class="uk-form-row">
									<label class="uk-form-label" for="firewall_sync">
										<input type="hidden" name="wpc[firewall_sync]" class="form-control" value="0"/>
										<input id="firewall_sync" type="checkbox" name="wpc[firewall_sync]"
										       value="1" <?php checked( $firewall_sync, 1 ) ?>>
										Firewall Synchronization
									</label>

									<div class="uk-form-controls">
										<p class="uk-form-help-block">
											<span class="uk-badge">NOTE</span>
											This will enable firewall synchronization of all your websites running Crusader. If you turn this option on, your banned ip/country/crawler database will be
											stored at our server, which can be later on shared with new Crusader installations.
										</p>
									</div>
								</div>

								<br>

								<div class="uk-width-1-1">
									<button type="submit" name="submit" id="submit-wpc-changes"
									        class="uk-button uk-button-primary"><i
											class="fa fa-save"></i> Save All Changes
									</button>
								</div>
							</div>

						</form>
					</li>
				</ul>

			</div>
		</div>
	</div>

</div> <!-- .wrap -->

<!-- Crawler Template -->
<div class="crawler template uk-hidden">
	<div class="uk-grid uk-grid-small">
		<div class="uk-width-medium-1-4">
			<i class="fa fa-check crawler-status"></i>
		</div>
		<div class="uk-width-medium-3-4">
			<div class="crawler-inner truncate">
				<i class="fa fa-user"></i> <b>Name</b>: <span class="crawler-name">YandexBot</span>
			</div>
			<div class="crawler-inner truncate">
				<i class="fa fa-info-circle"></i> <b>Info</b>: <span class="crawler-info"></span>
			</div>
		</div>
	</div>
</div>

<!--Live Traffic Template-->
<div class="geo_monitor_template uk-hidden">

	<div class="uk-grid">
		<div class="uk-width-medium-1-1 m-b-5">
			<img class="country_Flag" src="<?php echo WPC_URL; ?>assets/img/flags/rs.png" width="20">
			<a class="country_Location" href="https://www.google.com/maps?q=Serbia" target="_blank">Serbia</a> <span
				class="visited">visited</span>
			<a class="visited_Location" href="http://n-finity.org/hello-world/" target="_blank">http://n-finity.org/hello-world/</a>
		</div>
		<div class="uk-width-medium-1-1 m-b-5">
			<i class="uk-icon-clock-o"></i> <span class="visited_DateTime m-r-20">2016-04-12 18:34:33</span>
			<b>IP</b>: <span class="visited_IP m-r-20">178.149.14.49</span>
			<b>Hostname</b>: <span class="visited_Hostname">cable-178-149-14-49.dynamic.sbb.rs</span>
		</div>
		<div class="uk-width-medium-1-1 m-b-5">
			<i class="uk-icon-user"></i> <b>Referrer</b>: <span class="referrer m-r-20">Direct Visit <i>(No Referrer
					Detected)</i></span>
		</div>
		<div class="uk-width-medium-1-1 m-b-5">
			<i class="uk-icon-globe"></i> <span class="browser_Agent">Chrome (Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.112 Safari/537.36)</span>
		</div>
		<div class="uk-width-medium-1-1 m-b-5">
			Browser Name: <span class="browser_Name m-r-20" style="font-weight: bold">Chrome</span>
			Browser Version: <span class="browser_Version m-r-20" style="font-weight: bold">42.0.2311.152</span>
		</div>
		<div class="uk-width-medium-1-1 m-b-5">
			<button class="uk-button uk-button-danger uk-button-mini firewall_ban" data-type="ip" data-id="0"
			        type="button">Ban IP
			</button>
			<button class="uk-button uk-button-danger uk-button-mini firewall_ban" data-type="location" data-id="0"
			        type="button">Ban Country
			</button>
		</div>
	</div>

</div>