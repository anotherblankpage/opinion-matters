<?php
/**
 * Wysiwyg Custom Formats
 *
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function add_style_select_buttons( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_1', 'add_style_select_buttons' );

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'Color',
			'items' => array(
				array(  
					'title' => 'Primary',
					'selector' => '*',
					'classes' => 'text-primary',
				
				)
			)
		),
		array(  
			'title' => 'Headings',
			'items' => array(
				array(  
					'title' => 'H1',
					'selector' => '*',
					'classes' => 'h1'
				),
				array(  
					'title' => 'H2',
					'selector' => '*',
					'classes' => 'h2'
				),
				array(  
					'title' => 'H3',
					'selector' => '*',
					'classes' => 'h3'
				),
				array(  
					'title' => 'H4',
					'selector' => '*',
					'classes' => 'h4'
				),
				array(  
					'title' => 'H5',
					'selector' => '*',
					'classes' => 'h5'
				),
				array(  
					'title' => 'H6',
					'selector' => '*',
					'classes' => 'h6'
				)
			)
		),
		array(  
			'title' => 'Paragraph',
			'items' => array(
				array(  
					'title' => 'Large',
					'selector' => '*',
					'classes' => 'text-large'
				),
				array(  
					'title' => 'Semi',
					'selector' => '*',
					'classes' => 'text-semi'
				),
				array(  
					'title' => 'Small',
					'selector' => '*',
					'classes' => 'text-small'
				),
				array(  
					'title' => 'Indent',
					'selector' => 'p',
					'classes' => 'text-indent'
				)
			)
		),
		array(  
			'title' => 'Buttons',
			'items' => array(
				array(  
					'title' => 'Link with Arrow',
					'selector' => 'a',
					'classes' => 'arrow-link'
				),
				array(  
					'title' => 'Pill Button',
					'selector' => 'a',
					'classes' => 'pill-btn bg-primary-700'
				),
				array(  
					'title' => 'Pill Button White',
					'selector' => 'a',
					'classes' => 'pill-btn light shadow'
				),
				array(  
					'title' => 'Peel Button',
					'selector' => 'a',
					'classes' => 'peel-btn'
				),
			)
		),
		array(  
			'title' => 'Misc',
			'items' => array(
				array(  
					'title' => 'Badge',
					'block' => 'span',
					'classes' => 'badge'
				)
			)
		)
	);

	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = wp_json_encode( $style_formats );  
	return $init_array;  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

function custom_editor_styles() {
	add_editor_style('https://kit.fontawesome.com/fafc62e4fe.css');
	add_editor_style(get_stylesheet_directory() . '/css/custom-editor-style.css');
}
add_action('init', 'custom_editor_styles');
