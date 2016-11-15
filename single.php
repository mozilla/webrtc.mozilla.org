<?php get_header(); ?>

	<main role="main">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-10 col-md-offset-1">
	      	<a href="https://blog.mozilla.org/webrtc" class="back-to-blog">&larr; View all posts</a>

				<?php if (have_posts()): while (have_posts()) : the_post(); ?>

					<!-- Article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<!-- Date -->
						<span class="date"><?php the_time('F j, Y'); ?></span>
						<!-- Feature img -->
						<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
							</a>
						<?php endif; ?>
						<!-- Title -->
						<h2 class="post-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</h2>
						<!-- Author -->
						<span class="author">Contributed by <a target="_blank" href="<?php webrtc_author_link(); ?>"><?php webrtc_author_name(); ?></a>, <?php webrtc_author_title(); ?></span>
						
						<?php the_content(); ?>

						<?php edit_post_link(); ?>

						<div class="tags">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-tags.svg" alt="Tags">
							<?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
						</div>
						
					</article>

				<?php endwhile; ?>

				<?php else: ?>

					<!-- article -->
					<article>

						<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

					</article>
					<!-- /article -->

				<?php endif; ?>

        </div>
      </div>
    </div>
	</main>

<?php get_footer(); ?>