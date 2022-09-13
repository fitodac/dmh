<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dmh
 */

get_header(); ?>

<div class="container">

	<div class="page-header">
		<h1><?php the_title(); ?></h1>
	</div><!-- page-header end -->


</div><!-- container end -->

<?php
get_template_part( 'components/page/content', 'page' );

get_footer();





