<?php
/**
 * The template for displaying all single posts
 *
 * @package realresearcher
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="single-wrapper">

	<div class="container" id="content" tabindex="-1">

		<?php get_template_part( 'sidebar-templates/top', 'ads' ); ?>
		
		<main class="site-main">

			<?php while ( have_posts() ) : the_post(  ) ?>
				
				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					
					<div class="post-meta mb-4">

						<div class="meta-category">
							<?php get_template_part( 'global-templates/primary', 'category' );?>
						</div>

						<?php the_title( '<h1 class="meta-title">', '</h1>' ); ?>

						<div class="d-flex flex-wrap align-items-center text-capitalize small meta-author text-muted mb-3">
								
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 60 );?>
							<?php understrap_posted_on(); ?>	
							<span class="meta-info ml-3"><i class="fa fa-book" aria-hidden="true"></i> <?php echo reading_time(); ?></span>

						</div>

						<?php echo do_shortcode("[social]"); ?>

					</div>

					<div class="row">

						<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

						<div class="post-contents">

							<?php get_template_part( 'loop-templates/content', 'single' );
							
								// get Ads
								get_template_part( 'sidebar-templates/bottom', 'ads' );
				
								// Get Related post
								get_template_part( 'loop-templates/related', 'posts' );
								
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) {
									comments_template();
								}
								
							?>

						</div>

						<!-- Do the right sidebar check -->
						<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

					</div><!-- row -->

				</div>

			<?php endwhile; ?>

		</main><!-- #main -->

	</div>

</div>

<?php
get_footer();
