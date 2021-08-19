<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package realresearcher
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<div class="col mb-4">
	<div class="card border-0">
  	<a href="<?php the_permalink();?>" class="text-decoration-none card-img-top">
			<img src="<?php the_post_thumbnail_url('medium');?>" class="w-100 h-100" alt="<?php the_title();?>">
		</a>
		<div class="card-body px-0 py-3">
			<?php
			the_title(
				sprintf( '<h2 class="card-title"><a href="%s" rel="bookmark" class="text-decoration-none btn-link">', esc_url( get_permalink() ) ),
				'</a></h2>'
			);
			?>
			<div class="card-text text-uppercase my-2">
				<span class="text-muted mr-4 meta-info"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></span>
				<span class="meta-info"><i class="fa fa-book" aria-hidden="true"></i> <?php echo reading_time(); ?></span>
			</div>
			<div class="excerpt-text text-light">
				<?php the_excerpt(  ) ?>
			</div>
		</div>
	</div>
</div>