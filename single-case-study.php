<?php
/**
 * The template for displaying all pages
 *
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$context               = Timber::context();
$context['post']       = Timber::get_post();

Timber::render(array(
    '/views/single/single-case-study.twig'
), $context);

get_footer();
