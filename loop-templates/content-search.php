<?php
/**
 * Search results partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>


<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	
	<a href="<?php the_permalink();?>" class="d-block image-search">
		<img src="<?php the_post_thumbnail_url('medium');?>" alt="<?php the_title(); ?>" class="w-100 h-100">
	</a>

	<div class="article-summary">
		<?php
		the_title(
			sprintf( '<h2 class="card-title"><a href="%s" rel="bookmark" class="text-decoration-none btn-link">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>
		<div class="article-meta text-uppercase my-2">
			<span class="text-muted mr-4 meta-info"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></span>
			<span class="meta-info"><i class="fa fa-book" aria-hidden="true"></i> <?php echo reading_time(); ?></span>
		</div>
    <div class="excerpt-text text-light mt-0">
			<?php the_excerpt(  ) ?>
		</div>
	</div>
</article>
