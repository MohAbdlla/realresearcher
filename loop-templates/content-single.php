<?php
/**
 * Single post partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="post-thumbnail mb-4">
	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
	<small class="d-block text-center pt-2 text-muted"><?php the_post_thumbnail_caption();  ?></small>
</div>

<div class="post-content">
	
	<?php the_content(); ?>

</div>

<footer class="entry-footer mb-4">

	<?php understrap_entry_footer(); ?>

</footer>

<!-- understrap_post_nav -->

<div class="media mt-3 pt-5 mb-4 border-top">
  <?php echo get_avatar( get_the_author_meta( 'ID' ), 65 );?>
  <div class="ml-0 ml-md-3 pt-3 pt-md-0 media-body">
    <h5 class="mt-0"><?php the_author_posts_link(); ?></h5>
    <p class="text-muted"><?php the_author_description(); ?></p>
  </div>
</div>