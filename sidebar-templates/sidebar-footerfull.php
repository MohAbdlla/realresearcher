<?php
/**
 * Sidebar setup for footer full
 *
 * @package realresearcher
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<?php if ( is_active_sidebar( 'footerfull' ) ) : ?>

	<!-- ******************* The Footer Full-width Widget Area ******************* -->

	<div class="wrapper text-white mt-5" id="wrapper-footer-full">

		<div class="container" id="footer-full-content" tabindex="-1">

			<div class="row justify-content-md-center">

				<?php dynamic_sidebar( 'footerfull' ); ?>

			</div>

		</div>

	</div><!-- #wrapper-footer-full -->

	<?php
endif;
