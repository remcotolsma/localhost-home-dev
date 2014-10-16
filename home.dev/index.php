<?php

require '../config.php';

$websites = array();

$options = array(
	'home.dev' => array(
		'display_name' => 'Home',
	),
	'phpmyadmin.dev' => array(
		'display_name' => 'phpMyAdmin',
	),
	'phpinfo.dev' => array(
		'display_name' => 'phpinfo()',
	),
);

foreach ( glob( '../*.dev' ) as $file ) {
	$project = basename( $file );

	if ( is_dir ( $file ) ) {
		$basename = basename( $file );

		$website = new stdClass();
		$website->file = $file;
		$website->name = $basename;
		$website->url  = 'http://' . $website->name . '/';

		if ( isset( $options[ $basename ] ) ) {
			if ( isset( $options[ $basename ]['display_name'] ) ) {
				$website->name = $options[ $basename ]['display_name'];
			}
		}

		$websites[] = $website;
	}
}

foreach ( $websites as $website ) {
	printf(
		'<a href="%s">%s</a>',
		$website->url, 
		$website->name
	);

	echo '<br />';
}

// Functions
function wp_cli_options_str( $options ) {
	$array = array();

	foreach ( $options as $name => $value ) {
		$array[] = '--' . $name . '=' . $value;
	}

	$string = implode( ' ', $array );

	return $string;
}

// WordPress install
$root   = realpath( '../' );
$domain = 'test.dev';
$new    = $root . '/' . $domain;

$commands[] = 'mkdir ' . $new;

$commands[] = 'cd ' . $new;

$commands[] = 'wp core download ' . wp_cli_options_str( array(
	'path'   => $new,
	'locale' => $locale,
) );

$commands[] = 'wp core config ' . wp_cli_options_str( array(
	'dbname' => str_replace( '.', '_', $domain ) . '_wp',
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
echo implode( "\r\n", $commands );
echo '</pre>';
