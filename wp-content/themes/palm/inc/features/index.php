<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$gns_includes = [
    
];

foreach ( $gns_includes as $file ) {
	require_once get_template_directory() . '/inc/features/' . $file;
}