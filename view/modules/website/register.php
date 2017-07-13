  <body id="registerUser" class="formularioUsuario">
  <div class="container">
	<div class="row">
	  <div class="col s10 valign" id="wrapRegistro">

		<form id="register" action="Guardar" method="post" data-parsley-validate>

		  <section>
			<div class="inputFile">
			  <input type="file" name="data[]" class="file" />
			  <div class="fakeFile">
					<img src="view/assets/images/foto_usu.png" width="100"/>
			  </div>
			</div>
		  </section>

			  <div class="input-field">
			    <div class="icon"></div>
				<input id="usu_name" type="text" name="data[]" class="validate" required placeholder="Nombre de Usuario">
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
