<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">New .dev</h3>
	</div>

	<div class="panel-body">
		<form class="form-inline">
			<div class="form-group">
				<label class="sr-only" for="exampleInputEmail2">Domain</label>

				<div class="input-group">
					<input type="text" class="form-control" id="exampleInputEmail2" placeholder="Enter domain" ng-model="domain">

					<span class="input-group-addon">.dev</span>
				</div>
			</div>
		</form>
	</div>
</div>

<?php

// WordPress install
$root   = realpath( '../' );
$domain = '{{domain}}.dev';
$new    = $root . '/' . $domain;

$commands[] = 'mkdir ' . $new;

$commands[] = 'cd ' . $new;

$commands[] = 'wp core download ' . wp_cli_options_str( array(
		'path'   => $new,
		'locale' => $locale,
) );

$commands[] = 'wp core config ' . wp_cli_options_str( array(
		'dbname' => $domain . '_wp',
		'dbuser' => $dbuser,
		'dbpass' => $dbpass,
		'locale' => $locale,
) );

$commands[] = 'wp db create';

$commands[] = 'wp core install ' . wp_cli_options_str( array(
		'url'            => 'http://' . $domain . '/',
		'title'          => $domain,
		'admin_user'     => $admin_user,
		'admin_password' => $admin_password,
		'admin_email'    => $admin_email,
) );

echo '<pre>';
echo implode( "\r\n\r\n", $commands );
echo '</pre>';

// Plugins
$commands = array();

$plugins = array(
	array(
		'plugin'   => 'pronamic-client',
		'activate' => true,
	),
	array(
		'plugin'   => 'google-analytics-for-wordpress',
		'activate' => false,
	),
	array(
		'plugin'   => 'wordpress-seo',
		'activate' => false,
	),
	/*
	array(
		'plugin'   => 'https://github.com/gravityforms/gravityforms/archive/master.zip',
		'activate' => true,
	),
	*/
	array(
		'plugin'   =>'gravityforms-nl',
		'activate' => true,
	),
	array(
		'plugin'   =>'iwp-client',
		'activate' => false,
	),
	array(
		'plugin'   =>'sucuri-scanner',
		'activate' => true,
	),
	array(
		'plugin'   =>'regenerate-thumbnails',
		'activate' => false,
	),
);

foreach ( $plugins as $plugin ) {
	$options = array();
	if ( isset( $plugin['activate'] ) && $plugin['activate'] ) {
		$options['activate'] = true;
	}

	$commands[] = 'wp plugin install ' . $plugin['plugin'] . ' ' . wp_cli_options_str( $options );
}

echo '<pre>';
echo implode( "\r\n\r\n", $commands );
echo '</pre>';
