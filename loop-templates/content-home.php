<?php
/**
 * Home Page Section
 *
 * @package realresearcher
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$url_home = get_home_url(); 
?>
<!-- Ongoing Surveys -->
<?php 
    $args = array( 
		'cat' => array(151),
        'posts_per_page' => 6,
        'post_type' => 'post',
	); 

    $ongoing_surveys = new WP_Query( $args );
    
    $loop_num = 0;

    if ( $ongoing_surveys->have_posts() ) :
?>

    <section class="pb-5 ongoing-surveys">

        <div class="container">

            <div class="surveys">

                <?php while ( $ongoing_surveys->have_posts() ) : $ongoing_surveys->the_post(); if ($loop_num < 2) :?>

                    <div class="survey">
                        
                        <div class="survey-img-holder w-100 h-100" style="background: url('<?php the_post_thumbnail_url('large');?>'); background-repeat: no-repeat; background-position: center; background-size: cover;">
                            <a href="<?php the_permalink();?>" class="w-100 h-100 d-block"></a>
                        </div>

                        <div class="d-flex flex-column survey-body">
                            <?php get_template_part( 'global-templates/primary', 'category' );?>
                            <?php
                            the_title(
                                sprintf( '<h2 class="survey-title"><a href="%s" rel="bookmark" class="text-decoration-none text-white">', esc_url( get_permalink() ) ),
                                '</a></h2>'
                            ); 
                            ?>
                            <div class="text-uppercase">
                                <span class="text-white mr-4 meta-info font-weight-normal"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></span>
                                <span class="text-white meta-info font-weight-normal"><i class="fa fa-book" aria-hidden="true"></i> <?php echo reading_time(); ?></span>
                            </div>
                        </div>

                    </div>

                <?php else: ?>

                    <div class="survey">

                        <div class="card border-0 h-100">
                            <a href="<?php the_permalink();?>" class="text-decoration-none card-img-top">
                                <img src="<?php the_post_thumbnail_url('medium');?>" class="w-100 h-100" alt="<?php the_title(); ?>">
                            </a>
                            <div class="card-body d-flex flex-column justify-content-between px-0 py-3">
                                <?php
                                the_title(
                                    sprintf( '<h2 class="card-title-sm mr-0 mr-md-1"><a href="%s" rel="bookmark" class="text-decoration-none btn-link">', esc_url( get_permalink() ) ),
                                    '</a></h2>'
                                );
                                ?>
                                <div class="card-text text-uppercase">
                                    <span class="text-muted mr-4 meta-info"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></span>
                                    <span class="meta-info"><i class="fa fa-book" aria-hidden="true"></i> <?php echo reading_time(); ?></span>
                                </div>
                            </div>
                        </div>

                    </div>

                <?php endif; $loop_num++; endwhile; ?>

            </div>

        </div>
    
    </section>

<?php endif; wp_reset_postdata(); ?>

<!-- Economy Section -->
<?php 
    $args = array( 
        'posts_per_page' => 7,
        'post_type' => 'post',
        'category_name'  => 'economy-surveys'
	); 

    $economies = new WP_Query( $args );
    
    $loop_item = 0;

    if ( $economies->have_posts() ) :
?>

    <section class="pb-5 economy-section">
        
        <div class="container">

            <div class="d-flex justify-content-between align-items-center section-box mb-4">
                <h2 class="section-title text-capitalize"><?php echo esc_html__( 'economy', 'realresearcher' ); ?></h2>
                <a href="<?php echo $url_home?>/economy-surveys/" class="d-block text-decoration-none  text-capitalize font-weight-bold"><i class="fa fa-eye" aria-hidden="true"></i> all</a>
            </div>

            <div class="row">

                <?php while ( $economies->have_posts() ) : $economies->the_post(); if ($loop_item < 3) :?>

                    <div class="col-md-4 mb-3">
                        <div class="card border-0 h-100">
                            <a href="<?php the_permalink();?>" class="text-decoration-none card-img-top">
                                <img src="<?php the_post_thumbnail_url('medium');?>" class="w-100 h-100" alt="<?php the_title(); ?>">
                            </a>
                            <div class="card-body d-flex flex-column justify-content-between px-0 py-3">
                                <?php
                                the_title(
                                    sprintf( '<h2 class="card-title"><a href="%s" rel="bookmark" class="text-decoration-none btn-link">', esc_url( get_permalink() ) ),
                                    '</a></h2>'
                                );
                                ?>
                                <div class="card-text text-uppercase">
                                    <span class="text-muted mr-4 meta-info"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></span>
                                    <span class="meta-info"><i class="fa fa-book" aria-hidden="true"></i> <?php echo reading_time(); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php else: ?>

                    <div class="col-lg-3 col-md-4 mb-3">
                            <div class="card border-0 h-100">
                            <a href="<?php the_permalink();?>" class="text-decoration-none card-img-top">
                                    <img src="<?php the_post_thumbnail_url('medium');?>" class="w-100 h-100" alt="<?php the_title(); ?>">
                                </a>
                                <div class="card-body d-flex flex-column justify-content-between px-0 py-3">
                                    <?php
                                    the_title(
                                        sprintf( '<h2 class="card-title-sm"><a href="%s" rel="bookmark" class="text-decoration-none btn-link">', esc_url( get_permalink() ) ),
                                        '</a></h2>'
                                    );
                                    ?>
                                    <div class="card-text text-uppercase">
                                        <span class="text-muted mr-4 meta-info"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></span>
                                        <span class="meta-info"><i class="fa fa-book" aria-hidden="true"></i> <?php echo reading_time(); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php endif; $loop_item++; endwhile; ?>

            </div>

        </div>

    </section>

<?php endif; wp_reset_postdata(); ?>

<!-- Google Ads -->
<div class="container">
    <?php dynamic_sidebar( 'between-ads' ); ?>
</div>

<!-- Politics Section -->
<?php 
    $args = array( 
        'posts_per_page' => 7,
        'post_type' => 'post',
        'category_name'  => 'political-surveys'
	); 

    $politics = new WP_Query( $args );
    
    $loop_politics = 0;

    if ( $politics->have_posts() ) :
?>

    <section class="pb-5 politics-section">
        
        <div class="container">

            <div class="d-flex justify-content-between align-items-center section-box mb-4">
                <h2 class="section-title text-capitalize"><?php echo esc_html__( 'politics', 'realresearcher' ); ?></h2>
                <a href="<?php echo $url_home?>/political-surveys/" class="d-block text-decoration-none text-capitalize font-weight-bold"><i class="fa fa-eye" aria-hidden="true"></i> all</a>
            </div>

            <div class="row">

                <?php while ( $politics->have_posts() ) : $politics->the_post(); if ($loop_politics == 0) :?>

                    <div class="col-lg-6 col-md-8 main-post mb-3">
                        <div class="card border-0 h-100">
                            <a href="<?php the_permalink();?>" class="text-decoration-none card-img-top h-100 w-100">
                                <img src="<?php the_post_thumbnail_url('large');?>" class="w-100 h-100" alt="<?php the_title(); ?>">
                            </a>
                            <div class="card-body d-flex flex-column justify-content-between p-3">
                                <?php
                                the_title(
                                    sprintf( '<h2 class="card-title"><a href="%s" rel="bookmark" class="text-white text-decoration-none btn-link">', esc_url( get_permalink() ) ),
                                    '</a></h2>'
                                );
                                ?>
                                <div class="card-text text-uppercase">
                                    <span class="mr-4 meta-info text-white font-weight-normal"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></span>
                                    <span class="text-white meta-info font-weight-normal"><i class="fa fa-book" aria-hidden="true"></i> <?php echo reading_time(); ?></span>
                                </div>

                            </div>
                        </div>
                    </div>

                <?php  elseif ($loop_politics == 1 or $loop_politics == 2): ?>

                    <div class="col-lg-3 col-md-4 mb-3">
                        <div class="card border-0 h-100">
                            <a href="<?php the_permalink();?>" class="text-decoration-none card-img-top">
                                <img src="<?php the_post_thumbnail_url('medium');?>" class="w-100 h-100" alt="<?php the_title(); ?>">
                            </a>
                            <div class="card-body d-flex flex-column justify-content-between px-0 py-3">
                                <?php
                                the_title(
                                    sprintf( '<h2 class="card-title-sm"><a href="%s" rel="bookmark" class="text-decoration-none btn-link">', esc_url( get_permalink() ) ),
                                    '</a></h2>'
                                );
                                ?>
                                <div class="card-text text-uppercase mb-2">
                                    <span class="text-muted mr-4 meta-info"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></span>
                                    <span class="meta-info"><i class="fa fa-book" aria-hidden="true"></i> <?php echo reading_time(); ?></span>
                                </div>
                                <div class="excerpt-text text-light">
                                    <?php the_excerpt(  ) ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php else: ?>

                    <div class="col-lg-3 col-md-4 mb-3">
                            <div class="card border-0 h-100">
                            <a href="<?php the_permalink();?>" class="text-decoration-none card-img-top">
                                    <img src="<?php the_post_thumbnail_url('medium');?>" class="w-100 h-100" alt="<?php the_title(); ?>">
                                </a>
                                <div class="card-body d-flex flex-column justify-content-between px-0 py-3">
                                    <?php
                                    the_title(
                                        sprintf( '<h2 class="card-title-sm"><a href="%s" rel="bookmark" class="text-decoration-none btn-link">', esc_url( get_permalink() ) ),
                                        '</a></h2>'
                                    );
                                    ?>
                                    <div class="card-text text-uppercase">
                                        <span class="text-muted mr-4 meta-info"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></span>
                                        <span class="meta-info"><i class="fa fa-book" aria-hidden="true"></i> <?php echo reading_time(); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php endif; $loop_politics++; endwhile; ?>

            </div>

        </div>

    </section>

<?php endif; wp_reset_postdata(); ?>

<!-- Science Section -->
<?php 
    $args = array( 
        'posts_per_page' => 4,
        'post_type' => 'post',
        'category_name'  => 'science-surveys'
	); 

    $sciences = new WP_Query( $args );

    if ( $sciences->have_posts() ) :
?>

    <section class="pb-5 pt-4 bg-primary sciences-section text-white">
        
        <div class="container">

            <div class="d-flex justify-content-between align-items-center border-top-0 section-box mb-4">
                <h2 class="section-title text-capitalize"><?php echo esc_html__( 'science', 'realresearcher' ); ?></h2>
                <a href="<?php echo $url_home?>/science-surveys/" class="d-block text-decoration-none text-white text-capitalize"><i class="fa fa-eye text-white" aria-hidden="true"></i> all</a>
            </div>

            <div class="row">
                <?php while ( $sciences->have_posts() ) : $sciences->the_post();?>

                    <div class="col-lg-3 col-md-6 mb-3 mb-lg-0">
                        <div class="card border-0 h-100 bg-primary">
                        <a href="<?php the_permalink();?>" class="text-decoration-none card-img-top">
                                <img src="<?php the_post_thumbnail_url('medium');?>" class="w-100 h-100" alt="<?php the_title(); ?>">
                            </a>
                            <div class="card-body d-flex flex-column justify-content-between px-0 py-3">
                                <?php
                                the_title(
                                    sprintf( '<h2 class="card-title-sm"><a href="%s" rel="bookmark" class="text-white text-decoration-none btn-link">', esc_url( get_permalink() ) ),
                                    '</a></h2>'
                                );
                                ?>
                                <div class="card-text text-uppercase">
                                    <span class="text-white mr-4 meta-info"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></span>
                                    <span class="meta-info"><i class="fa fa-book" aria-hidden="true"></i> <?php echo reading_time(); ?></span>
                                </div>
                            </div>
                        </div>
                        </div>

                <?php endwhile; ?>
            </div>

        </div>

    </section>

<?php endif; wp_reset_postdata(); ?>

<!-- Google Ads -->
<div class="container">
    <?php dynamic_sidebar( 'between-ads' ); ?>
</div>

<!-- three Section -->
<div class="container">
    <div class="row">
    
        <!-- Technology Section -->
        <div class="col-lg-4 col-md-6">

            <?php 
                $args = array( 
                    'posts_per_page' => 3,
                    'post_type' => 'post',
                    'category_name'  => 'technology-surveys'
                );
                
                $loop_tec = 0;

                $technologies = new WP_Query( $args );

                if ( $technologies->have_posts() ) :
            ?>

                <section class="pb-5 technology-section">

                    <div class="d-flex justify-content-between align-items-center section-box mb-4">
                        <h2 class="section-title text-capitalize"><?php echo esc_html__( 'technology', 'realresearcher' ); ?></h2>
                        <a href="<?php echo $url_home?>/technology-surveys/" class="d-block text-decoration-none text-capitalize font-weight-bold"><i class="fa fa-eye" aria-hidden="true"></i> all</a>
                    </div>

                    <?php while ( $technologies->have_posts() ) : $technologies->the_post(); if ( $loop_tec == 0 ) : ?>
                        <div class="tec-post mb-3">
                            <div class="card border-0 h-100">
                                <a href="<?php the_permalink();?>" class="text-decoration-none card-img-top">
                                    <img src="<?php the_post_thumbnail_url('medium');?>" class="w-100 h-100" alt="<?php the_title(); ?>">
                                </a>
                                <div class="card-body d-flex flex-column justify-content-between px-0 py-3">
                                    <?php
                                    the_title(
                                        sprintf( '<h2 class="card-title"><a href="%s" rel="bookmark" class="text-decoration-none btn-link">', esc_url( get_permalink() ) ),
                                        '</a></h2>'
                                    );
                                    ?>
                                    <div class="card-text text-uppercase mb-2">
                                        <span class="text-muted mr-4 meta-info"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></span>
                                        <span class="meta-info"><i class="fa fa-book" aria-hidden="true"></i> <?php echo reading_time(); ?></span>
                                    </div>
                                    <div class="excerpt-text text-light">
                                        <?php the_excerpt(  ) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>

                        
                        <div class="tec-post mb-4">
                            
                            <div class="media min-post">
                                <a href="<?php the_permalink();?>" class="text-decoration-none mr-2 h-100 d-block media-img">
                                    <img src="<?php the_post_thumbnail_url('thumbnail');?>" class="w-100 h-100" alt="<?php the_title();?>">
                                </a>

                                <div class="media-body d-flex flex-column justify-content-between h-100">
                                    <h2 class="media-title"><a href="<?php the_permalink();?>" class="text-decoration-none btn-link"><?php get_the_title() ? the_title() : the_ID(); ?></a></h2>

                                    <div class="text-uppercase">
                                        <span class="text-muted mr-4 meta-info"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></span>
                                        <span class="meta-info"><i class="fa fa-book" aria-hidden="true"></i> <?php echo reading_time(); ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    <?php endif; $loop_tec++; endwhile; ?>
                    

                </section>

            <?php endif; wp_reset_postdata(); ?>

        </div>

        <!-- Cryptocurrency Section -->
        <div class="col-lg-4 col-md-6">

            <?php 
                $args = array( 
                    'posts_per_page' => 3,
                    'post_type' => 'post',
                    'category_name'  => 'crypto-surveys'
                );
                
                $loop_crypto = 0;

                $crypto = new WP_Query( $args );

                if ( $crypto->have_posts() ) :
            ?>

                <section class="pb-5 crypto-section">
                    
                    <div class="d-flex justify-content-between align-items-center section-box mb-4">
                        <h2 class="section-title text-capitalize"><?php echo esc_html__( 'crypto', 'realresearcher' ); ?></h2>
                        <a href="<?php echo $url_home?>/crypto-surveys/" class="d-block text-decoration-none text-capitalize font-weight-bold"><i class="fa fa-eye" aria-hidden="true"></i> all</a>
                    </div>

                    <?php while ( $crypto->have_posts() ) : $crypto->the_post(); if ( $loop_crypto == 0 ) : ?>

                        <div class="crypto-post mb-3">
                            <div class="card border-0 h-100">
                                <a href="<?php the_permalink();?>" class="text-decoration-none card-img-top">
                                    <img src="<?php the_post_thumbnail_url('medium');?>" class="w-100 h-100" alt="<?php the_title(); ?>">
                                </a>
                                <div class="card-body d-flex flex-column justify-content-between px-0 py-3">
                                    <?php
                                    the_title(
                                        sprintf( '<h2 class="card-title"><a href="%s" rel="bookmark" class="text-decoration-none btn-link">', esc_url( get_permalink() ) ),
                                        '</a></h2>'
                                    );
                                    ?>
                                    <div class="card-text text-uppercase mb-2">
                                        <span class="text-muted mr-4 meta-info"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></span>
                                        <span class="meta-info"><i class="fa fa-book" aria-hidden="true"></i> <?php echo reading_time(); ?></span>
                                    </div>
                                    <div class="excerpt-text text-light">
                                        <?php the_excerpt(  ) ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php else: ?>

                        <div class="crypto-post mb-4">              
                          <div class="media min-post">
                            <a href="<?php the_permalink();?>" class="text-decoration-none mr-2 h-100 d-block media-img">
                                <img src="<?php the_post_thumbnail_url('thumbnail');?>" class="w-100 h-100" alt="<?php the_title();?>">
                            </a>

                            <div class="media-body d-flex flex-column justify-content-between h-100">
                                <h2 class="media-title"><a href="<?php the_permalink();?>" class="text-decoration-none btn-link"><?php get_the_title() ? the_title() : the_ID(); ?></a></h2>

                                <div class="text-uppercase">
                                    <span class="text-muted mr-4 meta-info"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></span>
                                    <span class="meta-info"><i class="fa fa-book" aria-hidden="true"></i> <?php echo reading_time(); ?></span>
                                </div>
                            </div>
                          </div>
                        </div>
  
                    <?php endif; $loop_crypto++; endwhile; ?>

                </section>


            <?php endif; wp_reset_postdata(); ?>

        </div>

        <!-- Society Section -->
        <div class="col-lg-4">
            
            <?php 
                $args = array( 
                    'posts_per_page' => 6,
                    'post_type' => 'post',
                    'category_name'  => 'social-surveys'
                );

                $social = new WP_Query( $args );

                if ( $social->have_posts() ) :
            ?>

                <section class="pb-5 social-section">

                    <div class="d-flex justify-content-between align-items-center section-box mb-4">
                      <h2 class="section-title text-capitalize"><?php echo esc_html__( 'society', 'realresearcher' ); ?></h2>
                      <a href="<?php echo $url_home?>/social-surveys/" class="d-block text-decoration-none text-capitalize font-weight-bold"><i class="fa fa-eye" aria-hidden="true"></i> all</a>
                    </div>

                    <?php while ( $social->have_posts() ) : $social->the_post(); ?>

                        <div class="social-post mb-3 mb-lg-4">
                            
                          <div class="media min-post">
                            <a href="<?php the_permalink();?>" class="text-decoration-none mr-2 h-100 d-block media-img">
                                <img src="<?php the_post_thumbnail_url('thumbnail');?>" class="w-100 h-100" alt="<?php the_title();?>">
                            </a>

                            <div class="media-body h-100">
                                <h2 class="media-title"><a href="<?php the_permalink();?>" class="text-decoration-none btn-link"><?php get_the_title() ? the_title() : the_ID(); ?></a></h2>

                                <div class="text-uppercase">
                                    <span class="text-muted mr-4 meta-info"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></span>
                                    <span class="meta-info"><i class="fa fa-book" aria-hidden="true"></i> <?php echo reading_time(); ?></span>
                                </div>
                            </div>
                          </div>

                        </div>

                    <?php endwhile; ?>

                </section>
            
            <?php endif; wp_reset_postdata(); ?>
        </div>

    </div>
</div>

<!-- Culture Section -->
<?php 
    $args = array( 
        'posts_per_page' => 5,
        'post_type' => 'post',
        'category_name'  => 'cultural-surveys'
	); 

    $cultural_surveys = new WP_Query( $args );
    
    $loop_cultural = 0;

    if ( $cultural_surveys ->have_posts() ) :
?>

    <section class="pb-5 cultural-section">

        <div class="container">

            <div class="d-flex justify-content-between align-items-center section-box mb-4">
                <h2 class="section-title text-capitalize"><?php echo esc_html__( 'cultural', 'realresearcher' ); ?></h2>
                <a href="<?php echo $url_home?>/cultural-surveys/" class="d-block text-decoration-none text-capitalize font-weight-bold"><i class="fa fa-eye" aria-hidden="true"></i> all</a>
            </div>

            <div class="cultural-posts">

                <?php while ( $cultural_surveys ->have_posts() ) : $cultural_surveys ->the_post(); if ($loop_cultural == 0) :?>

                    <div class="cultural">

                        <div class="card border-0">
                            <a href="<?php the_permalink();?>" class="text-decoration-none card-img-top">
                                <img src="<?php the_post_thumbnail_url('medium');?>" class="w-100 h-100" alt="<?php the_title(); ?>">
                            </a>
                            <div class="card-body px-0 py-3">
                                <?php
                                the_title(
                                    sprintf( '<h2 class="card-title-sm mr-0 mr-md-1"><a href="%s" rel="bookmark" class="text-decoration-none btn-link">', esc_url( get_permalink() ) ),
                                    '</a></h2>'
                                );
                                ?>
                                <div class="card-text text-uppercase">
                                    <span class="text-muted mr-4 meta-info"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></span>
                                    <span class="meta-info"><i class="fa fa-book" aria-hidden="true"></i> <?php echo reading_time(); ?></span>
                                </div>
                                <div class="excerpt-text text-light mt-2">
                                    <?php the_excerpt(  ) ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php else: ?>

                    <div class="cultural">

                        <div class="card border-0 h-100">
                            <a href="<?php the_permalink();?>" class="text-decoration-none card-img-top">
                                <img src="<?php the_post_thumbnail_url('medium');?>" class="w-100 h-100" alt="<?php the_title(); ?>">
                            </a>
                            <div class="card-body d-flex flex-column justify-content-between px-0 py-3">
                                <?php
                                the_title(
                                    sprintf( '<h2 class="card-title-sm mr-0 mr-md-1"><a href="%s" rel="bookmark" class="text-decoration-none btn-link">', esc_url( get_permalink() ) ),
                                    '</a></h2>'
                                );
                                ?>
                                <div class="card-text text-uppercase">
                                    <span class="text-muted mr-2 mr-md-4 meta-info"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></span>
                                    <span class="meta-info"><i class="fa fa-book" aria-hidden="true"></i> <?php echo reading_time(); ?></span>
                                </div>
                            </div>
                        </div>

                    </div>

                <?php endif; $loop_cultural++; endwhile; ?>

            </div>

        </div>

    </section>

<?php endif; wp_reset_postdata(); ?>

<div class="container">
    <?php dynamic_sidebar( 'bottom-ads' ); ?>
</div>

