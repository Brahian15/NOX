<body class="seccionPromoEventos row">
<div class="promocionesTitulo col s12">
	<h1>¡Promociones!</h1>
</div>

<?php foreach ($datos as $key) { ?>
	<div class="promo col s4" style="background-image: url(<?php echo $key["prom_foto"];?>); ">
		<p><?php echo $key["prom_nombre"];  ?></p>
	</div>

<?php } ?>

