<?php
/**
 * The template for displaying all pages
 *
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$context               = Timber::context();

Timber::render(array(
    '/views/footer.twig'
), $context);