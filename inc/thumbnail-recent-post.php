<?php
/**
 * SHOW Reading time
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Extend Recent Posts Widget 
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */

Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

	function widget($args, $instance) {

			if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		/**
		 * Filter the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

		if ($r->have_posts()) :
		?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
		<div class="recent-post">
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<div class="post pb-3 mb-4 mb-lg-3 border-bottom">
				<div class="media recent-post-height">
					<a href="<?php the_permalink();?>" class="text-decoration-none mr-2 h-100 d-block media-img">
					  <img src="<?php the_post_thumbnail_url('thumbnail');?>" class="w-100 h-100" alt="<?php the_title();?>">
					</a>
					<div class="media-body h-100">
						<h2 class="mt-1 mb-1 mb-lg-2"><a href="<?php the_permalink();?>" class="text-decoration-none btn-link"><?php get_the_title() ? the_title() : the_ID(); ?></a></h2>
            
            <?php if ( $show_date ) : ?>
              <small class="text-primary mr-4 meta-info text-capitalize text-muted"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></small>
            <?php endif; ?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		</div>
		<?php echo $args['after_widget']; ?>
		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;
	}
}
function my_recent_widget_registration() {
unregister_widget('WP_Widget_Recent_Posts');
register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');