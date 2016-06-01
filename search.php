<?php get_header(); ?>
  
  <main role="main">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h1 class="archive-title">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-search-grey.svg" alt="Search results">
            <?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?>
          </h1>
          <?php get_template_part('loop'); ?>
          <?php get_template_part('pagination'); ?>
        </div>
      </div>
    </div>
  </main>

<?php get_footer(); ?>