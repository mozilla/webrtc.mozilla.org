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

		<?php if( has_tag() ) : ?>
			<div class="tags">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-tags.svg" alt="Tags">
				<span class="tags-wrapper">
					<?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
				</span>
			</div>
		<?php endif; ?>
		
	</article>

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
