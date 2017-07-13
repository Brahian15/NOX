
<?php

  require_once "model/user.model.php";

   class WebsiteController{
     private $model;

 		public function __CONSTRUCT(){

 			$this->model  = new UserModel();

 		}
     public function index(){				//Vista del Login
       $titulo = "NOX Medellín";
       require_once "view/include/header.php";
       require_once "view/modules/website/login.php";
       require_once "view/include/footer.php";
     }


     public function register(){			//Vista del Registro
       $titulo = "Registro";
       require_once "view/include/header.php";
       require_once "view/modules/website/register.php";
       require_once "view/include/footer.php";
     }

    public function escogerRegistro(){      //Vista del Registro
       $titulo = "Registro";
       require_once "view/include/header.php";
       require_once "view/modules/website/escoger_registro.php";
       require_once "view/include/footer.php";
     }

    public function registroEstablecimiento(){      //Vista del Registro
       $titulo = "Registro";
       require_once "view/include/header.php";
       require_once "view/modules/website/establecimiento_reg.php";
       require_once "view/include/footer.php";
     }





  /*   public function completar(){			//Vista de Completar Perfil
       $titulo = "Completa tu perfil";
       require_once "view/include/header.php";
       require_once "view/modules/user/completeProfile.php";
       require_once "view/include/footer.php";
     }
*/


     function validarText(){			//Validar texto de ingreo en el nombre de usuario

   	 	$text=$_POST["text"];
   		if($text == null){
   			$return = array("El campo es requerido",true);
   		}else{
   				$return = array("",false);
   				$permitidos = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";

   				if( preg_match($permitidos, $_POST['text']) ){

   							$return = array("",false);
   				}else{
   							$return = array("solo se admiten letras",true);
   				}
   		}
   		echo json_encode($return);
   		}


  public function usu_name(){ 
        $usu_name[0]= $_POST["usu_name"];
        $result = $this->model->nameUsuExist($usu_name);

        if(count($result[0])<=0){
              $return = array("",true);
        }else{
          $return = array("Éste nombre ya está en uso",false);
        }
        echo json_encode($return);
        }


	   
	   //Validar si ya tiene una cuenta en NOX usando ése correo(Registro)		

      public function emailReg(){ 
        $email[0]= $_POST["email"];
        $result = $this->model->emailExist($email);
        $resultEst = $this->model->emailExistEst($email);

        if(count($result[0])<=0 AND count($resultEst[0])<=0 ){
              $return = array("",true);
        }else{
          $return = array("Ya tienes una cuenta en NOX con éste correo",false);
        }
        echo json_encode($return);
        }
	  
	   
	   /////////////////////////////////////////////////////////////////////////////////////

        function validar_clave(){    	//Validar Clave
    		  $clave= $_POST["clave"];
    		   if(strlen($clave) < 8){
    			  $error_clave = array("Mínimo 8 carácteres",true);

    		   }
    		   else if(strlen($clave) > 15){
    			  $error_clave = array("Máximo 15 carácteres",true);

    		   }
    		   else if (!preg_match('`[A-Z]`',$clave)){
    			  $error_clave = array("Usa mínimo una letra mayúscula",true);

    		   }
    		  else if (!preg_match('`[0-9]`',$clave)){
    			  $error_clave = array("Añadele Al Menos Un Número",true);


    		  }else if (preg_match("/^\w+$/i",$clave)){
    			  $error_clave = array("Usa un caráter especial (@%/^\w+$/)",true);
    		  }
    		  else{
    			  $error_clave = array("",false);
    		  }

    		  echo json_encode($error_clave);
    		}
	   
	   ////////////////////////////////////////////////////////////////////////////////////
	   
        public function comparar_clave(){  //Validar claves iguales
          $pass=$_POST["pass"];
          $pass2=$_POST["pass2"];
          if ($pass === $pass2 ){

              $return= array("",true);

          }else{
            $return= array("Las contraseñas no son iguales",false);
          }

          echo json_encode($return);

        }
	   
	 ////////////////////////////////////////////////////////////////////////////////////
	   
	   
	   //Token, datos del día de registro + fecha + hora, password hash
	   
         public function create(){   

             require_once "app/init.php"; // initphp Requiere los directorios de Composer

      			  $data = $_POST["data"];

      				$data[3] = password_hash($data[3], PASSWORD_DEFAULT); //Pasword hash
      				$data[4] = "USU-".date('Y/m/d').'-'.date('h:m:s'); 	  //Datos del día
      				$data[5] = $this->randAlphanum(50);					  //Token aleatorio
      				$data[6] = "Inactivo";								  //Estado inicial
              $data[7]=date("Y/m/d");								 //Fecha de Registro

      				$result = $this->model->create($data);
      				header("Location: index.php?msn=$result");			//Redirecciónb al Login
      		}

         public function createEstablecimiento(){   

             require_once "app/init.php"; // initphp Requiere los directorios de Composer

              $data = $_POST["data"];

              $data[2] = password_hash($data[2], PASSWORD_DEFAULT); //Pasword hash
              $data[3] = "EST-".date('Y/m/d').'-'.date('h:m:s');    //Datos del día
              $data[4] = $this->randAlphanum(50);           //Token aleatorio
              $data[5] = "Inactivo";                  //Estado inicial
              $data[6]=date("Y/m/d");                //Fecha de Registro

              $nameFile = $this->randAlphanum(30).date('Ymdhs');
              $paths = array("intranet/uploads/");
              $successUpload = false;

              // Capturamos el nombre original del archivo con su extension.
              $fileUploadName = strtolower(basename($_FILES["file_upload"]["name"]));
              $fileUploadExt  = pathinfo($fileUploadName,PATHINFO_EXTENSION);

              // Validamos que el archivo sea mp3 o imagen >> Se le asigna la carpeta donde se debe guardar

              if($fileUploadExt == "mp3"){
                $path = $paths[1];
                $typeFile = "audio";
                $successUpload = true;
              }else{
                  if($fileUploadExt != "jpg" && $fileUploadExt != "png" && $fileUploadExt != "jpeg" && $fileUploadExt != "gif" ) {
                    $msn = "El archivo debe ser Imagen o Mp3";
                    $successUpload = false;
                  }else{
                    $typeFile = "imagen";
                    $path = $paths[0];
                    $successUpload = true;
                  }

               $typeFile = "";
              }

            // Validamos el peso del archivo, para este ejemplo no se permite archivos de imagen superiores a 2MB y archivos de audio superiores a 4MB

            switch ($typeFile) {
              case 'audio':
                  if($_FILES["file_upload"]["size"] > 16777216){
                    $msn = "Ooops! tu imagen no puede superar mas de 4MB";
                    $successUpload = false;
                  }
              break;

              case 'imagen':
                  if($_FILES["file_upload"]["size"] > 16777216){
                    $msn = "Ooops! tu imagen no puede superar mas de 2MB";
                    $successUpload = false;
                  }
              break;
            }


              if($successUpload == true){

                $file = $path. $nameFile .".". $fileUploadExt;

                if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $file)) {
                    $msn = "El archivo  se subio correctamente.  <br>";
                } else {
                  $msn =  "Ocurrio un error, empiece a ver en que fallo";
                }
              }

            header("Location: index.php?msn=$msn");

              $result = $this->model->createEstablecimiento($data,$file);
              header("Location: index.php?msn=$result");      //Redirecciónb al Login
          }



          public function randAlphanum($length){						//Function Random
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomAlpha = '';
          for ($i = 0; $i < $length; $i++) {
            $randomAlpha .= $characters[rand(0, $charactersLength - 1)];
          }
          return $randomAlpha;
          }
	   
	   
	   //Validar la cuenta está registrada en nox y si está activa (Login)
	   
      public function emailLog(){ 

      $email = $_POST["email"];

      $estado = $this->model->estado($email);
      $estadoEst = $this->model->estadoEst($email);

       if(count($estado[0])<=0 and count($estadoEst[0])<=0){
        $response = $this->model->readUserbyEmail($email);
        $responseEst = $this->model->readUserbyEmailEst($email);
        if(count($response[0])<=0 and count($responseEst[0])<=0){
          $return = array("El correo no existe en NOX",false);
        }else{
          $return = array("",true);
        }
      }else{
        $return = array("El correo está Inactivo",false);
      }
      echo json_encode($return);
      }


    public function activar(){		//Activar Cuenta Redirección al Login
            $email=$_SESSION['email'];
            $result = $this->model->activar($email);
            header("Location: Inicio");			
	  }

    public function activarEst(){   //Activar Cuenta Redirección al Login
            $email=$_SESSION['email'];
            $result = $this->model->activarEst($email);
            header("Location: Inicio");     
    }


	   
	   ////////////////////////////////////////////////////////////////////////////
	   
	   
	   //Por si no es obvio Validar Login Jjaja
    public function validarLogin(){


	  $data[0] = $_POST["email"]; //Recibo Correo y contraseña ingresada
	  $data[1] = $_POST["pass"];
    $cargo = $this->model->readCargo($data[0]);

    if ($cargo['rol_codigo'] == 2) {
          $userData = $this->model->readUserbyEmail($data[0]);
          //Miramos si la clave ingresada es la correcta (Pasword hash - pasword verify)
        if(password_verify($data[1],$userData["acc_clave"])){ 

         //  Creamos las variables de Sesion
         $_SESSION["user"]["token"] = $userData["acc_token"];
         $_SESSION["user"]["code"]  = $userData["usu_codigo"];
         $_SESSION["user"]["name"]  = $userData["usu_nombre"];
         $_SESSION["user"]["email"] = $_POST["email"];
         $_SESSION["user"]["cargo"] = "user";

    //Si el login fue correcto le da éste mensaje
         $return = array(true,"Bienvenido al Sistema",$_SESSION["user"]["token"]);
          
    //Sinó éste mensaje     
        }else{
         $this->model->updateUserFail($data[0]);
         $return = array(false,"La contraseña no es la correcta","");
        }
    }else{
        $userData = $this->model->readUserbyEmailEst($data[0]);
                //Miramos si la clave ingresada es la correcta (Pasword hash - pasword verify)
        if(password_verify($data[1],$userData["acc_clave_est"])){ 

         //  Creamos las variables de Sesion
         $_SESSION["user"]["token"] = $userData["acc_token_est"];
         $_SESSION["user"]["code"]  = $userData["est_codigo"];
         $_SESSION["user"]["name"]  = $userData["est_nombre"];
         $_SESSION["user"]["email"] = $_POST["email"];
         $_SESSION["user"]["cargo"] = "establecimiento";

    //Si el login fue correcto le da éste mensaje
         $return = array(true,"Bienvenido al Sistema",$_SESSION["user"]["token"]);
          
    //Sinó éste mensaje     
        }else{
         $this->model->updateEstFail($data[0]);
         $return = array(false,"La contraseña no es la correcta","");
        }
      
    }



				echo json_encode($return);

	}

    public function messaje(){

      require_once "app/init.php";
      $data = $_POST['email'];
      $cargo = $this->model->readCargo($data);
      $rol = $cargo['rol_codigo'];
      $result = $this->model->recuperarContraseña($data,$rol);

      
      header("Location: index.php?msn=$result");

    }

    public function newPass(){
      if($_GET['key']){
        $email=$_SESSION['EmailRecover'];
        $key=$_GET['key'];
        $checkKey= $this->model->checkKey($email,$key);

        if($checkKey['usu_key']==$key){
          $titulo= "Recuperar Clave";
          require_once "view/include/header.php";
          require_once "view/modules/website/recuperarForm.php";
          require_once "view/include/footer.php";
          
        }else{
          header("Location: index.php?c=user&a=recuperar&msn= Key Incorrecta; revisa tu correo para conseguir la llave correcta");
        }
      }else{
        header("Location: index.php?c=user&a=recuperar&msn=Revisa tu correo cabron");
      }
    }

    public function newPassEst(){
      if($_GET['key']){
        $email=$_SESSION['EmailRecover'];
        $key=$_GET['key'];
        $checkKey= $this->model->checkKeyEst($email,$key);

        if($checkKey['est_key']==$key){
          $titulo= "Recuperar Clave";
          require_once "view/include/header.php";
          require_once "view/modules/website/recuperarForm.php";
          require_once "view/include/footer.php";
          
        }else{
          header("Location: index.php?c=user&a=recuperar&msn= Key Incorrecta; revisa tu correo para conseguir la llave correcta");
        }
      }else{
        header("Location: index.php?c=user&a=recuperar&msn=Revisa tu correo cabron");
      }
    }

    public function updatePass(){
      $data = $_POST["data"];
      $data[0] = password_hash($data[0], PASSWORD_DEFAULT);
      $email=$_SESSION['EmailRecover'];
      $cargo = $this->model->readCargo($email);
      $rol = $cargo['rol_codigo'];
      $result = $this->model->updatePass($data,$email,$rol);
      session_start();
      session_destroy();
      header("Location: Inicio");
    }


      // metodo para capturar los datos del formulario de registro y subir imagen a l servidor

  


   
//////////////////////////////////////////////////////////////////////////////////
}
?>
