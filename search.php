<?php
/**
 * The template for displaying search results pages
 *
 * @package realresearcher
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();

?>

<div class="wrapper" id="search-wrapper">

	<div class="container" id="content" tabindex="-1">	

		<?php if(is_active_sidebar('top-homeads')) : ?>
			<?php dynamic_sidebar( 'top-homeads' ); ?>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>

			<main class="site-main">

				<h1 class="search-title">
					<?php
					printf(
						/* translators: %s: query term */
						esc_html__( 'Search Results for: %s', 'understrap' ),
						'<span>' . get_search_query() . '</span>'
					);
					?>
				</h1>

				<div class="row">

					<!-- Do the left sidebar check and opens the primary div -->
					<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

					<div class="search-results">
						
						<div class="contents mb-4 border-top border-bottom">
							<?php 
							while ( have_posts() ) : 
								the_post(  );

								/*
								* Run the loop for the search to output the results.
								* If you want to overload this in a child theme then include a file
								* called content-search.php and that will be used instead.
								*/
								get_template_part( 'loop-templates/content', 'search' );


							endwhile; 
							?>
						</div>


						<?php if(is_active_sidebar('bottom-ads')) : ?>
							<?php dynamic_sidebar( 'bottom-ads' ); ?>
						<?php endif; ?>

						<!-- The pagination component -->
						<?php understrap_pagination(); ?>
					</div>

					<!-- Do the right sidebar check -->
					<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

				</div>
				

			</main>
			
		<?php else : ?>
			<?php get_template_part( 'loop-templates/content', 'none' ); ?>
		<?php endif; ?>	

	</div>

</div>

<?php
get_footer();
