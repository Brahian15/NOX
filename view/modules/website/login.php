<body id="LoginUser" class="backgroundPrincipal">
	<div class="row">
		<form  id="login" class="col s12"  data-parsley-validate>
			<div id="wrap" class="col s10">
			   <div class="input-field">
			   	<div class="icon"></div>
				 <input id="emailLog" type="email" class="validate"  name="data[]" placeholder="Nombre de Usuario" required>
				 <label></label>
			   </div>
			   <div class="input-field div_pass">
			 	 <div class="icon icon_pass"></div>
				 <input id="passLog" type="password" class="validate" name="data[]" placeholder="Contraseña" required>
				 <label for="passLog"></label>
			   </div>
			   <div>
				 <button id="btnlog" class=" btns waves-effect waves grey lighten-4 btn-small purple-text">Ingresar</button>
			   </div>

			   <div class="marginEnlaces">
			   <a id="enlace" href="recuperar">¿Olvidaste la contraseña?</a><a href="recuperar"></a>
			   <a id="enlace2" href="EscogerRegistro">Registrarme</a><a href="EscogerRegistro"></a>
			   </div>

			</div>

		</form>
	</div>
