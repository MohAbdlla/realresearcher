<?php
/**
 * Declaring widgets
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add filter to the parameters passed to a widget's display callback.
 * The filter is evaluated on both the front and the back end!
 *
 * @link https://developer.wordpress.org/reference/hooks/dynamic_sidebar_params/
 */
add_filter( 'dynamic_sidebar_params', 'understrap_widget_classes' );

if ( ! function_exists( 'understrap_widget_classes' ) ) {

	/**
	 * Count number of visible widgets in a sidebar and add classes to widgets accordingly,
	 * so widgets can be displayed one, two, three or four per row.
	 *
	 * @global array $sidebars_widgets
	 *
	 * @param array $params {
	 *     Parameters passed to a widget’s display callback.
	 *
	 *     @type array $args  {
	 *         An array of widget display arguments.
	 *
	 *         @type string $name          Name of the sidebar the widget is assigned to.
	 *         @type string $id            ID of the sidebar the widget is assigned to.
	 *         @type string $description   The sidebar description.
	 *         @type string $class         CSS class applied to the sidebar container.
	 *         @type string $before_widget HTML markup to prepend to each widget in the sidebar.
	 *         @type string $after_widget  HTML markup to append to each widget in the sidebar.
	 *         @type string $before_title  HTML markup to prepend to the widget title when displayed.
	 *         @type string $after_title   HTML markup to append to the widget title when displayed.
	 *         @type string $widget_id     ID of the widget.
	 *         @type string $widget_name   Name of the widget.
	 *     }
	 *     @type array $widget_args {
	 *         An array of multi-widget arguments.
	 *
	 *         @type int $number Number increment used for multiples of the same widget.
	 *     }
	 * }
	 * @return array $params
	 */
	function understrap_widget_classes( $params ) {

		global $sidebars_widgets;

		/*
		 * When the corresponding filter is evaluated on the front end
		 * this takes into account that there might have been made other changes.
		 */
		$sidebars_widgets_count = apply_filters( 'sidebars_widgets', $sidebars_widgets );

		// Only apply changes if sidebar ID is set and the widget's classes depend on the number of widgets in the sidebar.
		if ( isset( $params[0]['id'] ) && strpos( $params[0]['before_widget'], 'dynamic-classes' ) ) {
			$sidebar_id   = $params[0]['id'];
			$widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );

			$widget_classes = 'widget-count-' . $widget_count;
			if ( 0 === $widget_count % 4 || $widget_count > 6 ) {
				// Four widgets per row if there are exactly four or more than six widgets.
				$widget_classes .= ' col-lg-3 col-md-6';
			} elseif ( 6 === $widget_count ) {
				// If exactly six widgets are published.
				$widget_classes .= ' col-lg-2 col-md-4';
			} elseif ( $widget_count >= 3 ) {
				// Three widgets per row if there's three or more widgets.
				$widget_classes .= ' col-lg-4 col-md-6';
			} elseif ( 2 === $widget_count ) {
				// If two widgets are published.
				$widget_classes .= ' col-md-6';
			} elseif ( 1 === $widget_count ) {
				// If just on widget is active.
				$widget_classes .= ' col-md-12';
			}

			// Replace the placeholder class 'dynamic-classes' with the classes stored in $widget_classes.
			$params[0]['before_widget'] = str_replace( 'dynamic-classes', $widget_classes, $params[0]['before_widget'] );
		}

		return $params;

	}
} // End of if function_exists( 'understrap_widget_classes' ).

add_action( 'widgets_init', 'understrap_widgets_init' );

if ( ! function_exists( 'understrap_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function understrap_widgets_init() {
		register_sidebar(
			array(
				'name'          => __( 'Right Sidebar', 'understrap' ),
				'id'            => 'right-sidebar',
				'description'   => __( 'Right sidebar widget area', 'understrap' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s mb-5">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title border-bottom">',
				'after_title'   => '</h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Left Sidebar', 'understrap' ),
				'id'            => 'left-sidebar',
				'description'   => __( 'Left sidebar widget area', 'understrap' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s mb-5">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Top Ads Sidebar', 'understrap' ),
				'id'            => 'sidebare-ads1',
				'description'   => __( 'Please Add Top Sidebar Ads Here', 'understrap' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s sidebar__ads mb-5">',
				'after_widget'  => '</div>',
				'before_title'  => '',
				'after_title'   => '',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Sidebar Custom Ads', 'understrap' ),
				'id'            => 'sidebare-custom-ads',
				'description'   => __( 'Please Custom Sidebar Ads Here', 'understrap' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s custom__ads mb-5">',
				'after_widget'  => '</div>',
				'before_title'  => '',
				'after_title'   => '',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Long Ads Sidebar', 'understrap' ),
				'id'            => 'sidebare-long-ads',
				'description'   => __( 'Please Add Top Sidebar Ads Here', 'understrap' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s long__ads mb-5 d-none d-lg-block">',
				'after_widget'  => '</div>',
				'before_title'  => '',
				'after_title'   => '',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Top Ads Home Page', 'understrap' ),
				'id'            => 'top-homeads',
				'description'   => __( 'Please Add Top Ads In Home Here', 'understrap' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s top-home d-flex justify-content-center align-items-center mb-4 pb-2">',
				'after_widget'  => '</div>',
				'before_title'  => '',
				'after_title'   => '',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Home Page Ads Between Section', 'understrap' ),
				'id'            => 'between-ads',
				'description'   => __( 'Please Responsive Ads Between Section For Home Page Here', 'understrap' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s home-between pb-5">',
				'after_widget'  => '</div>',
				'before_title'  => '',
				'after_title'   => '',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Bottom Custom Ads', 'understrap' ),
				'id'            => 'bottom-ads',
				'description'   => __( 'Please Bottom Custom Ads 970 X 100', 'understrap' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s py-3">',
				'after_widget'  => '</div>',
				'before_title'  => '',
				'after_title'   => '',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Subscribe Newsletter', 'understrap' ),
				'id'            => 'subscribe',
				'description'   => __( 'Subscribe widget area', 'understrap' ),
				'before_widget' => '<aside id="%1$s" class="widget subscribe-widget %2$s mb-5">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title border-bottom">',
				'after_title'   => '</h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Footer Full', 'understrap' ),
				'id'            => 'footerfull',
				'description'   => __( 'Full sized footer widget with dynamic grid', 'understrap' ),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s dynamic-classes py-3 py-lg-5">',
				'after_widget'  => '</div><!-- .footer-widget -->',
				'before_title'  => '<h3 class="widget-title text-white mb-4">',
				'after_title'   => '</h3>',
			)
		);

	}
} // End of function_exists( 'understrap_widgets_init' ).
