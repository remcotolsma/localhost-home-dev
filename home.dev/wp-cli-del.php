<?php

$commands = array();

$commands[] = 'cd ' . $new;

$commands[] = 'wp db drop';

$commands[] = 'rm -r ' . $new;

echo '<pre>';
echo implode( "\r\n\r\n", $commands );
echo '</pre>';
