<?php
/**
 * Extend Timber Context
 *
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Globally accessible variables for twig templates
add_filter( 'timber_context', 'extend_context'  );
function extend_context( $context ) {
	$device = new Detection\MobileDetect;
	$context['device']                = $device;
	$context['is_mobile']             = $device->isMobile();

	// Global Settings
	$context['global']                = get_fields('option');

	// Taxonomies
	// $context['term']                  = new Timber\Term();
	// $context['post_terms']            = Timber::get_terms('category');

	// Menus
	$context['primary_menu']          = Timber::get_menu( 'primary' );
	$context['policy_menu']           = Timber::get_menu( 'policy-menu' );
	$context['footer_menu']           = Timber::get_menu( 'footer-menu' );

	// Misc
	$context['year'] = date('Y');

	return $context;
}