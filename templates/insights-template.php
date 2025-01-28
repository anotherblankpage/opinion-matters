<?php
/**
 * Template Name: Insights Template
 *
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$query = [
    'post_type' => 'insight',
    'posts_per_page' => -1,
    'post_status' => 'publish',
];

$context                   = Timber::context();
$context['posts']   = Timber::get_posts($query);



Timber::render(array(
    '/views/templates/insights-template.twig'
), $context);

get_footer();
