<?php
/**
 * Template Name: Publicaciones
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
		</div><!-- featured_content end -->
	<?php endif; ?>

</div><!-- container end -->




<article class="content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- entry-content end -->



		<?php 
		$categories = get_terms('pub_cat');


		if( !empty($categories) && ! is_wp_error($categories) ):
			foreach($categories as $category):
				
				$args = array(
					'post_type'        => 'publish',
					'posts_per_page'   => -1,
					'tax_query' => array(
						array(
							'taxonomy' 	=> 'pub_cat',
							'field' 		=> 'term_id',
							'terms' 		=> $category->term_id
						),
					)
				);

				$the_query = new WP_Query( $args ); 


				if( $the_query->have_posts() ): ?>


					<div class="publish-media">

						<h3><?php echo $category->name; ?></h3>

						<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div class="media">
								<div class="media-left">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pdf.png" class="media-object">
								</div><!-- media-left end -->

								<div class="media-body">
									<a href="<?php the_field('file'); ?>" class="media-heading" target="_blank"><?php the_title(); ?></a>
									<small class="fw-500"><?php the_content(); ?></small>
								</div><!-- media-body end -->

							</div><!-- media end -->
						<?php endwhile; ?>

					</div><!-- publish-media end -->
				<?php endif; 

				wp_reset_query();


			endforeach;
		endif; ?>


	</div><!-- container end -->
</article><!-- #post-## -->



<?php
endwhile; // End of the loop.

get_footer();





