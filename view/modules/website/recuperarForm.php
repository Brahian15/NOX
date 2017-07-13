 <body id="recoverPass" class="backgroundPrincipal">
 <div class="container">
	<div class="row">
	  <div class="col s8 offset-s2 valign">
		<form action="updatePass" id="recover" method="post" data-parsley-validate>
	
			<h2>Ingresa y confirma tu nueva contraseña</h2>
			<div class="input-field">
				<div class="icon icon_pass_recover"></div>
				<input type="password" id="password" name="data[]" placeholder="Contraseña Nueva" class="validate" data-parsley-equalto="#password" data-parsley-required-message="Porfavor ingresa tu nueva contraseña."
				data-parsley-required>

				<label></label>
				<span class="errorpass"></span>
			</div>
			<div class="input-field">
				<div class="icon icon_pass"></div>
				<input type="password" id="pass" name="data[]" placeholder="Confirmar Contraseña" class="validate" data-parsley-equalto="#password">
				<label ></label>
				</div>
				<button type="submit" class="btns waves-effect waves grey lighten-4 btn-small purple-text">Guardar</button>
				<a href="Inicio" class="cancelarRec">Cancelar</a>

		</form>