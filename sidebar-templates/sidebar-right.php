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

	<?php if(is_active_sidebar('sidebare-ads1')) : ?>
		<?php dynamic_sidebar( 'sidebare-ads1' ); ?>
	<?php endif; ?>

	<?php if(is_active_sidebar('right-sidebar')) : ?>
		<?php dynamic_sidebar( 'right-sidebar' ); ?>
	<?php endif; ?>

	<?php if(is_active_sidebar('sidebare-custom-ads')) : ?>
		<?php dynamic_sidebar( 'sidebare-custom-ads' ); ?>
	<?php endif; ?>

	<?php if(is_active_sidebar('subscribe')) : ?>
		<?php dynamic_sidebar( 'subscribe' ); ?>
	<?php endif; ?>

	<?php if(is_active_sidebar('sidebare-long-ads')) : ?>
		<?php dynamic_sidebar( 'sidebare-long-ads' ); ?>
	<?php endif; ?>

</div><!-- #right-sidebar -->

