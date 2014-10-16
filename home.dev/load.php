<?php

require_once '../config.php';
require_once 'functions.php';

// Date
date_default_timezone_set( $timezone );

// Websites
$websites = array();

$options = array(
	'home.dev' => array(
		'display_name' => 'Home',
		'description'  => 'A localhost webpage for WordPress development.',
	),
	'phpmyadmin.dev' => array(
		'display_name' => 'phpMyAdmin',
		'description'  => 'phpMyAdmin is a free software tool written in PHP, intended to handle the administration of MySQL over the Web.',
	),
	'phpinfo.dev' => array(
		'display_name' => 'phpinfo()',
		'description'  => 'Outputs information about PHP\'s configuration',
	),
);

foreach ( glob( '../*.dev' ) as $file ) {
	$project = basename( $file );

	if ( is_dir ( $file ) ) {
		$basename = basename( $file );

		$website = new stdClass();
		$website->file        = $file;
		$website->name        = $basename;
		$website->description = '';
		$website->url         = 'http://' . $website->name . '/';

		if ( isset( $options[ $basename ] ) ) {
			if ( isset( $options[ $basename ]['display_name'] ) ) {
				$website->name = $options[ $basename ]['display_name'];
			}

			if ( isset( $options[ $basename ]['description'] ) ) {
				$website->description = $options[ $basename ]['description'];
			}
		}

		$websites[] = $website;
	}
}
