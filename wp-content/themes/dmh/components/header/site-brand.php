<?php
if ( is_front_page() || is_home() ) : ?>
	<h1 class="navbar-brand">
		<a href="<?php echo esc_url( home_url('/') ); ?>">
			<svg class="brand"><use xlink:href="#brand-white"></use></svg>
			<span class="sr-only"><?php echo bloginfo( 'name' ); ?></span>
		</a>
	</h1><!-- navbar-brand end -->
<?php else : ?>
	<div class="navbar-brand">
		<a href="<?php echo esc_url( home_url('/') ); ?>">
			<svg class="brand"><use xlink:href="#brand-white"></use></svg>
			<span class="sr-only"><?php echo bloginfo( 'name' ); ?></span>
		</a>
	</div><!-- navbar-brand end -->
<?php
endif;
?>

<img class="gov" src="<?php echo get_template_directory_uri(); ?>/assets/images/gov.png" alt="">