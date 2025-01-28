<?php
/**
 * Custom blocks and menu registration
 *
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*------------------------------------*\
	Menu Registration
\*------------------------------------*/
function register_my_menus() {
    register_nav_menus(array(        
        'policy-menu' => __( 'Policy Menu' ),
        'footer-menu' => __( 'Footer Menu' ),
    ));
}
add_action( 'init', 'register_my_menus' );