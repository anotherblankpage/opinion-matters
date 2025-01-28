<?php
/**
 * Child theme functions for Another Blank Boilerplate
 *
 * 
 */


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/* TIMBER */
// Load Composer dependencies.
require_once __DIR__ . '/vendor/autoload.php';

// Initialize Timber.
Timber\Timber::init();

// Mobile Detect
require_once __DIR__ . '/vendor/mobiledetect/mobiledetectlib/src/MobileDetect.php';

// Upload override
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );


// Include directory
$inc_dir = 'inc';

// Array of files to include so we don't have a 10,000+ line function file
$include_files = array (
	'enqueue.php',                         // Enqueue scripts and styles
	'menu-registration.php',               // Register new menus
	'gutenberg-block-registration.php',    // Whitelist only certain gutenberg blocks
	'wysiwyg-custom-formats.php',          // Custom formats for ACF wysiwyg
	'acf-settings.php',                    // ACF Settings, Local Json, etc.
	'timber/context.php',                  // Timber context extension
	'timber/timber-functions.php'          // Timber functions
);

// Include files.
foreach ( $include_files as $file ) {
	require_once get_theme_file_path( $inc_dir . '/' . $file );
}