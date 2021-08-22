<?php
/**
 * The template for displaying archive pages
 *
 *
 * @package realresearcher
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();

?>

<div class="wrapper" id="archive-wrapper">

	<div class="container" id="content" tabindex="-1">

		<?php if(is_active_sidebar('top-homeads')) : ?>
			<?php dynamic_sidebar( 'top-homeads' ); ?>
		<?php endif; ?>
		

		<?php if ( have_posts() ) : ?>

			<main class="site-main">

				<div class="row">

					<!-- Do the left sidebar check and opens the primary div -->
					<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

					<header class="page-header">
						<h1 class="page-title"><?php _e( 'Browsing:', 'realresearcher' );?><span><?php single_cat_title(); ?></span></h1>
					</header>

					<div class="row row-cols-1 row-cols-md-2">

						<?php 
							while ( have_posts() ): the_post(  ); 

								/*
									* Include the Post-Format-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Format name) and that will be used instead.
									*/
									get_template_part( 'loop-templates/content', get_post_format() );

							endwhile; 
						?>
				
					</div>

					<?php 

								if(is_active_sidebar('bottom-ads')) {
									dynamic_sidebar( 'bottom-ads' );
								}

						// Display the pagination component.
						understrap_pagination();
					
					?>
					<!-- Do the right sidebar check -->
					<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

				</div>

			</main>

		<?php else :?>
			<?php get_template_part( 'loop-templates/content', 'none' ); ?>
		<?php endif; ?>

	</div>

</div>

<?php
get_footer();
