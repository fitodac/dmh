<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dmh
 */

?>

<article class="content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</div><!-- container end -->
</article><!-- #post-## -->


