<body class="colorNegro">
	<div class="container">
	<div class="row">
	  <div class="col s10 valign" id="wrapRegistro">

		<form id="register" action="GuardarReserva" method="post" enctype="multipart/form-data" data-parsley-validate>


			  <div class="input-field">
			    <div class="icon"></div>
				<input id="num_personas" type="number" name="data[]" class="validate" required placeholder="Numero de Personas">
				<label></label>
			  </div>

			  <div class="input-field pegaditoAlaPared">
			     <div class="icon icon_email_recover"></div>
				 <input id="emailreg" type="date" name="data[]" class="validate" required
				 placeholder="Fecha">
				 <label for="emailreg"></label>
			  </div>

             <div class="input-field">
               <div class="icon"></div>
               <select name="data[]" class="validate" required id="usu_genero">
                 <option value="" disabled selected>Selecciona el acontecimiento a celebrar</option>
                 <option value="Cumpleaños">Cumpleaños</option>
                 <option value="Aniversario">Aniversario</option>
                 <option value="Bienvenida">Bienvenida</option>
                 <option value="Despedida">Despedida</option>
                 <option value="Reunion">Reunion</option>
               </select>
               <label></label>
               </div>


				<div class="center-align">
				  <button id="btnreg" class="btns waves-effect waves grey lighten-4 btn-small purple-text">Reservar</button>
				</div>
				<a href="Establecimiento" class="cancelarReg">cancelar</a>

		</form>
	  </div>
	</div>
  </div>