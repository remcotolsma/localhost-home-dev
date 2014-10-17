<?php

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
