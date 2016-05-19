<?php get_header(); ?>
  
  <main role="main">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h1 class="archive-title"><?php _e( 'Categories for ', 'html5blank' ); single_cat_title(); ?></h1>
          <?php get_template_part('loop'); ?>
          <?php get_template_part('pagination'); ?>
        </div>
      </div>
    </div>
  </main>

<?php get_footer(); ?>