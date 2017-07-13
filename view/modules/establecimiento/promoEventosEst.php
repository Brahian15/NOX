<body class="seccionPromoEventos row">
<div class="promocionesTitulo col s12">
	<h1>¡Promociones!</h1>
</div>

<?php foreach ($datos as $key) { ?>
	<div class="promo col s4" style="background-image: url(<?php echo $key["prom_foto"];?>); ">
		<p><?php echo $key["prom_nombre"];  ?></p>
	</div>

<?php } ?>
<div class="moverBtn">
<a href="regPromo" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">add</i></a>
</div>
