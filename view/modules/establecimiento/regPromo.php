  <body id="registerUser" class="formularioEstablecimiento">
  <div class="container">
	<div class="row">
	  <div class="col s10 valign" id="wrapRegistro">

		<form id="register" action="GuardarPromo" method="post" enctype="multipart/form-data" data-parsley-validate>

		  <section>
				<div class="thumbnail col-xs-10 col-xs-offset-1">
					<input type="file" name="file_upload">
				</div>
		  </section>

			  <div class="input-field">
			    <div class="icon bolaDisco"></div>
				<input id="usu_name" type="text" name="data[]" class="validate" required placeholder="Nombre de la promocion">
				<label></label>
			  </div>

			  <div class="input-field">
				<textarea rows="4" cols="50" name="data[]" placeholder="Descripcion de la promocion"></textarea>
			  </div>

				<div class="center-align">
				  <button id="btnreg" class="btns waves-effect waves grey lighten-4 btn-small purple-text">Guardar</button>
				</div>
				<a href="promoEventosEst" class="cancelarReg">cancelar</a>

		</form>
	  </div>
	</div>
  </div>