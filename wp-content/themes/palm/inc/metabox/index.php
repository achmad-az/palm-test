<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$gns_includes = [
	'class-hero-block.php',
	'class-our-services-block.php',
	'class-image-text-block.php',
	'class-testimonial-block.php',
];

foreach ( $gns_includes as $file ) {
	require_once get_template_directory() . '/inc/metabox/' . $file;
}