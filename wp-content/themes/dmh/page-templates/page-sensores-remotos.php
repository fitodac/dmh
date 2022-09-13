<?php
/**
 * Template Name: Sensores Remotos
 *
 */
get_header(); 



while( have_posts() ) : the_post(); ?>

<div class="container">

	<div class="page-header">
		<h1><?php the_title(); ?></h1>
	</div><!-- page-header end -->

	<?php if( get_field('featured_content') ): ?>
		<div class="featured-content">
			<?php the_field('featured_content'); ?>
		</div><!-- featured-content end -->
	<?php endif; ?>

</div><!-- container end -->



<article class="content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">

		<div class="row">
			<div class="col-md-3">
				<?php the_field('column_1'); ?>
				<?php if( get_field('link_1') ): ?>
					<div class="text-center p-t">
						<a href="<?php the_field('link_1'); ?>" class="btn btn-primary">VER SATELITALES</a>
					</div>
				<?php endif; ?>
			</div><!-- col end -->
			
			<div class="col-md-3">
				<?php the_field('column_2'); ?>
				<?php if( get_field('link_2') ): ?>
					<div class="text-center p-t">
						<a href="<?php the_field('link_2'); ?>" class="btn btn-primary">VER SATELITALES</a>
					</div>
				<?php endif; ?>
			</div><!-- col end -->
			
			<div class="col-md-3">
				<?php the_field('column_3'); ?>
				<?php if( get_field('link_3') ): ?>
					<div class="text-center p-t">
						<a href="<?php the_field('link_3'); ?>" class="btn btn-primary">VER SATELITALES</a>
					</div>
				<?php endif; ?>
			</div><!-- col end -->
			
			<div class="col-md-3">
				<?php the_field('column_4'); ?>
				<?php if( get_field('link_4') ): ?>
					<div class="text-center p-t">
						<a href="<?php the_field('link_4'); ?>" class="btn btn-primary">VER SATELITALES</a>
					</div>
				<?php endif; ?>
			</div><!-- col end -->
		</
		div><!-- row end -->

		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- entry-content end -->

	</div><!-- container end -->
</article><!-- #post-## -->



<?php
endwhile; // End of the loop.


get_footer();



