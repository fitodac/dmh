<?php 
$data = json_decode(file_get_contents('http://www.meteorologia.gov.py/emas.php/emas.json'), true);
$stations = $data['estaciones'];
?>

<section class="stations" data-aos="flip-up">
	<div class="container">

		<div class="stations-slider owl-carousel">
		<?php foreach($stations as $station): ?>

			<div class="row">

				<div class="col-sm-7">
					<div class="location">
						<svg class="icon-wifi"><use xlink:href="#icon-wifi"></use></svg>
						<div>
							<span>RED DE ESTACIONES AUTOMÁTICAS <small>DATOS ACTUALES</small></span>
							<div class="h2"><?php echo $station['nombre']; ?></div>
						</div>
					</div><!-- location end -->
				</div><!-- col end -->


				<div class="col-sm-5">
					<div class="data">
						<div class="row">

							<div class="col-xs-4">
								<div class="temp">
									<svg class="icon-thermo"><use xlink:href="#icon-thermo"></use></svg>
									<small>Temperatura</small>
									<span><?php echo $station['temperatura']; ?>º<small>c</small></span>
								</div><!-- temp end -->
							</div><!-- col end -->

							<div class="col-xs-4">
								<div class="humidity">
									<svg class="icon-drop"><use xlink:href="#icon-drop"></use></svg>
									<small>Humedad relativa</small>
									<span><?php echo $station['humedad']; ?>%</span>
								</div><!-- humidity end -->
							</div><!-- col end -->

							<div class="col-xs-4">
								<div class="time">
									<svg class="icon-clock"><use xlink:href="#icon-clock"></use></svg>
									<small>Hora</small>
									<span><?php echo $station['hora_observacion']; ?></span>
								</div><!-- time end -->
							</div><!-- col end -->

						</div><!-- row end -->
					</div><!-- data end -->
				</div><!-- col end -->

			</div>

		<?php endforeach; ?>
		</div><!-- stations-slider end -->

		<small>Los datos corresponden a la Red de Estaciones Automáticas ubicadas en distintos puntos del país con frecuencia de cada 10 minutos, actualizados al 19/02/2017</small>
	</div><!-- container end -->
</section><!-- stations end -->



