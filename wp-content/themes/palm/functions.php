<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// use carbon fields
use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Theme setup.
 */
function geekandsundry_setup() {
	require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();

	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'geekandsundry' ),
			'footer-left' => __( 'Footer Left', 'geekandsundry' ),
			'footer-right' => __( 'Footer Right', 'geekandsundry' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo', array(
        'height'      => 35,
        'width'       => 238,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );

	// add image sizes
	add_image_size('small-card', 86, 75, []);
	add_image_size('video-card', 194, 105, []);
	add_image_size('default-card', 307, 173, []);
	add_image_size('special-card', 527, 297, []);
	add_image_size('rect-card', 650, 650, []);
	add_image_size('portrait-card', 367, 524, []);
	add_image_size('hero', 856, 482, []);
	add_image_size('hero-big', 962, 541, []);
}
add_action( 'after_setup_theme', 'geekandsundry_setup' );

$nerdist_includes = [
    '/constants.php',
    '/enqueue.php',
    '/extras.php',
	'/hooks.php',

    // Theme Setup
    '/setups/index.php',

    // Feature
    '/features/index.php',

	//Metabox
	'/metabox/index.php',
];

foreach ( $nerdist_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}