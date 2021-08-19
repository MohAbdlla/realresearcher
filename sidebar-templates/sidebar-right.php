<?php
/**
 * The right sidebar containing the main widget area
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
	<div class="col-lg-3 widget-area" id="right-sidebar" role="complementary">
<?php else : ?>
	<div class="col-lg-4 widget-area" id="right-sidebar" role="complementary">
<?php endif; ?>

	<?php get_template_part( 'sidebar-templates/side', 'ads' ); ?>

	<?php dynamic_sidebar( 'right-sidebar' ); ?>

	<?php get_template_part( 'sidebar-templates/sidecustom', 'ads' ); ?>

	<?php dynamic_sidebar( 'subscribe' ); ?>

	<?php get_template_part( 'sidebar-templates/long', 'ads' ); ?>

</div><!-- #right-sidebar -->


