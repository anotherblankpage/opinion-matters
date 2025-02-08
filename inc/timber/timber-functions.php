<?php
/**
 * Extend Timber Context
 *
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


// Twig custom functions to call within template
add_filter( 'timber/twig', 'add_to_twig' );
function add_to_twig( $twig ) {
   // Adding a function.
   $twig->addFunction( new Twig\TwigFunction( 'getPosts', 'getPosts' ) );
	$twig->addFunction( new Twig\TwigFunction( 'hasPosts', 'hasPosts' ) );
   $twig->addFunction( new Twig\TwigFunction( 'getPost', 'getPost' ) );
	$twig->addFunction( new Twig\TwigFunction( 'getTerms', 'getTerms' ) );
	$twig->addFunction( new Twig\TwigFunction( 'varDump', 'varDump' ) );
	$twig->addFunction( new Twig\TwigFunction( 'is_image_url_valid', 'is_image_url_valid' ) );
	$twig->addFunction( new Twig\TwigFunction( 'resize', 'resize' ) );
    return $twig;
}

// Get post by slug
function getPosts($str) {
	$args = array(
		'numberposts' => 99,
		'post_type' => $str,
		'post_status' => 'publish',
		'ignore_sticky_posts' => true,
		'orderby'  => 'date'
	);
	$query = Timber::get_posts($args);
	return  $query;
}

// If has posts or not
function hasPosts($posts) {
	return count($posts);
}

// Get post by id
function getPost($id) {
	return Timber::get_post($id);
}

// Get term by slug
function getTerms($str) {
	$terms = get_terms( array(
		'taxonomy' => $str,
		'hide_empty' => true,
	));
	return $terms;
}

// Dump object
function varDump($obj) {
	var_dump($obj);
}

