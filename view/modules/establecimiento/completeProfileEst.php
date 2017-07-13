<body id="complete" class="formularioEstablecimiento">
 <div class="container">
    <div class="row">
      <div class="col s10 offset-s1 valign" id="wrapCompletarPerfil">
        
        <h1>Completa tu perfil</h1>
        <h2>Ingresa tus datos para poder continuar en NOX</h2>

         <form id="Actualizar" action="actualizarProfileEst" method="post" data-parsley-validate>

             <div class="input-field">
               <div class="icon"></div>
               <input id="usu_nombre" type="text" name="data[]" class="validate" required placeholder="Nombre de la Empresa">
               <label for="usu_nombre"></label>
             </div>

             <div class="input-field">
               <div class="icon"></div>
               <select name="data[]" class="validate" required id="usu_genero">
                 <option value="" disabled selected>Selecciona el genero</option>
                 <option value="Reggaeton">Reggaeton</option>
                 <option value="Rock">Rock</option>
                 <option value="Salsa">Salsa</option>
                 <option value="Vallenato">Vallenato</option>
                 <option value="Techno">Techno</option>
                 <option value="House">House</option>
                 <option value="Metal">Metal</option>
                 <option value="Pop">Pop</option>
                 <option value="Crossover">Crossover</option>
               </select>
               <label></label>
               </div>

             <div class="input-field">
               <div class="icon"></div>
               <input id="usu_apellido" type="number" name="data[]" class="validate" required placeholder="NIT">
               <label for="usu_apellido"></label>
             </div>

             <div class="input-field">
               <div class="icon"></div>
               <input id="usu_apellido" type="text" name="data[]" class="validate" required placeholder="Dirrecion">
               <label for="usu_apellido"></label>
             </div>

             <div class="input-field">
                <div class="icon"></div>
               <input type="number" placeholder="Telefonó" id="usu_fecha_nacimiento" name="data[]" class="validate" required>
             </div>

             <div class="input-field">
                <div class="icon"></div>
               <input type="number" placeholder="Celular" id="usu_fecha_nacimiento" name="data[]" class="validate" required>
             </div>


             <div class="center-align">
               <button id="btnCom" class="btns waves-effect waves grey lighten-4 btn-small purple-text">Actualizar Perfil</button>
             </div>

   </form>
   </div>
 </div>
 </div>
