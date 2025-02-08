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
<html class="sr m-0" <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Fonts and Icons -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.typekit.net/new0pah.css">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <script src="https://kit.fontawesome.com/fafc62e4fe.js" crossorigin="anonymous"></script>
	<?php wp_head(); ?>

	<!-- Custom Embedded Scripts For Head -->
	<?php if(have_rows('embed_codes', 'option')): ?>
		<?php  while(have_rows('embed_codes', 'option')) : the_row(); ?>
			<?php if (get_sub_field('location') == 'head'): ?>
				<?php echo get_sub_field('code'); ?>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<!-- Custom Embedded Scripts For Body -->
<?php if(have_rows('embed_codes', 'option')): ?>
	<?php  while(have_rows('embed_codes', 'option')) : the_row(); ?>
		<?php if (get_sub_field('location') == 'body'): ?>
			<?php echo get_sub_field('code'); ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>


<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">
<!-- Timber Template Call -->
<?php 

$context = Timber::context();
$context['post'] = Timber::get_post();

Timber::render(array(
    '/views/navbar.twig'
), $context);

?>