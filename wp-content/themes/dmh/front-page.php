<?php 
get_header(); 

get_template_part('components/page/hero');
get_template_part('components/page/stations');


$args = array(
	'posts_per_page'   => 8,
	'post_type'        => 'post'
);

$the_query = new WP_Query( $args );
?>





<section class="forecasts-cols" data-aos="zoom-out-up">
	<div class="container">
		<div class="owl-carousel">

			<?php if( $the_query->have_posts() ) : 
				while( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<div>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="excerpt"><?php echo wp_trim_words(get_the_content(), 18, '...'); ?></div>
					</div>

				<?php endwhile;
			endif; ?>

		</div><!-- owl-carousel end -->
	</div><!-- container end -->
</section><!-- forecasts-cols end -->






<section class="weather-app" data-aos="zoom-out-up">
	<div class="container">

		<div class="col-sm-6">
			<div class="content">
				<div class="h2 upper">Conocé el pronóstico del clima en cualquier momento, en cualquier lugar</div>
				<span>Descargá gratis nuestra app en tu tienda favorita</span>
				
				<a href="#" class="btn btn-appstore">Download on the App Store</a>
				<a href="#" class="btn btn-playstore">Get it on Google play</a>
			</div><!-- content end -->
		</div><!-- col end -->

		<div class="col-sm-6">
			<div class="mobile">

				<div class="screens owl-carousel">
					<div class="screen">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/app/screen-1.png" alt="">
					</div>
					<div class="screen">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/app/screen-2.png" alt="">
					</div>
					<div class="screen">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/app/screen-3.png" alt="">
					</div>
				</div><!-- screens end -->

				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mobile.png" alt="">

			</div><!-- mobile end -->
		</div><!-- col end -->

	</div><!-- container end -->
</section><!-- weather-app end -->




<?php get_footer();




