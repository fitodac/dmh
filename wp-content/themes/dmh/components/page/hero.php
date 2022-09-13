<?php 
	$obj = json_decode(file_get_contents('http://190.128.205.78:8080/api/get_all/183'), true);
?>
<div class="hero hero-<?php echo $obj[0]['datos_actuales']['icono']['identificador']; ?>">
	<div class="container">
		<div class="row flex">


			<div class="col-md-6 col-md-push-6 col-sm-7 col-sm-push-5 col-ms-12" data-aos="fade-left">
				<div class="forecast owl-carousel">
					<?php if( have_rows('weather') ): 

						$cities = [];

	    			while ( have_rows('weather') ) : the_row(); 

	    			$url = get_sub_field('json_url');
	    			$obj = json_decode(file_get_contents($url), true);
	    			$iconPath = '/wp-content/themes/dmh/assets/images/weather-icons/';
	    			$cities[] = $obj[0]['distrito'];
	    			?>

	    			<div class="forecast-owl-item">
							<div class="display-3">
								<span class="city"><?php echo $obj[0]['distrito']; ?></span> | 
								<span class="temp-max"><?php echo $obj[0]['pronosticos'][0]['temperatura_maxima']; ?>º</span>
							</div>


							<div class="short-description">
								<span><?php echo $obj[0]['datos_actuales']['tiempo_presente']; ?></span>
								<i class="icon" style="background-image: url('<?php echo $iconPath . $obj[0]['datos_actuales']['icono']['imagen_png']; ?>');"></i>
							</div>


							<div class="forecast-today">
									<div class="row">
										<div class="col-sm-3 col-ms-5 col-xs-6">
											<div class="high-low col-forecast-today">
												<small>SENSACIÓN TÉRMICA</small>
												<div>
													<svg class="icon-thermo"><use xlink:href="#icon-thermo"></use></svg>
													<span class="high">
														<span><?php echo $obj[0]['pronosticos'][0]['temperatura_maxima']; ?>º</span>
														<small>MAX</small>
													</span>
													<span class="low">
														<span><?php echo $obj[0]['pronosticos'][0]['temperatura_minima']; ?>º</span>
														<small>MIN</small>
													</span>
												</div>
											</div><!-- high-low end -->
										</div><!-- col end -->
										
										<div class="col-sm-3 col-ms-5 col-xs-6">
											<div class="humidity col-forecast-today">
												<small>HUMEDAD</small>
												<div>
													<svg class="icon-drop"><use xlink:href="#icon-drop"></use></svg>
													<span><?php echo $obj[0]['datos_actuales']['humedad_relativa']; ?>%</span>
												</div>
											</div><!-- humidity end -->
										</div><!-- col end -->

										<div class="col-sm-3 col-ms-5 col-xs-6">
											<div class="precip col-forecast-today">
												<small>PRECIPITACIÓN</small>
												<div>
													<svg class="icon-umbrella"><use xlink:href="#icon-umbrella"></use></svg>
													<span><?php echo $obj[0]['precipitacion_acumulada']['precipitacion']; ?>%</span>
												</div>
											</div><!-- precip end -->
										</div><!-- col end -->

										<div class="col-sm-3 col-ms-5 col-xs-6">
											<div class="wind col-forecast-today">
												<small>VIENTO</small>
												<div>
													<svg class="icon-compass"><use xlink:href="#icon-compass"></use></svg>
													<span class="speed">
														<span><?php echo $obj[0]['datos_actuales']['vel_viento']; ?></span>
														<small>km/h</small>
													</span>
													<span class="dir"><?php echo $obj[0]['datos_actuales']['dir_viento']; ?></span>
												</div>
											</div><!-- wind end -->
										</div><!-- col end -->
									</div><!-- row end -->
							</div><!-- forecast-today end -->


							<div class="days">
								<?php 
								$days = $obj[0]['pronosticos'];
								$cont = 0;

								foreach($days as $day): 
									if( $cont > 0 && $cont <= 5 ): ?>
										<div class="day-<?php echo $cont; ?>">
											<i class="icon" style="background-image: url('<?php echo $iconPath . $day['icono']['imagen_png']; ?>');"></i>

											<?php 
											$date = $day['fecha'];
											$nameOfDay = date('l', strtotime($date));
											?>

											<span class="day-name"><?php echo dateES($nameOfDay); ?></span>
											<span class="day-date"><?php echo explode('-', $day['fecha'])[2]; ?></span>
											<span class="day-high">
												<span><?php echo $day['temperatura_maxima']; ?>º</span>
												<small>MAX</small>
											</span>
											<span class="day-low">
												<span><?php echo $day['temperatura_minima']; ?>º</span>
												<small>MIN</small>
											</span>
										</div><!-- day-1 end -->
									<?php endif;
									$cont++;
								endforeach; ?>
							</div><!-- days end -->


							<div class="updated">
								<?php 
								$date = $obj[0]['datos_actuales']['fecha'];
								$month = date('F', strtotime($date));
								?>

								<svg class="icon-clock"><use xlink:href="#icon-clock"></use></svg>
								Actualizado al 
								<span class="date">
									<?php echo explode('-', $obj[0]['datos_actuales']['fecha'])[2].' de '.dateES($month); ?> 
								</span>, 
								<span class="hour">
									<?php echo $obj[0]['datos_actuales']['hora_local']; ?>
								</span>
							</div><!-- updated end -->

						</div><!-- forecast-owl-item end -->
				    
				    <?php endwhile;
					endif; ?>
				</div><!-- forecast end -->
			</div><!-- col end -->




			<div class="col-sm-5 col-md-pull-6 col-sm-pull-7 col-center" data-aos="fade-right">
				<?php 
				$news = json_decode(file_get_contents('http://190.128.205.78:8080/noticia.json'), true);
				$news_count = str_word_count($news['contenido_noticias']);
				?>
				<div class="report">
					<small>REPORTE</small>
					<div class="report-title"><?php echo $news['titulo_noticas']; ?></div>
					<div class="report-content"><?php echo wp_trim_words($news['contenido_noticias'], 30, '...'); ?></div>
					<?php if($news_count > 30): ?>
						<div><button class="btn btn-default btn-outline">VER MAS</button></div>
					<?php endif; ?>
				</div><!-- report end -->
			</div><!-- col end -->



		</div><!-- row end -->


		<footer data-aos="zoom-out" data-aos-anchor=".hero">
			<div class="owl-control">
				<?php 
				$cont = 0;
				foreach( $cities as $city ): ?>

					<a href="#" <?php echo $cont === 0 ? 'class="active"' : ''; ?>><?php echo $city ?></a>

				<?php 
				$cont++;
				endforeach; ?>
			</div><!-- owl-control end -->
		</footer>

	</div><!-- container end -->





	<div class="full-report">
		<div class="container">
			<div class="row flex">

				<div class="col-sm-10 col-center">
					<small>REPORTE METEOROLÓGICO</small>
					<div class="report-title h2"><?php echo $news['titulo_noticas']; ?></div>
					<div class="report-content"><?php echo $news['contenido_noticias']; ?></div>
					<div class="report-author">
						<img src="<?php echo $news['meteorologo']['foto_url']; ?>" class="img-author">
						<small>METEORÓLOGO:</small>
						<span><?php echo $news['autor_noticias']; ?></span>
					</div>
				</div><!-- col end -->

				<div class="col-sm-2">
					<div class="btn close"></div>
				</div>

			</div><!-- row end -->
		</div><!-- container end -->
	</div><!-- full-report end -->



	<!-- <canvas width="1" height="1" id="container"></canvas> -->
</div><!-- hero end -->










