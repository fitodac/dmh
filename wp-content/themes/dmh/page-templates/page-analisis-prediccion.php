<?php
/**
 * Template Name: Análisis y prediccion
 *
 */

get_header(); ?>



<?php while( have_posts() ) : the_post(); ?>

<div class="container">

	<div class="page-header">
		<h1><?php the_title(); ?></h1>
	</div><!-- page-header end -->

	<?php if( get_field('featured_content') ): ?>
		<div class="featured-content">
			<?php the_field('featured_content'); ?>
		</div><!-- featured_content end -->
	<?php endif; ?>

</div><!-- container end -->



<article class="content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="entry-content">
			<?php the_content(); ?>


			<?php if( have_rows('maps') ): ?>
			<div class="row">
				<?php while( have_rows('maps') ) : the_row(); ?>

					<div class="col-lg-3 col-sm-4 col-ms-8 col-ms-push-2">
						<div class="card">
							<div class="card-block">
								<p>
									<a href="<?php echo get_sub_field('map')['url']; ?>" target="_blank">
										<img src="<?php echo get_sub_field('map')['sizes']['medium']; ?>" alt="" class="img-responsive">
									</a>
								</p>
								<p><strong><?php the_sub_field('text'); ?></strong></p>
								<div class="text-center">
									<a href="<?php echo get_sub_field('map')['url']; ?>" class="btn btn-primary btn-sm" target="_blank">VER MAPA</a>
								</div>
							</div><!-- card-block end -->
						</div><!-- card end -->
					</div><!-- col end -->

				<?php //the_sub_field('map'); ?>
				

				<?php endwhile; ?>
			</div><!-- row end -->
			<?php endif; ?>

		</div>
	</div><!-- container end -->
</article><!-- #post-## -->



<?php
endwhile; // End of the loop.


get_footer();




