<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package realresearcher
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="error-404-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main">

					<section class="error-404 not-found">

						<header class="page-header">

							<h1 class="entry-title my-3"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'understrap' ); ?></h1>

						</header><!-- .page-header -->

						<div class="page-content">

							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'understrap' ); ?></p>

							<?php get_search_form(); ?>

							<div class="mt-4 pt-3">

								<div class="header-underline border-bottom mb-3">
									<h3 class="heading">latest <span class="text-primary">articles</span></h3>
								</div>
								
								<div class="row row-cols-1 row-cols-md-3">

									<?php 

										$args = array( 
											'posts_per_page' =>  9,	
										); 

										$latest_post = new WP_Query( $args );

										if ( $latest_post->have_posts() ) :
											while( $latest_post->have_posts() ) : $latest_post->the_post(); 
									?>
										<div class="col mb-4">
											<div class="card border-0">
												<a href="<?php the_permalink();?>" class="text-decoration-none card-img-top">
													<img src="<?php the_post_thumbnail_url('large');?>" class="w-100 h-100" alt="<?php the_title(); ?>">
												</a>
												<div class="card-body px-0 py-3">
													<?php
													the_title(
														sprintf( '<h2 class="card-title"><a href="%s" rel="bookmark" class="text-decoration-none btn-link">', esc_url( get_permalink() ) ),
														'</a></h2>'
													);
													?>
													<p class="card-text text-capitalize">
														<span class="text-primary mr-4 meta-info text-muted"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></span>
														<span class="meta-info"><i class="fa fa-book" aria-hidden="true"></i> <?php echo reading_time(); ?></span>
													</p>
													<div class="excerpt-text">
														<?php the_excerpt(  ) ?>
													</div>
												</div>
											</div>
										</div>

									<?php endwhile; else: endif; wp_reset_postdata();?>

								</div>

							</div>

						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #error-404-wrapper -->

<?php
get_footer();
