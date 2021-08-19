<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package realresearcher
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">
	<header class="sticky-header">
		
		<div class="top-nav bg-primary d-none d-lg-block small">
			<?php get_template_part('global-templates/top', 'bar'); ?>
		</div>

		<nav id="main-nav" class="navbar navbar-expand-lg shadow-sm bg-white rounded py-0" aria-labelledby="main-nav-label">
			<?php get_template_part('global-templates/main', 'nav'); ?>
		</nav>
		
	</header>
	
