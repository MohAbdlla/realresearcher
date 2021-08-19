<?php
/**
 * The template for displaying all related post
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php
  $orig_post = $post;
  global $post;
  $tags = wp_get_post_tags($post->ID);

  if ( $tags ) :
      foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
      $args=array(
      'tag__in' => $tag_ids,
      'post__not_in' => array($post->ID),
      'posts_per_page'=>3, // Number of related posts to display.
      'caller_get_posts'=>1
      );

      $my_query = new wp_query( $args );
  ?>

  <?php if ($my_query) :?>
    
    <div class="related-posts my-3">
      
      <div class="header-underline border-bottom">
        <h3 class="heading">Related <span class="text-primary">posts</span></h3>
      </div>
    
      <div class="row row row-cols-1 row-cols-md-3">
        <?php while( $my_query->have_posts() ) : $my_query->the_post(); ?>
          
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
              </div>
            </div>
          </div>

        <?php endwhile; ?>
      </div>

    </div>
  <?php endif; ?>

<?php 

  endif; 
  $post = $orig_post;
  wp_reset_postdata();

?>


        
