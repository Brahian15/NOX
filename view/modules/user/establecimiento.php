<body class="colorNegro">
<?php 
	$color = 0;
?>
	<section class="row">
	<section>
	<form action="Establecimiento" method="POST" class="row input-field">
		<input type="text" name="busqueda" id="busqueda" placeholder="SearchingHelp" class="col s7 offset-s2">
		<div class="icon busquedaIcon"></div>
		<button class="btnBusqueda waves-effect waves grey lighten-4 btn-small purple-text col s2 of">Buscar</button>
	</form>
	</section>
	<?php
	if (isset($_POST["busqueda"])) {
		$data = $_POST["busqueda"];
		$data = $this->model->buscarEstablecimiento($data);
		if (count($data)>0) {
			foreach ($data as $llave) {?>
	<?php 
		$color = $color +1;
	?>
	
	<div class="col s12 seccionEstablecimiento row" style="background-image: url(<?php echo $llave['est_foto'];?>);">
		
		 	<div class=" col s6 offset-s3 nombreEstablecimiento">
				<p class="center-align flow-text"><?php echo $llave['est_nombre_usuario']; ?></p>
			</div>
			<div class="<?php if ($color%2 != 0) {
				echo "colorRosa";
			}else{
				echo "colorAzul";
				} ?>">
				<div class="borderEstablecimiento">
			<form action="MostrarInfo" method="POST" class="col s6 offset-s3">
			<input type="text" value="<?php echo $llave['est_codigo']; ?>" name="data">
			<button class="col s6"></button>	
			</form>
				</div>
			</div>
			<div class="logoBusqueda col s6 offset-s6"></div>
	</div>


			<?php }
			
		}else{
			?> 
			<div class="row">
			<h2 class="noResults col s12">No hubo coincidencias en tu busqueda...</h2>
			<div class="logoBusqueda col s6 offset-s6"></div>
			</div>
			<?php
		}
	}else{
	foreach ($datos as $key) { ?>

	<?php 
		$color = $color +1;
	?>

	
	<div class="col s12 seccionEstablecimiento row" style="background-image: url(<?php echo $key['est_foto'];?>);">
		
		 	<div class=" col s6 offset-s3 nombreEstablecimiento">
				<p class="center-align flow-text"><?php echo $key['est_nombre_usuario']; ?></p>
			</div>
			<div class="<?php if ($color%2 != 0) {
				echo "colorRosa";
			}else{
				echo "colorAzul";
				} ?>">
				<div class="borderEstablecimiento">
			<form action="MostrarInfo" method="POST" class="col s6 offset-s3">
			<input type="text" value="<?php echo $key['est_codigo']; ?>" name="data">
			<button class="col s6"></button>	
			</form>
				</div>

				
			</div>
	</div>

		<?php
		 }} 
		?>
		
	</section>
