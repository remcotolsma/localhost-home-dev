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
