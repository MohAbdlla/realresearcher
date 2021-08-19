<?php
/**
 * Top Nav
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
 <!-- Top bar left -->
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
       
        <nav class="d-flex">
          <span class="nav-link text-white pl-0"><?php echo date("l, F j");?></span>
          <?php 
            wp_nav_menu(array(
              'theme_location'  => 'top',
              'container'    => false,
              'menu_class'      => 'd-flex',
              'fallback_cb'     => '',
              'menu_id'         => 'top-menu',
              'depth'           => 1,
              'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
            ));
          ?>
        </nav>

        <ul class="nav header-social">
             <li class="nav-item">
                <a class="nav-link px-2" href="https://t.me/real_research" target="_blank">
                    <i class="fa fa-telegram text-white"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-2" href="https://www.facebook.com/realresearchofficial" target="_blank">
                    <i class="fa fa-facebook-f text-white"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-2" href="https://twitter.com/realresearch_" target="_blank">
                    <i class="fa fa-twitter text-white"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-2" href="https://www.instagram.com/realresearch_/" target="_blank">
                    <i class="fa fa-instagram text-white"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-2" href="https://www.linkedin.com/company/realresearch/" target="_blank">
                    <i class="fa fa-linkedin-square text-white"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-2" href="https://www.youtube.com/c/realresearch" target="_blank">
                    <i class="fa fa-youtube-play text-white"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pl-2 pr-0" href="https://realresearcher.com/media/feed/" target="_blank">
                    <i class="fa fa-rss text-white"></i>
                </a>
            </li>
        </ul>
    </div>
</div>