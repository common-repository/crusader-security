<?php if (!defined('ABSPATH')) die('Access Denied.'); ?>

<div class="error">
	
	<p>WordPress Crusader error: Your environment doesn't meet <strong>all</strong> of the system requirements listed below.</p>

	<ul class="ul-disc">
		
		<li>
			<strong>PHP <?php echo WPC_REQUIRED_PHP_VERSION; ?>+ is required</strong>
			<em>(You're running version <?php echo PHP_VERSION; ?>)</em>
		</li>

		<li>
			<strong>WordPress <?php echo WPC_REQUIRED_WP_VERSION; ?>+ is required</strong>
			<em>(You're running version <?php echo esc_html( $wp_version ); ?>)</em>
		</li>

		<li>
			<strong>Your site is set up as a Network (Multisite)</strong>
			<em>(This plugin is not compatible with multisite environment)</em>
		</li>

	</ul>
	
</div>