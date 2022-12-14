<?php

	function getPlantilla($datos){

	$plantilla = '<body>
		<div class="contenedor">
			<section class="tarjeta" id="tarjeta">';

				foreach ($datos as $dato ){
					$plantilla .= ' 
						<div class="delantera">
							<div class="logo-escuela">
								<img src="'.$dato['imagen'].'"  alt="">
							</div>				
							<div class="grupo" id="numero">
								<p class="label">No. Control</p>
								<p class="numero">'.$dato['nocuenta'].'</p>
							</div>
							<div class="flexbox">
								<div class="grupo" id="nombre">
									<p class="label">Nombre</p>
									<p class="nombre">'.$dato['nombre'].' '.$dato['apellido_pat'].' '.$dato['apellido_mat'].'</p>
								</div>

								<div class="grupo" id="expiracion">
									
								</div>
							</div>
						</div>
						<div class="trasera">
							<div class="qr">
								<img src="qr/qr.png" alt="">
							</div>
						</div>';
				}	

				$plantilla .='
			</section>
		</div> 
		<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
		<script src="js/credencial.js"></script>
	</body>';

	return $plantilla;
}