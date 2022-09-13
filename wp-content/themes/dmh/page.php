<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dmh
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
		</div><!-- featured-content end -->
	<?php endif; ?>

</div><!-- container end -->

<?php 
get_template_part( 'components/page/content', 'page' ); 

endwhile; // End of the loop.


get_footer();
