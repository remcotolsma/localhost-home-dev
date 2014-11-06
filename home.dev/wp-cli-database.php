<?php

// WordPress install
$root   = realpath( '../' );
$domain = '{{domain}}.dev';
$new    = $root . '/' . $domain;

$commands = array();

$commands[] = 'cd ' . $new;

$commands[] = 'wp db import ~/Downloads/';

$commands[] = 'wp search-replace';

echo '<pre>';
echo implode( "\r\n\r\n", $commands );
echo '</pre>';
