<body id="complete" class="formularioUsuario">
 <div class="container">
    <div class="row">
      <div class="col s10 offset-s1 valign" id="wrapCompletarPerfil">
        
        <h1>Completa tu Perfil</h1>
        <h1><?php echo $_SESSION["user"]["cargo"]; ?></h1>
        <h2>Ingresa tus datos para poder continuar en NOX</h2>

         <form id="Actualizar" action="actualizarProfile" method="post" data-parsley-validate>

             <div class="input-field">
               <div class="icon"></div>
               <input id="usu_nombre" type="text" name="data[]" class="validate" required placeholder="Nombre">
               <label for="usu_nombre"></label>
             </div>

             <div class="input-field">
               <div class="icon"></div>
               <input id="usu_apellido" type="text" name="data[]" class="validate" required placeholder="Apellido">
               <label for="usu_apellido"></label>
             </div>

             <div class="input-field">
               <div class="icon"></div>
               <select name="data[]" class="validate" required id="usu_genero">
                 <option value="" disabled selected>Selecciona tu género</option>
                 <option value="Masculino">Masculino</option>
                 <option value="Femenino">Femenino</option>
                 <option value="Indefinido">Indefinido</option>
               </select>
               <label></label>
               </div>

             <div class="input-field">
                <div class="icon"></div>
               <input type="date" placeholder="Fecha de Nacimiento" id="usu_fecha_nacimiento" name="data[]" class="validate" required>
             </div>


             <div class="center-align">
               <button id="btnCom" class="btns waves-effect waves grey lighten-4 btn-small purple-text">Actualizar Perfil</button>
             </div>

   </form>
   </div>
 </div>
 </div>
