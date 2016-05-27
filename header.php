<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
  <head <?php do_action( 'add_head_attributes' ); ?>>

    <!-- Title -->
    <!-- =================================== -->
    <title><?php wp_title(''); ?></title>
    
    <!-- Styles -->
    <!-- =================================== -->
    <link href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon.png" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/icons/touch.png" rel="apple-touch-icon-precomposed">

    <!-- Meta -->
    <!-- =================================== -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Webfont -->
    <!-- =================================== -->
    

    <!-- Wordpress Generated -->
    <!-- =================================== -->
    <?php wp_head(); ?>

  </head>

  <body <?php body_class(); ?>>
    <!-- Google Analytics -->
    <!-- =================================== -->
    <?php get_template_part( 'includes/analyticstracking' ); ?>


    <!-- Navbar -->
    <!-- =================================== -->
    <header class="site-header">
      <!-- Tabzilla -->
      <!-- =================================== -->
      <div class="container tabzilla-wrapper">
        <div id="tabzilla">
          <a href="https://www.mozilla.org/">Mozilla</a>
        </div>
      </div>
      <div id="sticky-anchor"></div>
      <nav id="sticky" class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <!-- Mobile menu toggle -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Site logo -->
            <a class="navbar-brand" href="/">
              Advancing WebRTC
            </a>
          </div>
          <!-- Collect the nav links for toggling -->
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <?php primary_nav(); ?>
            <button class="search-toggle">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-search-white.svg">
            </button>
          </div>
        </div>
      </nav>

      <?php if ( is_front_page() ) : ?>
        <section class="home-hero">
          <div class="container">
            <div class="row">
              <div class="col-md-4 col-md-push-8 illustration-wrapper">  
                <img class="illustration" src="<?php echo get_template_directory_uri(); ?>/assets/img/illustration-home.svg">
              </div>
              <div class="col-md-8 col-md-pull-4">
                <h2><?php the_field('homepage_hero_title', 'option'); ?></h2>
                <p><?php the_field('homepage_hero_summary', 'option'); ?></p>
                <div class="actions">
                  <a href="/learn-more" class="btn-outline">Learn More</a>
                  <a href="/get-involved" class="btn-outline">Get Involved</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </header>