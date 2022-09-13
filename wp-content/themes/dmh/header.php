<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lhmoney
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>
	<?php get_template_part('assets/svg/sprite.svg'); ?>


	<?php if( !is_front_page() ): ?>
		<div class="img-bg">
			<div class="grad"></div>
		</div>
	<?php endif; ?>

	<main class="off-canvas-wrapper off-canvas-hover push" role="main" data-offset="65">



		<div class="off-canvas-sidebar">
			<?php create_bootstrap_menu('stacked'); ?>
		</div><!-- off-canvas-sidebar end -->


		<button class="btn navbar-toggler" data-spy="affix" data-offset-top="60"><span class="fa fa-bars"></span></button>


		<div class="off-canvas-container">

			<header class="main-header" role="banner">
				<div class="container">

					<!-- <div class="navbar-toggler-spacer"></div> -->

					<?php get_template_part('/components/header/site', 'brand'); ?>

				</div><!-- container end -->
			</header>




