<?php
/**
 * Template Name: Home Page
 * 
 * @package realresearcher
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="home-wrapper">

	<div class="container">
		<?php dynamic_sidebar( 'top-homeads' ); ?>
	</div>

	<main class="site-main" id="home-page">

		<?php
			while ( have_posts() ) {
				the_post();
				get_template_part( 'loop-templates/content', 'home' );
			}
		?>

	</main>

</div>

<?php
get_footer();
