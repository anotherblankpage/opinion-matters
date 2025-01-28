<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!DOCTYPE html>
<html class="sr" <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <script src="https://kit.fontawesome.com/fafc62e4fe.js" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">
<!-- Timber Template Call -->
<?php 

$context = Timber::context();
Timber::render(array(
    '/views/navbar.twig'
), $context);

?>