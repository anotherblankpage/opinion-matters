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

?>

<!-- Custom Embedded Scripts For Body -->
<?php if(have_rows('embed_codes', 'option')): ?>
	<?php  while(have_rows('embed_codes', 'option')) : the_row(); ?>
		<?php if (get_sub_field('location') == 'footer'): ?>
			<?php the_sub_field('code'); ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>
