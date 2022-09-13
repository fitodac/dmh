<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dmh
 */

$address = get_field('address', 'option');
$facebook_url = get_field('facebook_url', 'option');
$twitter_url = get_field('twitter_url', 'option');
$youtube_url = get_field('youtube_url', 'option');
?>


		<footer class="main-footer" role="contentinfo">
			<div class="container">
				<div class="row">

					<div class="col-sm-6">
						<!-- <div class="spacer"></div> -->
						
						<div class="row">
							<div class="col-sm-4 col-ms-6">
								<?php if( is_active_sidebar('footer-1') ){
									dynamic_sidebar('footer-1');
								} ?>
							</div><!-- col end -->

							<div class="col-sm-4 col-ms-6">
								<?php if( is_active_sidebar('footer-2') ){
									dynamic_sidebar('footer-2');
								} ?>
							</div><!-- col end -->

							<div class="col-sm-4 col-ms-6">
							</div><!-- col end -->
						</div><!-- row end -->


						<div class="nav-small">
							<?php if( is_active_sidebar('footer-small-nav') ){
								dynamic_sidebar('footer-small-nav');
							} ?>
						</div><!-- nav-small end -->

					</div><!-- col end -->

					<div class="col-sm-6">
						<address>
							<svg class="brand"><use xlink:href="#brand-white-alt"></use></svg>
							<?php echo $address; ?>
						</address>
					</div><!-- col end -->

				</div><!-- row end -->
			</div><!-- container end -->




			<div class="subfooter">
				<div class="container">
					<div class="row">

						<div class="col-md-10">
							<div class="brands">
								<img class="gov" src="<?php echo get_template_directory_uri(); ?>/assets/images/gov.png" alt="">
								<img class="dinac" src="<?php echo get_template_directory_uri(); ?>/assets/images/dinac.png" alt="">
							</div><!-- brands end -->
						</div><!-- col end -->

						<div class="col-md-2">
							<div class="social">
								<?php if($facebook_url): ?>
								<a href="<?php echo $facebook_url; ?>" class="btn btn-link">
									<span class="fa fa-facebook"></span>
								</a>
								<?php 
								endif;
								if($twitter_url): ?>
								<a href="<?php echo $twitter_url; ?>" class="btn btn-link">
									<span class="fa fa-twitter"></span>
								</a>
								<?php 
								endif; 
								if($youtube_url): ?>
								<a href="<?php echo $youtube_url; ?>" class="btn btn-link">
									<span class="fa fa-youtube"></span>
								</a>
								<?php endif; ?>
							</div><!-- social end -->
						</div><!-- col end -->

					</div><!-- row end -->
				</div><!-- container end -->
			</div><!-- subfooter end -->

		</footer>


	</div><!-- off-canvas-container end -->


</main>


<?php wp_footer(); ?>

</body>
</html>
