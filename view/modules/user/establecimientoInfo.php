<?php 
	
	$_COOKIE["est"]["code"] = $result['est_codigo']

 ?>

<body class="colorNegro">
<section class="row">	
		<div class="imgEstablecimiento" style="background-image: url(<?php echo $result['est_foto'];?>););">
			<div class="divReg">
					<a href="reservar"><p>Reservar</p></a>	
			</div>
		</div>
</section>
		 	<div class="info">
				<h2 class="center-align flow-text"><?php if ($result['est_nombre_usuario'] == null) {
					echo "No disponible";
				}else{
					echo $result['est_nombre_usuario']; 
					}?></h2>
				<p class="center-align flow-text infoDirec"><?php if ($result['est_nombre'] == null) {
					echo "No disponible";
				}else{
					echo $result['est_direccion']; 
					}?></p>
					<ul>
						<li><?php if ($result['est_celular'] == null) {
							echo "No disponible";
						}else{
							echo $result['est_celular'];
							}?>
							-
							<?php
							if ($result['est_telefono'] == null) {
							 	echo "No disponible";
							 }else{
							 	echo $result['est_telefono'];
							 } 
							 ?>
							</li>
						<li><?php if ($result['est_genero'] == null) {
							echo "No disponible";
						}else{
								echo $result['est_genero'];
							}?></li>
						<li><?php if ($result['est_correo'] == null) {
							echo "No disponible";
						}else{
							echo $result['est_correo'];
							} ?></li>
					</ul>
			</div> 
 