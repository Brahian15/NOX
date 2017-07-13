  <body id="registerUser" class="formularioEstablecimiento">
  <div class="container">
	<div class="row">
	  <div class="col s10 valign" id="wrapRegistro">

		<form id="register" action="GuardarEst" method="post" enctype="multipart/form-data" data-parsley-validate>

		  <section>
				<div class="thumbnail col-xs-10 col-xs-offset-1">
					<input type="file" name="file_upload">
				</div>
		  </section>

			  <div class="input-field">
			    <div class="icon bolaDisco"></div>
				<input id="usu_name" type="text" name="data[]" class="validate" required placeholder="Nombre de Discoteca">
				<label></label>
			  </div>

			  <div class="input-field pegaditoAlaPared">
			     <div class="icon icon_email_recover"></div>
				 <input id="emailreg" type="email" name="data[]" class="validate" required
				 placeholder="Correo Electronico">
				 <label for="emailreg"></label>
			  </div>

			  <div class="input-field">
			    <div class="icon icon_pass_recover"></div>
				<input id="password" type="password" name="data[]" class="validate" required
				placeholder="Contraseña">
				<label for="usu_pass"></label>
			  </div>

			  <div class="input-field">
			    <div class="icon icon_pass"></div>
				<input id="pass" type="password" name="" class="validate" required
				placeholder="Repetir Contraseña">
				<label for="usu_cpas"></label>
			  </div>

				<div class="center-align">
				  <button id="btnreg" class="btns waves-effect waves grey lighten-4 btn-small purple-text">Registrarse</button>
				</div>
				<a href="Inicio" class="cancelarReg">cancelar</a>

		</form>
	  </div>
	</div>
  </div>