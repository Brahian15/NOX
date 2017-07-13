
<body class="colorNegro">
	<section class="row misReservas">
	<h1>Mis Reservas</h1>
	<?php
	$fecha_actual=date("Y-m-d");
		function dateDiff($start, $end) { 
		$start_ts = strtotime($start); 
		$end_ts = strtotime($end); 
		$diff = $end_ts - $start_ts; 
		return round($diff / 86400); 

} 
	foreach ($datos as $key) { ?>


		<ul class="col s12 divReservas row">
		<div>
			<a href=""><div class="iconoDelete"></div></a>
		</div>
				<li class="col s6 lista"><?php echo $key['est_nombre_usuario']; ?><li>
				<li class="col s4 lista direcRes center">Personas</li>
				<li class="col s6 lista direcRes"><?php echo $key['est_direccion']; ?></li>
				<li class="col s4 lista direcRes center"><?php echo $key['res_numero_personas']; ?></li>
				<li class="col s5 offset-s1 fechaRes"><?php echo $key['res_fecha'] ?></li>
				<li class="col s4 offset-s1 fechaRes center">Faltan: <?php echo dateDiff($fecha_actual, $key['res_fecha']);; ?> dias</li>
		</ul>



		<?php
		 } 
		?>
		
	</section>
