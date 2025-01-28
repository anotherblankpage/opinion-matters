<?php
/**
 * Whitelist gutenberg blocks
 *
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


add_action( 'acf/init', 'my_acf_init' );

function my_acf_init() {
    // Bail out if function doesn’t exist.
    if ( ! function_exists( 'acf_register_block' ) ) {
        return;
    }

    // Register blocks.

	// Two Column
	acf_register_block( array(
        'name'            => 'two-column-content',
        'title'           => __('Two Column Content'),
        'category'        => 'layout',
		'render_callback' => 'my_acf_block_render_callback',
		'mode'            => 'edit',
        'icon'            => 'columns'
    ));

    // Single Column
	acf_register_block( array(
        'name'            => 'single-column-content',
        'title'           => __('Single Column Content'),
        'category'        => 'layout',
		'render_callback' => 'my_acf_block_render_callback',
		'mode'            => 'edit',
        'icon'            => 'align-center'
    ));

    // Card Grid
	acf_register_block( array(
        'name'            => 'card-grid',
        'title'           => __('Card Grid'),
        'category'        => 'layout',
		'render_callback' => 'my_acf_block_render_callback',
		'mode'            => 'edit',
        'icon'            => 'grid-view'
    ));

    // Slider
	acf_register_block( array(
        'name'            => 'slider',
        'title'           => __('Slider'),
        'category'        => 'layout',
		'render_callback' => 'my_acf_block_render_callback',
		'mode'            => 'edit',
        'icon'            => 'align-pull-left'
    ));

    // Heading
	acf_register_block( array(
        'name'            => 'heading',
        'title'           => __('Heading'),
        'category'        => 'layout',
		'render_callback' => 'my_acf_block_render_callback',
		'mode'            => 'edit',
        'icon'            => 'heading'
    ));

}

/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function my_acf_block_render_callback( $block, $content = '', $is_preview = false) {
    $context = Timber::context();
    // Store block values.
    $context['block'] = $block;
    // Store field values.
    $context['fields'] = get_fields();
    // Render the block.
    switch($block['name']) {
        case 'acf/two-column-content':
            Timber::render('views/blocks/two-column-content.twig', $context);
            break;
        case 'acf/single-column-content':
            Timber::render('views/blocks/single-column-content.twig', $context);
            break;
        case 'acf/card-grid':
            Timber::render('views/blocks/card-grid.twig', $context);
            break;
        case 'acf/slider':
            Timber::render('views/blocks/slider.twig', $context);
            break;
        case 'acf/heading':
            Timber::render('views/blocks/heading.twig', $context);
            break;
        default;
    }
}




// Remove unused blocks and whitelist
add_filter( 'allowed_block_types_all', 'allowed_block_types', 25, 2 );
 
function allowed_block_types( $allowed_blocks, $editor_context ) {
 
	return array(
		// Core
		// 'core/image',
		// 'core/paragraph',
		'core/heading',
		// 'core/list',
		// 'core/list-item',
		// Custom
		'acf/two-column-content',
        'acf/single-column-content',
        'acf/card-grid',
        'acf/slider',
        'acf/heading'
	);
 
}