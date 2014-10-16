<?php

// Functions
function wp_cli_options_str( $options ) {
	$array = array();

	foreach ( $options as $name => $value ) {
		$array[] = '--' . $name . '=' . $value;
	}

	$string = implode( ' ', $array );

	return $string;
}
