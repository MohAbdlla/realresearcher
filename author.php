<?php
/**
 * The template for displaying the author pages
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package realresearcher
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="author-wrapper">

	<div class="container" id="content" tabindex="-1">

		<?php get_template_part( 'sidebar-templates/top', 'ads' ); ?>

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<div class="author-header mb-4">
								
					<?php
						if ( get_query_var( 'author_name' ) ) {
							$curauth = get_user_by( 'slug', get_query_var( 'author_name' ) );
						} else {
							$curauth = get_userdata( intval( $author ) );
						}
					?>

					<h1 class="author-title"><?php echo esc_html__( 'Author:', 'understrap' ) . ' ' . esc_html( $curauth->nickname ); ?></h1>

					<div class="media mb-4">
						
						<?php
							if ( ! empty( $curauth->ID ) ) {
								echo get_avatar( get_the_author_meta( 'ID' ), 65 );
							}
						?>

						<?php if ( ! empty( $curauth->user_description ) ) : ?>
							<div class="media-body ml-3">
								<h5 class="pt-3 pt-md-0"><?php echo $curauth->nickname ?></h5>
								<?php echo esc_html( $curauth->user_description ); ?>
							</div>
						<?php endif; ?>	

					</div>

				</div>

				<!-- The Loop -->
				<?php if ( have_posts() ) : ?>
						
					<?php
					while ( have_posts() ) :
						the_post();
						
						get_template_part( 'loop-templates/content', 'search' );

					endwhile;
					?>

					<?php get_template_part( 'sidebar-templates/bottom', 'ads' ); ?>

				<?php else: 
				
					get_template_part( 'loop-templates/content', 'none' );		

					endif;
				?>
				<!-- End Loop -->

			</main>

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div>

	</div>

</div><!-- #author-wrapper -->

<?php
get_footer();
