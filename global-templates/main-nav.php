<?php
/**
 * Main Nav
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="container position-relative">

  <div class="menu__toggler d-block d-lg-none h3 mb-0" role="button">
    <span></span>
  </div>

  <!-- Custom Log -->
  <?php if ( ! has_custom_logo() ) :?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand" rel="home" aria-current="page">
        <img width="200" height="50" src="<?php echo get_theme_file_uri( 'images/real-research-blue.png' ); ?>" class="img-fluid" alt="Survey Results Insights–Real Research Media">
      </a>
  <?php else: 
      the_custom_logo();
  endif; ?>

  <div class="collapse navbar-collapse d-md-none d-lg-block" id="navbarNavDropdown">        
    <?php
      wp_nav_menu(
          array(
              'theme_location'  => 'primary',
              'container'    => false,
              'menu_class'      => 'navbar-nav mr-auto ml-0 ml-lg-3',
              'fallback_cb'     => '',
              'menu_id'         => 'main-menu',
              'depth'           => 2,
              'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
          )
      );
    ?>
  </div>

  <div id="btn-search" class="h5 mb-0" role="button">
    <i class="fa fa-search"></i>
  </div>

  <form action="<?php echo esc_url(home_url( '/' ));?>" id="form-search" autocomplete="off">
    <label class="sr-only" for="searchInput">Search</label>
    <div class="input-group">
        <input class="field form-control rounded-0" id="searchInput" name="s" type="text" placeholder="Search …" value="" onkeyup="fetchResults()">
        <span class="input-group-append">
            <button class="btn btn-info rounded-0"><i class="fa fa-search text-white"></i></button>
        </span>
    </div>
    <div id="data-fetch"></div>
  </form>

</div>