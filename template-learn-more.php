<?php /* Template Name: Learn More */ get_header(); ?>

  <main role="main">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">

        <?php if (have_posts()): while (have_posts()) : the_post(); ?>

          <?php edit_post_link(); ?>

          <!-- PAGE FEATURE ======= -->
          <!-- ==================== -->
          <section class="page-feature">
            <div class="spot-illustration">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/illustration-learn-more.svg">
            </div>
            <h1 class="narrative-title">
              <?php the_field('narrative_title'); ?>
            </h1>
            <div class="narrative-summary">
              <?php the_content(); ?>
            </div>
          </section>

          <!-- WEBRTC SUMMARY ========= -->
          <!-- ======================== -->
          <section class="webrtc-summary">
            <?php the_field('webrtc_summary'); ?>
          </section>

          <!-- PAGE COLUMNS ======= -->
          <!-- ==================== -->
          <section class="narrative-columns">
            <div class="row">
              <div class="col-md-6 column-one">
                <h3 class="column-title">
                  <span class="column-icon"></span>
                  <?php the_field('narrative_column_one_title'); ?>
                </h3>
                <div class="column-content">
                  <?php the_field('narrative_column_one_content'); ?>
                </div>
              </div>
              <div class="col-md-6 column-two">
                <h3 class="column-title">
                  <span class="column-icon"></span>
                  <?php the_field('narrative_column_two_title'); ?>
                </h3>
                <div class="column-content">
                  <?php the_field('narrative_column_two_content'); ?>
                </div>
              </div>
            </div>
          </section>

        <?php endwhile; ?>

        <?php endif; ?>

          <!-- JOIN THE CONVERSATION ======= -->
          <!-- ============================= -->
          <?php get_template_part( 'includes/join-conversation' ); ?>

      </div>
    </div>
  </main>

<?php get_footer(); ?>